
<!DOCTYPE html>

<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>Musik | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<?php include '../classes/UI.php';
include '../classes/NavBar.php'; 
$UI = new UI;
$N = new NavBar;
?>







<body class="">
    <section class="vbox">
        <?php echo $UI->Work("VIDEO"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                        <?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                           
                            <div class="row">
                                 
                                    
    <div class="wrapper">
        <div class="row">
        <div class="col-sm-6">
            <?php

$id = "-1";
$l = "-1";
if (isset($_GET['i'])){$id = $_GET['i'];}
if (isset($_GET['l'])){$l = $_GET['l'];}

$dir_path = "../Assamese_Songs/".$id;



function Unzip($fileName){
$zip = new ZipArchive;
$path = pathinfo(realpath($fileName), PATHINFO_DIRNAME);
if ($zip->open($fileName) === TRUE) {
    $zip->extractTo($path);
    $zip->close();
        echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> File Uploaded successfully</div>';

unlink($fileName);

} else {
        echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Your Uploaded File Must Be Zip</div>';
}
}



if($_SERVER['REQUEST_METHOD'] == 'POST') {
if (!empty($_FILES["file"]["name"])) {

	$file_name=$_FILES["file"]["name"];
	$temp_name=$_FILES["file"]["tmp_name"];
	$ext= pathinfo($file_name, PATHINFO_EXTENSION);
	$filename = $file_name.$ext;
	$target_path = $dir_path."/".$filename;
        if($ext=="zip"){
            if(move_uploaded_file($temp_name, $target_path)){
if(Unzip($target_path)){
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> File Uploaded successfully</div>';
}

}
        }
        else{      echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Your Uploaded File Must Be Zip</div>';}
}
}
?>
            <h3>Upload ZIp</h3>
            <h5><?php echo $dir_path ;?> <a class="btn btn-sm btn-danger pull-right" href="SubDir.php?i=<?php echo $dir_path ;?>">Back</a></h5>
<form action ="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name = "form1" enctype="multipart/form-data" >
        

    <div class="form-group">

       
<input type = "file" name ="file" class="form-control btn btn-danger btn-block" placeholder="Create Directory"/>
 </div>

<div class="form-group">
    <input type="submit" class="form-control btn btn-success btn-block" value="Upload" />
 </div>
</form>  
        </div> 
        </div>
                                    

 
                                </div>
                                
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
   
</body>


</html>