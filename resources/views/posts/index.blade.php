@extends('layouts.app')

@section('title', 'Listado de Publicaciones')

@section('content')
    <div class="container">
        <h1>Listado de Publicaciones</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Fecha de Publicación</th>
                    <th>Nombre de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen de la publicación" style="max-width: 150px;">
                            @else
                                No hay imagen
                            @endif
                        </td>
                        <td>{{ $post->post_date }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>

                                <!-- Enlace para editar -->
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Editar</a>

                                <!-- Enlace para ver publicacion -->
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Ver Publicacion</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
