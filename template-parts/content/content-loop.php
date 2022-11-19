<?php

$featured_post   = get_post_meta(get_the_ID(), 'featured_post', true);

$columns = get_query_var('columns');

$show_extract = get_query_var('show_extract');

$show_date = get_query_var('show_date_loop');

$show_category = get_query_var('show_category');

$text_show_more = get_query_var('text_show_more');

$deactivate_background   = get_query_var('deactivate_background');

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

<article class="article-loop roach-columns-<?php echo $columns; ?>">

  <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">

    <?php if (has_post_thumbnail()) : ?>

      <div class="article-content">

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

        <?php if (!$deactivate_background) : ?>

          <div style="background-image: url('<?php echo roach_post_thumbnail(); ?>');" class="article-image"></div>

        <?php else :

          the_post_thumbnail('large');

        endif; ?>

      </div>

    <?php endif; ?>

    <?php if ($show_date) { ?><span class="roach-date-loop"><?php echo get_the_date('d/m/Y'); ?></span><?php } ?>

    <?php the_title('<p class="entry-title">', '</p>'); ?>

  </a>

  <?php if ($show_extract) : ?>

    <div class="show-extract">

      <?php the_excerpt(); ?>

      <?php if ($text_show_more) : ?>

        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo $text_show_more; ?></a>

      <?php endif; ?>

    </div>

  <?php endif; ?>

</article>
