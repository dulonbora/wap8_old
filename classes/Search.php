<?php
require_once '../../include/Kanexon.php'; 
class Search {
    
    public function __construct() {
    $Database = new Kanexon();
    $this->conn = $Database->getDb();}
    
    
    public function searchSongs($str){
       $Q = "SELECT * FROM SONGS WHERE SONG_NAME LIKE '%$str%' ORDER BY SONG_NAME ASC LIMIT 20";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function searchArtist($str){
       $Q = "SELECT * FROM ARTIST WHERE ARTIST_NAME LIKE '%$str%' ORDER BY ARTIST_NAME ASC LIMIT 20";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function searchVideo($str){
       $Q = "SELECT * FROM VIDEOS WHERE NAME LIKE '%$str%' ORDER BY NAME ASC LIMIT 20";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    public function searchBlog($str){
       $Q = "SELECT * FROM JOKES WHERE HEADLINE LIKE '%$str%' ORDER BY HEADLINE ASC LIMIT 20";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       return $result;
    }
    
    
    public function searchAlbum($str){
       $Q = "SELECT * FROM ALBUM WHERE ALBUM_NAME LIKE '%$str%' ORDER BY ALBUM_NAME ASC LIMIT 20";
       $result = null;
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       catch (PDOException $ex){echo $ex->getMessage();}
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
              echo "<tr><td>".$rows["ARTIST_NAME"]." <b id='".$rows["ARTIST_ID"]."' class='btn btn-xs btn-success btn-rounded pull-right delbtn'>x<b></tr></td>";
        }
        while($rows = $stmt->fetch());   
       }
       return $result;
    }
    
    public function ArtistByFakeSongsList($id){
       $Q = "SELECT ID, SONG_NAME FROM ALBUM_VIEW WHERE ALBUM_ID = $id ORDER BY SONG_NAME DESC";
       $result = "Uknown";
       try{
        $stmt = $this->conn->query($Q);
        $stmt->execute();
       }
       catch (PDOException $ex){echo $ex->getMessage();}
       $rows = $stmt->fetch();
       if($rows > 0){
          do{
              echo "<tr><td>".$rows["SONG_NAME"]." <b id='".$rows["ID"]."' class='btn btn-xs btn-success btn-rounded pull-right delbtn'>x<b></tr></td>";
        }
        while($rows = $stmt->fetch());   
       }
       return $result;
    }


}
