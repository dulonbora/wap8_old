<?php

require_once 'include/Kanexon.php';

class Songs {

    public function __construct() {
        $Database = new Kanexon();
        $this->conn = $Database->getDb();
    }

    public function Insert() {
        $query = "INSERT INTO CATEGORY(LANGUAGE_ID, ALBUM_ID, CATEGORY_ID,"
                . " LYRIC_BY, MUSIC_BY, SONG_NAME,"
                . " SONG_LINK, GENRE, IMAGE_LINK,"
                . " SITE_LINK, VIDEO_ID, LYRIC_ID,"
                . " TOTAL_PLAY, CREATE_ON, CREATE_BY,"
                . " SEARCH_TAG, DESCRIPTION) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->LANGUAGE_ID);
            $stmt->bindParam(2, $this->ALBUM_ID);
            $stmt->bindParam(3, $this->CATEGORY_ID);
            $stmt->bindParam(4, $this->LYRIC_BY);
            $stmt->bindParam(5, $this->MUSIC_BY);
            $stmt->bindParam(6, $this->SONG_NAME);
            $stmt->bindParam(7, $this->SONG_LINK);
            $stmt->bindParam(8, $this->GENRE);
            $stmt->bindParam(9, $this->IMAGE_LINK);
            $stmt->bindParam(10, $this->SITE_LINK);
            $stmt->bindParam(11, $this->VIDEO_ID);
            $stmt->bindParam(12, $this->LYRIC_ID);
            $stmt->bindParam(13, $this->TOTAL_PLAY);
            $stmt->bindParam(14, $this->CREATE_ON);
            $stmt->bindParam(15, $this->CREATE_BY);
            $stmt->bindParam(16, $this->SEARCH_TAG);
            $stmt->bindParam(17, $this->DESCRIPTION);
            $stmt->execute();
            $this->ID = $this->conn->lastInsertId();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function UpdateTotalPlay($tp, $id) {
        include('include/database.php');
        mysqli_select_db($conn, $data);
        $query = "UPDATE SONGS SET TOTAL_PLAY = $tp WHERE ID = $id";
        $success = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

    public function Update($id) {
        include('../include/database.php');
        $Lid = mysqli_real_escape_string($conn, $this->LANGUAGE_ID);
        $albm = mysqli_real_escape_string($conn, $this->ALBUM_ID);
        $cid = mysqli_real_escape_string($conn, $this->CATEGORY_ID);
        $lby = mysqli_real_escape_string($conn, $this->LYRIC_BY);
        $mby = mysqli_real_escape_string($conn, $this->MUSIC_BY);
        $songname = mysqli_real_escape_string($conn, $this->SONG_NAME);
        $slnk = mysqli_real_escape_string($conn, $this->SONG_LINK);
        $g = mysqli_real_escape_string($conn, $this->GENRE);
        $imglink = mysqli_real_escape_string($conn, $this->IMAGE_LINK);
        $sitel = mysqli_real_escape_string($conn, $this->SITE_LINK);
        $vid = mysqli_real_escape_string($conn, $this->VIDEO_ID);
        $lyid = mysqli_real_escape_string($conn, $this->LYRIC_ID);
        $tp = mysqli_real_escape_string($conn, $this->TOTAL_PLAY);
        $co = mysqli_real_escape_string($conn, $this->CREATE_ON);
        $cb = mysqli_real_escape_string($conn, $this->CREATE_BY);
        $st = mysqli_real_escape_string($conn, $this->SEARCH_TAG);
        $d = mysqli_real_escape_string($conn, $this->DESCRIPTION);
        mysqli_select_db($conn, $data);
        $query = "UPDATE SONGS SET LANGUAGE_ID='.$Lid.', ALBUM_ID='.$.', CATEGORY_ID='.$cid.',"
                . "LYRIC_BY='.$lby.',MUSIC_BY='.$mby.',SONG_NAME='.$songname.',"
                . "SONG_LINK='.$slnk.',GENRE='.$g.',IMAGE_LINK='.$imglink.',"
                . "SITE_LINK='.$sitel.',VIDEO_ID='.$vid.',LYRIC_ID='.$lyid.',"
                . "TOTAL_PLAY='.$tp.', SEARCH_TAG='.$st.',DESCRIPTION='.$d.' WHERE ID = $id";
        $success = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

    public function AllSongs($start, $limit) {
        $Q = "SELECT * FROM SONGS ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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

    public function getTotal() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM SONGS ";
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

    public function getTotalByAlbum($id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM SONGS WHERE ALBUM_ID = $id";
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

    public function getTotalByartist() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ARTIST_VIEW";
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

    public function SongListByArtist($id, $start, $limit) {
        $Q = "SELECT * FROM ARTIST_VIEW WHERE ARTIST_ID = $id ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        $count = 0;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        while ($row = $stmt->fetch()) {
            $noimage = "geetanjali.jpg";
            $image = (strlen($row['IMAGE_LINK']) == 14) ? $row['IMAGE_LINK'] : $noimage;
            //   if($count%2==0){
            $sname = strtolower(str_replace(' ', '-', $row['SONG_NAME']));
            $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($row['ALBUM_ID'])));
            echo "<li class='list-group-item clearfix'>
<a href='/file/" . $row['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
<a class='clear' href='/file/" . $row['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $row['SONG_NAME'] . "</span>
<small class='text-muted'>" . $row['ALBUM_NAME'] . "</small> </a>
</li>";
            //    }
            //   else {
            //    echo "<li class='list-group-item clearfix'>
//<a href='file.php?i=".$row['ID']."' class='pull-right thumb-sm m-r'> <img src='image/$image' alt='...'> </a>
//<a class='clear' href='file.php?i=".$row['ID']."'> <span class='block text-ellipsis'>".$row['SONG_NAME']."</span>
//<small class='text-muted'>".$row['ALBUM_NAME']."</small> </a>
//</li>"; 
            //   }
            //  $cat = $this->ReturnCategoryi($row['CATEGORY_ID']);
            //  $art = $this->ArtistByAlbumList($row['ID']);
            //   $count++;
        }
        return $result;
    }

    public function LoadSongsInAdmin() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SONGS ORDER BY ID DESC LIMIT 30";
        $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($rs);
        if ($rows > 0) {
            do {
                $albm = $this->ReturnAlbum($rows['ALBUM_ID']);
                $cat = $this->ReturnCategory($rows['CATEGORY_ID']);


                echo "<tr id='tr" . $rows["ID"] . "'> <td>" . $rows['SONG_NAME'] . "</td>
                        <td class=''>$cat</td>
                        <td class=''>$albm</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" . $rows["ID"] . "'></buttom></td>";
            } while ($rows = mysqli_fetch_assoc($rs));
        }
    }

    public function ReturnAlbum($id) {
        $Q = "SELECT ALBUM_NAME FROM ALBUM WHERE ID = ? ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = $this->ALBUM_NAME = $row['ALBUM_NAME'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function LoadAlbumIndexWol($id, $limit, $cat, $oldnew) {
        $Q = "SELECT * FROM ALBUM WHERE LANGUAGE_ID = ? AND CATEGORY_ID = ? AND NEWOLD = ? ORDER BY ID DESC LIMIT $limit";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $cat);
            $stmt->bindParam(3, $oldnew);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">';
        echo '<table width="100%" cellpadding="1" cellspacing="1">';

        echo "<div id='owl-demo' class='owl-carousel owl-theme wapper' style='opacity: 1; display: block;'>
                <div class='owl-wrapper-outer'>
                    <div class='owl-wrapper' style='width: 7712px; left: 0px; display: block; transform: translate3d(-1446px, 0px, 0px); transition: all 200ms ease;'>
                       ";
        if ($row > 0) {
            do {
                $noimage = "geetanjali.jpg";
                $image = (strlen($row['ART_LINK']) == 14) ? $row['ART_LINK'] : $noimage;
                //    $tracks = ($row['TOTAL'] > 1) ? $track = "Songs" : $track = "Song"; 
                $albumname = str_replace(' ', '_', $row['ALBUM_NAME']);

                echo " 
                        <div class='owl-item' style='width: 241px;'>
                            <div class='item'>
<div class='pos-rlt style='display: block;'>
<div class='item-overlay opacity r r-2x bg-black'> 
<div class='text-info padder m-t-sm text-sm'> 
</div>
<div class='center text-center m-t-n'>
<a href='album.php?i=$albumname'>
<i class='icon-control-play i-2x'></i></a>
</div> </div>
<a href='album.php?i=$albumname'>
    <img class='r r-2x img-full lazyOwl' data-src='image/$image'></a> </div>
<div class='padder-v'>
<div class='text-ellipsis text-xs text-muted'>5</div>
<a href='album.php?i=$albumname' class='text-ellipsis'>" . $row['ALBUM_NAME'] . "</a></div>                            
                                </div></div>
                        
                    ";
            } while ($stmt->fetch(PDO::FETCH_ASSOC));
            echo "</div>
                </div>
                
              </div>";
            //  echo '</div>';
            echo '</table>';
        }
    }

