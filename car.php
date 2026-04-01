<?php
/**
 * Car Detail Page - Карточка автомобиля
 * Premium Auto Haus
 */

require_once 'includes/config.php';
require_once 'includes/functions.php';

// Mock car data (in real app, fetch from DB by ID)
$carId = $_GET['id'] ?? 1;
$car = null;
foreach ($cars as $c) {
    if ($c['id'] == $carId) {
        $car = $c;
        break;
    }
}

if (!$car) {
    header('Location: /catalog.php');
    exit;
}

$pageTitle = formatCarTitle($car) . ' | Premium Auto Haus';
$pageDescription = 'Купить ' . formatCarTitle($car) . ' за ' . formatPrice($car['price']) . '. ' . $car['year'] . ' год, пробег ' . number_format($car['mileage']) . ' км.';
$currentPage = 'catalog';

// Schema.org structured data
$schemaData = [
    "@context" => "https://schema.org",
    "@type" => "Car",
    "name" => formatCarTitle($car),
    "image" => $car['images'][0],
    "description" => $car['description'],
    "brand" => [
        "@type" => "Brand",
        "name" => getBrandName($car['brand'])
    ],
    "model" => $car['model'],
    "vehicleConfiguration" => $car['engine'] . ', ' . $car['transmission'],
    "vehicleTransmission" => $car['transmission'],
    "fuelType" => $car['fuel'],
    "vehicleEngine" => [
        "@type" => "EngineSpecification",
        "engineType" => $car['fuel'],
        "engineDisplacement" => [
            "@type" => "QuantitativeValue",
            "value" => $car['engine'],
            "unitCode" => "LTR"
        ]
    ],
    "mileageFromOdometer" => [
        "@type" => "QuantitativeValue",
        "value" => $car['mileage'],
        "unitCode" => "KMT"
    ],
    "productionDate" => $car['year'],
    "offers" => [
        "@type" => "Offer",
        "price" => $car['price'],
        "priceCurrency" => "USD",
        "availability" => "https://schema.org/InStock",
        "seller" => [
            "@type" => "Organization",
            "name" => "Premium Auto Haus"
        ]
    ]
];

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
                    <li class="breadcrumbs__item">
                        <a href="/catalog.php" class="breadcrumbs__link">Каталог</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="/catalog.php?brand=<?= $car['brand'] ?>" class="breadcrumbs__link"><?= getBrandName($car['brand']) ?></a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--active" aria-current="page">
                        <span class="breadcrumbs__text"><?= formatCarTitle($car) ?></span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- Car Hero Section -->
    <section class="car-hero">
        <div class="container">
            <div class="car-hero__grid">
                <!-- Gallery Column -->
                <div class="car-gallery">
                    <div class="car-gallery__main">
                        <img src="<?= $car['images'][0] ?>" alt="<?= formatCarTitle($car) ?>" class="car-gallery__image" id="mainImage">
                        <button class="car-gallery__zoom" id="galleryZoom" aria-label="Увеличить изображение">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M11 8V14M8 11H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="car-gallery__thumbs">
                        <?php foreach ($car['images'] as $index => $image): ?>
                        <button class="car-gallery__thumb <?= $index === 0 ? 'active' : '' ?>" data-image="<?= $image ?>">
                            <img src="<?= $image ?>" alt="<?= formatCarTitle($car) ?> - фото <?= $index + 1 ?>">
                        </button>
                        <?php endforeach; ?>
                        <?php if (count($car['images']) > 4): ?>
                        <button class="car-gallery__more" id="showAllPhotos">
                            +<?= count($car['images']) - 4 ?>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="car-info">
                    <div class="car-info__header">
                        <h1 class="car-info__title"><?= formatCarTitle($car) ?></h1>
                        <div class="car-info__badges">
                            <?php if ($car['badge']): ?>
                            <span class="badge badge--<?= $car['badge'] ?>"><?= getBadgeText($car['badge']) ?></span>
                            <?php endif; ?>
                            <?php if ($car['discount']): ?>
                            <span class="badge badge--discount">-<?= $car['discount'] ?>%</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="car-info__price-block">
                        <div class="car-price">
                            <span class="car-price__current"><?= formatPrice($car['price']) ?></span>
                            <?php if ($car['old_price']): ?>
                            <span class="car-price__old"><?= formatPrice($car['old_price']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="car-info__location">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="9" r="2.5" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span><?= getCityName($car['city']) ?></span>
                        </div>
                    </div>

                    <div class="car-specs-grid">
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M7 4V2M17 4V2M7 20V22M17 20V22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span class="car-spec-item__label">Год</span>
                            <span class="car-spec-item__value"><?= $car['year'] ?></span>
                        </div>
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 8V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span class="car-spec-item__label">Пробег</span>
                            <span class="car-spec-item__value"><?= number_format($car['mileage']) ?> км</span>
                        </div>
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span class="car-spec-item__label">Двигатель</span>
                            <span class="car-spec-item__value"><?= $car['engine'] ?> л.с.</span>
                        </div>
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M20 7V5C20 3.89543 19.1046 3 18 3H6C4.89543 3 4 3.89543 4 5V7" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span class="car-spec-item__label">Топливо</span>
                            <span class="car-spec-item__value"><?= $car['fuel'] ?></span>
                        </div>
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 1V6M12 18V23M4.22 4.22L7.76 7.76M16.24 16.24L19.78 19.78M1 12H6M18 12H23M4.22 19.78L7.76 16.24M16.24 7.76L19.78 4.22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span class="car-spec-item__label">Привод</span>
                            <span class="car-spec-item__value"><?= $car['drive'] ?></span>
                        </div>
                        <div class="car-spec-item">
                            <svg class="car-spec-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20 12V10H4V12M20 12H4M20 12L18 20H6L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span class="car-spec-item__label">Коробка</span>
                            <span class="car-spec-item__value"><?= $car['transmission'] ?></span>
                        </div>
                    </div>

                    <div class="car-actions">
                        <button class="btn btn--primary btn--lg btn--full" data-modal="testDrive">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Записаться на тест-драйв
                        </button>
                        <button class="btn btn--outline btn--lg btn--full" data-modal="callback">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M22 16.92V19.92C22.0011 20.1986 21.9441 20.4742 21.8325 20.7294C21.7209 20.9846 21.5573 21.2137 21.3511 21.4019C21.1449 21.5901 20.9003 21.7332 20.6321 21.8227C20.3639 21.9121 20.0779 21.946 19.79 21.92C16.7428 21.5856 13.8713 20.5341 11.4 18.84C9.08317 17.2519 7.11926 15.288 5.53 12.97C3.83593 10.4987 2.78439 7.62729 2.45 4.58C2.42399 4.2921 2.45788 4.00608 2.54731 3.73789C2.63674 3.46971 2.77981 3.22509 2.96801 3.01891C3.15621 2.81273 3.38529 2.64912 3.64049 2.53749C3.89569 2.42586 4.17131 2.36887 4.45 2.37V5.37C4.45 5.48804 4.49184 5.59634 4.56842 5.68442C4.645 5.7725 4.75147 5.83722 4.87 5.87C7.06 6.49 9.08 7.59 10.85 9.36C12.62 11.13 13.72 13.15 14.34 15.34C14.3743 15.457 14.4399 15.5623 14.5285 15.6415C14.6171 15.7207 14.7247 15.7693 14.84 15.78L17.84 15.78C18.1178 15.7819 18.3906 15.8569 18.6303 15.9973C18.87 16.1378 19.0679 16.3386 19.2031 16.5789C19.3384 16.8191 19.406 17.0901 19.3984 17.3653C19.3909 17.6405 19.3085 17.9093 19.16 18.14L16.92 20.38C16.6953 20.6083 16.3995 20.7594 16.0795 20.8092C15.7595 20.859 15.4331 20.8047 15.15 20.655L12 18.92" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Заказать звонок
                        </button>
                        <button class="btn btn--ghost btn--lg btn--full" data-modal="tradeIn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            Trade-In оценка
                        </button>
                    </div>

                    <div class="car-meta">
                        <div class="car-meta__item">
                            <span class="car-meta__label">VIN:</span>
                            <span class="car-meta__value"><?= $car['vin'] ?? 'Не указан' ?></span>
                        </div>
                        <div class="car-meta__item">
                            <span class="car-meta__label">Дата размещения:</span>
                            <span class="car-meta__value"><?= formatDate($car['created_at']) ?></span>
                        </div>
                        <div class="car-meta__item">
                            <span class="car-meta__label">Просмотров:</span>
                            <span class="car-meta__value"><?= number_format($car['views'] ?? 0) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Credit Calculator -->
    <section class="calculator-section">
        <div class="container">
            <div class="calculator-wrapper reveal-up">
                <h2 class="section-title">Рассчитать кредит</h2>
                <div class="calculator-grid">
                    <div class="calculator-form">
                        <div class="form-group">
                            <label class="form-label">Первоначальный взнос</label>
                            <div class="input-with-slider">
                                <input type="range" class="slider-input" id="downPaymentSlider" min="0" max="<?= $car['price'] ?>" step="1000" value="<?= intval($car['price'] * 0.2) ?>">
                                <div class="input-wrapper">
                                    <span class="input-prefix">$</span>
                                    <input type="number" class="form-input" id="downPaymentInput" value="<?= intval($car['price'] * 0.2) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Срок кредита</label>
                            <div class="input-with-slider">
                                <input type="range" class="slider-input" id="loanTermSlider" min="12" max="84" step="12" value="60">
                                <div class="input-wrapper">
                                    <input type="number" class="form-input" id="loanTermInput" value="60">
                                    <span class="input-suffix">мес</span>
                                </div>
                            </div>
                        </div>
                        <div class="calculator-results">
                            <div class="result-item">
                                <span class="result-label">Ежемесячный платеж</span>
                                <span class="result-value" id="monthlyPayment">$0</span>
                            </div>
                            <div class="result-item">
                                <span class="result-label">Общая сумма</span>
                                <span class="result-value" id="totalAmount">$0</span>
                            </div>
                            <div class="result-item">
                                <span class="result-label">Процентная ставка</span>
                                <span class="result-value">9.9%</span>
                            </div>
                        </div>
                        <button class="btn btn--primary btn--full" data-modal="callback">
                            Оформить заявку
                        </button>
                    </div>
                    <div class="calculator-info">
                        <div class="info-card">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <h4>Быстрое решение</h4>
                            <p>Одобрение за 15 минут по двум документам</p>
                        </div>
                        <div class="info-card">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <h4>Надежные партнеры</h4>
                            <p>15 банков-партнеров с лучшими ставками</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="description-section">
        <div class="container">
            <div class="description-content reveal-up">
                <h2 class="section-title">Описание автомобиля</h2>
                <div class="description-text">
                    <p><?= nl2br(esc_html($car['description'])) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Section (Accordion) -->
    <section class="equipment-section">
        <div class="container">
            <h2 class="section-title">Комплектация</h2>
            <div class="accordion" id="equipmentAccordion">
                <?php 
                $equipmentGroups = [
                    'Безопасность' => ['Подушки безопасности', 'ABS', 'ESP', 'Система контроля слепых зон', 'Ассистент экстренного торможения'],
                    'Комфорт' => ['Климат-контроль', 'Электропривод сидений', 'Подогрев сидений', 'Круиз-контроль', 'Бесключевой доступ'],
                    'Мультимедиа' => ['Мультимедийная система', 'Навигация', 'Bluetooth', 'USB порты', 'Беспроводная зарядка'],
                    'Экстерьер' => ['Легкосплавные диски', 'Светодиодная оптика', 'Панорамная крыша', 'Рейлинги'],
                    'Салон' => ['Кожаный салон', 'Электропривод руля', 'Память настроек', 'Вентиляция сидений']
                ];
                
                foreach ($equipmentGroups as $group => $items): 
                ?>
                <div class="accordion-item">
                    <button class="accordion__trigger" aria-expanded="false">
                        <span class="accordion__title"><?= $group ?></span>
                        <svg class="accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="accordion__content">
                        <ul class="equipment-list">
                            <?php foreach ($items as $item): ?>
                            <li class="equipment-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span><?= $item ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Video & Media Section -->
    <section class="media-section">
        <div class="container">
            <h2 class="section-title">Видеообзор и медиа</h2>
            <div class="media-grid">
                <div class="media-item media-item--video">
                    <div class="video-preview">
                        <img src="https://picsum.photos/800/450?random=20" alt="Видеообзор">
                        <button class="play-button" aria-label="Смотреть видео">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="11" stroke="white" stroke-width="2"/>
                                <path d="M10 8L16 12L10 16V8Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                    <p class="media-caption">Видеообзор автомобиля</p>
                </div>
                <div class="media-item">
                    <a href="#" class="social-link">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                            <circle cx="18" cy="6" r="1.5" fill="currentColor"/>
                        </svg>
                        <span>Instagram</span>
                    </a>
                </div>
                <div class="media-item">
                    <a href="#" class="social-link">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M22.54 5.4C22.23 4.27 21.35 3.39 20.22 3.08C18.21 2.54 12 2.54 12 2.54C12 2.54 5.79 2.54 3.78 3.08C2.65 3.39 1.77 4.27 1.46 5.4C1.12 6.64 1.12 12 1.12 12C1.12 12 1.12 17.36 1.46 18.6C1.77 19.73 2.65 20.61 3.78 20.92C5.79 21.46 12 21.46 12 21.46C12 21.46 18.21 21.46 20.22 20.92C21.35 20.61 22.23 19.73 22.54 18.6C22.88 17.36 22.88 12 22.88 12C22.88 12 22.88 6.64 22.54 5.4Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M9.75 15.5V8.5L15.75 12L9.75 15.5Z" fill="currentColor"/>
                        </svg>
                        <span>YouTube</span>
                    </a>
                </div>
                <div class="media-item">
                    <a href="#" class="social-link">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 12L11 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span>Telegram</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Cars Section -->
    <section class="similar-cars-section">
        <div class="container">
            <h2 class="section-title">Похожие автомобили</h2>
            <div class="cars-slider swiper">
                <div class="swiper-wrapper">
                    <?php 
                    $similarCars = array_filter($cars, function($c) use ($car) {
                        return $c['id'] != $car['id'] && $c['brand'] == $car['brand'];
                    });
                    $similarCars = array_slice($similarCars, 0, 6);
                    foreach ($similarCars as $similarCar): 
                    ?>
                    <div class="swiper-slide">
                        <?php include 'includes/car-card.php'; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider-nav">
                    <button class="slider-btn slider-prev" aria-label="Назад">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button class="slider-btn slider-next" aria-label="Вперед">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section cta-section--dark">
        <div class="container">
            <div class="cta-content reveal-up">
                <h2 class="cta-title">Хотите продать свой автомобиль?</h2>
                <p class="cta-text">Предложим выгодную цену и оформим все документы за 1 день</p>
                <button class="btn btn--light btn--lg" data-modal="tradeIn">
                    Оценить автомобиль
                </button>
            </div>
        </div>
    </section>
</main>

<!-- Structured Data -->
<script type="application/ld+json">
<?= json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/modals.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery functionality
    const mainImage = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.car-gallery__thumb');
    
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbs.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            mainImage.src = thumb.dataset.image;
        });
    });
    
    // Accordion functionality
    document.querySelectorAll('.accordion__trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            const item = trigger.closest('.accordion-item');
            const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
            trigger.setAttribute('aria-expanded', !isExpanded);
            item.classList.toggle('accordion-item--active', !isExpanded);
        });
    });
    
    // Credit calculator
    const downPaymentSlider = document.getElementById('downPaymentSlider');
    const downPaymentInput = document.getElementById('downPaymentInput');
    const loanTermSlider = document.getElementById('loanTermSlider');
    const loanTermInput = document.getElementById('loanTermInput');
    const monthlyPaymentEl = document.getElementById('monthlyPayment');
    const totalAmountEl = document.getElementById('totalAmount');
    
    function calculateLoan() {
        const price = <?= $car['price'] ?>;
        const downPayment = parseInt(downPaymentInput.value) || 0;
        const termMonths = parseInt(loanTermInput.value) || 60;
        const annualRate = 0.099;
        
        const loanAmount = price - downPayment;
        const monthlyRate = annualRate / 12;
        const monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, termMonths)) / (Math.pow(1 + monthlyRate, termMonths) - 1);
        const totalAmount = monthlyPayment * termMonths;
        
        monthlyPaymentEl.textContent = '$' + Math.round(monthlyPayment).toLocaleString();
        totalAmountEl.textContent = '$' + Math.round(totalAmount).toLocaleString();
    }
    
    if (downPaymentSlider && downPaymentInput) {
        downPaymentSlider.addEventListener('input', (e) => {
            downPaymentInput.value = e.target.value;
            calculateLoan();
        });
        downPaymentInput.addEventListener('input', (e) => {
            downPaymentSlider.value = e.target.value;
            calculateLoan();
        });
    }
    
    if (loanTermSlider && loanTermInput) {
        loanTermSlider.addEventListener('input', (e) => {
            loanTermInput.value = e.target.value;
            calculateLoan();
        });
        loanTermInput.addEventListener('input', (e) => {
            loanTermSlider.value = e.target.value;
            calculateLoan();
        });
    }
    
    calculateLoan();
});
</script>
