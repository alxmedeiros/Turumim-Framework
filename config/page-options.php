<?php
<<<<<<< HEAD

=======
>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237
$config = array(
    'menu'=> array('top' => 'my_slug'),                 //sub page to settings page
    'page_title' => 'Opções',   //The name of this page
    'capability' => 'edit_themes',       // The capability needed to view the page
    'option_group' => 'demo_options',    //the name of the option to create in the database
    'id' => 'admin_page',                // Page id, unique per page
    'fields' => array(),                 // list of fields (can be added by field arrays)
    'local_images' => false,             // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$options_panel = new BF_Admin_Page_Class($config);

$options_panel->OpenTabs_container('');
<<<<<<< HEAD

$args = array(
  'type'                     => 'post',
  'orderby'                  => 'name',
  'order'                    => 'ASC',
  'parent'                   => 0,
  'hide_empty'               => 0,
  //'hierarchical'             => 0,
  'taxonomy'                 => 'category');

$abas['links']['opt_inicial'] = __('Página Inicial');

$categories = get_categories($args);
$cats[0] = 'Nenhuma categoria';
foreach ($categories as $category):
  $cats[$category->term_id] = $category->name;
  $abas['links']['opt_'.$category->slug] = __($category->name);
endforeach;

$abas['links']['opt_redes'] = __('Redes sociais');

$options_panel->TabsListing($abas);

// ---- Categorias
foreach ($categories as $category):

  $args = array(
  'type'                     => 'post',
  'child_of'                 => $category->term_id,
  'orderby'                  => 'name',
  'order'                    => 'ASC',
  'hide_empty'               => 0,
  'hierarchical'             => 0,
  'taxonomy'                 => 'category');

  $subcategories = get_categories($args);

  $subcats[0] = 'Nenhuma categoria';
  foreach ($subcategories as $subcategory):
    $subcats[$subcategory->term_id] = $subcategory->name;
  endforeach;

  $options_panel->OpenTab('opt_'.$category->slug);

  $options_panel->Title($category->name);
  $options_panel->addSelect($category->slug.'_destaque_1',$subcats, array('name'=> 'Primeira categoria em destaque'));
  $options_panel->addSelect($category->slug.'_destaque_2',$subcats, array('name'=> 'Segunda categoria em destaque'));

  $options_panel->addSelect($category->slug.'_box_1',$subcats, array('name'=> 'Primeira categoria em box'));
  $options_panel->addSelect($category->slug.'_box_2',$subcats, array('name'=> 'Segunda categoria em box'));
  $options_panel->addSelect($category->slug.'_box_3',$subcats, array('name'=> 'Terceira categoria em box'));

  $options_panel->CloseTab();

  unset($subcats);
  unset($subcategories);

endforeach;

$options_panel->OpenTab('opt_inicial');

// --- Página inicial
$options_panel->Title('Página Inicial');
$options_panel->addSelect('cat_destaque_1',$cats, array('name'=> 'Primeira categoria em destaque'));
$options_panel->addSelect('cat_destaque_2',$cats, array('name'=> 'Segunda categoria em destaque'));

$options_panel->addSelect('cat_box_1',$cats, array('name'=> 'Primeira categoria em box'));
$options_panel->addSelect('cat_box_2',$cats, array('name'=> 'Segunda categoria em box'));
$options_panel->addSelect('cat_box_3',$cats, array('name'=> 'Terceira categoria em box'));

$options_panel->CloseTab();


// --- Redes sociais
$options_panel->OpenTab('opt_redes');

$options_panel->Title("Redes sociais");
$options_panel->addText('twitter', array('name'=> 'Usuário do Twitter','desc'=>'Por favor, digite apenas o username. Ex: sodavirtual'));
$options_panel->addText('facebook', array('name'=> 'Facebook','desc'=>'Endereço da sua página/perfil no Facebook'));
$options_panel->addText('gplus', array('name'=> 'Google Plus','desc'=>'Endereço para sua página/perfil no Google Plus'));
$options_panel->CloseTab();
=======
$options_panel->TabsListing(array(
   'links' => array(
   'options_1' =>  __('Opções Básicas'),
   'options_2' => __('Página Inicial'),
   )
));

$options_panel->OpenTab('options_1');

$options_panel->Title("Opções Básicas");
$options_panel->addText('telefone_contato', array('name'=> 'Principal Telefone para contato'));
$options_panel->addTextarea('telefones_contato', array('name'=> 'Todos telefones para contato'));
$options_panel->addTextarea('endereco', array('name'=> 'Endereço'));
$options_panel->addText('emailcontato', array('name'=> 'Endereço de email','desc'=>'Através deste email você receberá os envios a partir do site'));
$options_panel->CloseTab();

$options_panel->OpenTab('options_2');

$options_panel->Title('Página Inicial');
//$options_panel->addImage('fotodestaque',array('name'=> 'Foto de destaque'));
$options_panel->addText('dias_funcionamento',array('name'=> 'Dias de funcionamento'));
$options_panel->addTextarea('horario_funcionamento', array('name'=> 'Horário de funcoinamento'));
$options_panel->addTextarea('telefone_exame', array('name'=> 'Telefones para marcar exame'));
$options_panel->CloseTab();


>>>>>>> 83edf584d486af8960a52a37ff7f8fa86e91e237

?>