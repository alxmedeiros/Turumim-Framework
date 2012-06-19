<?php

	// Meses do ano em português
	$meses['01'] = 'Janeiro';
	$meses['02'] = 'Fevereiro';
	$meses['03'] = 'Março';
	$meses['04'] = 'Abril';
	$meses['05'] = 'Maio';
	$meses['06'] = 'Junho';
	$meses['07'] = 'Julho';
	$meses['08'] = 'Agosto';
	$meses['09'] = 'Setembro';
	$meses['10'] = 'Outubro';
	$meses['11'] = 'Novembro';
	$meses['12'] = 'Dezembro';


	// Array de meses com as 3 iniciais
	foreach($meses as $numero=>$nome):
		$meses_min[$numero] = substr($nome, 0, 3);
	endforeach;

?>