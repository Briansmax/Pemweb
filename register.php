<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link rel="stylesheet" href="registerstyle.css">
</head>
<body>
    <div class="container">
    <div class="branding">
        <h1>E-Canteen</h1>
    </div>
    <div class="register-box">
        <h2>Buat Akun</h2>
        <form action="dataregister.php" method="POST">
            <input type="text" name="Name" placeholder="Nama Lengkap" required>
            <input type="text" name="Username" placeholder="Username" required>
            <input type="email" name="Email" placeholder="Email" required>
            <input type="password" name="Password" placeholder="Password" required>
            <button type="submit" name="Daftar" value="Daftar">Daftar</button>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>

<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Daftar'])) {
		$Name = $_POST['Name'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(Name,Username,Email,Password) VALUES('$Name','$Username','$Email','$Password')");
	}
	?>
</body>
</html>