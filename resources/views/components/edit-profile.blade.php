<!-- Compact Modern Edit Profile Modal -->
<div id="editProfileModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-md z-[999] flex items-center justify-center p-4 hidden opacity-0 transition-all duration-300">
    <div
        class="bg-white/95 backdrop-blur-sm w-full max-w-4xl h-[85vh] rounded-2xl shadow-2xl relative overflow-hidden transform scale-95 transition-all duration-300">
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
            <p class="text-white/80 text-sm mt-1">Update your account & add portfolio</p>
        </div>

        <!-- Content -->
        <div class="flex h-[calc(85vh-140px)]">
            <!-- Left Side - Portfolio -->
            <div class="flex-1 p-6 space-y-4">
                <div class="flex items-center gap-2 mb-4">
                    <div
                        class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Add Portfolio</h3>
                </div>

                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Project Name</label>
                        <input type="text"
                            class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="My Awesome Project">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Upload File</label>
                        <div
                            class="relative border-2 border-dashed border-gray-200 rounded-lg p-4 text-center hover:border-purple-300 transition-all bg-gray-50/50 hover:bg-purple-50/50">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <svg class="w-6 h-6 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <div class="text-xs text-gray-600">
                                <span class="text-purple-600 font-medium">Click</span> or drag files
                            </div>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, PDF • Max 10MB</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Description</label>
                        <textarea
                            class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"
                            rows="3" placeholder="Describe your project..."></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <!-- Modern Custom Dropdown -->
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Category</label>
                            <div class="dropdown-container">
                                <button type="button"
                                    class="dropdown-button w-full px-3 py-2 text-sm text-left rounded-lg flex items-center justify-between"
                                    onclick="toggleDropdown()">
                                    <span id="selectedOption" class="text-gray-500">Select category</span>
                                    <svg class="chevron w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div id="dropdownMenu"
                                    class="dropdown-menu absolute bottom-full left-0 right-0 mt-1 py-1 rounded-lg z-10">
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('🎨 Digital Art')">
                                        <span class="text-lg">🎨</span>
                                        <span class="text-sm">Digital Art</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('🎵 Music')">
                                        <span class="text-lg">🎵</span>
                                        <span class="text-sm">Music</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('🎭 3D Art')">
                                        <span class="text-lg">🎭</span>
                                        <span class="text-sm">3D Art</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('💻 Web Dev')">
                                        <span class="text-lg">💻</span>
                                        <span class="text-sm">Web Development</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('✍️ Writer')">
                                        <span class="text-lg">✍️</span>
                                        <span class="text-sm">Writing</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('📸 Photo')">
                                        <span class="text-lg">📸</span>
                                        <span class="text-sm">Photography</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('🎬 Animation')">
                                        <span class="text-lg">🎬</span>
                                        <span class="text-sm">Animation</span>
                                    </div>
                                    <div class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2"
                                        onclick="selectOption('📱 UI/UX')">
                                        <span class="text-lg">📱</span>
                                        <span class="text-sm">UI/UX Design</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Demo URL</label>
                            <input type="url" class="input-field w-full px-3 py-2 text-sm rounded-lg"
                                placeholder="https://">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Divider -->
            <div class="w-px bg-gradient-to-b from-transparent via-gray-300 to-transparent my-6"></div>

            <!-- Right Side - Account Info -->
            <div class="flex-1 p-6 space-y-4">
                <div class="flex items-center gap-2 mb-4">
                    <div
                        class="w-6 h-6 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 text-sm">Account Info</h3>
                </div>

                <div class="space-y-3">
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

                    <div class="flex justify-end gap-3 pt-4">
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
    /* Custom dropdown styles */
    .dropdown-container {
        position: relative;
    }

    .dropdown-button {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 1.5px solid #e2e8f0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .dropdown-button:hover {
        border-color: #c084fc;
        box-shadow: 0 4px 12px rgba(192, 132, 252, 0.15), 0 2px 4px rgba(0, 0, 0, 0.06);
        transform: translateY(-1px);
    }

    .dropdown-button:focus {
        border-color: #a855f7;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1), 0 4px 12px rgba(192, 132, 252, 0.15);
        outline: none;
    }

    .dropdown-menu {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.95);
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        max-height: none;
        overflow-y: visible;
    }

    .dropdown-menu.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
    }

    .dropdown-option {
        transition: all 0.15s ease;
        position: relative;
        overflow: hidden;
    }

    .dropdown-option::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.1), transparent);
        transition: left 0.5s;
    }

    .dropdown-option:hover::before {
        left: 100%;
    }

    .dropdown-option:hover {
        background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        color: #7c3aed;
        transform: translateX(2px);
    }

    .chevron {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .chevron.rotate {
        transform: rotate(180deg);
    }

    .input-field {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 1.5px solid #e2e8f0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-field:hover {
        border-color: #c084fc;
        box-shadow: 0 4px 12px rgba(192, 132, 252, 0.15), 0 2px 4px rgba(0, 0, 0, 0.06);
        transform: translateY(-1px);
    }

    .input-field:focus {
        border-color: #a855f7;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1), 0 4px 12px rgba(192, 132, 252, 0.15);
        outline: none;
    }

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

    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        const chevron = document.querySelector('.chevron');

        menu.classList.toggle('open');
        chevron.classList.toggle('rotate');
    }

    function selectOption(value) {
        document.getElementById('selectedOption').textContent = value;
        document.getElementById('selectedOption').classList.remove('text-gray-500');
        document.getElementById('selectedOption').classList.add('text-gray-800');

        // Close dropdown
        document.getElementById('dropdownMenu').classList.remove('open');
        document.querySelector('.chevron').classList.remove('rotate');
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

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdown = document.querySelector('.dropdown-container');
            if (dropdown && !dropdown.contains(event.target)) {
                document.getElementById('dropdownMenu').classList.remove('open');
                document.querySelector('.chevron').classList.remove('rotate');
            }
        });

        // File upload feedback
        const fileInput = document.querySelector('input[type="file"]');
        if (fileInput) {
            fileInput.addEventListener('change', function (e) {
                const fileName = e.target.files[0]?.name;
                if (fileName) {
                    const uploadArea = e.target.parentElement;
                    const textElement = uploadArea.querySelector('.text-xs');
                    textElement.innerHTML = `<span class="text-green-600 font-medium">📄 ${fileName}</span>`;
                    uploadArea.classList.add('border-green-300', 'bg-green-50');
                }
            });
        }
    });

    // ESC key to close modal and dropdown
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            // Close modal
            if (!document.getElementById('editProfileModal').classList.contains('hidden')) {
                toggleEditProfileModal();
            }
            // Close dropdown
            const menu = document.getElementById('dropdownMenu');
            if (menu && menu.classList.contains('open')) {
                menu.classList.remove('open');
                document.querySelector('.chevron').classList.remove('rotate');
            }
        }
    });
</script>