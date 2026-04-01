<?php
/**
 * Services Page - Услуги
 * Premium Auto Haus
 */

require_once 'includes/config.php';
require_once 'includes/functions.php';

$pageTitle = 'Услуги автосалона | Premium Auto Haus';
$pageDescription = 'Выкуп, Trade-In, кредитование, лизинг, комиссия и другие услуги для покупки и продажи автомобилей.';
$currentPage = 'services';

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
                        <span class="breadcrumbs__text">Услуги</span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- Services Hero -->
    <section class="page-hero services-hero">
        <div class="container">
            <div class="page-hero__content reveal-text">
                <h1 class="page-hero__title">Наши услуги</h1>
                <p class="page-hero__subtitle">Полный спектр услуг для покупки и продажи премиальных автомобилей</p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-grid-section">
        <div class="container">
            <div class="services-grid">
                <?php foreach ($services as $index => $service): ?>
                <div class="service-card reveal-up" style="transition-delay: <?= $index * 50 ?>ms">
                    <div class="service-card__image">
                        <img src="<?= $service['image'] ?>" alt="<?= $service['name'] ?>" loading="lazy">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title"><?= $service['name'] ?></h3>
                        <p class="service-card__description"><?= $service['description'] ?></p>
                        <ul class="service-card__features">
                            <?php foreach (array_slice($service['features'], 0, 4) as $feature): ?>
                            <li><?= $feature ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="service-card__actions">
                            <button class="btn btn--primary" data-modal="callback">
                                Подробнее
                            </button>
                            <a href="tel:+1234567890" class="btn btn--outline">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 16.92V19.92C22.0011 20.1986 21.9441 20.4742 21.8325 20.7294C21.7209 20.9846 21.5573 21.2137 21.3511 21.4019C21.1449 21.5901 20.9003 21.7332 20.6321 21.8227C20.3639 21.9121 20.0779 21.946 19.79 21.92C16.7428 21.5856 13.8713 20.5341 11.4 18.84C9.08317 17.2519 7.11926 15.288 5.53 12.97C3.83593 10.4987 2.78439 7.62729 2.45 4.58C2.42399 4.2921 2.45788 4.00608 2.54731 3.73789C2.63674 3.46971 2.77981 3.22509 2.96801 3.01891C3.15621 2.81273 3.38529 2.64912 3.64049 2.53749C3.89569 2.42586 4.17131 2.36887 4.45 2.37V5.37C4.45 5.48804 4.49184 5.59634 4.56842 5.68442C4.645 5.7725 4.75147 5.83722 4.87 5.87C7.06 6.49 9.08 7.59 10.85 9.36C12.62 11.13 13.72 13.15 14.34 15.34C14.3743 15.457 14.4399 15.5623 14.5285 15.6415C14.6171 15.7207 14.7247 15.7693 14.84 15.78L17.84 15.78C18.1178 15.7819 18.3906 15.8569 18.6303 15.9973C18.87 16.1378 19.0679 16.3386 19.2031 16.5789C19.3384 16.8191 19.406 17.0901 19.3984 17.3653C19.3909 17.6405 19.3085 17.9093 19.16 18.14L16.92 20.38C16.6953 20.6083 16.3995 20.7594 16.0795 20.8092C15.7595 20.859 15.4331 20.8047 15.15 20.655L12 18.92" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                Позвонить
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-us-section">
        <div class="container">
            <div class="why-us-wrapper reveal-up">
                <h2 class="section-title">Почему выбирают нас</h2>
                <div class="advantages-grid">
                    <div class="advantage-item">
                        <div class="advantage-item__icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h4 class="advantage-item__title">Опыт работы</h4>
                        <p class="advantage-item__text">Более 15 лет на рынке премиальных автомобилей</p>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-item__icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="advantage-item__title">Быстрое оформление</h4>
                        <p class="advantage-item__text">Все документы за 1-2 часа</p>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-item__icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="advantage-item__title">Гарантия качества</h4>
                        <p class="advantage-item__text">Все автомобили проверены по 150 параметрам</p>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-item__icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="advantage-item__title">Команда экспертов</h4>
                        <p class="advantage-item__text">Профессиональные менеджеры и технические специалисты</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title">Частые вопросы</h2>
            <div class="faq-accordion">
                <div class="accordion-item">
                    <button class="accordion__trigger" aria-expanded="false">
                        <span class="accordion__title">Как быстро можно оформить покупку автомобиля?</span>
                        <svg class="accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="accordion__content">
                        <p>Оформление покупки занимает от 1 до 2 часов при наличии всех необходимых документов. Если требуется оформление кредита, процесс может занять до 3-4 часов в зависимости от банка.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion__trigger" aria-expanded="false">
                        <span class="accordion__title">Можно ли сдать свой автомобиль в Trade-In?</span>
                        <svg class="accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="accordion__content">
                        <p>Да, мы принимаем автомобили в Trade-In. Оценка проводится бесплатно и занимает около 30 минут. Вы можете получить выгодное предложение и сразу использовать его как первоначальный взнос за новый автомобиль.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion__trigger" aria-expanded="false">
                        <span class="accordion__title">Предоставляете ли вы гарантию на автомобили?</span>
                        <svg class="accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="accordion__content">
                        <p>Да, все наши автомобили проходят комплексную проверку по 150 параметрам и получают гарантию юридической чистоты. На некоторые автомобили распространяется дополнительная техническая гарантия до 2 лет.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion__trigger" aria-expanded="false">
                        <span class="accordion__title">Какие условия кредитования вы предлагаете?</span>
                        <svg class="accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="accordion__content">
                        <p>Мы сотрудничаем с 15 ведущими банками. Ставки начинаются от 9.9% годовых, срок кредитования до 7 лет, первоначальный взнос от 0%. Решение по кредиту принимается в течение 15-30 минут.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content reveal-up">
                <h2 class="cta-title">Нужна консультация?</h2>
                <p class="cta-text">Наши эксперты помогут подобрать лучший вариант и ответят на все вопросы</p>
                <button class="btn btn--primary btn--lg" data-modal="callback">
                    Заказать звонок
                </button>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/modals.php'; ?>
