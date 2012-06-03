<?php
 
    $diagnostico_labels = array(
        'name' => _x('Exames e Diagnósticos', 'post type general name'),
        'singular_name' => _x('Exame ou Diagnóstico', 'post type singular name'),
        'add_new' => _x('Cadastrar novo', 'edital item'),
        'add_new_item' => __('Cadastrar novo'),
        'edit_item' => __('Editar'),
        'new_item' => __('Cadastrar novo'),
        'view_item' => __('Visualizar'),
        'search_items' => __('Procurar'),
        'not_found' =>  __('Nada encontrado'),
        'not_found_in_trash' => __('Nada enontrado na lixeira'),
        'parent_item_colon' => ''
    );
 	
 	$type['diagnostico'] = array(
 	   'labels' => $diagnostico_labels,
 	   'public' => true,
 	   'publicly_queryable' => true,
 	   'show_ui' => true, 
 	   'show_in_menu' => true, 
 	   'query_var' => true,
		'rewrite' => array('slug'=>'diagnosticos','with_front'=>true),
 	   'capability_type' => 'post',
 	   'has_archive' => true, 
 	   'hierarchical' => false,
 	   'menu_position' => 5,
 	   'menu_icon' => IMAGES_URL . 'diagnostico.gif',
 	   'supports' => array( 'title')
 	 ); 


?>