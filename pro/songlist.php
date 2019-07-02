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
include '../classes/songsclass.php'; 
include '../classes/AlbumsAdmin.php'; 
include '../classes/categoryAdmin.php'; 

$UI = new UI;
$N = new NavBar;
$AL = new Albums();
$songs = new Songs();
$Category = new Category();
$Total = $songs->getTotal();

$limit = 25;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;

$ViewRs = $songs->AllSongs($start, $limit);
$Tdownload = $songs->getTotalDownload();

?>

<body class="">
    <section class="vbox">
        <?php echo $UI->Workl("CATEGORY"); ?>

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
                                    <section class="panel panel-default"> <header class="panel-heading">Songs List (<?php echo $Total/$Tdownload;?>)
                                            <a href="SongDir.php" class="btn btn-xs btn-danger pull-right">Manage Song</a></header> 
                                        <div class="row wrapper"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <div class="input-group"> 
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
                                        <?php 
                        foreach($ViewRs as $rows){
                            $AL->loadvalue($rows['ALBUM_ID']);
                            $Category->loadvalue($rows['CATEGORY_ID'])
                            ;?>
                        <tr>
                            <td><a href="manageartist.php?i=<?php echo $rows['ID'] ;?>"><?php echo $rows['SONG_NAME'] ;?></a></td>
                            <td><?php echo  $Category->getCATEGORY_NAME();?></td>
                            <td><?php echo  $AL->getALBUM_NAME();?> </td>
                            <td><?php echo $rows['IMAGE_LINK'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                            <td width="50">
                                <a href="song_edit.php?i=<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm viewBtn" >Update</a>
                            </td>
                        </tr>
                        <?php } ?>
                                        </tbody>
                                        </table> </div> 
                                        <footer class="panel-footer bg-light"> 
                                        <div class="row"> 
                                            <div class="col-sm-12">
                                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                                    <li class="pull-left"><?php
            $p = $page-1; 
            if($page>1){
            ?>
            <a href="pro/songlist.php?i=1" class="btn btn-primary btn-rounded">First Page</a>
            <a href="pro/songlist.php?i=<?php echo $p;?>" classbtn btn-primary btn-rounded">Previous</a>
            <?php
            };
            ?></li>
                                                    <li><a href="#">1</a></li>
                                                    <li class="pull-right"><?php
            $n = $page+1; 
            if($page<$TotalPage){
            ?>
                                                        <a href="pro/songlist.php?i=<?php echo $n;?>" class="btn btn-primary btn-rounded">Next</a>
            <a href="pro/songlist.php?i=<?php echo $TotalPage;?>" class="btn btn-primary btn-rounded">Last Page</a> &nbsp;&nbsp;
            <?php
            };
            ?></li>
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
                url: "ajax/search_songs.php",
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
   $(document).on("click", ".ImageEditBtn", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Update Album Image ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>');
        $.ajax({
            type: "post",
            url : "song_image_add_ajax.php",
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

  <script type="text/javascript">
$(document).ready(function(){
var auto_refresh = setInterval(
function ()
{
$('#CountUnSeen').load('record_count.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds
});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>