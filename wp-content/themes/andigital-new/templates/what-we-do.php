<?php /* Template Name: What We Do */ ?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ANDigital</title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bower.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css"/>
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
<div data-component="what-we-do" ng-controller="WhatWeDoController">
    <? $image = wp_get_attachment_image_src(get_field('header_image'), 'full'); ?>
    <div class="hero" style="background-image: url('<? echo $image[0] ?>')">
        <h1 class="hero-title">What We Do</h1>
    </div>

    <div class="quote" style="background-image: url('http://andigital.com/wp-content/uploads/2015/02/dod-2.jpg')">
        <div class="title">Definition of Digital</div>

        <div class="container-fluid">
            <div class="quote-center-text">
                <p>
                    To us, digital covers everything from the largest multi-channel platform to the smallest app. We
                    work
                    with clients, providing project ready experts so that together, we help to create the most
                    compelling
                    digital experience for their customers. We like to keep digital delivery simple, providing
                    capability
                    from user experience and product analysis to software engineering and project leadership. Delivering
                    both the scale and the skills our clients need . We call this Skaling.
                </p>

                <p>
                    We’re with you from the project inception to launch, and beyond.
                </p>
            </div>
        </div>
    </div>

    <div class="quote services"
         style="background-image: url('http://andigital.com/wp-content/uploads/2015/02/rebecca-3.jpg')">
        <div class="title">Services</div>

        <div class="container-fluid">
            <div class="quote-center-text" data-service="0">
                <p>
                    As a first step, we engage with our clients to shape and agree the partnership framework for
                    Skaling. This framework looks at understanding their delivery team needs for both team augmentation
                    and requirements necessary for upskilling. We want to get this right from the beginning!
                </p>
            </div>

            <div class="quote-center-text" data-service="1">
                <p>
                    Once there’s a common understanding, our team completes the practical aspects of setting up the
                    Skaling framework. This can include: understanding the current technology landscape, the current
                    team skills and roles, the product development roadmap, putting in place the right number of
                    ANDigital people to augment the delivery team, forming a plan to close the existing skills gap for
                    the client’s product delivery team and various other items that arise as part of professionalising
                    digital. We cover a lot during a short space of time with you!
                </p>
            </div>

            <div class="quote-center-text" data-service="2">
                <p>
                    Once we establish what we’re doing and how we’re doing it, we land at the heart of the Skaling
                    framework. We provide groups of project ready professionals to form complete multi-skilled teams,
                    working together with our client team. While building great software products, we’re simultaneously
                    upskilling our clients through ANDacademy – our hub for life-long learning. This is when our clients
                    really see the benefit of working with ANDigital!
                </p>
            </div>

            <div class="quote-center-text" data-service="3">
                <p>
                    Even after the product has launched, we won’t leave your side, unless you want us to! We provide
                    on-going upskilling through coaching, mentoring and training so together we can continue to grow our
                    long-term relationship.
                </p>
            </div>
        </div>
    </div>

    <div class="content-switcher">
        <table>
            <tr>
                <td ng-class="{active:isActiveService(0)}" ng-click="setActiveService(0)">
                    <div class="title">Form</div>
                </td>
                <td ng-class="{active:isActiveService(1)}" ng-click="setActiveService(1)">
                    <div class="title">Activate</div>
                </td>
                <td ng-class="{active:isActiveService(2)}" ng-click="setActiveService(2)">
                    <div class="title">Perform</div>
                </td>
                <td ng-class="{active:isActiveService(3)}" ng-click="setActiveService(3)">
                    <div class="title">Assist</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="quote">
        <div class="title">Clients</div>

        <div class="container-fluid">
            <div class="quote-center-text">
                <p>
                    We have a track record of building great digital products and upskilling teams for some of the
                    world’s leading brands.
                </p>
            </div>
                <div class="owl-carousel" id="clients-carousel">
                    <div>
                        <img src="http://andigital.com/wp-content/uploads/2015/03/wbread-2.jpg" alt=""/>
                    </div>
                    <div>
                        <img src="http://andigital.com/wp-content/uploads/2015/03/newlook.jpg" alt=""/>
                    </div>
                    <div>
                        <img src="http://andigital.com/wp-content/uploads/2015/03/tui-logo-big.jpg" alt=""/>
                    </div>
                    <div>
                        <img src="http://andigital.com/wp-content/uploads/2015/03/newachicalogo.jpg" alt=""/>
                    </div>
                </div>
        </div>
    </div>

    <div class="quote">
        <div class="title">Products</div>


        <div class="features">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature">

                            <div class="title">ANDgenie</div>
                            <div class="row">
                                <img class="slim"
                                     src="http://andigital.com/wp-content/uploads/2015/01/website-andgenie-case-study2.png"
                                     alt=""/>
                            </div>
                            <p>
                                Our belief in life-long learning for our people and clients led us to set up the
                                market-leading
                                ANDacademy. We kick things off with ANDbootcamp, a core experienced based learning
                                programme
                                focused on delivery techniques, digital and technology and followed up with expert
                                training,
                                coaching and support through ANDacademy.
                            </p>
                            <br/>

                            <p class="visible-xs">
                                <span class="and-button">Learn More</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature">
                            <div class="row">
                                <img src="http://andigital.com/wp-content/uploads/2014/09/Home-Who-We-Are.jpg" alt=""/>
                            </div>

                            <div class="title">Who We Are</div>
                            <p>
                                Meet the brilliantly curious people at ANDigital who, together with our clients, are
                                constantly exploring and developing new ways to build extraordinary digital products.
                            </p>
                            <br/>

                            <p class="visible-xs">
                                <span class="and-button">Learn More</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature">
                            <div class="row">
                                <img src="http://andigital.com/wp-content/uploads/2014/09/Home-Join-Us.jpg" alt=""/>
                            </div>

                            <div class="title">Join Us</div>
                            <p>
                                You’re a digital dynamo and, at ANDigital, that means you get to work for some amazing
                                clients in joint teams to provide the scale and skills they need to create
                                ground-breaking digital products. We call this SKALING. And, to ensure your light never
                                fades, we provide life-long learning through our ANDacademy.
                            </p>
                            <br/>

                            <p class="visible-xs">
                                <span class="and-button">Learn More</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row hidden-xs" style="text-align: center">
                    <div class="col-sm-4">
                        <p>
                            <span class="and-button">Learn More</span>
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

    <div class="quote">
        <div class="title">ANDacademy</div>

        <div class="container" style="text-align: left">
            <p>
                At ANDigital, we don’t just deliver, we upskill our people and our clients so they’re always a step
                ahead. Upskilling is what ANDacademy is all about.
            </p>

            <p>
                ANDbootcamp is where we kick things off. It’s a 5 week tailored training programme which focusses on our
                areas of expertise – delivery techniques, digital, technology – combined with training in the
                professional skills required to deliver great work. Through our workshop style sessions, teambuilding
                activities, case studies and hands on simulation we build cohesive, poly-skilled teams who are ready to
                respond to our clients’ needs.
            </p>

            <p>
                Our unique ANDbootcamp is also available to our clients and we tailor the core structure and content to
                suit their needs, so people are upskilled in the most relevant areas for their organisation and roles.
            </p>

            <p>
                Following ANDbootcamp, we provide a wealth of upskilling resources in our ANDacademy for our people and
                for clients to share - you’ll find a huge catalogue of learning across classroom training, online
                learning, community development and one-to-one coaching. Our buzzy ANDacademy community site is where
                curious minds share and discuss their passions and knowledge and our Head Coaches provide expert
                opinions and points of view
            </p>
        </div>
        <div class="owl-carousel" id="andacademy-video">

            <!--<div>-->
            <!--<a class="owl-video" href="http://pdl.vimeocdn.com/47964/985/308322086.mp4?token2=1426856043_a39a8288a7d78c9a56c50eff42d3cf14&aksessionid=d2932aa35dcd5fc5"></a>-->
            <!--&lt;!&ndash;<video x-webkit-airplay="allow" preload="metadata" src="http://pdl.vimeocdn.com/47964/985/308322086.mp4?token2=1426853954_305ff8ed028e6e360c588bbf3b83791e&amp;akses-->
            <!--sionid=7a9f9abe4b1f0685"></video>&ndash;&gt;-->
            <!--</div>-->


            <!--<div class="item-video" data-merge="1">-->
            <div>
                <!--<a class="owl-video" href="https://vimeo.com/112052203"></a>-->
                <!--<video x-webkit-airplay="allow" preload="" src="" poster=""></video>-->
                <!--&lt;!&ndash;<video controls preload src="" poster=""></video>&ndash;&gt;-->
                <!--<video controls preload src="http://pdl.vimeocdn.com/47964/985/308322086.mp4?token2=1426856043_a39a8288a7d78c9a56c50eff42d3cf14&aksessionid=d2932aa35dcd5fc5" poster></video>-->

                <iframe src="https://player.vimeo.com/video/112052203" width="500" height="281" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

            </div>

            <!--<div class="item-video">-->
            <!--<a class="owl-video" href="http://vimeo.com/23924346"></a>-->
            <!--</div>-->


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