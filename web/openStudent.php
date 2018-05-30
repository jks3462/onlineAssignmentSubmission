<?php	
session_start();
include "config.php";
$substring = substr($_SESSION["studentId"],0,5);
$sql = 'select s.subjectId idSubject,s.subjectName nameSubject from subjects s, subjectStudent st where s.subjectId = st.subjectId && st.studentId = "'.$substring.'";';
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     			while($row = $result->fetch_assoc())
			{

				echo '<option value= "'.$row["nameSubject"].'" > '.$row["nameSubject"].' </option>';

			}

		}
	
?>	
