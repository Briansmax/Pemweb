<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Penjualan</title>
  <link rel="stylesheet" href="riwayat_pesanan.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <header>
    <div class="logo">UPN CANTEE<span style="color:#00ff00">N</span></div>
    <nav>
      <a href="menu.php">Menu</a>
      <a href="riwayat.php" class="nav-active">Riwayat Penjualan</a>
      <a href="pesananmasuk.php">Pesanan Masuk</a>
      <a href="daftarpesanan.php">Daftar Pesanan</a>
    </nav>
  </header>

  <div class="container">
    <h1>Riwayat Pesanan </h1>

    <?php
    $query = "SELECT * FROM pesanan ORDER BY waktu DESC";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p class='no-orders'>Gagal mengambil data pesanan: " . mysqli_error($mysqli) . "</p>";
    } elseif (mysqli_num_rows($result) === 0) {
        echo "<p class='no-orders'>Belum ada data pesanan.</p>";
    } else {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nama Pemesan</th><th>Menu</th><th>Jumlah</th><th>Status</th><th>Waktu</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $statusClass = '';
            if ($row['status'] === 'Menunggu') {
                $statusClass = 'status-menunggu';
            } elseif ($row['status'] === 'Diproses') {
                $statusClass = 'status-diproses';
            } elseif ($row['status'] === 'Selesai') {
                $statusClass = 'status-selesai';
            } elseif ($row['status'] === 'Dibatalkan') {
                $statusClass = 'status-dibatalkan';
            }

            echo "<tr>";
            echo "<td>" . intval($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['menu']) . "</td>";
            echo "<td>" . intval($row['jumlah']) . "</td>";
            echo "<td class='" . $statusClass . "'>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td>" . htmlspecialchars($row['waktu']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

    
  </div>
</body>
</html>
