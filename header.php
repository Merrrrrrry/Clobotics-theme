<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name") ?></title>
    <?php wp_head() ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

 


<nav class="navbar">
    <div class="navbar-nav">
        <?php if (has_custom_logo()) {
            echo '<div class="navbar-logo">' . get_custom_logo() . '</div>';
        } else {
            echo '<h1 class="navbar-title">' . get_bloginfo('description') . '</h1>';
        } ?>
    </div>
    <div class="navbar-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu', 
            'container' => false,
            'menu_class' => 'navbar-nav'
        ));
        ?>
    </div>
</nav>
