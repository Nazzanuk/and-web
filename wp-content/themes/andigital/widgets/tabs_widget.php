<?
// Creating the widget 
class tabs_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'tabs_widget', 

		// Widget name will appear in UI
		__('Tabs', 'tabs_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Page tabs', 'tabs_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$label1 = apply_filters( 'widget_title', $instance['label1'] );
	$label2 = apply_filters( 'widget_title', $instance['label2'] );
	$url1 = apply_filters( 'widget_title', $instance['url1'] );
	$url2 = apply_filters( 'widget_title', $instance['url2'] );
	$selected = apply_filters( 'widget_title', $instance['selected'] );
	$isSelected = array('','');
	$isSelected[$selected - 1] = ' selected';

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="tabs" class="tabs-wrapper version-2">
	<div class="tabs">
		<a href="../<? echo $url1; ?>" class="<? echo $isSelected[0]; ?> tab-1"><? echo $label1; ?></a>
		<div class="divider"></div>
		<a href="../<? echo $url2; ?>" class="<? echo $isSelected[1]; ?> tab-2"><? echo $label2; ?></a>
	</div>
</div>

<script type="text/javascript">
	Header.loadTabs([{label:'<? echo $label1; ?>',url:'<? echo $url1; ?>',selected:'<? echo $isSelected[0]; ?>'},{label:'<? echo $label2; ?>',url:'<? echo $url2; ?>',selected:'<? echo $isSelected[1]; ?>'}]);
</script>

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	//labels
	if ( isset( $instance[ 'label1' ] ) ) {
		$label1 = $instance[ 'label1' ];
	}else {
		$label1 = __( 'Label 1', 'tabs_widget_domain' );
	}
	if ( isset( $instance[ 'label2' ] ) ) {
		$label2 = $instance[ 'label2' ];
	}else {
		$label2 = __( 'Label 2', 'tabs_widget_domain' );
	}

	//urls
	if ( isset( $instance[ 'url1' ] ) ) {
		$url1 = $instance[ 'url1' ];
	}else {
		$url1 = __( 'URL 1', 'tabs_widget_domain' );
	}
	if ( isset( $instance[ 'url2' ] ) ) {
		$url2 = $instance[ 'url2' ];
	}else {
		$url2 = __( 'URL 2', 'tabs_widget_domain' );
	}

	//selected
	if ( isset( $instance[ 'selected' ] ) ) {
		$selected = $instance[ 'selected' ];
	}else {
		$selected = __( '1', 'tabs_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<?php echo $this->get_field_id( 'label1' ); ?>"><?php _e( 'Label 1:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'label1' ); ?>" name="<?php echo $this->get_field_name( 'label1' ); ?>" type="text" value="<?php echo esc_attr( $label1 ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'url1' ); ?>"><?php _e( 'URL 1:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'url1' ); ?>" name="<?php echo $this->get_field_name( 'url1' ); ?>" type="text" value="<?php echo esc_attr( $url1 ); ?>" />
</p>


<p>
	<label for="<?php echo $this->get_field_id( 'label2' ); ?>"><?php _e( 'Label 2:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'label2' ); ?>" name="<?php echo $this->get_field_name( 'label2' ); ?>" type="text" value="<?php echo esc_attr( $label2 ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'url2' ); ?>"><?php _e( 'URL 2:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'url2' ); ?>" name="<?php echo $this->get_field_name( 'url2' ); ?>" type="text" value="<?php echo esc_attr( $url2 ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'selected' ); ?>"><?php _e( 'Selected tab:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'selected' ); ?>" name="<?php echo $this->get_field_name( 'selected' ); ?>" type="number" min="1" max="2" value="<?php echo esc_attr( $selected ); ?>" />
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['label1'] = ( ! empty( $new_instance['label1'] ) ) ? strip_tags( $new_instance['label1'] ) : '';
	$instance['label2'] = ( ! empty( $new_instance['label2'] ) ) ? strip_tags( $new_instance['label2'] ) : '';
	$instance['url1'] = ( ! empty( $new_instance['url1'] ) ) ? strip_tags( $new_instance['url1'] ) : '';
	$instance['url2'] = ( ! empty( $new_instance['url2'] ) ) ? strip_tags( $new_instance['url2'] ) : '';
	$instance['selected'] = ( ! empty( $new_instance['selected'] ) ) ? strip_tags( $new_instance['selected'] ) : '';

	return $instance;
}
} // Class tabs_widget ends here
?>
