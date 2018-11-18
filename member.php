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

    <div class="button_cont" align="center"><a class="example_c" href="add-website-here" target="_blank" rel="nofollow noopener">Sign Out</a>
    </div>
    <div class="memberHeader">Member Page</div>
    <div class= "event-overlay" id="event-overlay">
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

    </div>

    <div class="events">
      <div class="eventsHeader">Upcoming Events</div>
      <div class="event">
        <div class="titleCard one">
          <div class="name">JDRF's One Walk</div>
          <div class="location">New York, NY</div>
          <div class = "learnMore" id="event1">Learn More </div>
        </div><a href="#modal2"><div class="price">$ 10+</div></a>
        <div class="description">JDRF One Walk is a fun, family friendly event where dedicated walkers, volunteers and sponsors raise money to make living with T1D safer and healthier,until it is no longer a threat. We welcome everyone to take part—whether you choose to walk on your own or with a family, corporate or school team. As the largest T1D event in the world, it's also an amazing experience filled with activities, entertainment and the celebration of coming together to change the future for everyone living with this disease.<br><br>
        As the leading global organization funding T1D research, JDRF's mission is to accelerate life-changing breakthroughs to cure, prevent and treat T1D and its complications.<br><br>
        By raising money and awareness, you’ll help make a world without T1D a reality.</div>
      </div>
      <div class="event">
        <div class="titleCard two">
          <div class="name">AXO BridgeFest 2018</div>
          <div class="location">Charlottesville, VA</div>
           <div class = "learnMore" id="event2">Learn More </div>
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



