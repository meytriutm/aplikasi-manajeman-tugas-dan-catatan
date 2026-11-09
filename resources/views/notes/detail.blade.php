<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport" />
  <meta content="mobile_stack" name="shell-type" />
  <title>Catatan - NoteTask</title>

  <!-- Font ikon dan font teks -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@500;600;700&amp;display=swap" rel="stylesheet" />

  <style>
    /* Pakai @@ supaya Blade menampilkannya sebagai @layer biasa di browser */
    @@layer base{html,body{width:100%;margin:0;padding:0;}body{overscroll-behavior-y:none;-webkit-tap-highlight-color:transparent;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}}::-webkit-scrollbar{display:none;}
  </style>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = { darkMode: "class", theme: { extend: { "borderRadius": { "DEFAULT": "0.375rem", "lg": "0.625rem", "xl": "1rem", "2xl": "1.25rem", "full": "9999px" }, "fontFamily": { "body": ["Inter", "sans-serif"], "heading": ["Plus Jakarta Sans", "sans-serif"] } } } };
  </script>
</head>
<body class="bg-[#f8f9fc] font-body text-[#1e293b] flex flex-col min-h-screen antialiased">

  <!-- ================= HEADER (tetap di atas) ================= -->
  <header class="fixed top-0 inset-x-0 z-40 pt-safe bg-white/90 backdrop-blur-md border-b border-slate-200/70 shadow-sm">
    <div class="h-14 px-4 flex items-center max-w-2xl mx-auto">
      <div class="flex items-center gap-2 min-w-0">
        <!-- Tombol kembali (tujuannya diatur oleh JavaScript sesuai mode halaman) -->
        <a aria-label="Kembali" class="w-10 h-10 -ml-1 flex items-center justify-center rounded-xl text-slate-700 hover:bg-slate-100 active:scale-95 transition flex-shrink-0" href="/notes" id="back-link">
          <span class="material-symbols-outlined text-[22px]">arrow_back</span>
        </a>
        <h1 class="font-heading font-semibold text-[17px] text-slate-900 tracking-tight truncate" id="page-title">Detail Catatan</h1>
      </div>
    </div>
  </header>

  <!-- ================= TOAST (pesan singkat) ================= -->
  <div class="fixed top-[4.5rem] left-1/2 -translate-x-1/2 z-50 max-w-[90vw] bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-lg text-xs font-medium flex items-center gap-2 opacity-0 pointer-events-none transition-all duration-300" id="toast-message">
    <span class="material-symbols-outlined text-[18px] text-emerald-400" id="toast-icon">check_circle</span>
    <span id="toast-text"></span>
  </div>

  <!-- ================= KONTEN UTAMA =================
       Isinya (tampilan detail atau form) dibuat oleh JavaScript sesuai mode -->
  <main class="flex flex-col w-full pt-[calc(3.5rem+env(safe-area-inset-top,0px))] pb-safe min-h-screen">
    <div class="px-4 py-4 flex flex-col gap-4 max-w-2xl mx-auto w-full" id="page-root">
      <!-- Skeleton loading -->
      <div class="bg-white rounded-2xl p-5 border border-slate-200/80 animate-pulse flex flex-col gap-3">
        <div class="h-5 w-1/3 rounded bg-slate-100"></div>
        <div class="h-7 w-3/4 rounded bg-slate-100"></div>
        <div class="h-4 w-full rounded bg-slate-100"></div>
        <div class="h-4 w-full rounded bg-slate-100"></div>
        <div class="h-4 w-2/3 rounded bg-slate-100"></div>
      </div>
    </div>
  </main>

  <!-- Input file tersembunyi untuk memilih lampiran (hanya PDF dan foto, sesuai aturan controller) -->
  <input accept=".pdf,.jpg,.jpeg,.png,.gif,.webp,.bmp" class="hidden" id="file-input" multiple type="file" onchange="handleFilesChosen(this)">

  
  <!-- Preview lampiran di dalam aplikasi -->
  <div id="file-preview" class="hidden fixed inset-0 z-[60] bg-slate-100 flex flex-col">
      <header class="h-14 bg-white border-b border-slate-200 flex items-center px-4 gap-3 shrink-0">
          <button type="button" onclick="closeFilePreview()"
                  class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-100">
              <span class="material-symbols-outlined">arrow_back</span>
          </button>

          <h2 class="font-semibold text-sm text-slate-900 truncate" id="preview-title">
              Preview Lampiran
          </h2>
      </header>

      <div class="flex-1 overflow-auto flex items-center justify-center p-3" id="preview-content">
      </div>
  </div>


  <!-- ================= DIALOG KONFIRMASI HAPUS CATATAN ================= -->
  <div class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-200" id="delete-modal" onclick="if (event.target === this) closeDeleteModal()">
    <div class="bg-white rounded-2xl max-w-sm w-full p-5 border border-slate-100 shadow-xl flex flex-col gap-4 transform scale-95 transition-transform duration-200" id="delete-modal-content">
      <div class="w-11 h-11 rounded-full bg-red-50 text-red-600 flex items-center justify-center">
        <span class="material-symbols-outlined text-[24px]">delete</span>
      </div>
      <div class="flex flex-col gap-1">
        <h4 class="font-heading font-semibold text-base text-slate-900">Hapus Catatan Ini?</h4>
        <p class="text-xs text-slate-500 leading-relaxed break-words" id="delete-modal-text">Catatan beserta lampiran akan dihapus secara permanen.</p>
      </div>
      <div class="flex items-center justify-end gap-2 pt-2">
        <button class="h-9 px-3.5 rounded-lg text-xs font-medium text-slate-700 hover:bg-slate-100 transition" type="button" onclick="closeDeleteModal()">Batal</button>
        <button class="h-9 px-4 rounded-lg bg-red-600 text-white hover:bg-red-700 text-xs font-semibold flex items-center gap-1 transition shadow-sm disabled:opacity-70 disabled:cursor-not-allowed" id="modal-confirm-delete" type="button" onclick="confirmDeleteNote()">
          <span>Ya, Hapus</span>
        </button>
      </div>
    </div>
  </div>

  <script>
    
    // KONFIGURASI
   
    // Mode dan id dikirim dari web.php: create / show / edit
    const PAGE_MODE = @json($mode ?? 'show');
    const NOTE_ID = @json($id ?? null);

    const API_BASE = '/api';
    const TOKEN_KEY = 'notetask_token';   // sama dengan key di dashboard dan halaman catatan
    const LOGIN_URL = '/';
    const MAX_FILE_SIZE = 10 * 1024 * 1024;   // 10 MB, sesuai max:10240 di AttachmentController

    // Warna badge kategori (diputar berdasarkan id kategori, sama seperti halaman daftar catatan)
    const BADGE_STYLES = [
      { badge: 'bg-indigo-50 text-indigo-700 border-indigo-100',  dot: 'bg-indigo-600' },
      { badge: 'bg-amber-50 text-amber-700 border-amber-100',     dot: 'bg-amber-600' },
      { badge: 'bg-emerald-50 text-emerald-700 border-emerald-100', dot: 'bg-emerald-600' },
      { badge: 'bg-rose-50 text-rose-700 border-rose-100',        dot: 'bg-rose-600' },
    ];
    const NO_CATEGORY_STYLE = { badge: 'bg-slate-100 text-slate-600 border-slate-200', dot: 'bg-slate-400' };

   
    // STATE
    
    let note = null;           // data catatan 
    let categories = [];       // daftar kategori milik pengguna
    let userName = '';         // nama pengguna yang login
    let pendingFiles = [];     // lampiran yang dipilih sebelum catatan dibuat (mode create)
    let toastTimeout;

    const pageRoot = document.getElementById('page-root');

    
    // FUNGSI BANTUAN
    

    // Mengubah karakter berbahaya jadi aman supaya isi catatan tidak bisa menyisipkan HTML/script (XSS)
    function escapeHTML(str) {
      return String(str ?? '').replace(/[&<>'"]/g, tag => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;'
      }[tag] || tag));
    }

    // Format tanggal dan jam WIB, contoh: 26 Okt 2026 • 14:15 WIB
    function formatDateTime(iso) {
      if (!iso) return '-';
      const d = new Date(iso);
      const date = d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric', timeZone: 'Asia/Jakarta' });
      const time = d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Asia/Jakarta' }).replace('.', ':');
      return `${date} • ${time} WIB`;
    }

    // Perkiraan waktu baca (200 kata per menit, minimal 1 menit)
    function readingTime(text) {
      const words = String(text || '').trim().split(/\s+/).filter(Boolean).length;
      return Math.max(1, Math.ceil(words / 200));
    }

    // Mengubah ukuran byte menjadi teks, contoh: 2.4 MB
    function formatFileSize(bytes) {
      const n = Number(bytes) || 0;
      if (n < 1024) return `${n} B`;
      if (n < 1024 * 1024) return `${Math.round(n / 1024)} KB`;
      return `${(n / (1024 * 1024)).toFixed(1)} MB`;
    }

    // Ikon, warna, dan label berdasarkan jenis file (file_type berisi MIME, misalnya application/pdf)
    function fileTypeInfo(mime) {
      const t = mime || '';
      if (t === 'application/pdf') {
        return { icon: 'picture_as_pdf', box: 'bg-red-50 text-red-600 border-red-100', label: 'PDF Document' };
      }
      if (t.startsWith('image/')) {
        return { icon: 'image', box: 'bg-indigo-50 text-indigo-600 border-indigo-100', label: t.split('/')[1].toUpperCase() + ' Image' };
      }
      return { icon: 'description', box: 'bg-slate-100 text-slate-600 border-slate-200', label: 'Berkas' };
    }

    // Alamat file lampiran di storage (butuh php artisan storage:link)
    function attachmentUrl(att) {
      return '/storage/' + encodeURI(att.file_path);
    }


        
    // Membuka file lampiran di dalam aplikasi
    function openFilePreview(url, fileName, fileType) {
        const preview = document.getElementById('file-preview');
        const content = document.getElementById('preview-content');

        document.getElementById('preview-title').textContent = fileName;

        // Menampilkan gambar atau PDF sesuai jenis file
        if (fileType && fileType.startsWith('image/')) {
            content.innerHTML = `
                <img src="${url}" alt="${escapeHTML(fileName)}"
                    class="max-w-full max-h-full object-contain rounded-lg shadow-sm">
            `;
        } else if (fileType === 'application/pdf') {
            content.innerHTML = `
                <iframe src="${url}"
                        class="w-full h-full min-h-[70vh] bg-white rounded-lg"
                        title="${escapeHTML(fileName)}">
                </iframe>
            `;
        } else {
            content.innerHTML = `
                <p class="text-sm text-slate-500">
                    Format file ini belum bisa ditampilkan.
                </p>
            `;
        }

        preview.classList.remove('hidden');
    }

