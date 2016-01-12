<?php
/**
 * Footer layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>
		</div><!-- /content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs"><b>Version</b> 0.0.1 </div>
			<strong>Copyright &copy; 2015 <a href="http://uness.com">Picontest</a>.</strong> All rights reserved.
		</footer>
	</div><!-- /wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
<?php
	Assets::js(array(
		Url::templatePath() . 'js/jquery.js',
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
		Url::templatePath() . 'js/app.js'
	));

//hook for plugging in javascript
$hooks->run('js');

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
