<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- css moved to functions.php
        <link href="<?php echo get_bloginfo( 'template_directory' ); ?>/style.css" rel="stylesheet">
        -->
    <title>Jurcenter.info theme</title>
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header class="header">
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>" class="header__logo"><?php echo get_bloginfo( 'name' ); ?></a>
    <?php echo get_bloginfo( 'description' ); ?>
            <nav class="header__menu">
            	<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
            </nav>
    </header>
    <main class="main">