<?php
/*
Template Name: What We Do New
include "headers.php"
*/

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php the_title(); ?> - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>

	<link href="<? getThemeDir(); ?>/css/pages/what-we-do-new.css" rel="stylesheet" type="text/css" />
	<link href="<? getThemeDir(); ?>/css/pages/what-we-do-carousel-new.css" rel="stylesheet" type="text/css" />

	<? wp_head() ?>
</head>

<body>
<? get_template_part('analytics'); ?>
<? get_template_part('header'); ?>
<?


//Header

$type = 'default';

//if ( ! empty( $title ) )
//echo '<h1>' . $title . '</h1>';

?>

<?
$class = $type;
$logo1 = 'white/logo.png';
$logo2 = 'red/logo.png';
$link1 = 'white/menu.png';
$link2 = 'red/menu.png';
$share1 = 'white/share.png';
$share2 = 'red/share.png';

if($type == 'type-red'){
	$logo1 = 'red/logo.png';
	$link1 = 'red/menu.png';
	$share1 = 'red/share.png';
}
?>

<header class="<? echo $class; ?>">
	<div class="background"></div>

	<div class="logo">
		<a class="logo-img" href="<? echo get_site_url(); ?>"><img src="<? getThemeDir(); ?>img/header/<? echo $logo1; ?>"/></a>
		<a class="logo-red-img" href="<? echo get_site_url(); ?>"><img src="<? getThemeDir(); ?>img/header/<? echo $logo2; ?>"/></a>
	</div>

	<div id="menu-link">
		<img class="link-img" src="<? getThemeDir(); ?>img/header/<? echo $link1; ?>"/>
		<img class="link-red-img" src="<? getThemeDir(); ?>img/header/<? echo $link2; ?>"/>
	</div>

	<? foreach (getCheckPages() as $page) {
	if ($page == get_the_title()) { ?>
	<div id="share-link">
		<img class="share-img" src="<? getThemeDir(); ?>img/header/<? echo $share1; ?>"/>
		<img class="share-red-img" src="<? getThemeDir(); ?>img/header/<? echo $share2; ?>"/>
	</div>
	<? break;}} ?>

	<div class="clear"></div>
</header>

<script type="text/javascript">
	Header.setType('<? echo $type; ?>');
</script>



<?


//Features

$title = 'What We Do';

//if ( ! empty( $title ) )
//echo '<h1>' . $title . '</h1>';

?>

<div id="feature" style="position:relative; z-index:0;">
	<? $image = wp_get_attachment_image_src(get_field('header_image'), 'full'); ?>
	<img id="feature-img" src="<?php echo $image[0]; ?>" data-0="top:0px" data-950="top:-300px" onload="Feature.imageLoaded()"/>

	<h1 data-0="opacity:1" data-500="opacity:0">
		<? if ($title) { ?>
		<? echo $title; ?>
		<div class="underline-1"></div>
		<? } ?>
	</h1>
	<div id="scroll-arrow" data-0="opacity:1" data-500="opacity:0">
		<img src="<? getThemeDir(); ?>img/icons/scroll-arrow.png"/>
	</div>
</div>

<!--DEFINITION OF DIGITAL-->


<?



$title;
$text;
$image;

?>

<section class="dod no-underline">





	<? $image = wp_get_attachment_image_src(get_field('definition_of_digital_background_image'), 'full'); ?>
	<img class="background-image" src="<?php echo $image[0]; ?>"/>


	<div class="text">
		<? if($title){ ?>


		<h2>

			Definition of Digital
			<div class="underline-2">

			</div>

		</h2>
		<? } ?>
		<p><? the_field('definition_of_digital_text'); ?></p>
	</div>


</section>






<!--DEFINITION OF DIGITAL END-->


<!--SERVICES START-->

<?



?>

