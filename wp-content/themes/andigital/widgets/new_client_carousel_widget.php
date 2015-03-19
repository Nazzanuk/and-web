<?
// Creating the widget 
class new_client_carousel_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'new_client_carousel_widget', 

		// Widget name will appear in UI
		__('New Client Carousel', 'new_client_carousel_widget_domain'), 

		// Widget description
		array( 'description' => __( 'the new client carousel slide image show', 'new_client_carousel_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	//$title = apply_filters( 'widget_title', $instance['title'] );
	$title1 = apply_filters( 'widget_title', $instance['title1'] );
	$title2 = apply_filters( 'widget_title', $instance['title2'] );
	$title3 = apply_filters( 'widget_title', $instance['title3'] );
	$title4 = apply_filters( 'widget_title', $instance['title4'] );
	$title5 = apply_filters( 'widget_title', $instance['title5'] );
	$title6 = apply_filters( 'widget_title', $instance['title6'] );
	$text1 = apply_filters( 'widget_title', $instance['text1'] );
	$text2 = apply_filters( 'widget_title', $instance['text2'] );
	$text3 = apply_filters( 'widget_title', $instance['text3'] );
	$text4 = apply_filters( 'widget_title', $instance['text4'] );
	$text5 = apply_filters( 'widget_title', $instance['text5'] );
	$text6 = apply_filters( 'widget_title', $instance['text6'] );
	
	
	

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="jquery.roundabout.min.js"></script> -->

<script type="text/javascript">
(function($) {

var $descriptions = $('#carousel-descriptions').children('li'),
	$controls = $('#carousel-controls').find('span'),
	$carousel = $('#carousel')
		.roundabout({childSelector:"img", minOpacity:1, autoplay:true, autoplayDuration:5000, autoplayPauseOnHover:true })
		.on('focus', 'img', function() {
			var slideNum = $carousel.roundabout("getChildInFocus");
			
			$descriptions.add($controls).removeClass('current');
			$($descriptions.get(slideNum)).addClass('current');
			$($controls.get(slideNum)).addClass('current');
		});

$controls.on('click dblclick', function() {
	var slideNum = -1,
		i = 0, len = $controls.length;

	for (; i<len; i++) {
		if (this === $controls.get(i)) {
			slideNum = i;
			break;
		}
	}
	
	if (slideNum >= 0) {
		$controls.removeClass('current');
		$(this).addClass('current');
		$carousel.roundabout('animateToChild', slideNum);
	}
});

}(jQuery));
</script>

<style rel="stylesheet" type="text/css" media="screen">
	body{background:#FFFFFF; color:#eee;}
		.roundabout-holder {
			padding: 0;
			margin: 0 auto;
			height: 400px;
			width: 900px;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
		}
		
		.roundabout-moveable-item {
			height: 400px;
			width: 320px;
			cursor: pointer;
			
			display:block;
		}
		
		.roundabout-moveable-item img {
			height: 100%;
			width: 100%;
		}
		
		.roundabout-in-focus {
			cursor: auto;
		}
		
		#carousel-descriptions {
			list-style:none;
			display:block;
			width:850px;
			margin:25px auto;
			padding:0;
            font-size: 1.1em;
            color: #8a8e99;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
		}
		
		#carousel-descriptions li {
			font-size: 1.1em;
			
			text-align:center;
			display:none;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
		}
		
		#carousel-descriptions li.current {
			display:block;
		}
		
		#carousel-controls {
			max-width:900px;
			width:auto;
			margin:25px auto;
			overflow:auto;
			border-collapse:collapse;
			text-align:center;
		}
		
		#carousel-controls span {
			width:10px;
			display:inline-block;
			font-size:14px;
			text-align:center;
			margin:0 5px;
			padding:5px;
			cursor:pointer;
			
			background:#FFFFFF;			
		}
		/*
		#carousel-controls td span {
			font-size:14px;
			text-align:center;
			margin:0 5px;
			padding:5px;
			cursor:pointer;
			border:1px solid black;
			background:#333;
		}*/
		
		#carousel-controls .current {
			background:#600;
			color:;
			border-color:#400;
		}
	</style>



	<div id="carousel">
		<img src="<? echo wp_get_attachment_url($instance['image1']);?>" alt="" class="slide" />
		<img src="<? echo wp_get_attachment_url($instance['image2']);?>" alt="" class="slide" />
		<img src="<? echo wp_get_attachment_url($instance['image3']);?>" alt="" class="slide" />
		<img src="<? echo wp_get_attachment_url($instance['image4']);?>" alt="" class="slide" />
		<img src="<? echo wp_get_attachment_url($instance['image5']);?>" alt="" class="slide" />
		<img src="<? echo wp_get_attachment_url($instance['image6']);?>" alt="" class="slide" />

	
</div>

<ul id="carousel-descriptions">
	<li class="desc current"><? echo $title1; ?><br>
    <p><? echo $text1; ?></p>
    </li>
	<li class="desc"><? echo $title2; ?><br>
    <p><? echo $text2; ?></p>
    </li>
    
	<li class="desc"><? echo $title3; ?><br>
    <p><? echo $text3; ?></p></li>
	<li class="desc"><? echo $title4; ?><br>
    <p><? echo $text4; ?></p></li>
	<li class="desc"><? echo $title5; ?><br>
    <p><? echo $text5; ?></p></li>
	<li class="desc"><? echo $title6; ?><br>
    <p><? echo $text6; ?></p></li>
	
</ul>

<div id="carousel-controls">
	<span class="control current">1</span>
	<span class="control">2</span>
	<span class="control">3</span>
	<span class="control">4</span>
	<span class="control">5</span>
	<span class="control">6</span>
	
</div>

	<hr />


