<?php
    // Inicia as classes
    global $html, $social;

?>
<!doctype html>
<html lang="pt-br">
    <head>

    	<?php 

            $html->charset('utf-8'); 
            $html->meta('viewport','width=device-width, initial-scale=1.0');

            $html->title();

            // SEO
            $html->meta('description','Portal da Transparência da Prefeitura Municipal de João Pessoa');
            $html->meta('keywords','João Pessoa, João, Pessoa, transparência, editais, licitações,edital,licitação,semanário,semanários,orçamento,receita municipal');
            $html->meta('author','SecomJP - Sérgio Vilar');

            // Icons
            $html->favicon();
            $html->touchicon();

            // CSS
            $html->css960('24');
            $html->basecss();

            // Javascript
            $html->javascript('modernizr');
            $html->ie_javascript('9','http://html5shim.googlecode.com/svn/trunk/html5.js');

            wp_head();

        ?>

    </head>
    <body>
        <div id="pagina" class="container_24">
            <header id="header" role="banner" class="grid_24">
                <h1><a title="<?php sitename(); ?>" href="<?php siteurl(); ?>"><?php sitename(); ?></a></h1>
                <div id="redes-sociais">
                    <?php $social->twitterButton('feelsen', array('container'=>'div','id'=>'twitter-button')); ?>
                    <?php $social->facebookButton('http://facebook.com/feelsen'); ?>
                    <?php $social->plusButton(); ?>
                </div>
            </header>
            <nav id="menu-topo" class="grid_24">
               <?php show_menu("menu"); ?>
                <?php get_search_form(); ?>
            </nav>
            <figure id="banner-topo" class="grid_24">
                <?php $html->img('banner.jpg','Banner','#'); ?>
            </figure>