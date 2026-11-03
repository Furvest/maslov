<?php
declare(strict_types=1);

/* ============================================================
   МАСЛОВ · личный архив
   Все тексты, фото, видео и аудио — заглушки.
   Меняйте данные в этом блоке, файлы — в assets/.
   ============================================================ */

$site = [
    'title'       => 'Маслов — архив, голос, маршрут',
    'surname'     => 'Маслов',
    'full'        => 'Иван Петрович Маслов',
    'initials'    => 'И. П.',
    'years'       => '1934 — 2016',
    'city'        => 'Пермь',
    'role'        => 'поэт · педагог · просветитель',
    'description' => 'Личный архив поэта, педагога и просветителя: фотографии, видео, рукописи, аудиогид и культурная карта.',
    'lead'        => 'Поэт, который считал стихи разговором, а педагогику — продолжением этого разговора. Здесь собраны фотографии, черновики, видео и маршруты — чтобы услышать его голос и продолжить тему.',
    'quote'       => 'Стихи не должны стоять на полке. Их надо передавать из рук в руки, как хлеб.',
    'quoteSource' => 'из записной книжки, [год]',
];

$nav = [
    ['id' => 'overview',  'num' => '01', 'label' => 'Обзор'],
    ['id' => 'biography', 'num' => '02', 'label' => 'Биография'],
    ['id' => 'creative',  'num' => '03', 'label' => 'Творчество'],
    ['id' => 'education', 'num' => '04', 'label' => 'Просветительство'],
    ['id' => 'address',   'num' => '05', 'label' => 'Обращение'],
];

$photos = [
    ['id' => 'p1', 'src' => 'assets/img/photo-01.jpg', 'ratio' => 'portrait', 'title' => 'Маслов в рабочем кабинете', 'meta' => 'Портрет · 1970-е', 'code' => 'Ф-01'],
    ['id' => 'p2', 'src' => 'assets/img/photo-02.jpg', 'ratio' => 'landscape', 'title' => 'Вечер в библиотеке', 'meta' => 'Встреча · 1984', 'code' => 'Ф-02'],
    ['id' => 'p3', 'src' => 'assets/img/photo-03.jpg', 'ratio' => 'landscape', 'title' => 'Тетрадь с правками', 'meta' => 'Архив · рукописи', 'code' => 'Ф-03'],
    ['id' => 'p4', 'src' => 'assets/img/photo-04.jpg', 'ratio' => 'landscape', 'title' => 'Дорога на север', 'meta' => 'Экспедиция · 1978', 'code' => 'Ф-04'],
    ['id' => 'p5', 'src' => 'assets/img/photo-05.jpg', 'ratio' => 'landscape', 'title' => 'Лекция для студентов', 'meta' => 'Аудитория · 1991', 'code' => 'Ф-05'],
    ['id' => 'p6', 'src' => 'assets/img/photo-06.jpg', 'ratio' => 'portrait', 'title' => 'Последние годы', 'meta' => 'Портрет · 2000-е', 'code' => 'Ф-06'],
];

$videos = [
    [
        'id' => 'v1', 'title' => 'Маслов читает «Тишину»', 'kicker' => 'Кинохроника',
        'poster' => 'assets/img/video-01.jpg', 'src' => 'assets/video/maslov-reading.mp4',
        'duration' => '02:40', 'date' => '1987', 'desc' => 'Домашняя съёмка. Поэт читает стихотворение, не глядя в текст.',
    ],
    [
        'id' => 'v2', 'title' => 'Защита диплома о Маслове', 'kicker' => 'Университет',
        'poster' => 'assets/img/video-02.jpg', 'src' => 'assets/video/diploma.mp4',
        'duration' => '06:12', 'date' => '2019', 'desc' => 'Фрагмент защиты: автор говорит о поэтике Маслова и его работе с устным словом.',
    ],
    [
        'id' => 'v3', 'title' => 'Стихи у окна', 'kicker' => 'Читальный зал',
        'poster' => 'assets/img/video-03.jpg', 'src' => 'assets/video/reading-by-students.mp4',
        'duration' => '01:18', 'date' => '2022', 'desc' => 'Студенты читают Маслова в читальном зале библиотеки.',
    ],
    [
        'id' => 'v4', 'title' => 'Круглый стол «Поэт и город»', 'kicker' => 'Вечер памяти',
        'poster' => 'assets/img/video-04.jpg', 'src' => 'assets/video/roundtable.mp4',
        'duration' => '04:05', 'date' => '2023', 'desc' => 'Круглый стол с участием филологов, учителей и краеведов.',
    ],
    [
        'id' => 'v5', 'title' => 'Тем, кто придёт', 'kicker' => 'Фильм · послание',
        'poster' => 'assets/img/video-05.jpg', 'src' => 'assets/video/message.mp4',
        'duration' => '03:30', 'date' => '2026', 'desc' => 'Мини-фильм с посланием потомкам. Текст сгенерирован ИИ, голос — синтез.',
    ],
];

$archive = [
    [
        'id' => 'a1', 'kind' => 'manuscript', 'filter' => 'manuscript', 'tag' => 'Рукопись',
        'title' => '«Тишина» — черновик', 'meta' => 'Тетрадь № 4 · [год]', 'code' => 'Р-12',
        'poem' => ['В архиве тише, чем в снегу.', 'Лампа. Папка. Чей-то почерк.', 'Я стихи по одной строке', 'вынимаю из долгой ночи.'],
        'note' => 'На полях — правка синим карандашом: «оставить breath, убрать пафос».',
        'audio' => 'assets/audio/maslov-reading.mp3',
    ],
    [
        'id' => 'a2', 'kind' => 'video', 'filter' => 'video', 'tag' => 'Видео',
        'title' => 'Он читает', 'meta' => 'Кинохроника · 1987', 'code' => 'В-01', 'video' => 'v1',
    ],
    [
        'id' => 'a3', 'kind' => 'video', 'filter' => 'video', 'tag' => 'Видео',
        'title' => 'Диплом о Маслове', 'meta' => 'Защита · 2019', 'code' => 'В-02', 'video' => 'v2',
    ],
    [
        'id' => 'a4', 'kind' => 'event', 'filter' => 'event', 'tag' => 'Событие',
        'title' => 'Круглый стол', 'meta' => 'Вечер памяти · 2023', 'code' => 'С-04', 'video' => 'v4',
    ],
    [
        'id' => 'a5', 'kind' => 'video', 'filter' => 'video', 'tag' => 'Видео',
        'title' => 'Стихи у окна', 'meta' => 'Читальный зал · 2022', 'code' => 'В-03', 'video' => 'v3',
    ],
    [
        'id' => 'a6', 'kind' => 'doc', 'filter' => 'manuscript', 'tag' => 'Документ',
        'title' => 'Личное дело', 'meta' => 'Архив · опись 2.1', 'code' => 'Д-07',
        'image' => 'assets/img/archive-doc.jpg',
        'note' => 'Аттестат, три письма и читательский формуляр. Вложите скан подлинника.',
    ],
];

