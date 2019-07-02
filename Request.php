<!DOCTYPE html>

<?php
include './classes/Jokes.php';
$jokes = new Jokes();
include './classes/NavBar.php';
$n = new NavBar;
include './classes/UI.php';
$UI = new UI;
$name = "SMS";

$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
$Total = $jokes->getTotal(0);
$limit = 10;
$TotalPage = ceil($Total / $limit);

if (($page + 1) == $TotalPage) {
    $page == 0;
}
$start = ($page - 1) * $limit;
$ViewRs = $jokes->AllFecth($start, $limit, 0);
?>

<?php
include './classes/Language.php';
$l = new Language();
?>

<html lang="en" class="app">

    <head> <meta charset="utf-8" /> <title>Requset Songs | Asomi.Mobi</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
        <script src="js/jquery-3.1.1.min.js"></script>

    <body class="">
        <section class="vbox">
<?php $UI->Work("Request"); ?> 
            <section>
                <section class="hbox stretch"> <!-- .aside --> <?php $n->Worked(); ?> <!-- /.aside -->
                    <section id="content"> 
<?php include 'fb.php'; ?>
                        <section class="vbox">
                            <section class="scrollable wrapper-lg">
                                <div class="row"> <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"> 
                                        <div id="ResultMassage"></div>
        <form action="" method="POST" name="formon" role="form" class="form-horizontal"> 
        <section class="panel panel-success"> 
            <header class="panel-heading bg-danger"> <strong>Request From <span id="songid"></span></strong></header>
        <div class="panel-body"> 
            
        <div class="form-group"> <label class="col-sm-2 control-label">Select Langguage</label> <div class="col-sm-10"> 
                <select name="LNG" id="LNG" class="form-control">
                    <?php $l->LoadLanguageDropDownIndex();?>
                                                 </select> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Movies / Album Name</label> <div class="col-sm-10"> 
                <input type="text" id="NAME" name="NAME" value="" class="form-control" placeholder="Movies / Album Name"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Email</label> <div class="col-sm-10"> 
                <input type="text" id="EMAIL" name="EMAIL" value="" class="form-control" placeholder="Email"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Describtion</label> <div class="col-sm-10"> 
                <input type="text" id="DESCRIBTION" name="DESCRIPTION" value="" class="form-control" placeholder="Description"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
       
        </div> 
            <footer class="panel-footer text-right bg-light lter"> <button type="submit" id="AddRequest" class="btn btn-success btn-s-xs">Submit</button> </footer>
        </section></form></div>  


                                    <div class="col-md-4 col-lg-4 hidden-sm hidden-xs">
                                        <h5 class="bg-warning wrapper-md font-bold r">Categories <b class="fa fa-leaf text-default pull-right"></b></h5>
                                        <ul class="list-group">
                                            <li class="list-group-item"> <a href="#">Travel world</a> </li> 
                                        </ul>  

                                        <h5 class="bg-danger wrapper-md font-bold r">Recent Jokes <b class="fa fa-meh-o text-default pull-right"></b></h5> 

                                        <div> 
<?php $jokes->AllFecthLimit(0, 10); ?>     
                                        </div> </div> </div> </section> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
<?php include 'fb.php';
?>
                    </section> </section> </section> </section> <!-- Bootstrap --> <!-- App -->
                 <script>
         $(document).ready(function () {
                  
             $(document).on("click", "#AddRequest", function () {
                 var lng = $("#LNG").val();
                 var name = $("#NAME").val();
                 var email = $("#EMAIL").val();
                 var des = $("#DESCRIPTION").val();
                 if (email == "") {
                     $("#EMAIL").focus();
                 }
                 else if (name == "") {
                     $("#NAME").focus();
                 }
                 else if (des == "") {
                     $("#DESCRIPTION").focus();
                 }
                 else {
                     $.ajax({
                         type: "POST",
                         url: "request_post_ajax.php",
                         data: {LANGUAGE_ID: lng, ALBUM_NAME: name, EMAIL: email, OTHER: des},
                         error: function (html) {
                             $("#ResultMassage").html(html);
                         },
                         success: function (html) {
                             $("#ResultMassage").html(html);
                         }
                     });
                 }
                 return false;
             });
         
         
         
         
         });
      </script>
        <script src="js/app.v1.js"></script>
        <script src="js/app.plugin.js"></script>



</html>








