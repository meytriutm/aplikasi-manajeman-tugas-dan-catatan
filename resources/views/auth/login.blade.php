
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport">
  <meta content="mobile_stack" name="shell-type">
  <title>Masuk - NoteTask</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
  <style>
    @layer base {
      html, body { width: 100%; margin: 0; padding: 0; }
      body { overscroll-behavior: none; }
      .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
      .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
    }
    ::-webkit-scrollbar { display: none; }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "surface-container-highest": "#d3e4fe",
            "on-tertiary-container": "#ffb477",
            "primary-fixed-dim": "#c3c0ff",
            "on-error-container": "#93000a",
            "surface-container-high": "#dce9ff",
            "on-secondary-fixed-variant": "#005137",
            "on-primary-fixed-variant": "#372abf",
            "on-surface": "#0b1c30",
            "primary-fixed": "#e3dfff",
            "inverse-on-surface": "#eaf1ff",
            "surface-container": "#e5eeff",
            "primary": "#2a14b4",
            "outline": "#777586",
            "on-error": "#ffffff",
            "on-tertiary": "#ffffff",
            "error-container": "#ffdad6",
            "tertiary-fixed": "#ffdcc3",
            "on-tertiary-fixed-variant": "#6e3900",
            "surface-tint": "#5148d7",
            "surface-container-low": "#eff4ff",
            "inverse-surface": "#213145",
            "secondary-fixed-dim": "#68dba9",
            "on-surface-variant": "#464554",
            "surface-variant": "#d3e4fe",
            "surface-container-lowest": "#ffffff",
            "on-primary-container": "#c1beff",
            "on-primary": "#ffffff",
            "secondary-fixed": "#85f8c4",
            "primary-container": "#4338ca",
            "background": "#f8f9ff",
            "on-secondary-container": "#00714e",
            "surface-bright": "#f8f9ff",
            "surface-dim": "#cbdbf5",
            "inverse-primary": "#c3c0ff",
            "on-background": "#0b1c30",
            "secondary-container": "#82f5c1",
            "tertiary": "#5c2f00",
            "on-secondary": "#ffffff",
            "tertiary-container": "#7d4200",
            "outline-variant": "#c7c4d7",
            "error": "#ba1a1a",
            "surface": "#f8f9ff",
            "on-secondary-fixed": "#002114",
            "on-primary-fixed": "#100069",
            "tertiary-fixed-dim": "#ffb77d",
            "on-tertiary-fixed": "#2f1500",
            "secondary": "#006c4a",
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          spacing: {
            "gutter-lg": "2rem",
            "space-xl": "2rem",
            "gutter": "1rem",
            "gutter-md": "1.5rem",
            "margin-lg": "3rem",
            "space-xs": "0.25rem",
            "space-lg": "1.25rem",
            "space-sm": "0.5rem",
            "margin-md": "2rem",
            "space-md": "0.75rem",
            "margin": "1rem"
          },
          fontFamily: {
            "display-lg-mobile": ["Plus Jakarta Sans"],
            "body-lg": ["Inter"],
            "headline-md": ["Plus Jakarta Sans"],
            "label-md": ["Inter"],
            "label-sm": ["Inter"],
            "headline-xl-mobile": ["Plus Jakarta Sans"],
            "headline-sm": ["Plus Jakarta Sans"],
            "display-lg": ["Plus Jakarta Sans"],
            "headline-xl": ["Plus Jakarta Sans"],
            "body-sm": ["Inter"],
            "label-lg": ["Inter"],
            "body-md": ["Inter"]
          },
          fontSize: {
            "display-lg-mobile": ["30px", { lineHeight: "38px", letterSpacing: "-0.02em", fontWeight: "700" }],
            "body-lg": ["16px", { lineHeight: "26px", letterSpacing: "-0.005em", fontWeight: "400" }],
            "headline-md": ["20px", { lineHeight: "28px", letterSpacing: "-0.01em", fontWeight: "600" }],
            "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.015em", fontWeight: "500" }],
            "label-sm": ["11px", { lineHeight: "14px", letterSpacing: "0.04em", fontWeight: "600" }],
            "headline-xl-mobile": ["24px", { lineHeight: "32px", letterSpacing: "-0.015em", fontWeight: "600" }],
            "headline-sm": ["16px", { lineHeight: "24px", letterSpacing: "-0.005em", fontWeight: "600" }],
            "display-lg": ["40px", { lineHeight: "48px", letterSpacing: "-0.02em", fontWeight: "700" }],
            "headline-xl": ["32px", { lineHeight: "40px", letterSpacing: "-0.015em", fontWeight: "600" }],
            "body-sm": ["12px", { lineHeight: "18px", letterSpacing: "0.005em", fontWeight: "400" }],
            "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
            "body-md": ["14px", { lineHeight: "22px", letterSpacing: "0em", fontWeight: "400" }]
          }
        }
      }
    };
  </script>
