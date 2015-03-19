<?
// Creating the widget 
class home_pages_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'home_pages_widget', 

		// Widget name will appear in UI
		__('Home Columns', 'home_pages_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Home pages columns', 'home_pages_widget_domain' ), ) 
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
	$url1 = apply_filters( 'widget_title', $instance['url1'] );
	$url2 = apply_filters( 'widget_title', $instance['url2'] );
	$url3 = apply_filters( 'widget_title', $instance['url3'] );	
    $buttonText1 = apply_filters( 'widget_title', $instance['buttonText1'] );
    $buttonText2 = apply_filters( 'widget_title', $instance['buttonText2'] );
    $buttonText3 = apply_filters( 'widget_title', $instance['buttonText3'] );

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="home-pages">
	<div id="academy-page" class="page-column">
        <a href="<? echo get_site_url(); ?>/<? echo $url1; ?>">
            <img src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
		    <h3><? echo $title1; ?> 
		        <div class="underline-3"></div>
		    </h3>
		    <div class="home-page-content"><? echo $text1; ?></div>
		    <div class="button-div">
		        <div class="button" type="button"><? echo $buttonText1 ?></div>
		    </div>
	    </a>
	</div> 
	<div id="who-we-are-page" class="page-column middle-column">
		 <a href="<? echo get_site_url(); ?>/<? echo $url2; ?>">
		     <img src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
		     <h3><? echo $title2; ?>
		         <div class="underline-3"></div>
		     </h3>
		     <div class="home-page-content"><? echo $text2; ?></div>
		     <div class="button-div">
		         <div class="button" type="button"><? echo $buttonText2 ?></div>
		     </div>
		 </a>
    </div> 	
    <div id="join-us-page" class="page-column">
         <a href="<? echo get_site_url(); ?>/<? echo $url3; ?>"> 
             <img src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
		     <h3><? echo $title3; ?>
		         <div class="underline-3"></div>
		     </h3>
		     <div class="home-page-content"><? echo $text3; ?></div>
		     <div class="button-div">
		        <div class="button" type="button"><? echo $buttonText3 ?></div>
		     </div>
		</a>
    </div>
    <div class="clear"></div>        		     		    		    
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
	//titles
	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'home_pages_widget_domain' );
	}

	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'home_pages_widget_domain' );
	}
	
	//url
	if ( isset( $instance[ 'url1' ] ) ) {
		$url1 = $instance[ 'url1' ];
	}else {
		$url1 = __( 'what-we-do/#academy', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'url2' ] ) ) {
		$url2 = $instance[ 'url2' ];
	}else {
		$url2 = __( 'who-we-are', 'home_pages_widget_domain' );
	}
	if ( isset( $instance[ 'url3' ] ) ) {
		$url3 = $instance[ 'url3' ];
	}else {
		$url3 = __( 'join-us', 'home_pages_widget_domain' );
	}			
    
    //button text
	if ( isset( $instance[ 'buttonText1' ] ) ) {
		$buttonText1 = $instance[ 'buttonText1' ];
	}else {
		$buttonText1 = __( 'Text', 'home_pages_widget_domain' );
	}	
    if ( isset( $instance[ 'buttonText2' ] ) ) {
		$buttonText2 = $instance[ 'buttonText2' ];
	}else {
		$buttonText2 = __( 'Text', 'home_pages_widget_domain' );
	}	
    if ( isset( $instance[ 'buttonText3' ] ) ) {
		$buttonText3 = $instance[ 'buttonText3' ];
	}else {
		$buttonText3 = __( 'Text', 'home_pages_widget_domain' );
	}	
?>



<!-- admin form start -->

<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
	<?php  pco_image_field( $this, $instance,array( 'title' => 'What We Do Image', 'field' => 'image1' )); ?>
	<p>
		<label name="colLabel"><strong> Column 1: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
	</p>
	<p>
		<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr(             $text1 ); ?></textarea>
	</p>
	<p>		
		<label name="urlLabel"><strong> Relative URL: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url1' ); ?>" name="<?php echo $this->get_field_name( 'url1' ); ?>" type="text" value="<?php echo esc_attr( $url1 ); ?>" />
	</p>	
    <p>
        <label name="buttonText1Label"><strong>Button Text: </strong></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'buttonText1' ); ?>" name="<?php echo $this->get_field_name( 'buttonText1' ); ?>" type="text" value="<?php echo esc_attr(                 $buttonText1 ); ?>" />
    </p>
</div>

<div style="border: 1px solid #e5e5e5; padding: 0 0 20px 0">
	<?php  pco_image_field( $this, $instance,array( 'title' => 'Who We Are Image', 'field' => 'image2' )); ?>
	<p>
		<label name="colLabel"><strong> Column 2: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
	</p>
	<p>		
		<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
	</p>
	<p>		
		<label name="urlLabel"><strong> Relative URL: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url2' ); ?>" name="<?php echo $this->get_field_name( 'url2' ); ?>" type="text" value="<?php echo esc_attr( $url2 ); ?>" />
	</p>
    <p>
        <label name="buttonText2Label"><strong>Button Text: </strong></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'buttonText2' ); ?>" name="<?php echo $this->get_field_name( 'buttonText2' ); ?>" type="text" value="<?php echo esc_attr(                 $buttonText2 ); ?>" />
    </p>
</div>

<div style="border: 1px solid #e5e5e5; padding: 0 0 20px 0">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Join Us Image', 'field' => 'image3' )); ?>
	<p>	
		<label name="colLabel"><strong> Column 3: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
	</p>
	<p>
		<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
	</p>
	<p>	
		<label name="urlLabel"><strong> Relative URL: </strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url3' ); ?>" name="<?php echo $this->get_field_name( 'url3' ); ?>" type="text" value="<?php echo esc_attr( $url3 ); ?>" />
	</p>	
    <p>
        <label name="buttonText3Label"><strong>Button Text: </strong></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'buttonText3' ); ?>" name="<?php echo $this->get_field_name( 'buttonText3' ); ?>" type="text" value="<?php echo esc_attr(                 $buttonText3 ); ?>" />
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
	$instance['url1'] = ( ! empty( $new_instance['url1'] ) ) ? strip_tags( $new_instance['url1'] ) : '';
	$instance['url2'] = ( ! empty( $new_instance['url2'] ) ) ? strip_tags( $new_instance['url2'] ) : '';
	$instance['url3'] = ( ! empty( $new_instance['url3'] ) ) ? strip_tags( $new_instance['url3'] ) : '';					
	$instance['buttonText1'] = ( ! empty( $new_instance['buttonText1'] ) ) ? strip_tags( $new_instance['buttonText1'] ) : '';					
    $instance['buttonText2'] = ( ! empty( $new_instance['buttonText2'] ) ) ? strip_tags( $new_instance['buttonText2'] ) : '';					
    $instance['buttonText3'] = ( ! empty( $new_instance['buttonText3'] ) ) ? strip_tags( $new_instance['buttonText3'] ) : '';					
	return $instance;
}
} // Class home_pages_widget ends here
?>
