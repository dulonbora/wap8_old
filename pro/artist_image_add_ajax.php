<?php include '../classes/ArtistAdmin.php';
$id = filter_input(INPUT_POST, 'i');
$albums = new Artist();
$albums->loadvalue($id);
?>
<div class="wrapper">

<div id="imageview" class="text-center">
    <img class="text-center" src="../image/<?php echo $albums->getIMAGE_LINK();;?>" width="300" height="200"/>
</div>
    <form action="img_Upload_artist.php" method="POST" name="form2" id="uploadForm" enctype="multipart/form-data" role="form" > 
        <input type="text" name="ID" value="<?php echo $id;?>" class="form-control hidden">
    <div class="form-group">
        <label for="IMAGE_LINK">Select Image from your computer</label>
        <input type="file" id="file" name="IMAGE_LINK" value="" class="btn btn-info btn-block">
    </div>
    
    <div class="form-group">
    <input name="SUBMIT" type="submit" class="btn btn-success btn-block" id ="gallery" value="Upload Image<?php echo $id;?>">
    </div>
</form>
    </div>




        <script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#imageview').html('<img class="text-center" src="'+e.target.result+'" width="300" height="200"/>');
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