<?php
	Theme::charset('utf-8');
	Theme::viewport('width=device-width, initial-scale=1');

	Theme::title();
	Theme::description();

	Theme::favicon('favicon.png');
?>

<!--[if lte IE 8]><script src="<?php echo HTML_PATH_THEME ?>public/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>public/css/main.css">
<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>public/css/ie9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>public/css/ie8.css" /><![endif]-->
<link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>public/css/bludit.css">

<?php

// Add local Fonts Awesome
Theme::fontAwesome();

// Load plugins, hook: Site head
Theme::plugins('siteHead');

?>