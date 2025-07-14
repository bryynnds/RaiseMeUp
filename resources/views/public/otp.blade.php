<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi OTP - RaiseMeUp</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .otp-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.25rem;
            border-radius: 0.5rem;
            border: 1px solid #ccc;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(6px);
            color: white;
        }

        .otp-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center px-4"
    style="background-image: url('/assets/bg/bg.jpg');">
    <div
        class="bg-white/10 backdrop-blur-md shadow-xl rounded-3xl w-full max-w-md p-6 sm:p-8 border border-white/30 text-white text-center">

        <!-- Logo -->
        <img src="https://via.placeholder.com/60x60?text=🔒" alt="OTP Icon"
            class="mx-auto mb-4 rounded-full shadow-md ring-2 ring-white/50" />

        <h1 class="text-2xl font-semibold mb-2">Verifikasi OTP</h1>
        <p class="text-sm mb-6 text-white/80">Kode verifikasi telah dikirim ke email kamu. Masukkan 6 digit kode di
            bawah ini:</p>

        @php
            $role = session('pending_user.role');
            $verifyRoute = $role === 'supporter' ? route('supporter.otp.verify') : route('creator.otp.verify');
        @endphp

        <form id="otpForm" method="POST" action="{{ $verifyRoute }}"
            class="flex justify-between max-w-xs mx-auto gap-2 mb-6">
            @csrf
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="hidden" name="otp" id="otpFull">
        </form>

        <button type="button" onclick="submitOTP()"
            class="w-full bg-blue-500 hover:bg-blue-600 transition text-white py-2 rounded-lg font-semibold mb-4">
            Verifikasi
        </button>

        <p class="text-sm text-white/70">
            Tidak menerima kode?
            <a href="" id="resendLink" onclick="resendOTP(event)"
                class="text-blue-200 underline hover:text-blue-100">
                Kirim ulang
            </a>

        </p>
    </div>

    <script>
        const inputs = document.querySelectorAll(".otp-input");
        inputs.forEach((input, i) => {
            input.addEventListener("input", () => {
                if (input.value && i < inputs.length - 1) inputs[i + 1].focus();
            });
            input.addEventListener("keydown", e => {
                if (e.key === "Backspace" && !input.value && i > 0) inputs[i - 1].focus();
            });
        });

        async function submitOTP() {
            const otpCode = [...inputs].map(i => i.value).join("");
            if (otpCode.length < 6) return alert("Kode OTP belum lengkap 😢");

            @php
                $otpRoute = request()->session()->get('pending_user.role') === 'supporter' ? route('supporter.otp.verify') : route('creator.otp.verify');
            @endphp

            const res = await fetch("{{ $otpRoute }}", {
                method: "POST",
                credentials: "same-origin", // ⬅️ LINE BARU
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                },
                body: JSON.stringify({
                    otp: otpCode
                })
            });

            const data = await res.json();
            console.log("server response =", data); // debug log

            if (data.status === "success") {
                alert("OTP valid ✅");
                window.location.href = data.redirect;
            } else if (data.status === "incorrect") {
                alert("Kode OTP yang dimasukkan salah.");
            } else if (data.status === "expired") {
                alert("Kode OTP sudah kadaluarsa, tekan resend kode kembali.");
            } else {
                alert("Terjadi kesalahan. Silakan coba lagi.");
            }
        }



        // resend OTP handler
        const resendLink = document.getElementById("resendLink");
        const csrfToken = '{{ csrf_token() }}';
        const COOLDOWN_SEC = 30; // jeda 30 detik sebelum bisa klik lagi

        async function resendOTP(e) {
            e.preventDefault(); // ⬅️ hentikan reload otomatis

            if (resendLink.dataset.waiting === "1") return;
            resendLink.dataset.waiting = "1";
            resendLink.textContent = "Mengirim…";

            try {
                @php
                    $resendRoute = request()->session()->get('pending_user.role') === 'supporter' ? route('supporter.otp.resend') : route('creator.otp.resend');
                @endphp

                const r = await fetch("{{ $resendRoute }}", {

                    method: "POST",
                    credentials: "same-origin",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                });

                if (!r.ok) throw new Error();
                const res = await r.json();
                alert(res.message || "Kode baru telah dikirim ke email.");

                window.location.reload(); // refresh **setelah** sukses
            } catch (e) {
                alert("Gagal mengirim ulang OTP. Silakan coba lagi.");
                resendLink.textContent = "Kirim ulang";
                resendLink.dataset.waiting = "0";
            }
        }
    </script>
</body>

</html>
