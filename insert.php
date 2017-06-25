<?php



$error=false;

if(isset($_POST['insert']))
{
	$rollno=$_POST['rollno'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $address=$_POST['address'];
 $email=$_POST['email'];


	if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}


	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}

if (!$error) {

	$servername="localhost";
$username="root";
$password="";
$dbname="new";




	$conn=mysqli_connect($servername,$username,$password,$dbname);
	


	$insert_query="INSERT INTO new( rollno,fname, lname, address, email) VALUES ('$rollno','$fname','$lname','$address','$email') ";


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
<form method="post" action="insert.php">
 <div class="form-group">
<input type="text" name="rollno" class="form-control"  placeholder="Enter Roll Number" ><br><br>
</div>

<div class="form-group">
<input type="text" name="fname" class="form-control" placeholder="Enter First Name" required value="<?php if($error) echo $fname; ?>">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span></div><br><br>


<div class="form-group">
<input type="text" name="lname" placeholder="Enter Last Name" class="form-control" ></div><br><br>

<div class="form-group">
<input type="text" name="address" placeholder="Enter Address" class="form-control"><div><br><br>
<div class="form-group">
<input type="text" name="email" placeholder="Enter Your Email" class="form-control"  required value="<?php if($error) echo $email; ?>" /><div>
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span></div><br><br>
<input type="submit" name="insert" value="Insert" class="btn btn-info btn-block" >
</form>
</div>
</body>
</html>