<?php
    require_once "../../include/Kanexon.php";

class SongAlbum {
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
    }
    
    
private $ID;
private $SONG_ID;
private $ALBUM_ID;

    public function Insert(){
    $query = "INSERT INTO SONG_AND_ALBUM (SONG_ID, ALBUM_ID) VALUES(?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->SONG_ID);
    $stmt->bindParam(2, $this->ALBUM_ID);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}

public function CheckAlreadyExit($sid, $aid){
    $query = "SELECT * FROM SONG_AND_ALBUM WHERE SONG_ID =? AND ALBUM_ID = ?";
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

public function Remove($aid,$sid){
    $query = "DELETE FROM SONG_AND_ALBUM WHERE SONG_ID =$sid AND ALBUM_ID = $aid";
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
function setALBUM_ID($ALBUM_ID){$this->ALBUM_ID = $ALBUM_ID;}
function getALBUM_ID() { return $this->ALBUM_ID; }
}
