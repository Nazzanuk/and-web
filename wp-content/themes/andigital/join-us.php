<?php
/*
Template Name: join-us
*/
include "headers.php" 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><? the_title(); ?> - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
</head>

<body class="join-us">
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>




<! -- HEADER -->

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





<! -- HEADER END -->


<! -- FEATURE START -->

<div id="feature" style="position:relative">
	<? if($instance['image1']){ ?>
    	<img id="feature-img" src="<? echo wp_get_attachment_url($instance['image1']);?>" data-0="top:0px" data-950="top:-300px" onload="Feature.imageLoaded()"/>
    <? } ?>
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

<!-- page content --><div id="page-content">


<! -- FEATURE END -->

<! -- TABS START -->

$label1 = apply_filters( 'widget_title', $instance['label1'] );
	$label2 = apply_filters( 'widget_title', $instance['label2'] );
	$url1 = apply_filters( 'widget_title', $instance['url1'] );
	$url2 = apply_filters( 'widget_title', $instance['url2'] );
	$selected = apply_filters( 'widget_title', $instance['selected'] );
	$isSelected = array('','');
	$isSelected[$selected - 1] = ' selected';

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="tabs" class="tabs-wrapper version-2">
	<div class="tabs">
		<a href="../<? echo $url1; ?>" class="<? echo $isSelected[0]; ?> tab-1"><? echo $label1; ?></a>
		<div class="divider"></div>
		<a href="../<? echo $url2; ?>" class="<? echo $isSelected[1]; ?> tab-2"><? echo $label2; ?></a>
	</div>
</div>

<script type="text/javascript">
	Header.loadTabs([{label:'<? echo $label1; ?>',url:'<? echo $url1; ?>',selected:'<? echo $isSelected[0]; ?>'},{label:'<? echo $label2; ?>',url:'<? echo $url2; ?>',selected:'<? echo $isSelected[1]; ?>'}]);
</script>


<!-- TABS END -->



<!-- VIMEO -->

$title = apply_filters( 'widget_title', $instance['title'] );
	$text = nl2br(apply_filters('widget_text', $instance['text']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="vimeo-video">
	<?php if (isset($title) && $title != '') {?>
	<h2 id="title">
		<? echo $title; ?>
		<div class="underline-2"></div>
	</h2>
	<?php }?>
	
	<?php if (isset($text) && $text != '') {?>
	<div class="text">
    	<p><? echo $text; ?></p>
    </div>
	<?php }?>
    
    <div class="flex-video widescreen vimeo">
    	<iframe class="vimeo" src="//player.vimeo.com/video/<? echo $text2; ?>?title=0&amp;byline=0&amp;portrait=0" allowfullscreen></iframe>
    </div>
</section>



<!-- VIMEO END -->


<! -- BENEFITS -->

$title = apply_filters( 'widget_title', $instance['title'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );	
	$title4 = apply_filters( 'widget_title', $instance['title4'] );	
	$title5 = apply_filters( 'widget_title', $instance['title5'] );	
	$title6 = apply_filters( 'widget_title', $instance['title6'] );		
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	$text3 = nl2br(apply_filters('widget_text', $instance['text3']));
	$text4 = nl2br(apply_filters('widget_text', $instance['text4']));
	$text5 = nl2br(apply_filters('widget_text', $instance['text5']));
	$text6 = nl2br(apply_filters('widget_text', $instance['text6']));		
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="benefit-columns" class="no-underline">
    <div class="benefit-images">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
    	<div class="image-container-1">
	    	<img class="benefit-background-image-1" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	    </div>	
	<? } ?>
	<? if ( ! empty( $instance['backgroundImage2'] ) ) { ?>
		<div class="image-container-2">
	    <img class="benefit-background-image-2" src="<? echo wp_get_attachment_url($instance['backgroundImage2']);?>"/> 
	    </div>
	<? } ?>	    
    </div>
	<h2>Benefits	    
        <div class="underline-2"></div>
	</h2>
    <hr>
    <div class="benefit-row">
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title1; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>			    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text1; ?></p>
        </div>
	</div> 
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title2; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text2; ?></p>
        </div>
	</div>
    <hr>          
    </div>   
    <div class="benefit-row">
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title3; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text3; ?></p>
        </div>
	</div>
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title4; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text4; ?></p>
        </div>
	</div>
    <hr>         
    </div>
    <div class="benefit-row">    
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image5']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title5; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text5; ?></p>
        </div>
	</div>
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image6']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title6; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text6; ?></p>
        </div>
	</div> 
    <hr>        
    </div>        
    <div class="clear"></div>        		     		    		    
	     		    		    
</section> 

<!-- BENEFITS END -->

<!-- PROCESS START -->

<! -- PROCESS END -->

<! -- ANDACADEMY TEXT BIT -->

$title = apply_filters( 'widget_title', $instance['title'] );
	$text = nl2br(apply_filters( 'widget_title', $instance['text'] ));

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="text-1">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
	    <img class="background-image" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	<? } ?>

	<div class="paragraph">
		<? if($title){ ?>
		<h2><? echo $title; ?>
		    <div class="underline-2"></div>
		</h2>
		<? } ?>
		<p><? echo $text; ?></p>
	</div>
</section>

<!-- ANDACADEMY TEXT BIT END -->

<!-- CAREERS -->

$title = apply_filters( 'widget_title', $instance['title'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );	
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="join-us-columns" class="no-underline">
    <div class="join-images">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
	    <img class="join-background-image-1 show" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	<? } ?>
	<? if ( ! empty( $instance['backgroundImage2'] ) ) { ?>
	    <img class="join-background-image-2 hide" src="<? echo wp_get_attachment_url($instance['backgroundImage2']);?>"/> 
	<? } ?>
    </div>
	<h2><? echo $title; ?>
	    <div class="underline-2"></div>
    </h2>
	 <div id="tabs" class="join-tabs-wrapper version-2">
		<div class="join-tabs">
			<div class="graduatetab selected">Graduates</div>
			<div class="divider"></div>
			<div class="experiencedtab">Experienced</div>
		</div>
	</div>    
		<div class="join-us-column1 visible">
		    <p class="join-us-text"><? echo $text1; ?></p>
		    <div style="margin:0 auto;width:100%;">
		    <a href="http://graduates.andigital.com/" class="button">Find out More</a>
		    </div>
		</div> 
		<div class="join-us-column2">
		    <p class="join-us-text"><? echo $text2; ?></p>
		    <div style="margin:0 auto;width:100%;">
		    <a href="./jobs/" class="button">Find out More</a>
		    </div>
		</div>  		
    <div class="clear"></div>        		     		    		    
</section>  

<!-- CAREERS END -->






	<? if (is_active_sidebar('join-us-content')) dynamic_sidebar('join-us-content'); ?>
    <? get_template_part('footer'); ?>
</body>

</html>
