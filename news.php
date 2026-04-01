<?php
/**
 * News/Blog Page - Автожурнал
 * Premium Auto Haus
 */

require_once 'includes/config.php';
require_once 'includes/functions.php';

$pageTitle = 'Автожурнал | Новости и статьи | Premium Auto Haus';
$pageDescription = 'Последние новости автомобильного мира, обзоры, советы по выбору и обслуживанию автомобилей.';
$currentPage = 'news';

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
                        <span class="breadcrumbs__text">Автожурнал</span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- News Hero -->
    <section class="page-hero news-hero">
        <div class="container">
            <div class="page-hero__content reveal-text">
                <h1 class="page-hero__title">Автожурнал</h1>
                <p class="page-hero__subtitle">Новости, обзоры и полезные статьи об автомобилях</p>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="news-filter-section">
        <div class="container">
            <div class="category-filter">
                <button class="category-filter__btn active" data-category="all">Все статьи</button>
                <button class="category-filter__btn" data-category="reviews">Обзоры</button>
                <button class="category-filter__btn" data-category="news">Новости</button>
                <button class="category-filter__btn" data-category="tips">Советы</button>
                <button class="category-filter__btn" data-category="events">События</button>
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    <section class="featured-article">
        <div class="container">
            <article class="featured-article__card reveal-up">
                <div class="featured-article__image">
                    <img src="https://picsum.photos/800/500?random=40" alt="Featured article" loading="lazy">
                    <span class="badge badge--primary">Рекомендуем</span>
                </div>
                <div class="featured-article__content">
                    <div class="article-meta">
                        <span class="article-category">Обзоры</span>
                        <span class="article-date">15 марта 2024</span>
                    </div>
                    <h2 class="featured-article__title">Новый BMW X7 2024: полный обзор флагманского внедорожника</h2>
                    <p class="featured-article__excerpt">Подробный тест-драйв обновленного BMW X7 с новыми двигателями, технологичным салоном и улучшенной динамикой.</p>
                    <a href="#" class="btn btn--primary">Читать далее</a>
                </div>
            </article>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="articles-grid-section">
        <div class="container">
            <div class="articles-grid">
                <?php 
                $mockArticles = [
                    ['title' => 'Как выбрать подержанный автомобиль: руководство для покупателей', 'category' => 'Советы', 'date' => '2024-03-12', 'image' => 'https://picsum.photos/400/250?random=41', 'excerpt' => 'Полезные советы по проверке автомобиля перед покупкой'],
                    ['title' => 'Mercedes-Benz представил новый EQS Electric', 'category' => 'Новости', 'date' => '2024-03-10', 'image' => 'https://picsum.photos/400/250?random=42', 'excerpt' => 'Первый взгляд на электрический флагман Mercedes'],
                    ['title' => 'Сравнение: Audi Q7 vs BMW X5 vs Mercedes GLE', 'category' => 'Обзоры', 'date' => '2024-03-08', 'image' => 'https://picsum.photos/400/250?random=43', 'excerpt' => 'Большое сравнение премиальных внедорожников'],
                    ['title' => 'Весенняя выставка автомобилей в Минске', 'category' => 'События', 'date' => '2024-03-05', 'image' => 'https://picsum.photos/400/250?random=44', 'excerpt' => 'Анонс крупнейшего автомобильного события года'],
                    ['title' => 'ТОП-10 самых надежных двигателей 2024 года', 'category' => 'Советы', 'date' => '2024-03-01', 'image' => 'https://picsum.photos/400/250?random=45', 'excerpt' => 'Рейтинг лучших двигателей по версии экспертов'],
                    ['title' => 'Porsche Taycan обновил рекорд Нюрбургринга', 'category' => 'Новости', 'date' => '2024-02-28', 'image' => 'https://picsum.photos/400/250?random=46', 'excerpt' => 'Электрический спорткар побил собственный рекорд'],
                ];
                
                foreach ($mockArticles as $index => $article): 
                ?>
                <article class="article-card reveal-up" style="transition-delay: <?= $index * 50 ?>ms">
                    <div class="article-card__image">
                        <img src="<?= $article['image'] ?>" alt="<?= $article['title'] ?>" loading="lazy">
                        <span class="article-card__category"><?= $article['category'] ?></span>
                    </div>
                    <div class="article-card__content">
                        <div class="article-card__meta">
                            <span class="article-date"><?= formatDate($article['date']) ?></span>
                        </div>
                        <h3 class="article-card__title">
                            <a href="#"><?= $article['title'] ?></a>
                        </h3>
                        <p class="article-card__excerpt"><?= $article['excerpt'] ?></p>
                        <a href="#" class="article-card__link">
                            Читать далее
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination__btn pagination__btn--prev" disabled>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <button class="pagination__btn pagination__btn--number active">1</button>
                <button class="pagination__btn pagination__btn--number">2</button>
                <button class="pagination__btn pagination__btn--number">3</button>
                <button class="pagination__btn pagination__btn--next">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="container">
            <div class="subscribe-wrapper reveal-up">
                <div class="subscribe-content">
                    <h2 class="subscribe-title">Подпишитесь на новости</h2>
                    <p class="subscribe-text">Получайте свежие статьи и новости первыми</p>
                </div>
                <form class="subscribe-form" id="subscribeForm">
                    <input type="email" class="form-input" placeholder="Ваш email" required>
                    <button type="submit" class="btn btn--primary">Подписаться</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/modals.php'; ?>
