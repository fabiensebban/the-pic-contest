<?php
/**
 * Main Header layout
 */

use Helpers\Url;

?>

<header class="main-header">
	<!-- Logo -->
	<a href="/" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><img src="<?php echo PUBLIC_DIR; ?>img/picontest_logo.png" height="30" alt="Picontest Logo"></span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><img src="<?php echo PUBLIC_DIR; ?>img/picontest_logo.png" height="30" alt="Picontest Logo"><b>PiC</b>ONTEST</span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
	  <!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	    	<span class="sr-onlys"></span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Logout btn -->
				<li class="dropdown user user-menu">
				<!-- Menu Toggle Button -->
				<a href="/logout">
				  <!-- The user image in the navbar-->
				  <img src="<?php echo PUBLIC_DIR; ?>img/avatar5.png" class="user-image" alt="User Image">
				  <!-- hidden-xs hides the logout txt on small devices so only the image appears. -->
				  <span class="hidden-xs"><?php echo $data['logout']; ?> </span><span> <i class="fa fa-power-off"></i></span>
				</a>
				</li>
			</ul>
		</div>
  	</nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo PUBLIC_DIR; ?>img/avatar5.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>U'ness Moumou</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">MENU PRINCIPAL</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="#"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
    <li><a href="#"><i class="fa ion-images"></i> <span>Contests</span><small class="label pull-right bg-red">3</small></a></li>
    <li><a href="#"><i class="fa ion-android-person"></i> <span>Profil</span></a></li>
    <li><a href="#"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="#">Link in level 2</a></li>
        <li><a href="#">Link in level 2</a></li>
      </ul>
    </li>
  </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">