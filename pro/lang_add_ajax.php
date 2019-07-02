<?php include '../classes/categoryAdmin.php';
$id = filter_input(INPUT_POST, 'i');
$cat = new Category();
?>
<div class="wrapper"> <h4 class="m-t-none">Add New Language</h4>
                <form  method="post" id="fmenu" role="form">
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="LANGU_NAME" id="LANGU_NAME" placeholder="Language Name" class="input-sm form-control"> </div>
                
                
                    <div class="m-t-lg"><input type="submit" id="addlanguage" value="Add New" class="btn btn-primary btn-rounded btn-block"></div> 
                </form> </div>


