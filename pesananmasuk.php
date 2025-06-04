<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Pesanan Masuk</title>
  <link rel="stylesheet" href="pesananmasuk.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <header>
    <div class="logo">UPN CANTEE<span style="color:#00ff00">N</span></div>
    <nav>
      <a href="menu.php">Menu</a>
      <a href="riwayat.php">Riwayat Penjualan</a>
      <a href="#" class="nav-active">Pesanan Masuk</a>
      <a href="daftarpesanan.php">Daftar Pesanan</a>
    </nav>
  </header>

  <section class="pesanan-section">
    <h2>Pesanan Masuk</h2>

    <div class="pesanan-list">
      <?php
      // Query untuk menampilkan pesanan dengan status Menunggu
      $query = "SELECT * FROM pesanan WHERE status = 'Menunggu' ORDER BY id DESC";
      $result = mysqli_query($mysqli, $query);

      if (!$result) {
        echo '<p style="color:red">Gagal mengambil data pesanan: ' . mysqli_error($mysqli) . '</p>';
      } elseif (mysqli_num_rows($result) === 0) {
        echo '<p>Tidak ada pesanan masuk saat ini.</p>';
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
          $status = $row['status'];
          $statusClass = 'status-menunggu'; // hanya "Menunggu" ditampilkan

          echo '<div class="pesanan-item">';
          echo '<div class="pesanan-info">';
          echo '<h4>' . htmlspecialchars($row['nama_pemesan']) . '</h4>';
          echo '<p>Menu: ' . htmlspecialchars($row['menu']) . '</p>';
          echo '<p>Jumlah: ' . intval($row['jumlah']) . '</p>';
          echo '<p>Status: <span class="status ' . $statusClass . '">' . htmlspecialchars($status) . '</span></p>';
          echo '</div>';
          echo '</div>';
        }
      }
      ?>
    </div>
  </section>
</body>
</html>