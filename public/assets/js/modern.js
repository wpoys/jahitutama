/* ================================================
   MODERN WILDAN TAILOR - JAVASCRIPT
   ================================================ */

document.addEventListener('DOMContentLoaded', function() {
    // ================================================
    // Smooth Scroll for Anchor Links
    // ================================================
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                const target = document.querySelector(href);
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ================================================
    // Fade In on Scroll Animation
    // ================================================
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add fade-in class to elements with data-animate attribute
                if (entry.target.hasAttribute('data-animate')) {
                    const animationType = entry.target.getAttribute('data-animate');
                    entry.target.classList.add(animationType);
                }
                
                // Automatically animate fade-in elements
                if (entry.target.classList.contains('fade-in-on-scroll')) {
                    entry.target.classList.add('fade-in');
                }
                
                // Stop observing this element
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with fade-in-on-scroll or data-animate
    document.querySelectorAll('.fade-in-on-scroll, [data-animate]').forEach(el => {
        observer.observe(el);
    });

    // ================================================
    // Form Validation Enhancement
    // ================================================
    
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!this.checkValidity() === false) {
                e.preventDefault();
                e.stopPropagation();
            }
            this.classList.add('was-validated');
        }, false);
    });

    // Add real-time validation feedback
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('blur', function() {
            this.classList.add('was-validated');
        });

        input.addEventListener('input', function() {
            if (this.classList.contains('was-validated')) {
                // Re-validate on input if already validated
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                } else {
                    this.classList.add('is-invalid');
                }
            }
        });
    });

    // ================================================
    // Active Navigation Link
    // ================================================
    
    function highlightCurrentPage() {
        const currentLocation = location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href === '#') {
                return;
            }

            const normalizedHref = href.replace(/^https?:\/\/[^/]+/, '');
            if (href === currentLocation ||
                (currentLocation === '/' && normalizedHref === '/') ||
                currentLocation.includes(normalizedHref.replace('/', ''))) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }
    
    highlightCurrentPage();

    // ================================================
    // Button Ripple Effect
    // ================================================
    
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // ================================================
    // Navbar Background on Scroll
    // ================================================
    
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 4px 16px rgba(0, 0, 0, 0.12)';
        } else {
            navbar.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.08)';
        }
    });

    // ================================================
    // Collapse Navbar on Mobile Link Click
    // ================================================
    
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                const collapseBtn = document.querySelector('.navbar-toggler');
                collapseBtn.click();
            }
        });
    });

    // ================================================
    // Add Bootstrap 'was-validated' class to forms with errors
    // ================================================
    
    const formWithErrors = document.querySelector('form');
    if (formWithErrors && formWithErrors.querySelector('.is-invalid')) {
        formWithErrors.classList.add('was-validated');
    }

    // ================================================
    // Counter Animation (if any counters exist)
    // ================================================
    
    const counterElements = document.querySelectorAll('[data-counter]');
    if (counterElements.length > 0) {
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    const target = parseInt(entry.target.getAttribute('data-counter'));
                    let current = 0;
                    const increment = target / 50;
                    
                    const counter = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            entry.target.textContent = target;
                            clearInterval(counter);
                            entry.target.classList.add('counted');
                        } else {
                            entry.target.textContent = Math.floor(current);
                        }
                    }, 30);
                }
            });
        }, { threshold: 0.5 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // ================================================
    // Lazy Load Images (if needed)
    // ================================================
    
    if ('IntersectionObserver' in window) {
        const imgObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img.lazy').forEach(img => {
            imgObserver.observe(img);
        });
    }

    console.log('Modern Wildan Tailor - JavaScript Initialized ✓');
});

// ================================================
// Utility Functions
// ================================================

/**
 * Smooth scroll to element
 * @param {string} selector - CSS selector
 * @param {number} offset - Offset from top in pixels
 */
window.smoothScrollTo = function(selector, offset = 0) {
    const element = document.querySelector(selector);
    if (element) {
        window.scrollTo({
            top: element.offsetTop - offset,
            behavior: 'smooth'
        });
    }
};

/**
 * Add animation class to element
 * @param {element} element - DOM element
 * @param {string} animationName - Animation class name
 */
window.addAnimation = function(element, animationName) {
    if (element) {
        element.classList.add(animationName);
    }
};

/**
 * Toggle active state
 * @param {element} element - DOM element
 */
window.toggleActive = function(element) {
    if (element) {
        element.classList.toggle('active');
    }
};
