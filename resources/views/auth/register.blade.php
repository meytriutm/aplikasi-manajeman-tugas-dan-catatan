<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Daftar - NoteTask</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0..1&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: {
        colors: {
          primary: "#2a14b4", "primary-container": "#4338ca", surface: "#f8f9ff",
          "surface-low": "#eff4ff", "on-surface": "#0b1c30", "on-variant": "#464554",
          outline: "#777586", error: "#ba1a1a", "error-container": "#ffdad6", secondary: "#006c4a"
        },
        fontFamily: { sans: ["Inter", "sans-serif"] }
      } }
    };
  </script>
  <style>
    body { font-family: Inter, sans-serif; background: #f8f9ff; }
    .material-symbols-outlined { font-family: 'Material Symbols Outlined'; font-size: 20px; line-height: 1; }
  </style>
</head>
<body class="text-on-surface antialiased min-h-screen flex flex-col">
  <main class="flex-1 flex flex-col w-full px-4 py-8">
    <div class="w-full max-w-md my-auto mx-auto">

      <div class="flex flex-col items-center text-center mb-6">
        <div class="w-14 h-14 rounded-xl bg-primary-container flex items-center justify-center shadow-md mb-3">
          <span class="material-symbols-outlined text-white" style="font-size:30px;font-variation-settings:'FILL' 1">edit_note</span>
        </div>
        <span class="text-xl font-bold tracking-tight">NoteTask</span>
        <h1 class="text-2xl font-semibold tracking-tight mt-4">Buat akun baru</h1>
        <p class="text-xs text-on-variant mt-1 max-w-[300px]">Daftar dengan username untuk mulai mengelola tugas dan catatan harianmu.</p>
      </div>

      <div class="bg-white rounded-xl p-5 shadow-sm">
        <div id="form-error" class="hidden mb-4 p-3 rounded-lg bg-error-container text-error text-xs font-medium" role="alert"></div>

        <form id="register-form" class="space-y-4" onsubmit="handleRegister(event)" novalidate>
          <div>
            <label for="name" class="block text-xs font-medium mb-1.5">Nama lengkap</label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-on-variant pointer-events-none">badge</span>
              <input id="name" type="text" autocomplete="name" placeholder="Nama lengkapmu" maxlength="255" required
                class="w-full h-12 bg-surface-low pl-10 pr-3 rounded-lg text-base placeholder:text-outline focus:bg-white focus:outline-none focus:shadow-[0_0_0_2px_#4338ca]">
            </div>
            <p id="err-name" class="hidden text-xs text-error mt-1"></p>
          </div>

          <div>
            <label for="username" class="block text-xs font-medium mb-1.5">Username</label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-on-variant pointer-events-none">alternate_email</span>
              <input id="username" type="text" autocomplete="username" placeholder="contoh: aleya_izma" maxlength="50" required
                class="w-full h-12 bg-surface-low pl-10 pr-3 rounded-lg text-base placeholder:text-outline focus:bg-white focus:outline-none focus:shadow-[0_0_0_2px_#4338ca]">
            </div>
            <p id="hint-username" class="text-[11px] text-outline mt-1">Huruf, angka, garis bawah (_), dan strip (-). Tanpa spasi.</p>
            <p id="err-username" class="hidden text-xs text-error mt-1"></p>
          </div>

          <div>
            <label for="password" class="block text-xs font-medium mb-1.5">Kata sandi</label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-on-variant pointer-events-none">lock</span>
              <input id="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter" required
                class="w-full h-12 bg-surface-low pl-10 pr-12 rounded-lg text-base placeholder:text-outline focus:bg-white focus:outline-none focus:shadow-[0_0_0_2px_#4338ca]">
              <button type="button" aria-label="Tampilkan atau sembunyikan kata sandi" onclick="togglePass('password', this)"
                class="absolute right-0.5 top-1/2 -translate-y-1/2 w-11 h-11 flex items-center justify-center rounded-md text-on-variant hover:text-primary">
                <span class="material-symbols-outlined">visibility</span>
              </button>
            </div>
            <p id="err-password" class="hidden text-xs text-error mt-1"></p>
          </div>

          <div>
            <label for="password_confirmation" class="block text-xs font-medium mb-1.5">Konfirmasi kata sandi</label>
            <div class="relative flex items-center">
              <span class="material-symbols-outlined absolute left-3 text-on-variant pointer-events-none">lock_reset</span>
              <input id="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi kata sandi" required
                class="w-full h-12 bg-surface-low pl-10 pr-12 rounded-lg text-base placeholder:text-outline focus:bg-white focus:outline-none focus:shadow-[0_0_0_2px_#4338ca]">
              <button type="button" aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi" onclick="togglePass('password_confirmation', this)"
                class="absolute right-0.5 top-1/2 -translate-y-1/2 w-11 h-11 flex items-center justify-center rounded-md text-on-variant hover:text-primary">
                <span class="material-symbols-outlined">visibility</span>
              </button>
            </div>
            <p id="err-password_confirmation" class="hidden text-xs text-error mt-1"></p>
          </div>

          <button id="submit-btn" type="submit"
            class="w-full h-12 bg-primary-container text-white rounded-lg text-sm font-semibold flex items-center justify-center gap-2 shadow-md hover:bg-primary active:scale-[0.98] transition-all disabled:opacity-70 disabled:cursor-not-allowed">
            Daftar sekarang
          </button>
        </form>
      </div>

      <p class="text-center text-sm text-on-variant mt-5">
        Sudah punya akun?
        <a href="/" class="font-bold text-primary hover:text-primary-container ml-1">Masuk</a>
      </p>
    </div>
  </main>

  <script>
    const fields = ['name', 'username', 'password', 'password_confirmation'];

    function togglePass(id, btn) {
      const input = document.getElementById(id);
      const icon = btn.querySelector('.material-symbols-outlined');
      const hidden = input.type === 'password';
      input.type = hidden ? 'text' : 'password';
      icon.textContent = hidden ? 'visibility_off' : 'visibility';
    }

    function clearErrors() {
      fields.forEach(f => {
        const el = document.getElementById('err-' + f);
        el.textContent = '';
        el.classList.add('hidden');
      });
      const box = document.getElementById('form-error');
      box.textContent = '';
      box.classList.add('hidden');
    }

    function setError(field, message) {
      const el = document.getElementById('err-' + field);
      if (!el) return;
      el.textContent = message;
      el.classList.remove('hidden');
    }

    // Pesan dari server (bahasa Inggris) diubah ke bahasa Indonesia
    function translate(message) {
      if (/already been taken/i.test(message)) return 'Username sudah dipakai. Coba username lain.';
      if (/confirmation does not match/i.test(message)) return 'Konfirmasi kata sandi tidak cocok.';
      if (/at least 8/i.test(message)) return 'Kata sandi minimal 8 karakter.';
      if (/letters, numbers, dashes/i.test(message)) return 'Username hanya boleh huruf, angka, garis bawah, dan strip.';
      if (/required/i.test(message)) return 'Kolom ini wajib diisi.';
      return message;
    }

    function validateLocal(v) {
      let ok = true;
      if (!v.name) { setError('name', 'Nama lengkap wajib diisi.'); ok = false; }
      if (!v.username) { setError('username', 'Username wajib diisi.'); ok = false; }
      else if (!/^[A-Za-z0-9_-]+$/.test(v.username)) { setError('username', 'Username hanya boleh huruf, angka, garis bawah, dan strip.'); ok = false; }
      if (v.password.length < 8) { setError('password', 'Kata sandi minimal 8 karakter.'); ok = false; }
      if (v.password !== v.password_confirmation) { setError('password_confirmation', 'Konfirmasi kata sandi tidak cocok.'); ok = false; }
      return ok;
    }

    async function handleRegister(event) {
      event.preventDefault();
      clearErrors();

      const values = {
        name: document.getElementById('name').value.trim(),
        username: document.getElementById('username').value.trim(),
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value
      };

      if (!validateLocal(values)) return;

      const btn = document.getElementById('submit-btn');
      const label = btn.innerHTML;
      btn.disabled = true;
      btn.textContent = 'Mendaftarkan...';

      try {
        const res = await fetch('/api/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify(values)
        });
        const data = await res.json().catch(() => ({}));

        if (!res.ok) {
          if (data.errors) {
            Object.entries(data.errors).forEach(([field, msgs]) => setError(field, translate(msgs[0])));
          } else {
            const box = document.getElementById('form-error');
            box.textContent = data.message || 'Pendaftaran gagal. Coba lagi.';
            box.classList.remove('hidden');
          }
          return;
        }

         // Pendaftaran berhasil: arahkan ke halaman login (tidak langsung masuk)
        const box = document.getElementById('form-error');
        box.className = 'mb-4 p-3 rounded-lg bg-emerald-50 text-secondary text-xs font-medium';
        box.textContent = 'Pendaftaran berhasil! Mengalihkan ke halaman login...';
        setTimeout(() => { window.location.href = '/'; }, 1500);
        return;
      } catch (e) {
        const box = document.getElementById('form-error');
        box.textContent = 'Tidak dapat terhubung ke server. Periksa koneksi lalu coba lagi.';
        box.classList.remove('hidden');
      } finally {
        btn.disabled = false;
        btn.innerHTML = label;
      }
    }
  </script>
</body>
</html>