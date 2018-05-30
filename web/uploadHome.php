<?php
session_start();
if($_SESSION["teacherName"]=="waste")
{
echo "Page Expired";
}
else
{
echo "<br>";
echo "<br>";
//$_SESSION["subject"] = $_POST["subject"];
readfile("uploadHome.html");
}
?>


