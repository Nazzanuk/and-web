<?
// Creating the widget 
class menu_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'menu_widget', 

		// Widget name will appear in UI
		__('Menu', 'menu_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Menu for a page', 'menu_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );
	$title4 = apply_filters( 'widget_title', $instance['title4'] );
	$text1 = apply_filters( 'widget_title', $instance['text1'] );
	$text2 = apply_filters( 'widget_title', $instance['text2'] );
	$text3 = apply_filters( 'widget_title', $instance['text3'] );
	$text4 = apply_filters( 'widget_title', $instance['text4'] );

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="menu-wrapper">
	<nav id="menu">
		<a class="menu-item what-we-do" href="<? echo get_site_url(); ?>/<? echo $text1; ?>">
			<div class="inner" style="display:inline-block">
				<img class="bg-bw" src="<? echo wp_get_attachment_url($instance['bwimage1']);?>"/>
				<img class="bg" src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
				<div class="label">
					<span><? echo $title1; ?></span>
					<div class="underline-1"></div>
				</div>
			</div>
		</a>
		
		<a class="menu-item who-we-are" href="<? echo get_site_url(); ?>/<? echo $text2; ?>">
			<div class="inner">
				<img class="bg-bw" src="<? echo wp_get_attachment_url($instance['bwimage2']);?>"/>
				<img class="bg" src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
				<div class="label">
					<span><? echo $title2; ?></span>
					<div class="underline-1"></div>
				</div>
			</div>
		</a>
		
		<a class="menu-item join-us" href="<? echo get_site_url(); ?>/<? echo $text3; ?>">
			<div class="inner">
				<img class="bg-bw" src="<? echo wp_get_attachment_url($instance['bwimage3']);?>"/>
				<img class="bg" src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
				<div class="label">
					<span><? echo $title3; ?></span>
					<div class="underline-1"></div>
				</div>
			</div>
		</a>
		
		<a class="menu-item contact-us" href="<? echo get_site_url(); ?>/<? echo $text4; ?>">
			<div class="inner">
				<img class="bg-bw" src="<? echo wp_get_attachment_url($instance['bwimage4']);?>"/>
				<img class="bg" src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
				<div class="label">
					<span><? echo $title4; ?></span>
					<div class="underline-1"></div>
				</div>
			</div>
		</a>
	</nav>

	<div id="menu-close">
		<img src="<? getThemeDir(); ?>/img/menu/close.png"/>
	</div>
</div>

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'What We Do', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Who We Are', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Join Us', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Contact Us', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'what-we-do/', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'who-we-are/', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'join-us/', 'menu_widget_domain' );
	}
	if ( isset( $instance[ 'text4' ] ) ) {
		$text4 = $instance[ 'text4' ];
	}else {
		$text4 = __( 'contact-us/', 'menu_widget_domain' );
	}
?>



<!-- admin form start -->
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'What We Do Image', 'field' => 'image1' )); ?>
    <?php  pco_image_field( $this, $instance,array( 'title' => 'What We Do Image BW', 'field' => 'bwimage1' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><strong><?php _e( 'What We Do Title:' ); ?></strong></label> 
        <input class="widefat" id="<? echo $this->get_field_id( 'title1' ); ?>" name="<? echo $this->get_field_name( 'title1' ); ?>" type="text" value="<? echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text1' ); ?>"><strong><?php _e( 'What We Do Link:' ); ?></strong></label> 
        <input class="widefat" id="<? echo $this->get_field_id( 'text1' ); ?>" name="<? echo $this->get_field_name( 'text1' ); ?>" type="text" value="<? echo esc_attr( $text1 ); ?>" />
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Who We Are Image', 'field' => 'image2' )); ?>
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Who We Are Image BW', 'field' => 'bwimage2' )); ?>    
    <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><strong><?php _e( 'Who We Are Title:' ); ?></strong></label> 
        <input class="widefat" id="<? echo $this->get_field_id( 'title2' ); ?>" name="<? echo $this->get_field_name( 'title2' ); ?>" type="text" value="<? echo esc_attr( $title2 ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text2' ); ?>"><strong><?php _e( 'Who We Are Link:' ); ?></strong></label> 
	    <input class="widefat" id="<? echo $this->get_field_id( 'text2' ); ?>" name="<? echo $this->get_field_name( 'text2' ); ?>" type="text" value="<? echo esc_attr( $text2 ); ?>" />
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Join Us Image', 'field' => 'image3' )); ?>
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Join Us Image BW', 'field' => 'bwimage3' )); ?>    
 <p>
    <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><strong><?php _e( 'Join Us Title:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title3' ); ?>" name="<? echo $this->get_field_name( 'title3' ); ?>" type="text" value="<? echo esc_attr( $title3 ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'text3' ); ?>"><strong><?php _e( 'Join Us Link:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'text3' ); ?>" name="<? echo $this->get_field_name( 'text3' ); ?>" type="text" value="<? echo esc_attr( $text3 ); ?>" />
</p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Contact Us Image', 'field' => 'image4' )); ?>
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Contact Us Image BW', 'field' => 'bwimage4' )); ?>    
    <p>
    <label for="<?php echo $this->get_field_id( 'title4' ); ?>"><strong><?php _e( 'Contact Us Title:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title4' ); ?>" name="<? echo $this->get_field_name( 'title4' ); ?>" type="text" value="<? echo esc_attr( $title4 ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'text4' ); ?>"><strong><?php _e( 'Contact Us Link:' ); ?></strong></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'text4' ); ?>" name="<? echo $this->get_field_name( 'text4' ); ?>" type="text" value="<? echo esc_attr( $text4 ); ?>" />
</p>
</div>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['bwimage1'] = ( ! empty( $new_instance['bwimage1'] ) ) ? strip_tags( $new_instance['bwimage1'] ) : '';
	$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['bwimage2'] = ( ! empty( $new_instance['bwimage2'] ) ) ? strip_tags( $new_instance['bwimage2'] ) : '';
	$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
	$instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['bwimage3'] = ( ! empty( $new_instance['bwimage3'] ) ) ? strip_tags( $new_instance['bwimage3'] ) : '';
	$instance['title4'] = ( ! empty( $new_instance['title4'] ) ) ? strip_tags( $new_instance['title4'] ) : '';
	$instance['text4'] = ( ! empty( $new_instance['text4'] ) ) ? strip_tags( $new_instance['text4'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';
	$instance['bwimage4'] = ( ! empty( $new_instance['bwimage4'] ) ) ? strip_tags( $new_instance['bwimage4'] ) : '';

	return $instance;
}
} // Class menu_widget ends here
?>
