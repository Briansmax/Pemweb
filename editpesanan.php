<?php
// editpesanan.php
$conn = mysqli_connect("localhost", "root", "", "kantin");
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  echo "<p>ID pesanan tidak ditemukan.</p>";
  exit;
}

$id = (int) $_GET['id'];

// Ambil data pesanan yang akan diedit
$result = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = $id");
if (mysqli_num_rows($result) === 0) {
  echo "<p>Pesanan tidak ditemukan.</p>";
  exit;
}
$row = mysqli_fetch_assoc($result);

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $menu = mysqli_real_escape_string($conn, $_POST['menu']);
  $jumlah = (int) $_POST['jumlah'];
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  $query = "UPDATE pesanan SET nama_pemesan='$nama', menu='$menu', jumlah=$jumlah, status='$status' WHERE id=$id";

  if (mysqli_query($conn, $query)) {
    header("Location: pesanan.php");
    exit;
  } else {
    echo "<p style='color:red'>Gagal mengupdate pesanan: " . mysqli_error($conn) . "</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pesanan</title>
  <link rel="stylesheet" href="editpesanan.css">
</head>
<body>
  <header>
    <div class="logo">UPN CANTEE<span style="color:#00ff00">N</span></div>
    <nav>
      <a href="menu.php">Menu</a>
      <a href="riwayat.php">Riwayat Penjualan</a>
      <a href="pesanan.php">Pesanan Masuk</a>
    </nav>
  </header>

  <section class="pesanan-section">
    <h2>Edit Pesanan</h2>
    <form method="post" class="pesanan-form">
      <label for="nama">Nama Pemesan:</label>
      <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($row['nama_pemesan']) ?>" required>

      <label for="menu">Nama Menu:</label>
      <input type="text" name="menu" id="menu" value="<?= htmlspecialchars($row['menu']) ?>" required>

      <label for="jumlah">Jumlah:</label>
      <input type="number" name="jumlah" id="jumlah" min="1" value="<?= (int)$row['jumlah'] ?>" required>

      <label for="status">Status:</label>
      <select name="status" id="status" required>
        <option value="Menunggu" <?= $row['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
        <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
        <option value="Dibatalkan" <?= $row['status'] == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
      </select>

      <button type="submit" class="btn">Update Pesanan</button>
    </form>
  </section>
</body>
</html>