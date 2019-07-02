<?php
$path1 = filter_input(INPUT_POST, 'i');

$path = $path."/";

 
 //Checking the request 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting the file 
 $file = $_FILES['file']['tmp_name'];
 
 //Getting the name of the file 
 $name = $_FILES['file']['name'];
  
 //Storing the file to location
 move_uploaded_file($file,$path.$name);
 
 //displaying success message 
 echo $path.$name;
 }
?>
