<?php
if (!isset($koneksi)) {
    require_once __DIR__ . '/../koneksi.php';
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_user = $_SESSION['id_user'] ?? 1; // Sesuaikan dengan session login

// Ambil data monitoring terbaru user
$query = "SELECT * FROM monitoring_kesehatan WHERE id_user = $id_user ORDER BY tanggal_monitoring DESC LIMIT 7";
$result = mysqli_query($koneksi, $query);
$data_monitoring = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Data terbaru (hari ini / entry terakhir)
$latest = $data_monitoring[0] ?? null;

// Hitung rata-rata dan data untuk grafik (gula darah 7 hari terakhir)
$chart_labels = [];
$chart_values = [];
$max_gula = 300; // Nilai maks untuk normalisasi bar

foreach (array_reverse($data_monitoring) as $row) {
    $chart_labels[] = date('d/m', strtotime($row['tanggal_monitoring']));
    $chart_values[] = (int)$row['gula_darah'];
}

// Target gula darah
$target_gula = 140;
$status_gula = '';
$status_class = '';
if ($latest) {
    if ($latest['gula_darah'] <= $target_gula) {
        $status_gula = 'Aman';
        $status_class = 'text-green-700 bg-green-100';
    } elseif ($latest['gula_darah'] <= 180) {
        $status_gula = 'Perhatian';
        $status_class = 'text-yellow-700 bg-yellow-100';
    } else {
        $status_gula = 'Tinggi';
        $status_class = 'text-red-700 bg-red-100';
    }
}

$has_data = !empty($data_monitoring);
?>

<section id="view-monitoring" class="view-section hidden flex-col items-center flex-1 w-full py-6 animate-fade-in">
    <!-- Header Top -->
    <div class="w-full flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <!-- Title Badge -->
        <div class="bg-[#b3be93] px-12 py-3 rounded-full shadow-md border border-[#a2ad83] transform hover:scale-105 transition-transform cursor-default">
            <h1 class="text-3xl font-semibold text-gray-800">Monitoring Kesehatan</h1>
        </div>
        <!-- Tombol Input Data Harian -->
        
    </div>

    <?php if (!$has_data): ?>
    <!-- === EMPTY STATE === -->
    <div class="bg-[#d5deac] p-10 rounded-[2rem] w-full shadow-xl border-b-4 border-r-4 border-[#b9c68c] flex flex-col items-center justify-center gap-6 min-h-[320px]">
        <div class="bg-[#c2cc8d] rounded-full p-6 shadow-inner">
            <i class="fa-solid fa-heart-pulse text-5xl text-[#7a8a55]"></i>
        </div>
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Data Monitoring</h2>
            <p class="text-gray-500 max-w-sm">Mulai catat parameter kesehatan Anda hari ini untuk melihat perkembangan dan grafik kesehatan Anda.</p>
        </div>
        <button onclick="navigateTo('inputMonitoring')" class="bg-[#6b4cde] text-white px-8 py-3 rounded-full font-bold hover:bg-purple-700 transition-all shadow-lg active:scale-95 flex items-center gap-2">
            <i class="fa-solid fa-plus-circle"></i> Mulai Input Sekarang
        </button>
    </div>

    <?php else: ?>
    <!-- === DATA ADA === -->
    <div class="bg-[#d5deac] p-6 md:p-8 rounded-[2rem] w-full shadow-xl hover:shadow-2xl flex flex-col md:flex-row gap-6 border-b-4 border-r-4 border-[#b9c68c] transition-shadow duration-300">
        
        <!-- Left Side: Info Kondisi Terkini -->
        <div class="bg-[#c2cc8d] w-full md:w-1/3 rounded-[1.5rem] min-h-[300px] shadow-inner flex flex-col items-center justify-center p-6 gap-4 border-2 border-dashed border-[#a6af77]">
            <div class="bg-white/60 rounded-2xl p-4 w-full text-center shadow-sm">
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Gula Darah Terakhir</p>
                <p class="text-4xl font-black text-gray-800 mt-1"><?= htmlspecialchars($latest['gula_darah']) ?></p>
                <p class="text-sm text-gray-500 font-medium">mg/dL</p>
            </div>
            <?php if ($latest['tekanan_darah']): ?>
            <div class="bg-white/60 rounded-2xl p-4 w-full text-center shadow-sm">
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Tekanan Darah</p>
                <p class="text-2xl font-bold text-gray-800 mt-1"><?= htmlspecialchars($latest['tekanan_darah']) ?></p>
                <p class="text-sm text-gray-500">mmHg</p>
            </div>
            <?php endif; ?>
            <?php if ($latest['berat_badan']): ?>
            <div class="bg-white/60 rounded-2xl p-4 w-full text-center shadow-sm">
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Berat Badan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1"><?= htmlspecialchars($latest['berat_badan']) ?> <span class="text-base font-normal">kg</span></p>
            </div>
            <?php endif; ?>
            <p class="text-xs text-gray-500 mt-auto">
                <i class="fa-regular fa-calendar mr-1"></i>
                <?= date('d M Y', strtotime($latest['tanggal_monitoring'])) ?>
            </p>
        </div>

        <!-- Middle Stats -->
        <div class="flex flex-col gap-4 flex-1">
            <!-- Status Gula Darah -->
            <div class="bg-[#e4ebc5] p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all">
                <p class="text-gray-800 font-semibold text-sm">Gula Darah</p>
                <p class="text-gray-800 font-bold mb-3 text-xl"><?= $latest['gula_darah'] ?> mg/dL</p>
                <?php $pct = min(100, round(($latest['gula_darah'] / 300) * 100)); ?>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-800">[</span>
                    <div class="flex-1 bg-white h-5 rounded-sm overflow-hidden flex border border-gray-300 shadow-inner">
                        <div class="<?= $latest['gula_darah'] <= 140 ? 'bg-green-500' : ($latest['gula_darah'] <= 180 ? 'bg-yellow-500' : 'bg-red-500') ?> h-full transition-all" style="width: <?= $pct ?>%"></div>
                    </div>
                    <span class="font-bold text-gray-800">] <?= $pct ?>%</span>
                </div>
            </div>

            <!-- Kondisi Kesehatan -->
            <div class="bg-[#e4ebc5] p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all flex-1">
                <p class="text-gray-800 font-semibold text-sm">Kondisi Kesehatan</p>
                <?php if ($latest['kondisi_kesehata']): ?>
                <p class="text-gray-700 mt-2 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($latest['kondisi_kesehata'])) ?></p>
                <?php else: ?>
                <p class="text-gray-400 mt-2 text-sm italic">Tidak ada keluhan tercatat</p>
                <?php endif; ?>
                <?php if ($latest['catatan']): ?>
                <div class="mt-3 bg-white/60 rounded-xl p-3">
                    <p class="text-xs text-gray-500 font-semibold">Catatan:</p>
                    <p class="text-gray-700 text-sm mt-1"><?= nl2br(htmlspecialchars($latest['catatan'])) ?></p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Target Gula -->
            <div class="bg-[#e4ebc5] p-5 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all">
                <p class="text-gray-800 font-semibold text-sm">Target Gula Darah</p>
                <p class="text-gray-800 font-bold text-2xl mt-1">&lt; <?= $target_gula ?> mg/dL</p>
                <p class="font-bold mt-2 <?= $status_class ?> w-max px-3 py-1 rounded-full text-sm flex items-center gap-1">
                    <i class="fa-solid <?= $status_gula === 'Aman' ? 'fa-circle-check' : ($status_gula === 'Perhatian' ? 'fa-circle-exclamation' : 'fa-circle-xmark') ?>"></i>
                    Status: <?= $status_gula ?>
                </p>
            </div>
        </div>

        <!-- Right Chart: Grafik Gula Darah 7 Hari -->
        <div class="bg-white p-6 rounded-[1.5rem] w-full md:w-1/3 flex flex-col items-center justify-between shadow-sm min-h-[300px] hover:shadow-md transition-shadow">
            <h3 class="font-bold text-gray-800 mb-4 text-lg">Grafik Gula Darah</h3>
            <p class="text-xs text-gray-400 mb-2">7 Hari Terakhir (mg/dL)</p>

            <?php if (count($chart_values) > 0):
                $chart_max = max(max($chart_values), $target_gula + 20);
            ?>
            <div class="flex items-end justify-around w-full h-48 border-b-2 border-gray-200 gap-1 pb-1 mt-auto relative">
                <!-- Garis target -->
                <?php $target_line_pct = round(($target_gula / $chart_max) * 100); ?>
                <div class="absolute left-0 right-0 border-t-2 border-dashed border-red-400 opacity-70 z-10" style="bottom: <?= $target_line_pct ?>%">
                    <span class="absolute -top-4 right-0 text-[10px] text-red-400 font-bold">Target <?= $target_gula ?></span>
                </div>

                <?php foreach ($chart_values as $i => $val):
                    $bar_pct = round(($val / $chart_max) * 100);
                    $bar_color = $val <= $target_gula ? 'bg-green-400 hover:bg-green-500' : ($val <= 180 ? 'bg-yellow-400 hover:bg-yellow-500' : 'bg-red-400 hover:bg-red-500');
                ?>
                <div class="flex flex-col items-center w-full gap-1">
                    <div class="w-full <?= $bar_color ?> rounded-t flex items-start justify-center group relative transition-all cursor-pointer" style="height: <?= $bar_pct ?>%">
                        <span class="opacity-0 group-hover:opacity-100 absolute -top-7 text-[10px] font-bold bg-gray-800 text-white px-1.5 py-0.5 rounded whitespace-nowrap z-20"><?= $val ?></span>
                    </div>
                    <span class="text-[9px] text-gray-400 font-medium"><?= $chart_labels[$i] ?></span>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Legend -->
            <div class="flex gap-3 mt-3 text-[10px] text-gray-500">
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-sm bg-green-400 inline-block"></span>Normal</span>
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-sm bg-yellow-400 inline-block"></span>Perhatian</span>
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-sm bg-red-400 inline-block"></span>Tinggi</span>
            </div>

            <?php else: ?>
            <div class="flex-1 flex items-center justify-center text-gray-300">
                <i class="fa-solid fa-chart-bar text-5xl"></i>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <!-- Riwayat Singkat -->
    <?php if (count($data_monitoring) > 1): ?>
    <div class="w-full mt-6 bg-white/70 rounded-[1.5rem] p-5 shadow-sm">
        <h3 class="font-bold text-gray-700 mb-3 text-sm uppercase tracking-wide"><i class="fa-solid fa-clock-rotate-left mr-2 text-[#6b4cde]"></i>Riwayat 7 Entri Terakhir</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-700">
                <thead>
                    <tr class="text-xs text-gray-400 uppercase border-b border-gray-200">
                        <th class="text-left pb-2 pr-4">Tanggal</th>
                        <th class="text-left pb-2 pr-4">Gula (mg/dL)</th>
                        <th class="text-left pb-2 pr-4">Tekanan Darah</th>
                        <th class="text-left pb-2">Berat (kg)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_monitoring as $row): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-2 pr-4"><?= date('d M Y', strtotime($row['tanggal_monitoring'])) ?></td>
                        <td class="py-2 pr-4">
                            <span class="font-bold <?= $row['gula_darah'] <= 140 ? 'text-green-600' : ($row['gula_darah'] <= 180 ? 'text-yellow-600' : 'text-red-600') ?>">
                                <?= htmlspecialchars($row['gula_darah']) ?>
                            </span>
                        </td>
                        <td class="py-2 pr-4"><?= $row['tekanan_darah'] ? htmlspecialchars($row['tekanan_darah']) : '<span class="text-gray-300">—</span>' ?></td>
                        <td class="py-2"><?= $row['berat_badan'] ? htmlspecialchars($row['berat_badan']) : '<span class="text-gray-300">—</span>' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>

</section>