$poems = [
    [
        'id' => 'poem1', 'title' => 'Тишина', 'year' => '[год]', 'mode' => 'typewriter',
        'lines' => ['В архиве тише, чем в снегу.', 'Лампа. Папка. Чей-то почерк.', 'Я стихи по одной строке', 'вынимаю из долгой ночи.'],
    ],
    [
        'id' => 'poem2', 'title' => 'Дорога', 'year' => '[год]', 'mode' => 'karaoke',
        'lines' => ['Мы ехали в город, где нет нас,', 'где окна горят для других.', 'И я повторял твоё имя —', 'как адрес, пароль и стих.'],
    ],
    [
        'id' => 'poem3', 'title' => 'Слова', 'year' => '[год]', 'mode' => 'constellation',
        'lines' => ['Слова — это тёплые вещи,', 'их носят с собой в холода.', 'Отдай их тому, кто замёрз, —', 'и город проснётся тогда.'],
    ],
];

$chapters = [
    ['id' => 'c1', 'title' => 'Кружок в библиотеке', 'time' => '01:12', 'text' => 'Я начал вести кружок в библиотеке на окраине. Приходили школьники, учителя, иногда — совсем случайные люди. Мы читали вслух и спорили до закрытия.'],
    ['id' => 'c2', 'title' => 'Школа и театр', 'time' => '02:04', 'text' => 'В школе я ставил спектакли по стихам, которые мы разбирали на уроках. Дети учились слышать ритм — и собственную речь.'],
    ['id' => 'c3', 'title' => 'Экспедиции', 'time' => '01:48', 'text' => 'Мы ездили в сёла записывать песни и говор. Я вёл тетрадь, куда попадали слова, которых уже не было в словарях.'],
    ['id' => 'c4', 'title' => 'Культурная карта', 'time' => '02:31', 'text' => 'Город — это не только улицы. Это места, где людям читали, пели, спорили. Я попробовал собрать такую карту вместе с учениками.'],
];

$mapPoints = [
    ['id' => 'm1', 'x' => 150, 'y' => 118, 'num' => '01', 'title' => 'Библиотека на окраине', 'sub' => 'первые чтения', 'text' => 'Здесь собирался кружок: читали вслух, спорили, пили чай в подсобке. В архивной папке сохранились списки участников и одна общая тетрадь.', 'chapter' => 0],
    ['id' => 'm2', 'x' => 352, 'y' => 92, 'num' => '02', 'title' => 'Школа № 1', 'sub' => 'уроки и театр', 'text' => 'Маслов вёл уроки литературы и ставил спектакли по стихам. Ученики вспоминают, как он просил «читать так, будто это твоя собственная новость».', 'chapter' => 1],
    ['id' => 'm3', 'x' => 470, 'y' => 205, 'num' => '03', 'title' => 'Дом культуры', 'sub' => 'вечера и круглые столы', 'text' => 'Место встреч с читателями и поэтами. Здесь проходили вечера, на которых Маслов представлял молодых авторов.', 'chapter' => 2],
    ['id' => 'm4', 'x' => 268, 'y' => 282, 'num' => '04', 'title' => 'Университет', 'sub' => 'лекции и дипломы', 'text' => 'Лекции о поэтике и устной речи. Несколько дипломных работ посвящены его архиву и педагогической практике.', 'chapter' => 3],
    ['id' => 'm5', 'x' => 96, 'y' => 322, 'num' => '05', 'title' => 'Дорога на север', 'sub' => 'экспедиции', 'text' => 'Маршрут фольклорных экспедиций: записи песен, говоров и разговоров, которые позже стали основой для стихов.', 'chapter' => 2],
];

$bioSpreads = [
    [
        'running' => 'Биография · разворот 1',
        'left' => [
            'Маслов родился в [город] в семье учителя словесности. В доме было две книги, которые читали вслух по вечерам, — и это, кажется, объясняет больше, чем любые биографические справки.',
            'В [год] он поступил на филологический факультет, но главным университетом называл библиотеку: там он впервые увидел, как стихи могут стать поводом для разговора, а не поводом для позы.',
            'Первая публикация — [год], в заводской многотиражке. Он потом шутил, что тираж был такой маленький, что стихи сразу стали «устным жанром».',
        ],
        'margin' => 'В личном деле — аттестат с отличием и три письма, перевязанные суровой ниткой.',
        'quote' => '«Поэт — это человек, который слышит, как разговаривает тишина».',
        'timeline' => [
            ['1934', 'Рождение в [город]'],
            ['1952', 'Первая публикация'],
            ['1957', 'Филологический факультет'],
            ['1963', 'Первая книга стихов'],
            ['1978', 'Экспедиция на север'],
            ['1991', 'Студия при школе'],
            ['2016', 'Последний вечер'],
        ],
        'photo' => 'assets/img/book-inside.jpg',
        'photoCaption' => 'Записная книжка. Архив, опись 2.1.',
    ],
    [
        'running' => 'Биография · разворот 2',
        'left' => [
            'Архив хранит не только рукописи. Здесь есть читательские формуляры с заметками на полях, расписание электричек, черновики писем и тетрадь, в которой Маслов записывал слова, исчезающие из городской речи.',
            'Он не любил слово «наследие». Говорил: «Наследие — это когда всё уже разложили по полкам. А у меня ещё папки не разобраны».',
        ],
        'margin' => 'Запись на обороте карточки: «Не выбрасывать. Пригодится ученикам».',
        'quote' => '«Город помнит не памятники, а людей, которые в нём разговаривали».',
        'factsTitle' => 'Три необычные находки',
        'facts' => [
            ['01', 'Писал на библиотечных карточках', 'Черновики стихов встречаются на обороте формуляров: каталожным почерком — строки, а поверх — правка.'],
            ['02', 'Вёл дневник погоды', 'Рядом с датами — температура и ветер. Исследователи считают, что это ритмическая разметка будущих стихов.'],
            ['03', 'Собирал исчезающие слова', 'Отдельная тетрадь — [название]: словарь слов, которые он слышал в сёлах и записывал «на слух».'],
        ],
        'photo' => 'assets/img/archive-doc.jpg',
        'photoCaption' => 'Личное дело. Вставьте скан документа.',
    ],
];