    public function ArtistByAlbum($id) {
        $Q = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ALBUM_ID = $id ORDER BY ARTIST_ID DESC";
        $result = "Uknown";
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        $rows = $stmt->fetch();
        if ($rows > 0) {
            do {
                $name = strtolower(str_replace(' ', '-', $rows['ARTIST_NAME']));
                $art[] = "<a href='/singer/" . $rows["ARTIST_ID"] . "/$name.html'>" . $rows['ARTIST_NAME'] . "</a>";
            } while ($rows = $stmt->fetch());
            $result = implode(" , ", $art);
        }
        return $result;
    }

    public function LoadAlbumIndex($lid, $cat, $oldnew, $limit) {
        $Q = "SELECT * FROM ALBUM WHERE LANGUAGE_ID = $lid AND CATEGORY_ID = $cat AND NEWOLD = $oldnew ORDER BY ID DESC LIMIT $limit";
        $result = null;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        echo '<table width="100%" cellpadding="1" cellspacing="1">';
        while ($row = $stmt->fetch()) {
            $noimage = "geetanjali.jpg";
            $image = (strlen($row['ART_LINK']) == 14) ? $row['ART_LINK'] : $noimage;
            //    $tracks = ($row['TOTAL'] > 1) ? $track = "Songs" : $track = "Song"; 
            $albumname = strtolower(str_replace(' ', '-', $row['ALBUM_NAME']));
            $art = $this->ArtistByAlbum($row['ID']);
            echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2"> <div class="item"> 
            <div class="pos-rlt">
            <div class="item-overlay opacity r r-2x bg-black"> 
            <div class="text-info padder m-t-sm text-sm"> 
             </div>
            <div class="center text-center m-t-n">';
            echo "<a href='/files/" . $row['ID'] . "/$albumname.html'>";
            echo '<i class="icon-control-play i-2x"></i></a>
            </div> </div>';
            echo "<a href='/files/" . $row['ID'] . "/$albumname.html'>";
            echo "<img src='image/$image' alt='" . $row['ALBUM_NAME'] . "' class='r r-2x img-full'></a> </div>"
            . "<div class='padder-v'> ";

            echo " <a href='/files/" . $row['ID'] . "/$albumname.html' class='text-ellipsis'>" . $row['ALBUM_NAME'] . "</a>";
            echo "<div class='text-ellipsis text-xs text-muted'>" . $art . "</div></div>";
            echo "</div></div>";
        }
        echo '</table>';

        return $result;
    }

