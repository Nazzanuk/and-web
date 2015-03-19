<meta name = "viewport" content = "initial-scale = 1.0, maximum-scale = 1.0, width = device-width">
<meta property="og:site_name" content="ANDigital" /> 
<meta property="og:url" content="<? echo get_permalink(); ?>" />
<?
	if (get_custom_field('og_type:raw')) {
		?> <meta property="og:type" content="<? echo get_custom_field('og_type:raw'); ?>" /> <? 
	} else {
		?> <meta property="og:type" content="article" /> <? 
	}
	if (get_custom_field('og_title:raw')) {
		?> <meta property="og:title" content="<? echo get_custom_field('og_title:raw'); ?>" /> <? 
	} else {
		?> <meta property="og:title" content="<? the_title(); ?> - ANDigital" /> <? 
	}
	if (get_custom_field('og_description:raw')) {
		?> <meta property="og:description" content="<? echo get_custom_field('og_description:raw'); ?>" /> <? 
	}
	if (get_custom_field('og_image:to_image_src')) {
		?> <meta property="og:image" content="<? echo get_custom_field('og_image:to_image_src'); ?>" /> <?
	}
?>
