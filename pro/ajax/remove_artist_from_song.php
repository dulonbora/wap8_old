<?php
require_once '../../classes/SongArtist.php';
$A = new SongArtist();
$sid = filter_input(INPUT_POST, 'SONG_ID');
$aid = filter_input(INPUT_POST, 'ARTIST_ID');
if($A->Remove($sid, $aid)!=0){echo "Removed successfully.";}
else{echo "Error...";}
?>

