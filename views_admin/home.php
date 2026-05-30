<!-- 1. HOME / DASHBOARD PANTAUAN -->
        <section id="view-home" class="admin-section animate-fade-in space-y-6 w-full">
            <div class="text-center md:text-left mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard Pantauan</h1>
                <p class="text-gray-600 mt-1 font-medium">Ringkasan aktivitas dan data kesehatan pengguna aplikasi D-Care.</p>
            </div>

            <!-- Stat Cards Grid (Tema Hijau/Kuning seperti User) -->
            <div class="bg-[#d5deac] p-6 rounded-[2rem] w-full shadow-lg border-b-4 border-r-4 border-[#b9c68c] transition-shadow duration-300">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-[#e4ebc5] rounded-2xl p-6 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 animate-slide-up" style="animation-delay: 0.1s;">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 mb-1">Total Pengguna Terdaftar</p>
                                <h3 class="text-4xl font-bold text-gray-800">1,248</h3>
                                <p class="text-xs font-bold text-green-700 mt-2 bg-green-100 w-max px-3 py-1 rounded-full"><i class="fa-solid fa-arrow-trend-up"></i> +12 bulan ini</p>
                            </div>
                            <div class="w-12 h-12 bg-white text-[#a6af77] rounded-xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-[#e4ebc5] rounded-2xl p-6 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 animate-slide-up" style="animation-delay: 0.2s;">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 mb-1">Total Artikel Edukasi</p>
                                <h3 class="text-4xl font-bold text-gray-800">45</h3>
                                <p class="text-xs font-bold text-blue-700 mt-2 bg-blue-100 w-max px-3 py-1 rounded-full"><i class="fa-solid fa-book-medical"></i> Dikelola Admin</p>
                            </div>
                            <div class="w-12 h-12 bg-white text-[#a6af77] rounded-xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-[#e4ebc5] rounded-2xl p-6 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 animate-slide-up" style="animation-delay: 0.3s;">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 mb-1">Peringatan Risiko Tinggi</p>
                                <h3 class="text-4xl font-bold text-gray-800">86</h3>
                                <p class="text-xs font-bold text-red-700 mt-2 bg-red-100 w-max px-3 py-1 rounded-full"><i class="fa-solid fa-circle-exclamation"></i> Cek Dini</p>
                            </div>
                            <div class="w-12 h-12 bg-white text-[#a6af77] rounded-xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fa-solid fa-heart-crack"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Monitoring Table (Tema Hijau Chatbot) -->
            <div class="bg-[#a5dbb7] rounded-[2rem] w-full shadow-lg border-b-4 border-r-4 border-[#8ebf9e] overflow-hidden flex flex-col transition-shadow animate-slide-up" style="animation-delay: 0.4s;">
                <!-- Header Tabel -->
                <div class="bg-[#8ebf9e] py-4 px-6 border-b border-[#7bab8a] flex justify-between items-center shadow-sm">
                    <h3 class="font-bold text-lg text-gray-800"><i class="fa-solid fa-wave-square text-gray-700 mr-2"></i> Pantauan Monitoring Terbaru</h3>
                    <button onclick="navigateAdmin('pengguna')" class="text-sm bg-white/50 px-3 py-1.5 rounded-full text-gray-800 font-semibold hover:bg-white transition-colors">Lihat Semua &rarr;</button>
                </div>
                
                <!-- Isi Tabel -->
                <div class="p-4 bg-white/30 backdrop-blur-sm">
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider border-b border-gray-100">
                                        <th class="px-6 py-4 font-bold">Pengguna</th>
                                        <th class="px-6 py-4 font-bold">Gula Darah</th>
                                        <th class="px-6 py-4 font-bold">Tekanan Darah</th>
                                        <th class="px-6 py-4 font-bold">Tanggal Input</th>
                                        <th class="px-6 py-4 font-bold">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm font-medium">
                                    <tr class="hover:bg-green-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-800">Budi Santoso</div>
                                            <div class="text-xs text-gray-500 font-normal">ID: USR-001</div>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-gray-700">125 mg/dL</td>
                                        <td class="px-6 py-4 text-gray-600">120/80</td>
                                        <td class="px-6 py-4 text-gray-500 font-normal">29 Mei 2026, 08:30</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">Normal</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-green-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-800">Siti Aminah</div>
                                            <div class="text-xs text-gray-500 font-normal">ID: USR-045</div>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-red-500">180 mg/dL</td>
                                        <td class="px-6 py-4 text-gray-600">130/85</td>
                                        <td class="px-6 py-4 text-gray-500 font-normal">28 Mei 2026, 19:15</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold border border-red-200">Tinggi</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-green-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-800">Ahmad Fauzi</div>
                                            <div class="text-xs text-gray-500 font-normal">ID: USR-112</div>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-gray-700">100 mg/dL</td>
                                        <td class="px-6 py-4 text-gray-600">110/75</td>
                                        <td class="px-6 py-4 text-gray-500 font-normal">28 Mei 2026, 07:00</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">Normal</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
