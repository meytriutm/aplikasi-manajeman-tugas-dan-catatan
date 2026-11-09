<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profil Pengguna - NoteTask</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#f8f9ff",
                        "surface": "#f8f9ff",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#eff4ff",
                        "surface-container-high": "#dce9ff",
                        "primary": "#2a14b4",
                        "primary-container": "#4338ca",
                        "primary-fixed": "#e3dfff",
                        "on-primary": "#ffffff",
                        "on-surface": "#0b1c30",
                        "on-surface-variant": "#464554",
                        "outline": "#777586",
                        "secondary": "#006c4a",
                        "on-secondary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-error-container": "#93000a"
                    },
                    spacing: {
                        "margin": "1rem",
                        "space-xs": "0.25rem",
                        "space-sm": "0.5rem",
                        "space-md": "0.75rem",
                        "space-lg": "1.25rem"
                    },
                    fontFamily: {
                        "body-md": ["Inter", "sans-serif"],
                        "body-sm": ["Inter", "sans-serif"],
                        "label-sm": ["Inter", "sans-serif"],
                        "label-lg": ["Inter", "sans-serif"],
                        "headline-sm": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-md": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    fontSize: {
                        "body-md": ["14px", { lineHeight: "22px" }],
                        "body-sm": ["12px", { lineHeight: "18px" }],
                        "label-sm": ["11px", { lineHeight: "14px" }],
                        "label-lg": ["14px", { lineHeight: "20px" }],
                        "headline-sm": ["16px", { lineHeight: "24px" }],
                        "headline-md": ["20px", { lineHeight: "28px" }]
                    }
                }
            }
        };
    </script>

    <style>
        html,
        body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            overscroll-behavior-y: none;
            -webkit-tap-highlight-color: transparent;
        }

        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 0px);
        }

        .pt-safe {
            padding-top: env(safe-area-inset-top, 0px);
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">

    <!-- Header -->
    <header class="fixed top-0 inset-x-0 z-50 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] pt-safe">
        <div class="h-16 px-margin flex items-center justify-between w-full max-w-md mx-auto">

            <!-- Tombol kembali ke Dashboard -->
            <a href="/dashboard"
               id="back-link"
               aria-label="Kembali ke Dashboard"
               class="w-11 h-11 -ml-space-xs flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-high transition-colors">

                <span class="material-symbols-outlined text-[24px]">arrow_back</span>
            </a>

            <h1 class="font-headline-sm text-headline-sm text-on-surface text-center flex-1 truncate px-space-sm">
                Profil Saya
            </h1>

            <!-- Penyeimbang agar judul tetap di tengah -->
            <div class="w-11 h-11" aria-hidden="true"></div>

        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex flex-col relative w-full px-margin pt-[calc(5rem+env(safe-area-inset-top,0px))] pb-safe bg-surface flex-grow">

        <div class="flex flex-col w-full max-w-md mx-auto pb-10 space-y-5">

            <!-- Profile Header Card -->
            <section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex items-center gap-space-md">

                <div class="w-16 h-16 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[48px]" aria-hidden="true">
                        account_circle
                    </span>
                </div>

                <div class="flex-1 min-w-0">
                    <h2 id="profile-display-name"
                        class="font-headline-md text-headline-md text-on-surface tracking-tight font-semibold truncate">
                         &nbsp;
                    </h2>

                    <p id="profile-display-email"
                       class="font-body-md text-body-md text-on-surface-variant mt-0.5 break-all">
                         &nbsp;
                    </p>

                    <p id="profile-message" class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                         &nbsp;
                    </p>
                </div>

            </section>

            <!-- Menu -->
            <section class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden">

                <!-- Informasi Profil -->
                <a href="/profile/information"
                   class="flex items-center justify-between p-space-lg hover:bg-surface-container-low transition-colors group">

                    <div class="flex items-start gap-space-md min-w-0 pr-2">
                        <div class="w-10 h-10 rounded-lg bg-surface-container-low text-indigo-600 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                            <span class="material-symbols-outlined text-[26px]">account_circle</span>
                        </div>

                        <div class="min-w-0">
                            <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                                Informasi Profil
                            </h3>

                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                                Lihat dan ubah nama dan username.
                            </p>
                        </div>
                    </div>

                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-outline shrink-0">
                        <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                    </div>
                </a>

            </section>

            <!-- Tombol Logout (langsung keluar) -->
            <section class="pt-4 flex flex-col items-center justify-center space-y-2 text-center">

                <button type="button"
                        id="logout-btn"
                        onclick="logoutUser(this)"
                        class="w-full min-h-12 py-3 px-4 rounded-lg bg-error-container/40 hover:bg-error-container text-on-error-container font-label-lg text-label-lg flex items-center justify-center gap-2 transition-colors active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed">

                    <span class="material-symbols-outlined text-[18px]">logout</span>
                    Keluar dari Akun
                </button>

            </section>

        </div>
    </main>
    
    <script src="/js/notetask.js"></script>

    <script>
       
        // Admin kembali ke dashboard admin, user biasa ke dashboard personal
        function getHomeUrl() {
            try {
                const u = JSON.parse(localStorage.getItem('notetask_user') || 'null');
                return u && u.role === 'admin' ? '/admin/dashboard' : '/dashboard';
            } catch (e) {
                return '/dashboard';
            }
        }



        // Mengambil nama dan email pengguna yang sedang login
        async function loadProfileUser() {
            const token = localStorage.getItem('notetask_token');

            const displayName = document.getElementById('profile-display-name');
            const displayEmail = document.getElementById('profile-display-email');
            const message = document.getElementById('profile-message');

            if (!token) {
                window.location.href = '/auth/login';
                return;
            }

            try {
                const response = await fetch('/api/user', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) {
                    if (response.status === 401) {
                        localStorage.removeItem('notetask_token');
                        localStorage.removeItem('notetask_user');
                        window.location.href = '/auth/login';
                        return;
                    }

                    throw new Error('Gagal mengambil data pengguna.');
                }

                const user = await response.json(); 

                localStorage.setItem('notetask_user', JSON.stringify(user));

                if (displayName) {
                    displayName.textContent = user.name || 'Pengguna';
                }

                if (displayEmail) {
                    displayEmail.textContent = user.username ? '@' + user.username : '-';
                }

                if (message) {
                    message.textContent = user.role === 'admin' ? 'Administrator NoteTask' : 'Informasi akun NoteTask';
                }

            } catch (error) {
                console.error('Error mengambil profil:', error);

                if (message) {
                    message.textContent = 'Informasi akun gagal dimuat. Silakan refresh halaman.';
                }
            }
        }
        
        // Tampilkan data dari cache dulu (instan, tanpa kedipan)
        (function showCachedProfile() {
            try {
                const u = JSON.parse(localStorage.getItem('notetask_user') || 'null');
                if (!u) return;
                document.getElementById('profile-display-name').textContent = u.name || 'Pengguna';
                document.getElementById('profile-display-email').textContent = u.username ? '@' + u.username : '-';
                document.getElementById('profile-message').textContent =
                    u.role === 'admin' ? 'Administrator NoteTask' : 'Informasi akun NoteTask';
            } catch (e) {}
        })();


        document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('back-link').href = getHomeUrl();
        loadProfileUser();
});
    </script>

</body>
</html>