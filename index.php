<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Desa Wisata</title>
</head>

<body>
    <!-- Awal banner -->
    <div class="container-fluid banner">
        <div class="container banner-content col-lg-6">
            <div class="text-center">
                <p class="fs-1">
                    Selamat Datang di Desa Wisata Pulesari
                </p class="fs-2">
                <p>Wisata alam dan budaya tradisi</p>
            </div>
        </div>
    </div>
    <!-- Akhir banner -->

    <!-- Awal navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=paket">Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pesanan">Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal konten -->
    <?php
        require_once 'libs.php';
    ?>
    <!-- Akhir konten -->

    <!-- Awal Footer -->
    <div class="container-fluid footer">
        <div class="row d-flex justify-content-around">
            <div class="col-md-3 mt-3">
                <h6>About Us</h6>
                <p>Desa wisata Pulesari, menyediakan paket wisata dalam berbagai pilihan sesuai budget. Buat liburan bersama keluarga dan kerabat menjadi menyenangkan</p>
            </div>
            <div class="col-md-3 mt-3">
                <h6>Link</h6>
                <ul>
                    <li><a class="footer" href="#">Link 1</a></li>
                    <li><a class="footer" href="#">Link 2</a></li>
                </ul>
            </div>
            <div class="col-md-3 mt-3">
                <h6>Contact Us</h6>
                <p>Jawa Barat</p>
                <p>08xx-xxxx-xxxx</p>
            </div>
        </div>
    </div>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>