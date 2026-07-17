<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->get();
        return view('index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'published' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('post.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post_detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'published' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'published' => $request->published,
        ]);

        return redirect()->route('post.index')->with('success', 'Post berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post berhasil dihapus!');
    }
}
