
<?php

	$msg = "";
	
	if (isset($_POST['upload'])){
		
		
		$db = mysqli_connect("localhost","root","","test");

		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
	
		
		
		$text = $_POST['text'];
		
		$name = $_POST['name'];
		
		$sql = "INSERT INTO images (image, text, name) VALUES ('$image','$text','$name')";
		mysqli_query($db,$sql);
		
		if (move_uploaded_file($image_tmp,"images/$image")){
			
			$msg = "Image uploaded successfully";
		}else{
			$msg = "There was a problem uploading image";
		}
	}


?>
<!DOCTYPE html>
<html>



<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#comment {
   
 style=position: relative;
 border:1px solid #000000;
 padding:20px;
 align:center;
    

}
#fa {
    font-size: 50px;
    cursor: pointer;
    user-select: none;
}

#fa:hover {
  color: darkblue;
}
</style>

<div id="hide" style='color:black;border-style:solid; margin: 10px;'>




<?php
	
	$db = mysqli_connect("localhost","root","","test");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db,$sql);
	while ($row = mysqli_fetch_array($result)){
			
			echo "<p style='color:black;border-style:solid; margin: 10px;'>";"</p>";
			
			echo "<p style='color:red;position:relative;left:200px;font-size:50px'>".$row['name']."</p>";
			echo "<p style='color:red;position:relative;left:200px'><img src='images/".$row['image']."'></p>"; 
			echo "<p style='color:red;position:relative;left:200px;font-size:20px'>".$row['text']."</p>";  
			echo '<div id=comment>';
			echo " <a  href=index.php>Comment</a>";
			echo '<i onclick=myFunction(this) class=fa fa-thumbs-up></i>';
			echo '</div >';
			echo "<p style='color:black;border-style:solid; margin: 10px;'>";"</p>";
			
	}


?>

<script>
function myFunction(x) {
    x.classList.toggle(fa-thumbs-down);
}
</script>


	</div></body></html>
