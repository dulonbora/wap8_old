<?php include './classes/NavBar.php';
$n = new NavBar;
include './classes/UI.php';
$UI = new UI;
include './classes/Albums.php';
$albums = new Albums();
include './classes/Category.php';
$category = new Category();
$name = "SONGS";
$titttle = "New Assamese Songs";

$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
$ci = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
$cname = strtolower($_GET['name']);
$Albums = new Albums();
$Total = $Albums->getTotalByAlbum($ci);
$limit = 12;
$TotalPage = ceil($Total/$limit);

if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;

$ViewRs = $Albums->AlbumByCat($start, $limit, $ci);

?>

<!DOCTYPE html>
<html lang="en" class="app">
    <head> <meta charset="utf-8" /> <title><?php echo $titttle;?> | Asomi.Mobi</title> 
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
 <link rel="stylesheet" href="/js/jPlayer/jplayer.flat.css" type="text/css" /> 
 <link rel="stylesheet" href="/css/app.v1.css" type="text/css" />
 <script src="/js/jquery-3.1.1.min.js"></script>

 </head>
    <body class="">
        <section class="vbox"> 
<?php $UI->Work("Songs"); ?> 

            <section> <section class="hbox stretch"> <!-- .aside --> 

<?php $n->Worked(); ?> 

                    <!-- /.aside --> 
                    <section id="content"> 
<?php include 'fb.php';
?>
                        <section class="vbox">
                                <section class="hbox stretch">

                                    <section> <section class="vbox">
                                            <section class="scrollable padder-lg"> 
                                                <h2 class="font-thin m-b">Latest Album
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
                        $image = (strlen($row['ART_LINK'])==14) ? $row['ART_LINK'] : $noimage;    
                        $cat = $category->loadvalue($row['CATEGORY_ID']);
                        $sname = strtolower(str_replace(' ', '-', $row['ALBUM_NAME']));
                        $art = $albums->ArtistByAlbumNoLink($row['ID'])
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
                <a href="/assamese-songs-category/<?php echo $ci;?>/<?php echo $p;?>/<?php echo $cname;?>" class="btn btn-success btn-rounded pull-left">Previous</a>
            <?php
            };
            
            if($Total > $limit){
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                <a href="/assamese-songs-category/<?php echo $ci;?>/<?php echo $n;?>/<?php echo $cname;?>" class="btn btn-success btn-rounded pull-right">Next</a>
            <?php
            }};
            ?>
                </div>
                </div>
             </div>
          
                
         </section>
            </section>
                </section>
                    </section>
                            </section>
            <?php include 'fb.php';?>
                    </section> 
                <aside class="aside bg-light dk hidden-sm hidden-xs" id="sidebar"> 
 <section class="vbox animated fadeInUp"> 
     
 <section class="scrollable hover">
     
 <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto"> 
     <a class='list-group-item active'>Category</a>
 <?php $category->MainCategory(1); ?>
 </div> 
     <?php include 'fb.php';
                ?>
 </section> </section> </aside>
                    
                </section> </section>
        </section> <!-- Bootstrap --> <!-- App --> <script src="/js/app.v1.js"></script>
        <script src="/js/app.plugin.js"></script>
    </body>
</html>
