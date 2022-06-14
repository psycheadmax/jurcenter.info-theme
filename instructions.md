
INSTRUCTIONS
in file (nav menu?):
1 variant
wp_nav_menu displays menu with name «top-menu» and css class «top-menu».
```
<nav class="main-navigation">
	<? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
</nav>
```

2 variant
```
<?php wp_list_pages( '&title_li=' ); ?>
```


in file (site name and link to home):

<a href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
<?php echo get_bloginfo( 'description' ); ?>

link css:
<link href="<?php echo get_bloginfo( 'template_directory' ); ?>/style.css" rel="stylesheet">

before </head>:
<?php wp_head(); ?>