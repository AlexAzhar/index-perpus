<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    // Proses upload gambar
    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != '') {
        $gambar = time() . '_' . basename($_FILES['gambar']['name']);
        $target = 'upload/' . $gambar;
        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
            $error = "Gagal mengunggah gambar.";
        }
    }

    if (empty($error)) {
        $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, kategori, gambar) 
                  VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$kategori', '$gambar')";

        if (mysqli_query($koneksi, $query)) {
            $sukses = "Buku berhasil ditambahkan!";
        } else {
            $error = "Gagal menambahkan buku.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Koleksi Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo-pondok.png">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h4 class="mb-4">Tambah Koleksi Buku</h4>

        <?php if (!empty($sukses)) : ?>
            <div class="alert alert-success"><?= $sukses ?></div>
        <?php elseif (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" min="1900" max="<?= date('Y') ?>" required>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Buku Teks">Buku Teks</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Fiksi">Fiksi</option>
                    <option value="Non-Fiksi">Non-Fiksi</option>
                    <option value="Majalah/Buletin">Majalah/Buletin</option>
                    <option value="Digital">Digital</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Gambar Sampul</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Buku</button>
            <a href="logout.php" class="btn btn-dark">Logout</a>

        </form>
    </div>

</body>

</html>