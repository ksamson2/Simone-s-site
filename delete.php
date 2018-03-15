<?php
 	include "conn.php";
		if(isset($_POST['delete_row']))
		{
			$id=$_POST['ad_id'];
			$sql = "DELETE FROM advert WHERE ad_id='$id' ";
			$result = mysqli_query($conn,$sql);
			mysqli_close($conn);
			echo "success";
		}
		
		if(isset($_POST['delete_wish']))
		{
			$id=$_POST['cart'];
			if(isset($id))
			{
				$sql = "DELETE FROM cart WHERE cart='$id' ";
			$result = mysqli_query($conn,$sql);
			mysqli_close($conn);
			echo "success";
			}			
		}
		if(isset($_POST['delete_pro']))
		{
			$id=$_POST['user_id'];
			$sql = "DELETE FROM users AND advert WHERE user_id='$id' ";
			$result = mysqli_query($conn,$sql);
			mysqli_close($conn);
			echo "success";
		}
		if(isset($_POST['getemail']))
		{
			$email = mysqli_query($conn,"SELECT email FROM users WHERE user_id='$_POST[getemail]' ");
			echo mysqli_fetch_assoc($email)['email'];
		}
		
	
?>