<?php	
if(isset($_POST["submit"]))
		{
		
			$location="uploads/" . $_FILES["image"]["name"];
	
			if(isset($name) && isset($price))
			{
				$sql="INSERT INTO advert (image) 
				-- INSERT into table advert, row image the value of the file path.
				  VALUES ( '$location' )";
				$res = mysqli_query($conn,$sql);

			}
		?>
			<form action="home.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="image">Description:</label>
				<input type="file" class="form-control" name="image" id="image" placeholder="Description"/>
			</div>	
			
			<input type="submit" id="submit" name="submit" class="btn btn-default" /> 
			</div>
							
		</form>
			<?php 	$target_dir="uploads/";
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

			if($_FILES["image"]["size"]>1000000)
			{
				echo "Your file is too large.";
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
				//move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file);
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