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
		
		$fid = get_page_option('flickrid');
		$fkey = get_page_option('flickrapikey');

		// Carrega os shortcodes
		add_shortcode('likebox', array($this, 'LikeBoxSC'));  
		add_shortcode('video', array($this, 'YoutubeVideo'));  
		
		if(!empty($fid) && !empty($fkey)) add_shortcode('flickralbum', array($this, 'FlickrGaleria'));  

		// Carrega os botões no editor
		add_action('init', array($this,'AddYoutubeButton'));
		add_action('init', array($this,'AddFacebookButton'));

		if(!empty($fid) && !empty($fkey)) add_action('init', array($this,'AddFlickrButton'));		

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
	
	public function FlickrGaleria($atts,$content){
		global $post;
		$fotos = parent::FlickrPhotoset($content);
		
		echo "<div class='flickr-album'>";
		
		foreach($fotos as $foto):
			
			echo "<a rel='lightbox[galeria-".$post->ID."]' title='".$foto['title']."' class='flickrimg' href='".$foto['link']."'>";
			echo "<img src='".$foto['thumb']."' alt='".$foto['title']."' />";
			echo "</a>";
			
		endforeach;
		
		echo "</div>";
	
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
   		$plugin_array['turumimvideo'] = TUR_JS_URL.'YoutubeButton.js';
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
   		$plugin_array['turumimlike'] = TUR_JS_URL.'FacebookButton.js';
   		return $plugin_array;
	}
	
	public function AddFlickrButton(){
			
			if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )	return;
	   		
	   		if ( get_user_option('rich_editing') == 'true'):
	     		add_filter('mce_external_plugins', array($this, 'AddFlickrButtonPlugin'));
	     		add_filter('mce_buttons', array($this, 'RegisterFlickrButton'));
	   		endif;
	
	}
	
	public function RegisterFlickrButton($buttons) {
	   		array_push($buttons, "|", "turumimflickr");
	   		return $buttons;
	}
	
	public function AddFlickrButtonPlugin($plugin_array) {
	   		$plugin_array['turumimflickr'] = TUR_JS_URL.'FlickrButton.js';
	   		return $plugin_array;
	}

	public function MceRefresh($ver){
  		$ver += 3;
  		return $ver;
	}

}

?>