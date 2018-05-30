<?php	
include "config.php";
$sql = "select s.subjectId,s.subjectName from subjects s, subjectTeacher st where s.subjectId = st.subjectId && st.teacherId = ".$_POST[username].";";
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     			while($row = $result->fetch_assoc())
			{
				echo '<option value='.row["s.subjectName"].' selected="selected"> Web technology </option>';

			}

		}
	
?>
