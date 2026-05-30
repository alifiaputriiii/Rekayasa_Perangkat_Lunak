<!-- MODAL TAMBAH ARTIKEL -->
    <div id="modal-artikel" class="fixed inset-0 z-50 hidden flex justify-center items-start pt-10 px-4 pb-10 overflow-y-auto custom-scrollbar">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop" onclick="closeModalArtikel()"></div>
        
        <!-- Modal Content (Tema Ungu Cek Dini) -->
        <div class="bg-[#9c99c7] p-2 rounded-[2rem] w-full max-w-2xl relative z-10 transform scale-95 opacity-0 transition-all duration-300 shadow-2xl" id="modal-content">
            <div class="bg-white rounded-[1.8rem] overflow-hidden border border-gray-100">
                <div class="flex justify-between items-center p-6 md:p-8 border-b border-gray-100 bg-gray-50">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900"><i class="fa-solid fa-pen-to-square text-purple-600 mr-2"></i> Form Artikel Baru</h2>
                        <p class="text-sm text-gray-500 font-medium mt-1">Tambahkan materi edukasi kesehatan ke dalam sistem.</p>
                    </div>
                    <button onclick="closeModalArtikel()" class="text-gray-400 hover:text-red-500 transition-colors w-10 h-10 flex justify-center items-center rounded-xl bg-white shadow-sm hover:shadow-md">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
                
                <form onsubmit="submitArtikel(event)" class="p-6 md:p-8 space-y-6">
                    <div>
                        <label class="block text-gray-900 font-bold mb-2">Judul Artikel</label>
                        <input type="text" required placeholder="Masukkan judul artikel" class="w-full px-5 py-3.5 rounded-xl border-none outline-none shadow-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all text-gray-700">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">Kategori</label>
                            <div class="relative">
                                <select required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none shadow-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all text-gray-700 cursor-pointer font-medium">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Pola Makan">Pola Makan</option>
                                    <option value="Aktivitas Fisik">Aktivitas Fisik</option>
                                    <option value="Obat-obatan">Obat-obatan</option>
                                    <option value="Pencegahan">Pencegahan Risiko</option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">URL Gambar (Opsional)</label>
                            <input type="text" placeholder="https://..." class="w-full px-5 py-3.5 rounded-xl border-none outline-none shadow-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all text-gray-700">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-900 font-bold mb-2">Isi Konten</label>
                        <textarea required rows="6" placeholder="Tuliskan isi edukasi di sini..." class="w-full px-5 py-3.5 rounded-xl border-none outline-none shadow-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all text-gray-700 resize-y custom-scrollbar"></textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end gap-4">
                        <button type="button" onclick="closeModalArtikel()" class="px-8 py-3.5 rounded-xl text-gray-700 font-bold bg-white border border-gray-200 hover:bg-gray-50 hover:shadow-sm transition-all active:scale-95">Batal</button>
                        <button type="submit" class="px-8 py-3.5 rounded-xl text-white font-bold bg-[#6b4cde] hover:bg-purple-700 shadow-md active:scale-95 transition-all flex items-center gap-2">
                            <i class="fa-solid fa-save"></i> Simpan Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
