<?php
/*
Template Name: andgenie
*/
include "headers.php" 
?>
<!DOCTYPE html>
<html>
	
<head>
    <meta charset="utf-8">
    <title><?php the_title(); ?> - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
</head>

<body>
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>
	<? if (is_active_sidebar('andgenie-content')) dynamic_sidebar('andgenie-content'); ?>
	<? get_template_part('footer'); ?>
</body>

</html>
