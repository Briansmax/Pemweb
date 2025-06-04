<?php
session_start();
require 'config.php'; // Memanggil koneksi database

if(isset($_POST['Masuk'])) {
    $Username = $_POST['Username']; // Mengambil username dari form
    $Password = $_POST['Password']; // Mengambil password dari form

    $sql = "SELECT * FROM users WHERE Username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($Password, $user['Password'])) { // Memeriksa apakah password yang dimasukkan sesuai dengan yang ada di database
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['Username'] = $user['Username'];
        header("Location: menu.php");
        exit();
    } else {
        echo "Login gagal!";
    }
}
?>