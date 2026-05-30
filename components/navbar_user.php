<?php // components/navbar_user.php ?>
<nav class="flex justify-between items-center py-5 px-8 md:px-16 w-full z-10 relative bg-white/80 backdrop-blur-sm shadow-sm">
    <div class="flex items-center gap-2 cursor-pointer group" onclick="navigateTo('home')">
        <div class="bg-white p-2.5 rounded-lg shadow-sm group-hover:shadow-md transition-all group-hover:-rotate-3">
            <i class="fa-solid fa-heart-pulse text-blue-700 text-3xl"></i>
        </div>
        <span class="text-3xl font-bold text-blue-900 tracking-wider group-hover:text-blue-700 transition-colors">
            D-Care
        </span>
    </div>

    <div class="hidden md:flex gap-8 lg:gap-10 text-base font-semibold text-gray-800 items-center">
        <button onclick="navigateTo('home')" class="relative overflow-hidden group pb-1">
            <span class="group-hover:text-blue-600 transition-colors">Home</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
        </button>
        <button onclick="checkLogin('cekDini')" class="relative overflow-hidden group pb-1">
            <span class="group-hover:text-blue-600 transition-colors">Cek Dini</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
        </button>
        <button onclick="checkLogin('monitoring')" class="relative overflow-hidden group pb-1">
            <span class="group-hover:text-blue-600 transition-colors">Monitoring</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
        </button>
        <button onclick="checkLogin('riwayat')" class="relative overflow-hidden group pb-1">
            <span class="group-hover:text-blue-600 transition-colors">Riwayat</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
        </button>
        <button onclick="navigateTo('chatbot')" class="relative overflow-hidden group pb-1">
            <span class="group-hover:text-blue-600 transition-colors">Chatbot</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
        </button>

        <?php if (isset($_SESSION['id_user'])): ?>
            <!-- Sudah Login: tampilkan avatar + nama + dropdown -->
            <div class="relative ml-2" id="userMenuWrapper">
                <button onclick="toggleUserMenu()" class="flex items-center gap-2 bg-purple-50 hover:bg-purple-100 px-3 py-2 rounded-full transition-all duration-200 border border-purple-200 shadow-sm active:scale-95">
                    <!-- Avatar inisial -->
                    <div class="w-8 h-8 rounded-full bg-[#6b4cde] text-white flex items-center justify-center font-bold text-sm shadow">
                        <?= strtoupper(substr($_SESSION['nama'] ?? 'U', 0, 1)) ?>
                    </div>
                    <!-- Nama user -->
                    <span class="hidden md:block text-sm font-semibold text-gray-700 max-w-[120px] truncate">
                        <?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 z-50 overflow-hidden">
                    <!-- Info user -->
                    <div class="px-4 py-3 border-b border-gray-100 bg-purple-50">
                        <p class="text-xs text-gray-400 mb-0.5">Login sebagai</p>
                        <p class="text-sm font-bold text-gray-800 truncate">
                            <?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?>
                        </p>
                    </div>
                    <!-- Tombol Logout -->
                    <a href="proses/proses_logout.php" class="flex items-center gap-2 px-4 py-3 text-red-500 hover:bg-red-50 text-sm font-semibold transition-colors duration-150">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </div>
            </div>

        <?php else: ?>
            <!-- Belum Login: tampilkan tombol Login -->
            <button onclick="navigateTo('login')" class="bg-[#6b4cde] text-white px-6 py-2 ml-2 rounded-full font-bold hover:bg-purple-700 transition-all shadow-md active:scale-95 flex items-center gap-2 text-base">
                <i class="fa-solid fa-right-to-bracket"></i> Login
            </button>
        <?php endif; ?>
    </div>
</nav>