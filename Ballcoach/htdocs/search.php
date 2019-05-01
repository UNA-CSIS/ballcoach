<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballcoach";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>


<!doctype html>
<html class="no-js" lang="">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>BallCoach</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">
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
                  <li class="schedule"><a href="athlete-agenda.html">Schedule</a></li>
                  <li class="coaches current"><a href="athlete-coaches-list.html">Coaches</a></li>
                  <li class="profile"><a href="athlete-edit-profile.html">Profile</a></li>
                  <li class="account"><a href="athlete-account.html">Account</a></li>
                  <li class="log-out"><a href="logout.php">Log Out</a></li>
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

                  <div class="full-width">
                    <ul class="tabs">
                      <li class="current"><a href="#">Coaches</a></li>
                      
                    </ul>
                  </div>

                 

                  <div class="panel-list">

    <?php 
        $zip = $_POST['zip'];
        $name = $_POST['name'];
        $sport = $_POST['sport'];

        if($zip != '' && $name != '' && $sport != ''){
            $sql = "SELECT * FROM coach WHERE zip = '$zip', last_name = '$name', sport = '$sport'";
        }
        else if($name != '' && $sport != ''){
            $sql = "SELECT * FROM coach WHERE last_name = '$name', sport='$sport'";
        }
        else if($sport != ''){
            $sql = "SELECT * FROM coach WHERE sport = '$sport'";
        }
        else if($zip != ''){
            $sql = "SELECT * FROM coach WHERE zip = '$zip'";
        }
        else if($name != ''){
            $sql = "SELECT * FROM coach WHERE last_name = '$name'";
        }
    

$result = $conn->query($sql);

                 
if($result == true){
    while ($row = $result->fetch_assoc()) {
        echo "<div class='panel' id='user'><div class='row'>
                        <div class='col-3'>
                          <a href='athlete-coach-profile.html'><img class='profile-image profile-image-md' src='images/fake/stock-coach-4.jpg' /></a>
                        </div>
                        <div class='col-4 vertical-align'>
                          <h2><a href='athlete-coach-profile.html'>" . $row['first_name'] . " " . $row['last_name'] . "</a></h2>
                        </div>
                        <div class='col-2 vertical-align'>
                          <!--none-->
                        </div>
                        <div class='col-2 vertical-align'>
                          <h6>" . $row['sport'] . "</div>
                        </div>
                      </div><!-- .row -->
                      </div><!-- .panel-list -->";
                                }} 
                                
                     $conn->close();?>
                    </div>


                  <div id="notes-sidebar" class="note-sidebar">
                    <div class="note-editor">
                      <div class="panel panel-with-heading note-panel">
                        <h4 class="panel-heading">Notes</h4>
                        <div class="panel-content-item">
                          <div class="note-thread-wrap">

                            <div class="note-thread" id="user-1">

                              <div class="note">
                                <div class="avatar">JS</div>
                                <div class="note-entry">
                                  <div class="byline">
                                    <span class="name">John Smith</span>
                                    <span class="timestamp">3 days ago</span>
                                  </div>
                                  <div class="note-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</div>
                                </div>
                              </div><!-- .note -->
                              <div class="note">
                                <div class="avatar other">KH</div>
                                <div class="note-entry">
                                  <div class="byline">
                                    <span class="name">Kevin Hall</span>
                                    <span class="timestamp">2 days ago</span>
                                  </div>
                                  <div class="note-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam magna.</div>
                                </div>
                              </div><!-- .note -->
                              <div class="note">
                                <div class="avatar">JS</div>
                                <div class="note-entry">
                                  <div class="byline">
                                    <span class="name">John Smith</span>
                                    <span class="timestamp">1 day ago</span>
                                  </div>
                                  <div class="note-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam magna.</div>
                                </div>
                              </div><!-- .note -->

                            </div><!-- .note-thread -->

                            <div class="new-note">
                              <div class="avatar">JS</div>
                              <input type="text" placeholder="Reply" />
                            </div><!-- .new-note -->

                          </div>
                        </div><!-- .panel-content-item -->
                        <span class="current-panel-marker"></span>
                      </div><!-- .panel -->

                    </div><!-- .note-editor -->
                  </div><!-- .note-sidebar -->

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

  </body>
</html>
