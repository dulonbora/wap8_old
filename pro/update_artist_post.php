<?php require_once '../classes/ArtistAdmin.php';
$A = new Artist();

$artname = filter_input(INPUT_POST, 'ARTIST_NAME');
$bno = filter_input(INPUT_POST, 'BORN_ON');
$d = filter_input(INPUT_POST, 'DESCRIPTION');
$id = filter_input(INPUT_POST, 'ID');

$A->setARTIST_NAME($artname);
$A->setBORN_ON($bno);
$A->setDESCRIPTION($d);
if($A->Update($id)==1){echo 'Successfullly Updated! Refresh To See The Effict';}else {echo 'Not Updated';}
?>