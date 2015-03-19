<?
// Creating the widget 
class vimeo_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'vimeo_widget', 

		// Widget name will appear in UI
		__('Vimeo', 'vimeo_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Vimeo', 'vimeo_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$text = nl2br(apply_filters('widget_text', $instance['text']));
	$text2 = nl2br(apply_filters('widget_text', $instance['text2']));
	
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="vimeo-video">
	<?php if (isset($title) && $title != '') {?>
	<h2 id="title">
		<? echo $title; ?>
		<div class="underline-2"></div>
	</h2>
	<?php }?>
	
	<?php if (isset($text) && $text != '') {?>
	<div class="text">
    	<p><? echo $text; ?></p>
    </div>
	<?php }?>
    
    <div class="flex-video widescreen vimeo">
    	<iframe class="vimeo" src="//player.vimeo.com/video/<? echo $text2; ?>?title=0&amp;byline=0&amp;portrait=0" allowfullscreen></iframe>
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

	if( isset( $instance[ 'text2' ] ) ){
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'text_1_widget_domain' );
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
<p>
   <label >Vimeo Video ID</label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'text2' ); ?>" name="<? echo $this->get_field_name( 'text2' ); ?>" type="text" value="<? echo esc_attr( $text2 ); ?>" />
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';

	return $instance;
}
} // Class vimeo_widget ends here
?>
