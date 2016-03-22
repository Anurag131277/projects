<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Login with Facebook</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Signika" />

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <!-- jQuery Plugin -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/nav.css">
 <link rel="stylesheet" href="./css/registerstyle.css">
  <style type="text/css">
  h1,h2{
    font-family: Signika;
  font-size: 4.5em;
  }
p{
  font-family: Signika;
  font-size: 1.7em;
}
.cap{
  text-transform: uppercase;
}

  </style>
 </head>
  <body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>
  <nav class="clearfix two">
      <div class='fontawesome-cog' id='icon'></div>
    <ul class="clearfix">
        <li id="large"><a href="./index.html">Home</a></li>
        <li id="large"><a href="./events/events.html">Events</a></li>
        <li id="large"><a href="./sponsor.html">Gallery</a></li>
        <li id="large"><a href="./team.html">Our Team</a></li>
        <li id="large"><a href="./sponsor.html">Sponsors</a></li>
        <li id="large"><a href="./register.php">Registration</a></li>
        
    </ul>
    <a href="#" id="pull">Menu</a>
</nav>
<div class="container">
  <div class="row larger">
    <div class="col-md-10 col-sm-10">
          
        <div class="container">
        <h1>Step 1</h1>
        <?php if (isset($_SESSION['FBID'])): ?>      <!--  After user login  -->
            <div class="row info">
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                  <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-8 col-xs-8">
                    <h1>You have registered Successfully!!</h1>
                    </div>
                  </div>
                    <div class="row" class="cap">
                      <div class="col-lg-8 col-md-6 col-sm-8 col-xs-9">
                      <p><?php echo $_SESSION['FULLNAME']; ?></p>
                      <p>YOUR JUETID is:<?php echo $_SESSION['JCODE']; ?><br>Use This unique ID to contact us in the future.</p>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-3">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <div style="margin-top:20px;"><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"  ></div>
                              <div><a href="logout.php">Logout</a></div>
                        </div>
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
              <p>Facebook login is required to verify that you are a legitimate user and a college student.<br> No data will be misused and there will be no post from Sangharsh on your facebook page.</p>
            </div>
          </div>
        </div>
          <?php endif ?>
        <div class="container">
        <h1>Step 2</h1>
          <div class="row info">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
              
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
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
  </body>
</html>
