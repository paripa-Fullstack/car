<?php
/**
 * Universal Text Page - Универсальная текстовая страница
 * Premium Auto Haus
 */

require_once 'includes/config.php';
require_once 'includes/functions.php';

// Get page slug from URL
$pageSlug = $_GET['slug'] ?? 'about';

// Mock page data (in real app, fetch from DB)
$pages = [
    'about' => [
        'title' => 'О компании',
        'content' => '<p>Premium Auto Haus — это сеть премиальных автосалонов с более чем 15-летней историей на автомобильном рынке Беларуси.</p><p>Мы специализируемся на продаже премиальных автомобилей с пробегом и новых автомобилей ведущих мировых брендов.</p><h3>Наши преимущества</h3><ul><li>Более 500 автомобилей в наличии</li><li>Комплексная проверка по 150 параметрам</li><li>Гарантия юридической чистоты</li><li>Выгодные условия кредитования</li><li>Профессиональная команда экспертов</li></ul>'
    ],
    'warranty' => [
        'title' => 'Гарантия',
        'content' => '<p>Все автомобили Premium Auto Haus проходят комплексную диагностику и получают гарантию качества.</p><h3>Что входит в гарантию</h3><ul><li>Гарантия юридической чистоты</li><li>Техническая гарантия до 2 лет</li><li>Гарантия соответствия описанию</li><li>Возврат в течение 14 дней при обнаружении скрытых дефектов</li></ul>'
    ],
    'privacy' => [
        'title' => 'Политика конфиденциальности',
        'content' => '<p>Мы ценим вашу конфиденциальность и защищаем ваши персональные данные в соответствии с законодательством.</p><h3>Какие данные мы собираем</h3><ul><li>Контактная информация (имя, телефон, email)</li><li>Данные о предпочтениях</li><li>Информация о посещениях сайта</li></ul>'
    ]
];

$page = $pages[$pageSlug] ?? $pages['about'];

$pageTitle = $page['title'] . ' | Premium Auto Haus';
$pageDescription = mb_substr(strip_tags($page['content']), 0, 160);
$currentPage = 'page';

include 'includes/header.php';
?>

<main class="main">
    <!-- Breadcrumbs -->
    <section class="breadcrumbs-section">
        <div class="container">
            <nav class="breadcrumbs" aria-label="Breadcrumb">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__link">Главная</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--active" aria-current="page">
                        <span class="breadcrumbs__text"><?= esc_html($page['title']) ?></span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- Page Hero -->
    <section class="page-hero text-page-hero">
        <div class="container">
            <div class="page-hero__content reveal-text">
                <h1 class="page-hero__title"><?= esc_html($page['title']) ?></h1>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="content-wrapper reveal-up">
                <div class="rich-text">
                    <?= $page['content'] ?>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content reveal-up">
                <h2 class="cta-title">Остались вопросы?</h2>
                <p class="cta-text">Наши специалисты готовы ответить на любые вопросы</p>
                <button class="btn btn--primary btn--lg" data-modal="callback">
                    Связаться с нами
                </button>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/modals.php'; ?>
