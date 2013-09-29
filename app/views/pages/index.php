<!-- <div class="row">
	<form id="form-create-game " class="d5-d8 form">
		<h2>Create your game</h2>
		<input type="text" class="input-block-level"
			placeholder="Choose the name of the group">
		<button class="btn btn-large btn-primary" type="submit">Invite your
			friends</button>
	</form>
</div>

<div class="row">
	<form id"form-user-signin" class="d5-d8 form">
		<h2>Hello username, let's gamble!</h2>
		<input type="text" class="input-block-level"
			placeholder="Choose your rockin nickname">
		<button class="btn btn-large btn-success" type="submit">Let's play</button>
	</form>
</div>
-->

<div id="fb-root"></div>
<script>
	var thisUserId;
  window.fbAsyncInit = function() {
	  // init the FB JS SDK
    FB.init({
      appId      : '201990349980910',                        // App ID from the app dashboard
      //channelUrl : 'http://connect.facebook.net/en_US/all.js', 						// Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });
    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "http://connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  var requestCallback= function(response){
	  console.log(response);
  }
  
  function showFBLogin(event){
	  event.preventDefault();
	  FB.getLoginStatus(function(response) {
		  if (response.status != 'connected') {
			  FB.login(function(response) {
				    if (response.authResponse) {
				        // The person logged into your app
						FB.api('/me', function(response) {});
		       			//alert('Your name is ' + response.first_name);});		 
				    } else {
				        // The person cancelled the login dialog
				    }
			  },{scope: 'email'}
				);
		  }else{
			  FB.ui({method: 'apprequests',
				  message: 'Doe jij mee aan de promocup'
				}, requestCallback);
		}
	  });
  }
  function letsPlay(){
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
					},{scope: 'email'});
			  }else{
				  FB.api('/me', function(response) {
	     			$.ajax({
						url: '<?php echo $base.'index.php/pages/login' ?>',
						dataType: 'json',
						data: {
							name: response.name,
							fbid: response.id,
							email: response.email,
							username: response.username
						},
						type: 'POST',
						success: function(data, textStatus, xhr) {},
						error: function(xhr, textStatus, errorThrown) {},
						complete: function(xhr, textStatus) {
							window.location = '<?php echo $base; ?>index.php/';
						},
					});
				  });
			}
		  });
	 }  
  
</script>

<div class="row">
	<form id="form-create-game " class="d5-d8 form">
		<h2>Create your game</h2>
		<input type="text" class="input-block-level"
			placeholder="Choose the name of the group">
		<button class="btn btn-large btn-primary" type="submit"
			onclick="showFBLogin(event)">Invite your friends</button>
	</form>
</div>

<div class="row">
	<form id"form-user-signin" class="d5-d8 form">
		<h2>Hello username, let's gamble!</h2>
		<input type="text" class="input-block-level"
			placeholder="Choose your rockin nickname">
		<button class="btn btn-large btn-success" type="submit"
			onclick="letsPlay()">Let's play</button>
	</form>
</div>
