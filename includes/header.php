<?php #header.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

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
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" runat="server" href="~/"><img src="/img/CollegeRoadSwimmingClub_sml_white.png" alt="College Road Swimming Club"/></a>
		</div>
		<div class="navbar-collapse collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" runat="server" title="Home Page" href="/index.php">Home</a></li>
				<li class="nav-item"><a class="nav-link" runat="server" href="/admin/user">Users</a></li>
				<li class="nav-item"><a class="nav-link" runat="server" href="/admin/swimmer">Swimmers</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['forename'])) {
					echo '<li class="nav-item"><a class="nav-link" runat="server" href="/" title="Manage your account">Hello ' . $_SESSION['forename'] . '</a></li>';
					echo '<li class="nav-item"><a class="nav-link" runat="server" href="/logout.php" title="Log Out">Logout</a></li>';
				} else { //  Not logged in.
					echo '<li class="nav-item"><a class="nav-link" runat="server" title="Register for the Site" href="/register.php" title="Register">Register</a></li>';
					echo '<li class="nav-item"><a class="nav-link" runat="server" title="Login" href="/login.php" title="Login">Login</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</nav>
<div class="container body-content"> <!-- Opens Main Content Div -->
	<h1><?php echo $page_title; ?></h1>