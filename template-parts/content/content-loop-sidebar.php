<?php

$featured_post = get_post_meta(get_the_ID(), 'featured_post', true);

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

<article class="article-loop roach-columns-1">

  <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">

    <?php if (has_post_thumbnail()) : ?>

      <div class="article-content">

        <?php if (($featured_post || $single_featured_text) && (!get_theme_mod('roach_sidebar_image'))) : ?>

          <span class="item-featured"><?php echo $featured_text; ?></span>

        <?php endif; ?>

        <?php if (!$deactivate_background) : ?>

          <div style="background-image: url('<?php echo roach_side_thumbnail(); ?>');" class="article-image"></div>

        <?php else :

          the_post_thumbnail('side-thumbnail');

        endif; ?>

      </div>

    <?php endif; ?>

    <?php the_title('<p class="entry-title">', '</p>'); ?>

  </a>

</article>
