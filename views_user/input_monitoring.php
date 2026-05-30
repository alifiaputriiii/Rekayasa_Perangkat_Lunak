<section id="view-inputMonitoring" class="view-section hidden flex-col items-center flex-1 w-full py-6 animate-fade-in">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Input Data Harian</h1>
        <p class="text-gray-600 mt-1 font-medium">Catat parameter kesehatan Anda hari ini untuk pemantauan.</p>
    </div>

    <div class="bg-[#d5deac] p-8 md:p-10 rounded-[2rem] w-full shadow-2xl border-b-4 border-r-4 border-[#b9c68c]">
        <form action="proses/proses_monitoring.php" method="POST" class="space-y-6">

            <!-- Kadar Gula Darah -->
            <div class="animate-slide-up" style="animation-delay: 0.1s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-solid fa-droplet text-red-500 mr-2"></i>Kadar Gula Darah (mg/dL)
                    <span class="text-red-500">*</span>
                </label>
                <input type="number" name="gula_darah" required min="20" max="600"
                    placeholder="Contoh: 120"
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
            </div>

            <!-- Tekanan Darah -->
            <div class="animate-slide-up" style="animation-delay: 0.2s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-solid fa-heart text-pink-500 mr-2"></i>Tekanan Darah
                    <span class="text-gray-400 font-normal text-xs ml-1">(Opsional)</span>
                </label>
                <input type="text" name="tekanan_darah"
                    placeholder="Contoh: 120/80"
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
                <p class="text-xs text-gray-500 mt-1 ml-1">Format: sistolik/diastolik (contoh: 120/80)</p>
            </div>

            <!-- Berat Badan -->
            <div class="animate-slide-up" style="animation-delay: 0.3s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-solid fa-weight-scale text-blue-500 mr-2"></i>Berat Badan (kg)
                    <span class="text-gray-400 font-normal text-xs ml-1">(Opsional)</span>
                </label>
                <input type="number" name="berat_badan" step="0.1" min="20" max="300"
                    placeholder="Contoh: 65.5"
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
            </div>

            <!-- Kondisi Kesehatan -->
            <div class="animate-slide-up" style="animation-delay: 0.4s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-solid fa-notes-medical text-green-600 mr-2"></i>Kondisi Kesehatan
                    <span class="text-gray-400 font-normal text-xs ml-1">(Opsional)</span>
                </label>
                <input type="text" name="kondisi_kesehata"
                    placeholder="Contoh: Merasa sedikit pusing, lemas, atau baik-baik saja"
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
            </div>

            <!-- Catatan Tambahan -->
            <div class="animate-slide-up" style="animation-delay: 0.5s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-solid fa-pen-to-square text-purple-500 mr-2"></i>Catatan Tambahan
                    <span class="text-gray-400 font-normal text-xs ml-1">(Opsional)</span>
                </label>
                <textarea rows="3" name="catatan"
                    placeholder="Contoh: Sudah minum obat, olahraga 30 menit pagi, makan teratur..."
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700 resize-none"></textarea>
            </div>

            <!-- Tanggal Monitoring -->
            <div class="animate-slide-up" style="animation-delay: 0.55s">
                <label class="block text-gray-800 font-bold mb-2">
                    <i class="fa-regular fa-calendar text-teal-600 mr-2"></i>Tanggal
                    <span class="text-red-500">*</span>
                </label>
                <input type="date" name="tanggal_monitoring" id="tanggal_monitoring" required
                    class="w-full px-5 py-3.5 rounded-xl border-none outline-none bg-white shadow-sm focus:ring-4 focus:ring-white/50 transition-all text-gray-700" />
            </div>

            <div class="pt-4 flex flex-col md:flex-row gap-4 animate-slide-up" style="animation-delay: 0.6s">
                <button type="button" onclick="navigateTo('monitoring')"
                    class="flex-1 bg-white text-gray-800 font-bold py-4 rounded-xl flex items-center justify-center gap-2 hover:bg-gray-50 transition-all hover:shadow-md active:scale-95 border border-gray-200">
                    <i class="fa-solid fa-arrow-left"></i> Batal
                </button>
                <button type="submit" name="submit_monitoring"
                    class="flex-1 bg-[#6b4cde] text-white font-bold py-4 rounded-xl flex items-center justify-center gap-2 hover:bg-purple-700 transition-all hover:shadow-lg active:scale-95">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Data Harian
                </button>
            </div>
        </form>
    </div>
</section>

<script>
// Set tanggal default ke hari ini
document.addEventListener('DOMContentLoaded', function () {
    const tgl = document.getElementById('tanggal_monitoring');
    if (tgl) {
        const today = new Date().toISOString().split('T')[0];
        tgl.value = today;
    }
});
</script>