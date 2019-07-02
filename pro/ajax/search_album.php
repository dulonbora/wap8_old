<?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchAlbum($str);
?>
<?php
                        foreach($Result as $rows){ ;?>

                        <tr>
                            <td>
                                <a href="songbyalbum.php?i=<?php echo $rows['ID'] ;?>"><?php echo $rows['ALBUM_NAME'] ;?></a>
                            </td>
                            <td><?php echo  $rows['LANGUAGE_ID'];?> </td>
                            <td><?php echo $rows['CATEGORY_ID'] ;?></td>
                        </tr>
                        <?php } ?>