</head>

<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">
  <main class="flex-1 flex flex-col w-full px-margin pt-[calc(1.5rem+env(safe-area-inset-top,0px))] pb-[calc(2rem+env(safe-area-inset-bottom,0px))] bg-surface">
    <div class="flex flex-col w-full max-w-md my-auto mx-auto">

      <!-- Brand -->
      <div class="flex flex-col items-center text-center mb-6">
        <div class="relative w-14 h-14 rounded-xl bg-primary-container flex items-center justify-center shadow-md mb-3">
          <div class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-secondary flex items-center justify-center">
            <span class="material-symbols-outlined text-[11px] text-on-secondary" style="font-variation-settings: 'FILL' 1;">done</span>
          </div>
          <span class="material-symbols-outlined text-on-primary text-[30px]" style="font-variation-settings: 'FILL' 1;">edit_note</span>
        </div>
        <span class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight mb-1">NoteTask</span>
        <span class="inline-flex items-center gap-1 bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm px-2.5 py-1 rounded-full">
          <span class="w-1.5 h-1.5 rounded-full bg-secondary motion-safe:animate-pulse"></span>
          Task &amp; Daily Note Platform
        </span>
      </div>

      <!-- Judul -->
      <div class="mb-5 text-center px-space-sm">
        <h1 class="font-headline-xl-mobile text-headline-xl-mobile text-on-surface font-semibold tracking-tight">
          Selamat Datang <span aria-hidden="true">👋</span>
        </h1>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 max-w-[320px] mx-auto">
          Masuk ke akun Anda untuk mengelola tugas dan catatan harian secara terstruktur.
        </p>
      </div>

      <!-- Kartu login -->
      <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm mb-5">
        <form class="space-y-4" onsubmit="handleLoginSubmit(event)">
          <div>
            <label class="block font-label-md text-label-md text-on-surface font-medium mb-1.5" for="identifier-input">
              Username
            </label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">person</span>
              <input autocomplete="username" class="w-full h-12 bg-surface-container-low pl-10 pr-3 rounded-lg text-base text-on-surface placeholder:text-outline focus:bg-surface-container-lowest focus:outline-none focus:shadow-[0_0_0_2px_#4338ca] transition-all" id="identifier-input" placeholder="Masukkan username" required type="text">
            </div>
          </div>

          <div>
            <label class="block font-label-md text-label-md text-on-surface font-medium mb-1.5" for="password-input">
              Kata Sandi
            </label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">lock</span>
              <input autocomplete="current-password" class="w-full h-12 bg-surface-container-low pl-10 pr-12 rounded-lg text-base text-on-surface placeholder:text-outline focus:bg-surface-container-lowest focus:outline-none focus:shadow-[0_0_0_2px_#4338ca] transition-all" id="password-input" placeholder="••••••••" required type="password">
              <button aria-label="Tampilkan atau sembunyikan kata sandi" class="absolute right-0.5 top-1/2 -translate-y-1/2 w-11 h-11 flex items-center justify-center rounded-md text-on-surface-variant hover:text-primary transition-colors" onclick="togglePasswordVisibility()" type="button">
                <span class="material-symbols-outlined text-[20px]" id="password-toggle-icon">visibility</span>
              </button>
            </div>
          </div>

          <div class="flex items-center justify-between gap-space-sm">
            <label class="flex items-center gap-2 min-h-11 cursor-pointer select-none">
              <input class="w-4 h-4 rounded text-primary focus:ring-0 accent-primary-container cursor-pointer" id="remember-me" type="checkbox">
              <span class="font-label-md text-label-md text-on-surface-variant">Ingat saya</span>
            </label>
            <a class="inline-flex items-center min-h-11 font-label-md text-label-md text-primary hover:text-primary-container font-semibold transition-colors" href="javascript:void(0)" onclick="notifyReset()">
              Lupa kata sandi?
            </a>
          </div>

          <button class="w-full h-12 bg-primary-container text-on-primary rounded-lg font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-md hover:bg-primary active:scale-[0.98] transition-all disabled:opacity-70 disabled:cursor-not-allowed" id="submit-btn" type="submit">
            <span>Masuk ke NoteTask</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </button>
        </form>
      </div>

      <!-- Daftar -->
      <div class="text-center">
        <p class="font-body-md text-body-md text-on-surface-variant">
          Belum punya akun?
          <a class="inline-flex items-center min-h-11 font-label-lg text-label-lg text-primary hover:text-primary-container font-bold ml-1" href="javascript:void(0)" onclick="notifyRegister()">
            Daftar Sekarang
            <span class="material-symbols-outlined text-[16px] ml-0.5">north_east</span>
          </a>
        </p>
      </div>
    </div>
  </main>

  <!-- Toast -->
    <div aria-live="polite" class="fixed top-[calc(1rem+env(safe-area-inset-top,0px))] left-4 right-4 max-w-sm mx-auto bg-inverse-surface text-inverse-on-surface px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 transition-all duration-300 transform z-50 -translate-y-24 opacity-0 pointer-events-none" id="login-toast" role="status">
    <span class="material-symbols-outlined text-secondary-fixed text-[20px]" id="toast-icon">cloud_sync</span>
    <span class="font-body-sm text-body-sm flex-1" id="toast-message"></span>
  </div>

  <script>
    
    function togglePasswordVisibility() {
      const input = document.getElementById('password-input');
      const icon = document.getElementById('password-toggle-icon');

      if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = 'visibility_off';
      } else {
        input.type = 'password';
        icon.textContent = 'visibility';
      }
    }

    async function handleLoginSubmit(event) {
      event.preventDefault();

      const username = document.getElementById('identifier-input').value.trim();
      const password = document.getElementById('password-input').value;

      const btn = document.getElementById('submit-btn');
      const originalHTML = btn.innerHTML;

      btn.disabled = true;
      btn.innerHTML = `
        <span class="material-symbols-outlined text-[18px] motion-safe:animate-spin">progress_activity</span>
        <span>Memverifikasi...</span>
      `;

      let loginSuccess = false;

      try {
        const response = await fetch('/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            username: username,
            password: password
          })
        });

        const data = await response.json();

        if (!response.ok) {
          throw new Error(data.message || 'Username atau kata sandi salah.');
        }

        if (!data.token || !data.user) {
          throw new Error('Respons login dari server tidak lengkap.');
        }

        localStorage.setItem('notetask_token', data.token);
        localStorage.setItem('notetask_user', JSON.stringify(data.user));

        loginSuccess = true;
        showToast('Login berhasil! Mengalihkan halaman...', 'verified', 1500);

         // Hak akses ditentukan berdasarkan role dari server
        const target = data.user.role === 'admin' ? '/admin/dashboard' : '/dashboard';
        setTimeout(() => { window.location.href = target; }, 1000);

           } catch (error) {
        showToast(error.message || 'Tidak dapat terhubung ke server.', 'error', 4500);

      } finally {
        if (!loginSuccess) {
          btn.disabled = false;
          btn.innerHTML = originalHTML;
        }
      }
    }


