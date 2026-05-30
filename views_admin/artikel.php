<!-- 2. KELOLA ARTIKEL / MANAJEMEN EDUKASI -->
        <section id="view-artikel" class="admin-section hidden animate-fade-in w-full">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 px-2">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Manajemen Edukasi</h1>
                    <p class="text-gray-600 mt-1 font-medium">Kelola artikel, panduan, dan informasi edukasi untuk pengguna.</p>
                </div>
                <button onclick="openModalArtikel()" class="bg-[#6b4cde] text-white px-6 py-3 rounded-full font-bold hover:bg-purple-700 transition-all shadow-lg active:scale-95 flex items-center gap-2 hover:-translate-y-1">
                    <i class="fa-solid fa-plus-circle text-xl"></i> Tambah Artikel
                </button>
            </div>

            <!-- Menggunakan Box Pembungkus Tema Ungu seperti Cek Dini -->
            <div class="bg-[#9c99c7] p-6 md:p-8 rounded-[2rem] w-full shadow-lg">
                <!-- Grid Artikel -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Card Artikel 1 -->
                    <div class="bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group flex flex-col border border-gray-100">
                        <div class="h-40 bg-[#f3cce3] relative overflow-hidden flex items-center justify-center">
                            <i class="fa-solid fa-cake-candles text-5xl text-orange-400 group-hover:scale-110 transition-transform duration-500"></i>
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-gray-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                Pola Makan
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="font-bold text-xl text-gray-900 leading-snug mb-3 group-hover:text-purple-600 transition-colors">Mengenal Pantangan Makanan untuk Penderita</h3>
                            <p class="text-sm text-gray-600 line-clamp-3 mb-4 font-medium leading-relaxed">Hindari makanan manis, tinggi lemak, dan karbohidrat sederhana untuk menjaga kestabilan gula darah harian Anda.</p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-xs font-bold text-gray-400"><i class="fa-regular fa-calendar mr-1"></i> 20 Mei 2026</span>
                                <div class="flex gap-2">
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 text-gray-600 hover:bg-purple-100 hover:text-purple-600 flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 text-gray-600 hover:bg-red-100 hover:text-red-500 flex items-center justify-center transition-colors shadow-sm" title="Hapus">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Artikel 2 -->
                    <div class="bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group flex flex-col border border-gray-100">
                        <div class="h-40 bg-teal-50 relative overflow-hidden flex items-center justify-center border-b-2 border-teal-100">
                            <i class="fa-solid fa-person-running text-5xl text-teal-500 group-hover:scale-110 transition-transform duration-500"></i>
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-gray-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                Aktivitas Fisik
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="font-bold text-xl text-gray-900 leading-snug mb-3 group-hover:text-purple-600 transition-colors">Olahraga Ringan 30 Menit Turunkan Risiko</h3>
                            <p class="text-sm text-gray-600 line-clamp-3 mb-4 font-medium leading-relaxed">Berjalan kaki, bersepeda santai, atau senam ringan sangat dianjurkan untuk membantu sensitivitas insulin.</p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-xs font-bold text-gray-400"><i class="fa-regular fa-calendar mr-1"></i> 18 Mei 2026</span>
                                <div class="flex gap-2">
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 text-gray-600 hover:bg-purple-100 hover:text-purple-600 flex items-center justify-center transition-colors shadow-sm" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 text-gray-600 hover:bg-red-100 hover:text-red-500 flex items-center justify-center transition-colors shadow-sm" title="Hapus">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>