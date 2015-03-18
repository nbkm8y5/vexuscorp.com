<?php
session_start();
require_once 'php/session.php';
if ($_POST['email']) {
//Connect to the database through our include 
    require_once "php/db_connect.php";
    $email = stripslashes($_POST['email']);
    $email = strip_tags($email);
    $email = mysql_real_escape_string($email);
    $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
    $password = md5($password);
// Make query and then register all database data that -
// cannot be changed by member into SESSION variables.
// Data that you want member to be able to change -
// should never be set into a SESSION variable.
    $sql = mysql_query("SELECT * FROM clients WHERE email='$email' AND password='$password' AND emailactivated='1'");
    $login_check = mysql_num_rows($sql);
    if ($login_check > 0) {
        while ($row = mysql_fetch_array($sql)) {
            // Get member ID into a session variable
            $id = $row["id"];
            session_register('id');
            $_SESSION['id'] = $id;
            // Get member username into a session variable
            $username = $row["username"];
            session_register('username');
            $_SESSION['username'] = $username;
            // Update last_log_date field for this member now
            mysql_query("UPDATE clients SET lastlogin=now() WHERE id='$id'");
            // Print success message here if all went well then exit the script
            header("Location: /test/index.php");
            exit();
        } // close while
    } else {
// Print login failure message to the user and link them back to your login page
        $noUser = 'No match in our records. You will be automatically redirected to login page to try again.';
        $metaWrite = '<meta http-equiv="refresh" content="7;url=login.php">';
    }
}// close if post
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $metaWrite ?>
    <title>Vexus Corp - Login Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link
        href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
        rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/png" href="images/x16.png">

    <script type="text/javascript">
        <!--
        Form
        Validation -->
        function validate_form() {
            valid = true;
            if (document.logform.email.value == "") {
                alert("Please enter your User Name");
                valid = false;
            }
            if (document.logform.pass.value == "") {
                alert("Please enter your password");
                valid = false;
            }
            return valid;
        }
        <!-- Form Validation -->
    </script>

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
            <h3>Log in to your account here</h3>

            <form action="login.php" method="post" enctype="multipart/form-data" name="logform" id="logform"
                  onsubmit="return validate_form ( );">
                <div class="form-group">
                    <label for="emailaddress">Email Address</label>
                    <input name="email" type="email" value="<?php echo "$email"; ?>" class="form-control"
                           id="emailaddress" placeholder="Enter your email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" value="<?php echo "$password"; ?>" class="form-control"
                           id="password" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-danger">Sign In</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>

            <h6><?php echo $noUser; ?></h6>
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