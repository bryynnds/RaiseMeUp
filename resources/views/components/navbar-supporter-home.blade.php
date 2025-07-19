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

    .navbar-divider {
        transition: background-color 0.3s ease;
    }

    .notification-icon svg {
        transition: filter 0.3s ease;
    }
</style>

<!-- Navbar Component -->
<nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-white">
    <div class="max-w-7xl mx-auto py-4 px-6 sm:px-10 lg:px-16">
        <div class="flex justify-between items-center h-20">
            <!-- Left: Logo + Notif -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home_supporter') }}" class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R" alt="Logo"
                        class="w-8 h-8 mr-8 hidden md:block" />
                    <span class="text-2xl font-protest font-medium mr-2">RaiseMeUp</span>
                </a>
            </div>

            <!-- Right: Explore + Profile -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('explorer_supporter') }}" class="font-bold px-2 lg:px-4 transition-all duration-300">
                    <div class="flex items-center gap-2">
                        <img src="/assets/icon/launch.png" alt="icon" class="w-5 h-5 transition-all duration-300" />
                        <span>Explore</span>
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
        const navbar = document.getElementById('navbar');
        const iconExplore = document.querySelector('#navbar img[src*="launch"]');
        const notificationIcon = document.getElementById('notificationIcon');
        const dividerLine = document.querySelector('.navbar-divider');

        window.addEventListener('scroll', () => {
            let shouldBeDark = false;
            const lightSections = document.querySelectorAll('.light-section');

            lightSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 80 && rect.bottom >= 80) shouldBeDark = true;
            });

            const extraEls = [
                document.querySelector('img[alt="Gambar Kiri"]'),
                document.querySelector('img[alt="Gambar Kanan"]'),
                document.querySelector('.bg-white.rounded-t-full')
            ];

            extraEls.forEach(el => {
                if (el) {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= 80 && rect.bottom >= 80) shouldBeDark = true;
                }
            });

            const toggleClasses = (add, remove) => {
                navbar.classList.add(add);
                navbar.classList.remove(remove);

                document.querySelectorAll('#navbar a, #navbar span').forEach(el => {
                    el.classList.add(add);
                    el.classList.remove(remove);
                });

                if (iconExplore) iconExplore.style.filter = (add === 'text-white') ? 'invert(0)' : 'invert(1)';
                if (notificationIcon) {
                    notificationIcon.classList.add(add);
                    notificationIcon.classList.remove(remove);
                }

                if (dividerLine) {
                    dividerLine.classList.add((add === 'text-white') ? 'bg-white' : 'bg-gray-800');
                    dividerLine.classList.remove((remove === 'text-white') ? 'bg-white' : 'bg-gray-800');
                }
            };

            if (shouldBeDark) {
                toggleClasses('text-gray-800', 'text-white');
            } else {
                toggleClasses('text-white', 'text-gray-800');
            }
        });

        document.getElementById('profileBtn').addEventListener('click', function(e) {
            e.preventDefault();
        });

        if (notificationIcon) {
            notificationIcon.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Notifikasi diklik, tapi ga pindah halaman');
            });
        }
    });
</script>