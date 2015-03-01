<?php
session_start();
require_once 'php/session.php';
require_once 'php/test_input.php';
require_once 'php/db_connect.php';
require_once 'php/mail.php';

$metaWrite='';
$congratsMessage='';
$errorMessage='';
$message='';
$userName ='';
$userNameError = '';
$firstName='';
$firstNameError='';
$lastName='';
$lastNameError='';
$businessName='';
$businessNameError='';
$businessAddress='';
$businessAddressError='';
$country='';
$countryError='';
$city='';
$cityError='';
$state='';
$stateError='';
$email='';
$emailError='';
$password='';
$passwordError='';
$sql_username_check='';
$sql_email_check='';
$username_check='';
$email_check = '';
$hashedPass='';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if(isset($_POST['username']))
    {
      $userName = test_input($_POST['username']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$userName)) {
           $userNameError = "Only letters, numbers and white space are allowed."; 
        }
    }else
        {
          $userNameError = "A username is required.";
        }

  if(isset($_POST['firstname']))
    {
      $firstName = test_input($_POST['firstname']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
           $firstNameError = "Only letters and white space allowed."; 
        }
    }else
        {
          $firstNameError = "A first name is required.";
        }

  if(isset($_POST['lastname']))
    {
      $lastName = test_input($_POST['lastname']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
           $lastNameError = "Only letters and white space allowed."; 
        }
    }else
        {
          $lastNameError = "A last name is required.";
        }

  if(isset($_POST['businessname']))
    {
      $businessName = test_input($_POST['businessname']);
    }else
        {
          $businessNameError = "A business name is required.";
        }

  if(isset($_POST['businessaddress']))
    {
      $businessAddress = test_input($_POST['businessaddress']);
    }else
        {
          $businessAddressError = "A business address is required.";
        }

  if(isset($_POST['country']))
    {
      $country = test_input($_POST['country']);
    }else
        {
          $countryError = "A country of business is required.";
        }

  if(isset($_POST['city']))
    {
      $city = test_input($_POST['city']);
      // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
           $cityError = "Only letters and white space allowed."; 
        }
    }else
        {
          $cityError = "A city of business is required.";
        }

  if(isset($_POST['state']))
    {
      $state = test_input($_POST['state']);
      // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
           $stateError = "Only letters and white space allowed."; 
        }
    }else
        {
          $stateError = "A state of business is required.";
        }

  if(isset($_POST['email']))
                {
                  $email = test_input($_POST['email']);
                  // check if e-mail address is well-formed
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $emailError = "Invalid email format"; 
                 }
                }
            else
                {
                  $emailError = "Email address is required.";
                }
  if(isset($_POST['password']))
    {
      $password = test_input($_POST['password']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
           $passwordError = "Only letters, numbers and white space are allowed."; 
        }
    }else
        {
          $passwordError = "A password is required.";
        }
}
  // Database duplicate Fields Check
  $sql_username_check = mysql_query("SELECT id FROM clients WHERE username='$username' LIMIT 1");
  $sql_email_check = mysql_query("SELECT id FROM clients WHERE email='$email' LIMIT 1");
  $username_check = mysql_num_rows($sql_username_check);
  $email_check = mysql_num_rows($sql_email_check); 
  if ($username_check > 0){ 
    $errorMessage = "ERROR:<br />Your User Name is already in use inside our system. Please try another.";
    $metaWrite = '<meta http-equiv="refresh" content="7;url=join_form.php">';
  } else if ($email_check > 0){ 
    $errorMessage = "ERROR:<br />Your Email address is already in use inside our system. Please try another.";
    $metaWrite = '<meta http-equiv="refresh" content="7;url=join_form.php">';
  } else {
      // Add MD5 Hash to the password variable
      $hashedPass = md5($password); 
      //Add user info into the database table, claim your fields then values 
      $sql = mysql_query("INSERT INTO clients (username, firstname, lastname, businessname, businessaddress, country, state, city, email, password, signupdate) 
      VALUES('$userName','$firstName','$lastName','$businessName','$businessAddress','$country','$state','$city','$email','$hashedPass', now())") or die (mysql_error());
      // Get the inserted ID here to use in the activation email
      $id = mysql_insert_id();
      // Create directory(folder) to hold each user files(pics, MP3s, etc.) 
      // mkdir("memberFiles/$id", 0755);
      // Start assembly of Email Member the activation link
      // Start assembly of Email Member the activation link
      $to = "$email";
      // Change this to your site admin email
      $from = "info@vexuscorp.com";
      $subject = "Complete your Vexus Corp Registration";
      //Begin HTML Email Message where you need to change the activation URL inside
      $message = '<html>
      <body bgcolor="#FFFFFF">
      Hi ' . $userName . ',
      <br /><br />
      You must complete this step to activate your account with Vexus Corp.
      <br /><br />
      Please click here to activate now &gt;&gt;
      <a href="http://vexuscorp.com/test/activation.php?id=' . $id . '">
      ACTIVATE NOW</a>
      <br /><br />
      Your Login Data is as follows: 
      <br /><br />
      E-mail Address: ' . $email . ' <br />
      Password: ' . $password . ' 
      <br /><br /> 
      Thanks! 
      </body>
      </html>';
      // end of message
      $headers = "From: $from\r\n";
      $headers .= "Content-type: text/html\r\n";
      $to = "$to";
      // Finally send the activation email to the member
      mail($to, $subject, $message, $headers);
      // Then print a message to the browser for the joiner 
      $congratsMessage = "Congratulations, $firstName $lastName! You will receive an email shortly to activate account.";
      $metaWrite = '<meta http-equiv="refresh" content="7;url=index.php">';
    } // Close else after database duplicate field value checks
mysql_close($link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $metaWrite; ?>
    <title>Vexus Corp - Registration Confirmation Form</title>
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

    <div class="container">
      <div class="col-md-offset-3 col-md-6">
        <h1 class="text-center">Vexus Corp Registration Confirmation</h1>
        <h3 class="text-center"><?php echo $congratsMessage; ?></h3>
        <h3 class="text-center"><?php echo $errorMessage; ?></h3>
        <h6><?php
        $summary = "Username: $userName<br/>
                    Name: $firstName $lastName<br/>
                    Business Name: $businessName<br/>
                    Business Address: $businessAddress<br/>
                    $city, $state, $country.";
        echo $summary;
        ?></h6>

        <h6><?php echo $userNameError; ?></h6>
        <h6><?php echo $firstNameError; ?></h6>  
        <h6><?php echo $lastNameError; ?></h6>
        <h6><?php echo $businessNameError; ?></h6>
        <h6><?php echo $businessAddressError; ?></h6>
        <h6><?php echo $countryError; ?></h6>
        <h6><?php echo $cityError; ?></h6>
        <h6><?php echo $stateError; ?></h6>
        <h6><?php echo $emailError; ?></h6>
      </div>
    </div> 
    
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