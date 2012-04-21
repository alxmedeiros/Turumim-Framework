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

/* Includes */
require('inc/core-functions.php');
require('inc/wordpress-mods.php');
require('inc/template-tags.php');

/* Helpers */
require('core/helpers/html.class.php');
require('core/helpers/form.class.php');
require('core/helpers/social.class.php');

/* Shortcodes */
require('core/shortcodes/social.class.php');
/* Widgets */

/* Plugins */
require('plugins/contact-form.class.php');

/* Inicia os Helpers */
$html = new HtmlHelper();
$form = new FormHelper();
$social = new SocialHelper();

/* Inicia os Shortcodes */
$socialsh = new SocialShortcodes();

?>