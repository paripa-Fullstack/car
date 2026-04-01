<?php
/**
 * Premium Auto Haus - Helper Functions
 * Common utility functions for templates
 */

/**
 * Include a template part
 */
function include_part($name, $args = []) {
    extract($args);
    include get_template_path() . "/includes/{$name}.php";
}

/**
 * Get template path
 */
function get_template_path() {
    return dirname(__DIR__);
}

/**
 * Get asset URL
 */
function asset_url($path) {
    return SITE_URL . '/assets/' . ltrim($path, '/');
}

/**
 * Get page URL
 */
function page_url($page = '') {
    return SITE_URL . ($page ? '/' . ltrim($page, '/') : '');
}

/**
 * Escape HTML output
 */
function esc_html($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Escape URL output
 */
function esc_url($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
}

/**
 * Generate breadcrumb trail
 */
function get_breadcrumbs($current_title = '') {
    $breadcrumbs = [['url' => '/', 'title' => 'Главная']];
    
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    
    $cumulative_path = '';
    foreach ($parts as $i => $part) {
        if (empty($part)) continue;
        
        $cumulative_path .= '/' . $part;
        
        // Don't add the last part if we have a custom title
        if ($i < count($parts) - 1 || empty($current_title)) {
            $title = ucfirst(str_replace('-', ' ', $part));
            $breadcrumbs[] = [
                'url' => $cumulative_path,
                'title' => $title
            ];
        }
    }
    
    if ($current_title) {
        $breadcrumbs[] = [
            'url' => null,
            'title' => $current_title
        ];
    }
    
    return $breadcrumbs;
}

/**
 * Check if current page
 */
function is_current_page($page_url) {
    $current_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $check_uri = trim($page_url, '/');
    
    return $current_uri === $check_uri || 
           ($check_uri === '' && $current_uri === '');
}

/**
 * Get active class if current page
 */
function active_class($page_url, $class = 'active') {
    return is_current_page($page_url) ? $class : '';
}

/**
 * Truncate text
 */
function truncate_text($text, $length = 100, $suffix = '...') {
    if (mb_strlen($text) <= $length) {
        return $text;
    }
    return mb_substr($text, 0, $length) . $suffix;
}

/**
 * Get random items from array
 */
function array_random_items($array, $count) {
    shuffle($array);
    return array_slice($array, 0, $count);
}

/**
 * Calculate discount percentage
 */
function calculate_discount($old_price, $new_price) {
    if (!$old_price || !$new_price || $old_price <= $new_price) {
        return 0;
    }
    return round((($old_price - $new_price) / $old_price) * 100);
}

/**
 * Format phone number for display
 */
function format_phone($phone) {
    return preg_replace('/[^\d\+\-\(\)\s]/', '', $phone);
}

/**
 * Get file modification time for cache busting
 */
function file_version($file_path) {
    $full_path = get_template_path() . $file_path;
    if (file_exists($full_path)) {
        return filemtime($full_path);
    }
    return time();
}

/**
 * Render star rating
 */
function render_star_rating($rating, $max = 5) {
    $html = '<div class="star-rating" aria-label="' . $rating . ' из ' . $max . '">';
    for ($i = 1; $i <= $max; $i++) {
        $class = $i <= $rating ? 'star-filled' : 'star-empty';
        $html .= '<span class="star ' . $class . '">★</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Get age from date
 */
function get_age_from_date($date) {
    $birth = new DateTime($date);
    $today = new DateTime('today');
    return $today->diff($birth)->y;
}

/**
 * Time ago format
 */
function time_ago($datetime) {
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp;
    
    if ($diff < 60) {
        return 'Только что';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return $mins . ' мин. назад';
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

/**
 * Generate meta tags
 */
function generate_meta_tags($title, $description, $image = '', $url = '') {
    $meta = [];
    
    // Basic meta
    $meta[] = '<meta charset="UTF-8">';
    $meta[] = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $meta[] = '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    
    // SEO meta
    $meta[] = '<title>' . esc_html($title) . ' | ' . SITE_NAME . '</title>';
    $meta[] = '<meta name="description" content="' . esc_html($description) . '">';
    $meta[] = '<meta name="keywords" content="автомобили, премиум авто, купить авто, автосалон">';
    
    // Open Graph
    $meta[] = '<meta property="og:type" content="website">';
    $meta[] = '<meta property="og:title" content="' . esc_html($title) . ' | ' . SITE_NAME . '">';
    $meta[] = '<meta property="og:description" content="' . esc_html($description) . '">';
    $meta[] = '<meta property="og:url" content="' . esc_url($url ?: SITE_URL) . '">';
    $meta[] = '<meta property="og:site_name" content="' . SITE_NAME . '">';
    
    if ($image) {
        $meta[] = '<meta property="og:image" content="' . esc_url($image) . '">';
        $meta[] = '<meta property="og:image:width" content="1200">';
        $meta[] = '<meta property="og:image:height" content="630">';
    }
    
    // Twitter Card
    $meta[] = '<meta name="twitter:card" content="summary_large_image">';
    $meta[] = '<meta name="twitter:title" content="' . esc_html($title) . ' | ' . SITE_NAME . '">';
    $meta[] = '<meta name="twitter:description" content="' . esc_html($description) . '">';
    
    if ($image) {
        $meta[] = '<meta name="twitter:image" content="' . esc_url($image) . '">';
    }
    
    return implode("\n", $meta);
}

/**
 * Add canonical URL
 */
function get_canonical_url() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    return $protocol . '://' . $host . $uri;
}

/**
 * Generate schema.org markup for organization
 */
function get_organization_schema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'AutoDealer',
        'name' => SITE_NAME,
        'description' => SITE_TAGLINE,
        'url' => SITE_URL,
        'logo' => SITE_URL . '/assets/img/logo/logo.svg',
        'telephone' => CONTACT_PHONE,
        'email' => CONTACT_EMAIL,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Пресненская наб., 12',
            'addressLocality' => 'Москва',
            'addressCountry' => 'RU'
        ],
        'openingHours' => 'Mo-Su 09:00-21:00',
        'priceRange' => '$$$'
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generate schema.org markup for car
 */
function get_car_schema($car) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Car',
        'name' => $car['brand'] . ' ' . $car['model'],
        'model' => $car['model'],
        'vehicleConfiguration' => $car['year'] . ' ' . $car['engine'] . ' ' . $car['transmission'],
        'mileageFromOdometer' => [
            '@type' => 'QuantitativeValue',
            'value' => $car['mileage'],
            'unitCode' => 'KMT'
        ],
        'fuelType' => $car['fuel'],
        'vehicleTransmission' => $car['transmission'],
        'driveWheelConfiguration' => $car['drive'],
        'color' => $car['color'],
        'offers' => [
            '@type' => 'Offer',
            'price' => $car['price'],
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'seller' => [
                '@type' => 'AutoDealer',
                'name' => SITE_NAME
            ]
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Sanitize input
 */
function sanitize_input($input, $type = 'string') {
    if (is_array($input)) {
        return array_map(function($value) use ($type) {
            return sanitize_input($value, $type);
        }, $input);
    }
    
    switch ($type) {
        case 'int':
            return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        case 'float':
            return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        case 'email':
            return filter_var($input, FILTER_SANITIZE_EMAIL);
        case 'url':
            return filter_var($input, FILTER_SANITIZE_URL);
        default:
            return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}

/**
 * Validate email
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone (Russian format)
 */
function validate_phone($phone) {
    $clean = preg_replace('/[^\d]/', '', $phone);
    return strlen($clean) >= 10 && strlen($clean) <= 12;
}

/**
 * CSRF token generation
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Redirect with message
 */
function redirect_with_message($url, $message, $type = 'success') {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
    header('Location: ' . $url);
    exit;
}

/**
 * Get and clear flash message
 */
function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'info';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
        return ['message' => $message, 'type' => $type];
    }
    return null;
}

/**
 * Pagination generator
 */
function generate_pagination($current_page, $total_pages, $base_url = '') {
    if ($total_pages <= 1) return '';
    
    $html = '<nav class="pagination" aria-label="Навигация по страницам">';
    $html .= '<ul class="pagination-list">';
    
    // Previous
    if ($current_page > 1) {
        $html .= '<li><a href="' . $base_url . '?page=' . ($current_page - 1) . '" class="pagination-prev">←</a></li>';
    }
    
    // Pages
    $start = max(1, $current_page - 2);
    $end = min($total_pages, $current_page + 2);
    
    for ($i = $start; $i <= $end; $i++) {
        $active = $i === $current_page ? ' class="active"' : '';
        $html .= '<li' . $active . '><a href="' . $base_url . '?page=' . $i . '">' . $i . '</a></li>';
    }
    
    // Next
    if ($current_page < $total_pages) {
        $html .= '<li><a href="' . $base_url . '?page=' . ($current_page + 1) . '" class="pagination-next">→</a></li>';
    }
    
    $html .= '</ul>';
    $html .= '</nav>';
    
    return $html;
}

?>
