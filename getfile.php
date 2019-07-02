<?php
include 'classes/Songs.php';
$songs = new Songs();
$id = 1;
if(isset($_GET['i'])){$id = $_GET['i'];}

$songs->loadvalue($id);

    $fileName = basename($songs->getSONG_NAME());
    $filePath = $songs->getSONG_LINK();
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
