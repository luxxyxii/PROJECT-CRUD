<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM peminjaman_buku WHERE id='$id'")
);

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE peminjaman_buku SET
        nama_peminjam='$_POST[nama]',
        judul_buku='$_POST[judul]',
        penulis='$_POST[penulis]',
        jumlah_buku='$_POST[jumlah]',
        tanggal_peminjaman='$_POST[tgl_pinjam]',
        tanggal_pengembalian='$_POST[tgl_kembali]',
        status='$_POST[status]'
        WHERE id='$id'
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2 align="center">Edit Data Peminjaman</h2>

<div class="content" style="width:500px;margin:auto;">
<form method="post">
    <input type="text" name="nama" value="<?= $data['nama_peminjam']; ?>" required>
    <input type="text" name="judul" value="<?= $data['judul_buku']; ?>" required>
    <input type="text" name="penulis" value="<?= $data['penulis']; ?>" required>
    <input type="number" name="jumlah" value="<?= $data['jumlah_buku']; ?>" required>
    <input type="date" name="tgl_pinjam" value="<?= $data['tanggal_peminjaman']; ?>" required>
    <input type="date" name="tgl_kembali" value="<?= $data['tanggal_pengembalian']; ?>" required>

    <select name="status">
        <option <?= $data['status']=="Dipinjam"?"selected":""; ?>>Dipinjam</option>
        <option <?= $data['status']=="Dikembalikan"?"selected":""; ?>>Dikembalikan</option>
    </select>

    <button type="submit" name="update">Update</button>
    <br><br>
    <a href="index.php">← Kembali</a>
</form>
</div>

</body>
</html>
