<?php
require_once "../include/Kanexon.php";
class Qoutes {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}
private $ID;
private $QUOTES;
private $WRITTEN_BY;
private $CATEGORY_ID;
private $IMAGE_LINK;
private $SUBMITTED_BY;

public function Insert(){
$query = "INSERT INTO QUOTES(QUOTES , WRITTEN_BY , CATEGORY_ID , IMAGE_LINK , SUBMITTED_BY) 
	VALUES ( ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->QUOTES); 
	$stmt->bindParam (2 , $this->WRITTEN_BY); 
	$stmt->bindParam (3 , $this->CATEGORY_ID); 
	$stmt->bindParam (4 , $this->IMAGE_LINK); 
	$stmt->bindParam (5 , $this->SUBMITTED_BY); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

public function Update($id){
$query = "UPDATE QUOTES SET QUOTES = ? , WRITTEN_BY = ? , CATEGORY_ID = ? , SUBMITTED_BY = ? 
	WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->QUOTES); 
	$stmt->bindParam (2 , $this->WRITTEN_BY); 
	$stmt->bindParam (3 , $this->CATEGORY_ID); 
	$stmt->bindParam (4 , $this->SUBMITTED_BY); 
	$stmt->bindParam (5 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/



function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setQUOTES($QUOTES) { $this->QUOTES = $QUOTES; }
function getQUOTES() { return $this->QUOTES; }
function setWRITTEN_BY($WRITTEN_BY) { $this->WRITTEN_BY = $WRITTEN_BY; }
function getWRITTEN_BY() { return $this->WRITTEN_BY; }
function setCATEGORY_ID($CATEGORY_ID) { $this->CATEGORY_ID = $CATEGORY_ID; }
function getCATEGORY_ID() { return $this->CATEGORY_ID; }
function setIMAGE_LINK($IMAGE_LINK) { $this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() { return $this->IMAGE_LINK; }
function setSUBMITTED_BY($SUBMITTED_BY) { $this->SUBMITTED_BY = $SUBMITTED_BY; }
function getSUBMITTED_BY() { return $this->SUBMITTED_BY; }

}
