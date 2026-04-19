<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // PROSES GAMBAR
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // CEK KALAU GAMBAR DIPILIH
    if($gambar != ""){
        move_uploaded_file($tmp, "img/" . $gambar);
    } else {
        $gambar = "";
    }

    mysqli_query($conn, "INSERT INTO produk (nama, harga, deskripsi, gambar) 
    VALUES ('$nama', '$harga', '$deskripsi', '$gambar')");

    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">
    <h2>Tambah Produk Parfum</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control mb-2" required>

        <label>Harga</label>
        <input type="number" name="harga" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-3" required></textarea>

        <!-- INPUT GAMBAR -->
        <label>Upload Gambar</label>
        <input type="file" name="gambar" class="form-control mb-2">

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="produk.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>