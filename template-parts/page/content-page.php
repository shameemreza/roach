<?php roach_show_ads(1); ?>

<div class="the-content">

  <?php

  the_content();

  roach_show_dynamic_page();

  if (get_theme_mod('roach_index_pos') == 3) : echo do_shortcode('[roach_toc]');
  endif;

  if (get_theme_mod('roach_show_tags_page')) : the_tags('<div class="content-tags">', '', '</div>');
  endif;

  wp_link_pages(
    array(
      'before'      => '<nav class="pagination">',
      'after'       => '</nav>',
      'link_before'      => '',
      'link_after'       => '',
      'next_or_number'   => 'next',
      'separator'        => ' ',
      'nextpagelink'     => '»',
      'previouspagelink' => '«',
      'pagelink'         => '%',
      'echo'             => 1
    )
  );

  ?>


</div>

<?php

$show_social_buttons_bottom = get_theme_mod('roach_show_social_buttons_bottom');

$social_post_types = get_theme_mod('roach_social_post_types');

$show_social_buttons_after = get_theme_mod('roach_show_social_buttons_after');


/* */

$hide_social = get_post_meta(get_the_ID(), 'hide_social_btn', true);

if (($show_social_buttons_after) && (($social_post_types == 1) || ($social_post_types == 3)) && (!$hide_social)) :

  get_template_part('template-parts/social/content', 'social');

endif;


/* */

roach_show_author_box();


/* */

roach_show_ads(2);


/* */

if (comments_open()) :

  comments_template();

endif;


/* */

if (($show_social_buttons_bottom) && (($social_post_types == 1) || ($social_post_types == 3)) && (!$hide_social)) :

?>

  <div class="social-fix">

    <?php get_template_part('template-parts/social/content', 'social'); ?>

  </div>

<?php endif; ?>
