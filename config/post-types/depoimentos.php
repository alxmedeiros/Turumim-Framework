<?php
 
function depoimentos_register() {
 
    $labels = array(
        'name' => _x('Depoimentos', 'post type general name'),
        'singular_name' => _x('Depoimento', 'post type singular name'),
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
 	
 	$args = array(
 	   'labels' => $labels,
 	   'public' => true,
 	   'publicly_queryable' => true,
 	   'show_ui' => true, 
 	   'show_in_menu' => true, 
 	   'query_var' => true,
 	   'rewrite' => true,
 	   'capability_type' => 'post',
 	   'has_archive' => true, 
 	   'hierarchical' => false,
 	   'menu_position' => 30,
 	   'menu_icon' => IMG_URL . 'usuario.png',
 	   'supports' => array( 'title', 'editor')
 	 ); 
 	  
    register_post_type( 'depoimento' , $args );
    
}

?>