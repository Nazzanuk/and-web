<?php /* Template Name: Home */ ?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ANDigital</title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bower.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/app.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/stylesheet.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
</head>
<body ng-app="andigital">
<div data-component="header" ng-controller="HeaderController">
    <header id="header-transparent">
        <div class="container-fluid">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-transparent.png" alt=""/>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <header id="header">
        <div class="container-fluid">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt=""/>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
</div>
<div data-component="home">
    <? $image = wp_get_attachment_image_src(get_field('hero_image'), 'full'); ?>
    <div class="hero" style="background-image: url('<? echo $image[0] ?>')">
        <div class="container-fluid">
            <!--<div class="row">-->
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div class="feature">
                    ANDigital: Building Your Digital Future
                    <br/>
                    <br/>

                    <a href="/what-we-do" class="and-button">Find Out More</a>
                </div>
            </div>
            <!--</div>-->

        </div>
    </div>

    <? $image = wp_get_attachment_image_src(get_field('quote_image'), 'full'); ?>
    <div class="quote" style="background-image: url('<?php echo $image[0]; ?>')">

        <div class="container-fluid">
            <div class="col-sm-4 col-md-5 col-lg-6"></div>
            <div class="col-sm-8 col-md-7 col-lg-6">
                <div class="quote-text">
                    <p>
                        <? the_field('quote')?>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="features">
        <div class="container-fluid">

            <div class="row">

                <? while ( have_rows('features') ) : the_row(); ?>

                    <div class="col-sm-4">
                        <div class="feature">
                            <div class="row">
                                <? $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                <img src="<? echo $image[0] ?>" alt=""/>
                            </div>

                            <div class="title"><? the_sub_field('title') ?></div>
                            <p><? the_sub_field('text') ?></p>
                            <br/>

                            <p class="visible-xs">
                                <a href="<? the_sub_field('link_href') ?>" class="and-button"><? the_sub_field('link_title') ?></a>
                            </p>
                        </div>
                    </div>
                <? endwhile; ?>

            </div>

            <div class="row hidden-xs" style="text-align: center">
                <div class="col-sm-4">
                    <p>
                        <a class="and-button">Learn More</a>
                    </p>
                </div>
                <div class="col-sm-4">
                    <p>
                        <span class="and-button">Learn More</span>
                    </p>
                </div>
                <div class="col-sm-4">
                    <p>
                        <span class="and-button">Learn More</span>
                    </p>
                    <br/><br/>
                </div>
            </div>

        </div>

    </div>

</div>
<div data-component="footer">

    <i class="fa fa-facebook"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-linkedin"></i>

    <p>
        <a href="#">Privacy Policy</a>
        &nbsp;
        <a href="#">Terms of Use</a>
    </p>
    <div>
        <small>© 2015 ANDigital. All rights reserved.</small>
    </div>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bower.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>
</body>
</html>