<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!--<link rel="icon" 
      	target="" ype="image/png" 
      	href="#">-->

    <title>Create Event</title>

  	<!-- styling -->
    <link rel="stylesheet" href="myevent.css" type='text/css'> 
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    
    
  </head>
  <body>
<!--PHP MAIL-->
<?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      require 'vendor/autoload.php';


          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             
              $firstName = $_POST['firstName'];
              $lastName = $_POST['lastName'];
              $email = $_POST['email'];
              $address = $_POST['address'];
              $state = $_POST['state'];
              $city = $_POST['city'];
              $zipcode = $_POST['zipcode'];
              $phone = $_POST['phone'];
              $org = $_POST['org'];
              $fee = $_POST['fee'];


              $passed = true;

              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $passed = false;
                echo "<script>alert(\"Please enter a valid email address.\");</script>";
              }

              /*if(ctype_alpha(str_replace(' ', '', $name)) === false){
                 echo "<script>alert(\"Name can only contain letters and spaces.\");</script>";
                 $passed = false;
              }*/

               if($passed){
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
                     $mail->setFrom($email, $firstName);
                     /* Add a recipient. */
                     $mail->addAddress('coverfeed@gmail.com', 'CoverFeed');
                     /* Set the subject. */
                     $mail->Subject = 'New event form submitted';
                     /* Set the mail message body. */
                     $mail->Body = " From: ". $firstName . " " . $lastName . " at " . $email . "\n Address: " . $address ."  " .$city .", ".$state." ".$zipcode."\n Phone: ".$phone."\n Organization: ".$org."\n Fee: ".$fee ;
                     /* Finally send the mail. */
                     $mail->send();
                  }
                  catch (Exception $e)
                  {
                     /* PHPMailer exception. */
                     echo $e->errorMessage();
                  }
                  catch (\Exception $e)
                  { /* PHP exception (note the backslash to select the global namespace Exception class). */
                     echo $e->getMessage();
                  }

                //Email response
                echo "<script>alert(\"Thank you for submitting an event.\");</script>";
            }
            else{
                echo "<script>alert(\"There was an error.\");</script>";
            }
          }

    ?>
<!--PHP MAIL-->
      <div class="nav-bar">
        <li class="logo">
          <h1>CoverFeed</h1>
        </li>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="">Events</a>
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

    <div class="event-button" id="create-event">Create an Event</div>

    <div class="create-overlay" id="create-overlay">

      <div class ="create-over-cont" id ="create-cont">
            <span class="close" id = "close3">&times;</span>
            <h1>Create your own event</h1>
            <p>Fill out this form to submit an event to CoverFeed, once it is reviewed and accepted it will be posted on our list of upcomming events</p>

            <form method="POST" class="signup-form" action="myevent.php">
              <div class="half-width" >
                <p>First Name:</p>
                <input type="text" name="firstName" value="" required="required">
              </div>
              <div class="half-width" style="float:right">
                <p>Last Name:</p>
                <input type="text" name="lastName" value="" required="required">
              </div>
              <p> Email:</p>
              <input type="text" name="email" value="" required="required">
              <p>Associated Organization</p>
              <input type="text" name="org" value="" required="required">
              <div class="half-width" style="margin-right: 12px;">
                  <p>Event Date and Time</p>
                  <input type="datetime-local" id="date-time" class ="date-style"
                  name="date-time" value="2018-11-19T19:30"
                  min="2018-11-19T00:00" max="2020-12-31T00:00" required="required">
              </div>
              <div class="half-width" style="float:right">
                  <p>Event Fee</p>
                  <input type="text" name="fee" value="" required="required">
              </div>
              <p>Event Address:</p>
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
                  <option value="VT">VT</option>
                  <option value="WA">WA</option>
                  <option value="WV">WV</option>
                  <option value="WY">WY</option>
                </select>
              </div>
              <div class = "split-width" style="float:right">
                <p>Zip Code:</p>
                <input type="text" name="zipcode" value="" required="required">
              </div>
              <p>Phone:</p>
                <input type="text" name="phone" value="" required="required">
              <input type="submit" value="Submit Event">
            </form>






      </div>

  </div>
  </body>
   <script type="text/javascript" src="createevent.js"></script>

  </html>
