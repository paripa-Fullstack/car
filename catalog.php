<?php
/**
 * Catalog Page - Каталог автомобилей
 * Premium Auto Haus
 */

require_once 'includes/config.php';
require_once 'includes/functions.php';

$pageTitle = 'Каталог автомобилей | Premium Auto Haus';
$pageDescription = 'Более 500 премиальных автомобилей в наличии. BMW, Mercedes-Benz, Audi, Porsche и другие бренды.';
$currentPage = 'catalog';

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
                        <span class="breadcrumbs__text">Каталог</span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- Catalog Hero -->
    <section class="catalog-hero">
        <div class="container">
            <div class="catalog-hero__content reveal-text">
                <h1 class="catalog-hero__title">Каталог автомобилей</h1>
                <p class="catalog-hero__subtitle">Выберите свой идеальный автомобиль из нашего премиального ассортимента</p>
                <div class="catalog-hero__stats">
                    <div class="stat-item">
                        <span class="stat-item__value" data-count="<?= count($cars) ?>">0</span>
                        <span class="stat-item__label">автомобилей в наличии</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-item__value"><?= count(array_unique(array_column($cars, 'brand'))) ?></span>
                        <span class="stat-item__label">брендов представлено</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-wrapper">
                <!-- Mobile Filter Toggle -->
                <button class="filters-toggle" id="filtersToggle" aria-expanded="false">
                    <svg class="filters-toggle__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 5H21M3 12H21M3 19H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>Фильтры</span>
                    <span class="filters-toggle__count" id="activeFiltersCount">0</span>
                </button>

                <!-- Filters Sidebar -->
                <aside class="filters-sidebar" id="filtersSidebar">
                    <div class="filters-sidebar__header">
                        <h3 class="filters-sidebar__title">Фильтры</h3>
                        <button class="filters-sidebar__close" id="filtersClose" aria-label="Закрыть фильтры">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                    <form class="filters-form" id="catalogFilters">
                        <!-- Brand Filter -->
                        <div class="filter-group" data-filter="brand">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Марка</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="checkbox-list">
                                    <?php foreach ($brands as $brand): ?>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="brand[]" value="<?= $brand['id'] ?>" class="checkbox-item__input">
                                        <span class="checkbox-item__checkmark"></span>
                                        <span class="checkbox-item__label"><?= $brand['name'] ?></span>
                                        <span class="checkbox-item__count"><?= $brand['count'] ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-group" data-filter="price">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Цена</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="range-slider">
                                    <div class="range-slider__track">
                                        <div class="range-slider__fill" id="priceFill"></div>
                                        <input type="range" class="range-slider__input" id="priceMin" min="0" max="500000" step="5000" value="50000">
                                        <input type="range" class="range-slider__input" id="priceMax" min="0" max="500000" step="5000" value="300000">
                                    </div>
                                    <div class="range-slider__values">
                                        <span class="range-slider__value" id="priceMinValue">$50,000</span>
                                        <span class="range-slider__value" id="priceMaxValue">$300,000</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Year Filter -->
                        <div class="filter-group" data-filter="year">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Год выпуска</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="select-custom">
                                    <select name="year_from" class="select-custom__input">
                                        <option value="">От года</option>
                                        <?php for ($y = date('Y'); $y >= 2010; $y--): ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="select-custom" style="margin-top: 10px;">
                                    <select name="year_to" class="select-custom__input">
                                        <option value="">До года</option>
                                        <?php for ($y = date('Y'); $y >= 2010; $y--): ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Body Type -->
                        <div class="filter-group" data-filter="body">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Тип кузова</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="checkbox-list">
                                    <?php $bodyTypes = ['Седан', 'Внедорожник', 'Купе', 'Кабриолет', 'Универсал', 'Хэтчбек']; ?>
                                    <?php foreach ($bodyTypes as $type): ?>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="body[]" value="<?= $type ?>" class="checkbox-item__input">
                                        <span class="checkbox-item__checkmark"></span>
                                        <span class="checkbox-item__label"><?= $type ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Transmission -->
                        <div class="filter-group" data-filter="transmission">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Коробка передач</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="checkbox-list">
                                    <?php $transmissions = ['Автоматическая', 'Механическая', 'Роботизированная', 'Вариатор']; ?>
                                    <?php foreach ($transmissions as $trans): ?>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="transmission[]" value="<?= $trans ?>" class="checkbox-item__input">
                                        <span class="checkbox-item__checkmark"></span>
                                        <span class="checkbox-item__label"><?= $trans ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Fuel Type -->
                        <div class="filter-group" data-filter="fuel">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Тип топлива</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="checkbox-list">
                                    <?php $fuels = ['Бензин', 'Дизель', 'Электро', 'Гибрид']; ?>
                                    <?php foreach ($fuels as $fuel): ?>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="fuel[]" value="<?= $fuel ?>" class="checkbox-item__input">
                                        <span class="checkbox-item__checkmark"></span>
                                        <span class="checkbox-item__label"><?= $fuel ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- City Filter -->
                        <div class="filter-group" data-filter="city">
                            <button type="button" class="filter-group__trigger" aria-expanded="true">
                                <span class="filter-group__name">Город</span>
                                <svg class="filter-group__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="filter-group__content">
                                <div class="checkbox-list">
                                    <?php foreach ($cities as $city): ?>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="city[]" value="<?= $city['id'] ?>" class="checkbox-item__input">
                                        <span class="checkbox-item__checkmark"></span>
                                        <span class="checkbox-item__label"><?= $city['name'] ?></span>
                                        <span class="checkbox-item__count"><?= $city['count'] ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Reset & Apply Buttons -->
                        <div class="filters-actions">
                            <button type="button" class="btn btn--outline" id="resetFilters">
                                Сбросить
                            </button>
                            <button type="submit" class="btn btn--primary">
                                Применить
                            </button>
                        </div>
                    </form>
                </aside>

                <!-- Main Content Area -->
                <div class="catalog-content">
                    <!-- Toolbar -->
                    <div class="catalog-toolbar">
                        <div class="catalog-toolbar__info">
                            <span class="catalog-toolbar__count" id="carsCount"><?= count($cars) ?> автомобиля</span>
                        </div>
                        <div class="catalog-toolbar__controls">
                            <div class="view-switcher">
                                <button class="view-switcher__btn view-switcher__btn--grid active" data-view="grid" aria-label="Вид сеткой">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                                        <rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                                        <rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                                        <rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </button>
                                <button class="view-switcher__btn view-switcher__btn--list" data-view="list" aria-label="Вид списком">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <rect x="3" y="4" width="18" height="4" rx="1" stroke="currentColor" stroke-width="2"/>
                                        <rect x="3" y="10" width="18" height="4" rx="1" stroke="currentColor" stroke-width="2"/>
                                        <rect x="3" y="16" width="18" height="4" rx="1" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="sort-dropdown">
                                <button class="sort-dropdown__trigger" id="sortTrigger">
                                    <span>Сортировка:</span>
                                    <span class="sort-dropdown__current">По умолчанию</span>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="sort-dropdown__menu" id="sortMenu">
                                    <button class="sort-dropdown__item active" data-sort="default">По умолчанию</button>
                                    <button class="sort-dropdown__item" data-sort="price_asc">Сначала дешевые</button>
                                    <button class="sort-dropdown__item" data-sort="price_desc">Сначала дорогие</button>
                                    <button class="sort-dropdown__item" data-sort="year_desc">Новые по году</button>
                                    <button class="sort-dropdown__item" data-sort="year_asc">Старые по году</button>
                                    <button class="sort-dropdown__item" data-sort="mileage_asc">Меньший пробег</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Filters Tags -->
                    <div class="active-filters" id="activeFilters"></div>

                    <!-- Cars Grid -->
                    <div class="cars-grid" id="carsGrid">
                        <?php foreach ($cars as $car): ?>
                        <?php include 'includes/car-card.php'; ?>
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
                        <span class="pagination__dots">...</span>
                        <button class="pagination__btn pagination__btn--number">8</button>
                        <button class="pagination__btn pagination__btn--next">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Load More Alternative -->
                    <div class="load-more">
                        <button class="btn btn--outline btn--lg">
                            Показать еще 12 автомобилей
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5V19M12 19L5 12M12 19L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Text Block -->
    <section class="seo-block">
        <div class="container">
            <div class="seo-block__content reveal-up">
                <h2 class="seo-block__title">Премиальные автомобили с пробегом</h2>
                <div class="seo-block__text">
                    <p>В нашем автосалоне представлен широкий выбор премиальных автомобилей с пробегом. Все транспортные средства прошли комплексную диагностику и имеют гарантию юридической чистоты.</p>
                    <p>Мы предлагаем выгодные условия кредитования, trade-in программы и помощь в оформлении всех необходимых документов.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/modals.php'; ?>

