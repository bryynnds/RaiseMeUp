<!-- Alpine.js harus di-load dulu sebelum component -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    /* Color transitions - default putih, berubah jadi abu-hitam saat scroll */
    #navbar {
        transition: background-color 0.3s ease, border 0.3s ease, backdrop-filter 0.3s ease;
    }

    #navbar.shrink {
        background-color: white;
        border: 1px solid #e5e7eb;
        backdrop-filter: blur(4px);
    }

    /* Text color transitions */
    #navbar a,
    #navbar span {
        color: white;
        transition: color 0.3s ease;
    }

    #navbar.shrink a,
    #navbar.shrink span {
        color: #374151 !important;
    }

    /* Icon transitions */
    .nav-icon {
        filter: brightness(0) invert(1);
        transition: filter 0.3s ease;
    }

    #navbar.shrink .nav-icon {
        filter: brightness(0);
    }

    /* Divider transitions */
    .navbar-divider {
        background-color: white;
        transition: background-color 0.3s ease;
    }

    #navbar.shrink .navbar-divider {
        background-color: #374151;
    }

    #navbar .inner {
        padding-top: 1rem;
        padding-bottom: 1rem;
        transition: padding 0.3s ease;
    }

    #navbar.shrink .inner {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }

    #navbar .navbar-content {
        height: 5rem;
        transition: height 0.3s ease;
    }

    #navbar.shrink .navbar-content {
        height: 3.5rem;
    }

    /* Logo size transitions */
    .logo {
        transition: all 0.3s ease;
    }

    #navbar.shrink .logo {
        width: 1.5rem;
        height: 1.5rem;
    }

    /* Brand text transitions */
    .brand-text {
        transition: all 0.3s ease;
    }

    #navbar.shrink .brand-text {
        font-size: 1.125rem;
    }

    /* Explore text and icon transitions */
    .explore-text {
        transition: all 0.3s ease;
    }

    #navbar.shrink .explore-text {
        font-size: 0.75rem;
    }

    .explore-icon {
        transition: all 0.3s ease;
    }

    #navbar.shrink .explore-icon {
        width: 1rem;
        height: 1rem;
    }

    /* Alpine.js cloaking */
    [x-cloak] {
        display: none !important;
    }

    /* Fix untuk dropdown component */
    #navbar .not-navbar-color {
        color: #2563eb !important;
    }

    /* Pastikan dropdown tidak terpengaruh navbar color */
    #navbar [x-data] div[x-show] * {
        color: initial !important;
    }
</style>

<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-white">
    <div class="inner transition-all duration-300 max-w-7xl mx-auto px-6 sm:px-10 lg:px-16">
        <div class="navbar-content flex justify-between items-center h-20 transition-all duration-300">
            <!-- Left: Logo + Notif -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home_supporter') }}" class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R" alt="Logo"
                        class="logo w-8 h-8 mr-8 hidden md:block transition-all duration-300" />
                    <span class="brand-text text-2xl font-protest font-medium mr-2 transition-all duration-300">RaiseMeUp</span>
                </a>

            </div>

            <!-- Right: Explore + Profile -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('explorer_supporter') }}"
                    class="font-bold px-2 lg:px-4">
                    <div class="flex items-center gap-2">
                        <img src="/assets/icon/launch.png" alt="icon"
                            class="explore-icon w-5 h-5 nav-icon" />
                        <span class="explore-text">Explore</span>
                    </div>
                </a>

                <!-- Profile Section -->
                <x-profile-dropdown />
            </div>
        </div>
    </div>
</nav>

<!-- Simplified JavaScript Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById("navbar");
        let isScrolling = false;

        function updateNavbar() {
            const scrollY = window.scrollY;
            
            if (scrollY > 10) {
                navbar.classList.add("shrink");
            } else {
                navbar.classList.remove("shrink");
            }
            
            isScrolling = false;
        }

        // Simple scroll event dengan requestAnimationFrame untuk performance
        window.addEventListener("scroll", () => {
            if (!isScrolling) {
                isScrolling = true;
                requestAnimationFrame(updateNavbar);
            }
        });

        // JANGAN interfere dengan Alpine.js components
        // Biarkan x-notification-dropdown dan x-profile-dropdown handle events sendiri
    });
</script>