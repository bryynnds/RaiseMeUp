<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Explore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #ffffff, #99CFFB);
            min-height: 100vh;
        }

        .font-protest {
            font-family: 'Protest Riot', cursive;
        }

        #navbar .explore-text,
        #navbar .brand-text,
        #navbar a,
        #navbar span {
            color: white;
            transition: color 0.3s ease;
        }

        #navbar .nav-icon {
            filter: brightness(0) invert(1);
            transition: filter 0.3s ease;
        }

        #navbar.shrink {
            box-shadow: none;
            color: black;
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

        #navbar.shrink .logo {
            width: 1.5rem;
            height: 1.5rem;
        }

        #navbar.shrink .brand-text {
            font-size: 1.125rem;
        }

        .explore-text {
            font-size: 0.875rem;
        }

        .explore-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        #navbar.shrink .explore-text {
            font-size: 0.75rem;
        }

        #navbar.shrink .explore-icon {
            width: 1rem;
            height: 1rem;
        }

        .filter-btn.active {
            background-color: #2563eb;
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.25);
        }

        /* Mobile specific styles */
        @media (max-width: 768px) {
            #navbar .navbar-content {
                height: 4rem;
            }

            #navbar.shrink .navbar-content {
                height: 3rem;
            }

            #navbar .brand-text {
                font-size: 1.25rem;
            }

            #navbar.shrink .brand-text {
                font-size: 1rem;
            }

            .profile-image-mobile {
                width: 7rem;
                height: 7rem;
                margin-top: -3rem;
            }

            .profile-content-mobile {
                margin-top: -1rem;
            }
        }

        @media (max-width: 640px) {
            #navbar .brand-text {
                font-size: 1.125rem;
            }

            #navbar.shrink .brand-text {
                font-size: 0.875rem;
            }

            .profile-image-mobile {
                width: 6rem;
                height: 6rem;
                margin-top: -2.5rem;
            }
        }
    </style>
</head>

