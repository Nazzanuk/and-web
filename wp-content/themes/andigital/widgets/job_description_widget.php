<?
// Creating the widget 
class job_description_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'job_description_widget', 

		// Widget name will appear in UI
		__('Job Descption', 'job_description_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Job Description', 'job_description_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	global $job;
	$title = apply_filters( 'widget_title', $instance['title'] );


//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section id="job">

<div class="job-details">
	<? echo $job->description; ?>
	<!--
	<br><br>
	
	<b>Location:</b> <? echo $job->location; ?></br> 
	<b>Category:</b> <? echo $job->category; ?></br>   
	<br>
	<br>
	-->
</div>

</section>

<div id="application-link">
	<div class="inner">
		<div class="arrow"><img src="<? getThemeDir(); ?>img/icons/arrow-down.png"/></div>
		<div class="clear"></div>
		<div class="label">Apply</div>
	</div>
</div>
<div id="application">
	<iframe id="application-frame" src="<? echo set_url_scheme($job->applyUrl); ?>" scrolling="no" frameborder="0" width="100%" height="100%" onload="Application.onLoaded()"></iframe>
</div>
<div id="application-spacing"></div>
<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'job_description_widget_domain' );
	}
?>



<!-- admin form start -->



<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	return $instance;
}
} // Class job_description_widget ends here
?>
