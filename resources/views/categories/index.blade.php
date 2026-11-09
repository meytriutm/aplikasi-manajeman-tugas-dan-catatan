<!DOCTYPE html>
<html class="light" lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta content="mobile_tab" name="shell-type">
  <title>Kategori - NoteTask</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&amp;family=Plus+Jakarta+Sans:wght@500..800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
  <style>
    @layer base{html,body{width:100%;margin:0;padding:0;background-color:#f8f9ff;-webkit-tap-highlight-color:transparent;}body{overscroll-behavior-y:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}
  </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script id="tailwind-config">
    tailwind.config = {darkMode: "class", theme: {extend: {"colors": {"primary-container": "#4338ca", "on-secondary-fixed": "#002114", "outline-variant": "#c7c4d7", "on-primary": "#ffffff", "tertiary": "#5c2f00", "surface-container": "#e5eeff", "background": "#f8f9ff", "on-surface": "#0b1c30", "primary-fixed-dim": "#c3c0ff", "secondary": "#006c4a", "tertiary-fixed": "#ffdcc3", "inverse-primary": "#c3c0ff", "secondary-fixed-dim": "#68dba9", "surface": "#f8f9ff", "outline": "#777586", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "surface-container-high": "#dce9ff", "on-primary-fixed-variant": "#372abf", "on-background": "#0b1c30", "primary": "#2a14b4", "on-secondary-fixed-variant": "#005137", "surface-container-highest": "#d3e4fe", "surface-dim": "#cbdbf5", "inverse-surface": "#213145", "error": "#ba1a1a", "surface-container-low": "#eff4ff", "on-tertiary-fixed-variant": "#6e3900", "on-tertiary-fixed": "#2f1500", "secondary-container": "#82f5c1", "on-secondary-container": "#00714e", "error-container": "#ffdad6", "inverse-on-surface": "#eaf1ff", "tertiary-fixed-dim": "#ffb77d", "tertiary-container": "#7d4200", "on-error-container": "#93000a", "on-tertiary-container": "#ffb477", "surface-container-lowest": "#ffffff", "on-primary-container": "#c1beff", "secondary-fixed": "#85f8c4", "surface-variant": "#d3e4fe", "primary-fixed": "#e3dfff", "surface-tint": "#5148d7", "on-primary-fixed": "#100069", "on-surface-variant": "#464554", "on-secondary": "#ffffff", "on-tertiary": "#ffffff"}, "borderRadius": {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"}, "spacing": {"gutter": "1rem", "margin-lg": "3rem", "gutter-lg": "2rem", "space-sm": "0.5rem", "gutter-md": "1.5rem", "margin": "1rem", "space-xl": "2rem", "margin-md": "2rem", "space-xs": "0.25rem", "space-lg": "1.25rem", "space-md": "0.75rem"}, "fontFamily": {"headline-xl-mobile": ["Plus Jakarta Sans"], "body-lg": ["Inter"], "label-md": ["Inter"], "display-lg-mobile": ["Plus Jakarta Sans"], "headline-sm": ["Plus Jakarta Sans"], "label-lg": ["Inter"], "headline-md": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "body-md": ["Inter"], "body-sm": ["Inter"], "headline-xl": ["Plus Jakarta Sans"], "label-sm": ["Inter"]}, "fontSize": {"headline-xl-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "body-lg": ["16px", {"lineHeight": "26px", "letterSpacing": "-0.005em", "fontWeight": "400"}], "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.015em", "fontWeight": "500"}], "display-lg-mobile": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "headline-sm": ["16px", {"lineHeight": "24px", "letterSpacing": "-0.005em", "fontWeight": "600"}], "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}], "headline-md": ["20px", {"lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600"}], "display-lg": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "body-md": ["14px", {"lineHeight": "22px", "letterSpacing": "0em", "fontWeight": "400"}], "body-sm": ["12px", {"lineHeight": "18px", "letterSpacing": "0.005em", "fontWeight": "400"}], "headline-xl": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "label-sm": ["11px", {"lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600"}]}}}};
  </script>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">

  <!-- Header -->
  <header class="fixed top-0 inset-x-0 lg:left-72 z-40 bg-surface/85 backdrop-blur-xl pt-safe shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="h-16 px-margin flex items-center justify-between gap-space-sm">
      <div class="flex items-center gap-space-xs min-w-0">
        <button aria-label="Buka Menu Navigasi" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface active:bg-surface-container-high transition-colors" type="button" onclick="openDrawer()">
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

  <!-- Backdrop drawer (hanya mobile/tablet) -->
  <div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm transition-opacity hidden lg:hidden" id="drawer-backdrop" onclick="closeDrawer()"></div>

  <!-- Sidebar User NoteTask -->
  <aside class="fixed top-0 bottom-0 left-0 z-50 w-72 max-w-[85vw] bg-surface-container-lowest shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] flex flex-col pt-safe pb-safe transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 lg:shadow-none lg:border-r lg:border-outline-variant/30" id="side-drawer">

    <!-- Profil Pengguna -->
    <div class="p-space-lg flex items-center justify-between bg-surface-container-low">
      <div class="flex items-center gap-space-md min-w-0">
        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
          <span class="material-symbols-outlined text-3xl">account_circle</span>
        </div>
        <div class="flex flex-col min-w-0">
          <span id="sidebar-user-name" class="font-headline-sm text-headline-sm text-on-surface truncate">Pengguna</span>
          <span class="font-label-sm text-label-sm text-primary font-semibold uppercase tracking-wider">User</span>
        </div>
      </div>
      <button aria-label="Tutup menu" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface" type="button" onclick="closeDrawer()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <!-- Menu Navigasi User -->
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

        <!-- Halaman aktif -->
        <a aria-current="page" class="flex items-center gap-space-md px-space-md h-11 rounded-lg bg-surface-container text-primary transition-colors" href="/categories">
          <span class="material-symbols-outlined text-[20px] text-secondary">category</span>
          <span class="font-label-lg text-label-lg">Kategori Saya</span>
        </a>

        <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" href="/notes">
          <span class="material-symbols-outlined text-[20px] text-secondary">sticky_note_2</span>
          <span class="font-label-lg text-label-lg">Catatan</span>
        </a>
      </div>

      <div class="pt-space-sm">
        <p class="px-space-md mb-2 font-label-sm text-label-sm text-outline uppercase tracking-wider font-semibold">Akun</p>

        <!-- Logout langsung -->
        <button
          class="w-full flex items-center gap-space-md px-space-md h-11 rounded-lg text-left text-error hover:bg-error-container/40 active:bg-error-container transition-colors disabled:opacity-70 disabled:cursor-not-allowed"
          onclick="logoutUser(this)"
          type="button"
        >
          <span class="material-symbols-outlined text-[20px]">logout</span>
          <span class="font-label-lg text-label-lg">Logout</span>
        </button>
      </div>
    </nav>

    <div class="p-space-md bg-surface-container-lowest flex items-center justify-between text-outline">
      <span class="font-label-sm text-label-sm">NoteTask</span>
      <span class="font-label-sm text-label-sm">Personal</span>
    </div>
  </aside>

  <!-- Konten utama -->
  <main class="flex-1 flex flex-col relative w-full min-w-0 lg:ml-72 lg:w-[calc(100%-18rem)] pt-[calc(4rem+env(safe-area-inset-top,0px))] pb-[calc(6rem+env(safe-area-inset-bottom,0px))] px-margin md:px-margin-md lg:px-margin-lg bg-surface">
    <div class="flex flex-col w-full max-w-xl mx-auto space-y-space-lg pt-space-md">

      <!-- Judul -->
      <div>
        <h1 class="font-headline-xl-mobile text-[26px] font-bold text-on-surface tracking-tight">Kategori</h1>
        <p class="font-body-md text-on-surface-variant text-[14px] mt-0.5">Kelola kategori pribadimu</p>
      </div>

      <!-- Total kategori -->
      <div class="p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 shadow-sm space-y-1">
        <span class="font-label-md text-on-surface-variant text-[13px] font-medium">Total Kategori</span>
        <div class="font-headline-xl text-[36px] font-bold text-on-surface leading-tight tracking-tight" id="total-count-display">0</div>
        <span class="font-body-sm text-[12px] text-outline block">Kategori tersimpan di akunmu</span>
      </div>

      <!-- Daftar kategori -->
      <div class="space-y-space-sm pt-2">
        <h2 class="font-headline-sm text-[16px] font-bold text-on-surface">Daftar Kategori</h2>
        <div class="flex flex-col space-y-3" id="category-cards-container" aria-live="polite">
          <div class="p-space-lg rounded-2xl bg-surface-container-lowest border border-outline-variant/40 text-center">
            <p class="font-body-sm text-[13px] text-on-surface-variant">Memuat kategori...</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Menu aksi (Edit / Hapus) -->
    <div class="fixed z-50 hidden w-44 rounded-xl bg-surface-container-lowest border border-outline-variant/40 shadow-xl overflow-hidden py-1.5" id="action-dropdown">
      <button class="w-full min-h-11 px-3.5 py-2.5 text-left flex items-center gap-2.5 text-[14px] text-on-surface hover:bg-surface-container-low transition-colors" onclick="handleEditFromMenu()" type="button">
        <span class="material-symbols-outlined text-[19px] text-primary">edit</span>
        <span>Edit Kategori</span>
      </button>
      <button class="w-full min-h-11 px-3.5 py-2.5 text-left flex items-center gap-2.5 text-[14px] text-error hover:bg-error-container/30 transition-colors" onclick="handleDeleteFromMenu()" type="button">
        <span class="material-symbols-outlined text-[19px] text-error">delete</span>
        <span>Hapus Kategori</span>
      </button>
    </div>

    <!-- Modal tambah / edit kategori -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden" id="category-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title" onclick="if (event.target === this) closeCategoryModal()">
      <div class="w-full max-w-sm max-h-[calc(100vh-2rem)] bg-surface-container-lowest rounded-2xl shadow-2xl border border-outline-variant/40 overflow-hidden flex flex-col">

        <div class="px-5 py-3 bg-surface-container-low flex items-center justify-between border-b border-outline-variant/30 flex-shrink-0">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-[22px]">category</span>
            <h3 class="font-headline-sm text-[16px] text-on-surface font-semibold" id="modal-title">Tambah Kategori Baru</h3>
          </div>
          <button aria-label="Tutup" class="w-11 h-11 -mr-2 flex items-center justify-center rounded-lg text-outline hover:text-on-surface transition-colors" onclick="closeCategoryModal()" type="button">
            <span class="material-symbols-outlined text-[20px]">close</span>
          </button>
        </div>

        <div class="p-5 space-y-4 overflow-y-auto">
          <!-- Pratinjau -->
          <div class="p-3 rounded-xl bg-surface-container-low border border-outline-variant/40 flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 shadow-sm transition-all" id="modal-badge-preview">
              <span aria-hidden="true" class="material-symbols-outlined text-[22px]" id="modal-icon-preview">category</span>
            </div>
            <span class="font-headline-sm text-[14px] font-semibold text-on-surface truncate" id="modal-name-preview">Nama Kategori</span>
          </div>

          <!-- Nama -->
          <div class="space-y-1.5">
            <label class="font-label-md text-[13px] text-on-surface font-semibold" for="cat-name-input">Nama Kategori</label>
            <input class="w-full h-11 px-3 rounded-lg border border-outline-variant/60 bg-surface-container-lowest text-on-surface placeholder:text-outline text-base focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" id="cat-name-input" maxlength="255" oninput="updateModalPreview()" placeholder="Contoh: Belanja, Proyek" type="text">
            <p class="hidden font-body-sm text-[12px] text-error" id="cat-name-error"></p>
          </div>

          <!-- Warna -->
          <div class="space-y-1.5">
            <span class="font-label-md text-[13px] text-on-surface font-semibold">Pilih Warna</span>
            <div class="grid grid-cols-5 gap-2" id="color-selectors"></div>
          </div>

          <!-- Ikon -->
          <div class="space-y-1.5">
            <span class="font-label-md text-[13px] text-on-surface font-semibold">Pilih Ikon</span>
            <div class="grid grid-cols-5 gap-2" id="icon-selectors"></div>
          </div>
        </div>

        <div class="px-5 py-3 bg-surface-container-low flex items-center justify-end gap-2 border-t border-outline-variant/30 flex-shrink-0">
          <button class="h-11 px-4 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high font-label-md text-[13px] font-medium transition-colors" onclick="closeCategoryModal()" type="button">
            Batal
          </button>
          <button class="h-11 px-4 rounded-lg bg-primary text-on-primary font-label-md text-[13px] font-medium shadow-sm hover:bg-primary-container transition-all flex items-center gap-1.5 disabled:opacity-70 disabled:cursor-not-allowed" id="save-category-btn" onclick="saveCategoryModal()" type="button">
            <span class="material-symbols-outlined text-[16px]">check</span>
            <span id="save-category-label">Simpan</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Modal konfirmasi hapus -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden" id="delete-modal" role="dialog" aria-modal="true" aria-labelledby="delete-title" onclick="if (event.target === this) toggleDeleteModal(false)">
      <div class="w-full max-w-sm bg-surface-container-lowest rounded-2xl shadow-2xl border border-outline-variant/40 overflow-hidden p-5 flex flex-col space-y-4">
        <div class="w-11 h-11 rounded-xl bg-error-container text-error flex items-center justify-center">
          <span class="material-symbols-outlined text-[24px]">delete</span>
        </div>
        <div class="space-y-1">
          <h3 class="font-headline-sm text-[16px] text-on-surface font-semibold" id="delete-title">Hapus Kategori?</h3>
          <p class="font-body-sm text-[13px] text-on-surface-variant">
            Apakah Anda yakin ingin menghapus kategori <span class="font-bold text-on-surface break-words" id="del-cat-title"></span>?
          </p>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button class="h-11 px-4 rounded-lg bg-surface-container text-on-surface hover:bg-surface-container-high font-label-md text-[13px] font-medium transition-colors" onclick="toggleDeleteModal(false)" type="button">
            Batal
          </button>
          <button class="h-11 px-4 rounded-lg bg-error text-on-error hover:opacity-90 font-label-md text-[13px] font-medium transition-colors flex items-center gap-1 disabled:opacity-70 disabled:cursor-not-allowed" id="confirm-delete-btn" onclick="confirmDeleteCategory()" type="button">
            <span class="material-symbols-outlined text-[16px]">delete</span>
            <span id="confirm-delete-label">Ya, Hapus</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Notifikasi -->
    <div aria-live="polite" class="fixed top-[calc(4.5rem+env(safe-area-inset-top,0px))] left-1/2 -translate-x-1/2 w-max max-w-[calc(100%-2rem)] z-50 hidden items-center gap-2 px-4 py-2.5 rounded-2xl bg-inverse-surface text-inverse-on-surface shadow-xl font-label-md text-[13px]" id="toast" role="status">
      <span class="material-symbols-outlined text-[18px] text-secondary-fixed" id="toast-icon">check_circle</span>
      <span id="toast-msg"></span>
    </div>

  <!-- Tombol tambah kategori (disamakan dengan tombol tambah di halaman Catatan) -->
  <button aria-label="Tambah Kategori Baru" type="button" onclick="openCategoryModal()" class="fixed right-4 md:right-8 bottom-[calc(1.5rem+env(safe-area-inset-bottom,0px))] z-30 w-14 h-14 rounded-full bg-primary text-on-primary shadow-xl hover:bg-primary-container active:scale-95 transition-all flex items-center justify-center">
    <span class="material-symbols-outlined text-[28px]">add</span>
  </button>
  

  <script src="/js/notetask.js"></script>


  <script>
    const API_URL = '/api/categories';

    // Pilihan warna (disimpan ke database sebagai kode hex)
    const PALETTE = [
      { hex: '#2563EB', label: 'Biru' },
      { hex: '#D97706', label: 'Kuning' },
      { hex: '#059669', label: 'Hijau' },
      { hex: '#E11D48', label: 'Merah muda' },
      { hex: '#808080', label: 'Abu-abu' }
    ];

    // Pilihan ikon (nama ikon Material Symbols, disimpan ke database)
    const ICONS = [
      'category', 'person', 'menu_book', 'business_center', 'shopping_cart',
      'favorite', 'lock', 'home', 'school', 'fitness_center'
    ];

    let categories = [];
    let activeMenuId = null;
    let editingId = null;
    let selectedColor = PALETTE[0].hex;
    let selectedIcon = ICONS[0];

    // Nama pengguna di sidebar 

    // Memasang nama ke sidebar
    function setSidebarName(name) {
      if (!name) return;
      const el = document.getElementById('sidebar-user-name');
      if (el) el.textContent = name;
    }

    // Langkah 1: dipasang langsung dari cache browser, tanpa menunggu server
    // (dipanggil di bawah, sebelum halaman sempat tampil)
    function applyCachedSidebarUser() {
      try {
        const cached = JSON.parse(localStorage.getItem('notetask_user') || 'null');
        if (cached && cached.name) setSidebarName(cached.name);
      } catch (e) { /* data cache rusak, abaikan */ }
    }

    // Langkah 2: ambil dari API untuk memastikan datanya terbaru, lalu simpan ke cache
    async function loadSidebarUser() {
      try {
        const user = await apiRequest('/api/user');
        setSidebarName(user.name);
        localStorage.setItem('notetask_user', JSON.stringify(user));
      } catch (error) {
        console.error('Error mengambil nama pengguna:', error);
      }
    }

    // Dipasang sekarang juga, sebelum fungsi lain dijalankan
    applyCachedSidebarUser();

    // Fungsi bantu 

    // Mengamankan teks sebelum ditampilkan ke HTML
    function escapeText(text) {
      return String(text ?? '').replace(/[&<>"']/g, function (char) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[char];
      });
    }

    // Memastikan warna berupa kode hex 6 digit, kalau tidak pakai abu-abu
    function safeColor(color) {
      return /^#[0-9a-fA-F]{6}$/.test(String(color || '')) ? color : '#808080';
    }

    function redirectToLogin() {
      localStorage.removeItem('notetask_token');
      localStorage.removeItem('notetask_user');
      window.location.href = '/auth/login';
    }

    // Permintaan ke API Laravel dengan Bearer Token
    async function apiRequest(url, options = {}) {
      const token = localStorage.getItem('notetask_token');

      if (!token) {
        redirectToLogin();
        throw new Error('Sesi login tidak ditemukan.');
      }

      const headers = {
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`
      };

      if (options.body) headers['Content-Type'] = 'application/json';

      const response = await fetch(url, {
        method: options.method || 'GET',
        headers: headers,
        body: options.body ? JSON.stringify(options.body) : undefined
      });

      if (response.status === 401) {
        redirectToLogin();
        throw new Error('Sesi login berakhir.');
      }

      let result = {};
      try { result = await response.json(); } catch (e) { /* respons tanpa isi */ }

      if (!response.ok) {
        const error = new Error(result.message || 'Terjadi kesalahan pada server.');
        error.status = response.status;
        error.errors = result.errors || null;
        throw error;
      }

      return result;
    }

    //  Sidebar 

    function openDrawer() {
      document.getElementById('side-drawer').classList.remove('-translate-x-full');
      document.getElementById('drawer-backdrop').classList.remove('hidden');
    }

    function closeDrawer() {
      document.getElementById('side-drawer').classList.add('-translate-x-full');
      document.getElementById('drawer-backdrop').classList.add('hidden');
    }

    

    //  Daftar kategori 

    function buildCategoryCard(cat) {
      const id = Number(cat.id);
      const color = safeColor(cat.color);
      const icon = escapeText(cat.icon || 'category');
      const name = escapeText(cat.name);

      return `
        <div class="category-item relative p-3.5 sm:p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 shadow-sm flex items-center justify-between gap-3 transition-all hover:shadow-md" data-id="${id}">
          <div class="flex items-center gap-3.5 min-w-0">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0" style="background-color:${color}26;color:${color}">
              <span aria-hidden="true" class="material-symbols-outlined text-[24px]">${icon}</span>
            </div>
            <h3 class="font-headline-sm text-[15px] font-semibold text-on-surface leading-snug truncate">${name}</h3>
          </div>
          <div class="relative shrink-0">
            <button aria-label="Opsi kategori ${name}" class="w-11 h-11 flex items-center justify-center rounded-lg text-outline hover:text-on-surface hover:bg-surface-container-low transition-colors" onclick="openMenu(event, ${id})" type="button">
              <span class="material-symbols-outlined text-[22px]">more_vert</span>
            </button>
          </div>
        </div>
      `;
    }

    function renderCategories() {
      const container = document.getElementById('category-cards-container');
      document.getElementById('total-count-display').textContent = categories.length;

      if (categories.length === 0) {
        container.innerHTML = `
          <div class="p-space-lg rounded-2xl bg-surface-container-lowest border border-dashed border-outline-variant text-center flex flex-col items-center gap-space-md">
            <p class="font-body-sm text-[13px] text-on-surface-variant">Belum ada kategori. Buat kategori pertamamu, yuk!</p>
          </div>
        `;
        return;
      }

      container.innerHTML = categories.map(buildCategoryCard).join('');
    }

    // Mengambil semua kategori milik pengguna dari database
    async function loadCategories() {
      const container = document.getElementById('category-cards-container');

      try {
        const result = await apiRequest(API_URL);
        categories = Array.isArray(result.data) ? result.data : [];
        renderCategories();
      } catch (error) {
        console.error('Error memuat kategori:', error);

        container.innerHTML = `
          <div class="p-space-lg rounded-2xl bg-error-container/40 text-center flex flex-col items-center gap-space-md">
            <p class="font-body-sm text-[13px] text-on-error-container">Kategori gagal dimuat. Periksa koneksi lalu coba lagi.</p>
            <button class="inline-flex items-center gap-1 h-11 px-space-lg rounded-lg bg-surface-container text-on-surface font-label-lg text-label-lg hover:bg-surface-container-high transition-colors" onclick="loadCategories()" type="button">
              <span class="material-symbols-outlined text-[18px]">refresh</span>
              <span>Coba Lagi</span>
            </button>
          </div>
        `;
      }
    }

    //  Menu aksi 

    function openMenu(event, id) {
      event.stopPropagation();
      activeMenuId = Number(id);

      const dropdown = document.getElementById('action-dropdown');
      const rect = event.currentTarget.getBoundingClientRect();

      dropdown.style.top = (rect.bottom + 6) + 'px';
      dropdown.style.right = (window.innerWidth - rect.right) + 'px';
      dropdown.classList.remove('hidden');
    }

    function hideMenu() {
      document.getElementById('action-dropdown').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
      const dropdown = document.getElementById('action-dropdown');
      if (dropdown && !dropdown.contains(event.target)) hideMenu();
    });

    window.addEventListener('scroll', hideMenu, { passive: true });

    function handleEditFromMenu() {
      hideMenu();
      const category = categories.find(c => Number(c.id) === activeMenuId);
      if (category) openCategoryModal(category);
    }

    function handleDeleteFromMenu() {
      hideMenu();
      const category = categories.find(c => Number(c.id) === activeMenuId);
      if (!category) return;

      document.getElementById('del-cat-title').textContent = category.name;
      toggleDeleteModal(true);
    }

    //  Modal tambah / edit 

    function renderColorPicker() {
      document.getElementById('color-selectors').innerHTML = PALETTE.map(item => {
        const isSelected = item.hex.toLowerCase() === selectedColor.toLowerCase();

        return `
          <button aria-label="${item.label}" aria-pressed="${isSelected}" class="h-11 rounded-lg border-2 ${isSelected ? 'border-primary' : 'border-transparent'} flex items-center justify-center font-bold" onclick="selectColorTheme('${item.hex}')" style="background-color:${item.hex}26;color:${item.hex}" type="button">
            <span class="material-symbols-outlined text-[18px] ${isSelected ? '' : 'hidden'}">check</span>
          </button>
        `;
      }).join('');
    }

    function renderIconPicker() {
      document.getElementById('icon-selectors').innerHTML = ICONS.map(icon => {
        const isSelected = icon === selectedIcon;
        const style = isSelected
          ? 'bg-primary text-on-primary'
          : 'bg-surface-container-low text-on-surface hover:bg-surface-container';

        return `
          <button aria-label="Ikon ${icon}" aria-pressed="${isSelected}" class="h-11 rounded-lg ${style} flex items-center justify-center" onclick="selectIconVal('${icon}')" type="button">
            <span class="material-symbols-outlined text-[18px]">${icon}</span>
          </button>
        `;
      }).join('');
    }

    function selectColorTheme(hex) {
      selectedColor = hex;
      renderColorPicker();
      updateModalPreview();
    }

    function selectIconVal(icon) {
      selectedIcon = icon;
      renderIconPicker();
      updateModalPreview();
    }

    function updateModalPreview() {
      const nameValue = document.getElementById('cat-name-input').value.trim() || 'Nama Kategori';
      const color = safeColor(selectedColor);

      document.getElementById('modal-name-preview').textContent = nameValue;
      document.getElementById('modal-icon-preview').textContent = selectedIcon;

      const badge = document.getElementById('modal-badge-preview');
      badge.style.backgroundColor = color + '26';
      badge.style.color = color;
    }

    function setNameError(message) {
      const error = document.getElementById('cat-name-error');
      error.textContent = message || '';
      error.classList.toggle('hidden', !message);
    }

    // Membuka modal. Tanpa argumen = tambah baru, dengan argumen = edit kategori itu
    function openCategoryModal(category) {
      const isEdit = !!category;

      editingId = isEdit ? Number(category.id) : null;
      selectedColor = isEdit ? safeColor(category.color) : PALETTE[0].hex;
      selectedIcon = isEdit ? (category.icon || ICONS[0]) : ICONS[0];

      document.getElementById('modal-title').textContent = isEdit ? 'Edit Kategori' : 'Tambah Kategori Baru';
      document.getElementById('cat-name-input').value = isEdit ? category.name : '';
      setNameError('');

      renderColorPicker();
      renderIconPicker();
      updateModalPreview();

      document.getElementById('category-modal').classList.remove('hidden');
      setTimeout(() => document.getElementById('cat-name-input').focus(), 50);
    }

    function closeCategoryModal() {
      document.getElementById('category-modal').classList.add('hidden');
      editingId = null;
    }

    function setSaving(isSaving) {
      document.getElementById('save-category-btn').disabled = isSaving;
      document.getElementById('save-category-label').textContent = isSaving ? 'Menyimpan...' : 'Simpan';
    }

    // Menyimpan kategori baru atau perubahan ke database
    async function saveCategoryModal() {
      const nameInput = document.getElementById('cat-name-input');
      const name = nameInput.value.trim();

      setNameError('');

      if (!name) {
        setNameError('Nama kategori wajib diisi.');
        nameInput.focus();
        return;
      }

      const payload = {
        name: name,
        color: safeColor(selectedColor),
        icon: selectedIcon
      };

      setSaving(true);

      try {
        if (editingId !== null) {
          const result = await apiRequest(`${API_URL}/${editingId}`, { method: 'PUT', body: payload });
          categories = categories.map(c => Number(c.id) === editingId ? result.data : c);
          showToast('Kategori berhasil diperbarui!');
        } else {
          const result = await apiRequest(API_URL, { method: 'POST', body: payload });
          categories.unshift(result.data);
          showToast('Kategori baru berhasil ditambahkan!');
        }

        renderCategories();
        closeCategoryModal();

      } catch (error) {
        console.error('Error menyimpan kategori:', error);

        if (error.status === 422 && error.errors && error.errors.name) {
          setNameError(error.errors.name[0]);
        } else {
          showToast(error.message || 'Kategori gagal disimpan.', 'error');
        }
      } finally {
        setSaving(false);
      }
    }

    //  Hapus 

    function toggleDeleteModal(show) {
      document.getElementById('delete-modal').classList.toggle('hidden', !show);
    }

    async function confirmDeleteCategory() {
      if (activeMenuId === null) return;

      const id = activeMenuId;
      const button = document.getElementById('confirm-delete-btn');
      const label = document.getElementById('confirm-delete-label');

      button.disabled = true;
      label.textContent = 'Menghapus...';

      try {
        await apiRequest(`${API_URL}/${id}`, { method: 'DELETE' });

        categories = categories.filter(c => Number(c.id) !== id);
        renderCategories();
        showToast('Kategori berhasil dihapus!');

      } catch (error) {
        console.error('Error menghapus kategori:', error);
        showToast(error.message || 'Kategori gagal dihapus.', 'error');
      } finally {
        button.disabled = false;
        label.textContent = 'Ya, Hapus';
        toggleDeleteModal(false);
        activeMenuId = null;
      }
    }

    //  Notifikasi 

    let toastTimer;
    function showToast(message, type = 'success') {
      const toast = document.getElementById('toast');

      document.getElementById('toast-msg').textContent = message;
      document.getElementById('toast-icon').textContent = type === 'error' ? 'error' : 'check_circle';

      toast.classList.remove('hidden');
      toast.classList.add('flex');

      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => {
        toast.classList.remove('flex');
        toast.classList.add('hidden');
      }, 3200);
    }

    // Menutup sidebar, menu, atau modal dengan tombol Escape
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        closeDrawer();
        hideMenu();
        closeCategoryModal();
        toggleDeleteModal(false);
      }
    });

    // Memuat data saat halaman dibuka
    document.addEventListener('DOMContentLoaded', function () {
      loadSidebarUser();
      loadCategories();
    });
  </script>
</body>
</html>