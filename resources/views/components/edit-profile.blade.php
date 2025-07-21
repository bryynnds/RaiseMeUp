<!-- Compact Modern Edit Profile Modal -->
@props(['creator', 'portfolio', 'tagList', 'jobList'])


<div id="editProfileModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-md z-[999] flex items-center justify-center p-4 hidden opacity-0 transition-all duration-300">
    <div
        class="bg-white/95 backdrop-blur-sm w-full max-w-4xl h-[90vh] rounded-2xl shadow-2xl relative overflow-hidden transform scale-95 transition-all duration-300">
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
        <form action="{{ route('profile.portfolio.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                            <input type="text" name="judul" value="{{ old('judul', $portfolio->judul ?? '') }}"
                                class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="My Awesome Project">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Upload File</label>
                            <div
                                class="relative border-2 border-dashed border-gray-200 rounded-lg p-8 text-center hover:border-purple-300 transition-all bg-gray-50/50 hover:bg-purple-50/50">
                                <input type="file" name="img" accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
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
                            <textarea name="deskripsi_portfolio"
                                class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"
                                rows="3" placeholder="Describe your project...">{{ old('deskripsi_portfolio', $portfolio->deskripsi ?? '') }}</textarea>
                        </div>

                        <input type="hidden" name="tag" id="categoryInput" value="{{ $portfolio->tag ?? '' }}">

                        <div class="grid grid-cols-2 gap-3">
                            <!-- Modern Custom Dropdown Category -->
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Category</label>
                                <div class="dropdown-container">
                                    <button type="button" onclick="toggleDropdown('category')"
                                        class="dropdown-button w-full px-3 py-2 text-sm text-left rounded-lg flex items-center justify-between"
                                        onclick="toggleDropdown('category')">
                                        <span id="selectedCategoryOption"
                                            class="{{ $portfolio->tag ? 'text-gray-800' : 'text-gray-500' }}">{{ $portfolio->tag ?? 'Pilih Kategori' }}</span>
                                        <svg class="chevron w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    <div id="categoryDropdownMenu"
                                        class="dropdown-menu absolute bottom-full left-0 right-0 mt-1 py-1 rounded-lg z-10">
                                        @foreach ($tagList as $tag)
                                            <div onclick="selectOption('category', '{{ $tag }}')"
                                                class="dropdown-option px-3 py-2 cursor-pointer flex items-center space-x-2">
                                                {{ $tag }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Demo URL</label>
                                <input type="url" name="url" value="{{ old('url', $portfolio->url ?? '') }}"
                                    class="input-field w-full px-3 py-2 text-sm rounded-lg" placeholder="https://">
                            </div>
                        </div>
                    </div>
        </form>
    </div>

    <!-- Center Divider -->
    <div class="w-px bg-gradient-to-b from-transparent via-gray-300 to-transparent my-6"></div>

    <!-- Right Side - Account Info -->
    <div class="flex-1 p-6 space-y-4">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
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
                <input type="text" name="username" value="{{ old('username', auth()->user()->name) }}"
                    class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all"
                    placeholder="your_username">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Display Name</label>
                <input type="text" name="nickname" value="{{ old('nickname', $creator->nickname) }}"
                    class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all"
                    placeholder="Your Name">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Bio</label>
                <textarea name="bio"
                    class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all resize-none"
                    rows="1" placeholder="Tell us about yourself...">{{ old('bio', $creator->bio) }}</textarea>
            </div>

            <div class="mt-3">
                <label class="block text-xs font-medium text-gray-600 mb-1">Deskripsi</label>
                <textarea name="deskripsi"
                    class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all resize-none"
                    rows="1" placeholder="Tell us about job...">{{ old('deskripsi', $creator->deskripsi) }}</textarea>
            </div>

            <!-- Ganti URL + Dropdown JOB (1 baris) -->
            <div class="mt-3 flex flex-col sm:flex-row sm:items-center sm:gap-3">
                <!-- Button Ganti URL (tinggi lebih kecil) -->
                <button onclick="openUrlModal()" type="button"
                    class="w-full sm:w-auto px-9 py-4 text-xs font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:shadow-md hover:bg-gray-50 active:scale-[0.98] transition-all duration-200">
                    Ganti Social Media
                </button>

                <input type="hidden" name="job" id="jobInput" value="{{ $creator->job }}">

                <!-- Dropdown JOB dengan Padding & Icon Diperbaiki -->
                <div class="relative w-full sm:w-auto mt-2 sm:mt-0">
                    <div class="dropdown-container">
                        <button type="button" onclick="toggleDropdown('job')"
                            class="dropdown-button w-full sm:min-w-[200px] px-5 py-3 text-xs font-semibold text-left rounded-lg flex items-center justify-between"
                            onclick="toggleDropdown('job')">
                            <span id="selectedJobOption"
                                class="{{ $creator->job ? 'text-gray-800' : 'text-gray-500' }}">{{ $creator->job ?? 'Pilih Job' }}</span>
                            <svg class="chevron w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="jobDropdownMenu"
                            class="dropdown-menu absolute bottom-full left-0 right-0 mt-1 py-1 rounded-lg z-10 bg-white shadow-lg">
                            @foreach ($jobList as $job)
                                <div onclick="selectOption('job', '{{ $job }}')"
                                    class="dropdown-option px-3 py-2 cursor-pointer hover:bg-gray-100">
                                    {{ $job }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
            <div class="flex justify-end gap-3 pt-6">
                <button onclick="toggleEditProfileModal()"
                    class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-violet-600 to-purple-600 rounded-lg hover:from-violet-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<x-url :creator="$creator"/>


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

    function toggleDropdown(type) {
        const menu = document.getElementById(type + 'DropdownMenu');
        const button = menu.parentElement.querySelector('.dropdown-button');
        const chevron = button.querySelector('.chevron');

        // Close other dropdown if open
        const otherType = type === 'category' ? 'job' : 'category';
        const otherMenu = document.getElementById(otherType + 'DropdownMenu');
        const otherButton = otherMenu.parentElement.querySelector('.dropdown-button');
        const otherChevron = otherButton.querySelector('.chevron');

        if (otherMenu.classList.contains('open')) {
            otherMenu.classList.remove('open');
            otherChevron.classList.remove('rotate');
        }

        // Toggle current dropdown
        menu.classList.toggle('open');
        chevron.classList.toggle('rotate');
    }

    function selectOption(type, value) {
        const selectedElement = document.getElementById('selected' + type.charAt(0).toUpperCase() + type.slice(1) +
            'Option');
        selectedElement.textContent = value;
        selectedElement.classList.remove('text-gray-500');
        selectedElement.classList.add('text-gray-800');

        const input = document.getElementById(type === 'category' ? 'categoryInput' : 'jobInput');
        if (input) input.value = value;

        // Close dropdown
        const menu = document.getElementById(type + 'DropdownMenu');
        const chevron = menu.parentElement.querySelector('.chevron');
        menu.classList.remove('open');
        chevron.classList.remove('rotate');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.querySelector('button:has(img[src*="edit.svg"])');
        if (editBtn) {
            editBtn.addEventListener('click', toggleEditProfileModal);
        }

        // Close modal on outside click
        document.getElementById('editProfileModal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleEditProfileModal();
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownContainers = document.querySelectorAll('.dropdown-container');
            dropdownContainers.forEach(container => {
                if (!container.contains(event.target)) {
                    const menu = container.querySelector('.dropdown-menu');
                    const chevron = container.querySelector('.chevron');
                    if (menu && menu.classList.contains('open')) {
                        menu.classList.remove('open');
                        chevron.classList.remove('rotate');
                    }
                }
            });
        });

        // File upload feedback
        const fileInput = document.querySelector('input[type="file"]');
        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                if (fileName) {
                    const uploadArea = e.target.parentElement;
                    const textElement = uploadArea.querySelector('.text-xs');
                    textElement.innerHTML =
                        `<span class="text-green-600 font-medium">📄 ${fileName}</span>`;
                    uploadArea.classList.add('border-green-300', 'bg-green-50');
                }
            });
        }
    });

    // ESC key to close modal and dropdown
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close modal
            if (!document.getElementById('editProfileModal').classList.contains('hidden')) {
                toggleEditProfileModal();
            }
            // Close dropdowns
            const menus = document.querySelectorAll('.dropdown-menu.open');
            menus.forEach(menu => {
                const chevron = menu.parentElement.querySelector('.chevron');
                menu.classList.remove('open');
                chevron.classList.remove('rotate');
            });
        }
    });
</script>
