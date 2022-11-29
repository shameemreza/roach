<?php

$featured_post   = get_post_meta(get_the_ID(), 'featured_post', true);

$show_category = get_query_var('show_category');

$single_featured_text  = get_post_meta(get_the_ID(), 'single_bc_featured', true);

if ($single_featured_text) {
  $featured_text = $single_featured_text;
} else {
  $featured_text = get_theme_mod('roach_featured_text');

  if (!$featured_text) {
    $featured_text = __("Featured", "roach");
  }
}

?>

<article class="article-loop-featured roach-columns-<?php echo $columns; ?>">

  <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">

    <div style="background-image: url('<?php echo roach_post_thumbnail(); ?>');" class="article-image-featured">

      <?php if ($featured_post || $single_featured_text) : ?>

        <span class="item-featured"><?php echo $featured_text; ?></span>

      <?php endif; ?>

      <?php if ($show_category) : ?>

        <div class="content-item-category">

          <?php foreach ((get_the_category()) as $category) : ?>

            <span><?php echo $category->cat_name; ?></span>

          <?php endforeach; ?>

        </div>

      <?php endif; ?>

      <?php the_title('<p class="entry-title">', '</p>'); ?>

    </div>

  </a>

</article>
