<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
            </div>

            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
            </div>

            <div class="form-group">
                <label for="birth_date">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
            </div>

            <div class="form-group">
                <label for="profile_photo">Foto de Perfil:</label>
                <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto de Perfil Actual" class="profile-photo">
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
