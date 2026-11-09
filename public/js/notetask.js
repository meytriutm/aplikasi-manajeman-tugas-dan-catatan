// Toast notifikasi: muncul di atas, hilang otomatis.
function showToast(message, type = 'success', duration = 3000) {
    let container = document.getElementById('toast-container');

    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'pointer-events-none fixed inset-x-0 top-4 z-[100] flex flex-col items-center gap-2 px-4';
        container.style.paddingTop = 'env(safe-area-inset-top, 0px)';
        document.body.appendChild(container);
    }

    const isError = type === 'error';
    const toast = document.createElement('div');
    toast.className = 'pointer-events-auto flex max-w-sm items-center gap-2 rounded-full bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white shadow-lg transition-all duration-300 opacity-0 -translate-y-2';

    const icon = document.createElement('span');
    icon.className = 'material-symbols-outlined text-lg ' + (isError ? 'text-red-400' : 'text-emerald-400');
    icon.style.fontVariationSettings = "'FILL' 0, 'wght' 500";
    icon.textContent = isError ? 'error' : 'check_circle';

    const text = document.createElement('span');
    text.textContent = message;

    toast.append(icon, text);
    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.classList.remove('opacity-0', '-translate-y-2');
    });

    setTimeout(() => {
        toast.classList.add('opacity-0', '-translate-y-2');
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

// Logout: hapus token di server, bersihkan data browser, tandai notif, lalu ke halaman login.
async function logoutUser(button) {
    const token = localStorage.getItem('notetask_token');

    if (button) button.disabled = true;

    try {
        if (token) {
            const response = await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token
                }
            });

            // 401 = token sudah tidak berlaku, tetap lanjut keluar
            if (!response.ok && response.status !== 401) {
                throw new Error('Logout gagal. Coba kembali.');
            }
        }

        localStorage.removeItem('notetask_token');
        localStorage.removeItem('notetask_user');
        sessionStorage.removeItem('notetask_notes_cache');
        sessionStorage.setItem('notetask_flash', 'logout');

        window.location.href = '/auth/login';
    } catch (error) {
        console.error('Error logout:', error);
        showToast(error.message || 'Terjadi kesalahan saat logout.', 'error', 4500);
        if (button) button.disabled = false;
    }
}