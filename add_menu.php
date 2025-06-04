<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO menu (nama, harga, gambar, kategori) VALUES ('$nama', '$harga', '$gambar', '$kategori')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: menu.php");
        exit();
    } else {
        echo "Gagal menambah menu!";
    }
}
?>

<h2>Tambah Menu Baru</h2>
<form action="add_menu.php" method="POST">
    <input type="text" name="nama" placeholder="Nama Menu" required>
    <input type="number" name="harga" placeholder="Harga" required>
    <input type="file" name="gambar" placeholder="Nama File Gambar" required>
    <select name="kategori" required>
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
    </select>
    <button type="submit">Tambah Menu</button>
</form>