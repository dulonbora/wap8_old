<?php
include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/Videos.php'; 

$UI = new UI;
$N = new NavBar;
$videos = new Videos();
$Total = $videos->getTotal();

$limit = 30;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;
$ViewRs = $videos->AllFecth($start, $limit);

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
                                    <section class="panel panel-default"> <header class="panel-heading">All Artist List <span id="ResultMassage" class="text-danger"></span>
                                            <a href="listofvideos.php" class="btn btn-xs btn-success pull-right">Upload</a>
                                            <a href="listofvideos.php" class="btn btn-xs btn-success pull-right">Browse</a>
                                            <button class="btn btn-xs btn-success pull-right">Explore</button>
                                        </header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="addnew" class="btn btn-sm btn-default btn-block active">Add New Artist</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" id="TF_SEARCH" class="input-sm form-control" placeholder="Search">
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
                            <td><?php echo $rows['NAME'] ;?></td>
                            <td><?php echo $rows['PIC'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
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
            <a href="pro/sms.php?i=1" class="btn btn-primary btn-rounded">First Page</a>
            <a href="pro/sms.php?i=<?php echo $p;?>" classbtn btn-primary btn-rounded">Previous</a>
            <?php
            };
            ?></li>
                                                    <li><a href="#">1</a></li>
                                                    <li class="pull-right"><?php
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                                                        <a href="pro/sms.php?i=<?php echo $n;?>" class="btn btn-primary btn-rounded">Next</a>
                                                        <a href="pro/sms.php?i=<?php echo $TotalPage;?>" class="btn btn-primary btn-rounded">Last Page</a> &nbsp;&nbsp;
            <?php
            };
            ?></li>
                                                </ul>
                                            </div>
                                        </div> </footer> </section>
                                </div>
                            </div>
                            <div id="myModal" class="modal animated fadeInUp slow" role="dialog">
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
    $(document).ready(function(){
$("#TF_SEARCH").keyup("keyup", function (e) {
        // Set Search String
        var search_string = $(this).val();
        // Do Search
        if (search_string !== '') {
            $.ajax({
                type: "POST",
                url: "ajax/search_video.php",
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
//------------------------------------------------------------------------------
//add Category In Database Ajax
//------------------------------------------------------------------------------
    
  $(document).on("click", "#addnew", function(){
        $("#m-ttl").html("Add Album ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
        $.ajax({
            type: "post",
            url : "add_video_ajax.php",
            data : {id : 0},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");}
        });
});


  $(document).on("click", ".EditBtn", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Update Album ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
        $.ajax({
            type: "post",
            url : "update_video_ajax.php",
            data : {id : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");}
        });
});

    
    $(document).on("click", ".ImageEditBtn", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Update Artist Image ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
        $.ajax({
            type: "post",
            url : "video_image_add_ajax.php",
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