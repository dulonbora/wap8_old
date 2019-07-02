<?php

include '../classes/Location.php';
$location = new Location();

$response = array();
$response['SUCCESS'] = 0;

$response['CONTENTS'] = array();
$Edict = array();

$id = filter_input(INPUT_GET, 'ID');

$response['SUCCESS'] = 0;

if ($location->LoadValue($id) == 1) {
    $Edict['ID'] = $location->getID();
    $Edict['P_ID'] = $location->getP_ID();
    $Edict['LOCATION'] = $location->getLOCATION();
    $Edict['TYPE'] = $location->getTYPE();
    array_push($response['CONTENTS'], $Edict);
    $response["SUCCESS"] = $res; // Member Found    
}

echo json_encode($response);
exit();
?>
