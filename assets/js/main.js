/**
 * ============================================
 * MAIN JAVASCRIPT
 * Premium Auto Haus - Core Functionality
 * ============================================
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize all modules
    Header.init();
    MobileMenu.init();
    ScrollAnimations.init();
    Counters.init();
    SmoothScroll.init();
    Modals.init();
    Forms.init();
});

/**
 * ============================================
 * HEADER MODULE
 * Sticky header with scroll detection
 * ============================================
 */
const Header = {
    header: null,
    lastScrollY: 0,
    threshold: 100,
    
    init() {
        this.header = document.getElementById('header');
        if (!this.header) return;
        
        this.bindEvents();
        this.checkScroll();
    },
    
    bindEvents() {
        window.addEventListener('scroll', () => this.onScroll(), { passive: true });
        window.addEventListener('resize', () => this.onResize(), { passive: true });
    },
    
    onScroll() {
        this.checkScroll();
    },
    
    checkScroll() {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > this.threshold) {
            this.header.classList.add('header--sticky');
        } else {
            this.header.classList.remove('header--sticky');
        }
        
        this.lastScrollY = currentScrollY;
    },
    
    onResize() {
        // Reset on resize if needed
    }
};

/**
 * ============================================
 * MOBILE MENU MODULE
 * Toggle and animate mobile menu
 * ============================================
 */
const MobileMenu = {
    toggle: null,
    menu: null,
    close: null,
    overlay: null,
    isOpen: false,
    
    init() {
        this.toggle = document.getElementById('menuToggle');
        this.menu = document.getElementById('mobileMenu');
        this.close = document.getElementById('mobileMenuClose');
        this.overlay = document.getElementById('overlay');
        
        if (!this.toggle || !this.menu) return;
        
        this.bindEvents();
    },
    
    bindEvents() {
        this.toggle.addEventListener('click', () => this.toggleMenu());
        
        if (this.close) {
            this.close.addEventListener('click', () => this.closeMenu());
        }
        
        if (this.overlay) {
            this.overlay.addEventListener('click', () => this.closeMenu());
        }
        
        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen) {
                this.closeMenu();
            }
        });
        
        // Prevent body scroll when menu is open
        this.menu.addEventListener('touchmove', (e) => {
            e.stopPropagation();
        }, { passive: true });
    },
    
    toggleMenu() {
        if (this.isOpen) {
            this.closeMenu();
        } else {
            this.openMenu();
        }
    },
    
    openMenu() {
        this.isOpen = true;
        this.toggle.classList.add('active');
        this.menu.classList.add('active');
        this.overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Animate menu items
        const items = this.menu.querySelectorAll('.mobile-menu__link');
        items.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, 100 + (index * 50));
        });
    },
    
    closeMenu() {
        this.isOpen = false;
        this.toggle.classList.remove('active');
        this.menu.classList.remove('active');
        this.overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
};

/**
 * ============================================
 * SCROLL ANIMATIONS MODULE
 * Intersection Observer for reveal animations
 * ============================================
 */
const ScrollAnimations = {
    observer: null,
    elements: [],
    
    init() {
        // Check for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReducedMotion) return;
        
        this.elements = document.querySelectorAll('.reveal');
        
        if (this.elements.length === 0) return;
        
        this.setupObserver();
        this.observeElements();
    },
    
    setupObserver() {
        const options = {
            root: null,
            rootMargin: '0px 0px -100px 0px',
            threshold: 0.1
        };
        
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateEntry(entry);
                }
            });
        }, options);
    },
    
    observeElements() {
        this.elements.forEach(el => this.observer.observe(el));
    },
    
    animateEntry(entry) {
        entry.target.classList.add('active');
        this.observer.unobserve(entry.target);
    }
};

/**
 * ============================================
 * COUNTERS MODULE
 * Animated number counters
 * ============================================
 */
const Counters = {
    counters: [],
    observer: null,
    
    init() {
        this.counters = document.querySelectorAll('[data-counter]');
        
        if (this.counters.length === 0) return;
        
        this.setupObserver();
    },
    
    setupObserver() {
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };
        
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    this.observer.unobserve(entry.target);
                }
            });
        }, options);
        
        this.counters.forEach(counter => this.observer.observe(counter));
    },
    
    animateCounter(element) {
        const target = parseInt(element.getAttribute('data-counter'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += step;
            if (current < target) {
                element.textContent = Math.floor(current).toLocaleString('ru-RU');
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString('ru-RU');
            }
        };
        
        updateCounter();
    }
};

