<section id="view-cekDini" class="view-section hidden flex-col items-center flex-1 w-full animate-fade-in">
    <div class="text-center mb-6 pt-6">
        <h1 class="text-3xl font-bold text-gray-900">Cek Dini Risiko Diabetes</h1>
        <p class="text-gray-600 mt-1 font-medium">Jawab beberapa pertanyaan berikut untuk mengetahui tingkat risiko Anda secara mandiri.</p>
    </div>

    <?php if(isset($_GET['error'])): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg w-full shadow-sm animate-fade-in px-8">
        <p class="font-bold"><i class="fa-solid fa-circle-exclamation mr-2"></i> Perhatian</p>
        <p><?php echo htmlspecialchars($_GET['error']); ?></p>
    </div>
    <?php endif; ?>

    <div class="bg-[#9c99c7] p-8 md:p-10 w-full shadow-2xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] transition-shadow duration-300">
        <form action="proses/proses_screening.php" method="POST" class="space-y-6 max-w-3xl mx-auto">
            <div class="animate-slide-up" style="animation-delay: 0.1s">
                <label class="block text-gray-900 font-bold mb-2">Berapa usia Anda saat ini?</label>
                <input type="number" name="usia" required placeholder="Isi jawaban Anda (misal: 30)" class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.2s">
                <label class="block text-gray-900 font-bold mb-2">Apakah ada keluarga inti (orang tua/saudara) yang mengidap diabetes?</label>
                <div class="relative">
                    <select name="riwayat_keluarga" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.3s">
                <label class="block text-gray-900 font-bold mb-2">Apakah Anda merasa lebih sering haus dari biasanya (Polidipsia)?</label>
                <div class="relative">
                    <select name="polidipsia" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.4s">
                <label class="block text-gray-900 font-bold mb-2">Apakah Anda sering terbangun di malam hari untuk buang air kecil (Poliuria)?</label>
                <div class="relative">
                    <select name="poliuria" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.5s">
                <label class="block text-gray-900 font-bold mb-2">Apakah Anda merasa mudah lapar meskipun sudah makan dengan cukup (Polifagia)?</label>
                <div class="relative">
                    <select name="polifagia" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.6s">
                <label class="block text-gray-900 font-bold mb-2">Apakah Anda sering mengalami kesemutan atau mati rasa di tangan/kaki?</label>
                <div class="relative">
                    <select name="kesemutan" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="animate-slide-up" style="animation-delay: 0.7s">
                <label class="block text-gray-900 font-bold mb-2">Jika Anda memiliki luka, apakah luka tersebut lama atau sulit sembuh?</label>
                <div class="relative">
                    <select name="luka_lama" required class="w-full px-5 py-3.5 rounded-xl border-none outline-none appearance-none bg-white text-gray-500 cursor-pointer shadow-sm focus:ring-4 focus:ring-white/50 transition-all">
                        <option value="" disabled selected>Pilih jawaban Anda</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                </div>
            </div>
            <div class="pt-8 flex justify-center animate-slide-up" style="animation-delay: 0.8s">
                <button type="submit" name="submit_screening" class="bg-[#6b4cde] text-white font-bold px-12 py-4 rounded-xl w-full md:w-auto md:min-w-[400px] hover:bg-blue-700 hover:shadow-xl active:scale-95 hover:-translate-y-1 transition-all duration-200">
                    Lihat Hasil Analisis
                </button>
            </div>
        </form>
    </div>
</section>