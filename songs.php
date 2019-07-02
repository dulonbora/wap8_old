<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'classes/NavBar.php';
$N = new NavBar;
include 'classes/UI.php';
$UI = new UI;
include 'classes/Albums.php';
$Albums = new Albums();
include 'classes/Songs.php';
$songs = new Songs();
include 'classes/Category.php';
$category = new Category();
$name = "SONGS";
$tittle = "New Assamese Songs";


$Albums = new Albums();
$Total = $Albums->getTotal();

$limit = 12;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;

$ViewRs = $Albums->RandomAlbum($start, $limit);

?>
<!DOCTYPE html>
<html lang="en" class="app">
   <head>
      <meta name="title" content="Asomi.Mobi <?php echo $tittle; ?> Assam Full Entertaning , Joke, Assamese picture, Songs" />
      <meta charset="utf-8" />
      <title><?php echo $tittle; ?> | Asomi.Mobi</title>
      <meta name="language" content="en" />
      <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />
      <meta name="description" content="asomi.mobi <?php echo $tittle; ?> offers large collection of mp3, jokes, photos" />
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
      <script src="/js/jquery-3.1.1.min.js"></script>
   <body class="">
      <section class="vbox">
         <?php $UI->Work("SMS"); ?> 
         <section>
            <section class="hbox stretch">
               <!-- .aside --> <?php $N->Worked();?>
                <?php if($page==1){?>
 <aside class="aside bg-light dk" id="sidebar"> 
 <section class="vbox animated fadeInUp"> 
     
 <section class="scrollable hover">
     
 <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto"> 
     <a class='list-group-item active'>Category</a>
 <?php $category->MainCategory(1); ?>
 </div> 
     <?php include 'fb.php';
                ?>
 </section> </section> </aside>
 <?php } ?>
               <!-- /.aside -->
               <section id="content">
                  <?php include 'fb.php';?>
                  <section class="vbox">
                     <section class="scrollable wrapper-lg">
                        <div class="row">
                          <h2 class="font-thin m-b">Latest Album
                <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span> 
                    <span class="bar5 a5 bg-danger dker"></span>
                </span></h2>     
                 
                 <?php 
                        foreach($ViewRs as $row){ 
                        $noimage = "geetanjali.jpg";
                        $image = (strlen($row['ART_LINK'])==14) ? $row['ART_LINK'] : $noimage;    
                        $cat = $category->loadvalue($row['CATEGORY_ID']);
                        $sname = str_replace(' ', '-', $row['ALBUM_NAME']);
                        $art = $Albums->ArtistByAlbumNoLink($row['ID'])
                        ?>
                        
        <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
        <div class='item'> <div class='pos-rlt'>
        <div class='item-overlay opacity r r-2x bg-danger'>
        <div class='center text-center m-t-n'>
            <a href='/files/<?php echo $row['ID'];?>/<?php echo $sname;?>.html'><i class='icon-control-play i-2x'></i></a>
        </div>
        <div class='bottom padder m-b-sm'></div>
                            
        </div>
        <div class='top'>
                    <span class='pull-left m-t-n-xs m-r-sm'>
                    <i class='fa fa-bookmark i-lg'></i> </span> 
                    </div>
                <a href='/files/<?php echo $row['ID'];?>/<?php echo $sname;?>.html'><img src='/image/<?php echo $image;?>' alt='' class='r r-2x img-full'></a>
            </div>
            <div class='padder-v'>
                            <a href="/files/<?php echo $row['ID'];?>/<?php echo $sname;?>.html" class="text-ellipsis"><?php echo $row['ALBUM_NAME'];?></a>
            <div class='text-ellipsis text-xs text-muted'><?php echo $art;?></div>
            
            </div>
        </div> </div>
                        <?php } ?>
                 
             <div class="row"> 

             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-t-lg m-b-lg"> 
                <?php
            $p = $page-1; 
            if($page>1){
            ?>
                 <a href="/assamese-songs/<?php echo $p;?>.html" class="btn btn-success btn-rounded pull-left">Previous</a>
            <?php
            };
            
            if($Total > $limit){
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                 <a href="/assamese-songs/<?php echo $n;?>.html" class="btn btn-success btn-rounded pull-right">Next</a>
            <?php
            }};
            ?>
                </div>
                </div>
                           
                           </div>
                        </div>
                     </section>
                  </section>
                  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                  <?php include 'fb.php';
                     ?>
               </section>
            </section>
         </section>
      </section>
      <!-- Bootstrap --> <!-- App -->
      <script src="/js/app.v1.js"></script>
      <script src="/js/app.plugin.js"></script>
</html>

