<?php
/*
Template Name: WWD_Carousel
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Roundabout Test</title>

    <link rel="stylesheet" type="text/css" href="<? getThemeDir(); ?>/css/pages/what-we-do-carousel.css">
</head>
<body> 


<div id="carousel">
	<img src="<? getThemeDir(); ?>/img/what-we-do/hub-logo.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide2.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide3.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide4.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide5.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide6.png" alt="" class="slide" />
	
</div>

<ul id="carousel-descriptions">
	<li class="desc current">Whitbread<br>
    <p>we did some realy cool stuff for Whitbread</p>
    </li>
	<li class="desc">Argos<br>
    <p>did some stuff for Argos too</p>
    </li>
    
	<li class="desc">Travis Perkins<br>
    <p>did some stuff for TP too</p></li>
	<li class="desc">New Look<br>
    <p>did some stuff for NL too</p></li>
	<li class="desc">Achica<br>
    <p>did some stuff for Achica too</p></li>
	<li class="desc">TUI Travel<br>
    <p>did some stuff for TUI too</p></li>
	
</ul>

<div id="carousel-controls">
	<span class="control current"></span>
	<span class="control"></span>
	<span class="control"></span>
	<span class="control"></span>
	<span class="control"></span>
	<span class="control"></span>
	
</div>
    
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<? getThemeDir(); ?>js/jquery.roundabout.min.js"></script>
    <script type="text/javascript" src="<? getThemeDir(); ?>js/pages/what-we-do-carousel-new.js"></script>
</body>
</html>