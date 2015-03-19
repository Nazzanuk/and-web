<?
// Creating the widget 
class quote_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'quote_widget', 

		// Widget name will appear in UI
		__('Quote', 'quote_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Elevator Pitch Quote', 'quote_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$text = nl2br(apply_filters( 'widget_title', $instance['text'] ));
	$text2 = nl2br(apply_filters('widget_title', $instance['text2']));

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div class="quote">
	<div class="background-container">
		<img class="background-image" src="<? echo wp_get_attachment_url($instance['backgroundImage']);?>"/>
	</div>
	<p class="text"><? echo $text; ?></p>
    <div class="main-video">
        <div class="flex-video widescreen vimeo">
            <iframe class="vimeo" src="//player.vimeo.com/video/<? echo $text2; ?>?title=0&amp;byline=0&amp;portrait=0" allowfullscreen></iframe>
        </div>
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

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'quote_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'benefits_widget_domain' );
	}	
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'text' ); ?>"><? _e( 'Text:' ); ?></label> 
	<textarea style="height:100px" class="widefat" id="<? echo $this->get_field_id( 'text' ); ?>" name="<? echo $this->get_field_name( 'text' ); ?>" type="text"><? echo esc_attr( $text ); ?></textarea>
</p>
<p>
   <label >Vimeo Video ID</label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'text2' ); ?>" name="<? echo $this->get_field_name( 'text2' ); ?>" type="text" value="<? echo esc_attr( $text2 ); ?>" />
</p>
<? pco_image_field( $this, $instance,array( 'title' => 'Background Image', 'field' => 'backgroundImage' )); ?>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';	
	$instance['backgroundImage'] = ( ! empty( $new_instance['backgroundImage'] ) ) ? strip_tags( $new_instance['backgroundImage'] ) : '';

	return $instance;
}
} // Class quote_widget ends here
?>
