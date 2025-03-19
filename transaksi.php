<?php
$kuota = array(
    array("Kaget 14GB", "14GB", "30 Hari", 40000, "kuota-kaget.png"),
    array("Anti Cemas", "23GB", "30 Hari", "100999", "kuota-cemas.png"),
    array("Kaget 5 GB", "5 GB", "15 GB", 17000, "kaget-5gb.png"),
    array("Kaget 65 GB", "65 GB", "30 Hari", 100000, "kuota-kaget.png"),
);

// Mengambil parameter ID produk dari URL dan memastikan itu adalah angka
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
// Memeriksa apakah ID yang diberikan sesuai dengan indeks dalam array
// Jika valid, produk dipilih dari array berdasarkan ID.
// Jika ID tidak valid, produk pertama dipilih secara default.
if ($id >= 0 && $id < count($kuota)) {
    $paket = $kuota[$id];
} else {
    $paket = $kuota[0]; // Default ke produk pertama jika ID tidak valid
}

// Inisialisasi variabel transaksi
$no_transaksi = "";
$nama_cus = "";
$tanggal = "";
$jumlah_produk = 1;
$total_harga = 0;
$pembayaran = 0;
$kembalian = 0;

// Mengecek apakah ada data yang dikirim dari form menggunakan metode POST.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
    $no_transaksi = $_POST['no_transaksi'];
    $nama_cus = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jumlah_produk = isset($_POST['jumlah_produk']) ? (int)$_POST['jumlah_produk'] : 1;
    $total_harga = $harga * $jumlah_produk; // Menghitung total harga
    $pembayaran = isset($_POST['pembayaran']) ? (int)$_POST['pembayaran'] : 0;

    // Menghitung kembalian jika tombol hitung kembalian ditekan
    if (isset($_POST['hitung_kembalian'])) {
        $kembalian = $pembayaran - $total_harga;
    }

    // Menampilkan pesan sukses dan mengarahkan ke halaman beranda jika transaksi disimpan
    if (isset($_POST['simpan'])) {
        echo "<script>
                alert('Transaksi berhasil disimpan!');
                window.location.href = 'beranda.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center fw-bold">Transaksi</h2>
                        <form method="POST">
                            <!-- Input Nomor Transaksi -->
                            <div class="mb-3">
                                <label class="form-label">No. Transaksi</label>
                                <input type="number" class="form-control" name="no_transaksi" value="<?= $no_transaksi; ?>" required>
                            </div>
                            <!-- Input Tanggal Transaksi -->
                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $tanggal; ?>" required>
                            </div>
                            <!-- Input Nama Customer -->
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="nama" value="<?= $nama_cus; ?>" required>
                            </div>
                            <!-- Menampilkan Nama Produk yang Dipilih -->
                            <div class="mb-3">
                                <label class="form-label">Pilih Produk</label>
                                <input type="text" class="form-control" name="paket" value="<?= $kuota[$id][0]; ?>" readonly>
                            </div>
                            <!-- Menampilkan Harga Produk -->
                            <div class="mb-3">
                                <label class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" name="harga" value="<?= $kuota[$id][3]; ?>" readonly>
                            </div>
                            <!-- Input Jumlah Produk -->
                            <div class="mb-3">
                                <label class="form-label">Jumlah Produk</label>
                                <input type="number" class="form-control" name="jumlah_produk" value="<?= $jumlah_produk; ?>" min="1" required>
                            </div>
                            <!-- Tombol Hitung Total Harga -->
                            <button type="submit" class="btn btn-dark mb-3" name="hitung">Hitung Total Harga</button>
                            <!-- Menampilkan Total Harga -->
                            <div class="mb-3">
                                <label class="form-label">Total Harga</label>
                                <input type="number" class="form-control" name="total_harga" value="<?= $total_harga; ?>" readonly>
                            </div>
                            <!-- Input Pembayaran -->
                            <div class="mb-3">
                                <label class="form-label">Pembayaran</label>
                                <input type="number" class="form-control" name="pembayaran" value="<?= $pembayaran; ?>">
                            </div>
                            <!-- Tombol Hitung Kembalian -->
                            <button type="submit" class="btn btn-dark" name="hitung_kembalian">Hitung Kembalian</button>
                            <!-- Menampilkan Kembalian -->
                            <div class="mb-3">
                                <label class="form-label">Kembalian</label>
                                <input type="number" class="form-control" name="kembalian" value="<?= $kembalian; ?>" readonly>
                            </div>
                            <!-- Tombol Simpan Transaksi -->
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>