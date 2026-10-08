<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
            'type' => ['nullable', 'in:nota,pensamiento,texto_general'],
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'type' => $validated['type'] ?? 'texto_general',
        ]);

        return redirect()->route('posts.index');
    }
}