<aside id="sidebar" class="grid_8">
    <?php 
        if ( is_active_sidebar('sidebar') ) {
            dynamic_sidebar('sidebar');
        } else {
    ?>

<h3>Páginas</h3>
    <ul>
        <?php wp_list_pages('title_li='); ?>
    </ul>

<h3>Posts Recentes</h3>
    <ul>
        <?php query_posts('post_type=post&posts_per_page-5'); while(have_posts()): the_post(); ?>
            <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <?php } ?>
</aside>