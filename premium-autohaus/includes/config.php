<?php
/**
 * Premium Auto Haus - Configuration File
 * Central configuration for the entire project
 */

// Site Settings
define('SITE_NAME', 'Premium Auto Haus');
define('SITE_TAGLINE', 'Искусство движения. Роскошь выбора.');
define('SITE_URL', 'https://premium-autohaus.com');
define('SITE_VERSION', '1.0.0');

// Contact Information
define('CONTACT_PHONE', '+7 (495) 999-88-77');
define('CONTACT_EMAIL', 'info@premium-autohaus.com');
define('CONTACT_ADDRESS', 'Москва, Пресненская наб., 12');

// Social Media
define('SOCIAL_TELEGRAM', 'https://t.me/premiumautohaus');
define('SOCIAL_WHATSAPP', 'https://wa.me/74959998877');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/premiumautohaus');
define('SOCIAL_YOUTUBE', 'https://youtube.com/@premiumautohaus');

// Business Hours
define('BUSINESS_HOURS', 'Ежедневно с 9:00 до 21:00');

// Features
define('FEATURE_CARS_COUNT', 847);
define('FEATURE_SOLD_MONTH', 156);
define('FEATURE_SOLD_YESTERDAY', 12);
define('FEATURE_NEW_ARRIVALS', 34);
define('FEATURE_BRANCHES', 8);
define('FEATURE_YEARS_EXPERIENCE', 12);

// Cities/Branches
$cities = [
    'moscow' => [
        'name' => 'Москва',
        'address' => 'Пресненская наб., 12',
        'phone' => '+7 (495) 999-88-77',
        'email' => 'moscow@premium-autohaus.com'
    ],
    'spb' => [
        'name' => 'Санкт-Петербург',
        'address' => 'Невский пр., 85',
        'phone' => '+7 (812) 777-66-55',
        'email' => 'spb@premium-autohaus.com'
    ],
    'kazan' => [
        'name' => 'Казань',
        'address' => 'ул. Баумана, 58',
        'phone' => '+7 (843) 555-44-33',
        'email' => 'kazan@premium-autohaus.com'
    ],
    'ekb' => [
        'name' => 'Екатеринбург',
        'address' => 'пр. Ленина, 92',
        'phone' => '+7 (343) 333-22-11',
        'email' => 'ekb@premium-autohaus.com'
    ]
];

// Car Brands
$brands = [
    ['name' => 'Mercedes-Benz', 'count' => 127],
    ['name' => 'BMW', 'count' => 98],
    ['name' => 'Audi', 'count' => 85],
    ['name' => 'Porsche', 'count' => 42],
    ['name' => 'Lexus', 'count' => 67],
    ['name' => 'Land Rover', 'count' => 54],
    ['name' => 'Bentley', 'count' => 18],
    ['name' => 'Maserati', 'count' => 23]
];

// Services
$services = [
    [
        'title' => 'Выкуп автомобилей',
        'description' => 'Оценим и выкупим ваш автомобиль за 1 час',
        'icon' => 'car-buy',
        'link' => '/services/buyout'
    ],
    [
        'title' => 'Trade-In',
        'description' => 'Обмен вашего авто на новый с выгодой до 500 000 ₽',
        'icon' => 'exchange',
        'link' => '/services/trade-in'
    ],
    [
        'title' => 'Автокредит',
        'description' => 'Ставки от 4.9% одобрение за 15 минут',
        'icon' => 'credit-card',
        'link' => '/services/credit'
    ],
    [
        'title' => 'Лизинг',
        'description' => 'Выгодные условия для юридических лиц',
        'icon' => 'document',
        'link' => '/services/leasing'
    ],
    [
        'title' => 'Комиссионная продажа',
        'description' => 'Продадим ваш автомобиль по максимальной цене',
        'icon' => 'handshake',
        'link' => '/services/commission'
    ],
    [
        'title' => 'Диагностика',
        'description' => 'Полная проверка автомобиля перед покупкой',
        'icon' => 'clipboard-check',
        'link' => '/services/diagnostics'
    ]
];

