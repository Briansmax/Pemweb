<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Penjual - Menu</title>
  <link rel="stylesheet" href="menu.css"/>
</head>
<body>
  <header>
    <div class="logo">E-CANTEEN</div>
    <nav>
      <a href="menu.php" class="nav-active">Menu</a>
      <a href="riwayat_pesanan.php">Riwayat Penjualan</a>
      <a href="daftarpesanan.php">Pesanan Masuk</a>
    </nav>
  </header>

  <section class="menu-section">
    <h2>Menu Anda</h2>
    <a href="add_menu.php" class="add-button">+</a>
    <div class="menu-list">
      <?php
      include('datamenu.php'); 
      $menuData = getMenu($mysqli);

      while ($row = mysqli_fetch_assoc($menuData)) {
          echo "<div class='menu-item'>";
          echo "<img src='pic/" . htmlspecialchars($row['gambar']) . "' alt='" . htmlspecialchars($row['nama']) . "'>";
          echo "<div class='menu-info'>";
          echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
          echo "<p>" . ($row['kategori'] == 'Minuman' ? 'Minuman' : 'Makanan') . "</p>";
          echo "<p>Rp " . number_format($row['harga'], 0, ',', '.') . "</p>";
          echo "</div>";
          echo "<div class='menu-actions'>";
          echo "<a href='edit_menu.php?id=" . $row['id'] . "'>✏️</a>";
          echo "<a href='deletemenu.php?id=" . $row['id'] . "' onclick='return confirm(\"Hapus menu ini?\")'>🗑️</a>";
          echo "</div>";
          echo "</div>";
      }
      ?>
    </div>
  </section>
</body>
</html>