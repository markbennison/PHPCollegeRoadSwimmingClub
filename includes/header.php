<?php #header.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
//session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'User Registration';
}
?><!DOCTYPE html>
<html>
<head>
	<title>College Road: <?php echo $page_title; ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/collegeroad.css" rel="stylesheet" />
	<link href="/css/fontawesome.min.css" rel="stylesheet" />
	<link href="/css/solid.css" rel="stylesheet" />

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand"href="/index.php"><img src="/img/CollegeRoadSwimmingClub_sml_white.png" alt="College Road Swimming Club"/></a>
		</div>
		<div class="navbar-collapse collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" title="Home Page" href="/index.php">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/registered/swimmer">Swimmers</a></li>
				<li class="nav-item"><a class="nav-link" href="/registered/trainingevent">Trials</a></li>
				<li class="nav-item"><a class="nav-link" href="/registered/competitionevent">Competitions</a></li>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle <?php css_show_admin(); ?>" href="#" id="navbarDropdown" role="button" 
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Menu</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/admin/user">Users</a>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php //if (isset($_SESSION['forename'])) {
					if($session->is_logged_in()) {
					echo '<li class="nav-item"><a class="nav-link" href="/registered/account/index.php" title="Manage your account">Hello ' . $session->forename . '</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="/logout.php" title="Log Out">Logout</a></li>';
				} else { //  Not logged in.
					echo '<li class="nav-item"><a class="nav-link" title="Register for the Site" href="/register.php" title="Register">Register</a></li>';
					echo '<li class="nav-item"><a class="nav-link" title="Login" href="/login.php" title="Login">Login</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</nav>
<div class="container body-content"> <!-- Opens Main Content Div -->
	<h1><?php echo $page_title; ?></h1>