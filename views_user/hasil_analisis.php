<?php
if (!isset($_SESSION['id_user'])) return;

$id_user = (int)$_SESSION['id_user'];

$stmt = mysqli_prepare($koneksi,
    "SELECT * FROM screening_diabetes WHERE id_user = ? ORDER BY id_screening DESC LIMIT 1"
);
mysqli_stmt_bind_param($stmt, 'i', $id_user);
mysqli_stmt_execute($stmt);
$result  = mysqli_stmt_get_result($stmt);
$data_db = mysqli_fetch_assoc($result);

$skor   = isset($_GET['skor'])   ? (int)$_GET['skor'] : 0;
$status = isset($_GET['status']) ? $_GET['status']     : 'Tidak Diketahui';

if (!isset($_GET['skor']) && $data_db) {
    $status = explode(" ", $data_db['hasil_screening'])[0];
    preg_match('/\((\d+)%\)/', $data_db['hasil_screening'], $match);
    $skor = isset($match[1]) ? (int)$match[1] : 0;
}

$warna_text = "text-gray-500";
$bg_circle  = "bg-gray-100";
$icon       = "fa-circle-question";

if (strtolower($status) === 'rendah') {
    $warna_text = "text-green-500";
    $bg_circle  = "bg-green-100";
    $icon       = "fa-shield-heart";
} elseif (strtolower($status) === 'sedang') {
    $warna_text = "text-[#f39c12]";
    $bg_circle  = "bg-[#fff8db]";
    $icon       = "fa-shield-cat";
} elseif (strtolower($status) === 'tinggi') {
    $warna_text = "text-red-600";
    $bg_circle  = "bg-red-100";
    $icon       = "fa-triangle-exclamation";
}
?>

<section id="view-hasilAnalisis" class="view-section flex flex-col items-center flex-1 w-full animate-fade-in">
    <div class="text-center mb-6 pt-6">
        <h1 class="text-3xl font-bold text-gray-900">Hasil Analisis Risiko Diabetes</h1>
        <p class="text-gray-600 mt-1 font-medium">Berdasarkan jawaban yang Anda isi, berikut hasil awal kondisi anda</p>
    </div>

    <div class="bg-[#9c99c7] p-6 md:p-8 w-full shadow-lg space-y-6">

        <div class="bg-white p-8 rounded-[1.8rem] flex flex-col md:flex-row items-center justify-between shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex-1 flex justify-center mb-6 md:mb-0 relative z-10">
                <div class="w-40 h-40 <?php echo $bg_circle; ?> rounded-full flex flex-col items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid <?php echo $icon; ?> text-6xl <?php echo $warna_text; ?> mb-2"></i>
                    <span class="<?php echo $warna_text; ?> font-semibold text-sm">Risiko <?php echo htmlspecialchars($status); ?></span>
                </div>
            </div>
            <div class="flex-1 text-center md:text-left md:px-8 relative z-10">
                <h3 class="text-gray-800 font-bold text-xl">Skor Risiko Diabetes Anda</h3>
                <h2 class="text-8xl font-bold <?php echo $warna_text; ?> my-2 drop-shadow-sm"><?php echo $skor; ?>%</h2>
                <p class="text-gray-600 text-sm leading-relaxed">Anda memiliki beberapa faktor risiko diabetes dan disarankan melakukan pemeriksaan lebih lanjut</p>
            </div>
            <div class="flex-1 hidden md:flex justify-center relative z-10">
                <div class="relative group-hover:scale-105 transition-transform duration-500">
                    <i class="fa-regular fa-file text-8xl text-purple-300/50"></i>
                    <i class="fa-solid fa-check text-5xl absolute -bottom-2 -right-4 text-purple-600"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 md:p-8 rounded-[1.8rem] shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-gray-800 font-bold text-lg mb-6 flex items-center gap-3 border-b pb-3 border-gray-100">
                    <i class="fa-solid fa-list-check text-purple-600 text-xl"></i> Ringkasan Analisis
                </h3>
                <ul class="space-y-4 text-sm text-gray-700 font-medium">
                    <?php if ($data_db): ?>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-user-clock text-purple-600 mt-1 text-lg w-5 text-center"></i>
                            <span>Usia saat ini: <b><?php echo $data_db['usia']; ?> Tahun</b>.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-users text-purple-600 mt-1 text-lg w-5 text-center"></i>
                            <span>Riwayat keluarga pengidap diabetes: <b><?php echo ucfirst($data_db['riwayat_keluarga']); ?></b>.</span>
                        </li>
                    <?php else: ?>
                        <li>Belum ada data tercatat di database.</li>
                    <?php endif; ?>
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-glass-water text-purple-600 mt-1 text-lg w-5 text-center"></i>
                        <span>Anda mengindikasikan sering merasa haus (Polidipsia).</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-band-aid text-purple-600 mt-1 text-lg w-5 text-center"></i>
                        <span>Anda mengindikasikan memiliki luka yang sulit sembuh.</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[1.8rem] shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-gray-800 font-bold text-lg mb-6 flex items-center gap-3 border-b pb-3 border-gray-100">
                    <i class="fa-solid fa-lightbulb text-purple-600 text-xl"></i> Rekomendasi Untuk Anda
                </h3>
                <ul class="space-y-5 text-sm text-gray-700 font-medium">
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-check text-purple-600 mt-0.5 text-lg font-bold"></i>
                        <span>Kurangi konsumsi makanan dan minuman manis.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-check text-purple-600 mt-0.5 text-lg font-bold"></i>
                        <span>Rutin berolahraga minimal 30 menit setiap hari.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-check text-purple-600 mt-0.5 text-lg font-bold"></i>
                        <span>Lakukan pemeriksaan gula darah di fasilitas kesehatan.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="bg-purple-600 text-white w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                <i class="fa-solid fa-exclamation font-bold text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-sm">Catatan Penting</h4>
                <p class="text-gray-600 text-sm mt-1 leading-relaxed">Hasil ini bukan merupakan hasil diagnosis medis. Untuk hasil yang lebih baik, Silahkan konsultasikan dengan dokter atau tenaga kesehatan professional.</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 pt-2">
            <a href="index.php?page=cekDini" class="flex-1 bg-white text-gray-800 font-bold py-4 rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all hover:shadow-lg active:scale-95 group border border-gray-100">
                <i class="fa-solid fa-rotate-left text-purple-600 text-xl group-hover:-rotate-90 transition-transform duration-500"></i> Cek Ulang
            </a>
            <button onclick="downloadHasil()" class="flex-1 bg-[#6b4cde] text-white font-bold py-4 rounded-xl flex items-center justify-center gap-3 hover:bg-purple-700 transition-all hover:shadow-lg active:scale-95 group">
                <i class="fa-solid fa-download text-xl group-hover:translate-y-1 transition-transform"></i> Download Hasil
            </button>
        </div>
    </div>
</section>