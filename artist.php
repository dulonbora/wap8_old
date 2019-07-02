
<?php
include 'classes/Albums.php';
$albums = new Albums();
include 'classes/Artist.php';
$artist = new Artist();
include 'classes/Songs.php';
$songs = new Songs();
include 'classes/NavBar.php';
$n = new NavBar;
include 'classes/UI.php';
$UI = new UI;
$name = "Album";


$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
$id = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
$Total = $artist->getTotalByartist($id);

$limit = 12;
$TotalPage = ceil($Total/$limit);

if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;

$artist->loadvalue($id);
$tittle = $artist->getARTIST_NAME();
$totalalbum = $artist->AlbumByArtistCount($id);
?>
  
<!DOCTYPE html><html lang="en" class="app">
<head>
   <meta name="title" content="<?php echo $tittle; ?> All Old And New Mp3 Songs Dowlload Here" />
<meta charset="utf-8" /> 
<title><?php echo $tittle; ?> All Old And New Mp3 Songs Dowlload Here | Asomi.Mobi</title> 
<meta name="language" content="en" />
<meta name="description" content="<?php echo $tittle; ?> new mp3 songs <?php echo $tittle; ?> old songs dowlload and play Here" />
<meta name="keywords" content="<?php echo $tittle; ?> , new assamese songs, asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
<meta name="author" content="Asomi.Mobi">
<meta name="revisit-after" content="5 days" />
<meta name="copyright" content="asomi.mobi">
<meta name="generator" content="wap8.in">
<meta name="creationdate" content="2015">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" /> 
<script src="/js/jquery-3.1.1.min.js"></script> 

</head>

<body class=""> <section class="vbox">
      <?php $UI->Work("Albums");?> 

        <section> <section class="hbox stretch"> 
                <!-- .aside --> <?php $n->Worked();?>  
                <!-- /.aside -->
                <section id="content">
                    
                    <?php include 'fb.php';
                ?>
                    <section class="vbox animated fadeInRight" id="bjax-el">
                                                    <section class="" id="bjax-target"> 
    
                        <section class="hbox stretch bg-black dker">
                                <!-- side content --> 
                                <aside class="col-sm-4 no-padder" id="sidebar">
                                    <section class="vbox animated fadeInUp"> <section class="scrollable">
                                            
                                                <div class="panel-body"> 
                                                    <div class="clearfix text-center m-t">
                                                        <div class="inline">
        <div class="easypiechart easyPieChart" data-percent="75" data-line-width="5" data-bar-color="#756464" data-track-color="#756464" data-scale-color="false" data-size="150" data-line-cap="butt" data-animate="1000" style="width: 150px; height: 150px; line-height: 150px;">
                                                                <div class="thumb-lg"> <img src="/image/<?php echo $artist->getIMAGE_LINK();?>" class="img-circle" alt="..."> </div>
                                                                <canvas width="150" height="150"></canvas>
                                                            </div> 
                                                            <div class="h4 m-t m-b-xs"><?php echo $artist->getARTIST_NAME();?></div>
                                                                <small class="text-muted m-b">Singer</small>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <footer class="panel-footer panel-sm bg-success text-center"> <div class="row pull-out">
                                                         <div class="col-xs-6 dk"> <div class="padder-v">
                                                                <span class="m-b-xs h5 block text-white"><?php echo $Total;?></span>
                                                                <small class="text-muted">Songs</small> </div>
                                                        </div> <div class="col-xs-6"> <div class="padder-v">
                                                                <span class="m-b-xs h5 block text-white"><?php echo $totalalbum;?></span>
                                                                <small class="text-muted">Albums</small> </div> </div> </div>
                                                </footer> 
                                            
                                                 <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                                <?php $songs->SongListByArtist($id, $start, $limit);?>
                                            </ul>

                                            <div class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs wrapper-lg">
                                                <?php
            $p = $page-1; 
            if($page>1){
            ?>
            <!---<a href="artist.php?i=<?php// echo $id;?>&page=<?php// echo $n;?>" class="btn btn-success btn-rounded pull-left">Previous</a> --->
            <?php
            };
            
            if($Total > $limit){
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                <a href="/artist.php?i=<?php echo $id;?>&page=<?php echo $n;?>" class="btn btn-success btn-rounded pull-right">Next</a>
            <?php
            }};
            ?>
                                        <div class='line'></div>    </div> 
                                                    

                                        </section>

                
                                    </section> </aside>
                                <!-- / side content -->  
                                <section class="col-sm-4 no-padder bg hidden-sm hidden-xs">
                                    <section class="vbox">
                                        <section class="scrollable hover">
                                                 <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                                     <li class='list-group-item bg-danger clearfix'> Artist List</li>
                                                <?php $artist->ArtistList($id);?>
                                            </ul>
                                    </section>
                                    </section>
                                </section>
                                
                                <section class="col-sm-4 no-padder bg hidden-sm hidden-xs">
                                    <section class="vbox">
                                        <section class="scrollable hover">
                                                 <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                        <li class='list-group-item bg-danger clearfix'><?php echo $artist->getARTIST_NAME();?> Album List</li>
                                                <?php $artist->AlbumByArtist($id);?>
                                            </ul>
                                    </section>
                                    </section>
                                </section>
                                </section>
                                </section>
                        </section>
                    
                    <nav class="">
                     <footer class="fixed-footer animated fadeInRight">
                        <div id="SearchBar" class="hidden-md hidden-lg"></div>
                     </footer>
                     </div>
                  </nav>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                
                <?php include 'fb.php';
                ?>
                </section> </section> </section> </section> 
                <!-- Bootstrap -->
                 <script>
         $(document).ready(function () {
             $(document).on("click", "#SearchBtn", function () {
                 $("#SearchBar").load("/searchbar.php");
             });
         });
      </script>
                <!-- App -->
                <script src="/js/app.v1.js"></script>
                <script src="/js/app.plugin.js"></script> 
                
</body>
</html>
