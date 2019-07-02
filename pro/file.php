
<?php
include '../classes/AlbumsAdmin.php';
$albums = new Albums();
include '../classes/ArtistAdmin.php';
$artist = new Artist();
include '../classes/songsclass.php';
$songs = new Songs();
include '../classes/categoryAdmin.php';
$category = new Category();
include '../classes/NavBar.php';
$n = new NavBar;
include '../classes/UI.php';
$UI = new UI;
$name = "Album";
$id =1;
if(isset($_GET['i'])){$id = $_GET['i'];}
$albums->loadvalue($id);
$category->loadvalue($albums->getCATEGORY_ID());
?>
  
<!DOCTYPE html><html lang="en" class="app">
<head>
 <!--   <meta name="title" content="<?php //echo $tittle." "; echo $al->getSINGER(); ?> Assam Full Entertaning , Joke, Assamese picture, Songs" />
<meta charset="utf-8" /> <title><?php// echo $tittle." "; echo $al->getSINGER(); ?> Download All Mp3s | Asomi.Mobi</title> 
<meta name="language" content="en" />
<meta name="description" content="<?php// echo $tittle." "; echo $al->getSINGER()." "; echo $al->getDETAILS(); ?> offers large collection of mp3, jokes, photos" />
<meta name="keywords" content="<?php// echo $tittle." "; echo $al->getSINGER()." "; echo $al->getDETAILS(); ?> , asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
<meta name="author" content="Asomi.Mobi">
<meta name="revisit-after" content="5 days" />
<meta name="copyright" content="asomi.mobi">
<meta name="generator" content="wap8.in">
<meta name="creationdate" content="2015">
<meta name="distribution" content="global">
<meta name="rating" content="general">
 --->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="../css/app.v1.css" type="text/css" /> 
<link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" /> 

</head>

<body class=""> <section class="vbox">
      <?php $UI->Work("Albums");?> 

        <section> <section class="hbox stretch"> 
                <!-- .aside --> <?php $n->Worked();?>  
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox animated fadeInRight" id="bjax-el">
                        <section class="scrollable wrapper-lg"> 
                            <div class="row"> <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"> 
                                    <div class="panel wrapper-lg">
                                        <div class="row"> 
                                            <div class="col-sm-5"> 
                                                <img src='../image/geetanjali.jpg' class='img-full m-b'>
                                            </div> 
                                            <div class="col-sm-7"> 
        <h2 class="m-t-none text-primary"><?php if(strlen($albums->getALBUM_NAME()) > 0){echo $albums->getALBUM_NAME();}?></h2>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getYEAR()) > 0){echo 'Year : ';  echo $albums->getYEAR();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getBITRATE()) > 0){echo 'BitRate : ';  echo $albums->getBITRATE();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getMUSIC()) > 0){echo 'BitRate : ';  echo $albums->getMUSIC();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getPRODUCTION()) > 0){echo 'BitRate : ';  echo $albums->getPRODUCTION();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getCOVER()) > 0){echo 'BitRate : ';  echo $albums->getCOVER();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($albums->getDESCRIPTION()) > 0){echo 'BitRate : ';  echo $albums->getDESCRIPTION();}?></h4>
        <h4 class="m-t-none text-success"><?php if(strlen($category->getCATEGORY_NAME()) > 0){echo 'Category : ';?>
                                                        <a class="text-info" href="scat.php?i=<?php echo $category->getID();?>"><?php echo $category->getCATEGORY_NAME();}?></a> 
                </h4>
        <h4 class="m-t-none text-success"><?php echo 'Artists : ';  echo $artist->ArtistByAlbum($albums->getID());?></h4>

        
        <div class="btn-group btn-group-justified">
            <div class="btn btn-primary">Facebook</div> 
           <div class="btn btn-success">WhatsApp</div></div>
       
                                            </div> 
                                        
                                            
                                        </div>
    <h4 class="bg-success wrapper-md r">Songs List</h4>              
     <?php $songs->AlbumSongs($id);?> 
        
                                                         
                                                         
                                                        <!--- <ul class="list-group list-group-lg">  <?php // $s->Album($albm);?> </ul> --->
                                 
                                 
                             </div> </div> <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                 <div class="panel panel-default animated fadeInUp">
                                     <div class="panel-heading">Suggestions</div>
                                         
                                          <?php $albums->RelatedAlbums($id);?> 
                                     </div> </div> </div> </section> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
              
                </section> </section> </section> </section> <!-- Bootstrap --> 
                <!-- App --> <script src="../js/app.v1.js"></script>
                <script src="../js/app.plugin.js"></script> 
                <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script> 
                <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
                <script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>
