<div id="editProfileModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-md z-[999] flex items-center justify-center p-4 hidden opacity-0 transition-all duration-300">
    <div
        class="bg-white/95 backdrop-blur-sm w-full max-w-sm h-auto rounded-2xl shadow-2xl relative overflow-hidden transform scale-95 transition-all duration-300">
        <!-- Header -->
        <div class="bg-gradient-to-r from-violet-600 via-purple-600 to-fuchsia-600 px-6 py-4 relative">
            <button onclick="toggleEditProfileModal()"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/30 text-white transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Profile
            </h2>
            <p class="text-white/80 text-sm mt-1">Update your account information</p>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Account Info -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-6">
                    <div
                        class="w-6 h-6 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Account Info</h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Username</label>
                        <input type="text"
                            class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all"
                            placeholder="your_username">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Display Name</label>
                        <input type="text"
                            class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all"
                            placeholder="Your Name">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Bio</label>
                        <textarea
                            class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all resize-none"
                            rows="3" placeholder="Tell us about yourself..."></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">New Password</label>
                        <div class="relative">
                            <input type="password"
                                class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all pr-8"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6">
                        <button onclick="toggleEditProfileModal()"
                            class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all">
                            Cancel
                        </button>
                        <button
                            class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-violet-600 to-purple-600 rounded-lg hover:from-violet-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Remove scrollbar completely */
    #editProfileModal * {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    #editProfileModal *::-webkit-scrollbar {
        display: none;
    }

    /* Modal animation states */
    #editProfileModal:not(.hidden) {
        opacity: 1;
    }

    #editProfileModal:not(.hidden)>div {
        transform: scale(1);
    }

    /* Smooth animations */
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>

<script>
    function toggleEditProfileModal() {
        const modal = document.getElementById('editProfileModal');

        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modal.style.opacity = '1';
                modal.querySelector('div').style.transform = 'scale(1)';
            }, 10);
        } else {
            modal.style.opacity = '0';
            modal.querySelector('div').style.transform = 'scale(0.95)';
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.querySelector('button:has(img[src*="edit.svg"])');
        if (editBtn) {
            editBtn.addEventListener('click', toggleEditProfileModal);
        }

        // Close modal on outside click
        document.getElementById('editProfileModal').addEventListener('click', function (e) {
            if (e.target === this) {
                toggleEditProfileModal();
            }
        });
    });

    // ESC key to close modal
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            // Close modal
            if (!document.getElementById('editProfileModal').classList.contains('hidden')) {
                toggleEditProfileModal();
            }
        }
    });
</script>