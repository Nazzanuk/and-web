<?
// Creating the widget 
class charter_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'charter_widget', 

		// Widget name will appear in UI
		__('Our Process', 'charter_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Our Process of Recuritment', 'charter_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
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

<section id="charter-rows" class="no-underline">
    <div class="charter-images">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
	    <img class="charter-background-image-1" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	<? } ?>
	<? if ( ! empty( $instance['backgroundImage2'] ) ) { ?>
	    <img class="charter-background-image-2" src="<? echo wp_get_attachment_url($instance['backgroundImage2']);?>"/> 
	<? } ?>
    </div>
	<h2><? echo $title; ?> 
        <div class="underline-2"></div>
	</h2>
    <hr>
    <div class="charter-row collapse-row">
    	<a href="#">
		<div class="charter-img">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
        </div>
    	<div class="charter-container">
			<div class="charter-title">
				<h4><? echo $title1; ?></h4>
			</div>
		    <div class="charter-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>			    	
		    </div>
		</div>     
		</a>
		<div class="charter-text collapse-text"><p class="charter-paragraph"><? echo $text1; ?></p></div>
	</div> 
    <hr>
    <div class="charter-row collapse-row">
    	<a href="#">
		<div class="charter-img">
            <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
        </div>
    	<div class="charter-container">
			<div class="charter-title">
			    <h4><? echo $title2; ?></h4>
			</div>
		    <div class="charter-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
		<div class="charter-text collapse-text"><p class="charter-paragraph"><? echo $text2; ?></p></div>
	</div>  	
    <hr>
    <div class="charter-row collapse-row">
    	<a href="#">
		<div class="charter-img">
            <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
        </div>
    	<div class="charter-container">
			<div class="charter-title">
				<h4><? echo $title3; ?></h4>
			</div>
		    <div class="charter-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>			    	
		    </div>
	  	</div>
		</a>
		<div class="charter-text collapse-text"><p class="charter-paragraph"><? echo $text3; ?></p></div>
	</div>  
    <hr>
    <div class="charter-row collapse-row">
    	<a href="#">
		<div class="charter-img">
            <img src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
        </div>
    	<div class="charter-container">
			<div class="charter-title">
				<h4><? echo $title4; ?></h4>
			</div>
		    <div class="charter-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>			    	
		    </div>
		</div>     
		</a>
		<div class="charter-text collapse-text"><p class="charter-paragraph"><? echo $text4; ?></p></div>
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
		$title = __( 'Title', 'charter_widget_domain' );
	}

	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Title', 'charter_widget_domain' );
	}		

	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'charter_widget_domain' );
	}
	if ( isset( $instance[ 'text4' ] ) ) {
		$text4 = $instance[ 'text4' ];
	}else {
		$text4 = __( 'Text', 'charter_widget_domain' );
	}
				
?>



<!-- admin form start -->
<p>
    <label for="<? echo $this->get_field_id( 'title' ); ?>"><strong><? _e( 'Title:' ); ?></strong></label> 
    <input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'All About You Image', 'field' => 'image1' )); ?>
    <p>
        <label><strong><?php _e( 'Row 1:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
<p>
	<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
</p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Let\'s Talk Image ', 'field' => 'image2' )); ?>
    <p>
        <label><strong><?php _e( 'Row 2:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Face Time Image ', 'field' => 'image3' )); ?>
    <p>
        <label><strong><?php _e( 'Row 3:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'One Of Us Image ', 'field' => 'image4' )); ?>
    <p>
        <label><strong><?php _e( 'Row 4:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text"><?php echo esc_attr( $text4 ); ?></textarea>
    </p>
</div>
<? pco_image_field( $this, $instance,array( 'title' => 'Background Image1', 'field' => 'backgroundImage1' )); ?>
<? pco_image_field( $this, $instance,array( 'title' => 'Background Image2', 'field' => 'backgroundImage2' )); ?>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
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
	$instance['backgroundImage1'] = ( ! empty( $new_instance['backgroundImage1'] ) ) ? strip_tags( $new_instance['backgroundImage1'] ) : '';
	$instance['backgroundImage2'] = ( ! empty( $new_instance['backgroundImage2'] ) ) ? strip_tags( $new_instance['backgroundImage2'] ) : '';			
	return $instance;
}
} // Class charter_widget ends here
?>
