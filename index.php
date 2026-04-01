<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
$pageTitle = 'Главная';
$pageDescription = 'Премиальные автомобили с пробегом и новые. Официальный дилер. Гарантия качества. Более 1500 автомобилей в наличии.';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo generateMetaTags($pageTitle, $pageDescription); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/variables.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/sections.css">
    <link rel="stylesheet" href="/assets/css/animations.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>
<body class="page-home">
    <?php include 'includes/header.php'; ?>
    <main class="main-content">
        <section class="hero" id="hero">
            <div class="hero__bg"><div class="hero__bg-image"></div><div class="hero__overlay"></div></div>
            <div class="container hero__container">
                <div class="hero__content">
                    <h1 class="hero__title animate-title"><span class="line">Премиальные</span><span class="line">автомобили</span><span class="line">с пробегом</span></h1>
                    <p class="hero__subtitle animate-subtitle">Официальный дилер. Гарантия качества. Лучшие условия.</p>
                    <div class="hero__kpi kpi-grid">
                        <?php foreach ($stats as $stat): ?>
                        <div class="kpi-card animate-kpi">
                            <div class="kpi-card__value"><span class="counter" data-value="<?php echo $stat['value']; ?>" data-suffix="<?php echo $stat['suffix']; ?>">0</span></div>
                            <div class="kpi-card__label"><?php echo $stat['label']; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="hero__actions animate-actions">
                        <a href="/catalog.php" class="btn btn--primary btn--large ripple-btn"><span>Выбрать автомобиль</span></a>
                        <button class="btn btn--outline btn--large ripple-btn open-modal" data-modal="callback">Заказать звонок</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="quick-search section-padding">
            <div class="container">
                <div class="quick-search__wrapper animate-on-scroll">
                    <h2 class="section-title">Найдите свой идеальный автомобиль</h2>
                    <form class="search-form" action="/catalog.php" method="GET">
                        <div class="search-form__grid">
                            <div class="form-group"><label for="brand" class="form-label">Марка</label>
                                <select id="brand" name="brand" class="form-select custom-select">
                                    <option value="">Все марки</option>
                                    <?php foreach ($brands as $brand): ?><option value="<?php echo strtolower($brand['name']); ?>"><?php echo $brand['name']; ?></option><?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group"><label for="model" class="form-label">Модель</label><select id="model" name="model" class="form-select custom-select"><option value="">Любая модель</option></select></div>
                            <div class="form-group"><label for="year-from" class="form-label">Год от</label>
                                <select id="year-from" name="year_from" class="form-select custom-select"><option value="">Не важно</option><?php for ($y = date('Y'); $y >= 2010; $y--): ?><option value="<?php echo $y; ?>"><?php echo $y; ?></option><?php endfor; ?></select>
                            </div>
                            <div class="form-group"><label for="price-from" class="form-label">Цена от, ₽</label><input type="text" id="price-from" name="price_from" class="form-input" placeholder="0"></div>
                            <div class="form-group"><label for="price-to" class="form-label">Цена до, ₽</label><input type="text" id="price-to" name="price_to" class="form-input" placeholder="50 000 000"></div>
                        </div>
                        <div class="search-form__actions"><button type="submit" class="btn btn--primary btn--large ripple-btn"><span>Показать варианты</span></button></div>
                    </form>
                </div>
            </div>
        </section>

        <section class="brands section-padding bg-light">
            <div class="container">
                <div class="section-header animate-on-scroll"><h2 class="section-title">Популярные марки</h2><a href="/catalog.php" class="section-link"><span>Все марки</span></a></div>
                <div class="brands-grid">
                    <?php foreach ($brands as $brand): ?>
                    <a href="/catalog.php?brand=<?php echo strtolower($brand['name']); ?>" class="brand-card animate-on-scroll">
                        <div class="brand-card__name"><?php echo $brand['name']; ?></div>
                        <div class="brand-card__count"><?php echo $brand['count']; ?> авто</div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="featured-cars section-padding">
            <div class="container">
                <div class="section-header animate-on-scroll"><h2 class="section-title">Лидеры продаж</h2><a href="/catalog.php" class="section-link"><span>Смотреть все</span></a></div>
                <div class="cars-slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach (array_slice($cars, 0, 6) as $car): ?>
                        <div class="swiper-slide"><?php include 'includes/car-card.php'; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-nav"><button class="slider-btn slider-prev">←</button><button class="slider-btn slider-next">→</button></div>
                </div>
            </div>
        </section>

        <section class="services section-padding bg-light">
            <div class="container">
                <div class="section-header animate-on-scroll"><h2 class="section-title">Наши услуги</h2><a href="/services.php" class="section-link"><span>Все услуги</span></a></div>
                <div class="services-grid">
                    <?php foreach ($services as $service): ?>
                    <a href="<?php echo $service['link']; ?>" class="service-card animate-on-scroll">
                        <h3 class="service-card__title"><?php echo $service['title']; ?></h3>
                        <p class="service-card__desc"><?php echo $service['description']; ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="reviews section-padding bg-light">
            <div class="container">
                <div class="section-header animate-on-scroll"><h2 class="section-title">Отзывы клиентов</h2><a href="/reviews.php" class="section-link"><span>Все отзывы</span></a></div>
                <div class="reviews-slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($reviews as $review): ?>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="review-card__name"><?php echo $review['author']; ?></div>
                                <div class="review-card__car"><?php echo $review['car']; ?></div>
                                <div class="review-card__rating"><?php echo generateStarRating($review['rating']); ?></div>
                                <p class="review-card__text"><?php echo $review['text']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="news section-padding">
            <div class="container">
                <div class="section-header animate-on-scroll"><h2 class="section-title">Автожурнал</h2><a href="/news.php" class="section-link"><span>Все статьи</span></a></div>
                <div class="news-grid">
                    <?php foreach ($news as $article): ?>
                    <a href="/news.php?id=<?php echo $article['id']; ?>" class="news-card animate-on-scroll">
                        <h3 class="news-card__title"><?php echo $article['title']; ?></h3>
                        <p class="news-card__excerpt"><?php echo $article['excerpt']; ?></p>
                        <div class="news-card__date"><?php echo formatDate($article['date']); ?></div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="cta section-padding bg-primary">
            <div class="container">
                <div class="cta__content animate-on-scroll">
                    <h2 class="cta__title">Не нашли подходящий автомобиль?</h2>
                    <p class="cta__text">Оставьте заявку, и мы подберем для вас идеальный вариант</p>
                    <button class="btn btn--light btn--large ripple-btn open-modal" data-modal="callback">Заказать подбор</button>
                </div>
            </div>
        </section>
    </main>
    <?php include 'includes/footer.php'; include 'includes/modals.php'; include 'includes/scripts.php'; ?>
</body>
</html>
