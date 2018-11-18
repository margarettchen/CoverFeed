<?php 
  //if($_SESSION['login'] !== true) header("location:member.php");
?>

<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!--<link rel="icon" 
      	target="" ype="image/png" 
      	href="#">-->

    <title>Member Page</title>

  	<!-- styling -->
    <link rel="stylesheet" href="member.css" type='text/css'> 
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    
    
  </head>
  <body>

<!--PHP MAIL START-->
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
<!--PHP MAIL END-->


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

    <div class="button_cont" align="center"><a class="example_c" href="logout.php" target="_blank" rel="nofollow noopener">Sign Out</a>
    </div>
    <div class="memberHeader">Member Page</div>
    <div class= "event-overlay" id="event-overlay"></div>

<!--Start create event-->


      <div class ="create-over-cont" id ="create-cont">
            <span class="close" id = "close3">&times;</span>
            <h1>Create your own event</h1>
            <p>Fill out this form to submit an event to CoverFeed, once it is reviewed and accepted it will be posted on our list of upcomming events</p>

            <form method="POST" class="signup-form" action="member.php">
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


<!--End create event -->


      <div class ="event-over-cont" id="more-event1">
        <span class="close" id = "close">&times;</span>
        <h1 class="evTitle">JDRF One Walk</h1>
        <hr>
        <div class="theCause">
          <h2>The Cause</h2>
          <p>JDRF is the leading global organization funding type 1 diabetes (T1D) research. Founded more than 45 years ago by parents determined to find a cure for their children, today we exist for the millions of people affected by this disease. That's why we support the best researchers doing the most promising, cutting–edge science to cure, prevent and treat T1D.<br><br>

          Type 1 diabetes is an autoimmune disease that strikes children and adults suddenly. It has nothing to do with diet or lifestyle. You cannot prevent it—and there is currently no cure. If you have type 1 diabetes, you must constantly monitor your blood-sugar level, rely on injected or infused insulin and carefully monitor your eating and activity. It's a serious and stressful disease to manage.<br><br>

          JDRF works every single day by amassing grassroots support, deep scientific and industry knowledge, and academic partnerships to fund research to create a world without type 1 diabetes. We've raised more than $2 billion to–date, and the life–changing breakthroughs we've help fund wouldn't be possible without the support of people like you.<br><br>

          By participating in JDRF One Walk®, your fundraising will help make living with T1D safer and healthier, until it is no longer a threat. You play an integral role in turning Type One into Type None. We look forward to walking with you toward the finish line—a cure for T1D.</p>
          <a href="#">Read More</a>
        </div>
        <hr>
        <div class="event-gallery">
          <div class="row">
            <div class="column">
              <img src="images/walk-balloons.jpg" alt="Balloons" onclick="openImg(this);">
            </div>
            <div class="column">
              <img src="images/jdrf-finish.jpg" alt="Finish" onclick="openImg(this);">
            </div>
            <div class="column">
              <img src="images/jdrf-boy.png" alt="Boy" onclick="openImg(this);">
            </div>
            <div class="column">
              <img src="images/jdrf-cause.jpg" alt="Cause" onclick="openImg(this);">
            </div>
          </div>
          <!-- The expanding image container -->
          <div class="container">
            <!-- Close the image -->
            <span onclick="this.parentElement.style.display='none'" class="closebtn"></span>

            <!-- Expanded image -->
            <img id="expandedImg" style="width:100%">

            <!-- Image text -->
            <div id="imgtext"></div>
          </div>

        </div>
      </div>
      <div class ="event-over-cont" id="more-event2">
        <span class="close" id="close2">&times;</span>
        <h1 class="evTitle">AXO Bridgefest</h1>
        <hr>
        <div class="theCause">
          <h2>The Cause</h2>
          <p>The Shelter for Help in Emergency works to support and empower victims of domestic violence through a combination of residential, community-based and outreach services.<br><br>

          With 16 positions for a staff of 22 full and part-time employees, and the benefit of over 8,000 volunteer hours per year, the Shelter for Help in Emergency provides services to over 2,000 individuals annually.<br><br>

          Mission Statement:  Working to end domestic violence in our community<br><br>

          Philosophy Statement: The Shelter for Help in Emergency is committed to providing a safe, supportive, confidential, and respectful environment in which survivors of domestic violence are empowered with the knowledge of personal and community resources as well as the skills needed to make informed decisions for themselves and their families.<br><br>

          Today, the Shelter for Help in Emergency provides strong, well-established programs and services that respond to the needs of our whole community.  While some clients need the benefit of services within our safe, confidential residential facility, others are able to access the services they need at our Community Outreach Center or in other community-based sites.  Both residential  and outreach clients are offered a comprehensive range of services including crisis intervention, case management and counseling, legal advocacy and court accompaniment,  programs for children and adolescents,  and outreach to the Spanish-speaking community.  Over the years we have worked to become a resource to the whole community – a place where people can get information about domestic violence and learn ways in which they can get involved.
          </p>
          <a href="#">Read More</a>
        </div>
        <hr>
        <div class="event-gallery">
          <div class="row">
            <div class="column">
              <img src="images/axo-banner.jpg" alt="Banner" onclick="openImg2(this);">
            </div>
            <div class="column">
              <img src="images/axo-band.jpg" alt="Finish" onclick="openImg2(this);">
            </div>
            <div class="column">
              <img src="images/axo-help.png" alt="Help" onclick="openImg2(this);">
            </div>
            <div class="column">
              <img src="images/axo-house.jpg" alt="House" onclick="openImg2(this);">
            </div>
          </div>
          <!-- The expanding image container -->
          <div class="container">
            <!-- Close the image -->
            <span onclick="this.parentElement.style.display='none'" class="closebtn"></span>

            <!-- Expanded image -->
            <img id="expandedImg2" style="width:100%">

            <!-- Image text -->
            <div id="imgtext"></div>
          </div>

        </div>
      </div>
    </div>
    <div class="overlay" id="modal">
      <div class="overlayContent">
        <div class="overlayMsg">CONTINUE WITH PAYMENT &rarr;</div>
        <a class="closebtn" href="#">x</a>
        <form class="payment" action="https://test.bitpay.com/checkout" method="post" >
          <input type="hidden" name="action" value="checkout" />
          <input type="hidden" name="posData" value="" />
          <input type="hidden" name="data" value="rtUDWTdFUUFqTZgkk1YMpqQ2kjPwSqvP3M+XNTdFSQKNBBsDxbAucoJYe34PJ8tUoogp2dB4AHdB25EJwipJxcqBWAO8gQ4OTTjAttZka/3kAc2WyYVRWJvCRr39z8Sl" />
          <input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width:210px;" alt="BitPay, the easy way to pay with bitcoins." >
        </form>
      </div>
    </div>
    <div class="overlay" id="modal2">
      <div class="overlayContent">
        <div class="overlayMsg">CONTINUE WITH PAYMENT &rarr;</div>
        <a class="closebtn" href="#">x</a>
        <form class="payment" action="https://test.bitpay.com/checkout" method="post" >
          <input type="hidden" name="action" value="checkout" />
          <input type="hidden" name="posData" value="" />
          <input type="hidden" name="data" value="rtUDWTdFUUFqTZgkk1YMpqQ2kjPwSqvP3M+XNTdFSQKNBBsDxbAucoJYe34PJ8tUc1iGkrRhJbY/sYVXTNNosVhw1pA/r2lDRtlWpsYG09XKbtsLAg/2nqsMcajngETe" />
          <input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width:210px;" alt="BitPay, the easy way to pay with bitcoins." >
        </form>
      </div>
    </div>

    <div class="member-info">
      <h1>Profile Info</h1>
      <ul>
        <li>Name: Margaret Chen</li>
        <li>Location: Charlottesville, VA</li>
        <li>Email: margaret.chen98@gmail.com</li>
        <li>Phone: (703) 338-8557</li>
      </ul>

      <div class="button_cont" align="center" id ="create-event"><a class="example_a"  rel="nofollow noopener">Create an Event</a></div>

    </div>
  

    <div class="events">
      <div class="eventsHeader">Upcoming Events</div>
      <div class="event">
        <div class="titleCard one">
          <div class="name">JDRF's One Walk</div>
          <div class="location">New York, NY</div>
          <!--<div class = "learnMore" id="event1">Learn More </div>-->
        </div><a href="#modal2"><div class="price">$ 10+</div></a>
        <div class="description">JDRF One Walk is a fun, family friendly event where dedicated walkers, volunteers and sponsors raise money to make living with T1D safer and healthier,until it is no longer a threat. We welcome everyone to take part—whether you choose to walk on your own or with a family, corporate or school team. As the largest T1D event in the world, it's also an amazing experience filled with activities, entertainment and the celebration of coming together to change the future for everyone living with this disease.<br><br>
        As the leading global organization funding T1D research, JDRF's mission is to accelerate life-changing breakthroughs to cure, prevent and treat T1D and its complications.<br><br>
        By raising money and awareness, you’ll help make a world without T1D a reality.</div>
      </div>
      <div class="event">
        <div class="titleCard two">
          <div class="name">AXO BridgeFest 2018</div>
          <div class="location">Charlottesville, VA</div>
           <!--<div class = "learnMore" id="event2">Learn More </div>-->
        </div><a href="#modal"><div class="price">$ 5</div></a>
        <div class="description">Alpha Chi Omega and Beta Theta Pi Present Bridge Fest! Come out to Beta on Friday October 20 at 3:30 for good food and great music! Tickets are $5 beforehand and $10 at the door and all proceeds go to the Shelter for Help in Emergency, so please come!<br><br>
        Shelter for Help in Emergency provides comprehensive services to victims of domestic violence. <br>
        Shelter services include:<br><br>

        24-hour crisis hotline<br>
        24-hour emergency shelter<br>
        Resource assistance<br>
        Supportive individual and group counseling<br>
        Information and referral services<br>
        Legal advocacy<br>
        Court accompaniment<br>
        Programs for children and teens
        </div>
      </div>
    </div>
</body>
 <script type="text/javascript" src="events.js"></script>
 <script type="text/javascript" src="createevent.js"></script>




