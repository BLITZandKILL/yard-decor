<html lang="en" class="full" xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta name="generator" content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" <!--="" the="" above="" 3="" meta="" tags="" *must*="" come="" first="" in="" head;="" any="" other="" head="" must="" *after*="" these="" --="">
  <meta name="description" content="Rockhinn Yard Decorations Online Storefront">
  <meta name="author" content="Jonathan McClure">
  <link rel="icon" href="favicon.ico">

  <title>Shopping Cart | Rockhinn Yard Decor</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/jumbotron-narrow.css" rel="stylesheet" type="text/css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css"></style></head>

<body>
  <div class="container" style="background-color: rgba(225, 255, 232, 0.65);padding-bottom: 0px;">
    <div class="row"><img src="images/banner.png" width="100%"></div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12" align="center">
        <div class="clearfix" style=" padding-top: 10px; padding-bottom: 10px;">
          <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php">Home</a></li>

            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Products <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <?php
                  $mysqli = new mysqli("Database IP","Username","Password","Database");
                  $query2 = $mysqli->query("SELECT * FROM categoryTable") or die('There was a problem, refresh the page!');
                  $num2 = $query->num_rows;
                  while ($row2 = $query2->fetch_assoc()) { $f0=$row2["name"];
                    if($f0 == urldecode($_GET["c"])) {
                      echo "<li role=\"presentation\" class=\"active\"><a href=\"shop.php?c=$f0\">$f0</a></li>";
                    } else {
                      echo "<li role=\"presentation\"><a href=\"shop.php?c=$f0\">$f0</a></li>";
                    }
                  }
                ?>
              </ul>
            </li>

            <li role="presentation"><a href="about.php">About Us</a></li>

            <li role="presentation" class="active"><a href="privacy.php">Privacy Policy</a></li>

            <li role="presentation"><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">0</span></a></li>
          </ul>
        </div>

        <div class="row">
          <div class="col-lg-12">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
              <h3>Privacy Policy</h3>
              <div class='innerText'>This privacy policy has been compiled to better serve those who are concerned with how their 'Personally identifiable information' (PII) is being used online. PII, as used in US privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.<br></div><span id='infoCo'></span><br><div class='grayText'><strong>What personal information do we collect from the people that visit our blog, website or app?</strong></div><br /><div class='innerText'>When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, mailing address, phone number  or other details to help you with your experience.</div><br><div class='grayText'><strong>When do we collect information?</strong></div><br /><div class='innerText'>We collect information from you when you register on our site, place an order, subscribe to a newsletter, fill out a form  or enter information on our site.</div><br><span id='infoUs'></span><br><div class='grayText'><strong>How do we use your information? </strong></div><br /><div class='innerText'> We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:<br><br></div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> To personalize user's experience and to allow us to deliver the type of content and product offerings in which you are most interested.</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> To improve our website in order to better serve you.</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> To allow us to better service you in responding to your customer service requests.</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> To quickly process your transactions.</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> To send periodic emails regarding your order or other products and services.</div><span id='infoPro'></span><br><div class='grayText'><strong>How do we protect visitor information?</strong></div><br /><div class='innerText'>We do not use vulnerability scanning and/or scanning to PCI standards.</div><div class='innerText'>We use regular Malware Scanning.<br><br></div><div class='innerText'>We do not use an SSL certificate</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> We do not need an SSL because:</div><div class='innerText'>All collected data is stored in an encrypted database</div><span id='coUs'></span><br><div class='grayText'><strong>Do we use 'cookies'?</strong></div><br /><div class='innerText'>Yes. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your Web browser (if you allow) that enables the site's or service provider's systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</div><div class='innerText'><br><strong>We use cookies to:</strong></div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> Help remember and process the items in the shopping cart.</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> Understand and save user's preferences for future visits.</div><div class='innerText'><br>You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser's Help menu to learn the correct way to modify your cookies.<br></div><br><div class='innerText'>If you disable cookies off, some features will be disabled It won't affect the users experience that make your site experience more efficient and some of our services will not function properly.</div><br><div class='innerText'>However, you can still place orders .</div><br><span id='trDi'></span><br><div class='grayText'><strong>Third Party Disclosure</strong></div><br /><div class='innerText'>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information.</div><span id='trLi'></span><br><div class='grayText'><strong>Third party links</strong></div><br /><div class='innerText'>Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.</div><span id='gooAd'></span><br><div class='blueText'><strong>Google</strong></div><br /><div class='innerText'>Google's advertising requirements can be summed up by Google's Advertising Principles. They are put in place to provide a positive experience for users. https://support.google.com/adwordspolicy/answer/1316548?hl=en <br><br></div><div class='innerText'>We have not enabled Google AdSense on our site but we may do so in the future.</div><span id='calOppa'></span><br><div class='blueText'><strong>California Online Privacy Protection Act</strong></div><br /><div class='innerText'>CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy.  The law's reach stretches well beyond California to require a person or company in the United States (and conceivably the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy. -  See more at: http://consumercal.org/california-online-privacy-protection-act-caloppa/#sthash.0FdRbT51.dpuf<br></div><div class='innerText'><br><strong>According to CalOPPA we agree to the following:</strong></div><div class='innerText'>Users can visit our site anonymously</div><div class='innerText'>Once this privacy policy is created, we will add a link to it on our home page, or as a minimum on the first significant page after entering our website.</div><div class='innerText'>Our Privacy Policy link includes the word 'Privacy', and can be easily be found on the page specified above.</div><div class='innerText'><br>Users will be notified of any privacy policy changes:</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> On our Privacy Policy Page</div><div class='innerText'>Users are able to change their personal information:</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> By emailing us</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> By logging in to their account</div><div class='innerText'><br><strong>How does our site handle do not track signals?</strong></div><div class='innerText'>We don't honor do not track signals and do not track, plant cookies, or use advertising when a Do Not Track (DNT) browser mechanism is in place. We don't honor them because:<br></div><div class='innerText'>No tracking is done to begin with.</div><div class='innerText'><br><strong>Does our site allow third party behavioral tracking?</strong></div><div class='innerText'>It's also important to note that we do not allow third party behavioral tracking</div><span id='coppAct'></span><br><div class='blueText'><strong>COPPA (Children Online Privacy Protection Act)</strong></div><br /><div class='innerText'>When it comes to the collection of personal information from children under 13, the Children's Online Privacy Protection Act (COPPA) puts parents in control.  The Federal Trade Commission, the nation's consumer protection agency, enforces the COPPA Rule, which spells out what operators of websites and online services must do to protect children's privacy and safety online.<br><br></div><div class='innerText'>We do not specifically market to children under 13.</div><span id='ftcFip'></span><br><div class='blueText'><strong>Fair Information Practices</strong></div><br /><div class='innerText'>The Fair Information Practices Principles form the backbone of privacy law in the United States and the concepts they include have played a significant role in the development of data protection laws around the globe. Understanding the Fair Information Practice Principles and how they should be implemented is critical to comply with the various privacy laws that protect personal information.<br><br></div><div class='innerText'><strong>In order to be in line with Fair Information Practices we will take the following responsive action, should a data breach occur:</strong></div><div class='innerText'>We will notify the users via email</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> Within 7 business days</div><div class='innerText'>We will notify the users via in site notification</div><div class='innerText'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&bull;</strong> Within 7 business days</div><div class='innerText'><br>We also agree to the individual redress principle, which requires that individuals have a right to pursue legally enforceable rights against data collectors and processors who fail to adhere to the law. This principle requires not only that individuals have enforceable rights against data users, but also that individuals have recourse to courts or a government agency to investigate and/or prosecute non-compliance by data processors.</div><span id='canSpam'></span><br><div class='blueText'><strong>CAN SPAM Act</strong></div><br /><div class='innerText'>The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have emails stopped from being sent to them, and spells out tough penalties for violations.<br><br></div><div class='innerText'><strong>We collect your email address in order to:</strong></div><div class='innerText'><br><strong>To be in accordance with CANSPAM we agree to the following:</strong></div><div class='innerText'><strong><br>If at any time you would like to unsubscribe from receiving future emails, you can email us at</strong></div> and we will promptly remove you from <strong>ALL</strong> correspondence.</div><br><span id='ourCon'></span><br><div class='blueText'><strong>Contacting Us</strong></div><br /><div class='innerText'>If there are any questions regarding this privacy policy you may contact us using the information below.<br><br></div><div class='innerText'>rockhinn.com</div>Arkansas <div class='innerText'><br>Last Edited on 2015-08-29</div>
              
              
              
            </div>
          </div>
        
      </div>
    </div>
    <div class="row">
      <div class="footer" align="right">
        <p style="color: #888;">&#169; Rockhinn Enterprises 2015&nbsp;</p>
      </div>
    </div>
  </div><!-- /container -->

</body></html>