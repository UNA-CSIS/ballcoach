<?php session_start(); 
   
if (!isset($_SESSION['username'])) {
   header("location:../index.html");
    // Make sure that code below does not get executed when we redirect.
 exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballcoach";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_SESSION['username'];

$sql = "SELECT * FROM coach WHERE user_id = '$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>
<!doctype html>
<html class="no-js" lang="">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>BallCoach</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
      <link rel="stylesheet" href="css/style.css">
      <!--<script src="js/vendor/modernizr-2.8.3.min.js"></script>-->
      <script src="https://use.typekit.net/ihn4ruw.js"></script>
      <script>try{Typekit.load();}catch(e){}</script>
  </head>
  <body>


    <div id="page" class="site">

      <header id="masthead" class="site-header">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">

              <a href="/" class="logo"><img width="62" height="82" src="images/logo-small.png" alt="BallCoach" /></a>

              <nav id="app-navigation" class="app-navigation">
                <button class="menu-toggle" aria-controls="app-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                <ul class="app-menu menu" aria-expanded="false">
                  <li class="schedule"><a href="dashboardCoach.html">Dashboard</a></li>
                  <li class="user"><a href="coachProfile.php"><span class="user-profile-image"><img class="profile-image profile-image-xsm" src="./images/fake/stock-coach-2.jpg" /></span> kevinhall</a>
                      <ul>
                          <li class="profile"><a href="coachProfile.php">Profile</a></li>
                          <li class="account current"><a href="coach-account.html">Account</a></li>
                          <li class="log-out"><a href="#">Log Out</a></li>
                      </ul>
                  </li>
                </ul>
              </nav>

            </div>
          </div><!-- .row -->
        </div><!-- .container -->
      </header>

      <div id="content" class="site-content">
        <div id="primary" class="content-area">
          <main id="main" class="site-main site-main-narrow">

            <div class="container">
              <div class="row">
                <div class="col-sm-12">


                    <div id="tabs">
                      <ul class="tabs">
                        <li><a href="#account">Account</a></li>
                        <li><a href="#plan">Plan</a></li>
                      </ul>
                        <form method="post" action ="coachAccountUpdate.php">
                      <div class="panel-content">
                          
                        <div id="account">
                          <div id="edit-account">

                          <div class="form-field">
                            <label>Username</label>
                            <input type="text" name="username" v-model="username" value="<?php echo $row['user_id']?>" />
                          </div>

                          <div class="form-field">
                            <label>Email</label>
                            <input type="text" name="email" v-model="email" value="<?php echo $row['email']?>" />
                          </div>

                          <div class="form-field">
                            <label>Password</label>
                            <input type="password" name="password" v-model="password" value="xxxxxxxx" />
                          </div>
                              <input type="submit" class="button" value="Save" />
                          </div><!-- #edit-account -->
                        </div><!-- #account -->
                        </form>
                        <div id="plan">
                          <p>Plan...</p>
                        </div><!-- #plan -->

                    </div>
                  </div><!-- .tabs -->


                  


                </div>
                  
              </div><!-- .row -->
            </div><!-- .container -->

          </main><!-- #main -->
        </div><!-- #primary -->
      </div><!-- #content -->

      <footer id="colophon" class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <a href="/" class="logo"><img width="62" height="82" src="images/logo-small.png" alt="BallCoach" /></a>
            </div>
            <div class="col-sm-6 col-md-3">
              <nav class="footer-navigation">
                <ul class="footer-menu menu">
                  <li class="hide-on-mobile"><a href="#">How it Works</a></li>
                  <li class="hide-on-mobile"><a href="#">Have a Question?</a></li>
                  <li class="hide-on-mobile"><a href="#">Find a Coach</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-sm-6 col-md-3">
              <nav class="footer-navigation">
                <ul class="footer-menu menu">
                  <li><a href="#">Contact Us</a></li>
                  <li class="hide-on-mobile"><a href="#">Log In</a></li>
                  <li class="hide-on-mobile"><a href="#">Sign Up</a></li>
                </ul>
              </nav>
            </div>
            <div class=" col-sm-6 col-md-3">
              <nav class="footer-navigation">
                <ul class="footer-menu menu">
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Blog</a></li>
                </ul>
              </nav>
            </div>

          </div><!-- .row -->

          <ul class="menu social-menu">
             <li><a class="facebook" href="https://www.facebook.com/BallCoachLLC"><i class="fa fa-facebook"></i> <span>Facebook</span></a></li>
             <li><a class="twitter" href="https://twitter.com/ballcoachllc"><i class="fa fa-twitter"></i> <span>Twitter</span></a></li>
             <li><a class="instagram" href="https://www.instagram.com/ballcoachllc/"><i class="fa fa-instagram"></i> <span>Instagram</span></a></li>
             <li><a class="google-plus" href="https://plus.google.com/113025630867394888896"> <i class="fa fa-google-plus"></i> <span>Google+</span></a></li>
             <li><a class="youtube" href="https://www.youtube.com/channel/UCkimU4KkFkeRukWdiM6FPvg"> <i class="fa fa-youtube-play"></i> <span>YouTube</span></a></li>
          </ul>

          <div class="site-info">
              <p class="centered">&copy; 2017 BallCoach, LLC. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
          </div>

        </div><!-- .container -->
      </footer>

    </div><!-- #page -->

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/jquery-ui-1.12.1.min.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/vendor/vue.js"></script>
    <script src="js/app.js"></script>

  </body>
</html>
