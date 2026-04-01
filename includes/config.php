<?php
/**
 * Premium Auto Haus - Configuration File
 * Central configuration for the entire website
 */

// Site Settings
define('SITE_NAME', 'Premium Auto Haus');
define('SITE_URL', 'https://premium-auto-haus.com');
define('SITE_DESCRIPTION', 'Премиальные автомобили с пробегом и новые. Официальный дилер. Гарантия качества.');
define('SITE_PHONE', '+7 (495) 123-45-67');
define('SITE_EMAIL', 'info@premium-auto-haus.com');
define('SITE_ADDRESS', 'Москва, Кутузовский проспект, 45');

// Database settings (placeholder for future integration)
define('DB_HOST', 'localhost');
define('DB_NAME', 'premium_auto');
define('DB_USER', 'root');
define('DB_PASS', '');

// Upload settings
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024); // 10MB

// Available cities
$cities = [
    ['id' => 1, 'name' => 'Москва', 'address' => 'Кутузовский проспект, 45', 'phone' => '+7 (495) 123-45-67'],
    ['id' => 2, 'name' => 'Санкт-Петербург', 'address' => 'Невский проспект, 120', 'phone' => '+7 (812) 987-65-43'],
    ['id' => 3, 'name' => 'Казань', 'address' => 'ул. Баумана, 58', 'phone' => '+7 (843) 555-01-23'],
    ['id' => 4, 'name' => 'Екатеринбург', 'address' => 'проспект Ленина, 95', 'phone' => '+7 (343) 222-33-44']
];

// Car brands with counts
$brands = [
    ['id' => 1, 'name' => 'BMW', 'count' => 45, 'logo' => 'bmw.svg'],
    ['id' => 2, 'name' => 'Mercedes-Benz', 'count' => 38, 'logo' => 'mercedes.svg'],
    ['id' => 3, 'name' => 'Audi', 'count' => 32, 'logo' => 'audi.svg'],
    ['id' => 4, 'name' => 'Porsche', 'count' => 18, 'logo' => 'porsche.svg'],
    ['id' => 5, 'name' => 'Lexus', 'count' => 24, 'logo' => 'lexus.svg'],
    ['id' => 6, 'name' => 'Land Rover', 'count' => 21, 'logo' => 'landrover.svg'],
    ['id' => 7, 'name' => 'Tesla', 'count' => 15, 'logo' => 'tesla.svg'],
    ['id' => 8, 'name' => 'Jaguar', 'count' => 12, 'logo' => 'jaguar.svg']
];

