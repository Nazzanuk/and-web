<?php /* Template Name: What We Do */ ?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ANDigital</title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bower.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/app.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/stylesheet.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>

    <?php wp_head(); ?>
</head>
<body ng-app="andigital">
<div data-component="header" ng-controller="HeaderController">
    <header id="header-transparent">
        <div class="container-fluid">
            <a href="/"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-transparent.png" alt="ANDigital"/></a>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <header id="header">
        <div class="container-fluid">
            <a href="/"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="ANDigital"/></a>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
</div>
<div data-component="what-we-do" ng-controller="WhatWeDoController">
    <?php $image = wp_get_attachment_image_src(get_field('hero_image'), 'full'); ?>
    <div class="hero">
        <div class="hero parallax" style="background-image: url('<?php echo $image[0] ?>')"></div>
        <h1 class="hero-title">What We Do</h1>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2015/02/dod-2.jpg')">
        <div class="title">Definition of Digital</div>

        <div class="container-fluid">
            <div class="quote-center-text">
                <p>
                    <?php the_field('definition_of_digital_text') ?>
                </p>
            </div>
        </div>
    </div>

    <div class="quote services"
         style="background-image: url('http://andigital.com/wp-content/uploads/2015/02/rebecca-3.jpg')">
        <div class="title">Services</div>

        <div class="container-fluid">
            <?php $index = 0?>
            <?php while ( have_rows('services') ) : the_row(); ?>

                <div class="quote-center-text" data-service="<?php echo $index; $index++ ?>">
                    <p><?php the_sub_field('text') ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="content-switcher">
        <table>
            <tr>
                <?php $index = 0?>
                <?php while ( have_rows('services') ) : the_row(); ?>
                    <td ng-class="{active:isActiveService(<?php echo $index; ?>)}" ng-click="setActiveService(<?php echo $index; $index++ ?>)">
                        <div class="title"><?php the_sub_field('title') ?></div>
                    </td>
                <?php endwhile; ?>
            </tr>
        </table>
    </div>

    <div class="quote">
        <div class="title">Clients</div>

        <div class="container-fluid">
            <div class="quote-center-text">
                <p>
                    <?php the_field('clients_text') ?>
                </p>
            </div>

            <div class="owl-carousel" id="clients-carousel">
                <?php while ( have_rows('clients') ) : the_row(); ?>
                    <div>
                        <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                        <img src="<?php echo $image[0] ?>" alt="<?php the_sub_field('name') ?>"/>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="quote">
        <div class="title">Products</div>


        <div class="features">
            <div class="container-fluid">

                <div class="row">

                    <?php while ( have_rows('products') ) : the_row(); ?>
                        <div class="col-sm-4">
                            <div class="feature">

                                <div class="title"><small><?php the_sub_field('name') ?></small></div>
                                <div class="row">
                                    <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                    <a href="<?php the_sub_field('link') ?>">
                                        <img class="slim" src="<?php echo $image[0] ?>" alt="<?php the_sub_field('name') ?>"/>
                                    </a>
                                </div>
                                <p><?php the_sub_field('text') ?></p>
                                <br/>

                                <p class="visible-xs">
                                    <a class="and-button" href="<?php the_sub_field('link') ?>">Read More</a>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="row hidden-xs" style="text-align: center">

                    <?php while ( have_rows('products') ) : the_row(); ?>
                        <div class="col-sm-4">
                            <p>
                                <a class="and-button" href="<?php the_sub_field('link') ?>">Read More</a>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>

            </div>

        </div>

    </div>

    <div class="quote" id="academy">
        <div class="title">ANDacademy</div>

        <div class="container" style="text-align: left">
            <p><?php the_field('andacademy_text') ?>
            </p>
        </div>
        <div class="owl-carousel" id="andacademy-video">
            <div>
                <iframe src="https://player.vimeo.com/video/112052203?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>


</div>
<div data-component="footer">

    <a href="https://www.facebook.com/andigital"><i class="fa fa-facebook"></i></a>
    <a href="https://www.twitter.com/andigital"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/andigital"><i class="fa fa-linkedin"></i></a>

    <p>
        <a href="/privacy-policy">Privacy Policy</a>
        &nbsp;
        <a href="/terms-of-use">Terms of Use</a>
    </p>
    <div>
        <small>© 2015 ANDigital. All rights reserved.</small>
    </div>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bower.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>

<?php wp_footer(); ?>
</body>
</html>