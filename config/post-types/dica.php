<?php
 
    $labels = array(
        'name' => _x('Dicas', 'post type general name'),
        'singular_name' => _x('Dica', 'post type singular name'),
        'add_new' => _x('Cadastrar nova', 'edital item'),
        'add_new_item' => __('Cadastrar nova'),
        'edit_item' => __('Editar'),
        'new_item' => __('Cadastrar nova'),
        'view_item' => __('Visualizar'),
        'search_items' => __('Procurar'),
        'not_found' =>  __('Nada encontrado'),
        'not_found_in_trash' => __('Nada enontrado na lixeira'),
        'parent_item_colon' => ''
    );
 	
 	$type['dica'] = array(
 	   'labels' => $labels,
 	   'public' => true,
 	   'publicly_queryable' => true,
 	   'show_ui' => true, 
 	   'show_in_menu' => true, 
 	   'query_var' => true,
 	   'rewrite' => array('slug'=>'dicas','with_front'=>true),
 	   'capability_type' => 'post',
 	   'has_archive' => true, 
 	   'hierarchical' => false,
 	   'menu_position' => 5,
 	   'menu_icon' => IMAGES_URL . 'dicas.png',
 	   'supports' => array( 'title', 'editor')
 	 ); 

?>