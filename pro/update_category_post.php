<?php include '../classes/categoryAdmin.php';

$cat = new Category();




if(isset($_POST['CATEGORY_NAME']))
{

$cn = $_POST['CATEGORY_NAME']; 
$d = $_POST['DESCRIPTION']; 
$t = $_POST['TYPE']; 
$l = $_POST['LANG']; 
$id = $_POST['ID'];




$cat->setCATEGORY_NAME($cn);
$cat->setDESCRIPTION($d);
$cat->setTYPE($t);
$cat->setLANGUAGE_ID($l);
if($cat->Update($id)==1){
        echo 'Update Successfull';}else {
    echo 'Error';
}

}
?>