// Advantages
$advantages = [
    [
        'title' => 'Проверенные автомобили',
        'description' => 'Каждый автомобиль проходит проверку по 150+ параметрам',
        'icon' => 'shield-check'
    ],
    [
        'title' => 'Гарантия качества',
        'description' => 'Предоставляем гарантию до 2 лет на все автомобили',
        'icon' => 'award'
    ],
    [
        'title' => 'Оформление в день обращения',
        'description' => 'Полное оформление сделки за 2-3 часа',
        'icon' => 'clock-fast'
    ],
    [
        'title' => 'Помощь в кредите',
        'description' => 'Работаем с 15 банками-партнерами',
        'icon' => 'bank'
    ]
];

// Sample Cars Data
$featured_cars = [
    [
        'id' => 1,
        'brand' => 'Mercedes-Benz',
        'model' => 'S-Class S 500 4MATIC',
        'year' => 2023,
        'price' => 18500000,
        'old_price' => 19900000,
        'mileage' => 12500,
        'engine' => '4.0 L',
        'fuel' => 'Бензин',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Черный металлик',
        'city' => 'Москва',
        'image' => '/assets/img/cars/mercedes-s-class.jpg',
        'badge' => 'hot',
        'video_url' => 'https://youtube.com/watch?v=example1'
    ],
    [
        'id' => 2,
        'brand' => 'BMW',
        'model' => 'X7 M50i',
        'year' => 2024,
        'price' => 14200000,
        'old_price' => null,
        'mileage' => 5800,
        'engine' => '4.4 L',
        'fuel' => 'Бензин',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Синий металлик',
        'city' => 'Москва',
        'image' => '/assets/img/cars/bmw-x7.jpg',
        'badge' => 'new',
        'video_url' => null
    ],
    [
        'id' => 3,
        'brand' => 'Porsche',
        'model' => 'Cayenne Turbo GT',
        'year' => 2023,
        'price' => 22900000,
        'old_price' => 24500000,
        'mileage' => 8200,
        'engine' => '4.0 L',
        'fuel' => 'Бензин',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Белый',
        'city' => 'Санкт-Петербург',
        'image' => '/assets/img/cars/porsche-cayenne.jpg',
        'badge' => 'hot',
        'video_url' => 'https://youtube.com/watch?v=example2'
    ],
    [
        'id' => 4,
        'brand' => 'Audi',
        'model' => 'e-tron GT quattro',
        'year' => 2024,
        'price' => 11800000,
        'old_price' => null,
        'mileage' => 2100,
        'engine' => 'Electric',
        'fuel' => 'Электро',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Серый матовый',
        'city' => 'Москва',
        'image' => '/assets/img/cars/audi-etron.jpg',
        'badge' => 'electric',
        'video_url' => null
    ],
    [
        'id' => 5,
        'brand' => 'Lexus',
        'model' => 'LX 600 Luxury',
        'year' => 2023,
        'price' => 16700000,
        'old_price' => 17900000,
        'mileage' => 15300,
        'engine' => '3.5 L',
        'fuel' => 'Бензин',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Черный перламутр',
        'city' => 'Казань',
        'image' => '/assets/img/cars/lexus-lx600.jpg',
        'badge' => null,
        'video_url' => 'https://youtube.com/watch?v=example3'
    ],
    [
        'id' => 6,
        'brand' => 'Land Rover',
        'model' => 'Range Rover Autobiography',
        'year' => 2024,
        'price' => 25400000,
        'old_price' => null,
        'mileage' => 3500,
        'engine' => '4.4 L',
        'fuel' => 'Дизель',
        'transmission' => 'Автомат',
        'drive' => 'Полный',
        'color' => 'Зеленый металлик',
        'city' => 'Москва',
        'image' => '/assets/img/cars/range-rover.jpg',
        'badge' => 'new',
        'video_url' => null
    ]
];

