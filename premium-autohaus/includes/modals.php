<?php
/**
 * Premium Auto Haus - Modals Component
 * All modal dialogs for the site
 */
?>

<!-- Callback Modal -->
<div class="modal" id="callbackModal" aria-hidden="true">
    <div class="modal-overlay" data-modal-close></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="modal-close" data-modal-close aria-label="Закрыть">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="modal-header">
                <h3 class="modal-title">Заказать звонок</h3>
                <p class="modal-subtitle">Оставьте свой номер, и мы перезвоним вам в течение 5 минут</p>
            </div>
            
            <form class="modal-form" id="callbackForm" data-ajax>
                <div class="form-group">
                    <label for="callbackName" class="form-label">Ваше имя</label>
                    <input type="text" 
                           id="callbackName" 
                           name="name" 
                           class="form-input" 
                           placeholder="Иван Иванов"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="callbackPhone" class="form-label">Телефон</label>
                    <input type="tel" 
                           id="callbackPhone" 
                           name="phone" 
                           class="form-input phone-mask" 
                           placeholder="+7 (___) ___-__-__"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="callbackTime" class="form-label">Удобное время для звонка</label>
                    <select id="callbackTime" name="time" class="form-select">
                        <option value="">Не важно</option>
                        <option value="morning">9:00 - 12:00</option>
                        <option value="afternoon">12:00 - 17:00</option>
                        <option value="evening">17:00 - 21:00</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full btn-lg ripple-btn">
                    <span class="btn-text">Жду звонка</span>
                    <span class="btn-loading">
                        <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" opacity="0.25"></circle>
                            <path d="M12 2a10 10 0 0 1 10 10" opacity="0.75"></path>
                        </svg>
                    </span>
                </button>
                
                <label class="form-checkbox">
                    <input type="checkbox" name="agree" required checked>
                    <span class="checkbox-mark"></span>
                    <span class="checkbox-text">
                        Согласен на обработку <a href="/page.php?slug=privacy-policy" target="_blank">персональных данных</a>
                    </span>
                </label>
            </form>
        </div>
    </div>
</div>