<script>
// Catalog specific functionality
document.addEventListener('DOMContentLoaded', function() {
    // Filter toggle for mobile
    const filtersToggle = document.getElementById('filtersToggle');
    const filtersSidebar = document.getElementById('filtersSidebar');
    const filtersClose = document.getElementById('filtersClose');
    
    if (filtersToggle) {
        filtersToggle.addEventListener('click', () => {
            const isExpanded = filtersToggle.getAttribute('aria-expanded') === 'true';
            filtersToggle.setAttribute('aria-expanded', !isExpanded);
            filtersSidebar.classList.toggle('filters-sidebar--open');
            document.body.style.overflow = !isExpanded ? 'hidden' : '';
        });
    }
    
    if (filtersClose) {
        filtersClose.addEventListener('click', () => {
            filtersToggle.setAttribute('aria-expanded', 'false');
            filtersSidebar.classList.remove('filters-sidebar--open');
            document.body.style.overflow = '';
        });
    }
    
    // Filter group accordions
    document.querySelectorAll('.filter-group__trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            const group = trigger.closest('.filter-group');
            const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
            trigger.setAttribute('aria-expanded', !isExpanded);
            group.classList.toggle('filter-group--expanded', !isExpanded);
        });
    });
    
    // Sort dropdown
    const sortTrigger = document.getElementById('sortTrigger');
    const sortMenu = document.getElementById('sortMenu');
    
    if (sortTrigger && sortMenu) {
        sortTrigger.addEventListener('click', () => {
            sortMenu.classList.toggle('sort-dropdown__menu--open');
        });
        
        document.querySelectorAll('.sort-dropdown__item').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelector('.sort-dropdown__item.active').classList.remove('active');
                item.classList.add('active');
                document.querySelector('.sort-dropdown__current').textContent = item.textContent;
                sortMenu.classList.remove('sort-dropdown__menu--open');
            });
        });
        
        document.addEventListener('click', (e) => {
            if (!sortTrigger.contains(e.target) && !sortMenu.contains(e.target)) {
                sortMenu.classList.remove('sort-dropdown__menu--open');
            }
        });
    }
    
    // View switcher
    document.querySelectorAll('.view-switcher__btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelector('.view-switcher__btn.active').classList.remove('active');
            btn.classList.add('active');
            const view = btn.dataset.view;
            document.getElementById('carsGrid').className = `cars-grid cars-grid--${view}`;
        });
    });
    
    // Range slider visualization
    const priceMin = document.getElementById('priceMin');
    const priceMax = document.getElementById('priceMax');
    const priceFill = document.getElementById('priceFill');
    const priceMinValue = document.getElementById('priceMinValue');
    const priceMaxValue = document.getElementById('priceMaxValue');
    
    function updatePriceSlider() {
        const min = parseInt(priceMin.value);
        const max = parseInt(priceMax.value);
        const percent = ((min - priceMin.min) / (priceMax.max - priceMin.min)) * 100;
        const percent2 = ((max - priceMin.min) / (priceMax.max - priceMin.min)) * 100;
        
        if (priceFill) {
            priceFill.style.left = `${percent}%`;
            priceFill.style.right = `${100 - percent2}%`;
        }
        
        if (priceMinValue) priceMinValue.textContent = `$${min.toLocaleString()}`;
        if (priceMaxValue) priceMaxValue.textContent = `$${max.toLocaleString()}`;
    }
    
    if (priceMin && priceMax) {
        priceMin.addEventListener('input', updatePriceSlider);
        priceMax.addEventListener('input', updatePriceSlider);
        updatePriceSlider();
    }
});
</script>
