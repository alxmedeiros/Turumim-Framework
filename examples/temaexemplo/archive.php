<?php get_header(); ?>
<section id="main-content" class="grid_16">
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<article>
            	<header>
                	<h2><?php the_title(); ?></h2>
            	</header>

            	<?php the_excerpt(); ?>

        	</article>
    	<?php endwhile; ?>
    <?php else: ?>
    	<article>
    		<header>
    			<h2>Nada encontrado</h2>
    		</header>

    		<p>Desculpe, não conseguimos encontrar nenhum conteúdo referente à sua requisição.</p>

    	</article>
<?php endif; ?>
</section>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>            