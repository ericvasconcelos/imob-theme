<?php if (!function_exists('add_action')) exit; ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php bloginfo('name')?><?php echo ' | ' ?><?php bloginfo('description') ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/2re-favicon.ico" rel="shortcut icon"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
    <![endif]-->
    
    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {
           filter: none;
        }
      </style>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="all">
    <header id="header" role="banner">
        <div class="top-header">
            <div class="container">
                <div class="contacts">
                    <span class="email">
                        <i class="icon-mail-alt"></i>
                        <span>contato@imobiliaria.com.br</span>
                    </span>
                    <span class="tel">
                        <i class="icon-phone"></i>
                        <span>+55 21 2783-1233</span>
                    </span>
                </div><!-- /contacts-->
                <div class="social-languages">
                    <div class="languages">
                        <a href="#">Português</a>
                        <a href="#">Inglês</a>
                        <a href="#">Espanhol</a>
                    </div><!-- /languages -->
                    <div class="social">
                        <a href="" class="pinterest">
                            <i class="icon-pinterest"></i>
                        </a>
                        <a href="" class="instagram">
                            <i class="icon-instagram"></i>
                        </a>
                        <a href="" class="youtube">
                            <i class="icon-youtube"></i>
                        </a>
                        <a href="" class="facebook">
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="" class="twitter">
                            <i class="icon-twitter"></i>
                        </a>
                    </div><!-- /social -->
                </div><!-- /social-languages -->

            </div><!-- /container-->
        </div><!-- /top-header -->
        
        <div class="main-header">
            <div class="container">
                <!-- <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">MENU</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
                <a href="<?php echo get_site_url(); ?>/" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Site Imobiliária">
                </a>
                <nav class="menu-navigation" role="navigation">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'primary_navi',
                                'container'         => false,
                                'depth'             => 4
                            )
                        );
                    ?>
                </nav><!-- /menu-navigation-->

            </div><!-- /container -->
        </div><!-- /main-header -->
    </header>