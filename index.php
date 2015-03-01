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
    <title>Vexus Corp - High Technology Products</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
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
    <section>
      <div class="container-fluid carouselpad">
        <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/carousel_one.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>HP Servers.</h1>
              <p>Learn all about them!</p>
              <p><a class="btn btn-lg btn-danger" href="products.php#hpServers" role="button">Check it out</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carousel_two.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Software and Hardware Solutions</h1>
              <p>Only takes a minute to sign up and have full access.</p>
              <p><a class="btn btn-lg btn-danger" href="join_form.php" role="button">Sign Up</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carousel_3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Business Printers</h1>
              <p>Take a look.</p>
              <p><a class="btn btn-lg btn-danger" href="products.php#businessPrinters" role="button">Come on in</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
      </div>
    </section>
    <section>
      <div class="container"> 
        <div class="row">
          <h2>Vexus Corporation</h2>
          <p>Vexus Corporation is committed to providing our customers with a leading portfolio of IT technology solutions as well as a variety of hardware and services to help you expand your solutions offering, reach more customers, and most importantly drive profits.</p>
        </div>
        <div class="row">
          <h2>WHAT WE DO!</h2>
          <p>Vexus Corporation is a leading global IT solutions distributor dedicated to accelerating the success of its customers by providing market-specific resources, expertise, services and tools. Vexus Corporation’s core solutions and services offerings expand across the hardware industry, providing cost-effective solutions that identify high-growth areas in key technologies and vertical markets. With these technology and market specializations provided by Vexus Corporation , partners can effectively address their customers’ needs and business challenges resulting in new market opportunities and increased revenue growth.

Vexus Corporation expanded its operations in Latin America and the Caribbean, as a value–added distributor focused on delivering solutions from leading global IT suppliers. This expansion not only added new suppliers to the Vexus Corporation line card, it also positioned Vexus Corporation to develop new and existing customer relationships by extending its unique solutions and distribution strategy into high growth markets in region.</p>
        </div>
        <hr class="featurette-divider">
        <div class="row text-center">
          <div class="col-md-4">
            <div class="thumbnail center-block">
              <img src="images/video.png">
              <div class="caption">
                <h1>HP Products</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="images/radar.png">
              <div class="caption">
                <h1>Solutions</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="images/clipboard.png">
              <div class="caption">
                <h1>Services</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="images/switcher.png">
              <div class="caption">
                <h1>HP Renew America</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="images/dashboard.png">
              <div class="caption">
                <h1>Business Partners</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="images/light.png">
              <div class="caption">
                <h1>Cloud Computing</h1>
              </div>
            </div>
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row text-center">
          <div class="col-md-3">
            <h3>Lenovo</h3>
            <img class="img-rounded" src="images/lenovo_Official_Logo_mini.png">     
          </div>
          <div class="col-md-3">
            <h3>Hewlett Packard</h3>
            <img src="images/hp_logo.png">  
          </div>
          <div class="col-md-3">
            <h3>Oracle</h3>
            <img src="images/oracle_logo.png">
          </div>
          <div class="col-md-3">
            <h3>Lexmark</h3>
            <img src="images/lexmark_logo_mini.png">
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