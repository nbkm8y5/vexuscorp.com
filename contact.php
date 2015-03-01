<?php
session_start();
require_once 'php/session.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vexus Corp - Contact Us</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/png" href="images/x16.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <div class="container">
        <div class="col-md-4">
          <img src="images/vexus_corp_logo.png">
        </div>
        <div class="col-md-offset-4 col-md-4 text-center">
          <div class="row">
            <span><img src="images/contact-phone.png"></span><span class="spanpad">(305) 406-2001</span><span><img src="images/contact-email.png"></span><span class="spanpad">info@vexuscorp.com</span> 
          </div>
          <div class="row">
            <ul class="sociallinks">
              <li><a href="https://twitter.com/vexuscorp" class="twitter" title="Twitter" target="_blank">Twitter</a></li>
              <li><a href="http://www.facebook.com/vexuscorp" class="facebook" title="Facebook" target="_blank">Facebook</a></li>
              <li><a href="http://instagram.com/rgvexus" class="instagram" title="Instagram" target="_blank">Instagram</a></li>
            </ul>
          </div>  
        </div>
      </div>
    </header>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Vexus Corp</a>
        </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</br><small>Vexus Corp</small></a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products<span class="caret"></span></br><small>Available</small></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="products.php#hpServers">HP Servers</a></li>
                  <li><a href="products.php#businessPrinters">Business Printers</a></li>
                  <li><a href="products.php#newProducts">New Products</a></li>
                </ul>
              </li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solutions <span class="caret"></span></br><small>For all your needs</small></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="solutions.php#cloudComputing">Cloud Computing</a></li>
                    <li><a href="solutions.php#infraOutsource">It Infrastructure Outsourcing</a></li>
                    <li><a href="solutions.php#custom">Customization</a></li>
                  </ul>
              </li>
              <?php echo $navLinks; ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></br><small>From HP</small></a>
              <ul class="dropdown-menu" role="menu">
                    <li><a href="services.php">HP Renew America</a></li>
                  </ul>
              </li>
              <li><a href="contact.php">Contact</br><small>Vexus Corp</small></a></li>
              <?php echo $login ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section id ="aboutJumbotron" class="container-fluid productSection">
      <div id="row">
        <div id="aboutUs"  class="col-xs-12 col-sm-12 col-md-6">
          <h1>What we do!</h1>
          <a id="topLinks" href="about.html" target="_top">Top</a>
          <p class="paragraphIndent">Vexus Corporation is a leading global IT solutions distributor dedicated to accelerating the success of its customers by providing market-specific resources, expertise, services and tools. Vexus Corporation’s core solutions and services offerings expand across the hardware industry, providing cost-effective solutions that identify high-growth areas in key technologies and vertical markets. With these technology and market specializations provided by Vexus Corporation , partners can effectively address their customers’ needs and business challenges resulting in new market opportunities and increased revenue growth.</p>

          <p class="paragraphIndent">Vexus Corporation expanded its operations in Latin America and the Caribbean, as a value–added distributor focused on delivering solutions from leading global IT suppliers. This expansion not only added new suppliers to the Vexus Corporation line card, it also positioned Vexus Corporation to develop new and existing customer relationships by extending its unique solutions and distribution strategy into high growth markets in region.</p>
        </div>
        <div id="anImage"  class="col-xs-12 col-sm-12 col-md-6" style="padding-top:25px; text-align:center">
          <img src="images/vexusWarehouse.jpg" class="img-rounded">
        </div>
      </div>
    </section>

    <section id="team" class="container-fluid productSection centeredH1">
      <h1>OUR TEAM</h1>
      <a id="topLinks" href="contact.php" target="_top">Top</a>
      <div id="aboutThumbs" class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/ronald.png" alt="Ronald Gonzalez" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>Ronald Gonzalez</h3>
              <p>Chief Executive Officer</p>
              <!-- <ul>
                <li><a href="mailto:ronaldgonzalez@vexuscorp.com?Subject=Inquiry%20from%20vexuscorp.com" target="_top"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></a></li>
                <li><a href="#"><img src="images/linked.png"></a></li>
                <li><a href="#"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/teresa.png" alt="Teresa Akkou" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>Teresa Akkou</h3>
              <p>Chief Accountant</p>
              <!-- <ul>
                <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></li>
                <li><a href="#"><img src="images/linked.png"></a></li>
                <li><a href="#"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/dm.jpg" alt="Daniela Miartus" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>Daniela Miartus</h3>
              <p>Business Development Manager</p>
              <!-- <ul>
                <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></li>
                <li><a href="#"><img src="images/linked.png"></a></li>
                <li><a href="#"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
      <div id="aboutThumbs" class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/team.jpg" alt="John Doe" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>John Doe</h3>
              <p>Business Development Manager</p>
              <!-- <ul>
                <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></li>
                <li><a href="#"><img src="images/linked.png"></a></li>
                <li><a href="#"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/blade.jpg" alt="Jane Doe" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>Jane Doe</h3>
              <p>Business Development Manager</p>
              <!-- <ul>
                <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></li>
                <li><a href="#"><img src="images/linked.png"></a></li>
                <li><a href="#"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="thumbnail">
            <img src="images/moreno.png" alt="Rolando Moreno" class="img-circle">
            <div id="captionImage" class="caption">
              <h3>Rolando Moreno</h3>
              <p>Web Developer / Software Architect</p>
              <!-- <ul>
                <li><a href="mailto:developer@rolandomoreno.com?Subject=Developer%20Questions" target="_top"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></a></li>
                <li><a href="https://www.linkedin.com/profile/public-profile-settings?trk=prof-edit-edit-public_profile" target="_blank"><img src="images/linked.png"></a></li>
                <li><a href="https://twitter.com/305rol" target="_blank"><img src="images/twitter.png"></a></li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <hr class="featurette-divider">
        <div class="row">
          <div class="col-md-6">
          <h4 class="text-center">Contact Information</h4>
          <ul class="contact">
            <li class="address">6341 NW 99 Avenue, Doral, Florida, 33178</li>
            <li class="phone">(305) 406-2001</li>
            <li class="fax">(305) 406-2002</li>
            <li class="email">info@vexuscorp.com</li>
            <li class="internet">http://www.vexuscorp.com</li>
          </ul>
        </div>
        <div class="col-md-6 text-center">
          <h4>Get in touch with Vexus Corporation</h4>
          <ul class="sociallinks">
              <li><a href="https://twitter.com/vexuscorp" class="twitter" title="Twitter" target="_blank">Twitter</a></li>
              <li><a href="http://www.facebook.com/vexuscorp" class="facebook" title="Facebook" target="_blank">Facebook</a></li>
              <li><a href="http://instagram.com/rgvexus" class="instagram" title="Instagram" target="_blank">Instagram</a></li>
            </ul>
        </div>
        </div>
        <div class="row text-center">
          <h6>&copy <?php echo date('Y'); ?> Vexus Corp</h6>
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>