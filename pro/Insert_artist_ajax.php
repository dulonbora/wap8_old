<?php require_once '../classes/ArtistAdmin.php';
$A = new Artist();

$artname = filter_input(INPUT_POST, 'ARTIST_NAME');
$bno = filter_input(INPUT_POST, 'BORN_ON');
$d = filter_input(INPUT_POST, 'DESCRIPTION');

$A->setARTIST_NAME($artname);
$A->setBORN_ON($bno);
$A->setDESCRIPTION($d);
$A->setIMAGE_LINK("");


if($A->CheckAlreadyExit($artname)==0){if($A->Insert()==1){echo "Saved successfully.";}
else{echo "Error Saving...";}
}
 else {
    echo 'Already Exits..';    
}








?>

