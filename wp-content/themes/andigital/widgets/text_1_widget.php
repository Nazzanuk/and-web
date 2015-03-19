<?
// Creating the widget 
class text_1_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'text_1_widget', 

		// Widget name will appear in UI
		__('Text - 1 Column', 'text_1_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Single column text', 'text_1_widget_domain' ), ) 
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

<section class="text-1">
    <? if ( ! empty( $instance['backgroundImage1'] ) ) { ?>
	    <img class="background-image" src="<? echo wp_get_attachment_url($instance['backgroundImage1']);?>"/>
	<? } ?>

	<div class="paragraph">
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
		$title = __( 'Title', 'text_1_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'text_1_widget_domain' );
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
<? pco_image_field( $this, $instance,array( 'title' => 'Background Image1', 'field' => 'backgroundImage1' )); ?>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	$instance['backgroundImage1'] = ( ! empty( $new_instance['backgroundImage1'] ) ) ? strip_tags( $new_instance['backgroundImage1'] ) : '';
	return $instance;
}
} // Class text_1_widget ends here
?>
