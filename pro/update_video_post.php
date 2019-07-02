<?php
require_once '../classes/Videos.php';
$A = new Videos();

$ids = filter_input(INPUT_POST, 'ID');
$id = (int) $ids;
$name = filter_input(INPUT_POST, 'NAME');
$albumname = filter_input(INPUT_POST, 'ALBUM_NAME');
$link = filter_input(INPUT_POST, 'LINK');
$size = filter_input(INPUT_POST, 'SIZE');
$cat = filter_input(INPUT_POST, 'CATEGORY');
$reg = filter_input(INPUT_POST, 'REG');
$singer = filter_input(INPUT_POST, 'SINGER');
$cast = filter_input(INPUT_POST, 'CAST');
$dir = filter_input(INPUT_POST, 'DIRECTOR');
$edit = filter_input(INPUT_POST, 'EDITOR');
$oth = filter_input(INPUT_POST, 'OTHER');
$sid = filter_input(INPUT_POST, 'SONG_ID');



$A->setNAME($name);
$A->setALBUM_NAME($albumname);
$A->setLINK($link);
$A->setSIZE($size);
$A->setCATEGORY($cat);
$A->setREG($reg);
$A->setSINGER($singer);
$A->setCAST($cast);
$A->setDIRECTOR($dir);
$A->setEDITOR($edit);
$A->setOTHER($oth);
$A->setSONG_ID($sid);
if($A->Update($id)==1){
 echo "zcxcz Error Saving...";
    
    //$A->Redirect("videolist.php");
    
}
else{echo "Error Saving...";}

?>

