<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Roach
 * @since 0.0.1
 * @author Shameem Reza
 */

get_header();

$hide_sidebar = get_post_meta(get_the_ID(), 'hide_sidebar', true);

$roach_full_header = get_post_meta(get_the_ID(), 'roach_header_design', true);

$wc = roach_wc_check();

if ($wc) {
  $hide_sidebar = true;
}

if ((get_theme_mod('roach_show_sidebar_page')) && (!$hide_sidebar)) :

  $class_content = 'content-thin';

else :

  $class_content = 'article-full';

endif;

?>

<?php if ($roach_full_header) {  ?>

  <?php roach_show_hero(); ?>

<?php } ?>

<main class="content-page">

  <?php roach_show_ads(5); ?>

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

      <?php roach_data_images(); ?>

      <article class="<?php echo $class_content; ?>">

        <?php if (!$roach_full_header) {  ?>

          <?php get_template_part('template-parts/header/content', 'header'); ?>

        <?php } ?>

        <?php get_template_part('template-parts/page/content', 'page'); ?>

      </article>

    <?php endwhile;
  else : ?>

    <?php get_template_part('template-parts/none/content', 'none'); ?>

  <?php endif; ?>

  <?php if ((get_theme_mod('roach_show_sidebar_page')) && (!$hide_sidebar)) : get_sidebar();
  endif; ?>

</main>

<?php

get_footer();

if (get_theme_mod('roach_enable_page_index')) :

  do_action('create_index');

endif;

?>
