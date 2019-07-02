<?php
    require_once "../include/Kanexon.php";

class Jokes {
     public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}
public $ID;
public $HEADLINE;
public $CONTENT;
public $IMG_LINK;
public $TOTAL_VISIT;
public $CATEGORY;
public $POST_ON;
public $POST_BY;
public $STATUS;
public $TYPE;
public $COMMENT;

    public function Insert(){
    $query = "INSERT INTO JOKES(HEADLINE, CONTENT, IMAGE_LINK, TOTAL_VISIT, POST_ON, POST_BY, TOTAL_LIKE, STATUS) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->HEADLINE);
    $stmt->bindParam(2, $this->CONTENT);
    $stmt->bindParam(3, $this->IMG_LINK);
    $stmt->bindParam(4, $this->TOTAL_VISIT);
    $stmt->bindParam(5, $this->CATEGORY);
    $stmt->bindParam(6, $this->POST_ON);
    $stmt->bindParam(7, $this->POST_BY);
    $stmt->bindParam(9, $this->STATUS);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
    public function Update($id){
    $query = "UPDATE JOKES SET HEADLINE = ?, CONTENT = ?, STATUS = ? WHERE ID = ?";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->HEADLINE);
    $stmt->bindParam(2, $this->CONTENT);
    $stmt->bindParam(3, $this->STATUS);
    $stmt->bindParam(4, $id);
    $stmt->execute();
    $success = 1;}
    catch(PDOException $ex){echo $ex->getMessage();}   
    return $success;}
    
    public function UpdateAlbumSingle($colm, $id, $getValue){
        $query = "UPDATE JOKES SET $colm = ?  
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
    $query = "SELECT * FROM JOKES WHERE HEADLINE =?";
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
    $Q = "SELECT COUNT(*) AS TOTAL FROM JOKES WHERE TYPE = $id ";
    $total = 0;
    try{
    $stmt = $this->conn->query($Q);
    $stmt->execute();
    $total = $stmt->fetchColumn();}
    catch (PDOException $ex){echo $ex->getMessage();}
    return $total;}

    public function AllFecth($start, $limit, $type){
       $Q = "SELECT * FROM JOKES WHERE TYPE = $type ORDER BY ID DESC LIMIT ".$start." ," . $limit ." ";
       $result = null;
       try{
       $stmt = $this->conn->query($Q);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function substrwords($text, $maxchar, $end='') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

    
        public function AllFecthLimit($type, $id){
       $Q = "SELECT * FROM JOKES WHERE TYPE = $type AND ID <> $id ORDER BY ID DESC LIMIT 10";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
            $link = "NoImage.jpg";
            $image = (strlen($row['IMG_LINK'])==14) ? $row['IMG_LINK'] : $noimage;    
    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='blogview.php?i=".$row['ID']."' class='pull-left thumb-sm m-r'> <img src='image/$image' alt='...'> </a>
    <a class='clear' href='files.php?i=".$row['ID']."'> <span class='block text-ellipsis'>".$row['HEADLINE']."</span> <small class='text-muted'>by </small> </a>
        </li>";
        }
        echo "</ul>
</section>";
       return $result;
    }

    public function AllFecthLimit1($type, $id){
       $Q = "SELECT * FROM JOKES WHERE TYPE = $type AND ID <> $id ORDER BY ID DESC LIMIT 10";
       $result = null;
       try{
       $stmt = $this->conn->query($Q);
       $stmt->execute();}
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
        {
           $noimage = "geetanjali.jpg";
        $image = (strlen($row['IMG_LINK'])==14) ? $row['IMG_LINK'] : $noimage;  
    echo '<article class="media"> <a class="pull-left thumb thumb-wrapper m-t-xs">';
    echo "<img src='image/$image'> </a> <div class='media-body'>";
    echo "<a class='font-semibold' href='blogview.php?i=".$row['ID']."'>".$row['HEADLINE']."</a></div> </article>";
        }
    }
    
        public function RelatedPOsts($type, $id){
       $Q = "SELECT * FROM JOKES WHERE TYPE = $type AND ID <> $id ORDER BY ID DESC LIMIT 10";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
            $image = (strlen($row['IMG_LINK'])==14) ? $row['IMG_LINK'] : $noimage;    
          //  $cat = $this->ReturnCategoryi($row['CATEGORY_ID']);
    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='files.php?i=".$row['ID']."' class='pull-left thumb-sm m-r'> <img src='image/$image' alt='...'> </a>
    <a class='clear' href='blogview.php?i=".$row['ID']."'> <span class='block text-ellipsis'>".$row['HEADLINE']."</span>"
            . " <small class='text-muted'>by </small> </a>
        </li>";
        }
        echo "</ul>
</section>";
    }

    
    public function loadvalue($id){
        $Q = "SELECT * FROM JOKES WHERE ID = $id";
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
        }
        catch (PDOException $ex){echo $ex->getMessage();}
        return $result;
        }
    
/*---------------------------------------------*/
public function getID(){return $this->ID;}
public function getHEADLINE(){return $this->HEADLINE;}
public function getCONTENT(){return $this->CONTENT;}
public function getIMG_LINK(){return $this->IMG_LINK;}
public function getTOTAL_VISIT(){return $this->TOTAL_VISIT;}
public function getPOST_ON(){return $this->POST_ON;}
public function getPOST_BY(){return $this->POST_BY;}
public function getCOMMENT(){return $this->COMMENT;}
public function getTYPE(){return $this->TYPE;}
public function getSTATUS(){return $this->STATUS;}

/*---------------------------------------------*/
public function setID($ID){$this->ID=$ID;}
public function setHeadLine($HEADLINE){$this->HEADLINE=$HEADLINE;}
public function setContent($CONTENT){$this->CONTENT=$CONTENT;}
public function setIMG_LINK($IMG_LINK){$this->IMG_LINK=$IMG_LINK;}
public function setTOTAL_VISIT($TOTAL_VISIT){$this->TOTAL_VISIT=$TOTAL_VISIT;}
public function setPOST_ON($POST_ON){$this->POST_ON=$POST_ON;}
public function setPOST_BY($POST_BY){$this->POST_BY=$POST_BY;}
public function setCOMMENT($COMMENT){$this->COMMENT=$COMMENT;}
public function setTYPE($TYPE){$this->TYPE=$TYPE;}
public function setSTATUS($STATUS){$this->STATUS=$STATUS;}


function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}
}
