<?php
//ob_start();

include "../../classes/Images.php";
include "../../classes/Menu.php";
$images = new Images();
$menu = new Menu();
//session_start();
$image_path = "watermark.png";

function watermark_image($oldimage_name, $new_image_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = 800;
    $height = 540;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width; 
    $pos_y = $height - $w_height;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100);
    return true;
}

$Caption = $_POST['IMG_CAPTION'];
$Cate = $_POST['CATEGORY_ID'];
$POSTID = $_POST['POST_ID'];
$PostBy = "1";
//$Access = $_SESSION['ACCESS'];

if(isset($_FILES['IMAGE_LINK'])){
$file_name=$_FILES["IMAGE_LINK"]["name"];
$temp_name=$_FILES["IMAGE_LINK"]["tmp_name"];
$imgtype=$_FILES["IMAGE_LINK"]["type"];
$ext= $images->GetImageExtension($imgtype);
$imagename = time().$ext;
$target_path = "../../Images/".$imagename;
if(move_uploaded_file($temp_name, $target_path)) {
$new_name = $target_path;
if(watermark_image($target_path, $new_name))
$target_path = $new_name;
$images->setIMAGE_LINK($imagename);
$images->setCATEGORY_ID($Cate);
$images->setIMG_CAPTION($Caption);
$images->setPOST_BY($PostBy);
$images->InsertPhoto();
$menu->setIMAGE_ID($images->getLastId());
$menu->UpdateImage($POSTID);
$menu->pageRedirect("Post_View.php?i=".$POSTID);

}
}

?>
