<?
// Creating the widget 
class employees_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'employees_widget', 

		// Widget name will appear in UI
		__('Our People', 'employees_widget_domain'), 

		// Widget description
		array( 'description' => __( 'List of employees', 'employees_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	global $employeesList;

	$title = apply_filters( 'widget_title', $instance['title'] );
	$employees = apply_filters( 'widget_title', $instance['employees'] );
	$employeesDir = 'our-people/lowres/';
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>



<section id="employees">
	<a name="employees"></a>
	<h2><? echo $title; ?>	
		<div class="underline-2"></div>
	</h2>

	<div id="employee-list">
	<?
	for($i=0; $i<count($employeesList); $i++){
		$employee = $employeesList[$i];
	?>

		<div id="employee-<? echo $employee->id; ?>" dataId="<? echo $employee->id; ?>" class="employee">
			<img src="<? getThemeDir(); ?>/img/who-we-are/<? echo $employeesDir; ?><? echo $employee->id; ?>-1.jpg<? printVersion(); ?>"/>
			<div class="image-2">
				<img src="<? getThemeDir(); ?>/img/who-we-are/<? echo $employeesDir; ?><? echo $employee->id; ?>-2.jpg<? printVersion(); ?>"/>
			</div>
			<? if($i + 1 == count($employeesList)){ ?>
			<div class="last-border"></div>
			<? } ?>
		</div>

	<? } ?>

		<div class="clear"></div>
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
		$title = __( 'Title', 'employees_widget_domain' );
	}

	if( isset( $instance[ 'employees' ] ) ){
		$employees = $instance[ 'employees' ];
	}else {
		$employees = __( 'Employees', 'employees_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<? echo $this->get_field_id( 'employees' ); ?>"><? _e( 'Employees:' ); ?></label> 
	<textarea style="height:100px" class="widefat" id="<? echo $this->get_field_id( 'employees' ); ?>" name="<? echo $this->get_field_name( 'employees' ); ?>"><? echo esc_attr( $employees ); ?></textarea>
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['employees'] = ( ! empty( $new_instance['employees'] ) ) ? strip_tags( $new_instance['employees'] ) : '';

	return $instance;
}
} // Class employees_widget ends here
?>
