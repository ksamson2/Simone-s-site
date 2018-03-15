<?php
    session_start();
    
    // $_SESSION['user_id'] = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;
    
    // Load the messages initially
    require_once __DIR__ . '/core/Message.php';
    $chat = new Message();
    $messages = $chat->getMessages();
    include "conn.php";
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Roland Ink message</title>
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
				<div class="col-md-6 col-md-offset-2 col-xs-12">
					
					<div id="head">
						<h1> <a href="home.php"> Roland Ink</a> </h1> 
					</div>
					<h2 id="h2"> The online art platform </h2> 
	
					<div class="panel panel-default">
					<div class="panel-body">
					
		
			<div class="msg-header"><a href="profile.php">
			Messages </a></div>
			<div class="msg-wgt-body">
		        <table>
			    <?php
				    if (!empty($messages)) {
					    foreach ($messages as $message) {
					    $msg = htmlentities($message['message'], ENT_NOQUOTES);
					    $user_name = ucfirst($message['user_id']);

					    $sql="SELECT email FROM users WHERE user_id= '$user_name' ";
					    $user=mysqli_query($conn,$sql);
					     $row = mysqli_fetch_assoc($user);
					     $mail=$row['email'];
 					$sql3="SELECT user_id FROM users WHERE user_id= '$user_name' ";
					    $user_id=mysqli_query($conn,$sql3);
					     $row2 = mysqli_fetch_assoc($user_id);
					     $uS=$row2['user_id'];

					    $sent = date( $message['sent_on']);
					    $sendto=($message['send_to']);
					    echo "
				    	<tr class='msg-row-container'>
				    	<td>
				        <div class='msg-row'>
				        	<div class='avatar'></div>
				        		<div class='message'>

				                      <span class='user-label'>From: 
				                      	 <a href='user.php?id=" .$uS. " '>  {$mail }</a>
				                      <br />  <span class='msg-time'>{$sent}</span><span class='user-label'>To: {$sendto}</span></span><br/>{$msg}
				                </div>
				            </div>
					        </td>
					    </tr>";}
				    } else {
				        echo "<span>No chat messages available!</span>";
				    }
				?>
				</table>
			</div>
			<div class="msg-wgt-footer">
				<div class="form-group">
					<label for="item">Send to:</label>
					<input type="email" class="form-control" name="send" id="sendto" placeholder="Send to"/>
		        </div>
		        <div class="form-group">  
		        	<textarea id="chatMsg" placeholder="Type your message. "></textarea>
				</div>
			    <div class="form-group">  
					<button class="btn btn-default" id="submit" name="submit">Submit</button>
			    </div>
	       </div>
	       </div>
	       </div>
       </div>
  
  </body>
</html>