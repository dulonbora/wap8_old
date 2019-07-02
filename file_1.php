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
$name = "Album";
$id =1;
if(isset($_GET['i'])){$id = $_GET['i'];}
$songs->loadvalue($id);
$category->loadvalue($songs->getCATEGORY_ID());
$albums->loadvalue($songs->getALBUM_ID());
$tittle = $songs->getSONG_NAME();
?>
       

       
<!DOCTYPE html><html lang="en" class="app">
<head>
<meta name="title" content="Asomi.Mobi <?php echo $tittle;echo ' from';echo $albums->getALBUM_NAME(); echo ' by ';echo $songs->ArtistBySong($id);?> Assam Full Entertaning , Joke, Assamese picture, Songs" />
<meta charset="utf-8" /> <title><?php echo $tittle;echo ' Song from ';echo $albums->getALBUM_NAME(); echo ' by ';echo $songs->ArtistBySong($id);?> | Asomi.Mobi</title> 
<meta name="language" content="en" />
<meta name="description" content="<?php echo $tittle;echo ' Song from ';echo $albums->getALBUM_NAME(); echo ' by ';echo $songs->ArtistBySong($id);?>" />
<meta name="keywords" content="<?php echo $tittle;echo ' Song from ';echo $albums->getALBUM_NAME(); echo ' by ';echo $songs->ArtistBySong($id);?>">
<meta name="author" content="Asomi.Mobi">
<meta name="revisit-after" content="5 days" />
<meta name="copyright" content="asomi.mobi">
<meta name="generator" content="wap8.in">
<meta name="creationdate" content="2015">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="/js/jPlayer/jplayer.flat.css" type="text/css" /> 
<script src="/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" /> 
<link rel="stylesheet" href="/css/fixed-footer.css" type="text/css" /> 

<!--[if lt IE 9]> 
<script src="js/ie/html5shiv.js"></script>
<script src="js/ie/respond.min.js"></script> 
<script src="js/ie/excanvas.js"></script> <![endif]-->

</head>

<body class="">
    <section class="vbox">
      <?php $UI->Work("Download");?> 

        <section> <section class="hbox stretch"> 
                <!-- .aside --> <?php $n->Worked();?>  
                <!-- /.aside -->
                <section id="content">
                    
                    <?php include 'fb.php';
                ?>
                    <section class="vbox animated fadeInRight" id="bjax-el">
                        <section class="scrollable wrapper-lg"> 
                            <div class="row"> <div class="col-xs-12 col-sm-12 col-lg-8 col-md-8"> 
                                    <div class="panel wrapper-lg">
                                        <div class="row">
                    <?php $images = (strlen($songs->getIMAGE_LINK())==14) ? $songs->getIMAGE_LINK() : "geetanjali.jpg"; ?>
                                                <div class="col-md-5 col-lg-5 hidden-xs hidden-sm"> 
                                                <img src="/image/<?php echo $images;?>" class="img-full m-b"> </div>
                                            

            
                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"> 
                                                    <section class="panel panel-default">
                                                        <header class="panel-heading bg-light no-border"> 
                    <div class="clearfix">
                        <div class="pull-left thumb-md avatar b-3x m-r">
                            <img class="hidden-lg hidden-md" src="/image/<?php echo $images;?>" alt="..."> </div>
                    <div class="clear"> 
                    <div class="h3 m-t-xs m-b-xs"> <?php echo $songs->getSONG_NAME();?> 
                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div> 
                        <div class="hidden-lg hidden-md"><?php echo $albums->getALBUM_NAME();?></div>
                    </div> </div> </header>
                    <ul class="list-group no-radius">
                    <?php if(strlen($albums->getALBUM_NAME()) > 0){echo '<li class="list-group-item hidden-xs hidden-sm">Album Name : ';?>   
                    <a class="text-info" href="/files/<?php echo $albums->getID(); ?>/<?php echo strtolower(str_replace(' ', '-', $albums->getALBUM_NAME())); ?>.html"><?php echo $albums->getALBUM_NAME(); ?></a></li><?php } ?>
                    <?php if(strlen($albums->getPRODUCTION()) > 0){echo '<li class="list-group-item">Production : ';?>   
                    <?php echo $albums->getPRODUCTION();?></li><?php } ?>
                    <?php if(strlen($category->getCATEGORY_NAME()) > 0){echo '<li class="list-group-item">Category : ';?>   
                    <a class="text-info" href="/assamese-songs-category/<?php echo $category->getID(); ?>/<?php echo strtolower(str_replace(' ', '-', $category->getCATEGORY_NAME())); ?>.html"><?php echo $category->getCATEGORY_NAME(); ?></a></li><?php } ?>
                    <?php if(strlen($songs->getVIDEO_ID()) > 1){echo '<li class="list-group-item">Video Link : ';?>   
                    <a class="text-info" href="files.php?i=<?php echo $songs->getVIDEO_ID();?>">Play This Video Clip</a></li><?php } ?>
                    <?php if(strlen($songs->getLYRIC_ID()) > 1){echo '<li class="list-group-item">Lyric : ';?>   
                    <a class="text-info" href="files.php?i=<?php echo $songs->getLYRIC_ID();?>">Get Full Lyric</a></li><?php } ?>
                    <li class="list-group-item"><?php echo 'Artists : ';  echo $artist->ArtistBySongs($id);?>  </li>
                                                        </ul> </section>
                    <div id="ctop" class="btn btn-danger btn-rounded btn-sm btn-block animated fadeInRight">Play</div>
		<a id="<?php echo $id;?>" class="btn btn-primary btn-rounded btn-sm ctod btn-block animated fadeInRight ">Download</a>	
           <div class="hidden-xs hidden-sm" id="DownloadLinks"></div>
         

       <h4 class="btn-group btn-group-justified"> 
                                                
           <div class="btn btn-primary"><i class="icon-facebook-sign"></i>Facebook</div> 
           <div class="btn btn-success fa-whatsapp"><i class="icon-whatsapp"></i>Whatsapp</div>                                  
                                            </h4>
           <div class="text-hide" id="link" >http://asomi.mobi/<?php echo $sname = str_replace('../', '', $songs->getSONG_LINK());?></div>
                                                <div class="text-hide" id="name" ><?php echo $songs->getSONG_NAME();?></div>
                                                <div class="text-hide" id="pic" >http://asomi.mobi/image/<?php echo $songs->getIMAGE_LINK();?></div>  
                                                </div>
                                        
                                        
                                        </div>
                                        
                                        
                                        
