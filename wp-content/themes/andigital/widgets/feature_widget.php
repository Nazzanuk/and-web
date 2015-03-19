<?
// Creating the widget 
class feature_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'feature_widget', 

		// Widget name will appear in UI
		__('Feature', 'feature_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Feature image for a page', 'feature_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

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

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'feature_widget_domain' );
	}
	pco_image_field( $this, $instance,array( 'title' => 'Feature Image', 'field' => 'image1' ));
?>



<!-- admin form start -->

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';

	return $instance;
}
} // Class feature_widget ends here
?>
