<?php include './classes/Category.php';
$cat = new Category();
?>

<aside class="bg-info lter nav-xs aside hidden-print" id="nav"> 
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
                            <ul class="nav dk text-sm">
                                <?php $cat->MainCategoryIndex(0)?>
                            </ul> </li>
                            
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>