<?php
$navLinks = '';
$login = '';
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

} else {
    $navLinks = '<li class="dropdown">
	              <a href="tools.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools <span class="caret"></span></br><small>At your disposal</small></a>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="join_form.php">Register to View Hardware/Software Support Tools</a></li>
	                    <li><a href="login.php">Login to View Hardware/Software Support Tools</a></li>
	                  </ul>
	              </li>';
    $login = '<li><a href="login.php">Client Login</br><small>Vexus Corp</small></a></li>';
}
?>
