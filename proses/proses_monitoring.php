<?php
// components/proses/proses_monitoring.php
session_start();
include '../koneksi.php';

if (isset($_POST['submit_monitoring'])) {

    $id_user          = $_SESSION['id_user'] ?? 1;
    $gula_darah       = (int)$_POST['gula_darah'];
    $tekanan_darah    = trim($_POST['tekanan_darah'] ?? '');
    $berat_badan      = $_POST['berat_badan'] !== '' ? (float)$_POST['berat_badan'] : null;
    $kondisi_kesehata = trim($_POST['kondisi_kesehata'] ?? '');
    $catatan          = trim($_POST['catatan'] ?? '');
    $tanggal          = trim($_POST['tanggal_monitoring']);

    $berat_val   = $berat_badan !== null ? "'$berat_badan'" : 'NULL';
    $tekanan_val = $tekanan_darah !== '' ? "'" . mysqli_real_escape_string($koneksi, $tekanan_darah) . "'" : 'NULL';
    $kondisi_val = $kondisi_kesehata !== '' ? "'" . mysqli_real_escape_string($koneksi, $kondisi_kesehata) . "'" : 'NULL';
    $catatan_val = $catatan !== '' ? "'" . mysqli_real_escape_string($koneksi, $catatan) . "'" : 'NULL';

    $sql = "INSERT INTO monitoring_kesehatan 
            (id_user, gula_darah, tekanan_darah, berat_badan, kondisi_kesehata, catatan, tanggal_monitoring)
            VALUES 
            ('$id_user', '$gula_darah', $tekanan_val, $berat_val, $kondisi_val, $catatan_val, '$tanggal')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php?page=monitoring");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

} else {
    header("Location: ../index.php");
}
?>