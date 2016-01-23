<h1>JavaScript Connexion</h1>
<p><a href="javascript:void(0);" onClick="logInWithFacebook()">Log In with the JavaScript SDK</a></p>
<script type="text/javascript">

logInWithFacebook = function() {
		FB.login(function(response) {
	    	if (response.authResponse) {
	    		console.log(window.location);
	        	window.location = <?= "'".$data['dir'].'apps/jsredirect'."'" ?>;
	        }else {
	        	console.log(response.authResponse);
	        	console.log('User are NOT logged!');
	        }
	    });
	return false;
};

window.fbAsyncInit = function() {
	FB.init({
		appId: <?php  echo "'".$data['id']."'"; ?> ,
		version: <?php  echo "'".$data['version']."'"; ?>,
		cookie: true,
	});
};

(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/fr_FR/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>