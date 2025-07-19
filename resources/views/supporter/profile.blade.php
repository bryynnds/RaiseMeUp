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

        .filter-btn.active {
            background-color: #2563eb;
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.25);
        }

        .profile-image-mobile {
            width: 7rem;
            height: 7rem;
            margin-top: -3rem;
        }

        .profile-content-mobile {
            margin-top: -1rem;
        }

        @media (max-width: 640px) {
            .profile-image-mobile {
                width: 6rem;
                height: 6rem;
                margin-top: -2.5rem;
            }
        }
    </style>
</head>

<body class="scroll-smooth min-h-screen bg-gradient-to-br from-white to-indigo-100">

    <x-navbar-supporter-profile />

    <!-- Sampul -->
    <section class="relative">
        <div class="w-full h-[30vh] sm:h-[40vh] md:h-[50vh] bg-gray-300">
            <img src="{{ asset('assets/sampul.jpg') }}" alt="Cover Image" class="w-full h-full object-cover" />
        </div>
    </section>

    <!-- Konten Profil -->
    <section class="relative z-20 -mt-6 sm:-mt-10 md:-mt-20">
        <div class="bg-white border-b border-gray-300 w-full px-4 sm:px-6 md:px-10 lg:px-32 py-4 sm:py-6 md:py-8 rounded-none">

            <!-- Desktop -->
            <div class="hidden md:block">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="flex items-start gap-5">
                        <img src="{{ asset('assets/pp.png') }}" alt="Profile Picture"
                            class="w-44 h-44 rounded-full border-8 border-white object-cover -mt-24" />

                        <div class="flex flex-col -mt-4 gap-1">
                            <span class="text-gray-700 text-xs">@Nayla_Cutelyn</span>
                            <h1 class="text-2xl font-bold text-gray-900">Rania Arunika</h1>
                            <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1">
                                <span>2K Like</span>
                                <span>&bull;</span>
                                <span>278 Supports</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col -mt-1.5 gap-3 items-start md:items-end ml-auto">
                        <button class="group relative overflow-hidden bg-[#F2F4FC] hover:bg-white 
        rounded-full px-8 py-3 text-gray-700 font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-indigo-100 
        hover:-translate-y-1 flex items-center gap-2">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-200/10 to-indigo-300/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></div>
                            <div class="relative z-10 flex items-center gap-2 text-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Data
                            </div>
                        </button>

                        <button id="withdrawalBtn" class="group relative overflow-hidden bg-indigo-500 hover:bg-indigo-600 
        rounded-full px-6 py-3.5 text-white font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/30 
        hover:-translate-y-1 flex items-center gap-2">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></div>
                            <div class="relative z-10 flex items-center gap-2 text-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                                Withdrawal
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Bio -->
                <div class="mt-2">
                    <div class="flex items-center gap-3">
                        <button class="px-4 py-1 border rounded-full text-sm font-medium bg-gray-100 text-gray-600">Bio</button>
                        <p class="text-sm text-gray-500">"Aku suka gambar cewek-cewek lucu dan dreamy vibes (⁄ ⁄>⁄ ▽ ⁄<⁄ ⁄)"</p>
                    </div>
                </div>

                <!-- Tab -->
                <div class="mt-8 border-b border-gray-300 flex gap-10 text-sm font-medium text-gray-500">
                    <button class="text-indigo-600 border-b-2 border-green-400 pb-2">Portofolio</button>
                    <button class="hover:text-indigo-600 transition">About</button>
                </div>
            </div>

            <!-- Mobile -->
            <div class="block md:hidden">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('assets/pp.png') }}" alt="Profile Picture"
                        class="profile-image-mobile rounded-full border-4 border-white object-cover mb-3" />

                    <div class="flex flex-col gap-1 mb-4">
                        <span class="text-gray-700 text-xs">@Nayla_Cutelyn</span>
                        <h1 class="text-xl font-bold text-gray-900">Nayla Evelyn</h1>
                        <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1 justify-center">
                            <span>2k Like</span>
                            <span>&bull;</span>
                            <span>278 Supports</span>
                        </div>
                    </div>

                    <div class="flex gap-3 w-full max-w-sm mb-4">
                        <button class="flex items-center justify-center gap-2 flex-1 py-2.5 px-4 rounded-full text-gray-700 bg-[#F2F4FC] hover:bg-[#e6e9f6] transition text-sm">
                            <img src="/assets/icon/like.png" alt="Like Icon" class="w-5 h-5" />
                            Like Me
                        </button>

                        <button id="donateBtnMobile" class="flex items-center justify-center gap-2 flex-1 py-2.5 px-4 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition font-semibold text-sm">
                            <img src="/assets/icon/donate.png" alt="Donate Icon" class="w-5 h-5" />
                            Donate
                        </button>
                    </div>

                    <div class="w-full">
                        <div class="flex flex-col gap-2 text-center">
                            <button class="px-3 py-1 border rounded-full text-xs font-medium bg-gray-100 text-gray-600 self-center">Bio</button>
                            <p class="text-sm text-gray-500 px-2">"I'm digital artist who draws cute girls & soft vibes~ Let's make magic together~ (๑>ᴗ<)♡"< /p>
                        </div>
                    </div>

                    <div class="mt-6 border-b border-gray-300 flex gap-8 text-sm font-medium text-gray-500 w-full justify-center">
                        <button class="text-indigo-600 border-b-2 border-green-400 pb-2">Portofolio</button>
                        <button class="hover:text-indigo-600 transition">About</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="w-full h-56 bg-blue-50 py-4 text-center"></div>

    {{-- Komponen dummy biar ga error --}}
    <div id="donateModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg max-w-md w-full">
            <h2 class="text-xl font-semibold mb-4">Donate to Nayla Evelyn</h2>
            <p class="text-sm text-gray-500 mb-4">Fitur ini akan segera hadir~ makasih ya udah support ♡</p>
            <button onclick="document.getElementById('donateModal').classList.add('hidden'); document.body.style.overflow = 'auto';"
                class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                Close
            </button>
        </div>
    </div>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const donateBtn = document.getElementById('donateBtn');
            const donateBtnMobile = document.getElementById('donateBtnMobile');
            const donateModal = document.getElementById('donateModal');

            function openDonateModal() {
                donateModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            if (donateBtn) donateBtn.addEventListener('click', openDonateModal);
            if (donateBtnMobile) donateBtnMobile.addEventListener('click', openDonateModal);
        });
    </script>

</body>

</html>