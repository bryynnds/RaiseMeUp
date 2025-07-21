<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&Protest+Riot&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center px-4 py-8"
    style="background-image: url('/assets/bg/bg.jpg');">
    <div
        class="bg-white/10 backdrop-blur-md shadow-xl rounded-2xl w-full max-w-sm p-5 sm:p-6 form-container border border-white/30">

        <!-- Back Button & Logo -->
        <div class="flex items-center mb-4">
            <a href="/forgot"
                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/10 border border-white/30 hover:bg-white/20 hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-arrow-left text-white text-sm"></i>
            </a>
        </div>

        <a href="index.html" class="flex justify-center mb-4">
            <img src="/assets/icon/logo.png" alt="Logo" class="w-16 h-16" />
        </a>

        <h1 style="font-family: 'Protest Riot', cursive;" class="text-xl font-medium text-center text-white mb-1">
            RaiseMeUp</h1>
        <h2 class="text-center text-white text-lg font-semibold mb-1">Reset Password</h2>
        <p class="text-center text-white/80 text-xs mb-4 leading-relaxed">Masukkan password baru Anda</p>

        <!-- Form -->
        <form id="form" class="space-y-4">
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-white/70 text-sm"></i>
                <input type="password" id="new" placeholder="Password baru" required
                    class="w-full pl-10 pr-12 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 text-sm focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_4px_rgba(59,130,246,0.3)]" />
                <button type="button" onclick="toggle('new')"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white transition-colors">
                    <i id="iconNew" class="fas fa-eye text-sm"></i>
                </button>
            </div>

            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-white/70 text-sm"></i>
                <input type="password" id="confirm" placeholder="Konfirmasi password baru" required
                    class="w-full pl-10 pr-12 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 text-sm focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_4px_rgba(59,130,246,0.3)]" />
                <button type="button" onclick="toggle('confirm')"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white transition-colors">
                    <i id="iconConfirm" class="fas fa-eye text-sm"></i>
                </button>
            </div>

            <div class="text-xs text-white/60">
                <div id="req" class="flex items-center space-x-2">
                    <i id="icon" class="fas fa-circle text-white/30"></i>
                    <span id="text">Minimal ada 1 angka (0-9)</span>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md text-sm hover:bg-blue-600 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
                Reset Password
            </button>
        </form>

        <p class="text-xs text-center mt-4 text-white/80">
            Sudah ingat password? <a href="login.html" class="text-white underline hover:text-blue-200">Kembali ke
                Login</a>
        </p>

        <!-- Messages -->
        <div id="success"
            class="hidden bg-green-500/20 border border-green-500/30 text-green-100 rounded-md p-3 mb-4 text-sm">
            <i class="fas fa-check-circle mr-2"></i><span id="successText"></span>
        </div>
        <div id="error" class="hidden bg-red-500/20 border border-red-500/30 text-red-100 rounded-md p-3 mb-4 text-sm">
            <i class="fas fa-exclamation-circle mr-2"></i><span id="errorText"></span>
        </div>
    </div>

    <script>
        const $ = id => document.getElementById(id);

        function toggle(field) {
            const input = $(field);
            const icon = $('icon' + field.charAt(0).toUpperCase() + field.slice(1));
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            icon.className = isPassword ? 'fas fa-eye-slash text-sm' : 'fas fa-eye text-sm';
        }

        function validate(password) {
            const hasNumber = /[0-9]/.test(password);
            const icon = $('icon');
            const text = $('text');

            if (hasNumber) {
                icon.className = 'fas fa-check-circle text-green-400';
                text.className = 'text-green-300';
            } else {
                icon.className = 'fas fa-circle text-white/30';
                text.className = '';
            }
            return hasNumber;
        }

        function showMsg(type, msg) {
            const el = $(type);
            $(type + 'Text').textContent = msg;
            el.classList.remove('hidden');
            setTimeout(() => el.classList.add('hidden'), 5000);
        }

        $('new').oninput = () => validate($('new').value);

        $('form').onsubmit = (e) => {
            e.preventDefault();
            $('success').classList.add('hidden');
            $('error').classList.add('hidden');

            const newPass = $('new').value;
            const confirmPass = $('confirm').value;

            if (!newPass || !confirmPass) return showMsg('error', 'Semua field harus diisi');
            if (!validate(newPass)) return showMsg('error', 'Password harus mengandung minimal 1 angka');
            if (newPass !== confirmPass) return showMsg('error', 'Konfirmasi password tidak cocok');

            showMsg('success', 'Password berhasil direset! Silakan login dengan password baru');
        };
    </script>
</body>

</html>