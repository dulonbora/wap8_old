<?php
include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php';
include '../classes/JokesAdmin.php';
$UI = new UI;
$menu = new Jokes();
$N = new NavBar;
?>
<script src="../ckeditor/ckeditor.js"></script>
<body class=""><section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>
        <section><section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div id="statusresult"></div></div></div></div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <h5 class="bg-info wrapper-md r">Categories</h5>
                                    <div id="success"></div>
                                    <div class="">            
                                        <form method="POST" name="fpost" id="fpost"  role="form">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" value="" class="form-control" placeholder="Headline"></div>
                                            
                                            <div class="form-group">
                                                <textarea id="post_content" name="post_content"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input id="save" type="submit" value="Save changes" class="btn btn-success">    
                                                <a id="cancel" href="index.php" class="btn btn-default pull-right">Cancel</a>

                                            </div>
                                        </form>
                                        <script>CKEDITOR.replace('post_content');</script>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                    <h5 class="bg-info wrapper-md r">Categories</h5>
                                    <ul class="list-group"><?php
                                  //  $menu->LoadPostCategory();
                                    ?></ul>
                                    <section class="panel panel-default portlet-item">
                                        <header class="panel-heading">Related Posts</header>
                                        <section class="panel-body"><?php
                                    //    $menu->LoadRelatedPostsInAdmin(1); 
                                        ?></section> </section>
                                </div>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section></section></section></section>
    <script>
        $(document).ready(function () {

            $(document).on("click", "#save", function () {
                var vname = $("#name").val();
                var vcontent = CKEDITOR.instances.post_content.getData();
                var vprentid = $("#prentid").val();
                var vis_publish = 1;
                if (vname == '') {
                    $("#name").focus();
                    return false;
                }
                else {
                    $.post("Post_Add.php", //Required URL of the page on server
                            {
                                NAME: vname,
                                PUBLISH: vis_publish,
                                PARENT: vprentid,
                                CONTENT: vcontent
                            },
                    function (response, status, e) { // Required Callback Function
                        $("#fpost")[0].reset();
                        CKEDITOR.instances.post_content.setData("")
                        $("#success").load("massage_success.php", 800);
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    });
                }
                return false;
            });
            
            
            $(document).on("click", "#draft", function () {
                var vname = $("#name").val();
                var vcontent = CKEDITOR.instances.post_content.getData();
                var vprentid = $("#prentid").val();
                var vis_publish = 0;
                if (vname == '') {
                    $("#name").focus();
                    return false;
                }
                else {
                    $.post("Post_Add.php", //Required URL of the page on server
                            {
                                NAME: vname,
                                PUBLISH: vis_publish,
                                PARENT: vprentid,
                                CONTENT: vcontent
                            },
                    function (response, status, e) { // Required Callback Function
                        $("#fpost")[0].reset();
                        CKEDITOR.instances.post_content.setData("")
                        $("#success").load("massage_success.php", 800);
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    });
                }
                return false;
            });

            
        });
    </script>
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>