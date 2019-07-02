<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/JokesAdmin.php'; 

$UI = new UI;
$N = new NavBar;
$artist = new Jokes();
$Total = $artist->getTotal(0);

$limit = 30;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;
$ViewRs = $artist->AllFecth($start, $limit, 0);

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
                                    <section class="panel panel-default"> <header class="panel-heading">All JOkes List <span id="ResultMassage" class="text-danger"></span></header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="addnew" class="btn btn-sm btn-default btn-block active">Add New JOke</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" id="TF_SEARCH" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Joke Name</th> 
                                        <th class="">Image</th> 
                                        <th class="text-center">Edit</th>  
                                        </tr> </thead> <tbody id="SearchResult">
                                        <?php 
                        foreach($ViewRs as $rows){ ;?>
                        <tr>
                            <td><?php
                            echo $rows['HEADLINE'];?></td>
                            <td><?php echo $rows['IMG_LINK'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                            <td width="50">
                                <b id="<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm EditBtn" >Update</b>
                            </td>
                        </tr>
                        <?php } ?>
                                        </tbody>
                                        </table> </div> 
                                        <footer class="panel-footer"> 
                                        <div class="row"> 
                                            <div class="col-sm-12">
                                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                                    <li class="pull-left"><?php
            $p = $page-1; 
            if($page>1){
            ?>
            <a href="pro/jokelist.php?i=1" class="btn btn-primary btn-rounded">First Page</a>
            <a href="pro/jokelist.php?i=<?php echo $p;?>" classbtn btn-primary btn-rounded">Previous</a>
            <?php
            };
            ?></li>
                                                    <li><a href="#">1</a></li>
                                                    <li class="pull-right"><?php
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                                                        <a href="pro/jokelist.php?i=<?php echo $n;?>" class="btn btn-primary btn-rounded">Next</a>
                                                        <a href="pro/jokelist.php?i=<?php echo $TotalPage;?>" class="btn btn-primary btn-rounded">Last Page</a> &nbsp;&nbsp;
            <?php
            };
            ?></li>
                                                </ul>
                                            </div>
                                        </div> </footer> </section>
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
                url: "ajax/search_artist.php",
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

<script>
$(document).ready(function(){
    $("#addmenuview").hide();
    $(document).on("click", "#addnew", function(){
    $("#addmenuview").load("artist_add_ajax.php").toggle(600);
    });
//------------------------------------------------------------------------------
//add Category In Database Ajax
//------------------------------------------------------------------------------
  $(document).on("click", "#addmenu", function(){
    var vname = $("#ARTIST_NAME").val();
    var vis_menu = $("#BORN_ON").val();
    var vprentid = $("#DESCRIPTION").val();
        if (vname !== "") {
            $.ajax({
                type: "POST",
                url: "Insert_artist_ajax.php",
                data: {ARTIST_NAME:vname, BORN_ON:vis_menu, DESCRIPTION:vprentid},
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#addmenuview").hide();
                    //window.location.reload();
                }
            });
            
        }
        $("#ResultMassage").html("Artist Name Is Empty");
        return false;
    });
    
  $(document).on("click", ".EditBtn", function(){
    var id = $(this).attr("id");
        if (id !== 0) {
            $.ajax({
                type: "POST",
                url: "update_artist_ajax.php",
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
    var vname = $("#ARTIST_NAME").val();
    var vis_menu = $("#BORN_ON").val();
    var vprentid = $("#DESCRIPTION").val();
        var id = $(this).attr("id");
        if (vname !== "") {
            $.ajax({
                type: "POST",
                url: "update_artist_post.php",
                data: {ARTIST_NAME:vname, BORN_ON:vis_menu, DESCRIPTION:vprentid, ID:id},
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
                    $("#addmenuview").hide();
                }
            });
        }
        
        return false;
    });
    
    $(document).on("click", ".ImageEditBtn", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Update Artist Image ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
        $.ajax({
            type: "post",
            url : "artist_image_add_ajax.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");}
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