<?php
include '../classes/categoryAdmin.php';
$category  = new Category();
?>

<div class="wrapper">
    <div id="errrror"></div>
    <div class="row">
        <form action="add_video_post.php" method="POST" id="fmenu" role="form">
                <div class="col-sm-12 form-group">
                <label>Name <?php echo $id;?></label>
                <input type="text" name="NAME" id="NAME" value="" placeholder="Name" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Rezolution</label>
                <input type="text" name="REG" id="REG" value="" placeholder="REG" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Size</label>
                <input type="text" name="SIZE" id="SIZE" value="" placeholder="SIZE" class="input-sm form-control">
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
                <input type="text" name="CAST" id="CAST" value="" placeholder="CAST" class="input-sm form-control">
                </div>
                
                <div class="col-sm-6 form-group">
                <label>Director</label>
                <input type="text" name="DIRECTOR" id="DIRECTOR" value="" placeholder="DIRECTOR" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Editors</label>
                <input type="text" name="EDITOR" id="EDITOR" value="" placeholder="EDITOR" class="input-sm form-control">
                </div>
                    
                <div class="col-sm-12 form-group">
                <label>Link</label>
                <input type="text" name="LINK" id="LINK" value="" placeholder="LINK" class="input-sm form-control">
                </div>
                
                <div class="col-sm-12 form-group">
                <label>Others</label>
                <input type="text" name="OTHER" id="OTHER" value="" placeholder="OTHER" class="input-sm form-control">
                </div>                
                
                <div class="col-sm-12 form-group">
                <label>Singers</label>
                <input type="text" name="SINGER" id="SINGER" value="" placeholder="SINGER" class="input-sm form-control">
                </div>                
                
                    <div class="col-sm-12 m-t-lg">
                        <input type="submit" id="AddVideo" value="Add Video" class="btn btn-primary btn-block "></div> 
                </form>
    </div>
    </div>