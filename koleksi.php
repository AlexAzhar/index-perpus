<?php
include 'koneksi.php';
$query = "SELECT * FROM buku ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';
if ($cari !== '') {
    $query = "SELECT * FROM buku 
              WHERE judul LIKE '%$cari%' 
              OR penulis LIKE '%$cari%' 
              OR penerbit LIKE '%$cari%'
              OR kategori LIKE '%$cari%' 
              OR tahun_terbit LIKE '%$cari%'  
              ORDER BY id DESC";
} else {
    $query = "SELECT * FROM buku ORDER BY id DESC";
}

$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KOLEKSI PERPUSTAKAAN ZAM-ZAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
    <link rel="icon" href="img/logo-pondok.png">
</head>

<body>
    <nav class="navbar fixed-top sticky-top navbar-expand-lg navbar-light bg-secondary bg-opacity-75 py-2">
        <div class="container">
            <nav class="navbar">
                <div class="container">
                    <img src="img/logo-pondok.png" alt="logo" style="width:50px;">
                </div>
            </nav>

            <!-- MBS ZAM-ZAM -->
            <strong><a class="navbar-brand text-white" href="https://smambszamzam.sch.id/" target="_blank" transliterator_get_error_codeaasd>SMA ZAM-ZAM CILONGOK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button></strong>

            <!-- OPAC -->
            <strong>
                <a class="navbar-brand text-white" href="https://zamzamlibrary.web.id/" target="_blank">OPAC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </strong>

            <!-- search -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://zamzamlibrary.web.id/">OPAC</a>
                        </li> -->
                </ul>
                <!-- <form class="d-flex text-white" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-white text-white" type="submit">Search</button>
                </form> -->
                <a href="login.php"><button type="button" class="btn btn-dark">Login</button></a>

            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="text-center mb-4">
            <img src="img/logo-pondok.png" alt="logo" style="width:100px;" class="mb-2">
            <h2 class="fw-bold">PERPUSTAKAAN ZAM-ZAM</h2>
            <h5>SMA MUHAMMADIYAH BOARDING SCHOOL ZAM-ZAM CILONGOK</h5>
            <p class="text-muted">NPP: 3302171E01000001</p>
        </div>
        <strong>
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link 
                dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PROFIL
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="index.php">Profil perpustakaan </a></li>
                        <li><a class="dropdown-item" href="visi_misi.html">Visi dan Misi</a></li>
                        <li><a class="dropdown-item" href="sejarah.html">Sejarah</a></li>
                        <li><a class="dropdown-item" href="struktur.html">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="tata_tertib.html">Tata Tertib</a></li>
                        <li><a class="dropdown-item" href="fasilitas.html">Fasilitas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link
                dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        LAYANAN
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="jam_buka.html">Jam Buka Layanan</a></li>
                        <li><a class="dropdown-item" href="baca_ditempat.html">Baca di Tempat</a></li>
                        <li><a class="dropdown-item" href="layanan_sirkulasi.html">Layanan Sirkulasi</a></li>
                        <li><a class="dropdown-item" href="layanan_referensi.html">Layanan Referensi</a></li>
                        <li><a class="dropdown-item" href="layanan_penelusuran.html">Layanan Penelusuran</a></li>
                        <li><a class="dropdown-item" href="layanan_bebas_pustaka.html">Layanan Bebas Pustaka</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="koleksi.php">KOLEKSI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="blank" href="https://zamzamlibrary.web.id/">OPAC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.html">KONTAK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="e_resources.html">e-RESOURCES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="survei.html">SURVEI</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="faq.html">FAQ</a>
                </li>
            </ul>
        </strong>

        <div class="container mt-5">
            <h3 class="text-center fw-bold mb-4">KOLEKSI</h3>

            <div class="card mt-4 shadow-sm border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="fs-5">Perpustakaan Zam-Zam menyediakan berbagai macam jenis koleksi bahan pustaka yang dirancang untuk memenuhi kebutuhan informasi, pembelajaran, serta hiburan seluruh pemustaka, baik dari kalangan siswa, guru, maupun tenaga kependidikan. Koleksi yang tersedia mencakup beragam kategori yang disusun secara sistematis dan dapat diakses dengan mudah oleh pemustaka. Di antaranya adalah koleksi referensi, seperti kamus, ensiklopedia, atlas, dan direktori, yang digunakan untuk mendapatkan informasi secara cepat dan akurat. Selain itu, tersedia pula buku teks pelajaran yang mendukung kurikulum pendidikan sekolah dan dapat digunakan sebagai sumber utama dalam proses belajar mengajar.</p>
                            <p class="fs-5">Tidak hanya itu, perpustakaan juga menyediakan buku-buku pengayaan, baik dalam bentuk fiksi seperti novel dan cerita pendek, maupun non-fiksi seperti biografi, sejarah, dan karya ilmiah populer yang bertujuan menambah wawasan dan memperluas pengetahuan. Untuk memenuhi kebutuhan informasi terkini, perpustakaan juga memiliki terbitan berkala seperti majalah dan buletin sekolah. </p>
                            <p class="fs-5"> Seiring perkembangan teknologi, koleksi digital pun telah tersedia, mencakup e-book, jurnal daring, dan sumber-sumber digital lainnya yang dapat diakses melalui perangkat elektronik. Selain itu, perpustakaan juga senantiasa memperbarui dan menambah beragam koleksi lainnya agar pemustaka dapat terus menikmati dan memanfaatkan layanan perpustakaan secara optimal. Dengan keberagaman koleksi ini, diharapkan seluruh pemustaka dapat memperoleh pengalaman membaca dan belajar yang menyenangkan, bermanfaat, serta mendukung pengembangan literasi di lingkungan sekolah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5">

        <h4 class="fw-bold text-center mb-4">Daftar Koleksi Buku</h4>
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari judul, penulis, atau penerbit..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <div class="row">
            <?php while ($buku = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($buku['gambar'])) : ?>
                            <img src="upload/<?= $buku['gambar'] ?>" class="card-img-top" alt="<?= htmlspecialchars($buku['judul']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else : ?>
                            <img src="img/missing-cover.jpg" class="card-img-top" alt="Gambar Default" style="height: 200px;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($buku['judul']) ?></h5>
                            <p class="card-text">
                                <strong>Penulis :</strong> <?= htmlspecialchars($buku['penulis']) ?><br>
                                <strong>Penerbit :</strong> <?= htmlspecialchars($buku['penerbit']) ?><br>
                                <strong>Tahun :</strong> <?= $buku['tahun_terbit'] ?><br>
                                <strong>Kategori :</strong> <?= $buku['kategori'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>


    </div>

    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; 2025 Perpustakaan SMA MBS ZAM-ZAM. All rights reserved.</small>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>