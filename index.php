<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Roach
 * @since 0.0.1
 * @author Shameem Reza
 */

get_header();

$show_sidebar = get_theme_mod("roach_show_sidebar_home");
?>

<main class="content-loop">

  <?php roach_show_ads(5); ?>

  <?php get_template_part("template-parts/header/content", "header"); ?>

  <?php roach_show_home_text_before(); ?>

  <?php if ($show_sidebar): ?>

    <section class="content-all">

      <section class="content-thin">

      <?php endif; ?>

      <section class="content-area">

        <?php get_template_part("template-parts/loops/loop", "last"); ?>

      </section>

      <?php roach_show_home_text_after(); ?>

      <?php if ($show_sidebar): ?>

      </section>

      <?php get_sidebar(); ?>

    </section>

  <?php endif; ?>

</main>

<?php get_footer(); ?>
