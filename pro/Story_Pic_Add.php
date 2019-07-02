<?php include '../classes/StoryPic.php';
$__sto = new StoryPic();

$_story_id = filter_input(INPUT_POST , 'STORY_ID');
$_caption = filter_input(INPUT_POST , 'CAPTION');
$_image_link = filter_input(INPUT_POST , 'IMAGE_LINK');
$_submitted_by = filter_input(INPUT_POST , 'SUBMITTED_BY');


$__sto->setSTORY_ID($_story_id);
$__sto->setCAPTION($_caption);
$__sto->setIMAGE_LINK($_image_link);
$__sto->setSUBMITTED_BY($_submitted_by);

if($__sto->Insert()==1){echo 'Success';}

?>