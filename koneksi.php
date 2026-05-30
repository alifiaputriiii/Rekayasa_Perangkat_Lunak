<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "diabetes"
);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}