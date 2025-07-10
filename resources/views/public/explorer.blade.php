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

        #navbar a,
        #navbar span,
        #userIcon {
            transition: all 0.3s ease;
        }

        .nav-icon {
            transition: filter 0.3s ease;
        }

        .filter-btn.active {
            background-color: #2563eb;
            /* blue-600 */
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.25);
            /* soft shadow */
        }

        #navbar .inner {
            padding-top: 1rem;
            padding-bottom: 1rem;
            transition: padding 0.3s ease;
        }

        #navbar.shrink .inner {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        /* Ukuran konten navbar */
        #navbar .navbar-content {
            height: 5rem;
        }

        #navbar.shrink .navbar-content {
            height: 3.5rem;
        }

        /* Kecilkan logo dan teks saat shrink */
        #navbar.shrink .logo {
            width: 1.5rem;
            height: 1.5rem;
        }

        #navbar.shrink .brand-text {
            font-size: 1.125rem;
            /* text-lg */
        }

        /* Ukuran normal */
        .explore-text {
            font-size: 0.875rem;
            /* text-sm */
        }

        .explore-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Ukuran kecil saat shrink */
        #navbar.shrink .explore-text {
            font-size: 0.75rem;
            /* text-xs */
        }

        #navbar.shrink .explore-icon {
            width: 1rem;
            height: 1rem;
        }
    </style>
</head>

<body class="scroll-smooth min-h-screen bg-gradient-to-br from-white to-indigo-100">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-gray-800">
        <div class="inner transition-all duration-300 max-w-7xl mx-auto px-8 sm:px-6 lg:px-14">
            <div class="navbar-content flex justify-between items-center h-20 transition-all duration-300">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R"
                        alt="Logo"
                        class="logo w-8 h-8 mr-2 hidden md:block transition-all duration-300" />
                    <span class="brand-text text-2xl lg:px-12 font-protest font-medium transition-all duration-300">
                        RaiseMeUp
                    </span>
                </div>

                <div class="flex space-x-6 items-center">
                    <a href="#explore" class="explore-link font-bold px-2 lg:px-4 text-gray-800 transition-all duration-300">
                        <div class="explore-wrapper flex items-center gap-2 transition-all duration-300">
                            <img src="/assets/icon/launch.png" alt="icon"
                                class="explore-icon w-5 h-5 nav-icon filter invert-0 brightness-0 saturate-0 transition-all duration-300" />
                            <span class="explore-text text-sm transition-all duration-300">Explore</span>
                        </div>
                    </a>


                    <button id="loginBtn"
                        class="w-full text-center text-sm font-bold rounded-md px-2 py-3 bg-white text-gray-700">
                        Log In
                    </button>
                </div>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section class="pt-28 pb-14 text-center px-4">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
            Discover <span class="text-indigo-500">Amazing</span> Creator<span class="text-indigo-500">.</span>
        </h1>

        <div class="mt-3 text-gray-600 font-medium text-xs sm:text-sm">
            Wi Wok De Tok, Not Onle Tok De Tok – Hidup Fisalia!
        </div>


        <!-- Searchbar -->
        <div class="mt-6 max-w-xl mx-auto">
            <input
                type="text"
                placeholder="Cari Kreator Favoritmu"
                class="w-full px-5 py-3 rounded-full placeholder-gray-400 text-gray-700 text-sm font-medium focus:outline-none" />
        </div>

        <!-- Filter Buttons -->
        <div id="filterGroup" class="mt-4 flex flex-wrap justify-center gap-2 sm:gap-3">
            <button
                class="filter-btn active px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-semibold shadow-lg hover:bg-blue-700 transition-all duration-300">
                All
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300">
                Illustrator
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300">
                Streamer
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300">
                Writer
            </button>
            <button
                class="filter-btn px-5 py-2 rounded-full bg-white text-gray-500 text-xs font-semibold shadow hover:shadow-md hover:text-gray-800 transition-all duration-300">
                Musician
            </button>
        </div>
    </section>

    <section class="px-4 pb-20">
        <div id="creatorContainer" class="max-w-4xl mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-8 md:gap-x-4">
            <!-- Card akan dirender otomatis di bawah -->
        </div>
    </section>

    <x-footer />


    <script>
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => {
                    // Reset semua tombol ke default
                    b.classList.remove('active', 'bg-blue-600', 'text-white', 'shadow-lg');
                    b.classList.add('bg-white', 'text-gray-500', 'shadow');
                });

                // Aktifin tombol yang diklik
                btn.classList.remove('bg-white', 'text-gray-500', 'shadow');
                btn.classList.add('active', 'bg-blue-600', 'text-white', 'shadow-lg');
            });
        });
    </script>

    <script>
        const creators = [{
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-blue-500"
            },
            {
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-green-400"
            },
            {
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-orange-400"
            },
            {
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-red-500"
            },
            {
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-pink-400"
            },
            {
                name: "Nayla Evelyn",
                role: "Artist",
                bio: "Creating vibrant digital art inspired by nature and urban landscapes. ✨",
                image: "https://via.placeholder.com/80x80.png?text=NE",
                color: "bg-rose-400"
            }
        ];

        const container = document.getElementById("creatorContainer");

        creators.forEach(creator => {
            const card = document.createElement("div");
            card.className = `rounded-2xl overflow-hidden bg-white shadow-md hover:shadow-xl transition-all duration-300`;

            card.innerHTML = `
      <div class="${creator.color} h-20 relative">
        <div class="absolute inset-x-0 -bottom-8 flex justify-center">
          <img src="${creator.image}" alt="${creator.name}" class="w-16 h-16 rounded-full border-4 border-white object-cover shadow-md" />
        </div>
      </div>
      <div class="pt-10 pb-6 px-5 text-center">
        <span class="inline-block text-[10px] font-semibold text-white bg-gray-800 px-2 py-1 rounded-full mb-2">${creator.role}</span>
        <h3 class="text-sm font-semibold text-gray-800">${creator.name}</h3>
        <p class="text-xs text-gray-600 mt-1">${creator.bio}</p>
        <button class="mt-4 text-xs font-semibold bg-blue-500 hover:bg-blue-600 text-white py-2 px-5 rounded-full transition-all duration-300">
          View
        </button>
      </div>
    `;

            container.appendChild(card);
        });
    </script>

    <script>
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;
            if (scrollY > 10) {
                navbar.classList.add("bg-white", "border", "backdrop-blur-sm", "shrink");
            } else {
                navbar.classList.remove("bg-white", "border", "backdrop-blur-sm", "shrink");
            }
        });
    </script>





</body>




</html>