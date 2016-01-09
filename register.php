<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Login with Facebook</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="./css/navbar2.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <link rel="stylesheet" href="./css/auth-buttons.css">
 <link rel="stylesheet" href="./css/registerstyle.css">

<script type="text/javascript">
    $(function() {
      var pull    = $('#pull');
        menu    = $('nav ul');
        menuHeight  = menu.height();

      $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
      });
    });

  </script>
 </head>
  <body>
  <nav class="clearfix two">
    <ul class="clearfix">
        <li id="large"><a href="./index.html">Home</a></li>
        <li id="large"><a href="./events/events.html">Events</a></li>
        <li id="large"><a href="./contact.html">Contact Us</a></li>
        <li id="large"><a href="#">Sponsers</a></li>
        <li id="large"><a href="./register.php">Registration</a></li>
        
    </ul>
    <a href="#" id="pull">Menu</a>
</nav>
<div class="container">
  <div class="row larger">
    <div class="col-md-10 col-sm-10">
          <?php if (isset($_SESSION['FBID'])): ?>      <!--  After user login  -->
        <div class="container">
            <div class="row info">
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                  <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-8 col-xs-8">
                    <h1>Hello <?php echo $_SESSION['FULLNAME']; ?></h1>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div style="margin-top:20px;"><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"  ></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-6 col-sm-8 col-xs-9">
                      <p>YOUR JUETID is:<?php echo $_SESSION['JCODE']; ?></p>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-3">
                        <div><a href="logout.php">Logout</a></div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        </div>
            <?php else: ?>     <!-- Before login --> 
        <div class="container">
          <div class="row info">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
              <h2>REGISTER TO GET YOUR JUETID number </h2>
              <p>Login with your facebook to proceed with your registration</p>
              <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                  <p><a class="btn-auth btn-facebook large" href="fbconfig.php">Login with Facebook</a></p>
                </div>
              </div>
              <p>Facebook login is required to verify that you are a legitimate user and a college student.<br> No data will be misused and there will be no post from Mood Indgo on your facebook page.</p>
            </div>
          </div>
        </div>
          <?php endif ?>
    </div>
  </div>
  </div>
  </body>
</html>
