<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<h1>Selamat datang, <?php echo $_SESSION['Username']; ?>!</h1>