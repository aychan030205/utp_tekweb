<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "UPDATE produk SET 
        nama='$nama',
        harga='$harga',
        deskripsi='$deskripsi'
        WHERE id=$id");

    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">
    <h2>Edit Produk Parfum</h2>

    <form method="POST">
        <label>Nama Produk</label>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" class="form-control mb-2" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-3" required><?= $row['deskripsi']; ?></textarea>

        <button type="submit" name="update" class="btn btn-primary">Update Produk</button>
        <a href="produk.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>