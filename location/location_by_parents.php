<?php

require_once('../classes/Location.php');
$location = new Location();

$id = filter_input(INPUT_GET, 'ID');
$response = array();
$TotalRow = $location->getTotal($id);

$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {
    $page == 0;
}

$start = ($page - 1) * $limit;
$Result = $location->GetParentLocation($id, $start, $limit);

if ($Result > 0) {
    $response['CONTENTS'] = array();
    $Edict = array();
    
    foreach ($Result as $rows) {
        $Edict['ID'] = $rows['ID'];
        $Edict['P_ID'] = $rows['P_ID'];
        $Edict['LOCATION'] = $rows['LOCATION'];
        $Edict['TYPE'] = $rows['TYPE'];

        array_push($response['CONTENTS'], $Edict);
    }
    
    $response["SUCCESS"] = 1; // echoing JSON response
    echo json_encode($response);
} else {
    $response["SUCCESS"] = 0;
    $response['CONTENTS'] = "Id not found.";
    echo json_encode($response);
}

?>