<?php
require_once '../../classes/SongArtist.php';
$A = new SongArtist();

$artist = filter_input(INPUT_POST, 'ARTIST_ID');

$sid = filter_input(INPUT_POST, 'SONG_ID');


$A->setARTIST_ID($artist);
$A->setSONG_ID($sid);
$A->setTYPE(0);
if($A->CheckAlreadyExit($sid, $artist)==0){
    if($A->Insert()==1){echo "Saved successfully.";}
else{echo "Error Saving...";}
}
 else {
    echo 'Already Exits..';    
}








?>

