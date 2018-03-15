<?php
session_start();
  // echo "hi add_msg";

if (isset($_POST['msg']))
{
	 require_once __DIR__ . '/core/Message.php';
	
	  
	  // Escape the message string
	  $msg = htmlentities($_POST['msg'],  ENT_NOQUOTES);
	  
	  $chat = new Message();
	 $chat->addMessage($_SESSION['user_id'],  $msg, $_POST['sendto']);
}
?>