// Sample cars data
$cars = [
    [
        'id' => 1,
        'brand' => 'BMW',
        'model' => 'X5 M Competition',
        'year' => 2023,
        'price' => 12500000,
        'old_price' => 13200000,
        'mileage' => 15000,
        'engine' => '4.4 L',
        'power' => 625,
        'transmission' => 'Автомат',
        'fuel' => 'Бензин',
        'drive' => 'Полный',
        'body' => 'Внедорожник',
        'color' => 'Черный сапфир',
        'vin' => 'WBAFR9C50DD123456',
        'city' => 'Москва',
        'badge' => 'hot',
        'images' => ['bmw-x5-1.jpg', 'bmw-x5-2.jpg', 'bmw-x5-3.jpg'],
        'features' => ['Панорамная крыша', 'Массаж сидений', 'Лазерные фары', 'Проекционный дисплей']
    ],
    [
        'id' => 2,
        'brand' => 'Mercedes-Benz',
        'model' => 'AMG GT 63 S',
        'year' => 2024,
        'price' => 18900000,
        'mileage' => 0,
        'engine' => '4.0 L',
        'power' => 639,
        'transmission' => 'Автомат',
        'fuel' => 'Бензин',
        'drive' => 'Полный',
        'body' => 'Купе',
        'color' => 'Серый матовый',
        'vin' => 'WDD2130451A123456',
        'city' => 'Москва',
        'badge' => 'new',
        'images' => ['mercedes-amg-1.jpg', 'mercedes-amg-2.jpg'],
        'features' => ['Карбон-керамические тормоза', 'Активный аэродинамический пакет', 'Burmester 4D']
    ],
    [
        'id' => 3,
        'brand' => 'Porsche',
        'model' => '911 Turbo S',
        'year' => 2023,
        'price' => 22500000,
        'old_price' => 24000000,
        'mileage' => 8500,
        'engine' => '3.8 L',
        'power' => 650,
        'transmission' => 'PDK',
        'fuel' => 'Бензин',
        'drive' => 'Полный',
        'body' => 'Купе',
        'color' => 'GT Серебро',
        'vin' => 'WP0AD2A99PS123456',
        'city' => 'Санкт-Петербург',
        'badge' => 'sale',
        'images' => ['porsche-911-1.jpg', 'porsche-911-2.jpg'],
        'features' => 'Sport Chrono Package, Ceramic Composite Brake, Bose Surround Sound'
    ],
    [
        'id' => 4,
        'brand' => 'Tesla',
        'model' => 'Model S Plaid',
        'year' => 2024,
        'price' => 14200000,
        'mileage' => 1200,
        'engine' => 'Electric',
        'power' => 1020,
        'transmission' => 'Автомат',
        'fuel' => 'Электро',
        'drive' => 'Полный',
        'body' => 'Седан',
        'color' => 'Белый перламутр',
        'vin' => '5YJ3E1EA1PF123456',
        'city' => 'Москва',
        'badge' => 'electric',
        'images' => ['tesla-model-s-1.jpg', 'tesla-model-s-2.jpg'],
        'features' => ['Autopilot', 'Yoke руль', 'Tri Motor', 'Plaid Mode']
    ],
    [
        'id' => 5,
        'brand' => 'Audi',
        'model' => 'RS Q8',
        'year' => 2023,
        'price' => 16800000,
        'mileage' => 12000,
        'engine' => '4.0 L',
        'power' => 600,
        'transmission' => 'Автомат',
        'fuel' => 'Бензин',
        'drive' => 'Полный',
        'body' => 'Внедорожник',
        'color' => 'Daytona Grey',
        'vin' => 'WAUZZZ4M5ND123456',
        'city' => 'Казань',
        'badge' => null,
        'images' => ['audi-rsq8-1.jpg', 'audi-rsq8-2.jpg'],
        'features' => ['Matrix LED', 'Bang & Olufsen 3D', 'All-wheel steering']
    ],
    [
        'id' => 6,
        'brand' => 'Lexus',
        'model' => 'LX 600 F Sport',
        'year' => 2024,
        'price' => 19500000,
        'mileage' => 0,
        'engine' => '3.5 L',
        'power' => 415,
        'transmission' => 'Автомат',
        'fuel' => 'Бензин',
        'drive' => 'Полный',
        'body' => 'Внедорожник',
        'color' => 'Black Obsidian',
        'vin' => 'JTJAM7BX0P5123456',
        'city' => 'Екатеринбург',
        'badge' => 'new',
        'images' => ['lexus-lx-1.jpg', 'lexus-lx-2.jpg'],
        'features' => ['Mark Levinson Audio', 'Multi-Terrain Select', 'Crawl Control']
    ]
];

// Services
$services = [
    [
        'id' => 1,
        'title' => 'Trade-In',
        'description' => 'Обменяйте свой автомобиль на новый с выгодой до 500 000 ₽',
        'icon' => 'trade-in.svg',
        'link' => '/services.php#trade-in'
    ],
    [
        'id' => 2,
        'title' => 'Выкуп авто',
        'description' => 'Срочный выкуп автомобилей в любом состоянии за 1 час',
        'icon' => 'buyout.svg',
        'link' => '/services.php#buyout'
    ],
    [
        'id' => 3,
        'title' => 'Автокредит',
        'description' => 'Кредит от 4.9% годовых. Решение за 30 минут',
        'icon' => 'credit.svg',
        'link' => '/services.php#credit'
    ],
    [
        'id' => 4,
        'title' => 'Лизинг',
        'description' => 'Выгодные условия лизинга для физических и юридических лиц',
        'icon' => 'leasing.svg',
        'link' => '/services.php#leasing'
    ],
    [
        'id' => 5,
        'title' => 'Страхование',
        'description' => 'КАСКО и ОСАГО от ведущих страховых компаний',
        'icon' => 'insurance.svg',
        'link' => '/services.php#insurance'
    ],
    [
        'id' => 6,
        'title' => 'Сервисное обслуживание',
        'description' => 'Официальный сервис с гарантией на все работы',
        'icon' => 'service.svg',
        'link' => '/services.php#service'
    ]
];

