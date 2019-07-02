<?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchSongs($str);
?>
<?php 
                        foreach($Result as $rows){ ;?>
                        <tr>
                            <td><?php echo $rows['SONG_NAME'] ;?></td>
                            <td><?php $rows['ALBUM_ID'];?> </td>
                            <td width="50">
                                <b id="<?php echo $rows['ID'] ;?>" class="btn btn-danger artid"></b>
                            </td>
                        </tr>
                        <?php } ?>
