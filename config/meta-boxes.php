<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '';

global $meta_boxes;

$meta_boxes = array();

query_posts('post_type=diagnostico&posts_per_page=-1');
while(have_posts()): the_post(); 
	$diagnosticos[get_the_ID()] = get_the_title(); 
endwhile; wp_reset_query();

// 2nd meta box
$meta_boxes[] = array(
	'id'		=> 'postdetail',
	'title'		=> 'Detalhes do post',
	'pages'		=> array( 'post'),
	'fields'	=> array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name'	=> "Destaque?",
			'id'	=> "{$prefix}destaque",
			'type'	=> 'checkbox',
		),
		array(
			'name'	=> "Subtítulo",
			'id'	=> "{$prefix}subtitulo",
			'type'	=> 'text',
		),
	)
);

// 2nd meta box
/*$meta_boxes[] = array(
	'id'		=> 'diagnosticodetail',
	'title'		=> 'Descrição',
	'pages'		=> array( 'diagnostico'),

	'fields'	=> array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'id'	=> "{$prefix}descricao",
			'type'	=> 'wysiwyg',
		),
	)
);*/



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );