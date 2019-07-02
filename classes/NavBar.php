<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavBar
 *
 * @author Dulon
 */
class NavBar {
   
    public function Worked(){
        include 'classes/categoryview.php';
        $cat = new CategoryView();
        echo '<aside class="bg-info lter nav-xs aside hidden-print" id="nav"> 
    <section class="vbox"> <section class="w-f-md scrollable"> 
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> 
                <nav class="nav-primary hidden-xs"> 
                    <ul class="nav bg clearfix"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover </li> 
                        
                        <li> <a href="/assamese-songs.html"> <i class="icon-music-tone-alt icon "></i> 
                                <span class="font-bold">Songs</span> </a> </li>
                                <li> <a href="/Request.php"> 
                                <i class="icon-drawer icon "></i>
                                <span class="font-bold">Request Songs</span> </a> </li> 
                        <li> <a href="/sms.html"> 
                                <i class="icon-list icon "></i> <span class="font-bold">SMS</span> </a> </li> 
                                <li> <a href="/assamese-videos.html"> 
                                <i class="icon-social-youtube icon "></i> <span class="font-bold">Videos</span> </a> </li> 
                        <li class="m-b hidden-nav-xs"></li> </ul>
                    <ul class="nav" data-ride="collapse"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> With Submenu </li> 
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-music-tone-alt icon "> </i>
                                <span>Songs</span> </a>
                            <ul class="nav dk text-sm">';
                                $cat->MainCategoryIndex(0);
                                echo '</ul> </li>
                            
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>';
        
    }
    
    public function Admin(){
        echo '<aside class="bg-info lter nav-xs aside hidden-print" id="nav"> 
    <section class="vbox"> <section class="w-f-md scrollable"> 
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> 
                <nav class="nav-primary hidden-xs"> 
                    <ul class="nav bg clearfix"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover </li> 
                        <li> <a href="index.php"> <i class="icon-disc icon "></i> 
                                <span class="font-bold">Whats New</span> </a> </li> 
                        
                                <li> <a href="PicStory.php"> <i class="icon-grid icon "></i> 
                                <span class="font-bold">Photos</span> </a> </li>                                
                        <li> <a href="blog.php"> 
                                <i class="icon-drawer icon "></i> <b class="badge bg-primary pull-right">6</b> 
                                <span class="font-bold">Blog</span> </a> </li> 
                                <li> <a href="backend/jokelist.php"> 
                                <i class="icon-list icon "></i> <span class="font-bold">SMS</span> </a> </li> 
                                <li> <a href="videolist.php"> 
                                <i class="icon-social-youtube icon "></i> <span class="font-bold">Videos</span> </a> </li> 
                        <li class="m-b hidden-nav-xs"></li> </ul>
                    <ul class="nav" data-ride="collapse"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> With Submenu </li> 
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-music-tone-alt icon "> </i>
                                <span>Songs</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="songlist.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Songs</span> </a> 
                                <li > <a href="artistlist.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Artist</span> </a> 
                                <li > <a href="albumlist.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Album</span> </a> 
                                <li > <a href="categorys.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Category</span> </a> 
                                <li > <a href="lang.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Langguage</span> </a> 
                                </li>
                            </ul> </li>
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-disc icon "> </i>
                                <span>Videos</span> </a>
                            <ul class="nav dk text-sm">
                                <li> <a href="signin.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Signin</span> </a>
                                </li> 
                            </ul> </li>
                            
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>';
        
    }


    
    
    
    
}
