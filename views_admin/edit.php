<?php

include '../../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM edukasi
    WHERE id_edukasi='$id'"
);

$row = mysqli_fetch_assoc($data);

?>

<form action="../../proses/proses_edit.php" method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $row['id_edukasi']; ?>">

    <label>Judul</label>
    <br>

    <input
        type="text"
        name="judul"
        value="<?= $row['judul']; ?>"
        required>

    <br><br>

    <label>Kategori</label>
    <br>

    <select name="kategori">

        <option value="<?= $row['kategori']; ?>">
            <?= $row['kategori']; ?>
        </option>

        <option value="Pola Makan">Pola Makan</option>
        <option value="Aktivitas Fisik">Aktivitas Fisik</option>
        <option value="Obat-obatan">Obat-obatan</option>
        <option value="Pencegahan">Pencegahan Risiko</option>

    </select>

    <br><br>

    <label>Isi Artikel</label>
    <br>

    <textarea
        name="isi"
        rows="10"
        cols="60"
        required><?= $row['isi_konten']; ?></textarea>

    <br><br>

    <button type="submit">
        Simpan Perubahan
    </button>

</form>