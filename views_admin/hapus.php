<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM edukasi
     WHERE id_edukasi='$id'"
);

header("Location:index.php");