<?php
ob_start();
if (!isset($_SESSION)) {session_start();}
include '../classes/user.php';
$user = new user();
$user->RestrictUser();
?>
    
    <?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/categoryAdmin.php'; 

$UI = new UI;
$N = new NavBar;
$category = new Category();
$type = (int) (!isset($_GET['i']) ? 0 : $_GET['i']);

$ViewRs = $category->AllFecth($type);

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
                                    <section class="panel panel-default"> <header class="panel-heading">Post Category List <span class="bg-danger" id="ResultMassage"></span>
                                        
                                            <a href="categorys.php?i=0" class="btn btn-xs btn-success btn-rounded pull-right">SONGS</a>
                                            <a href="categorys.php?i=1" class="btn btn-xs btn-success btn-rounded pull-right">VIDEOS</a>
                                            <a href="categorys.php?i=2" class="btn btn-xs btn-success btn-rounded pull-right">SMS</a>
                                            <a href="categorys.php?i=4" class="btn btn-xs btn-success btn-rounded pull-right">PHOTOS</a>
                                            <a href="categorys.php?i=3" class="btn btn-xs btn-success btn-rounded pull-right">BLOGS</a>
                                        </header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="addnew" class="btn btn-sm btn-default btn-block active">Add New Category</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Artist Name</th> 
                                        <th class="">Image</th> 
                                        <th class="text-center">Edit</th>  
                                        </tr> </thead> <tbody id="SearchResult">
                                        <?php 
                        foreach($ViewRs as $rows){ ;?>
                        <tr>
                            <td><?php echo $rows['CATEGORY_NAME'] ;?></td>
                            <td><?php echo $rows['IMAGE_LINK'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                            <td width="50">
                                <b id="<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm EditBtn" >Update</b>
                            </td>
                        </tr>
                        <?php } ?>
                                        </tbody>
                                        </table> </div>
                                        <footer class="panel-footer"> 
                                        <div class="row"> 
                                            <div class="col-sm-12 text-right text-center-xs">
                                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div> </footer> </section>
                                </div>
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
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
                <aside class="aside-lg bg-light b-r" id="addmenuview"> 
                    </aside>
                
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
   
<script type="text/javascript">
    $(document).ready(function(){
    $(document).on("click", "#addmenu", function(){
    var catname = $("#CATEGORY_NAME").val();
    var des = $("#DESCRIPTION").val();
    var type = $("#TYPE").val();
    var lng = $("#LANG").val();
        if (catname !== "") {
            $.ajax({
                type: "POST",
                url: "add_category_post.php",
                data: {CATEGORY_NAME:catname, DESCRIPTION:des, TYPE:type, LANG:lng },
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#addmenuview").hide(600);
                }
                
            });
        }
        return false;
    });
    
    $(document).on("click", ".EditBtn", function(){
    var id = $(this).attr("id");
        if (id !== 0) {
            $.ajax({
                type: "POST",
                url: "update_category_ajax.php",
                data: {id:id},
                cache: false,
                success: function (html) {
                    $("#addmenuview").html(html);
                    $("#addmenuview").fadeIn();
                }
            });
        }
        
        return false;
    });
    
    $(document).on("click", ".UpdateArtist", function(){
    var catname = $("#CATEGORY_NAME").val();
    var des = $("#DESCRIPTION").val();
    var type = $("#TYPE").val();
    var lng = $("#LANG").val();
    var id = $(this).attr("id");
        if (catname !== "") {
            $.ajax({
                type: "POST",
                url: "update_category_post.php",
                data: {CATEGORY_NAME:catname, DESCRIPTION:des, TYPE:type, LANG:lng, ID:id },
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#addmenuview").hide();
                }
            });
        }
        
        return false;
    });

    
    
    });
</script>

<script>
$(document).ready(function(){
     $("#addmenuview").hide();
    $(document).on("click", "#addnew", function(){
    $("#addmenuview").load("add_category_ajax.php").toggle(600);
    });
//------------------------------------------------------------------------------
//add Category In Database Ajax
//------------------------------------------------------------------------------

});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>