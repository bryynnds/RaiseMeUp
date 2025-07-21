<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lengkapi Profil - RaiseMeUp</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            --shadow-glow: 0 8px 32px rgba(31, 38, 135, 0.37);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            overflow: hidden;
            background: url('/assets/bg/afterlogin.jpg') center/cover no-repeat;
            position: relative;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            right: 10%;
            animation-delay: -5s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 20%;
            animation-delay: -10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .glass-morphism {
            background: var(--gradient-glass);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: var(--shadow-glow);
        }

        .form-container {
            animation: slideInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideInUp {
            0% {
                opacity: 0;
                transform: translateY(60px) scale(0.95);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .input-group {
            position: relative;
            overflow: hidden;
        }

        .modern-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modern-input:focus {
            outline: none;
            border-color: rgba(102, 126, 234, 0.5);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
            transform: translateY(-1px);
        }

        .modern-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
            font-weight: 300;
        }

        .upload-area {
            position: relative;
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .upload-area:hover {
            border-color: rgba(102, 126, 234, 0.5);
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-1px);
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .cta-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .logo-glow {
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .step {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .step.active {
            background: #667eea;
            transform: scale(1.2);
        }

        @media (max-width: 640px) {
            .form-container {
                margin: 10px;
                padding: 24px 20px;
            }

            .modern-input,
            .upload-area {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">
        <div class="glass-morphism rounded-2xl w-full max-w-sm form-container">
            <div class="px-8 py-7">

                <!-- Step Indicator -->
                <div class="step-indicator mb-4">
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>
                </div>

                <!-- Logo Section -->
                <div class="text-center mb-4">
                    <h1 style="font-family: 'Protest Riot', cursive;" class="text-lg font-bold text-white mb-1 tracking-wide">
                        RaiseMeUp
                    </h1>
                    <p class="text-white/80 text-[11px] font-light">
                        Ayo lengkapi profil kamu ✨
                    </p>
                </div>

                <!-- Form -->
                <form class="space-y-3" autocomplete="off" action="{{ route('creator.afterlogin.updateSupporter') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Upload Section -->
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="text-white/90 text-[11px] font-medium block mb-1">
                                <i class="fas fa-image mr-1"></i>Foto Sampul
                            </label>
                            <div class="upload-area p-2 text-center">
                                <input type="file" name="fotosampul_url" accept="image/*" required/>
                                <i class="fas fa-cloud-upload-alt text-white/60 text-base mb-1"></i>
                                <p class="text-white/60 text-[11px]">Upload</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-white/90 text-[11px] font-medium block mb-1">
                                <i class="fas fa-user-circle mr-1"></i>Foto Profil
                            </label>
                            <div class="upload-area p-2 text-center">
                                <input type="file" name="pp_url" accept="image/*" required />
                                <i class="fas fa-camera text-white/60 text-base mb-1"></i>
                                <p class="text-white/60 text-[11px]">Upload</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nickname Section -->
                    <div class="input-group">
                        <label class="text-white/90 text-[11px] font-medium block mb-1">
                            <i class="fas fa-id-badge mr-1"></i>Nickname <span class="text-white/50 text-[10px]">(Nama yang akan di-display di profil)</span>
                        </label>
                        <input
                            type="text"
                            name="nickname" required
                            placeholder="Contoh: Nayla Evelyn"
                            class="modern-input w-full px-2.5 py-2 rounded-md text-[12px]"
                            maxlength="40" />
                    </div>

                    <!-- Bio Section -->
                    <div class="input-group">
                        <label class="text-white/90 text-[11px] font-medium block mb-1">
                            <i class="fas fa-quote-left mr-1"></i>Bio Singkat
                        </label>
                        <input
                            type="text"
                            name="bio" required
                            placeholder="Ceritakan tentang dirimu..."
                            class="modern-input w-full px-2.5 py-2 rounded-md text-[12px]"
                            maxlength="100" />
                    </div>

                    <!-- Description Section -->

                    <!-- Action Button -->
                    <button
                        type="submit"
                        class="cta-button w-full py-2.5 rounded-md text-white font-semibold text-sm relative overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <span>Simpan & Lanjutkan</span>
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script>
        // Add some interactive behavior
        document.addEventListener('DOMContentLoaded', function() {
            // File upload feedback
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const uploadArea = this.closest('.upload-area');
                    if (this.files.length > 0) {
                        uploadArea.style.borderColor = 'rgba(102, 126, 234, 0.8)';
                        uploadArea.style.background = 'rgba(102, 126, 234, 0.1)';
                        const icon = uploadArea.querySelector('i');
                        const text = uploadArea.querySelector('p');
                        icon.className = 'fas fa-check-circle text-green-400 text-xl mb-2';
                        text.textContent = 'Berhasil';
                        text.className = 'text-green-400 text-xs';
                    }
                });
            });

            // Character count for textarea
            const textarea = document.querySelector('textarea');
            const bioInput = document.querySelector('input[type="text"]');

            function addCharacterCount(element, maxLength) {
                const container = element.parentNode;
                const counter = document.createElement('div');
                counter.className = 'text-white/50 text-xs text-right mt-1';
                counter.textContent = `0/${maxLength}`;
                container.appendChild(counter);

                element.addEventListener('input', function() {
                    const length = this.value.length;
                    counter.textContent = `${length}/${maxLength}`;
                    counter.style.color = length > maxLength * 0.9 ? '#f87171' : 'rgba(255, 255, 255, 0.5)';
                });
            }

            
        });
    </script>
</body>

</html>
