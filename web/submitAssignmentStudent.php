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


		<form action="uploadFileStudent.php" method="post" enctype = "multipart/form-data">
		Choose Assignment Name:
		<select name= "assignmentName" >';
	
if($_SESSION["studentId"]=="waste")
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
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload File" name="submit">

</form>
</body>
</html>';
?>

