<?php 
 ob_start(); 
$id = "-1";
if(isset($_GET['i'])==true){
$id = $_GET['i'];
}
include 'classes/NavBar.php';
$N = new NavBar;
include 'classes/UI.php';
$UI = new UI;
include 'classes/Videos.php';
$Videos = new Videos();
date_default_timezone_set("Asia/Calcutta");
$Videos->loadvalue($id);
$tittle = $Videos->getNAME();
$name = "Video";
$cat = "";
?>

<!DOCTYPE html><html lang="en" class="app">
    <head>
      <title><?php echo $tittle; ?> video Clips | Asomi.Mobi</title> 
<meta name="title" content="Asomi.Mobi <?php echo $tittle; ?> Assam Full Entertaning , Joke, Assamese picture, Songs" />
<meta charset="utf-8" /> 
<meta name="language" content="en" />
<meta name="description" content="<?php echo $tittle; ?> Download And Play Video clips" />
<meta name="keywords" content="<?php echo $tittle; ?>, asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
<meta name="author" content="Asomi.Mobi">
<meta name="revisit-after" content="5 days" />
<meta name="copyright" content="asomi.mobi">
<meta name="generator" content="wap8.in">
<meta name="creationdate" content="2015">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" /> 
<link rel="stylesheet" href="/css/fixed-footer.css" type="text/css" /> 

<!--[if lt IE 9]> 
<script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> 
<script src="js/ie/excanvas.js"></script> <![endif]-->

</head>

<body class=""> 
    

    <section class="vbox"> 
        
  <?php
     $UI->Work($name);
     ?> 
        
        <section> 
            <section class="hbox stretch">
                <!-- .aside -->
                <?php
     $N->Worked();
     ?> 
                 <!-- /.aside --> 
                 
                <section id="content">
                    <?php include 'fb.php';
                ?>
                    
                     <section class="vbox animated fadeInRight">
                         <section class="scrollable wrapper-lg"> 
                             <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"> 
                                     <div class="panel"> 
                                         <!-- video player --> 
                                         
                                         <video width="100%" controls>
                                             <source src="v/Data/<?php echo $Videos->getLINK();?>" type="video/mp4">
Your browser does not support the video tag.
</video>
                                         
                                         <!-- / video player --> <div class="wrapper-lg">
                                             <h2 class="m-t-none text-black" id="vname"><?php echo $Videos->getNAME();?></h2>
 
 <h4 class="m-t-none text-success">
     <?php if(strlen($Videos->getCATEGORY()) > 0){echo 'Category : ';?>
     <a class="text-info" href="videocat.php?i=<?php echo $cat;?>"><?php echo $Videos->getCATEGORY();}?></a> 
                </h4>
                                                
 <h4 class="m-t-none text-success">
     <?php if(strlen($Videos->getSINGER()) > 0){echo 'Singer : ';?>
     <a class="text-info" href="artistsongs.php?i=<?php echo $cat;?>"><?php echo $Videos->getSINGER();}?></a> 
                </h4>
 
                                             <h4 class="m-t-none text-success"><div class="text-info"><?php if(strlen($Videos->getREG()) > 0){echo 'Rezolutions : '; echo $Videos->getREG();}?></div></h4>
                                             <h4 class="m-t-none text-success"><div class="text-info"><?php if(strlen($Videos->getCAST()) > 0){echo 'Cast : '; echo $Videos->getCAST();}?></div></h4>
 <h4 class="m-t-none text-success"><div class="text-info"><?php if(strlen($Videos->getDIRECTOR()) > 0){echo 'Director : '; echo $Videos->getDIRECTOR();}?></div></h4>
 <h4 class="m-t-none text-success"><div class="text-info"><?php if(strlen($Videos->getEDITOR()) > 0){echo 'Editors : '; echo $Videos->getEDITOR();}?></div></h4>
                                                
                                   
     
 
 <div class="text-hide" id="vpic" >/image/<?php
 $p = str_replace('../', '', $Videos->getPIC());
 echo $p;?></div>
 <a href="v/Data/<?php echo $Videos->getLINK();?>" class="btn btn-success" id="Videolink">Download</a>
 <h6 class="text-hide" id="vlink" >v/Data/<?php echo $Videos->getLINK();?></h6>
                                             <div class="post-sum">
                                                 <?php if(strlen($Videos->getOTHER()) > 0){echo $Videos->getOTHER();}?>
                                             </div> 
                                             <div class="line b-b"></div> 
                                                     <div class="text-muted"> <i class="fa fa-user icon-muted">
                                                 
                                                 </i> by <a href="#" class="m-r-sm">Admin</a> 
                                                 <i class="fa fa-clock-o icon-muted">
                                                     
                                                 </i> Feb 20, 2013 <a href="#" class="m-l-sm">
                                                     <i class="fa fa-comment-o icon-muted"></i> 
                                                     3 comments</a> </div> </div> </div> 
                                     
                                     

                                        

                                    


        
                                 </div> 
                              
                                     <div class="col-md-4 col-lg-4 hidden-xs hidden-sm">
                                         <div class="panel panel-default"> 
                                             <div class="panel-heading">Suggestions</div>
                                                     <div class="panel-body">
                                                    <?php $Videos->AllFecthRelated($id);?>                                                     
                                                     </div> 
                                                 
                                                 </div> </div> </div> </section> </section> 
                    
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                
                <?php include 'fb.php';
                ?>
                </section> </section> </section> </section>
    <!-- Bootstrap --> <!-- App --> 
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>



</body>


   

</html>

