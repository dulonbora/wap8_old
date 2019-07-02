<?php include '../classes/categoryAdmin.php';

$cat = new Category();




if(isset($_POST['CATEGORY_NAME']))
{

$cn = $_POST['CATEGORY_NAME']; 
$d = $_POST['DESCRIPTION']; 
$t = $_POST['TYPE']; 
$l = $_POST['LANG']; 



$cat->setCATEGORY_NAME($cn);
$cat->setDESCRIPTION($d);
$cat->setTYPE($t);
$cat->setIMAGE_LINK("");
$cat->setLANGUAGE_ID($l);
if($cat->Insert()==1){
        echo 'Insert Successfull';}else {
    echo 'Error';
}

}
?>