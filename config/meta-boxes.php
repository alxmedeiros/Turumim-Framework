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
<<<<<<< HEAD
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
=======
	'id'		=> 'medicodetail',
	'title'		=> 'Um pouco sobre o médico',
	'pages'		=> array( 'medico'),
	'fields'	=> array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'id'	=> "{$prefix}sobre",
			'type'	=> 'wysiwyg',
		),
	)
);

$meta_boxes[] = array(
	'id'		=> 'medicodetail2',
	'title'		=> 'Diagnósticos',
	'pages'		=> array( 'medico'),
	'context' => 'side', 
	'priority' => 'low',
	'fields'	=> array(
		array(
			'id'	=> "{$prefix}diagnosticos",
			'type'	=> 'checkbox_list',
			'options' => $diagnosticos
>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237
		),
	)
);

// 2nd meta box
<<<<<<< HEAD
/*$meta_boxes[] = array(
=======
$meta_boxes[] = array(
>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237
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
<<<<<<< HEAD
);*/
=======
);

// 2nd meta box
$meta_boxes[] = array(
	'id'		=> 'diagnosticodetail2',
	'title'		=> 'Prodecimentos e Preparativos',
	'pages'		=> array( 'diagnostico'),

	'fields'	=> array(
		array(
			'id'	=> "{$prefix}procedimentos",
			'type'	=> 'wysiwyg',
		),
	)
);

$meta_boxes[] = array(
	'id'		=> 'slidedetail2',
	'title'		=> 'Detalhes do slide',
	'pages'		=> array( 'slide'),
	'fields'	=> array(
		array(
			'name'	=> "Palavra em destaque",
			'id'	=> "{$prefix}palavradestaque",
			'type'	=> 'text',
			'desc'	=> 'Indique a palavra contida no título para realçar no destaque'
		),
		array(
			'name'	=> 'Texto descritivo',
			'id'	=> "{$prefix}descritivo",
			'type'	=> 'textarea',
		),
		array(
			'name'	=> 'Imagem em destaque',
			'id'	=> "{$prefix}imgdestaque",
			'type'	=> 'image',
		),

	)
);

$meta_boxes[] = array(
	'id'		=> 'slidedetail3',
	'title'		=> 'Link no slide',
	'pages'		=> array( 'slide'),
	'context' => 'side', 
	'priority' => 'low',
	'fields'	=> array(
		array(
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

$meta_boxes[] = array(
	'id'		=> 'slidedetail4',
	'title'		=> 'Background',
	'pages'		=> array( 'slide'),

	'fields'	=> array(
		array(
			'name'	=> 'Cor de background ',
			'id'	=> "{$prefix}cor",
			'type'	=> 'color',
		),
		array(
			'name'	=> 'Imagem de background',
			'id'	=> "{$prefix}imgbg",
			'type'	=> 'image',
		),

	)
);

// 2nd meta box
$meta_boxes[] = array(
	'id'		=> 'postdetail1',
	'title'		=> 'Resumo da página inicial',
	'pages'		=> array( 'post'),

	'fields'	=> array(
		array(
			'id'	=> "{$prefix}resumo",
			'type'	=> 'wysiwyg',
		),
	)
);
		
		
$meta_boxes[] = array(
	'id'		=> 'parceirodetail',
	'title'		=> 'Link',
	'pages'		=> array( 'parceiro'),
	'fields'	=> array(
		array(
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


$meta_boxes[] = array(
	'id'		=> 'unidadedetail',
	'title'		=> 'Informações adicionais',
	'pages'		=> array( 'unidade'),
	'fields'	=> array(
		array(
			'name'	=> 'Rua / Número',
			'id'	=> "{$prefix}rua",
			'type'	=> 'text',
		),
		array(
			'name'	=> 'Bairro / Cidade',
			'id'	=> "{$prefix}bairro",
			'type'	=> 'text',
		),

	)
);

>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237



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