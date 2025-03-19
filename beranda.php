<?php
$kuota = array(
    array("Kaget 14GB", "14GB", "30 Hari", 40000, "kuota-kaget.png"),
    array("Anti Cemas", "23GB", "30 Hari", "100999", "kuota-cemas.png"),
    array("Kaget 5 GB", "5 GB", "15 GB", 17000, "kaget-5gb.png"),
    array("Kaget 65 GB", "65 GB", "30 Hari", 100000, "kuota-kaget.png"),
);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            font-size: 18px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        .btn-dark {
            background-color: #343a40;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        .banner {
            height: 500px;
            object-fit: cover;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"></a>
            <img src="img/logo.png" alt="Logo" style="height: 40px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rewards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Discover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Global Rank</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="container-fluid p-5 bg-light">
        <div class="row align-items-center">
            <div class="col-md-6 banner-text">
                <h1>Kartu Internet Dengan Sinyal Terbaik</h1>
                <p class="text-muted">Nikmati berbagai macam paket internet yang kami tawarkan</p>
                <div>
                    <a href="#paket-internet" class="btn btn-dark">Lihat Paket</a>
                    <a href="#" class="btn btn-outline-secondary">Learn More</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/hero-img.png" class="img-fluid banner" alt="Banner">
            </div>
        </div>
    </div>


    <!-- Daftar Produk -->
    <div id="paket-internet" class="container my-5">
        <h2 class="fw-bold mb-3 text-start">Paket Internet</h2>
        <p class="text-muted mb-4" style="font-size: 0.875rem;">Pilih paket internet yang sesuai dengan kebutuhanmu</p>
        <div class="row">
            <!-- $kuota dipecah menjadi satu persatu, $index tempat utk menampung nomor array nya,
                 $data utk menampung data yang ada di array -->
            <?php foreach ($kuota as $index => $data) { ?>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card shadow border-0">
                        <img src="img/<?= $data[4] ?>" class="card-img-top" alt="<?= $data[0] ?>">
                        <div class="card-body p-2">
                            <h6 class="title-small"><?= $data[0] ?></h6>
                            <div class="info-container">
                                <strong><?= $data[1] ?></strong>
                                <span><?= $data[2] ?></span>
                            </div>
                            <p class="price">Rp <?= number_format($data[3], 0, ',', '.') ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <!-- mengirimkan id sesuai index yang dipilih -->
                            <a href="transaksi.php?id=<?= $index ?>" class="btn btn-dark w-100">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>