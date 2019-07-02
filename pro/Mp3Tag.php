<?php


class Tag{
private $SONG_NAME;
private $ALBUM_NAME;
private $ARTIST;
private $YEAR;
private $GENERE;
private $COMMENT;
private $PUBLISHER;
private $COMPOSER;
private $BAND;
private $CI;
private $UU;
private $TRACK;
private $ORIGNAL_ARTIST;
private $COPYRIGHT_MASSAGE;
private $ENCRYPETED_BY;

public function LoadTag($file){
    include 'getid3/getid3.php';
    $id3 = new getID3;
    $tag = $id3->analyze($file);
    $this->SONG_NAME= $tag['id3v1']['title'];
    $this->ALBUM_NAME= $tag['id3v1']['album'];
    $this->ARTIST= $tag['id3v1']['artist'];
    $this->YEAR= $tag['id3v1']['year'];
    $this->COMMENT= $tag['id3v1']['comment'];
    
    
}


public function TaggEdit()
        {

$sname = $_POST['FILE_NAME'];
$SongName = $_POST['SONG_NAME'];
$Artist = $_POST['ARTIST'];
$Album = $_POST['ALBUM'];
$G = $_POST['GENRE'];
$Comment = $_POST['COMMENT'];
$url = $_POST[URL];



$size = friendly_size(filesize($sname));        
$mp3_tagformat = 'UTF-8';
require_once('getid3/getid3.php');

$mp3_handler = new getID3;
$mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
require_once('getid3/write.php'); 
$mp3_writter = new getid3_writetags;
$mp3_writter->filename       = $sname;
$mp3_writter->tagformats     = array('id3v1', 'id3v2.3');
$mp3_writter->overwrite_tags = true;
$mp3_writter->tag_encoding   = $mp3_tagformat;
$mp3_writter->remove_other_tags = true;
$mp3_data['title'][]   = $SongName;
$mp3_data['artist'][]  = $Artist;
$mp3_data['album'][]   = $Album;
$mp3_data['year'][]    = 2016;
$mp3_data['genre'][]   = $G;
$mp3_data['comment'][] = $Comment;
$mp3_data['publisher'][] = "Geetanjali";
$mp3_data['composer'][] = "Geetanjali";
$mp3_data['band'][] = "Geetanjali";
$mp3_data['commercial_information'][] = "Geetanjali";
$mp3_data['url_user'][] = "Geetanjali";
$mp3_data['track'][] = 0;
$mp3_data['original_artist'][] = "Geetanjali";
$mp3_data['copyright_message'][] = "Geetanjali";
$mp3_data['encoded_by'][] = "Geetanjali";


$mp3_data['attached_picture'][0]['data'] = "../image/geetanjali.jpg";
$mp3_data['attached_picture'][0]['picturetypeid'] = "image/jpg";
$mp3_data['attached_picture'][0]['description'] =  "../image/geetanjali.jpg";
$mp3_data['attached_picture'][0]['mime'] = "image/jpg";




$mp3_writter->tag_data = $mp3_data;

if($mp3_writter->WriteTags()) {
pageRedirect($url);
}

function friendly_size($size,$round=2)
{
$sizes=array(' Byts',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}

        }


public function getSongName(){return $this->SONG_NAME;}
public function getAlbumName(){return $this->ALBUM_NAME;}
public function getArtist(){return $this->ARTIST;}
public function getYear(){return $this->YEAR;}
public function getGenere(){return $this->GENERE;}



public function setSongName($a){$this->SONG_NAME=$a;}
public function setAlbumName($a){$this->ALBUM_NAME=$a;}
public function setArtist($a){$this->ARTIST=$a;}
public function setYear($a){$this->YEAR=$a;}
public function setGenere($a){$this->GENERE=$a;}

function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";}


}
