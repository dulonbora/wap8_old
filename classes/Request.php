<?php
if (file_exists("../include/Kanexon.php")) {
    require_once "../include/Kanexon.php";
} else {
    require_once "include/Kanexon.php";
}

class Request {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}


private $conn;
private $ID;
private $LANGUAGE_ID;
private $ALBUM_NAME;
private $OTHER;
private $EMAIL;
private $STATUS;

    public function getTotalUnSeen() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM REQUEST WHERE STATUS = 0 ";
        $total = 0;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }


//----------------------------------------------------------------------------//
public function Insert(){
$query = "INSERT INTO REQUEST(LANGUAGE_ID , EMAIL, ALBUM_NAME , OTHER , STATUS) 
	VALUES ( ? , ? , ? , ?, ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->LANGUAGE_ID); 
	$stmt->bindParam (2 , $this->EMAIL); 
	$stmt->bindParam (3 , $this->ALBUM_NAME); 
	$stmt->bindParam (4 , $this->OTHER); 
	$stmt->bindParam (5 , $this->STATUS); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/
    public function getTotal(){
    $Q = "SELECT COUNT(*) AS TOTAL FROM REQUEST";
    $total = 0;
    try{
    $stmt = $this->conn->prepare($Q);
    $stmt->execute();
    $total = $stmt->fetchColumn();}
    catch (PDOException $ex){echo $ex->getMessage();}
    return $total;}

 /*----------------------------------------------------------*/
    public function AllFecth($start, $limit){
       $Q = "SELECT * FROM REQUEST ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
       $stmt = $this->conn->prepare($Q);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }

//----------------------------------------------------------------------------//
public function Update(){
$query = "UPDATE REQUEST SET STATUS = 1 WHERE STATUS = 0 ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}


    public function UpdateTotalPlay() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $query = "UPDATE REQUEST SET STATUS = 1";
        $success = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

 /*----------------------------------------------------------*/


/*
$__req = new Request();

$_status = filter_input(INPUT_POST , 'STATUS');
$_id = filter_input(INPUT_POST , 'ID');


$__req->setSTATUS($_status);
$__req->setID($_id);

if($__req->Update($_id)==1){$response['SUCCESS'] = 1;}
*/
//----------------------------------------------------------------------------//

function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setLANGUAGE_ID($LANGUAGE_ID) { $this->LANGUAGE_ID = $LANGUAGE_ID; }
function getLANGUAGE_ID() { return $this->LANGUAGE_ID; }
function setALBUM_NAME($ALBUM_NAME) { $this->ALBUM_NAME = $ALBUM_NAME; }
function getALBUM_NAME() { return $this->ALBUM_NAME; }
function setOTHER($OTHER) { $this->OTHER = $OTHER; }
function getOTHER() { return $this->OTHER; }
function setSTATUS($STATUS) { $this->STATUS = $STATUS; }
function getSTATUS() { return $this->STATUS; }
function setEMAIL($EMAIL) { $this->EMAIL = $EMAIL; }
function getEMAIL() { return $this->EMAIL; }

}
