<?php

require_once '../include/Kanexon.php';

class Create_Table {

    private $conn = null;

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function User() {
        $Q = "CREATE TABLE IF NOT EXISTS USERS(ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
	EMAIL TEXT, PASSWORD TEXT, 
        FIRST_NAME varchar(120)	, 
        LAST_NAME varchar(120)	, 
        USERNAME TEXT, 
        PROFILE_PIC BIGINT, 
        TIMELINE_PIC BIGINT,
        PHONE TEXT, 
        ACCESS TEXT, 
        IP VARCHAR(20), 
        TIME BIGINT, 
        ACTIVE INTEGER DEFAULT 1
            )";

        try {
            $this->conn->exec($Q);
            echo "UserTable Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function UserInsertAdmin() {
        $Q = "INSERT INTO `USERS`(`EMAIL`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `USERNAME`, `PROFILE_PIC`, `TIMELINE_PIC`, `PHONE`, `ACCESS`, `IP`, `TIME`, `ACTIVE`)"
                . " VALUES ('Admin@site.in','Admin','','','',0,0,0,0,0,0,0)";

        try {
            $this->conn->exec($Q);
            echo "Table Created....Insetre<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function SyncLog() {
        $enq = "CREATE TABLE IF NOT EXISTS SYNC_LOG (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
            GEN_ID BIGINT,  
            OPERATION INTEGER ,  
            TABLE_NAME TEXT ,  
            DONE INTEGER  
            )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Language() {
        $enq = "CREATE TABLE IF NOT EXISTS LANGUAGE (ID INTEGER PRIMARY KEY AUTO_INCREMENT ,
            LANGUAGE_NAME VARCHAR(50), IMAGE_LINK TEXT, DESCRIPTION TEXT
            )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Album() {
        $enq = "CREATE TABLE IF NOT EXISTS ALBUM (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
	   LANGUAGE_ID INTEGER,
           ALBUM_NAME VARCHAR(100),
           PRODUCTION VARCHAR(100),
           YEAR INTEGER,
           ART_LINK TEXT,
           DESCRIPTION TEXT,
           CATEGORY_ID INTEGER,
           MUSIC VARCHAR(100),
           COVER VARCHAR(100),
           NEWOLD INTEGER,
           STATUS INTEGER, 
           BITRATE VARCHAR(100),
           LABEL VARCHAR(200),
           TOTAL_VIEW INTEGER,
           CREATE_ON BIGINT
            )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Artist() {
        $enq = "CREATE TABLE IF NOT EXISTS ARTIST (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           ARTIST_NAME VARCHAR(100),
           IMAGE_LINK TEXT,
           BORN_ON TEXT,
           DESCRIPTION TEXT
            )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Category() {
        $enq = "CREATE TABLE IF NOT EXISTS CATEGORY (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           LANGUAGE_ID INTEGER,
	   CATEGORY_NAME VARCHAR(100),
           IMAGE_LINK TEXT,
           DESCRIPTION TEXT,
           TYPE INTEGER
            )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Songs() {
        $enq = "CREATE TABLE IF NOT EXISTS SONGS (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
        LANGUAGE_ID INTEGER,
	ALBUM_ID BIGINT,
	CATEGORY_ID BIGINT,
	LYRIC_BY VARCHAR(100),
	MUSIC_BY VARCHAR(100),
	SONG_NAME TEXT,
	SONG_LINK TEXT,
	GENRE VARCHAR(100),
	IMAGE_LINK TEXT,
	SITE_LINK TEXT,
        VIDEO_ID INTEGER,
        LYRIC_ID INTEGER,
	TOTAL_PLAY BIGINT,
	CREATE_ON BIGINT,
	CREATE_BY VARCHAR(100),
        SEARCH_TAG TEXT,
        DESCRIPTION TEXT
            )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Lyrics() {
        $enq = "CREATE TABLE IF NOT EXISTS LYRICS (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           LYRICS LONGTEXT,
           WRITTEN_BY TEXT,
           SUBMITTED_BY TEXT
           )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Quotes() {
        $enq = "CREATE TABLE IF NOT EXISTS QUOTES (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           QUOTES LONGTEXT,
           WRITTEN_BY TEXT,
           CATEGORY_ID BIGINT,
           IMAGE_LINK TEXT,
           SUBMITTED_BY TEXT
           )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Story() {
        $enq = "CREATE TABLE IF NOT EXISTS STORIES (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           NAME TEXT,
           DESCRIBTION TEXT,
           CATEGORY_ID BIGINT,
           IMAGE_LINK TEXT,
           SUBMITTED_BY TEXT
           )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function StoryPIC() {
        $enq = "CREATE TABLE IF NOT EXISTS STORIE_PIC (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           STORY_ID BIGINT,
           CAPTION TEXT,
           IMAGE_LINK TEXT,
           SUBMITTED_BY TEXT
           )";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function SongArtit() {
        $enq = "CREATE TABLE IF NOT EXISTS SONG_AND_ARTIST (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           SONG_ID BIGINT,
           ARTIST_ID BIGINT,
           TYPE INTEGER
           )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function SongAlbum() {
        $enq = "CREATE TABLE IF NOT EXISTS SONG_AND_ALBUM (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           SONG_ID BIGINT,
           ALBUM_ID BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function JOKES() {
        $enq = "CREATE TABLE IF NOT EXISTS JOKES (ID BIGINT PRIMARY KEY AUTO_INCREMENT , HEADLINE TEXT,
        CONTENT LONGTEXT, 
        IMG_LINK TEXT, 
        TOTAL_VISIT INTEGER, 
        CATEGORY VARCHAR(50), 
        POST_ON BIGINT, 
        POST_BY INTEGER, 
        COMMENT INTEGER,
        STATUS INTEGER,
        TYPE INTEGER)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function VIDEOS() {
        $enq = "CREATE TABLE IF NOT EXISTS VIDEOS (ID BIGINT PRIMARY KEY AUTO_INCREMENT , HEADLINE TEXT, 
NAME TEXT, 
ALBUM_NAME VARCHAR(20), 
PIC TEXT, 
LINK TEXT, 
SIZE TEXT, 
REG VARCHAR(10), 
CATEGORY VARCHAR(20), 
SINGER VARCHAR(120), 
CAST VARCHAR(120), 
DIRECTOR VARCHAR(120), 
EDITOR VARCHAR(120), 
OTHER VARCHAR(120), 
SONG_ID INTEGER)";

        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function COMMENT() {
        $enq = "CREATE TABLE IF NOT EXISTS COMMENT (ID BIGINT PRIMARY KEY AUTO_INCREMENT , 
EMAIL VARCHAR(120), 
USERNAME VARCHAR(120), 
COMMENT TEXT, 
POST_ON BIGINT, 
TYPE INTEGER, 
APPORVED INTEGER, 
PRENT_ID INTEGER)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function BrokenLink() {
        $enq = "CREATE TABLE IF NOT EXISTS BROKEN_LINKS (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
           SONG_ID BIGINT
           )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function Request() {
        $enq = "CREATE TABLE IF NOT EXISTS REQUEST (ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
        LANGUAGE_ID INTEGER,
	ALBUM_NAME VARCHAR(100),
	EMAIL VARCHAR(100),
	OTHER VARCHAR(100),
        STATUS INTEGER)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function ViewAllSongs() {
        $enq = "CREATE VIEW ALL_SONGS AS 
        SELECT 
		S.ID,
		S.LANGUAGE_ID,
		L.LANGUAGE_NAME,
		
		S.ALBUM_ID, 
	AL.ALBUM_NAME,
	AL.YEAR,
	AL.ART_LINK,
        S.ARTIST_ID,
	AR.ARTIST_NAME,

	S.CATEGORY_ID,
	CAT.CATEGORY_NAME,

		S.SONG_NAME,
		S.SONG_LINK, 
		
		S.OTHER_STAFF,
		S.LYRIC_BY,
		S.MUSIC_BY,
		S.TOTAL_PLAY, 
		S.CREATE_ON,
		S.CREATE_BY,
		S.SEARCH_TAG,
		S.DESCRIPTION
	           
FROM SONGS S
	
	INNER JOIN LANGUAGE L
		ON S.LANGUAGE_ID = L.ID

	INNER JOIN ALBUM AL
		ON S.ALBUM_ID = AL.ID

	INNER JOIN ARTIST AR
		ON S.ARTIST_ID = AR.ID

	INNER JOIN CATEGORY CAT
		ON S.CATEGORY_ID = CAT.ID";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nTable Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>