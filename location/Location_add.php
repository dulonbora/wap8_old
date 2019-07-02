<?php

include '../classes/Location.php';
$response = array(); 
$response['SUCCESS'] = 0;

$__loc = new Location();

$_p_id = filter_input(INPUT_POST , 'P_ID');
$_location = filter_input(INPUT_POST , 'LOCATION');
$_type = filter_input(INPUT_POST , 'TYPE');


$__loc->setP_ID($_p_id);
$__loc->setLOCATION($_location);
$__loc->setTYPE($_type);

if($__loc->checkLocation($_location, $_type)==0){
    
    if($__loc->Insert()==1){$response['SUCCESS'] = 1;}
    else {$response['SUCCESS'] = 0;}
    
}
 else {$response['SUCCESS'] = 0;}


echo json_encode($response);
exit();

?>