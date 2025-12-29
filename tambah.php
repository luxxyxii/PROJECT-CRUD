<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO peminjaman_buku VALUES (
        '',
        '$_POST[nama]',
        '$_POST[judul]',
        '$_POST[penulis]',
        '$_POST[jumlah]',
        '$_POST[tgl_pinjam]',
        '$_POST[tgl_kembali]',
        '$_POST[status]'
    )");

    header("location:index.php");
}
?>
