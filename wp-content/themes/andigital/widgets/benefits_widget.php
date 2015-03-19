<?
// Creating the widget 
class benefits_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'benefits_widget', 

		// Widget name will appear in UI
		__('Benefits', 'benefits_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Benefits', 'benefits_widget_domain' ), ) 
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
	$title5 = apply_filters( 'widget_title', $instance['title5'] );	
	$title6 = apply_filters( 'widget_title', $instance['title6'] );		
	$text1 = nl2br(apply_filters('widget_text', $instance['text1']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	$text3 = nl2br(apply_filters('widget_text', $instance['text3']));
	$text4 = nl2br(apply_filters('widget_text', $instance['text4']));
	$text5 = nl2br(apply_filters('widget_text', $instance['text5']));
	$text6 = nl2br(apply_filters('widget_text', $instance['text6']));		
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="benefit-columns" class="no-underline">
    <div class="benefit-images">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
    	<div class="image-container-1">
	    	<img class="benefit-background-image-1" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	    </div>	
	<? } ?>
	<? if ( ! empty( $instance['backgroundImage2'] ) ) { ?>
		<div class="image-container-2">
	    <img class="benefit-background-image-2" src="<? echo wp_get_attachment_url($instance['backgroundImage2']);?>"/> 
	    </div>
	<? } ?>	    
    </div>
	<h2>Benefits	    
        <div class="underline-2"></div>
	</h2>
    <hr>
    <div class="benefit-row">
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title1; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>			    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text1; ?></p>
        </div>
	</div> 
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title2; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text2; ?></p>
        </div>
	</div>
    <hr>          
    </div>   
    <div class="benefit-row">
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title3; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text3; ?></p>
        </div>
	</div>
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title4; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text4; ?></p>
        </div>
	</div>
    <hr>         
    </div>
    <div class="benefit-row">    
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image5']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title5; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text5; ?></p>
        </div>
	</div>
    <hr>        
	<div class="benefit-column collapse-row">
    	<a href="#">
        <div class="benefit-img">
            <img src="<? echo wp_get_attachment_url($instance['image6']);?>"/>
        </div>
    	<div class="benefit-container">
			<div class="benefit-title">
	            <h4><? echo $title6; ?></h4>
			</div>
		    <div class="benefit-icon">
            	<img class="expand-icon" src="<? getThemeDir(); ?>/img/join-us/expand.png"/>			    	
            	<img class="collapse-icon" src="<? getThemeDir(); ?>/img/join-us/collapse.png"/>		    	
		    </div>
		</div>     
		</a>
	    <div class="benefit-text collapse-text">
            <p class="benefit-paragraph"><? echo $text6; ?></p>
        </div>
	</div> 
    <hr>        
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
		$title = __( 'Title', 'benefits_widget_domain' );
	}

	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Title', 'benefits_widget_domain' );
	}		
	if ( isset( $instance[ 'title5' ] ) ) {
		$title5 = $instance[ 'title5' ];
	}else {
		$title5 = __( 'Title', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'title6' ] ) ) {
		$title6 = $instance[ 'title6' ];
	}else {
		$title6 = __( 'Title', 'benefits_widget_domain' );
	}	
	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'text4' ] ) ) {
		$text4 = $instance[ 'text4' ];
	}else {
		$text4 = __( 'Text', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'text5' ] ) ) {
		$text5 = $instance[ 'text5' ];
	}else {
		$text5 = __( 'Text', 'benefits_widget_domain' );
	}
	if ( isset( $instance[ 'text6' ] ) ) {
		$text6 = $instance[ 'text6' ];
	}else {
		$text6 = __( 'Text', 'benefits_widget_domain' );
	}	
?>



<!-- admin form start -->
<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 1', 'field' => 'image1' )); ?>
    <p>
        <label><strong><?php _e( 'Column 1:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 2', 'field' => 'image2' )); ?>
    <p>
        <label><strong><?php _e( 'Column 2:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 3', 'field' => 'image3' )); ?>
    <p>
        <label><strong><?php _e( 'Column 3:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 4', 'field' => 'image4' )); ?>
    <p>
        <label><strong><?php _e( 'Column 4:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text"><?php echo esc_attr( $text4 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 5', 'field' => 'image5' )); ?>
    <p>
        <label><strong><?php _e( 'Column 5:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" type="text" value="<?php echo esc_attr( $title5 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text5' ); ?>" name="<?php echo $this->get_field_name( 'text5' ); ?>" type="text"><?php echo esc_attr( $text5 ); ?></textarea>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Benefit 6', 'field' => 'image6' )); ?>
    <p>
        <label><strong><?php _e( 'Column 6:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title6' ); ?>" name="<?php echo $this->get_field_name( 'title6' ); ?>" type="text" value="<?php echo esc_attr( $title6 ); ?>" />
    </p>
    <p>
        <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text6' ); ?>" name="<?php echo $this->get_field_name( 'text6' ); ?>" type="text"><?php echo esc_attr( $text6 ); ?></textarea>
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
	$instance['title5'] = ( ! empty( $new_instance['title5'] ) ) ? strip_tags( $new_instance['title5'] ) : '';	
	$instance['title6'] = ( ! empty( $new_instance['title6'] ) ) ? strip_tags( $new_instance['title6'] ) : '';					
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
	$instance['text4'] = ( ! empty( $new_instance['text4'] ) ) ? strip_tags( $new_instance['text4'] ) : '';	
	$instance['text5'] = ( ! empty( $new_instance['text5'] ) ) ? strip_tags( $new_instance['text5'] ) : '';	
	$instance['text6'] = ( ! empty( $new_instance['text6'] ) ) ? strip_tags( $new_instance['text6'] ) : '';	
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';	
	$instance['image5'] = ( ! empty( $new_instance['image5'] ) ) ? strip_tags( $new_instance['image5'] ) : '';	
	$instance['image6'] = ( ! empty( $new_instance['image6'] ) ) ? strip_tags( $new_instance['image6'] ) : '';	
	$instance['backgroundImage1'] = ( ! empty( $new_instance['backgroundImage1'] ) ) ? strip_tags( $new_instance['backgroundImage1'] ) : '';
	$instance['backgroundImage2'] = ( ! empty( $new_instance['backgroundImage2'] ) ) ? strip_tags( $new_instance['backgroundImage2'] ) : '';				
	return $instance;
}
} // Class benefits_widget ends here
?>
