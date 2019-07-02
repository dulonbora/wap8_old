<?php
require_once '../include/Kanexon.php';
class user {
    private $conn = null;
    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    
private $ID;
private $EMAIL;
private $PASSWORD;
private $USERNAME;
private $PHONE;
private $GENER;
private $ACCESS;
private $ACTIVE;
private $FIRST_NAME;
private $LAST_NAME;
private $PROFILE_PIC;
private $TIMELINE_PIC;
private $IP;
private $TIME;


    public function SingUp(){
    $query = "INSERT INTO USERS (EMAIL, PASSWORD, USERNAME, PHONE,"
            . " ACCESS, ACTIVE, FIRST_NAME, LAST_NAME,"
            . " PROFILE_PIC, TIMELINE_PIC, IP, TIME, GENER)"
            . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $success = 0;
    try{
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->EMAIL);
    $stmt->bindParam(2, $this->PASSWORD);
    $stmt->bindParam(3, $this->USERNAME);
    $stmt->bindParam(4, $this->PHONE);
    $stmt->bindParam(5, $this->ACCESS);
    $stmt->bindParam(6, $this->ACTIVE);
    $stmt->bindParam(7, $this->FIRST_NAME);
    $stmt->bindParam(8, $this->LAST_NAME);
    $stmt->bindParam(9, $this->PROFILE_PIC);
    $stmt->bindParam(10, $this->TIMELINE_PIC);
    $stmt->bindParam(11, $this->IP);
    $stmt->bindParam(12, $this->TIME);
    $stmt->bindParam(12, $this->GENER);
    $stmt->execute();
    $this->ID = $this->conn->lastInsertId();
    $success = 1;
} catch(PDOException $ex){echo $ex->getMessage();}   
return $success;}




/*--------------------------------------------------------------- */
//This javascript function will redirect a another page
//after the execution of a function.
public function pageRedirect($page){
echo "<script type=\"text/javascript\">	";
echo "document.location = '".$page."' ";
echo "</script>";
}
/*--------------------------------------------------------------- */
/*
This function shows the username on the top of the every page.
If the user is not logged in his name will not appear.
*/
public function showLogin(){
ob_start();	

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['USERNAME']))
{
echo "<li><a href='#'>".$_SESSION['USERNAME'] . "</a></li><li><a href=\"../site/Profile.php\"> Profile </a> </li><li><a href=\"../site/Logout.php\">Log Out </a></li>" ;
}

else{
echo " <li><a href=\"../site/login.php\">Log in</a> </li><li><a href=\"../site/Register.php\">Register </a></li>" ;	
}
}

/*--------------------------------------------------------------- */
/*
This function will register a user.
*/
public function Register(){
    $query = "INSERT INTO USERS (USER_ID, EMAIL, PASSWORD, USERNAME , ADDRESS ,  PHONE ,	
	ACCESS)	
	VALUES('0', '$this->EMAIL', '$this->PASSWORD', '$this->USERNAME', 
	'$this->ADDRESS', '$this->PHONE' , 'USER') ";
        try {
            $this->conn->exec($query);
            $ok = 1;
            $this->pageRedirect("../site/login.php");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
}
public function EmailAndPhoneIsUniq($Email, $PhoneNo){
    $ok = 0;
    $query = "SELECT ID FROM USERS WHERE EMAIL = ? ";
    try{
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $ok = 1;
        }
     } catch(PDOException $ex){echo $ex->getMessage();}
    
     
    $query2 = "SELECT ID FROM USERS WHERE PHONE = ? ";
    try{
    $stmt = $this->conn->prepare($query2);
        $stmt->bindParam(1, $PhoneNo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $ok = 1;
        }
     } catch(PDOException $ex){echo $ex->getMessage();}
     
