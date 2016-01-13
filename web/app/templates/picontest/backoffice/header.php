<?php
/**
 * Header layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>

	<title><?php echo SITETITLE.' | '.$data['title']; //SITETITLE defined in config file ?></title>

	<!-- CSS -->
	<?php
	Assets::css(array(
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
		'//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
		'//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
		Url::templatePath() . 'backoffice/css/AdminLTE.css',
		Url::templatePath() . 'backoffice/css/skins/skin-blue.css',
	));

	//hook for plugging in css
	$hooks->run('css');
	?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="sidebar-mini skin-blue">
	<div class="wrapper">

	<!-- Main Header -->


<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
