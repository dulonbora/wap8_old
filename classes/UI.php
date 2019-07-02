<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UI
 *
 * @author Dulon
 */
class UI {

public function Work($tittle){
    
    
    
    echo '<header class="bg-danger lter header header-md navbar navbar-fixed-top-xs"> 
    <div class="navbar-header aside bg-info dk nav-xs"> 
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> 
            <i class="icon-list"></i> </a> 
        <a href="/" class="navbar-brand text-lt"> 
            <i class="icon-earphones"></i>
            <img src="/images/logo.png" alt="." class="hide"> 
            <span class="hidden-nav-xs m-l-sm">'.$tittle.'</span> </a> 
        <button id="SearchBtn" class="btn btn-link visible-xs"> 
            <i class="icon-magnifier text-muted"></i> </button> </div>
    <ul class="nav navbar-nav hidden-xs"> 
        <li> <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted"> 
                <i class="fa fa-indent text"></i>
                <i class="fa fa-dedent text-active"></i> </a> </li> </ul> 
    <form action="/s.php" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search"> 
        <div class="form-group"> <div class="input-group"> <span class="input-group-btn"> 
                    <button type="submit" class="btn btn-sm bg-white btn-icon rounded">
                        <i class="fa fa-search"></i></button> </span>
                <input type="text" name="q" class="form-control input-sm no-border rounded" placeholder="Search songs, albums...">
            </div> </div> </form> 
        <div class="navbar-right "> 

<ul class="nav navbar-nav m-n hidden-xs nav-user user"> 

            <li class="hidden-xs">
                <div class="fb-like" data-href="https://www.facebook.com/asomiofficial" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                </li>
    </ul> 
        </div>
</header>';
}

public function Workl($tittle){
    
    
    
    echo '<header class="bg-dark header header-md navbar navbar-fixed-top-xs"> 
    <div class="navbar-header aside bg-info dk nav-xs"> 
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> 
            <i class="icon-list"></i> </a> 
        <a href="/" class="navbar-brand text-lt"> 
            <i class="icon-earphones"></i>
            <img src="images/logo.png" alt="." class="hide"> 
            <span class="hidden-nav-xs m-l-sm">'.$tittle.'</span> </a> 
        
<a href="request_list.php" class="btn btn-link visible-xs"> 
                    <i class="icon-bell"></i>
                    <span id="CountUnSeen" class="badge badge-sm up bg-danger count">-1</span> 
                </a>            
</div>
    <ul class="nav navbar-nav hidden-xs"> 
        <li> <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted"> 
                <i class="fa fa-indent text"></i>
                <i class="fa fa-dedent text-active"></i> </a> </li> </ul> 
    <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search"> 
        <div class="form-group"> <div class="input-group"> <span class="input-group-btn"> 
                    <button type="submit" class="btn btn-sm bg-white btn-icon rounded">
                        <i class="fa fa-search"></i></button> </span>
                <input type="text" class="form-control input-sm no-border rounded" placeholder="Search songs, albums...">
            </div> </div> </form> 

    <div class="navbar-right "> 

        <ul class="nav navbar-nav m-n hidden-xs nav-user user"> 

            <li class="hidden-xs">
                <a href="request_list.php" class="dropdown-toggle lt"> 
                    <i class="icon-bell"></i>
                    <span id="CountUnSeen" class="badge badge-sm up bg-danger count">-1</span> 
                </a> 
            </li> 

            <li class="dropdown">
                <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown"> 

                    <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> 
                        <img src="../image/geetanjali.jpg" alt="..."> </span>Admin<b class="caret"></b> 
                </a> 
                <ul class="dropdown-menu animated fadeInRight">
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li> 
                </ul> 

            </li> 
        </ul> 
    </div> 
</header>
';
}



}
