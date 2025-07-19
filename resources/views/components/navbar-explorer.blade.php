{{-- resources/views/components/navbar-explorer.blade.php --}}

<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-gray-800">
    <div class="inner transition-all duration-300 max-w-7xl mx-auto px-8 sm:px-6 lg:px-14">
        <div class="navbar-content flex justify-between items-center h-20 transition-all duration-300">
            <a href="{{ route('landing') }}" class="flex items-center">
                <img src="https://via.placeholder.com/32x32?text=R" alt="Logo"
                    class="logo w-8 h-8 mr-2 hidden md:block transition-all duration-300" />
                <span class="brand-text text-2xl lg:px-12 font-protest font-medium transition-all duration-300">RaiseMeUp</span>
            </a>

            <div class="flex space-x-6 items-center">
                <a href="{{ route('explorer') }}"
                    class="explore-link font-bold px-2 lg:px-4 text-gray-800 transition-all duration-300">
                    <div class="explore-wrapper flex items-center gap-2 transition-all duration-300">
                        <img src="/assets/icon/launch.png" alt="icon"
                            class="explore-icon w-5 h-5 nav-icon filter invert-0 brightness-0 saturate-0 transition-all duration-300" />
                        <span class="explore-text text-sm transition-all duration-300">Explore</span>
                    </div>
                </a>

                <button id="loginBtn"
                    class="w-full text-center text-sm font-bold rounded-md px-2 py-3 bg-white text-gray-700">
                    Log In
                </button>
            </div>
        </div>
    </div>
</nav>

<style>
    #navbar a,
    #navbar span,
    #userIcon {
        transition: all 0.3s ease;
    }

    .nav-icon {
        transition: filter 0.3s ease;
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

    /* Ukuran konten navbar */
    #navbar .navbar-content {
        height: 5rem;
    }

    #navbar.shrink .navbar-content {
        height: 3.5rem;
    }

    /* Kecilkan logo dan teks saat shrink */
    #navbar.shrink .logo {
        width: 1.5rem;
        height: 1.5rem;
    }

    #navbar.shrink .brand-text {
        font-size: 1.125rem;
        /* text-lg */
    }

    /* Ukuran normal */
    .explore-text {
        font-size: 0.875rem;
        /* text-sm */
    }

    .explore-icon {
        width: 1.25rem;
        height: 1.25rem;
    }

    /* Ukuran kecil saat shrink */
    #navbar.shrink .explore-text {
        font-size: 0.75rem;
        /* text-xs */
    }

    #navbar.shrink .explore-icon {
        width: 1rem;
        height: 1rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById("navbar");

        // Scroll effect
        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;
            if (scrollY > 10) {
                navbar.classList.add("bg-white", "border", "backdrop-blur-sm", "shrink");
            } else {
                navbar.classList.remove("bg-white", "border", "backdrop-blur-sm", "shrink");
            }
        });

        // Login button functionality
        const loginBtn = document.getElementById('loginBtn');
        if (loginBtn) {
            loginBtn.addEventListener('click', function() {
                window.location.href = "{{ route('login') }}";
            });
        }
    });
</script>