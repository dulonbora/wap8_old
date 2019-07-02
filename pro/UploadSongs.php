
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
        <div class="col-sm-4">
            <?php

$id = "-1";
$l = "-1";
if (isset($_GET['i'])){$id = $_GET['i'];}
if (isset($_GET['l'])){$l = $_GET['l'];}
    $dir_path ="../Assamese_Songs/".$l."/".$id;






if($_SERVER['REQUEST_METHOD'] == 'POST') {
if (!empty($_FILES["file"]["name"])) {

	$file_name=$_FILES["file"]["name"];
	$temp_name=$_FILES["file"]["tmp_name"];
	$ext= pathinfo($file_name, PATHINFO_EXTENSION);
	$filename = $file_name;
	$target_path = $dir_path."/".$filename;
        if($ext=="mp3"){
            if(move_uploaded_file($temp_name, $target_path)){
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> File Uploaded successfully</div>';

}
 else {
    echo $temp_name;
    echo $target_path;
}
        }
        else{      echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Your Uploaded File Must Be Mp3</div>';}
}
}
?>
            
            <?php
    function listFolderFiles($dir_path){
    $ffs = scandir($dir_path);
    ?>
            <h3>Upload Mp3</h3>
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
            
            
            <div class="col-lg-8">
                                    <section class="panel panel-default"> <header class="panel-heading">Songs List () <span id="fullPath"><?php echo $dir_path;?></span>
                                            <button class="btn btn-xs btn-danger pull-right">Manage Song</button>
                                        </header> 
                                        <div class="row wrapper"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class='btn-group btn-group-justified'>
                                    <a class='btn btn-success' href='UploadSongs.php?i=<?php echo $dir_path; ?>'>Upload</a>
                                    <a class='btn btn-danger' href='SongUrlCopy.php?i=<?php echo $dir_path; ?>'>Url Copy</a>
                                  <a class='btn btn-primary' href='SongDir.php'>Folder Copy</a>
                                      
                              </div> </div> </div> 
                                        
                                        
                                    <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr class="bg bg-light"><td>NAME</td><td>Rename</td><td>Add To Db</td><tr> </thead>
                                        <tbody id="SearchResult">
        <?php
        //$dir ="../apps/Assamese_Songs/".$l."/".$id."/";
        foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
          echo "<tr>"
            . "<td>" . $ff . "</td><td><a href='File_Rename.php?l=".$dir_path."&f=".$ff."'>Rename</a></td><td><a href='Add_db.php?l=".$dir_path."&f=".$ff."'>Add To DB</a></td><tr>";

        }
    }

    ?>
    
</tbody>
                                        </table> </div> 
<?php

        }

listFolderFiles($dir_path);

?>
                                    
                                    
                                                            
 
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