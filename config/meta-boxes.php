<?php

$prefix = '';

global $turumim_meta_boxes;

$turumim_meta_boxes = array();

$turumim_meta_boxes[] = array(
	'id'		=> 'destaque_detail',
	'title'		=> 'Detalhes do destaque',
	'pages'		=> array( 'destaque'),
	'fields'	=> array(
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name'	=> "Link",
			'id'	=> "{$prefix}link",
			'type'	=> 'text',
		),
		array(
			'name'	=> "Abrir em nova janela?",
			'id'	=> "{$prefix}target",
			'type'	=> 'checkbox',
		),
	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'aniversariante_detail',
	'title'		=> 'Dados do Aniversariante',
	'pages'		=> array( 'aniversariante'),
	'context' => 'side', 
	'priority' => 'low',
	'fields'	=> array(
		array(
			'name' 	=> "Raça",
			'id'	=> "{$prefix}raca",
			'type'	=> 'text',
		),
		array(
			'name' 	=> "Data de nascimento",
			'id'	=> "{$prefix}datanasc",
			'type'	=> 'date',
		),
		array(
			'name' 	=> "Dono",
			'id'	=> "{$prefix}dono",
			'type'	=> 'text',
		),
		array(
			'name' 	=> "Adestrador",
			'id'	=> "{$prefix}adestrador",
			'type'	=> 'text',
		),
	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'equipe_detail',
	'title'		=> 'Dados adicionais',
	'pages'		=> array( 'equipe'),

	'fields'	=> array(
		array(
			'name' 	=> "Cargo",
			'id'	=> "{$prefix}cargo",
			'type'	=> 'text',
		),
		array(
			'name' 	=> "Localização",
			'id'	=> "{$prefix}localizacao",
			'type'	=> 'text',
		),
	)
);

// 2nd meta box
$turumim_meta_boxes[] = array(
	'id'		=> 'parceiro_detail',
	'title'		=> 'Site do Parceiro',
	'pages'		=> array( 'parceiro'),

	'fields'	=> array(
		array(
			'id'	=> "{$prefix}site",
			'type'	=> 'text',
		),
	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'evento_detail',
	'title'		=> 'Detalhes do Evento',
	'pages'		=> array( 'evento'),
	'fields'	=> array(
		array(
			'name'	=> "Data",
			'id'	=> "{$prefix}data",
			'type'	=> 'date',			
		),
		array(
			'name'	=> 'Localização',
			'id'	=> "{$prefix}descritivo",
			'type'	=> 'text',
		),
		array(
			'name'	=> 'Fotos',
			'id'	=> "{$prefix}fotos",
			'type'	=> 'plupload_image',
			'multiple' => true,
		),

	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'audio_detail',
	'title'		=> 'Enviar aquivo .mp3',
	'pages'		=> array( 'audio'),
	'fields'	=> array(
		array(
			'id'	=> "{$prefix}mp3",
			'type'	=> 'file',

		),
	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'video_detail',
	'title'		=> 'Endereço do vídeo no Youtube',
	'pages'		=> array( 'video'),

	'fields'	=> array(
		array(
			'id'	=> "{$prefix}videourl",
			'type'	=> 'text',
		),
	)
);

$turumim_meta_boxes[] = array(
	'id'		=> 'publicacao_detail',
	'title'		=> 'Informações Adicionais',
	'pages'		=> array( 'publicacao'),

	'fields'	=> array(
		array(
			'name'	=>	"Autores",
			'id'	=> "{$prefix}autores",
			'type'	=> 'text',
		),
		array(
			'name'	=>	"Editora",
			'id'	=> "{$prefix}editora",
			'type'	=> 'text',
		),
		array(
			'name'	=>	"Depoimentos",
			'id'	=> "{$prefix}depoimentos",
			'type'	=> 'wysiwyg',
		),
		array(
			'name'	=>	"Onde encontrar",
			'id'	=> "{$prefix}ondeencontrar",
			'type'	=> 'wysiwyg',
		),
	)
);		
