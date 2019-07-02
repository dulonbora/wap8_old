<?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchSongs($str);
?>
<?php 
                        foreach($Result as $rows){ ;?>
                        <tr>
                            <td><a href="manageartist.php?i=<?php echo $rows['ID'] ;?>"><?php echo $rows['SONG_NAME'] ;?></a></td>
                            <td><?php echo  $rows['CATEGORY_ID']. "/ ". $rows['ALBUM_ID'];?> </td>
                            <td><?php echo $rows['ALBUM_ID'] ;?></td>
                            <td><?php echo $rows['IMAGE_LINK'] ;?> <b id="<?php echo $rows['ID'] ;?>" class = "fa fa-compress text-danger ImageEditBtn" ></b></td>
                            <td width="50">
                                <a href="song_edit.php?i=<?php echo $rows['ID'] ;?>" class = "btn btn-link btn-sm viewBtn" >Update</a>
                            </td>
                        </tr>
                        <?php } ?>