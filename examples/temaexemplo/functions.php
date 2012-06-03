<?php

require('turumim/main.php');

// Sidebar
$args = array(
	'name'          => 'sidebar',
	'id'            => 'sidebar-$i',
	'description'   => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' ); 

// Menu Rodapé
register_nav_menus(array('menu_inst' => 'Menu Institucional'));

?>