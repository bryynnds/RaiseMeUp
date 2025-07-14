<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-protest {
            font-family: 'Protest Riot', cursive;
        }

        #navbar a,
        #navbar span,
        #loginBtn {
            transition: all 0.3s ease;
        }

        .nav-icon {
            transition: filter 0.3s ease;
        }

        @keyframes bounceScroll {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(8px);
            }
        }

        .animate-bounce-scroll {
            animation: bounceScroll 1.4s ease-in-out infinite;
        }

        .typing-text::after {
            content: '|';
            font-weight: normal;
            font-size: 1.5rem;
            opacity: 0;
            transition: opacity 0.2s ease;
            margin-left: 3px;
        }

        .caret-active::after {
            animation: blinkCaret 1s step-end infinite;
            opacity: 1;
        }

        @keyframes blinkCaret {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="min-h-screen scroll-smooth">

    <!-- Navbar -->
    <nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-white">
        <div class="max-w-7xl py-4 mx-auto px-8 sm:px-6 lg:px-14">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('landing') }}" class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R" alt="Logo"
                        class="w-8 h-8 mr-2 hidden md:block" />
                    <span class="text-2xl lg:px-12 font-protest font-medium">RaiseMeUp</span>
                </a>
                <div class="flex space-x-6 items-center">
                    <a href="#explore" class="font-bold px-2 lg:px-4">
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

    <!-- Hero -->
    <div class="w-full h-screen bg-cover bg-center flex flex-col relative overflow-hidden"
        style="background-image: url('/assets/bg/bg.jpg')">
        <!-- Overlay gelap gradasi -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/15 to-transparent z-0"></div>

        <div class="h-[15%] w-full flex items-center justify-center relative z-10"></div>

        <div class="h-[42%] w-full flex items-center justify-center relative z-10">
            <div class="flex flex-col items-center justify-center text-center space-y-10">
                <!-- Text + Maskot -->
                <div class="flex pl-6 items-center justify-end text-right">
                    <div
                        class="text-white flex flex-col space-y-2 text-xl lg:text-3xl font-bold leading-relaxed h-[5.5rem] lg:h-[7rem] min-w-[22rem] max-w-[22rem] overflow-hidden whitespace-nowrap">
                        <span id="typing-line-1" class="typing-text caret-active"></span>
                        <span id="typing-line-2" class="text-base lg:text-3xl leading-[2rem] typing-text"></span>

                    </div>
                    <img src="/assets/icon/maskot.png" alt="Illustration" class="pb-6 w-24 h-24 object-contain" />
                </div>





                <!-- Searchbar -->
                <div
                    class="backdrop-blur-sm bg-white/20 border border-white/70 w-full max-w-md rounded-full px-4 py-3 flex items-center justify-between">
                    <input type="text" placeholder="Kobo Kanaeru"
                        class="bg-transparent text-sm text-white placeholder-white/70 font-semibold w-full focus:outline-none px-2" />
                    <span
                        class="bg-blue-500 hover:bg-blue-800 text-sm px-4 py-2 rounded-full text-white font-bold cursor-pointer backdrop-blur-md transition">
                        Cari
                    </span>
                </div>
            </div>
        </div>

        <!-- Awan bawah -->
        <div class="h-[43vh] flex items-end justify-between relative z-10">
            <img src="/assets/bg/awankiri.png" alt="Gambar Kiri" class="h-64 object-cover object-bottom" />
            <div class="flex items-center justify-center">
                <div class="px-8 py-4 rounded-t-full bg-white flex items-center justify-center">
                    <img src="/assets/icon/scroll.png" alt="Scroll Icon"
                        class="w-6 h-6 object-contain animate-bounce-scroll" />
                </div>
            </div>


            <img src="/assets/bg/awankanan.png" alt="Gambar Kanan" class="h-64 object-cover object-bottom" />
        </div>
    </div>

    <!-- Section 2 (fix: putih tapi terdeteksi juga) -->
    <div
        class="putih-section w-full h-screen bg-gradient-to-b from-white to-gray-100 flex items-center justify-center text-gray-800 text-3xl font-bold">
        Section 2
    </div>

    <!-- Section 3 -->
    <div class="w-full h-screen bg-gray-100 flex items-center justify-center text-gray-900 text-3xl font-bold">
        Section 3
    </div>

    <x-footer />


    <script>
        const navbar = document.getElementById('navbar');
        const loginBtn = document.getElementById('loginBtn');
        const whiteSections = document.querySelectorAll('.bg-white, .bg-gray-100, .putih-section');
        const iconExplore = document.querySelector('#navbar img[src*="launch"]');

        let isLoggedIn = false;

        window.addEventListener('scroll', () => {
            let masukPutih = false;

            whiteSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 80 && rect.bottom >= 80) {
                    masukPutih = true;
                }
            });

            const gambarPutihKiri = document.querySelector('img[alt="Gambar Kiri"]');
            const gambarPutihKanan = document.querySelector('img[alt="Gambar Kanan"]');

            [gambarPutihKiri, gambarPutihKanan].forEach(img => {
                if (img) {
                    const rect = img.getBoundingClientRect();
                    if (rect.top <= 80 && rect.bottom >= 80) {
                        masukPutih = true;
                    }
                }
            });

            if (masukPutih) {
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
    </script>

    <script>
        function typeWithCaret(elId, text, speed = 50, callback = null) {
            const el = document.getElementById(elId);
            let i = 0;
            el.textContent = ''; // reset text

            function typeNext() {
                if (i <= text.length) {
                    el.textContent = text.slice(0, i);
                    i++;
                    setTimeout(typeNext, speed + Math.random() * 25); // smooth typing
                } else {
                    // Pastikan caret tetep nyala setelah selesai ngetik
                    el.classList.add('caret-active');
                    if (callback) callback();
                }
            }

            typeNext();
        }

        window.addEventListener('DOMContentLoaded', () => {
            const line1 = document.getElementById('typing-line-1');
            const line2 = document.getElementById('typing-line-2');

            typeWithCaret('typing-line-1', 'Support Creators,', 50, () => {
                // Pindah caret ke line 2
                line1.classList.remove('caret-active');
                line2.classList.add('caret-active');

                setTimeout(() => {
                    typeWithCaret('typing-line-2', 'Inspire More Creations', 50);
                }, 300);
            });
        });

        // Fungsi tombol login
        document.getElementById('loginBtn').addEventListener('click', function() {
            window.location.href = "{{ route('login') }}";
        });

        // Fungsi tombol explore (ganti href-nya)
        const exploreLink = document.querySelector('#navbar a[href="#explore"]');
        if (exploreLink) {
            exploreLink.setAttribute('href', "{{ route('explorer') }}");
        }
    </script>




</body>

</html>