// Menutup preview dan kembali ke halaman sebelumnya di aplikasi
function closeFilePreview() {
    const preview = document.getElementById('file-preview');

    preview.classList.add('hidden');
    document.getElementById('preview-content').innerHTML = '';
}


    // Badge kategori
    function categoryBadge(category) {
      const style = category ? BADGE_STYLES[category.id % BADGE_STYLES.length] : NO_CATEGORY_STYLE;
      const name = category ? category.name : 'Tanpa Kategori';
      return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold border max-w-[12rem] ${style.badge}">
                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0 ${style.dot}"></span>
                <span class="truncate">${escapeHTML(name)}</span>
              </span>`;
    }

    // Pesan singkat di atas layar (type: 'success' atau 'error')
    function showToast(message, type = 'success') {
      const toast = document.getElementById('toast-message');
      const icon = document.getElementById('toast-icon');
      document.getElementById('toast-text').textContent = message;
      icon.textContent = type === 'error' ? 'error' : 'check_circle';
      icon.className = 'material-symbols-outlined text-[18px] ' + (type === 'error' ? 'text-red-400' : 'text-emerald-400');
      toast.classList.remove('opacity-0', 'pointer-events-none');
      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => toast.classList.add('opacity-0', 'pointer-events-none'), 2600);
    }

    // Pemanggil API: otomatis menambahkan Bearer Token dan menangani error
    async function api(path, options = {}) {
      const token = localStorage.getItem(TOKEN_KEY);

      // Jika belum login, langsung arahkan ke halaman login
      if (!token) {
        window.location.href = LOGIN_URL;
        throw new Error('Belum login');
      }

      // Untuk upload file (FormData), browser mengatur Content-Type sendiri
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

      // 401 = token tidak valid/kedaluwarsa
      if (res.status === 401) {
        localStorage.removeItem(TOKEN_KEY);
        window.location.href = LOGIN_URL;
        throw new Error('Sesi berakhir');
      }

      const json = await res.json().catch(() => ({}));

      if (!res.ok) {
        // Error validasi Laravel (422) berisi daftar field; ambil pesan pertamanya
        const firstError = json.errors ? Object.values(json.errors)[0][0] : null;
        const err = new Error(firstError || json.message || 'Terjadi kesalahan pada server');
        err.status = res.status;
        throw err;
      }
      return json;
    }

   
    // INISIALISASI SESUAI MODE
    
    async function init() {
      const backLink = document.getElementById('back-link');
      const pageTitle = document.getElementById('page-title');

      if (PAGE_MODE === 'create') {
        pageTitle.textContent = 'Catatan Baru';
        document.title = 'Catatan Baru - NoteTask';
        backLink.href = '/notes';
        try {
          const catsRes = await api('/categories');
          categories = catsRes.data || [];
        } catch (err) { /* kategori gagal dimuat: form tetap bisa dipakai tanpa kategori */ }
        renderForm();
        return;
      }

      // Mode show dan edit: ambil catatan, kategori, dan data pengguna sekaligus
      pageTitle.textContent = PAGE_MODE === 'edit' ? 'Edit Catatan' : 'Detail Catatan';
      backLink.href = PAGE_MODE === 'edit' ? `/notes/${NOTE_ID}` : '/notes';

      try {
        const [noteRes, catsRes, user] = await Promise.all([
          api(`/notes/${NOTE_ID}`),
          api('/categories'),
          api('/user').catch(() => null),   // nama pengguna hanya pelengkap
        ]);
        note = noteRes.data;
        categories = catsRes.data || [];
        userName = user && user.name ? user.name : '';
        document.title = `${note.title} - NoteTask`;

        if (PAGE_MODE === 'edit') renderForm();
        else renderShow();
      } catch (err) {
        renderError(err.status === 404 ? 'Catatan tidak ditemukan.' : err.message);
      }
    }

    // Tampilan error (misalnya catatan tidak ditemukan)
    function renderError(message) {
      pageRoot.innerHTML = `
        <div class="bg-white rounded-2xl p-8 border border-slate-200/80 flex flex-col items-center text-center gap-3">
          <div class="w-14 h-14 rounded-full bg-red-50 text-red-600 flex items-center justify-center">
            <span class="material-symbols-outlined text-[28px]">error</span>
          </div>
          <h2 class="font-heading font-semibold text-base text-slate-900">Gagal memuat catatan</h2>
          <p class="text-sm text-slate-500">${escapeHTML(message)}</p>
          <a href="/notes" class="mt-2 h-10 px-5 inline-flex items-center rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">Kembali ke Daftar Catatan</a>
        </div>`;
    }

   
    // MODE SHOW: TAMPILAN DETAIL CATATAN
   
    function renderShow() {
      // Tampilkan "Diperbarui" hanya jika catatan pernah diubah (selisih lebih dari 1 menit)
      const wasEdited = note.updated_at && note.created_at &&
        (new Date(note.updated_at) - new Date(note.created_at)) > 60000;

      pageRoot.innerHTML = `
        <article class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.03)] flex flex-col gap-4">

          <!-- Kategori, waktu baca, dan nomor catatan -->
          <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2 min-w-0 flex-wrap">
              ${categoryBadge(note.category)}
              <span class="text-xs text-slate-400 font-medium">•</span>
              <span class="text-xs text-slate-500 font-medium whitespace-nowrap">${readingTime(note.content)} min baca</span>
            </div>
            <span class="text-xs text-slate-400 flex-shrink-0">#NT-${note.id}</span>
          </div>

          <!-- Judul -->
          <h2 class="font-heading font-bold text-xl sm:text-2xl text-slate-900 tracking-tight leading-snug break-words">${escapeHTML(note.title)}</h2>

          <!-- Penulis dan waktu -->
          <div class="flex items-center flex-wrap gap-y-1 gap-x-3 text-xs text-slate-500 pb-3 border-b border-slate-100">
            ${userName ? `
            <div class="flex items-center gap-1.5 font-medium text-slate-700">
              <span class="material-symbols-outlined text-[16px] text-indigo-600">account_circle</span>
              <span>${escapeHTML(userName)}</span>
            </div>
            <span class="text-slate-300">•</span>` : ''}
            <div class="flex items-center gap-1 text-slate-500">
              <span class="material-symbols-outlined text-[15px] text-slate-400">schedule</span>
              <span>${formatDateTime(note.created_at)}</span>
            </div>
            ${wasEdited ? `
            <span class="text-slate-300">•</span>
            <div class="flex items-center gap-1 text-slate-500">
              <span class="material-symbols-outlined text-[15px] text-slate-400">edit</span>
              <span>Diperbarui ${formatDateTime(note.updated_at)}</span>
            </div>` : ''}
          </div>

          <!-- Isi catatan: teks apa adanya, baris baru dipertahankan -->
          <div class="text-slate-700 text-[14.5px] leading-relaxed whitespace-pre-wrap break-words">${escapeHTML(note.content)}</div>
        </article>

        <!-- Lampiran -->
        <div id="attachments-wrap"></div>

        <!-- Tombol aksi -->
        <div class="flex flex-col gap-3 pt-1 pb-6">
          <div class="grid grid-cols-2 gap-3">
            <a href="/notes/${note.id}/edit" class="h-11 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl flex items-center justify-center gap-1.5 shadow-sm active:scale-[0.98] transition">
              <span class="material-symbols-outlined text-[18px]">edit_note</span>
              <span>Edit Catatan</span>
            </a>
            <button class="h-11 bg-white hover:bg-red-50 text-red-600 border border-red-200/90 font-medium text-sm rounded-xl flex items-center justify-center gap-1.5 active:scale-[0.98] transition" type="button" onclick="openDeleteModal()">
              <span class="material-symbols-outlined text-[18px]">delete</span>
              <span>Hapus</span>
            </button>
          </div>
          <div class="flex justify-center pt-1">

          </div>
        </div>`;

      renderAttachments();
    }

    
    // MODE EDIT dan CREATE: FORM
   
    function renderForm() {
      const isCreate = PAGE_MODE === 'create';
      const current = note || { title: '', content: '', category_id: null };

      // Pilihan kategori; kategori catatan saat ini otomatis terpilih
      const options = '<option value="">Tanpa kategori</option>' + categories.map(c =>
        `<option value="${c.id}" ${String(c.id) === String(current.category_id) ? 'selected' : ''}>${escapeHTML(c.name)}</option>`
      ).join('');

      const cancelHref = isCreate ? '/notes' : `/notes/${NOTE_ID}`;

      pageRoot.innerHTML = `
        <form class="flex flex-col gap-4" id="note-form" novalidate onsubmit="saveNote(event)">
          <article class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.03)] flex flex-col gap-4">

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-1.5" for="field-title">Judul Catatan</label>
              <input class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition" id="field-title" maxlength="255" placeholder="Masukkan judul catatan..." type="text" value="${escapeHTML(current.title)}">
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-1.5" for="field-category">Kategori</label>
              <select class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition" id="field-category">${options}</select>
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-700 mb-1.5" for="field-content">Isi Catatan</label>
              <textarea class="w-full p-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder:text-slate-400 leading-relaxed resize-y focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition" id="field-content" placeholder="Tulis catatan kamu di sini..." rows="10">${escapeHTML(current.content)}</textarea>
            </div>
          </article>

          <!-- Lampiran -->
          <div id="attachments-wrap"></div>

          <!-- Pesan error form -->
          <p class="hidden px-3.5 py-2.5 rounded-xl bg-red-50 text-red-700 border border-red-100 text-xs font-medium" id="form-error"></p>

          <!-- Tombol aksi -->
          <div class="grid grid-cols-2 gap-3 pb-6">
            <a href="${cancelHref}" class="h-11 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 font-medium text-sm rounded-xl flex items-center justify-center active:scale-[0.98] transition">Batal</a>
            <button class="h-11 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl flex items-center justify-center gap-1.5 shadow-sm active:scale-[0.98] transition disabled:opacity-70 disabled:cursor-not-allowed" id="btn-save" type="submit">
              <span class="material-symbols-outlined text-[18px]">check</span>
              <span id="btn-save-label">${isCreate ? 'Simpan Catatan' : 'Simpan Perubahan'}</span>
            </button>
          </div>
        </form>`;

      renderAttachments();
      document.getElementById('field-title').focus();
    }

    // Menyimpan catatan baru (POST) atau perubahan (PUT)
    async function saveNote(event) {
      event.preventDefault();

      const title = document.getElementById('field-title').value.trim();
      const content = document.getElementById('field-content').value.trim();
      const categoryId = document.getElementById('field-category').value;
      const errorEl = document.getElementById('form-error');
      const btn = document.getElementById('btn-save');
      const label = document.getElementById('btn-save-label');
      const originalLabel = label.textContent;

      errorEl.classList.add('hidden');

      if (!title || !content) {
        errorEl.textContent = 'Judul dan isi catatan wajib diisi.';
        errorEl.classList.remove('hidden');
        return;
      }

      const body = JSON.stringify({
        title: title,
        content: content,
        category_id: categoryId ? Number(categoryId) : null,
      });

      btn.disabled = true;
      label.textContent = 'Menyimpan...';

      try {
        if (PAGE_MODE === 'create') {
          // 1) Buat catatan
          const res = await api('/notes', { method: 'POST', body });
          const newId = res.data.id;

          // 2) Unggah lampiran yang dipilih (jika ada)
          const failures = await uploadFiles(newId, pendingFiles);
          if (failures.length) {
            showToast('Catatan tersimpan, tetapi ' + failures.length + ' lampiran gagal diunggah.', 'error');
            setTimeout(() => { window.location.href = `/notes/${newId}`; }, 1800);
          } else {
            showToast('Catatan berhasil ditambahkan');
            setTimeout(() => { window.location.href = `/notes/${newId}`; }, 700);
          }
        } else {
          await api(`/notes/${NOTE_ID}`, { method: 'PUT', body });
          showToast('Catatan berhasil diperbarui');
          setTimeout(() => { window.location.href = `/notes/${NOTE_ID}`; }, 700);
        }
      } catch (err) {
        errorEl.textContent = err.message;
        errorEl.classList.remove('hidden');
        btn.disabled = false;
        label.textContent = originalLabel;
      }
    }

   
    // LAMPIRAN
   

    // Menggambar bagian lampiran sesuai mode
    function renderAttachments() {
      const wrap = document.getElementById('attachments-wrap');
      if (!wrap) return;

      const isCreate = PAGE_MODE === 'create';
      const list = isCreate ? pendingFiles : (note.attachments || []);

      // Daftar baris lampiran
      let rows;
      if (list.length === 0) {
        rows = `<p class="text-xs text-slate-400 py-2">${isCreate ? 'Belum ada berkas dipilih.' : 'Belum ada lampiran.'}</p>`;
      } else if (isCreate) {
        // Mode create: berkas yang dipilih tapi belum diunggah (diunggah setelah catatan disimpan)
        rows = list.map((file, i) => {
          const info = fileTypeInfo(file.type);
          return `
          <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/60">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-lg border flex items-center justify-center shrink-0 ${info.box}"><span class="material-symbols-outlined text-[20px]">${info.icon}</span></div>
              <div class="flex flex-col min-w-0">
                <p class="text-xs font-semibold text-slate-800 truncate">${escapeHTML(file.name)}</p>
                <span class="text-[11px] text-slate-400">${info.label} • ${formatFileSize(file.size)}</span>
              </div>
            </div>
            <button class="w-8 h-8 ml-2 rounded-lg flex items-center justify-center text-slate-500 hover:text-red-600 hover:bg-white transition shrink-0" title="Batalkan pilihan" type="button" onclick="removePending(${i})">
              <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
          </div>`;
        }).join('');
      } else {
        // Mode show/edit: lampiran yang sudah tersimpan di database
        rows = list.map(att => {
          const info = fileTypeInfo(att.file_type);
          const url = attachmentUrl(att);
          return `
          <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/60 hover:bg-slate-50 transition">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-lg border flex items-center justify-center shrink-0 ${info.box}"><span class="material-symbols-outlined text-[20px]">${info.icon}</span></div>
              <div class="flex flex-col min-w-0">
                <p class="text-xs font-semibold text-slate-800 truncate">${escapeHTML(att.file_name)}</p>
                <span class="text-[11px] text-slate-400">${info.label} • ${formatFileSize(att.file_size)}</span>
              </div>
            </div>
            <div class="flex items-center gap-0.5 shrink-0 ml-2">
              
            <button class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-500 hover:text-indigo-600 hover:bg-white transition"
                    type="button"
                    onclick="openFilePreview('${url}', '${escapeHTML(att.file_name)}', '${escapeHTML(att.file_type)}')"
                    title="Lihat Berkas">
                <span class="material-symbols-outlined text-[18px]">visibility</span>
            </button>

              <a class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-500 hover:text-indigo-600 hover:bg-white transition" download="${escapeHTML(att.file_name)}" href="${url}" title="Unduh Berkas">
                <span class="material-symbols-outlined text-[18px]">download</span>
              </a>
              <button class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-500 hover:text-red-600 hover:bg-white transition" title="Hapus Lampiran" type="button" onclick="deleteAttachment(${att.id})">
                <span class="material-symbols-outlined text-[18px]">delete</span>
              </button>
            </div>
          </div>`;
        }).join('');
      }

      wrap.innerHTML = `
        <section class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-[0_2px_12px_rgba(0,0,0,0.03)] flex flex-col gap-3">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <h3 class="font-heading font-semibold text-sm text-slate-900">Lampiran File</h3>
              <span class="bg-slate-100 text-slate-600 font-semibold text-[11px] px-2 py-0.5 rounded-full">${list.length} Berkas</span>
            </div>
            <button class="inline-flex items-center gap-1 text-xs text-indigo-600 font-semibold hover:text-indigo-700 transition" id="btn-add-attachment" type="button" onclick="document.getElementById('file-input').click()">
              <span class="material-symbols-outlined text-[16px]">add</span>
              <span>Tambah</span>
            </button>
          </div>
          <div class="flex flex-col gap-2.5">${rows}</div>
        </section>`;
    }

    // Dipanggil saat pengguna selesai memilih file
    async function handleFilesChosen(input) {
      const files = Array.from(input.files);
      input.value = '';   // supaya file yang sama bisa dipilih lagi
      if (files.length === 0) return;

      // Tolak file yang melebihi batas ukuran
      const valid = files.filter(f => f.size <= MAX_FILE_SIZE);
      if (valid.length < files.length) showToast('Ukuran file maksimal 10 MB.', 'error');
      if (valid.length === 0) return;

      if (PAGE_MODE === 'create') {
        // Belum ada catatan: simpan dulu di daftar, diunggah setelah catatan dibuat
        pendingFiles.push(...valid);
        renderAttachments();
        return;
      }

      // Mode show/edit: langsung unggah ke catatan ini
      const btn = document.getElementById('btn-add-attachment');
      if (btn) { btn.disabled = true; btn.lastElementChild.textContent = 'Mengunggah...'; }

      const failures = await uploadFiles(NOTE_ID, valid);
      renderAttachments();

      if (failures.length) showToast(failures[0], 'error');
      else showToast(valid.length > 1 ? `${valid.length} lampiran diunggah` : 'Lampiran diunggah');
    }

    // Mengunggah beberapa file satu per satu ke POST /api/attachments (field: note_id dan file).
    // Mengembalikan daftar pesan error untuk file yang gagal.
    async function uploadFiles(noteId, files) {
      const failures = [];
      for (const file of files) {
        try {
          const formData = new FormData();
          formData.append('note_id', noteId);
          formData.append('file', file);
          const res = await api('/attachments', { method: 'POST', body: formData });
          // Tambahkan ke daftar lampiran di layar (hanya jika catatan sudah dimuat)
          if (note && res.data) {
            note.attachments = note.attachments || [];
            note.attachments.push(res.data);
          }
        } catch (err) {
          failures.push(`${file.name}: ${err.message}`);
        }
      }
      return failures;
    }

    // Membatalkan pilihan berkas (mode create)
    function removePending(index) {
      pendingFiles.splice(index, 1);
      renderAttachments();
    }

    // Menghapus lampiran yang sudah tersimpan: DELETE /api/attachments/{id}
    async function deleteAttachment(id) {
      if (!confirm('Hapus lampiran ini secara permanen?')) return;
      try {
        await api(`/attachments/${id}`, { method: 'DELETE' });
        note.attachments = (note.attachments || []).filter(a => a.id !== id);
        renderAttachments();
        showToast('Lampiran dihapus');
      } catch (err) {
        showToast(err.message, 'error');
      }
    }

   
    // HAPUS CATATAN
   
    function openDeleteModal() {
      const modal = document.getElementById('delete-modal');
      const content = document.getElementById('delete-modal-content');
      // textContent aman dari HTML, jadi judul catatan tidak perlu di-escape
      document.getElementById('delete-modal-text').textContent =
        `Catatan "${note.title}" beserta lampiran akan dihapus secara permanen.`;
      modal.classList.remove('opacity-0', 'pointer-events-none');
      content.classList.remove('scale-95');
      content.classList.add('scale-100');
    }

    function closeDeleteModal() {
      const modal = document.getElementById('delete-modal');
      const content = document.getElementById('delete-modal-content');
      modal.classList.add('opacity-0', 'pointer-events-none');
      content.classList.add('scale-95');
      content.classList.remove('scale-100');
    }

    // Hapus catatan lewat API (lampirannya ikut terhapus oleh model Note), lalu kembali ke daftar
    async function confirmDeleteNote() {
      const btn = document.getElementById('modal-confirm-delete');
      btn.disabled = true;
      try {
        await api(`/notes/${NOTE_ID}`, { method: 'DELETE' });
        closeDeleteModal();
        showToast('Catatan berhasil dihapus');
        setTimeout(() => { window.location.href = '/notes'; }, 700);
      } catch (err) {
        btn.disabled = false;
        closeDeleteModal();
        showToast(err.message, 'error');
      }
    }

    // Tombol Escape menutup dialog hapus
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeDeleteModal();
    });

    // Titik awal
    init();
  </script>
</body>
</html>