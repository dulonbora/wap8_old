<?php include '../classes/JokesAdmin.php';

$menu = new Jokes();


if(isset($_POST['NAME']))
{
$nm = $_POST['NAME']; 
$p = $_POST['PUBLISH']; 
$prntid = $_POST['PARENT']; 
$con = $_POST['CONTENT']; 
    
$menu->setHEADLINE($nm);
$menu->setCONTENT(3);
$menu->setIMG_LINK($con);
$menu->setTOTAL_VISIT(0);
$menu->setCATEGORY($p);
$menu->setPOST_BY(1);
$menu->setPOST_ON(time());
$menu->setSTATUS($prntid);
$menu->Insert();

}
?>