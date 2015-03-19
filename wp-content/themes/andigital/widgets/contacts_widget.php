<?
// Creating the widget 
class contacts_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'contacts_widget', 

		// Widget name will appear in UI
		__('Contacts', 'contacts_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Contacts', 'contacts_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );	
	$address_text1 = nl2br(apply_filters('widget_text', $instance['address_text1']));
	$address_text2 = nl2br(apply_filters('widget_text', $instance['address_text2']));
	$address_text3 = nl2br(apply_filters('widget_text', $instance['address_text3']));
	$address_text4 = nl2br(apply_filters('widget_text', $instance['address_text4']));
	$phone_text1 = nl2br(apply_filters('widget_text', $instance['phone_text1']));
	$underground_text1 = nl2br(apply_filters('widget_text', $instance['underground_text1']));
	$underground_text2 = nl2br(apply_filters('widget_text', $instance['underground_text2']));
	$underground_text3 = nl2br(apply_filters('widget_text', $instance['underground_text3']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="contacts-rows" itemscope itemtype="http://data-vocabulary.org/Organization">
	<meta itemprop="name" content="ANDigital" />
	<meta itemprop="url" content="http://andigital.com" />
	<h2><? echo $title; ?>
	    <div class="underline-2"></div>
	</h2>
    <div class="contacts-row">
		<div class="contacts-img">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
        </div>
		<div class="contacts-text" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
			<h3><? echo $title1; ?>
			    <div class="underline-3"></div>
			</h3>
		    <span itemprop="street-address"><? echo $address_text1; ?></span>,<br/>
		    <span itemprop="locality"><? echo $address_text2; ?></span>,<br/>
		    <span itemprop="country-name"><? echo $address_text3; ?></span>,
		    <span itemprop="postal-code"><? echo $address_text4; ?></span>
		</div>
	</div> 
    <div class="contacts-row middle-column">
		<div class="contacts-img">
            <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
        </div>
		<div class="contacts-text">
		    <h3><? echo $title2; ?>
		        <div class="underline-3"></div>
		    </h3>
		    <span itemprop="tel"><? echo $phone_text1; ?></span>
		</div>
	</div>  	
    <div class="contacts-row last-row">
		<div class="contacts-img">
            <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
        </div>
		<div class="contacts-text">
			<h3><? echo $title3; ?>
			     <div class="underline-3"></div>
			</h3>
		    <a href="#" id="station1"><? echo $underground_text1; ?></a><br/>
		    <a href="#" id="station2"><? echo $underground_text2; ?></a><br/>
		    <a href="#" id="station3"><? echo $underground_text3; ?></a>
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
		$title = __( 'Title', 'contacts_widget_domain' );
	}

	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'contacts_widget_domain' );
	}

	//text
	if ( isset( $instance[ 'address_text1' ] ) ) {
		$address_text1 = $instance[ 'address_text1' ];
	}else {
		$address_text1 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'address_text2' ] ) ) {
		$address_text2 = $instance[ 'address_text2' ];
	}else {
		$address_text2 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'address_text3' ] ) ) {
		$address_text3 = $instance[ 'address_text3' ];
	}else {
		$address_text3 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'address_text4' ] ) ) {
		$address_text4 = $instance[ 'address_text4' ];
	}else {
		$address_text4 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'phone_text1' ] ) ) {
		$phone_text1 = $instance[ 'phone_text1' ];
	}else {
		$phone_text1 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'underground_text1' ] ) ) {
		$underground_text1 = $instance[ 'underground_text1' ];
	}else {
		$underground_text1 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'underground_text2' ] ) ) {
		$underground_text2 = $instance[ 'underground_text2' ];
	}else {
		$underground_text2 = __( 'Text', 'contacts_widget_domain' );
	}
	if ( isset( $instance[ 'underground_text3' ] ) ) {
		$underground_text3 = $instance[ 'underground_text3' ];
	}else {
		$underground_text3 = __( 'Text', 'contacts_widget_domain' );
	}
?>