    public function UpcomminAlbum($limit) {
        $Q = "SELECT * FROM ALBUM WHERE LANGUAGE_ID = 1 AND NEWOLD = 2 ORDER BY ID DESC LIMIT $limit";
        $result = null;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        echo '<table width="100%" cellpadding="1" cellspacing="1">';
        while ($row = $stmt->fetch()) {
            $noimage = "geetanjali.jpg";
            $image = (strlen($row['ART_LINK']) == 14) ? $row['ART_LINK'] : $noimage;
            //    $tracks = ($row['TOTAL'] > 1) ? $track = "Songs" : $track = "Song"; 
            $albumname = strtolower(str_replace(' ', '-', $row['ALBUM_NAME']));
            echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2"> <div class="item"> 
            <div class="pos-rlt">
            <div class="item-overlay opacity r r-2x bg-black"> 
            <div class="text-info padder m-t-sm text-sm"> 
             </div>
            <div class="center text-center m-t-n">';
            echo "<a href='/files/" . $row['ID'] . "/$albumname.html'>";
            echo '<i class="icon-control-play i-2x"></i></a>
            </div> </div>';
            echo "<a href='/files/" . $row['ID'] . "/$albumname.html'>";
            echo "<img src='image/$image' alt='" . $row['ALBUM_NAME'] . "' class='r r-2x img-full'></a> </div><div class='padder-v'> ";
            //    echo "<div class='text-ellipsis text-xs text-muted'>".$row['TOTAL']." ".$track."</div>";
            echo " <a href='/files/" . $row['ID'] . "/$albumname.html' class='text-ellipsis'>" . $row['ALBUM_NAME'] . "</a></div>";
            echo "</div></div>";
        }
        echo '</table>';

        return $result;
    }

