<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RaiseMeUp - Pilih Peran</title>
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

    .role-card {
      background-color: rgba(255, 255, 255, 0.1);
      border: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .role-card:hover,
    .role-card.active {
      border-color: #3b82f6;
      background-color: rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
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
    <p class="text-center text-white text-sm sm:text-base font-medium mb-6">Sebelum lanjut, pilih peranmu~</p>

    <!-- Role Cards -->
    <div class="flex flex-col sm:flex-row justify-center gap-4 mb-6">
      <div onclick="selectRole('supporter')" id="supporterCard"
        class="role-card cursor-pointer flex-1 py-6 sm:py-10 rounded-xl flex flex-col items-center text-white">
        <i class="fa-solid fa-heart text-xl sm:text-2xl mb-2"></i>
        <span class="font-medium text-sm sm:text-base">Supporter</span>
      </div>

      <div onclick="selectRole('creator')" id="creatorCard"
        class="role-card cursor-pointer flex-1 py-6 sm:py-10 rounded-xl flex flex-col items-center text-white">
        <i class="fa-solid fa-pen-nib text-xl sm:text-2xl mb-2"></i>
        <span class="font-medium text-sm sm:text-base">Creator</span>
      </div>
    </div>

    <!-- Tombol -->
    <button onclick="goNext()"
      class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md button-hover transition duration-300 mb-6">
      Lanjutkan
    </button>

    <!-- Link login -->
    <p class="text-sm text-center text-white/80">
      Sudah punya akun?
      <a href="/login" class="text-white underline hover:text-blue-200">Login.</a>
    </p>
  </div>

  <script>
    let selectedRole = null;

    function selectRole(role) {
      selectedRole = role;

      document.getElementById("supporterCard").classList.remove("active");
      document.getElementById("creatorCard").classList.remove("active");

      document.getElementById(role + "Card").classList.add("active");
    }

    function goNext() {
      if (!selectedRole) {
        alert("Pilih dulu yaa role-nya~");
        return;
      }

      window.location.href = `/register/${selectedRole}`;
    }
  </script>
</body>

</html>
