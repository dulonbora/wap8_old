
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

 <?php

$path = "-1";
if (isset($_GET['l'])){$path = $_GET['l'];}
$fileName = "-1";
if (isset($_GET['i'])){$fileName = $_GET['i'];}


$file = "../Assamese_Songs/".$path."/".$fileName;
$natunNaam = str_replace('  ', '_', $fileName);
$nn= str_replace(' ', '_', $natunNaam);
$nnn= str_replace('-', '_', $nn);

if($_SERVER['REQUEST_METHOD']=='POST'){
$getName = $_POST['natun'];
$aagorFolderName = "../Assamese_Songs/".$path;
if(rename($file, $aagorFolderName ."/".$getName)){
$url = "SubDir.php?i=".$path;
pageRedirect($url);

}
}

function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}

?>      
                
                
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
<div class="col-lg-12">
                

                                
                            

                            </div>                            

                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
<h5 class="font-bold"><?php echo $file;?></h5>
                             <form action ="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-group" name = "form1">
                                                                                                      <div class="form-group pull-in clearfix">

<input type = "text" name ="natun" class="form-control" value="<?php echo $nnn;?>" placeholder="Create Directory">
<input type = "submit" class="btn btn-danger" value="Rename">
                                 </div>
</form>       
                                    
                                 
 
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
    <script src="../js/app.v1.js"></script>
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/app.plugin.js"></script>
    <script type="text/javascript" src="../js/jPlayer/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="../js/jPlayer/add-on/jplayer.playlist.min.js"></script>
    <script type="text/javascript" src="../js/jPlayer/demo.js"></script>
</body>


</html>



