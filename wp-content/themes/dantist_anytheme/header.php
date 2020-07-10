<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body>
    <header class="col">
        <div class="navigation container row justify-between">
            <!------------------------------------------------>
            <div class="site-info row align-end">
                <div class="logo col">
                   <?php echo get_custom_logo(); ?>
                </div>

                <div class="title col align-end">
                    <p class="site-description"><?php bloginfo('description');?></p>
                </div>
            </div>
            <!------------------------------------------------------>
            <div class="site-contacts row align-end">
                <div class="languages row">
                    <a href="#" class="lang-button current-lang">УКР</a>
                    <a href="#" class="lang-button">ENG</a>
                </div>
                <div class="header-contacts row  align-end">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/phone_icon.png " alt="phone" height="60" width="30">
                    <div class="col">
                        <p>+38 063 871 8833</p>
                        <p>+38 097 400 7373</p>
                        <p>+38 095 075 6535</p>
                    </div>
                </div>
            </div>
        </div>
  <!------------------------------------------------------------------------->
        <div id="video-banner">
            <div class="menu_icon"><img src="<?php echo get_template_directory_uri(); ?>/img/menu_white.png " alt="menu_icon"></div>
            <nav class="mobile-navigation">
                <? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'mob-menu')); ?>
            </nav>

            <div class="navigation-menu vw100 row justify-center">
                <div class="container row justify-center">
                    <nav class="container top-navigation row justify-between">
                        <? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
                    </nav>
                </div>
            </div>
            <div class="site-tagline row justify-center">
                    <h3>Посміхайтесь разом з нами </h3>
             </div>
           <video autoplay loop playsinline muted>
                <source src="<?php echo get_template_directory_uri(); ?>/img/header_video.mp4" type='video/mp4'>
            </video>
        </div>

    </header>


