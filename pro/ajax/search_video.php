<?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchVideo($str);
?>
<?php 
                        foreach($Result as $rows){ ;?>
                        <tr>
                            <td><?php echo $rows['NAME'] ;?></td>
                            <td><?php echo $rows['PIC'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                            <td width="50">
                                <a href="../song_update.php?i=<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm viewBtn" >Update</a>
                            </td>
                        </tr>
                        <?php } ?>