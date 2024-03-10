@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <div class="container">
        <h1>Crear Usuario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>

            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}">
            </div>

            <div class="form-group">
                <label for="birth_date">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
            </div>

            <div class="form-group">
                <label for="profile_photo">Foto de Perfil</label>
                <input type="file" name="profile_photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </form>
    </div>
@endsection