    public function ReturnCategory($id) {
        $Q = "SELECT CATEGORY_NAME FROM CATEGORY WHERE ID = ? ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = $this->CATEGORY_NAME = $row['CATEGORY_NAME'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function date($dt) {
        $date = "";
        $category = "";
        $ddt = explode('-', $dt);
        switch ($ddt[1]) {
            case 1: $category = "Jan";
                break;
            case 2: $category = "Feb";
                break;
            case 3: $category = "Mar";
                break;
            case 4: $category = "Apr";
                break;
            case 5: $category = "May";
                break;
            case 6: $category = "Jun";
                break;
            case 7: $category = "Jul";
                break;
            case 8: $category = "Aug";
                break;
            case 9: $category = "Sep";
                break;
            case 10: $category = "Oct";
                break;
            case 11: $category = "Nov";
                break;
            default : $category = "Dec";
        }
        $date = $category . " " . $ddt[1] . " " . $ddt[2];
        return $date;
    }

    public function AlbumSongs($id) {
        include('include/database.php');
        include('classes/mp3.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SONGS WHERE ALBUM_ID = $id";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $v1 = mysqli_fetch_assoc($v);
        $counter = 1;
        echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
        if ($v1 > 0) {
            do {
                $noimage = "geetanjali.jpg";
                $image = (strlen($v1['IMAGE_LINK']) == 14) ? $v1['IMAGE_LINK'] : $noimage;
                $lnk = str_replace(' ', '_', $v1['SONG_LINK']);
                $lnk1 = str_replace('../', '', $lnk);
                $m = new mp3($lnk1);
                if (file_exists($lnk1)) {
                    $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
                } else {
                    $duration = "";
                }

                $art = "" . $this->ArtistBySong($v1['ID']) . "";
                $sname = strtolower(str_replace(' ', '-', $v1['SONG_NAME']));
                $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($v1['ALBUM_ID'])));
                if ($counter % 2 == 0) {
                    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                } else {
                    echo "<li class='list-group-item clearfix'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                }

                $counter++;
            } while ($v1 = mysqli_fetch_assoc($v));
        }
        echo "</ul>
</section>";
    }

