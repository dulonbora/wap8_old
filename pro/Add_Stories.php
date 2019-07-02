<?php include '../classes/Story.php';
$__sto = new Story();

$_name = filter_input(INPUT_POST , 'NAME');
$_describtion = filter_input(INPUT_POST , 'DESCRIBTION');
$_category_id = filter_input(INPUT_POST , 'CATEGORY_ID');
$_image_link = filter_input(INPUT_POST , 'IMAGE_LINK');
$_submitted_by = filter_input(INPUT_POST , 'SUBMITTED_BY');


$__sto->setNAME($_name);
$__sto->setDESCRIBTION($_describtion);
$__sto->setCATEGORY_ID($_category_id);
$__sto->setIMAGE_LINK($_image_link);
$__sto->setSUBMITTED_BY($_submitted_by);

if($__sto->Insert()==1){$response['SUCCESS'] = 1;}
    
    ?>