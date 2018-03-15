<?php
 	include "conn.php";
 	
 ?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>  Roland Ink user</title>
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
			<div class="col-md-10 col-md-offset-4 col-xs-12">
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
				<div class="col-md-10 col-md-offset-2 col-xs-12">
					
					<div id="head">
						<h1> <a href="home.php"> Roland Ink</a> </h1> 
					</div>
					<h2 id="h2"> The online art platform </h2> 
	
				</div>
			</div>
			<?php
			$id=$_GET['id'];
			
			$sql = "SELECT * FROM users WHERE  user_id='".$_GET['id'] ."'";
			$result = mysqli_query($conn,$sql);

				 while($row = mysqli_fetch_assoc($result)) 
				 {
				    	echo "<li class='list-group-item'>";
				    	
				        	echo "<h3><img id='prop'class='img-rounded' src='".$row["image"]."'/> <br />".$row["name"]." ".$row["surname"]."</h3> <br />Email: ".$row["email"]."<br />Work: " .$row["work"]."<br />Art Interests: " .$row["interests"]. "<br />City/Region: " .$row["area"];  /*." <br />".$row["userName"]   ." <br />".$row["day"] */
			  		 echo "	</li>";
			  	 }
				echo   "</ul>";
				$sql2 = "SELECT * FROM advert WHERE  user_id='".$_GET['id'] ."'  Order by ad_id desc";
						$result = mysqli_query($conn,$sql2);

							echo " <ul class='list-group'>";
						  	 while($row = mysqli_fetch_assoc($result)) 
						  	 {
						    	?>
						    	 <li class='list-group-item' id="<?php echo $row['ad_id'];?>">
						    	
						    	<?php
						        	echo "<img class='img-rounded' src='" .$row["image"]. " '> <h3>". $row["item_name"]."</h3> <h2>".$row["price"]  ."</h2> <br />Description: ".$row["description"]." <br />Seller: ".$row["user"]   ." <br />Medium: ".$row["type"] ." <br />Genre: ".$row["genre"] ." <br /> Date posted: ".$row["postDate"] ." <br /> Artist: ".$row["artist"];
						  	echo "	</li>";
						 }
						echo  "</ul>";
						
						mysqli_close($conn);	
			?>
		</div>
		</div>
		</div>
		</div>
	</body>
</html>