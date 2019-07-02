<?php include '../classes/categoryAdmin.php';
include '../classes/Language.php';
$id = filter_input(INPUT_POST, 'i');
$cat = new Category();
$l = new Language();
?>
<div class="wrapper"> <h4 class="m-t-none">Add New Album</h4>
                <form  method="post" id="fmenu" role="form">
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="ALBUM_NAME" id="ALBUM_NAME" placeholder="Album Name" class="input-sm form-control"> </div>
                
                <div class="form-group"> <label>Year</label>
                    <input type="text" name="YEAR" id="YEAR" placeholder="Year" class="input-sm form-control"> </div>
                
                <div class="form-group"> <label>Language</label> 
                    <select name="LANGUAGE_ID" id="LANGUAGE_ID" class="form-control">
                    <?php $l->LoadLanguageDropDown();?>
                                                 </select>
                </div>
                <div class="form-group"> <label>Category</label> 
                    <select name="CATEGORY_ID" id="CATEGORY_ID" class="form-control">
                    <?php $cat->LoadCategoryDropDown(0);?>
                                                 </select> </div>
                    
                <div class="form-group"> <label>Type</label> 
                    <select name="NEWOLD" id="NEWOLD" class="form-control">
                    <option class="form-control" value='0'>New</option>
                    <option class="form-control" value='1'>Old</option>
                    <option class="form-control" value='2'>Upcoming</option>
                    <option class="form-control" value='3'>Fake</option>
                    </select> </div>
                    <div class="m-t-lg"><input type="submit" id="addmenu" value="Add Album" class="btn btn-primary btn-rounded btn-block"></div> 
                </form> </div>


