<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua postingan.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat postingan baru.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Menyimpan postingan baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail postingan.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Menampilkan form untuk mengedit postingan.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Mengupdate postingan di database.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Menghapus postingan dari database.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Postingan berhasil dihapus!');
    }
}
