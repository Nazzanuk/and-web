<?
// Creating the widget 
class header_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'header_widget', 

		// Widget name will appear in UI
		__('Header', 'header_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Header for a page', 'header_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$type = apply_filters( 'widget_title', $instance['type'] );

	//if ( ! empty( $title ) )
	//echo '<h1>' . $title . '</h1>';

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<?
$class = $type;
$logo1 = 'white/logo.png';
$logo2 = 'red/logo.png';
$link1 = 'white/menu.png';
$link2 = 'red/menu.png';
$share1 = 'white/share.png';
$share2 = 'red/share.png';

if($type == 'type-red'){
	$logo1 = 'red/logo.png';
	$link1 = 'red/menu.png';
	$share1 = 'red/share.png';
}
?>

<header class="<? echo $class; ?>">
	<div class="background"></div>
	
	<div class="logo">
		<a class="logo-img" href="<? echo get_site_url(); ?>"><img src="<? getThemeDir(); ?>img/header/<? echo $logo1; ?>"/></a>
		<a class="logo-red-img" href="<? echo get_site_url(); ?>"><img src="<? getThemeDir(); ?>img/header/<? echo $logo2; ?>"/></a>
	</div>

	<div id="menu-link">
		<img class="link-img" src="<? getThemeDir(); ?>img/header/<? echo $link1; ?>"/>
		<img class="link-red-img" src="<? getThemeDir(); ?>img/header/<? echo $link2; ?>"/>
	</div>

<? foreach (getCheckPages() as $page) { 
    if ($page == get_the_title()) { ?>		
	<div id="share-link">
		<img class="share-img" src="<? getThemeDir(); ?>img/header/<? echo $share1; ?>"/>
		<img class="share-red-img" src="<? getThemeDir(); ?>img/header/<? echo $share2; ?>"/>		
	</div>   	
<? break;}} ?>

	<div class="clear"></div>
</header>

<script type="text/javascript">
	Header.setType('<? echo $type; ?>');
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
	if ( isset( $instance[ 'type' ] ) ) {
		$type = $instance[ 'type' ];
	}
	else {
		$type = __( 'New type', 'header_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type:' ); ?></label> 
	<select class="widefat" id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>"><option value="default" <?php if (esc_attr( $type ) == 'default') { echo 'selected'; } ?>>Default</option><option value="type-red" <?php if (esc_attr( $type ) == 'type-red') { echo 'selected'; } ?>>Red</option></select>
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';

	return $instance;
}
} // Class header_widget ends here
?>
