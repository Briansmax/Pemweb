<?php
include('config.php');

$id = $_GET['id'];
$query = "DELETE FROM menu WHERE id=$id";

if (mysqli_query($mysqli, $query)) {
    header("Location: menu.php");
    exit();
} else {
    echo "Gagal menghapus menu!";
}
?>