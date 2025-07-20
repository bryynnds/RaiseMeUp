<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Daftar Supporter</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .form-container {
            animation: fadeInUp 0.6s ease-in-out;
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
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3);
        }

        .button-hover:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center px-4 py-8"
    style="background-image: url('/assets/bg/bg-supporter.jpg');">

    <div
        class="bg-white/10 backdrop-blur-md shadow-xl rounded-2xl w-full max-w-sm p-5 sm:p-6 form-container border border-white/30 relative z-10 scale-[0.97] sm:scale-100">

        <!-- Logo -->
        {{-- <div class="flex justify-center mb-4">
            <img src="/assets/icon/logo.png" alt="Logo"
                class="w-16 h-16" />
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
            Daftar sebagai <span class="font-semibold text-blue-300">Supporter</span>
        </p>

        @if ($errors->any())
            <div class="bg-red-600/80 text-white text-xs rounded px-3 py-2 mb-2">
                @foreach ($errors->all() as $error)
                    <div>- {{ $error }}</div>
                @endforeach
            </div>
        @endif


        <!-- Form Registrasi -->
        <form class="space-y-3" id="registerForm" method="POST" autocomplete="off"
            action="{{ route('supporter.register.otp') }}" onsubmit="return showOtpAlert();">
            @csrf
            <input type="text" name="username" placeholder="Username"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm" />

            <input type="email" name="email" placeholder="Email"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm" />

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm" />

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus text-sm" />

            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md button-hover transition duration-300 text-sm">
                Daftar
            </button>
        </form>

        <!-- Link ke login -->
        <p class="text-xs text-center mt-4 text-white/80">
            Sudah punya akun?
            <a href="/login" class="text-white underline hover:text-blue-200">Login di sini</a>
        </p>
    </div>

    <script>
        function showOtpAlert() {
            alert('Mendaftarkan akun dan mengirim OTP ke email…');
            return true;
        }
        
    </script>



</body>

</html>
