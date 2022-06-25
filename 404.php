<?php get_header(); ?>
<?php get_sidebar(); ?>
<main class="main">
    <h1><?php the_title(); ?></h1>
    <section class="content">
        <p><?php echo __('It looks like nothing was found at this location.', 'whitesquare'); ?></p>
    </section>
</main>
<?php get_footer(); ?>