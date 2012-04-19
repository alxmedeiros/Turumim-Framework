<?php
/**
 * Classe para utilização de elementos de Mídias Sociais
 * @name Social Helper
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

class SocialHelper{

	// ==================================================== Botões

	public function twitterButton($user,$container = null){

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "<".$container['container'];

					foreach($container as $parametro=>$valor){
						if($parametro != "container"):
							echo " ".$parametro."='".$valor."'";
						endif;
					}

				echo ">";

				else:
					echo "<".$container.">";
				endif;

			else:

				echo "<".$container.">";

			endif;

		endif;

		echo '<a href="https://twitter.com/'.$user.'" class="twitter-follow-button" data-show-count="false" data-lang="pt" data-size="large">Seguir @'.$user.'</a>';

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "</".$container['container'].">";
				else:
					echo "</".$container.">";
				endif;

			else:

				echo "</".$container.">";

			endif;

		endif;

		echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

	}

	public function facebookButton($url,$container){

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "<".$container['container'];

					foreach($container as $parametro=>$valor){
						if($parametro != "container"):
							echo " ".$parametro."='".$valor."'";
						endif;
					}

				echo ">";

				else:
					echo "<".$container.">";
				endif;

			else:

				echo "<".$container.">";

			endif;

		endif;

		echo '<iframe id="facebook-button" height="30" src="//www.facebook.com/plugins/like.php?href='.$url.'&amp;send=false&amp;layout=standard&amp;width=65&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=30&amp;appId=130921687038314" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:30px;" allowTransparency="true"></iframe>';

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "</".$container['container'].">";
				else:
					echo "</".$container.">";
				endif;

			else:

				echo "</".$container.">";

			endif;

		endif;

	}

	public function plusButton(){

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "<".$container['container'];

					foreach($container as $parametro=>$valor){
						if($parametro != "container"):
							echo " ".$parametro."='".$valor."'";
						endif;
					}

				echo ">";

				else:
					echo "<".$container.">";
				endif;

			else:

				echo "<".$container.">";

			endif;

		endif;

		echo '<div id="plus-button"><g:plusone annotation="none"></g:plusone></div>';

		if(!empty($container)):

			if(is_array($container)):

				if(!empty($container['container'])):
					echo "</".$container['container'].">";
				else:
					echo "</".$container.">";
				endif;

			else:

				echo "</".$container.">";

			endif;

		endif;

		echo "<script type='text/javascript'>
      window.___gcfg = {lang: 'pt-BR'};

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>";

	}

	// ==================================================== Youtube

	public function YoutubeVideoId($url){
		$ytvIDlen = 11;

		$idStarts = strpos($url, "?v=");
 
		if($idStarts === FALSE)
			$idStarts = strpos($url, "&v=");

		if($idStarts === FALSE)
			die("YouTube video ID not found. Please double-check your URL.");
 
		$idStarts +=3;
 
		$ytvID = substr($url, $idStarts, $ytvIDlen);
 
		return $ytvID;
	}

	public function YoutubeGetId($id){
		return str_replace('http://gdata.youtube.com/feeds/api/videos/','',$id);
	}

	public function YoutubeThumb($videoid,$big = false){
		$thumb = 1;
		if($big == true) $thumb = 0;
		
		echo "<img src='http://img.youtube.com/vi/".$videoid."/".$thumb.".jpg' />";

	}

	public function YoutubeEmbed($videoid, $w, $h){
		echo '<iframe width="'.$w.'" height="'.$h.'" src="http://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
	}

	public function YoutubeTitle($id){
		$url = "http://gdata.youtube.com/feeds/api/videos/".$id;
      	$xml = simplexml_load_file($url);
      
      	echo $xml->title[0];
	}

	public function YoutubeDescription($id){

      $url = "http://gdata.youtube.com/feeds/api/videos/".$id;
      $xml = simplexml_load_file($url);
      
      echo $xml->content[0];

	}

	public function YoutubeVideos($user,$limit = 5){
		$url = "http://gdata.youtube.com/feeds/api/users/".$user."/uploads";
		$feed = simplexml_load_file($url);
		$i = 1;

			foreach($feed->entry as $video):
				if($i<=$limit):
					$videos[] = $this->YoutubeGetId($video->id);
				endif;
				$i++;
			endforeach;

		return $videos;
	}

	// ==================================================== Facebook

	public function LikeBox($page, $w = 292, $h = 350, $border = "#cccccc", $faces = "true", $stream = "false", $header = "false"){

		echo '<div class="fb-like-box" data-href="'.$page.'" data-width="'.$w.'" data-height="'.$h.'" data-show-faces="'.$faces.'" data-border-color="'.$border.'" data-stream="'.$stream.'" data-header="'.$header.'"></div>';

		echo '<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=130921687038314";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>';

	}


}

?>