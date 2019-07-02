


<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
$UI = new UI;
$N = new NavBar;
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
                                <div class="col-lg-12">
                                    
                                    
                                    <?php
                                    
$dir ="../Assamese_Songs/";

function listFolderFiles($dir){
    $ffs = scandir($dir);
function RenameFile($dir, $fileName){
$oldName = str_replace('%20', '_', $fileName);
$oldNames = str_replace(' ', '_', $oldName);
$on = $dir.$fileName;
$newName = $dir.$oldNames;
if(strpos($fileName, ' ')){
rename($on, $newName);
}
}
    ?>
                                    <div class="table-bordered"><table class="table">
                                            <tr class="bg bg-light"><td>NAME <a class="btn btn-xs btn-info pull-right" href="createRotDir.php">New Create Folde</a></td><tr>
              <?php                      
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
                        RenameFile($dir, $ff);

          echo "<tr><td><a href='SubDir.php?i=" . $ff . "'>" . $ff . "</a> <a class='btn btn-xs btn-danger pull-right' href='remove_root_dir.php?l=" . $ff . "'>Remove</a></td><tr>";

          
        }
    }

    ?>
    
</table>

      </div>
<?php

        }

listFolderFiles($dir);

?>                           
 
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
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/app.plugin.js"></script>
    <script type="text/javascript" src="../js/jPlayer/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="../js/jPlayer/add-on/jplayer.playlist.min.js"></script>
    <script type="text/javascript" src="../js/jPlayer/demo.js"></script>
</body>


</html>

