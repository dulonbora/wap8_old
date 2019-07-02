<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/songsclass.php'; 

$UI = new UI;
$N = new NavBar;
$songs = new Songs();
$id = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
$songs->loadvalue($id);



?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                        <?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            
                            <div class="row">
        <div class="col-sm-12">
        <?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
$lgid = filter_input(INPUT_POST, 'LANGUAGE_ID');
$aid = filter_input(INPUT_POST, 'ALBUM_ID');
$cid = filter_input(INPUT_POST, 'CATEGORY_ID');
$lyid = filter_input(INPUT_POST, 'LYRIC_BY');
$mby = filter_input(INPUT_POST, 'MUSIC_BY');
$sn = filter_input(INPUT_POST, 'SONG_NAME');
$sl = filter_input(INPUT_POST, 'SONG_LINK');
$gnr = filter_input(INPUT_POST, 'GENRE');
$sil = filter_input(INPUT_POST, 'SITE_LINK');
$vid = filter_input(INPUT_POST, 'VIDEO_ID');
$lycid = filter_input(INPUT_POST, 'LYRIC_ID');
$st = filter_input(INPUT_POST, 'SEARCH_TAG');
$des = filter_input(INPUT_POST, 'DESCRIPTION');

$songs->setLANGUAGE_ID($lgid);
$songs->setALBUM_ID($aid);
$songs->setCATEGORY_ID($cid);
$songs->setLYRIC_BY($lyid);
$songs->setMUSIC_BY($mby);
$songs->setSONG_NAME($sn);
$songs->setSONG_LINK($sl);
$songs->setGENRE($gnr);
$songs->setSITE_LINK($sil);
$songs->setVIDEO_ID($vid);
$songs->setLYRIC_ID($lycid);
$songs->setSEARCH_TAG($st);
$songs->setDESCRIPTION($des);
if($songs->Update($id)==1){
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Well done!</strong> You successfully Updated</div>';
}
 else {
        echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Wrong Not Updated</strong></div>';

};

}
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="formon" role="form" class="form-horizontal"> 
        <section class="panel panel-success"> 
            <header class="panel-heading bg-danger"> <strong><?php echo $songs->getSONG_NAME(); ?> <span id="songid"><?php echo $id;?></span></strong></header>
        <div class="panel-body"> 
        <div class="form-group"> <label class="col-sm-2 control-label">Song Name</label> <div class="col-sm-10"> 
                <input type="text" name="SONG_NAME" value="<?php echo $songs->getSONG_NAME();?>" class="form-control" placeholder="SONG_NAME"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Category</label> <div class="col-sm-10"> 
                <input type="text" name="CATEGORY_ID" value="<?php echo $songs->getCATEGORY_ID();?>" class="form-control" placeholder="CATEGORY_ID">
                </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Song Link</label> <div class="col-sm-10"> 
                <input type="text" name="SONG_LINK" value="<?php echo $songs->getSONG_LINK();?>" class="form-control" placeholder="SONG_LINK"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Site Name</label> <div class="col-sm-10"> 
                <input type="text" name="SITE_LINK" value="<?php echo $songs->getSITE_LINK();?>" class="form-control" placeholder="SITE_LINK"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Lyric By</label> <div class="col-sm-10"> 
                <input type="text" name="LYRIC_BY" value="<?php echo $songs->getLYRIC_BY();?>" class="form-control" placeholder="LYRIC_BY"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Lyric ID</label> <div class="col-sm-10"> 
                <input type="text" name="LYRIC_ID" value="<?php echo $songs->getLYRIC_ID();?>" class="form-control" placeholder="LYRIC_ID"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Music by</label> <div class="col-sm-10"> 
                <input type="text" name="MUSIC_BY" value="<?php echo $songs->getMUSIC_BY();?>" class="form-control" placeholder="MUSIC_BY"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Genere</label> <div class="col-sm-10"> 
                <input type="text" name="GENRE" value="<?php echo $songs->getGENRE();?>" class="form-control" placeholder="GENRE"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Video ID</label> <div class="col-sm-10"> 
                <input type="text" name="VIDEO_ID" value="<?php echo $songs->getVIDEO_ID();?>" class="form-control" placeholder="VIDEO_ID"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Album</label> <div class="col-sm-10"> 
                <input type="text" name="ALBUM_ID" value="<?php echo $songs->getALBUM_ID();?>" class="form-control" placeholder="ALBUM_ID"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Search Tag</label> <div class="col-sm-10"> 
                <input type="text" name="SEARCH_TAG" value="<?php echo $songs->getSEARCH_TAG();?>" class="form-control" placeholder="SEARCH_TAG"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Description</label> <div class="col-sm-10"> 
                <input type="text" name="DESCRIPTION" value="<?php echo $songs->getDESCRIPTION();?>" class="form-control" placeholder="DESCRIPTION"> </div> </div>
        </div> 
        <footer class="panel-footer text-right bg-light lter"> <button type="submit" class="btn btn-success btn-s-xs">Submit</button> </footer>
        </section></form></div></div></section></section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
            <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="m-ttl">Are You Sure to Remove ? <button  type="button" class="btn btn-danger pull-right" data-dismiss="modal">[X]</button></h4>
                                </div>
                                <div id="statusresult">
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </section>
    
 
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>