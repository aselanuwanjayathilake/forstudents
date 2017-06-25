<?php

$error=false;
if (isset($_POST['search']))
 {
	$id=$_POST['id'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	if(isset($_POST['gender'])){$gender=$_POST['gender'];}
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];


	if(empty($id))
	{
		$error=true;
		echo "error id";
	}

	if(!$error)
	{
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="my";

		$conn=mysqli_connect($servername,$username,$password,$dbname);

		$search_query=" SELECT * FROM my where id='$id' ";

		$search_result=mysqli_query($conn,$search_query);

		if ($search_query) 
		{
			echo "search successfully";
		}else{
			echo "error in search";
		}
	}

}


?>

<html>
<body>

<form  method="post" action="search3.php">
<input type="text" name="id" placeholder="Enter Your Id" value=" <?php if(isset($id)) {echo ($id) ;} ?>" ><br><br>

<input type="text" name="age" value=" <?php if(isset($id)) {echo ($id) ;} ?>"><br><br>

<input type="text" name="email" ><br><br>

<input type="text" name="gender" >
<br><br>

<input type="text" name="pass" ><br><br>

<input type="text" name="cpass"><br><br>


<input type="submit" name="search" value="Search">
</form>







</body>
</html>
