<?php
  include "conn.php";
       
?>
<!DOCTYPE html> 
<html> 
    <head> 
        <<title>  Roland Ink search</title>
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
                <li><a href="edit.php">Edit</a></li>
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
        
                <br />
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <p> Search results: </p>
                    </div>
                    </div>
                    <?php
         if (isset($_POST['search']))
        {
    // never trust what user wrote! We must ALWAYS sanitize user input
             $word = mysqli_real_escape_string ($conn,$_POST['search']);
             
             $word = htmlentities($word);
            // build your search query to the database
            $sql = "SELECT * FROM advert WHERE item_name  LIKE '%".$word."%' OR description  LIKE '%".$word."%' OR artist  LIKE '%".$word."%' OR genre  LIKE '%".$word."%' OR type  LIKE '%".$word."%' ";
            // get results
             $result = mysqli_query($conn,$sql);

           if(mysqli_num_rows($result)== 0)
             {
                echo "0 results";
            }
            else
            {
                echo " <ul class='list-group'>";
                 while($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='list-group-item'>";
                 echo "<button type='button' id='view' class='btn btn-default view'> <a href='ad.php?id=" .$row['ad_id']. " '> View Ad</a></button> " ;
                 echo "<button type='button' id='wish' class='btn btn-default view'> <a href='wishlist.php?id=" .$row['ad_id'].  "'> Add to wishlist</a></button> ";
                        echo "<h3>". $row["item_name"]."</h3> <h2>".$row["price"]  ."</h2> <br />".$row["description"]." <br />".$row["user"]   ." <br />".$row["type"] ." <br />".$row["genre"] ." <br />".$row["postDate"] ." <br />".$row["artist"] ."<img src='" .$row["image"]. " '>" ;
                echo "  </li>";
             }
            echo  "</ul>";
            }
            mysqli_close($conn);    
        }

    if (isset($_POST['searchUser']))
        {
    // never trust what user wrote! We must ALWAYS sanitize user input
             $word2= mysqli_real_escape_string ($conn,$_POST['searchUser']);
             
             $word2 = htmlentities($word2);
            // build your search query to the database
            $sql2 = "SELECT * FROM users WHERE name  LIKE '%".$word2."%' OR surname  LIKE '%".$word2."%' OR email  LIKE '%".$word2."%' OR work  LIKE '%".$word2."%' OR area  LIKE '%".$word2."%' ";
            // get results
             $res = mysqli_query($conn,$sql2);

           if(mysqli_num_rows($res)== 0)
             {
                echo "0 results";
            }
            else
            {
                echo " <ul class='list-group'>";
                 while($row = mysqli_fetch_assoc($res)) {
                    echo "<li class='list-group-item'>";
                       echo "<h3><img id='prop'class='img-rounded' src='".$row["image"]."'/> <br />";
                            echo $row["name"]." ".$row["surname"]."</h3> <br />".$row["email"]."<br />" .$row["work"]."<br />" .$row["interests"]. "<br />" .$row["area"];  /*." <br />".$row["userName"]   ." <br />".$row["day"] */
                     echo " </li>";
             }
            echo  "</ul>";
            }
            mysqli_close($conn);    
        }
    ?>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
   
    </body>
</html>

       
