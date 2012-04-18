<?php
/**
 * Classe para inserir conteúdo dentro do <head> de templates Wordpress
 * @name Head Helper
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

class HtmlHelper{

	// Tags Gerais ========================================================================
	public function charset($charset){
		echo "<meta charset='".$charset."'>\n";
	}
	public function meta($name,$content){
		echo "<meta name='".$name."' content='".$content."'>\n";
	}

	public function title(){
		echo "<title>";
		show_title();
		echo "</title>";
	}

	public function favicon(){
		echo "<link rel='shortcut icon' href='".IMAGES_URL."/favicon.ico'>\n";
	}

	public function touchicon(){
		echo "<link rel='apple-touch-icon' href='".IMAGES_URL."/touch-logo.png'>\n";
	}

	// CSS ===============================================================================
	public function css960($cols = null){

		echo "<link rel='stylesheet' media='all' href='".CSS_URL."reset.css'>\n";
		echo "<link rel='stylesheet' media='all' href='".CSS_URL."text.css'>\n";
		echo "<link rel='stylesheet' media='all' href='".CSS_URL."960.css'>\n";

		if(!empty($cols))
		echo "<link rel='stylesheet' media='all' href='".CSS_URL."960_".$cols."_col.css'>\n";

	}

	public function basecss(){
		echo "<link rel='stylesheet' media='all' href='".THEME_URL."/style.css'>\n";
	}

	public function css($name){
		if(strpos($name,'http://')):
			echo "<link rel='stylesheet' media='all' href='".CSS_URL.$name.".css'>\n";
		else:
			echo "<link rel='stylesheet' media='all' href='".$name."' />\n";
		endif;
	}

	public function ie_css($version,$name){
		echo "<!--[if lt IE ".$version."]>";

    	if(strpos($name,'http://')):
			echo "<link rel='stylesheet' media='all' href='".CSS_URL.$name.".css'>\n";
		else:
			echo "<link rel='stylesheet' media='all' href='".$name."'>\n";
		endif;

    	echo "<![endif]-->";
	}

	// Javascript =======================================================================
	public function javascript($name){
		if(strpos($name,'http://')):
			echo "<script type='text/javascript' src='".$name."'></script>\n";
		else:
			echo "<script type='text/javascript' src='".JS_URL.$name.".js'></script>\n";
		endif;
	}

	public function ie_javascript($version,$name){
		echo "<!--[if lt IE ".$version."]>\n";
		
		if(strpos($name,'http://')):
			echo "<script type='text/javascript' src='".$name."'></script>\n";
		else:
			echo "<script type='text/javascript' src='".JS_URL.$name.".js'></script>\n";
		endif;

    	echo "<![endif]-->\n";
	}

}

?>