return $ok;
}
public function CheckUser($str, $Param){
    $ok = 1;
        try{
        $Q = "SELECT ID FROM USERS WHERE ".$Param." = ? ";
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $str);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            $ok = 0;
        }
        } catch(PDOException $ex){echo $ex->getMessage();}
        return $ok;
}
public function ChangeAccess($Access, $id){
    $Q = "UPDATE USERS SET ACCESS = ? WHERE ID = ? ";
    try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $Access);
        $stmt->bindParam(2, $id);
        $stmt->execute();   
        $page = "../user/index.php";
        $this->pageRedirect($page);
    }
    catch(PDOException $ex){$ex->getMessage();}
}
/*--------------------------------------------------------------- */
/*
This function will set Session of a user.
*/
public function Login($str, $pass){
if (!isset($_SESSION)) {
  session_start();
}

$query = "SELECT * FROM USERS WHERE EMAIL = ? AND PASSWORD  = ? ";
$ok = 0;
        try{
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $str);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row > 0){
        $_SESSION['USER_ID'] = $row['ID'];
	$_SESSION['EMAIL'] = $row['EMAIL'];
	$_SESSION['USERNAME'] = $row['USERNAME'];
	$_SESSION['ACCESS'] = $row['ACCESS'];	
	$ok = 1;
        }
        
        } catch(PDOException $ex){echo $ex->getMessage();}
return $ok;
}
/*--------------------------------------------------------------- */
/*
This function will unset Session of a user.
*/
public function LogOut(){
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['USER_ID'] = NULL;
$_SESSION['EMAIL'] = NULL;
$_SESSION['USERNAME'] = NULL;
$_SESSION['ACCESS'] = NULL;
$_SESSION['REDIRECT'] = NULL;

unset($_SESSION['USER_ID']);
unset($_SESSION['EMAIL']);
unset($_SESSION['USERNAME']);	
unset($_SESSION['ACCESS']);	
unset($_SESSION['REDIRECT']);

//$this->pageRedirect("../site/index.php");
}
/*--------------------------------------------------------------- */
/*
If the logged user is not admin, 
He will be not able to edit any page content.
This function will prompt the user to relogin as admin.
*/
public function RestrictUser(){
ob_start();
$user_id =0;

if(!isset($_SESSION)){session_start();
//$user_id =$_SESSION['USER_ID'];
}
if($_SESSION['USER_ID']==0){
    $this->pageRedirect("signin.php");
}else{}
}
/*--------------------------------------------------------------- */
/*
If the logged user is not Member, 
He will be not able to edit any page content.
This function will prompt the user to relogin as member.
*/
public function RestrictNonMember(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "MEM") == 0){}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}


/*--------------------------------------------------------------- */
/*
If the logged user is admin, 
He will be redirected to Administrator Home.
*/
public function ProfileRedirect(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){
$this->pageRedirect("../site/Administrator.php");
}
else if(strcmp($_SESSION['ACCESS'], "MEMBER") == 0){
$this->pageRedirect("../site/Member.php");
}
else if(strcmp($_SESSION['ACCESS'], "EMPLOYEE") == 0){
$this->pageRedirect("../site/Employee.php");
}
else{$this->pageRedirect("../site/index.php");}
}
}

/*--------------------------------------------------------------- */
/*
If the logged user is not admin, 
He will be not able to edit any page content.
This function will prompt the user to relogin as admin.
*/
public function RestrictUserIfNotLogin(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['EMAIL'])){
if($_SESSION['EMAIL'] != NULL){}
else{$this->pageRedirect("../site/login.php");}
}
else{$this->pageRedirect("../site/login.php");}
}

