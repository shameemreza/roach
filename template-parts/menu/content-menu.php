<?php

$roach_search_text = get_theme_mod('roach_search_text');

if (!$roach_search_text) : $roach_search_text = esc_html(__("Search", "roach"));
endif;

?>

<?php if (is_active_sidebar('hsocial')) : ?>

  <div class="social-desktop">

    <?php dynamic_sidebar('hsocial');  ?>

  </div>

<?php endif; ?>

<div>

  <?php if (has_nav_menu('header-menu')) : ?>

    <input type="checkbox" id="btn-menu" />

    <label id="nav-icon" for="btn-menu">

      <div class="circle nav-icon">

        <span class="line top"></span>
        <span class="line middle"></span>
        <span class="line bottom"></span>

      </div>

    </label>

  <?php endif; ?>

  <nav id="menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">

    <?php if (get_theme_mod('roach_show_search_menu')) : ?>

      <div class="search-responsive">

        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">

          <input autocomplete="off" id="search-menu" placeholder="<?php echo $roach_search_text; ?>" value="<?php echo get_search_query() ?>" name="s" required>

          <?php if (function_exists('is_woocommerce')) : ?>

            <input type="hidden" value="product" name="post_type">

          <?php endif; ?>

          <button class="s-btn" type="submit" aria-label="<?php echo esc_html(__("Search", "roach")); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </button>

        </form>

      </div>

    <?php endif; ?>

    <?php wp_nav_menu(array(
      'menu'         => 'main-menu-web',
      'theme_location'   => 'header-menu',
      'container'         => 'ul',
      'menu_class'        => 'abc',
      'fallback_cb'     => false
    )); ?>
  </nav>

</div>
