<?php
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
$options_panel->TabsListing(array(
   'links' => array(
   'options_1' =>  __('Opções Básicas'),
   'options_2' => __('Página Inicial'),
   )
));

$options_panel->OpenTab('options_1');

$options_panel->Title("Opções Básicas");
$options_panel->addText('flickrid', array('name'=> 'ID de usuário do Flickr', 'desc' => 'Não sabe qual sua id no Flickr? Peque <a href="http://idgettr.com/" target="_blank">aqui</a>.'));
$options_panel->addText('flickr_api_key', array('name'=> 'Chave de API do Flickr', 'desc' => 'Crie uma chave de api <a href="http://www.flickr.com/services/apps/create/apply" target="_blank">aqui</a>.'));
$options_panel->addText('emailcontato', array('name'=> 'Endereço de email','desc'=>'Através deste email você receberá os envios a partir do site'));
$options_panel->CloseTab();

$options_panel->OpenTab('options_2');

$options_panel->Title('Página Inicial');
//$options_panel->addImage('fotodestaque',array('name'=> 'Foto de destaque'));
$options_panel->addTextarea('endereco',array('name'=> 'Endereço'));
$options_panel->addParagraph("Selecione abaixo as páginas que aparecerão na página inicial do site.");
$options_panel->addPages('bloco1',array('post_type'=>'page'),array('name'=> 'Bloco 1'));
$options_panel->addPages('bloco2',array('post_type'=>'page'),array('name'=> 'Bloco 2'));
$options_panel->addPages('bloco3',array('post_type'=>'page'),array('name'=> 'Bloco 3'));
$options_panel->CloseTab();



?>