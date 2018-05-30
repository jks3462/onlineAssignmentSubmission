<?php
session_start();
include "config.php";
echo $_SESSION["subject"];
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title> page_2</title>
	<link rel="stylesheet" href="page_1.css" />
</head>	
<body>
<h1> Online Assignment Submission </h1><br/><br/>


		<form action="downloadTeacher.php" method="post" enctype = "multipart/form-data">
		Choose Assignment Name:
		<select name= "AssignmentName" >';
	
if($_SESSION["teacherId"]=="waste")
{
echo "Page Expired";
}
else
{
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
$sql = 'select * from subjectAssignment sa ,subjects s,Assignments a where s.subjectName = "'.$_SESSION['subject'].'" && s.subjectId = sa.subjectId  && a.AssignmentId = sa.AssignmentId ;';
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     			while($row = $result->fetch_assoc())
			{
				echo '<option value= "'.$row["AssignmentName"].'" > '.$row["AssignmentName"].' </option>';
			}

		}
		
}
echo '</select><br/><br/> 			
		<br/>
		<input type="submit" value="Download Zip" name="submit">

</form>
</body>
</html>';
?>

