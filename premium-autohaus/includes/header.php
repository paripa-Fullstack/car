<?php
/**
 * Premium Auto Haus - Header Component
 * Premium multi-level header with sticky behavior
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_city = $_SESSION['selected_city'] ?? 'moscow';
$city_data = $cities[$current_city] ?? $cities['moscow'];
?>

<header class="site-header" id="siteHeader">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-inner">
                <div class="header-top-left">
                    <span class="header-tagline"><?php echo SITE_TAGLINE; ?></span>
                </div>
                
                <div class="header-top-right">
                    <!-- City Selector -->
                    <div class="city-selector" data-city="<?php echo $current_city; ?>">
                        <button class="city-btn" aria-label="Выбрать город" aria-expanded="false">
                            <svg class="icon icon-location" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span><?php echo esc_html($city_data['name']); ?></span>
                            <svg class="icon icon-chevron-down" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        
                        <div class="city-dropdown">
                            <div class="city-dropdown-header">Выберите город</div>
                            <?php foreach ($cities as $key => $city): ?>
                                <button class="city-option <?php echo $key === $current_city ? 'active' : ''; ?>" 
                                        data-city="<?php echo $key; ?>">
                                    <span class="city-name"><?php echo esc_html($city['name']); ?></span>
                                    <span class="city-address"><?php echo esc_html($city['address']); ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Quick Contacts -->
                    <div class="header-contacts">
                        <a href="tel:<?php echo CONTACT_PHONE; ?>" class="header-phone">
                            <svg class="icon icon-phone" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <?php echo CONTACT_PHONE; ?>
                        </a>
                        
                        <div class="header-social">
                            <a href="<?php echo SOCIAL_TELEGRAM; ?>" class="social-link telegram" target="_blank" rel="noopener" aria-label="Telegram">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.161c-.18 1.897-.962 6.502-1.359 8.627-.168.9-.5 1.201-.82 1.23-.697.064-1.226-.461-1.901-.903-1.056-.692-1.653-1.123-2.678-1.799-1.185-.781-.417-1.21.258-1.911.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.054-.212s-.174-.041-.249-.024c-.106.024-1.793 1.139-5.062 3.345-.479.329-.913.489-1.302.481-.426-.008-1.252-.241-1.865-.44-.751-.244-1.349-.374-1.297-.789.027-.216.324-.437.893-.663 3.498-1.524 5.831-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.477-1.635.099-.002.321.023.465.141.119.098.152.228.166.33.016.114.023.367.014.561z"/>
                                </svg>
                            </a>
                            <a href="<?php echo SOCIAL_WHATSAPP; ?>" class="social-link whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <div class="header-main-inner">
                <!-- Logo -->
                <a href="/" class="site-logo">
                    <div class="logo-icon">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4L4 14V34L24 44L44 34V14L24 4Z" fill="currentColor" opacity="0.2"/>
                            <path d="M24 8L8 16V32L24 40L40 32V16L24 8Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M24 14L14 19V29L24 34L34 29V19L24 14Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <span class="logo-name">Premium Auto Haus</span>
                        <span class="logo-slogan">Искусство движения</span>
                    </div>
                </a>
                
                <!-- Main Navigation -->
                <nav class="main-nav" id="mainNav">
                    <ul class="nav-list">
                        <li class="nav-item <?php echo active_class(''); ?>">
                            <a href="/" class="nav-link">
                                Главная
                            </a>
                        </li>
                        <li class="nav-item has-submenu <?php echo active_class('catalog'); ?>">
                            <a href="/catalog.php" class="nav-link">
                                Каталог
                                <svg class="icon icon-chevron-down" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </a>
                            <div class="submenu">
                                <div class="submenu-grid">
                                    <div class="submenu-column">
                                        <h4 class="submenu-title">По типу кузова</h4>
                                        <ul class="submenu-list">
                                            <li><a href="/catalog.php?type=sedan">Седаны</a></li>
                                            <li><a href="/catalog.php?type=suv">Внедорожники</a></li>
                                            <li><a href="/catalog.php?type=coupe">Купе</a></li>
                                            <li><a href="/catalog.php?type=cabriolet">Кабриолеты</a></li>
                                            <li><a href="/catalog.php?type=hatchback">Хетчбэки</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu-column">
                                        <h4 class="submenu-title">По маркам</h4>
                                        <ul class="submenu-list">
                                            <li><a href="/catalog.php?brand=mercedes">Mercedes-Benz</a></li>
                                            <li><a href="/catalog.php?brand=bmw">BMW</a></li>
                                            <li><a href="/catalog.php?brand=audi">Audi</a></li>
                                            <li><a href="/catalog.php?brand=porsche">Porsche</a></li>
                                            <li><a href="/catalog.php?brand=lexus">Lexus</a></li>
                                        </ul>
                                    </div>
                                    <div class="submenu-column">
                                        <h4 class="submenu-title">Особые категории</h4>
                                        <ul class="submenu-list">
                                            <li><a href="/catalog.php?category=electric">Электромобили</a></li>
                                            <li><a href="/catalog.php?category=hybrid">Гибриды</a></li>
                                            <li><a href="/catalog.php?condition=new">Новые</a></li>
                                            <li><a href="/catalog.php?condition=used">С пробегом</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item <?php echo active_class('services'); ?>">
                            <a href="/services.php" class="nav-link">Услуги</a>
                        </li>
                        <li class="nav-item <?php echo active_class('reviews'); ?>">
                            <a href="/reviews.php" class="nav-link">Отзывы</a>
                        </li>
                        <li class="nav-item <?php echo active_class('news'); ?>">
                            <a href="/news.php" class="nav-link">Автожурнал</a>
                        </li>
                        <li class="nav-item <?php echo active_class('contacts'); ?>">
                            <a href="/contacts.php" class="nav-link">Контакты</a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Header Actions -->
                <div class="header-actions">
                    <button class="btn btn-outline-sm open-modal" data-modal="callbackModal">
                        <svg class="icon icon-phone" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Заказать звонок
                    </button>
                    
                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Меню" aria-expanded="false">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sticky Shadow -->
    <div class="header-shadow"></div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="/" class="mobile-logo">
            <span class="logo-name">Premium Auto Haus</span>
        </a>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Закрыть меню">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    
    <div class="mobile-menu-content">
        <nav class="mobile-nav">
            <ul class="mobile-nav-list">
                <li class="mobile-nav-item">
                    <a href="/" class="mobile-nav-link">Главная</a>
                </li>
                <li class="mobile-nav-item has-submenu">
                    <button class="mobile-nav-link mobile-submenu-toggle">
                        Каталог
                        <svg class="icon icon-chevron-down" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <ul class="mobile-submenu">
                        <li><a href="/catalog.php?type=sedan">Седаны</a></li>
                        <li><a href="/catalog.php?type=suv">Внедорожники</a></li>
                        <li><a href="/catalog.php?type=coupe">Купе</a></li>
                        <li><a href="/catalog.php?brand=mercedes">Mercedes-Benz</a></li>
                        <li><a href="/catalog.php?brand=bmw">BMW</a></li>
                        <li><a href="/catalog.php?category=electric">Электромобили</a></li>
                    </ul>
                </li>
                <li class="mobile-nav-item">
                    <a href="/services.php" class="mobile-nav-link">Услуги</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="/reviews.php" class="mobile-nav-link">Отзывы</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="/news.php" class="mobile-nav-link">Автожурнал</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="/contacts.php" class="mobile-nav-link">Контакты</a>
                </li>
            </ul>
        </nav>
        
        <div class="mobile-menu-footer">
            <div class="mobile-contacts">
                <a href="tel:<?php echo CONTACT_PHONE; ?>" class="mobile-phone">
                    <svg class="icon icon-phone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <?php echo CONTACT_PHONE; ?>
                </a>
                <p class="mobile-hours"><?php echo BUSINESS_HOURS; ?></p>
            </div>
            
            <div class="mobile-social">
                <a href="<?php echo SOCIAL_TELEGRAM; ?>" class="social-link" target="_blank" rel="noopener">Telegram</a>
                <a href="<?php echo SOCIAL_WHATSAPP; ?>" class="social-link" target="_blank" rel="noopener">WhatsApp</a>
                <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="social-link" target="_blank" rel="noopener">Instagram</a>
            </div>
        </div>
    </div>
</div>
