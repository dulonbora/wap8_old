<?php ob_start(); 
$idi="-11";
if(isset($_GET['i'])){$idi = $_GET['i'];}
$id = (int) $idi;
include 'classes/NavBar.php';
$n = new NavBar;
include 'classes/UI.php';
$UI = new UI;
include 'classes/Jokes.php';
$jokes = new Jokes();
$jokes->loadvalue($id);
$tittle = $jokes->getHEADLINE();
$name = "BLOG";
date_default_timezone_set("Asia/Calcutta");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head><meta charset="utf-8" /><title><?php echo $tittle;?> | Asomi.Mobi</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/css/app.v1.css" type="text/css" />
    <script src="/js/jquery-3.1.1.min.js"></script>
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">

    <section class="vbox">
        <?php echo $UI->Work($name); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php $n->Worked()?>

                <!-- /.aside -->
                <section id="content">
                    <?php include 'fb.php'; ?>
                    <section class="vbox animated animated fadeInUp">
                        <section class="scrollable wrapper-lg">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-md-8 col-lg-8">

                                    <div class="blog-post">
                                        <div class="post-item">
                                            <div class="post-media"> <img style="max-height: 400px;" class="img-full" src="image/1473090102.jpg"> </div>
                                            <div class="caption wrapper-lg">

                                                <h2 class="post-title"><a href="#"><?php echo $jokes->getHEADLINE()?></a></h2>

                                                <div class="post-sum">
                                                    <p>
                                                        <?php echo $jokes->getCONTENT();?></p>

                                                </div>
                                                <div class="line line-lg"></div>
                                                <div class="text-muted">
                                                    <i class="fa fa-user icon-muted"></i> by
                                                    <a class="m-r-sm" href="#">
                                                        Admin</a>
                                                    <i class="fa fa-clock-o icon-muted"></i>
                                                    <?php $jokes->getPOST_ON();?> </div>
                                                
                                             <?php if($jokes->getCOMMENT()!=0){?> 
                                                                        <div class='line'></div>

            <button id="<?php echo $id;?>" class="btn btn-info btn-sm btn-rounded viewcomment">Click To View Comment</button>
                                        <button id="<?php echo $id;?>" class="btn btn-info btn-sm pull-right btn-rounded postcomment">Click To Post Comment</button>
                                             <?php }?>   

                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <div id="ResultMassage"></div>
                                    <div id="loadlist"></div>
                                    <div id="loadpost"></div>

                                    
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 animated animated fadeInRight">
                                    <h5 class="bg-info wrapper-md r hidden-sm hidden-xs">Categories</h5>
                                    <ul class="list-group hidden-sm hidden-xs">
                                        <li class="list-group-item">
                                            <a href="#">
                                                <span class="badge pull-right">15</span> Photograph </a>
                                        </li>
                                    </ul>

                                    <div class="panel panel-default animated fadeInUp">
                                     <div class="panel-heading">Suggestions</div>
                                         
                                          <?php $jokes->RelatedPOsts(0, $id);?> 
                                     </div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                    <?php include 'fb.php'; ?>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    
    
<script>
$(document).ready(function(){
    
    $(document).on("click", ".viewcomment", function(){
        var id = $(".viewcomment").attr("id");
        $.ajax({
            type: "post",
            url : "/comment_list_ajax.php",
            data : {i : id, type : "0"},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#loadlist").html(html);
                    
                }
        });
});
    
    $(document).on("click", ".postcomment", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "POST",
            url : "/comment_ajax.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#loadpost").html(html);
                    $(".postcomment").hide(600);
                }
        });
});
    
    
    
    $(document).on("click", ".PostcommentBtn", function(){
        var id = $(this).attr("id");
        var email = $("#EMAIL").val();
        var user = $("#USERNAME").val();
        var comment = $("#COMMENT").val();
        $.ajax({
            type: "POST",
            url : "/comment_ajax_post.php",
            data : {ID : id, TYPE : "0", EMAIL:email, USERNAME:user, COMMENT:comment},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#loadpost").hide(600);
                    
                    
                }
        });
        return false;
});
    
    
    
    
});
</script>
    <!-- App -->
    <script src="/js/app.v1.js"></script>
    <script src="/js/app.plugin.js"></script>
</body>
</html>