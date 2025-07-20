<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-6px);
        }
    }

    .step-line {
        position: relative;
    }

    .step-line::after {
        content: '';
        position: absolute;
        top: 50%;
        right: -2rem;
        width: 1.5rem;
        height: 1px;
        background: linear-gradient(90deg, #e5e7eb, transparent);
        transform: translateY(-50%);
    }

    @media (max-width: 768px) {
        .step-line::after {
            display: none;
        }
    }
</style>

<!-- Section 2: How It Works -->
<section class="light-section py-12 lg:py-14 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full text-xs font-medium mb-4">
                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Cara Kerja Platform
            </div>
            <h2 class="text-2xl md:text-3xl lg:text-3xl font-bold text-gray-900 mb-3">
                Bagaimana <span class="gradient-text">RaiseMeUp</span> Bekerja?
            </h2>
            <p class="text-base text-gray-600 max-w-xl mx-auto leading-relaxed">
                Platform yang memudahkan Anda mendukung kreator favorit dengan cara yang sederhana dan aman
            </p>
        </div>

        <!-- Steps -->
        <div class="grid md:grid-cols-3 gap-6 lg:gap-8 relative">
            <!-- Step 1 -->
            <div class="flex flex-col items-center text-center group step-line">
                <div class="relative mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-500 floating-animation">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div
                        class="absolute -top-0.5 -right-0.5 w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-xs shadow-md">
                        1
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Temukan Kreator</h3>
                <p class="text-gray-600 leading-relaxed text-sm max-w-xs">
                    Cari kreator favorit atau temukan talenta baru yang menginspirasi melalui platform kami
                </p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center text-center group step-line">
                <div class="relative mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-500 floating-animation"
                        style="animation-delay: 2s">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                    </div>
                    <div
                        class="absolute -top-0.5 -right-0.5 w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-xs shadow-md">
                        2
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Pilih Dukungan</h3>
                <p class="text-gray-600 leading-relaxed text-sm max-w-xs">
                    Tentukan nominal dukungan dengan berbagai pilihan paket yang tersedia
                </p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center text-center group">
                <div class="relative mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-500 floating-animation"
                        style="animation-delay: 4s">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div
                        class="absolute -top-0.5 -right-0.5 w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-xs shadow-md">
                        3
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Inspirasi Terkirim</h3>
                <p class="text-gray-600 leading-relaxed text-sm max-w-xs">
                    Dukungan langsung sampai kepada kreator dan membantu mereka berkarya lebih baik
                </p>
            </div>
        </div>

       
    </div>
</section>

<div class="px-12">
    <div class="w-full h-px bg-gray-300 my-6"></div>
</div>

<!-- Section 3: Why Choose RaiseMeUp -->
<section class="light-section py-12 lg:py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center bg-violet-50 text-violet-600 px-3 py-1.5 rounded-full text-xs font-medium mb-4">
                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Keunggulan Platform
            </div>
            <h2 class="text-2xl md:text-3xl lg:text-3xl font-bold text-gray-900 mb-3">
                Kenapa Pilih <span class="gradient-text">RaiseMeUp</span>?
            </h2>
            <p class="text-base text-gray-600 max-w-xl mx-auto leading-relaxed">
                Platform donasi terpercaya dengan fitur lengkap untuk mendukung ekosistem kreator Indonesia
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            <!-- Feature 1 -->
            <div
                class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-50 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-1.5">100% Aman</h3>
                <p class="text-gray-600 text-xs leading-relaxed">Transaksi dilindungi enkripsi tingkat bank dengan
                    sistem keamanan berlapis</p>
            </div>

            <!-- Feature 2 -->
            <div
                class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-1.5">Proses Cepat</h3>
                <p class="text-gray-600 text-xs leading-relaxed">Dukungan langsung sampai ke kreator dalam hitungan
                    detik setelah konfirmasi</p>
            </div>

            <!-- Feature 3 -->
            <div
                class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-violet-100 to-violet-50 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-1.5">Biaya Minimal</h3>
                <p class="text-gray-600 text-xs leading-relaxed">Fee transaksi sangat rendah, lebih banyak dukungan
                    sampai ke kreator</p>
            </div>

            <!-- Feature 4 -->
            <div
                class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-amber-100 to-amber-50 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-1.5">24/7 Support</h3>
                <p class="text-gray-600 text-xs leading-relaxed">Tim dukungan siap membantu kapan saja melalui berbagai
                    channel komunikasi</p>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-gradient-to-r from-blue-600 via-violet-600 to-purple-600 rounded-2xl p-6 lg:p-8 text-white">
            <div class="grid sm:grid-cols-3 gap-6 text-center">
                <div class="space-y-1">
                    <div class="text-2xl lg:text-3xl font-bold">10K+</div>
                    <div class="text-blue-100 text-xs">Kreator Terdaftar</div>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl lg:text-3xl font-bold">50K+</div>
                    <div class="text-blue-100 text-xs">Supporter Aktif</div>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl lg:text-3xl font-bold">5M+</div>
                    <div class="text-blue-100 text-xs">Total Dukungan</div>
                </div>
            </div>
        </div>
    </div>
</section>