<?
// Creating the widget 
class home_feature_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'home_feature_widget', 

		// Widget name will appear in UI
		__('Home Feature', 'home_feature_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Home Feature image for a page', 'home_feature_widget_domain' ), ) 
	);			
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$url1 = apply_filters( 'widget_title', $instance['url1'] );


//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

    <div id="feature">
        <a href="<? echo get_site_url(); ?>/<? echo $url1; ?>">
            <img id="feature-img" src="<? echo wp_get_attachment_url($instance['image1']);?>" data-0="top:0px" data-952="top:300px" onload="Feature.imageLoaded()"/>
            <div class="outer">
                <div class="inner">
                    <div id="feature-text">
                        <? echo $text1; ?>
                        <div class="feature-button button"> 
                            Find Out More 
                        </div>
                    </div>
                </div>
            </div>
        </a>
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
	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'home_feature_widget_domain' );
	}
	//url
	if ( isset( $instance[ 'url1' ] ) ) {
		$url1 = $instance[ 'url1' ];
	}else {
		$url1 = __( 'what-we-do', 'home_feature_widget_domain' );
	}	
?>



<!-- admin form start -->

<div style="border: 1px solid #e5e5e5; padding: 0 0 20px 0">
	<? pco_image_field( $this, $instance,array( 'title' => 'Feature Image', 'field' => 'image1' )); ?>
    <p>
	    <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><strong><?php _e( 'Feature Text:' ); ?></strong></label> 
		<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
	</p>
	<p>
		<label name="urlLabel"><strong> Relative URL: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url1' ); ?>" name="<?php echo $this->get_field_name( 'url1' ); ?>" type="text" value="<?php echo esc_attr( $url1 ); ?>" />
	</p>
</div>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['url1'] = ( ! empty( $new_instance['url1'] ) ) ? strip_tags( $new_instance['url1'] ) : '';
	return $instance;
}
} // Class home_feature_widget ends here
?>
