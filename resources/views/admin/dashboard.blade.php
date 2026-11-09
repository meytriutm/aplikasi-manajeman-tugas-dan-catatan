<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>NoteTask - Dashboard Admin</title>
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
      <!-- Ikon akun -->
      <a href="/profile" aria-label="Profil saya" class="w-11 h-11 flex items-center justify-center rounded-full text-primary hover:bg-surface-high transition-colors">
        <span class="material-symbols-outlined" style="font-size:30px">account_circle</span>
      </a>
    </div>
  </header>

  <div id="drawer-backdrop" class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm hidden lg:hidden" onclick="closeDrawer()"></div>

  <!-- ================= SIDEBAR (sama dengan halaman user, menu hanya Dashboard, Data Pengguna, Logout) ================= -->
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

        <!-- Halaman aktif -->
        <a aria-current="page" href="/admin/dashboard" class="flex items-center gap-3 px-3 h-11 rounded-lg bg-surface-container text-primary transition-colors">
          <span class="material-symbols-outlined text-secondary">insights</span>
          <span class="font-label-lg text-label-lg">Dashboard Statistik</span>
        </a>

        <a href="/admin/users" class="flex items-center gap-3 px-3 h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors">
          <span class="material-symbols-outlined text-secondary">group</span>
          <span class="font-label-lg text-label-lg">Data Pengguna</span>
        </a>
      </div>

      <div class="pt-2">
        <p class="px-3 mb-2 font-label-sm text-label-sm text-outline uppercase tracking-wider">Akun</p>
        <button type="button" onclick="logoutUser(this)" class="w-full flex items-center gap-3 px-3 h-11 rounded-lg text-left text-error hover:bg-error-container/40 active:bg-error-container transition-colors">
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

      <div class="bg-white p-5 md:p-6 rounded-xl shadow-sm flex items-start justify-between gap-3">
        <div>
          <div class="inline-flex items-center gap-1.5 bg-primary-fixed py-1 px-2.5 rounded-full text-primary text-[11px] font-semibold uppercase tracking-wider">
            <span class="material-symbols-outlined" style="font-size:16px;font-variation-settings:'FILL' 1">shield</span>Mode Administrator
          </div>
          <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight mt-2">Statistik Global</h1>
          <p class="text-xs sm:text-sm text-on-variant mt-1">Pengguna, tugas, catatan, dan kategori</p>
        </div>
      </div>

      <div id="load-error" class="hidden p-3 rounded-lg bg-error-container text-error text-xs font-medium"></div>

      <!-- Kartu metrik -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <div class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">group</span></div>
          <span class="block text-[11px] text-outline mt-3">Total Pengguna</span>
          <span id="st-users" class="block text-2xl font-bold tracking-tight">-</span>
          <span id="st-users-sub" class="block text-[11px] text-on-variant mt-0.5 truncate">&nbsp;</span>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <div class="w-9 h-9 rounded-lg bg-surface-high flex items-center justify-center text-primary"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">assignment</span></div>
          <span class="block text-[11px] text-outline mt-3">Total Tugas</span>
          <span id="st-tasks" class="block text-2xl font-bold tracking-tight">-</span>
          <span id="st-tasks-sub" class="block text-[11px] text-on-variant mt-0.5 truncate">&nbsp;</span>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center text-secondary"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">sticky_note_2</span></div>
          <span class="block text-[11px] text-outline mt-3">Total Catatan</span>
          <span id="st-notes" class="block text-2xl font-bold tracking-tight">-</span>
          <span class="block text-[11px] text-on-variant mt-0.5">Dari semua pengguna</span>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <div class="w-9 h-9 rounded-lg bg-amber-100 flex items-center justify-center text-amber-700"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">category</span></div>
          <span class="block text-[11px] text-outline mt-3">Total Kategori</span>
          <span id="st-cats" class="block text-2xl font-bold tracking-tight">-</span>
          <span class="block text-[11px] text-on-variant mt-0.5">Dari semua pengguna</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-start gap-4">

        <!-- Distribusi status tugas -->
        <div class="bg-white p-5 rounded-xl shadow-sm space-y-3">
          <div class="flex items-center justify-between gap-2 flex-wrap">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">pie_chart</span>
              <h3 class="font-semibold">Distribusi Status Tugas</h3>
            </div>
            <span id="completion" class="text-[11px] font-semibold bg-surface-low px-2 py-0.5 rounded-md text-on-variant">0% selesai</span>
          </div>
          <div class="h-3 w-full bg-surface-high rounded-full overflow-hidden flex">
            <div id="bar-done" class="bg-secondary h-full transition-all duration-500" style="width:0%"></div>
            <div id="bar-pending" class="bg-amber-400 h-full transition-all duration-500" style="width:0%"></div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-1.5 text-xs text-on-variant pt-1">
            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-secondary shrink-0"></span><span id="lg-done" class="truncate">Selesai: 0</span></div>
            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-amber-400 shrink-0"></span><span id="lg-pending" class="truncate">Pending: 0</span></div>
            <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-error shrink-0"></span><span id="lg-overdue" class="truncate">Terlambat: 0</span></div>
          </div>
          <p id="tasks-empty" class="hidden text-xs text-outline">Belum ada tugas yang dibuat pengguna.</p>
        </div>

        <!-- Aktivitas terbaru -->
        <div class="bg-white p-5 rounded-xl shadow-sm space-y-3 min-w-0">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">history</span>
              <h3 class="font-semibold">Aktivitas Terbaru</h3>
            </div>
            <a href="/admin/users" class="text-[11px] text-primary font-semibold hover:underline">Data Pengguna</a>
          </div>
          <div id="activity" class="space-y-2"></div>
          <p id="activity-empty" class="hidden text-xs text-outline">Belum ada aktivitas.</p>
        </div>
      </div>
    </div>
  </main>

  <script src="/js/notetask.js"></script>

