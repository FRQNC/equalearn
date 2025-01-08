<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;
use App\Models\Grades;
use App\Models\Topics;
use App\Models\Tags;

use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function addPostView()
    {
        $grades = Grades::all();
        $topics = Topics::all();
        return view('post.addPost', ['grades' => $grades, 'topics' => $topics]);
    }

    public function uploadImageToPost(Request $request)
    {
        $user = Auth::user();

        // Check if the request contains an uploaded image file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img = $request->file('image');

            // Generate a unique file name
            $uniqueFileName = uniqid() . '_' . $img->getClientOriginalName();

            // Store the file with the unique file name
            $img_path = $img->storeAs('post_images/' . $user->id, $uniqueFileName, 'public');

            // Prepare the response with the image URL
            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => Storage::url($img_path),
                ],
            ]);
        }

        // Handle error if no image file was found
        return response()->json([
            'success' => 0,
            'message' => 'No image file received.',
        ]);
    }

    public function deleteImageFromPost(Request $request)
    {
        $user = Auth::user();
        // Get the image URL from the request
        $imageUrl = $request->input('imageUrl');

        // Process the image URL to get the image filename
        $filename = basename($imageUrl);

        // Define the path to the image file
        $filePath = storage_path('app/public/post_images/' . $user->id . '/' . $filename);

        // Check if the file exists and delete it
        if (file_exists($filePath)) {
            unlink($filePath);

            // Send a success response back to the editor
            return response()->json([
                'success' => 1,
                'message' => 'Image deleted successfully.',
            ]);
        } else {
            // Send an error response if the file does not exist
            return response()->json([
                'success' => 0,
                'message' => 'Image file not found.',
            ]);
        }
    }

    public function fetchLinkPreview(Request $request)
    {
        $url = $request->input('url');

        try {
            $response = Http::get($url);

            // Extract meta tags from the HTML content
            $html = $response->body();
            $doc = new \DOMDocument();
            @$doc->loadHTML($html);

            $title = $this->getMetaTagContent($doc, 'og:title') ?? $this->getMetaTagContent($doc, 'title') ?? $url;
            $description = $this->getMetaTagContent($doc, 'og:description') ?? $this->getMetaTagContent($doc, 'description') ?? 'No description available.';
            $image = $this->getMetaTagContent($doc, 'og:image') ?? null;

            return response()->json([
                'success' => 1,
                'meta' => [
                    'title' => $title,
                    'description' => $description,
                    'image' => [
                        'url' => $image,
                    ],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => 0,
                'message' => 'Error processing the URL.',
            ], 500);
        }
    }

    /**
     * Helper function to extract meta tag content.
     */
    private function getMetaTagContent($doc, $property)
    {
        $metaTags = $doc->getElementsByTagName('meta');
        foreach ($metaTags as $meta) {
            if ($meta->getAttribute('property') === $property || $meta->getAttribute('name') === $property) {
                return $meta->getAttribute('content');
            }
        }
        return null;
    }

    public function addPost(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|json',
            'tags' => 'nullable|string',
            'topic' => 'required|exists:topics,id',
            'grade' => 'required|exists:grades,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Parse the tags
        $tags = explode(',', $request->input('tags'));

        // Create or find the tags and update the count
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            $tag = Tags::where('name', $tagName)->first();
            if ($tag) {
                // Increment the count if the tag already exists
                $tag->count += 1;
                $tag->save();
            } else {
                // Create a new tag with count set to 1
                $tag = Tags::create(['name' => $tagName, 'count' => 1]);
            }
            $tagIds[] = $tag->id;
        }

        // Create the post
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->input('post_title');
        $post->content = json_decode($request->input('post_content'), true);
        $post->like_data = [
            'like_count' => 0,
            'dislike_count' => 0,
            'like_users_id' => [],
            'dislike_users_id' => [],
        ];
        $post->tags_id = $tagIds;
        $post->topic_id = $request->input('topic');
        $post->grade_id = $request->input('grade');
        $post->save();

        $grade = Grades::find($request->input('grade'));
        $topic = Topics::find($request->input('topic'));
        $grade->count += 1;
        $grade->save();
        $topic->count += 1;
        $topic->save();

        return redirect()->route('post.view', ["username" => $user->username, "post_title" => $post->title]);
    }

    public function viewPost($username, $post_title)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return redirect()->route('post.view')->with('error', 'User not found');
        }

        $post = Post::where('user_id', $user->id)
            ->where('title', $post_title)
            ->with('grade', 'topic', 'user')
            ->first();

        if (!$post) {
            return redirect()->route('post.view')->with('error', 'Post not found');
        }

        $tags = $post->tags;

        return view('post.readPost', [
            'post' => $post,
            'author' => $post->user->username,
            'grade' => $post->grade,
            'topic' => $post->topic,
            'tags' => $tags,
        ]);
    }

    public function ratePost(Request $request)
    {
        $user = Auth::user();
        $post_id = $request->input('post_id');
        $rating = $request->input('rating');

        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // Initialize variables for cleaner logic
        $likeUsers = $post->like_data['like_users_id'] ?? [];
        $dislikeUsers = $post->like_data['dislike_users_id'] ?? [];
        $likeCount = $post->like_data['like_count'] ?? 0;
        $dislikeCount = $post->like_data['dislike_count'] ?? 0;

        if ($rating == 1) {
            if (in_array($user->id, $likeUsers)) {
                // Unlike
                $likeUsers = array_values(array_diff($likeUsers, [$user->id]));
                $likeCount--;
                $message = 'unliked';
            } else {
                // Remove dislike if it exists
                // Like
                $likeUsers[] = $user->id;
                $likeCount++;
                $message = 'liked';
                if (in_array($user->id, $dislikeUsers)) {
                    $dislikeUsers = array_values(array_diff($dislikeUsers, [$user->id]));
                    $dislikeCount--;
                    $message = 'to like';
                }
            }
        } elseif ($rating == -1) {
            if (in_array($user->id, $dislikeUsers)) {
                // Remove dislike
                $dislikeUsers = array_values(array_diff($dislikeUsers, [$user->id]));
                $dislikeCount--;
                $message = 'undisliked';
            } else {
                // Remove like if it exists
                // Dislike
                $dislikeUsers[] = $user->id;
                $dislikeCount++;
                $message = 'disliked';
                if (in_array($user->id, $likeUsers)) {
                    $likeUsers = array_values(array_diff($likeUsers, [$user->id]));
                    $likeCount--;
                    $message = 'to dislike';
                }
            }
        } else {
            return response()->json(['error' => 'Invalid rating value'], 400);
        }

        // Update like_data and save the post
        $post->like_data = [
            'like_count' => $likeCount,
            'dislike_count' => $dislikeCount,
            'like_users_id' => $likeUsers,
            'dislike_users_id' => $dislikeUsers,
        ];
        $post->save();

        return response()->json(['message' => $message]);
    }

    public function deletePost(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->id == $request->creator_id) {
            $post = Post::find($request->post_id);

            if ($post) {
                $post->delete();
                return response()->json(['message' => 'Post deleted successfully.'], 200);
            } else {
                return response()->json(['error' => 'Post not found.'], 404);
            }
        } else {
            return response()->json(['error' => 'Unauthorized action.'], 403);
        }
    }

    /* TODO
    - Add edit post functionality
    - Add delete post functionality
    - Add comments?
    */

    public function getDataByMonth(Request $request)
    {
        $year = $request->get('year', Carbon::now()->year); // Default tahun sekarang
        $month = $request->get('month', Carbon::now()->month); // Default bulan sekarang

        // Ambil semua post sesuai bulan dan tahun
        $posts = Post::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        // Ambil topic berdasarkan topic_id yang ada di posts
        $topicIds = $posts->pluck('topic_id')->unique(); // Ambil topic_id yang unik
        $topics = Topics::whereIn('_id', $topicIds)
            ->get()
            ->map(function ($topic) use ($posts) {
                $topic->post_count = $posts->where('topic_id', $topic->_id)->count(); // Hitung jumlah post per topic
                return $topic;
            });

        // Ambil grade berdasarkan grade_id yang ada di posts
        $gradeIds = $posts->pluck('grade_id')->unique(); // Ambil grade_id yang unik
        $grades = Grades::whereIn('_id', $gradeIds)
            ->get()
            ->map(function ($grade) use ($posts) {
                $grade->post_count = $posts->where('grade_id', $grade->_id)->count(); // Hitung jumlah post per grade
                return $grade;
            });

        // Hitung jumlah unique user berdasarkan user_id
        $uniqueUsersCount = $posts->pluck('user_id')->unique()->count();

        return view('admin.dashboard', [
            'year' => $year,
            'month' => $month,
            'post_count' => $posts->count(), // Jumlah post pada bulan & tahun tertentu
            'unique_users_count' => $uniqueUsersCount, // Jumlah user yang unik
            'topics' => $topics, // Data topic (dengan post_count)
            'grades' => $grades, // Data grade (dengan post_count)
            'topic_count' => $topics->count(), // Jumlah topic
        ]);
    }
}
