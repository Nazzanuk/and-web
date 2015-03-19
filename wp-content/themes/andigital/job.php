<?php
/*
Template Name: job
*/
include "headers.php" 
?>

<?
//job
require( get_template_directory() . '/jobvite/jobvite.php' );
$reqid = get_custom_field('page_data:to_link_ref');//$_GET['reqid'];
$jobvite = new Jobvite('qbP9VfwO&cf=e');
$jobvite->build();
$job = $jobvite->returnJobByTitle(get_the_title());
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><? echo $job->title; ?> - Jobs - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
</head>

<body class="job-descrption">
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>
	<? if (is_active_sidebar('job-description')) dynamic_sidebar('job-description'); ?>
    <? get_template_part('footer'); ?>
</body>

</html>
