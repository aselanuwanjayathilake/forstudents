<?php

$error=false;

 if(isset($_POST['delete']))
 {
 	$id=$_POST['id'];


 	if(empty($id))
	{
		
		$error=true;
		 echo"Please enter a roll number";
	}

if (!$error) 
{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="my";

	$conn=mysqli_connect("$servername","$username","$password","$dbname");

	$delete_query="DELETE FROM my WHERE id='$id' LIMIT 1 ";

	$delete_result=mysqli_query($conn,$delete_query);

	if($delete_result)
	{
		echo "<script>alert('Deleted Successfully')</script>";
	}
	else{
		echo "Error in Delete";
	}

}

 }

?>

<html>
<head>
    <title>thenewboston</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<form  action="delete3.php" method="post" >

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">THENEWBOSTON</a>
        </div>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

    </div>
</nav>



<input type="text" name="id" placeholder="Enter Id To Delete"><br>

<input type="submit" name="delete" value="Delete">

</form>
</body>
</html>