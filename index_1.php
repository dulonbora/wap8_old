<?php
   ob_start();
   //if(session_status()!=PHP_SESSION_ACTIVE)
   // {session_start();}
   
   include 'classes/Songs.php';
   $songs = new Songs();
   //include './classes/video.php';
   //$v = new video;
   include 'classes/Jokes.php';
   $Jokes = new Jokes();
   include 'classes/NavBar.php';
   $N = new NavBar();
   include 'classes/UI.php';
   $UI = new UI;
   include 'classes/Artist.php';
   $artist = new Artist();
   //  include './classes/PhotoStory.php';
   //  $phto = new PhotoStory;
   $name = "Asomi";
   $tittle = "Assamese Entertainment | Jokes , Songs, Video Etc"
   ?>
<!DOCTYPE html>
<html lang="en" class="app">
   <head>
      <meta name="title" content="Asomi.Mobi <?php echo $tittle; ?> Assam Full Entertaning , Joke, Assamese picture, Songs" />
      <meta charset="utf-8" />
      <title><?php echo $tittle; ?> | Asomi.Mobi</title>
      <meta name="language" content="en" />
      <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />
      <meta name="description" content="asomi.mobi <?php echo $tittle; ?> offers large collection of mp3, jokes, photos" />
      <meta name="keywords" content="<?php echo $tittle; ?>, asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
      <meta name="author" content="Asomi.Mobi">
      <meta name="revisit-after" content="5 days" />
      <meta name="copyright" content="asomi.mobi">
      <meta name="generator" content="wap8.in">
      <meta name="creationdate" content="2015">
      <meta name="distribution" content="global">
      <meta name="rating" content="general">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
      <link rel="stylesheet" href="css/fixed-footer.css" type="text/css" />
      <script src="js/jquery-3.1.1.min.js"></script>
         <script type="text/JavaScript">