$filmScenes = [
    ['kicker' => 'Пролог', 'title' => 'Архив', 'text' => 'Папки. Тетради. Свет из окна.'],
    ['kicker' => 'Голос', 'title' => 'Он говорит', 'text' => 'Запись, которой больше ста лет.'],
    ['kicker' => 'Дорога', 'title' => 'Маршрут', 'text' => 'Города, сёла, читальные залы.'],
    ['kicker' => 'Школа', 'title' => 'Ученики', 'text' => 'Стихи, переданные из рук в руки.'],
    ['kicker' => 'Слово', 'title' => 'Наследие', 'text' => 'То, что остаётся после.'],
    ['kicker' => 'Финал', 'title' => 'Тем, кто придёт', 'text' => 'Послание, написанное с помощью ИИ.'],
];

$aiMessage = 'Тем, кто откроет этот архив через сто лет. Не ищите меня в датах — они всё равно ошибаются. Ищите в стихах: там я говорю тише, но точнее. Если у вас выдастся минута тишины, прочитайте вслух одно стихотворение. Не для меня. Для того, кто рядом. И если вам покажется, что город стал добрее, — значит, мы всё-таки встретились.';

$year = date('Y');
$previewMode = isset($_GET['preview']);
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
$asset = static fn(string $path): string => $previewMode
    ? ltrim($path, '/')
    : ($base === '' ? '' : $base) . '/' . ltrim($path, '/');
