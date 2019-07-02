<?php
include '../classes/AlbumsAdmin.php';
include '../classes/songsclass.php';
$id = $_POST['i'];
$songs = new Songs();
$menu = new Albums();
if($menu->Remove($id)==1){
    if($songs->RemoveByAlbum($id)==1){
        echo 'Success';
    }
}
?>
