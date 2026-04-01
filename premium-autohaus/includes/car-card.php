<?php
/**
 * Premium Auto Haus - Car Card Component
 * Reusable car card template for listings and sliders
 */

// If $car is not set, skip rendering
if (!isset($car)) return;

$discount = calculate_discount($car['old_price'] ?? null, $car['price']);
$badge_class = getBadgeClass($car['badge'] ?? null);
$badge_text = getBadgeText($car['badge'] ?? null);
?>

<article class="car-card <?php echo $badge_class; ?>" data-car-id="<?php echo $car['id']; ?>">
    <a href="/car.php?id=<?php echo $car['id']; ?>" class="car-card-link">
        <!-- Card Image -->
        <div class="car-card-image">
            <div class="image-wrapper">
                <div class="image-placeholder">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"></path>
                        <circle cx="6.5" cy="16.5" r="2.5"></circle>
                        <circle cx="16.5" cy="16.5" r="2.5"></circle>
                    </svg>
                    <span><?php echo esc_html($car['brand']); ?> <?php echo esc_html($car['model']); ?></span>
                </div>
                
                <!-- Badge -->
                <?php if ($badge_text): ?>
                    <span class="car-badge <?php echo $badge_class; ?>"><?php echo esc_html($badge_text); ?></span>
                <?php endif; ?>
                
                <!-- Discount Badge -->
                <?php if ($discount > 0): ?>
                    <span class="discount-badge">-<?php echo $discount; ?>%</span>
                <?php endif; ?>
                
                <!-- Favorite Button -->
                <button type="button" class="favorite-btn" aria-label="В избранное" data-car-id="<?php echo $car['id']; ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>
                
                <!-- Video Indicator -->
                <?php if (!empty($car['video_url'])): ?>
                    <span class="video-indicator" title="Есть видео">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                        </svg>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Card Content -->
        <div class="car-card-content">
            <!-- Price Block -->
            <div class="car-card-price">
                <span class="price-current"><?php echo formatPrice($car['price']); ?></span>
                <?php if ($car['old_price']): ?>
                    <span class="price-old"><?php echo formatPrice($car['old_price']); ?></span>
                <?php endif; ?>
            </div>
            
            <!-- Title -->
            <h3 class="car-card-title">
                <?php echo esc_html($car['brand']); ?> <?php echo esc_html($car['model']); ?>
            </h3>
            
            <!-- Meta Info -->
            <div class="car-card-meta">
                <span class="meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <?php echo $car['year']; ?>
                </span>
                <span class="meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20V10"></path>
                        <path d="M18 20V4"></path>
                        <path d="M6 20v-4"></path>
                    </svg>
                    <?php echo number_format($car['mileage'], 0, '.', ' '); ?> км
                </span>
                <span class="meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"></path>
                        <circle cx="6.5" cy="16.5" r="2.5"></circle>
                        <circle cx="16.5" cy="16.5" r="2.5"></circle>
                    </svg>
                    <?php echo esc_html($car['fuel']); ?>
                </span>
                <span class="meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                    <?php echo esc_html($car['transmission']); ?>
                </span>
            </div>
            
            <!-- Location -->
            <div class="car-card-location">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span><?php echo esc_html($car['city']); ?></span>
            </div>
            
            <!-- Action Button -->
            <div class="car-card-action">
                <span class="btn btn-sm btn-primary">
                    Подробнее
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </span>
            </div>
        </div>
    </a>
</article>
