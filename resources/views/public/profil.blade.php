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

        /* Profile specific styles */
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

    <!-- Include Navbar Component -->
    @include('components.navbar-public-profile')

    <!-- Sampul -->
    <section class="relative">
        <div class="w-full h-[30vh] sm:h-[40vh] md:h-[50vh] bg-gray-300">
            <img src="{{ $creator->fotosampul_url}}"
                alt="Cover Image" class="w-full h-full object-cover" />
        </div>
    </section>

    <!-- Konten Profil -->
    <section class="relative z-20 -mt-6 sm:-mt-10 md:-mt-20">
        <div
            class="bg-white border-b border-gray-300 w-full px-4 sm:px-6 md:px-10 lg:px-32 py-4 sm:py-6 md:py-8 rounded-none">

            <!-- Desktop Layout -->
            <div class="hidden md:block">
                <!-- Atas: Profil Utama -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">

                    <!-- Kiri: Foto & Identitas -->
                    <div class="flex items-start gap-5">
                        <!-- Foto Profil -->
                        <img src="{{ $creator->pp_url }}"
                            alt="Profile Picture"
                            class="w-44 h-44 rounded-full border-8 border-white object-cover -mt-24" />

                        <div class="flex flex-col -mt-4 gap-1">
                            <!-- Username -->
                            <span class="text-gray-700 text-xs"><span>@</span>{{ $user->name }}</span>
                            <!-- Nama -->
                            <h1 class="text-2xl font-bold text-gray-900">{{ $creator->nickname }}</h1>
                            <!-- Stats -->
                            <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1">
                                <span>{{ $likeCount  }} Like</span>
                                <span>&bull;</span>
                                <span>{{ $jumlahSupport }} Supports</span>
                            </div>
                        </div>
                    </div>

                    <!-- Kanan: Tombol -->
                    <div class="flex flex-col -mt-1.5 gap-3 items-start md:items-end ml-auto">
                        <!-- Like Button -->
                        <button
                            class="group relative overflow-hidden bg-[#F2F4FC] hover:bg-white 
               rounded-full px-8 py-3 text-gray-700 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-100 
               hover:-translate-y-1 flex items-center gap-2">
                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-indigo-200/10 to-indigo-300/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
                            </div>
                            <div class="relative z-10 flex items-center gap-2 text-sm">
                                <img src="/assets/icon/like.png" alt="Like Icon" class="w-6 h-6" />
                                Like Me
                            </div>
                        </button>

                        <!-- Donate Button -->
                        <button id="donateBtn"
                            class="group relative overflow-hidden bg-indigo-500 hover:bg-indigo-600 
               rounded-full px-8 py-3 text-white font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/30 
               hover:-translate-y-1 flex items-center gap-2">
                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-white/10 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
                            </div>
                            <div class="relative z-10 flex items-center gap-2 text-sm">
                                <img src="/assets/icon/donate.png" alt="Donate Icon" class="w-6 h-6" />
                                Donate
                            </div>
                        </button>
                    </div>

                </div>

                <!-- Bio -->
                <div class="mt-2">
                    <div class="flex items-center gap-3">
                        <button
                            class="px-4 py-1 border rounded-full text-sm font-medium bg-gray-100 text-gray-600">Bio</button>
                        <p class="text-sm text-gray-500">
                            "{{ $creator->bio }}"
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
                    <img src="{{ $creator->pp_url}}"
                        alt="Profile Picture"
                        class="profile-image-mobile rounded-full border-4 border-white object-cover mb-3" />

                    <!-- Identitas -->
                    <div class="flex flex-col gap-1 mb-4">
                        <!-- Username -->
                        <span class="text-gray-700 text-xs">{{$user->name}}</span>
                        <!-- Nama -->
                        <h1 class="text-xl font-bold text-gray-900">{{$creator->nickname}}</h1>
                        <!-- Stats -->
                        <div class="flex gap-3 text-sm font-normal text-gray-500 mt-1 justify-center">
                            <span>{{$likeCount}} Like</span>
                            <span>&bull;</span>
                            <span>{{$jumlahSupport}} Supports</span>
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
                            <button
                                class="px-3 py-1 border rounded-full text-xs font-medium bg-gray-100 text-gray-600 self-center">Bio</button>
                            <p class="text-sm text-gray-500 px-2">
                                "{{$creator->bio}}" </p>
                        </div>
                    </div>

                    <!-- Tab Navigasi -->
                    <div
                        class="mt-6 border-b border-gray-300 flex gap-8 text-sm font-medium text-gray-500 w-full justify-center">
                        <button class="text-indigo-600 border-b-2 border-green-400 pb-2">Portofolio</button>
                        <button class="hover:text-indigo-600 transition">About</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-portfolio-card />


    <x-donate :creator="$creator" />

    <x-footer />

    <!-- Donate Modal Script -->
    <script>
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