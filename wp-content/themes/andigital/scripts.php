<script src="<? getThemeDir(); ?>js/jquery-1.11.1.js"></script>
<script src="<? getThemeDir(); ?>js/modernizr.js"></script>
<script src="<? getThemeDir(); ?>js/html5shiv.js"></script>
<script src="<? getThemeDir(); ?>js/skrollr.js"></script>

<!--<script src="<? getThemeDir(); ?>js/jquery.roundabout.min.js"</script> -->
<script src="<? getThemeDir(); ?>js/site.js<? printVersion() ?>"></script>
<? // We need to assign the theme dir before loading the page js ?>
<script>
	jQuery(function() {
		Site.dir = '<? getThemeDir(); ?>';
	});
</script>
<? if (get_custom_field('google_maps_api:raw') == 1) : ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<? endif ?>
<script src="<? getThemeDir(); ?>js/pages/<? print_custom_field('script:to_link_ref') ?><? printVersion() ?>"></script>