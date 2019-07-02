<?php $id = (isset($_POST['i'])==0) ? 0 : $_POST['i']; ?>                             
<h5 class="bg-danger wrapper-md r">Leave a comment</h5>
        <form method="POST" name="formon">
                <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                        <label>Your name</label>
                        <input type="text" id="USERNAME" value="" class="form-control" placeholder="Name">
                                </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" id="EMAIL" name="EMAIL" class="form-control" placeholder="Enter email"> </div>
                </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea type="text" id="COMMENT" name="COMMENT" class="form-control" rows="5" placeholder="Type your comment"></textarea>
                                </div>
                    <div class="form-group">
                        <input type="submit" id="<?php echo $id;?>" value="Post Comment" class="btn btn-success PostcommentBtn">
                        
                            </div>
                                </form><div class='line'></div>
    <div class='line'></div>
    <div class='line'></div>
    <div class='line'></div>
