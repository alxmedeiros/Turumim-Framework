<?php

function theme_activated(){

	
	// Cadastra as páginas necessárias para o funcionamento do tema na hora da ativação
	if(!page_exists('a-diagson')):
	
	 	$top = add_page('A Diagson', 'a-diagson');
	 	add_page('História', 'historia', null, $top);
	 	add_page('Missão', 'missao', null, $top);
	 	add_page('Valores', 'valores', null, $top);
	 	add_page('Estrutura', 'estrutura', null, $top);
	 	add_page('Diretoria', 'diretoria', null, $top);
	 	add_page('Prêmios e Certificados', 'premios-e-certificados', null, $top);	 		 		 		 		 		 	
	
	endif;
	
	if(!page_exists('fale-conosco')):
	
	 	$top = add_page('Fale Conosco', 'fale-conosco');
	 	add_page('Marque seu exame', 'marque-seu-exame', null, $top);
	 	add_page('Como chegar', 'como-chegar', null, $top);
	 	add_page('Atendimento ao cliente', 'atendimento-ao-cliente', null, $top); 		 		 		 		 		 	
	
	endif;
	
	if(!page_exists('equipe')) add_page('Equipe', 'equipe');
	if(!page_exists('diagnosticos')) add_page('Diagnósticos', 'diagnosticos');
	if(!page_exists('planos')) add_page('Planos', 'planos');	
	if(!page_exists('parceiros')) add_page('Parceiros', 'parceiros');	
	if(!page_exists('noticias')) add_page('Notícias', 'noticias');		

}


?>