<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport">
  <meta content="mobile_stack" name="shell-type">
  <title>Informasi Profil - NoteTask</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "inverse-on-surface": "#eaf1ff", "on-primary-fixed-variant": "#372abf", "background": "#f8f9ff", "surface-container-high": "#dce9ff", "surface": "#f8f9ff", "surface-tint": "#5148d7", "secondary-fixed": "#85f8c4", "secondary": "#006c4a", "surface-variant": "#d3e4fe", "primary": "#2a14b4", "outline-variant": "#c7c4d7", "outline": "#777586", "on-background": "#0b1c30", "on-tertiary": "#ffffff", "on-error-container": "#93000a", "on-tertiary-fixed-variant": "#6e3900", "secondary-container": "#82f5c1", "error-container": "#ffdad6", "on-tertiary-container": "#ffb477", "on-secondary-fixed-variant": "#005137", "inverse-primary": "#c3c0ff", "secondary-fixed-dim": "#68dba9", "on-secondary": "#ffffff", "tertiary-fixed": "#ffdcc3", "tertiary-fixed-dim": "#ffb77d", "tertiary-container": "#7d4200", "primary-fixed-dim": "#c3c0ff", "surface-container-low": "#eff4ff", "on-primary-container": "#c1beff", "surface-container-highest": "#d3e4fe", "on-primary": "#ffffff", "on-surface": "#0b1c30", "surface-container": "#e5eeff", "primary-container": "#4338ca", "on-secondary-container": "#00714e", "on-primary-fixed": "#100069", "primary-fixed": "#e3dfff", "error": "#ba1a1a", "inverse-surface": "#213145", "surface-container-lowest": "#ffffff", "surface-dim": "#cbdbf5", "on-error": "#ffffff", "tertiary": "#5c2f00", "on-tertiary-fixed": "#2f1500", "on-surface-variant": "#464554", "surface-bright": "#f8f9ff", "on-secondary-fixed": "#002114" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "margin-lg": "3rem", "space-xs": "0.25rem", "gutter": "1rem", "space-xl": "2rem", "gutter-md": "1.5rem", "gutter-lg": "2rem", "margin-md": "2rem", "space-sm": "0.5rem", "space-md": "0.75rem", "space-lg": "1.25rem", "margin": "1rem" }, "fontFamily": { "label-md": ["Inter"], "display-lg": ["Plus Jakarta Sans"], "label-sm": ["Inter"], "body-md": ["Inter"], "headline-xl-mobile": ["Plus Jakarta Sans"], "headline-xl": ["Plus Jakarta Sans"], "label-lg": ["Inter"], "display-lg-mobile": ["Plus Jakarta Sans"], "body-sm": ["Inter"], "headline-sm": ["Plus Jakarta Sans"], "body-lg": ["Inter"], "headline-md": ["Plus Jakarta Sans"] }, "fontSize": { "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.015em", "fontWeight": "500"}], "display-lg": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "label-sm": ["11px", {"lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600"}], "body-md": ["14px", {"lineHeight": "22px", "letterSpacing": "0em", "fontWeight": "400"}], "headline-xl-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "headline-xl": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}], "display-lg-mobile": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "body-sm": ["12px", {"lineHeight": "18px", "letterSpacing": "0.005em", "fontWeight": "400"}], "headline-sm": ["16px", {"lineHeight": "24px", "letterSpacing": "-0.005em", "fontWeight": "600"}], "body-lg": ["16px", {"lineHeight": "26px", "letterSpacing": "-0.005em", "fontWeight": "400"}], "headline-md": ["20px", {"lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600"}] } } } }
  </script>
  <style>
    @layer base{html,body{width:100%;min-height:100%;margin:0;padding:0;}body{overscroll-behavior-y:none;-webkit-tap-highlight-color:transparent;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}}::-webkit-scrollbar{display:none;}
  </style>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased flex flex-col min-h-screen">

  <!-- Header -->
  <header class="fixed top-0 inset-x-0 z-50 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] pt-safe">
    <div class="h-16 px-margin flex items-center justify-between w-full max-w-md mx-auto">
      <a aria-label="Kembali ke Profil Pengguna" href="/profile" class="w-11 h-11 -ml-space-xs flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-high transition-colors">
        <span class="material-symbols-outlined text-[24px]">arrow_back</span>
      </a>
    </div>
  </header>

  <main class="flex flex-col relative w-full px-margin pt-[calc(4rem+env(safe-area-inset-top,0px))] pb-safe bg-surface flex-grow">
    <div class="flex flex-col w-full max-w-md mx-auto pt-space-md pb-10">

      <!-- Notifikasi -->
      <div class="fixed top-[calc(5rem+env(safe-area-inset-top,0px))] left-1/2 -translate-x-1/2 w-max max-w-[calc(100%-2rem)] z-50 transform -translate-y-8 opacity-0 pointer-events-none transition-all duration-300 ease-out bg-[#0f1b33] text-white px-space-lg py-space-md rounded-2xl shadow-lg flex items-center gap-space-md" id="toastSuccess" role="status" aria-live="polite">
        <span id="toastIcon" class="material-symbols-outlined text-[24px] flex-shrink-0 text-emerald-300">check_circle</span>
        <span class="font-label-lg text-label-lg font-semibold" id="toastMessage">Profil berhasil diperbarui.</span>
      </div>

      <!-- Kartu profil -->
      <div class="w-full bg-surface-container-lowest rounded-xl shadow-sm p-space-lg mb-space-md relative overflow-hidden">
        <div class="flex items-center gap-space-md mb-space-lg">
          <div class="relative w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center flex-shrink-0 text-primary">
            <span id="profileInitials" class="font-headline-md text-headline-md font-bold tracking-tight">&nbsp;</span>
            <div class="absolute -bottom-0.5 -right-0.5 w-4 h-4 rounded-full bg-secondary ring-2 ring-surface-container-lowest flex items-center justify-center">
              <span class="material-symbols-outlined text-[10px] text-on-secondary" style="font-variation-settings: 'FILL' 1;">check</span>
            </div>
          </div>
          <div class="flex flex-col min-w-0">
            <h1 class="font-headline-md text-headline-md text-on-surface truncate">Informasi Profil</h1>
          </div>
        </div>

        <form class="flex flex-col gap-space-md" id="profileForm" onsubmit="event.preventDefault(); saveChanges();">

          <!-- Nama -->
          <div class="flex flex-col gap-space-xs">
            <label class="font-label-md text-label-md text-on-surface-variant flex items-center justify-between gap-space-sm" for="fullNameInput">
              <span>Nama Lengkap</span>
              <span class="hidden font-label-sm text-label-sm text-primary" id="badgeNameEdit">Dapat diedit</span>
            </label>
            <div class="relative flex items-center">
              <input autocomplete="name" class="w-full h-12 pl-space-md pr-11 rounded-lg text-base text-on-surface transition-all duration-200 outline-none bg-surface-container-low" id="fullNameInput" type="text" value="" readonly>
              <span aria-hidden="true" class="material-symbols-outlined absolute right-space-md text-outline text-[20px] pointer-events-none">person</span>
            </div>
          </div>

          <!-- Username -->
          <div class="flex flex-col gap-space-xs">
            <label class="font-label-md text-label-md text-on-surface-variant flex items-center justify-between gap-space-sm" for="usernameInput">
              <span>Username</span>
              <span class="font-label-sm text-label-sm text-outline">Tidak dapat diubah</span>
            </label>
            <div class="relative flex items-center">
              <input autocomplete="username" class="w-full h-12 pl-space-md pr-11 rounded-lg text-base text-on-surface-variant bg-surface-container-low outline-none cursor-default" id="usernameInput" type="text" value="" readonly>
              <span aria-hidden="true" class="material-symbols-outlined absolute right-space-md text-outline text-[20px] pointer-events-none">alternate_email</span>
            </div>
          </div>

          <!-- Tampilan kata sandi -->
          <div class="flex flex-col gap-space-xs" id="viewPasswordSection">
            <div class="relative flex items-center">
              <input aria-label="Kata sandi (disembunyikan)" class="w-full h-12 pl-space-md pr-11 rounded-lg text-base tracking-widest text-on-surface-variant bg-surface-container-low outline-none cursor-default select-none" readonly tabindex="-1" type="text" value="••••••••••••">
              <span aria-hidden="true" class="material-symbols-outlined absolute right-space-md text-outline text-[20px] pointer-events-none">lock</span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Password ditampilkan sebagai simbol, bukan password asli.</p>
          </div>

          <!-- Ubah kata sandi -->
          <div class="hidden flex flex-col gap-space-md pt-space-xs" id="editPasswordFields">
            <div class="p-space-md rounded-lg bg-surface-container-low flex flex-col gap-space-md">
              <div class="flex flex-wrap items-center justify-between gap-x-space-sm gap-y-space-xs">
                <span class="font-label-md text-label-md text-on-surface flex items-center gap-1.5">
                  <span aria-hidden="true" class="material-symbols-outlined text-[18px] text-primary">key</span>
                  Perbarui Kata Sandi (Opsional)
                </span>
                <span class="font-label-sm text-label-sm text-on-surface-variant">Kosongkan jika tetap</span>
              </div>

              <div class="flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant" for="newPassInput">Kata Sandi Baru</label>
                <div class="relative flex items-center">
                  <input autocomplete="new-password" class="w-full h-12 pl-space-md pr-12 rounded-lg text-base text-on-surface bg-surface-container-lowest outline-none focus:ring-2 focus:ring-primary-container" id="newPassInput" placeholder="Minimal 8 karakter" type="password">
                  <button aria-label="Tampilkan atau sembunyikan kata sandi baru" class="absolute right-0.5 top-1/2 -translate-y-1/2 w-11 h-11 flex items-center justify-center rounded-md text-outline hover:text-on-surface" onclick="togglePassVisibility('newPassInput', this)" type="button">
                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                  </button>
                </div>
              </div>

              <div class="flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant" for="confirmPassInput">Konfirmasi Kata Sandi</label>
                <div class="relative flex items-center">
                  <input autocomplete="new-password" class="w-full h-12 pl-space-md pr-12 rounded-lg text-base text-on-surface bg-surface-container-lowest outline-none focus:ring-2 focus:ring-primary-container" id="confirmPassInput" placeholder="Ulangi kata sandi baru" type="password">
                  <button aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi" class="absolute right-0.5 top-1/2 -translate-y-1/2 w-11 h-11 flex items-center justify-center rounded-md text-outline hover:text-on-surface" onclick="togglePassVisibility('confirmPassInput', this)" type="button">
                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Tombol aksi -->
          <div class="pt-space-sm mt-space-xs">
            <div class="w-full" id="defaultActionWrap">
              <button class="w-full h-12 rounded-lg bg-surface-container text-on-surface font-label-lg text-label-lg flex items-center justify-center gap-space-sm hover:bg-surface-container-high active:scale-[0.99] transition-all duration-150 shadow-sm" onclick="enableEditMode()" type="button">
                <span aria-hidden="true" class="material-symbols-outlined text-[18px]">edit</span>
                <span>Edit Profil</span>
              </button>
            </div>
            <div class="hidden flex flex-col gap-space-sm w-full" id="editActionWrap">
              <button class="w-full h-12 rounded-lg bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center justify-center gap-space-sm hover:opacity-95 active:scale-[0.98] transition-all duration-150 shadow-md" type="submit">
                <span aria-hidden="true" class="material-symbols-outlined text-[20px]">check</span>
                <span>Simpan Perubahan</span>
              </button>
              <button class="w-full h-11 rounded-lg bg-transparent text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center justify-center transition-colors" onclick="cancelEditMode()" type="button">
                Batal
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>

    <script>
            
        let initialValues = {
        name: ''
      };

      // Mengubah nama menjadi inisial (maks. 2 huruf)
      function initialsOf(name) {
        return (name || '').trim().split(/\s+/).slice(0, 2)
          .map(part => part.charAt(0).toUpperCase()).join('') || 'U';
      }

      // Mengisi tampilan dari data pengguna (dipakai untuk cache maupun data terbaru)
      function applyUser(user) {
        initialValues.name = user.name || '';
        document.getElementById('fullNameInput').value = initialValues.name;
        document.getElementById('usernameInput').value = user.username ? '@' + user.username : '';
        document.getElementById('profileInitials').textContent = initialsOf(initialValues.name);
      }

      // Tampilkan data dari cache dulu (instan, tanpa kedipan)
      (function showCachedProfile() {
        try {
          const cached = JSON.parse(localStorage.getItem('notetask_user') || 'null');
          if (cached) applyUser(cached);
        } catch (e) {}
      })();

      // Segarkan data dari server
      async function loadProfile() {
        const token = localStorage.getItem('notetask_token');

        if (!token) {
          window.location.href = '/auth/login';
          return;
        }

        try {
          const response = await fetch('/api/user', {
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
            throw new Error('Gagal mengambil data profil.');
          }

          const user = await response.json();
          applyUser(user);
          localStorage.setItem('notetask_user', JSON.stringify(user));   // simpan untuk kunjungan berikutnya
        } catch (error) {
          console.error(error);   // data cache tetap tampil
        }
      }

      loadProfile();

      function enableEditMode() {
        const nameInput = document.getElementById('fullNameInput');

        nameInput.readOnly = false;
        nameInput.classList.remove('bg-surface-container-low');
        nameInput.classList.add('bg-surface-container-lowest', 'ring-1', 'ring-outline-variant');

        document.getElementById('badgeNameEdit').classList.remove('hidden');
        document.getElementById('editPasswordFields').classList.remove('hidden');
        document.getElementById('defaultActionWrap').classList.add('hidden');
        document.getElementById('editActionWrap').classList.remove('hidden');

        nameInput.focus();
      }

      function cancelEditMode() {
        const nameInput = document.getElementById('fullNameInput');

        nameInput.value = initialValues.name;
        nameInput.readOnly = true;
        nameInput.classList.add('bg-surface-container-low');
        nameInput.classList.remove('bg-surface-container-lowest', 'ring-1', 'ring-outline-variant');

        document.getElementById('newPassInput').value = '';
        document.getElementById('confirmPassInput').value = '';

        document.getElementById('badgeNameEdit').classList.add('hidden');
        document.getElementById('editPasswordFields').classList.add('hidden');
        document.getElementById('editActionWrap').classList.add('hidden');
        document.getElementById('defaultActionWrap').classList.remove('hidden');
      }

      function openPasswordDirectEdit() {
        enableEditMode();
        const newPassField = document.getElementById('newPassInput');
        if (newPassField) {
          newPassField.scrollIntoView({ behavior: 'smooth', block: 'center' });
          newPassField.focus();
        }
      }

      function togglePassVisibility(inputId, triggerBtn) {
        const field = document.getElementById(inputId);
        const icon = triggerBtn.querySelector('.material-symbols-outlined');
        if (field.type === 'password') {
          field.type = 'text';
          icon.textContent = 'visibility_off';
        } else {
          field.type = 'password';
          icon.textContent = 'visibility';
        }
      }

            
      async function saveChanges() {
        const token = localStorage.getItem('notetask_token');
        const name = document.getElementById('fullNameInput').value.trim();
        const password = document.getElementById('newPassInput').value;
        const confirmation = document.getElementById('confirmPassInput').value;

        if (!name) {
          showToast('Nama lengkap wajib diisi.', true);
          return;
        }
        if (password && password.length < 8) {
          showToast('Kata sandi baru minimal 8 karakter.', true);
          return;
        }
        if (password !== confirmation) {
          showToast('Konfirmasi kata sandi tidak cocok.', true);
          return;
        }
        // Tidak ada yang diubah: tidak perlu kirim ke server
        if (name === initialValues.name && !password) {
          cancelEditMode();
          showToast('Tidak ada perubahan yang disimpan.', 'info');
          return;
        }

        const payload = { name };
        if (password) {
          payload.password = password;
          payload.password_confirmation = confirmation;
        }

        try {
          const response = await fetch('/api/profile', {
            method: 'PATCH',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(payload)
          });
          const data = await response.json().catch(() => ({}));

          if (!response.ok) {
            const firstError = data.errors ? Object.values(data.errors)[0][0] : data.message;
            throw new Error(firstError || 'Gagal menyimpan profil.');
          }

          if (data.changed === false) {
            cancelEditMode();
            showToast(data.message, 'info');
            return;
          }

          // Perbarui data di tampilan dan di penyimpanan browser
          initialValues.name = data.user.name;
          localStorage.setItem('notetask_user', JSON.stringify(data.user));
          document.getElementById('profileInitials').textContent = data.user.name
            .trim().split(/\s+/).slice(0, 2).map(p => p.charAt(0).toUpperCase()).join('') || 'U';

          cancelEditMode();
          showToast('Profil berhasil diperbarui.');
        } catch (error) {
          showToast(error.message, true);
        }
      }

      let toastTimeout;


      function showToast(message = 'Profil berhasil diperbarui.', type = 'success') {
        const isError = type === true || type === 'error';
        const isInfo = type === 'info';
        const toast = document.getElementById('toastSuccess');
        const icon = document.getElementById('toastIcon');

        document.getElementById('toastMessage').textContent = message;
        icon.textContent = isError ? 'error' : (isInfo ? 'info' : 'check_circle');
        icon.classList.toggle('text-red-400', isError);
        icon.classList.toggle('text-emerald-300', !isError);

        clearTimeout(toastTimeout);
        toast.classList.remove('-translate-y-8', 'opacity-0', 'pointer-events-none');
        toast.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');

        toastTimeout = setTimeout(() => {
          hideToast();
        }, 3500);
      }

      function hideToast() {
        const toast = document.getElementById('toastSuccess');
        toast.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
        toast.classList.add('-translate-y-8', 'opacity-0', 'pointer-events-none');
      }
    </script>
  </main>

</body>
</html>