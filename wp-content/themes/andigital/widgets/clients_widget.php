<?
// Creating the widget 
class clients_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'clients_widget', 

		// Widget name will appear in UI
		__('Clients', 'clients_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Clients', 'clients_widget_domain' ), ) 
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
	$link1 = apply_filters( 'widget_title', $instance['link1'] );
	$link2 = apply_filters( 'widget_title', $instance['link2'] );
	$link3 = apply_filters( 'widget_title', $instance['link3'] );
	$link4 = apply_filters( 'widget_title', $instance['link4'] );
	$link5 = apply_filters( 'widget_title', $instance['link5'] );
	
	

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>


<section id="clients" class="columns-3">
	<h2><? echo $title; ?>
	<div class="underline-2"></div>
	</h2>
	<div class="column">
		<h3><? echo $title1; ?>
		<div class="underline-3"></div>
		</h3>
		<a href="<? echo $link1; ?>">
		<img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
	</div>
	<div class="column middle">
		<h3><? echo $title2; ?>
		<div class="underline-3"></div>
		</h3>
		<a href="<? echo $link2; ?>">
		<img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
	</div>
	<div class="column">
		<h3><? echo $title3; ?>
		<div class="underline-3"></div>
		</h3>
		<a href="<? echo $link3; ?>">
		<img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
	</div>

<div class="column">
		<h3><? echo $title4; ?>
		<div class="underline-3"></div>
		</h3>
		<a href="<? echo $link4; ?>">
		<img src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
	</div>

<div class="column">
		<h3><? echo $title5; ?>
		<div class="underline-3"></div>
		</h3>
		<img src="<? echo wp_get_attachment_url($instance['image5']);?>"/>
		<a href="<? echo $link5; ?>">
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
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = __( 'Title', 'clients_widget_domain' );
	}
	//titles
	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'clients_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'clients_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'clients_widget_domain' );
	}
if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Title', 'clients_widget_domain' );
	}
if ( isset( $instance[ 'title5' ] ) ) {
		$title5 = $instance[ 'title5' ];
	}else {
		$title5 = __( 'Title', 'clients_widget_domain' );
	}

//links
	if ( isset( $instance[ 'link1' ] ) ) {
		$link1 = $instance[ 'link1' ];
	}else {
		$link1 = __( 'Title', 'casestudies_widget_domain' );
	}
	if ( isset( $instance[ 'link2' ] ) ) {
		$link2 = $instance[ 'link2' ];
	}else {
		$link2 = __( 'Title', 'casestudies_widget_domain' );
	}
	if ( isset( $instance[ 'link3' ] ) ) {
		$link3 = $instance[ 'link3' ];
	}else {
		$link3 = __( 'Title', 'casestudies_widget_domain' );
	}
	if ( isset( $instance[ 'link4' ] ) ) {
		$link4 = $instance[ 'link4' ];
	}else {
		$link4 = __( 'Title', 'casestudies_widget_domain' );
	}
	if ( isset( $instance[ 'link5' ] ) ) {
		$link5 = $instance[ 'link5' ];
	}else {
		$link5 = __( 'Title', 'casestudies_widget_domain' );
	}


	
?>



<!-- admin form start -->

<div style="border: 1px solid #e5e5e5; padding: 20px">
    <p>
	    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
</div>

<div style="border: 1px solid #e5e5e5; padding: 20px">
<p>
	    <label for="<?php echo $this->get_field_id( 'link1' ); ?>"><strong><?php _e( 'Link 1:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>" />
    </p>    

	    <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><strong><?php _e( 'Title 1:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
 <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 1 Image', 'field' => 'image1' )); ?>
    </p>
   
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px">
 <p>
	    <label for="<?php echo $this->get_field_id( 'link2' ); ?>"><strong><?php _e( 'Link 2:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>" />
    </p>    


<p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><strong><?php _e( 'Title 2:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />

 <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 2 Image', 'field' => 'image2' )); ?>
    </p>

   
</div>

<div style="border: 1px solid #e5e5e5; padding: 20px">
 <p>
	    <label for="<?php echo $this->get_field_id( 'link3' ); ?>"><strong><?php _e( 'Link 3:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text" value="<?php echo esc_attr( $link3 ); ?>" />
    </p>    
    





<p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><strong><?php _e( 'Title 3:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
 <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 3 Image', 'field' => 'image3' )); ?>
    </p>
   
</div>

<div style="border: 1px solid #e5e5e5; padding: 20px">
 <p>
	    <label for="<?php echo $this->get_field_id( 'link4' ); ?>"><strong><?php _e( 'Link 4:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" type="text" value="<?php echo esc_attr( $link4 ); ?>" />
    </p>    
 



   <p>
        <label for="<?php echo $this->get_field_id( 'title4' ); ?>"><strong><?php _e( 'Title 4:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
 <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 4 Image', 'field' => 'image4' )); ?>
    </p>
   
</div>

<div style="border: 1px solid #e5e5e5; padding: 20px">
 <p>
	    <label for="<?php echo $this->get_field_id( 'link5' ); ?>"><strong><?php _e( 'Link 5:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'link5' ); ?>" name="<?php echo $this->get_field_name( 'link5' ); ?>" type="text" value="<?php echo esc_attr( $link5 ); ?>" />
    </p>    
 


   <p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><strong><?php _e( 'Title 5:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" type="text" value="<?php echo esc_attr( $title5 ); ?>" />
 <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 5 Image', 'field' => 'image5' )); ?>
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
	$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
	$instance['title4'] = ( ! empty( $new_instance['title4'] ) ) ? strip_tags( $new_instance['title4'] ) : '';
	$instance['title5'] = ( ! empty( $new_instance['title5'] ) ) ? strip_tags( $new_instance['title5'] ) : '';	
	$instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link1'] ) : '';
	$instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? strip_tags( $new_instance['link2'] ) : '';
	$instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? strip_tags( $new_instance['link3'] ) : '';	
	$instance['link4'] = ( ! empty( $new_instance['link4'] ) ) ? strip_tags( $new_instance['link4'] ) : '';
	$instance['link5'] = ( ! empty( $new_instance['link5'] ) ) ? strip_tags( $new_instance['link5'] ) : '';	
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';
	$instance['image5'] = ( ! empty( $new_instance['image5'] ) ) ? strip_tags( $new_instance['image5'] ) : '';

	return $instance;
}
} // Class clients_widget ends here
?>