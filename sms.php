<!DOCTYPE html>

<?php
include './classes/Jokes.php';
$jokes = new Jokes();
include './classes/NavBar.php';
$n = new NavBar;
include './classes/UI.php';
$UI = new UI;
$name = "SMS";

$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
$Total = $jokes->getTotal(0);
$limit = 10;
$TotalPage = ceil($Total/$limit);

if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;
$ViewRs = $jokes->AllFecth($start, $limit, 0);

?>



<html lang="en" class="app">
    
<head> <meta charset="utf-8" /> <title>Assamese Sms | Asomi.Mobi</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" />
<body class="">
    <section class="vbox">
            <?php $UI->Work("SMS"); ?> 
            <section>
         <section class="hbox stretch"> <!-- .aside --> <?php $n->Worked();?> <!-- /.aside -->
             <section id="content"> 
                 <?php include 'fb.php';?>
            <section class="vbox">
            <section class="scrollable wrapper-lg">
            <div class="row"> <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"> 
                    <h5 class="bg-info font-bold wrapper-md r">Jokes <b class="fa fa-comments text-default pull-right"></b></h5>
            <div class="blog-post"> 
                        <?php 
                        foreach($ViewRs as $row){ 
                        $noimage = "geetanjali.jpg";
                        $image = (strlen($row['IMG_LINK'])==14) ? $row['IMG_LINK'] : $noimage;
                        $s = $jokes->substrwords($row['CONTENT'], 150, "");
                        $sname = strtolower(str_replace(' ', '-', $row['HEADLINE']));

                        ?>                                
<div class="post-item"> <div class="post-media">  </div>
 <div class="caption wrapper-lg"> <h2 class="post-title">
         <a href='view/<?php echo $row['ID'];?>/<?php echo $sname;?>.html'><?php echo $row['HEADLINE'];?></a></h2> 
<div class='post-sum'> <p><?php echo $s;?></p> </div>
<div class="line line-lg"></div> <div class="text-muted"> <i class="fa fa-user icon-muted">
</i> by <a class="m-r-sm" href="#"><?php echo $row['ID'];?></a> <i class="fa fa-clock-o icon-muted">
</i> Feb 20, 2013 <a class="m-l-sm" href="#"><i class="fa fa-comment-o icon-muted">
</i> 2 comments</a> </div> </div> </div>
                         <?php } ?>
 <div class="text-center m-t-lg m-b-lg">
            <?php $p = $page-1; if($page>1){?>
     <a href="blog.php?page=<?php echo $p;?>" class="btn btn-success btn-rounded pull-left"><b class="fa fa-arrow-left text-default"></b></a>
            <?php }; if($Total > $limit){$n = $page+1; if($page<$TotalPage){ ?>
     <a href="blog.php?page=<?php echo $n;?>" class="btn btn-success btn-rounded pull-right"><b class="fa fa-arrow-right text-default"></b></a>
            <?php }}; ?>
 </div>
                                                </div>  
                                                
                                            </div> 
                
                <div class="col-md-4 col-lg-4 hidden-sm hidden-xs">
                                 <h5 class="bg-warning wrapper-md font-bold r">Categories <b class="fa fa-leaf text-default pull-right"></b></h5>
                                 <ul class="list-group">
                                     <li class="list-group-item"> <a href="#">Travel world</a> </li> 
                                 </ul>  
                                            
                                            <h5 class="bg-danger wrapper-md font-bold r">Recent Jokes <b class="fa fa-meh-o text-default pull-right"></b></h5> 
                                            
                                            <div> 
                                           <?php $jokes->AllFecthLimit(0, 10);?>     
   </div> </div> </div> </section> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
             <?php include 'fb.php';
                ?>
             </section> </section> </section> </section> <!-- Bootstrap --> <!-- App --> 
             <script src="/js/app.v1.js"></script> <script src="/js/app.plugin.js"></script>
</body>
</html>






    
  
