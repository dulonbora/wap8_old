<?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchBlog($str);
?>
<?php foreach($Result as $rows){ ;?>
<tr>
<td><?php echo $rows['HEADLINE'] ;?></td>
<td><?php echo $rows['IMG_LINK'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
<td width="50"><b id="<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm EditBtn" >Update</b></td>
</tr>
                        <?php } ?>