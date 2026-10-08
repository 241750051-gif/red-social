<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publica</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('posts.index') }}" class="brand-logo">Publica</a>
            
            <div class="nav-actions">
                <button id="theme-toggle" class="theme-toggle" type="button">Modo Oscuro</button>
                
                @auth
                    <div class="dropdown-container">
                        <button id="user-menu-btn" class="dropdown-trigger" type="button">
                            <span>{{ Auth::user()->name }}</span>
                            <small>▼</small>
                        </button>
                        <div id="user-dropdown" class="dropdown-menu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-link">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-link">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- 1. LÓGICA DE MODO OSCURO ---
            const themeToggleBtn = document.getElementById('theme-toggle');
            
            // Cargar preferencia guardada en localStorage
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-theme');
                if (themeToggleBtn) themeToggleBtn.innerText = 'Modo Claro';
            }

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    document.body.classList.toggle('dark-theme');
                    const isDark = document.body.classList.contains('dark-theme');
                    
                    themeToggleBtn.innerText = isDark ? 'Modo Claro' : 'Modo Oscuro';
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                });
            }

            // --- 2. LÓGICA DEL MENÚ DESPLEGABLE ---
            const userMenuBtn = document.getElementById('user-menu-btn');
            const userDropdown = document.getElementById('user-dropdown');

            if (userMenuBtn && userDropdown) {
                userMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    userDropdown.classList.toggle('active');
                });

                document.addEventListener('click', () => {
                    userDropdown.classList.remove('active');
                });
            }
        });
    </script>
</body>
</html>