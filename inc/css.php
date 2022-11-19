<?php
add_action('wp_head', 'customize_css');

function customize_css()
{

  $roach_footer_background      = get_theme_mod('roach_footer_background');
  if (!$roach_footer_background) :
    $roach_footer_background = '#028090';
  endif;

  $roach_footer_color        = get_theme_mod('roach_footer_color');
  if (!$roach_footer_color) :
    $roach_footer_color = '#FFFFFF';
  endif;

  $roach_featured_color       = get_theme_mod('roach_featured_color');
  if (!$roach_featured_color) :
    $roach_featured_color = '#FFFFFF';
  endif;

  $roach_featured_background       = get_theme_mod('roach_featured_background');
  if (!$roach_featured_background) :
    $roach_featured_background = '#f16028';
  endif;

  $roach_width_wc = get_theme_mod('roach_width_wc');
  if (!$roach_width_wc) :
    $roach_width_wc = '980';
  endif;

  $roach_width_page = get_theme_mod('roach_width_page');
  if (!$roach_width_page) :
    $roach_width_page = '980';
  endif;

  $roach_search_header_width = get_theme_mod('roach_search_header_width');
  if (!$roach_search_header_width) :
    $roach_search_header_width = '200';
  endif;


  $roach_show_social_buttons_bottom = get_theme_mod('roach_show_social_buttons_bottom');

  $roach_social_post_types          = get_theme_mod('roach_social_post_types');

  if (get_theme_mod('roach_body_background')) {
    $roach_body_background            = get_theme_mod('roach_body_background');
  } else {
    $roach_body_background            = '#FFFFFF';
  }

  if (get_theme_mod('roach_header_background')) {
    $roach_header_background          = get_theme_mod('roach_header_background');
  } else {
    $roach_header_background          = '#028090';
  }

  if (get_theme_mod('roach_header_color')) {
    $roach_header_color               = get_theme_mod('roach_header_color');
  } else {
    $roach_header_color               = '#FFFFFF';
  }

  if (get_theme_mod('roach_font_color')) {
    $roach_font_color                 = get_theme_mod('roach_font_color');
  } else {
    $roach_font_color                 = '#222222';
  }

  if (get_theme_mod('roach_link_color')) {
    $roach_link_color                 = get_theme_mod('roach_link_color');
  } else {
    $roach_link_color                 = '#0183e4';
  }

  if (get_theme_mod('roach_btn_background')) {
    $roach_btn_background             = get_theme_mod('roach_btn_background');
  } else {
    $roach_btn_background             = '#028090';
  }

  if (get_theme_mod('roach_btn_color')) {
    $roach_btn_color                  = get_theme_mod('roach_btn_color');
  } else {
    $roach_btn_color                  = '#FFFFFF';
  }

  if (get_theme_mod('roach_width_loop')) {
    $roach_width_loop                 = get_theme_mod('roach_width_loop');
  } else {
    $roach_width_loop                 = '980';
  }

  if (get_theme_mod('roach_width_single')) {
    $roach_width_single               = get_theme_mod('roach_width_single');
  } else {
    $roach_width_single               = '980';
  }

  if (get_theme_mod('roach_width_header')) {
    $roach_width_header               = get_theme_mod('roach_width_header');
  } else {
    $roach_width_header               = '980';
  }

  if (get_theme_mod('roach_size_h1')) {
    $roach_size_h1                    = get_theme_mod('roach_size_h1');
  } else {
    $roach_size_h1                    = '38';
  }

  if (get_theme_mod('roach_size_h2')) {
    $roach_size_h2                    = get_theme_mod('roach_size_h2');
  } else {
    $roach_size_h2                    = '32';
  }

  if (get_theme_mod('roach_size_h3')) {
    $roach_size_h3                    = get_theme_mod('roach_size_h3');
  } else {
    $roach_size_h3                    = '28';
  }

  $roach_size_h4                    = get_theme_mod('roach_size_h4');
  if (!$roach_size_h4) :
    $roach_size_h4                    = '23';
  endif;

  if (get_theme_mod('roach_size_text')) {
    $roach_size_text     = get_theme_mod('roach_size_text');
  } else {
    $roach_size_text     = '18';
  }

  if (get_theme_mod('roach_size_loop')) {
    $roach_size_loop     = get_theme_mod('roach_size_loop');
  } else {
    $roach_size_loop     = '18';
  }

  if (get_theme_mod('roach_width_logo')) {
    $roach_width_logo    = get_theme_mod('roach_width_logo');
  } else {
    $roach_width_logo    = '160';
  }

  if (get_theme_mod('roach_search_margin')) {
    $roach_search_margin = get_theme_mod('roach_search_margin');
  } else {
    $roach_search_margin = '0';
  }

  $options_fonts = get_theme_mod('roach_options_fonts');

  if ($options_fonts == 3) {
    $roach_text_font     = 'Maven Pro';
    $roach_text_weight   = '400';
    $roach_title_font    = 'Maven Pro';
    $roach_title_weight  = '600';
    $roach_loop_font     = 'Maven Pro';
    $roach_loop_weight   = '400';
  } else {
    if (get_theme_mod('roach_font_text')) {
      $text               = explode('.', get_theme_mod('roach_font_text'));
      $roach_text_font     = $text[0];
      $roach_text_weight   = $text[1];
    } else {
      $roach_text_font     = 'Poppins';
      $roach_text_weight   = '300';
    }

    if (get_theme_mod('roach_font_title')) {
      $head               = explode('.', get_theme_mod('roach_font_title'));
      $roach_title_font    = $head[0];
      $roach_title_weight  = $head[1];
    } else {
      $roach_title_font    = 'Poppins';
      $roach_title_weight  = '400';
    }

    if (get_theme_mod('roach_font_loop')) {
      $loop               = explode('.', get_theme_mod('roach_font_loop'));
      $roach_loop_font     = $loop[0];
      $roach_loop_weight   = $loop[1];
    } else {
      $roach_loop_font     = 'Poppins';
      $roach_loop_weight   = '300';
    }
  }

  if (get_theme_mod('roach_width_sidebar')) {
    $roach_width_sidebar = get_theme_mod('roach_width_sidebar');
  } else {
    $roach_width_sidebar = '300';
  }

  $roach_h1_color      = get_theme_mod('roach_h1_color');
  if (!$roach_h1_color) {
    $roach_h1_color      = '#222222';
  }

  $roach_h2_color      = get_theme_mod('roach_h2_color');
  if (!$roach_h2_color) {
    $roach_h2_color      = '#222222';
  }

  $roach_h3_color      = get_theme_mod('roach_h3_color');
  if (!$roach_h3_color) {
    $roach_h3_color      = '#222222';
  }

  $roach_h4_color      = get_theme_mod('roach_h4_color');
  if (!$roach_h4_color) {
    $roach_h4_color      = '#222222';
  }



  $roach_index_list    = get_theme_mod('roach_index_list');
  if (!$roach_index_list) {
    $roach_index_list    = '1';
  }

  $deactivate_background = get_theme_mod('roach_deactivate_background');

  $rounded_borders = get_theme_mod('roach_rounded_borders');

  $borders_radius = get_theme_mod('roach_borders_radius');
  if (!$borders_radius) : $borders_radius = 10;
  endif;

  $enable_featured_posts = get_theme_mod('roach_enable_featured_posts');

  $hero_background = get_theme_mod('roach_hero_background');
  if (!$hero_background) :
    $hero_background = $roach_header_background;
  endif;

  $hero_text = get_theme_mod('roach_hero_text');
  if (!$hero_text) :
    $hero_text = $roach_header_color;
  endif;
?>
  <style>
    body {
      font-family: '<?php echo $roach_text_font; ?>', sans-serif !important;
      background: <?php echo $roach_body_background; ?>;
      font-weight: <?php echo $roach_text_weight; ?> !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: '<?php echo $roach_title_font; ?>', sans-serif !important;
      font-weight: <?php echo $roach_title_weight; ?>;
      line-height: 1.3;
    }

    h1 {
      color: <?php echo $roach_h1_color; ?>
    }

    h2,
    h5,
    h6 {
      color: <?php echo $roach_h2_color; ?>
    }

    h3 {
      color: <?php echo $roach_h3_color; ?>
    }

    h4 {
      color: <?php echo $roach_h4_color; ?>
    }

    .article-loop p,
    .article-loop-featured p,
    .article-loop h2,
    .article-loop h3,
    .article-loop h4,
    .article-loop span.entry-title,
    .related-posts p,
    .last-post-sidebar p,
    .woocommerce-loop-product__title {
      font-family: '<?php echo $roach_loop_font; ?>', sans-serif !important;
      font-size: <?php echo $roach_size_loop; ?>px !important;
      font-weight: <?php echo $roach_loop_weight; ?> !important;
    }

    .article-loop .show-extract p,
    .article-loop .show-extract span {
      font-family: '<?php echo $roach_text_font; ?>', sans-serif !important;
      font-weight: <?php echo $roach_text_weight; ?> !important;
    }

    a {
      color: <?php echo $roach_link_color; ?>;
    }

    .the-content .post-index span,
    .des-category .post-index span {
      font-size: <?php echo $roach_size_text; ?>px;
    }

    .the-content .post-index li,
    .the-content .post-index a,
    .des-category .post-index li,
    .des-category .post-index a,
    .comment-respond>p>span>a,
    .roach-pros-cons-title span,
    .roach-pros-cons ul li span,
    .woocommerce #reviews #comments ol.commentlist li .comment-text p,
    .woocommerce #review_form #respond p,
    .woocommerce .comment-reply-title,
    .woocommerce form .form-row label,
    .woocommerce-page form .form-row label {
      font-size: calc(<?php echo $roach_size_text; ?>px - 2px);
    }

    .content-tags a,
    .tagcloud a {
      border: 1px solid <?php echo $roach_link_color; ?>;
    }

    .content-tags a:hover,
    .tagcloud a:hover {
      color: <?php echo $roach_link_color; ?>99;
    }

    p,
    .the-content ul li,
    .the-content ol li {
      color: <?php echo $roach_font_color; ?>;
      font-size: <?php echo $roach_size_text; ?>px;
      line-height: 1.6;
    }

    .comment-author cite,
    .primary-sidebar ul li a,
    .woocommerce ul.products li.product .price,
    span.roach-author {
      color: <?php echo $roach_font_color; ?>;
    }

    .comment-body p,
    #commentform input,
    #commentform textarea {
      font-size: calc(<?php echo $roach_size_text; ?>px - 2px);
    }

    .social-title {
      font-size: calc(<?php echo $roach_size_text; ?>px - 3px);
    }

    .breadcrumb a,
    .breadcrumb span,
    .woocommerce .woocommerce-breadcrumb {
      font-size: calc(<?php echo $roach_size_text; ?>px - 5px);
    }

    .content-footer p,
    .content-footer li,
    .search-header input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]) {
      font-size: calc(<?php echo $roach_size_text; ?>px - 4px) !important;
    }

    .search-header input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]) {
      border: 1px solid <?php echo $roach_header_color; ?>26 !important;
    }

    h1 {
      font-size: <?php echo $roach_size_h1; ?>px;
    }

    h2 {
      font-size: <?php echo $roach_size_h2; ?>px;
    }

    h3 {
      font-size: <?php echo $roach_size_h3; ?>px;
    }

    h4 {
      font-size: <?php echo $roach_size_h4; ?>px;
    }

    .site-header,
    #cookiesbox {
      background: <?php echo $roach_header_background; ?>;
    }

    .site-header-wc a span.count-number {
      border: 1px solid <?php echo $roach_header_color; ?>;
    }

    .content-footer {
      background: <?php echo $roach_footer_background; ?>;
    }

    .comment-respond>p,
    .area-comentarios ol>p,
    .error404 .content-loop p+p,
    .search .content-loop p+p {
      border-bottom: 1px solid <?php echo $roach_btn_background; ?>
    }

    .pagination a,
    .nav-links a,
    .woocommerce #respond input#submit,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .wpcf7-form input.wpcf7-submit {
      background: <?php echo $roach_btn_background; ?>;
      color: <?php echo $roach_btn_color; ?> !important;
    }

    .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
      border-bottom: 2px solid <?php echo $roach_btn_background; ?>;
    }

    .pagination a:hover,
    .nav-links a:hover {
      background: <?php echo $roach_btn_background; ?>B3;
    }

    .article-loop a span.entry-title {
      color: <?php echo $roach_font_color; ?> !important;
    }

    .article-loop a:hover p,
    .article-loop a:hover span.entry-title {
      color: <?php echo $roach_link_color; ?> !important;
    }

    .article-loop.custom-links a:hover span.entry-title {
      color: <?php echo $roach_font_color; ?> !important;
    }

    #commentform input,
    #commentform textarea {
      border: 2px solid <?php echo $roach_btn_background; ?>;
      font-weight: <?php echo $roach_text_weight; ?> !important;
    }

    .content-loop {
      max-width: <?php echo $roach_width_loop; ?>px;
    }

    .site-header-content {
      max-width: <?php echo $roach_width_header; ?>px;
    }

    .content-footer {
      max-width: calc(<?php echo $roach_width_header; ?>px - 32px);
    }

    .content-footer-social {
      background: <?php echo $roach_footer_background; ?>1A;
    }

    .content-single {
      max-width: <?php echo $roach_width_single; ?>px;
    }

    .content-page {
      max-width: <?php echo $roach_width_page; ?>px;
    }

    .content-wc {
      max-width: <?php echo $roach_width_wc; ?>px;
    }

    .reply a,
    .go-top {
      background: <?php echo $roach_btn_background; ?>;
      color: <?php echo $roach_btn_color; ?>;
    }

    .reply a {
      border: 2px solid <?php echo $roach_btn_background; ?>;
    }

    #commentform input[type=submit] {
      background: <?php echo $roach_btn_background; ?>;
      color: <?php echo $roach_btn_color; ?>;
    }

    .site-header a,
    header,
    header label {
      color: <?php echo $roach_header_color; ?>;
    }

    .content-footer a,
    .content-footer p,
    .content-footer .widget-area {
      color: <?php echo $roach_footer_color; ?>;
    }

    header .line {
      background: <?php echo $roach_header_color; ?>;
    }

    .site-logo img {
      max-width: <?php echo $roach_width_logo; ?>px;
    }

    .search-header {
      margin-left: <?php echo $roach_search_margin; ?>px;
    }

    .primary-sidebar {
      width: <?php echo $roach_width_sidebar; ?>px;
    }

    p.sidebar-title,
    .comment-respond>p,
    .area-comentarios ol>p,
    .roach-subtitle {
      font-size: calc(<?php echo $roach_size_text; ?>px + 2px);
    }

    .popular-post-sidebar ol a {
      color: <?php echo $roach_font_color; ?>;
      font-size: calc(<?php echo $roach_size_text; ?>px - 2px);
    }

    .popular-post-sidebar ol li:before,
    .primary-sidebar div ul li:before {
      border-color: <?php echo $roach_btn_background; ?>;
    }

    .search-form input[type=submit] {
      background: <?php echo $roach_header_background; ?>;
    }

    .search-form {
      border: 2px solid <?php echo $roach_btn_background; ?>;
    }

    .sidebar-title:after,
    .archive .content-loop h1:after {
      background: <?php echo $roach_btn_background; ?>;
    }

    .single-nav .nav-prev a:before,
    .single-nav .nav-next a:before {
      border-color: <?php echo $roach_btn_background; ?>;
    }

    .single-nav a {
      color: <?php echo $roach_font_color; ?>;
      font-size: calc(<?php echo $roach_size_text; ?>px - 3px);
    }

    .the-content .post-index {
      border-top: 2px solid <?php echo $roach_btn_background; ?>;
    }

    .the-content .post-index #show-table {
      color: <?php echo $roach_link_color; ?>;
      font-size: calc(<?php echo $roach_size_text; ?>px - 3px);
      font-weight: <?php echo $roach_text_weight; ?>;
    }

    .the-content .post-index .btn-show {
      font-size: calc(<?php echo $roach_size_text; ?>px - 3px) !important;
    }

    .search-header form {
      width: <?php echo $roach_search_header_width; ?>px;
    }

    .site-header .site-header-wc svg {
      stroke: <?php echo $roach_header_color; ?>;
    }

    .item-featured {
      color: <?php echo $roach_featured_color; ?>;
      background: <?php echo $roach_featured_background; ?>;
    }

    <?php if (get_theme_mod('roach_scroll_smooth')) : ?>html {
      scroll-behavior: smooth;
    }

    <?php endif; ?><?php if ($rounded_borders) : ?>.article-content,
    #commentform input,
    #commentform textarea,
    .reply a,
    .woocommerce #respond input#submit,
    .woocommerce #respond input#submit.alt,
    .woocommerce-address-fields__field-wrapper input,
    .woocommerce-EditAccountForm input,
    .wpcf7-form input,
    .wpcf7-form textarea,
    .wpcf7-form input.wpcf7-submit {
      border-radius: <?php echo $borders_radius; ?>px !important;
    }

    .pagination a,
    .pagination span,
    .nav-links a {
      border-radius: 50%;
      min-width: 2.5rem;
    }

    .reply a {
      padding: 6px 8px !important;
    }

    .roach-icon,
    .roach-icon-single {
      border-radius: 50%;
    }

    .roach-icon {
      margin-right: 1px;
      padding: .6rem !important;
    }

    .content-footer-social {
      border-top-left-radius: <?php echo $borders_radius; ?>px;
      border-top-right-radius: <?php echo $borders_radius; ?>px;
    }

    .item-featured,
    .content-item-category>span,
    .woocommerce span.onsale,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .product-gallery-summary .quantity input,
    #add_payment_method table.cart input,
    .woocommerce-cart table.cart input,
    .woocommerce-checkout table.cart input,
    .woocommerce div.product form.cart .variations select {
      border-radius: 2rem !important;
    }

    .search-home input {
      border-radius: 2rem !important;
      padding: 0.875rem 1.25rem !important;
    }

    .search-home button.s-btn {
      margin-right: 1.25rem !important;
    }

    #cookiesbox p,
    #cookiesbox a {
      color: <?php echo $roach_header_color; ?>;
    }

    #cookiesbox button {
      background: <?php echo $roach_header_color; ?>;
      color: <?php echo $roach_header_background; ?>;
    }

    @media (min-width:1050px) {

      ul.sub-menu,
      ul.sub-menu li {
        border-radius: <?php echo $borders_radius; ?>px;
      }

      .search-header input {
        border-radius: 2rem !important;
        padding: 0 0 0 .85rem !important;
      }

      .search-header button.s-btn {
        width: 2.65rem !important;
      }

      .site-header .roach-icon svg {
        stroke: <?php echo $roach_header_color; ?> !important;
      }

      <?php if ($rounded_borders) : ?>.article-loop-featured:first-child .article-image-featured {
        border-top-left-radius: <?php echo $borders_radius; ?>px !important;
        border-bottom-left-radius: <?php echo $borders_radius; ?>px !important;
      }

      .article-loop-featured.roach-columns-1:nth-child(1) .article-image-featured,
      .article-loop-featured.roach-columns-2:nth-child(2) .article-image-featured,
      .article-loop-featured.roach-columns-3:nth-child(3) .article-image-featured,
      .article-loop-featured.roach-columns-4:nth-child(4) .article-image-featured,
      .article-loop-featured.roach-columns-5:nth-child(5) .article-image-featured {
        border-top-right-radius: <?php echo $borders_radius; ?>px !important;
        border-bottom-right-radius: <?php echo $borders_radius; ?>px !important;
      }

      <?php endif; ?><?php if ($enable_featured_posts) : ?>.primary-sidebar .article-image-featured {
        border-radius: <?php echo $borders_radius; ?>px !important;
      }

      <?php endif; ?>
    }

    <?php if ((!is_active_sidebar('social')) && ($rounded_borders)) : ?>@media (min-width:1050px) {
      .content-footer {
        border-top-left-radius: <?php echo $borders_radius; ?>px;
        border-top-right-radius: <?php echo $borders_radius; ?>px;
      }
    }

    <?php endif; ?><?php endif; ?>.checkbox .check-table svg {
      stroke: <?php echo $roach_btn_background; ?>;
    }

    <?php if (!$deactivate_background) : ?>.article-content {
      height: 196px;
    }

    .content-thin .content-cluster .article-content {
      height: 160px !important;
    }

    .last-post-sidebar .article-content {
      height: 140px;
      margin-bottom: 8px
    }

    .related-posts .article-content {
      height: 120px;
    }

    @media (max-width:1050px) {

      .last-post-sidebar .article-content,
      .related-posts .article-content {
        height: 150px !important
      }
    }

    @media (max-width: 480px) {
      .article-content {
        height: 180px
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_hide_index') && (get_theme_mod('roach_user_hide_index'))) : ?>.the-content .post-index #index-table {
      display: none;
    }

    <?php endif; ?><?php if ($roach_index_list == 3) : ?>.the-content .post-index ul,
    .the-content .post-index ol {
      list-style: none;
    }

    .the-content .post-index li {
      margin-left: 14px !important;
    }

    .the-content .post-index .classh3,
      {
      margin-left: 36px !important;
    }

    <?php endif; ?>@media(max-width:480px) {

      h1,
      .archive .content-loop h1 {
        font-size: calc(<?php echo $roach_size_h1; ?>px - 8px);
      }

      h2 {
        font-size: calc(<?php echo $roach_size_h2; ?>px - 4px);
      }

      h3 {
        font-size: calc(<?php echo $roach_size_h3; ?>px - 4px);
      }

      <?php if ($rounded_borders) : ?>.article-loop-featured .article-image-featured {
        border-radius: <?php echo $borders_radius; ?>px !important;
      }

      <?php endif; ?>
    }

    @media(min-width:1050px) {
      .content-thin {
        width: calc(95% - <?php echo $roach_width_sidebar; ?>px);
      }

      #menu>ul {
        font-size: calc(<?php echo $roach_size_text; ?>px - 2px);
      }

      #menu ul .menu-item-has-children:after {
        border: solid <?php echo $roach_header_color; ?>;
        border-width: 0 2px 2px 0;
      }
    }

    <?php if (get_theme_mod('roach_show_post_category')) : ?>.item-featured {
      margin-top: 44px;
    }

    <?php else : ?>.item-featured {
      margin-top: 10px;
    }

    <?php endif; ?><?php if (get_theme_mod('roach_sidebar_image') && !$enable_featured_posts) : ?>.last-post-sidebar {
      padding: 0;
      margin-bottom: 2rem !important;
    }

    .last-post-sidebar .article-loop a {
      display: flex !important;
      align-items: center;
    }

    .last-post-sidebar .article-loop p {
      width: 100%;
      text-align: left !important;
      margin-bottom: 0;
      font-size: calc(<?php echo $roach_size_loop; ?>px - 2px) !important;
    }

    .last-post-sidebar .article-content {
      height: 90px !important;
      margin-bottom: 0 !important;
      margin-right: .5rem;
      min-width: 120px;
    }

    .last-post-sidebar .article-image {
      height: 90px !important;
      min-width: 120px;
    }

    .last-post-sidebar article {
      margin-bottom: 1.5rem !important;
    }

    <?php endif; ?><?php if (get_theme_mod('roach_show_featured_small')) : ?>@media (min-width: 768px) {
      .content-single .post-thumbnail {
        float: left;
        margin: 0.75rem 1rem 0.5rem 0 !important;
        max-width: 300px;
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_show_featured_small_page')) : ?>@media (min-width: 768px) {
      .content-page .post-thumbnail {
        float: left;
        margin: 0.75rem 1rem 0.5rem 0 !important;
        max-width: 300px;
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_enable_layout_lists')) : ?>.the-content ul:not(#index-table) li::marker {
      color: <?php echo $roach_btn_background; ?>;
    }

    .the-content>ol:not(#index-table *)>li:before {
      content: counter(li);
      counter-increment: li;
      left: -1.5em;
      top: 65%;
      color: <?php echo $roach_btn_color; ?>;
      background: <?php echo $roach_btn_background; ?>;
      height: 1.4em;
      width: 1.22em;
      padding: 1px 1px 1px 2px;
      border-radius: 6px;
      border: 1px solid <?php echo $roach_btn_background; ?>;
      line-height: 1.5em;
      font-size: 24px;
      text-align: center;
      font-weight: 400;
      float: left !important;
      margin-right: 16px;
      margin-top: 8px;
    }

    .the-content>ol:not(#index-table *) {
      counter-reset: li;
      list-style: none;
      padding: 0;
      margin-bottom: 2rem;
      text-shadow: 0 1px 0 rgb(255 255 255 / 50%);
    }

    .the-content>ol:not(#index-table)>li {
      position: relative;
      display: block;
      padding: 0.5rem 0 0;
      margin: 0.5rem 0 1.25rem !important;
      border-radius: 10px;
      color: #444;
      text-decoration: none;
      margin-left: 2px;
    }

    <?php endif; ?><?php if (get_theme_mod('roach_show_post_extract')) : ?>.roach-date-loop {
      font-size: calc(<?php echo $roach_size_text; ?>px - 5px) !important;
      text-align: left;
    }

    <?php else : ?>.roach-date-loop {
      font-size: calc(<?php echo $roach_size_text; ?>px - 5px) !important;
      text-align: center;
    }

    <?php endif; ?><?php if (get_theme_mod('roach_show_post_extract')) : ?>.article-loop p,
    .article-loop h2,
    .article-loop h3,
    .article-loop h4,
    .article-loop span.entry-title {
      text-align: left !important;
      margin-bottom: 8px !important;
      padding: 0 10px 0 0 !important;
    }

    .article-loop .show-extract p {
      font-size: calc(<?php echo $roach_size_text; ?>px - 2px) !important;
    }

    .last-post-sidebar .article-loop p,
    .related-posts .article-loop p {
      margin-bottom: 20px !important;
    }

    @media (min-width:800px) {
      .article-loop {
        margin-bottom: 1rem !important;
      }

      .related-posts .article-loop {
        margin-bottom: 0 !important;
      }
    }

    <?php elseif (get_theme_mod('roach_show_cluster_extract')) : ?>.content-cluster .article-loop p,
    .content-cluster .article-loop h2,
    .content-cluster .article-loop h3,
    .content-cluster .article-loop h4,
    .content-cluster .article-loop span.entry-title {
      text-align: left !important;
      margin-bottom: 8px !important;
      padding: 0 10px 0 0 !important;
    }

    .content-cluster .article-loop .show-extract p {
      font-size: calc(<?php echo $roach_size_text; ?>px - 2px) !important;
    }

    @media (min-width:800px) {
      .content-cluster .article-loop {
        margin-bottom: 1rem !important;
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_no_sticky_header')) : ?>.sticky {
      top: 22px !important;
    }

    .the-content h2:before {
      margin-top: -20px;
      height: 20px;
    }

    header {
      position: relative !important;
    }

    @media (max-width: 1050px) {

      .content-single,
      .content-page {
        padding-top: 0 !important;
      }

      .content-loop {
        padding: 2rem;
      }

      .author .content-loop,
      .category .content-loop {
        padding: 1rem 2rem 2rem 2rem;
      }
    }

    <?php else : ?>.the-content h2:before {
      margin-top: -70px;
      height: 70px;
    }

    <?php endif; ?><?php if (get_post_meta(get_the_ID(), 'roach_header_design', true)) : ?>.roach-hero:after {
      background: radial-gradient(ellipse at center, <?php echo $hero_background; ?> 18%, #000000d1 100%);
    }

    .roach-hero-content h1,
    .roach-hero-content p {
      color: <?php echo $hero_text; ?> !important;
    }

    @media (max-width: 1050px) {
      .content-page {
        padding-top: 0 !important;
      }
    }

    <?php if (!get_theme_mod('roach_no_sticky_header')) { ?>@media (max-width: 1050px) {
      .roach-hero-content {
        padding-top: 4rem !important;
      }
    }

    <?php } ?><?php endif; ?><?php if (get_theme_mod('roach_menu_columns') == '2') : ?>@media (min-width: 1050px) {
      #menu ul>li ul {
        width: 26rem !important;
      }

      #menu>ul>li ul>li {
        width: 50% !important;
      }

      #menu ul>li>ul>li>ul {
        left: -26.2rem !important;
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_menu_columns') == '3') : ?>@media (min-width: 1050px) {
      #menu ul>li ul {
        width: 36rem !important;
      }

      #menu>ul>li ul>li {
        width: 33.333333% !important;
      }

      #menu ul>li>ul>li>ul {
        left: -36.2rem !important;
      }
    }

    <?php endif; ?><?php if (get_theme_mod('roach_float_menu')) : ?>@media (max-width: 1050px) {
      header label {
        width: 64px;
        height: 64px;
        position: fixed;
        padding: 0;
        right: 1.5rem;
        bottom: 5rem;
        border-radius: 50%;
        -webkit-box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5);
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5);
        background-color: #fff;
        -webkit-transition: 300ms ease all;
        transition: 300ms ease all;
        z-index: 101;
        display: flex;
        align-items: center;
      }

      .site-header-content {
        justify-content: center;
      }

      .line {
        background: #282828 !important;
      }

      .circle {
        margin: 0 auto;
        width: 24px;
        height: 24px;
      }

      <?php if (get_theme_mod('roach_no_sticky_header')) : ?>#menu {
        top: 0;
        margin-top: 0;
      }

      <?php else : ?>#menu {
        margin-top: 28px;
      }

      <?php endif; ?>
    }

    <?php endif; ?><?php if (get_theme_mod('roach_total_footer')) : ?>.content-footer .widget-area {
      padding-right: 2rem;
    }

    footer {
      background: <?php echo $roach_footer_background; ?>;
    }

    .content-footer {
      padding: 20px;
    }

    .content-footer p.widget-title {
      margin-bottom: 10px;
    }

    .content-footer .logo-footer {
      width: 100%;
      align-items: flex-start;
    }

    .content-footer-social {
      width: 100%;
    }

    .content-footer-social>div {
      max-width: calc(<?php echo $roach_width_header; ?>px - 32px);
      margin: 0 auto;
    }

    @media (min-width:1050px) {
      .content-footer {
        padding: 20px 0;
      }
    }

    @media (max-width:1050px) {
      .content-footer .logo-footer {
        margin: 0 0 1rem 0 !important;
      }

      .content-footer .widget-area {
        margin-top: 2rem !important;
      }
    }

    <?php else : ?>.content-footer {
      padding: 0;
    }

    .content-footer p {
      margin-bottom: 0 !important;
    }

    .content-footer .widget-area {
      margin-bottom: 0rem;
      padding: 1rem;
    }

    .content-footer li:first-child:before {
      content: "";
      padding: 0;
    }

    .content-footer li:before {
      content: "|";
      padding: 0 7px 0 5px;
      color: #fff;
      opacity: .4;
    }

    .content-footer li {
      list-style-type: none;
      display: inline;
      font-size: 15px;
    }

    .content-footer .widget-title {
      display: none;
    }

    .content-footer {
      background: <?php echo $roach_footer_background; ?>;
    }

    .content-footer-social {
      max-width: calc(<?php echo $roach_width_header; ?>px - 32px);
    }

    <?php endif; ?><?php if ((is_single()) && ($roach_show_social_buttons_bottom) && (($roach_social_post_types == '1') || ($roach_social_post_types == '2'))) : ?>@media (max-width:1050px) {
      .content-footer {
        padding-bottom: 44px;
      }
    }

    <?php endif; ?><?php if ((is_page()) && ($roach_show_social_buttons_bottom) && (($roach_social_post_types == '1') || ($roach_social_post_types == '3'))) : ?>@media (max-width:1050px) {
      .content-footer {
        padding-bottom: 44px;
      }
    }

    <?php endif; ?>@media (max-width: 1050px) and (min-width:481px) {
      <?php if ($rounded_borders) : ?>.article-loop-featured .article-image-featured {
        border-radius: <?php echo $borders_radius; ?>px !important;
      }

      <?php endif; ?>
    }
  </style>

  <meta name="theme-color" content="<?php echo $roach_header_background; ?>">

<?php
} ?>
