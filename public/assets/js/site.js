'use strict';

/**
 * Interaksi kecil untuk website. Semua halaman tetap bisa dipakai tanpa JavaScript:
 * skrip ini hanya menambahkan menu mobile, filter, tombol salin, dan penanda progres baca.
 */

/* Menu navigasi pada layar kecil */
(function initMobileMenu() {
    const button = document.querySelector('.nav-toggle');
    const menu = document.getElementById('site-menu');
    if (!button || !menu) return;

    const setOpen = (open) => {
        button.setAttribute('aria-expanded', String(open));
        menu.classList.toggle('is-open', open);
    };

    button.addEventListener('click', () => {
        setOpen(button.getAttribute('aria-expanded') !== 'true');
    });

    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setOpen(false)));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') {
            setOpen(false);
            button.focus();
        }
    });
})();

/* Filter daftar (portofolio dan blog). Tombol baru muncul setelah skrip ini berjalan. */
(function initFilters() {
    document.querySelectorAll('[data-filter-bar]').forEach((bar) => {
        const list = document.getElementById(bar.dataset.target);
        if (!list) return;

        const buttons = bar.querySelectorAll('[data-filter-value]');
        const items = list.querySelectorAll('[data-filter-item]');
        bar.hidden = false;

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const value = button.dataset.filterValue;

                buttons.forEach((other) => {
                    const active = other === button;
                    other.classList.toggle('is-active', active);
                    other.setAttribute('aria-pressed', String(active));
                });

                items.forEach((item) => {
                    item.hidden = value !== 'all' && item.dataset.filterItem !== value;
                });
            });
        });
    });
})();

/* Tombol "Salin alamat" di halaman kontak */
(function initCopyButtons() {
    document.querySelectorAll('[data-copy-target]').forEach((button) => {
        const source = document.getElementById(button.dataset.copyTarget);
        if (!source || !navigator.clipboard) return;

        button.hidden = false;
        const originalLabel = button.textContent;

        button.addEventListener('click', async () => {
            try {
                await navigator.clipboard.writeText(source.textContent.trim());
                button.textContent = 'Tersalin';
                button.classList.add('is-copied');
            } catch (error) {
                button.textContent = 'Gagal menyalin';
            }

            setTimeout(() => {
                button.textContent = originalLabel;
                button.classList.remove('is-copied');
            }, 2000);
        });
    });
})();

/* Penanda progres baca di halaman artikel */
(function initReadingProgress() {
    const bar = document.querySelector('[data-reading-progress]');
    const article = document.querySelector('.post');
    if (!bar || !article) return;

    const update = () => {
        const total = article.offsetHeight - window.innerHeight;
        const scrolled = window.scrollY - article.offsetTop;
        const progress = total > 0 ? Math.min(Math.max(scrolled / total, 0), 1) : 0;
        bar.style.setProperty('--progress', progress.toFixed(3));
    };

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
})();
