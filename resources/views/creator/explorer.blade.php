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
    </style>
</head>

<body class="scroll-smooth">

    <!-- Navbar -->
    <nav id="navbar" class="fixed left-0 w-full bg-transparent z-50 text-white">
        <div class="max-w-7xl py-4 mx-auto px-8 sm:px-6 lg:px-14">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/32x32?text=R" alt="Logo" class="w-8 h-8 mr-2 hidden md:block" />
                    <span class="text-2xl lg:px-12 font-protest font-medium">RaiseMeUp</span>
                </div>

                <div class="flex space-x-6 items-center">
                    <a href="#explore" class="font-bold px-2 lg:px-4">
                        <div class="flex items-center gap-2">
                            <img src="/assets/icon/launch.png" alt="icon" class="w-5 h-5 nav-icon" />
                            Explore
                        </div>
                    </a>

                    <button id="userIcon" class="w-full px-1 py-3 bg-white rounded-xl flex items-center justify-center border border-blue-400">
                        <img src="/assets/icon/user.svg" alt="User" class="w-4 h-4" />
                    </button>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>