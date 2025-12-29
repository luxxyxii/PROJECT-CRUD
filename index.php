<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Peminjaman Buku</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2 align="center">Data Peminjaman Buku Perpustakaan</h2>

<div class="container">

    <!-- TABEL DATA -->
    <div class="content">
        <table>
            <tr>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Jumlah</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM peminjaman_buku");
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr onclick="pilihData(<?= $row['id']; ?>)">
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['judul_buku']; ?></td>
                <td><?= $row['penulis']; ?></td>
                <td><?= $row['jumlah_buku']; ?></td>
                <td><?= $row['tanggal_peminjaman']; ?></td>
                <td><?= $row['tanggal_pengembalian']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <button onclick="openModal()">Create</button>
        <button onclick="editData()">Edit</button>
        <button onclick="hapusData()">Delete</button>
        <input type="hidden" id="selected_id">
    </div>

</div>

<!-- MODAL CREATE -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Tambah Peminjaman</h3>

        <form method="post" action="tambah.php">
            <input type="text" name="nama" placeholder="Nama Peminjam" required>
            <input type="text" name="judul" placeholder="Judul Buku" required>
            <input type="text" name="penulis" placeholder="Penulis" required>
            <input type="number" name="jumlah" placeholder="Jumlah Buku" required>
            <input type="date" name="tgl_pinjam" required>
            <input type="date" name="tgl_kembali" required>
            <select name="status">
                <option>Dipinjam</option>
                <option>Dikembalikan</option>
            </select>
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
