<?
// Creating the widget 
class values_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'values_widget', 

		// Widget name will appear in UI
		__('Values', 'values_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Our company values', 'values_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	$text3 = nl2br(apply_filters('widget_text', $instance['text3']));	

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>


<section id="values" class="columns-3">
	<h2>Values
	<div class="underline-2"></div>
	</h2>
	<div class="column">
		<div class="icon">
			<img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
		</div>
		<h3><? echo $title1; ?>
		<div class="underline-3"></div>
		</h3>
		<p><? echo $text1; ?></p>
	</div>
	<div class="column middle">
		<div class="icon">
			 <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
		</div>
		<h3><? echo $title2; ?>
		<div class="underline-3"></div>
		</h3>
		<p><? echo $text2; ?></p>
	</div>
	<div class="column">
		<div class="icon">
			 <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
		</div>
		<h3><? echo $title3; ?>
		<div class="underline-3"></div>
		</h3>
		<p><? echo $text3; ?></p>
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
	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'values_widget_domain' );
	}

	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'values_widget_domain' );
	}
?>



<!-- admin form start -->

<div style="border: 1px solid #e5e5e5; padding: 20px">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Wonder Image', 'field' => 'image1' )); ?>
    <p>
	    <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><strong><?php _e( 'Value 1:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Delight Image', 'field' => 'image2' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><strong><?php _e( 'Value 2:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
    </p>
</div>

<div style="border: 1px solid #e5e5e5; padding: 20px">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Share Image', 'field' => 'image3' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><strong><?php _e( 'Value 3:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
    </p>
</div>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
	$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
	$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';

	return $instance;
}
} // Class values_widget ends here
?>
