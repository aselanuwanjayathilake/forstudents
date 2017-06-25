<?php

//The name of the directory that we need to create.
$directoryName = 'images';

//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}



$servername="localhost";
$username="root";
$password="";
$dbname="new";




	$conn=mysqli_connect($servername,$username,$password,$dbname);


if(isset($_POST['upload']))
{
	$filetmp=$_FILES["file_img"]["tmp_name"];
	$filename=$_FILES["file_img"]["name"];
	$filetype=$_FILES["file_img"]["type"];
	$filepath="images/".$filename;

	move_uploaded_file($filetmp, $filepath);

	$sql="INSERT INTO image(img_name,img_path,img_type,img_pic) VALUES 
	('$filename','$filepath','$filetype')";

	$result=mysqli_query($conn,$sql);



}




?>




<html>
<body>
<form action="image.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file_img">
	<input type="submit" name="upload" value="Upload" >




</form>

</body>