// Reviews
$reviews = [
    [
        'id' => 1,
        'author' => 'Александр Петров',
        'car' => 'BMW X5',
        'city' => 'Москва',
        'rating' => 5,
        'text' => 'Отличный салон! Покупал BMW X5, всё прошло идеально. Менеджер Алексей помог с оформлением кредита за 30 минут. Машина в прекрасном состоянии, как новая. Рекомендую!',
        'date' => '2024-01-15',
        'image' => 'review-1.jpg'
    ],
    [
        'id' => 2,
        'author' => 'Дмитрий Соколов',
        'car' => 'Mercedes-Benz E-Class',
        'city' => 'Санкт-Петербург',
        'rating' => 5,
        'text' => 'Сдавал свой автомобиль по Trade-In и доплачивал за новый Mercedes. Оценка была справедливой, процесс быстрый. Очень доволен сервисом!',
        'date' => '2024-01-10',
        'image' => 'review-2.jpg'
    ],
    [
        'id' => 3,
        'author' => 'Елена Михайлова',
        'car' => 'Audi Q7',
        'city' => 'Казань',
        'rating' => 4,
        'text' => 'Покупала Audi Q7 для семьи. Понравился подход консультантов, всё подробно объяснили, показали. Единственное - немного долго ждала оформление документов.',
        'date' => '2024-01-05',
        'image' => 'review-3.jpg'
    ]
];

// News articles
$news = [
    [
        'id' => 1,
        'title' => 'Новые поступления премиальных внедорожников',
        'category' => 'Новости',
        'excerpt' => 'В нашем салоне появились новые модели BMW X7, Mercedes GLS и Audi Q8 в различных комплектациях.',
        'image' => 'news-1.jpg',
        'date' => '2024-01-20',
        'author' => 'Редакция'
    ],
    [
        'id' => 2,
        'title' => 'Как выбрать электромобиль: полное руководство',
        'category' => 'Советы',
        'excerpt' => 'Рассказываем о преимуществах электромобилей, особенностях эксплуатации и зарядки в России.',
        'image' => 'news-2.jpg',
        'date' => '2024-01-18',
        'author' => 'Эксперт'
    ],
    [
        'id' => 3,
        'title' => 'Специальные условия на кредит в январе',
        'category' => 'Акции',
        'excerpt' => 'Только до конца января сниженные ставки по кредиту от 4.9% годовых на все автомобили в наличии.',
        'image' => 'news-3.jpg',
        'date' => '2024-01-15',
        'author' => 'Отдел продаж'
    ]
];

// Company stats
$stats = [
    ['value' => 1500, 'label' => 'Автомобилей в наличии', 'suffix' => '+'],
    ['value' => 850, 'label' => 'Продано в прошлом месяце', 'suffix' => '+'],
    ['value' => 12, 'label' => 'Лет на рынке', 'suffix' => ''],
    ['value' => 4, 'label' => 'Филиала по России', 'suffix' => '']
];

// Social networks
$socials = [
    ['name' => 'Telegram', 'url' => 'https://t.me/premiumautohaus', 'icon' => 'telegram.svg'],
    ['name' => 'WhatsApp', 'url' => 'https://wa.me/74951234567', 'icon' => 'whatsapp.svg'],
    ['name' => 'VKontakte', 'url' => 'https://vk.com/premiumautohaus', 'icon' => 'vk.svg'],
    ['name' => 'YouTube', 'url' => 'https://youtube.com/@premiumautohaus', 'icon' => 'youtube.svg']
];