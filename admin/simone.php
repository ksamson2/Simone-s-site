<?php
//KIM DID YOU CHANGE THE FILE SIZE 
 		include "../conn.php";
			if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$price=$_POST["price"];
			$userName="Simone";
			$user_id="8";
			$day=date("Y-m-d");
			$description=$_POST["description"];
			$artist=$_POST["artist"];
			$genre=$_POST["genre"];
			// $type=$_POST["type"];
			$location="../uploads/" . $_FILES["image"]["name"];
	
			if(isset($name) && isset($price))
			{
				$sql="INSERT INTO advert (user, user_id,item_name , description,artist, genre,price,image, postDate)
				  VALUES ('$userName','$user_id','$name', '$description', '$artist', '$genre', '$price', '$location' ,'$day')";
				$res = mysqli_query($conn,$sql);

			}
		}
	
			
	?>
	
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Roland Ink home</title>
		<meta charset="UTF-8"> 
		<meta name="author" content="Camille Samson">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style.css"> 
		<!-- <link rel="icon" type="image/png" sizes="96x96" href="images/android-icon-192x192.png"> -->
		<script type="text/javascript" src="../jquery-3.1.0.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../chat.js"></script>
		<script type="text/javascript" src="../script.js"></script>
	
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
			    <li><a href="../home.php">Home</a></li>
				<li><a href="../profile.php">Simone</a></li>
				<li><a href="../blog.php">Blog</a></li>
				<li><a href="../podcast.php">Podcasts</a></li>
				<li class="active"><a href="simone.php">Upload</a></li>
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
						<form action="simone.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend  id = "newAdDrop">
									New advertisement
								</legend>
								<div id="contNA">
								<div class="form-group">
									<label for="item">Item name:</label>
									<input type="text" class="form-control" name="name" id="item_name" placeholder="Item name"/>
								</div>	
								<div class="form-group">
									<label for="description">Description:</label>
									<input type="text" class="form-control" name="description" id="description" placeholder="Description"/>
								</div>
								<div class="form-group">
									<label for="artist">Artist:</label>
									<input type="text" class="form-control" name="artist" id="artist" placeholder="Van Gogh"/>
								</div>
								<div class="form-group">
									<label for="genre">Genre:</label>
									<select name ="genre" class="form-control" >
										<option value="Abstract">Abstract</option>
										<option value="American Scene Painting ">American Scene Painting </option>
										<option value="Art Deco">Art Deco</option>
										<option value="Art Nouveau">Art Nouveau</option>
										<option value="Art Renaissance">Art Renaissance</option>
										<option value="Baroque">Baroque</option>
										<option value="Digital">Digital</option>
										<option value="Expressionism">Expressionism</option>
										<option value="Geometric abstraction">Geometric abstraction</option>
										<option value="Graffiti">Graffiti</option>
										<option value="Impressionism">Impressionism</option>
										<option value="Minimalism">Minimalism</option>
										<option value="Modernism">Modernism</option>
										<option value="Photorealism">Photorealism</option>
										<option value="Pointillism">Pointillism</option>
										<option value="Pop Art">Pop Art</option>
										<option value="Realism">Realism</option>
										<option value="Rococo">Rococo</option>
										<option value="Romanticism">Romanticism</option>
										<option value="Street Art ">Street Art </option>
									</select>
								</div>
								<div class="form-group">
									<label for="type">Medium:</label>
									<input type="text" class="form-control" name="name" id="item_name" placeholder="Item name"/>
									
								</div>
								<div class="form-group">
									<label for="price">Price:</label>
									<div class="input-group">
										
										<input type="decimal" class="form-control" name="price" id="price" placeholder="Price"/>
									</div>
								</div>
								<div class="form-group">
									<label for="image">Description:</label>
									<input type="file" class="form-control" name="image" id="image" placeholder="Description"/>
								</div>	
								
								<input type="submit" id="submit" name="submit" class="btn btn-default" /> 
								</div>
							</fieldset>
						</form>


					</div>
					</div>

				</div>
			</div>

		</div>
		
		
		<?php
				 	
				$sql2 = "SELECT * FROM advert Order by ad_id desc";
				$result = mysqli_query($conn,$sql2);

					echo " <ul class='list-group'>";
				  	 while($row = mysqli_fetch_assoc($result)) 
				  	 {
				    	?>
				    	 <li class='list-group-item' id="<?php echo $row['ad_id'];?>">
				    	<input type='submit' name='delete' value='delete ad' class='btn btn-default delete' />
				    	 <?php  echo "<button type='button' name='edit'  id='edit' class='btn btn-default edit'><a href='editAd.php?id=".$row['ad_id']."'>Edit </a></button>  "; ?>
				    	 <br />
				    	 <br />
				    	<?php
				        	echo "<img class='img-rounded' src='../" .$row["image"]. " '> <h3>". $row["item_name"]."</h3> <br />".$row["description"]." <br />".$row["user"]   ." <br />".$row["type"] ." <br />".$row["genre"] ." <br />".$row["postDate"] ." <br />".$row["artist"];
				  	echo "	</li>";
				 }
				echo  "</ul>";
						
			mysqli_close($conn);					
		?>		
  </ul>
</nav>
	
	</div>
	</div>
	</div>
	</div>
	</div>
		
	</body> 
</html>
