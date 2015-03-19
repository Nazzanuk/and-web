<?
// Creating the widget 
class map_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'map_widget', 

		// Widget name will appear in UI
		__('Map', 'map_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Map', 'map_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="map">
	<div id="map-canvas"></div>
</div>

<!-- page content --><div id="page-content">

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {

?>



<!-- admin form start -->


<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	return $instance;
}
} // Class map_widget ends here
?>