<section id="services-rows" class="no-underline">
	<div class="services-images">

		<? while ( have_rows('services') ) : the_row(); ?>

		<?// display a sub field  ?>
		<? $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
		<img class="service-image" src="<?php echo $image[0]; ?>"/>


		<? endwhile; ?>

	</div>
	<h2><? the_field('services_title'); ?>
		Services
		<div class="underline-2"></div>
	</h2>
	<div class="services-column-left">
		<div class="services-container">
			<div class="service-row selected">
				<a href="#">
					<div class="service-container">
						<div class="service-title">
							<h4><? the_field('services_title_1'); ?>

								<div class="underline-3"></div>
							</h4>

						</div>

						<div class="service-collapse-icon">
							<img class="expand-icon" src="<? getThemeDir(); ?>/img/what-we-do/expand.png"/>
							<img class="collapse-icon" src="<? getThemeDir(); ?>/img/what-we-do/collapse.png"/>
						</div>
					</div>
				</a>
				<div class="service-collapse-text"></div>
			</div>
			<div class="service-row">
				<a href="#">
					<div class="service-container">
						<div class="service-title">
							<h4><? the_field('services_title_2'); ?>

								<div class="underline-3"></div>
							</h4>
						</div>
						<div class="service-collapse-icon">
							<img class="expand-icon" src="<? getThemeDir(); ?>/img/what-we-do/expand.png"/>
							<img class="collapse-icon" src="<? getThemeDir(); ?>/img/what-we-do/collapse.png"/>
						</div>
					</div>
				</a>
				<div class="service-collapse-text"></div>
			</div>
			<div class="service-row">
				<a href="#">
					<div class="service-container">
						<div class="service-title">
							<h4><? the_field('services_title_3'); ?>

								<div class="underline-3"></div>
							</h4>
						</div>
						<div class="service-collapse-icon">
							<img class="expand-icon" src="<? getThemeDir(); ?>/img/what-we-do/expand.png"/>
							<img class="collapse-icon" src="<? getThemeDir(); ?>/img/what-we-do/collapse.png"/>
						</div>
					</div>
				</a>
				<div class="service-collapse-text"></div>
			</div>
			<div class="service-row">
				<a href="#">
					<div class="service-container">
						<div class="service-title">
							<h4><? the_field('services_title_4'); ?>

								<div class="underline-3"></div>
							</h4>
						</div>
						<div class="service-collapse-icon">
							<img class="expand-icon" src="<? getThemeDir(); ?>/img/what-we-do/expand.png"/>
							<img class="collapse-icon" src="<? getThemeDir(); ?>/img/what-we-do/collapse.png"/>
						</div>
					</div>
				</a>
				<div class="service-collapse-text"></div>
			</div>
		</div>
		<div class="service-icon">
			<img class="selected-icon" src="<? getThemeDir(); ?>/img/what-we-do/service-arrow.png"/>
		</div>
	</div>
	<div class="services-column-right">
		<div class="service-text"><p class="service-paragraph"><? the_field('services_text_1'); ?></p>

		</div>


		<div class="service-text"><p class="service-paragraph"><? the_field('services_text_2'); ?></p>

		</div>
		<? $image = wp_get_attachment_image_src(get_field('services_image_2'), 'full'); ?>
		<img src="<?php echo $image[0]; ?>"/>
		<div class="service-text"><p class="service-paragraph"><? the_field('services_text_3'); ?></p>

		</div>
		<? $image = wp_get_attachment_image_src(get_field('services_image_3'), 'full'); ?>
		<img src="<?php echo $image[0]; ?>"/>
		<div class="service-text"><p class="service-paragraph"><? the_field('services_text_4'); ?></p>

		</div>
		<? $image = wp_get_attachment_image_src(get_field('services_image_4'), 'full'); ?>
		<img src="<?php echo $image[0]; ?>"/>

	</div>

	<div class="clear"></div>



</section>


<!--SERVICES END-->





<!-- CLIENT CAROUSEL SECTION!!! -->
<section style="position: relative;
background-color: white;">
	<h2 style="margin-top: 26px";>Clients
		<div class="underline-2"></div>

	</h2>
	<div id="intro-text">
		<p><? the_field('carousel_text'); ?></p>




	</div>


	<div id="carousel">

		<? while ( have_rows('carousel') ) : the_row(); ?>

		<?// display a sub field  ?>
		<? $image = wp_get_attachment_image_src(get_sub_field('c_image'), 'full'); ?>
		<img class="roundabout-holder" src="<?php echo $image[0]; ?>"/>


		<? endwhile; ?>









		<!--
        <img src="<? getThemeDir(); ?>/img/what-we-do/slide4.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide5.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide6.png" alt="" class="slide" />
	-->
	</div>


	<!--
    <ul id="carousel-descriptions">
        <li class="desc current">Whitbread<br>
        <p>we did some realy cool stuff for Whitbread</p>
        </li>
        <li class="desc">Argos<br>
        <p>did some stuff for Argos too</p>
        </li>

        <li class="desc">Travis Perkins<br>
        <p>did some stuff for TP too</p></li>

        <!--
        <li class="desc">New Look<br>
        <p>did some stuff for NL too</p></li>
        <li class="desc">Achica<br>
        <p>did some stuff for Achica too</p></li>
        <li class="desc">TUI Travel<br>
        <p>did some stuff for TUI too</p></li>

    </ul>
    -->
	<div id="carousel-controls">
		<span class="control current"></span>
		<span class="control"></span>
		<span class="control"></span>
		<span class="control"></span>
		<!--
            <span class="control"></span>
            <span class="control"></span>
            <span class="control"></span>
            -->
	</div>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<? getThemeDir(); ?>js/jquery.roundabout.min.js"></script>
	<script type="text/javascript" src="<? getThemeDir(); ?>js/pages/what-we-do-carousel-new.js"></script>
	<script type="text/javascript" src="<? getThemeDir(); ?>js/pages/what-we-do-new.js"></script>