// News Articles
$news_articles = [
    [
        'id' => 1,
        'title' => 'Новые поступления премиальных внедорожников',
        'category' => 'Новости',
        'date' => '2025-02-10',
        'excerpt' => 'В нашем автосалоне появились новые модели Range Rover и BMW X7 в эксклюзивных комплектациях.',
        'image' => '/assets/img/news/news-1.jpg',
        'link' => '/news/new-suv-arrivals'
    ],
    [
        'id' => 2,
        'title' => 'Как выбрать подержанный автомобиль премиум-класса',
        'category' >Советы',
        'date' => '2025-02-08',
        'excerpt' => 'Экспертные рекомендации по выбору автомобиля с пробегом: на что обратить внимание в первую очередь.',
        'image' => '/assets/img/news/news-2.jpg',
        'link' => '/news/how-to-choose-used-premium'
    ],
    [
        'id' => 3,
        'title' => 'Электромобили: будущее уже наступило',
        'category' => 'Обзоры',
        'date' => '2025-02-05',
        'excerpt' => 'Сравнительный тест популярных электромобилей: Audi e-tron, Porsche Taycan и Tesla Model S.',
        'image' => '/assets/img/news/news-3.jpg',
        'link' => '/news/electric-cars-future'
    ]
];

// Testimonials
$testimonials = [
    [
        'id' => 1,
        'name' => 'Александр Петров',
        'city' => 'Москва',
        'car' => 'Mercedes-Benz S-Class',
        'rating' => 5,
        'text' => 'Отличный сервис! Помогли подобрать идеальный автомобиль, оформили все документы за один день. Особая благодарность менеджеру Алексею за профессионализм.',
        'image' => '/assets/img/reviews/client-1.jpg',
        'date' => '2025-02-01'
    ],
    [
        'id' => 2,
        'name' => 'Дмитрий Соколов',
        'city' => 'Санкт-Петербург',
        'car' => 'BMW X7',
        'rating' => 5,
        'text' => 'Покупал здесь уже второй автомобиль. Нравится прозрачность сделки и честность сотрудников. Цены адекватные, выбор огромный.',
        'image' => '/assets/img/reviews/client-2.jpg',
        'date' => '2025-01-28'
    ],
    [
        'id' => 3,
        'name' => 'Елена Воронова',
        'city' => 'Казань',
        'car' => 'Lexus RX',
        'rating' => 5,
        'text' => 'Очень довольна покупкой! Автомобиль в идеальном состоянии, как новый. Спасибо за внимательное отношение и помощь в оформлении кредита.',
        'image' => '/assets/img/reviews/client-3.jpg',
        'date' => '2025-01-25'
    ]
];

// Helper Functions
function formatPrice($price) {
    return number_format($price, 0, '.', ' ') . ' ₽';
}

function formatDate($date) {
    $months = [
        '01' => 'января', '02' => 'февраля', '03' => 'марта',
        '04' => 'апреля', '05' => 'мая', '06' => 'июня',
        '07' => 'июля', '08' => 'августа', '09' => 'сентября',
        '10' => 'октября', '11' => 'ноября', '12' => 'декабря'
    ];
    
    $d = new DateTime($date);
    return $d->format('d') . ' ' . $months[$d->format('m')] . ' ' . $d->format('Y');
}

function getBadgeClass($badge) {
    switch ($badge) {
        case 'hot': return 'badge-hot';
        case 'new': return 'badge-new';
        case 'electric': return 'badge-electric';
        default: return '';
    }
}

function getBadgeText($badge) {
    switch ($badge) {
        case 'hot': return 'Горячее предложение';
        case 'new': return 'Новое поступление';
        case 'electric': return 'Электро';
        default: return '';
    }
}

?>
