<?php
    require_once "../include/Kanexon.php";

class Artist {
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    public function Insert(){
    $query = "INSERT INTO ARTIST(ARTIST_NAME, IMAGE_LINK, BORN_ON, DESCRIPTION) VALUES (?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->ARTIST_NAME);
    $stmt->bindParam(2, $this->IMAGE_LINK);
    $stmt->bindParam(3, $this->BORN_ON);
    $stmt->bindParam(4, $this->DESCRIPTION);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}


    public function Update($id){
    $query = "UPDATE ARTIST SET ARTIST_NAME = ?, BORN_ON = ?, DESCRIPTION = ? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->ARTIST_NAME);
    $stmt->bindParam(2, $this->BORN_ON);
    $stmt->bindParam(3, $this->DESCRIPTION);
    $stmt->bindParam(4, $id);
    $stmt->execute();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}

    public function getTotal(){
    $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST ";
    $total = 0;
    try{
    $stmt = $this->conn->query($Q);
    $stmt->execute();
    $total = $stmt->fetchColumn();}
    catch (PDOException $ex){echo $ex->getMessage();}
    return $total;}
    
        public function UpdateAlbumSingle($colm, $id, $getValue){
        $query = "UPDATE ARTIST SET $colm = ?  
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


    public function AllArtist($start, $limit){
       $Q = "SELECT * FROM ARTIST ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function CheckAlreadyExit($sid){
    $query = "SELECT * FROM ARTIST WHERE ARTIST_NAME =?";
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



    
    public function getTotalByartist($id){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST_VIEW WHERE ARTIST_ID = $id";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
    }

    
    public function ArtistList(){
       $Q = "SELECT * FROM ARTIST ORDER BY ID DESC LIMIT 30";
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
            $image = ($row['IMAGE_LINK']==$link) ? $noimage : $noimage;
            $count = $this->getTotalByartist($row['ID']);
    echo "<li class='list-group-item clearfix'>
<a href='artist.php?i=".$row['ID']."' class='pull-left thumb-sm m-r'> <img src='$image' alt='...'> </a>
<a class='clear' href='artist.php?i=".$row['ID']."'> <span class='block text-ellipsis'>".$row['ARTIST_NAME']."</span> </a>
<small class='text-muted'>$count Songs</small> </a>
</li>";
        }
       return $result;
    }

    
    
    
    
    public function ArtistByAlbum($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $art[] = "<a href='artist.php?i=".$rows["ARTIST_ID"]."'>".$rows['ARTIST_NAME']."</a>";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" | ", $art);
       }
       return $result;
    }
        public function ArtistBySongsList($id){
       $Q = "SELECT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
              echo "<tr><td>".$rows["ARTIST_NAME"]." <b id='".$rows["ARTIST_ID"]."' class='btn btn-xs btn-success btn-rounded pull-right delbtn'>x<b></tr></td>";
        }
        while($rows = $stmt->fetch());   
       }
       return $result;
    }


        public function loadvalue($id){
       $Q = "SELECT * FROM ARTIST WHERE ID = $id";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->ARTIST_NAME=$row['ARTIST_NAME'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
        $this->BORN_ON=$row['BORN_ON'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }

    

    
    

private $ID;
private $ARTIST_NAME;
private $IMAGE_LINK;
private $BORN_ON;
private $DESCRIPTION;


function setID($ID){$this->ID = $ID;}
function getID() { return $this->ID; }
function setARTIST_NAME($ARTIST_NAME) { $this->ARTIST_NAME = $ARTIST_NAME; }
function getARTIST_NAME() { return $this->ARTIST_NAME; }
function setIMAGE_LINK($IMAGE_LINK) {$this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() {if(strlen($this->IMAGE_LINK)==0 || $this->IMAGE_LINK==NULL){$this->IMAGE_LINK="../image/geetanjali.jpg";}return $this->IMAGE_LINK;}
function setBORN_ON($BORN_ON) { $this->BORN_ON = $BORN_ON; }
function getBORN_ON() { return $this->BORN_ON; }
function setDESCRIPTION($DESCRIPTION) { $this->DESCRIPTION = $DESCRIPTION; }
function getDESCRIPTION() { return $this->DESCRIPTION; }
public function getBIO(){return $this->BIO;}
public function setBIO($BIO){$this->BIO = $BIO;}

  
/* -------------------------------------------------------------------- */
//This javascript function will redirect a another page
//after the execution of a function.
public function Redirect($page){
echo "<script type=\"text/javascript\">	";
echo "document.location = '".$page."' ";
echo "</script>";
}
/* -------------------------------------------------------------------- */


}
