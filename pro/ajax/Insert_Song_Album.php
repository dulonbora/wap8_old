<?php
require_once '../../classes/SongAlbum.php';
$A = new SongAlbum();

$songid = filter_input(INPUT_POST, 'ALBUM_ID');

$albumid = filter_input(INPUT_POST, 'SONG_ID');


$A->setALBUM_ID($albumid);
$A->setSONG_ID($songid);
if($A->CheckAlreadyExit($songid, $albumid)==0){
    if($A->Insert()==1){echo "Saved successfully.";}
else{echo "Error Saving...";}
}
 else {
    echo 'Already Exits..';    
}








?>

