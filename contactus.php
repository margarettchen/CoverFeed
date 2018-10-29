
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!--<link rel="icon" 
      	target="" ype="image/png" 
      	href="#">-->

    <title>Contact Us</title>

  	<!-- styling -->
    <link rel="stylesheet" href="forms-style.css" type='text/css'> 
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    

  </head>
  <body>
    <?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      require 'vendor/autoload.php';


          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             
              $name = $_POST['name'];
              $email = $_POST['email'];
              $message = $_POST['message'];
              $newsletter = $_POST['newsletter'];

              $passed = true;
              if($message == ""){
                  echo "<script>alert(\"Please fill out the message field.\");</script>";
                  $passed = false;

              }

              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $passed = false;
                echo "<script>alert(\"Please enter a valid email address.\");</script>";
              }

              if(ctype_alpha(str_replace(' ', '', $name)) === false){
                 echo "<script>alert(\"Name can only contain letters and spaces.\");</script>";
                 $passed = false;
              }

               if($passed){
  
                /* //Email information
                  $admin_email = "coverfeed@gmail.com";
                  $subject = "Contact form from $name";
                  
                //send email
                  mail($admin_email, "$subject", $message, "From:" . $email);
                 */

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
                     $mail->setFrom($email, $name);

                     /* Add a recipient. */
                     $mail->addAddress('coverfeed@gmail.com', 'CoverFeed');

                     /* Set the subject. */
                     $mail->Subject = 'New contact form submitted';

                     /* Set the mail message body. */
                     $mail->Body = $message;

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






                //Email response
                echo "<script>alert(\"Thank you for contacting us.\");</script>";
            }
            else{
                  echo "<script>alert(\"There was an error.\");</script>";
            }
          }

          // -------------newsletter signup---------------
          $conn_string = "postgres://yryyyapkjdicty:be9383448f64e566523a74c14a25000423a9ba44818f55f4d81951a87be4d1d7@ec2-107-20-211-10.compute-1.amazonaws.com:5432/db6pl92dm9m24v";
          $connection = pg_connect($conn_string);

          $db_name = pg_dbname($connection);

          //check if newsletter box is checked
          if ($_POST['newsletter'] == 'emailList') {
            if($passed) {
              
              $sqlInsert="INSERT INTO \"Newsletter\" (\"Name\", \"Email Address\") VALUES ('$name', '$email')";

              if (!pg_query($connection, $sqlInsert)) {
                die('Error inserting into table.');
              }
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
    <div class="page contact">
      <div class="form-title">
        <p>Questions? Comments? Concerns? Contact us.</p>
      </div>
      <div class="form-over" id="contact-form">
        <form method="POST" class="signup-form" action="contactus.php">
          <p>Name:</p>
          <input type="text" name="name" value="" required="required">
          <p> Email:</p>
          <input type="text" name="email" value="" required="required">
          <p> Message:</p>
          <textarea  name="message" required ></textarea>
          <input type="checkbox" name="newsletter" value="emailList"> Sign me up for the CoverFeed newsletter!
          <input type="submit" value="Send">
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