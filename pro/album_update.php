<?php
require_once '../classes/AlbumsAdmin.php';
$A = new Albums();

$ids = filter_input(INPUT_POST, 'ID');
$id = (int) $ids;
$an = filter_input(INPUT_POST, 'ALBUM_NAME');
$y = filter_input(INPUT_POST, 'YEAR');
$b = filter_input(INPUT_POST, 'BITRATE');
$c = filter_input(INPUT_POST, 'CATEGORY');
$lng = filter_input(INPUT_POST, 'LANGGUAGE');
$m = filter_input(INPUT_POST, 'MUSIC');
$cov = filter_input(INPUT_POST, 'COVER');
$p = filter_input(INPUT_POST, 'PRODUCTION');
$lbl = filter_input(INPUT_POST, 'LABEL');
$stu = filter_input(INPUT_POST, 'STATUS');
$new = filter_input(INPUT_POST, 'NEW');
$des = filter_input(INPUT_POST, 'DESCRIPTION');


$A->setALBUM_NAME($an);
$A->setBITRATE($b);
$A->setCATEGORY_ID($c);
$A->setCOVER($cov);
$A->setLABEL($lbl);
$A->setLANGUAGE_ID($lng);
$A->setMUSIC($m);
$A->setPRODUCTION($p);
$A->setSTATUS($stu);
$A->setYEARS($y);
$A->setNEWOLD($new);
$A->setDESCRIPTION($des);
$A->setID($id);
if($A->Update($id)==1){$A->Redirect("songbyalbum.php?i=".$id);}
else{echo "Error Saving...";}
?>

