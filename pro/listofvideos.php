<?php
ob_start();
if (!isset($_SESSION)) {session_start();}
include '../classes/user.php';
$user = new user();
$user->RestrictUser();
?>
<!DOCTYPE html>

<html lang="en" class="app">

    <head>
        <meta charset="utf-8" />
        <title>Musik | Web Application</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" />
        <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    </head>
    <?php
    include '../classes/UI.php';
    include '../classes/NavBar.php';
    include '../classes/songsclass.php';
    $song = new Songs();
    $UI = new UI;
    $N = new NavBar;
    $dir_path = "../v/Data";
    ?>







    <body class="">
        <section class="vbox">
            <?php echo $UI->Work("VIDEO"); ?>

            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <?php echo $N->Admin(); ?>

                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">
                            <section class="scrollable wrapper">

                                <div class="row">


                                    <div class="wrapper">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <section class="panel panel-default"> <header class="panel-heading">Video List () <span id="fullPath"><?php echo $dir_path; ?></span>
                                                        <button class="btn btn-xs btn-danger pull-right">Manage Song</button>
                                                    </header> 
                                                    <div class="row wrapper"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class='btn-group btn-group-justified'>
                                                                <a class='btn btn-danger' href='SongUrlCopy.php?i=<?php echo $dir_path; ?>'>Url Copy</a>
                                                                <a class='btn btn-primary' href='SongDir.php'>Folder Copy</a>

                                                            </div> </div> </div> 

                                                    <?php

                                                    function listFolderFiles($dir_path) {
                                                        $ffs = scandir($dir_path);

                                                        function RenameFile($dir, $fileName) {

                                                            $oldName = str_replace('%20', '_', $fileName);
                                                            $oldNames1 = str_replace(' ', '_', $oldName);
                                                            $oldNames = str_replace('+', '_', $oldNames1);
                                                            $on = $dir . $fileName;
                                                            $newName = $dir . $oldNames;
                                                            if (strpos($fileName, ' ')) {
                                                                rename($on, $newName);
                                                            }
                                                        }
                                                        ?>                
                                                        <div class="table-responsive"> 
                                                            <table class="table table-striped b-t b-light">
                                                                <thead> 
                                                                    <tr class="bg bg-light"><td>NAME</td><td>Rename</td><td>Add To Db</td><tr> </thead>
                                                                <tbody id="SearchResult">
                                                                    <?php
                                                                    //$dir ="../apps/Assamese_Songs/".$l."/".$id."/";
                                                                    foreach ($ffs as $ff) {

                                                                        if ($ff != '.' && $ff != '..') {
                                                                            RenameFile($dir_path, $ff);
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $ff; ?></td><td><a href='File_Rename_Video.php?f=<?php echo $ff; ?>'>Rename</a></td>
                                                                                <td><a href='Add_db.php?l=<?php echo "http://asomi.mobi/v/Data/".$ff; ?>'>Add To DB</a></td>
                                                                            <tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                </tbody>
                                                            </table> </div> 
                                                        <?php
                                                    }

                                                    listFolderFiles($dir_path);
                                                    ?>
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

    </body>


</html>