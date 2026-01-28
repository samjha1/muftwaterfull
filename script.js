/**
 * AqwaReach - Main JavaScript
 * Handles animations, interactions, and form submissions
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initScrollAnimations();
    initCounterAnimation();
    initFormSubmission();
    initMobileMenu();
    initSmoothScroll();
});

/**
 * Navbar scroll effect
 */
function initNavbar() {
    const navbar = document.querySelector('.navbar');
    
    const handleScroll = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };
    
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Initial check
}

/**
 * Scroll-triggered animations using Intersection Observer
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.feature-card, .impact-card, .benefit');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add delay based on element position
                const delay = entry.target.dataset.delay || index * 100;
                setTimeout(() => {
                    entry.target.classList.add('animate');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    animatedElements.forEach(element => {
        observer.observe(element);
    });
    
    // Animate sections on scroll
    const sections = document.querySelectorAll('.section-header, .mission-text, .sustainability-text, .advertise-text');
    
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                sectionObserver.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px',
        threshold: 0.2
    });
    
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        sectionObserver.observe(section);
    });
}

/**
 * Animated counter for statistics
 */
function initCounterAnimation() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
}

/**
 * Animate a single counter element
 */
function animateCounter(element) {
    const target = parseInt(element.dataset.target);
    const duration = 2000; // 2 seconds
    const start = performance.now();
    
    const updateCounter = (currentTime) => {
        const elapsed = currentTime - start;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = Math.floor(easeOutQuart * target);
        
        // Format number with commas
        element.textContent = formatNumber(current);
        
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = formatNumber(target);
        }
    };
    
    requestAnimationFrame(updateCounter);
}

/**
 * Format number with appropriate suffix
 */
function formatNumber(num) {
    if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + 'M+';
    } else if (num >= 1000) {
        return (num / 1000).toFixed(num >= 10000 ? 0 : 1) + 'K+';
    }
    return num.toLocaleString() + '+';
}

/**
 * Handle form submission
 */
function initFormSubmission() {
    const form = document.getElementById('subscribeForm');
    const modal = document.getElementById('successModal');
    
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            
            // Simulate API call (replace with actual API endpoint)
            console.log('Form submitted:', data);
            
            // Show success modal
            showModal();
            
            // Reset form
            form.reset();
        });
    }
}

/**
 * Show success modal
 */
function showModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

/**
 * Close modal - exposed globally for inline onclick
 */
window.closeModal = function() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
};

// Close modal on background click
document.addEventListener('click', (e) => {
    const modal = document.getElementById('successModal');
    if (modal && e.target === modal) {
        closeModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
    }
});

// /**
//  * Mobile menu toggle
//  */
// function initMobileMenu() {
//     const menuBtn = document.querySelector('.mobile-menu-btn');
//     const navLinks = document.querySelector('.nav-links');
//     const navbar = document.querySelector('.navbar');
    
//     if (menuBtn) {
//         menuBtn.addEventListener('click', () => {
//             menuBtn.classList.toggle('active');

//             // Create mobile menu if it doesn't exist
//             let mobileMenu = document.querySelector('.mobile-menu');

//             if (!mobileMenu) {
//                 mobileMenu = document.createElement('div');
//                 mobileMenu.className = 'mobile-menu';

//                 // NOTE: innerHTML was previously spelled as "innerhtml",
//                 // which meant the menu was never actually created.
//                 // Fixing that here so the menu shows on mobile.
//                 mobileMenu.innerHTML = `
//                     <ul>
//                         <li><a href="#home">Home</a></li>
//                         <li><a href="#impact">Impact</a></li>
//                         <li><a href="#advertise">Advertise</a></li>
//                         <li><a href="distribute.html">Distribute</a></li>
//                         <li><a href="contact-us.html">Contact</a></li>
//                         <li><a href="#subscribe" class="mobile-cta">Get a quote</a></li>
//                     </ul>
//                 `;
                
//                 // Add styles dynamically
//                 const style = document.createElement('style');
//                 style.textContent = `
//                     .mobile-menu {
//                         position: fixed;
//                         top: 75px;
//                         left: 0;
//                         right: 0;
//                         background: rgba(255, 255, 255, 0.98);
//                         backdrop-filter: blur(20px);
//                         -webkit-backdrop-filter: blur(20px);
//                         padding: 1.5rem 2rem 2rem;
//                         border-bottom: 1px solid #e2e8f0;
//                         box-shadow: 0 20px 60px rgba(0, 119, 182, 0.15);
//                         transform: translateY(-100%);
//                         opacity: 0;
//                         visibility: hidden;
//                         transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
//                         z-index: 999;
//                     }
//                     .mobile-menu.active {
//                         transform: translateY(0);
//                         opacity: 1;
//                         visibility: visible;
//                     }
//                     .mobile-menu ul {
//                         display: flex;
//                         flex-direction: column;
//                         gap: 0.5rem;
//                         list-style: none;
//                         padding: 0;
//                         margin: 0;
//                     }
//                     .mobile-menu a {
//                         display: block;
//                         padding: 1rem 1.25rem;
//                         color: #4a5568;
//                         font-size: 1.05rem;
//                         font-weight: 500;
//                         text-decoration: none;
//                         border-radius: 12px;
//                         transition: all 0.3s ease;
//                     }
//                     .mobile-menu a:hover {
//                         background: #e8f4f8;
//                         color: #0077b6;
//                     }
//                     .mobile-menu .mobile-cta {
//                         background: linear-gradient(135deg, #0096c7, #00b4d8, #48cae4);
//                         color: white;
//                         text-align: center;
//                         font-weight: 600;
//                         margin-top: 0.75rem;
//                         box-shadow: 0 8px 30px rgba(0, 150, 199, 0.4);
//                     }
//                     .mobile-menu .mobile-cta:hover {
//                         background: linear-gradient(135deg, #0077b6, #0096c7, #00b4d8);
//                     }
//                     .mobile-menu-btn.active span:nth-child(1) {
//                         transform: rotate(45deg) translate(6px, 6px);
//                     }
//                     .mobile-menu-btn.active span:nth-child(2) {
//                         opacity: 0;
//                     }
//                     .mobile-menu-btn.active span:nth-child(3) {
//                         transform: rotate(-45deg) translate(6px, -6px);
//                     }
//                 `;
//                 document.head.appendChild(style);
//                 navbar.after(mobileMenu);
                
