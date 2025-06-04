<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-CANTEEN</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>


<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="datalogin.php" method="POST">
                <input type="text" name="Username" placeholder="Username" required>
                <input type="password" name="Password" placeholder="Password" required>
                <button type="submit" name="Masuk">Masuk</button>
                <p>Belum punya akun? <a href="register.php">Buat akun</a></p>
            </form>
        </div>
        <div class="branding">
            <h1>E-Canteen</h1>
        </div>
    </div>

</body>
</html>