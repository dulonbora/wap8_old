<?php
$id = filter_input(INPUT_POST, 'id');
require_once '../../classes/Search.php';
$search = new Search();
echo $search->ArtistBySongsList($id); ?>