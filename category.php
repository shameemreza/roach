<?php

/**
 * The template for displaying categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roach
 * @author Shameem Reza
 * @since 0.0.1
 */

get_header();

$show_sidebar = get_theme_mod('roach_show_sidebar_cat');

$enable_featured_posts = get_theme_mod('roach_enable_featured_posts');

$cat_extra_description = wpautop(get_term_meta(get_queried_object()->term_id, 'cat_extra_description', true));

?>

<main class="content-loop">

  <?php roach_show_ads(5); ?>

  <?php get_template_part('template-parts/header/content', 'header'); ?>

  <?php if ($show_sidebar) : ?>

    <section class="content-all">

      <section class="content-thin">

      <?php endif; ?>

      <section class="content-area ">

        <?php if (have_posts()) : ?>

          <?php get_columns(); ?>

          <?php $columns = get_query_var('columns');  ?>

          <?php $count = 1; ?>

          <?php while (have_posts()) : the_post(); ?>

            <?php if (($count <= $columns) && ($enable_featured_posts)) { ?>

              <?php get_template_part('template-parts/content/content', 'loop-featured'); ?>

            <?php } else { ?>

              <?php get_template_part('template-parts/content/content', 'loop'); ?>

            <?php } ?>

            <?php roach_show_ads_loop($count); ?>

            <?php $count++; ?>

          <?php endwhile;
        else : ?>

          <?php get_template_part('template-parts/none/content', 'none'); ?>

        <?php endif; ?>

        <?php

        $paginate = paginate_links(array(
          'prev_text' => '«',
          'next_text' => '»',
        ));

        if ($paginate) : ?>

          <nav class="pagination"><?php echo $paginate; ?></nav>

        <?php endif; ?>

      </section>

      <?php

      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      if (($cat_extra_description) && ($paged == 1)) : ?>

        <div class="the-content content-category">

          <?php echo apply_filters('the_content', $cat_extra_description); ?>

        </div>

      <?php endif; ?>

      <?php if ($show_sidebar) : ?>

      </section>

      <?php get_sidebar(); ?>

    </section>

  <?php endif; ?>

</main>

<?php do_action('create_index'); ?>

<?php get_footer(); ?>
