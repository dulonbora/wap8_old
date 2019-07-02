
<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 

$UI = new UI;
$N = new NavBar;
$path = "-1";
if (isset($_GET['l'])) {
    $path = $_GET['l'];
    //$path = str_replace('../', '', $path1);
}
$fileName = "-1";
if (isset($_GET['f'])) {
    $fileName = $_GET['f'];
}

if (isset($_GET['i']) == true) {
    $id = $_GET['i'];
}




?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Workl("ADMIN"); ?>

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
        if (unlink($path."/".$fileName)) {
    echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Successfully Removed</strong></div>';
    }
        ?>
        </div></div></section></section>
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