<?php
if(isset($_POST['submit']))
{

$message=
'Full Name:	'.$_POST['name'].'<br />
Phone:	'.$_POST['phone'].'<br />
Email:	'.$_POST['email'].'<br />
Comments:	'.$_POST['comments'].'
';
    require "phpmailer/PHPMailerAutoload.php"; //include phpmailer class

    // Instantiate Class
    $mail = new PHPMailer();

    // Set up SMTP
    $mail->IsSMTP();                // Sets up a SMTP connection
    $mail->SMTPAuth = "PLAIN";         // Connection with the SMTP does require authorization
    //$mail->SMTPSecure = "ssl";      // Connect using a TLS connection
    $mail->Host = "mail.inclusiveconcrete.com";  //Gmail SMTP server address
    $mail->Port = 25;  //SMTP port


    // Authentication
    $mail->Username   = "myhome@inclusiveconcrete.com"; // Your full Gmail address
    $mail->Password   = "Pq1rt893"; // Your Gmail password

    // Compose
    $mail->SetFrom($_POST['email'], $_POST['name']);
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "Inclusive Concrete Website - New Contact Form Enquiry";      // Subject (which isn't required)
    $mail->MsgHTML($message);

    // Send To
    $mail->AddAddress("sales@inclusiveconcrete.com", "Sales Inclusiveconcrete"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';
	unset($mail);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>INCLUSIVE CONCRETE - Contact Us</title>
  <link  href="styles.css\styles.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href=".\favicon.png">
</head>
<body>
  <div id="wrapper">
    <div id="nav_container">
      <div id="logo">
          <a href="http://www.inclusiveconcrete.com"><img src="assets\logo.png" ></a>
      </div>

      <div id="companyname">
          <p>INCLUSIVE CONCRETE<br />
          & ENGINEERING LIMITED</p>
        </div>

      <div id="multicolorline">
        <ul>
          <li class="yellow"></li>
          <li class="blue"></li>
          <li class="orange"></li>
        </ul>
      </div>

      <div id="navigation">
      <ul id="incmenu">
        <li><a href="index">Home</a></li>
        <li><a class="line" href="aboutus">About</a></li>
        <li><a class="line" href="services">Services</a></li>
        <li><a class="line" href="portfolio">Portfolio</a>
          <ul>
            <li><a href="our-equipment">Our Equipment</a></li>
          </ul>
        </li>
        <li><a class="line active" href="contact">Contact</a></li>
      </ul>
    </div>
  </div>

  <div id="toptitle">
    <p>Contact Us</p>
  </div>

   <div class="mapinc" style='overflow:hidden;height:250px;width:1000px;'>
    <div id='gmap_canvas' style='height:250px;width:1000px;'></div>
    <div><small><a href="http://www.embedgooglemaps.com/en/">Generate your map here, quick and easy!
      Give your customers directions									Get found</a></small></div>
      <div><small><a href="https://binaireoptieservaringen.nl/">Ga naar de site!</a></small></div>
      <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>

        <div id="sendus">
          <p>Send us a message, and we will contact you to arrange a free consultation:</p>
          <p style='font-size:14px; font-weight:bold;'><?php if(!empty($message)) echo $message; ?></p>
        </div>
        <div id="msgform">
            <form action="" method="post">
        <div>
          <input class="texto" type="text" name="name"  placeholder="Name" required><br />
          <input class="texto" type="text" name="email"  placeholder="Email" required><br />
          <input class="texto" type="text" name="phone"  placeholder="Phone" required><br />
        </div>
          <textarea class="texto" id="message" name="comments" placeholder="Message" required><?php if (isset($_POST['message']) === true) {echo strip_tags($_POST['message']);} ?></textarea>
          <input class="button" type="submit" name="submit" value="Send">
          </form>
        </div>

    <div id="contact-ad">
        <p>Enquiries:<br />
        08033025065, 07041825059, 07025041371</p>
        <p>Corporate Office:<br />
        7, Ikorodu Road Maryland Lagos, Nigeria.</p>
        <p>Factory:<br />
        Plot 96, Victoryland Estate, km 10, Lagos Ibadan Express Road, Arepo, Ogun State</p>
        <p>E-mail: <br />
          inclusive.concrete@gmail.com</p>
    </div>

    <div id="footercontact">
      <div class="top">
        <a href="http://www.facebook.com/inclusiveconcrete"><img class="facebook" src="assets\facebook.png" /></a>
        <a href="http://www.twitter.com/inclusiveconcrete"><img class="twitter" src="assets\twitter.png" /></a>
        <p class="inclusivecopy">© 2015 by Inclusive Concrete.</p>
      </div>

      <div class="bottom">
        <p class="icubecopy">(D) i-Cube Worldwide<p>
        </div>
      </div>

        </div>




      <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCWY2L51nKDbhs9w2N9xw6P_4axwx1fo6Q&callback=initMap'>
        </script>

        <script type='text/javascript'>
        function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(6.5740602,3.3687876999999844),mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(6.5740602,3.3687876999999844)});
        infowindow = new google.maps.InfoWindow({content:'<strong>Inclusive Concrete Corporate Office</strong><br>7, Ikorodu Road Maryland Lagos, Nigeria.<br>'});
        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}
        google.maps.event.addDomListener(window, 'load', init_map);
      </script>

</body>
</html>
