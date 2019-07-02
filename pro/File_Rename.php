<?php
include '../include/admin_header.php';
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
                <?php
                $path = "-1";
                if (isset($_GET['l'])) {
                    $path = $_GET['l'];
                    //$path = str_replace('../', '', $path1);

                }
                $fileName = "-1";
                if (isset($_GET['f'])) {
                    $fileName = $_GET['f'];
                }

                $file = $path."/".$fileName;

                $natunNaam = str_replace('  ', '_', $fileName);
                $nn = str_replace(' ', '_', $natunNaam);
                $nnn = str_replace('-', '_', $nn);

                
                
                ?>      
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    $getName = $_POST['natun'];
                    rename($file, $path."/".$getName);
                    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> '
                    . '<i class="fa fa-ok-sign"></i><strong>Well done!</strong> You successfully Renamed</div>';
                    
                }
                ?>
                                    <h5 class="font-bold"><?php echo $fileName; ?></h5>
                                    <form action ="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-group" name = "form1">
                                        <div class="form-group pull-in clearfix">                                                                              
                                            <input type = "text" name ="natun" class="form-control" value="<?php echo $nnn; ?>" placeholder="Create Directory">
                                            <input type = "submit" class="btn btn-danger" value="Rename">
                                        </div>
                                    </form>       
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



