
 <?php
 
 error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'classes/NavBar.php';
$N = new NavBar;
include './classes/UI.php';
$UI = new UI;

include './classes/Videos.php';
$Videos = new Videos();
include 'classes/Songs.php';
$songs = new Songs();
include 'classes/Category.php';
$category = new Category();
$name = "SONGS";
$tittle = "New Assamese Songs";


$Total = $Videos->getTotal();

$limit = 12;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;

$ViewRs = $Videos->AllFecth($start, $limit);
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head> <meta charset="utf-8" /> <title><?php echo $tittle;?> | Asomi.Mobi</title> 
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
 <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" /> 
 <link rel="stylesheet" href="css/app.v1.css" type="text/css" /> 
 <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js">
 </script> <![endif]-->
 
 </head>
 
 <body class="">
 <section class="vbox"> 
 <?php $UI->Work($name); ?> 
 
 <section> <section class="hbox stretch"> <!-- .aside --> 
 
 <?php $N->Worked();?> 
 
 <!-- /.aside --> <section id="content"> 
     <?php include 'fb.php';
                ?>
     <section class="vbox">
 <section class="" id="bjax-target"> <section class="hbox stretch">

 <!-- side content --> 
 <?php if($page==1){?>
 <aside class="aside bg-light dk" id="sidebar"> 
 <section class="vbox animated fadeInUp"> 
     
 <section class="scrollable hover">
     
 <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto"> 
     <a class='list-group-item active'>Category</a>
 <?php $category->MainCategoryForVide(1); ?>
 </div> 
     <?php include 'fb.php';
                ?>
 </section> </section> </aside>
 <?php } ?>
  <!-- / side content --> <section> 
     <section class="vbox animated fadeInRight"> 
         <section class="scrollable padder-lg"> 
             <h2 class="font-thin m-b">Latest Video
                <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span> 
                    <span class="bar5 a5 bg-danger dker"></span>
                </span></h2>
             
             <div class="row row-sm"> 
             <?php 
                        foreach($ViewRs as $row){ 
                        $noimage = "geetanjali.jpg";
                        $image = (strlen($row['PIC']) > 10) ? $row['PIC'] : $noimage;    
                        //$cat = $category->loadvalue($row['CATEGORY_ID']);
                        $sname = str_replace(' ', '-', $row['NAME']);
                        ?>    
                 
<div class="col-xs-6 col-sm-4 col-md-3"> <div class="item"> <div class="pos-rlt"> 
        <div class="item-overlay opacity r r-2x bg-black">
        <div class="center text-center m-t-n"> 
        <a href='/video/<?php echo $row['ID']?>/<?php echo $sname?>.html'>
        <i class="fa fa-play-circle"></i></a> </div> </div>
            <a href='/video/<?php echo $row['ID']?>/<?php echo $sname?>.html'><img src='/image/<?php echo $image;?>' alt='' class='r r-2x img-full'  width='200' height='120'></a> </div>
        <div class='padder-v'> <a href='/video/<?php echo $row['ID']?>/<?php echo $sname?>.html' class='text-ellipsis'><?php echo $row['NAME']?></a>
            <a href='video-detail.html' class='text-ellipsis text-xs text-muted'><?php echo "cat"?></a> </div> </div> </div>

                           <?php } ?>

             
             </div>
             <div class="row"> 

             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-t-lg m-b-lg"> 
                <?php
            $p = $page-1; 
            if($page>1){
            ?>
                 <a href="/assamese-video/<?php echo $p;?>.html" class="btn btn-success btn-rounded pull-left">Previous</a>
            <?php
            };
            
            if($Total > $limit){
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                 <a href="/assamese-video/<?php echo $n;?>.html" class="btn btn-success btn-rounded pull-right">Next</a>
            <?php
            }};
            ?>
                </div>
                </div>
          
         
         </section> </section> </section> </section> </section> 
          </section> 
<?php include 'fb.php';
                ?>

 </section> </section> </section> </section> <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/app.plugin.js"></script> <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script> <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script> <script type="text/javascript" src="js/jPlayer/demo.js"></script></body>
</html>
