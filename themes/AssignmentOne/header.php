<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <link href="<?php echo esc_url(home_url('wp-content/themes/AssignmentOne/css/customstylesheet.css')); ?>" rel="stylesheet">
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div>
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo esc_url(home_url('wp-content/uploads/2025/02/logo.png')); ?>" alt="header logo">
                </a>
            </div>
            <nav>
                <?php
                wp_nav_menu(array(
                    'menu'           => 'main',
                    'theme_location' => '',
                    'depth'          => 2,
                    'fallback_cb'    => false
                ));
                ?>
            </nav>
        </header>