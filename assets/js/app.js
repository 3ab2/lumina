document.addEventListener('DOMContentLoaded', () => {
    /**
     * Mobile Navigation Toggle
     */
    const menuToggle = document.querySelector('.menu-toggle');
    const menuContainer = document.getElementById('primary-menu');
    
    if (menuToggle && menuContainer) {
        const toggleMenu = (expand) => {
            menuToggle.setAttribute('aria-expanded', expand);
            menuContainer.classList.toggle('active', expand);
            document.body.classList.toggle('menu-open', expand);
        };

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            toggleMenu(!isExpanded);
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menuContainer.classList.contains('active')) {
                toggleMenu(false);
            }
        });
        
        // Close on link click
        const menuLinks = menuContainer.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => toggleMenu(false));
        });
    }

    /**
     * AJAX Contact Form Submission - Enhanced UX
     */
    const contactForm = document.getElementById('lumina-contact-form');
    const formResponse = document.getElementById('form-response');
    const submitBtn = document.getElementById('submit-btn');

    if (contactForm && (typeof lumina_vars !== 'undefined')) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(contactForm);
            formData.append('action', 'lumina_contact_submit');
            formData.append('nonce', lumina_vars.nonce); // Consolidated Nonce

            // --- UI Transitions (Start) ---
            const inputs = contactForm.querySelectorAll('input, textarea, button');
            inputs.forEach(input => input.disabled = true);
            
            submitBtn.classList.add('btn--loading');
            const originalText = submitBtn.innerText;
            submitBtn.innerText = submitBtn.getAttribute('data-loading');
            formResponse.className = 'form-response';
            formResponse.innerText = '';

            fetch(lumina_vars.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                formResponse.innerText = data.data.message;
                formResponse.classList.add(data.success ? 'success' : 'error');
                
                if (data.success) {
                    contactForm.reset();
                }
            })
            .catch(() => {
                formResponse.innerText = 'Service unavailable. Please try again later.';
                formResponse.classList.add('error');
            })
            .finally(() => {
                // --- UI Transitions (End) ---
                inputs.forEach(input => input.disabled = false);
                submitBtn.classList.remove('btn--loading');
                submitBtn.innerText = originalText;
            });
        });
    }

    /**
     * Portfolio Filtering - Success & Empty States
     */
    const filterButtons = document.querySelectorAll('.portfolio-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const emptyState = document.getElementById('portfolio-empty');

    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                const filter = btn.getAttribute('data-filter');
                let count = 0;

                portfolioItems.forEach(item => {
                    const categories = item.getAttribute('data-category').split(' ');
                    if (filter === 'all' || categories.includes(filter)) {
                        item.style.display = 'block';
                        count++;
                        setTimeout(() => { 
                            item.style.opacity = '1'; 
                            item.style.transform = 'scale(1)'; 
                        }, 10);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        setTimeout(() => { item.style.display = 'none'; }, 300);
                    }
                });

                // --- Handle Empty State ---
                if (emptyState) {
                    if (count === 0) {
                        emptyState.style.display = 'block';
                        setTimeout(() => (emptyState.style.opacity = '1'), 100);
                    } else {
                        emptyState.style.opacity = '0';
                        setTimeout(() => (emptyState.style.display = 'none'), 300);
                    }
                }
            });
        });
    }

    /**
     * Scroll Reveal & Performance
     */
    const reveals = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    reveals.forEach(reveal => revealObserver.observe(reveal));

    /**
     * Header Dynamic Scroll
     */
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('header--scrolled');
        } else {
            header.classList.remove('header--scrolled');
        }
    });

    /**
     * Magnetic Cursor - Refined Precision
     */
    const cursor = document.getElementById('magnetic-cursor');
    if (cursor) {
        document.addEventListener('mousemove', (e) => {
            requestAnimationFrame(() => {
                cursor.style.transform = `translate(${e.clientX - 10}px, ${e.clientY - 10}px)`;
            });
        });

        const interactibles = document.querySelectorAll('a, button, .portfolio-item');
        interactibles.forEach(item => {
            item.addEventListener('mouseenter', () => {
                cursor.style.transform += ' scale(2.5)';
                cursor.style.background = 'rgba(255, 255, 255, 0.45)';
            });
            item.addEventListener('mouseleave', () => {
                cursor.style.transform = cursor.style.transform.replace(' scale(2.5)', '');
                cursor.style.background = 'var(--color-accent)';
            });
        });
    }
});
