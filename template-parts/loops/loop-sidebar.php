<?php

$showposts = get_theme_mod('roach_showposts_last_sidebar');

$type = get_theme_mod('roach_sidebar_type_posts');

if (!$showposts) : $showposts = 5;
endif;

if (!$type) : $type = 0;
endif;

if (is_single()) :

  switch ($type) {

    case 0:
    default:

      $args = array(
        'showposts' => $showposts,
        'post__not_in'  => array(get_the_ID()),
      );

      break;

    case 1:

      $args = array(
        'showposts' => $showposts,
        'post__not_in'  => array(get_the_ID()),
        'category__in' => current_category(),
      );

      break;

    case 2:

      $args = array(
        'showposts' => $showposts,
        'post__not_in'  => array(get_the_ID()),
        'meta_query' => array(
          array(
            'key' => 'featured_post',
            'compare' => 'EXISTS',
          )
        )
      );

      break;

    case 3:

      $tags = wp_get_post_tags(get_the_ID());

      $tag_ids = array();

      foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

      $args = array(
        'tag__in'     => $tag_ids,
        'post_type'   => get_post_type(),
        'showposts'   => $showposts,
        'post__not_in'   => array(get_the_ID()),
      );

      break;
  }

endif;

if (is_page()) :

  $args = array(
    'showposts' => $showposts,
    'post__not_in'  => array(get_the_ID()),
  );

endif;

if ((is_home()) || (is_category()) || (is_tag())) :

  $args = array(
    'showposts' => $showposts,
  );

endif;

$query = new WP_Query($args);

if ($query->have_posts()) :  ?>

  <div class="last-post-sidebar">

    <?php

    $enable_featured_posts = get_theme_mod('roach_enable_featured_posts');

    while ($query->have_posts()) : $query->the_post();

      if ($enable_featured_posts) {

        get_template_part('template-parts/content/content', 'loop-sidebar-featured');
      } else {

        get_template_part('template-parts/content/content', 'loop-sidebar');
      }

    endwhile;
    wp_reset_postdata();

    ?>

  </div>

<?php endif; ?>
