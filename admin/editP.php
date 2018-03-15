<?php
	include "conn.php";
			

			if(isset($_POST['submit']))
			{
			
				$fname=$_POST["fname"];
				$lname=$_POST["lname"];
				$email = $_POST["email1"]; 
				$date = $_POST["date"]; 
				$pass1 = $_POST["pass1"];
				$pass2 = $_POST["pass2"];
				$interests=$_POST["interests"];
				$work=$_POST["work"];
				$userName=$_SESSION["u_name"];
				$area=$_POST["area"];
				$location="uploads/" . $_FILES["image"]["name"];


				
				// $sqlCon ="SELECT * FROM users WHERE name='".$_SESSION['u_name'] ." '";
				
					mysqli_query($conn,"UPDATE users  SET name='$fname', surname ='$lname',password = '$pass1', email = '$email',image= '$location',work = '$work', interests = '$interests', area = '$area' WHERE user_id='$_SESSION[user_id]'");

						// echo '<div class="alert alert-success" role="alert"> Account successfully updated. </div>';
						header("location: profile.php");
		
			

			}
			
		

?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Roland Ink edit</title>
		<meta charset="UTF-8"> 
		<meta name="author" content="Camille Samson">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<link rel="icon" type="image/png" sizes="96x96" href="images/android-icon-192x192.png">
		<script type="text/javascript" src="jquery-3.1.0.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="chat.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>

	<body id="home-bod">
	
		<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-3 col-xs-12">
			<nav class="navbar navbar-inverse">
			    <ul class="nav navbar-nav">
			     <li><a href="profile.php">Profile</a></li>
				<li><a href="home.php">Home</a></li>
				<li><a href="message.php">Message</a></li>
				<li><a href="wishlist.php">Wishlist</a></li>
				<li><a href="logout.php">Logout</a></li>
			    </ul>
			    </ul>
			</nav>

			<div class="container" id="container-home">
			<div class="row">
				<div class="col-md-6 col-md-offset-2 col-xs-12">
					
					<div id="head">
						<h1> <a href="home.php"> Roland Ink</a> </h1> 
					</div>
					<h2 id="h2"> The online art platform </h2> 
	
					<div class="panel panel-default">
					<div class="panel-body">


						<form action="editP.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend>
									Edit Profile 
								</legend>
								<?php
								 $sql = "SELECT * FROM users WHERE name='".$_SESSION['u_name'] ."' ";
								 $result = mysqli_query($conn,$sql); 

								 $row = mysqli_fetch_assoc($result);?>	
								<div class="form-group">
								<label for="fname">First name:</label>
								<input type="text" class="form-control" name="fname" id="fname" value="<?php
								echo $row["name"];
								?>"/>
							</div>
							<div class="form-group">
								<label for="lname">Last name:</label>
								<input type="text" class="form-control" name="lname" id="lname" value="<?php
								 echo $row["surname"];
								  ?>"/>
							</div>
							<div class="form-group">
								<label for="email1">Email address:</label>
								<input type="email" class="form-control" name="email1" id="email1" value="<?php
								 echo $row["email"];
								  ?>"/>
							</div>
							<div class="form-group">
								<label for="date">Date of birth:</label>
								<input type="date" class="form-control" name="date" id="date" value="<?php
								 echo $row["birthday"];
								  ?>" />
							</div>
							<div class="form-group">
								<label for="pass1">Password:</label>
								<input type="password" class="form-control" name="pass1" id="pass1" value="<?php
								 echo $row["password"];
								  ?>"/>
							</div>
							<div class="form-group">
								<label for="pass2">Confirm password:</label>
								<input type="password" class="form-control" name="pass2" id="pass2" value=""/>
							</div>
							
							<div class="form-group">
									<label for="item">Interests:</label>
									<input type="text" class="form-control" name="interests" id="interests" value="<?php
								 echo $row["interests"];
								  ?>"/>
								</div>	
								<div class="form-group">
									<label for="description">Work:</label>
									<input type="text" class="form-control" name="work" id="work" value="<?php
								 echo $row["work"];
								  ?>"/>
								</div>	
								<div class="form-group">
									<label for="price">City/Region:</label>
									<input type="text" class="form-control" name="area" id="area" value="<?php
								 echo $row["surname"];
								  ?>"/>
								</div>
								<div class="form-group">
									<label for="image">Add image:</label>
									<input type="file" class="form-control" name="image" id="image" value="<?php
								 echo $row["image"];
								  ?>"/>
								</div>	
								<input type="submit" name="submit" value="Submit" class="btn btn-default"  />
							</fieldset>
						</form>
					</div>
					</div>
				</div>
			</div>
			<?php 
			$target_dir="uploads/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk=1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			if(isset($_POST["submit"]))
			{
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check !==false)
				{
					echo "File is an image - " .$check["mime"] . ".";
					$uploadOk=1;  
				}
				else
				{
					echo "File is not an image";
					$uploadOk=0;	
				}
			}

			if(file_exists($target_file))
			{
				echo "File already exists.";
				$uploadOk=0;
			}

			if($_FILES["image"]["size"]>500000)
			{
				echo "Your file is too large Please upload a file <=500kb.";
				$uploadOk=0;
			}

			if($imageFileType !="jpg" 
			&& $imageFileType != "png"  
			&& $imageFileType != "jpeg"
			&& $imageFileType !="gif")
			{
				echo " Only JPG,JPEG,PNG AND GIFS  are accepted.";
				$uploadOk=0;
			}

			if($uploadOk==0)
			{
				echo "File not uploaded.";
			}

			else 
			{
				if(move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
				{
					echo "The file ". basename($_FILES["image"]["name"]). "has been uploaded.";
				}
				else 
				{
					echo "Error. File not uploaded.";
				}
			}

		?>
		</div>
	</div>
	</div>
	</div>
	</body>
	</html>
		
