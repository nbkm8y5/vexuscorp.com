<?php
session_start();
$errorMessage = '';
require_once 'php/session.php';
require_once 'php/db_connect.php';
// Get the member id from the URL variable
$id = $_REQUEST['id'];
$id = ereg_replace("[^0-9]", "", $id); // filter everything but numbers for security
if (!$id) {
    $errorMessage = "Missing Data to Run";
    //exit();
}
// Update the database field named 'email_activated' to 1
$sql = mysql_query("UPDATE clients SET emailactivated='1' WHERE id='$id'");
// Check the database to see if all is right now 
$sql_doublecheck = mysql_query("SELECT * FROM clients WHERE id='$id' AND emailactivated='1'");
$doublecheck = mysql_num_rows($sql_doublecheck);
if ($doublecheck == 0) {
// Print message to the browser saying we could not activate them
    $errorMessage = "Your account could not be activated!  Please try your email again.";
    $metaWrite = '<meta http-equiv="refresh" content="7;url=index.php">';
} elseif ($doublecheck > 0) {
// Print a success message to the browser cuz all is good 
// And supply the user with a link to your log in page, please alter that link line 
    $hurrayMessage = "Your account has been activated!  You will now be redirected to login page!";
    $metaWrite = '<meta http-equiv="refresh" content="7;url=login.php">';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $metaWrite; ?>
    <title>Vexus Corp - Activation Success!</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link
        href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
        rel='stylesheet' type='text/css'>

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
                <span><img src="images/contact-phone.png"></span><span class="spanpad">(305) 406-2001</span><span><img
                        src="images/contact-email.png"></span><span class="spanpad">info@vexuscorp.com</span>
            </div>
            <div class="row">
                <ul class="sociallinks">
                    <li><a href="https://twitter.com/vexuscorp" class="twitter" title="Twitter"
                           target="_blank">Twitter</a></li>
                    <li><a href="http://www.facebook.com/vexuscorp" class="facebook" title="Facebook" target="_blank">Facebook</a>
                    </li>
                    <li><a href="http://instagram.com/rgvexus" class="instagram" title="Instagram" target="_blank">Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
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
                <li><a href="index.php">Home</br>
                        <small>Vexus Corp</small>
                    </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products<span
                            class="caret"></span></br>
                        <small>Available</small>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="products.php#hpServers">HP Servers</a></li>
                        <li><a href="products.php#businessPrinters">Business Printers</a></li>
                        <li><a href="products.php#newProducts">New Products</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solutions
                        <span class="caret"></span></br>
                        <small>For all your needs</small>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="solutions.php#cloudComputing">Cloud Computing</a></li>
                        <li><a href="solutions.php#infraOutsource">It Infrastructure Outsourcing</a></li>
                        <li><a href="solutions.php#custom">Customization</a></li>
                    </ul>
                </li>
                <?php echo $navLinks; ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services
                        <span class="caret"></span></br>
                        <small>From HP</small>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="services.php">HP Renew America</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact</br>
                        <small>Vexus Corp</small>
                    </a></li>
                <?php echo $login ?>
            </ul>
        </div>
    </div>
    </div>
</nav>
<section>
    <div class="container">
        <div class="col-md-offset-4 col-md-4 text-center">
            <h1>Activation Confirmation</h1>
            <h6><?php echo $hurrayMessage; ?></h6>
            <h6><?php echo $errorMessage; ?></h6>
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
                    <li><a href="https://twitter.com/vexuscorp" class="twitter" title="Twitter"
                           target="_blank">Twitter</a></li>
                    <li><a href="http://www.facebook.com/vexuscorp" class="facebook" title="Facebook" target="_blank">Facebook</a>
                    </li>
                    <li><a href="http://instagram.com/rgvexus" class="instagram" title="Instagram" target="_blank">Instagram</a>
                    </li>
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