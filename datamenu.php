<?php
include('config.php'); // Hubungkan ke database

// Ambil daftar menu dari database
function getMenu($mysqli) {
    $query = "SELECT * FROM menu";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    return $result;
}
?>