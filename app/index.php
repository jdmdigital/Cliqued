<?php include('app.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php appName(); ?> App - v<?php appVersion(); ?></title>
		<meta name="author" content="JDM Digital" />

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<header>
			<div class="container">
				<h1><?php appName(); ?></h1>
				<p id="starter" class="lead">Create a campaign tracking link below.</p>
				<p id="reload" class="lead nodisplay"><a href="#" id="startover">Create a new</a> campaign tracking link.</p>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<form id="clicked" class="step-form">
							<fieldset id="step1" class="step current">
								<div class="form-group">
									<label for="website-url">Landing Page URL<span class="required">*</span></label> 
									<div class="input-group input-group-lg">
										<input id="website-url" name="website-url" type="url" class="form-control" placeholder="http://">
										<span class="input-group-btn"><button class="btn btn-primary next-fieldset" type="button"><span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span></button></span>
									</div><!-- /input-group -->
									<p class="help-block">The full website URL (e.g. <code>http://www.yoursite.com</code>)</p>
								</div>
							</fieldset><!-- / #step1 -->
							<fieldset id="step2" class="step">
								<div class="form-group">
									<label for="campaign-source">Campaign Source <span class="required">*</span></label> <a tabindex="0" data-toggle="popover" data-trigger="focus" title="Campaign Source" data-content="Give the campaign a referrer (e.g. newsletter, promotion)" role="button"><span class="glyphicon glyphicon-question-sign"></span></a>
									<div class="input-group input-group-lg">
										<input id="campaign-source" name="campaign-source" type="text" class="form-control" placeholder="ex: newsletter">
										<span class="input-group-btn"><button class="btn btn-primary next-fieldset" type="button"><span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span></button></span>
									</div><!-- /input-group -->
									<div class="help-block">
										<button id="more-options" type="button" class="btn btn-link btn-sm">more options <span class="glyphicon glyphicon-chevron-down"></span></button>
									</div>
								</div>
								<div id="campaign-options" class="nodisplay">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="campaign-medium">Campaign Medium </label>
												<input id="campaign-medium" name="campaign-medium" type="text" class="form-control input-lg" placeholder="ex: email">
												<p class="help-block">Marketing medium: (e.g. <code>cpc</code>, <code>banner</code>, <code>email</code>, <code>postcard</code>)</p>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="campaign-name">Campaign Name </label>  
												<input id="campaign-name" name="campaign-name" type="text" class="form-control input-lg" placeholder="ex: spring_sale">
												<p class="help-block">Product, promo code, or slogan (e.g. <code>spring_sale</code>)</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="campaign-term">Campaign Term </label>
												<input id="campaign-term" name="campaign-term" type="text" class="form-control input-lg" placeholder="ex: flowers">
												<p class="help-block">Identify the PPC keywords (if any)</p>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="campaign-content">Campaign Content </label>
												<input id="campaign-content" name="campaign-content" type="text" class="form-control input-lg" placeholder="ex: version_2b">
												<p class="help-block">Use to differentiate ads</p>
											</div>
										</div>
									</div>
								</div><!--/ #campaign-options -->
							</fieldset><!-- / #step2 -->
							<fieldset id="step3" class="step">
								<div class="form-group">
									<label for="campaign-url">Generated Campaign URL</label>
									<input id="campaign-url" name="campaign-url" type="url" class="form-control input-lg" placeholder="http://" data-longurl="http://yourwebsite.com?utm_source=newsletter&utm_campaign=spring_reminder&utm_medium=postcard" data-shorturl="" value="http://yourwebsite.com?utm_source=newsletter&utm_campaign=spring_reminder&utm_medium=postcard" readonly>
								</div>
								<div class="btn-row">
									<button id="copy-url" type="button" class="btn btn-default btn-fw" data-clipboard-target="#campaign-url"><span class="glyphicon glyphicon-copy"></span> Copy URL</button>
									<button id="get-shortlink" type="button" class="btn btn-primary btn-fw"><span class="glyphicon glyphicon-link"></span> Get Shortlink</button>
								</div>
							</fieldset><!-- / #step3 -->
						</form>
					</div><!--/offsets-->
				</div><!--/row-->
			</div><!--/container-->
		</header>
		<div id="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<h2>The Power of the Link</h2>
						<p><?php appName(); ?> is a simple (looking) web app for easily creating shortened URLs that include parameters tracked in Google Analytics <a href="https://support.google.com/analytics/answer/1033863" target="_blank">Custom Campaigns</a>.</p>
						<?php if(is_demo()) : ?>
						<div class="alert alert-warning" role="alert">
							<h3>Demo Mode Active</h3>
							<p>Please keep in mind this is currently in <b>DEMO mode</b>. To turn that off, check the values in <code>app/settings.php</code>.</p>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<ul class="list-inline">
					<li><a href="<?php appRepo(); ?>" target="_blank">GitHub Repo</a></li>
					<li><a href="../">Instructions</a></li>
				</ul>
				<h2><?php appName(); ?></h2>
				<p><small>Copyright &copy; <?php echo date('Y'); ?> by the nerds at <a href="http://jdmdigital.co" target="_blank">JDM Digital</a></small>
			</div>
		</footer>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
