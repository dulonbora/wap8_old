<?php
    require_once "include/Kanexon.php";

class Artist {
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();
}

    public function Insert(){
        include('../include/database.php');
        $atn = mysqli_real_escape_string($conn, $this->ARTIST_NAME);
        $iml = mysqli_real_escape_string($conn, $this->IMAGE_LINK);
        $bo = mysqli_real_escape_string($conn, $this->BORN_ON);
        $d = mysqli_real_escape_string($conn, $this->DESCRIPTION);
	mysqli_select_db($conn, $data);
        $save = "INSERT INTO ARTIST(ARTIST_NAME, IMAGE_LINK, BORN_ON, DESCRIPTION) VALUES ('.$atn.', '.$iml.', '.$bo.', '.$d.')";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
        }

    
    public function LoadArtistInAdmin(){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM ARTIST ORDER BY ID DESC LIMIT 30";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['ARTIST_NAME']."</td>
                        <td class=''>".$rows['BORN_ON']."</td>
                        <td class=''>".$rows['DESCRIPTION']."</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function getTotalByartist($id){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST_VIEW WHERE ARTIST_ID = $id";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
    }

    
    public function ArtistList($id){
       $Q = "SELECT * FROM ARTIST WHERE ID != $id ORDER BY ID DESC LIMIT 30";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
         $image = (strlen($row['IMAGE_LINK']) > 5) ? $row['IMAGE_LINK'] : $noimage;    
            $count = $this->getTotalByartist($row['ID']);
            $name = strtolower(str_replace(' ', '-', $row['ARTIST_NAME']));
    echo "<li class='list-group-item clearfix'>
<a href='artist.php?i=".$row['ID']."' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
<a class='clear' href='/singer/".$row["ID"]."/$name.html'> <span class='block text-ellipsis'>".$row['ARTIST_NAME']."</span> </a>
<small class='text-muted'>$count Songs</small> </a>
</li>";
        }
       return $result;
    }
    
    public function AlbumByArtist($id){
       $Q = "SELECT DISTINCT ALBUM_NAME, ALBUM_ID, ARTIST_NAME, IMAGE_LINK FROM ARTIST_VIEW WHERE ARTIST_ID = $id ORDER BY ID DESC LIMIT 30";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
         $image = (strlen($row['IMAGE_LINK'])==14) ? $row['IMAGE_LINK'] : $noimage;    
        $sname = strtolower(str_replace(' ', '-', $row['ALBUM_NAME']));
    echo "<li class='list-group-item clearfix'>
<a href='/files/".$row['ALBUM_ID']."/$sname.html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
<a class='clear' href='/files/".$row['ALBUM_ID']."/$sname.html'> <span class='block text-ellipsis'>".$row['ALBUM_NAME']."</span> </a>
<small class='text-muted'>".$row['ARTIST_NAME']."</small> </a>
</li>";
        }
       return $result;
    }
    
    
    public function AlbumByArtistCount($id){
       $Q = "SELECT COUNT(DISTINCT ALBUM_ID) AS TOTAL FROM ARTIST_VIEW WHERE ARTIST_ID = $id ORDER BY ID DESC LIMIT 30";
       $result = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       
       return $result;
    }

    
    
    
    
    public function ArtistByAlbumNoLink($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
        $art[] = "<a href='/singer/".$rows["ARTIST_ID"]."/$name.html'>".$rows['ARTIST_NAME']."</a>";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" , ", $art);
       }
       return $result;
    }
    
    public function ArtistByAlbum($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
        $art[] = "<a href='/singer/".$rows["ARTIST_ID"]."/$name.html'>".$rows['ARTIST_NAME']."</a>";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" | ", $art);
       }
       return $result;
    }
    
    public function ArtistBySongs($id){
       $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
        $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
        $art[] = "<a href='/singer/".$rows["ARTIST_ID"]."/$name.html'>".$rows['ARTIST_NAME']."</a>";
        }
        while($rows = $stmt->fetch());   
        $result = implode(" , ", $art);
       }
       return $result;
    }
    
    public function ArtistBySongsList($id){
       $Q = "SELECT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ID = $id ORDER BY ARTIST_ID DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
              echo "<tr><td>".$rows["ARTIST_NAME"]."</tr></td>";
        }
        while($rows = $stmt->fetch());   
       }
       return $result;
    }
    
    
    
    

    public function ArtistIndex($id){
       $Q = "SELECT * FROM ARTIST ORDER BY ID DESC LIMIT $id";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
               echo '<table width="100%" cellpadding="1" cellspacing="1">';
       while ($row = $stmt->fetch())
        {
         $noimage = "geetanjali.jpg";
         $image = (strlen($row['IMAGE_LINK']) > 5) ? $row['IMAGE_LINK'] : $noimage;    
            $count = $this->getTotalByartist($row['ID']);
          $name = strtolower(str_replace(' ', '-', $row['ARTIST_NAME']));

    echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2"> <div class="item"> 
            <div class="pos-rlt">
            <div class="item-overlay opacity r r-2x bg-black"> 
            <div class="text-info padder m-t-sm text-sm"> 
            
             </div>
            <div class="center text-center m-t-n">';
            echo "<a href='/singer/".$row["ID"]."/$name.html'>";
            echo '<i class="icon-control-play i-2x"></i></a>
            </div> </div>'; 
            echo "<a href='/singer/".$row["ID"]."/$name.html'>";
            echo "<img src='/image/".$image."' alt='' class='r r-2x img-full'></a> </div>";
            echo "<div class='padder-v'> "
            . "<a href='/singer/".$row["ID"]."/$name.html' class='text-ellipsis'>".$row['ARTIST_NAME']."</a>";
            echo "<small class='text-muted'>$count Songs</small></div>"
                    . " </div></div>";
        }
                        echo '</table>';

       return $result;
    }



        public function loadvalue($id){
       $Q = "SELECT * FROM ARTIST WHERE ID = $id";
       $result = null;
       try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID=$row['ID'];
        $this->ARTIST_NAME=$row['ARTIST_NAME'];
        $this->IMAGE_LINK=$row['IMAGE_LINK'];
        $this->BORN_ON=$row['BORN_ON'];
        $this->DESCRIPTION=$row['DESCRIPTION'];
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
        public function getTotal(){
       $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST ";
       $total = 0;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $total = $stmt->fetchColumn();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $total;
}

    
        public function RandomAlbum($start, $limit){
       $Q = "SELECT * FROM ARTIST ORDER BY ID ASC LIMIT ".$start." ," . $limit ." ";
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
private $ARTIST_NAME;
private $IMAGE_LINK;
private $BORN_ON;
private $DESCRIPTION;


function setID($ID){$this->ID = $ID;}
function getID() { return $this->ID; }
function setARTIST_NAME($ARTIST_NAME) { $this->ARTIST_NAME = $ARTIST_NAME; }
function getARTIST_NAME() { return $this->ARTIST_NAME; }
function setIMAGE_LINK($IMAGE_LINK) {$this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() {if(strlen($this->IMAGE_LINK)==0 || $this->IMAGE_LINK==NULL){$this->IMAGE_LINK="../image/geetanjali.jpg";}return $this->IMAGE_LINK;}
function setBORN_ON($BORN_ON) { $this->BORN_ON = $BORN_ON; }
function getBORN_ON() { return $this->BORN_ON; }
function setDESCRIPTION($DESCRIPTION) { $this->DESCRIPTION = $DESCRIPTION; }
function getDESCRIPTION() { return $this->DESCRIPTION; }
public function getBIO(){return $this->BIO;}
public function setBIO($BIO){$this->BIO = $BIO;}
}
