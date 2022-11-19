<?php

$related_by = get_theme_mod('roach_related_by');

$show = get_theme_mod('roach_number_related_single');

$show_sidebar = get_theme_mod('roach_show_sidebar_single');

$show_last_post = get_theme_mod('roach_show_last_single');

$related_title_text = get_theme_mod('roach_related_title_text');

if (!$related_by) : $related_by = 1;
endif;

if (!$show) : $show = 6;
endif;

switch ($related_by) {

  case 1:

    $showside = get_theme_mod('roach_showposts_last_sidebar');

    $typeside = get_theme_mod('roach_sidebar_type_posts');

    if (!$showside) : $showside = 5;
    endif;

    if (!$typeside) : $typeside = 0;
    endif;

    if (($typeside == 1) && ($show_sidebar) && ($show_last_post)) :

      $args = array(
        'category__in'   => current_category(),
        'post_type'   => get_post_type(),
        'showposts'   => $show,
        'post__not_in'  => array(get_the_ID()),
        'offset'     => $showside,
      );

    else :

      $args = array(
        'category__in'   => current_category(),
        'post_type'   => get_post_type(),
        'showposts'   => $show,
        'post__not_in'  => array(get_the_ID()),
      );

    endif;

    break;

  case 2:

    $showside = get_theme_mod('roach_showposts_last_sidebar');

    $typeside = get_theme_mod('roach_sidebar_type_posts');

    if (!$showside) : $showside = 5;
    endif;

    if (!$typeside) : $typeside = 0;
    endif;

    $tags = wp_get_post_tags(get_the_ID());

    $tag_ids = array();

    foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

    if (($typeside == 3) && ($show_sidebar) && ($show_last_post)) :

      $args = array(
        'tag__in' => $tag_ids,
        'post_type'   => get_post_type(),
        'showposts'   => $show,
        'post__not_in' => array(get_the_ID()),
        'offset'     => $showside,
      );

    else :

      $args = array(
        'tag__in' => $tag_ids,
        'post_type'   => get_post_type(),
        'showposts'   => $show,
        'post__not_in' => array(get_the_ID()),
      );

    endif;

    break;

  case 3:

    $args = array(
      'orderby' => 'rand',
      'showposts'   => $show,
      'post__not_in'  => array(get_the_ID()),
    );

    break;
}

$query = new WP_Query($args);

if ($query->have_posts()) :  ?>

  <?php if ($related_title_text) : ?>

    <div class="comment-respond others-items">
      <p><?php echo esc_html($related_title_text); ?></p>
    </div>

  <?php endif; ?>

  <div class="related-posts">

    <?php

    while ($query->have_posts()) : $query->the_post();

      get_template_part('template-parts/content/content', 'loop-related');

    endwhile;
    wp_reset_postdata();

    ?>

  </div>

<?php endif; ?>
