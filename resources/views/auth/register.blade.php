@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-banner">
            <h2>Registro de Usuario</h2>
            <p>Únete a la plataforma para redactar notas, organizar ideas y formar parte del muro de textos.</p>
        </div>
        <div class="auth-form-container">
            <h3>Crear Cuenta</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
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
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn-primary">Registrarse</button>
            </form>
            <p style="margin-top: 1rem; font-size: 0.85rem; text-align: center;">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection