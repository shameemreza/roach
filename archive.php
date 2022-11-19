<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 0.0.1
 * @author Shameem Reza
 */

get_header(); ?>

<main class="content-loop">

  <section class="content-area">

    <?php if (have_posts()): ?>

      <?php get_columns(); ?>

      <?php while (have_posts()):
          the_post(); ?>

        <?php get_template_part("template-parts/content/content", "loop"); ?>

      <?php
      endwhile;else: ?>

      <?php get_template_part("template-parts/none/content", "none"); ?>

    <?php endif; ?>

    <?php
    $paginate = paginate_links([
        "prev_text" => "«",
        "next_text" => "»",
    ]);

    if ($paginate): ?>

      <nav class="pagination"><?php echo $paginate; ?></nav>

    <?php endif;
    ?>

  </section>

</main>

<?php get_footer(); ?>
