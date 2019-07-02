<?php require_once '../classes/ArtistAdmin.php';
$A = new Artist();
$id = filter_input(INPUT_POST, 'id');
$A->loadvalue($id);
?>

<div class="wrapper"> <h4 class="m-t-none">Add New Artist</h4>
                <form  method="post" id="fmenu" role="form">
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="ARTIST_NAME" id="ARTIST_NAME" value="<?php echo $A->getARTIST_NAME();?>" placeholder="Artist Name" class="input-sm form-control"> </div>
                
                <div class="form-group"> <label>Born</label>
                    <input type="text" name="BORN_ON" id="BORN_ON" value="<?php echo $A->getBORN_ON();?>" placeholder="BORN_ON" class="input-sm form-control"> </div>
              
                <div class="form-group"> <label>Description</label>
                    <input type="text" name="DESCRIPTION" id="DESCRIPTION" value="<?php echo $A->getDESCRIPTION();?>" placeholder="DESCRIPTION" class="input-sm form-control"> </div>
                    
                    <div class="m-t-lg"><input type="submit" id="<?php echo $A->getID();?>" value="Add Album" class="btn btn-primary btn-rounded btn-block UpdateArtist"></div> 
                </form> </div>



