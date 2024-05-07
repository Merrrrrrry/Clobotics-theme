<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name") ?></title>
    <?php wp_head() ?>
</head>
<body>

<nav id="site-navigation" class="main-navigation" role="navigation">
    <div class="menu-container">
        <?php
      
        wp_nav_menu(array(
            'theme_location' => 'main-menus',
            'container'      => false,
            'menu_class'     => 'menu', 
            'fallback_cb'    => false,
        ));
        ?>
    </div>
</nav>
