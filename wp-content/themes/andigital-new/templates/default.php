<?php /* Template Name: Default */ ?><!DOCTYPE html>
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
<div data-component="default" ng-controller="DefaultController">

    <?php
    if( have_rows('layout') ):
        while ( have_rows('layout') ) : the_row();

            if( get_row_layout() == 'hero' ): ?>

                <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                <div class="<?php the_sub_field('size') ?>">
                    <div class="<?php the_sub_field('size') ?> parallax" style="background-image: url('<?php echo $image[0] ?>')"></div>
                    <h1 class="hero-title"><?php the_sub_field('title') ?></h1>
                </div>

            <?php elseif( get_row_layout() == 'content' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                        <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="quote-center-text">
                        <p><?php the_sub_field('text') ?></p>

                        <?php if( have_rows('link') ): while ( have_rows('link') ) : the_row(); ?>

                        <a class="and-button" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'content-html' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                        <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="container" style="text-align: left">
                        <p><?php the_sub_field('text') ?></p>

                        <?php if( have_rows('link') ): while ( have_rows('link') ) : the_row(); ?>

                        <a class="and-button" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'carousel' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                        <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="owl-carousel and-carousel">
                        <?php if( have_rows('images') ): ?>
                            <?php while ( have_rows('images') ) : the_row(); ?>
                                <div>
                                    <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                    <img src="<?php echo $image[0] ?>"/>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                </div>

            <?php elseif( get_row_layout() == 'divider' ): ?>

                <div class="divider"></div>

            <?php elseif( get_row_layout() == 'links' ): ?>

                <div class="sub-pages">
                    <?php if( have_rows('links') ): while ( have_rows('links') ) : the_row(); ?>

                    <a class="sub-page <?php the_sub_field('active') ?>" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>

                    <?php endwhile; endif; ?>
                </div>
            <?php endif;

        endwhile;
    else :
    endif;
    ?>

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

<?php wp_footer(); ?>
</body>
</html>