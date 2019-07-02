<?php
include '../classes/user.php';
$user = new user();
$user->LogOut();
?><!DOCTYPE html><html lang="en" class="bg-info">
<head> <meta charset="utf-8" />
<title>Sing In | Asomi.Mobi</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


<link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" />
<link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
 <script src="../js/jquery-3.1.1.min.js"></script>

<![endif]--></head>


<body class="bg-info"> 
    
    
     
     
    
    
    
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
<div class="container aside-xl"> 
    <a class="navbar-brand block" href="">
        <span class="h1 font-bold">Sign In</span></a>
    <section class="m-b-lg">
        <header id="statusText" class="wrapper text-center">
<strong>Sign in to get in touch</strong> </header>
        <form action="#">
							<fieldset class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Enter email">
							</fieldset>
							<fieldset class="form-group">
								<input type="password" class="form-control" id="password" placeholder="Enter a password">
							</fieldset>
						</form>
            <button id="Signin" class="btn btn-default btn-block">Sign In</button>
 </section> </div> </section>
    
    
    <!-- footer --> <footer id="footer"> <div class="text-center padder">
 <p> <small>Asomi.Mobi &copy; 2016</small> </p> </div> </footer> 
 <!-- / footer -->
 
 <!-- Bootstrap -->
 <script type="text/javascript">
    $(document).ready(function(){
    
    
    $(document).on("click", "#Signin", function(){
        var id = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
            type: "POST",
            url : "signin_ajax_post.php",
            data : {AUTH : id, PASS : pass},
            error: function (html) {
                    $("#statusText").html(html);
                    },
            success: function (html) {
                    $("#statusText").html(html);

    }
    });
    });

    
    });
</script>
 <!-- App --> <script src="js/app.v1.js"></script> 
 <script src="js/app.plugin.js"></script>
</body>
</html>
