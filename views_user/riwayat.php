<?php
if (!isset($_SESSION['id_user'])) return;

$id_user = (int)$_SESSION['id_user'];

$stmt = mysqli_prepare($koneksi,
    "SELECT * FROM screening_diabetes WHERE id_user = ? ORDER BY tanggal_screening DESC"
);
mysqli_stmt_bind_param($stmt, 'i', $id_user);
mysqli_stmt_execute($stmt);
$riwayat_screening = mysqli_stmt_get_result($stmt);

$stmt2 = mysqli_prepare($koneksi,
    "SELECT * FROM monitoring_kesehatan WHERE id_user = ? ORDER BY tanggal_monitoring DESC"
);
mysqli_stmt_bind_param($stmt2, 'i', $id_user);
mysqli_stmt_execute($stmt2);
$riwayat_monitoring = mysqli_stmt_get_result($stmt2);
?>

<section id="view-riwayat" class="view-section hidden flex-col items-center flex-1 w-full animate-fade-in">
    <div class="text-center mb-8 pt-6">
        <h1 class="text-3xl font-bold text-gray-900">Riwayat Pemeriksaan</h1>
        <p class="text-gray-600 mt-1 font-medium">Daftar rekam medis dan hasil screening terdahulu Anda.</p>
    </div>

    <div class="bg-[#a5dbb7] p-6 md:p-8 w-full shadow-xl border-b-4 border-r-4 border-[#8ebf9e] space-y-5">

        <?php if (mysqli_num_rows($riwayat_screening) === 0 && mysqli_num_rows($riwayat_monitoring) === 0): ?>
            <div class="bg-white p-8 rounded-2xl text-center text-gray-500">
                <i class="fa-solid fa-folder-open text-4xl mb-3 text-gray-300"></i>
                <p class="font-semibold">Belum ada riwayat pemeriksaan.</p>
            </div>
        <?php endif; ?>

        <?php while ($row = mysqli_fetch_assoc($riwayat_screening)):
            $hasil     = $row['hasil_screening'];
            $status    = explode(' ', $hasil)[0];
            $statusLow = strtolower($status);

            if ($statusLow === 'tinggi') {
                $border  = 'border-red-500';
                $iconClr = 'text-red-500';
                $badge   = 'bg-red-100 text-red-600 border-red-200';
            } elseif ($statusLow === 'sedang') {
                $border  = 'border-orange-400';
                $iconClr = 'text-orange-400';
                $badge   = 'bg-orange-100 text-orange-600 border-orange-200';
            } else {
                $border  = 'border-green-500';
                $iconClr = 'text-green-500';
                $badge   = 'bg-green-100 text-green-700 border-green-200';
            }

            preg_match('/\((\d+)%\)/', $hasil, $match);
            $skor    = isset($match[1]) ? $match[1] : 0;
            $tanggal = date('d M Y', strtotime($row['tanggal_screening']));
        ?>
        <div class="bg-white p-5 rounded-2xl shadow-sm hover:shadow-md transition-all flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-l-4 <?php echo $border; ?> hover:-translate-y-1">
            <div>
                <h3 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                    <i class="fa-solid fa-file-medical <?php echo $iconClr; ?>"></i> Cek Dini Risiko Diabetes
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="fa-regular fa-calendar-days mr-1"></i> <?php echo $tanggal; ?>
                </p>
            </div>
            <div class="flex flex-col md:items-end gap-2 w-full md:w-auto">
                <span class="px-4 py-1.5 rounded-full text-sm font-bold border text-center w-full md:w-auto <?php echo $badge; ?>">
                    Risiko <?php echo htmlspecialchars($status); ?> (<?php echo $skor; ?>%)
                </span>
                <button onclick="navigateTo('hasilAnalisis', <?php echo $skor; ?>, '<?php echo $status; ?>')"
                    class="text-blue-600 hover:text-blue-800 font-semibold text-sm underline md:mr-2">
                    Lihat Laporan Lengkap
                </button>
            </div>
        </div>
        <?php endwhile; ?>

        <?php while ($row = mysqli_fetch_assoc($riwayat_monitoring)):
            $tanggal = date('d M Y', strtotime($row['tanggal_monitoring']));
        ?>
        <div class="bg-white p-5 rounded-2xl shadow-sm hover:shadow-md transition-all flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-l-4 border-blue-400 hover:-translate-y-1 opacity-80">
            <div>
                <h3 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check text-blue-400"></i> Data Monitoring Harian
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    <i class="fa-regular fa-calendar-days mr-1"></i> <?php echo $tanggal; ?>
                </p>
                <p class="text-xs text-gray-600 mt-2 bg-gray-50 p-2 rounded w-full md:max-w-md border border-gray-100">
                    Gula: <?php echo $row['gula_darah']; ?> mg/dL |
                    Tekanan: <?php echo $row['tekanan_darah'] ?: '-'; ?> |
                    Berat: <?php echo $row['berat_badan'] ?: '-'; ?> kg |
                    Kondisi: <?php echo $row['kondisi_kesehata'] ?: 'Tidak ada'; ?>
                </p>
            </div>
            <div class="flex flex-col md:items-end gap-2 w-full md:w-auto">
                <span class="bg-gray-100 text-gray-600 px-4 py-1.5 rounded-full text-sm font-bold border border-gray-200 text-center w-full md:w-auto">
                    <i class="fa-solid fa-check"></i> Tersimpan
                </span>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</section>