<script>
    const TOKEN_KEY = 'notetask_token';
    const USER_KEY = 'notetask_user';

    const token = localStorage.getItem(TOKEN_KEY);
    let me = null;

    // Mengambil data pengguna yang tersimpan saat login
    try {
        me = JSON.parse(localStorage.getItem(USER_KEY));
    } catch (e) {
        me = null;
    }

    // Memastikan pengguna sudah login dan berperan sebagai Admin
    if (!token || !me) {
        window.location.href = '/';
    } else if (me.role !== 'admin') {
        window.location.href = '/dashboard';
    }

    // Mempermudah pemanggilan elemen HTML berdasarkan ID
    const $ = id => document.getElementById(id);

    // Mengamankan teks sebelum ditampilkan ke halaman
    const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
    }[c]));

    // Mengubah angka ke format Indonesia
    const num = n => Number(n || 0).toLocaleString('id-ID');

    // Membuka sidebar pada tampilan mobile
    function openDrawer() {
        $('side-drawer').classList.remove('-translate-x-full');
        $('drawer-backdrop').classList.remove('hidden');
    }

    // Menutup sidebar
    function closeDrawer() {
        $('side-drawer').classList.add('-translate-x-full');
        $('drawer-backdrop').classList.add('hidden');
    }

    // Menutup sidebar ketika tombol Escape ditekan
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeDrawer();
    });

    // Menghapus token dan data pengguna dari browser
    function clearSession() {
        localStorage.removeItem(TOKEN_KEY);
        localStorage.removeItem(USER_KEY);
    }

    // Mengirim request ke API dengan token Sanctum
    async function api(path, options = {}) {
        const res = await fetch(path, {
            ...options,
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
                ...(options.headers || {})
            }
        });

        // Jika sesi berakhir, kembali ke halaman login
        if (res.status === 401) {
            clearSession();
            window.location.href = '/';
            throw new Error('Sesi berakhir');
        }

        // Jika bukan Admin, arahkan kembali ke dashboard User
        if (res.status === 403) {
            window.location.href = '/dashboard';
            throw new Error('Akses ditolak');
        }

        const data = await res.json().catch(() => ({}));

        // Menampilkan pesan jika request gagal
        if (!res.ok) {
            throw new Error(data.message || 'Terjadi kesalahan.');
        }

        return data;
    }


    // Mengubah waktu aktivitas menjadi format relatif
    function timeAgo(iso) {
        const diff = Math.floor(
            (Date.now() - new Date(iso).getTime()) / 1000
        );

        if (isNaN(diff)) return '';
        if (diff < 60) return 'Baru saja';
        if (diff < 3600) return Math.floor(diff / 60) + ' menit lalu';
        if (diff < 86400) return Math.floor(diff / 3600) + ' jam lalu';
        if (diff < 2592000) return Math.floor(diff / 86400) + ' hari lalu';

        return new Date(iso).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        });
    }

    // Menampilkan satu aktivitas terbaru di dashboard Admin
    function activityRow(a) {
        let icon = 'history';
        let tone = 'bg-surface-high text-on-variant';
        let text = '';

        // Menyesuaikan ikon dan keterangan dengan jenis aktivitas
        switch (a.action) {
            case 'task_created':
                icon = 'add_task';
                tone = 'bg-primary-fixed text-primary';
                text = `<b>${esc(a.actor)}</b> menambahkan tugas <b>${esc(a.title)}</b>`;
                break;

            case 'task_updated':
                icon = 'edit';
                tone = 'bg-blue-100 text-blue-700';
                text = `<b>${esc(a.actor)}</b> mengubah tugas <b>${esc(a.title)}</b>`;
                break;

            case 'task_deleted':
                icon = 'delete';
                tone = 'bg-red-100 text-red-700';
                text = `<b>${esc(a.actor)}</b> menghapus tugas <b>${esc(a.title)}</b>`;
                break;

            case 'note_created':
                icon = 'note_add';
                tone = 'bg-amber-100 text-amber-700';
                text = `<b>${esc(a.actor)}</b> menambahkan catatan <b>${esc(a.title)}</b>`;
                break;

            case 'note_updated':
                icon = 'edit_note';
                tone = 'bg-blue-100 text-blue-700';
                text = `<b>${esc(a.actor)}</b> mengubah catatan <b>${esc(a.title)}</b>`;
                break;

            case 'note_deleted':
                icon = 'delete';
                tone = 'bg-red-100 text-red-700';
                text = `<b>${esc(a.actor)}</b> menghapus catatan <b>${esc(a.title)}</b>`;
                break;

            default:
                // Menangani aktivitas lain yang belum memiliki tampilan khusus
                icon = 'history';
                text = `<b>${esc(a.actor || 'Pengguna')}</b> ${esc(a.title || 'melakukan aktivitas')}`;
                break;
        }

        // Mengambil keterangan waktu aktivitas
        const sub = timeAgo(a.time);

        return `
            <div class="flex items-center gap-3 p-2.5 bg-surface-low rounded-lg">
                <div class="w-8 h-8 rounded-full ${tone} flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined" style="font-size:16px">${icon}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs text-on-surface break-words">${text}</p>
                    <span class="text-[11px] text-outline block">${esc(sub)}</span>
                </div>
            </div>`;
    }

    // Mengambil statistik dan aktivitas terbaru dari API Admin
    async function loadDashboard() {
        $('load-error').classList.add('hidden');

        try {
            const res = await api('/api/admin/dashboard');
            const d = res.data;

            // Memperbarui kartu statistik pengguna
            $('st-users').textContent = num(d.users.total);
            $('st-users-sub').textContent =
                num(d.users.admin) + ' admin • ' + num(d.users.user) + ' user';

            // Memperbarui kartu statistik tugas, catatan, dan kategori
            $('st-tasks').textContent = num(d.tasks.total);
            $('st-tasks-sub').textContent = num(d.tasks.completed) + ' selesai';
            $('st-notes').textContent = num(d.notes.total);
            $('st-cats').textContent = num(d.categories.total);

            // Menghitung persentase status tugas untuk diagram
            const total = d.tasks.total;
            const donePct = total
                ? (d.tasks.completed / total * 100)
                : 0;

            const pendPct = total
                ? (d.tasks.pending / total * 100)
                : 0;

            // Memperbarui diagram status tugas
            $('bar-done').style.width = donePct + '%';
            $('bar-pending').style.width = pendPct + '%';

            $('completion').textContent =
                d.completion_percentage + '% selesai';

            $('lg-done').innerHTML =
                'Selesai: <b class="text-on-surface">' +
                num(d.tasks.completed) + '</b> (' +
                donePct.toFixed(1) + '%)';

            $('lg-pending').innerHTML =
                'Pending: <b class="text-on-surface">' +
                num(d.tasks.pending) + '</b> (' +
                pendPct.toFixed(1) + '%)';

            $('lg-overdue').innerHTML =
                'Terlambat: <b class="text-on-surface">' +
                num(d.tasks.overdue) + '</b>';

            // Menampilkan pesan jika belum ada tugas
            $('tasks-empty').classList.toggle('hidden', total > 0);

            // Menampilkan daftar aktivitas terbaru
            const acts = d.recent_activities || [];

            $('activity').innerHTML = acts.map(activityRow).join('');
            $('activity-empty').classList.toggle('hidden', acts.length > 0);

        } catch (e) {
            // Menampilkan pesan jika data dashboard gagal dimuat
            $('load-error').textContent = e.message;
            $('load-error').classList.remove('hidden');
        }
    }

    // Menampilkan nama Admin pada sidebar
    if (me) {
        $('me-name').textContent = me.name || 'Administrator';
    }

    // Memuat statistik otomatis jika pengguna adalah Admin
    if (token && me && me.role === 'admin') {
        loadDashboard();
    }
</script>


</body>
</html>