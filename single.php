<?php get_header(); ?>
<?php get_sidebar(); ?>
<main class="main">
    <h1><?php the_title(); ?></h1>
    <?php while (have_posts()): the_post();?>
    		<?php the_content();?>
    		<?php
    			if ( comments_open() || get_comments_number() ) {
    				comments_template();
    			}
    		?>
</main>
<?php get_footer(); ?>