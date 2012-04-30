<?php
/**
 * Funções o core do Turumim
 * @name Core Functions
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

function debug($a){
	echo "<pre>";
	var_dump($a);
	echo "</pre>";
}

function get_page_option($name){

	$data = get_option('demo_options');
	
	if(is_array($data[$name]) && !empty($data[$name]['src'])):
		return $data[$name]['id'];
	else:
		return $data[$name];
	endif;
	
}

function meta($meta){
	global $post;
	echo get_post_meta($post->ID, $meta, true);
}

function get_meta($meta){
	global $post;
	return get_post_meta($post->ID, $meta, true);
}

?>