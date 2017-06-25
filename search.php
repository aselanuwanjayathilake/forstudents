<?php

	
$error=false;

if(isset($_POST['search']))
{   
	//if (empty($rollno)) {
	//	$error=true;
		//echo"error";
	//}
	if (!$error) {
		
	$servername="localhost";
$username="root";
$password="";
$dbname="new";

$rollno=$_POST['rollno'];



	$conn=mysqli_connect($servername,$username,$password,$dbname);


	 $search_query="SELECT * FROM new WHERE rollno='$rollno' ";
	 $search_result=mysqli_query($conn,$search_query);
   
	 if($search_result)
	 {
	 	
	 	
	 		while($rows=mysqli_fetch_array($search_result))
	 		{
	 			$rollno=$rows['rollno'];
	 			$fname=$rows['fname'];
	 			$lname=$rows['lname'];
	 			$address=$rows['address'];
	 			$email=$rows['email'];
	 			
	 		} 
	 	
	 } else{
	 	echo("result error");
	 }
}
}



?>
<html>
<head>
</head>
<body>

<form method="post" action="search.php">

<input type="text" name="rollno"  placeholder="rollno" value=<?php if (isset($rollno)) { echo($rollno);} ?>  ><br><br>


<input type="text" name="fname" placeholder="Enter Full Name" value= <?php if (isset($fname)) { echo($fname);}  ?>  ><br><br> 

<input type="text" name="lname" placeholder="lname " value=<?php if (isset($lname)) { echo($lname);} ?>  ><br><br>

<input type="text" name="address" placeholder="address" value=<?php if (isset($address)) { echo($address);} ?>  ><br><br>

<input type="text" name="email" placeholder="Email" value=<?php if (isset($email)) { echo($email);} ?> ><br><br>
						
<input type="submit" name="search" value="search" ><br><br>
</form>
</body>
</html>