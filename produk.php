<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <h2 class="mb-3">Daftar Parfum</h2>
    <a href="tambah.php" class="btn btn-success mb-3">Tambah Produk</a>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $row['nama']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin menghapus produk ini?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>