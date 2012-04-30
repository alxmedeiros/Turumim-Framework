<?php
/**
 * Template Tags para usar no tema Wordpress
 * @name Template Tags
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

// Mostra o título da página no <title>
function show_title(){

	global $page, $paged;

    wp_title( '|', true, 'right' );
    bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Página %s', 'twentyten' ), max( $paged, $page ) );
}

// URL da pasta do tema
function template_url(){
	echo get_bloginfo('template_url');
}

function css_url(){
    echo get_bloginfo('template_url')."/css"; 
}

function js_url(){
    echo get_bloginfo('template_url')."/js"; 
}

function images_url(){
    echo get_bloginfo('template_url')."/images"; 
}

function styles_url(){
    echo get_bloginfo('template_url')."/style.css"; 
}

// URL do site
function siteurl(){
	echo get_bloginfo('url')."/";
}

// Nome do Site
function sitename(){
	echo get_bloginfo('name');
}

// Mostra um menu
function show_menu($menu){
	wp_nav_menu( array('menu' => $menu,'container'=>'false' ));
}

function ano(){
	echo date('Y');
}
