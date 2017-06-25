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
	
		echo("data inserted successfully");

	}
	else{
		echo ("data not inserted");
	}

}

}







?>
<html>
<head>
</head>
<body>

<form method="post" action="new.php">

<input type="text" name="rollno"  placeholder="rollno" ><br><br>



						<input type="text" name="fname" placeholder="Enter Full Name" required value="<?php if($error) echo $fname; ?>">
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span><br><br>


<input type="text" name="lname" placeholder="lname "><br><br>
<input type="text" name="address" placeholder="address"><br><br>
<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span><br><br>
<input type="submit" name="insert" value="insert">
</form>
</body>
</html>