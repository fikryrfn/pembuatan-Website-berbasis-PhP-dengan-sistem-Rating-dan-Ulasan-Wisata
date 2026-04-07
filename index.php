<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda – WisataRating</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow">
    <div class="max-w-5xl mx-auto px-4 flex items-center justify-between h-14">
      <a href="index.php" class="text-lg font-bold text-green-700">🗺️ WisataRating</a>
      <div class="flex items-center gap-3">
        <?php if (isset($_SESSION['username'])): ?>
          <span class="text-sm text-gray-600">👋 <?= htmlspecialchars($_SESSION['username']) ?></span>
          <a href="Proses/logout.php" class="text-sm text-red-500 hover:text-red-700 font-semibold">Keluar</a>
        <?php else: ?>
          <a href="login.php" class="text-sm text-gray-600 hover:text-green-700">Masuk</a>
          <a href="register.php" class="text-sm bg-green-700 text-white px-4 py-1.5 rounded-lg hover:bg-green-800 transition-colors">Daftar</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <div class="bg-green-700 text-white py-10 px-4 text-center">
    <h1 class="text-2xl sm:text-3xl font-bold mb-2">Temukan Wisata Favoritmu</h1>
    <p class="text-green-100 text-sm mb-5">Baca & tulis ulasan destinasi wisata Indonesia</p>
    <div class="max-w-md mx-auto flex gap-2">
      <input id="searchInput" type="text" placeholder="Cari destinasi..."
        oninput="filterCards()"
        class="flex-1 px-4 py-2 rounded-lg text-sm text-gray-800 focus:outline-none" />
      <button class="bg-white text-green-700 font-semibold text-sm px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
        Cari
      </button>
    </div>
  </div>

  <!-- Main -->
  <main class="max-w-5xl mx-auto px-4 py-8">

    <!-- Filter -->
    <div class="flex gap-2 flex-wrap mb-6">
      <button onclick="setFilter(this, 'Semua')" class="filter-btn active text-xs font-semibold px-4 py-1.5 rounded-full border border-green-700 bg-green-700 text-white">Semua</button>
      <button onclick="setFilter(this, 'Pantai')" class="filter-btn text-xs font-semibold px-4 py-1.5 rounded-full border border-gray-300 text-gray-600 hover:border-green-600 hover:text-green-700">Pantai</button>
      <button onclick="setFilter(this, 'Gunung')" class="filter-btn text-xs font-semibold px-4 py-1.5 rounded-full border border-gray-300 text-gray-600 hover:border-green-600 hover:text-green-700">Gunung</button>
      <button onclick="setFilter(this, 'Budaya')" class="filter-btn text-xs font-semibold px-4 py-1.5 rounded-full border border-gray-300 text-gray-600 hover:border-green-600 hover:text-green-700">Budaya</button>
      <button onclick="setFilter(this, 'Air Terjun')" class="filter-btn text-xs font-semibold px-4 py-1.5 rounded-full border border-gray-300 text-gray-600 hover:border-green-600 hover:text-green-700">Air Terjun</button>
    </div>

    <!-- Cards -->
    <div id="cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5"></div>
    <p id="no-result" class="hidden text-center text-gray-500 py-16">Destinasi tidak ditemukan.</p>
  </main>

  <!-- Footer -->
  <footer class="text-center text-xs text-gray-400 py-6 border-t border-gray-200 bg-white mt-8">
    © 2025 WisataRating — Platform ulasan wisata Indonesia
  </footer>

  <script src="scripts.js"></script>
</body>
</html>
