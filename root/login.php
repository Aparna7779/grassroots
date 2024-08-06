<!DOCTYPE html>
<?php

session_start();
if(isset($_SESSION['userid']))
{
header("location:index.php");
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
     <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
     <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    
        
  
  </head>
  
 
  <body>
  
    <div class="page login-page">
      <div class="container ">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
              <div class="logo text-uppercase"><a href="index.html"><span>Grass</span><strong class="text-primary">Roots</strong></a></div>
         
            <form id="login-form" method="post" action="user_login.php">
              <div class="form-group">
                
                <input id="login-username" type="text" name="loginUsername" required="" placeholder="User Name">
              </div>
              <div class="form-group">
              
                <input id="login-password" type="password" name="loginPassword" required="" placeholder="Password">
              </div><button id="login" class="btn btn-primary" name="submit">Login</button>
              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
            </form><a href="#" class="forgot-pass"></a><small id="acc">Do not have an account? </small><a href="register.html" class="signup" >Signup</a>
          </div>
          
        </div>
      </div>
    </div>
  
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>