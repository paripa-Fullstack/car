<!-- ============================================
     SCRIPTS INCLUDE
     All JavaScript files and libraries
     ============================================ -->

<!-- GSAP for Premium Animations (CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" defer></script>

<!-- Swiper.js for Sliders (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

<!-- GLightbox for Galleries (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js" defer></script>

<!-- Main Application Scripts -->
<script src="assets/js/main.js" defer></script>
<script src="assets/js/menu.js" defer></script>
<script src="assets/js/hero.js" defer></script>
<script src="assets/js/sliders.js" defer></script>
<script src="assets/js/animations.js" defer></script>
<script src="assets/js/filters.js" defer></script>
<script src="assets/js/counters.js" defer></script>
<script src="assets/js/forms.js" defer></script>
<script src="assets/js/modal.js" defer></script>
<script src="assets/js/page-transitions.js" defer></script>

<!-- Inline Scripts (Critical) -->
<script>
    // City selector functionality
    document.addEventListener('DOMContentLoaded', () => {
        const cityItems = document.querySelectorAll('.header__city-item');
        const currentCityEl = document.getElementById('current-city');
        
        if (cityItems.length > 0) {
            cityItems.forEach(item => {
                item.addEventListener('click', () => {
                    // Remove active class from all
                    cityItems.forEach(i => i.classList.remove('header__city-item--active'));
                    
                    // Add active to clicked
                    item.classList.add('header__city-item--active');
                    
                    // Update displayed city
                    if (currentCityEl) {
                        currentCityEl.textContent = item.textContent;
                    }
                    
                    // Store in localStorage
                    localStorage.setItem('selectedCity', item.dataset.city);
                });
            });
        }
        
        // Load saved city
        const savedCity = localStorage.getItem('selectedCity');
        if (savedCity && currentCityEl) {
            const savedItem = document.querySelector(`[data-city="${savedCity}"]`);
            if (savedItem) {
                currentCityEl.textContent = savedItem.textContent;
                cityItems.forEach(i => i.classList.remove('header__city-item--active'));
                savedItem.classList.add('header__city-item--active');
            }
        }
    });
    
    // Lazy load images
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }
    
    // Add ripple effect to buttons
    document.addEventListener('click', (e) => {
        if (e.target.closest('.btn')) {
            const btn = e.target.closest('.btn');
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            btn.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        }
    });
</script>
