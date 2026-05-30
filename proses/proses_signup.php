<?php

include '../koneksi.php';

$nama            = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email           = mysqli_real_escape_string($koneksi, $_POST['email']);
$password        = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$jenis_kelamin   = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$tanggal_lahir   = $_POST['tanggal_lahir'];
$no_hp           = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);

$role = "user";

if($password != $confirmPassword){

    echo "
    <script>
        alert('Password dan Konfirmasi Password tidak sama!');
        window.history.back();
    </script>
    ";
    exit;
}

$cekEmail = mysqli_query(
    $koneksi,
    "SELECT * FROM users WHERE email='$email'"
);

if(mysqli_num_rows($cekEmail) > 0){

    echo "
    <script>
        alert('Email sudah terdaftar!');
        window.history.back();
    </script>
    ";
    exit;
}

$passwordHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$simpan = mysqli_query(
    $koneksi,
    "INSERT INTO users
    (
        nama,
        email,
        password,
        jenis_kelamin,
        tanggal_lahir,
        no_hp,
        alamat,
        role
    )
    VALUES
    (
        '$nama',
        '$email',
        '$passwordHash',
        '$jenis_kelamin',
        '$tanggal_lahir',
        '$no_hp',
        '$alamat',
        '$role'
    )"
);

if($simpan){

    echo "
    <script>
        alert('Registrasi berhasil!');
        window.location.href='../index.php?page=login';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Registrasi gagal!');
        window.history.back();
    </script>
    ";
}