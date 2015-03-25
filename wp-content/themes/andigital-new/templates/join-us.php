<?php /* Template Name: Join Us */ ?><!DOCTYPE html>
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
<div data-component="what-we-do" ng-controller="JoinUsController">
    <div class="hero">
        <div class="hero parallax" style="background-image: url('http://andigital.com/wp-content/uploads/2014/09/Join-Us-Feature.jpg')"></div>
        <h1 class="hero-title">Join Us</h1>
    </div>

    <div class="sub-pages">
        <a class="sub-page active">Overview</a>
        <a href="/join-us/jobs" class="sub-page">Jobs</a>
    </div>

    <div class="quote">
        <iframe src="https://player.vimeo.com/video/112048456?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2014/09/Shanil.jpg')">
        <div class="title">Benefits</div>

        <div class="container">
            <div class="quote-benefit">
                <div class="row">
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">Share In Our Success</h3>

                        <p>We're all shareholders and share a passion for making this a remarkable place to work.</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-byod.png" alt=""/>

                        <h3 class="subtitle">Bring Your Own Devices</h3>

                        <p>The best of both worlds; the choice of your own device and technology and access to all of
                            ours.</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">Share In Our Success</h3>

                        <p>We're all shareholders and share a passion for making this a remarkable place to work.</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">Bring Your Own Devices</h3>

                        <p>The best of both worlds; the choice of your own device and technology and access to all of
                            ours.</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">Share In Our Success</h3>

                        <p>We're all shareholders and share a passion for making this a remarkable place to work.</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">Bring Your Own Devices</h3>

                        <p>The best of both worlds; the choice of your own device and technology and access to all of
                            ours.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2014/09/Charlotte.jpg')">
        <div class="title">Our Process</div>

        <div class="container">
            <div class="quote-benefit-alt">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">All About You</h3>

                        <p>In your application give us the low-down on your background and experience and how you might
                            be a great fit. Tell us what makes you one of a kind - at ANDigital we really encourage
                            individuality. As you can see from the Leprechauns, Olympians and Martial Artists on the
                            team, we’re quite a unique bunch. What will you bring to the party?</p>
                    </div>
                    <div class="col-sm-12 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">All About You</h3>

                        <p>In your application give us the low-down on your background and experience and how you might
                            be a great fit. Tell us what makes you one of a kind - at ANDigital we really encourage
                            individuality. As you can see from the Leprechauns, Olympians and Martial Artists on the
                            team, we’re quite a unique bunch. What will you bring to the party?</p>
                    </div>
                    <div class="col-sm-12 clearfix">
                        <img src="http://andigital.com/wp-content/uploads/2014/08/join-us-ownership.png" alt=""/>

                        <h3 class="subtitle">All About You</h3>

                        <p>In your application give us the low-down on your background and experience and how you might
                            be a great fit. Tell us what makes you one of a kind - at ANDigital we really encourage
                            individuality. As you can see from the Leprechauns, Olympians and Martial Artists on the
                            team, we’re quite a unique bunch. What will you bring to the party?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2014/09/Holly1.jpg')">
        <div class="title">ANDacademy</div>

        <div class="quote-left-text">
            <p>Our people are life-long learners. People who want to continuously learn and share their knowledge.<br>
                At ANDigital we provide you with everything you need for this through our ANDacademy. It’s a core part
                of our business and every new joiner to ANDigital will start in ANDbootcamp, our unique 5 week training
                programme. <br>
                <br>
                You’ll be brought up to speed with all areas of our business:<br>
                - our culture and values<br>
                - our proposition and journey<br>
                - our expertise – digital, delivery and technology<br>
                - our environments – professional, client facing skills and your specific role</p>
        </div>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2014/09/Ruairi1.jpg')">
        <div class="title">Careers</div>

        <div class="sub-pages" style="background: none">
            <span class="sub-page" ng-class="{active:isCareer(0)}" ng-click="setCareer(0)">Graduates</span>
            <span class="sub-page" ng-class="{active:isCareer(1)}" ng-click="setCareer(1)">Experienced</span>
        </div>
        <br/>

        <div class="quote-left-text" data-career="0">
            <p>
                As an Associate you’ll learn with the rest of the squad AND you’ll get to take modules specific to your experience level and role.
            </p>

            <p>
                You’ll be supported the whole way through by your squad and gain valuable insights into your strengths and development areas through feedback from your squad lead.
            </p>

            <p>
                At the end of ANDbootcamp you’ll set your ANDplan – your 12 month development plan. This doesn’t just detail the training you want to go on, but also takes into account your participation in ANDacademy communities where you can help others become life-long learners.
            </p>

            <p>
                Our competency framework provides you with clear expectations at every level and you’ll be supported by head coaches and squad leads to achieve them. There are quarterly opportunities to progress to the next level.
            </p>

            <p style="text-align: center">
                <a class="and-button">Find Out More</a>
            </p>
        </div>

        <div class="quote-left-text" data-career="1">
            <p>
                As an Experienced Hire you’ll support your squad during ANDbootcamp and share your experiences. You’ll
                take modules to build your coaching and development skills and professional skills in a client
                environment and dive deeper into your role. You’ll also become a certified Scrum Master.
            </p>

            <p>
                Through ANDacademy you’ll seek new innovative ways to support your teams and clients and share these
                within communities. Your feedback will help us adapt and improve the content of our ANDbootcamps and
                ANDacademy.
            </p>

            <p>

                Our competency framework provides you with clear expectations at every level and you’ll be supported by
                head coaches and squad leads to achieve them. There are quarterly opportunities to progress to the next
                level.
            </p>

            <p style="text-align: center">
                <a class="and-button">Find Out More</a>
            </p>
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