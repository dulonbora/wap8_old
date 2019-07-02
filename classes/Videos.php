<?php

if (file_exists("../include/Kanexon.php")) {
    require_once "../include/Kanexon.php";
} else {
    require_once "include/Kanexon.php";
}

class Videos {

    public function __construct() {
        $Database = new Kanexon();
        $this->conn = $Database->getDb();
    }

    private $ID;
    private $NAME;
    private $ALBUM_NAME;
    private $PIC;
    private $LINK;
    private $SIZE;
    private $REG;
    private $CATEGORY;
    private $SINGER;
    private $CAST;
    private $DIRECTOR;
    private $EDITOR;
    private $OTHER;
    private $SONG_ID;

    public function Insert() {
        $query = "INSERT INTO VIDEOS(NAME, ALBUM_NAME, PIC, LINK, SIZE, REG, CATEGORY, SINGER, CAST, DIRECTOR, EDITOR, OTHER, SONG_ID) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->NAME);
            $stmt->bindParam(2, $this->ALBUM_NAME);
            $stmt->bindParam(3, $this->PIC);
            $stmt->bindParam(4, $this->LINK);
            $stmt->bindParam(5, $this->SIZE);
            $stmt->bindParam(6, $this->REG);
            $stmt->bindParam(7, $this->CATEGORY);
            $stmt->bindParam(8, $this->SINGER);
            $stmt->bindParam(9, $this->CAST);
            $stmt->bindParam(10, $this->DIRECTOR);
            $stmt->bindParam(11, $this->EDITOR);
            $stmt->bindParam(12, $this->OTHER);
            $stmt->bindParam(13, $this->SONG_ID);
            $stmt->execute();
            $this->ID = $this->conn->lastInsertId();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function Update($id) {
        $query = "UPDATE VIDEOS SET NAME = ?, ALBUM_NAME = ?, LINK = ?, SIZE = ?, REG = ?, CATEGORY = ?, SINGER = ?, CAST = ?, DIRECTOR = ?, EDITOR = ?, OTHER = ?, SONG_ID = ? WHERE ID = ?";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->NAME);
            $stmt->bindParam(2, $this->ALBUM_NAME);
            $stmt->bindParam(3, $this->LINK);
            $stmt->bindParam(4, $this->SIZE);
            $stmt->bindParam(5, $this->REG);
            $stmt->bindParam(6, $this->CATEGORY);
            $stmt->bindParam(7, $this->SINGER);
            $stmt->bindParam(8, $this->CAST);
            $stmt->bindParam(9, $this->DIRECTOR);
            $stmt->bindParam(10, $this->EDITOR);
            $stmt->bindParam(11, $this->OTHER);
            $stmt->bindParam(12, $this->SONG_ID);
            $stmt->bindParam(13, $id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function UpdateVideosSingle($colm, $id, $getValue) {
        $query = "UPDATE VIDEOS SET $colm = ?  
	WHERE ID = ? ";
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

    public function CheckAlreadyExit($sid) {
        $query = "SELECT * FROM VIDEOS WHERE NAME =?";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $sid);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        $rows = $stmt->fetch();
        if ($rows > 0) {
            $success = 1;
        }
        return $success;
    }

    public function getTotal() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM VIDEOS ";
        $total = 0;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    public function AllFecth($start, $limit) {
        $Q = "SELECT * FROM VIDEOS ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function AllFecthRelated($ID) {
        $Q = "SELECT * FROM VIDEOS WHERE ID <> $ID ORDER BY ID DESC LIMIT 10";
        $result = null;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();


            while ($result = $stmt->fetch()) {
                do {
                   $noimage = "geetanjali.jpg";
                   $image = (strlen($row['PIC']) > 10) ? $row['PIC'] : $noimage;    
                    echo '<article class="media animated fadeInRight"> <a href="#" class="pull-left thumb-lg m-t-xs">';
                    echo "<img src='/image/" . $image . "'>";
                    echo '</a> <div class="media-body">';
                    echo "<a href='viewvideo.php?i=" . $result['ID'] . "' class='font-semibold'>" . $result['NAME'] . "</a>";
                    echo "<div class='text-xs block m-t-xs'><a href='#'></a>" . $result['CATEGORY'] . "</div> </div> </article>";
                } while ($v1 = mysqli_fetch_assoc($v));
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function loadvalue($id) {
        $Q = "SELECT * FROM VIDEOS WHERE ID = $id";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->ID = $row['ID'];
            $this->NAME = $row['NAME'];
            $this->ALBUM_NAME = $row['ALBUM_NAME'];
            $this->PIC = $row['PIC'];
            $this->LINK = $row['LINK'];
            $this->SIZE = $row['SIZE'];
            $this->REG = $row['REG'];
            $this->CATEGORY = $row['CATEGORY'];
            $this->SINGER = $row['SINGER'];
            $this->CAST = $row['CAST'];
            $this->DIRECTOR = $row['DIRECTOR'];
            $this->EDITOR = $row['EDITOR'];
            $this->OTHER = $row['OTHER'];
            $this->SONG_ID = $row['OTHER'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function UpdateSingle($colm, $id, $getValue) {
        $query = "UPDATE VIDEOS SET $colm = ?  
	WHERE ID = ? ";
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

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getNAME() {
        return $this->NAME;
    }

    public function setNAME($NAME) {
        $this->NAME = $NAME;
    }

    public function getALBUM_NAME() {
        return $this->ALBUM_NAME;
    }

    public function setALBUM_NAME($ALBUM_NAME) {
        $this->ALBUM_NAME = $ALBUM_NAME;
    }

    public function getPIC() {
        return $this->PIC;
    }

    public function setPIC($PIC) {
        $this->PIC = $PIC;
    }

    public function getLINK() {
        return $this->LINK;
    }

    public function setLINK($LINK) {
        $this->LINK = $LINK;
    }

    public function getSIZE() {
        return $this->SIZE;
    }

    public function setSIZE($SIZE) {
        $this->SIZE = $SIZE;
    }

    public function getREG() {
        return $this->REG;
    }

    public function setREG($REG) {
        $this->REG = $REG;
    }

    public function getCATEGORY() {
        return $this->CATEGORY;
    }

    public function setCATEGORY($CATEGORY) {
        $this->CATEGORY = $CATEGORY;
    }

    public function getSINGER() {
        return $this->SINGER;
    }

    public function setSINGER($SINGER) {
        $this->SINGER = $SINGER;
    }

    public function getCAST() {
        return $this->CAST;
    }

    public function setCAST($CAST) {
        $this->CAST = $CAST;
    }

    public function getDIRECTOR() {
        return $this->DIRECTOR;
    }

    public function setDIRECTOR($DIRECTOR) {
        $this->DIRECTOR = $DIRECTOR;
    }

    public function getEDITOR() {
        return $this->EDITOR;
    }

    public function setEDITOR($EDITOR) {
        $this->EDITOR = $EDITOR;
    }

    public function getOTHER() {
        return $this->OTHER;
    }

    public function setOTHER($OTHER) {
        $this->OTHER = $OTHER;
    }

    public function getSONG_ID() {
        return $this->SONG_ID;
    }

    public function setSONG_ID($SONG_ID) {
        $this->SONG_ID = $SONG_ID;
    }

}
