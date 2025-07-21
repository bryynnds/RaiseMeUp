<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Lupa Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
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

        <!-- Back Button -->
        <div class="flex items-center mb-4">
            <a href="/login"
                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/10 border border-white/30 hover:bg-white/20 hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-arrow-left text-white text-sm"></i>
            </a>
        </div>

        <!-- Logo -->
        <a href="index.html" class="flex justify-center mb-4">
            <img src="/assets/icon/logo.png" alt="Logo" class="w-16 h-16" />
        </a>

        <!-- Title -->
        <a href="index.html">
            <h1 style="font-family: 'Protest Riot', cursive;" class="text-xl font-medium text-center text-white mb-1">
                RaiseMeUp</h1>
        </a>

        <!-- Step 1: Email Input -->
        <div id="step1" class="opacity-100 translate-x-0 transition-all duration-400 ease-in-out">
            <h2 class="text-center text-white text-lg font-semibold mb-1">Lupa Password?</h2>
            <p class="text-center text-white/80 text-xs mb-4 leading-relaxed">Masukkan email Anda dan kami akan
                mengirimkan<br>kode OTP untuk verifikasi</p>

            <form id="emailForm" class="space-y-4" autocomplete="off">
                <div class="relative">
                    <i
                        class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-white/70 text-sm"></i>
                    <input type="email" id="emailInput" placeholder="Masukkan email Anda" autocomplete="off" required
                        class="w-full pl-10 pr-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 text-sm focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_4px_rgba(59,130,246,0.3)]" />
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md text-sm hover:bg-blue-600 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
                    Kirim OTP
                </button>
            </form>

            <p class="text-xs text-center mt-4 text-white/80">
                Sudah ingat password? <a href="login.html" class="text-white underline hover:text-blue-200">Kembali ke
                    Login</a>
            </p>
        </div>

        <!-- Step 2: OTP Verification -->
        <div id="step2" class="hidden opacity-0 translate-x-5 transition-all duration-400 ease-in-out">
            <h2 class="text-center text-white text-lg font-semibold mb-1">Verifikasi OTP</h2>
            <p class="text-center text-white/80 text-xs mb-4 leading-relaxed">
                Kode OTP telah dikirim ke<br><span id="sentEmailDisplay" class="font-semibold text-white"></span>
            </p>

            <div class="flex justify-center space-x-2 mb-4">
                <input type="text" id="otp1" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
                <input type="text" id="otp2" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
                <input type="text" id="otp3" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
                <input type="text" id="otp4" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
                <input type="text" id="otp5" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
                <input type="text" id="otp6" maxlength="1"
                    class="w-11 h-11 text-center text-lg font-semibold rounded-lg border border-white/30 bg-white/10 text-white focus:outline-none focus:border-blue-500 focus:shadow-[0_0_0_3px_rgba(59,130,246,0.3)]" />
            </div>

            <button id="verifyOtpBtn"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md text-sm mb-4 hover:bg-blue-600 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
                Verifikasi & Lanjutkan
            </button>

            <div class="text-center">
                <p class="text-xs text-white/80 mb-2">Tidak menerima kode? <span id="countdown"
                        class="font-semibold text-white"></span></p>
                <button id="resendBtn"
                    class="text-xs text-white/60 hover:text-blue-400 hover:underline transition duration-300 disabled:opacity-50"
                    disabled>
                    Kirim ulang OTP
                </button>
            </div>
        </div>

        <!-- Messages -->
        <div id="successMessage"
            class="hidden bg-green-500/20 border border-green-500/30 text-green-100 rounded-md p-3 mb-4 text-sm">
            <i class="fas fa-check-circle mr-2"></i>
            <span id="successText"></span>
        </div>

        <div id="errorMessage"
            class="hidden bg-red-500/20 border border-red-500/30 text-red-100 rounded-md p-3 mb-4 text-sm">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span id="errorText"></span>
        </div>
    </div>

    <script>
        const elements = {
            step1: document.getElementById('step1'),
            step2: document.getElementById('step2'),
            emailForm: document.getElementById('emailForm'),
            emailInput: document.getElementById('emailInput'),
            sentEmailDisplay: document.getElementById('sentEmailDisplay'),
            verifyOtpBtn: document.getElementById('verifyOtpBtn'),
            resendBtn: document.getElementById('resendBtn'),
            countdown: document.getElementById('countdown'),
            successMessage: document.getElementById('successMessage'),
            errorMessage: document.getElementById('errorMessage'),
            successText: document.getElementById('successText'),
            errorText: document.getElementById('errorText'),
            otpInputs: ['otp1', 'otp2', 'otp3', 'otp4', 'otp5', 'otp6'].map(id => document.getElementById(id))
        };

        let countdownTimer, countdownTime = 60;

        // Email form submit
        elements.emailForm.addEventListener('submit', (e) => {
            e.preventDefault();
            hideMessages();

            const email = elements.emailInput.value.trim();
            if (!email) return showError('Email tidak boleh kosong');
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showError('Format email tidak valid');

            elements.sentEmailDisplay.textContent = email;
            switchToStep(2);
            startCountdown();
            showSuccess('Berhasil! Silakan masukkan kode OTP');
        });

        // OTP verification
        elements.verifyOtpBtn.addEventListener('click', () => {
            hideMessages();
            const otpValue = elements.otpInputs.map(input => input.value).join('');

            if (otpValue.length !== 6) return showError('Masukkan kode OTP lengkap (6 digit)');
            if (!/^\d{6}$/.test(otpValue)) return showError('Kode OTP harus berupa angka');

            showSuccess('Kode OTP valid! Silakan lanjutkan ke reset password');
        });

        // Resend OTP
        elements.resendBtn.addEventListener('click', () => {
            if (!elements.resendBtn.disabled) {
                hideMessages();
                showSuccess('Kode OTP baru telah dikirim');
                clearOtpInputs();
                startCountdown();
            }
        });

        // OTP input handling
        elements.otpInputs.forEach((input, i) => {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value && i < 5) elements.otpInputs[i + 1].focus();
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && i > 0) elements.otpInputs[i - 1].focus();
            });
        });

        // Helper functions
        const switchToStep = (step) => {
            const [current, next] = step === 2 ? [elements.step1, elements.step2] : [elements.step2, elements.step1];
            current.classList.add('opacity-0', 'translate-x-5');
            setTimeout(() => {
                current.classList.add('hidden');
                next.classList.remove('hidden');
                setTimeout(() => {
                    next.classList.remove('opacity-0', 'translate-x-5');
                    if (step === 2) elements.otpInputs[0].focus();
                }, 50);
            }, 200);
        };

        const startCountdown = () => {
            countdownTime = 60;
            elements.resendBtn.disabled = true;
            countdownTimer = setInterval(() => {
                elements.countdown.textContent = `(${--countdownTime}s)`;
                if (countdownTime <= 0) {
                    clearInterval(countdownTimer);
                    elements.countdown.textContent = '';
                    elements.resendBtn.disabled = false;
                }
            }, 1000);
        };

        const clearOtpInputs = () => {
            elements.otpInputs.forEach(input => input.value = '');
            elements.otpInputs[0].focus();
        };

        const showMessage = (type, message) => {
            const msgEl = elements[type + 'Message'];
            elements[type + 'Text'].textContent = message;
            msgEl.classList.remove('hidden');
            setTimeout(() => msgEl.classList.add('hidden'), 5000);
        };

        const showSuccess = (msg) => showMessage('success', msg);
        const showError = (msg) => showMessage('error', msg);
        const hideMessages = () => [elements.successMessage, elements.errorMessage].forEach(el => el.classList.add('hidden'));
    </script>
</body>

</html>