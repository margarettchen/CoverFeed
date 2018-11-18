<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!--<link rel="icon" 
        target="" ype="image/png" 
        href="#">-->

    <title>Sign In</title>

    <!-- styling -->
    <link rel="stylesheet" href="forms-style.css" type='text/css'> 
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    


  </head>
  <body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $conn_string = "postgres://yryyyapkjdicty:be9383448f64e566523a74c14a25000423a9ba44818f55f4d81951a87be4d1d7@ec2-107-20-211-10.compute-1.amazonaws.com:5432/db6pl92dm9m24v";
      $connection = pg_connect($conn_string);
      $usernameQuery = "SELECT * FROM \"Customer Information\" WHERE username = '" . $username . "'";
      $usernameQueryResult = pg_query($connection, $usernameQuery);
      if(pg_fetch_row($usernameQueryResult)) {
        $passwordQuery = "SELECT password FROM \"Customer Information\" WHERE username = '" . $username . "'";
        $passwordQueryResult = pg_query($connection, $passwordQuery);
        $row = pg_fetch_row($passwordQueryResult);
        $hash = $row[0];
        if(password_verify($password, $hash)) {
          // Continue to login the user
          $_SESSION['login'] = true; //set Session when login is successful
          ob_start();
          header('Location: member.php');
          ob_end_flush();
          die();
      
        } else {
          // Error that password is bad.
          echo "<script>alert(\"The password entered does not match our records. Please re-enter your information.\");</script>";
        }
        
      } else {
        // Error that username is wrong
        echo "<script>alert(\"The username entered does not match our records. Please re-enter your information.\");</script>";
      }
    }
      
    ?>

    <div class = "nav-bar">
    <li class="logo">
      <h1>CoverFeed</h1>
    </li>
    <li>
      <a href="index.php">Home</a>
    </li>
    <li>
      <a href="events.php">Events</a>
    </li>
    <li>
      <a href="about.php">About</a>
    </li>
    <li>
      <a href="contactus.php">Contact</a>
    </li>
    <li>
      <a href="signin.php">Sign In</a>
    </li>
  </div>
    <div class="page">
      <div class="form-title">
        <p>Sign in to discover exciting events near you.</p>
      </div>
      <div class="form-over">
        <form method="POST" class="signup-form" action="signin.php">
          <p>Username:</p>
          <input type="text" name="username" value="" required="required">
          <p> Password:</p>
          <input type="password" name="password" value="" required="required">
          <br>
          <input type="submit" value="Sign In">
        </form>
        <p class="new-account">Don't have an account? <a href="signup.php">Sign up!</a></p>
      </div>
    </div>
  

    <div class="footer"> 
    <div class="column column1">
      <h5>Use CoverFeed</h5>
      <li>
        <a href="">How It Works</a>
      </li>
      <li>
        <a href="">FAQs</a>
      </li>
      <li>
        <a href="">Site Map</a>
      </li>
    </div>
    <div class="column column2">
      <h5>Host Events</h5>
      <li>
        <a href="">Nonprofits & Fundraisers</a>
      </li>
      <li>
        <a href="">Sell Tickets</a>
      </li>
      <li>
        <a href="">Online Event Registration</a>
      </li>
    </div>
    <div class="column column3">
      <h5>Find Events</h5>
      <li>
        <a href="">New York Events</a>
      </li>
      <li>
        <a href="">Chicago Events</a>
      </li>
      <li>
        <a href="">All Cities</a>
      </li>
    </div>
    <div class="column column4">
      <div class="socialMediaRow">
        <a href=""><img src="images/facebook.png"></a>
        <a href=""><img src="images/twitter.png"></a>
        <a href=""><img src="images/instagram.png"></a>
      </div>
      <li id = "terms">
        <a href="">Terms</a>
      </li>
      <li>
        <a href="">Privacy</a>
      </li>
      <li>
        <a href="">Contact Support</a>
      </li>
    </div>
  </div> <!-- end of footer -->



  </body>
</html>