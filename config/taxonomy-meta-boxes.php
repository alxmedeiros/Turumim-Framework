<?php


$meta_sections = array();

// first meta section
$meta_sections[] = array(
	'title' => 'Informações adicionais',			// section title
	'taxonomies' => array('plano'),			// list of taxonomies. Default is array('category', 'post_tag'). Optional
	'id' => 'plano_meta',					// ID of each section, will be the option name
	
	'fields' => array(							// list of meta fields
		array(
			'name' => 'Logo do Plano',					// field name
			'id' => 'planoimg',						// field id, i.e. the meta key
			'type' => 'image',						// text box
		),
	)
);

foreach ($meta_sections as $meta_section) {
	$my_section = new RW_Taxonomy_Meta($meta_section);
}

?>
