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
		add_shortcode('likebox', array($this, 'LikeBoxSC'));  
		add_shortcode('video', array($this, 'YoutubeVideo'));  

	}

	public function LikeBoxSC($atts,$content){

		return parent::LikeBox($content,$atts['w'],$atts['h'],$atts['border'],$atts['faces'],$atts['stream'],$atts['header'],false);

	}

	public function YoutubeVideo($atts,$content){
		
		return parent::YoutubeEmbed($content,$atts['w'],$atts['h'],false);

	}
}

 ?>