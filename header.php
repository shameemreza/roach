<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roach
 * @since 0.0.1
 * @author Shameem Reza
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php

	$disable_header = roach_disable_header();

	if (!$disable_header) {

	?>

		<header class="site-header">

			<div class="site-header-content">

				<?php get_template_part('template-parts/menu/content', 'logo'); ?>

				<?php get_template_part('template-parts/menu/content', 'search'); ?>

				<?php get_template_part('template-parts/menu/content', 'wc'); ?>

				<?php get_template_part('template-parts/menu/content', 'menu'); ?>

			</div>

		</header>

	<?php } ?>
