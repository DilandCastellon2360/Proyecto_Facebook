@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="new-container">
        <h1>Inicio</h1>

        @foreach($posts as $post)
            <div class="new-post">
                @if($post->user->profile_photo)
                    <div class="new-profile-photo">
                        <img src="{{ asset('storage/' . $post->user->profile_photo) }}" alt="Foto de Perfil del Usuario" class="new-profile-image">
                    </div>
                @endif

                <div class="new-post-content">
                    <p class="new-user-name"><strong><a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a></strong> <span class="new-post-actions">Realizó una publicación</span></p>
                    <p class="new-post-date">{{ $post->post_date }}</p>
                    <p class="new-post-text">{{ $post->content }}</p>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen de la publicación" class="new-post-image" style="max-width: 100%; height: auto;">
                    @endif

                    <!-- Botones de "Me gusta", "Comentar" y "Compartir" -->
                    <!-- Botones de "Me gusta", "Comentar" y "Compartir" -->
                    <div class="post-buttons">
                        <button class="btn-like">
                            <img src="{{ asset('img/like.png') }}" alt="Icono Me gusta">
                            Me gusta
                        </button>
                        <button class="btn-comment">
                            <img src="{{ asset('img/comentar.png') }}" alt="Icono Comentar">
                            Comentar
                        </button>
                        <button class="btn-share">
                            <img src="{{ asset('img/share.png') }}" alt="Icono Compartir">
                            Compartir
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
