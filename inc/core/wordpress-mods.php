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

?>