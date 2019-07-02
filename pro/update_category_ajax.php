<?php require_once '../classes/categoryAdmin.php';
$A = new Category();
$id = filter_input(INPUT_POST, 'id');
$A->loadvalue($id);

include '../classes/Language.php';
$l = new Language();
?>

                
<div class="wrapper"> <h4 class="m-t-none">Update Category</h4>
                <form  method="post" id="fmenu" role="form">
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="CATEGORY_NAME" id="CATEGORY_NAME" value="<?php echo $A->getCATEGORY_NAME();?>" placeholder="CATEGORY_NAME" class="input-sm form-control"> </div>
                <div class="form-group"> <label>DESCRIPTION</label>
                    <input type="text" name="DESCRIPTION" id="DESCRIPTION" value="<?php echo $A->getDESCRIPTION();?>" placeholder="DESCRIPTION" class="input-sm form-control"> </div>
                <div class="form-group"> <label>Language</label> 
                    <select name="LANG" id="LANG" class="form-control">
                    <?php $l->LoadLanguageDropDown();?>
                                                 </select>
                </div>
                <div class="form-group"> <label>Type</label> 
                    <select name="TYPE" id="TYPE" class="form-control">
                    <option class="form-control" value='0'>SONGS</option>
                    <option class="form-control" value='1'>VIDEOS</option>
                    <option class="form-control" value='2'>SMS</option>
                    <option class="form-control" value='3'>BLOG</option>
                    <option class="form-control" value='4'>PHOTOS</option>
                    </select> </div>
                    <div class="m-t-lg"><input type="submit" id="<?php echo $A->getID();?>" value="Add Album" class="btn btn-primary btn-rounded btn-block UpdateArtist"></div> 
                </form> </div>