<!-- Test Drive Modal -->
<div class="modal" id="testDriveModal" aria-hidden="true">
    <div class="modal-overlay" data-modal-close></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button class="modal-close" data-modal-close aria-label="Закрыть">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="modal-header">
                <h3 class="modal-title">Запись на тест-драйв</h3>
                <p class="modal-subtitle">Выберите автомобиль и удобное время для поездки</p>
            </div>
            
            <form class="modal-form" id="testDriveForm" data-ajax>
                <div class="form-row">
                    <div class="form-group">
                        <label for="testDriveCar" class="form-label">Автомобиль</label>
                        <select id="testDriveCar" name="car_id" class="form-select" required>
                            <option value="">Выберите автомобиль</option>
                            <?php foreach ($featured_cars as $car): ?>
                                <option value="<?php echo $car['id']; ?>">
                                    <?php echo esc_html($car['brand'] . ' ' . $car['model']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="testDriveCity" class="form-label">Город</label>
                        <select id="testDriveCity" name="city" class="form-select" required>
                            <option value="">Выберите город</option>
                            <?php foreach ($cities as $key => $city): ?>
                                <option value="<?php echo $key; ?>"><?php echo esc_html($city['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="testDriveDate" class="form-label">Дата</label>
                        <input type="date" 
                               id="testDriveDate" 
                               name="date" 
                               class="form-input"
                               min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="testDriveTime" class="form-label">Время</label>
                        <select id="testDriveTime" name="time" class="form-select" required>
                            <option value="">Выберите время</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="testDriveName" class="form-label">Ваше имя</label>
                        <input type="text" 
                               id="testDriveName" 
                               name="name" 
                               class="form-input" 
                               placeholder="Иван Иванов"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="testDrivePhone" class="form-label">Телефон</label>
                        <input type="tel" 
                               id="testDrivePhone" 
                               name="phone" 
                               class="form-input phone-mask" 
                               placeholder="+7 (___) ___-__-__"
                               required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="testDriveComment" class="form-label">Комментарий (необязательно)</label>
                    <textarea id="testDriveComment" 
                              name="comment" 
                              class="form-textarea" 
                              rows="3"
                              placeholder="Пожелания или вопросы"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full btn-lg ripple-btn">
                    <span class="btn-text">Записаться на тест-драйв</span>
                    <span class="btn-loading">
                        <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" opacity="0.25"></circle>
                            <path d="M12 2a10 10 0 0 1 10 10" opacity="0.75"></path>
                        </svg>
                    </span>
                </button>
                
                <label class="form-checkbox">
                    <input type="checkbox" name="agree" required checked>
                    <span class="checkbox-mark"></span>
                    <span class="checkbox-text">
                        Согласен на обработку персональных данных
                    </span>
                </label>
            </form>
        </div>
    </div>
</div>

<!-- Trade-In Modal -->
<div class="modal" id="tradeInModal" aria-hidden="true">
    <div class="modal-overlay" data-modal-close></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button class="modal-close" data-modal-close aria-label="Закрыть">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="modal-header">
                <h3 class="modal-title">Оценка Trade-In</h3>
                <p class="modal-subtitle">Узнайте стоимость вашего автомобиля за 15 минут</p>
            </div>
            
            <form class="modal-form" id="tradeInForm" data-ajax>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tradeInBrand" class="form-label">Марка</label>
                        <select id="tradeInBrand" name="brand" class="form-select" required>
                            <option value="">Выберите марку</option>
                            <?php foreach ($brands as $brand): ?>
                                <option value="<?php echo strtolower($brand['name']); ?>">
                                    <?php echo esc_html($brand['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tradeInModel" class="form-label">Модель</label>
                        <input type="text" 
                               id="tradeInModel" 
                               name="model" 
                               class="form-input" 
                               placeholder="Например: S-Class"
                               required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="tradeInYear" class="form-label">Год выпуска</label>
                        <select id="tradeInYear" name="year" class="form-select" required>
                            <option value="">Выберите год</option>
                            <?php for ($y = date('Y'); $y >= 1990; $y--): ?>
                                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tradeInMileage" class="form-label">Пробег, км</label>
                        <input type="text" 
                               id="tradeInMileage" 
                               name="mileage" 
                               class="form-input" 
                               placeholder="100 000"
                               required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="tradeInName" class="form-label">Ваше имя</label>
                        <input type="text" 
                               id="tradeInName" 
                               name="name" 
                               class="form-input" 
                               placeholder="Иван Иванов"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tradeInPhone" class="form-label">Телефон</label>
                        <input type="tel" 
                               id="tradeInPhone" 
                               name="phone" 
                               class="form-input phone-mask" 
                               placeholder="+7 (___) ___-__-__"
                               required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tradeInVin" class="form-label">VIN (необязательно)</label>
                    <input type="text" 
                           id="tradeInVin" 
                           name="vin" 
                           class="form-input" 
                           placeholder="17 символов"
                           maxlength="17"
                           pattern="[A-HJ-NPR-Z0-9]{17}">
                </div>
                
                <button type="submit" class="btn btn-primary btn-full btn-lg ripple-btn">
                    <span class="btn-text">Оценить автомобиль</span>
                    <span class="btn-loading">
                        <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" opacity="0.25"></circle>
                            <path d="M12 2a10 10 0 0 1 10 10" opacity="0.75"></path>
                        </svg>
                    </span>
                </button>
                
                <label class="form-checkbox">
                    <input type="checkbox" name="agree" required checked>
                    <span class="checkbox-mark"></span>
                    <span class="checkbox-text">
                        Согласен на обработку персональных данных
                    </span>
                </label>
            </form>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal modal-success" id="successModal" aria-hidden="true">
    <div class="modal-overlay" data-modal-close></div>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-success-icon">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            
            <div class="modal-header text-center">
                <h3 class="modal-title">Заявка отправлена!</h3>
                <p class="modal-subtitle">Наш менеджер свяжется с вами в ближайшее время</p>
            </div>
            
            <button class="btn btn-primary btn-full" data-modal-close>
                Отлично
            </button>
        </div>
    </div>
</div>
