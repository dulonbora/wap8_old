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
$UI = new UI;
$N = new NavBar;
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Workl("aa"); ?>

            <section class="hbox stretch">
                <!-- .aside -->
                        <?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
    </section>
    
    <script type="text/javascript">
$(document).ready(function(){
var auto_refresh = setInterval(
function ()
{
$('#CountUnSeen').load('record_count.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds
});
</script>
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>