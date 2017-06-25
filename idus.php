<html>

<?php
$servername="localhost";
$userrname="root";
$password="";
$dbname="idusnew";
 $rollno="";
 $fname="";
 $lname="";
 $address="";
 $email="";
 
 mysqli_report(MYSQLI_REPORT_ERROR| MYSQLI_REPORT_STRICT );

try{
	$conn=mysqli_connect($servername,$userrname,$password,$dbname);
}catch(MySQLi_sql_Exception $ex){
	echo("error in connecting");
}

function getdata()
{
	$data=array();
	$data[0]=$_POST['rollno'];
	$data[1]=$_POST['fname'];
	$data[2]=$_POST['lname'];
	$data[3]=$_POST['address'];
	$data[4]=$_POST['email'];
	return $data;

}
//search
if(isset($_POST['search']))
{
	$info=getdata();
	$search_query="SELECT * FROM idusnew WHERE rollno='$info[0]'";
	$search_result=mysqli_query($conn,$search_query);

	if($search_result )
	{
		if(mysqli_num_rows($search_result))
		{
			while($rows=mysqli_fetch_array($search_result))
			{
				$rollno=$rows['rollno'];
				$fname=$rows['fname'];
				$lname=$rows['lname'];
				$address=$rows['address'];
				$email=$rows['email'];
			}
		}else{
			echo("no data are available");
		}
	}else{
		echo("result error"); 
	}

}

?>

<head>
	</head>

<body>
<form  method="post" action="indus.php">

<input type="number" name="rollno" placeholder="rollno" value=" <?php echo("$rollno") ?>>"<br><br>
<input type="text" name="fname" placeholder="fname"><br><br>
<input type="text" name="lname" placeholder="lname"><br><br>
<input type="text" name="address" placeholder="lname"><br><br>
<input type="text" name="email" placeholder="example@"><br><br>

<div>
<input type="submit" name="insert" value="add">
<input type="submit" name="delete" value="delete">
<input type="submit" name="update" value="update">
<input type="submit" name="search" value="find ">


</div>



</form>
</body>
</html>