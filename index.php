<!DOCTYPE HTML>
<html>
<head>
<!-- Include HTML meta tags -->
<?php include(THEME_DIR_PHP.'head.php') ?>
<?php include(THEME_DIR_PHP.'functions.php') ?>

</head>

<body>
	<div class="wrapper">

		<!-- Header -->
		<header id="header">
			<h1><a href="<?php echo $Site->url() ?>"><?php echo $Site->title() ?></a></h1>

			<nav class="main">
				<ul>
					<li class="menu"><a class="fa-bars" href="#menu">Menu</a></li>
				</ul>
			</nav>


		</header>

		<!-- Menu -->
		<section id="menu">

			<!-- Links -->
			<section>
				<ul class="links">
				<?php
					foreach($parents as $page) {
						echo '<li>';
						echo '<a href="'.$page->permalink().'">
							<h3>'.$page->title().'</h3>
							<p>'.$page->description().'</p>
						</a>';
						echo '</li>';
					}
				?>
				</ul>
			</section>

			<!-- Actions -->
		</section>
	</div>

	<!-- Three -->
	<?php if ($Url->whereAmI() == 'home'): ?>
			<section class="three">
				<div class="" style="background-image:url('<?php echo page_cover_image('about')?>')">
					<h2>About the Center</h2>
					<p>This is the center for Misa</p>
				</div>
				<div class="" style="background-image:url('<?php echo page_cover_image('canker')?>')">
					<h2>The Canker Problem</h2>
					<p>Learn more about the Canker problem</p>
				</div>
				<div class="" style="background-image:url('<?php echo page_cover_image('hlb')?>')">
					<h2>The HLB Problem</h2>
					<p>Learn more about the HLB problem</p>
				</div>
			</section>
	<?php endif; ?>

	<div class="wrapper">

		<!-- Main -->
		<div id="main">
		<?php
			if( ($Url->whereAmI()=='home') || ($Url->whereAmI()=='tag') || ($Url->whereAmI()=='blog') ) {
				include(THEME_DIR_PHP.'home.php');
			}
			elseif($Url->whereAmI()=='post') {
				include(THEME_DIR_PHP.'post.php');
			}
			elseif($Url->whereAmI()=='page') {
				include(THEME_DIR_PHP.'page.php');
			}
		?>
		</div>

		<!-- Sidebar -->
		<section id="sidebar">
		<?php
			include(THEME_DIR_PHP.'sidebar.php');
		?>
		</section>

	</div>

	<!-- Scripts -->
	<?php
		// Local jQuery
		Theme::jquery();
	?>

	<script src="<?php echo HTML_PATH_THEME ?>public/js/skel.min.js"></script>
	<script src="<?php echo HTML_PATH_THEME ?>public/js/util.js"></script>
	<!--[if lte IE 8]><script src="<?php echo HTML_PATH_THEME ?>public/js/ie/respond.min.js"></script><![endif]-->
	<script src="<?php echo HTML_PATH_THEME ?>public/js/main.js"></script>

	<?php
		// Plugins, site body end
		Theme::plugins('siteBodyEnd');
	?>

</body>
</html>