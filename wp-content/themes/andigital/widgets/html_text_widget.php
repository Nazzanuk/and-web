<?
// Creating the widget 
class html_text_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'html_text_widget', 

		// Widget name will appear in UI
		__('HTML Text Widget', 'html_text_widget_domain'), 

		// Widget description
		array( 'description' => __( 'HTML Text Widget', 'html_text_widget_domain' ), ), 

		// Widget control operations
		array('width' => 400, 'height' => 350)
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="html-text">
	<div class="paragraph">
		<p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p>
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
		$title = strip_tags($instance['title']);
	}else {
		$title = __( 'Title', 'html_text_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = esc_textarea($instance['text']);
	}else {
		$text = __( 'Text', 'html_text_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<? echo $this->get_field_id( 'text' ); ?>"><? _e( 'Text:' ); ?></label> 
	<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
</p>
<p>
	<input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;
	<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label>
</p>


<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {	
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	if ( current_user_can('unfiltered_html') )
		$instance['text'] =  $new_instance['text'];
	else
		$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
	$instance['filter'] = isset($new_instance['filter']);
	return $instance;	
	
}
} // Class html_text_widget ends here
?>
