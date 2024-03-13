@extends('layouts.app')

@section('title', 'Crear Publicación')

@section('content')
    <div class="container">
        <h1>Crear Publicación</h1>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="post_date">Fecha de Publicación</label>
                <input type="date" class="form-control" id="post_date" name="post_date">
            </div>

            <input type="hidden" name="user_id" value="{{ $user_id }}">

            <button type="submit" class="btn btn-primary">Crear Publicación</button>
        </form>

    </div>
@endsection
