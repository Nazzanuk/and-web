<?
// Creating the widget 
class footer_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'footer_widget', 

		// Widget name will appear in UI
		__('Footer', 'footer_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Footer for a page', 'footer_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$linkedinUrl = apply_filters( 'widget_title', $instance['linkedinUrl'] );
	$facebookUrl = apply_filters( 'widget_title', $instance['facebookUrl'] );
	$twitterUrl = apply_filters( 'widget_title', $instance['twitterUrl'] );

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div><!-- page content -->

<footer>
	<div class="content">
		<div class="social">
			<a href="<? echo $facebookUrl; ?>" target="_blank"><img src="<? getThemeDir(); ?>/img/footer/facebook.png"/></a>
			<a href="<? echo $twitterUrl; ?>" target="_blank"><img src="<? getThemeDir(); ?>/img/footer/twitter.png"/></a>
			<a href="<? echo $linkedinUrl; ?>" target="_blank"><img src="<? getThemeDir(); ?>/img/footer/linkedin.png"/></a>
		</div>

		<div class="legal">
			<a class="privacy" href="<? echo get_site_url(); ?>/privacy-policy">Privacy Policy</a>
			<a class="terms" href="<? echo get_site_url(); ?>/terms-of-use">Terms of Use</a>
			<div class="clear"></div>
		</div>

		<div class="copyright">&copy;2015 ANDigital. All rights reserved.</div>
	</div>
</footer>

<script type="text/javascript">
	$(function(){
		SectionsMenu.init();

		//skrollr
		if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
			skrollr.init({
				forceHeight: false
			});

			$('#feature #feature-img').addClass('parallax');
			$('#page-content').addClass('parallax');
		}
	})
</script>

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {

	if( isset( $instance[ 'linkedinUrl' ] ) ){
		$linkedinUrl = $instance[ 'linkedinUrl' ];
	}else {
		$linkedinUrl = __( 'Url', 'footer_widget_domain' );
	}

	if( isset( $instance[ 'facebookUrl' ] ) ){
		$facebookUrl = $instance[ 'facebookUrl' ];
	}else {
		$facebookUrl = __( 'Url', 'footer_widget_domain' );
	}

	if( isset( $instance[ 'twitterUrl' ] ) ){
		$twitterUrl = $instance[ 'twitterUrl' ];
	}else {
		$twitterUrl = __( 'Url', 'footer_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'facebookUrl' ); ?>"><? _e( 'Facebook Url:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'facebookUrl' ); ?>" name="<?php echo $this->get_field_name( 'facebookUrl' ); ?>" type="text" value="<?php echo esc_attr( $facebookUrl ); ?>" />
</p>
<p>
	<label for="<? echo $this->get_field_id( 'twitterUrl' ); ?>"><? _e( 'Twitter Url:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'twitterUrl' ); ?>" name="<?php echo $this->get_field_name( 'twitterUrl' ); ?>" type="text" value="<?php echo esc_attr( $twitterUrl ); ?>" />
</p>
<p>
	<label for="<? echo $this->get_field_id( 'linkedinUrl' ); ?>"><? _e( 'LinkedIn Url:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'linkedinUrl' ); ?>" name="<?php echo $this->get_field_name( 'linkedinUrl' ); ?>" type="text" value="<?php echo esc_attr( $linkedinUrl ); ?>" />
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['linkedinUrl'] = ( ! empty( $new_instance['linkedinUrl'] ) ) ? strip_tags( $new_instance['linkedinUrl'] ) : '';
	$instance['facebookUrl'] = ( ! empty( $new_instance['facebookUrl'] ) ) ? strip_tags( $new_instance['facebookUrl'] ) : '';
	$instance['twitterUrl'] = ( ! empty( $new_instance['twitterUrl'] ) ) ? strip_tags( $new_instance['twitterUrl'] ) : '';

	return $instance;
}
} // Class footer_widget ends here
?>
