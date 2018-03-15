<?php
 	include  "../conn.php";
		if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$price=$_POST["price"];
			$userName=$_SESSION["u_name"];
			$user_id=$_SESSION["user_id"];
			$day=date("Y-m-d");
			$description=$_POST["description"];
			$artist=$_POST["artist"];
			$genre=$_POST["genre"];
			$type=$_POST["type"];
			$location="uploads/" . $_FILES["image"]["name"];
	
			if(isset($name) && isset($price))
			{
				$sql="UPDATE  advert  SET user='$userName' , user_id='$user_id' ,item_name='$name' , description='$description' ,artist='$artist' , genre='$genre' , type='$type' ,price='$price' ,image='$location' , postDate='$date' )";
				$res = mysqli_query($conn,$sql);

			}
		}
	?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Roland Ink edit</title>
		<meta charset="UTF-8"> 
		<meta name="author" content="Camille Samson">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style.css"> 
		<link rel="icon" type="image/png" sizes="96x96" href="images/android-icon-192x192.png">
		<script type="text/javascript" src="../jquery-3.1.0.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../chat.js"></script>
		<script type="text/javascript" src="../script.js"></script>
	</head>

	<body id="home-bod">
	
		<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-3 col-xs-12">

			<div class="container" id="container-home">
			<div class="row">
				<div class="col-md-6 col-md-offset-2 col-xs-12">
					
					<div id="head">
						<h1> <a href="home.php"> Simone</a> </h1> 
					</div>
				<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
					<li><a href="../home.php">Home</a></li>
					<li><a href="../profile.php">Simone</a></li>
					<li><a href="../blog.php">Blog</a></li>
					<li><a href="../podcast.php">Podcasts</a></li>
					<li><a href="simone.php">Upload</a></li>
				</ul>
			</nav>
	
					<div class="panel panel-default">
					<div class="panel-body">
					<form action="editAd.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend>
									New advertisement
								</legend>
								<?php
									$sql2 = "SELECT * FROM advert WHERE  ad_id='".$_GET['id'] ."'";
									$result = mysqli_query($conn,$sql2);

								 	$row = mysqli_fetch_assoc($result);
								 ?>	
								<div class="form-group">
									<label for="item">Item name:</label>
									<input type="text" class="form-control" name="name" id="item_name" value="<?php echo $row['item_name'] ?>"/>
								</div>	
								<div class="form-group">
									<label for="description">Description:</label>
									<input type="text" class="form-control" name="description" id="description" value="<?php echo $row['description'] ?>"/>
								</div>
								<div class="form-group">
									<label for="artist">Artist:</label>
									<input type="text" class="form-control" name="artist" id="artist" value="<?php echo $row['artist'] ?>"/>
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
									<select name="type" class="form-control">
										<option value="Oil Painting ">Oil Painting </option>
										<option value="Acrylic Painting ">Acrylic Painting </option>
										<option value="Watercolor">Watercolor</option>
										<option value="Gouache">Gouache</option>
										<option value="Charcoal">Charcoal</option>
										<option value="Graphite">Graphite</option>
										<option value="Pen and Ink">Pen and Ink</option>
										<option value="Chalk">Chalk</option>
										<option value="Pastel">Pastel</option>
										<option value="Screen printing">Screen printing</option>
										<option value="Spray paint ">Spray paint </option>
										<option value="Etching">Etching</option>
										<option value="Pottery">Pottery</option>
										<option value="Wood Carving">Wood Carving</option>
										<option value="Black and White Photography">Black and White Photography</option>
										<option value="Digital Photography">Digital Photography</option>
										<option value="Double Exposure Photography">Double Exposure Photography</option>
										<option value="Photoshop">Photoshop</option>
										<option value="Mixed media">Mixed media</option>
									</select>
								</div>
								<div class="form-group">
									<label for="price">Price:</label>
									<div class="input-group">
										
										<input type="decimal" class="form-control" name="price" id="price" value="<?php echo $row['price'] ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label for="image">Image:</label>
									<input type="file" class="form-control" name="image" id="image" value="<?php echo $row['image'] ?>"/>
								</div>	
								
								<input type="submit" id="submit" name="submit" class="btn btn-default" /> 
							</fieldset>
						</form>
						
						
					</div>
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
	</body>
</html>