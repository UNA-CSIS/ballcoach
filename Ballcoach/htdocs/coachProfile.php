<?php session_start(); 
   
//if (!isset($_SESSION['username'])) {
 //   header("location:index.php");
    // Make sure that code below does not get executed when we redirect.
 //   exit;
//}

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
        <script src="https://use.typekit.net/ihn4ruw.js"></script>
        <script>try {
                Typekit.load();
            } catch (e) {
            }</script>
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
                                  
                                            <li class="profile current"><a href="coach-edit-profile.html">Profile</a></li>
                                            <li class="account"><a href="coach-account.php">Account</a></li>
                                            <li class="log-out"><a href="#">Log Out</a></li>
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

                                    <div class="change-profile-image">
                                        <img class="profile-image profile-image-md" src="./images/fake/stock-coach-2.jpg" />
                                        <div class="change-profile-image-form">
                                            <a class="button" href="#">Change image</a>
                                        </div>
                                    </div>


                                    <div id="tabs">
                                        <ul class="tabs">
                                            <li><a href="#profile">Profile</a></li>
                                            <li><a href="#experience">Experience</a></li>
                                            <li><a href="#training">Sports/Training Types</a></li>
                                            <li><a href="#sites">Training Sites</a></li>
                                            <li><a href="#pricing">Pricing</a></li>
                                        </ul>
                                        
                                            <div class="panel-content">
<form action="coachUpdateProfile.php" method="post">
                                                <div id="profile">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            
                                                            <div class="form-field">
                                                                <label>First Name</label>
                                                                <input type="text" name="first-name" value="<?php echo $row['first_name']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-field">
                                                                <label>Last Name</label>
                                                                <input type="text" name="last-name" value="<?php echo $row['last_name']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Email</label>
                                                        <input type="text" name="email" value="<?php echo $row['email']; ?> ">
                                                    </div>
                                                    
                                                    <div class="form-field">
                                                        <label>Zip Code</label>
                                                        <input type="text" name="zip" value="<?php echo $row['zip']; ?> ">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Facebook</label>
                                                        <input type="text" name="facebook" value="<?php echo $row['fb']; ?> ">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Instagram</label>
                                                        <input type="text" name="instagram" value="<?php echo $row['insta']; ?> ">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Twitter</label>
                                                        <input type="text" name="twitter" value="<?php echo $row['twit']; ?> ">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>LinkedIn</label>
                                                        <input type="text" name="linkedin" value="<?php echo $row['linked']; ?> ">
                                                    </div>

                                                    <!--REMOVE FOR NOW
                                                    <div class="form-field">
                                                        <label>Video</label>
                                                        <input type="file" name="video">
                                                    </div>-->
                                                    <input type="submit" class="button" value="Save">

                                                </div><!-- #profile -->
                                                
</form>
<!-- End of first form section----------------------------------------------------------------------------------------->

<form action ="coachUpdateExp.php" method ="post">
                                                <div id="experience">

                                                    <div class="form-field">
                                                        <label>Education</label>
                                                        <input type="text" name="education" value="<?php echo $row['education']; ?>">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Athletic Experience</label>
                                                        <input type="text" name="athExp" value="<?php echo $row['ath_exp']; ?>">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Coaching Experience</label>
                                                        <input type="text" name="cExp" value="<?php echo $row['coach_exp']; ?>">
                                                    </div>

                                                    <div class="form-field">
                                                        <label>Coaching Philosophy</label>
                                                        <input type="text" name="cPhil" value="<?php echo $row['coach_phil']; ?>">
                                                    </div>

                                                </div><!-- #experience -->
