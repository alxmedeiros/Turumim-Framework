<?php

/**
 * Framework para agilizar o desenvolvimento de temas para o Wordpress
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

/* Constantes */
define(TURUMIM_URL, get_bloginfo('template_url')."/turumim/");
define(THEME_URL, get_bloginfo('template_url'));
<<<<<<< HEAD
define(IMAGES_URL, get_bloginfo('template_url')."/images/");
=======
define(IMAGES_URL, get_bloginfo('template_url')."/imagens/");
>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237
define(IMG_URL, TURUMIM_URL."inc/core/img/");
define(CSS_URL, THEME_URL."/css/");
define(TUR_CSS_URL, TURUMIM_URL."inc/core/css/");
define(TUR_JS_URL, TURUMIM_URL."inc/core/js/");
define(JS_URL, THEME_URL."/js/");

<<<<<<< HEAD
if(!function_exists('require_folder')):
	function require_folder($folder){

		$folder = get_template_directory()."/turumim/".$folder;
	    foreach (glob("{$folder}/*.php") as $filename):
			require $filename;
	    endforeach;

	}
endif;
=======
function require_folder($folder){

	$folder = get_template_directory()."/turumim/".$folder;
    foreach (glob("{$folder}/*.php") as $filename):
		require $filename;
    endforeach;

}
>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237

function require_($file){
	require get_template_directory()."/turumim/".$file;
}

/* Requires */
require_folder("inc/core");
require_folder("inc/classes");
require_folder("inc/helpers");
require_folder("inc/shortcodes");
require_folder("inc/widgets");
require_folder("components");
require_folder("config/post-types");
require_folder("config/post-types/taxonomies");

/* Classes com mais de um arquivo */
require_folder("inc/classes/meta-box");
require_("inc/classes/phpflickr/phpFlickr.php");


/* Configurações */
require_folder("config");


/* Inicia os Helpers */
$html = new HtmlHelper();
$form = new FormHelper();
$social = new SocialHelper();

/* Inicia os Shortcodes */
$socialsh = new SocialShortcodes();

?>