<?php
/*
Template Name: privacy-policy
*/
include "headers.php" 
?>
<!DOCTYPE html>
<html>
	
<head>
    <meta charset="utf-8">
    <title><? the_title(); ?> - ANDigital</title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
</head>

<body class="privacy-policy">
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>
	<? if (is_active_sidebar('privacy-policy-content')) dynamic_sidebar('privacy-policy-content'); ?>
    <? get_template_part('footer'); ?>
</body>

</html>
