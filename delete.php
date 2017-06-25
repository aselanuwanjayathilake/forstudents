<?php



$error=false;

if(isset($_POST['delete']))
{
	$rollno=$_POST['rollno'];
 

	if(empty($rollno))
	{
		
		$error=true;
		$name_error = "Please enter a roll number";
	}



if (!$error) {
	
	$servername="localhost";
$username="root";
$password="";
$dbname="new";




	$conn=mysqli_connect($servername,$username,$password,$dbname);


	$delete_query="DELETE FROM new WHERE rollno='$rollno' ";

	$delete_result=mysqli_query($conn, $delete_query);

if($delete_result)
{
	
		echo "<script>alert('SUCCESSFULLY DELETED')</script>";

	}
	else{
		echo ("data not deleted");
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
<form method="post" action="delete.php">
<div class="form-group">
<input type="text" name="rollno" class="form-control"  placeholder="Enter Roll Number" required value="<?php if($error) echo $rollno; ?>">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span></div>
<input type="submit" name="delete" value="Delete" class="btn btn-info btn-block">
</form>
</div>
</body>
</html>