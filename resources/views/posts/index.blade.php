@extends('layouts.app')

@section('content')
<div class="feed-container">
    <div class="create-post-card">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea name="content" placeholder="Escribe tu pensamiento, nota o texto aquí..." required></textarea>
            @error('content')
                <span class="error-text">{{ $message }}</span>
            @enderror
            <div class="post-actions-bar">
                <select name="type" class="post-type-select" required>
                    <option value="texto_general">Texto General</option>
                    <option value="pensamiento">Pensamiento</option>
                    <option value="nota">Nota</option>
                </select>
                <button type="submit" class="btn-primary" style="width: auto; padding: 0.5rem 1.25rem;">Publicar</button>
            </div>
        </form>
    </div>

    @foreach($posts as $post)
        <div class="post-card">
            <div class="post-header">
                <div class="author-info">
                    {{ $post->user->name }}
                </div>
                <div>
                    <span class="post-badge badge-{{ $post->type }}">
                        {{ str_replace('_', ' ', $post->type) }}
                    </span>
                </div>
            </div>
            <div class="post-content">
                {{ $post->content }}
            </div>
            <div class="post-meta" style="margin-top: 0.75rem;">
                Publicado el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }} hrs
            </div>
        </div>
    @endforeach
</div>
@endsection