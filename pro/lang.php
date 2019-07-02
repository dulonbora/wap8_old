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
include '../classes/Language.php'; 

$UI = new UI;
$N = new NavBar;
$L = new Language();

$ViewRs = $L->AllLang();

?>

<body class="">
    <section class="vbox">
        <?php echo $UI->Work("LANGUAGE"); ?>

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
                                    <section class="panel panel-default"> <header class="panel-heading">Album List () <span id="ResultMassage"></span></header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group"> 
                                                    <button id="addnew" class="btn btn-sm btn-success btn-rounded btn-block">Add New Language</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" id="TF_SEARCH" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Album Name</th> 
                                        <th class="">Category</th> 
                                        <th class="">Langguage</th> 
                                        </tr> </thead> <tbody id="SearchResult">
                                        <?php 
                        foreach($ViewRs as $rows){ ;?>
                        <tr>
                            <td>
                                <a href="songbyalbum.php?i=<?php echo $rows['ID'] ;?>"><?php echo $rows['LANGUAGE_NAME'] ;?></a>
                            </td>
                            <td><?php echo  $rows['IMAGE_LINK'];?> </td>
                            <td><?php echo $rows['ID'] ;?></td>
                            
                        </tr>
                        <?php } ?>
                                        </tbody>
                                        </table> </div> 
                                        <footer class="panel-footer"> 
                                         </footer> </section>
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
$("#TF_SEARCH").keyup("keyup", function (e) {
        // Set Search String
        var search_string = $(this).val();
        // Do Search
        if (search_string !== '') {
            $.ajax({
                type: "POST",
                url: "ajax/search_album.php",
                data: {str : search_string},
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

<script type="text/javascript">
    $(document).ready(function(){
    $(document).on("click", "#addlanguage", function(){
        var vname = $("#LANGU_NAME").val();
        if (vname !== "") {
            $.ajax({
                type: "POST",
                url: "Insert_Lang_ajax.php",
                data: {LANGUAGE_NAME:vname},
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#addmenuview").hide();
                    window.location.reload();
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
    $("#addmenuview").load("lang_add_ajax.php").toggle(600);
    });
//------------------------------------------------------------------------------
//add Category In Database Ajax
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//Update Category In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updatecat", function(){

var vname = $("#Editcatname").val();
var id = $("#getid").val();
if(vname==''){return false;}
else{
$.post("cat_update_post.php", //Required URL of the page on server
{
ID:id,
NAME:vname
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Navbar In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", ".navbtn", function(){
var id = $(this).attr("id");
if(id==''){return false;}
else{
$.post("nav_update_post.php", //Required URL of the page on server
{
ID:id,
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Publish In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", ".btnpub", function(){
var id = $(this).attr("id");
if(id==''){return false;}
else{
$.post("pub_update_post.php", //Required URL of the page on server
{
ID:id,
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//click In Edit Bottun
//------------------------------------------------------------------------------
$(document).on("click", ".btnedit", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Edit ?"+'<b class="badge bg-danger pull-right" data-dismiss="modal">X</b>')
        //alert(id);
        $.ajax({
            type: "post",
            url : "edit_cat_name.php",
            data : {i : id},
            error: function (html) {
                    },
            success: function (html) {
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");
    }
        });
});
//------------------------------------------------------------------------------
//click In Remove Category Button
//------------------------------------------------------------------------------
$(document).on("click", ".btndel", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Remove ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>')
        $.ajax({
            type: "post",
            url : "confirm_to_remove.php",
            data : {i : id},
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
$(document).on("click", ".comfirm", function(){
var id = $(this).attr("id");
var idi = id.replace('tr','#tr');
//alert(id);
var i = id.replace('tr','');
$.post("cat_remove.php",
{ 
i:i
},
function(response,status, html){
$('#myModal').modal("hide");
$(idi).hide(400);
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