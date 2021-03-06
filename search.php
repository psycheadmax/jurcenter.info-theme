<?php get_header(); ?>
<?php get_sidebar(); ?>
<main class="main">
    <h1><?php the_title(); ?></h1>
    <section class="content">
        <h2 class="content-heading"><?php printf( __('Search Results for: %s', 'default'), get_search_query() ); ?></h2>
        	<?php if (have_posts()): while (have_posts()): the_post(); ?>
        		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        		<p><?php the_excerpt(); ?></p>
        	<?php endwhile;	else:?>
        		<p><?php echo __('Sorry, no results found', 'whitesquare'); ?></p>
        	<?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>