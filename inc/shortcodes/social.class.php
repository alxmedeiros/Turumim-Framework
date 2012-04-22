<?php
/**
 * Classe para shortcodes exclusivos para Mídias Sociais
 * @name Social shortcodes
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

class SocialShortcodes extends SocialHelper{
	
	public function __construct(){

		// Carrega os shortcodes
		add_shortcode('likebox', array($this, 'LikeBoxSC'));  
		add_shortcode('video', array($this, 'YoutubeVideo'));  

		// Carrega os botões no editor
		add_action('init', array($this,'AddYoutubeButton'));
		add_action('init', array($this,'AddFacebookButton'));

		// TinyMCE Refresh
		add_filter( 'tiny_mce_version', array($this, 'MceRefresh'));
	}

	// ======================================================= Shortcodes

	public function LikeBoxSC($atts,$content){

		return parent::LikeBox($content,$atts['w'],$atts['h'],$atts['border'],$atts['faces'],$atts['stream'],$atts['header'],false);

	}

	public function YoutubeVideo($atts,$content){
		
		$id = parent::YoutubeVideoId($content);
		return parent::YoutubeEmbed($id,$atts['w'],$atts['h'],false);

	}

	// ======================================================= TinyMCE Buttons

	public function AddYoutubeButton(){
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )	return;
   		
   		if ( get_user_option('rich_editing') == 'true'):
     		add_filter('mce_external_plugins', array($this, 'AddYoutubeButtonPlugin'));
     		add_filter('mce_buttons', array($this, 'RegisterYoutubeButton'));
   		endif;

	}

	public function RegisterYoutubeButton($buttons) {
   		array_push($buttons, "|", "turumimvideo");
   		return $buttons;
	}

	public function AddYoutubeButtonPlugin($plugin_array) {
   		$plugin_array['turumimvideo'] = get_bloginfo('template_url').'/turumim/js/YoutubeButton.js';
   		return $plugin_array;
	}

	public function AddFacebookButton(){
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )	return;
   		
   		if ( get_user_option('rich_editing') == 'true'):
     		add_filter('mce_external_plugins', array($this, 'AddFacebookButtonPlugin'));
     		add_filter('mce_buttons', array($this, 'RegisterFacebookButton'));
   		endif;

	}

	public function RegisterFacebookButton($buttons) {
   		array_push($buttons, "|", "turumimlike");
   		return $buttons;
	}

	public function AddFacebookButtonPlugin($plugin_array) {
   		$plugin_array['turumimlike'] = get_bloginfo('template_url').'/turumim/js/FacebookButton.js';
   		return $plugin_array;
	}


	public function MceRefresh($ver){
  		$ver += 3;
  		return $ver;
	}

}

?>