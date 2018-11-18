<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign Up</title>

  	<!-- styling -->
    <link rel="stylesheet" href="forms-style.css" type='text/css'> 
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    


  </head>
  <body>
    <!-- PHP -->
    <?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      require 'vendor/autoload.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = $_POST['username'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $address = $_POST['address'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $zipcode = $_POST['zipcode'];
      $phone = $_POST['phone'];


      $conn_string = "postgres://yryyyapkjdicty:be9383448f64e566523a74c14a25000423a9ba44818f55f4d81951a87be4d1d7@ec2-107-20-211-10.compute-1.amazonaws.com:5432/db6pl92dm9m24v";
      $connection = pg_connect($conn_string);

      $db_name = pg_dbname($connection);
      $error_msg = "Please correct the following errors:\n";

      $passed = true;


      if(empty($username) || empty($password) || empty($email) || empty($firstName) || empty($lastName) || empty($address) || empty($state) || empty($city) || empty($zipcode) || empty($phone))
      {
        $error_msg .= "\u2022 Please fill out all fields.\n";
        echo "<script>alert(\"Please fill out all fields\");</script>";
        $passed = false;

        //echo "<meta http-equiv='refresh' content='0'>";
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_msg .= "\u2022 Please enter a valid email address.\n";

        $passed = false;
        echo "<script>alert(\"Please enter a valid email address.\");</script>";
      }
      
      $usernameQuery = "SELECT * FROM \"Customer Information\" WHERE username = '" . $username . "'";
      $usernameQueryResult = pg_query($connection, $usernameQuery);

      if(pg_fetch_row($usernameQueryResult)) {
        $error_msg .= "\u2022 That username is already taken, please choose another.\n";
        echo "<script>alert(\"That username is already taken, please choose another.\");</script>";
        $passed = false;
      }

      $emailQuery = "SELECT * FROM \"Customer Information\" WHERE email = '" . $email . "'";
      $emailQueryResult = pg_query($connection, $emailQuery);
      // check email
      if(pg_fetch_row($emailQueryResult)){
        $error_msg .= "\u2022 An account already exists at that email address, please use another.\n";
        echo "<script>alert(\"An account already exists at that email address, please use another.\");</script>";
        $passed = false;
      }

      if (strlen($zipcode) != 5 || !ctype_digit($zipcode)) {
        $error_msg .= "\u2022 Please enter a valid 5-digit zipcode.\n";
         echo "<script>alert(\"Please enter a valid 5-digit zipcode.\");</script>";
         $passed = false;
      }

      if (strlen($phone) != 10 || !ctype_digit($phone)) {
        $error_msg .= "\u2022 Please enter a valid 10-digit phone number XXXXXXXXXX.\n";
        echo "<script>alert(\"Please enter a valid 10-digit phone number XXXXXXXXXX.\");</script>";
        $passed = false;
      }

      $check_pattern = '/\d+ [0-9a-zA-Z ]+/';
      if (!preg_match($check_pattern, $address)) {
        $error_msg .= "\u2022 Please enter a valid street address.\n";
         echo "<script>alert(\"Please enter a valid street address.\");</script>";
         $passed = false;
      }
      $check_pattern = '/[a-zA-Z]/';
      //if (!preg_match($check_pattern, $firstName)) {
      if(!ctype_alpha($firstName)){
        $error_msg .= "\u2022 Please enter a valid street address.\n";
         echo "<script>alert(\"First name can only contain letters.\");</script>";
         $passed = false;
      }

      if(!ctype_alpha($lastName)){
        $error_msg .= "\u2022 Please enter a valid street address.\n";
         echo "<script>alert(\"Last name can only contain letters.\");</script>";
         $passed = false;
      }

      if(!ctype_alpha($city)){
        $error_msg .= "\u2022 Please enter a valid street address.\n";
         echo "<script>alert(\"City can only contain letters.\");</script>";
         $passed = false;
      }

      /*if (strcmp("\u2022 Please fill out all fields.", $error_msg) != 0) {
      		//echo "HELLO";
        //exit(0);
        echo "<script>alert(\"Please fill out all fields\");</script>";
        //echo "<script>Document.getElementById(error).innerHTML=\"Please fill out all fields\"; Document.getElementById(error).display=\"block\";</script>";
      }*/
      if($passed){

      $sqlInsert="INSERT INTO \"Customer Information\" (\"firstname\", \"lastname\", \"email\", \"username\", \"password\", \"streetaddress\", \"city\", \"state\", \"zipcode\", \"phone\") VALUES ('$firstName', '$lastName', '$email', '$username', '$hashedPassword', '$address', '$city', '$state', '$zipcode', '$phone')";

      $_SESSION['login'] = true;
      $_SESSION["name"] = $first . " " . $last ;
      $_SESSION["location"] = $city . ", ". $state;
      $_SESSION["email"] = $email ;
      $_SESSION["phone"] = $phone;
      header('Location: member.php');

      if (!pg_query($connection, $sqlInsert)) {
        die('Error inserting into table.');
      }


      //Email information
      /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
      $mail = new PHPMailer(TRUE);
      $mail->isSMTP();
   
       /* SMTP server address. */
       $mail->Host = 'smtp.gmail.com';

       /* Use SMTP authentication. */
       $mail->SMTPAuth = TRUE;
       
       /* Set the encryption system. */
       $mail->SMTPSecure = 'tls';
       
       /* SMTP authentication username. */
       $mail->Username = 'coverfeed@gmail.com';
       
       /* SMTP authentication password. */
       $mail->Password = 'AlfWeaver1';
       
       /* Set the SMTP port. */
       $mail->Port = 587;
   

      /* Open the try/catch block. */
      try {


         /* Set the mail sender. */
         $mail->setFrom('coverfeed@gmail.com', 'CoverFeed');

         /* Add a recipient. */
         $mail->addAddress($email);

         /* Set the subject. */
         $mail->Subject = 'Thanks for joining CoverFeed.';

         /* Set the mail message body. */
         $mail->Body = 'Thanks for signing up for CoverFeed. We are excited to have you. You\'ll hear from us soon with more updates and exciting events';

         /* Finally send the mail. */
         $mail->send();
      }
      catch (Exception $e)
      {
         /* PHPMailer exception. */
         echo $e->errorMessage();
      }
      catch (\Exception $e)
      {
         /* PHP exception (note the backslash to select the global namespace Exception class). */
         echo $e->getMessage();
      }

        /*
        $admin_email = "coverfeed@gmail.com";
        $subject = "Thanks for signing up for CoverFeed, ".$firstName ."!";
        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";  
        $headers .=  "From:" . $admin_email;

        $message = '<html><body>';
        $message .= '<h1>Welcome, '. $firstName.'!</h1>';
        $message .= '<h3>By signing up for CoverFeed, you\'ll be the first to hear about nearby events supporting the causes YOU care about.</h3>';
        $message .= '<p>At CoverFeed we care about people. We aim to empower anyone to create, share, find and attend events that bring them joy and promote meaningful causes. Whether the cause touches only a few people or thousands, EventFeed can help. We strive to connect people through events that matter.</p>';
        $message .= '<h4>We promise to never send you spam or sell your contact information.</h4>' ;
        $message.='<p>Thank you from all of us at CoverFeed.<p>';
        $message .= '</body></html>';


        //send email
        mail($email, "$subject", $message, $headers);
      */
        echo "<script>alert(\"Your account has been created.\");</script>";




  	 } //end of if passed

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
      <a href="">Sign In</a>
    </li>
  </div>
    <div class="page">
      <div class="form-title">
        <p>Sign up to get access to hundreds of events.</p>
      </div>
      <div class="form-over">
      	<!-- <p id="error">Error</p> -->
        <form method="POST" class="signup-form" action="signup.php">
          <div class="half-width" style="margin-right: 12px;">
            <p>First Name:</p>
            <input type="text" name="firstName" value="" required="required">
          </div>
          <div class="half-width">
            <p>Last Name:</p>
            <input type="text" name="lastName" value="" required="required">
          </div>
          <p> Email:</p>
          <input type="text" name="email" value="" required="required">
          <div class = "half-width" style="margin-right: 12px;">
            <p>Username:</p>
            <input type="text" name="username" value="" required="required">
          </div>
          <div class = "half-width">
            <p>Password:</p>
            <input type="password" name="password" value="" required="required">
          </div>
          <p>Street Address:</p>
          <input type="text" name="address" value="" required="required">
          <div class = "split-width">
            <p>City:</p>
            <input type="text" name="city" value="" required="required">
          </div>
          <div class="state-div">
            <p>State:</p>
            <select name="state" class="drop" required="required">
              <option value="AL">AL</option>
              <option value="AK">AK</option>
              <option value="AZ">AZ</option>
              <option value="AR">AR</option>
              <option value="CA">CA</option>
              <option value="CO">CO</option>
              <option value="CT">CT</option>
              <option value="DE">DE</option>
              <option value="FL">FL</option>
              <option value="GA">GA</option>
              <option value="HI">HI</option>
              <option value="ID">ID</option>
              <option value="IL">IL</option>
              <option value="IN">IN</option>
              <option value="IA">IA</option>
              <option value="KS">KS</option>
              <option value="KY">KY</option>
              <option value="LA">LA</option>
              <option value="ME">ME</option>
              <option value="MD">MD</option>
              <option value="MA">MA</option>
              <option value="MI">MI</option>
              <option value="MN">MN</option>
              <option value="MI">MI</option>
              <option value="MO">MO</option>
              <option value="MT">MT</option>
              <option value="NE">NE</option>
              <option value="NV">NV</option>
              <option value="NH">NH</option>
              <option value="NJ">NJ</option>
              <option value="NM">NM</option>
              <option value="NY">NY</option>
              <option value="NC">NC</option>
              <option value="ND">ND</option>
              <option value="OH">OH</option>
              <option value="OK">OK</option>
              <option value="OR">OR</option>
              <option value="PA">PA</option>
              <option value="RI">RI</option>
              <option value="SC">SC</option>
              <option value="SD">SD</option>
              <option value="TN">TN</option>
              <option value="TX">TX</option>
              <option value="UT">UT</option>
              <option value="VA">VA</option>
              <option value="VT">VT</option>
              <option value="WA">WA</option>
              <option value="WV">WV</option>
              <option value="WY">WY</option>
            </select>
          </div>
          <div class = "split-width">
            <p>Zip Code:</p>
            <input type="text" name="zipcode" value="" required="required">
          </div>
          <p>Phone:</p>
            <input type="text" name="phone" value="" required="required">
          <input type="submit" value="Sign Up">
        </form>
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