<body class="scroll-smooth min-h-screen bg-gradient-to-br from-white to-indigo-100">

    <!-- Navbar -->
    <nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-gray-800">
        <div class="inner transition-all duration-300 max-w-7xl mx-auto px-4 sm:px-6 lg:px-14">
            <div class="navbar-content flex justify-between items-center h-20 transition-all duration-300">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R" alt="Logo"
                        class="logo w-8 h-8 mr-2 hidden md:block transition-all duration-300" />
                    <span class="brand-text text-xl sm:text-2xl lg:px-12 font-protest font-medium transition-all duration-300">
                        RaiseMeUp
                    </span>
                </div>

                <div class="flex space-x-3 sm:space-x-6 items-center">
                    <a href="#explore"
                        class="explore-link font-bold px-2 lg:px-4 text-gray-800 transition-all duration-300">
                        <div class="explore-wrapper flex items-center gap-1 sm:gap-2 transition-all duration-300">
                            <img src="/assets/icon/launch.png" alt="icon"
                                class="explore-icon w-4 h-4 sm:w-5 sm:h-5 nav-icon transition-all duration-300" />
                            <span class="explore-text text-xs sm:text-sm transition-all duration-300">Explore</span>
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

    <!-- Sampul -->
    <section class="relative">
        <div class="w-full h-[30vh] sm:h-[40vh] md:h-[50vh] bg-gray-300">
            <img src="{{ asset('assets/sampul.jpg') }}" alt="Cover Image" class="w-full h-full object-cover" />
        </div>
    </section>

    <!-- Konten Profil -->
    <section class="relative z-20 -mt-6 sm:-mt-10 md:-mt-20">
        <div class="bg-white border-b border-gray-300 w-full px-4 sm:px-6 md:px-10 lg:px-32 py-4 sm:py-6 md:py-8 rounded-none">

            <!-- Desktop Layout -->
            <div class="hidden md:block">
                <!-- Atas: Profil Utama -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">

                    <!-- Kiri: Foto & Identitas -->
                    <div class="flex items-start gap-5">
                        <!-- Foto Profil -->
                        <img src="/assets/pp.png" alt="Profile Picture"
                            class="w-44 h-44 rounded-full border-8 border-white object-cover -mt-24" />

                        <div class="flex flex-col -mt-4 gap-1">
                            <!-- Username -->
                            <span class="text-gray-700 text-xs">@Nayla_Cutelyn</span>
                            <!-- Nama -->
                            <h1 class="text-2xl font-bold text-gray-900">Nayla Evelyn</h1>
                            <!-- Stats -->
                            <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1">
                                <span>2k Like</span>
                                <span>&bull;</span>
                                <span>278 Supports</span>
                            </div>
                        </div>
                    </div>

                    <!-- Kanan: Tombol -->
                    <div class="flex flex-col -mt-1.5 gap-3 items-start md:items-end ml-auto">

                        <button
                            class="flex items-center gap-2 px-10 py-3 rounded-full text-gray-700 bg-[#F2F4FC] hover:bg-[#e6e9f6] transition">
                            <img src="/assets/icon/like.png" alt="Like Icon" class="w-6 h-6" />
                            Like Me
                        </button>

                        <button id="donateBtn"
                            class="flex items-center gap-2 px-10 py-3 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition font-semibold">
                            <img src="/assets/icon/donate.png" alt="Donate Icon" class="w-6 h-6" />
                            Donate
                        </button>

                    </div>
                </div>

                <!-- Bio -->
                <div class="mt-2">
                    <div class="flex items-center gap-3">
                        <button class="px-4 py-1 border rounded-full text-sm font-medium bg-gray-100 text-gray-600">Bio</button>
                        <p class="text-sm text-gray-500">
                            "I'm digital artist who draws cute girls & soft vibes~ Let's make magic together~ (๑>ᴗ<)♡"
                                </p>
                    </div>
                </div>

                <!-- Tab Navigasi -->
                <div class="mt-8 border-b border-gray-300 flex gap-10 text-sm font-medium text-gray-500">
                    <button class="text-indigo-600 border-b-2 border-green-400 pb-2">Portofolio</button>
                    <button class="hover:text-indigo-600 transition">About</button>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="block md:hidden">
                <!-- Profile Section -->
                <div class="flex flex-col items-center text-center">
                    <!-- Foto Profil -->
                    <img src="/assets/pp.png" alt="Profile Picture"
                        class="profile-image-mobile rounded-full border-4 border-white object-cover mb-3" />

                    <!-- Identitas -->
                    <div class="flex flex-col gap-1 mb-4">
                        <!-- Username -->
                        <span class="text-gray-700 text-xs">@Nayla_Cutelyn</span>
                        <!-- Nama -->
                        <h1 class="text-xl font-bold text-gray-900">Nayla Evelyn</h1>
                        <!-- Stats -->
                        <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1 justify-center">
                            <span>2k Like</span>
                            <span>&bull;</span>
                            <span>278 Supports</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 w-full max-w-sm mb-4">
                        <button
                            class="flex items-center justify-center gap-2 flex-1 py-2.5 px-4 rounded-full text-gray-700 bg-[#F2F4FC] hover:bg-[#e6e9f6] transition text-sm">
                            <img src="/assets/icon/like.png" alt="Like Icon" class="w-5 h-5" />
                            Like Me
                        </button>

                        <button id="donateBtnMobile"
                            class="flex items-center justify-center gap-2 flex-1 py-2.5 px-4 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition font-semibold text-sm">
                            <img src="/assets/icon/donate.png" alt="Donate Icon" class="w-5 h-5" />
                            Donate
                        </button>
                    </div>

                    <!-- Bio -->
                    <div class="w-full">
                        <div class="flex flex-col gap-2 text-center">
                            <button class="px-3 py-1 border rounded-full text-xs font-medium bg-gray-100 text-gray-600 self-center">Bio</button>
                            <p class="text-sm text-gray-500 px-2">
                                "I'm digital artist who draws cute girls & soft vibes~ Let's make magic together~ (๑>ᴗ<)♡"
                                    </p>
                        </div>
                    </div>

                    <!-- Tab Navigasi -->
                    <div class="mt-6 border-b border-gray-300 flex gap-8 text-sm font-medium text-gray-500 w-full justify-center">
                        <button class="text-indigo-600 border-b-2 border-green-400 pb-2">Portofolio</button>
                        <button class="hover:text-indigo-600 transition">About</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="w-full h-56 bg-blue-50 py-4 text-center">

    </div>

    <x-donate />

    <x-footer />

    <!-- Script Scroll Navbar -->
    <script>
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;
            if (scrollY > 10) {
                navbar.classList.add("bg-white", "border", "backdrop-blur-sm", "shrink");
            } else {
                navbar.classList.remove("bg-white", "border", "backdrop-blur-sm", "shrink");
            }
        });

        // Open donate modal
        document.addEventListener('DOMContentLoaded', function() {
            const donateBtn = document.getElementById('donateBtn');
            const donateBtnMobile = document.getElementById('donateBtnMobile');
            const donateModal = document.getElementById('donateModal');

            function openDonateModal() {
                donateModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            if (donateBtn) {
                donateBtn.addEventListener('click', openDonateModal);
            }

            if (donateBtnMobile) {
                donateBtnMobile.addEventListener('click', openDonateModal);
            }
        });
    </script>

</body>

</html>