<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title>
        <?php bloginfo('name'); ?>
        <?php if (is_single()) { ?> &raquo; Blog Archive
        <?php } ?>
        <?php wp_title(); ?>
    </title>
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <ul>
                        <li>
                            <a href="#">
                                <h5> Email :</h5> info@lawgroup.com
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h5> Phone :</h5> +(000) 111-222-9999
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="SocialQuote">
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn_quote">
                            <a href="#">Free Consultant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="myHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo">
                        <a href="index.php">
                            <img class="img-fluid" src="<?php echo esc_url( get_theme_mod( 'custom_header_image' ) ); ?>">
                        </a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="main-menu">
                        <nav id='cssmenu'>
                            <div id="head-mobile"></div>
                            <div class="button"></div>
                            <ul class="nav-ul" style="align-items: start;">
                            <?php wp_nav_menu( array( 'theme_location' => 'Mainmenu', 'container' => '','items_wrap' => '%3$s') ); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>