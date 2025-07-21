<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Daftar Creator</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .form-container {
            animation: fadeInUp .6s ease-in-out;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-focus:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, .3);
        }

        .button-hover:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, .3);
            transition: all .3s ease;
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center px-4 py-8 overflow-hidden"
    style="background-image:url('/assets/bg/bg-creator.jpg');">

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden"></div>

    <!-- Dropdown -->
    <ul id="dropdownList"
        class="fixed left-1/2 top-[30%] -translate-x-1/2 z-50 w-full max-w-sm hidden bg-white/30 backdrop-blur-md rounded-md shadow-md border border-white/30 text-white text-sm sm:text-base">
        <li onclick="selectOption('Artist')" class="px-4 py-2 hover:bg-white/70 hover:text-black cursor-pointer">Artist
        </li>
        <li onclick="selectOption('Musisi')" class="px-4 py-2 hover:bg-white/70 hover:text-black cursor-pointer">Musisi
        </li>
        <li onclick="selectOption('Streamer')" class="px-4 py-2 hover:bg-white/70 hover:text-black cursor-pointer">
            Streamer</li>
        <li onclick="selectOption('Penulis')" class="px-4 py-2 hover:bg-white/70 hover:text-black cursor-pointer">
            Penulis</li>
        {{-- <li onclick="selectOption('Lainnya')" class="px-4 py-2 hover:bg-white/70 hover:text-black cursor-pointer">
            Lainnya</li> --}}
    </ul>

    <!-- Form Container -->
    <div
        class="bg-white/10 backdrop-blur-md shadow-xl rounded-2xl w-full max-w-sm p-5 sm:p-6 form-container border border-white/30 relative z-10 scale-[0.97] sm:scale-100">

        <!-- Logo -->
        {{-- <div class="flex justify-center mb-4">
            <img src="https://via.placeholder.com/70x70?text=R" alt="RaiseMeUp Logo"
                class="w-16 h-16 rounded-full shadow-lg ring-4 ring-white/40" />
        </div> --}}

        <a href="{{ route('landing') }}" class="flex justify-center mb-4">
            <img src="/assets/icon/logo.png" alt="Logo"
                class="w-16 h-16" />
        </a>

        <!-- Judul -->
        {{-- <h1 style="font-family: 'Protest Riot', cursive;" class="text-xl font-medium text-center text-white mb-1">
            RaiseMeUP
        </h1> --}}

        <a href="{{ route('landing') }}">
            <h1 style="font-family: 'Protest Riot', cursive;" class="text-xl font-medium text-center text-white mb-1">
                RaiseMeUp
            </h1>
        </a>

        <p class="text-center text-white text-sm font-medium mb-4">
            Daftar sebagai <span class="font-semibold text-blue-400">Creator</span>
        </p>

        <!-- (Opsional) pesan error sederhana -->
        @if ($errors->any())
            <div class="bg-red-600/80 text-white text-xs rounded px-3 py-2 mb-2">
                @foreach ($errors->all() as $error)
                    <div>- {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form class="space-y-3" id="registerForm" class="space-y-3" autocomplete="off" method="POST"
            action="{{ route('creator.register.otp') }}" onsubmit="return showOtpAlert();">
            @csrf

            <input type="text" name="username" placeholder="Username"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm"
                value="{{ old('username') }}">

            <input type="email" name="email" placeholder="Email"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm"
                value="{{ old('email') }}">

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm">

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm">

            <!-- Dropdown Trigger -->
            <div class="relative w-full z-10">
                <button type="button" id="dropdownBtn"
                    class="w-full bg-white/10 text-white px-4 py-2 border border-white/30 rounded-md text-left backdrop-blur-md text-sm">
                    Pilih kategori (Job)
                    <i class="fa-solid fa-chevron-down float-right mt-1 text-white/70"></i>
                </button>
                <input type="hidden" name="job" id="selectedValue" value="{{ old('job') }}">
            </div>

            <!-- Submit -->
            <button id="registerBtn" type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md button-hover transition duration-300 text-sm">
                Daftar
            </button>

            <p class="text-xs text-center mt-4 text-white/80">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-white underline hover:text-blue-200">Login di sini</a>
            </p>
    </div>
    </form>

    <!-- Link ke login -->


    <!-- Script Dropdown -->
    <script>
        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownList = document.getElementById("dropdownList");
        const selectedValue = document.getElementById("selectedValue");
        const overlay = document.getElementById("overlay");

        dropdownBtn.addEventListener("click", () => {
            dropdownList.classList.toggle("hidden");
            overlay.classList.toggle("hidden");
        });


        function selectOption(value) {
            dropdownBtn.innerHTML = `${value} <i class="fa-solid fa-chevron-down float-right mt-1 text-white/70"></i>`;
            selectedValue.value = value;
            dropdownList.classList.add("hidden");
            overlay.classList.add("hidden");
        }

        document.addEventListener("click", function(e) {
            if (!dropdownBtn.contains(e.target) && !dropdownList.contains(e.target)) {
                dropdownList.classList.add("hidden");
                overlay.classList.add("hidden");
            }
        });

        function showOtpAlert() {
            alert('Mendaftarkan akun dan mengirim OTP ke email…');
            /* setelah pengguna menekan OK, fungsi return true;
               browser melanjutkan submit form → pindah ke /register/otp */
            return true;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('registerBtn');
            const form = document.getElementById('registerForm');

            btn.addEventListener('click', event => {
                event.preventDefault(); // cegat submit otomatis
                alert('Mendaftarkan akun dan mengirim OTP ke email…');
                form.submit(); // lanjutkan submit ⇒ pindah ke halaman OTP
            });
        });
    </script>
</body>

</html>
