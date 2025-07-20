<div class="px-4 sm:px-6 md:px-10 lg:px-32 py-8 bg-white min-h-screen">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Riwayat Donasi</h1>
            <p class="text-base text-gray-600">Dukungan kamu sangat berarti! 💝</p>
        </div>

        <!-- Donation List -->
        <div id="donationList" class="space-y-8"></div>
    </div>
</div>

<script>
    const donations = [
        {
            nama: "Nayla Evelyn",
            username: "@nayla_art",
            tanggal: "12 Juli 2025",
            jam: "14:30 WIB",
            amount: "Rp 20.000",
            gradient: "from-purple-500 to-pink-500"
        },
        {
            nama: "Nayla Evelyn",
            username: "@nayla_art",
            tanggal: "12 Juli 2025",
            jam: "14:30 WIB",
            amount: "Rp 20.000",
            gradient: "from-blue-500 to-cyan-500"
        },
        
        {
            nama: "Nayla Evelyn",
            username: "@nayla_art",
            tanggal: "12 Juli 2025",
            jam: "14:30 WIB",
            amount: "Rp 10.000",
            gradient: "from-indigo-500 to-violet-500"
        },
    ];

    const donationList = document.getElementById("donationList");

    donations.forEach((item) => {
        donationList.innerHTML += `
        <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm hover:shadow-lg hover:shadow-gray-200 hover:border-gray-300 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 -mt-4 py-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br ${item.gradient} flex items-center justify-center shadow-md">
                        <span class="text-white font-semibold text-sm">${item.nama.split(' ').map(n => n[0]).join('').slice(0, 2)}</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0 -mt-4 py-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-0.5">${item.nama}</h3>
                            <p class="text-gray-500 text-sm">${item.username}</p>
                            <div class="mt-1 flex items-center gap-1.5 text-xs text-gray-400">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>${item.tanggal}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-gray-900 mb-1">${item.amount}</div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                ✓ Selesai
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 -mx-8 -mb-8 px-8 pb-8 bg-gradient-to-r ${item.gradient} rounded-b-2xl">
                <div class="flex items-center justify-between text-xs mt-4">
                    <span class="text-white font-semibold">Terima kasih atas dukunganmu! ✨</span>
                    <span class="text-white/90">${item.jam}</span>
                </div>
            </div>
        </div>
        `;
    });
</script>