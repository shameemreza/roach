<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @author Shameem Reza
 * @since 0.0.1
 */

if (post_password_required()) return; ?>

<div id="comments" class="area-comments">

  <?php if (have_comments()) : ?>

    <ol>

      <?php roach_comments_count(); ?>

      <?php
      wp_list_comments(array(
        'style'     => 'ol',
        'short_ping'   => true,
        'avatar_size'   => 42,
      )); ?>

    </ol>

    <?php

    $nav = get_the_comments_navigation(array(
      'screen_reader_text' => 'Comments',
    ));

    $nav = str_replace('<h2 class="screen-reader-text">Comments</h2>', '', $nav);

    echo $nav;
    ?>

  <?php endif; ?>

  <?php comment_form(
    array(
      'title_reply_before' => '<p>',
      'title_reply_after' => '</p>',
    )
  );
  ?>

</div>
