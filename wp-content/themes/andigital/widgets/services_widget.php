<?
// Creating the widget 
class services_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'services_widget', 

		// Widget name will appear in UI
		__('Services', 'services_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Services', 'services_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$text = apply_filters( 'widget_text', $instance['text'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );	
	$title4 = apply_filters( 'widget_title', $instance['title4'] );	
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	$text3 = nl2br(apply_filters('widget_text', $instance['text3']));
	$text4 = nl2br(apply_filters('widget_text', $instance['text4']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="services-rows" class="no-underline">
	<div class="services-images">
		<img class="service-image" src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
		<img class="service-image" src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
		<img class="service-image" src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
		<img class="service-image" src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
	</div>
	<h2><? echo $title; ?>
	    <div class="underline-2"></div>
	</h2>
    <div class="services-column-left">
    	<div class="services-container">
		    <div class="service-row selected">
		    	<a href="#">
		    	<div class="service-container">
					<div class="service-title">
						<h4><? echo $title1; ?>
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
						<h4><? echo $title2; ?>
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
						<h4><? echo $title3; ?>
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
						<h4><? echo $title4; ?>
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
		<div class="service-text"><p class="service-paragraph"><? echo $text1; ?></p></div>
		<div class="service-text"><p class="service-paragraph"><? echo $text2; ?></p></div>
		<div class="service-text"><p class="service-paragraph"><? echo $text3; ?></p></div>
		<div class="service-text"><p class="service-paragraph"><? echo $text4; ?></p></div>
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
		$title = __( 'Title', 'services_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'services_widget_domain' );
	}
	
	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Title', 'services_widget_domain' );
	}

	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'services_widget_domain' );
	}
	if ( isset( $instance[ 'text4' ] ) ) {
		$text4 = $instance[ 'text4' ];
	}else {
		$text4 = __( 'Text', 'services_widget_domain' );
	}
?>



<!-- admin form start -->
<div style="border: 1px solid #e5e5e5; padding: 0 0 20px 0">
<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><strong><? _e( 'Title:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<? echo $this->get_field_id( 'text' ); ?>"><strong><? _e( 'Text:' ); ?></strong></label> 
	<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text"><?php echo esc_attr( $text ); ?></textarea>
</p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Image', 'field' => 'image1' )); ?>
    <p>
	    <label><strong><?php _e( 'Row 1:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Image', 'field' => 'image2' )); ?>
    <p>
	    <label><strong><?php _e( 'Row 2:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Image', 'field' => 'image3' )); ?>
    <p>
	    <label><strong><?php _e( 'Row 3:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Image', 'field' => 'image4' )); ?>
    <p>
	    <label><strong><?php _e( 'Row 4:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text"><?php echo esc_attr( $text4 ); ?></textarea>
    </p>
</div>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
	$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
	$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
	$instance['title4'] = ( ! empty( $new_instance['title4'] ) ) ? strip_tags( $new_instance['title4'] ) : '';
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
	$instance['text4'] = ( ! empty( $new_instance['text4'] ) ) ? strip_tags( $new_instance['text4'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';
	return $instance;
}
} // Class services_widget ends here
?>