//                 // Close menu on link click
//                 mobileMenu.querySelectorAll('a').forEach(link => {
//                     link.addEventListener('click', () => {
//                         mobileMenu.classList.remove('active');
//                         menuBtn.classList.remove('active');
//                     });
//                 });
//             }
            
//             mobileMenu.classList.toggle('active');
//         });
//     }
// }



/**
 * Mobile menu toggle - works across all pages
 */
function initMobileMenu() {
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const navbar = document.querySelector('.navbar');

    if (!menuBtn || !navbar) return;

    // Check if menu already exists
    let mobileMenu = document.querySelector('.mobile-menu');
    if (!mobileMenu) {
        mobileMenu = document.createElement('div');
        mobileMenu.className = 'mobile-menu';
        mobileMenu.innerHTML = `
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#impact">Impact</a></li>
                <li><a href="#advertise">Advertise</a></li>
                <li><a href="distribute.php">Distribute</a></li>
                <li><a href="contact-us.php">Contact</a></li>
                <li><a href="#subscribe" class="mobile-cta">Get a quote</a></li>
            </ul>
        `;
        navbar.after(mobileMenu);
    }

    // Inject styles only once
    if (!document.getElementById('mobile-menu-styles')) {
        const style = document.createElement('style');
        style.id = 'mobile-menu-styles';
        style.textContent = `
            .mobile-menu {
                position: fixed;
                top: 75px;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                padding: 1.5rem 2rem 2rem;
                border-bottom: 1px solid #e2e8f0;
                box-shadow: 0 20px 60px rgba(0, 119, 182, 0.15);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 999;
            }
            .mobile-menu.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            .mobile-menu ul {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .mobile-menu a {
                display: block;
                padding: 1rem 1.25rem;
                color: #4a5568;
                font-size: 1.05rem;
                font-weight: 500;
                text-decoration: none;
                border-radius: 12px;
                transition: all 0.3s ease;
            }
            .mobile-menu a:hover {
                background: #e8f4f8;
                color: #0077b6;
            }
            .mobile-menu .mobile-cta {
                background: linear-gradient(135deg, #0096c7, #00b4d8, #48cae4);
                color: white;
                text-align: center;
                font-weight: 600;
                margin-top: 0.75rem;
                box-shadow: 0 8px 30px rgba(0, 150, 199, 0.4);
            }
            .mobile-menu .mobile-cta:hover {
                background: linear-gradient(135deg, #0077b6, #0096c7, #00b4d8);
            }
            .mobile-menu-btn span:nth-child(1) {
                display: block;
                width: 26px;
                height: 2px;
                background: black;
                border-radius: 2px;
                transition: all 0.3s ease;
            }
            .mobile-menu-btn span:nth-child(2) {
                display: block;
                width: 26px;
                height: 2px;
                background: black;
                margin: 5px 0;
                transition: all 0.3s ease;
            }
            .mobile-menu-btn span:nth-child(3) {
                display: block;
                width: 26px;
                height: 2px;
                background: black;
                border-radius: 2px;
                transition: all 0.3s ease;
            }
            .mobile-menu-btn.active span:nth-child(1) {
                transform: rotate(45deg) translate(6px, 6px);
            }
            .mobile-menu-btn.active span:nth-child(2) {
                opacity: 0;
            }
            .mobile-menu-btn.active span:nth-child(3) {
                transform: rotate(-45deg) translate(6px, -6px);
            }
        `;
        document.head.appendChild(style);
    }

    // Toggle menu on click
    menuBtn.addEventListener('click', () => {
        menuBtn.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    });

    // Close menu on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            menuBtn.classList.remove('active');
        });
    });
}

/**
 * Smooth scroll for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Skip if it's just "#"
            if (href === '#') return;
            
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                
                const navbarHeight = document.querySelector('.navbar').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Parallax effect for hero section
 */
function initParallax() {
    const hero = document.querySelector('.hero');
    const ripples = document.querySelectorAll('.water-ripple');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        
        if (scrolled < window.innerHeight) {
            ripples.forEach((ripple, index) => {
                const speed = 0.1 + (index * 0.05);
                ripple.style.transform = `translate(-50%, -50%) translateY(${scrolled * speed}px)`;
            });
        }
    }, { passive: true });
}

// Initialize parallax on load
initParallax();

/**
 * Add loading animation
 */
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
    
    // Trigger hero animations
    const heroElements = document.querySelectorAll('.hero-badge, .hero-title .title-line, .hero-description, .hero-cta, .hero-stats, .scroll-indicator');
    heroElements.forEach((el, index) => {
        setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

