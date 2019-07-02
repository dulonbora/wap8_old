<?php
include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/Language.php';
$UI = new UI;
$N = new NavBar;
$L = new Language();
?>

<body class="">
    <section class="vbox">
<?php echo $UI->Work("AD TO ADB"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
<?php echo $N->Admin(); ?>


                <?php
                include '../classes/songsclass.php';
                include '../classes/AlbumsAdmin.php';
                include '../classes/categoryAdmin.php';
                include 'Mp3Tag.php';




                $fileName = "-1";
                $path = "-1";
                if (isset($_GET['f'])) {
                    $fileName = $_GET['f'];
                }
                if (isset($_GET['l'])) {
                    $path = $_GET['l'];
                }
                $file = $path . "/" . $fileName;
                $SongLink = $file;

                $t = new Tag;
                $t->LoadTag($file);
                $albm_id = 0;
                $img = "";
                $songs = new Songs();
                $cattegory = new Category();
                $albums = new Albums();
                ?>

                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">

                            <div class="container">
                                <div class="row">



                                    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $lgid = filter_input(INPUT_POST, 'LANGUAGE_ID');
                                            $cid = filter_input(INPUT_POST, 'CATEGORY_ID');
                                            $sn1 = filter_input(INPUT_POST, 'SONG_NAME');
                                            $sn =  str_replace('_', ' ', $sn1);
                                            $sl = filter_input(INPUT_POST, 'SONG_LINK');
                                            $gnr = filter_input(INPUT_POST, 'GENRE');
                                            $alname = filter_input(INPUT_POST, 'ALBUM_NAME');
                                            $yr = filter_input(INPUT_POST, 'YEAR');
                                            $artist = filter_input(INPUT_POST, 'ARTIST');

                                            function friendly_size($size, $round = 2) {
                                                $sizes = array(' Byts', ' Kb', ' Mb', ' Gb', ' Tb');
                                                $total = count($sizes) - 1;
                                                for ($i = 0; $size > 1024 && $i < $total; $i++) {
                                                    $size/=1024;
                                                }return round($size, $round) . $sizes[$i];
                                            }

//$size = friendly_size(filesize($file)); 
                                            $mp3_tagformat = 'UTF-8';
                                            require_once('getid3/getid3.php');

                                            $mp3_handler = new getID3;
                                            $mp3_handler->setOption(array('encoding' => $mp3_tagformat));
                                            require_once('getid3/write.php');
                                            $mp3_writter = new getid3_writetags;
                                            $mp3_writter->filename = $file;
                                            $mp3_writter->tagformats = array('id3v1', 'id3v2.3');
                                            $mp3_writter->overwrite_tags = true;
                                            $mp3_writter->tag_encoding = $mp3_tagformat;
                                            $mp3_writter->remove_other_tags = true;
                                            $mp3_data['title'][] = $sn;
                                            $mp3_data['artist'][] = $artist;
                                            $mp3_data['album'][] = $alname;
                                            $mp3_data['year'][] = $yr;
                                            $mp3_data['genre'][] = "rock";
                                            $mp3_data['comment'][] = "Asomi.mobi";
                                            $mp3_data['publisher'][] = "Asomi.mobi";
                                            $mp3_data['composer'][] = "Asomi.mobi";
                                            $mp3_data['band'][] = "Asomi.mobi";
                                            $mp3_data['commercial_information'][] = "Asomi.mobi";
                                            $mp3_data['url_user'][] = "Asomi.mobi";
                                            $mp3_data['track'][] = 0;
                                            $mp3_data['original_artist'][] = "Asomi.mobi";
                                            $mp3_data['copyright_message'][] = "Asomi.mobi";
                                            $mp3_data['encoded_by'][] = "Asomi.mobi";


                                            $mp3_data['attached_picture'][0]['data'] = "../image/geetanjali.jpg";
                                            $mp3_data['attached_picture'][0]['picturetypeid'] = "image/jpg";
                                            $mp3_data['attached_picture'][0]['description'] = "../image/geetanjali.jpg";
                                            $mp3_data['attached_picture'][0]['mime'] = "image/jpg";




                                            $mp3_writter->tag_data = $mp3_data;

                                            if ($mp3_writter->WriteTags()) {

                                                if ($albums->CheckAlreadyExit($alname) == 1) {
                                                    $albm_id = $albums->getID();
                                                    $img = $albums->getART_LINK();
                                                } else {
                                                    $albums->setLANGUAGE_ID($lgid);
                                                    $albums->setALBUM_NAME($alname);
                                                    $albums->setYEARS($yr);
                                                    $albums->setDESCRIPTION("");
                                                    $albums->setCATEGORY_ID($cid);
                                                    $albums->setMUSIC("");
                                                    $albums->setCOVER("");
                                                    $albums->setNEWOLD(0);
                                                    $albums->setSTATUS(1);
                                                    $albums->setART_LINK("geetanjali.jpg");
                                                    $albums->setBITRATE("");
                                                    $albums->setLABEL("");
                                                    $albums->setTOTAL_VIEW(1);
                                                    $albums->setCREATE_ON(time());
                                                    if ($albums->Insert() == 1) {
                                                        $albm_id = $albums->getID();
                                                        $img = "geetanjali.jpg";
                                                    }
                                                }

                                                $songs->setLANGUAGE_ID($lgid);
                                                $songs->setALBUM_ID($albm_id);
                                                $songs->setCATEGORY_ID($cid);
                                                $songs->setLYRIC_BY("");
                                                $songs->setMUSIC_BY("");
                                                $songs->setSONG_NAME($sn);
                                                $songs->setSONG_LINK($SongLink);
                                                $songs->setGENRE($gnr);
                                                $songs->setSITE_LINK("");
                                                $songs->setVIDEO_ID(1);
                                                $songs->setLYRIC_ID(1);
                                                $songs->setSEARCH_TAG(1);
                                                $songs->setTOTAL_PLAY(0);
                                                $songs->setIMAGE_LINK($img);
                                                $songs->setCREATE_BY(1);
                                                $songs->setCREATE_ON(time());
                                                $songs->setDESCRIPTION(1);
                                                if ($songs->CheckAlreadyExit($sn) != 1) {
                                                    if ($songs->Insert() == 1) {
                                                        
                                                        $last = $songs->getID();
                                                        if ($songs->UpdateSingle("ALBUM_ID", $last, $albm_id) == 1) {
                                                            echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> '
                                                            . '<i class="fa fa-ok-sign"></i><strong>Well done!</strong> You successfully Inserted</div>';
                                                         //   $songs->bitrate_c($SongLink);
                                                        }
                                                    } else {
                                                        echo '<div class="alert alert-danger"> '
                                                        . '<button type="button" class="close" data-dismiss="alert">×</button> '
                                                        . '<i class="fa fa-ok-sign"></i><strong>Well done!</strong> You Not successfully Inserted</div>';
                                                    }
                                                } else {
                                                    echo '<div class="alert alert-primary"> <button type="button" class="close" data-dismiss="alert">×</button>'
                                                    . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Song Already Exits</div>';
                                                }
                                            }
                                        }
                                        ?>
                                        <h5 class="font-bold">Add Song To Data Base <?php echo $fileName; ?></h5>
                                        <div class="">
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="" method="POST" name="formon">
                                                <div class="form-group">
                                                    <label>SONG_LINK</label> 
                                                    <input type="text" name="SONG_LINK" value="<?php echo $SongLink; ?>" class="form-control"   placeholder="SONG_LINK" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>SONG_NAME</label> 
                                                    <input type="text" name="SONG_NAME" value="<?php echo $t->getSongName(); ?>" class="form-control" placeholder="SONG_NAME">
                                                </div>
                                                <div class="form-group">
                                                    <label>ARTIST</label> 
                                                    <input type="text" name="ARTIST" value="<?php echo $t->getArtist(); ?>" class="form-control" placeholder="ARTIST NAME">
                                                </div>
                                                <div class="form-group">
                                                    <label>ALBUM_NAME</label> 
                                                    <input type="text" name="ALBUM_NAME" value="<?php echo $t->getAlbumName(); ?>" class="form-control" placeholder="ALBUM NAME">
                                                </div>
                                                <div class="form-group"> <label>Category</label> 
                                                    <select name="CATEGORY_ID" id="CATEGORY_ID" class="form-control">
<?php $cattegory->LoadCategoryDropDown(0); ?>
                                                    </select> </div>
                                                <div class="form-group"> <label>Language</label> 
                                                    <select name="LANGUAGE_ID" id="LANGUAGE_ID" class="form-control">
                                                        <?php $L->LoadLanguageDropDown(); ?>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>YEAR</label> 
                                                    <input type="text" name="YEAR" value="<?php echo $t->getYear(); ?>" class="form-control" placeholder="2016">
                                                </div>
                                                <div class="form-group">
                                                    <label>GENRE</label> 
                                                    <input type="text" name="GENRE" value="<?php echo $t->getGenere(); ?>" class="form-control" placeholder="GENRE">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Save" class="btn btn-success btn-block">
                                                </div>
                                            </form>         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>


</html>



