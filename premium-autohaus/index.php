<?php
/**
 * Premium Auto Haus - Main Index Page
 * Homepage with all premium sections
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php echo generate_meta_tags(
        'Премиальные автомобили с пробегом и новые',
        'Широкий выбор премиальных автомобилей: Mercedes-Benz, BMW, Audi, Porsche. Проверенные авто с гарантией. Выгодные условия кредита и Trade-In.',
        SITE_URL . '/assets/img/og-image.jpg'
    ); ?>
    <link rel="canonical" href="<?php echo get_canonical_url(); ?>">
    
    <!-- Preconnect to external resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- External Libraries CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    
    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="/assets/css/reset.css?v=<?php echo file_version('/assets/css/reset.css'); ?>">
    <link rel="stylesheet" href="/assets/css/fonts.css?v=<?php echo file_version('/assets/css/fonts.css'); ?>">
    <link rel="stylesheet" href="/assets/css/variables.css?v=<?php echo file_version('/assets/css/variables.css'); ?>">
    <link rel="stylesheet" href="/assets/css/components.css?v=<?php echo file_version('/assets/css/components.css'); ?>">
    <link rel="stylesheet" href="/assets/css/sections.css?v=<?php echo file_version('/assets/css/sections.css'); ?>">
    <link rel="stylesheet" href="/assets/css/animations.css?v=<?php echo file_version('/assets/css/animations.css'); ?>">
    <link rel="stylesheet" href="/assets/css/responsive.css?v=<?php echo file_version('/assets/css/responsive.css'); ?>">
    
    <!-- Schema.org -->
    <?php echo get_organization_schema(); ?>
</head>
<body class="home-page">
    <!-- Header -->
    <?php include_part('header', ['cities' => $cities]); ?>
    
    <main class="site-main">
        <!-- Hero Section -->
        <section class="hero-section" id="heroSection">
            <div class="hero-bg">
                <div class="hero-bg-image"></div>
                <div class="hero-overlay"></div>
            </div>
            
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge animate-fade-in">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path>
                        </svg>
                        <span>Премиальное качество</span>
                    </div>
                    
                    <h1 class="hero-title animate-slide-up">
                        <span class="title-line">Искусство движения.</span>
                        <span class="title-line highlight">Роскошь выбора.</span>
                    </h1>
                    
                    <p class="hero-subtitle animate-slide-up delay-1">
                        Эксклюзивная коллекция премиальных автомобилей с безупречной историей 
                        и полной гарантией качества
                    </p>
                    
                    <!-- KPI Counters -->
                    <div class="hero-kpi animate-stagger delay-2">
                        <div class="kpi-item">
                            <div class="kpi-value" data-count="<?php echo FEATURE_CARS_COUNT; ?>">0</div>
                            <div class="kpi-label">Автомобилей в наличии</div>
                        </div>
                        <div class="kpi-item">
                            <div class="kpi-value" data-count="<?php echo FEATURE_SOLD_MONTH; ?>">0</div>
                            <div class="kpi-label">Продано за месяц</div>
                        </div>
                        <div class="kpi-item">
                            <div class="kpi-value" data-count="<?php echo FEATURE_SOLD_YESTERDAY; ?>">0</div>
                            <div class="kpi-label">Продано вчера</div>
                        </div>
                        <div class="kpi-item">
                            <div class="kpi-value" data-count="<?php echo FEATURE_NEW_ARRIVALS; ?>">0</div>
                            <div class="kpi-label">Новых поступлений</div>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-actions animate-fade-in delay-3">
                        <a href="/catalog.php" class="btn btn-primary btn-lg ripple-btn">
                            Смотреть каталог
                            <svg class="icon icon-arrow-right" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <button class="btn btn-outline-lg ripple-btn open-modal" data-modal="testDriveModal">
                            Записаться на тест-драйв
                        </button>
                    </div>
                </div>
                
                <!-- Scroll Indicator -->
                <div class="scroll-indicator">
                    <div class="mouse">
                        <div class="wheel"></div>
                    </div>
                    <span>Листайте вниз</span>
                </div>
            </div>
            
            <!-- Decorative Elements -->
            <div class="hero-decoration decoration-1"></div>
            <div class="hero-decoration decoration-2"></div>
        </section>
        
        <!-- Quick Search Section -->
        <section class="quick-search-section" id="quickSearch">
            <div class="container">
                <div class="quick-search-wrapper reveal-on-scroll">
                    <h2 class="search-title">Найдите автомобиль своей мечты</h2>
                    
                    <form class="quick-search-form" id="quickSearchForm">
                        <div class="search-row">
                            <div class="search-field">
                                <label for="searchBrand">Марка</label>
                                <select name="brand" id="searchBrand" class="form-select">
                                    <option value="">Все марки</option>
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?php echo strtolower($brand['name']); ?>">
                                            <?php echo esc_html($brand['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="search-field">
                                <label for="searchModel">Модель</label>
                                <select name="model" id="searchModel" class="form-select" disabled>
                                    <option value="">Сначала выберите марку</option>
                                </select>
                            </div>
                            
                            <div class="search-field">
                                <label for="searchYearFrom">Год от</label>
                                <select name="year_from" id="searchYearFrom" class="form-select">
                                    <option value="">Любой</option>
                                    <?php for ($y = date('Y'); $y >= 2010; $y--): ?>
                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            
                            <div class="search-field">
                                <label for="searchYearTo">Год до</label>
                                <select name="year_to" id="searchYearTo" class="form-select">
                                    <option value="">Любой</option>
                                    <?php for ($y = date('Y'); $y >= 2010; $y--): ?>
                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="search-row">
                            <div class="search-field">
                                <label for="searchPriceFrom">Цена от, ₽</label>
                                <input type="text" name="price_from" id="searchPriceFrom" class="form-input" placeholder="0">
                            </div>
                            
                            <div class="search-field">
                                <label for="searchPriceTo">Цена до, ₽</label>
                                <input type="text" name="price_to" id="searchPriceTo" class="form-input" placeholder="50 000 000">
                            </div>
                            
                            <div class="search-field">
                                <label for="searchFuel">Тип топлива</label>
                                <select name="fuel" id="searchFuel" class="form-select">
                                    <option value="">Любое</option>
                                    <option value="petrol">Бензин</option>
                                    <option value="diesel">Дизель</option>
                                    <option value="electric">Электро</option>
                                    <option value="hybrid">Гибрид</option>
                                </select>
                            </div>
                            
                            <div class="search-field search-submit">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-full ripple-btn">
                                    <svg class="icon icon-search" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                    Показать варианты
                                </button>
                            </div>
                        </div>
                        
                        <!-- Advanced Filters Toggle -->
                        <button type="button" class="advanced-filters-toggle" id="advancedFiltersToggle">
                            <svg class="icon icon-sliders" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="4" y1="21" x2="4" y2="14"></line>
                                <line x1="4" y1="10" x2="4" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="3"></line>
                                <line x1="20" y1="21" x2="20" y2="16"></line>
                                <line x1="20" y1="12" x2="20" y2="3"></line>
                                <line x1="1" y1="14" x2="7" y2="14"></line>
                                <line x1="9" y1="8" x2="15" y2="8"></line>
                                <line x1="17" y1="16" x2="23" y2="16"></line>
                            </svg>
                            Расширенные фильтры
                        </button>
                        
                        <!-- Advanced Filters Panel -->
                        <div class="advanced-filters-panel" id="advancedFiltersPanel">
                            <div class="search-row">
                                <div class="search-field">
                                    <label for="searchTransmission">Коробка передач</label>
                                    <select name="transmission" id="searchTransmission" class="form-select">
                                        <option value="">Любая</option>
                                        <option value="automatic">Автомат</option>
                                        <option value="manual">Механика</option>
                                        <option value="robot">Робот</option>
                                        <option value="variator">Вариатор</option>
                                    </select>
                                </div>
                                
                                <div class="search-field">
                                    <label for="searchDrive">Привод</label>
                                    <select name="drive" id="searchDrive" class="form-select">
                                        <option value="">Любой</option>
                                        <option value="fwd">Передний</option>
                                        <option value="rwd">Задний</option>
                                        <option value="awd">Полный</option>
                                    </select>
                                </div>
                                
                                <div class="search-field">
                                    <label for="searchBody">Кузов</label>
                                    <select name="body" id="searchBody" class="form-select">
                                        <option value="">Любой</option>
                                        <option value="sedan">Седан</option>
                                        <option value="suv">Внедорожник</option>
                                        <option value="coupe">Купе</option>
                                        <option value="cabriolet">Кабриолет</option>
                                        <option value="hatchback">Хетчбэк</option>
                                        <option value="wagon">Универсал</option>
                                    </select>
                                </div>
                                
                                <div class="search-field">
                                    <label for="searchMileage">Пробег до, км</label>
                                    <input type="text" name="mileage" id="searchMileage" class="form-input" placeholder="200 000">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
        <!-- Popular Brands Section -->
        <section class="brands-section section-padding" id="brandsSection">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title">Популярные марки</h2>
                    <p class="section-subtitle">Выбирайте из лучших мировых брендов</p>
                </div>
                
                <div class="brands-grid">
                    <?php foreach (array_slice($brands, 0, 8) as $index => $brand): ?>
                        <a href="/catalog.php?brand=<?php echo strtolower($brand['name']); ?>" 
                           class="brand-card reveal-on-scroll" 
                           style="transition-delay: <?php echo $index * 50; ?>ms">
                            <div class="brand-logo-placeholder">
                                <span><?php echo substr($brand['name'], 0, 1); ?></span>
                            </div>
                            <div class="brand-info">
                                <h3 class="brand-name"><?php echo esc_html($brand['name']); ?></h3>
                                <span class="brand-count"><?php echo $brand['count']; ?> авто</span>
                            </div>
                            <div class="brand-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <div class="section-footer reveal-on-scroll">
                    <a href="/catalog.php" class="btn btn-outline ripple-btn">
                        Все марки
                        <svg class="icon icon-arrow-right" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Featured Cars - Hot Deals -->
        <section class="cars-section section-padding bg-light" id="hotDeals">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title">Горячие предложения</h2>
                    <p class="section-subtitle">Автомобили по специальным ценам</p>
                </div>
                
                <div class="cars-slider swiper reveal-on-scroll">
                    <div class="swiper-wrapper">
                        <?php foreach (array_filter($featured_cars, fn($c) => $c['badge'] === 'hot') as $car): ?>
                            <div class="swiper-slide">
                                <?php include __DIR__ . '/includes/car-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="slider-nav">
                        <button class="slider-prev" aria-label="Назад">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button class="slider-next" aria-label="Вперед">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- New Arrivals Section -->
        <section class="cars-section section-padding" id="newArrivals">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title">Новые поступления</h2>
                    <p class="section-subtitle">Только что прибыли в наши салоны</p>
                </div>
                
                <div class="cars-grid">
                    <?php foreach (array_filter($featured_cars, fn($c) => $c['badge'] === 'new') as $index => $car): ?>
                        <div class="car-card-wrapper reveal-on-scroll" style="transition-delay: <?php echo $index * 80; ?>ms">
                            <?php include __DIR__ . '/includes/car-card.php'; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="section-footer reveal-on-scroll">
                    <a href="/catalog.php?condition=new" class="btn btn-outline ripple-btn">
                        Все новые автомобили
                        <svg class="icon icon-arrow-right" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Services Section -->
        <section class="services-section section-padding bg-dark" id="servicesSection">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title text-white">Наши услуги</h2>
                    <p class="section-subtitle text-muted">Полный спектр услуг для вашего комфорта</p>
                </div>
                
                <div class="services-grid">
                    <?php foreach ($services as $index => $service): ?>
                        <a href="<?php echo esc_url($service['link']); ?>" 
                           class="service-card reveal-on-scroll"
                           style="transition-delay: <?php echo $index * 60; ?>ms">
                            <div class="service-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <?php if ($service['icon'] === 'car-buy'): ?>
                                        <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"></path>
                                        <circle cx="6.5" cy="16.5" r="2.5"></circle>
                                        <circle cx="16.5" cy="16.5" r="2.5"></circle>
                                    <?php elseif ($service['icon'] === 'exchange'): ?>
                                        <polyline points="16 3 21 3 21 8"></polyline>
                                        <line x1="4" y1="20" x2="21" y2="3"></line>
                                        <polyline points="21 16 21 21 16 21"></polyline>
                                        <line x1="15" y1="15" x2="21" y2="21"></line>
                                        <line x1="4" y1="4" x2="9" y2="9"></line>
                                    <?php else: ?>
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    <?php endif; ?>
                                </svg>
                            </div>
                            <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                            <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                            <span class="service-link">
                                Подробнее
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <div class="section-footer reveal-on-scroll">
                    <a href="/services.php" class="btn btn-primary ripple-btn">
                        Все услуги
                        <svg class="icon icon-arrow-right" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- About Company Section -->
        <section class="about-section section-padding" id="aboutSection">
            <div class="container">
                <div class="about-grid">
                    <div class="about-content reveal-on-scroll">
                        <span class="section-badge">О компании</span>
                        <h2 class="section-title">Premium Auto Haus — искусство подбора автомобилей</h2>
                        <p class="about-text">
                            Более 12 лет мы помогаем клиентам находить автомобили премиум-класса 
                            с безупречной историей и техническим состоянием. Наша миссия — сделать 
                            процесс покупки автомобиля прозрачным, комфортным и приятным.
                        </p>
                        
                        <div class="about-features">
                            <?php foreach ($advantages as $feature): ?>
                                <div class="about-feature">
                                    <div class="feature-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <?php if ($feature['icon'] === 'shield-check'): ?>
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                                <polyline points="9 12 11 14 15 10"></polyline>
                                            <?php elseif ($feature['icon'] === 'award'): ?>
                                                <circle cx="12" cy="8" r="7"></circle>
                                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                            <?php else: ?>
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            <?php endif; ?>
                                        </svg>
                                    </div>
                                    <div class="feature-content">
                                        <h4><?php echo esc_html($feature['title']); ?></h4>
                                        <p><?php echo esc_html($feature['description']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="about-stats">
                            <div class="stat-item">
                                <div class="stat-value" data-count="<?php echo FEATURE_BRANCHES; ?>">0</div>
                                <div class="stat-label">Филиалов</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value" data-count="<?php echo FEATURE_YEARS_EXPERIENCE; ?>">0</div>
                                <div class="stat-label">Лет опыта</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value" data-count="15">0</div>
                                <div class="stat-label">Банков-партнеров</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value" data-suffix="+">5000</div>
                                <div class="stat-label">Довольных клиентов</div>
                            </div>
                        </div>
                        
                        <div class="about-actions">
                            <a href="/contacts.php" class="btn btn-primary ripple-btn">
                                Наши филиалы
                                <svg class="icon icon-arrow-right" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div class="about-visual reveal-on-scroll">
                        <div class="about-image">
                            <div class="image-placeholder">
                                <span>Showroom Image</span>
                            </div>
                        </div>
                        <div class="about-accent"></div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Testimonials Section -->
        <section class="testimonials-section section-padding bg-light" id="testimonialsSection">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title">Отзывы клиентов</h2>
                    <p class="section-subtitle">Что говорят о нас наши клиенты</p>
                </div>
                
                <div class="testimonials-slider swiper reveal-on-scroll">
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="testimonial-rating">
                                        <?php echo render_star_rating($testimonial['rating']); ?>
                                    </div>
                                    <blockquote class="testimonial-text">
                                        "<?php echo esc_html($testimonial['text']); ?>"
                                    </blockquote>
                                    <div class="testimonial-author">
                                        <div class="author-avatar">
                                            <span><?php echo mb_substr($testimonial['name'], 0, 1); ?></span>
                                        </div>
                                        <div class="author-info">
                                            <cite class="author-name"><?php echo esc_html($testimonial['name']); ?></cite>
                                            <span class="author-car"><?php echo esc_html($testimonial['car']); ?></span>
                                            <span class="author-city"><?php echo esc_html($testimonial['city']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="slider-pagination"></div>
                </div>
            </div>
        </section>
        
        <!-- News Section -->
        <section class="news-section section-padding" id="newsSection">
            <div class="container">
                <div class="section-header reveal-on-scroll">
                    <h2 class="section-title">Автожурнал</h2>
                    <p class="section-subtitle">Новости, обзоры и полезные статьи</p>
                </div>
                
                <div class="news-grid">
                    <?php foreach ($news_articles as $index => $article): ?>
                        <article class="news-card reveal-on-scroll" style="transition-delay: <?php echo $index * 80; ?>ms">
                            <a href="<?php echo esc_url($article['link']); ?>" class="news-link">
                                <div class="news-image">
                                    <div class="image-placeholder">
                                        <span>News Image</span>
                                    </div>
                                    <span class="news-category"><?php echo esc_html($article['category']); ?></span>
                                </div>
                                <div class="news-content">
                                    <time class="news-date" datetime="<?php echo $article['date']; ?>">
                                        <?php echo formatDate($article['date']); ?>
                                    </time>
                                    <h3 class="news-title"><?php echo esc_html($article['title']); ?></h3>
                                    <p class="news-excerpt"><?php echo esc_html($article['excerpt']); ?></p>
                                    <span class="news-more">
                                        Читать далее
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
                
                <div class="section-footer reveal-on-scroll">
                    <a href="/news.php" class="btn btn-outline ripple-btn">
                        Все статьи
                        <svg class="icon icon-arrow-right" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section section-padding" id="ctaSection">
            <div class="container">
                <div class="cta-wrapper reveal-on-scroll">
                    <div class="cta-content">
                        <h2 class="cta-title">Остались вопросы?</h2>
                        <p class="cta-text">
                            Наши эксперты готовы помочь вам с выбором автомобиля 
                            и ответить на все вопросы
                        </p>
                        <div class="cta-actions">
                            <button class="btn btn-primary btn-lg ripple-btn open-modal" data-modal="callbackModal">
                                Заказать звонок
                            </button>
                            <a href="tel:<?php echo CONTACT_PHONE; ?>" class="cta-phone">
                                <svg class="icon icon-phone" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <?php echo CONTACT_PHONE; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <?php include_part('footer'); ?>
    
    <!-- Modals -->
    <?php include __DIR__ . '/includes/modals.php'; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    
    <script src="/assets/js/main.js?v=<?php echo file_version('/assets/js/main.js'); ?>"></script>
</body>
</html>
