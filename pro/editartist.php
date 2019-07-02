<?php include '../include/admin_header.php';
include '../classes/UI.php';
include '../classes/NavBar.php'; 
include '../classes/Menu.php'; 

$UI = new UI;
$N = new NavBar;
$menu = new Menu();
$staff = new Staff();
$user = new user();

$id = filter_input(INPUT_GET, 'i');
$user->loadValue($id);
$staff->loadValue($id);



if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['EMAIL']; 
$fname = $_POST['FNAME']; 
$lname = $_POST['LNAME']; 
$adddess = $_POST['ADDRESS']; 
$about = $_POST['ABOUT']; 
$Phone = $_POST['PHONE']; 

$subject = $_POST['SUBJECT'];
$qualification = $_POST['QUALIFICATION'];
$designation = $_POST['DESIGNATION'];
$cat_id = $_POST['CATEGORY_ID'];

$user->setEmail($email);
$user->setFIRST_NAME($fname);
$user->setLAST_NAME($lname);
$user->setAddress($adddess);
$user->setPhone($Phone);
$user->setAbout($about);
$user->UpdateUser($id);
$staff->setCATEGORY_ID($cat_id);
$staff->setSUBJECT($subject);
$staff->setQUALIFICATION($qualification);
$staff->setDESIGNATION($designation);
$staff->updateStaff($id);
}
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                        <?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <p><?php echo $menu->getNAME(); ?> <small>
                                </small>
                            </p>
                            <div class="row">
        <div class="col-sm-12">
        <?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['EMAIL']; 
$fname = $_POST['FNAME']; 
$lname = $_POST['LNAME']; 
$adddess = $_POST['ADDRESS']; 
$about = $_POST['ABOUT']; 
$Phone = $_POST['PHONE']; 

$subject = $_POST['SUBJECT'];
$qualification = $_POST['QUALIFICATION'];
$designation = $_POST['DESIGNATION'];
$cat_id = $_POST['CATEGORY_ID'];

$user->setEmail($email);
$user->setFIRST_NAME($fname);
$user->setLAST_NAME($lname);
$user->setAddress($adddess);
$user->setPhone($Phone);
$user->setAbout($about);
$user->UpdateUser($id);
$staff->setCATEGORY_ID($cat_id);
$staff->setSUBJECT($subject);
$staff->setQUALIFICATION($qualification);
$staff->setDESIGNATION($designation);
$staff->pageRedirect("staff_view.php?i=".$id);
}
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="formon" role="form" class="form-horizontal"> 
        <section class="panel panel-success"> 
        <header class="panel-heading bg-danger"> <strong>New Staff</strong></header>
        <div class="panel-body"> 
        <div class="form-group"> <label class="col-sm-2 control-label">First Name</label> <div class="col-sm-10"> 
                <input type="text" name="FNAME" value="<?php echo $user->getFIRSTNAME();?>" class="form-control" placeholder="First Name"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Last Name</label> <div class="col-sm-10"> 
                <input type="text" name="LNAME" value="<?php echo $user->getLASTNAME();?>" class="form-control" placeholder="Last Name">
                <input type="text" name="CATEGORY_ID" value="<?php echo $staff->getCATEGORY_ID();?>" class="form-control hidden">
                </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Designation</label> <div class="col-sm-10"> 
                <input type="text" name="DESIGNATION" value="<?php echo $staff->getDESIGNATION();?>" class="form-control" placeholder="Designation"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Email</label> <div class="col-sm-10"> 
                <input type="text" name="EMAIL" value="<?php echo $user->getEmail();?>" class="form-control" data-type="email" data-required="true" placeholder="Email"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Phone Number</label> <div class="col-sm-10"> 
                <input type="text" name="PHONE" value="<?php echo $user->getPhone();?>" data-type="phone" class="form-control" placeholder="(XXX) XXXX XXX"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Qualification</label> <div class="col-sm-10"> 
                <input type="text" name="QUALIFICATION"  value="<?php echo $staff->getQUALIFICATION();?>" class="form-control" placeholder="Quwalification"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Subject</label> <div class="col-sm-10"> 
                <input type="text" name="SUBJECT"  value="<?php echo $staff->getSUBJECT();?>"  class="form-control" placeholder="Subject"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Address</label> <div class="col-sm-10"> 
                <input type="text" name="ADDRESS" value="<?php echo $user->getAddress();?>" class="form-control" placeholder="Address"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">About</label> <div class="col-sm-10"> 
                <input type="text" name="ABOUT" value="<?php echo $user->getAbout();?>" class="form-control" placeholder="About"> </div> </div>
        </div> 
        <footer class="panel-footer text-right bg-light lter"> <button type="submit" class="btn btn-success btn-s-xs">Submit</button> </footer>
        </section></form></div></div></section></section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
            <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="m-ttl">Are You Sure to Remove? <button  type="button" class="btn btn-danger pull-right" data-dismiss="modal">[X]</button></h4>
                                </div>
                                <div id="statusresult">
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </section>
    
 
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../js/app.v1.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>

</html>