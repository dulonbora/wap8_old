<?php
    require_once "../../include/Kanexon.php";

class SongArtist {
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
    }
    
    
private $ID;
private $SONG_ID;
private $ARTIST_ID;
private $TYPE;

    public function Insert(){
    $query = "INSERT INTO SONG_AND_ARTIST (SONG_ID, ARTIST_ID, TYPE) VALUES(?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->SONG_ID);
    $stmt->bindParam(2, $this->ARTIST_ID);
    $stmt->bindParam(3, $this->TYPE);
    $stmt->execute();
    //$this->ID = $this->conn->lastInsertId();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}

public function CheckAlreadyExit($sid, $aid){
    $query = "SELECT * FROM SONG_AND_ARTIST WHERE SONG_ID =? AND ARTIST_ID = ?";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->bindParam(2, $aid);
    $stmt->execute();
} catch(PDOException $ex){echo $ex->getMessage();}
    $rows = $stmt->fetch();
       if($rows > 0){
        $success = 1;
       }
return $success;}

public function Remove($sid, $aid){
    $query = "DELETE FROM SONG_AND_ARTIST WHERE SONG_ID =$sid AND ARTIST_ID = $aid";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}
return $success;}
        

function setID($ID){$this->ID = $ID;}
function getID() { return $this->ID; }
function setSONG_ID($SONG_ID){$this->SONG_ID = $SONG_ID;}
function getSONG_ID() { return $this->SONG_ID; }
function setARTIST_ID($ARTIST_ID){$this->ARTIST_ID = $ARTIST_ID;}
function getARTIST_ID() { return $this->ARTIST_ID; }
function setTYPE($TYPE){$this->TYPE = $TYPE;}
function getTYPE() { return $this->TYPE; }
}