var sc;
jQuery(document).ready(function(){
    //constantly update the scroll position:
    sc=setInterval(scrollDown,200);

    //optional:stop the updating if it gets a click
    jQuery('.mydiv').mousedown(function(e){
        clearInterval(sc);            
    });
});
function scrollDown(){
    //find every div with class "mydiv" and apply the fix
    for(i=0;i<=jQuery('.mydiv').length;i++){
        try{
            var g=jQuery('.mydiv')[i];
            g.scrollTop+=1;
            g.scrollTop-=1;
        } catch(e){
            //eliminates errors when no scroll is needed
        }
    }
}
</script>
   </head>
   <body class="">
      <div id="fb-root"></div>
      <script>(function (d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id))
             return;
         js = d.createElement(s);
         js.id = id;
         js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
      <section class="vbox">
         <?php
            $UI->Work($name);
            ?> 
         <section>
            <section class="hbox stretch">
               <!-- .aside --> 
               <?php
                  $N->Worked();
                  ?>  
               <!-- /.aside -->
               <section id="content">
                  <section class="vbox animated fadeInUp">
                     <section class="hbox stretch">
                        <section>
                           <section class="vbox">
                              <section class=" wrapper-lg">
                                 <!--- Upcomming Songs ---->     
                                 <div class="row">
                                    <div class="col-sm-12 col-sm-12 col-md-8 col-lg-9">
                                       <div class="pull-right text-muted m-t-lg">
                                          <div class='fb-messengermessageus' id='fb-messengermessageus' messenger_app_id='1678638095724206' page_id='488952891127388' color='blue' size='standard'></div>
                                          <script> window.fbAsyncInit = function () {
                                             FB.init({appId: '1678638095724206', xfbml: true, version: 'v2.6'});
                                             };
                                             (function (d, s, id) {
                                             var js, fjs = d.getElementsByTagName(s)[0];
                                             if (d.getElementById(id)) {
                                                 return;
                                             }
                                             js = d.createElement(s);
                                             js.id = id;
                                             js.src = '//connect.facebook.net/en_US/sdk.js';
                                             fjs.parentNode.insertBefore(js, fjs);
                                             }(document, 'script', 'facebook-jssdk'));
                                          </script><a href="/assamese-upcomming.html" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Upcoming Albums 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs hidden-sm">
                                          <?php $songs->UpcomminAlbum(6); ?>
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php $songs->UpcomminAlbum(4); ?>
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="/assamese-upcomming.html" class="btn btn-rounded btn-success btn-sm center-block">See All Upcoming Album Songs</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!--- Album songs ---->     
                                       <div class="pull-right text-muted m-t-lg">
                                          <a href="/assamese-songs-category/2/Album-Songs.html" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Latest Albums 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs hidden-sm">
                                          <?php $songs->LoadAlbumIndex(1, 2, 0, 6); ?>
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php $songs->LoadAlbumIndex(1, 2, 0, 4); ?>
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="/assamese-songs-category/2/Album-Songs.html" class="btn btn-rounded btn-success btn-sm center-block">See All Album Songs</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!--- Bihu songs ---->     
                                       <div class="pull-right text-muted m-t-lg">
                                          <a href="/assamese-songs-category/1/Bihu-Songs.html" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Bihu Albums 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs hidden-sm">
                                          <?php $songs->LoadAlbumIndex(1, 1, 0, 6); ?>
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php $songs->LoadAlbumIndex(1, 1, 0, 4); ?>
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="/assamese-songs-category/1/Bihu-Songs.html" class="btn btn-rounded btn-success btn-sm center-block">See All Bihu Songs</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!--- Movies songs ---->     
                                       <div class="pull-right text-muted m-t-lg">
                                          <a href="/assamese-songs-category/4/Movie-Songs.html" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Movies 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs hidden-sm">
                                          <?php $songs->LoadAlbumIndex(1, 4, 0, 6); ?>
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php $songs->LoadAlbumIndex(1, 4, 0, 4); ?>
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="/assamese-songs-category/4/Movie-Songs.html" class="btn btn-rounded btn-success btn-sm center-block">See All New Movies Songs</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!--- Artist Songs ---->     
                                       <div class="pull-right text-muted m-t-lg">
                                          <a href="artist.php" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Artist Songs 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs  hidden-sm"> 
                                          <?php $artist->ArtistIndex(6); ?> 
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php $artist->ArtistIndex(4); ?> 
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="artist.php" class="btn btn-rounded btn-success btn-inverse btn-sm center-block">See All Singers</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!--- Video List ---->     
                                       <div class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" >
                                          <a href="video.php" class="btn btn-rounded btn-success btn-sm hidden-xs hidden-sm">View All</a>
                                       </div>
                                       <h2 class="font-thin m-b">Latest Videos 
                                          <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                          <span class="bar1 a1 bg-primary lter"></span>
                                          <span class="bar2 a2 bg-info lt"></span>
                                          <span class="bar3 a3 bg-success"></span>
                                          <span class="bar4 a4 bg-warning dk"></span> 
                                          <span class="bar5 a5 bg-danger dker"></span>
                                          </span>
                                       </h2>
                                       <div class="row hidden-xs  hidden-sm"> 
                                          <?php
                                             //  $v->VideoListsix(4);
                                             ?> 
                                       </div>
                                       <div class="row hidden-md hidden-lg">
                                          <?php
                                             // $v->VideoListsix(4);
                                             ?> 
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="btn-group btn-group-justified">
                                                <a href="video.php" class="btn btn-rounded btn-success btn-sm center-block">See All New Video Clips</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row row-sm">
                                          <div class="row m-t-lg m-b-lg">
                                             <div class="col-sm-6">
                                                <div class="bg-primary wrapper-md r"> 
                                                   <a href="signin.php"> <span class="h4 m-b-xs block">
                                                   <i class=" icon-user-follow i-lg">
                                                   </i> Login or Create account</span>
                                                   <span class="text-muted">
                                                   Save and share your Content with your friends when you log in or create an account.
                                                   </span> </a> 
                                                </div>
                                             </div>
                                             <div class="col-sm-6">
                                                <div class="bg-black wrapper-md r"> <a href="#">
                                                   <span class="h4 m-b-xs block">
                                                   <i class="icon-cloud-download i-lg">
                                                   </i> Download our app</span> <span class="text-muted">
                                                   Get the apps from Google Store for mobile to start Enjoy at anywhere and anytime.
                                                   </span> </a> 
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-sm-12 col-md-4 col-lg-3">
                                       <div class="">
                                          <h2 class="font-thin m-b">Top Songs
                                             <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                             <span class="bar1 a1 bg-primary lter"></span>
                                             <span class="bar2 a2 bg-info lt"></span>
                                             <span class="bar3 a3 bg-success"></span>
                                             <span class="bar4 a4 bg-warning dk"></span> 
                                             <span class="bar5 a5 bg-danger dker"></span>
                                             </span>
                                          </h2>
                                          <?php
                                             $songs->TopSongs();
                                             ?> 
                                       </div>
                                       <div class="">
                                          <h2 class="font-thin m-b">Latest Blog Posts
                                             <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                             <span class="bar1 a1 bg-primary lter"></span>
                                             <span class="bar2 a2 bg-info lt"></span>
                                             <span class="bar3 a3 bg-success"></span>
                                             <span class="bar4 a4 bg-warning dk"></span> 
                                             <span class="bar5 a5 bg-danger dker"></span>
                                             </span>
                                          </h2>
                                          <?php
                                             $Jokes->TopFiveJoke(0);
                                             ?> 
                                       </div>
                                       <div class="">
                                          <h2 class="font-thin m-b">Photos Albums
                                             <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                             <span class="bar1 a1 bg-primary lter"></span>
                                             <span class="bar2 a2 bg-info lt"></span>
                                             <span class="bar3 a3 bg-success"></span>
                                             <span class="bar4 a4 bg-warning dk"></span> 
                                             <span class="bar5 a5 bg-danger dker"></span>
                                             </span>
                                          </h2>
                                          <?php
                                             $Jokes->TopFiveJoke(0);
                                             ?> 
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </section>
                        </section>
                     </section>
                  </section>
                  <nav class="">
                     <footer class="fixed-footer animated fadeInRight">
                        <div id="SearchBar" class="hidden-md hidden-lg"></div>
                     </footer>
                     </div>
                  </nav>
               </section>
            </section>
         </section>
      </section>
      <!-- Bootstrap --> <!-- App -->
      <script>
         $(document).ready(function () {
             $(document).on("click", "#SearchBtn", function () {
                 $("#SearchBar").load("/searchbar.php");
             });
         });
      </script>
      <script src="js/app.plugin.js"></script> 
      <script src="js/app.v1.js"></script> 
</html>

