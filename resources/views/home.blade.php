<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RaiseMeUp - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .font-protest {
      font-family: 'Protest Riot', cursive;
    }

    #navbar a,
    #navbar span,
    #loginBtn {
      transition: all 0.3s ease;
    }

    .nav-icon {
      transition: filter 0.3s ease;
    }
  </style>
</head>

<body class="min-h-screen scroll-smooth">

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
          <button id="loginBtn" class="w-full text-center text-sm font-bold rounded-md px-3 py-2 bg-white text-gray-700">
            Log In
          </button>
          <button id="userIcon" class="hidden w-full px-1 py-3 bg-white rounded-md flex items-center justify-center">
            <img src="/assets/icon/user.png" alt="User" class="w-4 h-4" />
          </button>

        </div>
      </div>
    </div>
  </nav>

  <div class="w-full h-screen bg-gradient-to-br from-indigo-500 to-sky-400 flex flex-col ">
    <div class="h-[15%] w-full flex items-center justify-center">
    </div>

    <div class="h-[42%] w-full flex items-center justify-center">
      <div class="flex flex-col items-center justify-center text-center space-y-10">
        <div class="flex pl-6 items-center justify-end text-right">
          <div class="text-white flex flex-col space-y-2 text-xl lg:text-3xl font-bold">
            <span>Support Creators,</span>
            <span class="text-base lg:text-3xl">Inspire More Creations.</span>
          </div>
          <img src="/assets/icon/maskot.png" alt="Illustration" class="w-24 h-24 object-contain" />
        </div>

        <div class="bg-[#567BE0] w-full max-w-md rounded-full px-4 py-3 flex items-center justify-between">
          <input
            type="text"
            placeholder="Kobo Kanaeru"
            class="bg-transparent text-sm text-base text-gray-200 placeholder-gray-300 font-semibold w-full focus:outline-none px-2" />
          <span class="bg-[#4B98F5] text-sm text-base px-4 py-2 rounded-full text-white font-bold cursor-pointer">Cari</span>
        </div>

      </div>
    </div>

    <div class="h-[43vh] flex items-end justify-between">
      <img src="/assets/bg/awankiri.png" alt="Gambar Kiri" class="h-64 object-cover object-bottom" />

      <div class="flex items-center justify-center">
        A
      </div>

      <img src="/assets/bg/awankanan.png" alt="Gambar Kanan" class="h-64 object-cover object-bottom" />
    </div>

  </div>



  <div class="w-full h-screen bg-gray-400 flex items-center justify-center text-gray-800 text-3xl font-bold">
    Section 2
  </div>

  <div class="w-full h-screen bg-gray-100 flex items-center justify-center text-gray-900 text-3xl font-bold">
    Section 3
  </div>
  <div class="fixed bottom-4 right-4 z-50 space-x-2">
    <button onclick="fakeLogin()" class="px-4 py-2 bg-green-500 text-white rounded-md">Login</button>
    <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500 text-white rounded-md">Logout</a>
  </div>

</body>

<script>
  const navbar = document.getElementById('navbar');
  const loginBtn = document.getElementById('loginBtn');
  const whiteSections = document.querySelectorAll('.bg-white, .bg-gray-100');
  const iconExplore = document.querySelector('#navbar img[src*="launch"]');

  let isLoggedIn = false;

  window.addEventListener('scroll', () => {
    let masukPutih = false;

    whiteSections.forEach(section => {
      const rect = section.getBoundingClientRect();
      if (rect.top <= 80 && rect.bottom >= 80) {
        masukPutih = true;
      }
    });

    const gambarPutihKiri = document.querySelector('img[alt="Gambar Kiri"]');
    const gambarPutihKanan = document.querySelector('img[alt="Gambar Kanan"]');

    [gambarPutihKiri, gambarPutihKanan].forEach(img => {
      if (img) {
        const rect = img.getBoundingClientRect();
        if (rect.top <= 80 && rect.bottom >= 80) {
          masukPutih = true;
        }
      }
    });

    if (masukPutih) {
      navbar.classList.remove('text-white');
      navbar.classList.add('text-gray-800');

      document.querySelectorAll('#navbar a, #navbar span').forEach(el => {
        el.classList.remove('text-white');
        el.classList.add('text-gray-800');
      });

      if (iconExplore) {
        iconExplore.style.filter = 'invert(1)';
      }

      if (!isLoggedIn) {
        loginBtn.className = 'w-full text-center text-sm font-bold rounded-md px-3 py-2 bg-blue-600 text-white';
      }

    } else {
      navbar.classList.add('text-white');
      navbar.classList.remove('text-gray-800');

      document.querySelectorAll('#navbar a, #navbar span').forEach(el => {
        el.classList.add('text-white');
        el.classList.remove('text-gray-800');
      });

      if (iconExplore) {
        iconExplore.style.filter = 'invert(0)';
      }

      if (!isLoggedIn) {
        loginBtn.className = 'w-full text-center text-sm font-bold rounded-md px-3 py-2 bg-white text-gray-700';
      }
    }
  });
</script>

<script>
  function updateNavbar() {
    const userIcon = document.getElementById('userIcon');

    if (isLoggedIn) {
      loginBtn.classList.add('hidden');
      userIcon.classList.remove('hidden');
    } else {
      loginBtn.classList.remove('hidden');
      userIcon.classList.add('hidden');
    }
  }

  function fakeLogin() {
    isLoggedIn = true;
    updateNavbar();
  }

  function fakeLogout() {
    isLoggedIn = false;
    updateNavbar();
  }

  window.addEventListener('DOMContentLoaded', updateNavbar);
</script>

</html>