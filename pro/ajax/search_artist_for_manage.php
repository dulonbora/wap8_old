
                        
                        <?php
$str = filter_input(INPUT_POST, 'str');
require_once '../../classes/Search.php';
$search = new Search();

$Result = $search->searchArtist($str);
?>
<?php 
                        foreach($Result as $rows){ ;?>
                        <tr>
                           <td ><?php echo $rows['ARTIST_NAME'] ;?></td>
                            <td><b id="<?php echo $rows['ID'] ;?>" class="btn btn-danger artid"></b></td>
                        </tr>
                        <?php } ?>