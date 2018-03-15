<?php 
	session_start();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Camile Samson" />
		<title>Roland Ink</title> 
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>
	<body class="splash"><p>
		<?php
			$email = $_POST["email"]; 
			$pass1 = $_POST["pass"];

			$datab="rol";
		$server="localhost";
		$user="root";
		$password="";

			$conn = mysqli_connect($server, $user, $password, $datab); 
			if (!$conn)
			{
				die("Connection failed: ".mysqli_connect_error());
			}	
			$sqlCon = "SELECT * FROM users WHERE email='$email' AND password ='$pass1'";
			$checkRes= mysqli_query($conn, $sqlCon);
			if  (mysqli_num_rows($checkRes)==1)
			{
			
				$row1= mysqli_fetch_assoc($checkRes);
				$_SESSION['user_id']=$row1["user_id"];
				$_SESSION['u_name']=$row1["name"];
				$_SESSION['email']=$row1["email"];
				echo "<p>Name: ".$row1["name"]. "</p><br>"; 
				echo "<p>Surname: ".$row1["surname"]. "</p><br>";
				echo "<p>Password: ".$row1["password"]. "</p><br>";
				// echo "<p>Birthday: ".$row1["date"]. "</p><br>";

				header("location: home.php");
			}
			else 
			{	
				echo   '<div class="alert alert-danger" role="alert"> This account does not exist. </div>'; 
			}


		?></p>
	</body>
</html>