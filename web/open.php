<?php	
session_start();
include "config.php";
$sql = 'select s.subjectId idSubject,s.subjectName nameSubject from subjects s, subjectTeacher st where s.subjectId = st.subjectId && st.teacherId = "'.$_SESSION["teacherId"].'";';
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     			while($row = $result->fetch_assoc())
			{

				echo '<option value= "'.$row["nameSubject"].'" > '.$row["nameSubject"].' </option>';

			}

		}
	
?>	
