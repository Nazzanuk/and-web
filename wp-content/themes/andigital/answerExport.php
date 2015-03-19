<?php
/*
Template Name: answerExport
*/
header("Cache-Control: must-revalidate");
header("Pragma: must-revalidate");
header("Content-type: application/csv");
header("Content-disposition: attachment; filename=Answers " . date('Y-m-d H:i:s') . ".csv");
if (current_user_can('edit_pages')) {
	global $wpdb;
	$answers = $wpdb->get_results("SELECT * FROM wp_answers ORDER BY date ASC;");
	echo "surname,firstname,email,occupation,date,text,notes\n";
	foreach ($answers as $answer) {
		echo '"' . $answer->surname . '","' . $answer->firstname . '","' . $answer->email . '","' . $answer->occupation . '","' . $answer->date . '","' . $answer->text . '","' . $answer->notes . "\"\n";
	}
}
?>
