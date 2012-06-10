<?php
/**
 * Template Tags para usar no tema Wordpress
 * @name Template Tags
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

// Mostra o título da página no <title>
function show_title(){

    global $page, $paged;

    wp_title( '|', true, 'right' );
    bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Página %s', 'twentyten' ), max( $paged, $page ) );
}

// URL da pasta do tema
function template_url(){
    echo get_bloginfo('template_url');
}

function css_url(){
    echo get_bloginfo('template_url')."/css"; 
}

function js_url(){
    echo get_bloginfo('template_url')."/js"; 
}

function images_url(){
    echo get_bloginfo('template_url')."/images"; 
}

function styles_url(){
    echo get_bloginfo('template_url')."/style.css"; 
}

// URL do site
function siteurl(){
    echo get_bloginfo('url')."/";
}

function get_siteurl(){
    return get_bloginfo('url')."/";
}

// Nome do Site
function sitename(){
    echo get_bloginfo('name');
}

function sitedescription(){
    echo get_bloginfo('description');
}

// Mostra um menu
function show_menu($menu){
    wp_nav_menu( array('menu' => $menu,'container'=>'false' ));
}

function ano(){
    echo date('Y');
}

function the_meta_thumbnail_src($meta,$size){
    
    $id = get_meta($meta);
    $src = wp_get_attachment_image_src($id,$size);

    echo $src[0];

}

function the_meta_thumbnail($meta, $size){

    $src = the_meta_thumbnail_src($meta, $size);
    echo "<img src='".$src."' />";

}

function the_post_thumbnail_src($size = 'thumbnail'){

    global $post;

    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
    $url = $thumb['0'];

    echo $url;

}

function taxonomy_meta_img_src($term_id, $metabox_id, $field, $size){
    $meta = get_option($metabox_id);
    
    $meta = isset($meta[$term_id]) ? $meta[$term_id] : array();

    $id = $meta[$field][0];
    $src = wp_get_attachment_image_src($id,$size);
    
    return $src[0];

}

function taxonomy_meta_img($term_id, $metabox_id, $field, $size){

    $src = taxonomy_meta_img_src($term_id, $metabox_id, $field, $size);
    echo "<img src='".$src."' />";

}

function get_the_cat(){
     global $post;
     $category = get_the_category($post->ID);    

     return $category[0]->cat_name;
}

function the_cat(){
    echo get_the_cat();
}

function get_the_cat_slug(){
     global $post;
     $category = get_the_category($post->ID);   

    return $category[0]->slug;
}

function the_cat_slug(){
    echo get_the_cat_slug();
}

/* retorna um Array de objetos com os termos da taxonomia passada em um loop */
function get_post_terms($taxonomy){
	global $post;

	return get_the_terms($post->ID, $taxonomy);
}

/* retorna um Array com os nomes dos termos da taxonomia passada em um loop */
function get_post_terms_name($taxonomy){
	$terms = get_post_terms($taxonomy);
	$terms_name = array();

	foreach ($terms as $value) {
		$terms_name[] = $value->name;
	}

	return $terms_name;
}

/* exibe os termos da taxonomia passada em um loop no formato '$termo1, $termo2, ... $termoN.' */
function the_terms_name($taxonomy){
	$terms = get_post_terms_name($taxonomy);
	$output = "";

	foreach ($terms as $key => $value) {
		if($key+1<count($terms))
			$output .= "$value, ";
		else
			$output .= "$value.";
	}

	echo $output;
}

/* retorna um Array com os termos da taxonomia passada por um post */
function get_terms_name($taxonomy){
	global $post;
	$terms = get_the_terms($post->ID, $taxonomy);
	$terms_name = array();

	foreach ($terms as $value) {
		$terms_name[] = $value->name;
	}

	return $terms_name;
}

/* retorna uma string com os termos da taxonomia passada por um post */
function the_terms_name($taxonomy){
	$terms = get_terms_name($taxonomy);
	$output = "";

	foreach ($terms as $key => $value) {
		if($key+1<count($terms))
			$output .= "$value, ";
		else
			$output .= "$value.";
	}

	return $output;
}

function the_breadcrumb() {
    if (!is_home()) {
        echo '<a href="'.get_siteurl().'">Principal »</a>';

        if (is_category() || is_single()) {
            $cats = get_the_category();
            echo "<a href='".get_siteurl().$cats[0]->slug."'>".$cats[0]->name."</a>";

            
            if (is_single()) {
                echo "<a href='#'> » ";
                the_title();
                echo "</a>";
            }
        } elseif (is_page()) {
            echo "<a href='#'> » ";
            echo the_title();
            echo "</a>";
        }
    }
}

function related_posts($limit) {
 
     global $wpdb, $post, $table_prefix;

     if ($post->ID) {
         $retval = '<h2> Posts Relacionados </h2> <ul>';
         // Get tags
         $tags = wp_get_post_tags($post->ID);

         $tagsarray = array();
         foreach ($tags as $tag) {
            $tagsarray[] = $tag->term_id;
         }

         $tagslist = implode(',', $tagsarray);        
         
         // Do the query
         $q = "SELECT ".$wpdb->prefix."posts.*, count(".$wpdb->prefix."term_relationships.object_id) as count
         FROM ".$wpdb->prefix."term_taxonomy, ".$wpdb->prefix."term_relationships, ".$wpdb->prefix."posts
         WHERE ".$wpdb->prefix."term_taxonomy.taxonomy ='post_tag' AND ".$wpdb->prefix."term_taxonomy.term_taxonomy_id = ".$wpdb->prefix."term_relationships.term_taxonomy_id 
         AND ".$wpdb->prefix."term_relationships.object_id  = ".$wpdb->prefix."posts.ID 
         AND ".$wpdb->prefix."term_taxonomy.term_id IN (".$tagslist.") 
         AND ".$wpdb->prefix."posts.ID != ".$post->ID."
         AND ".$wpdb->prefix."posts.post_status = 'publish'
         AND ".$wpdb->prefix."posts.post_date_gmt < NOW()
         GROUP BY ".$wpdb->prefix."term_relationships.object_id
         ORDER BY RAND()
         LIMIT ".$limit;
         
         $related = $wpdb->get_results($q);
         return $related;
     }
     return;
}

?>