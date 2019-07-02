<?php
include '../classes/Create_Tables.php';
$db = new Create_Table();
$db->SyncLog();
$db->Language();
$db->Album();
$db->Artist();
$db->Category();
$db->Songs();
$db->Lyrics();
$db->BrokenLink();
$db->JOKES();
$db->VIDEOS();
$db->SongAlbum();
$db->SongArtit();
$db->COMMENT();
$db->User();
$db->UserInsertAdmin();
$db->ViewAllSongs();
$db->Request();


?>
