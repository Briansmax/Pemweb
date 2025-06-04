<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Pesanan</title>
</head>
<body>
  <h2>Tambah Pesanan Masuk</h2>
  <form action="prosespesanan.php" method="POST">
    <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" required><br>
    <input type="text" name="menu" placeholder="Menu yang Dipesan" required><br>
    <input type="number" name="jumlah" placeholder="Jumlah" required><br>
    <button type="submit" name="tambah">Tambah</button>
  </form>
  <a href="daftar_pesanan.php">Kembali</a>
</body>
</html>
