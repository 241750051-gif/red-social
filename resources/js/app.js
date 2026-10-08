document.addEventListener('DOMContentLoaded', () => {
    // Modo Oscuro / Claro
    const themeToggleBtn = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';

    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        if (themeToggleBtn) themeToggleBtn.textContent = 'Modo Claro';
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            let theme = document.documentElement.getAttribute('data-theme');
            if (theme === 'dark') {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
                themeToggleBtn.textContent = 'Modo Oscuro';
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                themeToggleBtn.textContent = 'Modo Claro';
            }
        });
    }

    // Menu Desplegable Navbar
    const userMenuBtn = document.getElementById('user-menu-btn');
    const userDropdown = document.getElementById('user-dropdown');

    if (userMenuBtn && userDropdown) {
        userMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
        });

        document.addEventListener('click', (e) => {
            if (!userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
                userDropdown.classList.remove('show');
            }
        });
    }

    // Modal Aviso de Privacidad
    const openPrivacyBtn = document.getElementById('open-privacy');
    const closePrivacyBtn = document.getElementById('close-privacy');
    const privacyModal = document.getElementById('privacy-modal');

    if (openPrivacyBtn && privacyModal) {
        openPrivacyBtn.addEventListener('click', () => {
            privacyModal.classList.add('show');
        });
    }

    if (closePrivacyBtn && privacyModal) {
        closePrivacyBtn.addEventListener('click', () => {
            privacyModal.classList.remove('show');
        });
    }
});