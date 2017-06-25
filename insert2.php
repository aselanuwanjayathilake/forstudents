<?php



$error=false;

if(isset($_POST['insert']))
{
	if(isset($_POST['g']))
	 {$gender=$_POST['g'];}
	$name=$_POST['name'];
 $age=$_POST['age'];
 
 $pass=$_POST['pass'];
 $cpass=$_POST['cpass'];


	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}

	 if (isset($_POST['g'])) {

        echo 'A radio button was selected.<br>';

        if ($_POST['g'] === 'M') {

          echo 'And the user agreed.';

        } else if ($_POST['F'] === 'dont_agree') {

          echo 'But the user didn\'t agreed.';

        }

      } else {

       echo 'No radio buttons were selected.';

     }


	

if (!$error) {

	$servername="localhost";
$username="root";
$password="";
$dbname="test";




	$conn=mysqli_connect($servername,$username,$password,$dbname);
	


	$insert_query="INSERT INTO test( name,age, gender, pass, cpass) VALUES ('$name','$age','$gender','$pass','$cpass') ";


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
    <title>thenewboston</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
<form action="" method="post">
<input type="text" name="name"><br><br>
<input type="text" name="age"><br><br>
<input type="radio" name="g" value="M">Male
<input type="radio" name="g" value="F">FeMale<br><br>
<input type="password" name="pass"><br><br>
<input type="password" name="cpass"><br><br>
<input type="submit" name="insert" value="insert">


</form>
</body>












</html>