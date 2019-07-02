<?php
include './classes/Commments.php';
$comment = new Comments();
$id = (isset($_POST['i'])==0) ? 0 : $_POST['i'];
$type = (isset($_POST['type'])==0) ? 0 : $_POST['type'];
$cmmnt = $comment->getTotalCOmmentBycost($type, $id);
    ?>
<h5 class="bg-success wrapper-md r"><?php echo $cc = ($cmmnt == 0) ? "No Comment Posted Yet" : $cmmnt." Comment Posted";?></h5>

<section class="comment-list block">
    
    <?php
    echo $comment->LoadCommentInPost($type, $id);
    if($cmmnt > 2){
        echo "<div class=''><button id='<?php echo $id;?>' class='btn btn-info btn-sm btn-rounded pull-right'>Click To View More Comments</button><div>";
    }
    if($cmmnt!=0){?>
    
  <div class='line'></div>
    <div class='line'></div>  
    <div class='line'></div>  
    <div class='line'></div>  
    <?php }?>
</section>