<h4 class="bg-primary wrapper-md r">Songs List</h4>              
     <?php $songs->AlbumRelatedSongs($id, $songs->getALBUM_ID());?> 
    <div class='line'></div>

            <button id="<?php echo $id;?>" class="btn btn-info btn-sm btn-rounded viewcomment">View Comments</button>
            <button id="<?php echo $id;?>" class="btn btn-info btn-sm pull-right btn-rounded postcomment">Post Comment</button>
                <div class='line'></div>

 </div> 
                                <div id="ResultMassage"></div>
                                    <div id="loadlist"></div>
                                    <div id="loadpost"></div></div> 
                                    
                                    <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                 <div class="panel panel-default animated fadeInRight">
                                     <div class="panel-heading panel-success">Suggestions</div>
                                          <?php $albums->RelatedAlbums($songs->getALBUM_ID());?> 
                                     </div> </div>
                            </div> </section> </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                <?php
                
                include 'fb.php';
                ?>
                <nav class="">
                <footer class="fixed-footer animated fadeInRight">
                    <div id="wappppppperrr" class="wrapper">
                        <div id="DownloadLink" class="hidden-lg hidden-md"></div>
                </div>
                    <div id="PlayerLoad"></div>
                <div id="SearchBar" class="hidden-md hidden-lg"></div>
                </footer>
                </div>
                </nav>
                </section>
            
            </section> </section> </section>
 
<script>
$(document).ready(function(){
    
    $(document).on("click", ".ctod", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url : "/download_link.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#DownloadLink").html(html);
                    $("#DownloadLinks").html(html);
                    $(".ctod").hide(600);
                    $("#searchbarrrrr").hide();
                }
        });
});

    $(document).on("click", "#SearchBtn", function(){
        $("#SearchBar").load("/searchbar.php");
        //$("#wappppppperrr").hide();
        
});
    
    
  //  $("#ctop").click(function(){  
        
       // $("#PlayerLoad").load("/jplayer.php");
     //   $("#ctop").hide(600);
        
  
  //  });
    
    
    
});
</script>


<script>
$(document).ready(function(){
    
    $(document).on("click", ".viewcomment", function(){
        var id = $(".viewcomment").attr("id");
        $.ajax({
            type: "post",
            url : "/comment_list_ajax.php",
            data : {i : id, type : "2"},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#loadlist").html(html);
                    
                }
        });
});
    
    $(document).on("click", ".postcomment", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "POST",
            url : "/comment_ajax.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#loadpost").html(html);
                    $(".postcomment").hide();
                }
        });
});
    
    
    
    $(document).on("click", ".PostcommentBtn", function(){
        var id = $(this).attr("id");
        var email = $("#EMAIL").val();
        var user = $("#USERNAME").val();
        var comment = $("#COMMENT").val();
        if(email==""){$("#EMAIL").focus();}
        else if(user==""){$("#USERNAME").focus();}
        else if(comment==""){$("#COMMENT").focus();}
        else{
        $.ajax({
            type: "POST",
            url : "/comment_ajax_post.php",
            data : {ID : id, TYPE : "2", EMAIL:email, USERNAME:user, COMMENT:comment},
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
<script src="/js/app.v1.js"></script>
<script src="/js/app.plugin.js"></script>
<script src="/js/jPlayer/music.js"></script>
<script type="text/javascript" src="/js/jPlayer/jquery.jplayer.min.js"></script> 
</body>
</html>