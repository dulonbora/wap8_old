<?php if (!isset($_SESSION)) {session_start();}
    include '../classes/user.php';
    $user = new user();
    
    
    $u = $_POST['AUTH'];
    $id = $_POST['PASS'];
    
   if($user->Login($u, $id) == 1){
       echo 'Loggin In SuccessFully';
       $user->pageRedirect("songlist.php");
   }
 else {
      echo 'You have Entered Wrong Details'; 
    }     
    
    ?>