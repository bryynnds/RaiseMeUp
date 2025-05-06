<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RaiseMeUp - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
  <body class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8 form-container">
      <div class="flex justify-center mb-6">
        <img src="https://via.placeholder.com/80x80?text=R" alt="RaiseMeUp Logo" class="w-20 h-20 rounded-full shadow-md" />
      </div>
      <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">RaiseMeUP</h1>
      <p class="text-center text-gray-600 text-sm mb-6">Dukung kreator favoritmu dengan mudah~</p>

      <form class="space-y-4">
        <input
          type="email"
          placeholder="Email"
          class="w-full px-4 py-2 border border-gray-300 rounded-md input-focus transition duration-300"/>
        <input
          type="password"
          placeholder="Password"
          class="w-full px-4 py-2 border border-gray-300 rounded-md input-focus transition duration-300"/>
        <button
          type="submit"
          class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md button-hover transition duration-300">
          Login
        </button>
      </form>

      <p class="text-sm text-center mt-6 text-gray-600">
        Belum punya akun?
        <a href="#" class="text-blue-500 hover:underline">Daftar sekarang</a>
      </p>
    </div>

  </body>
</html>
