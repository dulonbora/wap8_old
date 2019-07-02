<?php
    if(file_exists("include/Kanexon.php")){
    require_once "include/Kanexon.php";
    }  else {
    require_once "../include/Kanexon.php";
}
    
class Albums {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    public function Insert(){
    $query = "INSERT INTO ALBUM (LANGUAGE_ID, ALBUM_NAME, PRODUCTION, YEAR, ART_LINK, "
            . "DESCRIPTION, CATEGORY_ID, MUSIC, COVER, NEWOLD, STATUS, BITRATE, LABEL, TOTAL_VIEW, CREATE_ON) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->ALBUM_NAME);
    $stmt->bindParam(3, $this->PRODUCTION);
    $stmt->bindParam(4, $this->YEAR);
    $stmt->bindParam(5, "");
    $stmt->bindParam(6, $this->DESCRIPTION);
    $stmt->bindParam(7, $this->CATEGORY_ID);
    $stmt->bindParam(8, $this->MUSIC);
    $stmt->bindParam(9, $this->COVER);
    $stmt->bindParam(10, $this->NEWOLD);
    $stmt->bindParam(11, $this->STATUS);
    $stmt->bindParam(12, $this->BITRATE);
    $stmt->bindParam(13, $this->LABEL);
    $stmt->bindParam(14, $this->TOTAL_VIEW);
    $stmt->bindParam(15, time());
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}


    public function Update($id){
    $query = "INSERT ALBUM SET LANGUAGE_ID = ?, ALBUM_NAME = ?, PRODUCTION = ?, YEAR = ?, "
            . "DESCRIPTION = ?, CATEGORY_ID = ?, MUSIC = ?, COVER = ?, NEWOLD = ?, STATUS = ?, BITRATE = ?, LABEL = ?, TOTAL_VIEW = ? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->ALBUM_NAME);
    $stmt->bindParam(3, $this->PRODUCTION);
    $stmt->bindParam(4, $this->YEAR);
    $stmt->bindParam(5, $this->DESCRIPTION);
    $stmt->bindParam(6, $this->CATEGORY_ID);
    $stmt->bindParam(7, $this->MUSIC);
    $stmt->bindParam(8, $this->COVER);
    $stmt->bindParam(9, $this->NEWOLD);
    $stmt->bindParam(10, $this->STATUS);
    $stmt->bindParam(11, $this->BITRATE);
    $stmt->bindParam(12, $this->LABEL);
    $stmt->bindParam(13, $this->TOTAL_VIEW);
    $stmt->bindParam(14, $id);
    $stmt->execute();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}

    public function UpdateAlbumSingle($colm, $id, $getValue){
        $query = "UPDATE ALBUM SET $colm = ?  
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
    
    public function getTotal(){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ALBUM ";
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
       $Q = "SELECT COUNT(*) AS TOTAL FROM ALBUM WHERE CATEGORY_ID = $id AND NEWOLD <> 2";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}

    public function RandomAlbum($start, $limit){
       $Q = "SELECT * FROM ALBUM WHERE NEWOLD <> 2 ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
        public function UpcommingCount(){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ALBUM WHERE NEWOLD = 2";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}

    
    public function Upcomming($start, $limit){
       $Q = "SELECT * FROM ALBUM WHERE NEWOLD = 2 ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function AlbumByCat($start, $limit, $cid){
       $Q = "SELECT * FROM ALBUM WHERE CATEGORY_ID = $cid  AND NEWOLD <> 2 ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }


    public function LoadAlbumsInAdmin(){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM ALBUM ORDER BY ID DESC LIMIT 30";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $albm = $this->ReturnLang($rows['LANGUAGE_ID']);
                $cat = $this->ReturnCategory($rows['CATEGORY_ID']);


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['ALBUM_NAME']."</td>
                        <td class=''>$cat</td>
                        <td class=''>$albm</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function ArtistByAlbumNoLink($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
        $art[] = "<a href='/singer/".$rows["ARTIST_ID"]."/$name.html'>".$rows['ARTIST_NAME']."</a>";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" , ", $art);
       }
       return $result;
    }
    
    
    public function ArtistByAlbumForRelated($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
        $art[] = "".$rows['ARTIST_NAME']."";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" , ", $art);
       }
       return $result;
    }

    
   

            
    public function RelatedAlbums($id){
       $Q = "SELECT * FROM ALBUM WHERE ID != $id AND NEWOLD <> 2 ORDER BY ID DESC LIMIT 10";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
            $link = "NoImage.jpg";
            $image = (strlen($row['ART_LINK'])==14) ? $row['ART_LINK'] : $noimage;    
          //  $cat = $this->ReturnCategoryi($row['CATEGORY_ID']);
            $art = $this->ArtistByAlbumForRelated($row['ID']);
            $sname = strtolower(str_replace(' ', '-', $row['ALBUM_NAME']));
    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='/files/".$row['ID']."/$sname.html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/files/".$row['ID']."/$sname.html'> <span class='block text-ellipsis'>".$row['ALBUM_NAME']."</span> <small class='text-muted'>by $art</small> </a>
        </li>";
        }
        echo "</ul>
</section>";
       return $result;
    }


            



