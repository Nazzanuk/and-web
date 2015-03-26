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
<?php if( have_rows('layout') ): while ( have_rows('layout') ) : the_row(); ?>
    <?php require('flex.php') ?>
<?php endwhile; else : endif; ?>
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