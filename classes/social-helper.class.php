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

}

?>