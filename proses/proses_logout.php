<?php
session_start();
session_unset();
session_destroy();

// Kembali ke halaman home setelah logout
header("Location: ../index.php?page=home");
exit;