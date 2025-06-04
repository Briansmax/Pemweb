<?php
if (isset($_POST['Daftar'])) {
    $Name = $_POST['Name']; //Menangkap data
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hashing password agar lebih aman

    // include database connection file
		include_once("config.php");
    
    // Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(Name,Username,Email,Password) VALUES('$Name','$Username','$Email','$Password')");

        if ($result) {
    echo "Registrasi berhasil!";
    header("location: login.php");
    exit();
} else {
    echo "Registrasi gagal: " . mysqli_error($mysqli);
}

}
?>