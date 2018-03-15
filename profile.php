<?php 
  include "conn.php";
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="jquery-3.1.0.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">
  <script src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>
<!-- 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->

<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1>Simone</h1>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">

  <div class="w3-bar w3-black" id="nav"> 
    <a href="home.php" class="w3-bar-item w3-button w3-padding-16">Home</a>
    <a href="profile.php" class="w3-bar-item w3-button w3-padding-16 ">Simone</a>
    <a href="blog.php" class="w3-bar-item w3-button w3-padding-16">Blog</a>
    <a href="podcast.php" class="w3-bar-item w3-button w3-padding-16">Podcasts</a>
  </div>
  <!-- Blog entry -->

  <div class="w3-card-4 w3-margin w3-white">
    <img src="/w3images/woods.jpg" alt="Nature" style="width:100%">
    <div class="w3-container">
      <h5>Blue<span class="w3-opacity">April 7, 2014</span></h5>
    </div>
  <hr />

  <!-- Blog entry -->
 
  	<br />
			<!-- <form method="post" action="search.php">
				<label for="searchUser">Search user by name or email:</label>
			    <input type="text" name="searchUser" id="searchUser" class='search_box'/>
			    <input type="submit" value="Search" id="searchUser2" class="btn btn-default" /><br />
			</form> -->
		<br />
		<div id="copy"> 
    <h3> Inside our kitchen </h3>
	<p>Munere principes adolescens in duo, definiebas interesset cu has. Id sit odio audiam sapientem, sea cu essent saperet patrioque. Eu eius affert detraxit sea, illum numquam docendi an sed, enim neglegentur ne nec.
	</p> <br />
	<img src="uploads/d5eba5fd015b975f3d4aab641da85c4e.jpg" class="fl"> 
	<p id="low">  Lorem ipsum dolor sit amet, sed an diam habeo. Sea aliquam nominavi id, ea meliore nostrum nam. Noluisse contentiones eum ut, vis liber dicunt no. Nulla dicunt timeam ex ius. Tamquam labitur laboramus ut sed. Sed laudem saperet interpretaris et, in albucius scaevola delicata vim, ut mutat perpetua est.
	</p>
	</div>
<!-- END BLOG ENTRIES -->

</div>
  </div>
<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="/w3images/avatar_g.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>My Name</b></h4>
      <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Popular Posts</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Lorem</span><br>
        <span>Sed mattis nunc</span>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/gondol.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Ipsum</span><br>
        <span>Praes tinci sed</span>
      </li> 
      <li class="w3-padding-16">
        <img src="/w3images/skies.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Dorum</span><br>
        <span>Ultricies congue</span>
      </li>   
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
        <img src="/w3images/rock.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Mingsum</span><br>
        <span>Lorem ipsum dipsum</span>
      </li>  
    </ul>
  </div>
  <hr> 
 
  <!-- Labels / tags -->
 <!--  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
    </div>
    <div class="w3-container w3-white">
    <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
    </p>
    </div>
  </div> -->
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>

			
			
			
