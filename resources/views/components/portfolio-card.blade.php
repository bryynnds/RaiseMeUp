@props(['creator', 'portfolio'])

<section class="w-full bg-gradient-to-br from-slate-50 to-blue-50 py-12 px-8 sm:px-16 lg:px-24 xl:px-32">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- About Me & Social Media - 1 kolom -->
        <div class="lg:col-span-1">
            <div
                class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 p-6 sticky top-8 hover:shadow-xl transition-all duration-300">
                <div class="text-center mb-6">
                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mx-auto mb-3 flex items-center justify-center shadow-lg">
                            <span class="text-lg font-bold text-white">NE</span>
                        </div>
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full blur opacity-20 animate-pulse">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $creator->nickname }}</h3>
                    <p class="text-sm text-indigo-600 font-medium">{{ $creator->job }}</p>
                </div>

                <div class="space-y-4">
                    <div class="text-center">
                        <p class="text-gray-600 text-xs leading-relaxed italic">
                            "{{ $creator->bio }}"
                        </p>
                    </div>

                    <!-- Social Media - Compact Version -->
                    <div class="space-y-2 pt-4 border-t border-gray-100">
                        <h4 class="text-xs font-semibold text-gray-800 mb-3">Mari Terhubung</h4>

                        <a href="#"
                            class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 transition-all duration-300 group border border-blue-100">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 text-xs">Twitter</div>
                                <div class="text-xs text-gray-500"><span>@</span>{{ $creator->twitter_url ?? "-" }}
                                </div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-indigo-50 to-indigo-100 hover:from-indigo-100 hover:to-indigo-200 transition-all duration-300 group border border-indigo-100">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 text-xs">Facebook</div>
                                <div class="text-xs text-gray-500">{{ $creator->facebook_url ?? "-" }}</div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-red-50 to-red-100 hover:from-red-100 hover:to-red-200 transition-all duration-300 group border border-red-100">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a2.998 2.998 0 00-2.112-2.12C19.382 3.5 12 3.5 12 3.5s-7.382 0-9.386.566A2.998 2.998 0 00.502 6.186 31.287 31.287 0 000 12a31.287 31.287 0 00.502 5.814 2.998 2.998 0 002.112 2.12C4.618 20.5 12 20.5 12 20.5s7.382 0 9.386-.566a2.998 2.998 0 002.112-2.12A31.287 31.287 0 0024 12a31.287 31.287 0 00-.502-5.814zM9.75 15.02V8.98L15.5 12l-5.75 3.02z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 text-xs">YouTube</div>
                                <div class="text-xs text-gray-500">{{ $creator->youtube_url ?? "-" }}</div>
                            </div>
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 p-3 rounded-lg bg-gradient-to-r from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 transition-all duration-300 group border border-pink-100">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7.5 2A5.5 5.5 0 002 7.5v9A5.5 5.5 0 007.5 22h9a5.5 5.5 0 005.5-5.5v-9A5.5 5.5 0 0016.5 2h-9zM12 7a5 5 0 110 10 5 5 0 010-10zm6.25-1.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5zM12 9a3 3 0 100 6 3 3 0 000-6z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 text-xs">Instagram</div>
                                <div class="text-xs text-gray-500"><span>@</span>{{ $creator->instagram_url ?? "-" }}
                                </div>
                            </div>
                        </a>


                    </div>
                </div>
            </div>
        </div>



        <!-- Featured Portfolio & Stats - 2 kolom -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Box Info: Belum Ada Portofolio -->
            <div
                class="bg-white/80 backdrop-blur-sm rounded-2xl border border-dashed border-gray-300 p-6 shadow-sm hover:shadow-md transition-all duration-300 min-h-[300px] flex items-center justify-center text-center">
                <div class="flex flex-col items-center justify-center space-y-3">
                    <h3 class="text-gray-800 font-semibold text-base">Belum ada portofolio</h3>
                    <p class="text-sm text-gray-500 max-w-xs mx-auto">
                        Pengguna ini belum menambahkan karya apapun ke dalam portofolionya.
                    </p>
                </div>
            </div>
            <!-- Featured Work -->
            <div
                class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 overflow-hidden hover:shadow-xl transition-all duration-500">
                <div class="p-6 pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-900">Featured Work</h2>
                        <span
                            class="px-3 py-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-medium rounded-full shadow-sm">Latest</span>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="relative overflow-hidden aspect-[16/10] mx-6 rounded-xl">
                    <img src="{{ $portfolio->img }}"
                        alt="Sakura Dreams"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />

                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>

                    <!-- Play button overlay -->
                    {{-- <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <div
                            class="w-16 h-16 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform cursor-pointer">
                            <svg class="w-6 h-6 text-gray-700 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div> --}}
                </div>

                <!-- Content -->
                <div class="p-6 pt-4">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $portfolio->judul }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        {{ $portfolio->deskripsi }}
                    </p>
                    <div class="border-t border-gray-200 my-2"></div>
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-2 border-gray-100">
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-full text-xs font-medium
    text-gray-400 bg-gray-100  hover:shadow-md
    transition-shadow duration-300">

                                #{{ $portfolio->tag }}
                            </span>
                        </div>



                        <!-- Tombol View Full tetap -->
                        <a href="{{ $portfolio->url }}" target="_blank"
                            class="flex items-center font-semibold gap-2 px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5">
                            <span>Open</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                         </a>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* Glassmorphism enhancement */
    .backdrop-blur-sm {
        backdrop-filter: blur(8px);
    }

    /* Smooth scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #6366f1, #8b5cf6);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #4f46e5, #7c3aed);
    }

    /* Custom animations */
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out forwards;
    }
</style>

<script>
    // Initialize animations
    document.addEventListener('DOMContentLoaded', () => {
        // Add entrance animations
        const cards = document.querySelectorAll('[class*="bg-white/80"]');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fade-in');
        });

        // Add hover effects for interactive elements
        const buttons = document.querySelectorAll('button, a');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.style.transform = 'translateY(-2px)';
            });
            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translateY(0)';
            });
        });
    });
</script>