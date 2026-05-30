<!-- 3. DATA PENGGUNA -->
        <section id="view-pengguna" class="admin-section hidden animate-fade-in w-full">
            <div class="mb-6 px-2">
                <h1 class="text-3xl font-bold text-gray-900">Manajemen Data Pengguna</h1>
                <p class="text-gray-600 mt-1 font-medium">Daftar pengguna (Pasien/User) yang terdaftar dalam sistem D-Care.</p>
            </div>

            <!-- Menggunakan Box Pembungkus Tema Hijau Tua -->
            <div class="bg-[#93c4a2] p-6 md:p-8 rounded-[2rem] w-full shadow-lg border-b-4 border-r-4 border-[#7ea98b]">
                
                <!-- Toolbar Table -->
                <div class="flex flex-col md:flex-row justify-between gap-4 bg-white/40 backdrop-blur-sm p-4 rounded-[1.5rem] shadow-sm mb-6">
                    <div class="relative flex-1 max-w-md">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                        <input type="text" placeholder="Cari nama, email, atau no HP..." class="w-full pl-12 pr-4 py-3 rounded-xl border-none outline-none shadow-inner bg-white/90 focus:bg-white transition-all text-sm font-medium text-gray-700">
                    </div>
                    <div class="flex gap-3">
                        <button class="bg-white text-gray-700 px-6 py-3 rounded-xl text-sm font-bold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            <i class="fa-solid fa-filter text-[#93c4a2]"></i> Filter
                        </button>
                        <button class="bg-gray-800 text-white px-6 py-3 rounded-xl text-sm font-bold shadow-sm hover:bg-black hover:shadow-md hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            <i class="fa-solid fa-download"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-5 font-bold">ID User</th>
                                    <th class="px-6 py-5 font-bold">Info Pengguna</th>
                                    <th class="px-6 py-5 font-bold">Jenis Kelamin</th>
                                    <th class="px-6 py-5 font-bold">No HP</th>
                                    <th class="px-6 py-5 font-bold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 text-sm font-medium">
                                <!-- Row 1 -->
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400 font-bold">#USR-001</td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800 text-base">Budi Santoso</div>
                                        <div class="text-xs text-gray-500 font-normal">budi.santoso@email.com</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">Laki-laki</td>
                                    <td class="px-6 py-4 text-gray-600">081234567890</td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-blue-600 bg-blue-50 px-4 py-2 rounded-lg hover:bg-blue-100 font-bold text-xs transition-colors shadow-sm">
                                            <i class="fa-solid fa-eye mr-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400 font-bold">#USR-045</td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800 text-base">Siti Aminah</div>
                                        <div class="text-xs text-gray-500 font-normal">siti.am@email.com</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">Perempuan</td>
                                    <td class="px-6 py-4 text-gray-600">085612341234</td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-blue-600 bg-blue-50 px-4 py-2 rounded-lg hover:bg-blue-100 font-bold text-xs transition-colors shadow-sm">
                                            <i class="fa-solid fa-eye mr-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400 font-bold">#USR-112</td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800 text-base">Ahmad Fauzi</div>
                                        <div class="text-xs text-gray-500 font-normal">ahmad.fzi@email.com</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">Laki-laki</td>
                                    <td class="px-6 py-4 text-gray-600">081198765432</td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-blue-600 bg-blue-50 px-4 py-2 rounded-lg hover:bg-blue-100 font-bold text-xs transition-colors shadow-sm">
                                            <i class="fa-solid fa-eye mr-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Mockup -->
                    <div class="bg-gray-50 px-6 py-4 flex items-center justify-between border-t border-gray-100">
                        <span class="text-xs font-semibold text-gray-500">Menampilkan 1-3 dari 1,248</span>
                        <div class="flex gap-2">
                            <button class="w-8 h-8 flex items-center justify-center bg-white rounded-lg text-gray-400 shadow-sm cursor-not-allowed text-sm"><i class="fa-solid fa-angle-left"></i></button>
                            <button class="w-8 h-8 flex items-center justify-center bg-[#93c4a2] text-white rounded-lg shadow-sm font-bold text-sm">1</button>
                            <button class="w-8 h-8 flex items-center justify-center bg-white hover:bg-gray-100 rounded-lg text-gray-600 shadow-sm font-bold text-sm transition-colors">2</button>
                            <button class="w-8 h-8 flex items-center justify-center bg-white hover:bg-gray-100 rounded-lg text-gray-600 shadow-sm font-bold text-sm transition-colors"><i class="fa-solid fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>