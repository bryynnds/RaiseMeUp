<!-- Alpine.js harus di-load dulu sebelum component -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    #navbar a,
    #navbar span,
    #loginBtn,
    .nav-icon,
    .notification-icon svg {
        transition: all 0.3s ease;
    }

    .navbar-divider {
        transition: background-color 0.3s ease;
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
    }

    #navbar.shrink .navbar-content {
        height: 3.5rem;
    }

    #navbar.shrink .logo {
        width: 1.5rem;
        height: 1.5rem;
    }

    #navbar.shrink .brand-text {
        font-size: 1.125rem;
    }

    #navbar.shrink .explore-text {
        font-size: 0.75rem;
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
</style>

<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-gray-700">
    <div class="inner transition-all duration-300 max-w-7xl mx-auto px-6 sm:px-10 lg:px-16">
        <div class="navbar-content flex justify-between items-center h-20 transition-all duration-300">
            <!-- Left: Logo + Notif -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home_creator') }}" class="flex items-center">
                    <img src="/assets/icon/logo.png" alt="Logo"
                        class="logo w-8 h-8 mr-8 hidden md:block transition-all duration-300" />
                    <span class="brand-text text-2xl font-protest font-medium mr-2 transition-all duration-300">RaiseMeUp</span>
                </a>

                <div class="w-[1px] h-6 bg-gray-700 rounded-full navbar-divider transition-all duration-300"></div>

                <!-- Notif -->
                <x-notification-dropdown />
            </div>

            <!-- Right: Explore + Profile -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('explorer-creator') }}"
                    class="font-bold px-2 lg:px-4 transition-all duration-300 text-inherit">
                    <div class="flex items-center gap-2">
                        <img src="/assets/icon/launch.png" alt="icon"
                            class="explore-icon w-5 h-5 transition-all duration-300 filter brightness-0" />
                        <span class="explore-text transition-all duration-300">Explore</span>
                    </div>
                </a>

                <!-- Profile Section -->
                <x-profile-dropdown />
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById("navbar");
        const iconExplore = document.querySelector('#navbar img[src*="launch"]');
        const notificationIcon = document.getElementById('notificationIcon');
        const dividerLine = document.querySelector('.navbar-divider');

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;
            if (scrollY > 10) {
                navbar.classList.add("bg-white", "border", "backdrop-blur-sm", "shrink");
                navbar.classList.remove("text-gray-700");

                if (iconExplore) iconExplore.style.filter = 'brightness(0)';
                if (notificationIcon) {
                    notificationIcon.classList.remove("text-gray-700");
                    notificationIcon.classList.add("text-gray-800");
                }
                if (dividerLine) {
                    dividerLine.classList.remove("bg-gray-700");
                    dividerLine.classList.add("bg-gray-800");
                }
            } else {
                navbar.classList.remove("bg-white", "border", "backdrop-blur-sm", "shrink");
                navbar.classList.add("text-gray-700");

                if (iconExplore) iconExplore.style.filter = 'brightness(0)';
                if (notificationIcon) {
                    notificationIcon.classList.remove("text-gray-800");
                    notificationIcon.classList.add("text-gray-700");
                }
                if (dividerLine) {
                    dividerLine.classList.remove("bg-gray-800");
                    dividerLine.classList.add("bg-gray-700");
                }
            }
        });

        // HAPUS BAGIAN INI - ini yang bikin dropdown ga jalan!
        // document.getElementById('profileBtn')?.addEventListener('click', function(e) {
        //     e.preventDefault();
        // });

        // if (notificationIcon) {
        //     notificationIcon.addEventListener('click', function(e) {
        //         e.preventDefault();
        //         console.log('Notifikasi diklik, tapi ga pindah halaman');
        //     });
        // }

        // BIARKAN COMPONENT LARAVEL HANDLE EVENT SENDIRI
        // Jangan interfere dengan click events dari x-notification-dropdown dan x-profile-dropdown
    });
</script>