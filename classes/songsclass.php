<?php
require_once '../include/Kanexon.php'; 
class Songs {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();}
    
    public function Insert(){
    $query = "INSERT INTO SONGS(LANGUAGE_ID, ALBUM_ID, CATEGORY_ID,"
                . " LYRIC_BY, MUSIC_BY, SONG_NAME,"
                . " SONG_LINK, GENRE, IMAGE_LINK,"
                . " SITE_LINK, VIDEO_ID, LYRIC_ID,"
                . " TOTAL_PLAY, CREATE_ON, CREATE_BY,"
                . " SEARCH_TAG, DESCRIPTION) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->ALBUM_ID);
    $stmt->bindParam(3, $this->CATEGORY_ID);
    $stmt->bindParam(4, $this->LYRIC_BY);
    $stmt->bindParam(5, $this->MUSIC_BY);
    $stmt->bindParam(6, $this->SONG_NAME);
    $stmt->bindParam(7, $this->SONG_LINK);
    $stmt->bindParam(8, $this->GENRE);
    $stmt->bindParam(9, $this->IMAGE_LINK);
    $stmt->bindParam(10, $this->SITE_LINK);
    $stmt->bindParam(11, $this->VIDEO_ID);
    $stmt->bindParam(12, $this->LYRIC_ID);
    $stmt->bindParam(13, $this->TOTAL_PLAY);
    $stmt->bindParam(14, $this->CREATE_ON);
    $stmt->bindParam(15, $this->CREATE_BY);
    $stmt->bindParam(16, $this->SEARCH_TAG);
    $stmt->bindParam(17, $this->DESCRIPTION);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}

    
    
        public function Update($id){
    $query = "UPDATE SONGS SET LANGUAGE_ID =?, ALBUM_ID=?, CATEGORY_ID = ?,"
                . " LYRIC_BY = ?, MUSIC_BY =?, SONG_NAME = ?,"
                . " SONG_LINK = ?, GENRE = ?,"
                . " SITE_LINK = ?, VIDEO_ID = ?, LYRIC_ID = ?,"
                . " SEARCH_TAG = ?, DESCRIPTION = ? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->ALBUM_ID);
    $stmt->bindParam(3, $this->CATEGORY_ID);
    $stmt->bindParam(4, $this->LYRIC_BY);
    $stmt->bindParam(5, $this->MUSIC_BY);
    $stmt->bindParam(6, $this->SONG_NAME);
    $stmt->bindParam(7, $this->SONG_LINK);
    $stmt->bindParam(8, $this->GENRE);
    $stmt->bindParam(9, $this->SITE_LINK);
    $stmt->bindParam(10, $this->VIDEO_ID);
    $stmt->bindParam(11, $this->LYRIC_ID);
    $stmt->bindParam(12, $this->SEARCH_TAG);
    $stmt->bindParam(13, $this->DESCRIPTION);
    $stmt->bindParam(14, $id);
    $stmt->execute();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
    public function CheckAlreadyExit($sid){
    $query = "SELECT * FROM SONGS WHERE SONG_NAME =?";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->execute();
} catch(PDOException $ex){echo $ex->getMessage();}
    $rows = $stmt->fetch();
       if($rows > 0){
        $success = 1;
       }
return $success;}

    public function CheckAlreadyExitSongs($sid){
    $query = "SELECT * FROM SONGS WHERE SONG_NAME =?";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->execute();
} catch(PDOException $ex){echo $ex->getMessage();}
    $rows = $stmt->fetch();
       if($rows > 0){
        $success = $this->ID=$rows['ID'];;
       }
