@extends('layouts.app')

@section('title', 'Detalles del Post')

@section('content')
    <div class="container">
        <h1>Detalles de la Publicación</h1>

        <div class="post-info">
            <!-- Foto de perfil del usuario -->
            @if($post->user->profile_photo)
                <div class="profile-photo">
                    <img src="{{ asset('storage/' . $post->user->profile_photo) }}" alt="Foto de Perfil del Usuario">
                </div>
            @endif

            <div class="post-content">
                <div class="post-box">
                    <!-- Enlace al perfil del usuario -->
                    <p class="user-name"><strong><a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a></strong></p>
                    <p class="post-date">{{ $post->post_date }}</p>
                    <div class="post-text">{{ $post->content }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
