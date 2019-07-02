<?php
include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/songsclass.php';
include '../classes/AlbumsAdmin.php';

$UI = new UI;
$N = new NavBar;
$AL = new Albums();
$songs = new Songs();
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
$Result = $songs->AllSongsByAlbum($page);
$songs->loadvalue($page);
$AL->loadvalue($songs->getALBUM_ID());
?>

<body class="">
    <section class="vbox">
<?php echo $UI->Work("CATEGORY"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
<?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel panel-default"> <header class="panel-heading">( <?php echo $songs->getALBUM_ID(); ?> )Songs List <button id="<?php echo $page; ?>" class="btn btn-xs btn-danger pull-right btnremove">Remove</button></header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="<?php echo $page; ?>" class="btn btn-sm btn-default EditAlbum">Edit Album</button>
                                                    <button id="<?php echo $page; ?>" class="btn btn-sm btn-default EditAlbumArt">Edit Album Art</button>

                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                    <input type="text" id="TF_SEARCH" class="input-sm form-control" placeholder="Search">
                                                    <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                    </span> </div> </div> </div> 
                                        <div class="table-responsive"> 
                                            <table class="table table-striped b-t b-light">
                                                <thead> 
                                                    <tr>
                                                        <th class="th-sortable" data-toggle="class">Song Name</th> 
                                                        <th class="">Category</th> 
                                                        <th class="">Album Name</th> 
                                                        <th class="">Image</th> 
                                                        <th class="text-center">Edit</th>  
                                                    </tr> </thead>
                                                <tbody id="SearchResult">
                                                    <?php foreach ($Result as $rows) {
; ?>
                                                        <tr>
                                                            <td><a href="manageartist.php?i=<?php echo $rows['ID']; ?>"><?php echo $rows['SONG_NAME']; ?></a></td>
                                                            <td><?php echo $rows['CATEGORY_ID'] . "/ " . $rows['ALBUM_ID']; ?> </td>
                                                            <td><?php echo $rows['ALBUM_ID']; ?></td>
                                                            <td><?php echo $rows['IMAGE_LINK']; ?> <b id="<?php echo $rows['ID']; ?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                                                            <td width="50">
                                                                <a href="song_edit.php?i=<?php echo $rows['ID']; ?>" class = "btn btn-link btn-sm viewBtn" >Update</a>
                                                            </td>
                                                        </tr>
<?php } ?>
                                                </tbody>
                                            </table> </div> 
                                    </section>
                                </div>
                            </div>
                            <div id="myModal" class="modal animated fadeInUp" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="m-ttl">Are You Sure to Remove? <button  type="button" class="btn btn-danger btn-rounded pull-right" data-dismiss="modal">[X]</button></h4>

                                        </div>
                                        <div id="statusresult">
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </section>

                    </section>
                </section>


            </section>

        </section>
    </section>
    <!-- Javascript -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#TF_SEARCH").keyup("keyup", function (e) {
                // Set Search String
                var search_string = $(this).val();
                // Do Search
                if (search_string !== '') {
                    $.ajax({
                        type: "POST",
                        url: "ajax/search_songs.php",
                        data: {str: search_string},
                        cache: false,
                        success: function (html) {
                            $("#SearchResult").html(html);
                        }
                    });
                }
                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function () {
    //------------------------------------------------------------------------------
    //add Category In Database Ajax
    //------------------------------------------------------------------------------
            $(document).on("click", "#addcat", function () {
                var vname = $("#name").val();
                var vis_menu = $("#is_menu").val();
                var vprentid = $("#prentid").val();
                var vis_navbar = $("#is_navbar").val();
                var vis_submenu = $("#is_submenu").val();
                var vis_publish = $("#is_publish").val();
                if (vname == '') {
                    $("#name").focus();
                    return;
                }
                else {
                    $.post("category_post.php", //Required URL of the page on server
                            {
                                NAME: vname,
                                PAGE: vis_menu,
                                NAVBAR: vis_navbar,
                                PUBLISH: vis_publish,
                                PARENT: vprentid,
                                SUBMENU: vis_submenu
                            },
                    function (response, status) { // Required Callback Function
                        $("#menuaside").hide(600);
                        $("#addmenuview").destroy();
                        window.location.reload();
                    });
                }
            });

    //------------------------------------------------------------------------------
    //click In Remove Category Button
    //------------------------------------------------------------------------------
            $(document).on("click", ".EditAlbum", function () {
                var id = $(this).attr("id");
                $("#m-ttl").html("Update Album ?" + '<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
                $.ajax({
                    type: "post",
                    url: "album_edit.php",
                    data: {id: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });

            $(document).on("click", ".EditAlbumArt", function () {
                var id = $(".EditAlbum").attr("id");
                $("#m-ttl").html("Update Album ?" + '<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
                $.ajax({
                    type: "post",
                    url: "image_add_ajax.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
    //------------------------------------------------------------------------------
    //Confirm To Remove
    //------------------------------------------------------------------------------
            $(document).on("click", ".ImageEditBtn", function () {
                var id = $(this).attr("id");
                $("#m-ttl").html("Update Album Image ?" + '<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
                $.ajax({
                    type: "post",
                    url: "song_image_add_ajax.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
    //------------------------------------------------------------------------------
    //Confirm To Remove
    //------------------------------------------------------------------------------
            $(document).on("click", ".btnremove", function () {
                var id = $(this).attr("id");
                $("#m-ttl").html("Are You Album Image ?" + '<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
                $.ajax({
                    type: "post",
                    url: "confirm_to_remove.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });

            $(document).on("click", ".comfirm", function () {
                var id = $(this).attr("id");
                $.ajax({
                    type: "post",
                    url: "album_remove.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $('#myModal').modal("hide");
                        window.location.replace('albumlist.php');
                    }
                });
            });


        });
    </script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>