    public function AlbumSongsFake($id) {
        include('include/database.php');
        include('classes/mp3.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM ALBUM_VIEW WHERE ALBUM_ID = $id";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $v1 = mysqli_fetch_assoc($v);
        $counter = 1;
        echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
        if ($v1 > 0) {
            do {
                $noimage = "geetanjali.jpg";
                $image = (strlen($v1['IMAGE_LINK']) == 14) ? $v1['IMAGE_LINK'] : $noimage;
                $lnk = str_replace(' ', '_', $v1['SONG_LINK']);
                $lnk1 = str_replace('../', '', $lnk);
                $m = new mp3($lnk1);
                if (file_exists($lnk1)) {
                    $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
                } else {
                    $duration = "";
                }

                $art = "" . $this->ArtistBySong($v1['ID']) . "";
                $sname = strtolower(str_replace(' ', '-', $v1['SONG_NAME']));
                $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($v1['ALBUM_ID'])));
                if ($counter % 2 == 0) {
                    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                } else {
                    echo "<li class='list-group-item clearfix'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='jp-play-me pull-right m-t-sm m-l text-md'> <i class='icon-control-play text'></i> <i class='icon-control-pause text-active'></i> </a>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                }

                $counter++;
            } while ($v1 = mysqli_fetch_assoc($v));
        }
        echo "</ul>
</section>";
    }

