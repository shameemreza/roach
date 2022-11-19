<?php

/* 
 * POST METABOX
 */

add_action('init', 'register_meta_fields');

function register_meta_fields()
{

  register_meta(
    'post',
    'featured_post',
    [
      'description'      => __('Featured post', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_image_post',
    [
      'description'      => __('Hide featured post', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_breadcrumbs',
    [
      'description'      => __('Hide breadcrumbs', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_sidebar',
    [
      'description'      => __('Hide sidebar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'subtitle_post',
    [
      'description'      => __('Subtitle', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_related_post',
    [
      'description'      => __('Disable related posts', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_ads',
    [
      'description'      => __('Disable ads', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_h1',
    [
      'description'      => __('Disable H1', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_toc',
    [
      'description'      => __('Disable table of content', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_text',
    [
      'description'      => __('Breadcrumb text', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_text_pillar_page',
    [
      'description'      => __('Text Breadcrumb Page Pillar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );


  register_meta(
    'post',
    'single_bc_url_pillar_page',
    [
      'description'      => __('URL Breadcrumb Page Pillar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_social_btn',
    [
      'description'      => __('Disable social buttons', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_header',
    [
      'description'      => __('Disable header', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_footer',
    [
      'description'      => __('Disable footer', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_featured',
    [
      'description'      => __('Featured text', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );
}

function sanitize_featured_post($value)
{
  if (!empty($value)) {
    return 1;
  } else {
    return 0;
  }
}

function custom_fields_auth_callback($allowed, $meta_key, $post_id, $user_id, $cap, $caps)
{
  if ('post' == get_post_type($post_id) && current_user_can('edit_post', $post_id)) {
    $allowed = true;
  } else {
    $allowed = false;
  }
  return $allowed;
}

add_action('add_meta_boxes', 'meta_boxes');
function meta_boxes()
{
  add_meta_box('post-meta-box', __('Post Options', 'roach'), 'meta_box_callback', 'post', 'normal', 'high', array('arg' => 'value'));
}

function meta_box_callback($post)
{
  wp_nonce_field('meta_box', 'meta_box_noncename');
  $post_meta = get_post_custom($post->ID);
  $current_value_1 = get_post_meta($post->ID, 'featured_post', true);
  $current_value_2 = get_post_meta($post->ID, 'hide_image_post', true);
  $current_value_3 = get_post_meta($post->ID, 'subtitle_post', true);
  $current_value_4 = get_post_meta($post->ID, 'hide_related_post', true);
  $current_value_5 = get_post_meta($post->ID, 'hide_sidebar', true);
  $current_value_6 = get_post_meta($post->ID, 'hide_ads', true);
  $current_value_7 = get_post_meta($post->ID, 'hide_h1', true);
  $current_value_8 = get_post_meta($post->ID, 'single_bc_text', true);
  $current_value_9 = get_post_meta($post->ID, 'hide_toc', true);
  $current_value_10 = get_post_meta($post->ID, 'hide_social_btn', true);
  $current_value_11 = get_post_meta($post->ID, 'single_bc_text_pillar_page', true);
  $current_value_12 = get_post_meta($post->ID, 'single_bc_url_pillar_page', true);
  $current_value_13 = get_post_meta($post->ID, 'disable_header', true);
  $current_value_14 = get_post_meta($post->ID, 'disable_footer', true);
  $current_value_15 = get_post_meta($post->ID, 'hide_breadcrumbs', true);
  $current_value_16 = get_post_meta($post->ID, 'single_bc_featured', true);
  $current_value_17 = get_post_meta($post->ID, 'head_custom_code', true);
  $current_value_18 = get_post_meta($post->ID, 'foot_custom_code', true);

?>

  <style>
    .roach-metabox-title {
      font-size: 20px;
    }

    .postmetabox {
      margin: 1rem 0;
      overflow: hidden;
      clear: both;
      height: auto;
    }

    .metabox_option {
      margin: 0 0 2rem 0;
    }

    .metabox_option .label {
      display: inline !important;
    }

    .metabox_option input {
      margin-top: .1rem;
    }

    .postmetabox_left {
      width: 30%;
      float: left;
    }

    .postmetabox_right {
      width: 70%;
      float: right;
    }

    .metabox_option input[type=text],
    .postmetabox textarea {
      width: 80% !important;
      padding: 10px;
    }

    .metabox_option.metabox_mbottom {
      padding-bottom: 2rem !important;
    }

    .metabox_option.metabox_mbottom4 {
      padding-bottom: 5.5rem !important;
    }
  </style>

  <div class="postmetabox">
    <div class="postmetabox_left">
      <div class="metabox_option">
        <label class="label" for="featured_post"><?php _e('Featured post', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_featured"><?php _e('Featured Text', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_image_post"><?php _e('Hide featured image', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_breadcrumbs"><?php _e('Disable breadcrumbs', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_sidebar"><?php _e('Disable sidebar', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_related_post"><?php _e('Disable related posts', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_ads"><?php _e('Disable Ads', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_h1"><?php _e('Disable H1', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_toc"><?php _e('Disable Table of Contents', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_social_btn"><?php _e('Disable Social Buttons', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="disable_header"><?php _e('Disable header', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="disable_footer"><?php _e('Disable footer', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom4">
        <label class="label" for="subtitle_post"><?php _e('Subtitle', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_text"><?php _e('Breadcrumb Text', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_text_pillar_page"><?php _e('Text Breadcrumb Pillar Page', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_url_pillar_page"><?php _e('URL Breadcrumb Pillar Page', 'roach'); ?></label>
      </div>


      <div class="metabox_option metabox_mbottom4">
        <label class="label" for="head_custom_code"><?php _e('Custom code in header', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="foot_custom_code"><?php _e('Custom code in footer', 'roach'); ?></label>
      </div>

    </div>
    <div class="postmetabox_right">
      <div class="metabox_option">
        <input type="checkbox" name="featured_post" id="featured_post" value="1" <?php checked($current_value_1, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="text" name="single_bc_featured" id="single_bc_featured" value="<?php echo  esc_html($current_value_16); ?>" placeholder="<?php _e('Featured', 'roach'); ?>">
      </div>


      <div class="metabox_option">
        <input type="checkbox" name="hide_image_post" id="hide_image_post" value="1" <?php checked($current_value_2, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_breadcrumbs" id="hide_breadcrumbs" value="1" <?php checked($current_value_15, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_sidebar" id="hide_sidebar" value="1" <?php checked($current_value_5, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_related_post" id="hide_related_post" value="1" <?php checked($current_value_4, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_ads" id="hide_ads" value="1" <?php checked($current_value_6, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_h1" id="hide_h1" value="1" <?php checked($current_value_7, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_toc" id="hide_toc" value="1" <?php checked($current_value_9, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_social_btn" id="hide_social_btn" value="1" <?php checked($current_value_10, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="disable_header" id="disable_header" value="1" <?php checked($current_value_13, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="disable_footer" id="disable_footer" value="1" <?php checked($current_value_14, 1); ?>>
      </div>

      <div class="metabox_option">
        <textarea name="subtitle_post" id="subtitle_post" placeholder="<?php _e('Subtitle', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_3); ?></textarea>
      </div>

      <div class="metabox_option">
        <input type="text" name="single_bc_text" id="single_bc_text" value="<?php echo  esc_html($current_value_8); ?>">
      </div>

      <div class="metabox_option">
        <input type="text" name="single_bc_text_pillar_page" id="single_bc_text_pillar_page" value="<?php echo  esc_html($current_value_11); ?>">
      </div>

      <div class="metabox_option">
        <input type="text" name="single_bc_url_pillar_page" id="single_bc_url_pillar_page" value="<?php echo  esc_html($current_value_12); ?>">
      </div>


      <div class="metabox_option">
        <textarea name="head_custom_code" id="head_custom_code" placeholder="<?php _e('Custom code in header', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_17); ?></textarea>
      </div>

      <div class="metabox_option">
        <textarea name="foot_custom_code" id="foot_custom_code" placeholder="<?php _e('Custom code in footer', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_18); ?></textarea>
      </div>

    </div>
  </div>

<?php }

add_action('save_post', 'save_custom_fields', 10, 2);

function save_custom_fields($post_id, $post)
{

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['featured_post']) && $_POST['featured_post'] == "1") {
    update_post_meta($post_id, 'featured_post', $_POST['featured_post']);
  } else {
    delete_post_meta($post_id, 'featured_post');
  }

  if (isset($_POST['hide_image_post']) && $_POST['hide_image_post'] == "1") {
    update_post_meta($post_id, 'hide_image_post', $_POST['hide_image_post']);
  } else {
    delete_post_meta($post_id, 'hide_image_post');
  }

  if (isset($_POST['subtitle_post']) && (!empty($_POST['subtitle_post']))) {
    update_post_meta($post_id, 'subtitle_post', $_POST['subtitle_post']);
  } else {
    delete_post_meta($post_id, 'subtitle_post');
  }

  if (isset($_POST['hide_related_post']) && $_POST['hide_related_post'] == "1") {
    update_post_meta($post_id, 'hide_related_post', $_POST['hide_related_post']);
  } else {
    delete_post_meta($post_id, 'hide_related_post');
  }

  if (isset($_POST['hide_sidebar']) && $_POST['hide_sidebar'] == "1") {
    update_post_meta($post_id, 'hide_sidebar', $_POST['hide_sidebar']);
  } else {
    delete_post_meta($post_id, 'hide_sidebar');
  }

  if (isset($_POST['hide_breadcrumbs']) && $_POST['hide_breadcrumbs'] == "1") {
    update_post_meta($post_id, 'hide_breadcrumbs', $_POST['hide_breadcrumbs']);
  } else {
    delete_post_meta($post_id, 'hide_breadcrumbs');
  }

  if (isset($_POST['hide_ads']) && $_POST['hide_ads'] == "1") {
    update_post_meta($post_id, 'hide_ads', $_POST['hide_ads']);
  } else {
    delete_post_meta($post_id, 'hide_ads');
  }

  if (isset($_POST['hide_h1']) && $_POST['hide_h1'] == "1") {
    update_post_meta($post_id, 'hide_h1', $_POST['hide_h1']);
  } else {
    delete_post_meta($post_id, 'hide_h1');
  }

  if (isset($_POST['hide_toc']) && $_POST['hide_toc'] == "1") {
    update_post_meta($post_id, 'hide_toc', $_POST['hide_toc']);
  } else {
    delete_post_meta($post_id, 'hide_toc');
  }

  if (isset($_POST['hide_social_btn']) && $_POST['hide_social_btn'] == "1") {
    update_post_meta($post_id, 'hide_social_btn', $_POST['hide_social_btn']);
  } else {
    delete_post_meta($post_id, 'hide_social_btn');
  }

  if (isset($_POST['single_bc_featured']) && (!empty($_POST['single_bc_featured']))) {
    update_post_meta($post_id, 'single_bc_featured', $_POST['single_bc_featured']);
  } else {
    delete_post_meta($post_id, 'single_bc_featured');
  }

  if (isset($_POST['single_bc_text']) && (!empty($_POST['single_bc_text']))) {
    update_post_meta($post_id, 'single_bc_text', $_POST['single_bc_text']);
  } else {
    delete_post_meta($post_id, 'single_bc_text');
  }

  if (isset($_POST['single_bc_text_pillar_page']) && (!empty($_POST['single_bc_text_pillar_page']))) {
    update_post_meta($post_id, 'single_bc_text_pillar_page', $_POST['single_bc_text_pillar_page']);
  } else {
    delete_post_meta($post_id, 'single_bc_text_pillar_page');
  }

  if (isset($_POST['single_bc_url_pillar_page']) && (!empty($_POST['single_bc_url_pillar_page']))) {
    update_post_meta($post_id, 'single_bc_url_pillar_page', $_POST['single_bc_url_pillar_page']);
  } else {
    delete_post_meta($post_id, 'single_bc_url_pillar_page');
  }

  if (isset($_POST['disable_header']) && $_POST['disable_header'] == "1") {
    update_post_meta($post_id, 'disable_header', $_POST['disable_header']);
  } else {
    delete_post_meta($post_id, 'disable_header');
  }

  if (isset($_POST['disable_footer']) && $_POST['disable_footer'] == "1") {
    update_post_meta($post_id, 'disable_footer', $_POST['disable_footer']);
  } else {
    delete_post_meta($post_id, 'disable_footer');
  }

  if (isset($_POST['head_custom_code']) && (!empty($_POST['head_custom_code']))) {
    update_post_meta($post_id, 'head_custom_code', $_POST['head_custom_code']);
  } else {
    delete_post_meta($post_id, 'head_custom_code');
  }

  if (isset($_POST['foot_custom_code']) && (!empty($_POST['foot_custom_code']))) {
    update_post_meta($post_id, 'foot_custom_code', $_POST['foot_custom_code']);
  } else {
    delete_post_meta($post_id, 'foot_custom_code');
  }
}



/* 
 * PAGE METABOX
 */

add_action('init', 'register_meta_fields_page');

function register_meta_fields_page()
{

  register_meta(
    'post',
    'roach_header_design',
    [
      'description'      => __('Header design', 'roach'),
      'auth_callback'     => 'custom_fields_auth_callback_page'
    ]
  );

  register_meta(
    'post',
    'hide_image_post',
    [
      'description'      => __('Hide featured post', 'roach'),
      'sanitize_callback' => 'sanitize_featured_page',
      'auth_callback'     => 'custom_fields_auth_callback_page'
    ]
  );

  register_meta(
    'post',
    'hide_ads',
    [
      'description'      => __('Disable Ads', 'roach'),
      'sanitize_callback' => 'sanitize_featured_page',
      'auth_callback'     => 'custom_fields_auth_callback_page'
    ]
  );

  register_meta(
    'post',
    'hide_sidebar',
    [
      'description'      => __('Hide sidebar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_breadcrumbs',
    [
      'description'      => __('Hide breadcrumbs', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_h1',
    [
      'description'      => __('Disable H1', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_social_btn',
    [
      'description'      => __('Disable Social Buttons', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_toc',
    [
      'description'      => __('Disable Table of Contents', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'sanitize_featured_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_header',
    [
      'description'      => __('Disable header', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'hide_footer',
    [
      'description'      => __('Disable footer', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_featured',
    [
      'description'      => __('Featured text', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_text',
    [
      'description'      => __('Breadcrumb text', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'single_bc_text_pillar_page',
    [
      'description'      => __('Text Breadcrumb Page Pillar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );


  register_meta(
    'post',
    'single_bc_url_pillar_page',
    [
      'description'      => __('URL Breadcrumb Page Pillar', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );

  register_meta(
    'post',
    'subtitle_post',
    [
      'description'      => __('Subtitle', 'roach'),
      'single'           => true,
      'sanitize_callback' => 'subtitle_post',
      'auth_callback'     => 'custom_fields_auth_callback'
    ]
  );
}

function sanitize_featured_page($value)
{
  if (!empty($value)) {
    return 1;
  } else {
    return 0;
  }
}

function custom_fields_auth_callback_page($allowed, $meta_key, $post_id, $user_id, $cap, $caps)
{
  if ('page' == get_post_type($post_id) && current_user_can('edit_post', $post_id)) {
    $allowed = true;
  } else {
    $allowed = false;
  }
  return $allowed;
}

add_action('add_meta_boxes_page', 'meta_boxes_page');
function meta_boxes_page()
{
  add_meta_box('page-meta-box', __('Page Options', 'roach'), 'meta_box_callback_page', 'page', 'normal', 'high', array('arg' => 'value'));
}

function meta_box_callback_page($post)
{
  wp_nonce_field('meta_box', 'meta_box_noncename');
  $post_meta = get_post_custom($post->ID);
  $current_value_3 = get_post_meta($post->ID, 'subtitle_post', true);
  $current_value_4 = get_post_meta($post->ID, 'hide_image_page', true);
  $current_value_6 = get_post_meta($post->ID, 'hide_ads', true);
  $current_value_7 = get_post_meta($post->ID, 'hide_h1', true);
  $current_value_8 = get_post_meta($post->ID, 'hide_sidebar', true);
  $current_value_9 = get_post_meta($post->ID, 'hide_toc', true);
  $current_value_10 = get_post_meta($post->ID, 'hide_social_btn', true);
  $current_value_13 = get_post_meta($post->ID, 'disable_header', true);
  $current_value_14 = get_post_meta($post->ID, 'disable_footer', true);
  $current_value_15 = get_post_meta($post->ID, 'single_bc_text', true);
  $current_value_16 = get_post_meta($post->ID, 'single_bc_text_pillar_page', true);
  $current_value_17 = get_post_meta($post->ID, 'single_bc_url_pillar_page', true);
  $current_value_18 = get_post_meta($post->ID, 'hide_breadcrumbs', true);
  $current_value_19 = get_post_meta($post->ID, 'head_custom_code', true);
  $current_value_20 = get_post_meta($post->ID, 'foot_custom_code', true);
  $current_value_21 = get_post_meta($post->ID, 'roach_header_design', true);

?>

  <style>
    .postmetabox {
      margin: 1rem 0;
      overflow: hidden;
      clear: both;
      height: auto;
    }

    .metabox_option {
      margin: 0 0 2rem 0;
    }

    .metabox_option .label {
      display: inline !important;
    }

    .metabox_option input {
      margin-top: .1rem;
    }

    .postmetabox_left {
      width: 30%;
      float: left;
    }

    .postmetabox_right {
      width: 70%;
      float: right;
    }

    .metabox_option input[type=text],
    .postmetabox textarea {
      width: 80% !important;
      padding: 10px;
    }

    .metabox_option select {
      width: 50% !important;
      padding: 5px;
    }

    .metabox_option.metabox_mbottom {
      padding-bottom: 2rem !important;
    }

    .metabox_option.metabox_mbottom1 {
      padding-bottom: 1.25rem !important;
    }

    .metabox_option.metabox_mbottom4 {
      padding-bottom: 5.5rem !important;
    }
  </style>

  <div class="postmetabox">
    <div class="postmetabox_left">

      <div class="metabox_option metabox_mbottom1">
        <label class="label" for="roach_header_design"><?php _e('Header design', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_image_page"><?php _e('Hide featured post', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_ads"><?php _e('Disable Ads', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_sidebar"><?php _e('Disable breadcrumbs', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_sidebar"><?php _e('Disable Sidebar', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_h1"><?php _e('Disable H1', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_toc"><?php _e('Disable Table of Contents', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="hide_social_btn"><?php _e('Disable Social Buttons', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="disable_header"><?php _e('Disable header', 'roach'); ?></label>
      </div>

      <div class="metabox_option">
        <label class="label" for="disable_footer"><?php _e('Disable footer', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom4">
        <label class="label" for="subtitle_post"><?php _e('Subtitle', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_text"><?php _e('Breadcrumb Text', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_text_pillar_page"><?php _e('Text Breadcrumb Pillar Page', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom">
        <label class="label" for="single_bc_url_pillar_page"><?php _e('URL Breadcrumb Pillar Page', 'roach'); ?></label>
      </div>


      <div class="metabox_option metabox_mbottom4">
        <label class="label" for="head_custom_code"><?php _e('Custom code in header', 'roach'); ?></label>
      </div>

      <div class="metabox_option metabox_mbottom4">
        <label class="label" for="foot_custom_code"><?php _e('Custom code in footer', 'roach'); ?></label>
      </div>



    </div>
    <div class="postmetabox_right">

      <div class="metabox_option">
        <select name="roach_header_design" id="roach_header_design">
          <option value="0" <?php selected($current_value_21, "0"); ?>><?php _e('Normal', 'roach'); ?></option>
          <option value="1" <?php selected($current_value_21, "1"); ?>><?php _e('Featured', 'roach'); ?></option>
        </select>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_image_page" id="hide_image_page" value="1" <?php checked($current_value_4, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_ads" id="hide_ads" value="1" <?php checked($current_value_6, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_breadcrumbs" id="hide_breadcrumbs" value="1" <?php checked($current_value_18, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_sidebar" id="hide_sidebar" value="1" <?php checked($current_value_8, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_h1" id="hide_h1" value="1" <?php checked($current_value_7, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_toc" id="hide_toc" value="1" <?php checked($current_value_9, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="hide_social_btn" id="hide_social_btn" value="1" <?php checked($current_value_10, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="disable_header" id="disable_header" value="1" <?php checked($current_value_13, 1); ?>>
      </div>

      <div class="metabox_option">
        <input type="checkbox" name="disable_footer" id="disable_footer" value="1" <?php checked($current_value_14, 1); ?>>
      </div>


      <div class="metabox_option">
        <textarea name="subtitle_post" id="subtitle_post" placeholder="<?php _e('Subtitle', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_3); ?></textarea>
      </div>


      <div class="metabox_option">
        <input type="text" name="single_bc_text" id="single_bc_text" value="<?php echo  esc_html($current_value_15); ?>">
      </div>


      <div class="metabox_option">
        <input type="text" name="single_bc_text_pillar_page" id="single_bc_text_pillar_page" value="<?php echo  esc_html($current_value_16); ?>">
      </div>

      <div class="metabox_option">
        <input type="text" name="single_bc_url_pillar_page" id="single_bc_url_pillar_page" value="<?php echo  esc_html($current_value_17); ?>">
      </div>

      <div class="metabox_option">
        <textarea name="head_custom_code" id="head_custom_code" placeholder="<?php _e('Custom code in header', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_19); ?></textarea>
      </div>

      <div class="metabox_option">
        <textarea name="foot_custom_code" id="foot_custom_code" placeholder="<?php _e('Custom code in footer', 'roach'); ?>" rows="4"><?php echo  esc_html($current_value_20); ?></textarea>
      </div>

    </div>
  </div>

<?php }

add_action('save_post_page', 'save_custom_fields_page', 10, 2);

function save_custom_fields_page($post_id, $post)
{

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['hide_image_page']) && $_POST['hide_image_page'] == "1") {
    update_post_meta($post_id, 'hide_image_page', $_POST['hide_image_page']);
  } else {
    delete_post_meta($post_id, 'hide_image_page');
  }

  if (isset($_POST['hide_sidebar']) && $_POST['hide_sidebar'] == "1") {
    update_post_meta($post_id, 'hide_sidebar', $_POST['hide_sidebar']);
  } else {
    delete_post_meta($post_id, 'hide_sidebar');
  }

  if (isset($_POST['hide_breadcrumbs']) && $_POST['hide_breadcrumbs'] == "1") {
    update_post_meta($post_id, 'hide_breadcrumbs', $_POST['hide_breadcrumbs']);
  } else {
    delete_post_meta($post_id, 'hide_breadcrumbs');
  }
  if (isset($_POST['hide_ads']) && $_POST['hide_ads'] == "1") {
    update_post_meta($post_id, 'hide_ads', $_POST['hide_ads']);
  } else {
    delete_post_meta($post_id, 'hide_ads');
  }

  if (isset($_POST['hide_h1']) && $_POST['hide_h1'] == "1") {
    update_post_meta($post_id, 'hide_h1', $_POST['hide_h1']);
  } else {
    delete_post_meta($post_id, 'hide_h1');
  }

  if (isset($_POST['hide_toc']) && $_POST['hide_toc'] == "1") {
    update_post_meta($post_id, 'hide_toc', $_POST['hide_toc']);
  } else {
    delete_post_meta($post_id, 'hide_toc');
  }

  if (isset($_POST['hide_social_btn']) && $_POST['hide_social_btn'] == "1") {
    update_post_meta($post_id, 'hide_social_btn', $_POST['hide_social_btn']);
  } else {
    delete_post_meta($post_id, 'hide_social_btn');
  }

  if (isset($_POST['disable_header']) && $_POST['disable_header'] == "1") {
    update_post_meta($post_id, 'disable_header', $_POST['disable_header']);
  } else {
    delete_post_meta($post_id, 'disable_header');
  }

  if (isset($_POST['disable_footer']) && $_POST['disable_footer'] == "1") {
    update_post_meta($post_id, 'disable_footer', $_POST['disable_footer']);
  } else {
    delete_post_meta($post_id, 'disable_footer');
  }

  if (isset($_POST['single_bc_text']) && (!empty($_POST['single_bc_text']))) {
    update_post_meta($post_id, 'single_bc_text', $_POST['single_bc_text']);
  } else {
    delete_post_meta($post_id, 'single_bc_text');
  }

  if (isset($_POST['single_bc_text_pillar_page']) && (!empty($_POST['single_bc_text_pillar_page']))) {
    update_post_meta($post_id, 'single_bc_text_pillar_page', $_POST['single_bc_text_pillar_page']);
  } else {
    delete_post_meta($post_id, 'single_bc_text_pillar_page');
  }

  if (isset($_POST['single_bc_url_pillar_page']) && (!empty($_POST['single_bc_url_pillar_page']))) {
    update_post_meta($post_id, 'single_bc_url_pillar_page', $_POST['single_bc_url_pillar_page']);
  } else {
    delete_post_meta($post_id, 'single_bc_url_pillar_page');
  }
  if (isset($_POST['head_custom_code']) && (!empty($_POST['head_custom_code']))) {
    update_post_meta($post_id, 'head_custom_code', $_POST['head_custom_code']);
  } else {
    delete_post_meta($post_id, 'head_custom_code');
  }

  if (isset($_POST['foot_custom_code']) && (!empty($_POST['foot_custom_code']))) {
    update_post_meta($post_id, 'foot_custom_code', $_POST['foot_custom_code']);
  } else {
    delete_post_meta($post_id, 'foot_custom_code');
  }

  if (isset($_POST['roach_header_design'])) {
    update_post_meta($post_id, 'roach_header_design',  $_POST['roach_header_design']);
  }

  if (isset($_POST['subtitle_post']) && (!empty($_POST['subtitle_post']))) {
    update_post_meta($post_id, 'subtitle_post', $_POST['subtitle_post']);
  } else {
    delete_post_meta($post_id, 'subtitle_post');
  }
}

?>
