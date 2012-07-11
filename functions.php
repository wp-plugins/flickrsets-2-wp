<?php
//Stop direct call here
if(preg_match('#'.basename(__FILE__).'#', $_SERVER['PHP_SELF']))
	die('You are not allowed to call this page directly.');

//Include the admin menu file
function adminMenu(){
	include('flickrsets2WPAdmin.php');
}

//Store the plugin settings
function Flickrsets2WPOptions() {
	register_setting('flickrsets2WP-plugin-settings', 'flickrsets2WP_plugin_settings');
}

//Get the style sheet for the admin page
function Flickrsets2WPCSS(){
	$siteurl = get_option('siteurl');
	$url = $siteurl.'/wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/flickrsets2WP.css';
	echo '<link href='.$url.' rel="stylesheet" type="text/css" />';
}

//Add admin page to the Settings menu
function addFlickrsets2WPAdmin(){
	$hook = add_options_page('Flickrsets2WP Options',
		'Flickrsets2WP Options',
		'administrator',
		'flickrsets2wp-options',
		'adminMenu'
	);
	//Hook to call the CSS only on the plugin admin page - prevent from conflicts
	add_action("admin_head-{$hook}", 'Flickrsets2WPCSS');
}
?>