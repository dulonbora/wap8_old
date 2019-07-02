<?php include '../../classes/Menu.php';
$id = filter_input(INPUT_POST, 'i');
?>
<div class="col-sm-8 col-sm-offset-2">
    <h3 class="text-center text-info">Add Image</h3>
<div id="imageview" class="text-center">

</div>
<form action="img_Upload.php" method="POST" name="form2" id="uploadForm" enctype="multipart/form-data" role="form" > 
    <div class="form-group">
        <label for="CAPTIONS">Caption</label>
                <input type="text" name="IMG_DESCRIPTIONS" value="" class="form-control hidden" placeholder="DESCRIPTIONS">
        <input type="text" name="IMG_CAPTION" value="" class="form-control" placeholder="CAPTIONS">
        <input type="text" name="POST_ID" value="<?php echo $id;?>" class="form-control hidden">
        <input type="text" name="CATEGORY_ID" value="0" class="form-control hidden">
    </div>
    <div class="form-group">
        <label for="IMAGE_LINK">Select Image from your computer</label>
        <input type="file" id="file" name="IMAGE_LINK" value="" class="btn btn-info btn-block">
    </div>
    
    <div class="form-group">
    <input name="SUBMIT" type="submit" class="btn btn-success btn-block" id ="gallery" value="Upload Image">
    </div>
</form>


</div>


        <script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#imageview').html('<img class="text-center" src="'+e.target.result+'" width="300" height="180"/>');
            //$('#uploadForm + embed').remove();
            //$('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>