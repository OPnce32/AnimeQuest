<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Anime Quote Guessr — угадайте аниме по изображениям персонажей, собирайте очки за подсказки и состязайтесь в рейтинге игроков.">
        <title>{{ config('app.name', 'Anime Quote Guessr') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900 transition-colors duration-500 dark:bg-slate-950 dark:text-slate-100">
        <div class="relative isolate overflow-hidden">
            <div class="pointer-events-none absolute inset-0 -z-20 bg-[radial-gradient(circle_at_top,theme(colors.purple.500)/15,transparent_55%)]"></div>
            <div class="pointer-events-none absolute inset-0 -z-30 bg-[conic-gradient(at_10%_-20%,#f97316_0deg,#a855f7_120deg,#0ea5e9_240deg,#f97316_360deg)] opacity-50 mix-blend-screen animate-gradient"></div>
            <div class="pointer-events-none absolute -top-24 left-1/2 -z-10 h-80 w-80 -translate-x-1/2 rounded-full bg-fuchsia-400/40 blur-[120px] dark:bg-indigo-500/40"></div>

            <header class="relative z-10 px-6 py-6 transition-colors lg:px-12">
                <nav class="mx-auto flex max-w-6xl items-center justify-between rounded-3xl bg-white/70 p-4 shadow-xl shadow-purple-500/10 ring-1 ring-black/5 backdrop-blur-lg transition-colors dark:bg-slate-900/70 dark:ring-white/10">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 via-indigo-500 to-sky-500 text-lg font-semibold text-white shadow-lg shadow-purple-500/40">
                            AQ
                        </span>
                        <div>
                            <p class="text-sm uppercase tracking-[0.35em] text-slate-500 dark:text-slate-400">Daily quest</p>
                            <p class="text-xl font-semibold">Anime Quote Guessr</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" data-theme-toggle class="flex items-center gap-2 rounded-2xl border border-transparent bg-slate-900/5 px-4 py-2 text-sm font-semibold text-slate-700 shadow-inner shadow-white/70 transition hover:-translate-y-0.5 hover:bg-slate-900/10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500 dark:bg-white/10 dark:text-slate-100">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_12px_rgba(52,211,153,0.9)]"></span>
                            <span data-theme-label>Тёмный режим</span>
                        </button>
                        <a href="#daily" class="hidden rounded-2xl bg-gradient-to-r from-purple-500 via-indigo-500 to-sky-500 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-purple-500/40 transition hover:shadow-purple-500/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500 sm:inline-flex">
                            Присоединиться
                        </a>
                    </div>
                </nav>
            </header>

            <main class="relative z-10 mx-auto flex min-h-[calc(100vh-6rem)] max-w-6xl flex-col gap-20 px-6 pb-24 pt-12 lg:px-12">
                <section class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-slate-500 shadow-sm dark:border-white/10 dark:bg-slate-900/70 dark:text-slate-300">
                            <span class="inline-flex h-2 w-2 animate-ping rounded-full bg-purple-500/70"></span>
                            Новая загадка каждый день
                        </div>
                        <h1 class="mt-6 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">
                            Угадай тайтл по изображению персонажа и стань легендой Anime Quest
                        </h1>
                        <p class="mt-6 max-w-xl text-lg text-slate-600 dark:text-slate-300">
                            Каждый день тебя ждёт один загадочный кадр и цитата. Зарабатывай очки, обдумывай подсказки, следи за таймером и обгоняй друзей в рейтинге игроков.
                        </p>
                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            <a href="#how" class="rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/30 transition hover:-translate-y-0.5 hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:shadow-white/30">Как это работает</a>
                            <a href="#leaderboard" class="group inline-flex items-center gap-2 text-sm font-semibold text-purple-500 transition hover:text-purple-400">
                                <span>Посмотреть топ игроков</span>
                                <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0-5-5m5 5-5 5" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-12 grid gap-6 sm:grid-cols-3">
                            <div class="rounded-3xl border border-slate-200/80 bg-white/60 p-6 shadow-lg shadow-purple-500/10 backdrop-blur transition hover:-translate-y-1 hover:shadow-purple-500/30 dark:border-white/10 dark:bg-slate-900/70">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">До следующей загадки</p>
                                <p class="mt-3 text-3xl font-semibold" data-daily-timer>--:--:--</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Таймер обнуляется в полночь по вашему времени.</p>
                            </div>
                            <div class="rounded-3xl border border-slate-200/80 bg-white/60 p-6 shadow-lg shadow-sky-500/10 backdrop-blur transition hover:-translate-y-1 hover:shadow-sky-500/30 dark:border-white/10 dark:bg-slate-900/70">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Антиспойлер</p>
                                <div class="mt-3 relative overflow-hidden rounded-2xl bg-slate-900/90 px-4 py-5 text-center text-sm font-semibold uppercase tracking-[0.35em] text-white/80 shadow-lg shadow-purple-500/20" data-spoiler-container>
                                    <div class="select-none transition duration-500 blur-lg" data-spoiler-text>«Я клянусь защитить тебя, даже если мир обрушится»</div>
                                    <div class="pointer-events-none absolute inset-0 flex items-center justify-center bg-slate-900/80 text-[10px] tracking-[0.6em] uppercase text-white/70 opacity-100 transition duration-500 translate-y-0" data-spoiler-overlay>Антиспойлер</div>
                                </div>
                                <button type="button" data-spoiler-toggle class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-purple-500 transition hover:text-purple-400">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                    Показать цитату
                                </button>
                            </div>
                            <div class="rounded-3xl border border-slate-200/80 bg-white/60 p-6 shadow-lg shadow-emerald-500/10 backdrop-blur transition hover:-translate-y-1 hover:shadow-emerald-500/30 dark:border-white/10 dark:bg-slate-900/70">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Запас очков</p>
                                <p class="mt-3 text-3xl font-semibold"><span data-hint-points>150</span> pts</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Потрать баллы на подсказки или береги их для рейтинга.</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="pointer-events-none absolute -top-12 left-10 h-44 w-44 rounded-full bg-purple-400/40 blur-3xl"></div>
                        <div class="pointer-events-none absolute bottom-0 right-6 h-32 w-32 rounded-full bg-sky-400/40 blur-3xl"></div>
                        <div class="relative grid gap-6">
                            <div class="float-slow relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/70 p-6 shadow-2xl shadow-purple-500/30 backdrop-blur transition hover:-translate-y-1 dark:border-white/10 dark:bg-slate-900/70">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Галерея дня</p>
                                <div class="mt-4 grid grid-cols-3 gap-3 text-center text-xs font-medium text-slate-600 dark:text-slate-300">
                                    <div class="space-y-3 rounded-2xl bg-gradient-to-br from-purple-500/20 to-purple-600/10 p-3 shadow-inner shadow-purple-500/20">
                                        <span class="block text-[10px] uppercase tracking-[0.3em] text-purple-400">1%</span>
                                        <p class="text-sm font-semibold">Суперсложно</p>
                                    </div>
                                    <div class="space-y-3 rounded-2xl bg-gradient-to-br from-sky-500/20 to-sky-600/10 p-3 shadow-inner shadow-sky-500/20">
                                        <span class="block text-[10px] uppercase tracking-[0.3em] text-sky-400">45%</span>
                                        <p class="text-sm font-semibold">Угадали</p>
                                    </div>
                                    <div class="space-y-3 rounded-2xl bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 p-3 shadow-inner shadow-emerald-500/20">
                                        <span class="block text-[10px] uppercase tracking-[0.3em] text-emerald-400">+120</span>
                                        <p class="text-sm font-semibold">Рекорд очков</p>
                                    </div>
                                </div>
                                <div class="mt-6 rounded-2xl bg-slate-900/90 p-4 text-white shadow-lg shadow-purple-500/20">
                                    <p class="text-xs uppercase tracking-[0.3em] text-white/60">Совет дня</p>
                                    <p class="mt-2 text-sm">Обрати внимание на детали формы — иногда она выдаёт школу героя.</p>
                                </div>
                            </div>
                            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/70 p-6 shadow-2xl shadow-sky-500/20 backdrop-blur transition hover:-translate-y-1 dark:border-white/10 dark:bg-slate-900/70">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Подсказки за очки</p>
                                <div class="mt-4 flex flex-wrap items-center gap-3" data-hint-panel>
                                    <button type="button" data-hint-button data-hint-cost="30" data-hint-message="Цвет волос персонажа напоминает вечерний закат." class="rounded-full border border-purple-500/30 bg-purple-500/10 px-4 py-2 text-xs font-semibold text-purple-600 transition hover:-translate-y-0.5 hover:bg-purple-500/20 dark:text-purple-300">
                                        -30 pts: Облик
                                    </button>
                                    <button type="button" data-hint-button data-hint-cost="50" data-hint-message="Аниме транслировалось в 2019 году и посвящено супергеройской академии." class="rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-semibold text-sky-600 transition hover:-translate-y-0.5 hover:bg-sky-500/20 dark:text-sky-300">
                                        -50 pts: Год & жанр
                                    </button>
                                    <button type="button" data-hint-button data-hint-cost="70" data-hint-message="Имя героя звучит как символ надежды для всей школы." class="rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-2 text-xs font-semibold text-emerald-600 transition hover:-translate-y-0.5 hover:bg-emerald-500/20 dark:text-emerald-300">
                                        -70 pts: Контекст цитаты
                                    </button>
                                </div>
                                <p class="mt-4 text-sm text-slate-600 dark:text-slate-300" data-hint-output>Выбирай подсказку с умом — каждая попытка влияет на итоговый рейтинг.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="how" class="rounded-3xl border border-slate-200/80 bg-white/60 p-8 shadow-2xl shadow-purple-500/10 backdrop-blur-lg transition dark:border-white/10 dark:bg-slate-900/70">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-[0.4em] text-slate-500 dark:text-slate-400">Механика</p>
                            <h2 class="mt-2 text-3xl font-semibold">Три шага к победе</h2>
                        </div>
                        <a href="#daily" class="inline-flex items-center gap-2 rounded-full border border-purple-500/30 bg-purple-500/10 px-4 py-2 text-xs font-semibold text-purple-600 transition hover:-translate-y-0.5 hover:bg-purple-500/20 dark:text-purple-200">
                            Начать сейчас
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0-5-5m5 5-5 5" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        <div class="group relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-lg shadow-purple-500/20 transition hover:-translate-y-1 hover:shadow-purple-500/40 dark:border-white/10 dark:bg-slate-900/70">
                            <span class="text-5xl font-semibold text-purple-400/70">01</span>
                            <h3 class="mt-4 text-xl font-semibold">Смотри и анализируй</h3>
                            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Исследуй кадр, примечай детали костюма и окружения. Каждый элемент может стать ключом к верному тайтлу.</p>
                            <div class="absolute -right-6 top-6 h-20 w-20 rounded-full bg-purple-500/10 blur-2xl transition group-hover:blur-xl"></div>
                        </div>
                        <div class="group relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-lg shadow-sky-500/20 transition hover:-translate-y-1 hover:shadow-sky-500/40 dark:border-white/10 dark:bg-slate-900/70">
                            <span class="text-5xl font-semibold text-sky-400/70">02</span>
                            <h3 class="mt-4 text-xl font-semibold">Управляй подсказками</h3>
                            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Распределяй очки: чем меньше их тратишь, тем выше шанс занять лидерскую позицию и получить награды сезона.</p>
                            <div class="absolute -left-6 bottom-6 h-20 w-20 rounded-full bg-sky-500/10 blur-2xl transition group-hover:blur-xl"></div>
                        </div>
                        <div class="group relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/80 p-6 shadow-lg shadow-emerald-500/20 transition hover:-translate-y-1 hover:shadow-emerald-500/40 dark:border-white/10 dark:bg-slate-900/70">
                            <span class="text-5xl font-semibold text-emerald-400/70">03</span>
                            <h3 class="mt-4 text-xl font-semibold">Закрепляй победы</h3>
                            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Угадывай тайтлы подряд и собирай комбо-множители. Делись результатом в соцсетях и бросай вызов друзьям.</p>
                            <div class="absolute -right-6 bottom-6 h-20 w-20 rounded-full bg-emerald-500/10 blur-2xl transition group-hover:blur-xl"></div>
                        </div>
                    </div>
                </section>

                <section id="daily" class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="rounded-3xl border border-slate-200/80 bg-white/70 p-8 shadow-2xl shadow-purple-500/20 backdrop-blur-lg dark:border-white/10 dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.4em] text-slate-500 dark:text-slate-400">Рейтинг игроков</p>
                        <h2 class="mt-3 text-3xl font-semibold">Лучшие угадыватели недели</h2>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Ежедневные победы приносят очки сезона. Сохраняй серию и поднимайся в топ.</p>
                        <div id="leaderboard" class="mt-6 space-y-4">
                            <div class="flex items-center justify-between rounded-2xl border border-purple-500/20 bg-purple-500/10 p-4 text-sm font-semibold text-purple-500 shadow-inner shadow-purple-500/20 dark:text-purple-200">
                                <span class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/70 text-slate-900 dark:bg-slate-800 dark:text-slate-100">1</span>YukiStar</span>
                                <span>890 pts</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-sky-500/20 bg-sky-500/10 p-4 text-sm font-semibold text-sky-600 shadow-inner shadow-sky-500/20 dark:text-sky-200">
                                <span class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/70 text-slate-900 dark:bg-slate-800 dark:text-slate-100">2</span>OtakuNova</span>
                                <span>855 pts</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-sm font-semibold text-emerald-600 shadow-inner shadow-emerald-500/20 dark:text-emerald-200">
                                <span class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/70 text-slate-900 dark:bg-slate-800 dark:text-slate-100">3</span>MangaSeeker</span>
                                <span>802 pts</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-slate-200/80 bg-white/70 p-4 text-sm font-semibold text-slate-700 shadow-inner shadow-slate-500/10 dark:border-white/10 dark:bg-slate-800/70 dark:text-slate-200">
                                <span class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-500/20 text-purple-500">Ты</span>Готов к старту</span>
                                <span>0 pts</span>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200/80 bg-white/70 p-8 shadow-2xl shadow-sky-500/20 backdrop-blur-lg dark:border-white/10 dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.4em] text-slate-500 dark:text-slate-400">Темп дня</p>
                        <h2 class="mt-3 text-3xl font-semibold">Интерактивный прогресс</h2>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Следи за своей серией и делись впечатлениями. Анимированные карточки оживляют опыт прохождения квеста.</p>
                        <div class="mt-6 grid gap-4">
                            <div class="flex items-center justify-between rounded-2xl border border-white/40 bg-gradient-to-r from-purple-500/20 via-indigo-500/10 to-sky-500/20 p-4 text-sm font-semibold text-purple-600 shadow-lg shadow-purple-500/30 backdrop-blur dark:text-purple-200">
                                <span>Серия побед</span>
                                <span class="flex items-center gap-2"><svg class="h-4 w-4 animate-bounce" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2 2 7l10 5 10-5-10-5Zm0 7-10 5 10 5 10-5-10-5Zm-10 8 10 5 10-5" /></svg>3 дня</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/40 bg-gradient-to-r from-sky-500/20 via-slate-900/5 to-emerald-500/20 p-4 text-sm font-semibold text-slate-700 shadow-lg shadow-sky-500/20 backdrop-blur dark:text-slate-200">
                                <span>Средний результат</span>
                                <span class="flex items-center gap-2"><svg class="h-4 w-4 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16M4 12c3.5-4 7.5-4 11 0s7.5 4 11 0"/></svg>740 pts</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/40 bg-gradient-to-r from-emerald-500/20 via-teal-500/10 to-purple-500/20 p-4 text-sm font-semibold text-emerald-600 shadow-lg shadow-emerald-500/30 backdrop-blur dark:text-emerald-200">
                                <span>Подсказок осталось</span>
                                <span data-hint-remaining>3</span>
                            </div>
                        </div>
                        <p class="mt-6 text-xs text-slate-500 dark:text-slate-400">Поделись результатом и получи бонусные очки за приглашение друзей. Каждое воскресенье проходит общий стрим с анализом лучших догадок недели.</p>
                    </div>
                </section>
            </main>

            <footer class="relative z-10 border-t border-white/20 bg-white/60 px-6 py-10 text-sm text-slate-500 backdrop-blur dark:border-white/10 dark:bg-slate-900/70 dark:text-slate-400 lg:px-12">
                <div class="mx-auto flex max-w-6xl flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <p>&copy; {{ now()->year }} Anime Quote Guessr. Все права защищены.</p>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#how" class="transition hover:text-slate-700 dark:hover:text-slate-200">Как играть</a>
                        <a href="#daily" class="transition hover:text-slate-700 dark:hover:text-slate-200">Рейтинг</a>
                        <a href="#leaderboard" class="transition hover:text-slate-700 dark:hover:text-slate-200">Правила сообщества</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
