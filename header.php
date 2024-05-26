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

<header class="main-header">
        <nav class="navbar">
            <div class="navbar-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/media/clobotics-logo-all-white.png" alt="Logo">
                </a>
            </div>
            <div class="burger-menu" id="burger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>" class="nav-link">About us <span class="dropdown-arrow">&#9662;</span></a>
                    <div class="dropdown-menu">
                        <a href="http://maria-grysevych.dk/clobotics/home/wind-services/articles/">Articles</a>
                        <a href="http://maria-grysevych.dk/clobotics/home/wind-services/media-files/">Media</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="http://maria-grysevych.dk/clobotics/home/wind-services/" class="nav-link">Wind <span class="dropdown-arrow">&#9662;</span></a>
                    <div class="dropdown-menu">
                        <!-- we will add loop with wind single later-->
                                <?php $loop = new WP_Query( array( 'post_type' => 'wind-service', 'posts_per_page' => -1 ) ); ?>
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="service_link_single_conteiner">
                                <a href="<?php the_permalink(the_field("service_title")); ?>"><?php the_field('service_title'); ?></a>
                            </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('career'))); ?>" class="nav-link footer-contact-link">Career</a>
                </li>
                <li class="nav-item">
                   <a href="http://maria-grysevych.dk/clobotics/home/wind-services/contact" class="nav-link footer-contact-link">Contact us</a>
                </li>
                <li class="nav-item">
                    <a href="https://iris-eu.clobotics.com/#/login" class="nav-link external-link">
                        <img class="image-iris-logo" src="<?php echo get_template_directory_uri(); ?>/media/iris-tm-logo.png" alt="Iris™ Login"> Iris™ Login
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('burger-menu').addEventListener('click', function () {
                document.getElementById('navbar-nav').classList.toggle('active');
            });
        });
    </script>
