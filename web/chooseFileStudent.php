<?php
session_start();

$_SESSION['subject'] = $_POST["subject"];
if ($_POST['action'] == 'View Assignments') 
{
  header("Location: showFilesStudent.php?id=''");
} 

if ($_POST['action'] == 'Submit Assignment') 
{
  header("Location: submitAssignmentStudent.php?id=''");
} 
/*
else if ($_POST['action'] == 'Delete Assignment') {
}
else if ($_POST['action'] == 'View Assignment') {
 header("Location: showFiles.php?id=''");
} 
else {
    echo "invalid action!";
}
*/
?>
