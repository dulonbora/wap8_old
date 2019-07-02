<?php
   include 'classes/Albums.php';
   $albums = new Albums();
   include 'classes/Artist.php';
   $artist = new Artist();
   include 'classes/Songs.php';
   $songs = new Songs();
   include 'classes/Category.php';
   $category = new Category();
   include 'classes/NavBar.php';
   $n = new NavBar;
   include 'classes/UI.php';
   $UI = new UI;
   include 'classes/Mobile_Detect.php';
   $MD = new Mobile_Detect();
   $name = "Album";
   $id = 1;
   if (isset($_GET['i'])) {
       $id = $_GET['i'];
   }
   $albums->loadvalue($id);
   $category->loadvalue($albums->getCATEGORY_ID());
   $tittle = $albums->getALBUM_NAME() . " " . $category->getCATEGORY_NAME();
   $aaaaaa = $albums->ArtistByAlbumForRelated($id);
if(strlen($albums->getALBUM_NAME()) > 1){}
else {header('Location: http://asomi.mobi');
exit;}   ?>
<!DOCTYPE html>
<html lang="en" class="app">
   <head>
      <meta name="title" content="<?php echo $tittle; ?> by <?php echo $aaaaaa; ?> mp3 songs download" />
      <meta charset="utf-8" />
      <title><?php echo $tittle; ?> By <?php echo $aaaaaa; ?> Download All Mp3s | Asomi.Mobi</title>
      <meta name="language" content="en" />
      <meta name="description" content="<?php echo $tittle; ?> by <?php echo $aaaaaa; ?> mp3 songs download" />
      <meta name="keywords" content="<?php echo $tittle; ?> , asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
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
      <!-- App --> <script src="/js/jquery-3.1.1.min.js"></script>
   </head>
   <body class="">
      <section class="vbox">
         <?php $UI->Work("Albums"); ?> 
         <section>
            <section class="hbox stretch">
               <!-- .aside --> <?php $n->Worked(); ?>  
               <!-- /.aside -->
               <section id="content">
                  <?php include 'fb.php';
                     ?>
                  <section class="vbox animated fadeInRight" id="bjax-el">
                     <section class="scrollable wrapper-lg">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                              <div class="panel wrapper-lg">
                                 <div class="row">
                                    <?php $images = (strlen($albums->getART_LINK()) == 14) ? $albums->getART_LINK() : "geetanjali.jpg"; ?>
                                    <div class="col-md-5 col-lg-5 hidden-xs hidden-sm"> 
                                       <img src="/image/<?php echo $images; ?>" class="img-full m-b"> 
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                       <section class="panel panel-default animated fadeInUp">
                                          <header class="panel-heading bg-light no-border">
                                             <div class="clearfix">
                                                <div class="pull-left thumb-md avatar b-3x m-r">
                                                   <img class="hidden-lg hidden-md" src="/image/<?php echo $images; ?>" alt="..."> 
                                                </div>
                                                <div class="clear">
                                                   <div class="h3 m-t-xs m-b-xs"> <?php echo $albums->getALBUM_NAME(); ?> 
                                                      <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> 
                                                   </div>
                                                   <div class="hidden-lg hidden-md"><?php echo $category->getCATEGORY_NAME(); ?></div>
                                                </div>
                                             </div>
                                          </header>
                                          <ul class="list-group no-radius">
                                             <?php if (strlen($albums->getALBUM_NAME()) > 0) {
                                                echo '<li class="list-group-item">Album Name : '; ?>   
                                              <a class="text-info" href="/files/<?php echo $albums->getID(); ?>/<?php echo strtolower(str_replace(' ', '-', $albums->getALBUM_NAME())); ?>.html"><?php echo $albums->getALBUM_NAME(); ?></a></li><?php } ?>
                                             <?php if (strlen($albums->getPRODUCTION()) > 0) {
                                                echo '<li class="list-group-item">Production : '; ?>   
                                             <?php echo $albums->getPRODUCTION(); ?></li><?php } ?>
                                             <?php if (strlen($albums->getBITRATE()) > 0) {
                                                echo '<li class="list-group-item">Bitrate : '; ?>   
                                             <?php echo $albums->getBITRATE(); ?></li><?php } ?>
                                             <?php if (strlen($albums->getYEAR()) > 0) {
                                                echo '<li class="list-group-item">Year : '; ?>   
                                             <?php echo $albums->getYEAR(); ?></li><?php } ?>
                                             <?php if (strlen($albums->getMUSIC()) > 0) {
                                                echo '<li class="list-group-item">Music By : '; ?>   
                                             <?php echo $albums->getMUSIC(); ?></li><?php } ?>
                                             <?php if (strlen($albums->getCOVER()) > 0) {
                                                echo '<li class="list-group-item">Cover Design By : '; ?>   
                                             <?php echo $albums->getCOVER(); ?></li><?php } ?>
                                             <?php if (strlen($category->getCATEGORY_NAME()) > 0) {
                                                echo '<li class="list-group-item">Category : '; ?>   
                                          <a class="text-info" href="/assamese-songs-category/<?php echo $category->getID(); ?>/<?php echo strtolower(str_replace(' ', '-', $category->getCATEGORY_NAME())); ?>.html"><?php echo $category->getCATEGORY_NAME(); ?></a></li><?php } ?>
                                             <?php if (strlen($songs->getVIDEO_ID()) > 1) {
                                                echo '<li class="list-group-item">Video Link : '; ?>   
                                             <a class="text-info" href="files.php?i=<?php echo $songs->getVIDEO_ID(); ?>">Play This Video Clip</a></li><?php } ?>
                                             <?php if (strlen($songs->getLYRIC_ID()) > 1) {
                                                echo '<li class="list-group-item">Lyric : '; ?>   
                                             <a class="text-info" href="files.php?i=<?php echo $songs->getLYRIC_ID(); ?>">Get Full Lyric</a></li><?php } ?>
                                             <li class="list-group-item"><?php echo 'Artists : ';
                                                echo $artist->ArtistByAlbum($albums->getID()); ?>  </li>
                                             <?php if (strlen($albums->getDESCRIPTION()) > 0) {
                                                echo '<li class="list-group-item">Description : '; ?>   
                                             <?php echo $albums->getDESCRIPTION(); ?></li><?php } ?>
                                             <li class="list-group-item">
                                                <a class="btn btn-primary btn-sm btn-rounded" target="_blank" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $tittle; ?> Download All Mp3s | Asomi.Mobi&amp;p[summary]=<?php echo $category->getCATEGORY_NAME(); ?>&amp;p[url]=http://asomi.mobi/files/<?php echo $albums->getID(); ?>/<?php echo strtolower(str_replace(' ', '-', $albums->getALBUM_NAME())); ?>.html&amp;p[images][0]=http://asomi.mobi/image/<?php echo $images; ?>">Facebook</a>
                                                
                                                <div class="btn btn-success btn-sm btn-rounded pull-right">w</div>
                                             </li>
                                          </ul>
                                       </section>
                                    </div>
                                 </div>
                                 <h4 class="bg-success wrapper-md r">Songs List</h4>
                                 <?php
                                    if ($albums->getNEWOLD() == 1 || $albums->getNEWOLD() == 0) {
                                        $songs->AlbumSongs($id);
                                    } elseif ($albums->getNEWOLD() == 3) {
                                        $songs->AlbumSongsFake($id);
                                    } else {
                                        echo '<section class="scrollable hover">
                                    <ul class="list-group list-group-lg auto m-b-none m-t-n-xxs">
                                    <li class="list-group-item clearfix bg bg-succss">
                                    <a href="" class="pull-left thumb-sm m-r"> <img src="image/geetanjali.jpg" alt="..."> </a>
                                    <a class="clear" href=""> <span class="block text-ellipsis">Comming Soon</span> <small class="text-muted">by Comming Soon</small> </a>
                                    </li></ul>
                                    </section>';
                                    }
                                    ?> 
                                 <div class='line'></div>
                                 <button id="<?php echo $id; ?>" class="btn btn-info btn-sm btn-rounded viewcomment">View Comment</button>
                                 <button id="<?php echo $id; ?>" class="btn btn-info btn-sm pull-right btn-rounded postcomment">Post Comment</button>         
                                 <div class='line'></div>
                              </div>
                              <div id="ResultMassage"></div>
                              <div id="loadlist"></div>
                              <div id="loadpost"></div>
                           </div>
                        <?php if(!$MD->isMobile()){?>
                            <div class="col-md-4 col-lg-4 hidden-sm hidden-xs">
                              <div class="panel panel-default animated fadeInUp">
                                 <div class="panel-heading">Suggestions</div>
                                 <?php $albums->RelatedAlbums($id); ?> 
                              </div>
                           </div>
                        <?php }?>
                        </div>
                     </section>
                  </section>
                  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                  <?php include 'fb.php';
                     ?>
                  <nav class="">
                     <footer class="fixed-footer animated fadeInRight">
                        <div id="SearchBar" class="hidden-md hidden-lg"><?php include 'fb.php';
                     ?></div>
                     </footer>
                     </div>
                  </nav>
               </section>
            </section>
         </section>
      </section>
      <!-- Bootstrap --> 
      <script>
         $(document).ready(function () {
         
             $(document).on("click", ".viewcomment", function () {
                 var id = $(".viewcomment").attr("id");
                 $.ajax({
                     type: "post",
                     url: "/comment_list_ajax.php",
                     data: {i: id, type: "3"},
                     error: function (html) {
                         $("#statusresult").html(html);
                     },
                     success: function (html) {
                         $("#loadlist").html(html);
         
                     }
                 });
             });
         
             $(document).on("click", "#SearchBtn", function () {
                 $("#SearchBar").load("searchbar.php");
         
             });
         
             $(document).on("click", ".postcomment", function () {
                 var id = $(this).attr("id");
                 $.ajax({
                     type: "POST",
                     url: "/comment_ajax.php",
                     data: {i: id},
                     error: function (html) {
                         $("#statusresult").html(html);
                     },
                     success: function (html) {
                         $("#loadpost").html(html);
                         $(".postcomment").hide();
                     }
                 });
             });
         
         
             $(document).on("click", ".PostcommentBtn", function () {
                 var id = $(this).attr("id");
                 var email = $("#EMAIL").val();
                 var user = $("#USERNAME").val();
                 var comment = $("#COMMENT").val();
                 if (email == "") {
                     $("#EMAIL").focus();
                 }
                 else if (user == "") {
                     $("#USERNAME").focus();
                 }
                 else if (comment == "") {
                     $("#COMMENT").focus();
                 }
                 else {
                     $.ajax({
                         type: "POST",
                         url: "/comment_ajax_post.php",
                         data: {ID: id, TYPE: "3", EMAIL: email, USERNAME: user, COMMENT: comment},
                         error: function (html) {
                             $("#statusresult").html(html);
                         },
                         success: function (html) {
                             $("#ResultMassage").html(html);
                             $("#loadpost").hide();
                         }
                     });
                 }
                 return false;
             });
         
         
         
         
         });
      </script>
      <!-- App --> <script src="/js/app.v1.js"></script>
      <script src="/js/app.plugin.js"></script> 
   </body>
</html>