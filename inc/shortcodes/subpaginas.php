<?php
	// Shortocode para mostrar as subpáginas em accordion
	
	add_shortcode('subpaginas', 'SubPagesAccordion'); 

	function SubPagesAccordion($atts,$content){
		global $post;

		$subpaginas = new WP_Query('post_type=page&post_parent='.$post->ID);
		
		if($subpaginas->have_posts()):

			$return =   '<section class="franquias">';

				while($subpaginas->have_posts()): $subpaginas->the_post();

					$return .=   '<h4 class="bt_abrir cufon"><span>&bull;</span> '.get_the_title().'</h4>';
					$return .=   '<div class="pane none">';
					$return .=  get_the_content();
					$return .=   '</div>';

				endwhile; wp_reset_postdata();

			$return .=   '</section>';
		
		endif;

		return $return;

	}

?>