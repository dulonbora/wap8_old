<?php 

$path = "-1";
if (isset($_GET['l'])){$path = $_GET['l'];}
$file = "../Assamese_Songs/".$path;
if(delTree($file)){
    pageRedirect("SongDir.php");}

    function delTree($dir)
    { 
        $files = array_diff(scandir($dir), array('.', '..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    } 
    
    
function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}
?>