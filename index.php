<?php include('app/app.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php appName(); ?> App - v<?php appVersion(); ?></title>
		<meta name="author" content="JDM Digital" />

		<link href="app/css/bootstrap.min.css" rel="stylesheet">
		<link href="app/css/style.css" rel="stylesheet">

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<header>
			<div class="container">
				<h1><?php appName(); ?></h1>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<p class="lead">A simple web app for creating Google Analytics campaign tracking links and shortening them with Bitly.</p>
						<div class="btn-row">
							<a href="app/" class="btn btn-fw  btn-lg btn-primary" role="button">Demo</a>
							<a href="<?php appRepo(); ?>" target="_blank" class="btn btn-fw btn-lg btn-default" rel="nofollow" role="button">Download v<?php appVersion(); ?></a>
						</div><!-- /btn-row -->
					</div>
				</div>
			</div><!--/container-->
		</header>
		<div id="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<h2>What is <?php appName(); ?>?</h2>
						<p><?php appName(); ?> is a simple (looking) web app for easily creating <a href="https://bitly.com/" target="_blank">Bitly</a> URLs that include parameters tracked in Google Analytics <a href="https://support.google.com/analytics/answer/1033863" target="_blank">Custom Campaigns</a>.</p>
						<p>We're looking to add other shortening services too, like goo.gl.</p>
						<h2>Getting Started</h2>
						<p>Once you've downloaded the ZIP of this repo, navigate to the file in <code>app/settings.php</code> to get started.</p>
						<p>The first thing you'll want to descide on which URL shortening service you want to use.  As of version 0.2, you can only choose "demo" or "bitly."  Others will be coming, but you'll want to use Bitly.</p>
						<h3>Get the Keys</h3>
						<p>First off, you'll need to get your Bitly API Login and Key to use Bitly as your URL shortening service.</p>
						<ol>
							<li>Create a Bitly account (if you haven't already)</li>
							<li>Login to Bitly</li>
							<li>Click the Hamburger <b>Menu</b></li>
							<li>Click <b>Settings</b>, then <b>Advanced Settings</b>, then <b>API Support</b></li>
							<li>There, you can create or get your API <b>Login</b> and API <b>Key</b></li>
						</ol>
						<p><img src="bitly-api-screenshot.jpg" height="338" width="952" class="img-responsive" alt="Bitly API Screenshot" /></p>
						<h3>Edit the Settings</h3>
						<p>Next up, we'll want to make changes and updates to the web app settings file.  You guessed it, these are made in the file, <code>app/settings.php</code>.</p>
						<ol>
							<li>Open <code>settings.php</code> in your favorite editor.</li>
							<li>Change <code>define("DEMO", <b>true</b>);</code> to <code>define("DEMO", <b>false</b>);</code></li>
							<li>Change <code>define("BITLY", <b>false</b>);</code> to <code>define("BITLY", <b>true</b>);</code></li>
							<li>Paste your Bitly API login into <code>define("API_USER", "<b>your bitly user name</b>");</code> (the bold part)</li>
							<li>Paste your Bitly API key into <code>define("API_KEY", "<b>your bitly api key</b>");</code> (the bold part)</li>
							<li>Leave the thing about <code>API_URL</code> alone.</li>
						</ol>
						<p>Navigate to the web app and give it a go.</p>
						<h3>Other Settings</h3>
						<p>You can also change the name of the app, the version, and the GitHub repo/branch in <code>settings.php</code>, if you're into that sort of thing.</p>
						<h2>Details on GitHub</h2>
						<p>For more information or to submit an issue/feature request, see the <a href="<?php appRepo(); ?>" target="_blank" rel="nofollow">GitHub repo</a>.</p>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<ul class="list-inline">
					<li><a href="<?php appRepo(); ?>" target="_blank">GitHub Repo</a></li>
					<li><a href="/" class="active">Instructions</a></li>
				</ul>
				<h2><?php appName(); ?></h2>
				<p><small>Copyright &copy; <?php echo date('Y'); ?> by the nerds at <a href="http://jdmdigital.co" target="_blank">JDM Digital</a></small>
			</div>
		</footer>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="app/js/plugins.js"></script>
		<script src="app/js/main.js"></script>
	</body>
</html>
