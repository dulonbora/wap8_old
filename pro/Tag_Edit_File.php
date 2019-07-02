
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

    
    <?php 
include 'getid3/getid3.php';

$id3 = new getID3;

$fileName = "-1";
$l = "-1";
if (isset($_GET['f'])){$fileName = $_GET['f'];}
if (isset($_GET['l'])){$l = $_GET['l'];}
    
$file = $fileName;
$path = $l.$fileName;
$natunNaam = str_replace('_', ' ', $fileName);
$nn= str_replace('.mp3', ' ', $natunNaam);

$redirect = "";


$tag = $id3->analyze( $path );
?>
    
    
    

                
                
                
                
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
<div class="col-lg-12">
                

                                
                            

                            </div>                            

                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                    <h5 class="font-bold"><?php echo $file;?></h5>
    
                                                                     <form action ="Tag_Edit_Post.php" method="post" class="" name = "form1">
  <div class="form-group pull-in clearfix">

<label>Title</label>
<input type = "text" name ="SONG_NAME" class="form-control" value="<?php echo $nn;?>"/>
 </div>

                                                                 <div class="form-group pull-in clearfix">

<label>Artist</label>
<input type = "text" name ="ARTIST" class="form-control" value="<?php echo $tag['id3v1']['artist'];?>"/>
 </div>

                                                                 <div class="form-group pull-in clearfix">

<label>Album</label>
<input type = "text" name ="ALBUM" class="form-control" value="<?php echo $tag['id3v1']['album'];?>" />
 </div>


<input type = "hidden" name ="URL" value="<?php echo $redirect ;?>" />
<input type = "hidden" name ="FILE_NAME" value="<?php echo $path ;?>" />
                                                                 <div class="form-group pull-in clearfix">

<input type = "submit" class="btn btn-danger" value="Rename">
</form>         

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
    <script src="../js/app.plugin.js"></script
</body>


</html>





