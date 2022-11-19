<?php

/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roach
 * @author Shameem Reza
 * @since 0.0.1
 */

$sticky_sidebar = get_theme_mod('roach_sticky_sidebar');

?>

<aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

  <?php if ($sticky_sidebar) : ?>

    <div class="sticky">

    <?php endif; ?>

    <?php

    $wc = roach_wc_check();

    if ($wc) :

      if (is_product()) :

        get_template_part('template-parts/sidebar/sidebar', 'product');

      endif;

    else :

      if (is_single()) :

        get_template_part('template-parts/sidebar/sidebar', 'single');

      endif;

      if (is_page()) :

        get_template_part('template-parts/sidebar/sidebar', 'page');

      endif;

      if (is_home()) :

        get_template_part('template-parts/sidebar/sidebar', 'home');

      endif;

      if (is_category()) :

        get_template_part('template-parts/sidebar/sidebar', 'cat');

      endif;

      if (is_tag()) :

        get_template_part('template-parts/sidebar/sidebar', 'tag');

      endif;

    endif;


    ?>

    <?php if ($sticky_sidebar) : ?>

    </div>

  <?php endif; ?>

</aside>
