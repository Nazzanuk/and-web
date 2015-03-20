<?php /* Template Name: home */ ?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ANDigital</title>

    <link rel="stylesheet" href="bower.css"/>
    <link rel="stylesheet" href="app.css"/>
    <link rel="stylesheet" href="fonts/stylesheet.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory(); ?>bower.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory(); ?>app.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory(); ?>fonts/stylesheet.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
</head>
<body ng-app="andigital">
<div data-component="header" ng-controller="HeaderController">
    <header id="header-transparent">
        <div class="container-fluid">
            <img class="logo" src="img/logo-transparent.png" alt=""/>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <header id="header">
        <div class="container-fluid">
            <img class="logo" src="img/logo.png" alt=""/>

            <div class="menu-button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
</div>
<div data-component="home">
    <div class="hero">
        <div class="container-fluid">
            <!--<div class="row">-->
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div class="feature">
                    ANDigital: Building Your Digital Future
                    <br/>
                    <br/>

                    <div class="and-button">Find Out More</div>
                </div>
            </div>
            <!--</div>-->

        </div>
    </div>

    <div class="quote" style="background-image: url('img/quote.jpg')">

        <div class="container-fluid">
            <!--<div class="row">-->
            <div class="col-sm-4 col-md-5 col-lg-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-4">
                <div class="quote-text">
                    <p>
                        Working with clients to build brilliant digital products and provide the training to grow their
                        own digital capability for the future.
                    </p>
                </div>
            </div>
            <!--</div>-->

        </div>
    </div>

    <div class="features">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-4">
                    <div class="feature">
                        <div class="row">
                            <img src="http://andigital.com/wp-content/uploads/2014/09/Home-Academy.jpg" alt=""/>
                        </div>

                        <div class="title">ANDacademy</div>
                        <p>
                            Our belief in life-long learning for our people and clients led us to set up the
                            market-leading
                            ANDacademy. We kick things off with ANDbootcamp, a core experienced based learning programme
                            focused on delivery techniques, digital and technology and followed up with expert training,
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
                            Meet the brilliantly curious people at ANDigital who, together with our clients, are constantly exploring and developing new ways to build extraordinary digital products.
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
                            You’re a digital dynamo and, at ANDigital, that means you get to work for some amazing clients in joint teams to provide the scale and skills they need to create ground-breaking digital products. We call this SKALING. And, to ensure your light never fades, we provide life-long learning through our ANDacademy.
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

<script src="bower.js"></script>
<script src="app.js"></script>
</body>
</html>