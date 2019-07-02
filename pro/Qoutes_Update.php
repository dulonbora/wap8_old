<?php


$__qou = new Qoutes();

$_quotes = filter_input(INPUT_POST , 'QUOTES');
$_written_by = filter_input(INPUT_POST , 'WRITTEN_BY');
$_category_id = filter_input(INPUT_POST , 'CATEGORY_ID');
$_submitted_by = filter_input(INPUT_POST , 'SUBMITTED_BY');
$_id = filter_input(INPUT_POST , 'ID');


$__qou->setQUOTES($_quotes);
$__qou->setWRITTEN_BY($_written_by);
$__qou->setCATEGORY_ID($_category_id);
$__qou->setSUBMITTED_BY($_submitted_by);
$__qou->setID($_id);

if($__qou->Update($_id)==1){$response['SUCCESS'] = 1;}
?>