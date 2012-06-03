<?php

class LikeBox_Widget extends WP_Widget {

	function LikeBox_Widget() {
		$widget_ops = array('classname' => 'widget_fblike', 'description' => 'Uma likebox para os visistantes curtirem a sua página no Facebook' );
		$this->WP_Widget('likebox', 'Facebook Like Box', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		
		$page = $instance['page'];
		$w = $instance['w'];
		$h = $instance['h'];
		$border = $instance['border'];
		$faces = $instance['faces'];
		$stream = $instance['stream'];
		$header = $instance['header'];
		
		$facebook = new SocialHelper();
		$facebook->LikeBox($page,$w,$h,$border,$faces,$stream,$header);
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['page'] = strip_tags($new_instance['page']);
		$instance['w'] = strip_tags($new_instance['w']);
		$instance['h'] = strip_tags($new_instance['h']);
		$instance['border'] = strip_tags($new_instance['border']);
		$instance['faces'] = $new_instance['faces'];
		$instance['stream'] = $new_instance['stream'];
		$instance['header'] = $new_instance['header'];
		
		return $instance;
	}

	function form($instance) {
		
		$instance = wp_parse_args( (array) $instance, array( 
			'page' => '', 
			'w' => '', 
			'h' => '',
			'border' => '',
			'faces' => '',
			'stream' => '',
			'header' => '', 
		));
		
		$page = strip_tags($instance['page']);
		$w = strip_tags($instance['w']);
		$h = strip_tags($instance['h']);
		$border = strip_tags($instance['border']);
		$faces = strip_tags($instance['faces']);
		$stream = strip_tags($instance['stream']);
		$header = strip_tags($instance['header']);
		
		?>
			<p><label for="<?php echo $this->get_field_id('page'); ?>">URL da Página: <input class="widefat" id="<?php echo $this->get_field_id('page'); ?>" name="<?php echo $this->get_field_name('page'); ?>" type="text" value="<?php echo attribute_escape($page); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('w'); ?>">Largura: <input class="widefat" id="<?php echo $this->get_field_id('w'); ?>" name="<?php echo $this->get_field_name('w'); ?>" type="text" value="<?php echo attribute_escape($w); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('h'); ?>">Altura: <input class="widefat" id="<?php echo $this->get_field_id('h'); ?>" name="<?php echo $this->get_field_name('h'); ?>" type="text" value="<?php echo attribute_escape($h); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('h'); ?>">Cor da borda: <input class="widefat" id="<?php echo $this->get_field_id('border'); ?>" name="<?php echo $this->get_field_name('border'); ?>" type="text" value="<?php echo attribute_escape($border); ?>" /></label></p>
			<p><input <?php if(attribute_escape($faces)=="true") echo "checked='checked'"; ?> type="checkbox" name="<?php echo $this->get_field_name('faces'); ?>" id="<?php echo $this->get_field_id('faces'); ?>" value="true"/> Mostrar rostos?<label></p>
			<p><input <?php if(attribute_escape($stream)=="true") echo "checked='checked'"; ?> type="checkbox" name="<?php echo $this->get_field_name('stream'); ?>" id="<?php echo $this->get_field_id('stream'); ?>" value="true"/> Mostrar stream?<label></p>
			<p><input <?php if(attribute_escape($header)=="true") echo "checked='checked'"; ?> type="checkbox" name="<?php echo $this->get_field_name('header'); ?>" id="<?php echo $this->get_field_id('header'); ?>" value="true"/> Mostrar cabeçalho?<label></p>
			
		<?php

	}

}

register_widget('LikeBox_Widget');

?>