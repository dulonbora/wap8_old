<?php
include '../classes/Videos.php';
include '../classes/categoryAdmin.php';
$albums = new Videos();
$id = (int) (!isset($_POST['id']) ? 1 : $_POST['id']);
$albums->loadvalue($id);
$category  = new Category();
?>

<div class="wrapper">
    <div id="errrror"></div>
    <div class="row">
        <form action="update_video_post.php" method="POST" id="fmenu" role="form">
                <div class="col-sm-12 form-group">
                <label>Name <?php echo $id;?></label>
                <input type="text" name="NAME" id="NAME" value="<?php echo $albums->getNAME();?>" placeholder="Name" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Rezolution</label>
                <input type="text" name="REG" id="REG" value="<?php echo $albums->getREG();?>" placeholder="Year" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Size</label>
                <input type="text" name="SIZE" id="SIZE" value="<?php echo $albums->getSIZE();?>" placeholder="Bitrate" class="input-sm form-control">
                </div>
            
                <div class="col-sm-6 form-group"> <label>Category</label> 
                    <select name="CATEGORY" id="CATEGORY" class="input-sm form-control">
                    <?php $category->LoadCategoryDropDown(1)?>
                                                 </select> </div>
            
            <div class="col-sm-6 form-group"> <label>Langguage</label> 
                    <select name="LANGGUAGE" id="LANGGUAGE" class="input-sm form-control">
                    <option class="form-control" value='1'>Assames</option>
                    <option class="form-control" value='0'>Hindi</option>
                    </select> </div>
                    
                <div class="col-sm-6 form-group">
                <label>Cast</label>
                <input type="text" name="CAST" id="CAST" value="<?php echo $albums->getCAST();?>" placeholder="Music By" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Director</label>
                <input type="text" name="DIRECTOR" id="DIRECTOR" value="<?php echo $albums->getDIRECTOR();?>" placeholder="Cover By" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Editors</label>
                <input type="text" name="EDITOR" id="EDITOR" value="<?php echo $albums->getEDITOR();?>" placeholder="Production" class="input-sm form-control">
                </div>
                    
                <div class="col-sm-12 form-group">
                <label>Link</label>
                <input type="text" name="LINK" id="LINK" value="<?php echo $albums->getLINK();?>" placeholder="Label" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Others</label>
                <input type="text" name="OTHER" id="OTHER" value="<?php echo $albums->getOTHER();?>" placeholder="Label" class="input-sm form-control">
                </div>                
                
                <div class="col-sm-12 form-group">
                <label>Singers</label>
                <input type="text" name="SINGER" id="SINGER" value="<?php echo $albums->getSINGER();?>" placeholder="Label" class="input-sm form-control">
                </div>                
                
                <div class="col-sm-12 form-group">
                <label>Song ID</label>
                <input type="text" name="SONG_ID" id="SONG_ID" value="<?php echo $albums->getSONG_ID();?>" placeholder="Label" class="input-sm form-control">
                </div>                
                
                
                <input type="text" name="ID" id="ID" value="<?php echo $id;?>" class="hidden">
                
                    <div class="col-sm-12 m-t-lg">
                        <input type="submit" id="updateSocial" value="Update" class="btn btn-primary btn-block "></div> 
                </form>
    </div>
    </div>