</section>
<!--CLIENT CAROUSEL SECTION END!!! -->


<hr>

<!--PRODUCTS START-->
<!-- PRODUCTS STUFF -->





<!-- OLD PRODUCTS -->

<!--
<section id="casestudy" class="columns-3">
<h2>Products
<div class="underline-2"></div>
</h2>
<div class="images">



</div>
<div class="column">

    <h3>
-->
<!--

<!-- <? the_field('case_study_title_1'); ?>
		<div class="underline-3"></div>
		</h3>
      //*  <? $image = wp_get_attachment_image_src(get_field('case_study_image_1'), 'full'); ?>
        <img src="<?php echo $image[0]; ?>"/>
		<p class="column-paragraph"><? the_field('case_study_text_1'); ?></p>
  <!--    <div class="button" type="button" style="margin-top: 0px;">Read more</div> -->
<!--
    </div>
	<div class="column middle">
		<h3><? the_field('case_study_title_2'); ?>
		<div class="underline-3"></div>
		</h3>
        <? $image = wp_get_attachment_image_src(get_field('case_study_image_2'), 'full'); ?>
        <img src="<?php echo $image[0]; ?>"/>
        <p class="column-paragraph"><? the_field('case_study_text_2'); ?></p>
<!--<div class="button" type="button" style="margin-top: 0px;">Read more</div> -->
<!--
    </div>
	<div class="column">
		<h3><? the_field('case_study_title_3'); ?>
		<div class="underline-3"></div>
		</h3>
        	<? $image = wp_get_attachment_image_src(get_field('case_study_image_3'), 'full'); ?>
         <img src="<?php echo $image[0]; ?>"/>
		<p class="column-paragraph"><? the_field('case_study_text_3'); ?></p>
 <!--   <div class="button" type="button" style="margin-top: 0px;">Read more</div> -->
<!--
</div>
<div class="clear"></div>

-->




<!-- OLD PRODUCTS END -->




<section id="casestudies" class="columns-3" style="position: relative;
background-color: white;">
	<h2>Products <div class="underline-2"></div>
	</h2>
	<hr>

		<hr>

		<? while (have_rows('case_studies') ) : the_row(); ?>
		<hr>

		<div class="column collapse-row">
			<a class="column-anchor" href="#">
				<div class="column-container">
					<div class="column-title">
						<h3> <? the_sub_field('cs_title'); ?> <div class="underline-3"></div>
						</h3>
					</div>
					<div class="column-icon">
						<img class="expand-icon" src="http://andigital.com/wp-content/themes/ANDigital1.3//img/join-us/expand.png">
						<img class="collapse-icon" src="http://andigital.com/wp-content/themes/ANDigital1.3//img/join-us/collapse.png">
					</div>
				</div>
			</a>

			<div class="column-text collapse-text" defaultheight="1005" style="height: auto;">
				<a href="<? the_sub_field('cs_link'); ?>">
					<div class="column-image">
						<? $image = wp_get_attachment_image_src(get_sub_field('cs_image'), 'full'); ?>
						<img src="<?php echo $image[0]; ?>">
					</div>
				</a>
				<p class="column-paragraph">
					<? the_sub_field('cs_text'); ?>
				</p>
				<a href="<? the_sub_field('cs_text'); ?>">
					<div class="button-div">
						<div class="button" type="button" style="margin-top: 0px;">Read more</div>
					</div>
				</a>
			</div>
		</div>
		<hr>
		<? endwhile; ?>
	<div class="clear"></div>
</section>










<!--CASE STUDY END -->




<!--ANDACADEMY START -->


<a name="academy" style="position: relative;
background-color: white;"></a>
<section id="academy" style="position: relative;
background-color: white;">
	<div id="academy-feature" style="position:relative;">
		<img id="academy-image" src="http://andigital.com/wp-content/uploads/2014/09/academy-1.jpg" onload="(function(a){window.CloudFlare &amp;&amp; window.CloudFlare.push(function(b){b([&quot;cloudflare/rocket&quot;],function(c){c.push(function(){(function(){Page.resize()}).call(a)})})})})(this);">
		<h2 id="academy-title">
			ANDacademy <div class="underline-2"></div>
		</h2>
	</div>
	<div class="text" style="
">


		<p><? the_field('andacademy_text'); ?>
		</p>
	</div>
	<div class="academy-video">
		<div class="flex-video widescreen vimeo" style="width: 500px; height: 278px;">
			<iframe class="vimeo" src="//player.vimeo.com/video/112052203?title=0&amp;byline=0&amp;portrait=0" allowfullscreen="" style="width: 500px; height: 278px;"></iframe>
		</div>
	</div>
</section>



<!--ANDACADEMY END -->




<script type="text/javascript">
	Header.setType('<? echo $type; ?>');
</script>








<? get_template_part('footer'); ?>
</body>

</html>