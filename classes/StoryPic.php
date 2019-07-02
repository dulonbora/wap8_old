<?php
require_once "../include/Kanexon.php";
class StoryPic {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    private $ID;
private $STORY_ID;
private $CAPTION;
private $IMAGE_LINK;
private $SUBMITTED_BY;


public function Insert(){
$query = "INSERT INTO STORIE_PIC(STORY_ID , CAPTION , IMAGE_LINK , SUBMITTED_BY) 
	VALUES ( ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->STORY_ID); 
	$stmt->bindParam (2 , $this->CAPTION); 
	$stmt->bindParam (3 , $this->IMAGE_LINK); 
	$stmt->bindParam (4 , $this->SUBMITTED_BY); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

public function Update($id){
$query = "UPDATE STORIE_PIC SET STORY_ID = ? , CAPTION = ? , IMAGE_LINK = ? , SUBMITTED_BY = ? 
	WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->STORY_ID); 
	$stmt->bindParam (2 , $this->CAPTION); 
	$stmt->bindParam (3 , $this->IMAGE_LINK); 
	$stmt->bindParam (4 , $this->SUBMITTED_BY); 
	$stmt->bindParam (5 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/



function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setSTORY_ID($STORY_ID) { $this->STORY_ID = $STORY_ID; }
function getSTORY_ID() { return $this->STORY_ID; }
function setCAPTION($CAPTION) { $this->CAPTION = $CAPTION; }
function getCAPTION() { return $this->CAPTION; }
function setIMAGE_LINK($IMAGE_LINK) { $this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() { return $this->IMAGE_LINK; }
function setSUBMITTED_BY($SUBMITTED_BY) { $this->SUBMITTED_BY = $SUBMITTED_BY; }
function getSUBMITTED_BY() { return $this->SUBMITTED_BY; }

}
