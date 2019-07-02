<?php
include 'classes/Songs.php';
$songs = new Songs();
$id = 1;
if(isset($_POST['i'])){$id = $_POST['i'];}

$songs->loadvalue($id);
$tp = $songs->getTOTAL_PLAY() +1;
$songs->UpdateTotalPlay($tp, $id);
if(file_exists(str_replace('../', '', $songs->getSONG_LINK()))){
    echo "<a id='df' href='/".$songs->getSONG_LINK()."' class='btn btn-default btn-rounded btn-sm btn-block  animated fadeInUp'><i class='fa fa-music text-primary'></i> Download File</a>";
}
 else {
    echo "<div class='btn btn-danger btn-rounded btn-sm btn-block  animated fadeInUp'>Link Broken! Click To Update</div>";
}
?>
