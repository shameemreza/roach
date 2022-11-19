<?php

function roach_cluster_ini()
{
  if (function_exists('register_block_type')) {
    add_action('init', 'roach_register_clusters_block');
  }
}
add_action('init', 'roach_cluster_ini');

function roach_register_clusters_block()
{
  register_block_type('roach/clusters', array(
    'editor_script' => 'roach-clusters-block-editor',
    'editor_style' => 'roach-clusters-block-editor',
  ));
}

function roach_clusters_scripts()
{
  wp_enqueue_script('react-transition-group', get_template_directory_uri() . '/inc/gutenberg/assets/js/webpack.js', array(
    'wp-blocks',
    'wp-element'
  ), '0101062021');

  wp_register_script('roach-clusters-block-editor', get_template_directory_uri() . '/inc/gutenberg/assets/js/main.min.js', array(
    'wp-blocks',
    'wp-element',
    'react-transition-group',
    'wp-editor'
  ), '090202293');

  wp_enqueue_script('roach-clusters-block-editor');

  wp_enqueue_style('roach-clusters-block-editor', get_template_directory_uri() . '/inc/gutenberg/assets/css/main.min.css', array(
    'wp-edit-blocks'
  ), '01010113062021');
}
add_action('enqueue_block_editor_assets', 'roach_clusters_scripts');

function roach_gutenberg_categories($categories, $post)
{

  $roach_category = array(
    'slug' => 'roach',
    'title' => __('ROACH', 'roach'),
  );
  array_unshift($categories, $roach_category);
  return $categories;
}

add_filter('block_categories_all', 'roach_gutenberg_categories', 10, 2);

require get_template_directory() . '/inc/gutenberg/output.php';