<!-- admin form start -->
<p>
    <label for="<? echo $this->get_field_id( 'title' ); ?>"><strong><? _e( 'Title:' ); ?></strong></label> 
    <input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Address Image', 'field' => 'image1' )); ?>
    <p>
        <label><strong><?php _e( 'Address:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
        <label><strong><?php _e( 'Street:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'address_text1' ); ?>" name="<?php echo $this->get_field_name( 'address_text1' ); ?>" type="text" value="<?php echo esc_attr( $address_text1 ); ?>"></input>
    </p>
    <p>
        <label><strong><?php _e( 'Locality:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'address_text2' ); ?>" name="<?php echo $this->get_field_name( 'address_text2' ); ?>" type="text" value="<?php echo esc_attr( $address_text2 ); ?>"></input>
    </p>
    <p>
        <label><strong><?php _e( 'Country name:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'address_text3' ); ?>" name="<?php echo $this->get_field_name( 'address_text3' ); ?>" type="text" value="<?php echo esc_attr( $address_text3 ); ?>"></input>
    </p>
    <p>
        <label><strong><?php _e( 'Postal code:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'address_text4' ); ?>" name="<?php echo $this->get_field_name( 'address_text4' ); ?>" type="text" value="<?php echo esc_attr( $address_text4 ); ?>"></input>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Telephone Image', 'field' => 'image2' )); ?>
    <p>
        <label><strong><?php _e( 'Telephone:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <input class="widefat" id="<?php echo $this->get_field_id( 'phone_text1' ); ?>" name="<?php echo $this->get_field_name( 'phone_text1' ); ?>" type="text" value="<?php echo esc_attr( $phone_text1 ); ?>"></input>
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Underground Image', 'field' => 'image3' )); ?>
    <p>
        <label><strong><?php _e( 'Underground:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    <p>
        <label><strong><?php _e( 'Leicester Square:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'underground_text1' ); ?>" name="<?php echo $this->get_field_name( 'underground_text1' ); ?>" type="text" value="<?php echo esc_attr( $underground_text1 ); ?>"></input>
    </p>
    <p>
        <label><strong><?php _e( 'Charing Cross:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'underground_text2' ); ?>" name="<?php echo $this->get_field_name( 'underground_text2' ); ?>" type="text" value="<?php echo esc_attr( $underground_text2 ); ?>"></input>
    </p>
    <p>
        <label><strong><?php _e( 'Embankment:' ); ?></strong></label> 
	    <input class="widefat" id="<?php echo $this->get_field_id( 'underground_text3' ); ?>" name="<?php echo $this->get_field_name( 'underground_text3' ); ?>" type="text" value="<?php echo esc_attr( $underground_text3 ); ?>"></input>
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
	$instance['address_text1'] = ( ! empty( $new_instance['address_text1'] ) ) ? strip_tags( $new_instance['address_text1'] ) : '';
	$instance['address_text2'] = ( ! empty( $new_instance['address_text2'] ) ) ? strip_tags( $new_instance['address_text2'] ) : '';
	$instance['address_text3'] = ( ! empty( $new_instance['address_text3'] ) ) ? strip_tags( $new_instance['address_text3'] ) : '';
	$instance['address_text4'] = ( ! empty( $new_instance['address_text4'] ) ) ? strip_tags( $new_instance['address_text4'] ) : '';
	$instance['phone_text1'] = ( ! empty( $new_instance['phone_text1'] ) ) ? strip_tags( $new_instance['phone_text1'] ) : '';
	$instance['underground_text1'] = ( ! empty( $new_instance['underground_text1'] ) ) ? strip_tags( $new_instance['underground_text1'] ) : '';
	$instance['underground_text2'] = ( ! empty( $new_instance['underground_text2'] ) ) ? strip_tags( $new_instance['underground_text2'] ) : '';
	$instance['underground_text3'] = ( ! empty( $new_instance['underground_text3'] ) ) ? strip_tags( $new_instance['underground_text3'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	return $instance;
}
} // Class contacts_widget ends here
?>
