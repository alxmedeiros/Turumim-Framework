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
		echo '<link type="text/css" media="screen" rel="stylesheet" href="'.CSS_URL. '/mods.css" charset="utf-8" />';

		wp_enqueue_script('jquery');
	}
}

?>