<?php
require_once "include/Kanexon.php";

class Category {
       public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

       
    public function Insert(){
    $query = "INSERT INTO CATEGORY(LANGUAGE_ID, CATEGORY_NAME, DESCRIPTION, IMAGE_LINK) VALUES (?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->CATEGORY_NAME);
    $stmt->bindParam(3, $this->DESCRIPTION);
    $stmt->bindParam(4, "");
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
    public function Update($id){
    $query = "INSERT CATEGORY SET LANGUAGE_ID = ?, CATEGORY_NAME =?, DESCRIPTION =?, IMAGE_LINK =? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_ID);
    $stmt->bindParam(2, $this->CATEGORY_NAME);
    $stmt->bindParam(3, $this->DESCRIPTION);
    $stmt->bindParam(4, $this->IMAGE_LINK);
    $stmt->bindParam(5, $id);
    $stmt->execute();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}

    public function UpdateCategorySingle($colm, $id, $getValue){
        $query = "UPDATE CATEGORY SET $colm = ? WHERE ID = ? ";
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
    

    public function LoadCategoryInAdmin(){
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM CATEGORY ORDER BY ID DESC LIMIT 30";
        $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($rs);
        if($rows > 0)
            {
            do{
                $albm = $this->ReturnLang($rows['LANGUAGE_ID']);


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['CATEGORY_NAME']."</td>
                        <td class=''>".$rows['LANGUAGE_ID']."</td>
                        <td class=''>".$rows['LANGUAGE_ID']."</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function ReturnLang($id){
    $sub = "Unknown";
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT LANGUAGE_NAME FROM LANGUAGE WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
    $sub = $rows['LANGUAGE_NAME'];
        }
        return $sub;
    }
    
    public function MainCategory($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT * FROM CATEGORY WHERE LANGUAGE_ID = $id";
    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($rs);
    $counter = 1;
    if($row > 0)
    {   do{
            $catt = str_replace(' ', '-', $row['CATEGORY_NAME']); 
            echo "<a href='/assamese-songs-category/".$row['ID']."/$catt.html' class='list-group-item'>".$row['CATEGORY_NAME']."</a>";
            }
        while($row=mysqli_fetch_assoc($rs));
        
    }
    
    
}

    public function MainCategoryForVide($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT * FROM CATEGORY WHERE TYPE = $id";
    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($rs);
    $counter = 1;
    if($row > 0)
    {   do{
            $catt = str_replace(' ', '-', $row['CATEGORY_NAME']); 
            echo "<a href='/assamese-songs-category/".$row['ID']."/$catt.html' class='list-group-item'>".$row['CATEGORY_NAME']."</a>";
            }
        while($row=mysqli_fetch_assoc($rs));
        
    }
    
    
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


    public function CountSongs($id){
    $total= 0;
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT COUNT(ID) AS TOTAL FROM SONGS WHERE CATEGORY_ID = $id";
    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($rs);
    if($row > 0){$total= $row['TOTAL'];}
    return $total;
}

    public function loadvalue($id){
       $Q = "SELECT * FROM CATEGORY WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->LANGUAGE_ID=$row['LANGUAGE_ID'];
        $this->CATEGORY_NAME=$row['CATEGORY_NAME'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
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
