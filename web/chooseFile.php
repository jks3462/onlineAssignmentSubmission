<?php
session_start();
$_SESSION['subject'] = $_POST["subject"];
if ($_POST['action'] == 'Give Assignment') {
  header("Location: uploadHome.php?id=''");
} else if ($_POST['action'] == 'Download Submissions') {
  header("Location: downloadSub.php?id=''"); 
}else if ($_POST['action'] == 'View Assignment') {
 header("Location: showFiles.php?id=''");
} else {
    echo "invalid action!";
}
?>
