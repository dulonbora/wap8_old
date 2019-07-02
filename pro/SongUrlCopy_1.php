<?php set_time_limit(24 * 60 * 60); ?>
</center>




<!DOCTYPE html>

<html lang="en" class="app">

    <head>
        <meta charset="utf-8" />
        <title>Musik | Web Application</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

        <!-- adding jquery form plugin --> 
        <script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>

    </head>
    <?php
    include '../classes/UI.php';
    include '../classes/NavBar.php';
    include '../classes/songsclass.php';
    $song = new Songs();
    $UI = new UI;
    $N = new NavBar;
$id = "-1";
    $l = "-1";
    if (isset($_GET['i'])) {
    $id = $_GET['i'];
    }
    if (isset($_GET['l'])) {
    $l = $_GET['l'];
    }
    $dir_path = "../Assamese_Songs/" . $l . "/" . $id;
    $dir_pathshow = $l . "/" . $id;

    $destination_folder = $dir_path;
    $dir_path1 = "../Assamese_Songs/" . $l . "/" . $id."/";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        

        $url = $_POST['url'];
        //$newfname = $destination_folder . basename($url);
        $name = basename($url);
        $name1 = urldecode($name);
        //$name2 = str_replace(' ', '_', $name1);
        $oldNames = str_replace(' ', '_', $name1);
        $oldNames1 = str_replace('-', '_', $oldNames);
        $upload = file_put_contents($destination_folder."/$oldNames1",file_get_contents($url));
        //if($upload){echo 'Suucessfully Uploaded';}
        
        $file = fopen($url, "rb");
        if ($file) {
            $newf = fopen($oldNames1, "wb");
            if ($newf)
                while (!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
 
    }
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

                                    <div class="wrapper">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                                                <h3>Upload Mp3</h3>

                                                <h5>
<?php echo $dir_path;?> 
                                                    <a class="btn btn-sm btn-danger pull-right" href="SubDir.php?i=<?php echo $l; ?>">Back</a>
                                                </h5>                                                                                                
                                                <div class="form-group">
                                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                        <div class="form-group">
                                                            <input class="form-control" name="url" placeholder="url" />    
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="btn-default btn-primary btn-block" name="submit" type="submit" />
                                                        </div>
                                                    </form>
                                                </div>

                                                <!-- Area to display the percent of progress -->

                                                <div id='percent'></div>

                                                <!-- area to display a message after completion of upload --> 
                                                <div id='status'></div>  
                                            </div> 


                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <section class="panel panel-default"> <header class="panel-heading">Songs List () <span id="fullPath"><?php echo $dir_path; ?></span>
                                                        <button class="btn btn-xs btn-danger pull-right">Manage Song</button>
                                                    </header> 
                                                    <div class="row wrapper"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class='btn-group btn-group-justified'>
                                                                <a class='btn btn-danger' href='SongUrlCopy.php?i=<?php echo $dir_path; ?>'>Upload Via Url</a>
                                                                <a class='btn btn-primary' href='SongDir.php'>Folder Copy</a>

                                                            </div> </div> </div> 

                                                    <?php
                                                    
                                                    


                                                    function listFolderFiles($destination_folder) {
                                                        $ffs = scandir($destination_folder);
                                                        function RenameFile($destination_folder, $fileName){
$oldName = str_replace('%20', '_', $fileName);
$oldNames = str_replace(' ', '_', $oldName);
$on = $dir.$fileName;
$newName = $dir.$oldNames;
if(strpos($fileName, ' ')){
rename($on, $newName);
}
}
                                                        ?>                
                                                        <div class="table-responsive"> 
                                                            <table class="table table-striped b-t b-light">
                                                                <thead> 
                                                                    <tr class="bg bg-light"><td>NAME</td><td>Rename</td><td>Add To Db</td><td>Remove</td><tr> </thead>
                                                                <tbody id="SearchResult">
                                                                    <?php
                                                                    //$dir ="../apps/Assamese_Songs/".$l."/".$id."/";
                                                                    foreach ($ffs as $ff) {

                                                                        if ($ff != '.' && $ff != '..') {
                                                                            RenameFile($destination_folder, $ff);
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $ff; ?></td>
                                                                                <td><a href='File_Rename.php?l=<?php echo $dir_path; ?>&f=<?php echo $ff; ?>'>Rename</a></td>
                                                                                <td><a href='Add_db.php?l=<?php echo $dir_path; ?>&f=<?php echo $ff; ?>'>Add To DB</a></td>
                                                                                <td class="btn-danger btn-sm"><a href='Remove_Song.php?l=<?php echo $dir_path; ?>&f=<?php echo $ff; ?>'>REMOVE</a></td>

                                                                            <tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                </tbody>
                                                            </table> </div> 
                                                        <?php
                                                    }

                                                    listFolderFiles($destination_folder);
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
