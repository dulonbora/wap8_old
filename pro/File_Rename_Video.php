>

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

$baseFolder ="../v/Data";

$fileName = "-1";
if (isset($_GET['f'])){$fileName = $_GET['f'];}


$file = $baseFolder."/".$fileName;
$natunNaam = str_replace('-', '_', $fileName);

if($_SERVER['REQUEST_METHOD']=='POST'){
$getName = $_POST['natun'];
if(rename($file, $baseFolder ."/".$getName)){
$url = "list.php";
pageRedirect($url);

}
}

function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}

?>
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                    <h5 class="font-bold"><?php echo $file; ?></h5>
                                    <form action ="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-group" name = "form1">
                                        <div class="form-group pull-in clearfix">                                                                              
                                            <input type = "text" name ="natun" class="form-control" value="<?php echo $natunNaam; ?>" placeholder="Create Directory">
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




