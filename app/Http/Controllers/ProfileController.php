<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $articles = Article::where('user_id', $id)->get();

        return view('profile', compact('user', 'articles'));
    }
}
