<?php
/*
Template Name: home
*/
include "headers.php" 
?>
<!DOCTYPE html>
<html>
	
<head>
    <meta charset="utf-8">
    <title>ANDigital - <? the_title(); ?></title>
	<? get_template_part('meta'); ?>
	<? get_template_part('stylesheets'); ?>
	<? get_template_part('scripts'); ?>
	<? get_template_part('canonical'); ?>
	<script type="text/javascript">
	Site.pageID = 'home';
	</script>
</head>

<body class="home">
    <? get_template_part('analytics'); ?>
	<? get_template_part('header'); ?>
	<? if (is_active_sidebar('home-content')) dynamic_sidebar('home-content'); ?>
    <? get_template_part('footer'); ?>
</body>

</html>
