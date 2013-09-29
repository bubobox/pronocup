<!DOCTYPE html>
<div id="fb-root"></div>
<script>
    var thisUserId;
    window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
            appId: '201990349980910', // App ID from the app dashboard
            //channelUrl : 'http://connect.facebook.net/en_US/all.js', 						// Channel file for x-domain comms
            status: true, // Check Facebook Login status
            xfbml: true                                  // Look for social plugins on the page
        });
        // Additional initialization code such as adding Event Listeners goes here
    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "http://connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    var requestCallback = function(response) {
        console.log(response);
    }

    function showFBLogin(event) {
        event.preventDefault();
        FB.getLoginStatus(function(response) {
            if (response.status != 'connected') {
                FB.login(function(response) {
                    if (response.authResponse) {
                        // The person logged into your app
                        FB.api('/me', function(response) {
                        });
                        //alert('Your name is ' + response.first_name);});		 
                    } else {
                        // The person cancelled the login dialog
                    }
                }
                );
            } else {
                //FB.api('/me', function(response) {
                //alert('Your name is ' + response.first_name);});
                FB.ui({method: 'apprequests',
                    message: 'Doe jij mee aan de promocup'
                }, requestCallback);
            }
        });
    }
    function letsPlay() {
        event.preventDefault();
        FB.getLoginStatus(function(response) {
            if (response.status != 'connected') {
                FB.login(function(response) {
                    if (response.authResponse) {
                        // The person logged into your app
                        letsPlay();

                    } else {
                        // The person cancelled the login dialog
                        alert("Je logde niet in");
                    }
                });
            } else {

                FB.api('/me', function(response) {
                    //alert('Your name is ' + response.first_name);

                    window.location.href = "http://localhost/www/index.php?id=" + response.id + "&username=" + response.first_name + response.last_name;
                });
            }
        });
    }

</script>
<?php
if ($_GET['username'] != NULL)
    echo '<img src="https://graph.facebook.com/' . $_GET['username'] . '/picture">';
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- Boostrap -->	
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/gridset.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Sign in User -->
        <div class="row">
            <form id="form-create-game " class="d5-d8 form">
                <h2>Create your game</h2>
                <input type="text" class="input-block-level" placeholder="Choose the name of the group">
                <button class="btn btn-large btn-primary" type="submit" onclick="showFBLogin(event)">Invite your friends</button>
            </form>
        </div>

        <div class="row">
            <form id"form-user-signin" class="d5-d8 form">
                  <h2>Hello username, let's gamble!</h2>
                <input type="text" class="input-block-level" placeholder="Choose your rockin nickname">
                <button class="btn btn-large btn-success" type="submit" onclick="letsPlay()">Let's play</button>
            </form>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function(d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
        </script>
    </body>
</html>
