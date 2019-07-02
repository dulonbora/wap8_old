<?php
include '../classes/AlbumsAdmin.php';
include '../classes/categoryAdmin.php';
include '../classes/Language.php';
$albums = new Albums();
$id = (int) (!isset($_POST['id']) ? 1 : $_POST['id']);
$albums->loadvalue($id);
$category  = new Category();
$L  = new Language();
?>

<div class="wrapper">
    <div id="errrror"></div>
    <div class="row">
        <form action="album_update.php" method="POST" id="fmenu" role="form">
                <div class="col-sm-12 form-group">
                <label>Name <?php echo $id;?></label>
                <input type="text" name="ALBUM_NAME" id="ALBUM_NAME" value="<?php echo $albums->getALBUM_NAME();?>" placeholder="Name" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Year</label>
                <input type="text" name="YEAR" id="YEAR" value="<?php echo $albums->getYEAR();?>" placeholder="Year" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Bitrate</label>
                <input type="text" name="BITRATE" id="BITRATE" value="<?php echo $albums->getBITRATE();?>" placeholder="Bitrate" class="input-sm form-control">
                </div>
            
                <div class="col-sm-6 form-group"> <label>Category</label> 
                    <select name="CATEGORY" id="CATEGORY" class="input-sm form-control">
                    <?php $category->LoadCategoryDropDown(0);?>
                                                 </select> </div>
            
            <div class="col-sm-6 form-group"> <label>Langguage</label> 
                    <select name="LANGGUAGE" id="LANGGUAGE" class="input-sm form-control">
                                        <?php $L->LoadLanguageDropDown();?>
                    </select> </div>
                    
                <div class="col-sm-6 form-group">
                <label>Music By</label>
                <input type="text" name="MUSIC" id="MUSIC" value="<?php echo $albums->getMUSIC();?>" placeholder="Music By" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Cover By</label>
                <input type="text" name="COVER" id="COVER" value="<?php echo $albums->getCOVER();?>" placeholder="Cover By" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Production</label>
                <input type="text" name="PRODUCTION" id="PRODUCTION" value="<?php echo $albums->getPRODUCTION();?>" placeholder="Production" class="input-sm form-control">
                </div>
                    
                <div class="col-sm-12 form-group">
                <label>Label</label>
                <input type="text" name="LABEL" id="LABEL" value="<?php echo $albums->getLABEL();?>" placeholder="Label" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Description</label>
                <input type="text" name="DESCRIPTION" id="DESCRIPTION" value="<?php echo $albums->getDESCRIPTION();?>" placeholder="Label" class="input-sm form-control">
                </div>                
                
                <div class="col-sm-6 form-group"> <label>Status</label> 
                    <select name="STATUS" id="STATUS" class="input-sm form-control">
                    <option class="form-control" value='1'>Approved</option>
                    <option class="form-control" value='0'>Disapproved</option>
                    </select> </div>
            
                <div class="col-sm-6 form-group"> <label>Type</label> 
                    <select name="NEW" id="NEW" class="input-sm form-control">
                    <option class="form-control" value='0'>New</option>
                    <option class="form-control" value='1'>Old</option>
                    <option class="form-control" value='2'>Upcoming</option>
                    <option class="form-control" value='3'>Fake</option>
                    </select> </div>
                <input type="text" name="ID" id="ID" value="<?php echo $id;?>" class="hidden">
                
                
                    <div class="col-sm-12 m-t-lg">
                        <input type="submit" id="updateSocial" value="Update" class="btn btn-primary btn-block "></div> 
                </form>
    </div>
    </div>