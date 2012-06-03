<?php
/**
 * Habilita alguns recursos do Wordpress e insere arquivos necessários no wp_head
 * @name Wordpress Mods
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

register_nav_menus(array('menu' => 'Menu'));
add_theme_support( 'post-thumbnails' );

add_action('wp_head', 'addCSS');
function addCSS(){

	if (!is_admin()) {
		echo '<link type="text/css" media="screen" rel="stylesheet" href="'.TUR_CSS_URL. '/mods.css" charset="utf-8" />';
	}
}

function admin_register_head() {

    echo '<link type="text/css" media="screen" rel="stylesheet" href="'.TUR_CSS_URL. '/admin.css" charset="utf-8" />';
    
}
add_action('admin_head', 'admin_register_head');
add_filter('show_admin_bar', '__return_false'); 

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Notícias';
	$submenu['edit.php'][5][0] = 'Notícias';
	$submenu['edit.php'][10][0] = 'Adicionar Notícia';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Notícias';
	$labels->singular_name = 'Notícia';
	$labels->add_new = 'Adicionar Notícia';
	$labels->add_new_item = 'Adicionar Notícia';
	$labels->edit_item = 'Editar Notícia';
	$labels->new_item = 'Notícia';
	$labels->view_item = 'Visualizar Notícias';
	$labels->search_items = 'Procurar';
	$labels->not_found = 'Nada encontrado';
	$labels->not_found_in_trash = 'Nada encontrado na lixeira';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

global $pagenow;
if ( is_admin() && isset($_GET['activated']) && $pagenow == "themes.php" ) {
	 /* Show theme activation message, and setup them option defaults. */
	add_action( 'admin_notices', 'theme_activated');
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
			$array = explode('-',$filename);
			
			$post_type = $array[0];
			$taxonomy = $array[1];
			
			require($file);
			register_taxonomy($taxonomy, array($post_type), $tax[$taxonomy]);
			
	endif;
	
endforeach;

?>