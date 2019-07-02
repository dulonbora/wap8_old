<?php

$__qou = new Qoutes();

$_quotes = filter_input(INPUT_POST , 'QUOTES');
$_written_by = filter_input(INPUT_POST , 'WRITTEN_BY');
$_category_id = filter_input(INPUT_POST , 'CATEGORY_ID');
$_image_link = filter_input(INPUT_POST , 'IMAGE_LINK');
$_submitted_by = filter_input(INPUT_POST , 'SUBMITTED_BY');


$__qou->setQUOTES($_quotes);
$__qou->setWRITTEN_BY($_written_by);
$__qou->setCATEGORY_ID($_category_id);
$__qou->setIMAGE_LINK($_image_link);
$__qou->setSUBMITTED_BY($_submitted_by);

if($__qou->Insert()==1){$response['SUCCESS'] = 1;}

?>