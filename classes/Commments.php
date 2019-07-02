<?php
    require_once "include/Kanexon.php";

class Comments{
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}
    
    private $ID;
    private $EMAIL;
    private $USERNAME;
    private $COMMENT;
    private $POST_ON;
    private $TYPE; //0 = Jokes || 1 Blogs : 2 = Songs | 3 = Albums | 4 Videos
    private $APPORVED;
    private $PRENT_ID;
    
    public function Insert(){
    $query = "INSERT INTO COMMENT(EMAIL, USERNAME, COMMENT, POST_ON, APPORVED, TYPE, PRENT_ID) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->EMAIL);
    $stmt->bindParam(2, $this->USERNAME);
    $stmt->bindParam(3, $this->COMMENT);
    $stmt->bindParam(4, $this->POST_ON);
    $stmt->bindParam(5, $this->APPORVED);
    $stmt->bindParam(6, $this->TYPE);
    $stmt->bindParam(7, $this->PRENT_ID);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}

    public function Update($id){
    $query = "UPDATE COMMENT SET EMAIL = ?, USERNAME = ?, COMMENT = ?, POST_ON = ?, APPORVED = ?, TYPE = ?, PRENT_ID = ? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->EMAIL);
    $stmt->bindParam(2, $this->USERNAME);
    $stmt->bindParam(3, $this->COMMENT);
    $stmt->bindParam(4, $this->POST_ON);
    $stmt->bindParam(5, $this->TYPE);
    $stmt->bindParam(6, $this->APPORVED);
    $stmt->bindParam(7, $this->PRENT_ID);
    $stmt->bindParam(8, $id);
    $stmt->execute();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
        public function UpdateAlbumSingle($colm, $id, $getValue){
        $query = "UPDATE COMMENT SET $colm = ?  
	WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $getValue);
            $stmt->bindParam(2, $id);
            $stmt->execute();
            $success = 1;}
        catch (PDOException $ex) {echo $ex->getMessage();}
        return $success;
    }
    
    public function CheckAlreadyExit($sid){
    $query = "SELECT * FROM COMMENT WHERE EMAIL =?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->execute();}
    catch(PDOException $ex){echo $ex->getMessage();}
    $rows = $stmt->fetch();
    if($rows > 0){$success = 1;}
    return $success;}
    
        public function getTotal($id){
    $Q = "SELECT COUNT(*) AS TOTAL FROM COMMENT";
    $total = 0;
    try{
    $stmt = $this->conn->query($Q);
    $stmt->execute();
    $total = $stmt->fetchColumn();}
    catch (PDOException $ex){echo $ex->getMessage();}
    return $total;}
    
    public function getTotalCOmmentBycost($Type, $pid){
    $Q = "SELECT COUNT(*) AS TOTAL FROM COMMENT WHERE TYPE = ".$Type." AND PRENT_ID = ".$pid." ";
    $total = 0;
    try{
    $stmt = $this->conn->query($Q);
    $stmt->execute();
    $total = $stmt->fetchColumn();}
    catch (PDOException $ex){echo $ex->getMessage();}
    return $total;}
    
    public function AllFecth($start, $limit){
       $Q = "SELECT * FROM COMMENT ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
       $stmt = $this->conn->query($Q);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
  
        public function LoadCommentInPost($Type, $pid){
       $Q = "SELECT * FROM COMMENT WHERE TYPE = $Type AND PRENT_ID = $pid ORDER BY ID DESC LIMIT 10";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
        {
        $noimage = "geetanjali.jpg";
        $dat = $this->date(date('d-m-y', $row['POST_ON']));
        
        echo "<article id='comment-id-1' class='comment-item'>
        <a class='pull-left thumb-sm avatar'>
            <img src='/image/$noimage' class='img-circle' alt='...'>
        </a> <span class='arrow left'></span>
        <section class='comment-body panel panel-default'>
            <header class='panel-heading bg-white'>
                <a href='#'>".$row['USERNAME']."</a>
                <label class='label bg-info m-l-xs'>User</label>
                <span class='text-muted m-l-sm pull-right'> <i class='fa fa-clock-o'></i> $dat </span>
            </header> <div class='panel-body'>
                <div>".$row['COMMENT']."</div>
                 </div> </section> </article>";
        
        }
        }
        
                public function date($dt){
        $date = "";
        $category = "";
        $ddt = explode('-', $dt);
        switch ($ddt[1]){
        case 1: $category = "Jan"; break;
        case 2: $category = "Feb"; break;
        case 3: $category = "Mar"; break;
        case 4: $category = "Apr"; break;
        case 5: $category = "May"; break;
        case 6: $category = "Jun"; break;
        case 7: $category = "Jul"; break;
        case 8: $category = "Aug"; break;
        case 9: $category = "Sep"; break;
        case 10: $category = "Oct"; break;
        case 11: $category = "Nov"; break;
    default : $category = "Dec";
}
$date = $category." ".$ddt[1]." ".$ddt[2];
        return $date;
    }


    
    public function loadvalue($id){
        $Q = "SELECT * FROM COMMENT WHERE ID = $id";
        $result = null;
        try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->HEADLINE=$row['HEADLINE'];
        $this->CONTENT=$row['CONTENT'];
        $this->IMG_LINK=$row['IMG_LINK'];
        $this->TOTAL_VISIT=$row['TOTAL_VISIT'];
        $this->T=$row['POST_BY'];
        $this->POST_BY=$row['POST_BY'];
        $this->TYPE=$row['TYPE'];
        $this->COMMENT=$row['COMMENT'];
        $this->POST_ON=$row['POST_ON'];
        }
        catch (PDOException $ex){echo $ex->getMessage();}
        return $result;
        }




      

    
function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}

	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getTYPE_ID(){
		return $this->TYPE_ID;
	}

	public function setTYPE_ID($TYPE_ID){
		$this->TYPE_ID = $TYPE_ID;
	}

	public function getEMAIL(){
		return $this->EMAIL;
	}

	public function setEMAIL($EMAIL){
		$this->EMAIL = $EMAIL;
	}

	public function getUSERNAME(){
		return $this->USERNAME;
	}

	public function setUSERNAME($USERNAME){
		$this->USERNAME = $USERNAME;
	}

	public function getCOMMENT(){
		return $this->COMMENT;
	}

	public function setCOMMENT($COMMENT){
		$this->COMMENT = $COMMENT;
	}

	public function getPOST_ON(){
		return $this->POST_ON;
	}

	public function setPOST_ON($POST_ON){
		$this->POST_ON = $POST_ON;
	}

	
	

	public function getTYPE(){
		return $this->TYPE;
	}

	public function setTYPE($TYPE){
		$this->TYPE = $TYPE;
	}

	public function getAPPORVED(){
		return $this->APPORVED;
	}

	public function setAPPORVED($APPORVED){
		$this->APPORVED = $APPORVED;
	}

	public function getPRENT_ID(){
		return $this->PRENT_ID;
	}

	public function setPRENT_ID($PRENT_ID){
		$this->PRENT_ID = $PRENT_ID;
	}


}




?>



