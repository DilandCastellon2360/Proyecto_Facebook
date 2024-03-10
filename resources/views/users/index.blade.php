@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
    <div class="container">
        <h1>Listado de Usuarios y sus Publicaciones</h1>

        <!-- Agregar enlace para crear nuevo usuario -->
        <a href="{{ route('users.create') }}" class="btn btn-create-user mb-3">Crear Nuevo Usuario</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Cumpleaños</th>
                    <th>Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>
                            <ul>
                                @foreach($user->posts as $post)
                                    <li>{{ $post->content }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-view">Ver</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
