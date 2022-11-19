<?php

$deactivate_background = get_query_var('deactivate_background');

?>

<article class="article-loop roach-columns-3">

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

</article>
