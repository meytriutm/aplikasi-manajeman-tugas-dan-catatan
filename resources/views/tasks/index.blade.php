<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#f8f9ff">
    <title>Daftar Tugas - NoteTask</title>

    <!-- Font ikon dan font teks (disamakan dengan halaman Kategori dan Catatan) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&amp;family=Plus+Jakarta+Sans:wght@500..800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#2a14b4',
                    background: '#f8f9ff',
                    surface: '#f8f9ff',
                    secondary: '#006c4a',
                    tertiary: '#7d4200',
                    'on-surface': '#0b1c30',
                    'surface-container-low': '#eff4ff',
                    'primary-fixed': '#e3dfff',
                    'primary-fixed-dim': '#c3c0ff',
                    error: '#ba1a1a',
                    /* tambahan dari dashboard */
                    'surface-container-lowest': '#ffffff',
                    'surface-container': '#e5eeff',
                    'surface-container-high': '#dce9ff',
                    'on-surface-variant': '#464554',
                    outline: '#777586',
                    'outline-variant': '#c7c4d7',
                    'error-container': '#ffdad6',
                    /* tambahan dari halaman kategori */
                    'primary-container': '#4338ca',
                    'on-primary': '#ffffff',
                    'on-secondary': '#ffffff',
                    'inverse-surface': '#213145'
                },
                spacing: {
                    'space-xs': '0.25rem',
                    'space-sm': '0.5rem',
                    'space-md': '0.75rem',
                    'space-lg': '1.25rem',
                    'margin': '1rem'
                },
                fontFamily: {
                    body: ['Inter', 'sans-serif'],
                    headline: ['Plus Jakarta Sans', 'sans-serif'],
                    'headline-sm': ['Plus Jakarta Sans'],
                    'label-lg': ['Inter'],
                    'label-sm': ['Inter']
                },
                fontSize: {
                    'headline-sm': ['16px', { lineHeight: '24px', letterSpacing: '-0.005em', fontWeight: '600' }],
                    'label-lg': ['14px', { lineHeight: '20px', letterSpacing: '0.01em', fontWeight: '600' }],
                    'label-sm': ['11px', { lineHeight: '14px', letterSpacing: '0.04em', fontWeight: '600' }]
                }
            }
        }
    };
</script>

    <style>
        * { box-sizing: border-box; }

        html, body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            background: #f8f9ff;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;
            overflow-x: hidden;
            font-family: Inter, sans-serif;
        }

        button, input, select, textarea { font: inherit; }
        button { touch-action: manipulation; }
        ::-webkit-scrollbar { display: none; }

        .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
        .task-card { min-width: 0; overflow-wrap: anywhere; }
        .modal-panel { width: 100%; max-width: 32rem; }

        #side-drawer {
            height: 100vh;
            height: 100dvh;
            overflow-y: auto;
            overscroll-behavior: contain;
        }

        #task-modal, #detail-modal {
            overflow-y: auto;
            overscroll-behavior: contain;
        }

        /* Area preview lampiran: geser kiri/kanan untuk pindah file */
        #preview-stage {
            touch-action: pan-y;
            user-select: none;
            -webkit-user-select: none;
        }
        #preview-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            -webkit-user-drag: none;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        @media (max-width: 480px) {
            .page-content { padding-left: 12px; padding-right: 12px; }
            .summary-card { padding: 10px 4px; }
            .summary-number { font-size: 19px; }
            #task-modal { padding: 0; align-items: flex-end; }
            #task-modal .modal-panel {
                max-height: 90dvh;
                overflow-y: auto;
                border-radius: 18px 18px 0 0;
                padding: 16px;
                padding-bottom: calc(16px + env(safe-area-inset-bottom, 0px));
            }
            #detail-modal { padding: 12px; }
            #detail-modal .modal-panel { max-height: 85dvh; overflow-y: auto; }
        }

        @media (min-width: 481px) {
            .page-content { padding-left: 24px; padding-right: 24px; }
        }

        @media (min-width: 1024px) {
            .content-inner { max-width: 1100px; }
        }
    </style>
</head>

<body class="flex min-h-screen flex-col text-on-surface">

    <!-- Header -->
   <header class="fixed top-0 inset-x-0 lg:left-72 z-40 bg-surface/85 backdrop-blur-xl pt-safe shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
  <div class="h-16 px-margin flex items-center justify-between gap-space-sm">
    <div class="flex items-center gap-space-xs min-w-0">
      <button id="drawer-toggle-btn" aria-label="Buka Menu Navigasi" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface active:bg-surface-container-high transition-colors" type="button">
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
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm transition-opacity hidden lg:hidden" id="drawer-backdrop"></div>

