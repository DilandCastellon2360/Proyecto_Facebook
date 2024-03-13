@extends('layouts.app')

@section('title', 'Editar Post')

@section('content')
    <div class="container">
        <h1>Editar Publicación</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="post_date">Fecha de Publicación:</label>
                <input type="date" name="post_date" id="post_date" class="form-control" value="{{ $post->post_date }}">
            </div>

            <!-- Aquí puedes añadir más campos de acuerdo a tus necesidades -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
