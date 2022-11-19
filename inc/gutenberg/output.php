<?php

function roach_render_block_posts($attributes)
{

  $class = '';

  if (isset($attributes['className'])) {
    $class = $attributes['className'];
  }

  $deactivate_background = get_theme_mod('roach_deactivate_background');

  $salida                = '';

  $settings              = json_decode($attributes['settings'], true);

  $salida .= '<div class="content-cluster ' . $class . ' ">';

  $headsType = isset($attributes['headings']) ? $attributes['headings'] : 'span';

  if ($attributes['display'] == 'custom-links') {

    for ($entry     = 1; $entry <= $attributes['rows']; $entry++) {

      if (isset($settings[$entry])) {

        $url       = isset($settings[$entry]['link']) ? $settings[$entry]['link'] : '#';

        $heads     = isset($settings[$entry]['heading']) ? $settings[$entry]['heading'] : '';

        $textBtn   = '';

        if (empty($settings[$entry]['button']) && isset($attributes['button'])) {
          $textBtn   = $attributes['button'];
        } elseif (!empty($settings[$entry]['button'])) {
          $textBtn   = $settings[$entry]['button'];
        }

        $onBtn     = isset($settings[$entry]['enableButton']) ? $settings[$entry]['enableButton'] : true;

        $image     = '';

        $rel       = '';

        $target    = '';

        if ($attributes['links'] == 'nofollow') {
          $rel       = 'rel="nofollow"';
        }

        if ($attributes['target'] == '_blank') {
          $target    = 'target="_blank"';
        }

        if (isset($settings[$entry]['nofollow'])) {
          $rel       = $settings[$entry]['nofollow'] ? 'rel="nofollow"' : '';
        }

        if (isset($settings[$entry]['target'])) {
          $target    = $settings[$entry]['target'] ? 'target="_blank"' : '';
        }

        if (isset($settings[$entry]['idThumbnail'])) {
          $image     = wp_get_attachment_image($settings[$entry]['idThumbnail'], 'post-thumbnail', false, ['class'           => 'lazy wp-post-image']);
          $postThumb = wp_get_attachment_image_src($settings[$entry]['idThumbnail'], 'post-thumbnail', false);
          $postThumb = $postThumb[0];
        }
        $salida .= '<article class="custom-links article-loop roach-columns-' . $attributes['columns'] . '">';

        $salida .= '<a href="' . $url . '" ' . $rel . ' ' . $target . '>';

        if ($deactivate_background) {
          if ($image) {
            $salida .= '<div class="article-content">' . $image . '</div>';
          }
        } else {
          if ($postThumb) {
            $salida .= '<div class="article-content"><div style="background-image: url(' . $postThumb . ');" class="article-image"></div></div>';
          }
        }
        $salida .= '<' . $headsType . ' class="entry-title">' . $heads . '</' . $headsType . '>';
        $salida .= '</a>';
        if ($onBtn) {
          $salida .= '<a href="' . $url . '" class="btn-amzn" ' . $rel . ' ' . $target . '>' . $textBtn . '</a>';
        }
        $salida .= '</article>';
      }
    }
  } else {

    $args  = array(
      'post_type'       => array('page', 'post'),
      'post__not_in'       => array(
        get_the_ID()
      ),
      'posts_per_page'       => -1,

    );

    $args['orderby']       = str_replace(array(
      '_asc',
      '_desc'
    ), '', $attributes['orderby']);

    if (strpos($attributes['orderby'], 'desc')) {
      $args['order']       = 'DESC';
    } elseif (strpos($attributes['orderby'], 'asc')) {
      $args['order']       = 'ASC';
    }

    if ($attributes['display'] == 'tag') {
      $args['post_type']       =  array('page', 'post');
      $args['tag__in']       = $attributes['display_setting'];
      $args['posts_per_page']       = $attributes['rows'];
    } elseif ($attributes['display'] == 'category') {
      $args['cat']       = $attributes['display_setting'];
      $args['post_type']       = array(
        'post'
      );
      $args['posts_per_page']       = $attributes['rows'];
    } else {
      $args['post__in']       = $attributes['display_setting'];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {

      while ($query->have_posts()) :

        $query->the_post();

        $setting   = array();

        if (array_key_exists(get_the_ID(), $settings)) {
          $setting   = $settings[get_the_ID()];
        }

        $rel       = '';

        $target    = '';


        if ($attributes['links'] == 'nofollow') {
          $rel       = $attributes['links'];
        }
        if ($attributes['target'] == '_blank') {
          $target    = 'target="_blank"';
        }

        if (isset($setting['links'])) {
          $rel       = $setting['links'] ? 'nofollow' : '';
        }

        if (isset($setting['target'])) {
          $target    = $setting['target'] ? 'target="_blank"' : '';
        }

        if (empty($setting['heading'])) {
          $setting['heading']           = get_the_title();
        }

        if (empty($setting['link'])) {
          $setting['link']           = get_the_permalink();
        }

        if (!isset($setting['idThumbnail']) && has_post_thumbnail()) {
          $image     = get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', ['class'           => 'lazy']);
          $postThumb = roach_post_thumbnail();
        } elseif (isset($setting['idThumbnail'])) {
          $image     = wp_get_attachment_image($setting['idThumbnail'], 'post-thumbnail', false, ['class'           => 'lazy wp-post-image']);
          $postThumb = wp_get_attachment_image_src($setting['idThumbnail'], 'post-thumbnail', false);
          $postThumb = $postThumb[0];
        } else {
          $image     = '';
          $postThumb = '';
        }

        $salida .= '<article class="article-loop roach-columns-' . $attributes['columns'] . '">';
        $salida .= '<a href="' . $setting['link'] . '" rel="bookmark ' . $rel . '" ' . $target . '>';

        if ($deactivate_background) {
          if ($image) {
            $salida .= '<div class="article-content">' . $image . '</div>';
          }
        } else {
          if ($postThumb) {
            $salida .= '<div class="article-content"><div style="background-image: url(' . $postThumb . ');" class="article-image"></div></div>';
          }
        }

        $salida .= '<' . $headsType . ' class="entry-title">' . $setting['heading'] . '</' . $headsType . '>';
        $salida .= '</a>';

        if ($attributes['excerpt'] == 'show') {
          $salida .= '<div class="show-extract"><span>' . get_the_excerpt() . '</span></div>';
        }

        $salida .= '</article>';

      endwhile;
    }
    wp_reset_postdata();
  }

  $salida .= '</div>';
  return $salida;
}

add_action('init', 'roach_register_block_posts');
function roach_register_block_posts()
{
  register_block_type('roach/cluster', array(
    'attributes' => array(
      'orderby' => array(
        'type' => 'string',
        'default' => 'date',
      ),
      'columns' => array(
        'type' => 'number',
        'default' => 3,
      ),
      'rows' => array(
        'type' => 'number',
        'default' => 12,
      ),
      'excerpt' => array(
        'type' => 'string',
        'default' => 'none',
      ),
      'display' => array(
        'type' => 'string',
        'default' => '',
      ),
      'display_setting' => array(
        'type' => 'array',
        'default' => '',
      ),
      'links' => array(
        'type' => 'string',
        'default' => 'follow',
      ),
      'target' => array(
        'type' => 'string',
        'default' => '_self',
      ),
      'settings' => array(
        'type' => 'string',
        'default' => '{}',
      ),
      'edit_mode' => array(
        'type' => 'boolean',
        'default' => true,
      ),
    ),

    'render_callback' => 'roach_render_block_posts',
  ));
}
