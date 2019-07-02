<?php
require_once '../../classes/SongAlbum.php';
$A = new SongAlbum();
$sid = filter_input(INPUT_POST, 'SONG_ID');
$aid = filter_input(INPUT_POST, 'ALBUM_ID');
if($A->Remove($aid, $sid)!=0){echo "Removed successfully.";}
else{echo "Error...";}
?>

