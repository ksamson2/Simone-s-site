<?php
//KIM DID YOU CHANGE THE FILE SIZE 
 		include "conn.php";
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
				$sql="INSERT INTO advert (user, user_id,item_name , description,artist, genre, type,price,image, postDate)
				  VALUES ('$userName','$user_id','$name', '$description', '$artist', '$genre',  '$type', '$price', '$location' ,'$day')";
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
				<li class="active"><a href="podcast.php">Podcasts</a></li>
				</ul>
			</nav>
					<div id="container">

				<!-- <form method="post" action="search.php">
					<label for="search">Search ad by title,user,artist,genre,,medium or description:</label>
				    <input type="text" name="search" id="search" class='search_box'/>
				    <input type="submit" value="Search" id="search2" class="btn btn-default" /><br />
				</form> -->
				</div>      
				<div>
				<ul id="results" class="update">
				</ul>
					
				</div>
			</div>

		</div>

		<?php
			$perpage = 4;
			if(isset($_GET['page']) & !empty($_GET['page'])){
				$curpage = $_GET['page'];
			}else{
				$curpage = 1;
			}
			$start = ($curpage * $perpage) - $perpage;

			$sql = "SELECT * FROM advert Order by ad_id desc";
			$result = mysqli_query($conn,$sql);
			$totalres = mysqli_num_rows($result);
			$endpage = ceil($totalres/$perpage);
			$startpage = 1;
			$nextpage = $curpage + 1;
			$previouspage = $curpage - 1;
			$sql = "SELECT * FROM advert  Order by ad_id desc  LIMIT $start, $perpage ";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)== 0)
			{
			    echo "0 results";
			}
			else
			{
				echo " <ul class='list-group'>";
				while($row = mysqli_fetch_assoc($result)) {
				echo "<li class='list-group-item it'>";
        ?> 
                 	<div class="container">
                 	<button type="button" class="btn btn-default btn-sml messageseller <?php echo $row['user_id']; ?> " data-toggle="modal" data-target="#msgModal">Message seller </button>
                 	<div id="msgModal" class="modal fade" role="dialog"> 
                 		<div class="modal-content"> 
                 			<div class="modal-header"> 
                 				<button type="button" class="close" data-dismiss="modal"> &times;</button>
                 					<h3 class="modal-title">Message Seller </h3>
                 			</div>
                 			<div class="modal-body"> 
             					<div class="form-group">
						<label for="send2">Send to:</label>
						<input type="email" class="form-control" name="send" id="send2" placeholder="Send to"/>
					 </div>
					 <div class="form-group">  
				        	<textarea id="chatMsg2" placeholder="Type your message."></textarea>
						</div>
					<div class="form-group">  
						<button class="btn btn-default" id="submit2" name="submit2">Submit</button>
					</div>
				</div>
				<div  class="modal-footer"> 
					<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
				</div>
			</div>
		</div>
		<?php
		echo "<button type='button' id='view' class='btn btn-default view'> <a href='ad.php?id=" .$row['ad_id']. " '> View Ad</a></button> " ;
		// echo "<button type='button' id='wish' class='btn btn-default view'> <a href='wishlist.php?id=" .$row['ad_id'].  "'> Add to wishlist</a></button> ";

			echo "<h3>".$row["item_name"]."</h3><br />";
			echo "Posted by: <a href='user.php?id=" .$row['user_id']. "'> ".$row['user']."</a>";
			echo "<br /> Post date:".$row["postDate"] ." <br />Artist: ".$row["artist"] ."<br /><img class='img' src='" .$row["image"]. " '>" ;
			echo "  </li>";
			}

			
		echo  "</ul>";
		}
		?> 
		<nav aria-label="Page navigation">
  <ul class="pagination">
  	<?php
  		if($curpage != $startpage){ 
	?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php
    	} 
    ?>

    <?php
    	if($curpage >= 2){ 
    ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php
    	}
    ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
    <?php if($curpage != $endpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
		<?php
		mysqli_close($conn);					
		?>
	</div>
	</div>
	</div>
	</div>
	</div>
		
	</body> 
</html>
