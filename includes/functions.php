<?php
/**
 * Premium Auto Haus - Helper Functions
 * Common utility functions for the website
 */

/**
 * Format price with ruble symbol and spaces
 */
function formatPrice($price) {
    return number_format($price, 0, '.', ' ') . ' ₽';
}

/**
 * Format date in Russian locale
 */
function formatDate($date, $format = 'd.m.Y') {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

/**
 * Get badge class by type
 */
function getBadgeClass($badge) {
    $classes = [
        'new' => 'badge-new',
        'hot' => 'badge-hot',
        'sale' => 'badge-sale',
        'electric' => 'badge-electric'
    ];
    return $classes[$badge] ?? '';
}

/**
 * Get badge text by type
 */
function getBadgeText($badge) {
    $texts = [
        'new' => 'Новый',
        'hot' => 'Горячее',
        'sale' => 'Акция',
        'electric' => 'Электро'
    ];
    return $texts[$badge] ?? '';
}

/**
 * Generate SEO meta tags
 */
function generateMetaTags($title = '', $description = '', $image = '') {
    $defaultTitle = SITE_NAME;
    $defaultDescription = SITE_DESCRIPTION;
    $defaultImage = '/assets/img/og-default.jpg';
    
    $pageTitle = !empty($title) ? $title . ' | ' . $defaultTitle : $defaultTitle;
    $pageDescription = !empty($description) ? $description : $defaultDescription;
    $pageImage = !empty($image) ? $image : $defaultImage;
    
    return '
    <title>' . htmlspecialchars($pageTitle) . '</title>
    <meta name="description" content="' . htmlspecialchars($pageDescription) . '">
    <meta property="og:title" content="' . htmlspecialchars($pageTitle) . '">
    <meta property="og:description" content="' . htmlspecialchars($pageDescription) . '">
    <meta property="og:image" content="' . htmlspecialchars($pageImage) . '">
    <meta property="og:type" content="website">
    <meta property="og:url" content="' . SITE_URL . $_SERVER['REQUEST_URI'] . '">
    <meta name="twitter:card" content="summary_large_image">
    ';
}

/**
 * Generate breadcrumb navigation
 */
function generateBreadcrumbs($items) {
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ul class="breadcrumbs__list">';
    echo '<li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>';
    foreach ($items as $item) {
        if (isset($item['url']) && isset($item['label'])) {
            if (isset($item['active']) && $item['active']) {
                echo '<li class="breadcrumbs__item breadcrumbs__item--active">' . htmlspecialchars($item['label']) . '</li>';
            } else {
                echo '<li class="breadcrumbs__item"><a href="' . htmlspecialchars($item['url']) . '" class="breadcrumbs__link">' . htmlspecialchars($item['label']) . '</a></li>';
            }
        }
    }
    echo '</ul>';
    echo '</nav>';
}

/**
 * Generate star rating HTML
 */
function generateStarRating($rating) {
    $html = '<div class="star-rating" aria-label="Рейтинг: ' . $rating . ' из 5">';
    for ($i = 1; $i <= 5; $i++) {
        $class = $i <= $rating ? 'star-rating__star--filled' : 'star-rating__star--empty';
        $html .= '<span class="star-rating__star ' . $class . '">★</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Generate schema.org JSON-LD for car
 */
function generateCarSchema($car) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Car',
        'name' => $car['brand'] . ' ' . $car['model'],
        'description' => $car['year'] . ' ' . $car['brand'] . ' ' . $car['model'],
        'brand' => [
            '@type' => 'Brand',
            'name' => $car['brand']
        ],
        'model' => $car['model'],
        'vehicleConfiguration' => $car['body'] . ', ' . $car['fuel'] . ', ' . $car['transmission'],
        'vehicleEngine' => [
            '@type' => 'EngineSpecification',
            'engineType' => $car['fuel'],
            'engineDisplacement' => [
                '@type' => 'QuantitativeValue',
                'value' => str_replace(' L', '', $car['engine']),
                'unitCode' => 'LTR'
            ]
        ],
        'mileageFromOdometer' => [
            '@type' => 'QuantitativeValue',
            'value' => $car['mileage'],
            'unitCode' => 'KMT'
        ],
        'productionDate' => $car['year'],
        'offers' => [
            '@type' => 'Offer',
            'price' => $car['price'],
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'seller' => [
                '@type' => 'Organization',
                'name' => SITE_NAME
            ]
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE) . '</script>';
}

/**
 * Sanitize input data
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Validate email
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Validate phone number (Russian format)
 */
function isValidPhone($phone) {
    $cleaned = preg_replace('/[^0-9+]/', '', $phone);
    return strlen($cleaned) >= 11 && preg_match('/^\+?[0-9]{11,15}$/', $cleaned);
}

/**
 * Get current page URL
 */
function getCurrentUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Check if current page is active
 */
function isActivePage($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    return $currentPage === $pageName ? 'active' : '';
}

/**
 * Calculate discount percentage
 */
function calculateDiscount($oldPrice, $newPrice) {
    if ($oldPrice > $newPrice) {
        $discount = (($oldPrice - $newPrice) / $oldPrice) * 100;
        return round($discount);
    }
    return 0;
}

/**
 * Time ago function for Russian language
 */
function timeAgo($datetime) {
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp;
    
    if ($diff < 60) {
        return 'Только что';
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return $minutes . ' мин. назад';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' ч. назад';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' дн. назад';
    } else {
        return formatDate($datetime);
    }
}