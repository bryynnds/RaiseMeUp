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
            /* blue-600 */
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.25);
            /* soft shadow */
        }
    </style>
</head>

<body class="scroll-smooth min-h-screen bg-gradient-to-br from-white to-indigo-100">

    <x-navbar-supporter-explorer />

    <!-- Hero Section -->
    <section class="pt-28 pb-14 text-center px-4">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
            Discover <span class="text-indigo-500">Amazing</span> Creator<span class="text-indigo-500">.</span>
        </h1>

        <div class="mt-3 text-gray-600 font-medium text-xs sm:text-sm">
            Failure 99% hanyalah angka, Ragumu Rugimu – Hashire HASHIREE~
        </div>

        <!-- Searchbar -->
        <div class="mt-6 max-w-xl mx-auto">
            <input type="text" id="searchInput" placeholder="Cari Kreator Favoritmu"
                class="w-full px-5 py-3 rounded-full placeholder-gray-400 text-gray-700 text-sm font-medium focus:outline-none" />
        </div>

        <!-- Filter Buttons -->
        <div id="filterGroup" class="mt-4 flex flex-wrap justify-center gap-2 sm:gap-3">
            <button
                class="filter-btn active px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-semibold shadow-lg hover:bg-blue-700 transition-all duration-300">
                All
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300"
                data-role="Artist">
                Artist
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300"
                data-role="Streamer">
                Streamer
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300"
                data-role="Penulis">
                Penulis
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300"
                data-role="Musisi">
                Musisi
            </button>
        </div>
    </section>

    <section class="px-4 pb-20">
        <div id="creatorContainer"
            class="max-w-4xl mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-8 md:gap-x-4">
            @include('components.creator-cards', ['creators' => $creators])
        </div>

        <div class="flex justify-center mt-10">
            <button id="loadMoreBtn"
                class="flex items-center gap-2 px-4 py-3 bg-white text-blue-600 border border-blue-500 hover:bg-blue-600 hover:text-white transition-all duration-300 rounded-xl shadow-sm hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 transition-transform duration-300 group-hover:translate-y-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <span class="font-semibold text-xs">Load More</span>
            </button>
        </div>
    </section>

    <x-footer />

    <!-- Pass data dari Blade ke JavaScript menggunakan meta tag -->
    <meta name="has-more-pages" content="{{ $creators->hasMorePages() ? '1' : '0' }}">

    <script>
        let currentPage = 1;
        let currentJob = 'all';
        let currentSearch = '';

        const container = document.getElementById("creatorContainer");
        const loadMoreBtn = document.getElementById("loadMoreBtn");
        const filterButtons = document.querySelectorAll(".filter-btn");
        const searchInput = document.getElementById("searchInput");

        // Ambil data dari meta tag
        const hasMorePages = document.querySelector('meta[name="has-more-pages"]').content === '1';

        function fetchCreators(page = 1, job = 'all', search = '') {
            const params = new URLSearchParams({
                page,
                job,
                search
            });

            fetch(`/explorer-creator?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (page === 1) {
                        container.innerHTML = data.html;
                    } else {
                        container.insertAdjacentHTML('beforeend', data.html);
                    }

                    if (!data.hasMore) {
                        loadMoreBtn.style.display = "none";
                    } else {
                        loadMoreBtn.style.display = "inline-flex";
                    }
                })
                .catch(error => {
                    console.error('Error fetching creators:', error);
                });
        }

        let searchTimeout;
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    currentSearch = searchInput.value;
                    currentPage = 1;
                    fetchCreators(currentPage, currentJob, currentSearch);
                }, 300); // debounce delay
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            // Filter button click
            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterButtons.forEach(b => b.classList.remove('active', 'bg-blue-600',
                        'text-white', 'shadow-lg'));
                    btn.classList.add('active', 'bg-blue-600', 'text-white', 'shadow-lg');

                    currentPage = 1;
                    currentJob = btn.dataset.role || 'all';
                    fetchCreators(currentPage, currentJob, currentSearch);
                });
            });

            // Load More click
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', () => {
                    currentPage++;
                    fetchCreators(currentPage, currentJob, currentSearch);
                });
            }

            // Initialize Load More button state
            if (!hasMorePages && loadMoreBtn) {
                loadMoreBtn.style.display = "none";
            }
        });
    </script>
</body>

</html>