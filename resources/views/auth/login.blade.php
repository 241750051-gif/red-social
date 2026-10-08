@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-banner">
            <h2>Inicio de Sesión</h2>
            <p>Accede a tu cuenta para compartir tus notas, reflexiones y consultar los pensamientos de la comunidad.</p>
        </div>
        <div class="auth-form-container">
            <h3>Ingresar</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-primary">Iniciar Sesión</button>
            </form>
            <p style="margin-top: 1rem; font-size: 0.85rem; text-align: center;">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection