<?php 
$error=false;
if(isset($_POST['insert']))
{
	$id=$_POST['id'];
	$age=$_POST['age'];
	$email=$_POST['email'];

	if(isset($_POST['gender'])){$gender=$_POST['gender'];}
	$pass=$_POST['pass'];
	if(isset($_POST['cpass'])){$cpass=$_POST['cpass'];}
	
if (empty($age)) {
	$error=true;
	$age_error="please enter your age";
}

 if (empty($email)) {
 	$error=true;
    $name_error = "Email is required";
  }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error=true;
  $name_error = "Invalid email format"; 
}

if (empty($gender)) {
	$error=true;
    $pass_error= "Select Your Gender";
  }

  if (empty($pass)) {
  $error=true;
    $paas_error= "Enter a Password";
  }

  if (empty($cpass)) {
  $error=true;
    $cpass_error= "Retype Your Password";
  }

if ($pass!= $cpass)
 {
  $error=true;
  $cpass_error="Oops! Password did not match! Try again.";
 }



if(!$error)
{

$servername="localhost";
$username="root";
$password="";
$dbname="my";

$conn=mysqli_connect($servername,$username,$password,$dbname);
	


	$insert_query="INSERT INTO my( id,age,email, gender, pass, cpass) VALUES ('$id','$age','$email','$gender','$pass','$cpass') ";


$insert_result=mysqli_query($conn, $insert_query);

if($insert_result)
{
	echo "<script>alert('DATA INSERTED SUCCESSFUlly')</script>";
}else
{
	echo"error in inserting";
}

}



}
?>




<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>



<body>
<form action="insert3.php" method="POST">


	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cyber Consepts</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="insert3.php">Insert</a></li>
      <li><a href="delete3.php">Delete</a></li>
      <li><a href="update3.php">Update</a></li>
      <li><a href="search3.php">Search</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<div class="form-group">

<input type="text" name="id" class="form-control" placeholder="Enter Your Id" >
 </div>
<br><br>

<div class="form-group">
<input type="text" name="age" class="form-control" placeholder="Enter Your Age" required value="<?php if ($error) echo $age; ?>">
<span class="text_danger"><?php if (isset($age_error)) echo $age_error; ?></span></div><br><br>

<div class="form-group">
<input type="text" name="email" class="form-control" placeholder="Enter Your Email" required value="<?php if ($error) echo $email    ?>">
<span class="text_danger"><?php if (isset($name_error)) echo $name_error ?></span></div><br><br>

 <label class="radio-inline">
<input type="radio" name="gender"  value="M" required value="<?php if ($error) echo $error ?>">Male
<span class="text_danger"><?php if(isset($gender_error)) echo $gender_error ?></span></label>
 <label class="radio-inline">
<input type="radio" name="gender" value="F">Female</label><br><br>

<div class="form-group">
<input type="text" name="pass" class="form-control" placeholder="Enter Your Password" required value="<?php if($error) echo $error ?>">
<span class="text_danger"><?php if(isset($pass_error)) echo $pass_error ?></span></div><br><br>

<div class="form-group">
<input type="text" name="cpass" class="form-control" placeholder="Confirm Password" required value="<?php if($error) echo $error ?>">
<span class="text_danger"><?php if(isset($cpass_error)) echo $cpass_error ?></span></div><br><br>


<input type="submit" class="btn btn-primary" name="insert" value="Insert">
</div>
</form>
</body>

</html>