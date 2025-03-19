<!-- untuk challege -->

<!-- challenge menambambh diskon -->
<?php
// Fungsi untuk menghitung diskon berdasarkan total belanja dan kode diskon yang diberikan
function hitungDiskon($total, $kodeDiskon)
{
    $diskon = 0; // Variabel awal untuk menyimpan jumlah diskon

    // Daftar kode diskon yang valid beserta persentasenya
    $daftarKodeDiskon = [
        'DISKON10' => 10, // Kode diskon "DISKON10" memberikan diskon 10%
        'DISKON20' => 20, // Kode diskon "DISKON20" memberikan diskon 20%
    ];

    // Cek apakah kode diskon yang dimasukkan ada di daftar kode diskon yang valid
    if (array_key_exists($kodeDiskon, $daftarKodeDiskon)) {
        // Hitung jumlah diskon berdasarkan total belanja dan persentase diskon
        $diskon = ($total * $daftarKodeDiskon[$kodeDiskon]) / 100;
    }

    return $diskon; // Kembalikan nilai diskon
}

// Simulasi total belanja (nilai default jika tidak diambil dari database)
$totalBelanja = 100000; // Total belanja awal tanpa diskon
$kodeDiskon = isset($_POST['kode_diskon']) ? $_POST['kode_diskon'] : ''; // Ambil kode diskon dari input form

// Hitung diskon berdasarkan kode diskon yang diberikan
$diskon = hitungDiskon($totalBelanja, $kodeDiskon);
// Hitung total belanja setelah diskon diterapkan
$totalSetelahDiskon = $totalBelanja - $diskon;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi dengan Diskon</title>
</head>

<body>
    <h2>Form Transaksi</h2>
    <!-- Form untuk memasukkan kode diskon -->
    <form method="POST" action="transaksi.php">
        <!-- Menampilkan total belanja awal -->
        <label for="total">Total Belanja: </label>
        <span>Rp <?= number_format($totalBelanja, 0, ',', '.') ?></span><br>

        <!-- Input untuk kode diskon -->
        <label for="kode_diskon">Masukkan Kode Diskon (Opsional):</label>
        <input type="text" name="kode_diskon" id="kode_diskon" value="<?= htmlspecialchars($kodeDiskon) ?>"><br><br>

        <!-- Tombol untuk submit form dan menghitung diskon -->
        <button type="submit">Hitung Total</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <!-- Menampilkan hasil transaksi setelah diskon diterapkan -->
        <h3>Hasil Transaksi</h3>
        <p>Diskon: Rp <?= number_format($diskon, 0, ',', '.') ?></p>
        <p>Total Setelah Diskon: Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></p>
    <?php endif; ?>
</body>

</html>