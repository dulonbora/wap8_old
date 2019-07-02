<?php require_once '../classes/Language.php';
$A = new Language();

$langid = filter_input(INPUT_POST, 'LANGUAGE_NAME');

$A->setLANGUAGE_NAME($langid);
$A->setIMAGE_LINK("");
$A->setDESCRIPTION('');

if($A->CheckAlreadyExit($langid)==0){if($A->Insert()==1){echo "Saved successfully.";}
else{echo "Error Saving...";}
}
 else {
    echo 'Already Exits..';    
}








?>

