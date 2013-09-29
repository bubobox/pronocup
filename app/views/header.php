<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo escape($application_name) ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
				<!-- Boostrap -->	
				<link rel="stylesheet" href="<?php echo escape($base); ?>assets/bootstrap/css/bootstrap.min.css">
				
        <link rel="stylesheet" href="<?php echo escape($base); ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo escape($base); ?>assets/css/gridset.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <p>is_authenticated = <?php echo $is_authenticated; ?></p>
        <p><pre><?php print_r($user); ?></pre></p>
        <?php
        	if($is_authenticated) {
?><ul>
	<li><strong><?php echo escape($user->name) ?></strong><br /><img src="https://graph.facebook.com/<?php echo escape($user->username) ?>/picture" alt="" /></li>
	<li><a href="<?php echo $base ?>index.php/predictions/index">Predictions</a></li>
	<li><a href="<?php echo $base ?>index.php/results/index">Results</a></li>
	<li><a href="<?php echo $base ?>index.php/pages/logout">Logout</a></li>
</ul><?php
        	}
        ?>