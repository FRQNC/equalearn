<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Post;
use Route;

class UserController extends Controller
{

    public function indexPage(){
        $popularPosts = $this->getPopularPost();
        return view('landing', ["posts" => $popularPosts]);
    }

    public function getPopularPost()
    {
        // Fetch top 10 posts sorted by like count in descending order
        $popularPosts = Post::with(['user', 'grade', 'topic'])
            ->orderBy('like_data->like_count', 'desc')
            ->take(10)
            ->get();
        return $popularPosts;
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:users,username|max:64',
            'fullname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);


        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);

        $data['username'] = strtolower($data['username']);
        $data['photo'] = 'default_user.jpg';
        $data['type'] = null;
        $data['institution'] = null;
        $data['bio'] = null;
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('user.view', ['username' => $user->username]);
    }

    // UPDATE a user by ID
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // $data = $request->validate([
        //     'name' => 'sometimes|string|max:255',
        //     'email' => 'sometimes|email|unique:users,email,' . $id,
        //     'address' => 'array',
        //     'phone' => 'sometimes|string|max:15',
        //     'password' => 'sometimes|string|min:8'
        // ]);

        // // Hash the password if it's being updated
        // if (isset($data['password'])) {
        //     $data['password'] = Hash::make($data['password']);
        // }

        // $user->update($data);

        // return response()->json($user);
    }

    // DELETE a user by ID
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }


    public function loginView(){
        return view('auth.login', ['title' => "Login"]);
    }

    // LOGIN a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info("Attempting login with credentials:", $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $username = Auth::user()->username;
            return redirect()->route('user.view', ["username" => $username]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function registerView(){
        return view('auth.register', ['title' => "Register"]);
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function viewUser($username){
        $user = User::where('username', $username)->first();
        $post = Post::where('user_id', $user->id)->get();
        if(!$user){
            return redirect('/');
        }

        return view('user.profile', ['user' => $user, 'posts' => $post]);
    }
}