/*--------------------------------------------------------------- */
public function loadValue($id){
$Q = "SELECT * FROM USERS WHERE ID = ? "; 
    try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $ok = 0;
        if($row){
            $this->setID($row['ID']);
            $this->setEMAIL($row['EMAIL']);
            $this->setPASSWORD($row['PASSWORD']);
            $this->setUSERNAME($row['USERNAME']);
            $this->setPHONE($row['PHONE']);
            $this->setACCESS($row['ACCESS']);
            $this->setACTIVE($row['ACTIVE']);
            $this->setFIRST_NAME($row['FIRST_NAME']);
            $this->setLAST_NAME($row['LAST_NAME']);
            $this->setPROFILE_PIC($row['PROFILE_PIC']);
            $this->setTIMELINE_PIC($row['TIMELINE_PIC']);
            $this->setIP($row['IP']);
            $this->setTIME($row['TIME']);
            $ok = 1;
        }
    }
    catch(PDOException $ex){$ex->getMessage();}
    return $ok;
}
/*--------------------------------------------------------------- */
public function showAllUsers($start, $limit){
$query = "SELECT * FROM USERS ORDER BY ID DESC LIMIT ".$start." , ".$limit." "; 
    try{
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='table table-responsive table-stripped table bordered'>";
        echo "<tr>";
        echo "<td>User Name</td>";
        echo "<td>Address</td>";
        echo "<td>Phone</td>";
        echo "<td>View</td>";
        echo "</tr>";
        
        foreach($result as $row){
            echo "<tr>";
            echo "<td>"; echo $row['USERNAME'] . "</td><td>" . $row['ADDRESS'] ; echo "</td>";
            echo "<td>"; echo $row['PHONE']; echo "</td>";
            echo "<td><a href='../user/User_Detail.php?i=";
            echo $row['ID'];
            echo "' class='btn btn-default'>View</td>";
            echo "</tr>";
        }
        echo "</table>";
    }catch (PDOException $ex) {echo $ex->getMessage();}
    }
    
    public function totalCount(){
    $query = "SELECT COUNT(*) FROM USERS ";
        $total = 1;
        try{
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        }
        catch (PDOException $ex){echo $ex->getMessage();}
        return $total;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getEMAIL(){
		return $this->EMAIL;
	}

	public function setEMAIL($EMAIL){
		$this->EMAIL = $EMAIL;
	}

	public function getPASSWORD(){
		return $this->PASSWORD;
	}

	public function setPASSWORD($PASSWORD){
		$this->PASSWORD = $PASSWORD;
	}

	public function getUSERNAME(){
		return $this->USERNAME;
	}

	public function setUSERNAME($USERNAME){
		$this->USERNAME = $USERNAME;
	}

	public function getADDRESS(){
		return $this->ADDRESS;
	}

	public function setADDRESS($ADDRESS){
		$this->ADDRESS = $ADDRESS;
	}

	public function getPHONE(){
		return $this->PHONE;
	}

	public function setPHONE($PHONE){
		$this->PHONE = $PHONE;
	}

	public function getACCESS(){
		return $this->ACCESS;
	}

	public function setACCESS($ACCESS){
		$this->ACCESS = $ACCESS;
	}

	public function getACTIVE(){
		return $this->ACTIVE;
	}

	public function setACTIVE($ACTIVE){
		$this->ACTIVE = $ACTIVE;
	}

	public function getFIRST_NAME(){
		return $this->FIRST_NAME;
	}

	public function setFIRST_NAME($FIRST_NAME){
		$this->FIRST_NAME = $FIRST_NAME;
	}

	public function getLAST_NAME(){
		return $this->LAST_NAME;
	}

	public function setLAST_NAME($LAST_NAME){
		$this->LAST_NAME = $LAST_NAME;
	}

	public function getPROFILE_PIC(){
		return $this->PROFILE_PIC;
	}

	public function setPROFILE_PIC($PROFILE_PIC){
		$this->PROFILE_PIC = $PROFILE_PIC;
	}

	public function getTIMELINE_PIC(){
		return $this->TIMELINE_PIC;
	}

	public function setTIMELINE_PIC($TIMELINE_PIC){
		$this->TIMELINE_PIC = $TIMELINE_PIC;
	}
        	public function getIP(){
		return $this->IP;
	}

	public function setIP($IP){
		$this->IP = $IP;
	}

	public function getTIME(){
		return $this->TIME;
	}
	public function getGENER(){
		return $this->GENER;
	}

	public function setTIME($TIME){
		$this->TIME = $TIME;
	}
	public function setGENER($GENER){
		$this->GENER = $GENER;
	}
    
}
