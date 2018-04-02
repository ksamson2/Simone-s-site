<?php 
  include "conn.php";
  ?>

<!DOCTYPE html>
<html>
<title>Simone</title>
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
<style> 
   h1{
  font-family: 'Frutilla Script', serif; 
  font-size: 140px;
  color: #d8c308;
  text-align: center;
 } 
 </style>
<!-- Header -->
<!-- Grid -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1>Simone</h1>
</header>
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <div class="navbar-fixed-top">
    <div class="cbp-af-header">
      <div class="w3-bar w3-black"> 
        <a href="home.php" class="w3-bar-item w3-button w3-padding-16">Home</a>
        <a href="profile.php" class="w3-bar-item w3-button w3-padding-16 ">Simone</a>
        <a href="blog.php" class="w3-bar-item w3-button w3-padding-16">Blog</a>
        <a href="podcast.php" class="w3-bar-item w3-button w3-padding-16">Podcasts</a>
      </div>
    </div>
  </div>



  <!-- Blog entry -->

  <div class="w3-card-4 w3-margin w3-white">
    <br />
   <h3> About me </h3>
   <br />
    


  <!-- Blog entry -->
 
  
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
    <?php         
        $sql = "SELECT * FROM advert Order by views desc LIMIT 4 ";
        $result = mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($result)== 0)
        {
            echo "0 results";
        }
        else
        {
          while($row = mysqli_fetch_assoc($result)) {

    
    ?> 
    
    <ul class="w3-ul w3-hoverable w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large"><?php echo $row['item_name'] ?></span><br>
        <span>Sed mattis nunc</span>
      </li>
    </ul>
    <?php 
      }}
       mysqli_close($conn); 
    ?>
  </div>
  <hr> 
 
  <!-- Labels / tags -->
  
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <button class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">Previous</button>
  <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</button>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
