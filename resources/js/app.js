import './bootstrap';

const themeStorageKey = 'anime-quest-theme';

const getPreferredTheme = () => {
    if (typeof window === 'undefined') {
        return 'light';
    }

    const stored = window.localStorage.getItem(themeStorageKey);
    if (stored === 'dark' || stored === 'light') {
        return stored;
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
};

const applyTheme = (theme) => {
    const root = document.documentElement;
    const label = document.querySelector('[data-theme-label]');

    if (theme === 'dark') {
        root.classList.add('dark');
        label?.classList.add('text-white');
        if (label) {
            label.textContent = 'Светлый режим';
        }
    } else {
        root.classList.remove('dark');
        label?.classList.remove('text-white');
        if (label) {
            label.textContent = 'Тёмный режим';
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.querySelector('[data-theme-toggle]');
    const spoilerToggle = document.querySelector('[data-spoiler-toggle]');
    const spoilerText = document.querySelector('[data-spoiler-text]');
    const spoilerOverlay = document.querySelector('[data-spoiler-overlay]');
    const hintButtons = document.querySelectorAll('[data-hint-button]');
    const hintPointsEl = document.querySelector('[data-hint-points]');
    const hintOutputEl = document.querySelector('[data-hint-output]');
    const hintRemainingEl = document.querySelector('[data-hint-remaining]');
    const timerEl = document.querySelector('[data-daily-timer]');

    let theme = getPreferredTheme();
    applyTheme(theme);
    themeToggle?.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');

    themeToggle?.addEventListener('click', () => {
        theme = theme === 'dark' ? 'light' : 'dark';
        window.localStorage.setItem(themeStorageKey, theme);
        applyTheme(theme);
        themeToggle.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
    });

    const updateTimer = () => {
        if (!timerEl) {
            return;
        }

        const now = new Date();
        const next = new Date(now);
        next.setHours(24, 0, 0, 0);
        const diff = next.getTime() - now.getTime();

        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        timerEl.textContent = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    };

    if (timerEl) {
        updateTimer();
        window.setInterval(updateTimer, 1000);
    }

    let spoilerRevealed = false;
    spoilerToggle?.addEventListener('click', () => {
        spoilerRevealed = !spoilerRevealed;

        if (spoilerText && spoilerOverlay && spoilerToggle) {
            if (spoilerRevealed) {
                spoilerText.classList.remove('blur-lg');
                spoilerOverlay.classList.add('opacity-0', 'translate-y-4');
                spoilerOverlay.classList.remove('opacity-100', 'translate-y-0');
                spoilerToggle.innerHTML = `
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12h12" />
                    </svg>
                    Скрыть цитату
                `;
            } else {
                spoilerText.classList.add('blur-lg');
                spoilerOverlay.classList.remove('opacity-0', 'translate-y-4');
                spoilerOverlay.classList.add('opacity-100', 'translate-y-0');
                spoilerToggle.innerHTML = `
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                    Показать цитату
                `;
            }
        }
    });

    let currentPoints = Number(hintPointsEl?.textContent ?? 0);
    let hintsRemaining = hintButtons.length;

    const refreshHintState = () => {
        if (hintPointsEl) {
            hintPointsEl.textContent = String(currentPoints);
        }
        if (hintRemainingEl) {
            hintRemainingEl.textContent = String(hintsRemaining);
        }
    };

    hintButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const cost = Number(button.dataset.hintCost ?? 0);
            const message = button.dataset.hintMessage ?? '';

            if (button.disabled) {
                return;
            }

            if (currentPoints < cost) {
                hintOutputEl?.classList.add('text-rose-500');
                if (hintOutputEl) {
                    hintOutputEl.textContent = 'Недостаточно очков для этой подсказки. Попробуй более дешёвый вариант или копи серию побед!';
                }
                window.setTimeout(() => hintOutputEl?.classList.remove('text-rose-500'), 1500);
                return;
            }

            currentPoints -= cost;
            hintsRemaining = Math.max(0, hintsRemaining - 1);
            button.disabled = true;
            button.classList.add('opacity-60', 'cursor-not-allowed');
            button.classList.remove('hover:-translate-y-0.5');

            if (hintOutputEl) {
                hintOutputEl.classList.remove('text-rose-500');
                hintOutputEl.textContent = message;
            }

            refreshHintState();
        });
    });

    refreshHintState();
});
