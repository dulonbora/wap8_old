<?php
require_once "../include/Kanexon.php";
class Story {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    private $ID;
    private $NAME;
    private $DESCRIBTION;
    private $CATEGORY_ID;
    private $IMAGE_LINK;
    private $SUBMITTED_BY;
    
    
public function Insert(){
$query = "INSERT INTO STORIES(NAME , DESCRIBTION , CATEGORY_ID , IMAGE_LINK , SUBMITTED_BY) 
	VALUES ( ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->NAME); 
	$stmt->bindParam (2 , $this->DESCRIBTION); 
	$stmt->bindParam (3 , $this->CATEGORY_ID); 
	$stmt->bindParam (4 , $this->IMAGE_LINK); 
	$stmt->bindParam (5 , $this->SUBMITTED_BY); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

public function Update($id){
$query = "UPDATE STORIES SET NAME = ? , DESCRIBTION = ? , CATEGORY_ID = ? , IMAGE_LINK = ? , SUBMITTED_BY = ? 
	WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->NAME); 
	$stmt->bindParam (2 , $this->DESCRIBTION); 
	$stmt->bindParam (3 , $this->CATEGORY_ID); 
	$stmt->bindParam (4 , $this->IMAGE_LINK); 
	$stmt->bindParam (5 , $this->SUBMITTED_BY); 
	$stmt->bindParam (6 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/




    function setID($ID) {
        $this->ID = $ID;
    }

    function getID() {
        return $this->ID;
    }
    
    function setNAME($NAME) {
        $this->NAME = $NAME;
    }

    function getNAME() {
        return $this->NAME;
    }

    function setDESCRIBTION($DESCRIBTION) {
        $this->DESCRIBTION = $DESCRIBTION;
    }

    function getDESCRIBTION() {
        return $this->DESCRIBTION;
    }

    function setCATEGORY_ID($CATEGORY_ID) {
        $this->CATEGORY_ID = $CATEGORY_ID;
    }

    function getCATEGORY_ID() {
        return $this->CATEGORY_ID;
    }

    function setIMAGE_LINK($IMAGE_LINK) {
        $this->IMAGE_LINK = $IMAGE_LINK;
    }

    function getIMAGE_LINK() {
        return $this->IMAGE_LINK;
    }

    function setSUBMITTED_BY($SUBMITTED_BY) {
        $this->SUBMITTED_BY = $SUBMITTED_BY;
    }

    function getSUBMITTED_BY() {
        return $this->SUBMITTED_BY;
    }

}