    public function AlbumRelatedSongs($id, $aid) {
        include('include/database.php');
        include('classes/mp3.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SONGS WHERE ALBUM_ID = $aid AND ID != $id";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $v1 = mysqli_fetch_assoc($v);
        $counter = 1;
        echo "<section class='scrollable hover'>
    <ul class='list-group list-group-lg auto m-b-none m-t-n-xxs'>";
        if ($v1 > 0) {
            do {
                $noimage = "geetanjali.jpg";
                $image = (strlen($v1['IMAGE_LINK']) == 14) ? $v1['IMAGE_LINK'] : $noimage;
                $lnk = str_replace(' ', '_', $v1['SONG_LINK']);
                $lnk1 = str_replace('../', '', $lnk);
                $m = new mp3($lnk1);
                if (file_exists($lnk1)) {
                    $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
                } else {
                    $duration = "";
                }

                $art = "" . $this->ArtistBySong($v1['ID']) . "";
                $sname = strtolower(str_replace(' ', '-', $v1['SONG_NAME']));
                $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($v1['ALBUM_ID'])));
                if ($counter % 2 == 0) {
                    echo "<li class='list-group-item clearfix bg bg-succss'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                } else {
                    echo "<li class='list-group-item clearfix'>
    <a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' class='pull-left thumb-sm m-r'> <img src='/image/$image' alt='...'> </a>
    <a class='clear' href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'> <span class='block text-ellipsis'>" . $v1['SONG_NAME'] . " $duration</span> <small class='text-muted'>by $art</small> </a>
        </li>";
                }

                $counter++;
            } while ($v1 = mysqli_fetch_assoc($v));
        }
        echo "</ul>
</section>";
    }

    public function TopSongs() {
        include('classes/mp3.php');

        $Q = "SELECT * FROM SONGS ORDER BY TOTAL_PLAY DESC LIMIT 10";
        $result = null;
        $count = 0;
        try {
            $stmt = $this->conn->query($Q);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        while ($row = $stmt->fetch()) {
            $lnk = str_replace(' ', '_', $row['SONG_LINK']);
            $lnk1 = str_replace('../', '', $lnk);
            $m = new mp3($lnk1);
            if (file_exists($lnk1)) {
                $duration = str_replace('00:', '', $m->formatTime($m->getDuration()));
            } else {
                $duration = "";
            }
            $noimage = "geetanjali.jpg";
            $image = (strlen($row['IMAGE_LINK']) == 14) ? $row['IMAGE_LINK'] : $noimage;
            $art = "" . $this->ArtistBySong($row['ID']) . "";
            $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($row['ALBUM_ID'])));
            $sname = strtolower(str_replace(' ', '-', $row['SONG_NAME']));
            echo "<a href='/file/" . $row['ID'] . "/" . $albumname . "/" . $sname . ".html' class='list-group-item clearfix'>";
            echo "<span class='pull-right thumb-sm avatar m-r'>$duration</span>";
            echo '<span class="pull-left thumb-sm avatar m-r hidden-xs">';
            echo "<img src='/image/$image' alt='...'></span>";
            echo " <span class='clear'> <span>" . $row['SONG_NAME'] . "</span>";
            echo "<small class='text-muted clear text-ellipsis'>by $art</small> </span> </a>";
        }
        return $result;
    }

    public function Search($a) {
        include('include/database.php');
        mysqli_select_db($conn, $data);
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SONGS WHERE SONG_NAME LIKE '%" . $a . "%'";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $v1 = mysqli_fetch_assoc($v);
        $counter = 1;

        if ($v1 > 0) {
            echo '<table width="100%" cellpadding="1" cellspacing="1">';
            do {
                $noimage = "geetanjali.jpg";
                $image = (strlen($v1['IMAGE_LINK']) == 14) ? $v1['IMAGE_LINK'] : $noimage;
                $art = "" . $this->ArtistBySong($v1['ID']) . "";
                $albumname = strtolower(str_replace(' ', '-', $this->ReturnAlbum($v1['ALBUM_ID'])));
                $sname = strtolower(str_replace(' ', '-', $v1['SONG_NAME']));

                echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2"> <div class="item">
            <div class="pos-rlt"> <div class="item-overlay opacity r r-2x bg-black">
            <div class="center text-center m-t-n">';
                echo "<a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'>";
                echo '<i class="fa fa-play-circle i-2x"></i></a> </div> </div>';

                echo"<a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html'>";
                echo"<img src='/image/$image' alt='' class='r r-2x img-full'></a> </div> 
            <div class='padder-v'>";
                echo"<a href='/file/" . $v1['ID'] . "/" . $albumname . "/" . $sname . ".html' data-bjax='' data-target='#bjax-target' data-el='#bjax-el' data-replace='true' class='text-ellipsis'>" . $v1['SONG_NAME'] . "</a>";
                echo "</div> </div> </div>";
            } while ($v1 = mysqli_fetch_assoc($v));
            echo '</table>';
        } else {
            echo 'Not Found';
        }
    }

    public function ArtistBySong($id) {
        $Artist = "Unknown";
        include('include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT DISTINCT ARTIST_ID, ARTIST_NAME FROM ARTIST_VIEW WHERE ID = $id";
        $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($rs);
        $count = 1;
        if ($rows > 0) {
            do {
                $art[] = $rows['ARTIST_NAME'];
            } while ($rows = mysqli_fetch_assoc($rs));
            $Artist = implode(", ", $art);
        }
        return $Artist;
    }

    public function loadvalue($id) {
        include('include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SONGS WHERE ID = $id";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($v);

        if ($row > 0) {
            $this->ID = $row['ID'];
            $this->LANGUAGE_ID = $row['LANGUAGE_ID'];
            $this->ALBUM_ID = $row['ALBUM_ID'];
            $this->CATEGORY_ID = $row['CATEGORY_ID'];
            $this->LYRIC_BY = $row['LYRIC_BY'];
            $this->MUSIC_BY = $row['MUSIC_BY'];
            $this->SONG_NAME = $row['SONG_NAME'];
            $this->SONG_LINK = $row['SONG_LINK'];
            $this->GENRE = $row['GENRE'];
            $this->IMAGE_LINK = $row['IMAGE_LINK'];
            $this->SITE_LINK = $row['SITE_LINK'];
            $this->VIDEO_ID = $row['VIDEO_ID'];
            $this->LYRIC_ID = $row['LYRIC_ID'];
            $this->TOTAL_PLAY = $row['TOTAL_PLAY'];
            $this->CREATE_ON = $row['CREATE_ON'];
            $this->CREATE_BY = $row['CREATE_BY'];
            $this->SEARCH_TAG = $row['SEARCH_TAG'];
            $this->DESCRIPTION = $row['DESCRIPTION'];
        }
    }
    
    function bitrate_c($filename){
    $input = SABB_ROOT.$filename;
    $info = pathinfo($input);
    $output = "{$info['dirname']}/128kb-{$info['filename']}.{$info['extension']}";
    $output2 = "{$info['dirname']}/64kb-{$info['filename']}.{$info['extension']}";
    exec("ffmpeg -i '".$input."' -ab 128k '".$output."'");
    exec("ffmpeg -i '".$input."' -ab 64k '".$output2."'");
    autotag($output);
    autotag($output2);
    return 'bit rate done';
    }

    private $ID;
    private $LANGUAGE_ID;
    private $ALBUM_ID;
    private $CATEGORY_ID;
    private $LYRIC_BY;
    private $MUSIC_BY;
    private $SONG_NAME;
    private $SONG_LINK;
    private $GENRE;
    private $IMAGE_LINK;
    private $SITE_LINK;
    private $VIDEO_ID;
    private $LYRIC_ID;
    private $TOTAL_PLAY;
    private $CREATE_ON;
    private $CREATE_BY;
    private $SEARCH_TAG;
    private $DESCRIPTION;

    function setID($ID) {
        $this->ID = $ID;
    }

    function getID() {
        return $this->ID;
    }

    function setLANGUAGE_ID($LANGUAGE_ID) {
        $this->LANGUAGE_ID = $LANGUAGE_ID;
    }

    function getLANGUAGE_ID() {
        return $this->LANGUAGE_ID;
    }

    function setALBUM_ID($ALBUM_ID) {
        $this->ALBUM_ID = $ALBUM_ID;
    }

    function getALBUM_ID() {
        return $this->ALBUM_ID;
    }

    function setCATEGORY_ID($CATEGORY_ID) {
        $this->CATEGORY_ID = $CATEGORY_ID;
    }

    function getCATEGORY_ID() {
        return $this->CATEGORY_ID;
    }

    function setLYRIC_BY($LYRIC_BY) {
        $this->LYRIC_BY = $LYRIC_BY;
    }

    function getLYRIC_BY() {
        return $this->LYRIC_BY;
    }

    function setMUSIC_BY($MUSIC_BY) {
        $this->MUSIC_BY = $MUSIC_BY;
    }

    function getMUSIC_BY() {
        return $this->MUSIC_BY;
    }

    function setSONG_NAME($SONG_NAME) {
        $this->SONG_NAME = $SONG_NAME;
    }

    function getSONG_NAME() {
        return $this->SONG_NAME;
    }

    function setSONG_LINK($SONG_LINK) {
        $this->SONG_LINK = $SONG_LINK;
    }

    function getSONG_LINK() {
        return $this->SONG_LINK;
    }

    function setGENRE($GENRE) {
        $this->GENRE = $GENRE;
    }

    function getGENRE() {
        return $this->GENRE;
    }

    function setIMAGE_LINK($IMAGE_LINK) {
        $this->IMAGE_LINK = $IMAGE_LINK;
    }

    function getIMAGE_LINK() {
        return $this->IMAGE_LINK;
    }

    function setSITE_LINK($SITE_LINK) {
        $this->SITE_LINK = $SITE_LINK;
    }

    function getSITE_LINK() {
        return $this->SITE_LINK;
    }

    function setVIDEO_ID($VIDEO_ID) {
        $this->VIDEO_ID = $VIDEO_ID;
    }

    function getVIDEO_ID() {
        return $this->VIDEO_ID;
    }

    function setLYRIC_ID($LYRIC_ID) {
        $this->LYRIC_ID = $LYRIC_ID;
    }

    function getLYRIC_ID() {
        return $this->LYRIC_ID;
    }

    function setTOTAL_PLAY($TOTAL_PLAY) {
        $this->TOTAL_PLAY = $TOTAL_PLAY;
    }

    function getTOTAL_PLAY() {
        return $this->TOTAL_PLAY;
    }

    function setCREATE_ON($CREATE_ON) {
        $this->CREATE_ON = $CREATE_ON;
    }

    function getCREATE_ON() {
        return $this->CREATE_ON;
    }

    function setCREATE_BY($CREATE_BY) {
        $this->CREATE_BY = $CREATE_BY;
    }

    function getCREATE_BY() {
        return $this->CREATE_BY;
    }

    function setSEARCH_TAG($SEARCH_TAG) {
        $this->SEARCH_TAG = $SEARCH_TAG;
    }

    function getSEARCH_TAG() {
        return $this->SEARCH_TAG;
    }

    function setDESCRIPTION($DESCRIPTION) {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    function getDESCRIPTION() {
        return $this->DESCRIPTION;
    }

}
