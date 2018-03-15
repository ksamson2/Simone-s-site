<?php
 	if (session_status() == PHP_SESSION_NONE) 
 	{
 	 session_start();
 	}

		// $datab="id59156_69_samson";
		// $server="localhost";
		// $user="id59156_69_samson";
		// $password="KN6ZEPuz";
		
		$datab="rol";
		$server="localhost";
		$user="root";
		$password="";
		$conn=mysqli_connect($server, $user, $password,$datab);

		if (!$conn)
		{	
			die("Connection failed: " . mysqli_connect_error());
		}
?>