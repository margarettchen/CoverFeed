<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!--<link rel="icon" 
      	target="" ype="image/png" 
      	href="#">-->

    <title>Events</title>

  	<!-- styling -->
    <link rel="stylesheet" href="events.css" type='text/css'> 
    
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

    <div class="eventsHeader">Upcoming Events</div>
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
    <div class="events">
      <div class="event">
        <div class="titleCard one">
          <div class="name">JDRF's One Walk</div>
          <div class="location">New York, NY</div>
        </div><a href="#modal2"><div class="price">$ 10+</div></a>
        <div class="description">JDRF One Walk is a fun, family friendly event where dedicated walkers, volunteers and sponsors raise money to make living with T1D safer and healthier,until it is no longer a threat. We welcome everyone to take part—whether you choose to walk on your own or with a family, corporate or school team. As the largest T1D event in the world, it's also an amazing experience filled with activities, entertainment and the celebration of coming together to change the future for everyone living with this disease.<br><br>
        As the leading global organization funding T1D research, JDRF's mission is to accelerate life-changing breakthroughs to cure, prevent and treat T1D and its complications.<br><br>
        By raising money and awareness, you’ll help make a world without T1D a reality.</div>
      </div>
      <div class="event">
        <div class="titleCard two">
          <div class="name">AXO BridgeFest 2018</div>
          <div class="location">Charlottesville, VA</div>
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



