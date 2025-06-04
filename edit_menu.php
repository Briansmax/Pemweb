<?php
include('config.php');

// Pastikan ID valid dan ada dalam database
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID menu tidak ditemukan atau tidak valid.");
}

$id = intval($_GET['id']); // Pastikan ID adalah angka

// Cek apakah data menu dengan ID tersebut ada
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");
if (!$result || mysqli_num_rows($result) == 0) {
    die("Menu dengan ID ini tidak ditemukan.");
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $harga = (int)$_POST['harga']; // Pastikan harga dalam angka
    $gambar = mysqli_real_escape_string($mysqli, $_POST['gambar']);
    $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);

    // Pastikan kategori tidak kosong
    if (empty($kategori)) {
        die("Kategori harus dipilih.");
    }

    // Jalankan Query Update dengan Debugging
    $query = "UPDATE menu SET nama='$nama', harga='$harga', gambar='$gambar', kategori='$kategori' WHERE id=$id";
    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Menu berhasil diperbarui!'); window.location.href='menu.php';</script>";
    } else {
        die("Gagal mengedit menu: " . mysqli_error($mysqli)); 
    }
}
?>

<h2>Edit Menu</h2>
<form action="edit_menu.php?id=<?= $id ?>" method="POST">
    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
    <input type="number" name="harga" value="<?= htmlspecialchars($row['harga']) ?>" required>
    <input type="text" name="gambar" value="<?= htmlspecialchars($row['gambar']) ?>" required>
    <select name="kategori" required>
        <option value="Makanan" <?= ($row['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
        <option value="Minuman" <?= ($row['kategori'] == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
    </select>
    <button type="submit">Simpan Perubahan</button>
</form>