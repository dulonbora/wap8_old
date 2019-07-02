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
                            <div class="col-lg-6 col-lg-offset-3">
                                <?php
$dirrrr = "-1";
if (isset($_GET['i'])){$dirrrr = $_GET['i'];}

$dirName= "";
$path= "";
if($_SERVER['REQUEST_METHOD']=='POST'){
$dirName = str_replace(' ', '_', $_POST['dirname']);

$path = $_POST['PATH'];
$dir = "../Assamese_Songs/" .$path. "/" .$dirName."/";
if (mkdir($dir, 0777, true)) {
echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button>'
     . ' <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Folder created successfully</div>';
}
}
    $ffs = scandir("../Assamese_Songs/");

    
?>
                            

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
 <form name="form1" method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
    <div class="form-group">
         <label>Folder Name <?php echo $path.$dirName; ?></label>
            <input type="text" name="dirname" class="form-control" placeholder="Folder Name"> 
                    </div>

                    <div class="form-group">

            <label >Select Dir</label>
            <select name="PATH" class="form-control">
                <?php 
                foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            echo "<option value='" . $ff . "'>" . $ff . "</option>";
        }
         }
                ?>
            </select>   
                    </div>
        <div class="form-group">
    <button type="submit" class="btn btn-success">Create Folder</button> </div> 
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
   
</body>


</html>