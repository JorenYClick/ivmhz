<?php

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
	<meta name="google-site-verification" content="PfNRnc_x_imVg8XZWWUXBNQVre3nUpKgTOOTGmTueio" />
	<meta name="description" content="uw appartement, huis, woning, garage zelf verkopen" />
	<link rel="shortcut icon" href="/rce/assets/img/favicons/favicon.png">
	<link rel="icon" type="image/png" href="/rce/assets/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/rce/assets/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/rce/assets/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/rce/assets/img/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/rce/assets/img/favicons/favicon-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon" sizes="57x57" href="/rce/assets/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/rce/assets/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/rce/assets/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/rce/assets/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/rce/assets/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/rce/assets/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/rce/assets/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/rce/assets/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/rce/assets/img/favicons/apple-touch-icon-180x180.png">
	<title>ikverkoopmijnhuiszelf.be</title>
	
	<link href='http://fonts.googleapis.com/css?family=Poppins:400,600,700,500,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,400italic,500,500italic,300,100italic,100,300italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
	
	
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	// <!-- CSS -->
	
	Assets::css(array(
		Url::templatePath() . 'css/lightbox.css',
		Url::templatePath() . 'css/bootstrap.min.css',
		// Url::templatePath() . 'css/bootstrap-material-design.min.css',
		Url::templatePath() . 'css/flexslider.css',
		Url::templatePath() . 'font-awesome/css/font-awesome.min.css',
		Url::templatePath() . 'css/style.css',
	));

	//hook for plugging in css
	$hooks->run('css');
	?>


</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ">
				<div class="navbar-header">
					    <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
					        <span class="glyphicon glyphicon-align-justify"></span>
					    </button>
      					<!--<a class="navbar-brand logo" href="#">Ikverkoopmijnhuiszelf</a>-->
    			</div>
			</div>
			<div class="col-md-12">
				<nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
					<ul class="nav navbar-nav navbar-right menu pointer">
						<li><a onclick="javascript:gotoSection('page-top');" class="page-scroll active">Home</a></li>
						<li><a href="voordeel" class="page-scroll">Ontdek hier uw voordeel</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown link <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="verkopen" class="page-scroll">Verkopen zonder bemiddeling</a></li>
							</ul>
						</li>
						
						
						
						
						<li><a href="/aanbod" class="page-scroll">Aanbod</a></li>
						<li><a onclick="javascript:gotoSection('plichten');" class="page-scroll">Plichten</a></li>
						<li><a onclick="javascript:gotoSection('fastsale');" class="page-scroll">Fast sale</a></li>
						<li><a onclick="javascript:gotoSection('contact');" class="page-scroll">Contact</a></li>
							<!--<li><a href="#section4" class="page-scroll">Partners</a></li>-->
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>