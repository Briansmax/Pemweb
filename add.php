<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="Username"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="Email"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="Password"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$Name = $_POST['Name'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(Name,Username,Email,Password) VALUES('$Name','$Username','$Username','$Password')");

		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>