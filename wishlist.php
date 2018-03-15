<?php
	include "conn.php";
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control:  post-check=0; pre-check=0', false);
	header('Pragma: no-cache');
		
		if(isset($_GET['id']))
		{

		$sql2 = "SELECT * FROM advert WHERE  ad_id='".$_GET['id'] ."'";
						$ad= $_GET['id'];
						$user= $_SESSION['user_id'];
		$sql="INSERT INTO cart (ad_id, user)
				  VALUES ('$ad' , '$user')";
				$res = mysqli_query($conn,$sql);
		}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>  Roland Ink wishlist</title>
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
			<nav class="navbar navbar-default">
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
				<div class="col-md-7 col-md-offset-2 col-xs-12">
					
					<div id="head">
						<h1> <a href="home.php"> Roland Ink</a> </h1> 
					</div>
					<h2 id="h2"> The online art platform </h2> 
	
					<div class="panel panel-default">
					<div class="panel-body">
						<?php
							$sql = "SELECT * FROM cart  WHERE  user='".$_SESSION['user_id'] ."'  Order by ad_id desc ";
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)== 0)
							 {
							    echo "Your wishlist is empty ";
							}
							else
							{
								 echo " <ul class='list-group'>";
								while($row = mysqli_fetch_assoc($result))
								{
									$adi=$row['ad_id'];
									$sql2 = "SELECT * FROM advert  WHERE  ad_id='$adi' ";
									$res = mysqli_query($conn,$sql2);
									while($row = mysqli_fetch_assoc($res))
									{
										echo "<li class='list-group-item it'>";?>
									<input type='submit' name='deleteW' value='delete wish' class='btn btn-default deleteW' />
										<?php
										echo "<img class='img-rounded' src='" .$row["image"]. " '> <h3>". $row["item_name"]."</h3> <h2>".$row["price"] ."</h2> <br />".$row["description"]." <br />".$row["user"]   ." <br />".$row["type"] ." <br />".$row["genre"] ." <br />".$row["postDate"] ." <br />".$row["artist"];
						  				echo "	</li>";
									}
								}
								echo "</ul>";
							}
						?>
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
		</div>
		
	</body>
</html>
