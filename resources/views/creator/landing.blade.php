<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-protest {
            font-family: 'Protest Riot', cursive;
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

    <!-- Include Navbar Component -->
    <x-navbar-creator-home />

    <!-- Hero -->
    <div class="w-full h-screen bg-cover bg-center flex flex-col relative overflow-hidden"
        style="background-image: url('/assets/bg/bg.jpg')">
        <div class="absolute inset-0 bg-gradient-to-b from-black/15 to-transparent z-0"></div>

        <div class="h-[15%] w-full flex items-center justify-center relative z-10"></div>

        <div class="h-[42%] w-full flex items-center justify-center relative z-10">
            <div class="flex flex-col items-center justify-center text-center space-y-10">
                <div class="flex pl-6 items-center justify-end text-right">
                    <div
                        class="text-white flex flex-col space-y-2 text-xl lg:text-3xl font-bold leading-relaxed h-[5.5rem] lg:h-[7rem] min-w-[22rem] max-w-[22rem] overflow-hidden whitespace-nowrap">
                        <span id="typing-line-1" class="typing-text caret-active"></span>
                        <span id="typing-line-2" class="text-base lg:text-3xl leading-[2rem] typing-text"></span>
                    </div>
                    <img src="/assets/icon/maskot.png" alt="Illustration" class="pb-6 w-24 h-24 object-contain" />
                </div>

                <div
                    class="backdrop-blur-sm bg-white/20 border border-white/70 w-full max-w-md rounded-full px-4 py-3 flex items-center justify-between">
                    <input id="landingSearchInput" type="text" placeholder="Kobo Kanaeru"
                        class="bg-transparent text-sm text-white placeholder-white/70 font-semibold w-full focus:outline-none px-2" />
                    <span id="landingSearchButton"
                        class="bg-blue-500 hover:bg-blue-800 text-sm px-4 py-2 rounded-full text-white font-bold cursor-pointer backdrop-blur-md transition">
                        Cari
                    </span>
                </div>
            </div>
        </div>

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

    <div
        class="light-section w-full h-screen bg-gradient-to-b from-white to-gray-100 flex items-center justify-center text-gray-800 text-3xl font-bold">
        Section 2
    </div>

    <div class="light-section w-full h-screen bg-gray-100 flex items-center justify-center text-gray-900 text-3xl font-bold">
        Section 3
    </div>

    <x-footer />

    <script>
        function typeWithCaret(elId, text, speed = 50, callback = null) {
            const el = document.getElementById(elId);
            let i = 0;
            el.textContent = '';

            function typeNext() {
                if (i <= text.length) {
                    el.textContent = text.slice(0, i);
                    i++;
                    setTimeout(typeNext, speed + Math.random() * 25);
                } else {
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
                line1.classList.remove('caret-active');
                line2.classList.add('caret-active');

                setTimeout(() => {
                    typeWithCaret('typing-line-2', 'Inspire More Creations', 50);
                }, 300);
            });
        });
    </script>

    <script>
        document.getElementById('landingSearchButton').addEventListener('click', function() {
            const keyword = document.getElementById('landingSearchInput').value.trim();
            if (keyword) {
                // Redirect ke route explorer-public dengan query search
                window.location.href = `/explorer-creator?search=${encodeURIComponent(keyword)}`;
            } else {
                // Redirect tetap ke explorer jika kosong
                window.location.href = `/explorer-creator`;
            }
        });
    </script>

</body>

</html>