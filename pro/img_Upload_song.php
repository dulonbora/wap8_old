<?php
include "../classes/songsclass.php";
$albums = new Songs();
$image_path = "watermark.png";

function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

function watermark_image($oldimage_name, $new_image_name, $width, $height){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
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

$id = $_POST['ID'];

if(isset($_FILES['IMAGE_LINK'])){
$file_name=$_FILES["IMAGE_LINK"]["name"];
$temp_name=$_FILES["IMAGE_LINK"]["tmp_name"];
$imgtype=$_FILES["IMAGE_LINK"]["type"];
$ext= GetImageExtension($imgtype);
$imagename = time().$ext;
$target_path = "../image/".$imagename;
if(move_uploaded_file($temp_name, $target_path)) {
$new_name = $target_path;
if(watermark_image($target_path, $new_name, 400, 400))
$target_path = $new_name;
$albums->UpdateSingle("IMAGE_LINK", $id, $imagename);
$albums->Redirect("artistlist.php");
}
}

?>
