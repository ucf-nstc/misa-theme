<?php
// Return page cover image url
function page_cover_image($page) {
	global $pages;
	$url;
	$url = HTML_PATH_UPLOADS  
		   . $pages[$page]->vars['coverImage'];
	return $url;
}