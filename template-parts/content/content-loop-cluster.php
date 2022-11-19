<?php

$cluster_columns = get_query_var('cluster_columns');

$text_show_more = get_query_var('text_show_more');

$show_cluster_extract = get_theme_mod('roach_show_cluster_extract');

$deactivate_background   = get_query_var('deactivate_background');

?>

<article class="article-loop roach-columns-<?php echo $cluster_columns; ?>">

  <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">

    <?php if (has_post_thumbnail()) : ?>

      <div class="article-content">

        <?php if (!$deactivate_background) : ?>

          <div style="background-image: url('<?php echo roach_post_thumbnail(); ?>');" class="article-image"></div>

        <?php else :

          the_post_thumbnail();

        endif; ?>

      </div>

    <?php endif; ?>

    <?php the_title('<p class="entry-title">', '</p>'); ?>

  </a>

  <?php if ($show_cluster_extract) : ?>

    <div class="show-extract">

      <?php the_excerpt(); ?>

      <?php if ($text_show_more) : ?>

        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo $text_show_more; ?></a>

      <?php endif; ?>

    </div>

  <?php endif; ?>

</article>
