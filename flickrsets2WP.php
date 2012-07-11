<?php
/*
Plugin Name: Flickrsets 2 Wordpress
Description: Gets public sets from a Flickr photostream
Version: 1.0
Author: Pierrick Flajoulot
Author URI: http://www.vezoul.fr/
*/

//Stop direct call here
if(preg_match('#'.basename(__FILE__).'#', $_SERVER['PHP_SELF']))
	die('You are not allowed to call this page directly.');

if(!class_exists('flickrsets2WP')){
	include('functions.php');
	class flickrsets2WP{
		function flickrsets2WP(){
			add_action('admin_init', 'Flickrsets2WPOptions');
			add_action('admin_menu', 'addFlickrsets2WPAdmin');
		}
		
		//Display the sets of the FlickR account passed as parameter - note that you can pass a diffrent flickr acount than the default one
		function flickrsets2wp_display_sets($accountOverride = false){
			//Extract the settings
			extract(get_option('flickrsets2WP_plugin_settings'));
			if($accountOverride)
				$account = $accountOverride;
			//FlickR method to call to gets sets
			$method = 'flickr.photosets.getList';
			//Parameters to add to the method - 'format' parameter is not needed
			$params = array(
				'api_key' => $apikey,
				'method' => $method,
				'user_id' => $account,
				'page' => 1,
				'per_page' => 6
			);
			$url = $this->getURLToCall($params);
			$response = file_get_contents($url);
			$object = unserialize($response);
			//For each set, add the main image source
			if(!strcmp($object['stat'],'ok')){
				if(is_array($object['photosets']['photoset']) && !empty($object['photosets']['photoset'])){
					foreach($object['photosets']['photoset'] as $key=>$set){
						$object['photosets']['photoset'][$key]['main_image_url'] = self::getMainImage($set['primary']);
					}
				}
			}
			
			return $object;
		}
		
		//Format the url with parameters to pass to FlickR API
		private static function getURLToCall($params){
			$params['format'] = 'php_serial';
			$encoded_params = array();
			foreach($params as $k => $v){
				$encoded_params[] = urlencode($k).'='.urlencode($v);
			}
			
			$url = 'http://api.flickr.com/services/rest/?'.implode('&', $encoded_params);
			
			return $url;
		}
		
		//Return the source of the main image of a given set
		private static function getMainImage($photo_id){
			extract(get_option('flickrsets2WP_plugin_settings'));
			$params = array(
				'api_key' => $apikey,
				'method' => 'flickr.photos.getSizes',
				'photo_id' => $photo_id
			);
			$url = self::getURLToCall($params);
			$response = file_get_contents($url);
			$object = unserialize($response);
			$photo_url = '';
			if(!strcmp($object['stat'],'ok')){
				if(is_array($object['sizes']['size']) && !empty($object['sizes']['size'])){
					foreach($object['sizes']['size'] as $image){
						if(!strcmp($image['label'],'Thumbnail'))
							$photo_url = $image['source'];
					}
				}
			}
			return $photo_url;
		}
	}
	
	global $f2WP;
	$f2WP = new flickrsets2WP();
}
?>