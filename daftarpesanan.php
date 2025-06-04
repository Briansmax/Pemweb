<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Pesanan</title>
  <link rel="stylesheet" href="daftarpesanan.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f4f4f4;
    }
    .status-selesai {
      color: green;
      font-weight: bold;
    }
    .status-menunggu {
      color: orange;
      font-weight: bold;
    }
    .status-dibatalkan {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">UPN CANTEE<span style="color:#00ff00">N</span></div>
    <nav>
      <a href="menu.php">Menu</a>
      <a href="riwayat.php">Riwayat Penjualan</a>
      <a href="pesananmasuk.php">Pesanan Masuk</a>
      <a href="#" class="nav-active">Daftar Pesanan</a>
    </nav>
  </header>

  <section class="pesanan-section">
    <h2>Daftar Seluruh Pesanan</h2>

    <div class="pesanan-actions">
      <a href="tambahpesanan.php" class="btn">+ Tambah Pesanan</a>
    </div>

    <?php
    $query = "SELECT * FROM pesanan ORDER BY id DESC";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
      echo '<p style="color:red">Gagal mengambil data pesanan: ' . mysqli_error($mysqli) . '</p>';
    } elseif (mysqli_num_rows($result) === 0) {
      echo '<p>Belum ada data pesanan.</p>';
    } else {
      echo '<table>';
      echo '<tr><th>ID</th><th>Nama Pemesan</th><th>Menu</th><th>Jumlah</th><th>Status</th><th>Waktu</th></tr>';

      while ($row = mysqli_fetch_assoc($result)) {
        $statusClass = '';
        if ($row['status'] === 'Selesai') {
          $statusClass = 'status-selesai';
        } elseif ($row['status'] === 'Menunggu') {
          $statusClass = 'status-menunggu';
        } elseif ($row['status'] === 'Dibatalkan') {
          $statusClass = 'status-dibatalkan';
        }

        echo '<tr>';
        echo '<td>' . intval($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nama_pemesan']) . '</td>';
        echo '<td>' . htmlspecialchars($row['menu']) . '</td>';
        echo '<td>' . intval($row['jumlah']) . '</td>';
        echo '<td><span class="' . $statusClass . '">' . htmlspecialchars($row['status']) . '</span></td>';
        echo '<td>' . htmlspecialchars($row['waktu']) . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    }
    ?>
  </section>
</body>
</html>