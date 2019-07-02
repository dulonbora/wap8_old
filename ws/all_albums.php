<?php
require_once '../classes/Albums.php';
$Albums = new Albums();

$response = array();
$TotalRow = $Albums->getTotal();

$limit = 20;
$TotalPage = ceil($TotalRow/$limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;


$Result = $Albums->RandomAlbum($start, $limit);
if($Result>0)
{

$response['CONTENTS'] = array();

$Edict= array();
foreach ($Result as $rows){
                                
$Edict['ID']        = $rows['ID'];
$Edict['ALBUM_NAME']        = $rows['ALBUM_NAME'];
$Edict['ART_LINK']        = $rows['ART_LINK'];
array_push($response['CONTENTS'], $Edict);

}

$response["SUCCESS"] = 1; // echoing JSON response
echo json_encode($response);}

else{
$response["SUCCESS"] = 0;
$response['CONTENTS'] = "Id not found.";
echo json_encode($response);
}





?>