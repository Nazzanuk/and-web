<?php
/*
Template Name: who-we-are
*/
include "headers.php" 
?>

<?
$employeesString = file_get_contents(themeDir() . 'data/employees/employees.json');
$employeesList = json_decode($employeesString);
?>
<?
$advisorsString = file_get_contents(themeDir() . 'data/advisors/advisors.json');
$advisorsList = json_decode($advisorsString);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script type="text/javascript">
	var employees = <? echo $employeesString; ?>;
	var advisors = <? echo $advisorsString; ?>;
	var version = "<? echo $version; ?>";
	</script>
    <title><? the_title(); ?> - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
</head>

<body class="who-we-are">
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>
	<? if (is_active_sidebar('who-we-are-content')) dynamic_sidebar('who-we-are-content'); ?>
    <? get_template_part('footer'); ?>
</body>

</html>
