<?php 
include '../classes/songsclass.php';
include '../classes/AlbumsAdmin.php';
include '../classes/categoryAdmin.php';
include 'Mp3Tag.php';


        

$fileName = "-1";
$path = "-1";
if (isset($_GET['f'])){$fileName = $_GET['f'];}
if (isset($_GET['l'])){$path = $_GET['l'];}
$file = $path."".$fileName;
$SongLink = str_replace("../", "", $file);

$t = new Tag;
$t->LoadTag($file);
$albm_id = 0;
$img = "";
$songs = new Songs();
$cattegory = new Category();
$albums = new Albums();
?>

<div class="">
                                    
                                    
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="" method="POST" name="formon">
                                 <div class="form-group">

            
                    <input type="text" name="SONG_LINK" value="<?php echo $SongLink; ?>" class="form-control" placeholder="SONG_LINK">
                             </div>
                                 <div class="form-group">

                    <input type="text" name="SONG_NAME" value="<?php echo $t->getSongName(); ?>" class="form-control" placeholder="SONG_NAME">
                             </div>
                                 <div class="form-group">

                    <input type="text" name="ALBUM_NAME" value="<?php echo $t->getAlbumName(); ?>" class="form-control" placeholder="ALBUM">
                             </div>
                            <div class="form-group"> <label>Category</label> 
                    <select name="CATEGORY_ID" id="CATEGORY_ID" class="form-control">
                    <?php $cattegory->LoadCategoryDropDown()?>
                                                 </select> </div>
                            <div class="form-group"> <label>Language</label> 
                    <select name="LANGUAGE_ID" id="LANGUAGE_ID" class="form-control">
                    <option class="form-control" value='1'>Assamese</option>
                    <option class="form-control" value='2'>Hindi</option>
                                                 </select>
                </div>
                                 
                                 <div class="form-group">

                    <input type="text" name="YEAR" value="<?php echo $t->getYear(); ?>" class="form-control" placeholder="2016">
                             </div>
                                 <div class="form-group">

                    <input type="text" name="GENRE" value="<?php echo $t->getGenere(); ?>" class="form-control" placeholder="GENRE">
                             </div>
                                 <div class="form-group">

               <input type="submit" value="Save" class="btn btn-success btn-block">
            
            
             </div>
    </form>         
 
                                </div>