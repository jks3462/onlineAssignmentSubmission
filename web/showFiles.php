<html>
<head>
</head>
<body>

<?php
session_start();
include "config.php";
$sql = 'SELECT * FROM `subjectTeacher` st,`subjectAssignment` sa,`Assignments` a,`subjects` s where a.AssignmentId = sa.AssignmentId and sa.subjectId = st.subjectId and st.TeacherId = "'.$_SESSION['teacherId'].'" and s.subjectName = "'.$_SESSION['subject'].'" and s.subjectId = st.subjectId ;';
$dir = $_SESSION['teacherId']."/".$_SESSION['subject']."/assignments";
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     	while($row = $result->fetch_assoc())
			{
echo '<a href = "'.$dir."/".$row["AssignmentName"].'" target = "_blank">'.$row["AssignmentName"].'</a></br>';
			}
		}
/*if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
	if($file!="." && $file!="..")
            echo $file."<br />";
        }
        closedir($dh);
    }
}*/
?>

</body>
</html>
