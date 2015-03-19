<?
// Creating the widget 
class dod_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'dod_widget', 

		// Widget name will appear in UI
		__('Definition of Digital', 'dod_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Our definition of digital.', 'dod_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$text = nl2br(apply_filters( 'widget_title', $instance['text'] ));

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="dod no-underline">
	<img class="background-image" src="<? echo wp_get_attachment_url($instance['backgroundImage']);?>"/>
	<div class="text">
		<? if($title){ ?>
		<h2><? echo $title; ?>
		    <div class="underline-2"></div>
		</h2>
		<? } ?>
		<p><? echo $text; ?></p>
	</div>
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
	if( isset( $instance[ 'title' ] ) ){
		$title = $instance[ 'title' ];
	}else {
		$title = __( 'Title', 'dod_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'dod_widget_domain' );
	}
?>



<!-- admin form start -->
<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<? echo $this->get_field_id( 'text' ); ?>"><? _e( 'Text:' ); ?></label> 
	<textarea style="height:100px" class="widefat" id="<? echo $this->get_field_id( 'text' ); ?>" name="<? echo $this->get_field_name( 'text' ); ?>"><? echo esc_attr( $text ); ?></textarea>
</p>
<? pco_image_field( $this, $instance,array( 'title' => 'Background Image', 'field' => 'backgroundImage' )); ?>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	$instance['backgroundImage'] = ( ! empty( $new_instance['backgroundImage'] ) ) ? strip_tags( $new_instance['backgroundImage'] ) : '';

	return $instance;
}
} // Class dod_widget ends here
?>
