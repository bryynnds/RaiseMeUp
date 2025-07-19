@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

    $role = $user->role ?? null;

    // Tentukan URL foto profil
    $ppUrl = '/default-avatar.png'; // fallback kalau tidak ada

    if ($role === 'kreator' && $user->creatorProfile) {
        $ppUrl = $user->creatorProfile->pp_url ?? $ppUrl;
    } elseif ($role === 'supporter' && $user->supporterProfile) {
        $ppUrl = $user->supporterProfile->pp_url ?? $ppUrl;
    }
@endphp

<div x-data="{ open: false }" class="relative">
    <button @click="open = !open"
        class="relative group w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 p-0.5 hover:scale-105 hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500/30 focus:ring-offset-2">
        <div class="w-full h-full rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center overflow-hidden">
            <img src="{{ $ppUrl }}" alt="Profile Picture"
                class="w-full h-full rounded-full object-cover" />
        </div>
        <!-- Online indicator -->
        <div class="absolute -bottom-0 -right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white shadow-sm"></div>
    </button>

    <div x-show="open" x-cloak @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-1"
        class="absolute right-0 mt-3 w-64 bg-white shadow-2xl rounded-2xl overflow-hidden z-50 border border-gray-100/80 backdrop-blur-sm">

        <!-- User Info Header -->
        <div class="px-4 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 p-0.5">
                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                        <img src="{{ $ppUrl }}" alt="Profile"
                            class="w-full h-full rounded-full object-cover" />
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="not-navbar-color text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name ?? 'Guest' }}</p>
                    <p class="not-navbar-color text-xs text-gray-500 truncate">{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                </div>
            </div>
        </div>

        <!-- Menu Items -->
        <div class="py-2">
            @php
            $isCreator = request()->is('profile-creator') || request()->is('home-creator') || request()->is('explorer-creator');
            @endphp

            <a href="{{ route($isCreator ? 'profile_creator' : 'profile_supporter') }}"
                class="not-navbar-color group flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50/80 hover:text-gray-900 transition-colors duration-200">
                <div class="not-navbar-color w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 group-hover:bg-blue-200 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="not-navbar-color font-medium">Profil</span>
            </a>

            <div class="not-navbar-color group flex items-center gap-3 px-4 py-3 text-sm text-gray-500 cursor-default select-none">
                <div class="not-navbar-color w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <span class="not-navbar-color">Pengaturan</span>
                <span class="not-navbar-color ml-auto text-xs bg-gray-200 text-gray-600 px-2 py-0.5 rounded-full">Beta</span>
            </div>

            <!-- Divider -->
            <div class="my-2 border-t border-gray-200"></div>

            <a href="{{ route('logout') }}"
                class="not-navbar-color group w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50/80 hover:text-red-700 transition-colors duration-200">
                <div class="not-navbar-color w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center text-red-600 group-hover:bg-red-200 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </div>
                <span class="not-navbar-color font-medium">Keluar</span>
            </a>

        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    #navbar .not-navbar-color {
        color: initial !important;
    }
</style>