<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RaiseMeUp - Login</title>
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

<body class="bg-cover bg-center min-h-screen flex items-center justify-center px-4 sm:px-6"
  style="background-image: url('/assets/bg/bg.jpg');">

  <div
    class="bg-white/10 backdrop-blur-md shadow-xl rounded-3xl w-full max-w-md p-6 sm:p-8 form-container border border-white/30">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="https://via.placeholder.com/80x80?text=R" alt="RaiseMeUp Logo"
        class="w-16 sm:w-20 h-16 sm:h-20 rounded-full shadow-lg ring-4 ring-white/40" />
    </div>

    <!-- Judul -->
    <h1 style="font-family: 'Protest Riot', cursive;"
      class="text-2xl sm:text-3xl font-medium text-center text-white mb-2">
      RaiseMeUP
    </h1>

    <p class="text-center text-white text-sm sm:text-base font-medium mb-6">
      Dukung kreator favoritmu dengan mudah~
    </p>

    <!-- Form Login -->
    <form class="space-y-4" autocomplete="off">
      <input type="email" name="never_email" placeholder="Email" autocomplete="off"
        class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus transition duration-300" />

      <div class="relative">
        <input id="passwordInput" type="password" name="never_password" placeholder="Password"
          autocomplete="new-password"
          class="w-full px-4 py-2 pr-10 border border-white/30 rounded-md bg-white/10 text-white placeholder-white/70 input-focus transition duration-300" />
        <button type="button" id="togglePassword"
          class="absolute inset-y-0 right-3 flex items-center text-white/70 focus:outline-none">
          <i class="fa-regular fa-eye" id="eyeIcon"></i>
        </button>
      </div>

      <button type="submit"
        class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md button-hover transition duration-300">
        Login
      </button>
    </form>

    <!-- Link Daftar -->
    <p class="text-sm text-center mt-6 text-white/80">
      Belum punya akun?
      <a href="/role" class="text-white underline hover:text-blue-200">Daftar sekarang</a>
    </p>

    <!-- Login dengan Google -->
    <div class="mt-4">
      <a href="/auth/google"
        class="w-full flex items-center justify-center gap-2 border border-white/30 py-2 rounded-md hover:bg-white/10 transition duration-300 text-white">
        <i class="fab fa-google text-red-400"></i>
        <span class="font-medium">Login dengan Google</span>
      </a>
    </div>
  </div>

  <!-- Toggle Password Script -->
  <script>
    const passwordInput = document.getElementById("passwordInput");
    const toggleBtn = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    toggleBtn.addEventListener("click", () => {
      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";
      eyeIcon.classList.toggle("fa-eye");
      eyeIcon.classList.toggle("fa-eye-slash");
    });
  </script>
</body>

</html>
