<div x-data="{ open: false }" class="relative">
    <!-- Ikon Notif -->
    <div @click="open = !open" class="cursor-pointer hover:scale-110 transition-transform duration-300 notification-icon relative" id="notificationIcon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="transition-all duration-300">
            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
        </svg>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">3</span>
    </div>

    <!-- Dropdown -->
    <div
        x-show="open"
        x-cloak
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-1"
        class="absolute left-0 mt-6 w-80 bg-white shadow-2xl rounded-xl overflow-hidden z-50 border border-gray-100 backdrop-blur-sm">

        <!-- Header -->
        <div class="px-5 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200/50">
            <h3 class="text-sm font-semibold text-gray-900 tracking-wide">Notifikasi</h3>
        </div>

        <!-- Notif List -->
        <div class="max-h-80 overflow-y-auto scrollbar-thin scrollbar-track-gray-100 scrollbar-thumb-gray-300">
            <div class="divide-y divide-gray-100">
                <div class="group flex items-center justify-between gap-4 px-5 py-4 hover:bg-gray-50/80 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center gap-3 flex-1 min-w-0">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-sm">🎉</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 font-medium truncate">Mendapatkan Rp 20.000</p>
                            <p class="text-xs text-gray-500">dari User A</p>
                        </div>
                    </div>
                    <!-- Dikasih class pengecualian -->
                    <a href="#" class="not-navbar-color flex-shrink-0 text-xs font-medium text-blue-600 hover:text-blue-800 px-3 py-1.5 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                        Lihat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    #navbar .not-navbar-color {
        color: #2563eb !important;

    }

</style>