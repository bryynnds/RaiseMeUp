<!-- Modern Photo Upload Modal -->
<div id="ppModal"
    class="fixed inset-0 z-[999] bg-black/60 backdrop-blur-md flex items-center justify-center p-4 hidden transition-all duration-300 ease-out opacity-0">
    <form action="{{ route('supporter.updatePhotos') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div
            class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 max-w-80 w-full transform scale-95 transition-all duration-300 ease-out">

            <!-- Header -->
            <div class="relative p-6 pb-4">
                <button onclick="togglePPModal()"
                    class="absolute top-4 right-4 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-all duration-200 group">
                    <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <div class="text-center">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Update Photos</h2>
                    <p class="text-gray-500 text-sm">Upload your profile and cover photos</p>
                </div>
            </div>

            <!-- Upload Areas -->
            <div class="px-6 space-y-4">
                <!-- Profile Photo -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-900">Profile Photo</label>
                    <div class="relative group">
                        <div
                            class="border-2 border-dashed border-gray-200 hover:border-violet-400 rounded-xl p-4 text-center transition-all duration-200 bg-gray-50/50 hover:bg-violet-50/50">
                            <div
                                class="w-8 h-8 bg-violet-100 rounded-lg mx-auto mb-2 flex items-center justify-center group-hover:bg-violet-200 transition-colors">
                                <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Click to upload profile photo</p>
                            <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                        </div>
                        <input type="file" name="pp_url" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                    </div>
                </div>

                <!-- Cover Photo -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-900">Cover Photo</label>
                    <div class="relative group">
                        <div
                            class="border-2 border-dashed border-gray-200 hover:border-violet-400 rounded-xl p-4 text-center transition-all duration-200 bg-gray-50/50 hover:bg-violet-50/50">
                            <div
                                class="w-8 h-8 bg-violet-100 rounded-lg mx-auto mb-2 flex items-center justify-center group-hover:bg-violet-200 transition-colors">
                                <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Click to upload cover photo</p>
                            <p class="text-xs text-gray-500">PNG, JPG up to 10MB (1920x480)</p>
                        </div>
                        <input type="file" name="fotosampul_url" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="p-6 pt-4">
                <div class="flex gap-3">
                    <button type="button" onclick="togglePPModal()"
                        class="flex-1 px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all duration-200 hover:scale-[1.02]">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-4 text-sm font-semibold text-white bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 rounded-lg transition-all duration-200 hover:scale-[1.02] shadow-lg hover:shadow-xl">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    /* Enhanced transitions for modal */
    #ppModal:not(.hidden) {
        opacity: 1;
    }

    #ppModal:not(.hidden)>div {
        transform: scale(1);
    }

    /* Smooth file input hover effects */
    .group:hover input[type="file"]~div {
        transform: translateY(-1px);
    }
</style>

<script>
    window.togglePPModal = function() {
        const modal = document.getElementById('ppModal');
        if (modal) {
            const isHidden = modal.classList.contains('hidden');

            if (isHidden) {
                // Show modal
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Trigger animations
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0');
                    modal.querySelector('div').classList.remove('scale-95');
                });
            } else {
                // Hide modal with animation
                modal.classList.add('opacity-0');
                modal.querySelector('div').classList.add('scale-95');

                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        }
    }
</script>
