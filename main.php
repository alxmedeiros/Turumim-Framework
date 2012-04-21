<?php

/**
 * Framework para agilizar o desenvolvimento de temas para o Wordpress
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

/* Constantes */
define(FEELSEN_URL,get_bloginfo('template_url')."/turumim/");
define(THEME_URL,get_bloginfo('template_url'));
define(IMAGES_URL,get_bloginfo('template_url')."/images/");
define(CSS_URL,FEELSEN_URL."css/");
define(JS_URL,FEELSEN_URL."js/");

function include_all_php($folder){

	$folder = get_template_directory()."/turumim/".$folder;
    foreach (glob("{$folder}/*.php") as $filename):
		require $filename;
    endforeach;
    
}

/* Requires */
include_all_php("inc");
include_all_php("core/helpers");
include_all_php("core/shortcodes");
include_all_php("core/widgets");
include_all_php("plugins");


/* Inicia os Helpers */
$html = new HtmlHelper();
$form = new FormHelper();
$social = new SocialHelper();

/* Inicia os Shortcodes */$socialsh = new SocialShortcodes();

?>