<?php
session_start();
include 'koneksi.php';

// ✅ Ganti 'user_id' menjadi 'id_user' agar konsisten
$isLoggedIn = isset($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>D-Care - Manajemen Diabetes Anda</title>
    <?php include 'components/head.php'; ?>
</head>

<body id="app-body" class="bg-view-green transition-colors duration-1000 min-h-screen flex flex-col">

    <?php include 'components/navbar_user.php'; ?>

    <main class="flex-1 flex flex-col w-full relative">

        <?php
            include 'views_user/home.php';
            include 'views_user/login.php';
            include 'views_user/signup.php';
            include 'views_user/cek_dini.php';
            include 'views_user/hasil_analisis.php';
            include 'views_user/monitoring.php';
            include 'views_user/chatbot.php';
            include 'views_user/riwayat.php';
            include 'views_user/input_monitoring.php';
        ?>

        <?php include 'components/message_box.php'; ?>

    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>

<script>
const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
</script>

</body>
</html>