<!-- Navbar Component -->
<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-gray-800">
    <div class="inner max-w-7xl mx-auto px-4 sm:px-6 lg:px-14">
        <div class="navbar-content flex justify-between items-center h-20">
            <a href="{{ route('landing') }}" class="flex items-center">
                <img src="/assets/icon/logo.png" alt="Logo"
                    class="logo w-8 h-8 mr-2 hidden md:block transition-all duration-300" />
                <span class="brand-text text-2xl lg:px-12 font-protest font-medium transition-all duration-300">RaiseMeUp</span>
            </a>

            <div class="flex space-x-3 sm:space-x-6 items-center">
                <a href="{{ route('explorer-public') }}"
                    class="explore-link font-bold px-2 lg:px-4 text-gray-800">
                    <div class="explore-wrapper flex items-center gap-1 sm:gap-2">
                        <img src="/assets/icon/launch.png" alt="icon"
                            class="explore-icon w-4 h-4 sm:w-5 sm:h-5 nav-icon" />
                        <span class="explore-text text-xs sm:text-sm">Explore</span>
                    </div>
                </a>

                <button id="loginBtn"
                    class="w-full text-center text-xs sm:text-sm font-bold rounded-md px-2 sm:px-3 py-2 sm:py-3 bg-white text-gray-700">
                    Log In
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar Styles -->
<style>
    #navbar {
        border: 1px solid transparent;
        transition: background-color 0.2s ease, backdrop-filter 0.2s ease, border-color 0.2s ease;
        backdrop-filter: blur(0px);
    }

    #navbar.shrink {
        background-color: rgba(255, 255, 255, 0.95);
        border-color: rgba(229, 231, 235, 0.8);
        backdrop-filter: blur(8px);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    #navbar .inner {
        padding-top: 1rem;
        padding-bottom: 1rem;
        transition: padding 0.2s ease;
    }

    #navbar.shrink .inner {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    #navbar .navbar-content {
        height: 5rem;
        transition: height 0.2s ease;
    }

    #navbar.shrink .navbar-content {
        height: 3.75rem;
    }

    #navbar .explore-text,
    #navbar .brand-text,
    #navbar a,
    #navbar span {
        color: white;
        transition: color 0.2s ease;
    }

    #navbar .nav-icon {
        filter: brightness(0) invert(1);
        transition: filter 0.2s ease;
    }

    #navbar.shrink .explore-text,
    #navbar.shrink .brand-text,
    #navbar.shrink a,
    #navbar.shrink span {
        color: black;
    }

    #navbar.shrink .nav-icon {
        filter: brightness(0) invert(0);
    }

    /* Remove transition on logo & size-related stuff biar gak lebay */
    #navbar .logo,
    #navbar .brand-text,
    .explore-text,
    .explore-icon {
        transition: none;
    }

    /* Mobile specific styles */
    @media (max-width: 768px) {
        #navbar .navbar-content {
            height: 4rem;
        }

        #navbar.shrink .navbar-content {
            height: 3.25rem;
        }

        #navbar .brand-text {
            font-size: 1.25rem;
        }

        #navbar.shrink .brand-text {
            font-size: 1rem;
        }
    }

    @media (max-width: 640px) {
        #navbar .brand-text {
            font-size: 1.125rem;
        }

        #navbar.shrink .brand-text {
            font-size: 0.875rem;
        }
    }
</style>

<!-- Navbar JavaScript -->
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

        loginBtn?.addEventListener('click', function() {
            window.location.href = "{{ route('login') }}";
        });

        window.addEventListener("scroll", () => {
            if (!isScrolling) {
                isScrolling = true;
                requestAnimationFrame(updateNavbar);
            }
        });
    });
</script>