    public function loadvalue($id){
       $Q = "SELECT * FROM ALBUM WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->LANGUAGE_ID=$row['LANGUAGE_ID'];
        $this->CATEGORY_ID=$row['CATEGORY_ID'];
        $this->ALBUM_NAME=$row['ALBUM_NAME'];
        $this->PRODUCTION=$row['PRODUCTION'];
        $this->ART_LINK=$row['ART_LINK'];
        $this->YEAR=$row['YEAR'];
        $this->MUSIC=$row['MUSIC'];
        $this->COVER=$row['COVER'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
        $this->NEWOLD=$row['NEWOLD'];
        $this->STATUS=$row['STATUS'];
        $this->BITRATE=$row['BITRATE'];
        $this->LABEL=$row['LABEL'];
        $this->TOTAL_VIEW=$row['TOTAL_VIEW'];
        $this->CREATE_ON=$row['CREATE_ON'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }




    private $ID;
    private $LANGUAGE_ID;
    private $CATEGORY_ID;
    private $ALBUM_NAME;
    private $PRODUCTION;
    private $ART_LINK;
    private $YEAR;
    private $MUSIC;
    private $COVER;
    private $DESCRIPTION;
    private $NEWOLD; // 1 = old || 0 = New || 2 = Upcomming / 3 = fake
    private $STATUS; // 1 = Approve || 0 = Disapprove
    private $BITRATE;
    private $LABEL;
    private $TOTAL_VIEW;
    private $CREATE_ON;
    private $conn;

    function setID($ID) {
        $this->ID = $ID;
    }

    function getID() {
        return $this->ID;
    }

    function setLANGUAGE_ID($LANGUAGE_ID) {
        $this->LANGUAGE_ID = $LANGUAGE_ID;
    }

    function getLANGUAGE_ID() {
        return $this->LANGUAGE_ID;
    }

    function setALBUM_NAME($ALBUM_NAME) {
        $this->ALBUM_NAME = $ALBUM_NAME;
    }

    function getALBUM_NAME() {
        return $this->ALBUM_NAME;
    }

    function setPRODUCTION($PRODUCTION) {
        $this->PRODUCTION = $PRODUCTION;
    }

    function getPRODUCTION() {
        return $this->PRODUCTION;
    }

    function setART_LINK($ART_LINK) {
        $this->ART_LINK = $ART_LINK;
    }

    function getART_LINK() {
        if (strlen($this->ART_LINK) == 0 || $this->ART_LINK == NULL) {
            $this->ART_LINK = "../image/geetanjali.jpg";
        }return $this->ART_LINK;
    }

    public function setDESCRIPTION($DESCRIPTION) {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    public function getDESCRIPTION() {
        return $this->DESCRIPTION;
    }

    public function getCATEGORY_ID() {
        return $this->CATEGORY_ID;
    }

    public function setCATEGORY_ID($CATEGORY_ID) {
        $this->CATEGORY_ID = $CATEGORY_ID;
    }

    public function getCREATE_ON() {
        return $this->CREATE_ON;
    }

    public function setCREATE_ON($CREATE_ON) {
        $this->CREATE_ON = $CREATE_ON;
    }

    public function getTOTAL_VIEW() {
        return $this->TOTAL_VIEW;
    }

    public function setTOTAL_VIEW($TOTAL_VIEW) {
        $this->TOTAL_VIEW = $TOTAL_VIEW;
    }

    public function getNEWOLD() {
        return $this->NEWOLD;
    }

    public function setNEWOLD($NEWOLD) {
        $this->NEWOLD = $NEWOLD;
    }

    public function getSTATUS() {
        return $this->STATUS;
    }

    public function setSTATUS($STATUS) {
        $this->STATUS = $STATUS;
    }

    public function getCOVER() {
        return $this->COVER;
    }

    public function setCOVER($COVER) {
        $this->COVER = $COVER;
    }

    public function getLABEL() {
        return $this->LABEL;
    }

    public function setLABEL($LABEL) {
        $this->LABEL = $LABEL;
    }

    public function getMUSIC() {
        return $this->MUSIC;
    }

    public function setMUSIC($MUSIC) {
        $this->MUSIC = $MUSIC;
    }

    public function getBITRATE() {
        return $this->BITRATE;
    }

    public function setBITRATE($BITRATE) {
        $this->BITRATE = $BITRATE;
    }

    public function getYEAR() {
        return $this->YEAR;
    }

    public function setYEARS($YEAR) {
        $this->YEAR = $YEAR;
    }

}