</form>

                                                <div id="training">
                                                    <div id="app-training">

                                                        <div class="form-field form-field-border">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label>Sports</label>
                                                                </div>
                                                                <!--<div class="col-6">
                                                                    <label>Training Types</label>
                                                                </div>
                                                            </div>-->


                                                            <hr>



                                                            <!--  <div class="row">
                                                                <div class="col-6">
                                                                    <span class="label">Baseball</span>
                                                                </div>
                                                                <div class="col-6">
                                                                  <select name="sport">
                                                                    <option value="">Add a type...</option>
                                                                    <option value="Pitching">Pitching</option>
                                                                    <option value="Hitting">Hitting</option>
                                                                    <option value="Infield">Infield</option>
                                                                    <option value="Outfield">Outfield</option>
                                                                    <option value="Catching">Catching</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                  
                                                              <hr>-->


                                                            <!--<div class="row">
                                                                <div class="col-6">
                                                                    <span class="label">Baseball</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="label">Pitching</span>
                                                                    <span class="label">Hitting</span>

                                                                    <select name="sport">
                                                                        <option value="">Add a type...</option>
                                                                        <option value="Infield">Infield</option>
                                                                        <option value="Outfield">Outfield</option>
                                                                        <option value="Catching">Catching</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <hr>


                                                            <!--<div class="row">
                                                              <div class="col-6">
                                                                <select name="sport">
                                                                  <option value="">Add a sport...</option>
                                                                  <option value="Football">Softball</option>
                                                                  <option value="Basketball">Basketball</option>
                                                                  <option value="Football">Football</option>
                                                                  <option value="Soccer">Soccer</option>
                                                                  <option value="Golf">Golf</option>
                                                                  <option value="Tennis">Tennis</option>
                                                                  <option value="Volleyball">Volleyball</option>
                                                                  <option value="Speed, Strength, and Agility">Speed, Strength, and Agility</option>
                                                                  <option value="Hockey">Hockey</option>
                                                                  <option value="Lacrosse">Lacrosse</option>
                                                                  <option value="Track and Field">Track and Field</option>
                                                                  <option value="Running">Running</option>
                                                                  <option value="Cycling">Cycling</option>
                                                                  <option value="Swimming">Swimming</option>
                                                                  <option value="Crossfit">Crossfit</option>
                                                                  <option value="Wrestling">Wrestling</option>
                                                                  <option value="Bowling">Bowling</option>
                                                                  <option value="Billiards">Billiards</option>
                                                                  <option value="Triathlon">Triathlon</option>
                                                                  <option value="Rugby">Rugby</option>
                                                                  <option value="Boxing">Boxing</option>
                                                                  <option value="Weightlifting">Weightlifting</option>
                                                                  <option value="Equestrian">Equestrian</option>
                                                                  <option value="Martial Arts">Martial Arts</option>
                                                                  <option value="Winter Sports">Winter Sports</option>
                                                                  <option value="Water Sports">Water Sports</option>
                                                                </select>
                                                              </div>
                                                              <div class="col-6">
                                                              </div>
                                                            </div>
                                
                                                            <hr>-->


                                                            <!--  <div class="row">
                                                                <div class="col-6">
                                                                    <span class="label">Equestrian</span>
                                                                </div>
                                                                <div class="col-6">
                                                                  <div class="input-w-button">
                                                                    <input type="text" name="new-label" placeholder="Add a type..." />
                                                                    <input type="submit" class="button" value="Add" />
                                                                  </div>
                                                                  <p class="how-to">Example: Fielding, Quarterback, Beginner, etc.<br />To add multiple types, separate with commas.</p>
                                                                </div>
                                                              </div>
                                  
                                                              <hr>-->


                                                          <!--  <div class="row">
                                                                <div class="col-6">
                                                                    <span class="label">Equestrian</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="label">Beginner</span> <span class="label">Intermediate</span>
                                                                    <div class="input-w-button">
                                                                        <input type="text" name="new-label" placeholder="Add a type..." />
                                                                        <input type="submit" class="button" value="Add" />
                                                                    </div>
                                                                    <p class="how-to">Example: Fielding, Quarterback, Beginner, etc.<br />To add multiple types, separate with commas.</p>
                                                                </div>
                                                            </div>

                                                            <hr>-->

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <select name="sport">
                                                                        <option value="">Add a sport...</option>
                                                                        <option value="Baseball">Baseball</option>
                                                                        <option value="Football">Softball</option>
                                                                        <option value="Basketball">Basketball</option>
                                                                        <option value="Football">Football</option>
                                                                        <option value="Soccer">Soccer</option>
                                                                        <option value="Golf">Golf</option>
                                                                        <option value="Tennis">Tennis</option>
                                                                        <option value="Volleyball">Volleyball</option>
                                                                        <option value="Speed, Strength, and Agility">Speed, Strength, and Agility</option>
                                                                        <option value="Hockey">Hockey</option>
                                                                        <option value="Lacrosse">Lacrosse</option>
                                                                        <option value="Track and Field">Track and Field</option>
                                                                        <option value="Running">Running</option>
                                                                        <option value="Cycling">Cycling</option>
                                                                        <option value="Swimming">Swimming</option>
                                                                        <option value="Crossfit">Crossfit</option>
                                                                        <option value="Wrestling">Wrestling</option>
                                                                        <option value="Bowling">Bowling</option>
                                                                        <option value="Billiards">Billiards</option>
                                                                        <option value="Triathlon">Triathlon</option>
                                                                        <option value="Rugby">Rugby</option>
                                                                        <option value="Boxing">Boxing</option>
                                                                        <option value="Weightlifting">Weightlifting</option>
                                                                        <option value="Equestrian">Equestrian</option>
                                                                        <option value="Martial Arts">Martial Arts</option>
                                                                        <option value="Winter Sports">Winter Sports</option>
                                                                        <option value="Water Sports">Water Sports</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                </div>
                                                            </div>

                                                        </div><!-- .form-field -->

                                                    </div><!-- #app -->
                                                </div><!-- #training -->

                                                <div id="sites">

                                                    <div class="form-field form-field-border">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label>Location Name</label>
                                                                <input type="text" name="location-name" value="Florence Sportsplex" />
                                                            </div>
                                                            <div class="col-6">
                                                                <label>Address</label>
                                                                <input type="text" name="location-address" value="1 Sportsplex Dr" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label>City</label>
                                                                <input type="text" name="location-city" value="Florence" />
                                                            </div>
                                                            <div class="col-4">
                                                                <label>State</label>
                                                                <input type="text" name="location-state" value="Alabama" />
                                                            </div>
                                                            <div class="col-4">
                                                                <label>ZIP</label>
                                                                <input type="text" name="location-zip" value="35633" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <p><input type="submit" class="button" value="Add Location" /></p>

                                                </div><!-- #sites -->

                                                <div id="pricing">

                                                    <div class="form-field form-field-border">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="training-type-listing">
                                                                    <h5>One-On-One</h5>
                                                                    <span>1 athlete</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="large-price-listing clearfix">
                                                                    <div class="large-price">
                                                                        <input type="text" name="pricing-one" value="75.00" />
                                                                    </div>
                                                                    <div class="large-price-perameters vertical-align">
                                                                        per hour <br>
                                                                        per athlete
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-field form-field-border">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="training-type-listing">
                                                                    <h5>Small Group</h5>
                                                                    <span>2-5 athletes</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="large-price-listing clearfix">
                                                                    <div class="large-price">
                                                                        <input type="text" name="pricing-one" value="65.00" />
                                                                    </div>
                                                                    <div class="large-price-perameters vertical-align">
                                                                        per hour <br>
                                                                        per athlete
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-field form-field-border">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="training-type-listing">
                                                                    <h5>Large Group</h5>
                                                                    <span>5+ athletes</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="large-price-listing clearfix">
                                                                    <div class="large-price">
                                                                        <input type="text" name="pricing-one" value="50.00" />
                                                                    </div>
                                                                    <div class="large-price-perameters vertical-align">
                                                                        per hour <br>
                                                                        per athlete
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><!-- #pricing -->



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
