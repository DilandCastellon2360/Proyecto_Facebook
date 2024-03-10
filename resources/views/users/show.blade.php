@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
    <div class="container">
        <h1>Detalles del Usuario</h1>

        <div class="profile-info">
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto de Perfil del Usuario">
            @else
                <p>No hay foto de perfil disponible</p>
            @endif

            <div class="profile-details">
                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
                <p><strong>Ciudad:</strong> {{ $user->city }}</p>
                <p><strong>País:</strong> {{ $user->country }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $user->birth_date }}</p>
            </div>
        </div>

        <div class="btn-group">
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Editar</a>

            <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.');">Eliminar</button>
            </form>
        </div>

        <div class="create-post-btn">
            <a href="{{ route('posts.create', ['user_id' => $user->id]) }}" class="btn btn-success custom-btn">Crear Publicación</a>
        </div>


    </div>
@endsection
