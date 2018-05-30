<?php 
session_start();
include "config.php";
$_SESSION["teacherName"] = "waste";
$_SESSION["studentId"] = "waste";
$signal = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	
	$a = $_POST["username"];
	$b = $_POST["password"];
	$sql3 = "SELECT * FROM teachers";
	$result = $conn->query($sql3);
		
		if ($result->num_rows > 0) 
		{
			
     			while($row = $result->fetch_assoc())
			{
			
			if($row["teacherId"]==$a && $row["password"]==$b)
				{			
			echo "<script type='text/javascript'>";
			echo 'alert("LOGIN SUCCESSFUL")';
			echo "</script>";
			$_SESSION["teacherName"] = $row["teacherName"];
			
			$_SESSION["teacherId"] = $row["teacherId"];
			
			$_SESSION["teacherPassword"] = $row["password"];
			
			header("Location: teacherHome.php?id=''");
			$signal = 1;
			break;
				}

			}
		
}
if($signal == 0)
{
	$sql3 = "SELECT * FROM students";
	$result = $conn->query($sql3);
		
		if ($result->num_rows > 0) 
		{
			
     			while($row = $result->fetch_assoc())
			{
			
			if($row["studentId"]==$a && $row["password"]==$b)
				{			
			echo "<script type='text/javascript'>";
			echo 'alert("LOGIN SUCCESSFUL")';
			echo "</script>";
			
			$_SESSION["studentId"] = $row["studentId"];
			
			$_SESSION["studentPassword"] = $row["password"];
			
			header("Location: studentHome.php?id=''");
			$signal = 1;
			break;
				}

			}
		
		}
	
}	
if($signal == 0)
	{
			echo "<script type='text/javascript'>";
			echo 'alert("LOGIN FAILED")';		
			echo "</script>";
			header("Location: checkLogin.php?id=''");
	}
}

?>





<html>
<head><title>ONLINE ASSIGNMENT SUBMISSION</title>
<link rel="stylesheet" href="stylenewjava.css" />
</head>
<body>
<form action ="checkLogin.php" method="post">
<p id="demo"><b>LOGIN PAGE</b></p><br/><br/><br/><br/>
<p>USERNAME:<input type="text"name="username"/></p>

<p>PASSWORD:<input type="password"name="password"/></p>
<a href="changePassword.php">Change password</a><br/> 
<p ><input type="submit"value="login"/></p>

</form>
</body>
</html>
