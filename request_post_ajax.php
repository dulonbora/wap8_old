<?php
include './classes/Request.php';


$__req = new Request();

$_language_id = filter_input(INPUT_POST , 'LANGUAGE_ID');
$_album_name = filter_input(INPUT_POST , 'ALBUM_NAME');
$_email = filter_input(INPUT_POST , 'EMAIL');
$_other = filter_input(INPUT_POST , 'OTHER');


$__req->setLANGUAGE_ID($_language_id);
$__req->setALBUM_NAME($_album_name);
$__req->setEMAIL($_email);
$__req->setOTHER($_other);
$__req->setSTATUS(0);

if($__req->Insert()==1){
        echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Successfully Requested ! We will email you update shortly</div>';

        echo '';
        
}

?>