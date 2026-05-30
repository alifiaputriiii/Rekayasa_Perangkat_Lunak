<?php
session_start();
include '../koneksi.php';

if (isset($_POST['submit_screening'])) {

    // ✅ FIX 1: Cek session dengan validasi, sesuaikan key jika perlu
    // Di halaman cekDini.php / view cekDini
    if (!isset($_SESSION['id_user'])) {
        header("Location: ../index.php?page=login&error=harap_login");
        exit();
    }

    $id_user         = (int)$_SESSION['id_user']; // ✅ Cast ke integer
    $usia            = (int)$_POST['usia'];
    $riwayat_keluarga = $_POST['riwayat_keluarga'];
    $polidipsia      = $_POST['polidipsia'];
    $poliuria        = $_POST['poliuria'];
    $polifagia       = $_POST['polifagia'];
    $kesemutan       = $_POST['kesemutan'];
    $luka_lama       = $_POST['luka_lama'];

    // Hitung skor
    $skor = 0;
    if ($riwayat_keluarga === 'ya') $skor += 20;
    if ($polidipsia      === 'ya') $skor += 15;
    if ($poliuria        === 'ya') $skor += 15;
    if ($polifagia       === 'ya') $skor += 15;
    if ($kesemutan       === 'ya') $skor += 15;
    if ($luka_lama       === 'ya') $skor += 20;
    if ($usia >= 45)                $skor += 10;
    if ($skor > 100) $skor = 100;

    // Tentukan status risiko
    if ($skor >= 70) {
        $status_risiko = 'Tinggi';
    } elseif ($skor >= 40) {
        $status_risiko = 'Sedang';
    } else {
        $status_risiko = 'Rendah';
    }

    $hasil_akhir = $status_risiko . ' (' . $skor . '%)';
    $tanggal     = date('Y-m-d');

    // ✅ FIX 2: Gunakan prepared statement (aman dari SQL Injection)
    $stmt = mysqli_prepare($koneksi,
        "INSERT INTO screening_diabetes (id_user, usia, riwayat_keluarga, hasil_screening, tanggal_screening)
         VALUES (?, ?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, 'iisss', $id_user, $usia, $riwayat_keluarga, $hasil_akhir, $tanggal);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php?page=hasilAnalisis&skor=$skor&status=$status_risiko");
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

} else {
    header("Location: ../index.php");
}
?>