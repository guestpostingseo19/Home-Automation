/**
 * Hyvoxa Theme - Main JavaScript
 * Vanilla JS, no dependencies.
 * Handles: navbar scroll state, mobile menu, scroll reveal,
 * animated counters, FAQ accordions, blog search/filter.
 */

(function () {
    'use strict';

    /* ==========================================================================
       1. Navbar scroll state
       ========================================================================== */
    var navbar = document.getElementById('hyvoxa-navbar');
    if (navbar) {
        var onScroll = function () {
            if (window.scrollY > 24) {
                navbar.style.backgroundColor = 'rgba(46, 53, 50, 0.9)';
                navbar.style.backdropFilter = 'blur(16px) saturate(160%)';
                navbar.style.webkitBackdropFilter = 'blur(16px) saturate(160%)';
                navbar.style.boxShadow = '0 4px 20px rgba(15,17,16,0.2)';
            } else {
                navbar.style.backgroundColor = 'transparent';
                navbar.style.backdropFilter = 'none';
                navbar.style.webkitBackdropFilter = 'none';
                navbar.style.boxShadow = 'none';
            }
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ==========================================================================
       2. Mobile menu toggle
       ========================================================================== */
    var menuToggle = document.getElementById('hyvoxa-menu-toggle');
    var mobileMenu = document.getElementById('hyvoxa-mobile-menu');
    var menuIcon   = document.getElementById('hyvoxa-menu-icon');
    var closeIcon  = document.getElementById('hyvoxa-close-icon');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            var isOpen = mobileMenu.style.display !== 'none';
            if (isOpen) {
                mobileMenu.style.display = 'none';
                if (menuIcon)  menuIcon.style.display = 'block';
                if (closeIcon) closeIcon.style.display = 'none';
                menuToggle.setAttribute('aria-expanded', 'false');
            } else {
                mobileMenu.style.display = 'block';
                if (menuIcon)  menuIcon.style.display = 'none';
                if (closeIcon) closeIcon.style.display = 'block';
                menuToggle.setAttribute('aria-expanded', 'true');
            }
        });
    }

    /* ==========================================================================
       3. Scroll reveal (IntersectionObserver)
       ========================================================================== */
    var revealElements = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window && revealElements.length > 0) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -60px 0px'
        });

        revealElements.forEach(function (el) {
            revealObserver.observe(el);
        });
    } else {
        // Fallback: make everything visible
        revealElements.forEach(function (el) {
            el.classList.add('is-visible');
        });
    }

    /* ==========================================================================
       4. Animated counters
       ========================================================================== */
    var counters = document.querySelectorAll('[data-counter]');

    if ('IntersectionObserver' in window && counters.length > 0) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(function (el) {
            counterObserver.observe(el);
        });
    } else {
        counters.forEach(function (el) {
            el.textContent = el.getAttribute('data-counter');
        });
    }

    function animateCounter(el) {
        var raw    = el.getAttribute('data-counter');
        var suffix = el.getAttribute('data-suffix') || '';
        var numeric = parseFloat(raw.replace(/[^0-9.]/g, ''));
        var hasDecimal = raw.indexOf('.') !== -1;
        var duration = 1800;
        var startTime = null;

        if (isNaN(numeric)) {
            el.textContent = raw;
            return;
        }

        function tick(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = numeric * eased;

            el.textContent = hasDecimal
                ? current.toFixed(1) + suffix
                : Math.floor(current) + suffix;

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                el.textContent = hasDecimal
                    ? numeric.toFixed(1) + suffix
                    : Math.floor(numeric) + suffix;
            }
        }
        requestAnimationFrame(tick);
    }

    /* ==========================================================================
       5. FAQ accordions
       ========================================================================== */
    var faqButtons = document.querySelectorAll('.hyvoxa-faq-toggle');

    faqButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var answer = btn.nextElementSibling;
            var icon   = btn.querySelector('.hyvoxa-faq-chevron');
            var isOpen = btn.classList.contains('open');

            // Close all other FAQs in the same group
            var group = btn.closest('.hyvoxa-faq-group');
            if (group) {
                group.querySelectorAll('.hyvoxa-faq-toggle').forEach(function (otherBtn) {
                    if (otherBtn !== btn) {
                        otherBtn.classList.remove('open');
                        var otherAnswer = otherBtn.nextElementSibling;
                        var otherIcon   = otherBtn.querySelector('.hyvoxa-faq-chevron');
                        if (otherAnswer) {
                            otherAnswer.style.maxHeight = '0';
                            otherAnswer.style.opacity = '0';
                        }
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                });
            }

            if (isOpen) {
                btn.classList.remove('open');
                if (answer) {
                    answer.style.maxHeight = '0';
                    answer.style.opacity = '0';
                }
                if (icon) icon.style.transform = 'rotate(0deg)';
            } else {
                btn.classList.add('open');
                if (answer) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    answer.style.opacity = '1';
                }
                if (icon) icon.style.transform = 'rotate(180deg)';
            }
        });
    });

    /* ==========================================================================
       6. Blog search & category filter
       ========================================================================== */
    var searchInput   = document.getElementById('hyvoxa-blog-search');
    var categoryBtns  = document.querySelectorAll('.hyvoxa-cat-btn');
    var blogCards     = document.querySelectorAll('.hyvoxa-blog-card');
    var noResults     = document.getElementById('hyvoxa-no-results');
    var clearBtn      = document.getElementById('hyvoxa-clear-filters');
    var activeCategory = 'All';

    function filterBlog() {
        var query = searchInput ? searchInput.value.toLowerCase() : '';
        var visible = 0;

        blogCards.forEach(function (card) {
            var title       = (card.getAttribute('data-title') || '').toLowerCase();
            var excerpt     = (card.getAttribute('data-excerpt') || '').toLowerCase();
            var category    = card.getAttribute('data-category') || '';

            var matchesCat = activeCategory === 'All' || category === activeCategory;
            var matchesQuery = !query || title.indexOf(query) !== -1 || excerpt.indexOf(query) !== -1;

            if (matchesCat && matchesQuery) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        if (noResults) {
            noResults.style.display = visible === 0 ? 'block' : 'none';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterBlog);
    }

    categoryBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            activeCategory = btn.getAttribute('data-category') || 'All';

            categoryBtns.forEach(function (b) {
                b.classList.remove('hyvoxa-cat-active');
            });
            btn.classList.add('hyvoxa-cat-active');

            filterBlog();
        });
    });

    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            if (searchInput) searchInput.value = '';
            activeCategory = 'All';
            categoryBtns.forEach(function (b) { b.classList.remove('hyvoxa-cat-active'); });
            var allBtn = document.querySelector('.hyvoxa-cat-btn[data-category="All"]');
            if (allBtn) allBtn.classList.add('hyvoxa-cat-active');
            filterBlog();
        });
    }

    /* ==========================================================================
       7. Active nav link highlighting
       ========================================================================== */
    var navLinks = document.querySelectorAll('#hyvoxa-nav-menu a');
    var currentPath = window.location.pathname;

    navLinks.forEach(function (link) {
        var href = link.getAttribute('href');
        if (!href) return;

        var linkPath;
        try {
            linkPath = new URL(href, window.location.origin).pathname;
        } catch (e) {
            return;
        }

        var isActive = false;
        if (linkPath === '/' && (currentPath === '/' || currentPath === '')) {
            isActive = true;
        } else if (linkPath !== '/' && currentPath.indexOf(linkPath) === 0) {
            isActive = true;
        }

        if (isActive) {
            link.classList.add('text-tea-300');
            link.classList.remove('text-linen-300');

            // Add underline indicator
            var indicator = document.createElement('span');
            indicator.className = 'absolute inset-x-3 -bottom-px h-px bg-tea-300';
            indicator.style.transform = 'scaleX(1)';
            indicator.style.transition = 'transform 0.3s';
            if (getComputedStyle(link).position !== 'relative') {
                link.style.position = 'relative';
            }
            if (!link.querySelector('.absolute')) {
                link.appendChild(indicator);
            }
        }
    });

    /* ==========================================================================
       8. Smooth scroll for in-page links
       ========================================================================== */
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var href = this.getAttribute('href');
            if (href === '#' || href === '#/') return;
            var target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

})();
