<?
// Creating the widget 
class answers_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'answers_widget', 

		// Widget name will appear in UI
		__('Answers', 'answers_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Answers list', 'answers_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );
	$text = nl2br(apply_filters( 'widget_title', $instance['text'] ));

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>

<section class="answers">
	<div class="paragraph">
		<? if($title){ ?>
		<h2><? echo $title; ?>
		    <div class="underline-2"></div>
		</h2>
		<? } ?>
		<p><? echo $text; ?></p>
	</div>
	
	<div class="list">
		<?php
		global $wpdb;
		$answers = $wpdb->get_results("SELECT answers.* FROM (SELECT * FROM wp_answers ORDER BY date DESC) as answers LIMIT 25");
		foreach ($answers as $answer) {
			$actions = "";
			if (current_user_can('edit_pages')) {
				$actions = '<form method="POST" action="' . get_permalink() . 'edit/"><input type="hidden" name="url" value="' . get_permalink() . '"><input type="hidden" name="action" value="edit"><input type="hidden" name="id" value="' . $answer->id . '"><input type="submit" value="Edit"></form> <form method="POST" action="' . get_permalink() . 'edit/"><input type="hidden" name="url" value="' . get_permalink() . '"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="' . $answer->id . '"></input><input class="delete-answer-button" type="submit" value="Delete"></form>'; 
			}
			echo '<div class="answer"><div class="answer-header"><span class="name">' . $answer->firstname . '</span><span class="actions">' . $answer->date . ' ' . $actions . '</span></div><br/><quote class="text">' . $answer->text . '</quote></div>';
		}
		?>
	</div>
	
	
	<?php
		if (current_user_can('edit_pages')) {
			echo '<div class="links"><a href="' . get_permalink() . 'csv/">Export Answers</a> <a href="' . get_permalink() . 'edit/">Add New Answer</a></div>';
		}	
	?>
	
	
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
		$title = __( 'Title', 'answers_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'answers_widget_domain' );
	}
?>



<!-- admin form start -->

<p>
	<label for="<? echo $this->get_field_id( 'title' ); ?>"><? _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<? echo $this->get_field_id( 'title' ); ?>" name="<? echo $this->get_field_name( 'title' ); ?>" type="text" value="<? echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<? echo $this->get_field_id( 'text' ); ?>"><? _e( 'Text:' ); ?></label> 
	<textarea style="height:100px" class="widefat" id="<? echo $this->get_field_id( 'text' ); ?>" name="<? echo $this->get_field_name( 'text' ); ?>"><? echo esc_attr( $text ); ?></textarea>
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
	return $instance;
}
} // Class answers_widget ends here
?>
