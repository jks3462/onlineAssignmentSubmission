<?php	
session_start();
include "config.php";
echo $_SESSION['subject'];
echo "<br><br>";
$substring = substr($_SESSION["studentId"],0,5);
$sql = 'SELECT * FROM `subjectStudent` ss,`subjectTeacher` st,`subjects` s where st.subjectId = ss.subjectId and s.subjectId = ss.subjectId and ss.studentId = "'.$substring.'" and s.subjectName ="'.$_SESSION['subject'].'";';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['teacherId'] = $row['teacherId'];
$dir = $_SESSION['teacherId']."/".$_SESSION['subject']."/assignments";
//echo $dir;
$sql = 'SELECT * FROM `subjectStudent` ss,`subjectAssignment` sa,`Assignments` a,`subjects` s where a.AssignmentId = sa.AssignmentId and sa.subjectId = ss.subjectId and s.subjectId = ss.subjectId and ss.studentId = "'.$substring.'" and s.subjectName ="'.$_SESSION['subject'].'";';
//$sql = 'select t.teacherId idTeacher from teachers t , subjectTeacher st ,subjects s where st.teacherId = t.teacherId && s.subjectName = "'.
//$_SESSION["subject"].'" && s.subjectId = st.subjectId;';
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
     	while($row = $result->fetch_assoc())
			{
echo '<a href = "'.$dir."/".$row["AssignmentName"].'" target = "_blank">'.$row["AssignmentName"].'</a></br>';
			}
		}


$dir = $_SESSION['teacherId']."/".$_SESSION['subject']."/assignments";
//if (is_dir($dir)) {
  //  if ($dh = opendir($dir)) {
    //    while (($file = readdir($dh)) !== false) {
	//if($file!="." && $file!="..")
          //  echo $file."<br />";
        //}
        //closedir($dh);
    //}
//}
?>
	
