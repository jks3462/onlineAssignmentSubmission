<?php
session_start();
include "config.php";
echo $_SESSION['subject'];
echo "</br>";

$keywords = preg_split("/\./",$_POST['assignmentName']);
$length = count($keywords);
$length = $length-1;
$lastLength = strlen($keywords[$length]);
$lastLength = $lastLength+1;
$lastLength = -1*$lastLength;

$substring = substr($_SESSION["studentId"],0,5);
$sql = 'SELECT * FROM `subjectStudent` ss,`subjectTeacher` st,`subjects` s where st.subjectId = ss.subjectId and s.subjectId = ss.subjectId and ss.studentId = "'.$substring.'" and s.subjectName ="'.$_SESSION['subject'].'";';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['teacherId'] = $row['teacherId'];
$folderName = substr($_POST['assignmentName'],0,$lastLength);
$sql = "select * from teachers t, subjectTeacher st,subjects s where s.subjectName = '".$_SESSION['subject']."' and s.subjectId = st.subjectId and st.teacherId = t.teacherId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$target_dir = $row['teacherId']."/".$_SESSION['subject']."/".$folderName."/";
echo "</br>".$target_dir;
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $imageFileType."hello";
$newname = $_SESSION["studentId"].".".$imageFileType; 
$target = $target_dir.$newname;
echo $target;
if(file_exists($target))
{
		echo "Overwritting Earlier Assingment";
}
if ($uploadOk == 0) {
	echo"</br>";
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	}
	 else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
	echo "The file ".$newname. " has been uploaded.";

    } else {
        echo "Sorry,there was an error uploading your file.";
    }
}
?>
