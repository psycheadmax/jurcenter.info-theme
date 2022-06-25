# My own guide on Wordpress theming
(inspired by the https://habr.com/ru/post/228523/)

## Essential minimum
1. Create empty index.php, style.css (and maybe img folder and screenshot.png)
index.php
```php
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage whitesquare
 */
```

style.css 
(essential sample of original style.css and edited in second comment block)
```css
@charset "UTF-8";

/*
Theme Name: Twenty Twenty-One
Theme URI: https://wordpress.org/themes/twentytwentyone/
Author: the WordPress team
Author URI: https://wordpress.org/
Description: Twenty Twenty-One is a blank canvas for your ideas and it makes the block editor your best brush. With new block patterns, which allow you to create a beautiful layout in a matter of seconds, this theme’s soft colors and eye-catching — yet timeless — design will let your work shine. Take it for a spin! See how Twenty Twenty-One elevates your portfolio, business website, or personal blog.
Requires at least: 5.3
Tested up to: 6.0
Requires PHP: 5.6
Version: 1.6
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: twentytwentyone
Tags: one-column, accessibility-ready, custom-colors, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, block-patterns, rtl-language-support, sticky-post, threaded-comments, translation-ready

Twenty Twenty-One WordPress Theme, (C) 2020 WordPress.org
Twenty Twenty-One is distributed under the terms of the GNU GPL.
*/

/*
Theme Name: Jurcenter.info
Author: psycheadmax
Description: Theme for jurcenter.info
Requires at least: 5.3
Tested up to: 6.0
Requires PHP: 5.6
Version: 1.6

Text Domain: jurcenter.info
Tags:

Jurcenter.info Theme, (C) 2022
*/
```
2. Go to Settings -> Permalink settings -> Post name. To make links as «http://site_name/page_name»
Now theme is exist

## Prepare
1. Create all essential pages or posts
2. Make "Front page displays: A static page -> Home."

## Header.php and footer.php and functions.php
Header.php
```php
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header>
			// logo
			<a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Whitesquare logo"></a>
			// searchform
			<?php get_search_form(); ?> 
		</header>
	<nav class="main-navigation">
		// "top-menu" name and classname
		<? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
	</nav>
```

Footer.php
```php
	</div>
	<footer></footer>
	<?php wp_footer(); ?>
</body>
</html>
```

functions.php
import css and js
import html5-shim for correct display in older browsers
```php
<?php
function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// activate adding menus (deactivated on default)
// "Appearance - Menus" appears after 
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

//removes empty <p></p> in carriage returns
remove_filter('the_content', 'wpautop');
```

## Page.php
```php
<?php get_header(); ?>
<div class="main-heading">
	<h1><?php the_title(); ?></h1>
</div>
// sidebar
<?php get_sidebar(); ?>
<section>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
```

## Search
searchform.php
```php
<form name="search" action="<?php echo home_url( '/' ) ?>" method="get" class="search-form">
	<input type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo __('Search', 'whitesquare'); ?>" class="input">
	<button type="submit" class="button"><?php echo __('GO', 'whitesquare'); ?></button>
</form>
```

## Front page
front-page.php
(same as page.php but w/o title)
```php
<?php get_header(); ?>
<section>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
```

## Sidebar.php
```php
<aside>
	<nav class="aside-navigation">
		<? wp_nav_menu(array('menu' => 'aside-menu', 'menu_class' => 'aside-menu')); ?>
	</nav>
	<h2 class="sidebar-heading"><?php echo __('Our offices', 'whitesquare'); ?></h2>
	<div class="map">
		<img src="<?php bloginfo('template_url'); ?>/images/sample.png" width="230" height="180" alt="<?php echo __('Our offices', 'whitesquare'); ?>">
	</div>
</aside>
```

## Single.php
(displays single post page)
```php
<?php get_header();?>
<div class="main-heading">
	<h1><?php the_title(); ?></h1>
</div>
<?php get_sidebar();?>
<section>
	<?php while (have_posts()): the_post();?>
		<?php the_content();?>
		<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
	<?php endwhile; ?>
</section>
<?php get_footer(); ?>
```

## Search results page
search.php
```php
<?php get_header(); ?>
<div class="main-heading">
	<h1>Search</h1>
</div>
<?php get_sidebar(); ?>
<section>
	<h2 class="content-heading"><?php printf( __('Search Results for: %s', 'default'), get_search_query() ); ?></h2>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_excerpt(); ?></p>
	<?php endwhile;	else:?>
		<p><?php echo __('Sorry, no results found', 'whitesquare'); ?></p>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
```

## Archive.php
(pages archive)
just copy page.php code in it

## 404.php
```php
<?php get_header(); ?>
<div class="main-heading">
	<h1><?php the_title(); ?></h1>
</div>
<?php get_sidebar(); ?>
<section>
	<p><?php echo __('It looks like nothing was found at this location.', 'whitesquare'); ?></p>
</section>
<?php get_footer(); ?>
```

## for command line:
```
touch index.php header.php content.php sidebar.php page.php front-page.php footer.php style.css searchform.php search.php archive.php single.php
```

## PS. Wordpress functions
https://codex.wordpress.org/Function_Reference