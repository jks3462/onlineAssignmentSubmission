<?php 
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$a = $_POST["nameC"];
	$b = $_POST["passwordC"];
	$new = $_POST["newPassword"];
	$newC = $_POST["newCPassword"];
  if($new == $newC)
  {  
	$sql3 = "SELECT * FROM teachers";
	$result = $conn->query($sql3);
	$signal = 0;
	if ($result->num_rows > 0) 
	{
     		while($row = $result->fetch_assoc())
		{
		
			if($row["teacherId"]==$a && $row["password"]==$b)
			{
			$sql3 = "update teachers set password = '$new' where teacherId = '$a'";
				if( $conn->query($sql3))
				{
				echo "<script type='text/javascript'>";
				echo 'alert("Change Successful")';
				echo "</script>";
				$_POST = array();
				include 'checkLogin.php';
				die();
				}
				else
				{
				echo "<script type='text/javascript'>";
				echo 'alert("Some Error occurred")';
				echo "</script>";
				}	
			$signal = 1;
			break;
			}

		}

	}	
	if($signal == 0 )
	{
			echo "<script type='text/javascript'>";
			echo 'alert("Wrong ID/Password")';
			echo "</script>";
	}

   }
   else
   {
			echo "<script type='text/javascript'>";
			echo 'alert("NEW PASSWORD DON\'T MATCH")';
			echo "</script>";		
   }
}
?>
<!DOCTYPE html>
<html>
<head><title>RESET PASSWORD</title>
<link rel="stylesheet" href="stylenewjava.css" />
</head>
<body>
<form action  = "changePassword.php" method = "post">
<b>RESET PASSWORD</b><br/><br/><br/>
<p>USERNAME:<input type="text"name="nameC"/></p>
<p>OLD PASSWORD:<input type="password"name="passwordC"/></p>
<p>NEW PASSWORD:<input type="password"name="newPassword"/></p>
<p>CONFIRM PASSWORD:<input type="password"name="newCPassword"/></p>
<p><input type="submit"value="CHANGE"/></p>
</form>


</body>
</html>
