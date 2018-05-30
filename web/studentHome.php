<?php 
session_start();
if($_SESSION["studentId"]=="waste")
{
echo "Page Expired";
}
else
{
echo "Welcome ".$_SESSION["studentId"];
readFile("homeStudent.html");
include "openStudent.php";
readFile("home2Student.html");

}
?>





