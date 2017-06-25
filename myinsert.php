<?php 
$error=false;

if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];

	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}

  if(!$error)
  {

  $servername="localhost";
  $username="root";
  $password="";
  $dbname="test";

  $conn=mysqli_connect('$servername','$username','$password','$dbname');

  $insert_query="INSERT INTO test(name,age,gender,pass,cpaas) VALUES ('$name','$age','$gender','$pass','$cpass')";

  $insert_result=mysqli_query($conn, $insert_query);

 if($insert_result)
{
	
		echo "<script>alert('DATA INSERTED SUCCESSFUlly')</script>";

	}
	else{
		echo ("data not inserted");
	}

}

}


?>
<html>

<head></head>
<body>
<form action="myinsert.php" method="post">
<input type="text" name="name"  required value="<?php if($error) echo $name; ?>">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span><br><br>
<input type="text" name="age"><br><br>
<input type="radio" name="gender" value="M">Male
<input type="radio" name="gender" value="F">FeMale<br><br>
<input type="password" name="pass"><br><br>
<input type="password" name="cpass"><br><br>
<input type="submit" name="insert" value="insert">


</form>
</body>












</html>