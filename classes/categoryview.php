<?php
require_once "include/Kanexon.php";

class CategoryView {
       public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

      

    public function MainCategoryIndex($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT * FROM CATEGORY WHERE TYPE = $id";
    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($rs);
    $counter = 1;
    if($row > 0)
    {   do{
            $catt = str_replace(' ', '-', $row['CATEGORY_NAME']); 
            
            echo "<li > <a href='/songs-category/".$row['ID']."/$catt.html' class='auto'>
                <i class='fa fa-angle-right text-xs'></i> <span>".$row['CATEGORY_NAME']."</span> </a>
                                </li>";
            }
        while($row=mysqli_fetch_assoc($rs));
        
    }
    
    
}








private $ID;
private $LANGUAGE_ID;
private $CATEGORY_NAME;
private $DESCRIPTION;
private $IMAGE_LINK;
private $conn;


        function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setLANGUAGE_ID($LANGUAGE_ID) { $this->LANGUAGE_ID = $LANGUAGE_ID; }
function getLANGUAGE_ID() { return $this->LANGUAGE_ID; }
function setCATEGORY_NAME($CATEGORY_NAME) { $this->CATEGORY_NAME = $CATEGORY_NAME; }
function getCATEGORY_NAME() { return $this->CATEGORY_NAME; }
function setDESCRIPTION($DESCRIPTION) { $this->DESCRIPTION = $DESCRIPTION; }
function getDESCRIPTION() { return $this->DESCRIPTION; }
function setIMAGE_LINK($IMAGE_LINK) {$this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() {
    if(strlen($this->IMAGE_LINK)==0 || $this->IMAGE_LINK==NULL){
    $this->IMAGE_LINK="../image/geetanjali.jpg";
    }
    return $this->IMAGE_LINK; }
}
