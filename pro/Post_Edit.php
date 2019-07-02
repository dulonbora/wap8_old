<?php
include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/JokesAdmin.php';
$UI = new UI;
$N = new NavBar;
$menu = new Jokes();
$id = filter_input(INPUT_GET, 'i');
$menu->loadvalue($id);
?>
<script src="../ckeditor/ckeditor.js"></script>
<style>
    @media screen and (min-width: 768px) {
        .modal-dialog {
            position:absolute;
            top:50% !important;
            transform: translate(0, -50%) !important;
            -ms-transform: translate(0, -50%) !important;
            -webkit-transform: translate(0, -50%) !important;
            margin:auto 5%;
            width:90%;
            height:80%;
        }
        .modal-content {
            min-height:100%;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            right:0; 
        }
        .modal-body {
            position:absolute;
            top:45px; // height of header
            bottom:45px;  // height of footer
            left:0;
            right:0;
            overflow-y:auto;
        }
        .modal-footer {
            position:absolute;
            bottom:0;
            left:0;
            right:0;
        }
    }
</style>
<body class="">
    <section class="vbox">
<?php echo $UI->Work("ADMIN"); ?>
        <section><section class="hbox stretch">
                <!-- .aside -->
<?php echo $N->Admin(); ?>
                <!-- /.aside -->
                <section id="content"><section class="vbox"><section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <section class="panel panel-info portlet-item">
                                        <header class="panel-heading">Edit Post</header>
                                        <section class="panel-body">
                                            <div class="form-group"> 
                                                <button class="btn btn-primary btn-rounded addimg" id="<?php echo $id; ?>"><i class="fa icon-picture"></i> Add Image</button>
                                                <button class="btn btn-primary btn-rounded pull-right addfile" id="<?php echo $id; ?>"><i class="fa icon-paper-clip"></i> Add File</button>
                                            </div>

                                            <form action="content_update_post.php" method="POST" name="fpost" role="form">
                                                <div class="form-group">
                                                    <input type="text" name="NAME" value="<?php echo $menu->getHEADLINE(); ?>" class="form-control" placeholder="Headline">
                                                    <input type="text" name="ID" value="<?php echo $id; ?>" class="form-control hidden" placeholder="Headline">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="PAGE_CONTENT" value="<?php echo $menu->getCONTENT(); ?>" class="form-control"><?php echo $menu->getCONTENT(); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Save changes" class="btn btn-success btn-rounded">
                                                    <a href="index.php" class="btn btn-danger btn-rounded pull-right">Cancel</a>
                                                </div>
                                            </form>
                                            <script>CKEDITOR.replace('PAGE_CONTENT');</script>
                                        </section></section></div>
                                <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                    <h5 class="bg-info wrapper-md r">Categories</h5>
                                    <ul class="list-group"><?php
                                   // $menu->LoadPostCategory(); 
                                    ?></ul>
                                    <section class="panel panel-default portlet-item">
                                        <header class="panel-heading">Related Posts</header>
                                        <section class="panel-body"><?php 
                                    //    $menu->LoadPostCategoryInAdmin($id);
                                        ?></section> </section>
                                </div>  
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="m-ttl">Are You Sure to Remove? <button  type="button" class="btn btn-danger pull-right" data-dismiss="modal">[X]</button></h4>
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


    <script>
        $(document).ready(function () {
            $(document).on("click", ".addimg", function () {
                $("#m-ttl").html("Add Image To Post")
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
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


            //--------------------------------------------------------------------------
            $(document).on("click", ".addfile", function () {
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
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


        });
    </script>
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>