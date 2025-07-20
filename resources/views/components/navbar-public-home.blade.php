<!-- Navbar Component with Styles -->
<style>
    #navbar a,
    #navbar span,
    #loginBtn {
        transition: all 0.3s ease;
    }

    .nav-icon {
        transition: filter 0.3s ease;
    }
</style>

<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-white">
    <div class="max-w-7xl py-4 mx-auto px-8 sm:px-6 lg:px-14">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('landing') }}" class="flex items-center">
                <img src="/assets/icon/logo.png" alt="Logo"
                    class="w-8 h-8 mr-2 hidden md:block" />
                <span class="text-2xl lg:px-12 font-protest font-medium">RaiseMeUp</span>
            </a>
            <div class="flex space-x-6 items-center">
                <a href="{{ route('explorer-public') }}" class="font-bold px-2 lg:px-4">
                    <div class="flex items-center gap-2">
                        <img src="/assets/icon/launch.png" alt="icon" class="w-5 h-5 nav-icon" />
                        Explore
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const loginBtn = document.getElementById('loginBtn');
        const lightSections = document.querySelectorAll('.light-section');
        const iconExplore = document.querySelector('#navbar img[src*="launch"]');

        let isLoggedIn = false;

        window.addEventListener('scroll', () => {
            let shouldBeDark = false;

            // Check if navbar is over light sections
            lightSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 80 && rect.bottom >= 80) {
                    shouldBeDark = true;
                }
            });

            // Check if navbar is over white cloud images
            const gambarPutihKiri = document.querySelector('img[alt="Gambar Kiri"]');
            const gambarPutihKanan = document.querySelector('img[alt="Gambar Kanan"]');
            const scrollIcon = document.querySelector('.bg-white.rounded-t-full');

            [gambarPutihKiri, gambarPutihKanan, scrollIcon].forEach(element => {
                if (element) {
                    const rect = element.getBoundingClientRect();
                    if (rect.top <= 80 && rect.bottom >= 80) {
                        shouldBeDark = true;
                    }
                }
            });

            if (shouldBeDark) {
                // Dark theme (for light backgrounds)
                navbar.classList.remove('text-white');
                navbar.classList.add('text-gray-800');

                document.querySelectorAll('#navbar a, #navbar span').forEach(el => {
                    el.classList.remove('text-white');
                    el.classList.add('text-gray-800');
                });

                if (iconExplore) iconExplore.style.filter = 'invert(1)';

                if (!isLoggedIn) {
                    loginBtn.classList.remove('bg-white', 'text-gray-700');
                    loginBtn.classList.add('bg-blue-600', 'text-white');
                }

            } else {
                // Light theme (for dark backgrounds)
                navbar.classList.add('text-white');
                navbar.classList.remove('text-gray-800');

                document.querySelectorAll('#navbar a, #navbar span').forEach(el => {
                    el.classList.add('text-white');
                    el.classList.remove('text-gray-800');
                });

                if (iconExplore) iconExplore.style.filter = 'invert(0)';

                if (!isLoggedIn) {
                    loginBtn.classList.remove('bg-blue-600', 'text-white');
                    loginBtn.classList.add('bg-white', 'text-gray-700');
                }
            }
        });

        // Fungsi tombol login
        loginBtn?.addEventListener('click', function() {
            window.location.href = "{{ route('login') }}";
        });

        // Fungsi tombol explore (ganti href-nya, backup just in case)
        const exploreLink = document.querySelector('#navbar a[href="#explore"]');
        if (exploreLink) {
            exploreLink.setAttribute('href', "{{ route('explorer-public') }}");
        }
    });
</script>