<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Validación para la imagen
    ]);

    // Obtener el valor de post_date, si está presente, de lo contrario usar la fecha actual
    $post_date = $request->post_date ? $request->post_date : now();

    $post = new Post([
        'content' => $request->content,
        'post_date' => $post_date,
        'user_id' => $request->user_id,
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/posts', $imageName);
        $post->image = 'posts/' . $imageName;
    }

    $post->save();

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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validaciones para la imagen
    ]);

    // Actualizar el contenido y la fecha de la publicación
    $post->content = $request->content;
    $post->post_date = $request->post_date;

    // Manejar la imagen si se ha subido una nueva
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($post->image) {
            Storage::delete($post->image);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('image')->store('public/images');
        $post->image = str_replace('public/', '', $imagePath);
    }

    $post->save();

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
