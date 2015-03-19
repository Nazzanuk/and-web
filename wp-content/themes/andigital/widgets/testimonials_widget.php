<?
// Creating the widget 
class testimonials_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'testimonials_widget', 

		// Widget name will appear in UI
		__('Testimonials', 'testimonials_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Testimonials', 'testimonials_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="testimonials-rows">
	<h2><? echo $title; ?>
	    <div class="underline-2"></div>
	</h2>
    <div class="testimonials-row">
		<div class="testimonials-img">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
        </div>
	</div> 
    <div class="testimonials-row">
		<div class="testimonials-text">
			<h3><? echo $title1; ?>
			     <div class="underline-3"></div>
			</h3>
			<div class="underline"></div>
		    <p class="testimonials-paragraph"><? echo $text1; ?></p>
		</div>
	</div> 
    <div class="testimonials-row">
		<div class="testimonials-text">
		    <h3><? echo $title2; ?>
		        <div class="underline-3"></div>
		    </h3>
			<div class="underline"></div>
		    <p class="testimonials-paragraph"><? echo $text2; ?></p>
		</div>
	</div>  	
    <div class="clear"></div>
</section>
<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	//titles
	if( isset( $instance[ 'title' ] ) ){
		$title = $instance[ 'title' ];
	}else {
		$title = __( 'Title', 'testimonials_widget_domain' );
	}

	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'testimonials_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'testimonials_widget_domain' );
	}

	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'testimonials_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'testimonials_widget_domain' );
	}
?>



<!-- admin form start -->
<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><strong><? _e( 'Title:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Company Image 1', 'field' => 'image1' )); ?>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <p>
        <label><strong><?php _e( 'Column  1:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <p>
        <label><strong><?php _e( 'Column  2:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
    </p>
</div>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
	$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	return $instance;
}
} // Class testimonials_widget ends here
?>
