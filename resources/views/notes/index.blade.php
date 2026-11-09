<!DOCTYPE html>
<html class="light" lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport">
  <meta content="mobile_tab" name="shell-type">
  <title>Catatan - NoteTask</title>

  <!-- Font ikon dan font teks (disamakan dengan halaman Kategori) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&amp;family=Plus+Jakarta+Sans:wght@500..800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">

  <style>
    /* Pakai @@ supaya Blade menampilkannya sebagai @layer biasa di browser */
    @@layer base{html,body{width:100%;margin:0;padding:0;background-color:#f8f9ff;-webkit-tap-highlight-color:transparent;}body{overscroll-behavior-y:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}
  </style>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Konfigurasi tema Tailwind: warna, spasi, font, dan ukuran teks -->
  <script id="tailwind-config">
    tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-secondary-fixed-variant": "#005137", "inverse-surface": "#213145", "on-secondary-fixed": "#002114", "inverse-primary": "#c3c0ff", "on-secondary": "#ffffff", "tertiary-fixed": "#ffdcc3", "secondary-container": "#82f5c1", "tertiary": "#5c2f00", "error": "#ba1a1a", "surface-bright": "#f8f9ff", "background": "#f8f9ff", "surface-container-highest": "#d3e4fe", "on-secondary-container": "#00714e", "on-tertiary": "#ffffff", "primary-container": "#4338ca", "on-background": "#0b1c30", "secondary": "#006c4a", "surface-container-high": "#dce9ff", "primary": "#2a14b4", "surface": "#f8f9ff", "on-error-container": "#93000a", "surface-dim": "#cbdbf5", "error-container": "#ffdad6", "tertiary-fixed-dim": "#ffb77d", "outline": "#777586", "surface-tint": "#5148d7", "on-error": "#ffffff", "secondary-fixed-dim": "#68dba9", "surface-container-lowest": "#ffffff", "surface-variant": "#d3e4fe", "on-surface-variant": "#464554", "on-primary-container": "#c1beff", "outline-variant": "#c7c4d7", "primary-fixed-dim": "#c3c0ff", "on-primary": "#ffffff", "tertiary-container": "#7d4200", "surface-container-low": "#eff4ff", "on-tertiary-fixed-variant": "#6e3900", "on-tertiary-container": "#ffb477", "on-primary-fixed": "#100069", "secondary-fixed": "#85f8c4", "inverse-on-surface": "#eaf1ff", "on-primary-fixed-variant": "#372abf", "on-tertiary-fixed": "#2f1500", "surface-container": "#e5eeff", "on-surface": "#0b1c30", "primary-fixed": "#e3dfff" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "margin-lg": "3rem", "space-xs": "0.25rem", "gutter-lg": "2rem", "gutter-md": "1.5rem", "gutter": "1rem", "space-lg": "1.25rem", "space-xl": "2rem", "space-md": "0.75rem", "margin": "1rem", "space-sm": "0.5rem", "margin-md": "2rem" }, "fontFamily": { "label-lg": ["Inter"], "headline-sm": ["Plus Jakarta Sans"], "headline-xl-mobile": ["Plus Jakarta Sans"], "label-sm": ["Inter"], "label-md": ["Inter"], "display-lg-mobile": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "body-sm": ["Inter"], "headline-xl": ["Plus Jakarta Sans"], "headline-md": ["Plus Jakarta Sans"], "body-lg": ["Inter"], "body-md": ["Inter"] }, "fontSize": { "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }], "headline-sm": ["16px", { "lineHeight": "24px", "letterSpacing": "-0.005em", "fontWeight": "600" }], "headline-xl-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "600" }], "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.015em", "fontWeight": "500" }], "display-lg-mobile": ["30px", { "lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "display-lg": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["12px", { "lineHeight": "18px", "letterSpacing": "0.005em", "fontWeight": "400" }], "headline-xl": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.015em", "fontWeight": "600" }], "headline-md": ["20px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }], "body-lg": ["16px", { "lineHeight": "26px", "letterSpacing": "-0.005em", "fontWeight": "400" }], "body-md": ["14px", { "lineHeight": "22px", "letterSpacing": "0em", "fontWeight": "400" }] } } } }
  </script>

  <style>
    /* Menyembunyikan scrollbar pada daftar chip kategori */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased flex flex-col min-h-screen">

  <!-- ================= HEADER (tetap di atas) ================= -->
  <header class="fixed top-0 inset-x-0 lg:left-72 z-40 bg-surface/85 backdrop-blur-xl pt-safe shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="h-16 px-margin flex items-center justify-between gap-space-sm">
      <div class="flex items-center gap-space-xs min-w-0">
        <!-- Tombol hamburger: hanya tampil di mobile/tablet untuk membuka sidebar -->
        <button aria-label="Buka menu navigasi" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface active:bg-surface-container-high transition-colors" type="button" onclick="openDrawer()">
          <span class="material-symbols-outlined text-[24px]">menu</span>
        </button>
        <div class="flex items-center gap-space-sm ml-space-xs lg:ml-0">
          <!-- Logo -->
          <div aria-hidden="true" class="relative w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center shadow-sm flex-shrink-0">
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 rounded-full bg-secondary flex items-center justify-center">
              <span class="material-symbols-outlined text-[9px] text-on-secondary" style="font-variation-settings: 'FILL' 1;">done</span>
            </span>
            <span class="material-symbols-outlined text-on-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">edit_note</span>
          </div>
          <span class="font-headline-sm text-headline-sm text-primary tracking-tight">NoteTask</span>
        </div>
      </div>
    </div>
  </header>

  <!-- ================= BACKDROP SIDEBAR (hanya mobile/tablet) ================= -->
  <div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm hidden lg:hidden" id="drawer-backdrop" onclick="closeDrawer()"></div>

  <!-- ================= SIDEBAR KIRI ================= -->
  <aside class="fixed top-0 bottom-0 left-0 z-50 w-72 max-w-[85vw] bg-surface-container-lowest shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] flex flex-col pt-safe pb-safe transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 lg:shadow-none lg:border-r lg:border-outline-variant/30" id="side-drawer">

    <!-- Profil pengguna (nama diisi dari cache localStorage lalu disegarkan dari /api/user) -->
    <div class="p-space-lg flex items-center justify-between bg-surface-container-low">
      <div class="flex items-center gap-space-md min-w-0">
        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
          <span class="material-symbols-outlined text-3xl">account_circle</span>
        </div>
        <div class="flex flex-col min-w-0">
          <span id="sidebar-user-name" class="font-headline-sm text-headline-sm text-on-surface truncate min-h-[24px]">&nbsp;</span>
          <!-- Script kecil ini jalan langsung saat elemen di atas sudah ada, jadi nama muncul tanpa kedipan -->
          <script>
            (function () {
              try {
                var u = JSON.parse(localStorage.getItem('notetask_user') || 'null');
                if (u && u.name) document.getElementById('sidebar-user-name').textContent = u.name;
              } catch (e) {}
            })();
          </script>
          <span class="font-label-sm text-label-sm text-primary font-semibold uppercase tracking-wider">User</span>
        </div>
      </div>
      <!-- Tombol tutup sidebar (mobile/tablet) -->
      <button aria-label="Tutup menu" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface" type="button" onclick="closeDrawer()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <!-- Menu navigasi -->
    <nav class="flex-1 overflow-y-auto px-space-md py-space-lg space-y-space-md">
      <div class="space-y-space-xs">
        <p class="px-space-md font-label-sm text-label-sm text-outline uppercase tracking-wider font-semibold">Menu Utama</p>

        <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" href="/dashboard">
          <span class="material-symbols-outlined text-[20px] text-secondary">space_dashboard</span>
          <span class="font-label-lg text-label-lg">Dashboard Personal</span>
        </a>

        <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" href="/tasks">
          <span class="material-symbols-outlined text-[20px] text-secondary">check_circle</span>
          <span class="font-label-lg text-label-lg">Daftar Tugas</span>
        </a>

        <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" href="/categories">
          <span class="material-symbols-outlined text-[20px] text-secondary">category</span>
          <span class="font-label-lg text-label-lg">Kategori Saya</span>
        </a>

        <!-- Menu Catatan ditandai aktif -->
        <a aria-current="page" class="flex items-center gap-space-md px-space-md h-11 rounded-lg bg-surface-container text-primary transition-colors" href="/notes">
          <span class="material-symbols-outlined text-[20px] text-secondary">sticky_note_2</span>
          <span class="font-label-lg text-label-lg">Catatan</span>
        </a>
      </div>

      <!-- Menu akun -->
      <div class="pt-space-sm">
        <p class="px-space-md mb-2 font-label-sm text-label-sm text-outline uppercase tracking-wider font-semibold">Akun</p>
        <button class="w-full flex items-center gap-space-md px-space-md h-11 rounded-lg text-left text-error hover:bg-error-container/40 active:bg-error-container transition-colors disabled:opacity-70 disabled:cursor-not-allowed" onclick="logoutUser(this)" type="button">
          <span class="material-symbols-outlined text-[20px]">logout</span>
          <span class="font-label-lg text-label-lg">Logout</span>
        </button>
      </div>
    </nav>

    <!-- Footer sidebar -->
    <div class="p-space-md bg-surface-container-lowest flex items-center justify-between text-outline">
      <span class="font-label-sm text-label-sm">NoteTask</span>
      <span class="font-label-sm text-label-sm">Personal</span>
    </div>
  </aside>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="flex-1 flex flex-col relative w-full min-w-0 lg:ml-72 lg:w-[calc(100%-18rem)] pt-[calc(4rem+env(safe-area-inset-top,0px))] pb-[calc(6rem+env(safe-area-inset-bottom,0px))] px-margin md:px-margin-md lg:px-margin-lg bg-surface">

    <div class="w-full flex flex-col">

      <!-- Judul halaman -->
      <div class="pt-space-md pb-space-sm flex items-center justify-between gap-space-md">
        <div class="min-w-0">
          <h1 class="font-headline-xl-mobile text-headline-xl-mobile md:font-headline-xl md:text-headline-xl font-bold text-on-surface tracking-tight">Catatan</h1>
          <p class="font-body-md text-body-md text-on-surface-variant">Kelola ide, rangkuman, dan materi harianmu.</p>
        </div>
      </div>

      <!-- Kolom pencarian -->
      <div class="my-space-sm w-full">
        <div class="relative w-full flex items-center bg-surface-container-lowest rounded-xl shadow-sm">
          <span class="material-symbols-outlined absolute left-space-md text-on-surface-variant text-[20px] pointer-events-none">search</span>
          <input class="w-full h-12 pl-11 pr-12 bg-transparent font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none" id="searchInput" placeholder="Cari catatan..." type="text" autocomplete="off">
          <button class="hidden absolute right-space-sm w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors" id="clearSearchBtn" type="button" aria-label="Hapus pencarian">
            <span class="material-symbols-outlined text-[18px]">close</span>
          </button>
        </div>
      </div>

      <!-- Filter kategori (dibuat oleh JavaScript). Tiga kotak abu-abu = placeholder loading -->
      <div class="w-full overflow-x-auto md:overflow-visible no-scrollbar py-space-xs flex items-center md:flex-wrap gap-space-sm" id="chipContainer">
        <div class="h-8 w-20 rounded-full bg-surface-container animate-pulse"></div>
        <div class="h-8 w-24 rounded-full bg-surface-container animate-pulse"></div>
        <div class="h-8 w-24 rounded-full bg-surface-container animate-pulse"></div>
      </div>

      <!-- Informasi jumlah catatan -->
      <div class="mt-space-sm mb-space-sm text-on-surface-variant">
        <span class="font-label-md text-label-md" id="noteCountLabel">Memuat catatan...</span>
      </div>

      <!-- Wadah kartu catatan -->
      <div class="flex flex-col gap-space-md" id="notesContainer"></div>

      <!-- Tampilan saat tidak ada catatan / hasil pencarian kosong -->
      <div class="hidden py-16 flex flex-col items-center justify-center text-center" id="emptyState">
        <div class="w-16 h-16 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant mb-space-md">
          <span class="material-symbols-outlined text-[32px]">note_stack</span>
        </div>
        <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1" id="emptyTitle">Tidak ada catatan ditemukan</h3>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-xs mb-space-lg" id="emptyDesc">Coba kata kunci lain atau buat catatan baru dengan menekan tombol plus.</p>
      </div>

      <!-- Tampilan saat gagal memuat data dari API -->
      <div class="hidden py-16 flex flex-col items-center justify-center text-center" id="errorState">
        <div class="w-16 h-16 rounded-full bg-error-container flex items-center justify-center text-error mb-space-md">
          <span class="material-symbols-outlined text-[32px]">error</span>
        </div>
        <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">Gagal memuat catatan</h3>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-xs mb-space-lg" id="errorMessage">Terjadi kesalahan. Silakan coba lagi.</p>
        <button class="px-space-lg py-2.5 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm" onclick="loadData()">
          Coba Lagi
        </button>
      </div>
    </div>
  </main>

  <!-- Tombol bulat (+) di kanan bawah -->
  <button aria-label="Tambah catatan" type="button" onclick="openAddModal()" class="fixed right-4 md:right-8 bottom-[calc(1.5rem+env(safe-area-inset-bottom,0px))] z-30 w-14 h-14 rounded-full bg-primary text-on-primary shadow-xl hover:bg-primary-container active:scale-95 transition-all flex items-center justify-center">
    <span class="material-symbols-outlined text-[28px]">add</span>
  </button>

    <!-- ================= TOAST (pesan singkat) ================= -->
  <div class="fixed top-[calc(4.5rem+env(safe-area-inset-top,0px))] left-1/2 -translate-x-1/2 z-[70] max-w-[90vw] bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-lg text-xs font-medium flex items-center gap-2 opacity-0 pointer-events-none transition-all duration-300" id="toast-message" role="status" aria-live="polite">
    <span class="material-symbols-outlined text-[18px] text-emerald-400" id="toast-icon">check_circle</span>
    <span id="toast-text"></span>
  </div>

  <!-- ================= MODAL TAMBAH CATATAN ================= -->
  <div class="fixed inset-0 z-[60] hidden items-end sm:items-center justify-center sm:p-margin bg-inverse-surface/40 backdrop-blur-sm" id="addModal" role="dialog" aria-modal="true" aria-labelledby="modalFormTitle" onclick="if (event.target === this) closeAddModal()">
    <div class="w-full max-w-lg bg-surface-container-lowest rounded-t-2xl sm:rounded-2xl shadow-xl flex flex-col max-h-[90vh] overflow-hidden transform transition-transform duration-300 translate-y-full sm:translate-y-0" id="addModalCard">

      <!-- Judul modal -->
      <div class="px-space-lg pt-space-lg pb-space-sm flex items-center justify-between">
        <div class="flex items-center gap-space-sm">
          <div class="w-8 h-8 rounded-lg bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
            <span class="material-symbols-outlined text-[18px]">edit_note</span>
          </div>
          <h2 class="font-headline-md text-headline-md font-bold text-on-surface" id="modalFormTitle">Tambah Catatan</h2>
        </div>
        <button aria-label="Tutup" class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors" type="button" onclick="closeAddModal()">
          <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
      </div>

      <!-- Form catatan -->
      <form class="px-space-lg py-space-sm flex flex-col gap-space-md overflow-y-auto" id="noteForm" onsubmit="handleSaveNote(event)" novalidate>
        <div>
          <label class="block font-label-md text-label-md text-on-surface mb-1.5" for="noteTitleInput">Judul Catatan</label>
          <input class="w-full h-11 px-3.5 bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary transition-all" id="noteTitleInput" maxlength="255" placeholder="Masukkan judul catatan..." type="text">
        </div>

        <div>
          <label class="block font-label-md text-label-md text-on-surface mb-1.5" for="noteCategorySelect">Kategori</label>
          <div class="relative">
            <select class="w-full h-11 px-3.5 pr-10 appearance-none bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary transition-all" id="noteCategorySelect">
              <option value="">Tanpa kategori</option>
            </select>
            <span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
          </div>
        </div>

        <div>
          <label class="block font-label-md text-label-md text-on-surface mb-1.5" for="noteContentInput">Isi Catatan</label>
          <textarea class="w-full p-3.5 bg-surface-container-low rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary transition-all resize-none leading-relaxed" id="noteContentInput" placeholder="Tulis catatan kamu di sini..." rows="5"></textarea>
        </div>

        <!-- Lampiran (opsional) -->
        <div class="p-3 bg-surface-container-low rounded-lg flex items-center justify-between gap-space-sm text-on-surface-variant">
          <div class="flex items-center gap-2 min-w-0">
            <span class="material-symbols-outlined text-[18px] flex-shrink-0">attachment</span>
            <span class="font-label-sm text-label-sm truncate" id="noteFileLabel">Lampirkan Berkas (PDF / Foto)</span>
          </div>
          <button class="font-label-sm text-label-sm text-primary font-semibold hover:underline flex-shrink-0" id="noteFileBtn" type="button" onclick="document.getElementById('noteFileInput').click()">Pilih File</button>
          <input accept=".pdf,.jpg,.jpeg,.png,.gif,.webp,.bmp" class="hidden" id="noteFileInput" type="file" onchange="updateFileLabel()">
        </div>

        <!-- Pesan error -->
        <p class="hidden px-3 py-2 rounded-lg bg-error-container text-on-error-container font-label-md text-label-md" id="noteFormError"></p>

        <!-- Tombol aksi -->
        <div class="pt-space-sm pb-[calc(1.25rem+env(safe-area-inset-bottom,0px))] flex items-center justify-end gap-space-sm">
          <button class="px-space-lg h-11 rounded-lg font-label-lg text-label-lg text-on-surface-variant hover:bg-surface-container transition-colors" type="button" onclick="closeAddModal()">
            Batal
          </button>
          <button class="px-space-xl h-11 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary-container active:scale-[0.98] transition-all disabled:opacity-70 disabled:cursor-not-allowed" id="noteSaveBtn" type="submit">
            Simpan Catatan
          </button>
        </div>
      </form>
    </div>
  </div>
  

  <script src="/js/notetask.js"></script>

  <script>
    
    // KONFIGURASI
   
    const API_BASE = '/api';
    const TOKEN_KEY = 'notetask_token';
    const USER_KEY = 'notetask_user';
    const NOTES_CACHE_KEY = 'notetask_notes_cache';
    const LOGIN_URL = '/';

    const BADGE_STYLES = [
      { badge: 'bg-primary-fixed text-on-primary-fixed',             dot: 'bg-primary' },
      { badge: 'bg-tertiary-fixed text-on-tertiary-fixed',           dot: 'bg-tertiary-container' },
      { badge: 'bg-secondary-container text-on-secondary-container', dot: 'bg-secondary' },
      { badge: 'bg-error-container text-on-error-container',         dot: 'bg-error' },
    ];
    const NO_CATEGORY_STYLE = { badge: 'bg-surface-container-high text-on-surface-variant', dot: 'bg-outline' };

    
    // STATE
   
    let notesData = [];
    let categoriesData = [];
    let currentCategory = 'semua';
    let searchQuery = '';

    
    // ELEMEN DOM
    
    const notesContainer = document.getElementById('notesContainer');
    const chipContainer  = document.getElementById('chipContainer');
    const emptyState     = document.getElementById('emptyState');
    const errorState     = document.getElementById('errorState');
    const noteCountLabel = document.getElementById('noteCountLabel');
    const searchInput    = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearchBtn');

   
    // SIDEBAR
   
    function openDrawer() {
      document.getElementById('side-drawer').classList.remove('-translate-x-full');
      document.getElementById('drawer-backdrop').classList.remove('hidden');
    }

    function closeDrawer() {
      document.getElementById('side-drawer').classList.add('-translate-x-full');
      document.getElementById('drawer-backdrop').classList.add('hidden');
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') { closeDrawer(); closeAddModal(); }
    });

    // Menyegarkan nama pengguna dari GET /api/user (nama dari cache sudah tampil lebih dulu)
    async function loadUserName() {
      try {
        const user = await api('/user');
        if (user && user.name) {
          document.getElementById('sidebar-user-name').textContent = user.name;
          localStorage.setItem(USER_KEY, JSON.stringify(user));
        }
      } catch (err) {
        // Gagal dimuat: biarkan nama dari cache (bukan error fatal)
      }
    }

    
    // FUNGSI BANTUAN
   
    function escapeHTML(str) {
      return String(str ?? '').replace(/[&<>'"]/g, tag => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;'
      }[tag] || tag));
    }

    function formatDate(iso) {
      if (!iso) return '-';
      return new Date(iso).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
    }

    function getStyle(category) {
      if (!category) return NO_CATEGORY_STYLE;
      return BADGE_STYLES[category.id % BADGE_STYLES.length];
    }

    function getCategoryBadge(category) {
      const style = getStyle(category);
      const name = category ? category.name : 'Tanpa Kategori';
      return `<span class="px-2 py-0.5 rounded-full font-label-sm text-label-sm font-semibold ${style.badge} flex items-center gap-1 max-w-[10rem]">
                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0 ${style.dot}"></span>
                <span class="truncate">${escapeHTML(name)}</span>
              </span>`;
    }
        // Pesan singkat di atas layar (type: 'success' atau 'error'), hilang otomatis setelah 5 detik
    let toastTimeout;
    function showToast(message, type = 'success') {
      const toast = document.getElementById('toast-message');
      const icon = document.getElementById('toast-icon');
      document.getElementById('toast-text').textContent = message;
      icon.textContent = type === 'error' ? 'error' : 'check_circle';
      icon.className = 'material-symbols-outlined text-[18px] ' + (type === 'error' ? 'text-red-400' : 'text-emerald-400');
      toast.classList.remove('opacity-0', 'pointer-events-none');
      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => toast.classList.add('opacity-0', 'pointer-events-none'), 5000);
    }



    // Pemanggil API: otomatis menambahkan Bearer Token dan menangani error
    async function api(path, options = {}) {
      const token = localStorage.getItem(TOKEN_KEY);

      if (!token) {
        window.location.href = LOGIN_URL;
        throw new Error('Belum login');
      }

      const isForm = options.body instanceof FormData;

      const res = await fetch(API_BASE + path, {
        ...options,
        headers: {
          'Accept': 'application/json',
          ...(isForm ? {} : { 'Content-Type': 'application/json' }),
          'Authorization': `Bearer ${token}`,
          ...(options.headers || {}),
        },
      });

      if (res.status === 401) {
        localStorage.removeItem(TOKEN_KEY);
        sessionStorage.removeItem(NOTES_CACHE_KEY);
        window.location.href = LOGIN_URL;
        throw new Error('Sesi berakhir');
      }

      const json = await res.json().catch(() => ({}));

      if (!res.ok) {
        const firstError = json.errors ? Object.values(json.errors)[0][0] : null;
        throw new Error(firstError || json.message || 'Terjadi kesalahan pada server');
      }
      return json;
    }

    
    // MEMUAT DATA (cache dulu, lalu segarkan dari server)
    
    async function loadData() {
      errorState.classList.add('hidden');
      emptyState.classList.add('hidden');

      // 1) Tampilkan data cache jika ada (instan, tanpa loading)
      let hasCache = false;
      try {
        const cache = JSON.parse(sessionStorage.getItem(NOTES_CACHE_KEY) || 'null');
        if (cache && Array.isArray(cache.notes) && Array.isArray(cache.categories)) {
          notesData = cache.notes;
          categoriesData = cache.categories;
          fillCategorySelect();
          renderChips();
          renderNotes();
          hasCache = true;
        }
      } catch (e) {}

      // 2) Skeleton hanya muncul jika belum ada cache
      if (!hasCache) {
        noteCountLabel.textContent = 'Memuat catatan...';
        notesContainer.innerHTML = [1, 2, 3].map(() => `
          <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm animate-pulse flex flex-col gap-space-sm">
            <div class="h-4 w-1/3 rounded bg-surface-container"></div>
            <div class="h-5 w-2/3 rounded bg-surface-container"></div>
            <div class="h-4 w-full rounded bg-surface-container"></div>
          </div>`).join('');
      }

      // 3) Ambil data terbaru dari server (catatan & kategori paralel)
      try {
        const [notesRes, catsRes] = await Promise.all([api('/notes'), api('/categories')]);
        notesData = notesRes.data || [];
        categoriesData = catsRes.data || [];

        try {
          sessionStorage.setItem(NOTES_CACHE_KEY, JSON.stringify({ notes: notesData, categories: categoriesData }));
        } catch (e) {}

        fillCategorySelect();
        renderChips();
        renderNotes();
      } catch (err) {
        // Kalau sudah ada cache, biarkan tampilan cache; error hanya ditampilkan jika tidak ada data sama sekali
        if (!hasCache) {
          notesContainer.innerHTML = '';
          noteCountLabel.textContent = '';
          document.getElementById('errorMessage').textContent = err.message;
          errorState.classList.remove('hidden');
        }
      }
    }

    
    // RENDER CHIP KATEGORI
    
    function chipHTML(key, label, icon, active, count) {
      const cls = active
        ? 'active bg-primary text-on-primary shadow-sm'
        : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container';
      return `
        <button class="filter-chip ${cls} flex items-center gap-1.5 px-space-md py-1.5 rounded-full font-label-md text-label-md transition-all whitespace-nowrap shrink-0" data-category="${key}">
          <span class="material-symbols-outlined text-[16px]">${icon}</span>
          <span>${escapeHTML(label)}</span>
          ${count !== undefined ? `<span class="ml-1 text-[11px] px-1.5 rounded-full ${active ? 'bg-white/20 text-on-primary' : 'bg-surface-container text-on-surface-variant'}">${count}</span>` : ''}
        </button>`;
    }

    function renderChips() {
      const hasUncategorized = notesData.some(n => !n.category_id);

      let html = chipHTML('semua', 'Semua', 'apps', currentCategory === 'semua', notesData.length);

      categoriesData.forEach(cat => {
        html += chipHTML(String(cat.id), cat.name, 'folder', String(currentCategory) === String(cat.id));
      });

      if (hasUncategorized) {
        html += chipHTML('none', 'Tanpa Kategori', 'label_off', currentCategory === 'none');
      }

      chipContainer.innerHTML = html;

      chipContainer.querySelectorAll('.filter-chip').forEach(chip => {
        chip.addEventListener('click', () => {
          currentCategory = chip.dataset.category;
          renderChips();
          renderNotes();
        });
      });
    }

    
    // RENDER DAFTAR CATATAN
    
    function renderNotes() {
      const q = searchQuery.trim().toLowerCase();

      const filtered = notesData.filter(note => {
        let matchCat = true;

        if (currentCategory === 'none') {
          matchCat = !note.category_id;
        } else if (currentCategory !== 'semua') {
          matchCat = String(note.category_id) === String(currentCategory);
        }

        const categoryName = note.category?.name || '';

        const matchSearch = !q ||
          (note.title || '').toLowerCase().includes(q) ||
          (note.content || '').toLowerCase().includes(q) ||
          categoryName.toLowerCase().includes(q);

        return matchCat && matchSearch;
      });

      noteCountLabel.textContent = `Menampilkan ${filtered.length} catatan`;

      if (filtered.length === 0) {
        notesContainer.innerHTML = '';

        const isEmptyAll = notesData.length === 0;

        document.getElementById('emptyTitle').textContent =
          isEmptyAll ? 'Belum ada catatan' : 'Tidak ada catatan ditemukan';

        document.getElementById('emptyDesc').textContent = isEmptyAll
          ? 'Mulai tulis catatan pertamamu dengan menekan tombol tambah.'
          : 'Coba kata kunci atau kategori lain.';

        emptyState.classList.remove('hidden');
        return;
      }

      emptyState.classList.add('hidden');

      notesContainer.innerHTML = filtered.map(note => {
        const attCount = note.attachments ? note.attachments.length : 0;

        return `
        <div class="note-card bg-surface-container-lowest rounded-xl p-space-lg shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer flex flex-col gap-space-sm relative"
             onclick="window.location.href='/notes/${note.id}'">

          <div class="flex items-start justify-between gap-space-sm">
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-space-xs mb-1">
                ${getCategoryBadge(note.category)}
                <span class="text-outline text-label-sm">•</span>
                <span class="font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">
                  ${formatDate(note.created_at)}
                </span>
              </div>

              <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">
                ${escapeHTML(note.title)}
              </h2>
            </div>
          </div>

          <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed break-words">
            ${escapeHTML(note.content)}
          </p>

          <div class="flex items-center justify-between pt-1 mt-auto">
            <div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm bg-surface-container-low px-2 py-1 rounded-md">
              <span class="material-symbols-outlined text-[15px] text-primary">attach_file</span>
              <span>${attCount} Lampiran</span>
            </div>

            <div class="flex items-center text-outline">
              <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </div>
          </div>
        </div>`;
      }).join('');
    }

    // Hapus catatan lewat API, lalu perbarui tampilan dan cache
    async function deleteNote(id) {
      if (!confirm('Apakah Anda yakin ingin menghapus catatan ini?')) return;
      try {
        await api(`/notes/${id}`, { method: 'DELETE' });
        notesData = notesData.filter(n => n.id !== id);
        sessionStorage.removeItem(NOTES_CACHE_KEY);   // cache lama sudah tidak valid
        renderChips();
        renderNotes();
      } catch (err) {
        alert(err.message);
      }
    }

   
    // MODAL TAMBAH CATATAN
    
    const addModal = document.getElementById('addModal');
    const addModalCard = document.getElementById('addModalCard');
    const noteFileInput = document.getElementById('noteFileInput');

    function fillCategorySelect() {
      const select = document.getElementById('noteCategorySelect');
      const selected = select.value;
      select.innerHTML = '<option value="">Tanpa kategori</option>' +
        categoriesData.map(c => `<option value="${c.id}">${escapeHTML(c.name)}</option>`).join('');
      select.value = selected;
    }

    function updateFileLabel() {
      const errorEl = document.getElementById('noteFormError');
      let file = noteFileInput.files[0];

      if (file && file.size > 10 * 1024 * 1024) {
        noteFileInput.value = '';
        file = null;
        errorEl.textContent = 'Ukuran file maksimal 10 MB.';
        errorEl.classList.remove('hidden');
      }

      document.getElementById('noteFileLabel').textContent = file ? file.name : 'Lampirkan Berkas (PDF / Foto)';
      document.getElementById('noteFileBtn').textContent = file ? 'Ganti' : 'Pilih File';
    }

    function openAddModal() {
      document.getElementById('noteForm').reset();
      updateFileLabel();
      document.getElementById('noteFormError').classList.add('hidden');

      document.getElementById('noteCategorySelect').value = /^\d+$/.test(currentCategory) ? currentCategory : '';

      addModal.classList.remove('hidden');
      addModal.classList.add('flex');
      setTimeout(() => {
        addModalCard.classList.remove('translate-y-full');
        document.getElementById('noteTitleInput').focus();
      }, 10);
    }

    function closeAddModal() {
      if (addModal.classList.contains('hidden')) return;
      addModalCard.classList.add('translate-y-full');
      setTimeout(() => {
        addModal.classList.add('hidden');
        addModal.classList.remove('flex');
      }, 200);
    }

      // Menyimpan catatan baru: POST /api/notes, lalu (jika ada) unggah lampiran
      async function handleSaveNote(event) {
      event.preventDefault();

      const title = document.getElementById('noteTitleInput').value.trim();
      const content = document.getElementById('noteContentInput').value.trim();
      const categoryId = document.getElementById('noteCategorySelect').value;
      const errorEl = document.getElementById('noteFormError');
      const saveBtn = document.getElementById('noteSaveBtn');

      errorEl.classList.add('hidden');

      if (!title || !content) {
        errorEl.textContent = 'Judul dan isi catatan wajib diisi.';
        errorEl.classList.remove('hidden');
        return;
      }

      saveBtn.disabled = true;
      saveBtn.textContent = 'Menyimpan...';

      try {
        const res = await api('/notes', {
          method: 'POST',
          body: JSON.stringify({
            title: title,
            content: content,
            category_id: categoryId ? Number(categoryId) : null,
          }),
        });

        const file = noteFileInput.files[0];
        let attachWarning = '';
        if (file && res.data) {
          try {
            const formData = new FormData();
            formData.append('note_id', res.data.id);
            formData.append('file', file);
            await api('/attachments', { method: 'POST', body: formData });
          } catch (err) {
            attachWarning = 'Catatan tersimpan, tetapi lampiran gagal diunggah: ' + err.message;
          }
        }

        closeAddModal();
        showToast('Catatan berhasil ditambahkan');   // <- notif sukses (5 detik)
        await loadData();   // muat ulang daftar catatan dan perbarui cache
        if (attachWarning) showToast(attachWarning, 'error');
      } catch (err) {
        errorEl.textContent = err.message;
        errorEl.classList.remove('hidden');
      } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = 'Simpan Catatan';
      }
    }

    // Pencarian
    searchInput.addEventListener('input', (e) => {
      searchQuery = e.target.value;
      clearSearchBtn.classList.toggle('hidden', searchQuery.trim().length === 0);
      renderNotes();
    });

    clearSearchBtn.addEventListener('click', () => {
      searchInput.value = '';
      searchQuery = '';
      clearSearchBtn.classList.add('hidden');
      renderNotes();
    });

    // Titik awal: nama pengguna sudah diisi dari cache oleh script kecil di sidebar,
    // di sini tinggal disegarkan dari server dan memuat data catatan
    loadUserName();
    loadData();
  </script>
</body>
</html>