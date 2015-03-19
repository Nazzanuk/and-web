<?
// Creating the widget 
class jobs_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jobs_widget', 

		// Widget name will appear in UI
		__('Jobs', 'jobs_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Job listings', 'jobs_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	//$jobs = array('Product Analyst','Product Developer','Product Delivery Lead','Associate','Assistant Manager');
//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="job-listings">

<?
require( get_template_directory() . '/jobvite/jobvite.php' );

$jobvite = new Jobvite('qbP9VfwO&cf=e');
$jobvite->build();

foreach ($jobvite->jobs() as $job){
$description = $job->briefDescription;
$description = str_replace('<strong>', '',$description);
$description = str_replace('</strong>', '',$description);
//$description = 'The Assistant Manager will support the Product Delivery Lead in their role by supporting the full adoption and seamless delivery of our Agile delivery methods with more traditional delivery techniques. As the expert in managing and delivering projects, the Assistant Manager will ensure projects are delivered on time and within budget. They will build strong relationships with stakeholders, influence and execute project management methodologies and mentor more junior members of the team.';
?>
	<section class="job no-underline">
		<h2><? echo $job->title; ?>
		    <div class="underline-2"></div>
		</h2>
		<? echo $description; ?>
		<br>
		
		<a href="<? echo get_site_url(); ?>/join-us/jobs/<? echo $job->url; ?>" class="button">Find Out More</a>
	</section>

<? } ?>

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
	if( isset( $instance[ 'title' ] ) ){
		$title = $instance[ 'title' ];
	}else {
		$title = __( 'Title', 'jobs_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'jobs_widget_domain' );
	}
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
} // Class jobs_widget ends here
?>
