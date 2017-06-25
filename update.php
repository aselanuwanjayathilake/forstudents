<?php



$error=false;

if(isset($_POST['update']))
{
	$rollno=$_POST['rollno'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $address=$_POST['address'];
 $email=$_POST['email'];


	if (empty($fname)) {
		$error = true;
		$name_error = "pleace enter valid id";
	}


if (!$error) {

	$servername="localhost";
$username="root";
$password="";
$dbname="new";




	$conn=mysqli_connect($servername,$username,$password,$dbname);
	


	$update_query="UPDATE `new` SET fname='$fname',lname='$lname',address='$address',email='$email' WHERE rollno='$rollno' ";


$update_result=mysqli_query($conn,$update_query);

if($update_result)
{
	
		 echo "<script>alert('SUCCESSFULLY UPDATED')</script>";
	}
	else{
		echo ("error in update");
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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="home.php" class="navbar-brand">HOME PAGE</a>
        </div>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="insert.php">INSERT DATA</a></li>
                <li><a href="delete.php">DELETE DATA</a></li>
                <li><a href="update.php">UPDATE DATA</a></li>
            </ul>
        </div>

    </div>
</nav>

<div class="container">
<form method="post" action="update.php">

<div class="form-group">
<input type="text" name="rollno" class="form-control"  placeholder="Enter Roll Number" required value="<?php if($error) echo $fname; ?>">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span></div><br><br>

<div class="form-group">
<input type="text" name="fname" class="form-control" placeholder="Enter First Name" required value="<?php if($error) echo $fname; ?>">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span></div><br><br>

<div class="form-group">
<input type="text" name="lname" placeholder="Enter Last Name" class="form-control"><br><br>

<div class="form-group">
<input type="text" name="address" placeholder="Enter Last Name" class="form-control"></div><br><br>

<div class="form-group">
<input type="text" name="email" placeholder="Enter Your Email" class="form-control"  required value="<?php if($error) echo $email; ?>" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></div></span><br><br>
<input type="submit" name="update" value="Update" class="btn btn-info btn-block">
</form>
</div>
</body>
</html>