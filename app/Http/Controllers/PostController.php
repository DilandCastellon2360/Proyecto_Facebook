<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        return view('posts.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_date' => 'nullable|date',
        ]);

        // Obtener el valor de post_date, si está presente, de lo contrario usar la fecha actual
        $post_date = $request->post_date ? $request->post_date : now();

        // Create post
        Post::create([
            'content' => $request->content,
            'post_date' => $post_date,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Publicación creada exitosamente');
    }

    /**
 * Display the specified resource.
 *
 * @param  \App\Models\Post  $post
 * @return \Illuminate\Http\Response
 */
public function show(Post $post)
{
    // Carga los comentarios relacionados con el post
    $post->load('user');

    return view('posts.show', compact('post'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
            'post_date' => 'nullable|date',
        ]);

        $post->update([
            'content' => $request->content,
            'post_date' => $request->post_date,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Publicación actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Publicación eliminada exitosamente');
    }
}