<!-- Sidebar User NoteTask -->
<aside class="fixed top-0 bottom-0 left-0 z-50 w-72 max-w-[85vw] bg-surface-container-lowest shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] flex flex-col pt-safe pb-safe transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 lg:shadow-none lg:border-r lg:border-outline-variant/30" id="side-drawer">

  <!-- Profil Pengguna -->
  <div class="p-space-lg flex items-center justify-between bg-surface-container-low">
    <div class="flex items-center gap-space-md min-w-0">
      <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
        <span class="material-symbols-outlined text-3xl">account_circle</span>
      </div>
      <div class="flex flex-col min-w-0">
        <span id="sidebar-name" class="font-headline-sm text-headline-sm text-on-surface truncate">Pengguna</span>
        <span class="font-label-sm text-label-sm text-primary font-semibold uppercase tracking-wider">User</span>
      </div>
    </div>
    <button id="drawer-close-btn" aria-label="Tutup menu" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface" type="button">
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

      <!-- Halaman aktif -->
      <a aria-current="page" class="flex items-center gap-space-md px-space-md h-11 rounded-lg bg-surface-container text-primary transition-colors" href="/tasks">
        <span class="material-symbols-outlined text-[20px] text-secondary">check_circle</span>
        <span class="font-label-lg text-label-lg">Daftar Tugas</span>
      </a>

      <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" href="/categories">
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

      <button class="w-full flex items-center gap-space-md px-space-md h-11 rounded-lg text-left text-error hover:bg-error-container/40 active:bg-error-container transition-colors disabled:opacity-70 disabled:cursor-not-allowed" onclick="logoutUser(this)" type="button">
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
   <main class="page-content lg:ml-72 min-w-0 flex-1 overflow-x-hidden px-3 pb-24 pt-20 sm:px-6">
        <div class="content-inner mx-auto flex w-full min-w-0 flex-col gap-5 pb-6">

            <section>
                <h1 class="font-headline text-2xl font-bold tracking-tight sm:text-3xl">Daftar Tugas</h1>
                <p class="mt-1 text-sm text-slate-500">Kelola semua tugas dan aktivitasmu.</p>
            </section>

            <!-- Fokus hari ini -->
            <section class="rounded-2xl border border-primary-fixed-dim/40 bg-primary-fixed/40 p-4">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">today</span>
                    <h2 class="font-headline font-bold">Fokus Hari Ini</h2>
                </div>
                <p id="today-date" class="mt-1 text-xs text-slate-500">Memuat tanggal...</p>
                <p id="today-summary" class="mt-3 text-sm text-slate-700">Memuat tugas hari ini...</p>
                <div id="today-list" class="mt-3 space-y-2"></div>
            </section>

            <!-- Statistik -->
            <section class="grid grid-cols-3 gap-2.5 sm:gap-4">
                <div class="summary-card flex min-w-0 flex-col items-center justify-center rounded-xl border border-primary-fixed-dim/40 bg-primary-fixed/40 p-3 text-center">
                    <span class="material-symbols-outlined mb-1 text-xl text-primary">checklist</span>
                    <span id="count-all" class="summary-number font-headline text-xl font-bold">0</span>
                    <span class="text-xs text-slate-500">Semua</span>
                </div>
                <div class="summary-card flex min-w-0 flex-col items-center justify-center rounded-xl border border-orange-200 bg-orange-50 p-3 text-center">
                    <span class="material-symbols-outlined mb-1 text-xl text-tertiary">schedule</span>
                    <span id="count-pending" class="summary-number font-headline text-xl font-bold text-tertiary">0</span>
                    <span class="text-xs text-slate-500">Pending</span>
                </div>
                <div class="summary-card flex min-w-0 flex-col items-center justify-center rounded-xl border border-emerald-200 bg-emerald-50 p-3 text-center">
                    <span class="material-symbols-outlined mb-1 text-xl text-secondary">check_circle</span>
                    <span id="count-completed" class="summary-number font-headline text-xl font-bold text-secondary">0</span>
                    <span class="text-xs text-slate-500">Selesai</span>
                </div>
            </section>

            <!-- Pencarian dan filter -->
            <section class="flex min-w-0 flex-col gap-3">
                <div class="relative">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-xl text-slate-400">search</span>
                    <input id="task-search-input" type="search" placeholder="Cari tugas..."
                        class="h-11 w-full rounded-xl border border-slate-200 bg-white pl-11 pr-4 text-sm outline-none transition focus:border-primary">
                </div>

                <div class="flex min-w-0 flex-wrap items-center justify-between gap-2">
                    <div class="flex min-w-0 flex-wrap items-center gap-1 rounded-xl bg-surface-container-low p-1">
                        <button data-status="all" class="status-filter rounded-lg bg-white px-3 py-2 text-xs font-semibold text-primary shadow-sm">Semua</button>
                        <button data-status="pending" class="status-filter rounded-lg px-3 py-2 text-xs text-slate-600">Pending</button>
                        <button data-status="completed" class="status-filter rounded-lg px-3 py-2 text-xs text-slate-600">Selesai</button>
                    </div>

                    <div class="flex min-w-0 items-center gap-2">
                        <select id="category-filter" aria-label="Filter kategori"
                            class="h-9 min-w-0 max-w-full rounded-lg border border-slate-200 bg-white px-2 text-xs outline-none focus:border-primary">
                            <option value="">Semua Kategori</option>
                        </select>
                        <button id="sort-deadline" title="Urutkan deadline" aria-label="Urutkan deadline"
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 hover:text-primary">
                            <span class="material-symbols-outlined text-lg">swap_vert</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Daftar tugas -->
            <section class="min-w-0 space-y-3">
                <div class="flex items-center justify-between gap-3">
                    <h2 class="font-headline text-base font-bold">Daftar Agenda</h2>
                    <span id="display-count" class="text-right text-xs text-slate-500">0 agenda ditampilkan</span>
                </div>

                <div id="page-message" class="hidden rounded-xl p-3 text-sm" role="status"></div>

                <div id="task-list" class="space-y-3"></div>

                <div id="empty-state" class="hidden rounded-xl border border-dashed border-slate-300 bg-white p-8 text-center">
                    <span class="material-symbols-outlined text-4xl text-slate-400">search_off</span>
                    <p class="mt-2 font-semibold">Tugas tidak ditemukan</p>
                    <p class="mt-1 text-sm text-slate-500">Coba ubah kata pencarian atau filter.</p>
                </div>
            </section>
        </div>
    </main>

    <!-- Tombol tambah tugas (disamakan dengan tombol tambah di halaman Catatan) -->
    <button id="fab-add-task" aria-label="Tambah tugas baru" type="button"
        class="fixed right-4 md:right-8 bottom-[calc(1.5rem+env(safe-area-inset-bottom,0px))] z-30 w-14 h-14 rounded-full bg-primary text-on-primary shadow-xl hover:bg-primary-container active:scale-95 transition-all flex items-center justify-center">
        <span class="material-symbols-outlined text-[28px]">add</span>
    </button>

    <!-- Modal tambah dan edit -->
    <div id="task-modal" class="fixed inset-0 z-[60] hidden items-end justify-center bg-slate-900/40 p-0 backdrop-blur-sm sm:items-center sm:p-4">
        <div class="modal-panel relative z-10 space-y-4 rounded-t-2xl bg-white p-5 shadow-xl sm:rounded-2xl">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 id="form-heading" class="font-headline text-lg font-bold">Tambah Tugas</h3>
                    <p class="text-xs text-slate-500">Lengkapi informasi tugasmu.</p>
                </div>
                <button id="close-task-modal" type="button" aria-label="Tutup form" class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="create-task-form" class="space-y-3">
                <div>
                    <label for="task-title-input" class="mb-1 block text-xs font-semibold">Judul Tugas *</label>
                    <input id="task-title-input" required maxlength="255"
                        class="h-11 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm outline-none focus:border-primary"
                        placeholder="Contoh: Mengerjakan tugas matematika">
                </div>

                <div>
                    <label for="task-description-input" class="mb-1 block text-xs font-semibold">Deskripsi</label>
                    <textarea id="task-description-input" rows="3"
                        class="w-full resize-y rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm outline-none focus:border-primary"
                        placeholder="Tuliskan deskripsi tugas..."></textarea>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div>
                        <label for="task-category-input" class="mb-1 block text-xs font-semibold">Kategori</label>
                        <select id="task-category-input"
                            class="h-11 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm outline-none focus:border-primary">
                            <option value="">Tanpa kategori</option>
                        </select>
                    </div>
                    <div>
                        <label for="task-deadline-input" class="mb-1 block text-xs font-semibold">Deadline</label>
                        <input id="task-deadline-input" type="date"
                            class="h-11 w-full min-w-0 rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm outline-none focus:border-primary">
                    </div>
                </div>

                <div>
                    <label for="task-priority-input" class="mb-1 block text-xs font-semibold">Prioritas</label>
                    <select id="task-priority-input"
                        class="h-11 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm outline-none focus:border-primary">
                        <option value="low">Rendah</option>
                        <option value="medium" selected>Sedang</option>
                        <option value="high">Tinggi</option>
                    </select>
                </div>

                <div>
                    <span class="mb-2 block text-xs font-semibold">Status</span>
                    <div class="grid grid-cols-2 gap-2">
                        <label class="flex cursor-pointer items-center gap-2 rounded-lg bg-orange-50 p-3 text-xs">
                            <input type="radio" name="task-status" value="pending" checked> Pending
                        </label>
                        <label class="flex cursor-pointer items-center gap-2 rounded-lg bg-emerald-50 p-3 text-xs">
                            <input type="radio" name="task-status" value="completed"> Selesai
                        </label>
                    </div>
                </div>

                <div>
                    <label for="task-attachment-input" class="mb-1 block text-xs font-semibold">Lampiran</label>
                    <!-- Input asli disembunyikan, hanya tombol "Pilih File" yang membuka folder -->
                    <input id="task-attachment-input" type="file" multiple class="hidden"
                        accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip">
                    <div class="flex items-center gap-3">
                        <button id="attachment-pick-button" type="button"
                            class="flex shrink-0 items-center gap-1.5 rounded-lg bg-primary-fixed px-3 py-2 text-xs font-semibold text-primary active:scale-95">
                            <span class="material-symbols-outlined text-base">attach_file</span>
                            Pilih File
                        </button>
                        <span id="attachment-status" class="min-w-0 truncate text-xs text-slate-400">Belum ada file dipilih</span>
                    </div>
                    <p class="mt-1 text-[11px] text-slate-400">Maksimal 10 MB per file. Ketuk gambar untuk melihat pratinjau.</p>

                    <!-- File baru yang sudah dipilih (belum diunggah) -->
                    <div id="pending-attachments" class="mt-2 space-y-2"></div>

                    <!-- Lampiran yang sudah tersimpan (saat edit) -->
                    <div id="existing-attachments" class="mt-2 space-y-2"></div>
                </div>
                <div id="form-error" class="hidden rounded-lg bg-red-50 p-3 text-xs leading-5 text-error"></div>

                <div class="flex justify-end gap-2 pt-1">
                    <button type="button" id="cancel-task-modal" class="rounded-lg bg-slate-100 px-4 py-2.5 text-sm font-medium">Batal</button>
                    <button id="save-task-button" type="submit"
                        class="flex items-center gap-1.5 rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-white">
                        <span class="material-symbols-outlined text-base">save</span>
                        Simpan Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal detail -->
    <div id="detail-modal" class="fixed inset-0 z-[70] hidden items-center justify-center bg-slate-900/40 p-3 backdrop-blur-sm sm:p-4">
        <div class="modal-panel relative z-10 max-h-[85dvh] space-y-4 overflow-y-auto rounded-2xl bg-white p-5 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-headline font-bold">Detail Informasi Tugas</h3>
                <button id="close-detail-modal" type="button" aria-label="Tutup detail"
                    class="flex h-9 w-9 items-center justify-center rounded-lg hover:bg-slate-100">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase text-slate-500">Judul</p>
                <p id="detail-title" class="mt-1 break-words font-semibold">-</p>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase text-slate-500">Kategori</p>
                    <p id="detail-category" class="mt-1 break-words text-sm text-primary">-</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase text-slate-500">Deadline</p>
                    <p id="detail-deadline" class="mt-1 text-sm">-</p>
                </div>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase text-slate-500">Deskripsi</p>
                <p id="detail-description" class="mt-1 whitespace-pre-wrap break-words text-sm leading-6 text-slate-600">-</p>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase text-slate-500">Prioritas</p>
                    <p id="detail-priority" class="mt-1 text-sm">-</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase text-slate-500">Status</p>
                    <p id="detail-status" class="mt-1 inline-block rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-tertiary">Pending</p>
                </div>
            </div>

            <div id="detail-attachments-wrap" class="hidden">
                <p class="text-xs font-semibold uppercase text-slate-500">Lampiran</p>
                <div id="detail-attachments" class="mt-2 space-y-2"></div>
            </div>

            <div class="flex justify-end">
                <button id="close-detail-button" type="button" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal konfirmasi hapus -->
    <div id="confirm-modal" class="fixed inset-0 z-[80] hidden items-center justify-center bg-slate-900/40 p-4 backdrop-blur-sm">
        <div class="w-full max-w-sm rounded-2xl bg-white p-5 shadow-xl">
            <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-100 text-error">
                <span class="material-symbols-outlined">delete</span>
            </div>
            <h3 class="font-headline text-base font-bold">Hapus Tugas?</h3>
            <p class="mt-1 text-sm text-slate-500">
                Apakah Anda yakin ingin menghapus tugas
                <span id="confirm-task-name" class="break-words font-bold text-on-surface"></span>?
            </p>
            <div class="mt-5 flex justify-end gap-2">
                <button id="confirm-cancel" type="button" class="rounded-lg bg-slate-200/70 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-200">Batal</button>
                <button id="confirm-ok" type="button" class="flex items-center gap-1.5 rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-red-700">
                    <span class="material-symbols-outlined text-base">delete</span>
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- Pratinjau lampiran di dalam aplikasi (bisa digeser kiri/kanan) -->
    <div id="preview-modal" class="fixed inset-0 z-[90] hidden flex-col bg-black/90" role="dialog" aria-modal="true" aria-label="Pratinjau lampiran">
        <div class="flex items-center justify-between gap-3 px-4 pb-2 pt-[calc(0.75rem+env(safe-area-inset-top,0px))] text-white">
            <div class="min-w-0">
                <p id="preview-title" class="truncate text-sm font-semibold">-</p>
                <p id="preview-counter" class="text-xs text-white/60"></p>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button id="preview-close" type="button" aria-label="Tutup pratinjau"
                    class="flex h-10 w-10 items-center justify-center rounded-full hover:bg-white/10">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <div class="relative min-h-0 flex-1">
            <div id="preview-stage" class="flex h-full w-full items-center justify-center px-2 pb-[env(safe-area-inset-bottom,0px)] sm:px-16">
                <img id="preview-image" class="hidden" alt="">
                <iframe id="preview-frame" class="hidden h-full w-full rounded-lg bg-white" title="Pratinjau dokumen"></iframe>
            </div>

            <button id="preview-prev" type="button" aria-label="Sebelumnya"
                class="absolute left-2 top-1/2 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/15 text-white hover:bg-white/25">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button id="preview-next" type="button" aria-label="Berikutnya"
                class="absolute right-2 top-1/2 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/15 text-white hover:bg-white/25">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

    <script src="/js/notetask.js"></script>

    <script>
        // Alamat dasar API Laravel.
        const API_BASE = '/api';

        // Data tugas dan kategori yang berasal dari API.
        let tasks = [];
        let categories = [];
        let selectedStatus = 'all';
        let sortAscending = true;
        let editingTaskId = null;

        // File yang baru dipilih di form (belum diunggah).
        let pendingFiles = [];
        let pendingSeq = 0;
        const MAX_FILE_SIZE = 10 * 1024 * 1024;

        // Daftar lampiran yang bisa dipratinjau, dikelompokkan per tempat tampil.
        const attachmentGroups = {};

        // Status pratinjau lampiran.
        let previewItems = [];
        let previewIndex = 0;

        const drawer = document.getElementById('side-drawer');
        const backdrop = document.getElementById('drawer-backdrop');
        const taskList = document.getElementById('task-list');
        const searchInput = document.getElementById('task-search-input');
        const categoryFilter = document.getElementById('category-filter');
        const taskModal = document.getElementById('task-modal');
        const detailModal = document.getElementById('detail-modal');
        const taskForm = document.getElementById('create-task-form');
        const attachmentInput = document.getElementById('task-attachment-input');
        const previewModal = document.getElementById('preview-modal');

        // Membuka dan menutup sidebar.
        function openDrawer() {
            drawer.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
        }

        function closeDrawer() {
            drawer.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }

        document.getElementById('drawer-toggle-btn').addEventListener('click', openDrawer);
        document.getElementById('drawer-close-btn').addEventListener('click', closeDrawer);
        backdrop.addEventListener('click', closeDrawer);

        // Mengambil token login dari localStorage.
        function getToken() {
            return localStorage.getItem('notetask_token');
        }


        // Mengirim permintaan ke API dengan token Sanctum.
        async function apiRequest(path, options = {}) {
            const token = getToken();

            if (!token) {
                throw new Error('Token login tidak ditemukan. Silakan login kembali.');
            }

            const headers = {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
                ...(options.headers || {})
            };

            if (options.body && !(options.body instanceof FormData) && !headers['Content-Type']) {
                headers['Content-Type'] = 'application/json';
            }

            const response = await fetch(API_BASE + path, {
                ...options,
                headers
            });

            let result = {};
            const contentType = response.headers.get('content-type') || '';

            if (contentType.includes('application/json')) {
                result = await response.json();
            }

            if (response.status === 401) {
                throw new Error('Sesi login tidak valid atau sudah berakhir. Silakan login kembali.');
            }

            if (!response.ok) {
                let message = result.message || 'Permintaan ke server gagal.';

                if (result.errors) {
                    message = Object.values(result.errors).flat().join(' ');
                }

                throw new Error(message);
            }

            return result;
        }

        // Mengambil data array dari berbagai bentuk respons JSON.
        function getDataArray(result) {
            if (Array.isArray(result)) return result;
            if (Array.isArray(result.data)) return result.data;
            if (Array.isArray(result.data?.data)) return result.data.data;
            return [];
        }

        // Menampilkan pesan kepada pengguna.
        function showMessage(message, type = 'success') {
            const box = document.getElementById('page-message');

            box.textContent = message;
            box.className = 'rounded-xl p-3 text-sm';

            if (type === 'error') {
                box.classList.add('bg-red-50', 'text-error');
            } else {
                box.classList.add('bg-emerald-50', 'text-secondary');
            }

            box.classList.remove('hidden');

            if (type === 'success') {
                window.setTimeout(() => box.classList.add('hidden'), 3500);
            }
        }

        // Menghindari HTML dari data API dieksekusi sebagai kode.
        function escapeHTML(value) {
            return String(value ?? '').replace(/[&<>"']/g, character => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[character]);
        }


        // Mengubah ukuran file (byte) menjadi teks yang mudah dibaca.
        function formatFileSize(bytes) {
            if (!bytes) return '';
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1048576) return Math.round(bytes / 1024) + ' KB';
            return (bytes / 1048576).toFixed(1) + ' MB';
        }

        // Alamat file lampiran.
        function attachmentUrl(file) {
            return file.url || '/storage/' + file.file_path;
        }

        // Gambar dan PDF bisa dibuka langsung di dalam aplikasi.
        function isImageFile(file) {
            const type = String(file.file_type || '').toLowerCase();
            const name = String(file.file_name || '').toLowerCase();
            return type.startsWith('image/') || /\.(png|jpe?g|gif|webp|bmp|svg)$/.test(name);
        }

        function isPdfFile(file) {
            const type = String(file.file_type || '').toLowerCase();
            const name = String(file.file_name || '').toLowerCase();
            return type === 'application/pdf' || name.endsWith('.pdf');
        }

        function isPreviewable(file) {
            return isImageFile(file) || isPdfFile(file);
        }

        // Membuat daftar lampiran.
        // mode: false = hanya lihat, 'server' = lampiran tersimpan (ada tombol hapus),
        //       'pending' = file baru yang belum diunggah (ada tombol buang).
        // group: nama kelompok untuk pratinjau (supaya bisa digeser antar file).
        function renderAttachmentList(files, mode = false, group = 'default') {
            const list = files || [];
            const previewables = list.filter(isPreviewable);
            attachmentGroups[group] = previewables;

            return list.map(file => {
                const url = escapeHTML(attachmentUrl(file));
                const previewIdx = previewables.indexOf(file);
                const canPreview = previewIdx !== -1;

                const thumb = isImageFile(file)
                    ? `<img src="${url}" alt="" class="h-10 w-10 shrink-0 rounded-lg object-cover">`
                    : `<span class="material-symbols-outlined flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary-fixed text-primary">description</span>`;

                const label = `
                    ${thumb}
                    <span class="min-w-0">
                        <span class="block truncate text-xs font-medium">${escapeHTML(file.file_name)}</span>
                        <span class="block text-[11px] text-slate-400">${escapeHTML(formatFileSize(file.file_size))}</span>
                    </span>`;

                // Gambar dan PDF dibuka di pratinjau aplikasi, file lain dibuka seperti biasa.
                const main = canPreview
                    ? `<button type="button" data-preview-group="${escapeHTML(group)}" data-preview-index="${previewIdx}"
                            class="flex min-w-0 flex-1 items-center gap-2 text-left">${label}</button>`
                    : `<a href="${url}" target="_blank" rel="noopener" class="flex min-w-0 flex-1 items-center gap-2">${label}</a>`;

                let action = '';
                if (mode === 'server') {
                    action = `
                        <button type="button" data-delete-attachment="${escapeHTML(file.id)}" aria-label="Hapus lampiran"
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-error hover:bg-red-50">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>`;
                } else if (mode === 'pending') {
                    action = `
                        <button type="button" data-remove-pending="${escapeHTML(file.id)}" aria-label="Buang file"
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-200">
                            <span class="material-symbols-outlined text-lg">close</span>
                        </button>`;
                }

                return `
                    <div class="flex items-center gap-2 rounded-lg bg-slate-50 p-2">
                        ${main}
                        ${action}
                    </div>`;
            }).join('');
        }

        // Menampilkan daftar file yang baru dipilih (belum diunggah).
        function renderPendingFiles() {
            const box = document.getElementById('pending-attachments');
            const status = document.getElementById('attachment-status');

            status.textContent = pendingFiles.length
                ? `${pendingFiles.length} file dipilih`
                : 'Belum ada file dipilih';
            status.classList.toggle('text-primary', pendingFiles.length > 0);
            status.classList.toggle('font-semibold', pendingFiles.length > 0);
            status.classList.toggle('text-slate-400', pendingFiles.length === 0);

            if (!pendingFiles.length) {
                box.innerHTML = '';
                attachmentGroups.pending = [];
                return;
            }

            box.innerHTML =
                `<p class="text-[11px] font-semibold uppercase text-slate-500">Akan diunggah (${pendingFiles.length})</p>` +
                renderAttachmentList(pendingFiles, 'pending', 'pending');
        }

        // Mengosongkan file yang dipilih dan melepas memori pratinjau.
        function clearPendingFiles() {
            pendingFiles.forEach(item => URL.revokeObjectURL(item.url));
            pendingFiles = [];
            attachmentInput.value = '';
            renderPendingFiles();
        }

        // Hanya tombol "Pilih File" yang membuka folder (teks status tidak bisa diklik).
        document.getElementById('attachment-pick-button').addEventListener('click', () => {
            attachmentInput.click();
        });

        // Saat pengguna memilih file: tampilkan sebagai daftar, bisa dibuang satu per satu.
        attachmentInput.addEventListener('change', () => {
            const rejected = [];

            Array.from(attachmentInput.files).forEach(file => {
                if (file.size > MAX_FILE_SIZE) {
                    rejected.push(file.name);
                    return;
                }

                pendingFiles.push({
                    id: 'p' + (++pendingSeq),
                    file_name: file.name,
                    file_type: file.type,
                    file_size: file.size,
                    url: URL.createObjectURL(file),
                    file
                });
            });

            // Dikosongkan supaya file yang sama bisa dipilih lagi setelah dibuang.
            attachmentInput.value = '';
            renderPendingFiles();

            const formError = document.getElementById('form-error');

            if (rejected.length) {
                formError.textContent = 'File melebihi 10 MB dan tidak ditambahkan: ' + rejected.join(', ');
                formError.classList.remove('hidden');
            } else {
                formError.classList.add('hidden');
            }
        });

        document.getElementById('pending-attachments').addEventListener('click', event => {
            const button = event.target.closest('[data-remove-pending]');
            if (!button) return;

            const id = button.dataset.removePending;
            const item = pendingFiles.find(entry => entry.id === id);

            if (item) URL.revokeObjectURL(item.url);

            pendingFiles = pendingFiles.filter(entry => entry.id !== id);
            renderPendingFiles();
        });

        // Mengunggah satu per satu file ke tugas lewat endpoint /api/attachments.
        async function uploadAttachments(taskId, files) {
            for (const file of files) {
                const formData = new FormData();
                formData.append('file', file);
                formData.append('task_id', taskId);
                await apiRequest('/attachments', { method: 'POST', body: formData });
            }
        }

        // ===== Pratinjau lampiran di dalam aplikasi =====
        const previewImage = document.getElementById('preview-image');
        const previewFrame = document.getElementById('preview-frame');
        const previewPrev = document.getElementById('preview-prev');
        const previewNext = document.getElementById('preview-next');

        function isPreviewOpen() {
            return !previewModal.classList.contains('hidden');
        }

        function showPreviewItem() {
            const item = previewItems[previewIndex];
            if (!item) return;

            const url = attachmentUrl(item);

            document.getElementById('preview-title').textContent = item.file_name || 'Lampiran';
            document.getElementById('preview-counter').textContent =
                previewItems.length > 1 ? `${previewIndex + 1} / ${previewItems.length}` : '';

            if (isImageFile(item)) {
                previewFrame.classList.add('hidden');
                previewFrame.removeAttribute('src');
                previewImage.src = url;
                previewImage.alt = item.file_name || '';
                previewImage.style.transform = 'translateX(0)';
                previewImage.style.opacity = '1';
                previewImage.classList.remove('hidden');
            } else {
                previewImage.classList.add('hidden');
                previewImage.removeAttribute('src');
                previewFrame.src = url;
                previewFrame.classList.remove('hidden');
            }

            const many = previewItems.length > 1;
            previewPrev.classList.toggle('hidden', !many);
            previewPrev.classList.toggle('flex', many);
            previewNext.classList.toggle('hidden', !many);
            previewNext.classList.toggle('flex', many);
        }

        function openPreview(group, index) {
            const items = attachmentGroups[group] || [];
            if (!items.length) return;

            previewItems = items;
            previewIndex = Math.min(Math.max(index, 0), items.length - 1);

            previewModal.classList.remove('hidden');
            previewModal.classList.add('flex');
            showPreviewItem();
        }

        function closePreview() {
            previewModal.classList.add('hidden');
            previewModal.classList.remove('flex');
            previewImage.removeAttribute('src');
            previewFrame.removeAttribute('src');
            previewItems = [];
        }

        // direction: 1 = berikutnya, -1 = sebelumnya (berputar).
        function movePreview(direction) {
            if (previewItems.length < 2) return;

            previewIndex = (previewIndex + direction + previewItems.length) % previewItems.length;
            showPreviewItem();
        }

        previewPrev.addEventListener('click', () => movePreview(-1));
        previewNext.addEventListener('click', () => movePreview(1));
        document.getElementById('preview-close').addEventListener('click', closePreview);

        // Klik area gelap (di luar gambar) menutup pratinjau.
        document.getElementById('preview-stage').addEventListener('click', event => {
            if (event.target.id === 'preview-stage') closePreview();
        });

        // Geser kiri/kanan di layar sentuh untuk pindah lampiran.
        (function setupPreviewSwipe() {
            const stage = document.getElementById('preview-stage');
            let startX = 0;
            let startY = 0;
            let tracking = false;

            stage.addEventListener('touchstart', event => {
                if (event.touches.length !== 1) return;
                startX = event.touches[0].clientX;
                startY = event.touches[0].clientY;
                tracking = true;
            }, { passive: true });

            stage.addEventListener('touchmove', event => {
                if (!tracking || previewImage.classList.contains('hidden')) return;
                const diffX = event.touches[0].clientX - startX;
                previewImage.style.transition = 'none';
                previewImage.style.transform = `translateX(${diffX}px)`;
            }, { passive: true });

            stage.addEventListener('touchend', event => {
                if (!tracking) return;
                tracking = false;

                const touch = event.changedTouches[0];
                const diffX = touch.clientX - startX;
                const diffY = touch.clientY - startY;

                previewImage.style.transition = '';

                if (Math.abs(diffX) > 50 && Math.abs(diffX) > Math.abs(diffY)) {
                    movePreview(diffX < 0 ? 1 : -1);
                } else {
                    previewImage.style.transform = 'translateX(0)';
                }
            });

            stage.addEventListener('touchcancel', () => {
                tracking = false;
                previewImage.style.transition = '';
                previewImage.style.transform = 'translateX(0)';
            });
        })();

        // Membuka pratinjau dari daftar lampiran mana pun (detail, edit, atau file baru).
        document.addEventListener('click', event => {
            const button = event.target.closest('[data-preview-group]');
            if (!button) return;

            event.preventDefault();
            openPreview(button.dataset.previewGroup, Number(button.dataset.previewIndex));
        });

        // Mengubah tanggal menjadi format Indonesia.
        function formatDate(dateString) {
            if (!dateString) return 'Belum ada tenggat';

            const datePart = String(dateString).slice(0, 10);
            const parts = datePart.split('-');

            if (parts.length !== 3) return 'Belum ada tenggat';

            const date = new Date(
                Number(parts[0]),
                Number(parts[1]) - 1,
                Number(parts[2])
            );

            return date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        }

        // Menggunakan tanggal lokal, bukan UTC, untuk Fokus Hari Ini.
        function getTodayString() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }

        function getTaskDate(task) {
            return task.due_date ? String(task.due_date).slice(0, 10) : '';
        }

        function getCategoryName(task) {
            if (task.category?.name) return task.category.name;

            const category = categories.find(
                item => String(item.id) === String(task.category_id)
            );

            return category?.name || 'Tanpa kategori';
        }

        function getPriorityName(priority) {
            const names = {
                low: 'Rendah',
                medium: 'Sedang',
                high: 'Tinggi'
            };

            return names[priority] || 'Sedang';
        }

        // Memperbarui statistik berdasarkan data tugas yang dimuat.
        function updateSummary() {
            const pending = tasks.filter(task => task.status === 'pending').length;
            const completed = tasks.filter(task => task.status === 'completed').length;

            document.getElementById('count-all').textContent = tasks.length;
            document.getElementById('count-pending').textContent = pending;
            document.getElementById('count-completed').textContent = completed;
        }

        // Memperbarui bagian Fokus Hari Ini.
        function renderTodayFocus() {
            const today = getTodayString();
            const todayTasks = tasks.filter(task => getTaskDate(task) === today);
            const pendingToday = todayTasks.filter(task => task.status === 'pending').length;

            document.getElementById('today-date').textContent =
                new Date().toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });

            document.getElementById('today-summary').textContent = todayTasks.length
                ? `${todayTasks.length} tugas memiliki deadline hari ini, ${pendingToday} di antaranya belum selesai.`
                : 'Tidak ada tugas dengan deadline hari ini.';

            const todayList = document.getElementById('today-list');

            if (!todayTasks.length) {
                todayList.innerHTML = '';
                return;
            }

            todayList.innerHTML = todayTasks.map(task => `
                <button type="button" data-today-task="${escapeHTML(task.id)}"
                    class="flex w-full items-center gap-3 rounded-xl bg-white p-3 text-left shadow-sm hover:bg-slate-50">
                    <span class="material-symbols-outlined ${task.status === 'completed' ? 'text-secondary' : 'text-primary'}">
                        ${task.status === 'completed' ? 'check_circle' : 'radio_button_unchecked'}
                    </span>
                    <span class="min-w-0 flex-1 break-words text-sm ${task.status === 'completed' ? 'text-slate-400 line-through' : 'font-medium'}">
                        ${escapeHTML(task.title)}
                    </span>
                    <span class="text-xs ${task.status === 'completed' ? 'text-secondary' : 'text-tertiary'}">
                        ${task.status === 'completed' ? 'Selesai' : 'Pending'}
                    </span>
                </button>
            `).join('');
        }

        // Memuat kategori ke filter dan form.
        function renderCategories() {
            const filter = document.getElementById('category-filter');
            const input = document.getElementById('task-category-input');

            filter.innerHTML = '<option value="">Semua Kategori</option>';
            input.innerHTML = '<option value="">Tanpa kategori</option>';

            categories.forEach(category => {
                const option1 = document.createElement('option');
                option1.value = category.id;
                option1.textContent = category.name;
                filter.appendChild(option1);

                const option2 = document.createElement('option');
                option2.value = category.id;
                option2.textContent = category.name;
                input.appendChild(option2);
            });
        }

        // Membuat kartu tugas dari data API.
        function createTaskCard(task) {
            const completed = task.status === 'completed';
            const categoryName = getCategoryName(task);
            const deadline = getTaskDate(task);
            const priority = task.priority || 'medium';
            const attachmentCount = (task.attachments || []).length;

            const card = document.createElement('article');
            card.className = 'task-card rounded-xl border border-slate-200/80 bg-white p-3.5 shadow-sm sm:p-4';
            card.dataset.id = task.id;

            card.innerHTML = `
                <div class="flex items-start gap-2.5">
                    <button type="button" data-action="toggle-status"
                        aria-label="Ubah status tugas"
                        class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full ${completed ? 'bg-secondary text-white' : 'border-2 border-slate-300'}">
                        <span class="material-symbols-outlined ${completed ? '' : 'hidden'} text-sm">check</span>
                    </button>

                    <div class="min-w-0 flex-1">
                        <h3 class="task-title break-words text-sm font-semibold ${completed ? 'text-slate-500 line-through' : 'text-on-surface'}">
                            ${escapeHTML(task.title)}
                        </h3>

                        <div class="mt-1 flex flex-wrap items-center gap-x-1.5 gap-y-1 text-xs text-slate-500">
                            <span class="font-medium text-primary">${escapeHTML(categoryName)}</span>
                            <span>·</span>
                            <span class="flex items-center gap-1 ${deadline && deadline < getTodayString() && !completed ? 'font-semibold text-error' : ''}">
                                <span class="material-symbols-outlined text-sm">event</span>
                                ${escapeHTML(formatDate(deadline))}
                            </span>
                        </div>
                    </div>

                    <div class="relative shrink-0">
                        <button type="button" class="action-menu-button flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100" aria-label="Menu aksi tugas">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>

                        <div class="action-menu absolute right-0 top-9 z-20 hidden w-40 rounded-xl border border-slate-200 bg-white py-1 shadow-lg">
                            <button type="button" data-action="detail" class="flex w-full items-center gap-2 px-3 py-2 text-left text-xs hover:bg-slate-50">
                                <span class="material-symbols-outlined text-base text-primary">info</span>Lihat Detail
                            </button>
                            <button type="button" data-action="edit" class="flex w-full items-center gap-2 px-3 py-2 text-left text-xs hover:bg-slate-50">
                                <span class="material-symbols-outlined text-base">edit</span>Edit
                            </button>
                            <button type="button" data-action="delete" class="flex w-full items-center gap-2 px-3 py-2 text-left text-xs text-error hover:bg-red-50">
                                <span class="material-symbols-outlined text-base">delete</span>Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <p class="task-description mt-2 pl-7 text-xs leading-5 text-slate-500">
                    ${escapeHTML(task.description || 'Tidak ada deskripsi.')}
                </p>

                <div class="mt-3 flex flex-wrap items-center justify-between gap-2 border-t border-slate-100 pt-2 pl-7">
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-500">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm ${priority === 'high' ? 'text-error' : ''}">flag</span>
                    Prioritas ${escapeHTML(getPriorityName(priority))}
                </span>
                ${attachmentCount ? `
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">attach_file</span>
                        ${attachmentCount} lampiran
                    </span>` : ''}
                    </div>
                    <span class="status-badge rounded-full px-2.5 py-1 text-xs font-semibold ${completed ? 'bg-emerald-50 text-secondary' : 'bg-orange-50 text-tertiary'}">
                        ${completed ? 'Selesai' : 'Pending'}
                    </span>
                </div>
            `;

            return card;
        }

        // Menampilkan tugas berdasarkan pencarian dan filter.
        function applyFilters() {
            const query = searchInput.value.trim().toLowerCase();
            const categoryId = categoryFilter.value;

            let visibleTasks = tasks.filter(task => {
                const categoryName = getCategoryName(task).toLowerCase();
                const text = `${task.title || ''} ${task.description || ''} ${categoryName}`.toLowerCase();

                const matchesSearch = text.includes(query);
                const matchesCategory = !categoryId || String(task.category_id || '') === categoryId;
                const matchesStatus = selectedStatus === 'all' || task.status === selectedStatus;

                return matchesSearch && matchesCategory && matchesStatus;
            });

            visibleTasks.sort((a, b) => {
                const dateA = getTaskDate(a) || '9999-12-31';
                const dateB = getTaskDate(b) || '9999-12-31';
                return sortAscending ? dateA.localeCompare(dateB) : dateB.localeCompare(dateA);
            });

            taskList.innerHTML = '';

            visibleTasks.forEach(task => {
                taskList.appendChild(createTaskCard(task));
            });

            document.getElementById('display-count').textContent =
                `${visibleTasks.length} agenda ditampilkan`;

            document.getElementById('empty-state').classList.toggle('hidden', visibleTasks.length > 0);

            updateSummary();
            renderTodayFocus();
        }

        // Mengambil daftar tugas dan kategori dari API.
        async function loadTasks() {
            taskList.innerHTML = `
                <div class="rounded-xl bg-white p-6 text-center text-sm text-slate-500">
                    Memuat daftar tugas...
                </div>
            `;

            try {
                const [taskResult, categoryResult] = await Promise.all([
                    apiRequest('/tasks'),
                    apiRequest('/categories')
                ]);

                tasks = getDataArray(taskResult);
                categories = getDataArray(categoryResult);

                renderCategories();

                // Memakai kategori yang sudah ikut dikirim oleh API tugas jika tersedia.
                tasks.forEach(task => {
                    if (task.category && !categories.some(item => String(item.id) === String(task.category.id))) {
                        categories.push(task.category);
                    }
                });

                renderCategories();
                applyFilters();
            } catch (error) {
                taskList.innerHTML = '';
                showMessage(error.message, 'error');

                document.getElementById('empty-state').classList.add('hidden');

                if (error.message.toLowerCase().includes('token') ||
                    error.message.toLowerCase().includes('login')) {
                    const loginLink = document.createElement('a');
                    loginLink.href = '/auth/login';
                    loginLink.textContent = 'Buka halaman login';
                    loginLink.className = 'mt-3 inline-block font-semibold text-primary underline';
                    taskList.appendChild(loginLink);
                }
            }
        }

        // Membuka dan menutup modal tugas.
        function openTaskModal() {
            editingTaskId = null;
            taskForm.reset();
            clearPendingFiles();

            document.getElementById('form-heading').textContent = 'Tambah Tugas';
            document.getElementById('form-error').classList.add('hidden');
            document.getElementById('existing-attachments').innerHTML = '';
            document.getElementById('save-task-button').disabled = false;

            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

        function closeTaskModal() {
            taskModal.classList.add('hidden');
            taskModal.classList.remove('flex');
            editingTaskId = null;
            clearPendingFiles();
        }

        function closeDetailModal() {
            detailModal.classList.add('hidden');
            detailModal.classList.remove('flex');
        }

        document.getElementById('fab-add-task').addEventListener('click', openTaskModal);
        document.getElementById('close-task-modal').addEventListener('click', closeTaskModal);
        document.getElementById('cancel-task-modal').addEventListener('click', closeTaskModal);
        document.getElementById('close-detail-modal').addEventListener('click', closeDetailModal);
        document.getElementById('close-detail-button').addEventListener('click', closeDetailModal);

        taskModal.addEventListener('click', event => {
            if (event.target === taskModal) closeTaskModal();
        });

        detailModal.addEventListener('click', event => {
            if (event.target === detailModal) closeDetailModal();
        });

        // Membuka form edit menggunakan data tugas yang dipilih.
        function openEditModal(task) {
            editingTaskId = task.id;
            taskForm.reset();
            clearPendingFiles();

            document.getElementById('form-heading').textContent = 'Edit Tugas';
            document.getElementById('task-title-input').value = task.title || '';
            document.getElementById('task-description-input').value = task.description || '';
            document.getElementById('task-category-input').value = task.category_id || '';
            document.getElementById('task-deadline-input').value = getTaskDate(task);
            document.getElementById('task-priority-input').value = task.priority || 'medium';

            const statusInput = document.querySelector(
                `input[name="task-status"][value="${task.status}"]`
            );

            if (statusInput) statusInput.checked = true;

            document.getElementById('form-error').classList.add('hidden');
            document.getElementById('existing-attachments').innerHTML =
                renderAttachmentList(task.attachments, 'server', 'edit');

            taskModal.classList.remove('hidden');
            taskModal.classList.add('flex');
        }

        // Mengirim data tugas baru atau hasil edit ke API.
        taskForm.addEventListener('submit', async event => {
            event.preventDefault();

            const title = document.getElementById('task-title-input').value.trim();
            const description = document.getElementById('task-description-input').value.trim();
            const categoryValue = document.getElementById('task-category-input').value;
            const deadline = document.getElementById('task-deadline-input').value;
            const priority = document.getElementById('task-priority-input').value;
            const status = document.querySelector('input[name="task-status"]:checked')?.value || 'pending';

            if (!title) return;

            const payload = {
                title,
                description: description || null,
                category_id: categoryValue ? Number(categoryValue) : null,
                due_date: deadline || null,
                priority,
                status
            };

            const saveButton = document.getElementById('save-task-button');
            const formError = document.getElementById('form-error');

            saveButton.disabled = true;
            saveButton.textContent = 'Menyimpan...';
            formError.classList.add('hidden');

            try {
                const isEdit = editingTaskId !== null;

                if (isEdit) {
                    await apiRequest(`/tasks/${editingTaskId}`, {
                        method: 'PUT',
                        body: JSON.stringify(payload)
                    });
                } else {
                    const created = await apiRequest('/tasks', {
                        method: 'POST',
                        body: JSON.stringify(payload)
                    });
                    // Kalau upload gagal, klik simpan lagi akan mengedit tugas ini, bukan membuat duplikat.
                    editingTaskId = created.data.id;
                }

                const files = pendingFiles.map(item => item.file);
                if (files.length) await uploadAttachments(editingTaskId, files);

                showMessage(isEdit ? 'Tugas berhasil diperbarui.' : 'Tugas berhasil ditambahkan.');
                closeTaskModal();
                await loadTasks();
            } catch (error) {
                formError.textContent = error.message;
                formError.classList.remove('hidden');
                if (editingTaskId !== null) loadTasks();
            } finally {
                saveButton.disabled = false;
                saveButton.innerHTML = '<span class="material-symbols-outlined text-base">save</span> Simpan Tugas';
            }
        });

        // Menampilkan detail tugas dari API.
        async function showTaskDetail(task) {
            try {
                const result = await apiRequest(`/tasks/${task.id}`);
                const detail = result.data || result;

                document.getElementById('detail-title').textContent = detail.title || '-';
                document.getElementById('detail-category').textContent =
                    detail.category?.name || getCategoryName(detail);
                document.getElementById('detail-deadline').textContent = formatDate(detail.due_date);
                document.getElementById('detail-description').textContent =
                    detail.description || 'Tidak ada deskripsi.';
                document.getElementById('detail-priority').textContent =
                    getPriorityName(detail.priority);

                const status = document.getElementById('detail-status');
                const completed = detail.status === 'completed';

                status.textContent = completed ? 'Selesai' : 'Pending';
                status.className = completed
                    ? 'mt-1 inline-block rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-secondary'
                    : 'mt-1 inline-block rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-tertiary';

                const files = detail.attachments || [];
                document.getElementById('detail-attachments-wrap').classList.toggle('hidden', files.length === 0);
                document.getElementById('detail-attachments').innerHTML =
                    renderAttachmentList(files, false, 'detail');

                detailModal.classList.remove('hidden');
                detailModal.classList.add('flex');
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }

        // Mengubah status dan menyimpan ke database.
        async function toggleTaskStatus(task) {
            const nextStatus = task.status === 'completed' ? 'pending' : 'completed';

            try {
                await apiRequest(`/tasks/${task.id}`, {
                    method: 'PATCH',
                    body: JSON.stringify({ status: nextStatus })
                });

                const currentTask = tasks.find(item => String(item.id) === String(task.id));

                if (currentTask) currentTask.status = nextStatus;

                applyFilters();
                showMessage('Status tugas berhasil diperbarui.');
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }


        // Modal konfirmasi hapus (pengganti confirm bawaan browser).
        function confirmDelete(name) {
            return new Promise(resolve => {
                const modal = document.getElementById('confirm-modal');
                const okButton = document.getElementById('confirm-ok');
                const cancelButton = document.getElementById('confirm-cancel');

                document.getElementById('confirm-task-name').textContent = name;
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                function close(result) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    okButton.removeEventListener('click', onOk);
                    cancelButton.removeEventListener('click', onCancel);
                    modal.removeEventListener('click', onBackdrop);
                    document.removeEventListener('keydown', onKey);
                    resolve(result);
                }

                const onOk = () => close(true);
                const onCancel = () => close(false);
                const onBackdrop = event => { if (event.target === modal) close(false); };
                const onKey = event => { if (event.key === 'Escape') close(false); };

                okButton.addEventListener('click', onOk);
                cancelButton.addEventListener('click', onCancel);
                modal.addEventListener('click', onBackdrop);
                document.addEventListener('keydown', onKey);
            });
        }



        // Meminta konfirmasi sebelum menghapus tugas.
        async function deleteTask(task) {
            const confirmed = await confirmDelete(task.title);

            if (!confirmed) return;

            try {
                await apiRequest(`/tasks/${task.id}`, { method: 'DELETE' });

                tasks = tasks.filter(item => String(item.id) !== String(task.id));

                applyFilters();
                showMessage('Tugas berhasil dihapus.');
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }

        // Menangani menu aksi kartu tugas.
        taskList.addEventListener('click', async event => {
            const menuButton = event.target.closest('.action-menu-button');
            const actionButton = event.target.closest('[data-action]');
            const card = event.target.closest('.task-card');

            if (!card) return;

            const task = tasks.find(item => String(item.id) === String(card.dataset.id));

            if (!task) return;

            if (menuButton) {
                const menu = card.querySelector('.action-menu');
                const wasHidden = menu.classList.contains('hidden');

                document.querySelectorAll('.action-menu').forEach(item => {
                    item.classList.add('hidden');
                });

                if (wasHidden) menu.classList.remove('hidden');
                return;
            }

            if (!actionButton) return;

            const action = actionButton.dataset.action;

            card.querySelector('.action-menu')?.classList.add('hidden');

            if (action === 'detail') await showTaskDetail(task);
            if (action === 'edit') openEditModal(task);
            if (action === 'delete') await deleteTask(task);
            if (action === 'toggle-status') await toggleTaskStatus(task);
        });

        // Klik tugas di bagian Fokus Hari Ini akan membuka detail.
        document.getElementById('today-list').addEventListener('click', async event => {
            const button = event.target.closest('[data-today-task]');
            if (!button) return;

            const task = tasks.find(item => String(item.id) === button.dataset.todayTask);
            if (task) await showTaskDetail(task);
        });

        // Menghapus satu lampiran tersimpan dari form edit.
        document.getElementById('existing-attachments').addEventListener('click', async event => {
            const button = event.target.closest('[data-delete-attachment]');
            if (!button || editingTaskId === null) return;

            const attachmentId = button.dataset.deleteAttachment;
            button.disabled = true;

            try {
                await apiRequest(`/attachments/${attachmentId}`, { method: 'DELETE' });

                const task = tasks.find(item => String(item.id) === String(editingTaskId));
                if (task) {
                    task.attachments = (task.attachments || []).filter(f => String(f.id) !== attachmentId);
                    document.getElementById('existing-attachments').innerHTML =
                        renderAttachmentList(task.attachments, 'server', 'edit');
                }
                applyFilters();
            } catch (error) {
                button.disabled = false;
                const formError = document.getElementById('form-error');
                formError.textContent = error.message;
                formError.classList.remove('hidden');
            }
        });

        // Menutup menu aksi jika pengguna klik di luar menu.
        document.addEventListener('click', event => {
            if (!event.target.closest('.action-menu') &&
                !event.target.closest('.action-menu-button')) {
                document.querySelectorAll('.action-menu').forEach(item => {
                    item.classList.add('hidden');
                });
            }
        });

        // Keyboard: Escape menutup pratinjau dulu, lalu sidebar dan modal. Panah kiri/kanan pindah lampiran.
        document.addEventListener('keydown', event => {
            if (isPreviewOpen()) {
                if (event.key === 'Escape') closePreview();
                if (event.key === 'ArrowLeft') movePreview(-1);
                if (event.key === 'ArrowRight') movePreview(1);
                return;
            }

            if (event.key === 'Escape') {
                closeDrawer();
                closeTaskModal();
                closeDetailModal();
            }
        });

        // Pencarian, filter status, kategori, dan pengurutan deadline.
        searchInput.addEventListener('input', applyFilters);
        categoryFilter.addEventListener('change', applyFilters);

        document.querySelectorAll('.status-filter').forEach(button => {
            button.addEventListener('click', () => {
                selectedStatus = button.dataset.status;

                document.querySelectorAll('.status-filter').forEach(item => {
                    item.classList.remove('bg-white', 'text-primary', 'font-semibold', 'shadow-sm');
                    item.classList.add('text-slate-600');
                });

                button.classList.add('bg-white', 'text-primary', 'font-semibold', 'shadow-sm');
                button.classList.remove('text-slate-600');

                applyFilters();
            });
        });

        document.getElementById('sort-deadline').addEventListener('click', () => {
            sortAscending = !sortAscending;
            applyFilters();
        });

        // Mengisi informasi pengguna pada sidebar.
        try {
            const user = JSON.parse(localStorage.getItem('notetask_user') || 'null');

            if (user && user.name) {
                document.getElementById('sidebar-name').textContent = user.name;
            }
        } catch (error) {
            console.warn('Informasi pengguna tidak dapat dibaca.');
        }

        // Memuat data saat halaman dibuka.
        document.addEventListener('DOMContentLoaded', loadTasks);
    </script>
</body>
</html>