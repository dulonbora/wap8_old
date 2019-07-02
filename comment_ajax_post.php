<?php 
    include 'classes/Commments.php';
    $comment = new Comments();
    
    
    $u = $_POST['USERNAME'];
    $id = $_POST['ID'];
    $e = $_POST['EMAIL'];
    $c = $_POST['COMMENT'];
    $t = $_POST['TYPE'];
    
    $comment->setUSERNAME($u);
    $comment->setEMAIL($e);
    $comment->setCOMMENT($c);
    $comment->setTYPE($t);
    $comment->setPRENT_ID($id);
    $comment->setAPPORVED(0);
    $comment->setPOST_ON(time());
    if($c=="" || $e == "" || $u == ""){
            echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>SOmthing Is Empty ! Try Again</strong></div>';

    }
 else {
   if($comment->Insert()==1){
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Well done!</strong> Your Comment Will Be Approve By admin Soon</div>';
    }
 else {
    echo '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><strong>Yor Comment Not Posted</strong></div>';
    }     
}
    
    ?>