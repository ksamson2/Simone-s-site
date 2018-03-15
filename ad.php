<?php
	include "conn.php";
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Blog Posts</title>
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
			<div class="col-md-10 col-md-offset-3 col-sml-4 col-xs-4">
			<br />
			<br />

			<div class="container" id="container-home">
			<div class="row">
				<div class="col-md-6 col-md-offset-2 col-sml-4 col-xs-4">
					
					<div id="head">
						<h1> <a href="home.php"> Simone</a> </h1> 
					</div>
					<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
			    <li><a href="home.php">Home</a></li>
				<li><a href="profile.php">Simone</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="podcast.php">Podcasts</a></li>
				</ul>
			</nav>
					<div id="container">

				<form method="post" action="search.php">
					<label for="search">Search ad by title,user,artist,genre,,medium or description:</label>
				    <input type="text" name="search" id="search" class='search_box'/>
				    <input type="submit" value="Search" id="search2" class="btn btn-default" /><br />
				</form>
				</div>      
				<div>
				<ul id="results" class="update">
				</ul>
					<div class="panel panel-default">
					<div class="panel-body">

					
		
		
						<?php
						$sql2 = "SELECT * FROM advert WHERE  ad_id='".$_GET['id'] ."'";
						$result = mysqli_query($conn,$sql2);

							echo " <ul class='list-group' id='adList'>";
						  	 while($row = mysqli_fetch_assoc($result)) 
						  	 {
						    	?>
						    	 <li class='list-group-item' id="<?php echo $row['ad_id'];?>">
						    	
						    	<?php
						    	echo "<button type='button' id='wish' class='btn btn-default view'> <a href='wishlist.php?id=" .$row['ad_id'].  "'> Add to wishlist</a></button> ";
						        	echo "<img class='img-rounded' id='ad' src='" .$row["image"]. " '> <h3>". $row["item_name"]."</h3> <h2>".$row["price"]  ."</h2> <br /> Description: ".$row["description"]." <br /> Seller: ".$row["user"]   ." <br /> Medium: ".$row["type"] ." <br />Genre: ".$row["genre"] ." <br />Date posted: ".$row["postDate"] ." <br />Artist: ".$row["artist"];
						  	echo "	</li>";
						 }
						echo  "</ul>";
						
						
						mysqli_close($conn);					
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
