<!DOCTYPE html>
<html class="light" lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta content="mobile_tab" name="shell-type">
  <title>NoteTask - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&amp;family=Plus+Jakarta+Sans:wght@500..800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
  <style>
    @layer base{html,body{width:100%;margin:0;padding:0;background-color:#f8f9ff;-webkit-tap-highlight-color:transparent;}body{overscroll-behavior-y:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {darkMode: "class", theme: {extend: {"colors": {"primary-container": "#4338ca", "on-secondary-fixed": "#002114", "outline-variant": "#c7c4d7", "on-primary": "#ffffff", "tertiary": "#5c2f00", "surface-container": "#e5eeff", "background": "#f8f9ff", "on-surface": "#0b1c30", "primary-fixed-dim": "#c3c0ff", "secondary": "#006c4a", "tertiary-fixed": "#ffdcc3", "inverse-primary": "#c3c0ff", "secondary-fixed-dim": "#68dba9", "surface": "#f8f9ff", "outline": "#777586", "on-error": "#ffffff", "surface-bright": "#f8f9ff", "surface-container-high": "#dce9ff", "on-primary-fixed-variant": "#372abf", "on-background": "#0b1c30", "primary": "#2a14b4", "on-secondary-fixed-variant": "#005137", "surface-container-highest": "#d3e4fe", "surface-dim": "#cbdbf5", "inverse-surface": "#213145", "error": "#ba1a1a", "surface-container-low": "#eff4ff", "on-tertiary-fixed-variant": "#6e3900", "on-tertiary-fixed": "#2f1500", "secondary-container": "#82f5c1", "on-secondary-container": "#00714e", "error-container": "#ffdad6", "inverse-on-surface": "#eaf1ff", "tertiary-fixed-dim": "#ffb77d", "tertiary-container": "#7d4200", "on-error-container": "#93000a", "on-tertiary-container": "#ffb477", "surface-container-lowest": "#ffffff", "on-primary-container": "#c1beff", "secondary-fixed": "#85f8c4", "surface-variant": "#d3e4fe", "primary-fixed": "#e3dfff", "surface-tint": "#5148d7", "on-primary-fixed": "#100069", "on-surface-variant": "#464554", "on-secondary": "#ffffff", "on-tertiary": "#ffffff"}, "borderRadius": {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"}, "spacing": {"gutter": "1rem", "margin-lg": "3rem", "gutter-lg": "2rem", "space-sm": "0.5rem", "gutter-md": "1.5rem", "margin": "1rem", "space-xl": "2rem", "margin-md": "2rem", "space-xs": "0.25rem", "space-lg": "1.25rem", "space-md": "0.75rem"}, "fontFamily": {"headline-xl-mobile": ["Plus Jakarta Sans"], "body-lg": ["Inter"], "label-md": ["Inter"], "display-lg-mobile": ["Plus Jakarta Sans"], "headline-sm": ["Plus Jakarta Sans"], "label-lg": ["Inter"], "headline-md": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "body-md": ["Inter"], "body-sm": ["Inter"], "headline-xl": ["Plus Jakarta Sans"], "label-sm": ["Inter"]}, "fontSize": {"headline-xl-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "body-lg": ["16px", {"lineHeight": "26px", "letterSpacing": "-0.005em", "fontWeight": "400"}], "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.015em", "fontWeight": "500"}], "display-lg-mobile": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "headline-sm": ["16px", {"lineHeight": "24px", "letterSpacing": "-0.005em", "fontWeight": "600"}], "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}], "headline-md": ["20px", {"lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600"}], "display-lg": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}], "body-md": ["14px", {"lineHeight": "22px", "letterSpacing": "0em", "fontWeight": "400"}], "body-sm": ["12px", {"lineHeight": "18px", "letterSpacing": "0.005em", "fontWeight": "400"}], "headline-xl": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.015em", "fontWeight": "600"}], "label-sm": ["11px", {"lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600"}]}}}};
  </script>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">

  <!-- Header -->
  <header class="fixed top-0 inset-x-0 lg:left-72 z-40 bg-surface/85 backdrop-blur-xl pt-safe shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="h-16 px-margin flex items-center justify-between gap-space-sm">
      <div class="flex items-center gap-space-xs min-w-0">
        <button aria-label="Buka Menu Navigasi" class="-ml-2.5 lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface active:bg-surface-container-high transition-colors" id="drawer-toggle-btn" type="button" onclick="openDrawer()">
          <span class="material-symbols-outlined text-[24px]">menu</span>
        </button>
        <div class="flex items-center gap-space-sm ml-space-xs md:ml-0">
          <!-- LOGO BARU -->
          <div aria-hidden="true" class="relative w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center shadow-sm flex-shrink-0">
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 rounded-full bg-secondary flex items-center justify-center">
              <span class="material-symbols-outlined text-[9px] text-on-secondary" style="font-variation-settings: 'FILL' 1;">done</span>
            </span>
            <span class="material-symbols-outlined text-on-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">edit_note</span>
          </div>
          <span class="font-headline-sm text-headline-sm text-primary tracking-tight">NoteTask</span>
        </div>
      </div>
    <div class="flex items-center gap-space-xs">
        <a
            aria-label="Buka profil pengguna"
            class="w-11 h-11 flex items-center justify-center"
            href="/profile"
        >
            <span class="material-symbols-outlined text-3xl text-indigo-600">
                account_circle
            </span>
        </a>
    </div>
    </div>
  </header>

  <!-- Backdrop drawer (hanya mobile/tablet) -->
  <div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm transition-opacity hidden lg:hidden" id="drawer-backdrop" onclick="closeDrawer()"></div>

<!-- Sidebar User NoteTask -->
<aside id="side-drawer" class="fixed top-0 bottom-0 left-0 z-[60] w-72 max-w-[85vw] bg-surface-container-lowest flex flex-col pt-safe pb-safe transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 lg:shadow-none lg:border-r lg:border-outline-variant/30">
    <!-- Profil Pengguna -->
    <div class="p-space-lg flex items-center justify-between bg-surface-container-low">
        <div class="flex items-center gap-space-md min-w-0">

            <!-- Ikon User -->
            <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-3xl">
                    account_circle
                </span>
            </div>

            <!-- Nama dan Role User -->
            <div class="flex flex-col min-w-0">
                <span id="sidebar-user-name" class="font-headline-sm text-headline-sm text-on-surface truncate">
                    Pengguna
                </span>
                <span class="font-label-sm text-label-sm text-primary font-semibold uppercase tracking-wider">
                    User
                </span>
            </div>
        </div>

        <!-- Tombol Tutup Sidebar Mobile -->
        <button aria-label="Tutup menu" class="lg:hidden w-11 h-11 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface" type="button" onclick="closeDrawer()">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <!-- Menu Navigasi User -->
    <nav class="flex-1 overflow-y-auto px-space-md py-space-lg space-y-space-md">

        <!-- Menu Utama -->
        <div class="space-y-space-xs">
            <p class="px-space-md font-label-sm text-label-sm text-outline uppercase tracking-wider font-semibold">
                Menu Utama
            </p>

            <!-- Dashboard -->
            <a aria-current="page" class="flex items-center gap-space-md px-space-md h-11 rounded-lg bg-surface-container text-primary transition-colors" data-path="user-personal" href="/dashboard">
                <span class="material-symbols-outlined text-[20px] text-secondary">space_dashboard</span>
                <span class="font-label-lg text-label-lg">Dashboard Personal</span>
            </a>

            <!-- Daftar Tugas -->
            <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" data-path="my-tasks" href="/tasks">
                <span class="material-symbols-outlined text-[20px] text-secondary">check_circle</span>
                <span class="font-label-lg text-label-lg">Daftar Tugas</span>
            </a>

            <!-- Kategori Pribadi -->
            <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" data-path="categories" href="/categories">
                <span class="material-symbols-outlined text-[20px] text-secondary">category</span>
                <span class="font-label-lg text-label-lg">Kategori Saya</span>
            </a>

            <!-- Catatan -->
            <a class="flex items-center gap-space-md px-space-md h-11 rounded-lg text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" data-path="quick-notes" href="/notes">
                <span class="material-symbols-outlined text-[20px] text-secondary">sticky_note_2</span>
                <span class="font-label-lg text-label-lg">Catatan</span>
            </a>
        </div>

        <!-- Menu Akun -->
        <div class="pt-space-sm">
            <p class="px-space-md mb-2 font-label-sm text-label-sm text-outline uppercase tracking-wider font-semibold">
                Akun
            </p>

            <!-- Logout (langsung keluar) -->
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

    <!-- Footer Sidebar -->
    <div class="p-space-md bg-surface-container-lowest flex items-center justify-between text-outline">
        <span class="font-label-sm text-label-sm">NoteTask</span>
        <span class="font-label-sm text-label-sm">Personal</span>
    </div>
</aside>


  <!-- Main -->
  <main class="flex-1 flex flex-col relative w-full min-w-0 lg:ml-72 lg:w-[calc(100%-18rem)] pt-[calc(4rem+env(safe-area-inset-top,0px))] pb-[calc(6rem+env(safe-area-inset-bottom,0px))] lg:pb-space-xl px-margin md:px-margin-md lg:px-margin-lg bg-surface">
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-start gap-space-lg w-full max-w-6xl mx-auto pb-space-lg">

      <!-- 1. Sapaan -->
      <section class="flex flex-col space-y-space-xs pt-space-xs lg:col-span-2">
        <div class="flex items-center justify-between gap-space-sm">
          <div class="flex items-center gap-space-xs min-w-0">
                       <!-- Nama diisi dari cache browser (instan), lalu diperbarui dari API -->
            <h1 id="greeting-user-name" class="font-headline-xl-mobile text-headline-xl-mobile text-on-surface truncate">Halo, <span class="inline-block align-middle h-6 w-28 rounded-md bg-surface-container animate-pulse"></span></h1>
            <span aria-hidden="true" class="text-headline-xl-mobile select-none flex-shrink-0 motion-safe:animate-bounce">👋</span>
          </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-space-xs">
          <div class="flex items-center gap-space-xs text-on-surface-variant font-body-sm text-body-sm">
            <span class="material-symbols-outlined text-[16px] text-primary">calendar_today</span>
            <span id="current-date-text"></span>
          </div>
          <div class="inline-flex items-center gap-space-xs bg-secondary-container/40 text-on-secondary-container px-space-sm py-0.5 rounded-full font-label-md text-label-md">
          </div>
        </div>
      </section>

      <!-- Tombol aktifkan notifikasi (BARU) -->
      <div class="lg:col-span-2">
        <button id="enable-push-btn" type="button" onclick="enablePush()"
          class="hidden flex items-center gap-space-xs bg-primary-fixed text-primary font-label-md text-label-md font-semibold px-space-md h-9 rounded-full active:scale-95 transition-all">
          <span class="material-symbols-outlined text-[18px]">notifications_active</span>
          Aktifkan Notifikasi
        </button>
      </div>

      <!-- Kolom kiri: statistik -->
      <div class="flex flex-col space-y-space-lg min-w-0">
        <section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col space-y-space-md">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-space-xs">
              <div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[18px]">pie_chart</span>
              </div>
              <h2 class="font-headline-sm text-headline-sm text-on-surface">Statistik Personal</h2>
            </div>
          </div>

          <div class="flex items-center gap-space-lg bg-surface-container-low/60 p-space-md rounded-lg">
            <div class="relative w-24 h-24 flex-shrink-0 flex items-center justify-center">
              <svg aria-hidden="true" class="w-24 h-24 transform -rotate-90" viewBox="0 0 36 36">
                <circle class="text-surface-container-highest" cx="18" cy="18" fill="none" r="14.5" stroke="currentColor" stroke-width="3"></circle>
                <circle class="text-tertiary-fixed-dim" cx="18" cy="18" fill="none" r="14.5" stroke="currentColor" stroke-dasharray="91.1" stroke-dashoffset="0" stroke-linecap="round" stroke-width="3.5"></circle>
                <circle class="text-secondary" cx="18" cy="18" fill="none" id="progress-circle" r="14.5" stroke="currentColor" stroke-dasharray="0 91.1" stroke-dashoffset="0" stroke-linecap="round" stroke-width="3.5"></circle>
              </svg>
              <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                <span id="completion-percentage" class="font-headline-sm text-headline-sm text-on-surface leading-none font-bold">0%</span>
                <span class="font-label-sm text-label-sm text-on-surface-variant scale-90">Produktivitas</span>
              </div>
            </div>
            <div class="flex-1 flex flex-col justify-center space-y-space-xs min-w-0">
              <div class="flex items-center justify-between text-on-surface">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-2.5 h-2.5 rounded-full bg-secondary flex-shrink-0"></span>
                  <span class="font-body-sm text-body-sm truncate">Tugas Selesai</span>
                </div>
                <span id="completed-tasks-summary" class="font-label-lg text-label-lg text-secondary font-bold">0</span>
              </div>
              <div class="flex items-center justify-between text-on-surface">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-2.5 h-2.5 rounded-full bg-tertiary-fixed-dim flex-shrink-0"></span>
                  <span class="font-body-sm text-body-sm truncate">Masih Pending</span>
                </div>
                <span id="pending-tasks-summary" class="font-label-lg text-label-lg text-tertiary font-bold">0</span>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-space-sm pt-space-xs">
            <div class="bg-surface-container-low p-space-md rounded-lg flex items-center justify-between gap-space-xs">
              <div class="flex flex-col min-w-0">
                <span class="font-label-sm text-label-sm text-outline truncate">Total Tugas</span>
                <span id="total-tasks" class="font-headline-sm text-headline-sm text-on-surface font-semibold">0</span>
              </div>
              <div class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
                <span class="material-symbols-outlined text-[20px]">format_list_bulleted</span>
              </div>
            </div>
            <div class="bg-surface-container-low p-space-md rounded-lg flex items-center justify-between gap-space-xs">
              <div class="flex flex-col min-w-0">
                <span class="font-label-sm text-label-sm text-secondary truncate">Tuntas</span>
                <span id="completed-tasks" class="font-headline-sm text-headline-sm text-on-surface font-semibold">0</span>
              </div>
              <div class="w-9 h-9 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container flex-shrink-0">
                <span class="material-symbols-outlined text-[20px]">task_alt</span>
              </div>
            </div>
            <div class="bg-surface-container-low p-space-md rounded-lg flex items-center justify-between gap-space-xs">
              <div class="flex flex-col min-w-0">
                <span class="font-label-sm text-label-sm text-tertiary truncate">Tertunda</span>
                <span id="pending-tasks" class="font-headline-sm text-headline-sm text-on-surface font-semibold">0</span>
              </div>
              <div class="w-9 h-9 rounded-lg bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed-variant flex-shrink-0">
                <span class="material-symbols-outlined text-[20px]">pending_actions</span>
              </div>
            </div>
            <div class="bg-surface-container-low p-space-md rounded-lg flex items-center justify-between gap-space-xs">
              <div class="flex flex-col min-w-0">
                <span class="font-label-sm text-label-sm text-error truncate">Jatuh Tempo</span>
                <span id="overdue-tasks" class="font-headline-sm text-headline-sm text-on-surface font-semibold">0</span>
              </div>
              <div class="w-9 h-9 rounded-lg bg-error-container flex items-center justify-center text-on-error-container flex-shrink-0">
                <span class="material-symbols-outlined text-[20px]">alarm_on</span>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Kalender Tugas -->
        <section class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col space-y-space-md">
          <div class="flex items-center justify-between gap-space-sm">
            <div class="flex items-center gap-space-xs min-w-0">
              <div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary flex-shrink-0">
                <span class="material-symbols-outlined text-[18px]">calendar_month</span>
              </div>
              <h2 class="font-headline-sm text-headline-sm text-on-surface truncate">Kalender Tugas</h2>
            </div>
          </div>

          <!-- Navigasi bulan -->
          <div class="flex items-center justify-between">
            <button type="button" aria-label="Bulan sebelumnya" onclick="changeCalendarMonth(-1)"
              class="w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container active:bg-surface-container-high">
              <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <span id="calendar-month-label" class="font-label-lg text-label-lg text-on-surface capitalize"></span>
            <button type="button" aria-label="Bulan berikutnya" onclick="changeCalendarMonth(1)"
              class="w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container active:bg-surface-container-high">
              <span class="material-symbols-outlined">chevron_right</span>
            </button>
          </div>

          <!-- Nama hari -->
          <div class="grid grid-cols-7 gap-1 text-center font-label-sm text-label-sm text-outline uppercase">
            <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
          </div>

          <!-- Tanggal -->
          <div id="calendar-grid" class="grid grid-cols-7 gap-1"></div>

          <!-- Keterangan warna -->
          <div class="flex flex-wrap items-center gap-x-space-md gap-y-1 font-label-md text-label-md text-on-surface-variant">
            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-tertiary-fixed-dim"></span>Belum selesai</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-secondary"></span>Selesai</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-error"></span>Terlambat</span>
          </div>

          <!-- Detail tugas di tanggal yang dipilih -->
          <div id="calendar-detail" class="border-t border-outline-variant/30 pt-space-md"></div>
        </section>

      </div>

      <!-- Kolom kanan: fokus hari ini + catatan cepat -->
      <div class="flex flex-col space-y-space-lg min-w-0">

        <!-- Fokus Hari Ini -->
        <section class="flex flex-col space-y-space-sm">
          <div class="flex items-center justify-between gap-space-sm px-space-xs">
            <div class="flex items-center gap-space-xs min-w-0">
              <span class="material-symbols-outlined text-primary text-[20px]">center_focus_strong</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface truncate">Fokus Hari Ini</h3>
            </div>

            <div class="flex items-center gap-space-md flex-shrink-0">
            <a class="font-label-md text-label-md text-primary font-semibold flex items-center min-h-11" data-path="my-tasks" href="/tasks"> Lihat Semua <span class="material-symbols-outlined text-[16px]">chevron_right</span> </a>
            </div>
            </div>

            <!-- Daftar tugas dari database (kerangka loading) -->
            <div id="focus-task-list" class="flex flex-col space-y-space-sm">
                <div class="bg-surface-container-lowest p-space-md rounded-xl animate-pulse flex flex-col gap-space-sm" aria-label="Memuat daftar tugas">
                    <div class="h-4 w-1/3 rounded bg-surface-container"></div>
                    <div class="h-5 w-2/3 rounded bg-surface-container"></div>
                    <div class="h-4 w-1/2 rounded bg-surface-container"></div>
                </div>
            </div>
        </section>

        <!-- Catatan Cepat -->
        <section class="flex flex-col space-y-space-sm">
          <div class="flex items-center justify-between px-space-xs">
            <div class="flex items-center gap-space-xs">
              <span class="material-symbols-outlined text-primary text-[20px]">sticky_note_2</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface">Catatan Cepat</h3>
            </div>
            <div class="flex items-center gap-space-md flex-shrink-0">
              <button class="min-h-11 -my-2 px-space-xs font-label-md text-label-md text-primary font-semibold flex items-center gap-0.5" onclick="addNewNoteAlert()" type="button">
                <span class="material-symbols-outlined text-[16px]">edit_note</span>
                <span>Tulis</span>
              </button>
              <a class="font-label-md text-label-md text-primary font-semibold flex items-center min-h-11 -my-2" href="/notes">
                Lihat Semua <span class="material-symbols-outlined text-[16px]">chevron_right</span>
              </a>
            </div>
          </div>


    <!-- Wadah untuk menampilkan catatan dari database (kerangka loading) -->
    <div id="quick-notes-container" class="grid grid-cols-1 gap-space-sm">
        <div class="bg-surface-container-low p-space-lg rounded-xl animate-pulse flex flex-col gap-space-sm" aria-label="Memuat catatan">
            <div class="h-3 w-1/4 rounded bg-surface-container"></div>
            <div class="h-5 w-2/3 rounded bg-surface-container"></div>
            <div class="h-4 w-full rounded bg-surface-container"></div>
        </div>
    </div>

        </section>

      </div>
    </div>

    <!-- Modal tambah tugas -->
    <div
        class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm items-end sm:items-center justify-center p-0 sm:p-margin hidden"
        id="quick-task-modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="quick-task-title"
    >
        <div class="bg-surface-container-lowest w-full max-w-md rounded-t-xl sm:rounded-xl p-space-lg pb-[calc(1.25rem+env(safe-area-inset-bottom,0px))] shadow-xl flex flex-col space-y-space-md transform transition-all">

            <!-- Judul modal -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                    <div class="w-7 h-7 rounded-md bg-primary-fixed flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">bolt</span>
                    </div>

                    <span
                        class="font-headline-sm text-headline-sm text-on-surface"
                        id="quick-task-title"
                    >
                        Tambah Tugas Baru
                    </span>
                </div>

                <button
                    aria-label="Tutup"
                    class="w-11 h-11 -mr-2 rounded-full flex items-center justify-center text-on-surface-variant"
                    onclick="closeTaskModal()"
                    type="button"
                >
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- Input judul tugas -->
            <div class="space-y-space-xs">
                <label
                    class="font-label-sm text-label-sm text-on-surface-variant font-medium"
                    for="task-input-title"
                >
                    Judul Tugas
                </label>

                <input
                    class="w-full h-11 px-space-md bg-surface-container-low rounded-lg text-base text-on-surface focus:outline-none focus:bg-surface-container focus-visible:ring-2 focus-visible:ring-primary"
                    id="task-input-title"
                    placeholder="Misal: Siapkan materi presentasi..."
                    type="text"
                >
            </div>

            <!-- Pilihan prioritas dan kategori -->
            <div class="grid grid-cols-2 gap-space-sm">
                <div>
                    <label
                        class="font-label-sm text-label-sm text-on-surface-variant font-medium"
                        for="task-input-priority"
                    >
                        Prioritas
                    </label>

                    <select
                        class="w-full h-11 px-space-sm bg-surface-container-low rounded-lg text-on-surface font-body-sm text-body-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-primary mt-1"
                        id="task-input-priority"
                    >
                        <option value="high">Tinggi (Urgent)</option>
                        <option value="medium" selected>Sedang (Normal)</option>
                        <option value="low">Rendah (Fleksibel)</option>
                    </select>
                </div>

                <div>
                    <label
                        class="font-label-sm text-label-sm text-on-surface-variant font-medium"
                        for="task-input-category"
                    >
                        Kategori
                    </label>

                    <select
                        class="w-full h-11 px-space-sm bg-surface-container-low rounded-lg text-on-surface font-body-sm text-body-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-primary mt-1"
                        id="task-input-category"
                    >
                        <option value="" selected>Tanpa kategori</option>
                    </select>
                </div>
            </div>


            <!-- Deadline (BARU) -->
            <div class="space-y-space-xs">
                <label for="task-input-due-date" class="font-label-sm text-label-sm text-on-surface-variant font-medium">Deadline</label>
                <input id="task-input-due-date" type="date"
                    class="w-full h-11 px-space-md bg-surface-container-low rounded-lg text-base text-on-surface focus:outline-none focus-visible:ring-2 focus-visible:ring-primary">
            </div>


            <!-- Tombol modal -->
            <div class="pt-space-xs flex items-center gap-space-sm">
                <button
                    class="flex-1 h-11 rounded-lg bg-surface-container text-on-surface font-label-lg text-label-lg"
                    onclick="closeTaskModal()"
                    type="button"
                >
                    Batal
                </button>

                <button
                    class="flex-1 h-11 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm"
                    onclick="saveQuickTask()"
                    type="button"
                >
                    Simpan Tugas
                </button>
            </div>
        </div>
    </div>

    <!-- Modal tambah catatan -->
    <div
        id="quick-note-modal"
        class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm items-end sm:items-center justify-center p-0 sm:p-margin hidden"
        role="dialog"
        aria-modal="true"
        aria-labelledby="quick-note-title"
    >
        <div class="bg-surface-container-lowest w-full max-w-md rounded-t-xl sm:rounded-xl p-space-lg shadow-xl flex flex-col space-y-space-md">

            <!-- Judul modal -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                    <div class="w-7 h-7 rounded-md bg-primary-fixed flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">edit_note</span>
                    </div>

                    <span
                        id="quick-note-title"
                        class="font-headline-sm text-headline-sm text-on-surface"
                    >
                        Tulis Catatan Baru
                    </span>
                </div>

                <button
                    type="button"
                    onclick="closeNoteModal()"
                    aria-label="Tutup"
                    class="w-11 h-11 -mr-2 rounded-full flex items-center justify-center text-on-surface-variant"
                >
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- Input judul catatan -->
            <div class="space-y-space-xs">
                <label
                    for="note-input-title"
                    class="font-label-sm text-label-sm text-on-surface-variant font-medium"
                >
                    Judul Catatan
                </label>

                <input
                    id="note-input-title"
                    type="text"
                    maxlength="255"
                    placeholder="Misal: Catatan pelajaran hari ini"
                    class="w-full h-11 px-space-md bg-surface-container-low rounded-lg text-base text-on-surface focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                >
            </div>

            <!-- Input isi catatan -->
            <div class="space-y-space-xs">
                <label
                    for="note-input-content"
                    class="font-label-sm text-label-sm text-on-surface-variant font-medium"
                >
                    Isi Catatan
                </label>

                <textarea
                    id="note-input-content"
                    rows="5"
                    placeholder="Tulis catatanmu di sini..."
                    class="w-full p-space-md bg-surface-container-low rounded-lg text-base text-on-surface resize-y focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                ></textarea>
            </div>

            <!-- Tombol modal -->
            <div class="pt-space-xs flex items-center gap-space-sm">
                <button
                    type="button"
                    onclick="closeNoteModal()"
                    class="flex-1 h-11 rounded-lg bg-surface-container text-on-surface font-label-lg text-label-lg"
                >
                    Batal
                </button>

                <button
                    type="button"
                    onclick="saveQuickNote()"
                    class="flex-1 h-11 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg shadow-sm"
                >
                    Simpan Catatan
                </button>
            </div>
        </div>
    </div>


<!-- Modal detail catatan -->
<div
    id="note-detail-modal"
    class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm items-end sm:items-center justify-center p-0 sm:p-margin hidden"
    role="dialog"
    aria-modal="true"
    aria-labelledby="note-detail-title"
>
    <div class="bg-surface-container-lowest w-full max-w-md max-h-[85vh] overflow-y-auto rounded-t-xl sm:rounded-xl p-space-lg shadow-xl flex flex-col space-y-space-md">

        <!-- Judul modal -->
        <div class="flex items-center justify-between gap-space-sm">
            <h3
                id="note-detail-title"
                class="font-headline-sm text-headline-sm text-on-surface font-semibold"
            >
                Detail Catatan
            </h3>

            <button
                type="button"
                onclick="closeNoteDetail()"
                aria-label="Tutup detail catatan"
                class="w-11 h-11 rounded-full flex items-center justify-center text-on-surface-variant"
            >
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Isi catatan -->
        <div>
            <h4
                id="note-detail-heading"
                class="text-lg font-semibold text-on-surface break-words"
            ></h4>

            <p
                id="note-detail-content"
                class="mt-3 text-sm text-on-surface-variant whitespace-pre-wrap break-words"
            ></p>
        </div>

        <!-- Tombol aksi -->
        <div class="flex items-center gap-space-sm">
            <a
                href="/notes"
                class="flex-1 h-11 rounded-lg bg-surface-container text-on-surface font-label-lg text-label-lg flex items-center justify-center gap-1"
            >
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                Buka di Catatan
            </a>

            <button
                type="button"
                onclick="closeNoteDetail()"
                class="flex-1 h-11 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg"
            >
                Tutup
            </button>
        </div>
    </div>
</div>


  </main>

  <!-- TOMBOL MELAYANG TAMBAH TUGAS (hanya mobile/tablet) -->
  <button
    aria-label="Tambah tugas baru"
    class="lg:hidden fixed right-4 bottom-[calc(1.5rem+env(safe-area-inset-bottom,0px))] z-40 w-14 h-14 rounded-full bg-primary-container text-on-primary shadow-lg flex items-center justify-center hover:bg-primary active:scale-95 transition-all"
    onclick="openTaskModal()"
    type="button"
  >
    <span class="material-symbols-outlined text-[28px]">add</span>
  </button>


  <script src="/js/notetask.js"></script>

<script>


    // Membuka sidebar
    function openDrawer() {
        const drawer = document.getElementById('side-drawer');
        drawer.classList.remove('-translate-x-full');
        drawer.classList.add('shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)]');
        document.getElementById('drawer-backdrop').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDrawer() {
        const drawer = document.getElementById('side-drawer');
        drawer.classList.add('-translate-x-full');
        drawer.classList.remove('shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)]');
        document.getElementById('drawer-backdrop').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Kalau layar jadi ukuran desktop, reset status drawer
    window.matchMedia('(min-width: 1024px)').addEventListener('change', function (e) {
        if (e.matches) closeDrawer();
    });

    // Mengamankan teks sebelum ditampilkan ke HTML
    function escapeTaskText(text) {
        return String(text ?? '').replace(/[&<>"']/g, function (char) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[char];
        });
    }

    // Mengubah kode prioritas menjadi tulisan
    function priorityLabel(priority) {
        const labels = {
            high: 'Tinggi',
            medium: 'Sedang',
            low: 'Rendah'
        };

        return labels[priority] || 'Sedang';
    }

    // Menampilkan tanggal tenggat tugas
    function formatTaskDate(date) {
        if (!date) return 'Belum ada tenggat';

        const dateOnly = String(date).slice(0, 10);
        const parsedDate = new Date(dateOnly + 'T00:00:00');

        if (Number.isNaN(parsedDate.getTime())) {
            return 'Tanggal tidak tersedia';
        }

        return parsedDate.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        });
    }

    // Mengubah tampilan checklist tugas
    function updateTaskAppearance(button, isCompleted) {
        const taskCard = button.closest('.task-card');
        const taskTitle = taskCard?.querySelector('.task-title');

        button.classList.toggle('bg-secondary', isCompleted);
        button.classList.toggle('text-on-secondary', isCompleted);
        button.classList.toggle('bg-surface-container-high', !isCompleted);
        button.classList.toggle('text-transparent', !isCompleted);

        button.setAttribute('aria-pressed', String(isCompleted));
        button.setAttribute(
            'aria-label',
            isCompleted
                ? 'Tandai tugas belum selesai'
                : 'Tandai tugas selesai'
        );

        if (taskTitle) {
            taskTitle.classList.toggle('line-through', isCompleted);
            taskTitle.classList.toggle('text-outline', isCompleted);
            taskTitle.classList.toggle('text-on-surface', !isCompleted);
        }
    }

    // Mengubah status tugas melalui API Laravel
    async function toggleTask(button) {
        const taskCard = button.closest('.task-card');
        const taskId = taskCard?.dataset.taskId;
        const token = localStorage.getItem('notetask_token');

        if (!taskId || !token || button.disabled) {
            if (!token) {
                showToast('Silakan login kembali.', 'error');

            }
            return;
        }

        const wasCompleted = button.getAttribute('aria-pressed') === 'true';
        const newStatus = wasCompleted ? 'pending' : 'completed';

        button.disabled = true;

        try {
            const response = await fetch(`/api/tasks/${taskId}`, {
                method: 'PATCH',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    status: newStatus
                })
            });

            if (!response.ok) {
                throw new Error('Gagal memperbarui status tugas.');
            }

            updateTaskAppearance(button, newStatus === 'completed');

            // Memperbarui statistik dan daftar tugas
            await loadDashboardStats();
            await loadFocusTasks();

        } catch (error) {
            console.error('Error memperbarui tugas:', error);
            showToast('Status tugas gagal diperbarui. Silakan coba lagi.', 'error');

        } finally {
            button.disabled = false;
        }
    }

    // Membuka modal tambah tugas
    function openTaskModal() {
        const modal = document.getElementById('quick-task-modal');

        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        const input = document.getElementById('task-input-title');
        if (input) input.focus();
    }

    // Menutup modal tambah tugas
    function closeTaskModal() {
        const modal = document.getElementById('quick-task-modal');

        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }


    // Membuka modal untuk menulis catatan baru
    function addNewNoteAlert() {
        const modal = document.getElementById('quick-note-modal');

        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        const input = document.getElementById('note-input-title');
        if (input) input.focus();
    }

    // Menutup modal catatan
    function closeNoteModal() {
        const modal = document.getElementById('quick-note-modal');

        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Menyimpan catatan ke API Notes
    async function saveQuickNote() {
        const token = localStorage.getItem('notetask_token');
        const titleInput = document.getElementById('note-input-title');
        const contentInput = document.getElementById('note-input-content');

        const title = titleInput.value.trim();
        const content = contentInput.value.trim();

        if (!token) {
            showToast('Sesi login tidak ditemukan. Silakan login kembali.', 'error');
            return;
        }

        if (!title || !content) {
            showToast('Judul dan isi catatan wajib diisi.', 'error');
            return;
        }

        try {
            const response = await fetch('/api/notes', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    title: title,
                    content: content
                })
            });

            const result = await response.json();

            if (!response.ok) {
                const pesan = result.message || 'Catatan gagal disimpan.';
                throw new Error(pesan);
            }

            showToast('Catatan berhasil disimpan!');

            titleInput.value = '';
            contentInput.value = '';

            closeNoteModal();

            // Memuat ulang daftar catatan setelah penyimpanan
            loadQuickNotes();
        } catch (error) {
            console.error('Error menyimpan catatan:', error);
            showToast(error.message || 'Terjadi kesalahan saat menyimpan catatan.', 'error');

        }
    }



    // Memuat daftar catatan dari database
    async function loadQuickNotes() {
        const token = localStorage.getItem('notetask_token');
        const container = document.getElementById('quick-notes-container');

        if (!token || !container) return;

        try {
            const response = await fetch('/api/notes', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Gagal memuat catatan.');
            }

            const notes = result.data || [];

            // Menampilkan pesan jika belum ada catatan
            if (notes.length === 0) {
                container.innerHTML = `
                    <div class="bg-surface-container-low p-space-lg rounded-xl">
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Belum ada catatan. Klik "Tulis" untuk membuat catatan baru.
                        </p>
                    </div>
                `;
                return;
            }


            // Menampilkan maksimal 3 catatan terbaru
            container.innerHTML = notes.slice(0, 3).map(note => `
                <article
                    onclick="openNoteDetail(${Number(note.id)})"
                    role="button"
                    tabindex="0"
                    onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openNoteDetail(${Number(note.id)}); }"
                    class="bg-surface-container-low p-space-lg rounded-xl shadow-sm flex flex-col space-y-space-xs cursor-pointer hover:bg-surface-container transition-colors"
                >
                    <div class="flex items-center gap-space-xs">
                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                        <span class="font-label-sm text-label-sm text-outline">
                            Catatan tersimpan
                        </span>
                    </div>

                    <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold line-clamp-1">
                        ${escapeTaskText(note.title)}
                    </h4>

                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
                        ${escapeTaskText(note.content)}
                    </p>

                    <span class="font-label-sm text-label-sm text-primary font-medium">
                        Baca selengkapnya →
                    </span>
                </article>
            `).join('');


        } catch (error) {
            console.error('Error memuat catatan:', error);

            container.innerHTML = `
                <p class="text-body-sm text-error">
                    Catatan gagal dimuat. Silakan muat ulang halaman.
                </p>
            `;
        }
    }


    // Membuka detail catatan berdasarkan ID
    async function openNoteDetail(noteId) {
        const token = localStorage.getItem('notetask_token');

        if (!token) {
            showToast('Sesi login tidak ditemukan. Silakan login kembali.', 'error');
            return;
        }

        try {
            const response = await fetch(`/api/notes/${noteId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Gagal memuat detail catatan.');
            }

            const note = result.data;

            // Menampilkan judul dan isi catatan
            document.getElementById('note-detail-heading').textContent = note.title;
            document.getElementById('note-detail-content').textContent = note.content;

            // Membuka modal detail
            const modal = document.getElementById('note-detail-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

        } catch (error) {
            console.error('Error membuka detail catatan:', error);
            showToast(error.message || 'Terjadi kesalahan saat membuka catatan.', 'error');
        }
    }

    // Menutup modal detail catatan
    function closeNoteDetail() {
        const modal = document.getElementById('note-detail-modal');

        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }




    // Menyimpan tugas baru ke database melalui API Laravel
    async function saveQuickTask() {
        const titleInput = document.getElementById('task-input-title');
        const priorityInput = document.getElementById('task-input-priority');
        const categoryInput = document.getElementById('task-input-category');
        const saveButton = document.querySelector(
            '#quick-task-modal button[onclick="saveQuickTask()"]'
        );

        const token = localStorage.getItem('notetask_token');
        const title = titleInput.value.trim();

        if (!token) {
            showToast('Silakan login kembali.', 'error');
            return;
        }

        if (!title) {
            showToast('Judul tugas wajib diisi.', 'error');
            titleInput.focus();
            return;
        }

        const taskData = {
            title: title,
            description: null,
            status: 'pending',
            priority: priorityInput.value,
            due_date: document.getElementById('task-input-due-date').value || null,
            category_id: categoryInput.value
                ? Number(categoryInput.value)
                : null
        };

        if (saveButton) {
            saveButton.disabled = true;
            saveButton.textContent = 'Menyimpan...';
        }

        try {
            const response = await fetch('/api/tasks', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(taskData)
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(
                    result.message || 'Tugas gagal disimpan.'
                );
            }

            // Mengosongkan form setelah berhasil
            titleInput.value = '';
            priorityInput.value = 'medium';
            categoryInput.value = '';
            document.getElementById('task-input-due-date').value = '';

            closeTaskModal();

            // Memuat ulang daftar tugas dan statistik
            await loadFocusTasks();
            await loadDashboardStats();

            showToast('Tugas berhasil disimpan!');

        } catch (error) {
            console.error('Error menyimpan tugas:', error);
            showToast(error.message || 'Terjadi kesalahan saat menyimpan tugas.', 'error');
        } finally {
            if (saveButton) {
                saveButton.disabled = false;
                saveButton.textContent = 'Simpan Tugas';
            }
        }
    }

    // Menutup sidebar atau modal dengan tombol Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeDrawer();
            closeTaskModal();
            closeNoteModal();
            closeNoteDetail();
        }
    });

    // Mengambil statistik tugas dari API Laravel
    async function loadDashboardStats() {
        const token = localStorage.getItem('notetask_token');

        if (!token) {
            console.log('Token login belum ditemukan.');
            return;
        }

        try {
            const response = await fetch('/api/dashboard', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            if (!response.ok) {
                throw new Error('Gagal mengambil statistik dashboard.');
            }

            const result = await response.json();
            const stats = result.data;

            document.getElementById('completion-percentage').textContent =
                `${stats.completion_percentage}%`;

            document.getElementById('completed-tasks-summary').textContent =
                stats.completed_tasks;

            document.getElementById('pending-tasks-summary').textContent =
                stats.pending_tasks;

            document.getElementById('total-tasks').textContent =
                stats.total_tasks;

            document.getElementById('completed-tasks').textContent =
                stats.completed_tasks;

            document.getElementById('pending-tasks').textContent =
                stats.pending_tasks;

            document.getElementById('overdue-tasks').textContent =
                stats.overdue_tasks;

            const progressCircle = document.getElementById('progress-circle');

            if (progressCircle) {
                const circumference = 91.1;
                const percentage = Math.min(
                    100,
                    Math.max(0, Number(stats.completion_percentage) || 0)
                );
                const progress = (percentage / 100) * circumference;

                progressCircle.setAttribute(
                    'stroke-dasharray',
                    `${progress} ${circumference}`
                );
            }
        } catch (error) {
            console.error('Error dashboard:', error);
        }
    }

    // Mengambil kategori dari database untuk pilihan di modal
    async function loadTaskCategories() {
        const token = localStorage.getItem('notetask_token');
        const categorySelect = document.getElementById('task-input-category');

        if (!token || !categorySelect) {
            return;
        }

        try {
            const response = await fetch('/api/categories', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Gagal mengambil kategori.');
            }

            // Mengosongkan pilihan kategori sebelumnya
            categorySelect.innerHTML = '<option value="">Tanpa kategori</option>';

            // Menampilkan kategori milik pengguna yang login
            result.data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;

                categorySelect.appendChild(option);
            });

        } catch (error) {
            console.error('Error memuat kategori:', error);
        }
    }

    // Mengambil tugas yang tenggatnya hari ini dan belum selesai.
    
    // (supaya daftar tidak berkedip setiap kali status tugas diubah).
    async function loadFocusTasks() {
        const container = document.getElementById('focus-task-list');
        const token = localStorage.getItem('notetask_token');

        if (!container) return;

        if (!token) {
            container.textContent = 'Silakan login untuk melihat tugas.';
            return;
        }

        try {
            const response = await fetch('/api/tasks', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Gagal mengambil daftar tugas.');
            }

            // Mengambil semua tugas milik pengguna dari API
            const tasks = result.data || [];

             // Kirim data ke kalender
            calendarTasks = tasks;
            renderCalendar();

            // Mengambil tanggal hari ini berdasarkan zona waktu Jakarta
            const today = new Intl.DateTimeFormat('en-CA', {
                timeZone: 'Asia/Jakarta',
                year: 'numeric',
                month: '2-digit',
                day: '2-digit'
            }).format(new Date());

            // Hanya menampilkan tugas pending yang tenggatnya hari ini
            const todayTasks = tasks.filter(task => {
                if (!task.due_date || task.status !== 'pending') {
                    return false;
                }

                const dueDate = String(task.due_date).slice(0, 10);

                return dueDate === today;
            });

            // Jika tidak ada tugas yang perlu dikerjakan hari ini
            if (todayTasks.length === 0) {
                container.innerHTML = `
                    <div class="bg-surface-container-lowest p-space-lg rounded-xl text-center">
                        <span class="material-symbols-outlined text-3xl text-secondary">
                            task_alt
                        </span>
                        <p class="mt-2 font-label-lg text-label-lg text-on-surface">
                            Tidak ada tugas untuk hari ini
                        </p>
                        <p class="mt-1 font-body-sm text-body-sm text-on-surface-variant">
                            Tugas dengan tenggat hari ini akan muncul di sini.
                        </p>
                    </div>
                `;
                return;
            }

            // Mengurutkan tugas berdasarkan prioritas
            const priorityOrder = {
                high: 1,
                medium: 2,
                low: 3
            };

            todayTasks.sort((a, b) => {
                return (priorityOrder[a.priority] || 2) -
                       (priorityOrder[b.priority] || 2);
            });

            // Menampilkan maksimal 3 tugas untuk fokus hari ini
            container.innerHTML = todayTasks.slice(0, 3).map(task => {
                const title = escapeTaskText(task.title);
                const priority = task.priority || 'medium';

                const category = escapeTaskText(
                    task.category?.name || 'Tanpa kategori'
                );

                const priorityClass = {
                    high: 'bg-error-container text-on-error-container',
                    medium: 'bg-tertiary-fixed text-on-tertiary-fixed-variant',
                    low: 'bg-surface-container text-on-surface-variant'
                }[priority] || 'bg-surface-container text-on-surface-variant';

                return `
                    <article
                        class="task-card bg-surface-container-lowest p-space-md rounded-xl shadow-sm transition-all duration-200"
                        data-task-id="${Number(task.id)}"
                    >
                        <div class="flex items-start gap-space-md">
                            <button
                                type="button"
                                aria-label="Tandai tugas selesai"
                                aria-pressed="false"
                                class="task-checkbox relative after:absolute after:-inset-2.5 after:content-[''] mt-0.5 w-6 h-6 rounded-lg bg-surface-container-high text-transparent flex items-center justify-center transition-colors flex-shrink-0"
                                onclick="toggleTask(this)"
                            >
                                <span class="material-symbols-outlined text-[18px]">check</span>
                            </button>

                            <div class="flex-1 min-w-0 flex flex-col space-y-space-xs">
                                <div class="flex items-center gap-space-xs flex-wrap">
                                    <span class="${priorityClass} font-label-sm text-label-sm px-space-xs py-0.5 rounded-full font-semibold">
                                        ${escapeTaskText(priorityLabel(priority))}
                                    </span>

                                    <span class="bg-surface-container text-on-surface-variant font-label-sm text-label-sm px-space-xs py-0.5 rounded-full">
                                        ${category}
                                    </span>
                                </div>

                                <p class="task-title font-label-lg text-label-lg text-on-surface font-semibold leading-snug">
                                    ${title}
                                </p>

                                <div class="flex items-center gap-space-xs text-outline font-body-sm text-body-sm">
                                    <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                                    <span>${escapeTaskText(formatTaskDate(task.due_date))}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                `;
            }).join('');

        } catch (error) {
            console.error('Error daftar tugas:', error);

            container.innerHTML = `
                <div class="bg-surface-container-lowest p-space-md rounded-xl">
                    <p class="text-body-sm text-error">
                        Daftar tugas gagal dimuat. Silakan muat ulang halaman.
                    </p>
                </div>
            `;
        }
    }


    // Menampilkan nama pengguna di sapaan dan sidebar
    function applyUserName(name) {
        if (!name) return;

        const greeting = document.getElementById('greeting-user-name');
        const sidebarName = document.getElementById('sidebar-user-name');

        if (greeting) greeting.textContent = `Halo, ${name}`;
        if (sidebarName) sidebarName.textContent = name;
    }

    // Langkah 1: tampilkan nama dari cache browser, tanpa menunggu server
    function applyCachedUser() {
        try {
            const cached = JSON.parse(localStorage.getItem('notetask_user') || 'null');
            if (cached && cached.name) applyUserName(cached.name);
        } catch (e) { /* data cache rusak, abaikan */ }
    }

    // Langkah 2: ambil dari API untuk memastikan datanya terbaru, lalu simpan ke cache
    async function loadUserGreeting() {
        const token = localStorage.getItem('notetask_token');
        const greeting = document.getElementById('greeting-user-name');

        if (!token) return;

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

            applyUserName(user.name);
            localStorage.setItem('notetask_user', JSON.stringify(user));

        } catch (error) {
            console.error('Error mengambil nama pengguna:', error);

            // Kalau tidak ada cache dan API gagal, ganti kerangka dengan sapaan umum
            if (greeting && greeting.querySelector('.animate-pulse')) {
                greeting.textContent = 'Halo, Pengguna';
            }
        }
    }


    // Menampilkan tanggal hari ini dalam bahasa Indonesia
    function loadCurrentDate() {
        const dateElement = document.getElementById('current-date-text');

        if (!dateElement) return;

        dateElement.textContent = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        });
    }


    // Mengatur navigasi menu dan tombol Lihat Semua
    document.querySelectorAll('[data-path]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const path = this.dataset.path;

            // Menentukan halaman tujuan
            const routes = {
                'user-personal': '/dashboard',
                'my-tasks': '/tasks',
                'categories': '/categories',
                'quick-notes': '/notes'
            };

            // Pindah ke halaman yang sesuai
            if (routes[path]) {
                window.location.href = routes[path];
            }
        });
    });

    function highlightActiveMenu() {
        const routes = {
            'user-personal': '/dashboard',
            'my-tasks': '/tasks',
            'categories': '/categories',
            'quick-notes': '/notes'
        };
        const current = location.pathname.replace(/\/$/, '') || '/';

        function apply(selector, on, off) {
            document.querySelectorAll(selector).forEach(function (a) {
                const target = routes[a.dataset.path];
                if (!target) return;
                const active = current === target || current.startsWith(target + '/');

                a.classList.remove(...(active ? off : on));
                a.classList.add(...(active ? on : off));
                if (active) a.setAttribute('aria-current', 'page');
                else a.removeAttribute('aria-current');
            });
        }

        apply('#side-drawer nav a[data-path]', ['bg-surface-container', 'text-primary'], ['text-on-surface']);
        apply('nav[aria-label="Navigasi utama"] a[data-path]', ['text-primary', 'font-semibold'], ['text-on-surface-variant']);
    }


        // ===== Kalender Tugas =====
    let calendarTasks = [];

    function getJakartaToday() {
        return new Intl.DateTimeFormat('en-CA', {
            timeZone: 'Asia/Jakarta',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).format(new Date());
    }

    let calendarToday = getJakartaToday();
    let calendarYear = Number(calendarToday.slice(0, 4));
    let calendarMonth = Number(calendarToday.slice(5, 7)) - 1; // 0-11
    let calendarSelected = calendarToday;

    function padTwo(number) {
        return String(number).padStart(2, '0');
    }

    function getTaskDateOnly(task) {
        return task.due_date ? String(task.due_date).slice(0, 10) : '';
    }

    // Menggambar kalender satu bulan penuh
    function renderCalendar() {
        const grid = document.getElementById('calendar-grid');
        const label = document.getElementById('calendar-month-label');

        if (!grid || !label) return;

        calendarToday = getJakartaToday();

        label.textContent = new Date(calendarYear, calendarMonth, 1)
            .toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });

        // Kelompokkan tugas berdasarkan tanggal deadline
        const byDate = {};
        calendarTasks.forEach(task => {
            const date = getTaskDateOnly(task);
            if (!date) return;
            (byDate[date] = byDate[date] || []).push(task);
        });

        // Minggu dimulai dari Senin
        const offset = (new Date(calendarYear, calendarMonth, 1).getDay() + 6) % 7;
        const daysInMonth = new Date(calendarYear, calendarMonth + 1, 0).getDate();

        let html = '';

        for (let i = 0; i < offset; i++) {
            html += '<div></div>';
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateStr = `${calendarYear}-${padTwo(calendarMonth + 1)}-${padTwo(day)}`;
            const list = byDate[dateStr] || [];
            const pending = list.filter(t => t.status === 'pending').length;
            const completed = list.filter(t => t.status === 'completed').length;
            const overdue = pending > 0 && dateStr < calendarToday;

            const isSelected = dateStr === calendarSelected;
            const isToday = dateStr === calendarToday;

            let cellClass = 'h-11 rounded-lg flex flex-col items-center justify-center gap-0.5 font-label-lg text-label-lg transition-colors ';
            if (isSelected) {
                cellClass += 'bg-primary text-on-primary';
            } else {
                cellClass += 'text-on-surface hover:bg-surface-container active:bg-surface-container-high';
                if (isToday) cellClass += ' ring-2 ring-primary/50';
            }

            let dots = '';
            if (pending > 0) {
                dots += `<span class="w-1.5 h-1.5 rounded-full ${overdue ? 'bg-error' : 'bg-tertiary-fixed-dim'}"></span>`;
            }
            if (completed > 0) {
                dots += '<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>';
            }

            html += `
                <button type="button" data-date="${dateStr}"
                    aria-label="${day}, ${list.length} tugas"
                    class="${cellClass}">
                    <span>${day}</span>
                    <span class="flex gap-0.5 h-1.5">${dots}</span>
                </button>`;
        }

        grid.innerHTML = html;
        renderCalendarDetail();
    }

    // Menampilkan daftar tugas pada tanggal yang dipilih
    function renderCalendarDetail() {
        const box = document.getElementById('calendar-detail');
        if (!box) return;

        const list = calendarTasks.filter(task => getTaskDateOnly(task) === calendarSelected);

        const dateLabel = new Date(calendarSelected + 'T00:00:00').toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        if (list.length === 0) {
            box.innerHTML = `
                <p class="font-label-lg text-label-lg text-on-surface">${escapeTaskText(dateLabel)}</p>
                <p class="mt-1 font-body-sm text-body-sm text-on-surface-variant">Tidak ada tugas di tanggal ini.</p>
            `;
            return;
        }

        const doneCount = list.filter(t => t.status === 'completed').length;
        const pendingCount = list.length - doneCount;
        const isPast = calendarSelected < calendarToday;

        const items = list.map(task => {
            const completed = task.status === 'completed';

            let badgeClass = 'bg-tertiary-fixed text-on-tertiary-fixed-variant';
            let badgeText = 'Belum selesai';

            if (completed) {
                badgeClass = 'bg-secondary-container text-on-secondary-container';
                badgeText = 'Selesai';
            } else if (isPast) {
                badgeClass = 'bg-error-container text-on-error-container';
                badgeText = 'Terlambat';
            }

            return `
                <div class="flex items-start justify-between gap-space-sm bg-surface-container-low p-space-md rounded-lg">
                    <div class="min-w-0">
                        <p class="font-label-lg text-label-lg break-words ${completed ? 'line-through text-outline' : 'text-on-surface'}">
                            ${escapeTaskText(task.title)}
                        </p>
                        <p class="mt-0.5 font-body-sm text-body-sm text-on-surface-variant">
                            ${escapeTaskText(task.category?.name || 'Tanpa kategori')} · Prioritas ${escapeTaskText(priorityLabel(task.priority))}
                        </p>
                    </div>
                    <span class="${badgeClass} flex-shrink-0 font-label-sm text-label-sm px-space-sm py-0.5 rounded-full">
                        ${badgeText}
                    </span>
                </div>`;
        }).join('');

        box.innerHTML = `
            <p class="font-label-lg text-label-lg text-on-surface">${escapeTaskText(dateLabel)}</p>
            <p class="mt-0.5 mb-space-sm font-body-sm text-body-sm text-on-surface-variant">
                ${list.length} tugas · ${doneCount} selesai · ${pendingCount} belum selesai
            </p>
            <div class="flex flex-col gap-space-xs">${items}</div>
        `;
    }

    function changeCalendarMonth(step) {
        calendarMonth += step;

        if (calendarMonth < 0) {
            calendarMonth = 11;
            calendarYear--;
        } else if (calendarMonth > 11) {
            calendarMonth = 0;
            calendarYear++;
        }

        renderCalendar();
    }

    function goToCalendarToday() {
        calendarToday = getJakartaToday();
        calendarYear = Number(calendarToday.slice(0, 4));
        calendarMonth = Number(calendarToday.slice(5, 7)) - 1;
        calendarSelected = calendarToday;
        renderCalendar();
    }

    // Klik tanggal untuk melihat tugasnya
    document.getElementById('calendar-grid')?.addEventListener('click', function (event) {
        const button = event.target.closest('[data-date]');
        if (!button) return;

        calendarSelected = button.dataset.date;
        renderCalendar();
    });
    

        // ===== Notifikasi di luar aplikasi (Web Push) =====
    const VAPID_PUBLIC_KEY = '{{ config("webpush.vapid.public_key") }}';

    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
        const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
        const raw = atob(base64);
        return Uint8Array.from([...raw].map(char => char.charCodeAt(0)));
    }

    async function enablePush(silent = false) {
        const token = localStorage.getItem('notetask_token');
        if (!token) return;

        try {
            const registration = await navigator.serviceWorker.register('/sw.js');
            await navigator.serviceWorker.ready;

            if (Notification.permission !== 'granted') {
                const permission = await Notification.requestPermission();
                if (permission !== 'granted') {
                    showToast('Izin notifikasi ditolak.', 'error');
                    return;
                }
            }

            let subscription = await registration.pushManager.getSubscription();

            if (!subscription) {
                subscription = await registration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: urlBase64ToUint8Array(VAPID_PUBLIC_KEY)
                });
            }

            const response = await fetch('/api/push/subscribe', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(subscription.toJSON())
            });

            if (!response.ok) throw new Error('Gagal menyimpan langganan notifikasi.');

            document.getElementById('enable-push-btn')?.classList.add('hidden');
            if (!silent) showToast('Notifikasi berhasil diaktifkan!');
        } catch (error) {
            console.error('Error notifikasi:', error);
            if (!silent) showToast(error.message || 'Notifikasi gagal diaktifkan.', 'error');
        }
    }

    function initPushButton() {
        const button = document.getElementById('enable-push-btn');
        if (!button) return;

        if (!('serviceWorker' in navigator) || !('PushManager' in window) || !('Notification' in window)) {
            return;
        }

        if (Notification.permission === 'granted') {
            enablePush(true);
        } else if (Notification.permission === 'default') {
            button.classList.remove('hidden');
        }
    }

    // Nama dari cache langsung dipasang sebelum halaman sempat tampil
    applyCachedUser();

    // Memuat data saat halaman dashboard dibuka
    document.addEventListener('DOMContentLoaded', function () {
        loadUserGreeting();
        loadCurrentDate();
        renderCalendar();
        loadDashboardStats();
        loadFocusTasks();
        loadTaskCategories();
        loadQuickNotes();
        initPushButton();
        try { highlightActiveMenu(); } catch (e) { console.error(e); }
    });

</script>

</body>
</html>