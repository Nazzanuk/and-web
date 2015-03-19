<?
// Creating the widget 
class advisors_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'advisors_widget', 

		// Widget name will appear in UI
		__('Advisors', 'advisors_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Advisors', 'advisors_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	global $advisorsList;

	$title = apply_filters( 'widget_title', $instance['title'] );
	$advisors = apply_filters( 'widget_title', $instance['advisors'] );
	$advisorsDir = 'advisory-board/lowres/';
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>



<section id="advisors">
	<a name="advisors"></a>
	<h2><? echo $title; ?>	
		<div class="underline-2"></div>
	</h2>

	<div id="advisor-list">
	<?
	for($i=0; $i<count($advisorsList); $i++){
		$advisor = $advisorsList[$i];
	?>

		<div id="advisor-<? echo $advisor->id; ?>" dataId="<? echo $advisor->id; ?>" class="advisor">
			<img src="<? getThemeDir(); ?>/img/who-we-are/<? echo $advisorsDir; ?><? echo $advisor->id; ?>-1.jpg<? printVersion(); ?>"/>
			<div class="image-2">
				<img src="<? getThemeDir(); ?>/img/who-we-are/<? echo $advisorsDir; ?><? echo $advisor->id; ?>-1.jpg<? printVersion(); ?>"/>
			</div>
			<? if($i + 1 == count($advisorsList)){ ?>
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
		$title = __( 'Title', 'advisors_widget_domain' );
	}

	if( isset( $instance[ 'advisors' ] ) ){
		$advisors = $instance[ 'advisors' ];
	}else {
		$advisors = __( 'Employees', 'advisors_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<? echo $this->get_field_id( 'advisors' ); ?>"><? _e( 'Advisors:' ); ?></label> 
	<textarea style="height:100px" class="widefat" id="<? echo $this->get_field_id( 'advisors' ); ?>" name="<? echo $this->get_field_name( 'advisors' ); ?>"><? echo esc_attr( $advisors ); ?></textarea>
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['advisors'] = ( ! empty( $new_instance['advisors'] ) ) ? strip_tags( $new_instance['advisors'] ) : '';

	return $instance;
}
} // Class advisors_widget ends here
?>
