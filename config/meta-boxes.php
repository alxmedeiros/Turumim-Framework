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


// 2nd meta box
$meta_boxes[] = array(
	'id'		=> 'pagedetail',
	'title'		=> 'Página Inicial',
	'pages'		=> array( 'page'),

	'fields'	=> array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name'	=> 'Resumo',
			'id'	=> "{$prefix}resumofront",
			'type'	=> 'wysiwyg',
			'desc'	=> 'Insira um resumo caso a página esteja marcada para aparecer na página principal'
		),
	)
);

$meta_boxes[] = array(
	'id'		=> 'slidedetail',
	'title'		=> 'Informações Adicionais',
	'pages'		=> array( 'slide'),

	'fields'	=> array(
		array(
			'name'	=> 'Link no slide',
			'id'	=> "{$prefix}link",
			'type'	=> 'text',
			'desc'	=> 'Deixe vazio para não mostrar nenhum link'
		),
		array(
			'name'	=> 'Abrir em nova aba? ',
			'id'	=> "{$prefix}blank",
			'type'	=> 'checkbox',
		),
	)
);




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