<?php
    require_once "../db/Kanexon.php";
class Location {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}    
      
private $ID;
private $P_ID;
private $LOCATION;
private $TYPE;



public function checkLocation($location, $type){
    $ok = 1;
        try{
        $Q = "SELECT * FROM LOCATION WHERE LOCATION = ? AND TYPE = ? ";
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $location);
        $stmt->bindParam(2, $type);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            $ok = 0;
        }
        } catch(PDOException $ex){echo $ex->getMessage();}
        return $ok;
}

public function Insert(){
$query = "INSERT INTO LOCATION(P_ID , LOCATION , TYPE) 
	VALUES ( ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->P_ID); 
	$stmt->bindParam (2 , $this->LOCATION); 
	$stmt->bindParam (3 , $this->TYPE); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

    public function loadvalue($id){
       $Q = "SELECT * FROM LOCATION WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->P_ID=$row['P_ID'];
        $this->LOCATION=$row['LOCATION'];
        $this->TYPE=$row['TYPE'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function getTotal($id){
       $Q = "SELECT COUNT(*) AS TOTAL LOCATION WHERE P_ID = ?";
       $total = 0;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
    }

    
    public function GetParentLocation($id, $start, $limit){
       $Q = "SELECT * FROM LOCATION WHERE P_ID = ? ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
       return $result;
    }




function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setP_ID($P_ID) { $this->P_ID = $P_ID; }
function getP_ID() { return $this->P_ID; }
function setLOCATION($LOCATION) { $this->LOCATION = $LOCATION; }
function getLOCATION() { return $this->LOCATION; }
function setTYPE($TYPE) { $this->TYPE = $TYPE; }
function getTYPE() { return $this->TYPE; }
}
