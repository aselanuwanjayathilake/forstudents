<?php
$error=false;

if (isset($_POST['update'])) {
	
	$id=$_POST['id'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	if(isset($_POST['gender'])){$gender=$_POST['gender'];}
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];


	if (empty($age)) {

		$error=true;
		echo "error update";
	}

	if(!$error)
	{
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="my";

		$conn=mysqli_connect($servername,$username,$password,$dbname);

		$update_query=" UPDATE my SET age='$age',email='$email',gender='$gender',pass='$pass',cpass='$cpass' WHERE id='$id' ";

		$update_result=mysqli_query($conn,$update_query);

		if($update_result)
		{ 
			echo"Updated Successfully";
		}else
		{
			echo"Error In Update";
		}
	}

}









?>


<html>



<body>
<form  method="post" action="update3.php">
<input type="text" name="id" placeholder="Enter Your Id"><br><br>

<input type="text" name="age" placeholder="Enter Your Age"><br><br>

<input type="text" name="email" placeholder="Enter Your Email"><br><br>

<input type="radio" name="gender" value="F">Male
<input type="radio" name="gender" value="M">Female
<br><br>

<input type="text" name="pass" placeholder="Enter Your Password"><br><br>

<input type="text" name="cpass" placeholder="Retype Your Password"><br><br>


<input type="submit" name="update" value="UPDATE">
</form>
</body>
</html>
