<?php

class LikeBox extends WP_Widget {

	protected $page;
	protected $w;
	protected $h;
	protected $border;
	protected $faces;
	protected $stream;
	protected $header;

	function My_RSS_Widget() {
		//Constructor
	}
	function widget($args, $instance) {
		// prints the widget
	}
	function update($new_instance, $old_instance) {
		//save the widget
	}
	function form($instance) {
		//widgetform in backend
	}
}
register_widget('LikeBox');

?>