
<?php
$id = "-1";
if (isset($_GET['i'])){$id = $_GET['i'];}
?>
<?php include '../include/admin_header.php';
include '../classes/NavBar.php'; 
include '../classes/UI.php'; 
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
                                    
                                    
    <?php
    $dir ="../Assamese_Songs/".$id."/";
    function listFolderFiles($dir, $id){
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
                                    <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel panel-default"> <header class="panel-heading"><?php echo $id;?> List ()
                                            <button class="btn btn-xs btn-danger pull-right">Manage Song</button>
                                        </header> 
                                        <div class="row wrapper"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <div class='btn-group btn-group-justified'>
                                  <a class='btn btn-success' href='CreateDir.php?i=<?php echo $id; ?>'>Create</a>
                                  <a class='btn btn-danger' href='File_upload.php?i=<?php echo $id; ?>'>Up Zip</a>
                                  <a class='btn btn-primary' href='SongDir.php'>Back</a>
                                      
                              </div> </div> </div> 
                                        
                                        
                                    <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr class="bg bg-light"><td>NAME</td><td>Rename</td><td>Remove</td><tr> </thead>
                                        <tbody id="SearchResult">
                                        <?php          
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            RenameFile($dir, $ff);
          echo "<tr><td><a href='LastSongDir.php?i=".$ff."&l=".$id."'>" . $ff . "</a></td>"
                  . "<td><a href='ReName_Dir.php?i=".$ff."&l=".$id."'>Rename</a></td>"
                  . "<td><a href='ReMoveDir.php?i=".$ff."&l=".$id."'>Remove</a></td><tr>";} 
    }?>
                                        </tbody>
                                        </table> </div> 
    
<?php

        }

listFolderFiles($dir,$id);

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
    <script src="../js/app.plugin.js"></script>
</body>


</html>

























