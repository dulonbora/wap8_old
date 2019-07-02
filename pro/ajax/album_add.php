<?php include '../../classes/Albums.php';

$albums = new Albums();




if(isset($_POST['NAME']))
{

$nm = $_POST['NAME']; 
$ip = $_POST['PAGE']; 
$in = $_POST['NAVBAR']; 
$p = $_POST['PUBLISH']; 
$prntid = $_POST['PARENT']; 
$sub = $_POST['SUBMENU']; 



$menu->setNAME($nm);
$menu->setIS_PAGE($ip);
$menu->setIN_NAVBAR($in);
$menu->setPUBLISH($p);
$menu->setPOST_BY("");
$menu->setUPDATE_BY("");
$menu->setPERANT_ID($prntid);
$menu->setSERIAL_NO(1);
$menu->setSUBMENU($sub);
$menu->AddMenu();

}
?>