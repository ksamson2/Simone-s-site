<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<!--Camille Samson-->
		<meta name="author" content="Camille Samson" />
		<title>Roland Ink</title> 
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>
	<body class="splash">
		<?php
			$datab="rol";
		$server="localhost";
		$user="root";
		$password="";

			$conn = mysqli_connect($server, $user, $password, $datab); 
			if (!$conn)
			{
				die("Connection failed: ".mysqli_connect_error());
			}	

			

			//$fname = $_POST[fname]; 
			//$lname = $_POST["lname"];
			$email = $_POST["email1"]; 
			$date = $_POST["date"]; 
			$pass1 = $_POST["pass1"];
			$pass2 = $_POST["pass2"];



			$sqlCon ="SELECT * FROM users WHERE email='$email' ";
			$checkRes= mysqli_query($conn, $sqlCon);
			if  (mysqli_num_rows($checkRes)==1)
			{
				echo   '<div class="alert alert-danger" role="alert">This username already exists.</div>';
			}
			else	{
				$_SESSION['user_id']=$row1["user_id"];
				$_SESSION['u_name']=$row1["name"];
				$_SESSION['email']=$row1["email"];

				//mysqli_query($conn,"INSERT INTO users (name, surname, password, email, birthday) VALUES ('$_POST[fname]', '$lname', '$pass1', '$email', '$date')");
				mysqli_query($conn,"INSERT INTO users (name, surname,password, email) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[pass1]', '$_POST[email1]')");

				
					header("location: index.html");
						echo '<div class="alert alert-success" role="alert"> Account successfully created. </div>';
			

			}

		?> 
	</body>
</html>