$fileExists = static fn(string $path): bool => is_file(__DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path));
$e = static fn(?string $value): string => htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$navJson = json_encode($nav, JSON_UNESCAPED_UNICODE);
$photoJson = json_encode($photos, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$videoJson = json_encode(array_map(static function (array $video) use ($fileExists): array {
    $video['has_file'] = $fileExists($video['src']);
    return $video;
}, $videos), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$archiveJson = json_encode($archive, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$mapJson = json_encode($mapPoints, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$chaptersJson = json_encode($chapters, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$poemsJson = json_encode($poems, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$aiJson = json_encode($aiMessage, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $e($site['title']) ?></title>
    <meta name="description" content="<?= $e($site['description']) ?>">
    <meta property="og:title" content="<?= $e($site['title']) ?>">
    <meta property="og:description" content="<?= $e($site['description']) ?>">
    <meta property="og:image" content="<?= $e($asset('assets/img/photo-01.jpg')) ?>">
    <meta name="theme-color" content="#f2ecdf">
    <link rel="icon" href="<?= $e($asset('assets/img/favicon.svg')) ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?= $e($asset('assets/css/style.css')) ?>">
</head>
<body>
<a class="skip-link" href="#main">Перейти к содержанию</a>

<header class="topbar" id="top">
    <a class="brand" href="#overview" aria-label="Маслов — в начало">
        <span class="brand-mark">М.</span>
        <span class="brand-text">Маслов<em>личный архив</em></span>
    </a>

    <nav class="tabs" aria-label="Разделы страницы">
        <?php foreach ($nav as $i => $item): ?>
            <a class="tab<?= $i === 0 ? ' is-active' : '' ?>" href="#<?= $e($item['id']) ?>" data-tab="<?= $e($item['id']) ?>">
                <span class="tab-num"><?= $e($item['num']) ?></span><?= $e($item['label']) ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="top-actions">
        <button class="ghost-btn" type="button" id="phToggle" aria-pressed="false" title="Показать все заглушки и пути к файлам">
            <span class="ph-dot" aria-hidden="true"></span>Заглушки
        </button>
        <button class="solid-btn" type="button" data-open-film>
            <span class="btn-play" aria-hidden="true"></span>Смотреть ролик
        </button>
    </div>

    <button class="burger" type="button" id="burger" aria-label="Открыть меню" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span>
    </button>
</header>

<div class="mobile-menu" id="mobileMenu" hidden>
    <nav aria-label="Мобильное меню">
        <?php foreach ($nav as $item): ?>
            <a href="#<?= $e($item['id']) ?>"><span><?= $e($item['num']) ?></span><?= $e($item['label']) ?></a>
        <?php endforeach; ?>
    </nav>
    <button class="solid-btn" type="button" data-open-film><span class="btn-play" aria-hidden="true"></span>Смотреть ролик</button>
</div>

<main id="main">

    <!-- ================= 01 · ОБЗОР ================= -->
    <section class="hero section" id="overview" aria-labelledby="heroTitle">
        <div class="hero-grid">
            <div class="hero-copy">
                <p class="eyebrow"><span class="live-dot" aria-hidden="true"></span>личный архив · <?= $e($site['city']) ?> · <?= $e($site['years']) ?></p>
                <h1 id="heroTitle" class="hero-title">
                    <span class="hero-surname"><?= $e($site['surname']) ?></span>
                    <span class="hero-sub">человек, который<br>передавал слова<br><em>из рук в руки</em></span>
                </h1>
                <p class="hero-lead" data-slot="ТЕКСТ · краткий обзор"><?= $e($site['lead']) ?></p>
                <div class="hero-actions">
                    <a class="solid-btn" href="#biography">Открыть биографию <span class="arrow" aria-hidden="true">↘</span></a>
                    <button class="text-btn" type="button" data-open-film><span class="btn-play" aria-hidden="true"></span>Мини-ролик · 03:30</button>
                </div>
                <dl class="hero-meta">
                    <div><dt>Роль</dt><dd><?= $e($site['role']) ?></dd></div>
                    <div><dt>Архив</dt><dd>5 разделов · 28 единиц</dd></div>
                    <div><dt>Доступ</dt><dd>Открыт для исследования</dd></div>
                </dl>
            </div>

            <div class="hero-visual">
                <figure class="portrait-card" data-slot="ФОТО · assets/img/photo-01.jpg">
                    <div class="portrait-frame">
                        <img src="<?= $e($asset('assets/img/photo-01.jpg')) ?>" alt="Портрет Маслова — заглушка" width="1200" height="1500">
                    </div>
                    <figcaption>
                        <span>Маслов в рабочем кабинете</span>
                        <span class="mono">Ф-01 · 1970-е</span>
                    </figcaption>
                    <span class="stamp" aria-hidden="true">АРХИВ<br>№ 001</span>
                    <span class="tape tape-a" aria-hidden="true"></span>
                    <span class="tape tape-b" aria-hidden="true"></span>
                </figure>

                <button class="mini-film-card" type="button" data-open-film data-slot="ВИДЕО · assets/video/message.mp4">
                    <img src="<?= $e($asset('assets/img/mini-film.jpg')) ?>" alt="Кадр из мини-ролика — заглушка" width="1400" height="900">
                    <span class="mini-film-shade" aria-hidden="true"></span>
                    <span class="mini-film-play" aria-hidden="true"><span></span></span>
                    <span class="mini-film-caption">
                        <span class="mono">мини-ролик</span>
                        <strong>Тем, кто придёт</strong>
                        <span class="mono">03:30 · ИИ-текст</span>
                    </span>
                </button>

                <p class="hand-note" aria-hidden="true">«Не выбрасывать.<br>Пригодится ученикам».</p>
            </div>
        </div>

        <div class="marquee" aria-hidden="true">
            <div class="marquee-track">
                <span>поэт</span><span>педагог</span><span>просветитель</span><span>краевед</span><span>голос</span><span>архив</span><span>маршрут</span><span>стихи</span>
                <span>поэт</span><span>педагог</span><span>просветитель</span><span>краевед</span><span>голос</span><span>архив</span><span>маршрут</span><span>стихи</span>
            </div>
        </div>

        <!-- Медиатека: фото / видео / документы -->
        <div class="library" aria-labelledby="libraryTitle">
            <div class="library-head">
                <div>
                    <p class="section-kicker">медиатека</p>
                    <h2 id="libraryTitle" class="library-title">Сначала — смотреть</h2>
                </div>
                <div class="media-tabs" role="tablist" aria-label="Тип материалов">
                    <button class="media-tab is-active" type="button" role="tab" aria-selected="true" aria-controls="photosPanel" id="photosTab" data-media-tab="photos">Фото<span>6</span></button>
                    <button class="media-tab" type="button" role="tab" aria-selected="false" aria-controls="videosPanel" id="videosTab" data-media-tab="videos">Видео<span>5</span></button>
                    <button class="media-tab" type="button" role="tab" aria-selected="false" aria-controls="docsPanel" id="docsTab" data-media-tab="docs">Документы<span>1</span></button>
                </div>
            </div>

            <div class="media-panel" id="photosPanel" role="tabpanel" aria-labelledby="photosTab">
                <div class="photo-grid">
                    <?php foreach ($photos as $i => $photo): ?>
                        <button class="photo-tile<?= $i === 0 ? ' is-featured' : '' ?><?= $i === count($photos) - 1 ? ' is-last' : '' ?>" type="button"
                                data-photo="<?= $e($photo['id']) ?>" data-slot="ФОТО · <?= $e($photo['src']) ?>"
                                aria-label="Открыть фото: <?= $e($photo['title']) ?>">
                            <span class="photo-media"><img src="<?= $e($asset($photo['src'])) ?>" alt="<?= $e($photo['title']) ?> — заглушка" loading="lazy" width="1200" height="900"></span>
                            <span class="photo-meta"><span class="mono"><?= $e($photo['code']) ?></span><span><?= $e($photo['title']) ?></span><span class="mono"><?= $e($photo['meta']) ?></span></span>
                        </button>
                    <?php endforeach; ?>
                    <div class="photo-note">
                        <span class="mono">из архива · 28 единиц</span>
                        <p>Фотографии — только начало. Дальше — рукописи, видео и маршруты, которые можно пройти самому.</p>
                        <button class="text-btn" type="button" data-media-go="videos">Смотреть видео <span aria-hidden="true">↘</span></button>
                    </div>
                </div>
            </div>

            <div class="media-panel" id="videosPanel" role="tabpanel" aria-labelledby="videosTab" hidden>
                <div class="video-grid">
                    <?php foreach ($videos as $video): ?>
                        <button class="video-card" type="button" data-video="<?= $e($video['id']) ?>" data-slot="ВИДЕО · <?= $e($video['src']) ?>">
                            <span class="video-thumb">
                                <img src="<?= $e($asset($video['poster'])) ?>" alt="Постер: <?= $e($video['title']) ?> — заглушка" loading="lazy" width="1600" height="900">
                                <span class="play-badge" aria-hidden="true"><span></span></span>
                                <span class="duration mono"><?= $e($video['duration']) ?></span>
                            </span>
                            <span class="video-info">
                                <span class="mono"><?= $e($video['kicker']) ?> · <?= $e($video['date']) ?></span>
                                <strong><?= $e($video['title']) ?></strong>
                            </span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="media-panel" id="docsPanel" role="tabpanel" aria-labelledby="docsTab" hidden>
                <div class="doc-row">
                    <figure class="doc-figure" data-slot="ФОТО · assets/img/archive-doc.jpg">
                        <img src="<?= $e($asset('assets/img/archive-doc.jpg')) ?>" alt="Скан личного дела — заглушка" loading="lazy" width="1000" height="720">
                    </figure>
                    <div class="doc-copy">
                        <p class="mono">опись 2.1 · личное дело</p>
                        <h3>Документы, которые обычно не показывают</h3>
                        <p>Аттестат, читательский формуляр, три письма и служебная характеристика. Заглушка под скан: замените <code>assets/img/archive-doc.jpg</code>.</p>
                        <button class="text-btn" type="button" data-archive="a6">Смотреть опись <span class="arrow" aria-hidden="true">↘</span></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 02 · БИОГРАФИЯ ================= -->
    <section class="section bio" id="biography" aria-labelledby="bioTitle">
        <header class="section-head">
            <p class="section-index"><span>02</span> биография</p>
            <div class="section-title-row">
                <h2 id="bioTitle">Жизнь,<br><em>разложенная по папкам</em></h2>
                <p class="section-lead" data-slot="ТЕКСТ · вступление к биографии">Не хронология ради хронологии, а несколько страниц из книги, которую ещё предстоит написать. Листайте развороты — в архивных вклейках спрятаны детали.</p>
            </div>
        </header>

        <div class="book-wrap">
            <div class="book" id="book" aria-live="polite">
                <?php foreach ($bioSpreads as $si => $spread): ?>
                    <div class="book-spread<?= $si === 0 ? ' is-current' : '' ?>" data-spread="<?= $si ?>"<?= $si > 0 ? ' hidden' : '' ?>>
                        <article class="page page-left">
                            <div class="page-running"><span>Маслов · биография</span><span><?= $e($spread['running']) ?></span></div>
                            <div class="page-body">
                                <?php foreach ($spread['left'] as $pi => $paragraph): ?>
                                    <p class="<?= $pi === 0 ? 'has-dropcap' : '' ?>" data-slot="ТЕКСТ · биография"><?= $e($paragraph) ?></p>
                                <?php endforeach; ?>
                                <aside class="margin-note" data-slot="ТЕКСТ · заметка на полях">
                                    <span class="mono">на полях</span>
                                    <?= $e($spread['margin']) ?>
                                </aside>
                                <blockquote class="page-quote">
                                    <?= $e($spread['quote']) ?>
                                </blockquote>
                                <?php if (isset($spread['facts'])): ?>
                                    <h3 class="facts-title"><?= $e($spread['factsTitle']) ?></h3>
                                    <ol class="fact-list">
                                        <?php foreach ($spread['facts'] as $fact): ?>
                                            <li><span class="fact-num mono"><?= $e($fact[0]) ?></span><div><strong><?= $e($fact[1]) ?></strong><p><?= $e($fact[2]) ?></p></div></li>
                                        <?php endforeach; ?>
                                    </ol>
                                <?php endif; ?>
                            </div>
                            <div class="page-foot"><span><?= $si === 0 ? '12' : '14' ?></span><span>архив · <?= $e($site['surname']) ?></span></div>
                        </article>

                        <article class="page page-right">
                            <div class="page-running"><span>личное дело</span><span><?= $si === 0 ? '1900-е — 2010-е' : 'опись 2.1' ?></span></div>
                            <div class="page-body">
                                <?php if ($si === 0): ?>
                                    <div class="timeline">
                                        <?php foreach ($spread['timeline'] as $item): ?>
                                            <div class="timeline-row"><span class="mono"><?= $e($item[0]) ?></span><span><?= $e($item[1]) ?></span></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <figure class="book-photo" data-slot="ФОТО · <?= $e($spread['photo']) ?>">
                                        <img src="<?= $e($asset($spread['photo'])) ?>" alt="Архивная вклейка — заглушка" loading="lazy" width="900" height="620">
                                        <figcaption><span class="mono">вклейка</span><?= $e($spread['photoCaption']) ?></figcaption>
                                    </figure>
                                <?php else: ?>
                                    <figure class="book-photo book-photo--document" data-slot="ФОТО · <?= $e($spread['photo']) ?>">
                                        <img src="<?= $e($asset($spread['photo'])) ?>" alt="Скан документа — заглушка" loading="lazy" width="1000" height="720">
                                        <figcaption><span class="mono">документ</span><?= $e($spread['photoCaption']) ?></figcaption>
                                    </figure>
                                    <div class="archive-stamp" aria-hidden="true">ПРОВЕРЕНО<br><span>АРХИВ · 2026</span></div>
                                <?php endif; ?>
                            </div>
                            <div class="page-foot"><span><?= $si === 0 ? '13' : '15' ?></span><span>стр. <?= $si === 0 ? '12–13' : '14–15' ?></span></div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="book-controls">
                <button class="round-btn" type="button" id="bookPrev" aria-label="Предыдущий разворот">←</button>
                <div class="book-progress"><span id="bookCounter">01 / 02</span><div class="book-dots" id="bookDots"></div></div>
                <button class="round-btn" type="button" id="bookNext" aria-label="Следующий разворот">→</button>
            </div>
        </div>
    </section>

    <!-- ================= 03 · ТВОРЧЕСТВО ================= -->
    <section class="section creative" id="creative" aria-labelledby="creativeTitle">
        <header class="section-head">
            <p class="section-index"><span>03</span> творческий путь</p>
            <div class="section-title-row">
                <h2 id="creativeTitle">Стихи, которые<br><em>не лежат на полке</em></h2>
                <p class="section-lead" data-slot="ТЕКСТ · вступление к творчеству">Архив — это не только бумага. Нажимайте на карточки: черновик откроется, видео запустится, а стихотворение можно собрать самому — тремя разными способами.</p>
            </div>
        </header>

        <div class="archive-block">
            <div class="archive-toolbar">
                <div class="filter-chips" role="group" aria-label="Фильтр архива">
                    <button class="chip is-active" type="button" data-filter="all">Всё<span>6</span></button>
                    <button class="chip" type="button" data-filter="manuscript">Рукописи<span>2</span></button>
                    <button class="chip" type="button" data-filter="video">Видео<span>3</span></button>
                    <button class="chip" type="button" data-filter="event">События<span>1</span></button>
                </div>
                <p class="archive-hint mono">нажмите на карточку → откроется материал</p>
            </div>

            <div class="archive-grid" id="archiveGrid">
                <?php foreach ($archive as $item): ?>
                    <?php $video = null; if (isset($item['video'])) { foreach ($videos as $v) { if ($v['id'] === $item['video']) { $video = $v; break; } } } ?>
                    <button class="archive-card archive-card--<?= $e($item['kind']) ?>" type="button"
                            data-archive="<?= $e($item['id']) ?>" data-kind="<?= $e($item['filter']) ?>"
                            data-slot="<?= $item['kind'] === 'video' || $item['kind'] === 'event' ? 'ВИДЕО · ' . $e($video['src'] ?? '') : 'ТЕКСТ/СКАН · ' . $e($item['code']) ?>">
                        <?php if ($item['kind'] === 'video' || $item['kind'] === 'event'): ?>
                            <span class="archive-thumb">
                                <img src="<?= $e($asset($video['poster'])) ?>" alt="Кадр: <?= $e($item['title']) ?> — заглушка" loading="lazy" width="1600" height="900">
                                <span class="play-badge" aria-hidden="true"><span></span></span>
                                <span class="duration mono"><?= $e($video['duration']) ?></span>
                            </span>
                            <span class="archive-copy">
                                <span class="archive-top"><span class="mono"><?= $e($item['tag']) ?> · <?= $e($item['code']) ?></span><span class="mono"><?= $e($item['meta']) ?></span></span>
                                <strong><?= $e($item['title']) ?></strong>
                                <span class="archive-open">смотреть <span aria-hidden="true">↗</span></span>
                            </span>
                        <?php elseif ($item['kind'] === 'doc'): ?>
                            <span class="archive-thumb archive-thumb--doc">
                                <img src="<?= $e($asset($item['image'])) ?>" alt="Скан: <?= $e($item['title']) ?> — заглушка" loading="lazy" width="1000" height="720">
                                <span class="paperclip" aria-hidden="true"></span>
                            </span>
                            <span class="archive-copy">
                                <span class="archive-top"><span class="mono"><?= $e($item['tag']) ?> · <?= $e($item['code']) ?></span><span class="mono"><?= $e($item['meta']) ?></span></span>
                                <strong><?= $e($item['title']) ?></strong>
                                <span class="archive-open">открыть опись <span aria-hidden="true">↗</span></span>
                            </span>
                        <?php else: ?>
                            <span class="archive-thumb archive-thumb--paper">
                                <span class="manuscript">
                                    <?php foreach (array_slice($item['poem'], 0, 3) as $line): ?>
                                        <span><?= $e($line) ?></span>
                                    <?php endforeach; ?>
                                    <span class="manuscript-edit" aria-hidden="true">^ оставить breath</span>
                                </span>
                                <span class="stamp stamp--small" aria-hidden="true">РУКОПИСЬ<br>№ <?= $e($item['code']) ?></span>
                            </span>
                            <span class="archive-copy">
                                <span class="archive-top"><span class="mono"><?= $e($item['tag']) ?> · <?= $e($item['code']) ?></span><span class="mono"><?= $e($item['meta']) ?></span></span>
                                <strong><?= $e($item['title']) ?></strong>
                                <span class="archive-open">слушать и читать <span aria-hidden="true">↗</span></span>
                            </span>
                        <?php endif; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="poem-lab" aria-labelledby="poemLabTitle">
            <div class="poem-lab-head">
                <div>
                    <p class="section-kicker">интерактивная презентация</p>
                    <h3 id="poemLabTitle">Три стихотворения — три способа прочтения</h3>
                </div>
                <p class="mono poem-lab-note">выберите форму</p>
            </div>

            <div class="poem-modes" role="tablist" aria-label="Форма прочтения стихотворения">
                <button class="poem-mode is-active" type="button" role="tab" aria-selected="true" data-poem-mode="typewriter">
                    <span class="mode-num mono">01</span><span><strong>Печатная машинка</strong><em>стих появляется на глазах</em></span>
                </button>
                <button class="poem-mode" type="button" role="tab" aria-selected="false" data-poem-mode="karaoke">
                    <span class="mode-num mono">02</span><span><strong>Караоке</strong><em>строки идут за голосом</em></span>
                </button>
                <button class="poem-mode" type="button" role="tab" aria-selected="false" data-poem-mode="constellation">
                    <span class="mode-num mono">03</span><span><strong>Созвездие</strong><em>соберите текст из слов</em></span>
                </button>
            </div>

            <div class="poem-stage" id="poemStage">
                <div class="poem-panel is-active" data-panel="typewriter">
                    <div class="poem-paper">
                        <div class="poem-paper-head"><span class="mono">лист 01</span><span class="mono" id="twYear">[год]</span></div>
                        <h4 id="twTitle">Тишина</h4>
                        <div class="typewriter" id="twOutput" aria-live="polite"></div>
                        <div class="poem-paper-foot">
                            <button class="text-btn" type="button" id="twReplay"><span class="btn-play" aria-hidden="true"></span>Напечатать заново</button>
                            <span class="mono">скорость 28 мс · демо</span>
                        </div>
                        <span class="paper-shadow" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="poem-panel" data-panel="karaoke" hidden>
                    <div class="karaoke-card">
                        <div class="karaoke-top"><span class="mono">аудио · заглушка</span><span class="mono" id="karaokeTime">00:00 / 00:18</span></div>
                        <div class="karaoke-lines" id="karaokeLines" aria-live="polite"></div>
                        <div class="waveform" id="karaokeWave" aria-hidden="true"></div>
                        <div class="karaoke-controls">
                            <button class="round-btn" type="button" id="karaokePlay" aria-label="Запустить караоке"><span class="play-glyph" aria-hidden="true"></span></button>
                            <p>Демо-синхронизация. Добавьте <code>assets/audio/poem-karaoke.mp3</code>, чтобы включить голос.</p>
                        </div>
                    </div>
                </div>

                <div class="poem-panel" data-panel="constellation" hidden>
                    <div class="constellation-card">
                        <div class="constellation-top"><span class="mono">соберите стихотворение</span><span class="mono" id="constProgress">0 / 4</span></div>
                        <div class="constellation-sky" id="constellationSky">
                            <svg class="const-lines" viewBox="0 0 600 360" aria-hidden="true" preserveAspectRatio="none">
                                <path d="M80 90 L250 60 L430 120 L520 250 L330 300 L160 230 Z"></path>
                            </svg>
                        </div>
                        <div class="constellation-result" id="constResult" aria-live="polite"></div>
                        <button class="text-btn" type="button" id="constReset">Собрать заново</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 04 · ПРОСВЕТИТЕЛЬСТВО ================= -->
    <section class="section education" id="education" aria-labelledby="eduTitle">
        <header class="section-head">
            <p class="section-index"><span>04</span> просветительский путь</p>
            <div class="section-title-row">
                <h2 id="eduTitle">Его голосом —<br><em>о том, что он делал</em></h2>
                <p class="section-lead" data-slot="ТЕКСТ · вступление к просветительству">Четыре главы аудиогида от первого лица и культурная карта: точки, где проходили чтения, уроки и экспедиции. Голос — синтез, заглушка; текст можно заменить своим.</p>
            </div>
        </header>

        <div class="guide-grid">
            <div class="audio-guide">
                <div class="guide-portrait" data-slot="ФОТО · assets/img/photo-06.jpg">
                    <img src="<?= $e($asset('assets/img/photo-06.jpg')) ?>" alt="Портрет Маслова — заглушка" loading="lazy" width="1200" height="1500">
                    <span class="guide-label mono">аудиогид · 04 главы</span>
                </div>
                <div class="guide-body">
                    <div class="guide-now">
                        <span class="mono" id="guideChapterNum">глава 01</span>
                        <h3 id="guideChapterTitle">Кружок в библиотеке</h3>
                        <p id="guideChapterText">Я начал вести кружок в библиотеке на окраине. Приходили школьники, учителя, иногда — совсем случайные люди. Мы читали вслух и спорили до закрытия.</p>
                    </div>
                    <div class="guide-player">
                        <button class="guide-play" type="button" id="guidePlay" aria-label="Слушать главу"><span class="play-glyph" aria-hidden="true"></span></button>
                        <div class="guide-track">
                            <div class="guide-wave" id="guideWave" aria-hidden="true"></div>
                            <div class="guide-progress"><span id="guideProgress"></span></div>
                            <div class="guide-time mono"><span id="guideElapsed">00:00</span><span id="guideDuration">01:12</span></div>
                        </div>
                    </div>
                    <p class="audio-note" id="guideNote">Аудио-заглушка. Замените файлы <code>assets/audio/guide-01.mp3 … guide-04.mp3</code>. Пока играет демо-дорожка без звука.</p>
                </div>
                <ol class="chapter-list" id="chapterList">
                    <?php foreach ($chapters as $ci => $chapter): ?>
                        <li>
                            <button class="chapter<?= $ci === 0 ? ' is-active' : '' ?>" type="button" data-chapter="<?= $ci ?>" data-slot="АУДИО · assets/audio/guide-0<?= $ci + 1 ?>.mp3">
                                <span class="chapter-num mono">0<?= $ci + 1 ?></span>
                                <span class="chapter-title"><?= $e($chapter['title']) ?></span>
                                <span class="chapter-time mono"><?= $e($chapter['time']) ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>

            <div class="map-card">
                <div class="map-head">
                    <div>
                        <p class="section-kicker">культурная карта</p>
                        <h3>Места, где звучало слово</h3>
                    </div>
                    <button class="ghost-btn ghost-btn--small" type="button" id="routeToggle" aria-pressed="false"><span class="route-dot" aria-hidden="true"></span>Показать маршрут</button>
                </div>

                <div class="map-stage">
                    <svg class="map-svg" viewBox="0 0 600 420" role="img" aria-label="Схема культурных мест">
                        <defs>
                            <pattern id="mapGrid" width="30" height="30" patternUnits="userSpaceOnUse">
                                <path d="M 30 0 L 0 0 0 30" fill="none" stroke="currentColor" stroke-width="0.6" opacity="0.18"/>
                            </pattern>
                        </defs>
                        <rect width="600" height="420" fill="url(#mapGrid)"/>
                        <path class="map-river" d="M-20 250 C 90 210, 140 320, 240 300 S 420 210, 520 250 S 620 300, 700 260" fill="none"/>
                        <path class="map-river map-river--thin" d="M-20 270 C 90 230, 140 340, 240 320 S 420 230, 520 270 S 620 320, 700 280" fill="none"/>
                        <path class="map-contour" d="M40 60 C 150 20, 260 40, 330 80 S 500 120, 570 70"/>
                        <path class="map-contour" d="M20 350 C 140 300, 250 370, 340 340 S 520 300, 590 340"/>
                        <text x="470" y="330" class="map-water-label">Кама</text>
                        <path class="map-route" id="mapRoute" d="M150 118 L352 92 L470 205 L268 282 L96 322" fill="none"/>
                        <g class="map-pins" id="mapPins">
                            <?php foreach ($mapPoints as $mi => $point): ?>
                                <g class="map-pin<?= $mi === 0 ? ' is-active' : '' ?>" data-point="<?= $mi ?>" tabindex="0" role="button" aria-label="<?= $e($point['title']) ?>" transform="translate(<?= (int) $point['x'] ?>, <?= (int) $point['y'] ?>)">
                                    <circle class="pin-halo" r="24"></circle>
                                    <circle class="pin-dot" r="11"></circle>
                                    <text class="pin-num" text-anchor="middle" y="4"><?= $e($point['num']) ?></text>
                                    <text class="pin-label" x="20" y="4"><?= $e($point['title']) ?></text>
                                </g>
                            <?php endforeach; ?>
                        </g>
                    </svg>
                    <div class="map-compass" aria-hidden="true">С<br><span>↟</span></div>
                </div>

                <div class="map-detail" id="mapDetail" aria-live="polite">
                    <div class="map-detail-top"><span class="mono" id="mapDetailNum">точка 01</span><span class="mono" id="mapDetailSub">первые чтения</span></div>
                    <h4 id="mapDetailTitle">Библиотека на окраине</h4>
                    <p id="mapDetailText">Здесь собирался кружок: читали вслух, спорили, пили чай в подсобке. В архивной папке сохранились списки участников и одна общая тетрадь.</p>
                    <div class="map-detail-foot">
                        <button class="text-btn" type="button" id="mapListen"><span class="btn-play" aria-hidden="true"></span>Послушать главу</button>
                        <span class="mono" id="mapCoords">56.2° N · 58.0° E</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat"><span class="stat-num">27</span><span class="stat-label">лет в школе<br>и студии</span></div>
            <div class="stat"><span class="stat-num">140+</span><span class="stat-label">лекций<br>и встреч</span></div>
            <div class="stat"><span class="stat-num">18</span><span class="stat-label">городов<br>и сёл</span></div>
            <div class="stat"><span class="stat-num">4</span><span class="stat-label">экспедиции<br>за словом</span></div>
        </div>
    </section>

    <!-- ================= 05 · ОБРАЩЕНИЕ ================= -->
    <section class="section address" id="address" aria-labelledby="addressTitle">
        <div class="address-inner">
            <header class="address-head">
                <p class="section-index"><span>05</span> обращение потомкам</p>
                <h2 id="addressTitle">Тем, кто<br><em>придёт после</em></h2>
                <p class="address-lead">Мини-фильм и текст послания. Текст сгенерирован ИИ на основе архива и требует человеческой правки — это честная заглушка, а не голос с того света.</p>
            </header>

            <div class="address-grid">
                <button class="film-poster" type="button" data-open-film data-slot="ВИДЕО · assets/video/message.mp4">
                    <img src="<?= $e($asset('assets/img/film-poster.jpg')) ?>" alt="Постер фильма «Тем, кто придёт» — заглушка" loading="lazy" width="1200" height="1000">
                    <span class="film-poster-shade" aria-hidden="true"></span>
                    <span class="film-poster-play" aria-hidden="true"><span></span></span>
                    <span class="film-poster-meta"><span class="mono">мини-фильм · 03:30</span><strong>Тем, кто придёт</strong><span class="mono">ИИ-текст · синтез голоса</span></span>
                    <span class="film-poster-tc mono">REC ● 00:00:00</span>
                </button>

                <div class="message-card">
                    <div class="message-head"><span class="mono">черновик · сгенерировано ИИ</span><span class="mono">01 / 01</span></div>
                    <blockquote id="aiMessage"><?= $e($aiMessage) ?></blockquote>
                    <div class="message-foot">
                        <div class="signature">
                            <span class="signature-line" aria-hidden="true"></span>
                            <span>Маслов</span>
                            <em>подпись — заглушка</em>
                        </div>
                        <button class="ghost-btn ghost-btn--small" type="button" id="copyMessage"><span class="copy-icon" aria-hidden="true"></span>Скопировать текст</button>
                    </div>
                    <p class="message-disclaimer">Сгенерировано языковой моделью на основе биографических материалов. Проверьте факты, добавьте свои слова — и только потом публикуйте.</p>
                </div>
            </div>

            <footer class="address-footer">
                <div class="credits">
                    <p><strong>Маслов · личный архив</strong><br>Учебный проект-заглушка. Все тексты, фото и видео — демонстрационные.</p>
                    <p class="mono">© <?= $e((string) $year) ?> · собрано для будущего</p>
                </div>
                <div class="footer-links">
                    <a href="#overview">Наверх ↑</a>
                    <button class="text-btn" type="button" data-open-film><span class="btn-play" aria-hidden="true"></span>Пересмотреть ролик</button>
                </div>
            </footer>
        </div>
    </section>
</main>

<!-- ================= ОБЩЕЕ МОДАЛЬНОЕ ОКНО ================= -->
<div class="modal" id="modal" hidden>
    <div class="modal-backdrop" data-close-modal></div>
    <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="modalTitle" tabindex="-1">
        <button class="modal-close" type="button" data-close-modal aria-label="Закрыть">×</button>
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<!-- ================= ФИЛЬМ ================= -->
<div class="film-modal" id="filmModal" hidden>
    <div class="film-backdrop" data-close-film></div>
    <div class="film-shell" role="dialog" aria-modal="true" aria-label="Мини-фильм «Тем, кто придёт»">
        <button class="film-close" type="button" data-close-film aria-label="Закрыть фильм">×</button>
        <div class="film-frame">
            <div class="film-stage" id="filmStage">
                <?php foreach ($filmScenes as $fi => $scene): ?>
                    <section class="film-scene film-scene--<?= $fi + 1 ?><?= $fi === 0 ? ' is-active' : '' ?>" data-scene="<?= $fi ?>"<?= $fi > 0 ? ' hidden' : '' ?>>
                        <div class="scene-art" aria-hidden="true">
                            <?php if ($fi === 0): ?>
                                <span class="scene-folder f1"></span><span class="scene-folder f2"></span><span class="scene-folder f3"></span><span class="scene-light"></span>
                            <?php elseif ($fi === 1): ?>
                                <span class="scene-wave"><?php for ($b = 0; $b < 26; $b++): ?><i style="--h:<?= 12 + (($b * 37) % 68) ?>%"></i><?php endfor; ?></span>
                            <?php elseif ($fi === 2): ?>
                                <span class="scene-map"><i></i></span>
                            <?php elseif ($fi === 3): ?>
                                <span class="scene-window"></span><span class="scene-desk"></span>
                            <?php elseif ($fi === 4): ?>
                                <span class="scene-lines"><i>слова</i><i>тишина</i><i>дорога</i><i>город</i></span>
                            <?php else: ?>
                                <span class="scene-glow"></span>
                            <?php endif; ?>
                        </div>
                        <div class="scene-copy">
                            <p class="mono"><?= $e($scene['kicker']) ?> · 0<?= $fi + 1 ?> / 0<?= count($filmScenes) ?></p>
                            <h3><?= $e($scene['title']) ?></h3>
                            <p><?= $e($scene['text']) ?></p>
                            <?php if ($fi === count($filmScenes) - 1): ?>
                                <p class="scene-ai" id="sceneAi"><?= $e($aiMessage) ?></p>
                            <?php endif; ?>
                        </div>
                        <span class="scene-tc mono"><?= sprintf('00:%02d:%02d', intdiv($fi * 5, 60), ($fi * 5) % 60) ?></span>
                    </section>
                <?php endforeach; ?>
            </div>
            <div class="film-letterbox film-letterbox--top" aria-hidden="true"></div>
            <div class="film-letterbox film-letterbox--bottom" aria-hidden="true"></div>
        </div>
        <div class="film-ui">
            <button class="film-btn" type="button" id="filmToggle" aria-label="Пауза"><span class="play-glyph" aria-hidden="true"></span></button>
            <div class="film-progress" id="filmProgress">
                <?php foreach ($filmScenes as $fi => $scene): ?>
                    <button class="film-seg<?= $fi === 0 ? ' is-active' : '' ?>" type="button" data-scene-jump="<?= $fi ?>" aria-label="Сцена <?= $fi + 1 ?>: <?= $e($scene['title']) ?>"><span></span></button>
                <?php endforeach; ?>
            </div>
            <span class="film-timecode mono" id="filmTime">00:00 / 00:30</span>
            <button class="film-btn film-btn--text" type="button" id="filmReplay">↺</button>
        </div>
        <p class="film-credit">Демо-ролик: CSS-анимация, без видеофайла. Замените на <code>assets/video/message.mp4</code>.</p>
    </div>
</div>

<div class="toast" id="toast" role="status" aria-live="polite" hidden></div>

<script>
window.MASLOV = {
    photos: <?= $photoJson ?>,
    videos: <?= $videoJson ?>,
    archive: <?= $archiveJson ?>,
    chapters: <?= $chaptersJson ?>,
    mapPoints: <?= $mapJson ?>,
    poems: <?= $poemsJson ?>,
    aiMessage: <?= $aiJson ?>,
    hasAudio: {
        reading: <?= $fileExists('assets/audio/maslov-reading.mp3') ? 'true' : 'false' ?>,
        karaoke: <?= $fileExists('assets/audio/poem-karaoke.mp3') ? 'true' : 'false' ?>,
        guide: <?= $fileExists('assets/audio/guide-01.mp3') ? 'true' : 'false' ?>
    }
};
</script>
<script src="<?= $e($asset('assets/js/app.js')) ?>" defer></script>
</body>
</html>