<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	/*
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'carousel_widget_domain' );
	}

	*/

	if ( isset( $instance[ 'title1' ] ) ) {
		$title1 = $instance[ 'title1' ];
	}else {
		$title1 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title2' ] ) ) {
		$title2 = $instance[ 'title2' ];
	}else {
		$title2 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title3' ] ) ) {
		$title3 = $instance[ 'title3' ];
	}else {
		$title3 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title4' ] ) ) {
		$title4 = $instance[ 'title4' ];
	}else {
		$title4 = __( 'Title', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'title5' ] ) ) {
		$title5 = $instance[ 'title5' ];
	}else {
		$title5 = __( 'Title', 'values_widget_domain' );
	}

	if ( isset( $instance[ 'title6' ] ) ) {
		$title6 = $instance[ 'title6' ];
	}else {
		$title6 = __( 'Title', 'values_widget_domain' );
	}




	//text
	if ( isset( $instance[ 'text1' ] ) ) {
		$text1 = $instance[ 'text1' ];
	}else {
		$text1 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text2' ] ) ) {
		$text2 = $instance[ 'text2' ];
	}else {
		$text2 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text3' ] ) ) {
		$text3 = $instance[ 'text3' ];
	}else {
		$text3 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text4' ] ) ) {
		$text4 = $instance[ 'text4' ];
	}else {
		$text4 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text5' ] ) ) {
		$text5 = $instance[ 'text5' ];
	}else {
		$text5 = __( 'Text', 'values_widget_domain' );
	}
	if ( isset( $instance[ 'text6' ] ) ) {
		$text6 = $instance[ 'text6' ];
	}else {
		$text6 = __( 'Text', 'values_widget_domain' );
	}



	?>





	<div style="border: 1px solid #e5e5e5; padding: 20px">
    <?php  pco_image_field( $this, $instance,array( 'title' => 'Client 1 Image', 'field' => 'image1' )); ?>
    <p>
	    <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><strong><?php _e( 'Title 1:' ); ?></strong></label>
	    <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
    </p>
    <p>
	    <textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" type="text"><?php echo esc_attr( $text1 ); ?></textarea>
    </p>
</div>


	<div style="border: 1px solid #e5e5e5; padding: 20px">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Client 2 Image', 'field' => 'image2' )); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><strong><?php _e( 'Title 2:' ); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
		</p>
		<p>
			<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" type="text"><?php echo esc_attr( $text2 ); ?></textarea>
		</p>
	</div>





	<div style="border: 1px solid #e5e5e5; padding: 20px">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Client 3 Image', 'field' => 'image3' )); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title3' ); ?>"><strong><?php _e( 'Title 3:' ); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
		</p>
		<p>
			<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" type="text"><?php echo esc_attr( $text3 ); ?></textarea>
		</p>
	</div>




	<div style="border: 1px solid #e5e5e5; padding: 20px">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Client 4 Image', 'field' => 'image4' )); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title4' ); ?>"><strong><?php _e( 'Title 4:' ); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
		</p>
		<p>
			<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text4' ); ?>" name="<?php echo $this->get_field_name( 'text4' ); ?>" type="text"><?php echo esc_attr( $text4 ); ?></textarea>
		</p>
	</div>





	<div style="border: 1px solid #e5e5e5; padding: 20px">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Client 5 Image', 'field' => 'image5' )); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title5' ); ?>"><strong><?php _e( 'Title 5:' ); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" type="text" value="<?php echo esc_attr( $title5 ); ?>" />
		</p>
		<p>
			<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text5' ); ?>" name="<?php echo $this->get_field_name( 'text5' ); ?>" type="text"><?php echo esc_attr( $text5 ); ?></textarea>
		</p>
	</div>





	<div style="border: 1px solid #e5e5e5; padding: 20px">
		<?php  pco_image_field( $this, $instance,array( 'title' => 'Client 6 Image', 'field' => 'image6' )); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title6' ); ?>"><strong><?php _e( 'Title 6:' ); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title6' ); ?>" name="<?php echo $this->get_field_name( 'title6' ); ?>" type="text" value="<?php echo esc_attr( $title6 ); ?>" />
		</p>
		<p>
			<textarea style="height:100px" class="widefat" id="<?php echo $this->get_field_id( 'text6' ); ?>" name="<?php echo $this->get_field_name( 'text6' ); ?>" type="text"><?php echo esc_attr( $text6 ); ?></textarea>
		</p>
	</div>






<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	//$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	$instance['image4'] = ( ! empty( $new_instance['image4'] ) ) ? strip_tags( $new_instance['image4'] ) : '';
	$instance['image5'] = ( ! empty( $new_instance['image5'] ) ) ? strip_tags( $new_instance['image5'] ) : '';
	$instance['image6'] = ( ! empty( $new_instance['image6'] ) ) ? strip_tags( $new_instance['image6'] ) : '';

	$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
	$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
	$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
	$instance['title4'] = ( ! empty( $new_instance['title4'] ) ) ? strip_tags( $new_instance['title4'] ) : '';
	$instance['title5'] = ( ! empty( $new_instance['title5'] ) ) ? strip_tags( $new_instance['title5'] ) : '';
	$instance['title6'] = ( ! empty( $new_instance['title6'] ) ) ? strip_tags( $new_instance['title6'] ) : '';
	$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
	$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
	$instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
	$instance['text4'] = ( ! empty( $new_instance['text4'] ) ) ? strip_tags( $new_instance['text4'] ) : '';
	$instance['text5'] = ( ! empty( $new_instance['text5'] ) ) ? strip_tags( $new_instance['text5'] ) : '';
	$instance['text6'] = ( ! empty( $new_instance['text6'] ) ) ? strip_tags( $new_instance['text6'] ) : '';


				
	return $instance;
}
} // Class carousel_widget ends here
?>


