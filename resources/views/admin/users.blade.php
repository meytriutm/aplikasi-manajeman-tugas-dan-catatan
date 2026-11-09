<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Manajemen Pengguna - NoteTask</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500..800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0..1&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: {
        colors: {
          primary: "#2a14b4", "primary-container": "#4338ca", "primary-fixed": "#e3dfff",
          surface: "#f8f9ff", "surface-low": "#eff4ff", "surface-high": "#dce9ff",
          "on-surface": "#0b1c30", "on-variant": "#464554", outline: "#777586",
          "outline-variant": "#c7c4d7", secondary: "#006c4a", error: "#ba1a1a", "error-container": "#ffdad6",
          /* tambahan supaya header & sidebar sama dengan halaman user */
          "on-primary": "#ffffff", "on-secondary": "#ffffff", "inverse-surface": "#213145",
          "surface-container": "#e5eeff", "surface-container-high": "#dce9ff",
          "surface-container-low": "#eff4ff", "surface-container-lowest": "#ffffff"
        },
        spacing: {
          "space-xs": "0.25rem", "space-sm": "0.5rem", "space-md": "0.75rem",
          "space-lg": "1.25rem", "margin": "1rem"
        },
        fontFamily: {
          sans: ["Inter", "sans-serif"],
          "headline-sm": ["Plus Jakarta Sans"], "label-lg": ["Inter"], "label-sm": ["Inter"]
        },
        fontSize: {
          "headline-sm": ["16px", { lineHeight: "24px", letterSpacing: "-0.005em", fontWeight: "600" }],
          "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
          "label-sm": ["11px", { lineHeight: "14px", letterSpacing: "0.04em", fontWeight: "600" }]
        }
      } }
    };
  </script>
  <style>
    body { font-family: Inter, sans-serif; background: #f8f9ff; }
    .material-symbols-outlined { font-family: 'Material Symbols Outlined'; font-size: 20px; line-height: 1; }
    .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
    .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
    .no-scrollbar::-webkit-scrollbar { display: none; }
  </style>
</head>
<body class="text-on-surface antialiased min-h-screen">

  <!-- ================= HEADER (logo & tulisan NoteTask sama dengan halaman user) ================= -->
  <header class="fixed top-0 inset-x-0 lg:left-72 z-40 bg-surface/90 backdrop-blur-xl pt-safe shadow-sm">
    <div class="h-16 px-4 md:px-6 lg:px-8 flex items-center justify-between">
      <div class="flex items-center gap-1 min-w-0">
        <!-- Tombol hamburger: hanya mobile/tablet -->
        <button aria-label="Buka menu" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg active:bg-surface-high" type="button" onclick="openDrawer()">
          <span class="material-symbols-outlined" style="font-size:24px">menu</span>
        </button>
        <div class="flex items-center gap-2 ml-1 lg:ml-0">
          <!-- Logo aplikasi -->
          <div aria-hidden="true" class="relative w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center shadow-sm flex-shrink-0">
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 rounded-full bg-secondary flex items-center justify-center">
              <span class="material-symbols-outlined text-white" style="font-size:9px;font-variation-settings:'FILL' 1;">done</span>
            </span>
            <span class="material-symbols-outlined text-white" style="font-size:18px;font-variation-settings:'FILL' 1;">edit_note</span>
          </div>
          <span class="font-headline-sm text-headline-sm text-primary tracking-tight">NoteTask</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Backdrop drawer -->
  <div id="drawer-backdrop" class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm hidden lg:hidden" onclick="closeDrawer()"></div>

  <!-- ================= SIDEBAR (sama dengan dashboard admin) ================= -->
  <aside id="side-drawer" class="fixed top-0 bottom-0 left-0 z-50 w-72 max-w-[85vw] bg-white flex flex-col pt-safe pb-safe -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:border-r lg:border-outline-variant/30 lg:shadow-none shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)]">

    <!-- Profil admin -->
    <div class="p-5 flex items-center justify-between bg-surface-low">
      <div class="flex items-center gap-3 min-w-0">
        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
          <span class="material-symbols-outlined" style="font-size:30px">account_circle</span>
        </div>
        <div class="flex flex-col min-w-0">
          <span id="me-name" class="font-headline-sm text-headline-sm text-on-surface truncate min-h-[24px]">&nbsp;</span>
          <!-- Script kecil: nama langsung muncul dari cache tanpa kedipan -->
          <script>
            (function () {
              try {
                var u = JSON.parse(localStorage.getItem('notetask_user') || 'null');
                if (u && u.name) document.getElementById('me-name').textContent = u.name;
              } catch (e) {}
            })();
          </script>
          <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider">Administrator</span>
        </div>
      </div>
      <button aria-label="Tutup menu" class="w-11 h-11 flex items-center justify-center rounded-lg text-on-variant lg:hidden" type="button" onclick="closeDrawer()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 py-5 space-y-4">
      <div class="space-y-1">
        <p class="px-3 font-label-sm text-label-sm text-outline uppercase tracking-wider">Menu Utama</p>

        <a href="/admin/dashboard" class="flex items-center gap-3 px-3 h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors">
          <span class="material-symbols-outlined text-secondary">insights</span>
          <span class="font-label-lg text-label-lg">Dashboard Statistik</span>
        </a>

        <!-- Halaman aktif -->
        <a aria-current="page" href="/admin/users" class="flex items-center gap-3 px-3 h-11 rounded-lg bg-surface-container text-primary transition-colors">
          <span class="material-symbols-outlined text-secondary">group</span>
          <span class="font-label-lg text-label-lg">Data Pengguna</span>
        </a>
      </div>

      <div class="pt-2">
        <p class="px-3 mb-2 font-label-sm text-label-sm text-outline uppercase tracking-wider">Akun</p>
        <button type="button" onclick="logout()" class="w-full flex items-center gap-3 px-3 h-11 rounded-lg text-left text-error hover:bg-error-container/40 active:bg-error-container transition-colors">
          <span class="material-symbols-outlined">logout</span>
          <span class="font-label-lg text-label-lg">Logout</span>
        </button>
      </div>
    </nav>

    <!-- Footer sidebar -->
    <div class="p-3 bg-white flex items-center justify-between text-outline">
      <span class="font-label-sm text-label-sm">NoteTask</span>
      <span class="font-label-sm text-label-sm">Admin</span>
    </div>
  </aside>

  <!-- Main -->
  <main class="pt-16 pb-10 lg:pb-10 lg:pl-72 px-4 md:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto pt-4 md:pt-5 space-y-4">

      <div class="rounded-2xl bg-gradient-to-br from-surface-high via-surface-low to-surface p-5 md:p-6 border border-outline-variant/30">
        <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
          <div>
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight">Manajemen Pengguna</h1>
            <p class="text-xs sm:text-sm text-on-variant mt-1">Kelola akun dan peran pengguna NoteTask</p>
          </div>
          <div class="grid grid-cols-3 gap-2 md:w-96">
            <div class="bg-white/80 rounded-xl px-3 py-2 border border-outline-variant/20"><span class="block text-[11px] text-on-variant">Total</span><span id="sum-total" class="font-bold">0</span></div>
            <div class="bg-white/80 rounded-xl px-3 py-2 border border-outline-variant/20"><span class="block text-[11px] text-on-variant">Admin</span><span id="sum-admin" class="font-bold">0</span></div>
            <div class="bg-white/80 rounded-xl px-3 py-2 border border-outline-variant/20"><span class="block text-[11px] text-on-variant">User</span><span id="sum-user" class="font-bold">0</span></div>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-2.5 md:flex-row md:items-center md:gap-4">
        <div class="relative w-full md:max-w-md">
          <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline">search</span>
          <input id="search" oninput="onSearch()" type="text" placeholder="Cari nama atau username" class="w-full h-11 pl-11 pr-3 rounded-xl bg-white text-sm border border-outline-variant/30 focus:outline-none focus:border-primary-container focus:ring-2 focus:ring-primary-fixed">
        </div>
        <div id="chips" class="flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold">
          <button data-role="" onclick="setRole('')" class="chip px-3.5 py-1.5 rounded-full whitespace-nowrap">Semua</button>
          <button data-role="admin" onclick="setRole('admin')" class="chip px-3.5 py-1.5 rounded-full whitespace-nowrap">Admin</button>
          <button data-role="user" onclick="setRole('user')" class="chip px-3.5 py-1.5 rounded-full whitespace-nowrap">User</button>
        </div>
      </div>

      <div class="flex items-center justify-between px-1">
        <h2 class="text-sm md:text-base font-bold">Daftar Akun</h2>
      </div>

      <div id="list" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 md:gap-4"></div>

      <div id="empty" class="hidden flex-col items-center p-8 rounded-2xl bg-white text-center border border-outline-variant/20">
        <span class="material-symbols-outlined text-outline" style="font-size:32px">search_off</span>
        <h3 class="font-bold mt-2">Pengguna tidak ditemukan</h3>
        <p class="text-xs text-on-variant mt-1">Ubah kata kunci atau filter peran.</p>
      </div>
    </div>
  </main>

  <!-- Modal profil pengguna -->
<div id="role-modal" class="fixed inset-0 z-[60] hidden items-end sm:items-center justify-center bg-black/40 p-0 sm:p-4" onclick="if(event.target===this)closeModals()">
  <div class="w-full sm:max-w-md bg-white rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden">
    <div class="p-5 bg-surface-low flex items-center justify-between border-b border-outline-variant/20">
      <h3 class="font-bold">Profil pengguna</h3>
      <button aria-label="Tutup" onclick="closeModals()" class="w-8 h-8 flex items-center justify-center rounded-lg text-outline"><span class="material-symbols-outlined">close</span></button>
    </div>
    <div class="p-5 space-y-4">
      <div class="flex items-center gap-3 p-3.5 rounded-xl bg-surface-low">
        <div id="m-avatar" class="w-12 h-12 rounded-full bg-primary-container text-white flex items-center justify-center font-bold shrink-0"></div>
        <div class="min-w-0">
          <h4 id="m-name" class="font-bold truncate"></h4>
          <span id="m-username" class="text-xs text-outline"></span>
        </div>
      </div>
      <div class="p-3 rounded-xl bg-surface-low/70 border border-outline-variant/20 text-xs">
        <span class="text-outline block">Statistik tugas</span>
        <div class="flex items-center justify-between mt-1">
          <span id="m-tasks" class="font-bold text-sm"></span>
          <span id="m-percent" class="text-secondary font-semibold"></span>
        </div>
      </div>
    </div>
    <div class="p-4 pb-safe bg-surface-low flex justify-end gap-2 border-t border-outline-variant/20">
      <button onclick="closeModals()" class="h-10 px-4 rounded-xl bg-white border border-outline-variant/30 text-xs font-semibold">Tutup</button>
    </div>
  </div>
</div>

  <!-- Modal hapus -->
  <div id="del-modal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/40 p-4" onclick="if(event.target===this)closeModals()">
    <div class="w-full max-w-sm bg-white rounded-2xl shadow-xl p-5 space-y-4">
      <div class="w-12 h-12 rounded-full bg-error-container text-error flex items-center justify-center"><span class="material-symbols-outlined">person_remove</span></div>
      <div>
        <h3 class="font-bold">Hapus akun pengguna?</h3>
        <p class="text-xs text-on-variant mt-1 leading-relaxed">Akun <b id="d-name" class="text-on-surface"></b> (<span id="d-username"></span>) akan dihapus. Tugas milik pengguna ini ikut terhapus permanen.</p>
      </div>
      <div class="flex justify-end gap-2">
        <button onclick="closeModals()" class="h-9 px-3.5 rounded-lg bg-surface-low text-xs font-semibold">Batal</button>
        <button id="d-confirm" onclick="confirmDelete()" class="h-9 px-3.5 rounded-lg bg-error text-white text-xs font-semibold disabled:opacity-50">Hapus akun</button>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div id="toast" aria-live="polite" role="status" class="fixed top-[calc(4.5rem+env(safe-area-inset-top,0px))] left-1/2 -translate-x-1/2 w-max max-w-[calc(100%-2rem)] z-[70] hidden items-center gap-3 px-5 py-3 rounded-2xl bg-[#0f1b33] text-white shadow-xl">
    <span id="toast-icon" class="material-symbols-outlined flex-shrink-0 text-emerald-300" style="font-size:22px;font-variation-settings:'FILL' 0;">check_circle</span>
    <span id="toast-msg" class="text-sm font-semibold"></span>
  </div>

  <script>
    const TOKEN_KEY = 'notetask_token';
    const USER_KEY = 'notetask_user';
    const token = localStorage.getItem(TOKEN_KEY);
    let me = null;
    try { me = JSON.parse(localStorage.getItem(USER_KEY)); } catch (e) {}

    // jaga halaman: harus login dan berperan admin
    if (!token || !me) {
      window.location.href = '/';
    } else if (me.role !== 'admin') {
      window.location.href = '/dashboard';
    }

    let page = 1, lastPage = 1, roleFilter = '', timer = null;
    let users = [], selected = null;

    const $ = id => document.getElementById(id);
    const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
    const initials = n => String(n || '?').trim().split(/\s+/).slice(0, 2).map(w => w[0]).join('').toUpperCase();
    const colors = ['bg-primary-container', 'bg-amber-600', 'bg-violet-600', 'bg-teal-600', 'bg-rose-600'];
    const color = id => colors[id % colors.length];

    function fmtDate(s) {
      if (!s) return '';
      return new Date(s).toLocaleDateString('id-ID', { month: 'short', year: 'numeric' });
    }

    function showToast(msg, type = 'success') {
      const isError = type === 'error';
      const icon = $('toast-icon');

      $('toast-msg').textContent = msg;
      icon.textContent = isError ? 'error' : 'check_circle';
      icon.classList.toggle('text-red-400', isError);
      icon.classList.toggle('text-emerald-300', !isError);

      $('toast').classList.remove('hidden');
      $('toast').classList.add('flex');

      clearTimeout(window.tt);
      window.tt = setTimeout(() => {
        $('toast').classList.add('hidden');
        $('toast').classList.remove('flex');
      }, 2800);
    }

    function clearSession() {
      localStorage.removeItem(TOKEN_KEY);
      localStorage.removeItem(USER_KEY);
    }

    async function api(path, options = {}) {
      const res = await fetch(path, {
        ...options,
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + token,
          ...(options.headers || {})
        }
      });
      if (res.status === 401) { clearSession(); window.location.href = '/'; throw new Error('Sesi berakhir'); }
      if (res.status === 403) { window.location.href = '/dashboard'; throw new Error('Akses ditolak'); }
      const data = await res.json().catch(() => ({}));
      if (!res.ok) throw new Error(data.message || 'Terjadi kesalahan.');
      return data;
    }

    // Drawer
    function openDrawer() { $('side-drawer').classList.remove('-translate-x-full'); $('drawer-backdrop').classList.remove('hidden'); }
    function closeDrawer() { $('side-drawer').classList.add('-translate-x-full'); $('drawer-backdrop').classList.add('hidden'); }

    async function logout() {
      try { await api('/api/logout', { method: 'POST' }); } catch (e) {}
      clearSession();
      window.location.href = '/';
    }

    // Filter chip
    function paintChips() {
      document.querySelectorAll('.chip').forEach(b => {
        const on = b.dataset.role === roleFilter;
        b.className = 'chip px-3.5 py-1.5 rounded-full whitespace-nowrap ' +
          (on ? 'bg-primary text-white shadow-sm' : 'bg-white text-on-variant border border-outline-variant/30');
      });
    }
    function setRole(r) { roleFilter = r; page = 1; paintChips(); loadUsers(); }
    function onSearch() { clearTimeout(timer); timer = setTimeout(() => { page = 1; loadUsers(); }, 350); }
    function goPage(d) { page += d; loadUsers(); }

    async function loadUsers() {
      const params = new URLSearchParams({ page });
      const q = $('search').value.trim();
      if (q) params.set('q', q);
      if (roleFilter) params.set('role', roleFilter);
      try {
        const res = await api('/api/admin/users?' + params.toString());
        users = res.data.data;
        lastPage = res.data.last_page;
        $('sum-total').textContent = res.summary.total;
        $('sum-admin').textContent = res.summary.admin;
        $('sum-user').textContent = res.summary.user;
        render();
      } catch (e) {
        showToast(e.message, 'error');
      }
    }

    function render() {
      $('list').innerHTML = users.map((u, i) => {
        const isAdmin = u.role === 'admin';
        const isSelf = me && u.id === me.id;
        const done = u.completed_tasks_count || 0;
        return `
        <div class="p-4 rounded-2xl bg-white border border-outline-variant/30 shadow-sm flex flex-col gap-3">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-11 h-11 rounded-full ${color(u.id)} text-white flex items-center justify-center font-bold text-sm shrink-0">${esc(initials(u.name))}</div>
            <div class="min-w-0">
              <div class="flex items-center gap-2 min-w-0">
                <span class="font-bold text-sm truncate">${esc(u.name)}</span>
                <span class="shrink-0 px-2 py-0.5 rounded-full text-[10px] font-bold ${isAdmin ? 'bg-primary-fixed text-primary' : 'bg-surface-high text-on-variant'}">${isAdmin ? 'Admin' : 'User'}</span>
              </div>
              <p class="text-xs text-on-variant truncate">@${esc(u.username)}</p>
              <span class="text-[11px] text-outline">Bergabung ${esc(fmtDate(u.created_at))}</span>
            </div>
          </div>
          <div class="pt-2.5 border-t border-outline-variant/20 flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2 text-xs font-medium text-on-variant bg-surface-low px-2.5 py-1 rounded-lg">
              <span><b class="text-on-surface">${u.tasks_count}</b> Tugas</span><span class="text-outline">•</span><span class="text-secondary font-semibold">${done} Selesai</span>
            </div>
            <div class="flex items-center gap-1.5">
              <button onclick="openRole(${i})" class="h-8 px-3 rounded-lg bg-surface-low hover:bg-surface-high text-primary font-semibold text-xs">Detail</button>
              ${isSelf ? '' : `<button aria-label="Hapus akun" onclick="openDelete(${i})" class="h-8 w-8 rounded-lg bg-error-container/40 hover:bg-error-container text-error flex items-center justify-center"><span class="material-symbols-outlined" style="font-size:16px">delete</span></button>`}
            </div>
          </div>
        </div>`;
      }).join('');
      const empty = users.length === 0;
      $('empty').classList.toggle('hidden', !empty);
      $('empty').classList.toggle('flex', empty);
    }

    function closeModals() {
      ['role-modal', 'del-modal'].forEach(id => { $(id).classList.add('hidden'); $(id).classList.remove('flex'); });
    }
    function openModal(id) { $(id).classList.remove('hidden'); $(id).classList.add('flex'); }

    function openRole(i) {
      selected = users[i];
      const total = selected.tasks_count, done = selected.completed_tasks_count || 0;
      $('m-avatar').className = 'w-12 h-12 rounded-full text-white flex items-center justify-center font-bold shrink-0 ' + color(selected.id);
      $('m-avatar').textContent = initials(selected.name);
      $('m-name').textContent = selected.name;
      $('m-username').textContent = '@' + selected.username;
      $('m-tasks').textContent = total + ' Tugas (' + done + ' Selesai)';
      $('m-percent').textContent = (total ? Math.round(done / total * 100) : 0) + '% selesai';
      openModal('role-modal');
    }

    function openDelete(i) {
      selected = users[i];
      $('d-name').textContent = selected.name;
      $('d-username').textContent = '@' + selected.username;
      openModal('del-modal');
    }

    async function confirmDelete() {
      $('d-confirm').disabled = true;
      try {
        await api('/api/admin/users/' + selected.id, { method: 'DELETE' });
        closeModals();
        showToast('Akun ' + selected.name + ' dihapus.');
        if (users.length === 1 && page > 1) page--;
        loadUsers();
      } catch (e) {
        showToast(e.message, 'error');
      } finally {
        $('d-confirm').disabled = false;
      }
    }

    document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeDrawer(); closeModals(); } });

    // Mulai
    if (me) {
      $('me-name').textContent = me.name || 'Administrator';
    }
    paintChips();
    if (token && me && me.role === 'admin') loadUsers();
  </script>
</body>
</html>