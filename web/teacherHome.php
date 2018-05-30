<?php 
session_start();
if($_SESSION["teacherName"]=="waste")
{
echo "Page Expired";
}
else
{
echo "Welcome ".$_SESSION["teacherName"];
readFile("home.html");
include "open.php";
readFile("home2.html");

}
?>





