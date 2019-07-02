<?php require_once '../classes/AlbumsAdmin.php';
$A = new Albums();

$lgid = filter_input(INPUT_POST, 'LANGUAGE_ID');
$alname = filter_input(INPUT_POST, 'ALBUM_NAME');
$yr = filter_input(INPUT_POST, 'YEAR');
$cid = filter_input(INPUT_POST, 'CATEGORY_ID');
$new = filter_input(INPUT_POST, 'NEWOLD');

$A->setLANGUAGE_ID($lgid);
$A->setALBUM_NAME($alname);
$A->setYEARS($yr);
$A->setDESCRIPTION("");
$A->setCATEGORY_ID($cid);
$A->setMUSIC("");
$A->setCOVER("");
$A->setNEWOLD($new);
$A->setSTATUS(1);
$A->setART_LINK("NoImage.jpg");
$A->setBITRATE("");
$A->setLABEL("");
$A->setTOTAL_VIEW(1);
$A->setCREATE_ON(time());

if($A->CheckAlreadyExit($alname)==0){if($A->Insert()==1){echo "Saved successfully.";}
else{echo "Error Saving...";}
}
 else {
    echo 'Already Exits..';    
}








?>

