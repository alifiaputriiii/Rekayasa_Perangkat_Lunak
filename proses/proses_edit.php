<?php
include '../koneksi.php';

$id = $_POST['id'];

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];

mysqli_query(
    $conn,
    "UPDATE edukasi
    SET
        judul='$judul',
        kategori='$kategori',
        isi_konten='$isi'
    WHERE id_edukasi='$id'"
);