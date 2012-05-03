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



?>