<?php
session_start();
include "config.php";
mkdir($_SESSION['teacherId']);
echo $_SESSION['subject'];
mkdir($_SESSION['teacherId']."/".$_SESSION['subject']);
mkdir($_SESSION['teacherId']."/".$_SESSION['subject']."/assignments");
mkdir($_SESSION['teacherId']."/".$_SESSION['subject']."/".$_POST["filename"]);
$target_dir = $_SESSION['teacherId']."/".$_SESSION['subject']."/assignments/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$newname = $_POST["filename"].".".$imageFileType; 
$target = $target_dir.$newname;

if(file_exists($target))
{
		echo "Sorry Already Exists";
		$uploadOk = 0;
}
if ($uploadOk == 0) {
	echo"</br>";
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
	$sql = "INSERT INTO `Assignments`(`AssignmentName`) VALUES ('".$newname."');";	 
	$result = $conn->query($sql);
	
	$sql = "select * from `subjects` where subjectName = '".$_SESSION['subject']."';";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();	
		$subjectId = $row["subjectId"];	

	$sql = "select * from `Assignments` where AssignmentName = '".$newname."';";
	
	$result = $conn->query($sql);		
	$row = $result->fetch_assoc();
	$AssignmentId = $row["AssignmentId"];

	$sql = "INSERT INTO `subjectAssignment`(`subjectId`, `AssignmentId`) VALUES ('".$subjectId."','".$AssignmentId."');";	 
	$result = $conn->query($sql);		
		
	echo "The file ".$newname. " has been uploaded.";

    } else {
        echo "Sorry,there was an error uploading your file.";
    }
}
?>
