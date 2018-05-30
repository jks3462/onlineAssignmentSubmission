<?php
session_start();
include "config.php";
$_SESSION["AssignmentName"] = $_POST["AssignmentName"];
echo $_SESSION["AssignmentName"]."</br>".$_SESSION["subject"];
$keywords = preg_split("/\./",$_POST['AssignmentName']);
$length = count($keywords);
$length = $length-1;
$lastLength = strlen($keywords[$length]);
$lastLength = $lastLength+1;
$lastLength = -1*$lastLength;
$folderName = substr($_POST['AssignmentName'],0,$lastLength);
$dir = $_SESSION['teacherId']."/".$_SESSION['subject']."/".$folderName;
echo $dir;
/*    $zipname = $folderName.'.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    if ($handle = opendir($dir)) {
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && !strstr($entry,'.php')) {
		echo "yes</br>";
            $zip->addFile($entry);
        }
      }
      closedir($handle);
    }

    $zip->close();
*/

$rootPath = realpath($dir);
// Initialize archive object
$zip = new ZipArchive();
$zip->open($folderName.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();

    header('Content-Type: application/zip');
    header("Content-Disposition: attachment; filename='".$folderName.".zip'");
  header('Content-Length: '.filesize($zipname));
   header("Location: ".$folderName.".zip");
?>
