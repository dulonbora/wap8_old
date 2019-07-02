<?php
if (file_exists("../include/Kanexon.php")) {
    require_once "../include/Kanexon.php";
} else {
    require_once "include/Kanexon.php";
}class Language {
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    public function Insert(){
    $query = "INSERT INTO LANGUAGE (LANGUAGE_NAME, IMAGE_LINK, DESCRIPTION) VALUES(?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->LANGUAGE_NAME);
    $stmt->bindParam(2, $this->IMAGE_LINK);
    $stmt->bindParam(3, $this->DESCRIPTION);
    $stmt->execute();
    //$this->ID = $this->conn->lastInsertId();
    $success = 1;
    } catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
        public function CheckAlreadyExit($sid){
    $query = "SELECT * FROM LANGUAGE WHERE LANGUAGE_NAME =?";
    $success = 0;
try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->execute();
} catch(PDOException $ex){echo $ex->getMessage();}
    $row = $stmt->fetch();
       if($row > 0){
        $this->ID=$row['ID'];
        $this->LANGUAGE_NAME=$row['LANGUAGE_NAME'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
        $success = 1;
       }
return $success;}

    public function LoadLanguageDropDown(){
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM LANGUAGE ORDER BY ID DESC LIMIT 30";
        $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($rs);
        if($rows > 0)
            {
            do{
                echo "<option class='form-control' value='".$rows["ID"]."'>".$rows['LANGUAGE_NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadLanguageDropDownIndex(){
        include('include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM LANGUAGE ORDER BY ID DESC LIMIT 30";
        $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($rs);
        if($rows > 0)
            {
            do{
                echo "<option class='form-control' value='".$rows["ID"]."'>".$rows['LANGUAGE_NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }

    
    public function loadvalue($id){
       $Q = "SELECT * FROM LANGUAGE WHERE ID = ? ";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->LANGUAGE_NAME=$row['LANGUAGE_NAME'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function ReturnLanguage($id){
       $Q = "SELECT LANGUAGE_NAME FROM LANGUAGE WHERE ID = ? ";
       $result = "";
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $this->LANGUAGE_NAME=$row['LANGUAGE_NAME'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    
    public function AllLang(){
       $Q = "SELECT * FROM LANGUAGE ORDER BY ID DESC";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }

    
    private $ID;
    private $LANGUAGE_NAME;
    private $IMAGE_LINK;
    private $DESCRIPTION;
    
    	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getLANGUAGE_NAME(){
		return $this->LANGUAGE_NAME;
	}

	public function setLANGUAGE_NAME($LANGUAGE_NAME){
		$this->LANGUAGE_NAME = $LANGUAGE_NAME;
	}

	public function getIMAGE_LINK(){
		return $this->IMAGE_LINK;
	}

	public function setIMAGE_LINK($IMAGE_LINK){
		$this->IMAGE_LINK = $IMAGE_LINK;
	}

	public function getDESCRIPTION(){
		return $this->DESCRIPTION;
	}

	public function setDESCRIPTION($DESCRIPTION){
		$this->DESCRIPTION = $DESCRIPTION;
	}
    

}
