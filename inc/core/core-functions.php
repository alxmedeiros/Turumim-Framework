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
		return ereg_replace( "\n", "<br />", $data[$name]);
	endif;
	
}

function page_option($name){
	echo get_page_option($name);
}

function meta($meta){
	global $post;
	echo get_post_meta($post->ID, $meta, true);
}

function get_meta($meta){
	global $post;
	return get_post_meta($post->ID, $meta, true);
}

function remove_admin_menu($name){

	global $restricted;

	$restricted[] = __($name);
}

function remove_menus () {
global $menu;
global $restricted;
	
	if(!empty($restricted)):
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
	endif;
	
}
add_action('admin_menu', 'remove_menus');

function tur_get_terms($taxonomy, $parent = 0){

	global $wpdb;

	$results = $wpdb->get_results("SELECT ".$wpdb->prefix."terms.term_id, 
		".$wpdb->prefix."terms.`name`,
		".$wpdb->prefix."terms.`slug`
		FROM ".$wpdb->prefix."terms INNER JOIN ".$wpdb->prefix."term_taxonomy ON ".$wpdb->prefix."terms.term_id = ".$wpdb->prefix."term_taxonomy.term_id 
		WHERE taxonomy = '".$taxonomy."' AND parent = ".$parent);

	return $results;

}

function page_exists($slug){

	$i = 0;
	
	for($z=0;$z<=100; $z++):
		
		if($z==0):
			query_posts('pagename='.$slug);
		else:
			query_posts('pagename='.$slug.'-'.$z);
		endif;
		
		while(have_posts()): the_post();
		 	$i++;
		endwhile; wp_reset_query();
		
	endfor;
	
	if($i==0):
		return false;
	else:
		return true;
	endif;

}

function add_page($name, $slug, $content, $parent = 0){

	$page = array(
	  'post_author' => 1,
	  'post_date' => date('Y-m-d H:i:s'),
	  'post_date_gmt' => date('Y-m-d H:i:s'),
	  'post_name' => $slug,
	  'post_status' => 'publish', 
	  'post_parent' => $parent,
	  'post_title' => $name,
  	  'post_content' => $content,
	  'post_type' => 'page',
	); 
	
	$id = wp_insert_post($page);
	
	return $id;

}

// ================================================== Post Types

$folder = get_template_directory()."/turumim/config/post-types";

foreach (glob("{$folder}/*.php") as $file):
	
	if(strpos($file, '.php')):	

			$filename = str_replace($folder."/","",$file);
			$post_type = str_replace('.php','',$filename);
			
			require($file);
			register_post_type( $post_type , $type[$post_type] );
			
	endif;
	
endforeach;

// ================================================== Taxonomies

$folder = get_template_directory()."/turumim/config/post-types/taxonomies";

foreach (glob("{$folder}/*.php") as $file):
	
	if(strpos($file, '.php')):	

			$filename = str_replace($folder."/","",$file);
			$filename = str_replace('.php','',$filename);
			$array = explode('.',$filename);
			
			$post_type = $array[0];
			$taxonomy = $array[1];
			
			require($file);
			register_taxonomy($taxonomy."_".$post_type, array($post_type), $tax[$taxonomy]);
			
	endif;
	
endforeach;

function turumim_register_meta_boxes(){
	global $turumim_meta_boxes;
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $turumim_meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
add_action( 'admin_init', 'turumim_register_meta_boxes' );

?>