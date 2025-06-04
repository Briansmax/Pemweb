<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_pemesan = mysqli_real_escape_string($mysqli, $_POST['nama_pemesan']);
  $menu = mysqli_real_escape_string($mysqli, $_POST['menu']);
  $jumlah = (int) $_POST['jumlah'];
  $status = 'Menunggu';
  $waktu = date('Y-m-d H:i:s');

  $query = "INSERT INTO pesanan (nama_pemesan, menu, jumlah, status, waktu)
            VALUES ('$nama_pemesan', '$menu', $jumlah, '$status', '$waktu')";

  if (mysqli_query($mysqli, $query)) {
    header("Location: pesananmasuk.php");
    exit;
  } else {
    $error = "Gagal menambah pesanan: " . mysqli_error($mysqli);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Pesanan</title>
  <link rel="stylesheet" href="tambahpesanan.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <header>
    <div class="logo">UPN CANTEE<span style="color:#00ff00">N</span></div>
    <nav>
      <a href="menu.php" class="nav-active">Menu</a>
      <a href="riwayat_pesanan.php">Riwayat Penjualan</a>
      <a href="tambahpesanan.php">Pesanan Masuk</a>
    </nav>
  </header>

  <section class="pesanan-section">
    <h2>Tambah Pesanan</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="tambahpesanan.php" method="post" class="form-pesanan">
      <label for="nama_pemesan">Nama Pemesan:</label>
      <input type="text" id="nama_pemesan" name="nama_pemesan" required>

      <label for="menu">Menu:</label>
      <input type="text" id="menu" name="menu" required>

      <label for="jumlah">Jumlah:</label>
      <input type="number" id="jumlah" name="jumlah" min="1" required>

      <button type="submit" class="btn">Tambah</button>
    </form>
  </section>
</body>
</html>