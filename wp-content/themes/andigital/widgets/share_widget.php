<?
// Creating the widget 
class share_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'share_widget', 

		// Widget name will appear in UI
		__('Share', 'share_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Share links', 'share_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$shareUrl1 = apply_filters( 'widget_title', $instance['shareUrl1'] );
	$shareUrl2 = apply_filters( 'widget_title', $instance['shareUrl2'] );
	$shareUrl3 = apply_filters( 'widget_title', $instance['shareUrl3'] );
	$emailSubject = apply_filters( 'widget_title', $instance['emailSubject'] );	
	$checkedPages = $instance['checkedPages'];
	setCheckPages($checkedPages);

	$pageurl = "http://" .$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	
	//echo get_the_title();


//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<div id="share-wrapper">
	<div class="share overlay-data">    
                <div id="share-title">
                    <h1><? echo $title; ?></h1>
                </div>
                <div id="image-container">
                    <div class ="share-image-outer">
                        <div class ="share-image-inner">
							<a class="share-twitter" href="<? echo $shareUrl1 . $pageurl; ?>" onclick="window.open(this.href, 'sharewin', 'left=500,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;">
								<img class="twitter-image" src="<? echo wp_get_attachment_url($instance['image1']);?>"/>
							</a>
                        </div>
                     </div>
                     <div class ="share-image-outer">
                        <div class ="share-image-inner">               
							<a class="share-facebook" href="<? echo $shareUrl2 . $pageurl; ?>" onclick="window.open(this.href, 'sharewin', 'left=500,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;">
								<img class="facebook-image" src="<? echo wp_get_attachment_url($instance['image2']);?>"/>
							</a>
                        </div>
                     </div>
                     <div class ="share-image-outer">
                        <div class ="share-image-inner">                       
							<a class="share-linkedin" href="<? echo $shareUrl3 . $pageurl; ?>" onclick="window.open(this.href, 'sharewin', 'left=500,top=150,width=500,height=500,toolbar=1,resizable=0'); return false;">
								<img class="linkedin-image" src="<? echo wp_get_attachment_url($instance['image3']);?>"/>
							</a>  
                        </div>
                     </div>
                     <div class ="share-image-outer">
                        <div class ="share-image-inner">                  
				<a class="share-email" href="mailto:?subject=<? echo $emailSubject ?>&amp;body=<? echo $pageurl; ?>" title="Share by Email" >   
					<img class="email-image" src="<? echo wp_get_attachment_url($instance['image4']);?>"/>
				</a>
                        </div>
                     </div>
                    <div class="clear"></div>
                </div>     

            <div id="share-url">
                <textarea id="url" rows="3" readonly="true"><? echo $pageurl ?></textarea>
            </div>
            <div class="clear"></div>
        </div>  
	<div id="share-close">
		<img src="<? getThemeDir(); ?>/img/menu/close.png"/>
	</div>	
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
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = __( 'ANDshare', 'share_widget_domain' );
	}
	if ( isset( $instance[ 'shareUrl1' ] ) ) {
		$shareUrl1= $instance[ 'shareUrl1' ];
	}else {
		$shareUrl1= __( 'http://twitter.com/share?text=&url=', 'share_widget_domain' );
	}
	if ( isset( $instance[ 'shareUrl2' ] ) ) {
		$shareUrl2 = $instance[ 'shareUrl2' ];
	}else {
		$shareUrl2 = __( 'http://www.facebook.com/sharer.php?u=', 'share_widget_domain' );
	}
	if ( isset( $instance[ 'shareUrl3' ] ) ) {
		$shareUrl3 = $instance[ 'shareUrl3' ];
	}else {
		$shareUrl3 = __( 'http://www.linkedin.com/shareArticle?mini=true&url=', 'share_widget_domain' );
	}
	if ( isset( $instance[ 'emailSubject' ] ) ) {
		$emailSubject = $instance[ 'emailSubject' ];
	}else {
		$emailSubject = __( 'I wanted you to see this site', 'share_widget_domain' );
	}	
	

	$checkedPages = $instance['checkedPages'];	
?>



<!-- admin form start -->
<p>
    <label for="<? echo $this->get_field_id( 'title' ); ?>"><strong><? _e( 'Title:' ); ?></strong></label> 
    <input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>
<p>
    <label><strong><?php _e( 'Check pages to share:' ); ?></strong></label><br> 
	<? $pages = get_pages(); foreach ($pages as $page) { ?>    
	     <input id="page_<?php echo $page->ID; ?>" type="checkbox" name="<?php echo $this->get_field_name('checkedPages'); ?>[]" value="<?php echo $page->post_title; ?>" <?php if ( in_array($page->post_title, (array) $checkedPages) ) { ?> checked <?php } ?>/><?php echo $page->post_title; ?><br>
	<? } ?>
</p>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Twitter Image', 'field' => 'image1' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'shareUrl1' ); ?>"><strong><?php _e( 'Twitter Share Link:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'shareUrl1' ); ?>" name="<?php echo $this->get_field_name( 'shareUrl1' ); ?>" type="text" value="<?php echo esc_attr( $shareUrl1 ); ?>" />
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Facebook Image', 'field' => 'image2' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'shareUrl2' ); ?>"><strong><?php _e( 'Facebook Share Link:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'shareUrl2' ); ?>" name="<?php echo $this->get_field_name( 'shareUrl2' ); ?>" type="text" value="<?php echo esc_attr( $shareUrl2 ); ?>" />
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'LinkedIn Image', 'field' => 'image3' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'shareUrl3' ); ?>"><strong><?php _e( 'LinkedIn Share Link:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'shareUrl3' ); ?>" name="<?php echo $this->get_field_name( 'shareUrl3' ); ?>" type="text" value="<?php echo esc_attr( $shareUrl3 ); ?>" />
    </p>
</div>
<div style="border: 1px solid #e5e5e5; padding: 20px 0 20px 0">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'LinkedIn Image', 'field' => 'image4' )); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'emailSubject' ); ?>"><strong><?php _e( 'Email Subject:' ); ?></strong></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'emailSubject' ); ?>" name="<?php echo $this->get_field_name( 'emailSubject' ); ?>" type="text" value="<?php echo esc_attr( $emailSubject ); ?>" />
    </p>
</div>
<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();	
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';	
	$instance['shareUrl1'] = ( ! empty( $new_instance['shareUrl1'] ) ) ? strip_tags( $new_instance['shareUrl1'] ) : '';
	$instance['shareUrl2'] = ( ! empty( $new_instance['shareUrl2'] ) ) ? strip_tags( $new_instance['shareUrl2'] ) : '';
	$instance['shareUrl3'] = ( ! empty( $new_instance['shareUrl3'] ) ) ? strip_tags( $new_instance['shareUrl3'] ) : '';		
	$instance['emailSubject'] = ( ! empty( $new_instance['emailSubject'] ) ) ? strip_tags( $new_instance['emailSubject'] ) : '';
	
	$instance['checkedPages'] = isset( $new_instance['checkedPages'] ) ? $new_instance['checkedPages'] : array();	
	return $instance;	
}
} // Class share_widget ends here
?>
