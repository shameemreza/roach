<?php

$roach_search_text = get_theme_mod('roach_search_text');

if (!$roach_search_text) : $roach_search_text = esc_html(__("Search", "roach"));
endif;

?>

<div class="search-home">

  <form action="<?php echo esc_url(home_url('/')); ?>" method="get">

    <input autocomplete="off" id="search-home" placeholder="<?php echo $roach_search_text; ?>" value="<?php echo get_search_query() ?>" name="s" required>

    <input type="hidden" value="product" name="post_type">

    <button class="s-btn" type="submit" aria-label="<?php echo esc_html(__("Search", "roach")); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </button>

  </form>

</div>
