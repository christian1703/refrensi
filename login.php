
<?php 
session_start();
include 'config/db.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PintarBersama | Home</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/color-switcher.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/nivo-lightbox.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.css" type="text/css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors/sky.css" media="screen" />
    <link href="pelengkap/sweetalert/sweetalert.css" rel="stylesheet" />

  </head>
  <body>
    <header id="header-wrap">
      <div id="roof" class="hidden-xs">
          <div class="container">
              <div class="pull-left">
                <i class="fa fa-home" aria-hidden="true"></i> 
              </div>
              <div class="quick-contacts pull-right">

                  <span><a href="?pages=login"><i class="fa fa-user"></i> Login</a> / <a href="?pages=registration">Register</a></span>
              </div>
          </div>
      </div>

      <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>
            </div>
            <div class="header-search pull-right">
                <a class="open-search">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-toggle">
                  <a href="index.php"><i class="fa fa-home"></i> Home </a>
                                       
                </li>
      
    
                <li class="dropdown dropdown-toggle">
                  <a href="#" data-toggle="dropdown">Events <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="event-grid.html">Events Grid</a></li>                     
                    <li><a href="event.html">Single Event</a></li>
                  </ul>                        
                </li> 
                         
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>
            <form class="full-search">
              <div class="container">
                <div class="row">
                  <input class="form-control" type="text" placeholder="Search">
                  <a class="close-search">
                  <span class="fa fa-times">
                  </span>
                  </a>
                </div>
              </div>
            </form>
            <ul class="wpb-mobile-menu">
              <li>
                <a href="index.php">Home</a>
                <ul>
                  <li><a href="index.php">Home Page 1</a></li>    
                  <li><a href="index-1.html">Home Page 2</a></li>     
                </ul>                        
              </li>
              
              <li>
                <a href="#">Events</a>
                <ul>
                  <li><a href="event-grid.html">Events Grid</a></li>                     
                  <li><a href="event.html">Single Event</a></li>
                </ul>                        
              </li> 
                           
              <li><a href="contact.html">Contact</a></li>
            </ul>
      </nav>
    </header>
<?php 
$pages = @$_GET['pages'];
if ($pages=='registration') {
$breadcrumb="registration";                       
}elseif ($pages=='login') {
$breadcrumb="Login";                       
}


elseif ($pages=='') {
$breadcrumb="Selamat Datang";   
}
?>
    <div class="page-header" style="background: url(assets/img/banner1.jpg);height: 270px;">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title"><?php echo $breadcrumb; ?></h2>
              <a href="index.php">Home</a>
              <span>/</span>
                <span class="current"><?php echo $breadcrumb; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="content" class="error-bg">
        <?php
        error_reporting();

        $pages= @$_GET['pages'];
        if ($pages=='login') {
          include 'Home/Login.php';
        }elseif ($pages=='registration') {
          include 'Home/Registrasion.php';
        }elseif ($pages=='proses') {
          include 'Home/Proses.php';
        }elseif ($pages==null) {
         include 'Home/Home.php';
        }else{
          echo "<b>404!</b> Tidak ada ..";
        }
        ?>
    </section>
          </div>
        </div>
      </div>

    </footer>
    <a href="#" class="back-to-top">
      <i class="fa fa-arrow-up"></i>
    </a>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
       <script src="pelengkap/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/color-switcher.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="assets/js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.countdown.js"></script>  
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>   
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script> 
    <script type="text/javascript" src="assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="assets/js/contact-form-script.js"></script>  
    
    <script type="text/javascript" src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>