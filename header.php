<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="wrapper">
            <header class="header">
                // logo
                <a href="/" class="header__logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Whitesquare logo"></a>
                <nav class="header__menu">
                    // "top-menu" name and classname
                    <? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
                </nav>
                // searchform
                <?php get_search_form(); ?>
            </header>