return $success;}

    
    public function UpdateSingle($colm, $id, $getValue){
        $query = "UPDATE SONGS SET $colm = ?  
	WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $getValue);
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    public function UpdateAlbumSingle($colm, $id, $getValue){
        $query = "UPDATE SONGS SET $colm = ?  
	WHERE ALBUM_ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $getValue);
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
    public function FakeAlbumBySongsList($id){
       $Q = "SELECT ID, SONG_NAME, ALBUM_ID FROM ALBUM_VIEW WHERE ALBUM_ID = $id ORDER BY SONG_NAME DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
              echo "<tr><td>".$rows["SONG_NAME"]." <b id='".$rows["ID"]."' class='btn btn-xs btn-success btn-rounded pull-right delbtn'>x<b></tr></td>";
        }
        while($rows = $stmt->fetch());   
       }
       return $result;
    }



    
    public function AllSongs($start, $limit){
       $Q = "SELECT * FROM SONGS ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    public function AllSongsByAlbum($id){
       $Q = "SELECT * FROM SONGS WHERE ALBUM_ID = $id";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function getTotalDownload(){
       $Q = "SELECT SUM(TOTAL_PLAY) AS TOTAL FROM SONGS ";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}

    public function getTotal(){
       $Q = "SELECT COUNT(*) AS TOTAL FROM SONGS ";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}
    public function getTotalByAlbum($id){
       $Q = "SELECT COUNT(*) AS TOTAL FROM SONGS WHERE ALBUM_ID = $id";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}

    public function getTotalByartist(){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST_VIEW";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}


    public function SongListByArtist($id, $start, $limit){
       $Q = "SELECT * FROM ARTIST_VIEW WHERE ARTIST_ID = $id ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
        {
         $noimage = "image/geetanjali.jpg";
            $link = "NoImage.jpg";
            $image = ($row['ART_LINK']==$link) ? $noimage : $noimage;
          //  $cat = $this->ReturnCategoryi($row['CATEGORY_ID']);
            $art = $this->ArtistByAlbumList($row['ID']);
    echo "<li class='list-group-item clearfix'>
<a href='file.php?i=".$row['ID']."' class='pull-left thumb-sm m-r'> <img src='$image' alt='...'> </a>
<a class='clear' href='file.php?i=".$row['ID']."'> <span class='block text-ellipsis'>".$row['SONG_NAME']."</span>
<small class='text-muted'>".$row['ALBUM_NAME']."</small> </a>
</li>";
        }
       return $result;
    }




    
    public function LoadSongsInAdmin(){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM SONGS ORDER BY ID DESC LIMIT 30";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $albm = $this->ReturnAlbum($rows['ALBUM_ID']);
                $cat = $this->ReturnCategory($rows['CATEGORY_ID']);


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['SONG_NAME']."</td>
                        <td class=''>$cat</td>
                        <td class=''>$albm</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function ReturnAlbum($id){
       $Q = "SELECT ALBUM_NAME FROM ALBUM WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $this->ALBUM_NAME=$row['ALBUM_NAME'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function ReturnCategory($id){
       $Q = "SELECT CATEGORY_NAME FROM CATEGORY WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $this->CATEGORY_NAME=$row['CATEGORY_NAME'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }

    
    
    

    

    
        public function date($dt){
        $date = "";
        $category = "";
        $ddt = explode('-', $dt);
        switch ($ddt[1]){
        case 1: $category = "Jan"; break;
        case 2: $category = "Feb"; break;
        case 3: $category = "Mar"; break;
        case 4: $category = "Apr"; break;
        case 5: $category = "May"; break;
        case 6: $category = "Jun"; break;
        case 7: $category = "Jul"; break;
        case 8: $category = "Aug"; break;
        case 9: $category = "Sep"; break;
        case 10: $category = "Oct"; break;
        case 11: $category = "Nov"; break;
    default : $category = "Dec";
}
$date = $category." ".$ddt[1]." ".$ddt[2];
        return $date;
    }
    
    public function AlbumSongs($id){
    include('include/database.php');
    include('classes/mp3.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM SONGS WHERE ALBUM_ID = $id";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $v1 = mysqli_fetch_assoc($v);
    $counter = 1;  
    echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
    if($v1 > 0)       
    {
            do{
                $noimage = "image/geetanjali.jpg";
                $image = ($v1['IMAGE_LINK']=='NoImage.jpg') ? $noimage : $noimage;                
                $lnk = str_replace(' ', '_', $v1['SONG_LINK']);
              //  $m = new mp3("apps/".$lnk);
               // $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
                $art = "".$this->ArtistBySong($v1['ID'])."";
                $duration = 00;
                if($counter%2==0){
    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='#' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='file.php?i=".$v1['ID']."' class='pull-left thumb-sm m-r'> <img src='$image' alt='...'> </a>
    <a class='clear' href='file.php?i=".$v1['ID']."'> <span class='block text-ellipsis'>".$v1['SONG_NAME']." ($duration)</span> <small class='text-muted'>by $art</small> </a>
        </li>";                
                }
 else {
     echo "<li class='list-group-item clearfix'>
    <a href='#' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='file.php?i=".$v1['ID']."' class='pull-left thumb-sm m-r'> <img src='$image' alt='...'> </a>
    <a class='clear' href='file.php?i=".$v1['ID']."'> <span class='block text-ellipsis'>".$v1['SONG_NAME']." ($duration)</span> <small class='text-muted'>by $art</small> </a>
        </li>";
 }
 
            $counter++;
    }
    
while($v1=mysqli_fetch_assoc($v));
    
}
echo "</ul>
</section>";
            }
            
            
    public function AlbumRelatedSongs($id, $aid){
    include('../include/database.php');
    include('../classes/mp3.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM SONGS WHERE ALBUM_ID = $aid AND ID != $id";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $v1 = mysqli_fetch_assoc($v);
    $counter = 1;  
    echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
    if($v1 > 0)       
    {
            do{
                $noimage = "geetanjali.jpg";
                $image = ($v1['IMAGE_LINK']==14) ? $v1['IMAGE_LINK'] : $noimage;
                $lnk = str_replace(' ', '_', $v1['SONG_LINK']);
              //  $m = new mp3("apps/".$lnk);
               // $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
                $art = "".$this->ArtistBySong($v1['ID'])."";
                $duration = 00;
                if($counter%2==0){
    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='#' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='file.php?i=".$v1['ID']."' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='file.php?i=".$v1['ID']."'> <span class='block text-ellipsis'>".$v1['SONG_NAME']." ($duration)</span> <small class='text-muted'>by $art</small> </a>
        </li>";                
                }
 else {
     echo "<li class='list-group-item clearfix'>
    <a href='#' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='file.php?i=".$v1['ID']."' class='pull-left thumb-sm m-r'> <img src='$image' alt='...'> </a>
    <a class='clear' href='file.php?i=".$v1['ID']."'> <span class='block text-ellipsis'>".$v1['SONG_NAME']." ($duration)</span> <small class='text-muted'>by $art</small> </a>
        </li>";
 }
 
            $counter++;
    }
    
while($v1=mysqli_fetch_assoc($v));
    
}
echo "</ul>
</section>";
            }
    

            
    public function ArtistBySong($id){
    $Artist = "Unknown";
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 1;
    if($rows > 0)
        {
            do{
                $art[] = $rows['ARTIST_NAME'];
            }
        while($rows=mysqli_fetch_assoc($rs));   
        $Artist = implode(", ", $art);
        }
        return $Artist;
    }
    
    
    
        public function loadvalue($id){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM SONGS WHERE ID = $id";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($v);
    
    if($row > 0)
    {
        $this->ID=$row['ID'];
        $this->LANGUAGE_ID=$row['LANGUAGE_ID'];
        $this->ALBUM_ID=$row['ALBUM_ID'];
        $this->CATEGORY_ID=$row['CATEGORY_ID'];
        $this->LYRIC_BY=$row['LYRIC_BY'];
        $this->MUSIC_BY=$row['MUSIC_BY'];
        $this->SONG_NAME=$row['SONG_NAME'];
        $this->SONG_LINK=$row['SONG_LINK'];
        $this->GENRE=$row['GENRE'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
        $this->SITE_LINK=$row['SITE_LINK'];
        $this->VIDEO_ID=$row['VIDEO_ID'];
        $this->LYRIC_ID=$row['LYRIC_ID'];
        $this->TOTAL_PLAY=$row['TOTAL_PLAY'];
        $this->CREATE_ON=$row['CREATE_ON'];
        $this->CREATE_BY=$row['CREATE_BY'];
        $this->SEARCH_TAG=$row['SEARCH_TAG'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
    }
        
}

        public function RemoveByAlbum($id){
        $query = "DELETE FROM SONGS WHERE ALBUM_ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {echo $ex->getMessage();}
        return $success;
    }
    
    public function bitrate_c($filename){
    $input = $filename;
    $info = pathinfo($input);
    $output = "{$info['dirname']}/64kb-{$info['filename']}.{$info['extension']}";
    $output2 = "{$info['dirname']}/128kb-{$info['filename']}.{$info['extension']}";
    $output3 = "{$info['dirname']}/192kb-{$info['filename']}.{$info['extension']}";
    exec("ffmpeg -i '".$input."' -ab 64k '".$output."'");
    exec("ffmpeg -i '".$input."' -ab 128k '".$output2."'");
    exec("ffmpeg -i '".$input."' -ab 192k '".$output3."'");
    autotag($output);
    autotag($output2);
    autotag($output3);
    return 'bit rate done';
    }
    
    public function RemoveSong($id){
    $query = "DELETE FROM SONGS WHERE ID = ?";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}
return $success;}



    private $ID;
    private $LANGUAGE_ID;
    private $ALBUM_ID;
    private $CATEGORY_ID;
    private $LYRIC_BY;
    private $MUSIC_BY;
    private $SONG_NAME;
    private $SONG_LINK;
    private $GENRE;
    private $IMAGE_LINK;
    private $SITE_LINK;
    private $VIDEO_ID;
    private $LYRIC_ID;
    private $TOTAL_PLAY;
    private $CREATE_ON;
    private $CREATE_BY;
    private $SEARCH_TAG;
    private $DESCRIPTION;
    
    
    
    function setID($ID) {$this->ID = $ID;}
    function getID(){return $this->ID;}
    
    function setLANGUAGE_ID($LANGUAGE_ID) {$this->LANGUAGE_ID = $LANGUAGE_ID;}
    function getLANGUAGE_ID(){return $this->LANGUAGE_ID;}
    
    function setALBUM_ID($ALBUM_ID) {$this->ALBUM_ID = $ALBUM_ID;}
    function getALBUM_ID(){return $this->ALBUM_ID;}
    
    function setCATEGORY_ID($CATEGORY_ID) {$this->CATEGORY_ID = $CATEGORY_ID;}
    function getCATEGORY_ID(){return $this->CATEGORY_ID;}
    
    function setLYRIC_BY($LYRIC_BY) {$this->LYRIC_BY = $LYRIC_BY;}
    function getLYRIC_BY(){return $this->LYRIC_BY;}
    
    function setMUSIC_BY($MUSIC_BY) {$this->MUSIC_BY = $MUSIC_BY;}
    function getMUSIC_BY(){return $this->MUSIC_BY;}
    
    function setSONG_NAME($SONG_NAME) {$this->SONG_NAME = $SONG_NAME;}
    function getSONG_NAME(){return $this->SONG_NAME;}
    
    function setSONG_LINK($SONG_LINK) {$this->SONG_LINK = $SONG_LINK;}
    function getSONG_LINK(){return $this->SONG_LINK;}
    
    function setGENRE($GENRE) {$this->GENRE = $GENRE;}
    function getGENRE(){return $this->GENRE;}
    
    function setIMAGE_LINK($IMAGE_LINK) {$this->IMAGE_LINK = $IMAGE_LINK;}
    function getIMAGE_LINK(){return $this->IMAGE_LINK;}
    
    function setSITE_LINK($SITE_LINK) {$this->SITE_LINK = $SITE_LINK;}
    function getSITE_LINK(){return $this->SITE_LINK;}
    
    function setVIDEO_ID($VIDEO_ID) {$this->VIDEO_ID = $VIDEO_ID;}
    function getVIDEO_ID(){return $this->VIDEO_ID;}
    
    function setLYRIC_ID($LYRIC_ID) {$this->LYRIC_ID = $LYRIC_ID;}
    function getLYRIC_ID(){return $this->LYRIC_ID;}
    
    function setTOTAL_PLAY($TOTAL_PLAY) {$this->TOTAL_PLAY = $TOTAL_PLAY;}
    function getTOTAL_PLAY(){return $this->TOTAL_PLAY;}
    
    function setCREATE_ON($CREATE_ON) {$this->CREATE_ON = $CREATE_ON;}
    function getCREATE_ON(){return $this->CREATE_ON;}
    
    function setCREATE_BY($CREATE_BY) {$this->CREATE_BY = $CREATE_BY;}
    function getCREATE_BY(){return $this->CREATE_BY;}
    
    function setSEARCH_TAG($SEARCH_TAG) {$this->SEARCH_TAG = $SEARCH_TAG;}
    function getSEARCH_TAG(){return $this->SEARCH_TAG;}
    
    function setDESCRIPTION($DESCRIPTION) {$this->DESCRIPTION = $DESCRIPTION;}
    function getDESCRIPTION(){return $this->DESCRIPTION;}


}
