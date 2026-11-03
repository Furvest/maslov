/* ============================================================
   МАСЛОВ · интерфейс архива
   Без зависимостей. Все данные — в window.MASLOV.
   ============================================================ */
(() => {
    'use strict';

    const data = window.MASLOV || {};
    const $ = (sel, root = document) => root.querySelector(sel);
    const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const modal = $('#modal');
    const modalPanel = $('.modal-panel', modal);
    const modalContent = $('#modalContent');
    const filmModal = $('#filmModal');
    const toastEl = $('#toast');
    const body = document.body;

    let lastFocus = null;
    let toastTimer = null;
    let photoIndex = 0;

    const esc = (value) => String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');

    function toast(message) {
        if (!toastEl) return;
        toastEl.textContent = message;
        toastEl.hidden = false;
        requestAnimationFrame(() => toastEl.classList.add('is-visible'));
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toastEl.classList.remove('is-visible');
            setTimeout(() => { toastEl.hidden = true; }, 260);
        }, 3200);
    }

    function syncLock() {
        const locked = !modal.hidden || !filmModal.hidden || !$('#mobileMenu').hidden;
        body.classList.toggle('is-locked', locked);
    }

    /* ---------------- modal ---------------- */

    function openModal(html) {
        if (modal.hidden) lastFocus = document.activeElement;
        modalContent.innerHTML = html;
        modal.hidden = false;
        syncLock();
        requestAnimationFrame(() => modalPanel.focus());
    }

    function closeModal() {
        if (modal.hidden) return;
        modal.hidden = true;
        modalContent.innerHTML = '';
        syncLock();
        if (lastFocus && typeof lastFocus.focus === 'function') lastFocus.focus();
        lastFocus = null;
    }

    $$('[data-close-modal]').forEach((el) => el.addEventListener('click', closeModal));

    /* ---------------- photos ---------------- */

    function photoModal(index) {
        const photos = data.photos || [];
        if (!photos.length) return;
        photoIndex = (index + photos.length) % photos.length;
        const photo = photos[photoIndex];
        openModal(`
            <figure class="modal-media" data-slot="ФОТО · ${esc(photo.src)}">
                <img src="${esc(photo.src)}" alt="${esc(photo.title)} — заглушка">
            </figure>
            <p class="modal-eyebrow">${esc(photo.code)} · ${esc(photo.meta)}</p>
            <h3 class="modal-title" id="modalTitle">${esc(photo.title)}</h3>
            <p class="modal-desc">Демонстрационное фото. Замените файл <code>${esc(photo.src)}</code> на архивный снимок — подпись и пропорции подхватятся автоматически.</p>
            <div class="modal-meta">
                <span>фото ${photoIndex + 1} / ${photos.length}</span>
                <span>архив · лист ${esc(photo.code)}</span>
                <span>место: ${esc(photo.meta)}</span>
            </div>
            <div class="modal-nav">
                <button class="round-btn" type="button" data-photo-nav="-1" aria-label="Предыдущее фото">←</button>
                <button class="round-btn" type="button" data-photo-nav="1" aria-label="Следующее фото">→</button>
            </div>
        `);
    }

    $$('[data-photo]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const index = (data.photos || []).findIndex((p) => p.id === btn.dataset.photo);
            photoModal(index < 0 ? 0 : index);
        });
    });

    document.addEventListener('click', (event) => {
        const nav = event.target.closest('[data-photo-nav]');
        if (nav) {
            photoModal(photoIndex + Number(nav.dataset.photoNav));
        }
    });

    /* ---------------- video ---------------- */

    function videoById(id) {
        const video = (data.videos || []).find((v) => v.id === id);
        if (!video) return;
        if (modal.hidden) lastFocus = document.activeElement;

        const media = video.has_file
            ? `<video class="modal-media" controls autoplay playsinline poster="${esc(video.poster)}" src="${esc(video.src)}"></video>`
            : `<div class="modal-video" data-slot="ВИДЕО · ${esc(video.src)}">
                    <img src="${esc(video.poster)}" alt="Постер: ${esc(video.title)} — заглушка">
                    <div class="modal-video-placeholder">
                        <span class="big-play" aria-hidden="true"><span></span></span>
                        <p>видео пока не добавлено</p>
                        <code>${esc(video.src)}</code>
                        <p>нажмите «Смотреть демо-ролик» ниже</p>
                    </div>
                </div>`;

        openModal(`
            ${media}
            <p class="modal-eyebrow">${esc(video.kicker)} · ${esc(video.date)} · ${esc(video.duration)}</p>
            <h3 class="modal-title" id="modalTitle">${esc(video.title)}</h3>
            <p class="modal-desc">${esc(video.desc)}</p>
            <div class="modal-meta">
                <span>формат 16:9</span>
                <span>${video.has_file ? 'файл найден' : 'заглушка'}</span>
                <span>${esc(video.src)}</span>
            </div>
            <div class="modal-nav">
                <button class="text-btn" type="button" data-film-from-modal><span class="btn-play" aria-hidden="true"></span>Смотреть демо-ролик</button>
                <button class="text-btn" type="button" data-close-modal>Закрыть</button>
            </div>
        `);
    }

    $$('[data-video]').forEach((btn) => {
        btn.addEventListener('click', () => videoById(btn.dataset.video));
    });

    document.addEventListener('click', (event) => {
        if (event.target.closest('[data-film-from-modal]')) {
            closeModal();
            setTimeout(openFilm, 120);
        }
    });

    /* ---------------- archive ---------------- */

    function archiveById(id) {
        const item = (data.archive || []).find((a) => a.id === id);
        if (!item) return;

        if (item.kind === 'video' || item.kind === 'event') {
            videoById(item.video);
            return;
        }

        if (item.kind === 'doc') {
            openModal(`
                <figure class="modal-media" data-slot="СКАН · ${esc(item.image)}">
                    <img src="${esc(item.image)}" alt="${esc(item.title)} — заглушка" width="1000" height="720">
                </figure>
                <p class="modal-eyebrow">${esc(item.tag)} · ${esc(item.code)} · ${esc(item.meta)}</p>
                <h3 class="modal-title" id="modalTitle">${esc(item.title)}</h3>
                <p class="modal-desc">${esc(item.note)}</p>
                <div class="modal-meta"><span>опись 2.1</span><span>замените: ${esc(item.image)}</span></div>
            `);
            return;
        }

        const poem = (item.poem || []).map((line) => `<span>${esc(line)}</span>`).join('');
        const audio = data.hasAudio && data.hasAudio.reading && item.audio
            ? `<audio controls style="width:100%;margin-top:16px" src="${esc(item.audio)}"></audio>`
            : `<div class="modal-audio" data-slot="АУДИО · ${esc(item.audio || 'assets/audio/maslov-reading.mp3')}">
                    <button type="button" data-audio-placeholder="${esc(item.audio || 'assets/audio/maslov-reading.mp3')}" aria-label="Слушать чтение — заглушка"><span class="play-glyph" aria-hidden="true"></span></button>
                    <div class="mini-wave" aria-hidden="true">${Array.from({ length: 32 }, (_, i) => `<i style="--h:${18 + ((i * 29) % 72)}%"></i>`).join('')}</div>
                    <p>голос Маслова<br>аудио-заглушка</p>
               </div>`;

        openModal(`
            <p class="modal-eyebrow">${esc(item.tag)} · ${esc(item.code)} · ${esc(item.meta)}</p>
            <h3 class="modal-title" id="modalTitle">${esc(item.title)}</h3>
            <div class="modal-poem" data-slot="ТЕКСТ · стихотворение">${poem}</div>
            <p class="modal-desc">${esc(item.note)}</p>
            ${audio}
            <div class="modal-meta"><span>нажмите play, чтобы услышать чтение</span><span>замените: ${esc(item.audio || 'assets/audio/maslov-reading.mp3')}</span></div>
        `);
    }

    $$('[data-archive]').forEach((btn) => {
        btn.addEventListener('click', () => archiveById(btn.dataset.archive));
    });

    document.addEventListener('click', (event) => {
        const audioBtn = event.target.closest('[data-audio-placeholder]');
        if (audioBtn) {
            toast('Аудио-заглушка. Добавьте файл: ' + audioBtn.dataset.audioPlaceholder);
        }
    });

    // фильтры архива
    $$('[data-filter]').forEach((chip) => {
        chip.addEventListener('click', () => {
            $$('[data-filter]').forEach((c) => c.classList.toggle('is-active', c === chip));
            const filter = chip.dataset.filter;
            $$('#archiveGrid .archive-card').forEach((card) => {
                const show = filter === 'all' || card.dataset.kind === filter;
                card.classList.toggle('is-hidden', !show);
            });
        });
    });

    /* ---------------- book ---------------- */

    const spreads = $$('.book-spread');
    const bookPrev = $('#bookPrev');
    const bookNext = $('#bookNext');
    const bookCounter = $('#bookCounter');
    const bookDots = $('#bookDots');
    let spreadIndex = 0;

    if (spreads.length) {
        spreads.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.setAttribute('aria-label', 'Разворот ' + (i + 1));
            if (i === 0) dot.classList.add('is-active');
            dot.addEventListener('click', () => showSpread(i));
            bookDots.appendChild(dot);
        });

        function showSpread(index) {
            spreadIndex = Math.max(0, Math.min(spreads.length - 1, index));
            spreads.forEach((spread, i) => {
                const current = i === spreadIndex;
                if (current) {
                    spread.hidden = false;
                    spread.classList.add('is-current');
                } else {
                    spread.classList.remove('is-current');
                    spread.hidden = true;
                }
            });
            bookPrev.disabled = spreadIndex === 0;
            bookNext.disabled = spreadIndex === spreads.length - 1;
            bookCounter.textContent = String(spreadIndex + 1).padStart(2, '0') + ' / ' + String(spreads.length).padStart(2, '0');
            $$('button', bookDots).forEach((dot, i) => dot.classList.toggle('is-active', i === spreadIndex));
            const current = spreads[spreadIndex];
            if (current && !reduceMotion) {
                current.classList.remove('is-turning');
                void current.offsetWidth;
                current.classList.add('is-turning');
            }
        }

        bookPrev.addEventListener('click', () => showSpread(spreadIndex - 1));
        bookNext.addEventListener('click', () => showSpread(spreadIndex + 1));

        let touchStartX = 0;
        const book = $('#book');
        book.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].clientX; }, { passive: true });
        book.addEventListener('touchend', (e) => {
            const delta = e.changedTouches[0].clientX - touchStartX;
            if (Math.abs(delta) > 60) showSpread(spreadIndex + (delta < 0 ? 1 : -1));
        }, { passive: true });

        showSpread(0);
    }

    /* ---------------- poem lab ---------------- */

    const poemModes = $$('[data-poem-mode]');
    const poemPanels = $$('[data-panel]');
    const poems = data.poems || [];

    function setPoemMode(mode) {
        poemModes.forEach((btn) => {
            const active = btn.dataset.poemMode === mode;
            btn.classList.toggle('is-active', active);
            btn.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        poemPanels.forEach((panel) => {
            const active = panel.dataset.panel === mode;
            panel.hidden = !active;
            panel.classList.toggle('is-active', active);
        });
        pauseKaraoke();
        if (mode === 'typewriter') runTypewriter();
        if (mode === 'karaoke') renderKaraoke();
        if (mode === 'constellation') buildConstellation();
    }

    poemModes.forEach((btn) => btn.addEventListener('click', () => setPoemMode(btn.dataset.poemMode)));

    // 01 · печатная машинка
    const twOutput = $('#twOutput');
    let twTimer = null;
    let twDone = false;

    function runTypewriter() {
        if (!twOutput) return;
        clearInterval(twTimer);
        const poem = poems[0];
        if (!poem) return;
        const text = poem.lines.join('\n');
        const title = $('#twTitle');
        const year = $('#twYear');
        if (title) title.textContent = poem.title;
        if (year) year.textContent = poem.year;
        twOutput.textContent = '';
        twOutput.classList.remove('is-done');
        twDone = false;

        if (reduceMotion) {
            twOutput.textContent = text;
            twOutput.classList.add('is-done');
            twDone = true;
            return;
        }

        let i = 0;
        twTimer = setInterval(() => {
            i += 1;
            twOutput.textContent = text.slice(0, i);
            if (i >= text.length) {
                clearInterval(twTimer);
                twOutput.classList.add('is-done');
                twDone = true;
            }
        }, 28);
    }

    $('#twReplay')?.addEventListener('click', runTypewriter);

    // 02 · караоке
    const karaokeLines = $('#karaokeLines');
    const karaokeWave = $('#karaokeWave');
    const karaokePlay = $('#karaokePlay');
    const karaokeTime = $('#karaokeTime');
    const karaokePoem = poems.find((p) => p.mode === 'karaoke');
    const KARAOKE_LINE_MS = 4300;
    let karaokeTimer = null;
    let karaokeElapsed = 0;
    let karaokePlaying = false;
    let karaokeRendered = false;

    function formatTime(seconds) {
        const value = Math.max(0, Math.floor(seconds));
        return String(Math.floor(value / 60)).padStart(2, '0') + ':' + String(value % 60).padStart(2, '0');
    }

    function renderKaraoke() {
        if (!karaokeLines || !karaokePoem) return;
        if (!karaokeRendered) {
            karaokeLines.innerHTML = karaokePoem.lines.map((line) => `<span>${esc(line)}</span>`).join('');
            if (karaokeWave) {
                karaokeWave.innerHTML = Array.from({ length: 56 }, (_, i) => `<i style="--h:${14 + ((i * 37) % 76)}%"></i>`).join('');
            }
            karaokeRendered = true;
        }
        updateKaraoke();
    }

    function updateKaraoke() {
        if (!karaokeLines) return;
        const index = Math.min(karaokePoem ? karaokePoem.lines.length - 1 : 0, Math.floor(karaokeElapsed / KARAOKE_LINE_MS));
        $$('span', karaokeLines).forEach((line, i) => {
            line.classList.toggle('is-current', karaokePlaying && i === index);
            line.classList.toggle('is-past', i < index || (!karaokePlaying && karaokeElapsed > 0 && i <= index));
        });
        const total = (karaokePoem ? karaokePoem.lines.length : 4) * (KARAOKE_LINE_MS / 1000);
        if (karaokeTime) karaokeTime.textContent = formatTime(karaokeElapsed / 1000) + ' / ' + formatTime(total);
    }

    function tickKaraoke() {
        karaokeElapsed += 100;
        const total = (karaokePoem ? karaokePoem.lines.length : 4) * KARAOKE_LINE_MS;
        if (karaokeElapsed >= total) {
            karaokeElapsed = total;
            stopKaraoke();
            updateKaraoke();
            return;
        }
        updateKaraoke();
    }

    function startKaraoke() {
        if (!karaokePoem) return;
        if (karaokeElapsed >= karaokePoem.lines.length * KARAOKE_LINE_MS) karaokeElapsed = 0;
        karaokePlaying = true;
        karaokeWave?.classList.add('is-playing');
        karaokePlay?.classList.add('is-playing');
        if (karaokePlay) karaokePlay.innerHTML = '<span class="pause-glyph" aria-hidden="true"></span>';
        clearInterval(karaokeTimer);
        karaokeTimer = setInterval(tickKaraoke, 100);
        updateKaraoke();
    }

    function stopKaraoke() {
        karaokePlaying = false;
        clearInterval(karaokeTimer);
        karaokeWave?.classList.remove('is-playing');
        karaokePlay?.classList.remove('is-playing');
        if (karaokePlay) karaokePlay.innerHTML = '<span class="play-glyph" aria-hidden="true"></span>';
        updateKaraoke();
    }

    function pauseKaraoke() {
        if (karaokePlaying) stopKaraoke();
    }

    karaokePlay?.addEventListener('click', () => {
        if (karaokePlaying) {
            stopKaraoke();
        } else {
            renderKaraoke();
            startKaraoke();
        }
    });

    // 03 · созвездие
    const constSky = $('#constellationSky');
    const constResult = $('#constResult');
    const constProgress = $('#constProgress');
    const constPoem = poems.find((p) => p.mode === 'constellation');
    const CONST_WORDS = [
        { word: 'тёплые', line: 0, x: 19, y: 24 },
        { word: 'холода', line: 1, x: 69, y: 18 },
        { word: 'замёрз', line: 2, x: 28, y: 72 },
        { word: 'проснётся', line: 3, x: 74, y: 66 },
    ];
    let constFound = new Set();
    let constBuilt = false;

    function buildConstellation() {
        if (!constSky || !constPoem || constBuilt) return;
        constBuilt = true;
        CONST_WORDS.forEach((item, i) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'const-word';
            btn.textContent = item.word;
            btn.style.left = item.x + '%';
            btn.style.top = item.y + '%';
            btn.dataset.line = String(item.line);
            btn.style.animationDelay = (i * 0.4) + 's';
            btn.addEventListener('click', () => revealConstWord(btn, item));
            constSky.appendChild(btn);
        });
        updateConstellation();
    }

    function revealConstWord(btn, item) {
        if (btn.classList.contains('is-found')) return;
        btn.classList.add('is-found');
        constFound.add(item.line);
        updateConstellation();
        if (constFound.size === CONST_WORDS.length) {
            constResult.innerHTML = constPoem.lines.map((line) => `<span>${esc(line)}</span>`).join('<br>');
            constProgress.textContent = CONST_WORDS.length + ' / ' + CONST_WORDS.length;
            toast('Стихотворение собрано');
        }
    }

    function updateConstellation() {
        if (!constPoem) return;
        constProgress.textContent = constFound.size + ' / ' + CONST_WORDS.length;
        constResult.innerHTML = constPoem.lines.map((line, i) => {
            if (constFound.has(i)) return `<span>${esc(line)}</span>`;
            return '<span class="ghost-line">••••••••••••••••••</span>';
        }).join('<br>');
        if (constFound.size === 0) {
            constResult.innerHTML = '<span class="hint">нажимайте на слова в небе — строки проявятся</span>';
        }
        $$('.const-word', constSky).forEach((word) => {
            word.classList.toggle('is-next', !constFound.has(Number(word.dataset.line)));
        });
    }

    $('#constReset')?.addEventListener('click', () => {
        constFound = new Set();
        $$('.const-word', constSky).forEach((word) => word.classList.remove('is-found'));
        updateConstellation();
    });

    // запускаем первую форму
    runTypewriter();
    renderKaraoke();
    buildConstellation();

    /* ---------------- audio guide + map ---------------- */

    const chapters = data.chapters || [];
    const mapPoints = data.mapPoints || [];
    let guideIndex = 0;
    let guideElapsed = 0;
    let guideDuration = 72;
    let guideTimer = null;
    let guidePlaying = false;
    let guideAudio = null;

    const guideNum = $('#guideChapterNum');
    const guideTitle = $('#guideChapterTitle');
    const guideText = $('#guideChapterText');
    const guidePlay = $('#guidePlay');
    const guideProgress = $('#guideProgress');
    const guideElapsedEl = $('#guideElapsed');
    const guideDurationEl = $('#guideDuration');
    const guideWave = $('#guideWave');
    const guideNote = $('#guideNote');

    function secondsFromLabel(label) {
        const parts = String(label || '01:00').split(':').map(Number);
        return (parts[0] || 0) * 60 + (parts[1] || 0);
    }

    if (guideWave) {
        guideWave.innerHTML = Array.from({ length: 44 }, (_, i) => `<i style="--h:${16 + ((i * 31) % 74)}%"></i>`).join('');
    }

    function setChapter(index, options = {}) {
        if (!chapters.length) return;
        guideIndex = (index + chapters.length) % chapters.length;
        const chapter = chapters[guideIndex];
        guideDuration = secondsFromLabel(chapter.time);
        guideElapsed = 0;
        stopGuide();
        if (guideNum) guideNum.textContent = 'глава 0' + (guideIndex + 1);
        if (guideTitle) guideTitle.textContent = chapter.title;
        if (guideText) guideText.textContent = chapter.text;
        if (guideDurationEl) guideDurationEl.textContent = chapter.time;
        if (guideElapsedEl) guideElapsedEl.textContent = '00:00';
        if (guideProgress) guideProgress.style.width = '0%';
        $$('.chapter').forEach((btn, i) => btn.classList.toggle('is-active', i === guideIndex));
        if (options.play) startGuide();
    }

    function updateGuideProgress() {
        const ratio = Math.min(1, guideElapsed / guideDuration);
        if (guideProgress) guideProgress.style.width = (ratio * 100) + '%';
        if (guideElapsedEl) guideElapsedEl.textContent = formatTime(guideElapsed);
    }

    function startGuide() {
        if (guidePlaying) return;
        guidePlaying = true;
        guideWave?.classList.add('is-playing');
        if (guidePlay) guidePlay.innerHTML = '<span class="pause-glyph" aria-hidden="true"></span>';

        if (data.hasAudio && data.hasAudio.guide) {
            if (!guideAudio) {
                guideAudio = new Audio();
                guideAudio.addEventListener('timeupdate', () => {
                    guideElapsed = guideAudio.currentTime;
                    guideDuration = guideAudio.duration || guideDuration;
                    updateGuideProgress();
                });
                guideAudio.addEventListener('ended', stopGuide);
            }
            guideAudio.src = 'assets/audio/guide-0' + (guideIndex + 1) + '.mp3';
            guideAudio.play().catch(() => { toast('Не удалось запустить аудио'); stopGuide(); });
            return;
        }

        guideTimer = setInterval(() => {
            guideElapsed += 0.4;
            if (guideElapsed >= guideDuration) {
                guideElapsed = guideDuration;
                updateGuideProgress();
                stopGuide();
                return;
            }
            updateGuideProgress();
        }, 100);
    }

    function stopGuide() {
        guidePlaying = false;
        clearInterval(guideTimer);
        guideWave?.classList.remove('is-playing');
        if (guidePlay) guidePlay.innerHTML = '<span class="play-glyph" aria-hidden="true"></span>';
        if (guideAudio) guideAudio.pause();
    }

    function toggleGuide() {
        if (guidePlaying) stopGuide();
        else {
            if (guideElapsed >= guideDuration) guideElapsed = 0;
            startGuide();
        }
    }

    guidePlay?.addEventListener('click', toggleGuide);
    $$('.chapter').forEach((btn) => {
        btn.addEventListener('click', () => setChapter(Number(btn.dataset.chapter)));
    });

    // карта
    const mapDetailNum = $('#mapDetailNum');
    const mapDetailSub = $('#mapDetailSub');
    const mapDetailTitle = $('#mapDetailTitle');
    const mapDetailText = $('#mapDetailText');
    const mapCoords = $('#mapCoords');

    const COORDS = ['56.24° N · 58.01° E', '56.21° N · 58.03° E', '56.18° N · 57.98° E', '56.16° N · 58.06° E', '56.30° N · 57.90° E'];

    function setMapPoint(index) {
        const point = mapPoints[index];
        if (!point) return;
        $$('.map-pin').forEach((pin, i) => pin.classList.toggle('is-active', i === index));
        if (mapDetailNum) mapDetailNum.textContent = 'точка ' + point.num;
        if (mapDetailSub) mapDetailSub.textContent = point.sub;
        if (mapDetailTitle) mapDetailTitle.textContent = point.title;
        if (mapDetailText) mapDetailText.textContent = point.text;
        if (mapCoords) mapCoords.textContent = COORDS[index] || '';
        $('#mapListen')?.setAttribute('data-chapter-target', String(point.chapter));
    }

    $$('.map-pin').forEach((pin) => {
        const index = Number(pin.dataset.point);
        pin.addEventListener('click', () => setMapPoint(index));
        pin.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                setMapPoint(index);
            }
        });
    });

    $('#mapListen')?.addEventListener('click', () => {
        const target = Number($('#mapListen')?.dataset.chapterTarget || 0);
        setChapter(target, { play: true });
        document.querySelector('.audio-guide')?.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
    });

    $('#routeToggle')?.addEventListener('click', (e) => {
        const btn = e.currentTarget;
        const pressed = btn.getAttribute('aria-pressed') === 'true';
        btn.setAttribute('aria-pressed', pressed ? 'false' : 'true');
        $('.map-stage')?.classList.toggle('show-route', !pressed);
    });

    if (chapters.length) setChapter(0);

    /* ---------------- film ---------------- */

    const filmScenes = $$('.film-scene');
    const filmToggle = $('#filmToggle');
    const filmReplay = $('#filmReplay');
    const filmTime = $('#filmTime');
    const filmSegs = $$('.film-seg');
    const sceneAi = $('#sceneAi');
    const FILM_DURATIONS = [5000, 5000, 5000, 5000, 5000, 12000];
    const FILM_TOTAL = FILM_DURATIONS.reduce((a, b) => a + b, 0);

    let filmIndex = 0;
    let filmElapsed = 0;
    let filmPlaying = false;
    let filmRaf = null;
    let filmLast = 0;
    let aiTyped = false;
    let aiTimer = null;

    function sceneStart(index) {
        return FILM_DURATIONS.slice(0, index).reduce((a, b) => a + b, 0);
    }

    function typeAi() {
        if (!sceneAi || aiTyped) return;
        const text = sceneAi.dataset.full || sceneAi.textContent || '';
        if (!sceneAi.dataset.full) sceneAi.dataset.full = text;
        if (reduceMotion) {
            sceneAi.textContent = text;
            aiTyped = true;
            return;
        }
        aiTyped = true;
        sceneAi.textContent = '';
        let i = 0;
        clearInterval(aiTimer);
        aiTimer = setInterval(() => {
            i += 4;
            sceneAi.textContent = text.slice(0, i);
            if (i >= text.length) {
                clearInterval(aiTimer);
                sceneAi.textContent = text;
            }
        }, 18);
    }

    function setFilmScene(index, reset = false) {
        filmIndex = Math.max(0, Math.min(filmScenes.length - 1, index));
        filmScenes.forEach((scene, i) => {
            const active = i === filmIndex;
            scene.hidden = !active;
            scene.classList.toggle('is-active', active);
        });
        filmSegs.forEach((seg, i) => {
            seg.classList.toggle('is-active', i === filmIndex);
            seg.classList.toggle('is-done', i < filmIndex);
            const bar = seg.querySelector('span');
            if (bar) bar.style.width = i < filmIndex ? '100%' : (i === filmIndex ? '0%' : '0%');
        });
        if (filmIndex === filmScenes.length - 1) typeAi();
    }

    function updateFilmProgress() {
        const absolute = sceneStart(filmIndex) + filmElapsed;
        if (filmTime) filmTime.textContent = formatTime(absolute / 1000) + ' / ' + formatTime(FILM_TOTAL / 1000);
        const seg = filmSegs[filmIndex];
        const bar = seg?.querySelector('span');
        if (bar) {
            const ratio = Math.min(1, filmElapsed / FILM_DURATIONS[filmIndex]);
            bar.style.width = (ratio * 100) + '%';
        }
    }

    function tickFilm(now) {
        if (!filmPlaying) return;
        if (!filmLast) filmLast = now;
        const delta = now - filmLast;
        filmLast = now;
        filmElapsed += delta;
        if (filmElapsed >= FILM_DURATIONS[filmIndex]) {
            if (filmIndex < filmScenes.length - 1) {
                filmElapsed = 0;
                setFilmScene(filmIndex + 1);
            } else {
                filmElapsed = FILM_DURATIONS[filmIndex];
                pauseFilm();
                updateFilmProgress();
                return;
            }
        }
        updateFilmProgress();
        filmRaf = requestAnimationFrame(tickFilm);
    }

    function playFilm() {
        if (filmPlaying) return;
        if (filmIndex === filmScenes.length - 1 && filmElapsed >= FILM_DURATIONS[filmIndex]) {
            resetFilm();
        }
        filmPlaying = true;
        filmLast = 0;
        if (filmToggle) filmToggle.innerHTML = '<span class="pause-glyph" aria-hidden="true"></span>';
        filmToggle?.setAttribute('aria-label', 'Пауза');
        filmRaf = requestAnimationFrame(tickFilm);
    }

    function pauseFilm() {
        filmPlaying = false;
        cancelAnimationFrame(filmRaf);
        if (filmToggle) filmToggle.innerHTML = '<span class="play-glyph" aria-hidden="true"></span>';
        filmToggle?.setAttribute('aria-label', 'Продолжить');
    }

    function resetFilm() {
        pauseFilm();
        filmElapsed = 0;
        aiTyped = false;
        clearInterval(aiTimer);
        setFilmScene(0, true);
        updateFilmProgress();
        filmToggle?.classList.remove('is-paused');
    }

    function openFilm() {
        if (filmModal.hidden) lastFocus = document.activeElement;
        filmModal.hidden = false;
        syncLock();
        resetFilm();
        playFilm();
        $('.film-close', filmModal)?.focus();
    }

    function closeFilm() {
        if (filmModal.hidden) return;
        pauseFilm();
        filmModal.hidden = true;
        syncLock();
        if (lastFocus && typeof lastFocus.focus === 'function') lastFocus.focus();
        lastFocus = null;
    }

    $$('[data-open-film]').forEach((btn) => btn.addEventListener('click', openFilm));
    $$('[data-close-film]').forEach((btn) => btn.addEventListener('click', closeFilm));

    filmToggle?.addEventListener('click', () => {
        if (filmPlaying) pauseFilm();
        else playFilm();
    });

    filmReplay?.addEventListener('click', () => {
        resetFilm();
        playFilm();
    });

    filmSegs.forEach((seg) => {
        seg.addEventListener('click', () => {
            pauseFilm();
            filmElapsed = 0;
            aiTyped = false;
            clearInterval(aiTimer);
            setFilmScene(Number(seg.dataset.sceneJump));
            updateFilmProgress();
            playFilm();
        });
    });

    /* ---------------- placeholder mode ---------------- */

    const phToggle = $('#phToggle');
    const PH_KEY = 'maslov-placeholders';

    function setPlaceholders(on, announce = true) {
        body.classList.toggle('show-placeholders', on);
        phToggle?.setAttribute('aria-pressed', on ? 'true' : 'false');
        try { localStorage.setItem(PH_KEY, on ? '1' : '0'); } catch (e) { /* ignore */ }
        if (announce) {
            const count = document.querySelectorAll('[data-slot]').length;
            toast(on ? 'Режим заглушек: ' + count + ' мест для замены' : 'Режим заглушек выключен');
        }
    }

    phToggle?.addEventListener('click', () => setPlaceholders(!body.classList.contains('show-placeholders')));

    try {
        if (localStorage.getItem(PH_KEY) === '1') setPlaceholders(true, false);
    } catch (e) { /* ignore */ }

    /* ---------------- copy message ---------------- */

    $('#copyMessage')?.addEventListener('click', async () => {
        const text = data.aiMessage || $('#aiMessage')?.textContent || '';
        try {
            await navigator.clipboard.writeText(text);
            toast('Текст послания скопирован');
        } catch (e) {
            const area = document.createElement('textarea');
            area.value = text;
            document.body.appendChild(area);
            area.select();
            try { document.execCommand('copy'); toast('Текст послания скопирован'); }
            catch (err) { toast('Не удалось скопировать текст'); }
            area.remove();
        }
    });

    /* ---------------- mobile menu ---------------- */

    const burger = $('#burger');
    const mobileMenu = $('#mobileMenu');

    function closeMenu() {
        if (mobileMenu.hidden) return;
        mobileMenu.hidden = true;
        burger?.setAttribute('aria-expanded', 'false');
        syncLock();
    }

    burger?.addEventListener('click', () => {
        const open = mobileMenu.hidden;
        mobileMenu.hidden = !open;
        burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        syncLock();
    });

    $$('#mobileMenu a').forEach((link) => link.addEventListener('click', closeMenu));
    mobileMenu?.querySelector('[data-open-film]')?.addEventListener('click', closeMenu);

    /* ---------------- media tabs ---------------- */

    const mediaTabs = $$('[data-media-tab]');
    const mediaPanels = {
        photos: $('#photosPanel'),
        videos: $('#videosPanel'),
        docs: $('#docsPanel'),
    };

    mediaTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const target = tab.dataset.mediaTab;
            mediaTabs.forEach((t) => {
                const active = t === tab;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-selected', active ? 'true' : 'false');
            });
            Object.entries(mediaPanels).forEach(([key, panel]) => {
                if (panel) panel.hidden = key !== target;
            });
        });
    });

    $$('[data-media-go]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const tab = document.querySelector(`[data-media-tab="${btn.dataset.mediaGo}"]`);
            if (tab) tab.click();
            document.querySelector('.library')?.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
        });
    });

    /* ---------------- scroll / spy / reveal ---------------- */

    const topbar = $('.topbar');
    const sections = $$('main section[id]');
    const navTabs = $$('.tab');

    function onScroll() {
        topbar?.classList.toggle('is-scrolled', window.scrollY > 20);
        let current = sections[0]?.id;
        const offset = window.innerHeight * 0.38;
        sections.forEach((section) => {
            if (section.getBoundingClientRect().top <= offset) current = section.id;
        });
        navTabs.forEach((tab) => tab.classList.toggle('is-active', tab.dataset.tab === current));
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    const revealTargets = [
        '.hero-copy', '.hero-visual', '.library-head', '.photo-grid', '.library',
        '.section-head', '.book-wrap', '.archive-toolbar', '.archive-grid', '.poem-lab',
        '.guide-grid', '.stats-row', '.address-head', '.film-poster', '.message-card',
    ];
    const revealEls = $$(revealTargets.join(','));
    revealEls.forEach((el, i) => {
        el.classList.add('reveal');
        el.style.transitionDelay = Math.min(i % 4, 3) * 70 + 'ms';
    });

    if ('IntersectionObserver' in window && !reduceMotion) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach((el) => io.observe(el));
    } else {
        revealEls.forEach((el) => el.classList.add('is-in'));
    }

    /* ---------------- smooth anchors ---------------- */

    $$('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href').slice(1);
            const target = document.getElementById(id);
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
            history.pushState(null, '', '#' + id);
        });
    });

    /* ---------------- keyboard ---------------- */

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!filmModal.hidden) { closeFilm(); return; }
            if (!modal.hidden) { closeModal(); return; }
            if (!mobileMenu.hidden) { closeMenu(); return; }
        }
        if (e.key === 'Tab') {
            const dialog = !filmModal.hidden ? filmModal : (!modal.hidden ? modal : null);
            if (!dialog) return;
            const focusables = $$('a[href], button:not([disabled]), input, textarea, select, [tabindex]:not([tabindex="-1"])', dialog)
                .filter((el) => el.offsetParent !== null);
            if (!focusables.length) return;
            const first = focusables[0];
            const last = focusables[focusables.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
        if (!modal.hidden && (e.key === 'ArrowLeft' || e.key === 'ArrowRight')) {
            if ($('[data-photo-nav]')) {
                e.preventDefault();
                photoModal(photoIndex + (e.key === 'ArrowRight' ? 1 : -1));
            }
        }
    });

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            pauseFilm();
            stopKaraoke();
            if (guidePlaying) stopGuide();
        }
    });
})();
