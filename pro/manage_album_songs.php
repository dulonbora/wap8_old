<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/songsclass.php'; 

$UI = new UI;
$N = new NavBar;
$songs = new Songs();
$Total = $songs->getTotal();

$limit = 30;
$TotalPage = ceil($Total/$limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
$sid = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if(($page+1)==$TotalPage){$page==0;}
$start = ($page-1) *  $limit;
$ViewRs = $songs->AllSongs($start, $limit);

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
        <div class="col-lg-5">
            <section class="panel panel-default"> <header id="<?php echo $sid;?>" class="panel-heading songid">Artist Name <span id="ResultMassage" class="text-danger"></span><a class="btn btn-sm btn-danger pull-right" href="songbyalbum.php?i=<?php echo $sid;?>">Edit This Album</a></header> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        </tr> </thead> <tbody id="AlbumArtistResult">
                                        <?php 
                                        $songs->FakeAlbumBySongsList($sid);
                                        ?>
                                        </tbody>
                                        </table> </div> 
                                         </section>
                                </div>
                                <div class="col-lg-7">
                                    <section class="panel panel-default"> <header class="panel-heading">Songs List (<?php echo $Total;?>)
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
                                        <th class="">Album Name</th> 
                                        <th class="text-center">Edit</th>  
                                        </tr> </thead>
                                        <tbody id="SearchResult">
                                        <?php 
                        foreach($ViewRs as $rows){ ;?>
                        <tr>
                            <td><?php echo $rows['SONG_NAME'] ;?></td>
                            <td><?php $rows['ALBUM_ID'];?> </td>
                            <td width="50">
                                <b id="<?php echo $rows['ID'] ;?>" class="btn btn-danger artid"></b>
                            </td>
                        </tr>
                        <?php } ?>
                                        </tbody>
                                        </table> </div> 
                                         </section>
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
                url: "ajax/search_artist_for_manage.php",
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
    $(document).on("click", ".artid", function(){

        // Set Search String
        var artid = $(this).attr("id");
        var sid = $(".songid").attr("id");
        // Do Search
        if (artid !== 0) {
            $.ajax({
                type: "POST",
                url: "ajax/Insert_Song_Album.php",
                data: {ALBUM_ID : artid, SONG_ID : sid},
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
            $.ajax({
                type: "POST",
                url: "ajax/Artist_By_Album.php",
                data: {id : sid},
                cache: false,
                success: function (html) {
                    $("#AlbumArtistResult").html(html);
                }
            });
                }
            });
        }
        
        return false;
    });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
    $(document).on("click", ".delbtn", function(){

        // Set Search String
        var sid = $(this).attr("id");
        var albumid = $(".songid").attr("id");
        // Do Search
        if (sid !== 0) {
            $.ajax({
                type: "POST",
                url: "ajax/remove_song_from_song.php",
                data: {ALBUM_ID : albumid, SONG_ID : sid},
                cache: false,
                success: function (html) {
                    $("#ResultMassage").html(html);
            $.ajax({
                type: "POST",
                url: "ajax/Artist_By_Album.php",
                data: {id : albumid},
                cache: false,
                success: function (html) {
                    $("#AlbumArtistResult").html(html);
                }
            });
                }
            });
        }
        
        return false;
    });
    });
</script>

<script>
$(document).ready(function(){
//add Category In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#addcat", function(){
var vname = $("#name").val();
var vis_menu = $("#is_menu").val();
var vprentid = $("#prentid").val();
var vis_navbar = $("#is_navbar").val();
var vis_submenu = $("#is_submenu").val();
var vis_publish = $("#is_publish").val();
if(vname==''){$("#name").focus();return;}
else{
$.post("category_post.php", //Required URL of the page on server
{
NAME:vname,
PAGE:vis_menu,
NAVBAR:vis_navbar,
PUBLISH:vis_publish,
PARENT:vprentid,
SUBMENU:vis_submenu
},
function(response,status){ // Required Callback Function
$("#menuaside").hide(600);
$("#addmenuview").destroy();
window.location.reload();
});
}
});
});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>