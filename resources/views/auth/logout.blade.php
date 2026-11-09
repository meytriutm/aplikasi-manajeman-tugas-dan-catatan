<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport">
  <title>Halaman Logout - NoteTask</title>
  <!-- Google Font: Plus Jakarta Sans -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <!-- Ikon logo aplikasi -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block" rel="stylesheet">
  <!-- Tailwind CSS CDN with plugins -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <!-- Custom Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#eef2ff',
              100: '#e0e7ff',
              500: '#4f46e5',
              600: '#4338ca',
              700: '#3730a3',
            }
          }
        }
      }
    }
  </script>
  <style data-purpose="base-styling">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      -webkit-tap-highlight-color: transparent;
    }
  </style>
</head>
<body class="bg-[#f8f9ff] text-slate-800 antialiased min-h-screen flex flex-col items-center">
  <!-- Mobile Screen Container -->
  <div class="w-full max-w-md min-h-screen flex flex-col px-5 py-6">
    <div class="space-y-6">

      <!-- BEGIN: TopBar -->
      <header class="pt-1 pb-2" data-purpose="screen-header">
        <div class="relative flex items-center w-full h-11">
          <!-- Back Button -->
          <a href="/dashboard" aria-label="Kembali ke Dashboard" class="w-11 h-11 rounded-full flex items-center justify-center text-slate-700 hover:bg-slate-100 active:bg-slate-200 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </a>
          <!-- Screen Title -->
          <h1 class="absolute left-1/2 -translate-x-1/2 text-lg font-bold text-slate-800 tracking-tight">
            Logout
          </h1>
        </div>
      </header>
      <!-- END: TopBar -->

      <!-- BEGIN: BrandHeader -->
      <section class="flex flex-col items-center text-center space-y-3" data-purpose="app-branding">
        <!-- LOGO APLIKASI -->
        <div class="relative" aria-hidden="true">
          <div class="w-16 h-16 rounded-2xl bg-brand-600 flex items-center justify-center shadow-md shadow-brand-500/20">
            <span class="material-symbols-outlined text-white text-[34px]" style="font-variation-settings: 'FILL' 1;">edit_note</span>
          </div>
          <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-[#006c4a] flex items-center justify-center">
            <span class="material-symbols-outlined text-white text-[13px]" style="font-variation-settings: 'FILL' 1;">done</span>
          </span>
        </div>
        <span class="text-2xl font-bold tracking-tight text-slate-900">NoteTask</span>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100/90 text-xs font-medium text-slate-600">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
          Task &amp; Daily Note Platform
        </div>
      </section>
      <!-- END: BrandHeader -->

      <!-- BEGIN: ConfirmationCard -->
      <main class="bg-white rounded-3xl p-5 shadow-sm border border-slate-100 space-y-5" data-purpose="logout-form-card">

        <!-- Info pengguna -->
        <div class="flex items-center justify-between gap-3" data-purpose="user-preview">
          <div class="flex items-center gap-3 min-w-0">
            <!-- Avatar -->
            <div class="relative flex-shrink-0">
              <div id="logout-user-initials" class="w-12 h-12 rounded-full bg-indigo-50 border-2 border-indigo-100 text-brand-600 font-bold flex items-center justify-center text-sm shadow-inner">
                ?
              </div>
              <span class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
            </div>
            <!-- Nama dan username -->
            <div class="text-left min-w-0">
              <h3 id="logout-user-name" class="text-sm font-bold text-slate-900 leading-tight truncate">
                Memuat nama...
              </h3>
              <div class="flex items-center gap-1 mt-0.5 text-xs text-slate-400 min-w-0">
                <svg aria-hidden="true" class="w-3.5 h-3.5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span id="logout-user-email" class="truncate">Memuat username...</span>
              </div>
            </div>
          </div>

          <!-- Badge peran -->
          <span class="px-2.5 py-1 rounded-full bg-indigo-50 text-[11px] font-semibold text-brand-600 border border-brand-100 whitespace-nowrap flex-shrink-0">
            USER
          </span>
        </div>

        <div class="border-t border-slate-100"></div>

        <!-- Form logout (tombol di bawah info pengguna) -->
        <form class="w-full" data-purpose="logout-form" onsubmit="logoutUser(event)">
          <button id="logout-btn" class="w-full min-h-12 bg-rose-600 hover:bg-rose-700 active:bg-rose-800 text-white font-semibold py-3.5 px-4 rounded-xl shadow-md shadow-rose-600/20 flex items-center justify-center gap-2 text-sm transition-all disabled:opacity-70 disabled:cursor-not-allowed" type="submit">
            <svg aria-hidden="true" class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>Logout</span>
          </button>
        </form>

      </main>
      <!-- END: ConfirmationCard -->

    </div>
  </div>

<script>
    // Proses logout
    async function logoutUser(event) {
        event.preventDefault();

        const token = localStorage.getItem('notetask_token');
        const button = document.getElementById('logout-btn');

        if (button) button.disabled = true;

        try {
            if (token) {
                const response = await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                // 401 = token sudah tidak berlaku, tetap lanjut keluar
                if (!response.ok && response.status !== 401) {
                    throw new Error('Logout gagal. Coba kembali.');
                }
            }

            // Menghapus data login dari browser
            localStorage.removeItem('notetask_token');
            localStorage.removeItem('notetask_user');

            // Kembali ke halaman login
            window.location.href = '/auth/login';

        } catch (error) {
            console.error('Error logout:', error);
            alert(error.message || 'Terjadi kesalahan saat logout.');
            if (button) button.disabled = false;
        }
    }

    // Mengambil inisial dari nama (misal "Aleya Izma" menjadi "AI")
    function getInitials(name) {
        return String(name || '')
            .trim()
            .split(/\s+/)
            .slice(0, 2)
            .map(part => part.charAt(0).toUpperCase())
            .join('') || '?';
    }

    // Menampilkan data pengguna yang sedang login
    async function loadLogoutUser() {
        const token = localStorage.getItem('notetask_token');

        const nameElement = document.getElementById('logout-user-name');
        const emailElement = document.getElementById('logout-user-email');
        const initialsElement = document.getElementById('logout-user-initials');

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
                throw new Error('Gagal mengambil data pengguna.');
            }

            const user = await response.json();

            if (nameElement) nameElement.textContent = user.name;
            if (emailElement) emailElement.textContent = user.username ? '@' + user.username : '-';
            if (initialsElement) initialsElement.textContent = getInitials(user.name);

        } catch (error) {
            console.error('Error mengambil data pengguna:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', loadLogoutUser);
</script>
</body>
</html>