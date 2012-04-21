<?php

/**
 * Framework para agilizar o desenvolvimento de temas para o Wordpress
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

/* Constantes */
define(FEELSEN_URL, get_bloginfo('template_url')."/turumim/");
define(THEME_URL, get_bloginfo('template_url'));
define(IMAGES_URL, get_bloginfo('template_url')."/images/");
define(CSS_URL, FEELSEN_URL."css/");
define(JS_URL, FEELSEN_URL."js/");

function require_folder($folder){

	$folder = get_template_directory()."/turumim/".$folder;
    foreach (glob("{$folder}/*.php") as $filename):
		require $filename;
    endforeach;

}

/* Requires */
require_folder("inc");
require_folder("core/helpers");
require_folder("core/shortcodes");
require_folder("core/widgets");
require_folder("plugins");


/* Inicia os Helpers */
$html = new HtmlHelper();
$form = new FormHelper();
$social = new SocialHelper();

/* Inicia os Shortcodes */
$socialsh = new SocialShortcodes();

?>