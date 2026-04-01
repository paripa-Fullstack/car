<header class="header" id="header">
    <div class="header__container">
        <!-- Logo -->
        <a href="/" class="header__logo">
            <img src="assets/img/logo/logo.svg" alt="Premium Auto Haus" class="header__logo-image" onerror="this.style.display='none'">
            <div class="header__logo-text">
                PREMIUM AUTO HAUS
                <span class="header__logo-slogan">Премиальные автомобили с пробегом</span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="header__nav">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="/catalog.php" class="nav__link">Каталог</a>
                    <div class="nav__dropdown">
                        <ul class="nav__dropdown-list">
                            <li><a href="/catalog.php?category=sedan" class="nav__dropdown-link">Седаны</a></li>
                            <li><a href="/catalog.php?category=suv" class="nav__dropdown-link">Внедорожники</a></li>
                            <li><a href="/catalog.php?category=coupe" class="nav__dropdown-link">Купе</a></li>
                            <li><a href="/catalog.php?category=electric" class="nav__dropdown-link">Электромобили</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav__item">
                    <a href="/services.php" class="nav__link">Услуги</a>
                </li>
                <li class="nav__item">
                    <a href="/reviews.php" class="nav__link">Отзывы</a>
                </li>
                <li class="nav__item">
                    <a href="/news.php" class="nav__link">Автожурнал</a>
                </li>
                <li class="nav__item">
                    <a href="/contacts.php" class="nav__link">Контакты</a>
                </li>
            </ul>
        </nav>

        <!-- City Selector -->
        <div class="header__city">
            <button class="header__city-button" aria-label="Выбрать город">
                <svg class="header__city-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <span id="current-city">Минск</span>
            </button>
            <div class="header__city-dropdown">
                <ul class="header__city-list">
                    <li class="header__city-item header__city-item--active" data-city="minsk">Минск</li>
                    <li class="header__city-item" data-city="moscow">Москва</li>
                    <li class="header__city-item" data-city="spb">Санкт-Петербург</li>
                    <li class="header__city-item" data-city="kazan">Казань</li>
                </ul>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="header__contact">
            <a href="tel:+375291234567" class="header__phone">+375 (29) 123-45-67</a>
            <span class="header__callback" data-modal="callback">Заказать звонок</span>
        </div>

        <!-- Actions -->
        <div class="header__actions">
            <!-- Mobile Menu Toggle -->
            <button class="header__toggle" aria-label="Меню" id="menuToggle">
                <span class="header__toggle-line"></span>
                <span class="header__toggle-line"></span>
                <span class="header__toggle-line"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu__header">
        <a href="/" class="header__logo">
            <div class="header__logo-text">PREMIUM AUTO HAUS</div>
        </a>
        <button class="mobile-menu__close" id="mobileMenuClose" aria-label="Закрыть меню">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    
    <nav class="mobile-menu__nav">
        <ul class="mobile-menu__list">
            <li class="mobile-menu__item">
                <a href="/catalog.php" class="mobile-menu__link">Каталог автомобилей</a>
            </li>
            <li class="mobile-menu__item">
                <a href="/services.php" class="mobile-menu__link">Услуги</a>
            </li>
            <li class="mobile-menu__item">
                <a href="/reviews.php" class="mobile-menu__link">Отзывы</a>
            </li>
            <li class="mobile-menu__item">
                <a href="/news.php" class="mobile-menu__link">Автожурнал</a>
            </li>
            <li class="mobile-menu__item">
                <a href="/contacts.php" class="mobile-menu__link">Контакты</a>
            </li>
        </ul>
    </nav>

    <div class="mobile-menu__contacts">
        <a href="tel:+375291234567" class="mobile-menu__phone">+375 (29) 123-45-67</a>
        <div class="mobile-menu__social">
            <a href="#" class="mobile-menu__social-link" aria-label="Instagram">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </a>
            <a href="#" class="mobile-menu__social-link" aria-label="Telegram">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </a>
            <a href="#" class="mobile-menu__social-link" aria-label="WhatsApp">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>
