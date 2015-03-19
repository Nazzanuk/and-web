<? 
	//if (get_custom_field('google_analytics_api:raw') == 1) {
		$options = get_option('andigital_theme_settings');
		if (isset($options) && isset($options['analytics_id']) && isset($options['analytics_type']) && isset($options['analytics_pages']) && $options['analytics_id'] != '') {
			if (in_array(get_the_title(), (array) $options['analytics_pages'])) {
				if ($options['analytics_type'] == 'universal') {
					?>
					<script data-cfasync="false" type="text/javascript">
					  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
						})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
					 	ga('create', '<? echo $options['analytics_id'] ?>', 'auto');
					 	ga('send', 'pageview');
					</script>
					<?
				} else {
					?>
					<script type="text/javascript">
						var _gaq = _gaq || [];
						_gaq.push(['_setAccount', '<? echo $options['analytics_id'] ?>']);
						_gaq.push(['_trackPageview']);
						(function() {
							var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
							ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
						})();
					</script>
					<?
				}
			}
		}
	//} 
?>
