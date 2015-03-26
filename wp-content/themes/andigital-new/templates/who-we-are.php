<?php /* Template Name: Who We Are */ ?><!DOCTYPE html>
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
<div data-component="who-we-are" ng-controller="WhoWeAreController">
    <?php if( have_rows('layout') ): while ( have_rows('layout') ) : the_row(); ?>
        <?php require('flex.php') ?>
    <?php endwhile; else : endif; ?>

    <div class="people">
        <div class="clearfix">
            <?php $post_objects = get_field('people'); $index = 0; ?>
            <?php if( $post_objects ): foreach( $post_objects as $post): setup_postdata($post); ?>
                <?php $image = wp_get_attachment_image_src(get_field('image_1'), 'full'); ?>
                <?php $image2 = wp_get_attachment_image_src(get_field('image_2'), 'full'); ?>
                <?php $image3 = wp_get_attachment_image_src(get_field('image_3'), 'full'); ?>
                <div class="person" data-person="<?php echo $index ?>" ng-click="selectPerson(<?php echo $index ?>)" style="background-image: url('<?php echo $image[0] ?>')">
                    <div class="person-alt-image" style="background-image: url('<?php echo $image2[0] ?>')">

                    </div>

                    <div style="display: none">
                        <div class="firstName"><?php the_field('first_name')?></div>
                        <div class="lastName"><?php the_field('last_name')?></div>
                        <div class="jobTitle"><?php the_field('job_title')?></div>
                        <div class="andTitle"><?php the_field('and_title')?></div>
                        <div class="careerBackground"><?php the_field('career_background')?></div>
                        <?php if (get_field('role')) {?>
                            <div class="role"><?php the_field('role')?></div>
                        <?php } ?>
                        <div class="superheroPower"><?php the_field('superhero_power')?></div>
                        <div class="image"><?php echo $image3[0] ?></div>
                    </div>
                </div>
                <?php $index++ ?>
            <?php endforeach; wp_reset_postdata(); endif; ?>
        </div>

        <div class="profile-template" style="display: none">
            <div class="profile-image" style="background-position:center">

            </div>
            <div class="profile-content">
                <div class="profile-close"><i class="fa fa-times"></i></div>
                <div class="title profile-name"></div>
                <div class="title simple profile-job"><small></small></div>
                <div class="subtitle">Career Background</div>
                <p class="profile-career-background"></p>
                <br/>
                <div class="subtitle">Role</div>
                <p class="profile-role"></p>
                <br/>
                <div class="subtitle">Superhero Power</div>
                <p class="profile-superhero-power"></p>
            </div>
        </div>

    </div>


    <?php if( have_rows('layout-2') ): while ( have_rows('layout') ) : the_row(); ?>
        <?php require('flex.php') ?>
    <?php endwhile; else : endif; ?>

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