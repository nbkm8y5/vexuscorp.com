<?php
if (isset($_SESSION['id'])) {
    // Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $navLinks = '<li class="dropdown">
              <a href="tools.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools <span class="caret"></span></br><small>At your disposal</small></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="tools.php#hardware">Hardware Support Tools</a></li>
                    <li><a href="tools.php#software">Software Support Tools</a></li>
                  </ul>
              </li>';
    $login = '<li><a href="logout.php">Logout</br><small>Vexus Corp</small></a></li>';
    $tools = '<section id="hardware">
      <div class="container">
        <h1>HARDWARE SUPPORT</h1>
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Vexus is your one stop shop for hardware installation, deployment, and maintenance.<span class="text-muted">  Interesting.</span></h2>
            <p class="lead">Everything you need to get your equipment deployed.  Exclusively for Vexus Customers.</p>
            <ul>
              <li>
              <a href="http://icecat.us/us/">Ice Cat - All your hardware needs</a>
            </li>
            <li>
              <a href="http://h22174.www2.hp.com/SimplifiedConfig/MauiServlet">HP Server Configurator</a>
            </li>
          </ul>    
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-responsive" src="images/tools.jpg" alt="Generic placeholder image">
          </div>
        </div>
        <a id="topLinks" href="tools.php" target="_top">Top</a>
      </div>
  </section>
  <hr class="featurette-divider">
  <section id="software">
        <div class="container">
        <h1>SOFTWARE SUPPORT</h1>
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Need the latest firmware update? <span class="text-muted">We got you covered.</span></h2>
            <p class="lead">Listed below is every software configurator avaialble directly from HP, specifically for your equipment.</p>
      <ul>
        <li><a href="ftp://ftp.compaq.com/pub/products/servers/vmware/4AA0-5141ENW_Virt_Brochure_Jan09.PDF">VMWare Solutions Manual</a></li>
        <li><a href="http://www8.hp.com/h20195/v2/GetDocument.aspx?docname=4AA5-4773ENW">Business Printer Software Support</a></li>
      </ul>

          </div>
          <div class="col-md-5">
            <img class="featurette-image img-responsive" src="images/hp.jpg" alt="Generic placeholder image">
          </div>
        </div>
        <a id="topLinks" href="tools.php" target="_top">Top</a>
      </div>
    </section>';

} else {
    $navLinks = '<li class="dropdown">
              <a href="tools.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools <span class="caret"></span></br><small>At your disposal</small></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="join_form.php">Register to View Hardware/Software Support Tools</a></li>
                    <li><a href="login.php">Login to View Hardware/Software Support Tools</a></li>
                  </ul>
              </li>';
    $login = '<li><a href="login.php">Client Login</br><small>Vexus Corp</small></a></li>';
    $tools = '<section>
      <div class="container">
        <div class="col-md-offset-4 col-md-4">
          <h1>You have made it to the tools page!</h1>
          <h4>However, we suggest you login if you are already a member, or register to join, to enjoy all the exclusive hardware and software support tools.</h4>
          <div class="text-center">
            <a class="btn btn-default" href="join_form.php" role="button">Register</a>
            <a class="btn btn-default" href="login.php" role="button">Sign In</a>
          </div>
        </div>
      </div>
    </section>';
}
?>