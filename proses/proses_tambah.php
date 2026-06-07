<?php

include '../../koneksi.php';

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];

mysqli_query(
    $conn,
    "INSERT INTO edukasi
    (id_admin, judul, isi_konten, kategori)
    VALUES
    (1, '$judul', '$isi', '$kategori')"
);

mysqli_query($conn,$query);

header("Location:index.php");