/**
 * ============================================
 * SMOOTH SCROLL MODULE
 * Optional smooth scrolling enhancement
 * ============================================
 */
const SmoothScroll = {
    init() {
        // Native smooth scroll is enabled in CSS
        // This module can be extended for custom smooth scroll if needed
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const href = anchor.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
};

/**
 * ============================================
 * MODALS MODULE
 * Modal windows management
 * ============================================
 */
const Modals = {
    activeModal: null,
    
    init() {
        this.bindEvents();
    },
    
    bindEvents() {
        // Open modal triggers
        document.querySelectorAll('[data-modal]').forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = trigger.getAttribute('data-modal');
                this.open(modalId);
            });
        });
        
        // Close modal triggers
        document.querySelectorAll('[data-modal-close]').forEach(closeBtn => {
            closeBtn.addEventListener('click', () => this.close());
        });
        
        // Close on overlay click
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    this.close();
                }
            });
        });
        
        // Close on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.activeModal) {
                this.close();
            }
        });
    },
    
    open(modalId) {
        const modal = document.getElementById(`modal-${modalId}`);
        if (!modal) return;
        
        this.activeModal = modal;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Focus first input
        const firstInput = modal.querySelector('input, textarea, select');
        if (firstInput) {
            setTimeout(() => firstInput.focus(), 100);
        }
    },
    
    close() {
        if (!this.activeModal) return;
        
        this.activeModal.classList.remove('active');
        document.body.style.overflow = '';
        this.activeModal = null;
    }
};

/**
 * ============================================
 * FORMS MODULE
 * Form validation and submission
 * ============================================
 */
const Forms = {
    init() {
        this.bindEvents();
    },
    
    bindEvents() {
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => this.handleSubmit(e, form));
            
            // Real-time validation
            form.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('blur', () => this.validateField(input));
                input.addEventListener('input', () => this.clearError(input));
            });
        });
    },
    
    handleSubmit(e, form) {
        // Prevent default submission
        e.preventDefault();
        
        // Validate all fields
        let isValid = true;
        form.querySelectorAll('input[required], textarea[required]').forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });
        
        if (!isValid) return;
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span> Отправка...';
        }
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
            // Success
            if (submitBtn) {
                submitBtn.innerHTML = '✓ Отправлено';
                submitBtn.classList.add('success');
            }
            
            // Reset form
            form.reset();
            
            // Close modal if exists
            setTimeout(() => {
                Modals.close();
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Отправить';
                submitBtn.classList.remove('success');
            }, 2000);
        }, 1500);
    },
    
    validateField(input) {
        const value = input.value.trim();
        const type = input.type;
        let isValid = true;
        
        // Required check
        if (input.hasAttribute('required') && !value) {
            isValid = false;
        }
        
        // Email check
        if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
            }
        }
        
        // Phone check
        if (type === 'tel' && value) {
            const phoneRegex = /^[\d\+\-\(\)\s]{10,}$/;
            if (!phoneRegex.test(value)) {
                isValid = false;
            }
        }
        
        if (!isValid) {
            this.showError(input);
        } else {
            this.clearError(input);
        }
        
        return isValid;
    },
    
    showError(input) {
        input.classList.add('error');
        const error = input.parentElement.querySelector('.field-error');
        if (error) {
            error.style.display = 'block';
        }
    },
    
    clearError(input) {
        input.classList.remove('error');
        const error = input.parentElement.querySelector('.field-error');
        if (error) {
            error.style.display = 'none';
        }
    }
};

/**
 * ============================================
 * UTILITY FUNCTIONS
 * ============================================
 */

// Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Format phone number
function formatPhone(phone) {
    return phone.replace(/[^\d]/g, '')
        .replace(/(\d{1,2})(\d{3})(\d{3})(\d{2})(\d{2})/, '+$1 ($2) $3-$4-$5');
}

// Export modules for external use
window.PremiumAutoHaus = {
    Header,
    MobileMenu,
    ScrollAnimations,
    Counters,
    SmoothScroll,
    Modals,
    Forms,
    debounce,
    throttle,
    formatPhone
};
