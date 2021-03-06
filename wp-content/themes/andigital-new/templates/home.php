<?php /* Template Name: Home */ ?><!DOCTYPE html>
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
<div data-component="menu" ng-controller="MenuController">
    <nav id="menu" style="display:none;">
        <div class="logo">
            <i class="fa-times fa pull-right" ng-click="hideMenu()"></i>
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-transparent.png" alt="ANDigital"/></a>

        </div>

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/who-we-are">Who We Are</a></li>
            <li><a href="/what-we-do">What We Do</a></li>
            <li><a href="/join-us">Join Us</a></li>
            <li><a href="/jobs">Jobs</a></li>
        </ul>

    </nav>
</div>
<div data-component="home" ng-controller="HomeController">
    <?php $image = wp_get_attachment_image_src(get_field('hero_image'), 'full'); ?>
    <div class="hero">
        <div class="hero parallax" style="background-image: url('<?php echo $image[0] ?>');background-position: left;"></div>
        <div class="container-fluid">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div class="feature">
                    ANDigital: Building Your Digital Future
                    <br/>
                    <br/>

                    <a href="/what-we-do" class="and-button">Find Out More</a>
                </div>
            </div>

        </div>
    </div>

    <?php $image = wp_get_attachment_image_src(get_field('quote_image'), 'full'); ?>
    <div class="quote hidden-sm hidden-xs" style="background-image: url('<?php echo $image[0]; ?>')">
        <div class="container-fluid">
            <div class="col-md-6">
                <iframe src="https://player.vimeo.com/video/113017896?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <div class="quote-text">
                    <p>
                        <?php the_field('quote')?>
                    </p>
                </div>
            </div>

        </div>
    </div>


    <div class="quote visible-sm visible-xs" style="min-height: initial">
        <div class="container-fluid">
            <p>
                <?php the_field('quote')?>
            </p>
        </div>
    </div>

    <div class='embed-container visible-xs visible-sm'>
        <iframe src='http://player.vimeo.com/video/113017896?title=0&byline=0&portrait=0' frameborder='0' webkitAllowFullScreen mozallowfullscreen
                allowFullScreen></iframe>
    </div>


    <div class="features">
        <div class="container-fluid">

            <div class="row">
                <?php while ( have_rows('features') ) : the_row(); ?>
                    <div class="col-sm-4">
                        <div class="feature">
                            <div class="row">
                                <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                <a href="<?php the_sub_field('link_href') ?>">
                                    <img src="<?php echo $image[0] ?>" alt=""/>
                                </a>
                            </div>

                            <div class="title"><?php the_sub_field('title') ?></div>
                            <p><?php the_sub_field('text') ?></p>

                            <p class="visible-xs">
                                <a href="<?php the_sub_field('link_href') ?>" class="and-button"><?php the_sub_field('link_title') ?></a>
                                <br/>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="row hidden-xs" style="text-align: center">
                <?php while ( have_rows('features') ) : the_row(); ?>
                    <div class="col-sm-4">
                        <p>
                            <a href="<?php the_sub_field('link_href') ?>" class="and-button"><?php the_sub_field('link_title') ?></a>
                        </p>
                        <br/>
                        <br/>
                    </div>
                <?php endwhile; ?>
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