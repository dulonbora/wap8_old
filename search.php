<?php 
$q = $_GET['q'];
?>

 <?php
include './classes/Songs.php';
$songs = new Songs();
include './classes/NavBar.php';
$N = new NavBar();
include './classes/UI.php';
$UI = new UI;
$name = "SONGS";
$titttle = $q;
?>


<!DOCTYPE html>
<html lang="en" class="app">
    <head> <meta charset="utf-8" /> <title><?php echo $titttle;?> | Asomi.Mobi</title> 
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
 <link rel="stylesheet" href="/js/jPlayer/jplayer.flat.css" type="text/css" /> 
 <link rel="stylesheet" href="/css/app.v1.css" type="text/css" /> 
 <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js">
 </script> <![endif]-->
 
 </head>
 <body class="">
 <section class="vbox"> 
 <?php $UI->Work($name); ?> 
 
 <section> <section class="hbox stretch"> <!-- .aside --> 
 
 <?php $N->Worked();?> 
 
 <!-- /.aside --> <section id="content"> <section class="vbox">
 <section class="w-f-md" id="bjax-target"> <section class="hbox stretch">

 <!-- side content --> 
  <!-- / side content --> <section> 
     <section class="vbox animated fadeInRight"> 
         <section class="scrollable padder-lg"> 
             <h2 class="font-thin m-b"><?php echo $q;;?>
                <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span> 
                    <span class="bar5 a5 bg-danger dker"></span>
                </span></h2>
             
             <div class="row row-sm"> 
                 
<?php $songs->Search($q); ?>             
             
             </div>
          
         
         </section> </section> </section> </section> </section> 
          </section>  </section> </section> </section> </section> <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/app.plugin.js"></script> <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script> <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script> <script type="text/javascript" src="js/jPlayer/demo.js"></script></body>
</html>



