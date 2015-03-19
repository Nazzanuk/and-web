<?
// Creating the widget 
class answer_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'answer_widget', 

		// Widget name will appear in UI
		__('Answer', 'answer_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Answer form', 'answer_widget_domain' ), ) 
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

<section class="answer">
	<div class="paragraph">
		<? if($title){ ?>
		<h2><? echo $title; ?>
		    <div class="underline-2"></div>
		</h2>
		<? } ?>
		<p><? if (!current_user_can('edit_pages')) { echo 'This area is reserved. <a href="' . get_site_url() .'/wp-admin/">Login</a> to insert an answer.'; } ?></p>
	</div>
	<?
		if (current_user_can('edit_pages')) {
			$id = isset($_POST['id']) ? $_POST['id'] : '';
			$url = isset($_POST['url']) ? $_POST['url'] : get_permalink();
			$action = isset($_POST['action']) ? $_POST['action'] : 'new';
			$email = '';
			$firstname = '';
			$surname = '';
			$occupation = '';
			$notes = '';
			$text = '';
			$emailError = '';
			$firstnameError = '';
			$surnameError = '';
			$occupationError = '';
			$notesError = '';
			$textError = '';
			if (isset($action) && $action == 'save') {
				$email = isset($_POST['email']) ? $_POST['email'] : '';
				$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
				$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
				$occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
				$notes = isset($_POST['notes']) ? $_POST['notes'] : '';
				$text = isset($_POST['text']) ? $_POST['text'] : '';
				$valid = true; 
				if (!isset($email) || $email == '' || !preg_match("/.+@.+/i", $email) || strlen($email) > 200) {
					$emailError = 'Not Valid or too long';
					$valid = false;
				}
				if (!isset($firstname) || $firstname == '' || strlen($firstname) > 100) {
					$firstnameError = 'Not Valid or too long';
					$valid = false;
				}
				if (!isset($surname) || $surname == '' || strlen($surname) > 100) {
					$surnameError = 'Not Valid or too long';
					$valid = false;
				}
				if (!isset($occupation) || $occupation == '' || strlen($occupation) > 1000) {
					$occupationError = 'Not Valid or too long';
					$valid = false;
				}
				if (!isset($text) || $text == '' || strlen($text) > 4096) {
					$textError = 'Not Valid or too long';
					$valid = false;
				}
				if (!isset($notes) || $notes == '' || strlen($notes) > 4096) {
					$notesError = 'Not Valid or too long';
					$valid = false;
				}
				if ($valid) {
					global $wpdb;
					if ($id != '') {
						$wpdb->update( 
							'wp_answers', 
							array( 
								'email' => $email, 
								'firstname' => $firstname, 
								'surname' => $surname, 
								'occupation' => $occupation, 
								'notes' => $notes,
								'text' => $text
							), 
							array('id' => $id), 
							array( 
								'%s', 
								'%s', 
								'%s', 
								'%s', 
								'%s', 
								'%s' 
							),
							array('%d') 
						);
					} else {
						$wpdb->insert( 
							'wp_answers', 
							array( 
								'email' => $email, 
								'firstname' => $firstname, 
								'surname' => $surname, 
								'occupation' => $occupation, 
								'notes' => $notes,
								'text' => $text
							), 
							array( 
								'%s', 
								'%s', 
								'%s', 
								'%s', 
								'%s', 
								'%s' 
							)
						);
					}
					echo '<div class="result success">Data saved</div>';
					$email = '';
					$firstname = '';
					$surname = '';
					$occupation = '';
					$notes = '';
					$text = '';
					$action = '';
					if ($url == '') {
						$url = get_site_url() . '/edit/';
					}
				} else {
					echo '<div class="result fail">Data not valid</div>';
					$action = 'edit';
				}
			} else if (isset($action) && $action == 'delete') {
				global $wpdb;
				if (preg_match("/\\d+/i", $id)) {
					$wpdb->delete('wp_answers', array('id' => $id));
					echo '<div class="result success">Answer deleted</div>';
				} else {
					echo '<div class="result fail">Answer not found</div>';
				}
				$action = '';
			} else if (isset($action) && $action == 'edit') {
				global $wpdb;
				if (preg_match("/\\d+/i", $id)) {
					$answer = $wpdb->get_row("SELECT * FROM wp_answers WHERE id = '" . $id . "'");
					$email = $answer->email;
					$firstname = $answer->firstname;
					$surname = $answer->surname;
					$occupation = $answer->occupation;
					$notes = $answer->notes;
					$text = $answer->text;
				} else {
					echo '<div class="result fail">Answer not found</div>';
					$action = '';
				}
			}
			if (isset($action) && ($action == 'edit' || $action == 'new')) {
			?>
			<div class="form">
			<form method="POST">
				<label for="email" class="<? echo ($emailError != '' ? 'error' : 'valid'); ?>">Email</label><br/>
				<span class="error"><? echo $emailError; ?></span><br/>
				<input class="half" type="email" name="email" value="<? echo $email; ?>"></input><br/>
				<label for="firstname" class="<? echo ($firstnameError != '' ? 'error' : 'valid'); ?>">First Name</label><br/>
				<span class="error"><? echo $firstnameError; ?></span><br/>
				<input class="half" type="text" name="firstname" value="<? echo $firstname; ?>"></input><br/>
				<label for="surname" class="<? echo ($surnameError != '' ? 'error' : 'valid'); ?>">Surname</label><br/>
				<span class="error"><? echo $surnameError; ?></span><br/>
				<input class="half" type="text" name="surname" value="<? echo $surname; ?>"></input><br/>
				<label for="occupation" class="<? echo ($occupationError != '' ? 'error' : 'valid'); ?>">Occupation</label><br/>
				<span class="error"><? echo $occupationError; ?></span><br/>
				<input class="half" type="text" name="occupation" value="<? echo $occupation; ?>"></input><br/>
				<label for="text" class="<? echo ($textError != '' ? 'error' : 'valid'); ?>">Answer</label><br/>
				<span class="error"><? echo $textError; ?></span><br/>
				<textarea class="full" rows="10" name="text"><? echo $text; ?></textarea><br/>
				<label for="notes" class="<? echo ($notesError != '' ? 'error' : 'valid'); ?>">Notes</label><br/>
				<span class="error"><? echo $notesError; ?></span><br/>
				<textarea class="full" rows="10" name="notes"><? echo $notes; ?></textarea><br/>
				<input type="hidden" name="id" value="<? echo $id; ?>"></input>
				<input type="hidden" name="url" value="<? echo $url; ?>"></input>
				<input type="hidden" name="action" value="save"></input>
				<input type="submit" value="Save"></input>
			</form>
			</div>
			<?
			}
			if (isset($url) && $url != '' && $url != get_permalink()) {
				echo '<div class="links"><a href="' . $url . '">Go Back</a></div>';
			} else {
				if (isset($action) && ($action == 'edit' || $action == 'new')) {
					echo '<div class="links"><a href="..">View All Answers</a></div>';
				} else {
					echo '<div class="links"><a href="' . get_permalink() . '">Continue</a></div>';
				}
			}
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
		$title = __( 'Title', 'answer_widget_domain' );
	}

	if( isset( $instance[ 'text' ] ) ){
		$text = $instance[ 'text' ];
	}else {
		$text = __( 'Text', 'answer_widget_domain' );
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
} // Class answer_widget ends here
?>