// Memeriksa apakah pengguna masih memiliki sesi login aktif
async function checkLoginSession() {
    const token = localStorage.getItem('notetask_token');

    // Kalau belum ada token, biarkan pengguna di halaman login
    if (!token) {
        return;
    }

    try {
        // Memastikan token masih berlaku melalui API Sanctum
        const response = await fetch('/api/user', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        });

        if (!response.ok) {
            throw new Error('Sesi login sudah tidak berlaku.');
        }

        const user = await response.json();

        // Memperbarui data pengguna berdasarkan respons server
        localStorage.setItem('notetask_user', JSON.stringify(user));

        // Mengarahkan pengguna sesuai role dari server
        if (user.role === 'admin') {
            window.location.href = '/admin/dashboard';
        } else {
            window.location.href = '/dashboard';
        }

    } catch (error) {
        // Menghapus sesi lokal jika token tidak valid
        localStorage.removeItem('notetask_token');
        localStorage.removeItem('notetask_user');
    }
}

    // Memeriksa sesi saat halaman login dibuka
    checkLoginSession();



    function notifyReset() {
      showToast('Fitur pemulihan kata sandi belum tersedia.', 'info');
    }

    function notifyRegister() {
      window.location.href = '/register';
    }

    function showToast(message, iconName = 'check_circle', duration = 3000) {
      const toast = document.getElementById('login-toast');

      document.getElementById('toast-message').textContent = message;
      document.getElementById('toast-icon').textContent = iconName;

      toast.classList.remove('-translate-y-24', 'opacity-0', 'pointer-events-none');
      toast.classList.add('translate-y-0', 'opacity-100');

      clearTimeout(window.toastTimer);

      window.toastTimer = setTimeout(() => {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('-translate-y-24', 'opacity-0', 'pointer-events-none');
      }, duration);
    } 


        // Menampilkan notif setelah logout (penandanya dipasang oleh halaman sebelumnya)
    (function showFlashMessage() {
      const flash = sessionStorage.getItem('notetask_flash');
      if (!flash) return;

      sessionStorage.removeItem('notetask_flash');

      if (flash === 'logout') {
        showToast('Logout berhasil. Sampai jumpa!', 'check_circle', 2500);
      }
    })();

  </script>
</body>
</html>
