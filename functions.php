<?php

/**
 * Functions and definitions
 *
 *@link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package roach
 * @author Shameem Reza
 * @since 0.0.1
 */
/*
 * Roach CSS
 */

add_action("wp_enqueue_scripts", "roach_css");
function roach_css()
{
    wp_enqueue_style(
        "roach-style",
        get_stylesheet_directory_uri() . "/assets/css/main.min.css",
        [],
        "01241022"
    );
}

/*
 * Load translations
 */
add_action("after_setup_theme", "roach_setup");
function roach_setup()
{
    load_theme_textdomain("roach", get_template_directory() . "/languages");
}

/*
 * Optimize scripts
 */

add_action("wp_head", "roach_preconnect", 1);

function roach_preconnect()
{
    $options_fonts = get_theme_mod("roach_options_fonts");
    if (!$options_fonts) {
        $options_fonts = 1;
    }
    $optimize_analytics = get_theme_mod("roach_optimize_analytics");
    ?>
  <?php if ($optimize_analytics): ?>
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
  <?php endif; ?>
  <?php if ($options_fonts == 1): ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <?php endif; ?>
  <?php if ($optimize_analytics): ?>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
  <?php endif; ?>
<?php
}
/*
 * Preload attachment image
 */ function roach_preload_post_thumbnail()
{
    if (get_theme_mod("roach_preload_featured_image")) {
        global $post;
        if (!is_singular()) {
            return;
        }
        $image_size = "full";
        if (is_singular("product")) {
            $image_size = "woocommerce_single";
        } elseif (is_singular("post")) {
            $image_size = "large";
        }
        $image_size = apply_filters(
            "preload_post_thumbnail_image_size",
            $image_size,
            $post
        );
        $thumbnail_id = apply_filters(
            "preload_post_thumbnail_id",
            get_post_thumbnail_id($post->ID),
            $post
        );
        $image = wp_get_attachment_image_src($thumbnail_id, $image_size);
        $src = "";
        $additional_attr_array = [];
        $additional_attr = "";
        if ($image) {
            list($src, $width, $height) = $image;
            $image_meta = wp_get_attachment_metadata($thumbnail_id);
            if (is_array($image_meta)) {
                $size_array = [absint($width), absint($height)];
                $srcset = wp_calculate_image_srcset(
                    $size_array,
                    $src,
                    $image_meta,
                    $thumbnail_id
                );
                $sizes = wp_calculate_image_sizes(
                    $size_array,
                    $src,
                    $image_meta,
                    $thumbnail_id
                );
                if ($srcset && ($sizes || !empty($attr["sizes"]))) {
                    $additional_attr_array["imagesrcset"] = $srcset;
                    if (empty($attr["sizes"])) {
                        $additional_attr_array["imagesizes"] = $sizes;
                    }
                }
            }
            foreach ($additional_attr_array as $name => $value) {
                $additional_attr .= "$name=" . '"' . $value . '" ';
            }
        } else {
            return;
        }
        printf(
            '<link rel="preload" as="image" href="%s" %s/>',
            esc_url($src),
            $additional_attr
        );
    }
}
add_action("wp_head", "roach_preload_post_thumbnail"); /*
 * Roach Dynamic CSS
 */
require get_template_directory() . "/inc/css.php"; /*
 * Roach Setup
 */
function roach_ini()
{
    add_theme_support("html5", ["search-form", "gallery", "caption"]);
    add_theme_support("post-thumbnails");
    add_theme_support("side-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("automatic-feed-links");
    add_theme_support("custom-logo", [
        "height" => 50,
        "width" => 250,
        "flex-height" => true,
        "flex-width" => true,
        "header-text" => ["site-title", "site-description"],
    ]);
}
add_action("after_setup_theme", "roach_ini"); /*
 * Roach Security
 */
add_filter("the_generator", "roach_remove_version");
function roach_remove_version()
{
    if (get_theme_mod("roach_delete_version")):
        return "";
    endif;
}
if (get_theme_mod("roach_delete_wlw")):
    remove_action("wp_head", "wlwmanifest_link");
endif;
if (get_theme_mod("roach_delete_rds")):
    remove_action("wp_head", "rsd_link");
    add_filter("xmlrpc_enabled", "__return_false");
endif;
if (get_theme_mod("roach_delete_api_rest_link")):
    remove_action("xmlrpc_rsd_apis", "rest_output_rsd");
    remove_action("wp_head", "rest_output_link_wp_head");
    remove_action("template_redirect", "rest_output_link_header", 11, 0);
endif;
if (get_theme_mod("roach_content_type_options")):
    header("X-Content-Type-Options: nosniff");
endif;
if (get_theme_mod("roach_frame_options")):
    header("X-Frame-Options: SAMEORIGIN");
endif;
if (get_theme_mod("roach_xxs_protection")):
    header("X-XSS-Protection: 1; mode=block");
endif;
if (get_theme_mod("roach_strict_transport_security")):
    header("Strict-Transport-Security: max-age=31536000;");
endif;
if (get_theme_mod("roach_referrer_policy")):
    header("Referrer-Policy: strict-origin-when-cross-origin");
endif; /*
 * Header and footer code
 */
add_action("wp_head", "roach_head_code", 20);
function roach_head_code()
{
    $head_code = get_theme_mod("roach_code_analytics");
    if ($head_code):
        echo $head_code;
    endif;
}
add_action("wp_body_open", "roach_body_code");
function roach_body_code()
{
    $body_code = get_theme_mod("roach_body_code");
    if ($body_code):
        echo $body_code;
    endif;
}
add_action("wp_footer", "roach_footer_code", 20);
function roach_footer_code()
{
    $footer_code = get_theme_mod("roach_footer_code");
    if ($footer_code):
        echo $footer_code;
    endif;
} /* Menu */
register_nav_menus(["header-menu" => __("Main menu", "roach")]); /*
 * Thumbnails
 */
$thumb_width = get_theme_mod("roach_thumb_width");
if (!$thumb_width):
    $thumb_width = 400;
endif;
$thumb_height = get_theme_mod("roach_thumb_height");
if (!$thumb_height):
    $thumb_height = 267;
endif;
add_image_size("post-thumbnail", $thumb_width, $thumb_height, true);
function roach_post_thumbnail($size = "post-thumbnail", $id = null)
{
    global $post;
    if (is_null($id)) {
        $id = get_the_ID();
    }
    if (!has_post_thumbnail()) {
        return false;
    }
    $thumb_id = get_post_thumbnail_id($id);
    $image = wp_get_attachment_image_src(
        $thumb_id,

        $size
    );
    return $image[0];
}
$side_thumb_width = get_theme_mod("roach_side_thumb_width");
if (!$side_thumb_width):
    $side_thumb_width = 300;
endif;
$side_thumb_height = get_theme_mod("roach_side_thumb_height");
if (!$side_thumb_height):
    $side_thumb_height = 140;
endif;
add_image_size("side-thumbnail", $side_thumb_width, $side_thumb_height, true);
function roach_side_thumbnail($size = "side-thumbnail", $id = null)
{
    global $post;
    if (is_null($id)) {
        $id = get_the_ID();
    }
    if (!has_post_thumbnail()) {
        return false;
    }
    $thumb_id = get_post_thumbnail_id($id);
    $image = wp_get_attachment_image_src(
        $thumb_id,

        $size
    );
    return $image[0];
}
/*
 * Include functions
 */ require get_template_directory() . "/inc/fonts.php";
require get_template_directory() . "/inc/fonts-local.php";
require get_template_directory() . "/inc/ads.php";
require get_template_directory() . "/inc/comments.php";
require get_template_directory() . "/inc/customizer.php";
require get_template_directory() . "/inc/schema.php";
require get_template_directory() . "/inc/categories.php";
require get_template_directory() . "/inc/toc.php";
require get_template_directory() . "/inc/metabox.php";
require get_template_directory() . "/inc/breadcrumbs.php"; /*
/*
 * Script defer
 */
if (!is_admin()) {
    add_filter("clean_url", "defer_parsing_of_js", 11, 1);
    function defer_parsing_of_js($url)
    {
        if (get_theme_mod("roach_enable_js_defer")) {
            if (false === strpos($url, ".js")) {
                return $url;
            }
            if (strpos($url, "jquery.js")) {
                return $url;
            }
            return "$url' defer onload='";
        } else {
            return $url;
        }
    }
} /*
 * Widget
 */
add_action("widgets_init", "add_widget_support");
function add_widget_support()
{
    register_sidebar([
        "name" => __("Home page sidebar", "roach"),
        "id" => "home",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Post sidebar", "roach"),
        "id" => "single",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Page sidebar", "roach"),
        "id" => "page",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Categories sidebar", "roach"),
        "id" => "cat",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Tags sidebar", "roach"),
        "id" => "tag",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    if (function_exists("is_woocommerce")) {
        register_sidebar([
            "name" => __("Products sidebar", "roach"),
            "id" => "products",
            "before_widget" => "<div>",
            "after_widget" => "</div>",
            "before_title" => '<p class="sidebar-title">',
            "after_title" => "</p>",
        ]);
    }
    register_sidebar([
        "name" => __("Footer − Social networks", "roach"),
        "id" => "social",
        "description" => __(
            "Location for the links to your social networks.",
            "roach"
        ),
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Header − Social networks", "roach"),
        "id" => "hsocial",
        "description" => __(
            "Location for the links to your social networks.",
            "roach"
        ),
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => '<p class="sidebar-title">',
        "after_title" => "</p>",
    ]);
} /*
 * Roach Widgets
 */
require get_template_directory() . "/inc/widgets.php";
/*
 * Categorys
 */ function current_category()
{
    global $cat;
    if (is_category() && $cat) {
        return $cat;
    } else {
        $var = get_the_category();
        return $var[0]->cat_ID;
    }
}
function roach_categories()
{
    $cats = [];
    foreach (get_the_category() as $c) {
        $cat = get_category($c);
        array_push($cats, $cat->term_id);
    }
    return $cats;
} /*
 * Breadcrumb
 */
function roach_breadcrumbs($schema)
{
    $args = [
        "container" => "div",
        "show_browse" => false,
        "show_schema" => $schema,
    ];

    breadcrumb_trail($args);
} /*
 * Breadcrumb Pages
 */
function roach_breadcrumbs_pages($post, $schema)
{
    if (
        !get_theme_mod("roach_hide_breadcrumb_page") &&
        !get_post_meta(get_the_ID(), "hide_breadcrumbs", true)
    ) {
        $url_pillar_page = get_post_meta(
            get_the_ID(),
            "single_bc_url_pillar_page",
            true
        );
        $text_pillar_page = get_post_meta(
            get_the_ID(),
            "single_bc_text_pillar_page",
            true
        );
        $post_title = get_post_meta(get_the_ID(), "single_bc_text", true);
        if (!$post_title) {
            $post_title = get_the_title();
        }
        $label = get_theme_mod("roach_breadcrumb_text");
        if (!$label) {
            $label = get_bloginfo("name");
        }
        if ($schema) {
            $format =
                '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" title="%s" itemprop="item"><span itemprop="name">%s</span></a><meta itemprop="position" content="%s"></li>';
        } else {
            $format = '<li><a href="%s" title="%s"><span>%s</span></a></li>';
        }
        if ($url_pillar_page && $text_pillar_page) {
            $count = 3;
        } else {
            $anc = array_map(
                "get_post",
                array_reverse((array) get_post_ancestors($post))
            );
            $count = count($anc);
            $count = $count + 2;
            $links = array_map("get_permalink", $anc);
        }
        if ($schema) {
            printf(
                '<div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">'
            );
            printf(
                '<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">'
            );
            printf('<meta name="numberOfItems" content="' . $count . '">');
            printf('<meta name="itemListOrder" content="Ascending">');
            printf(
                '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">' .
                    $label .
                    '</span></a><meta itemprop="position" content="1"></li>',
                esc_url(home_url())
            );
        } else {
            printf('<div class="breadcrumb-trail breadcrumbs">');
            printf('<ul class="breadcrumb">');
            printf(
                '<li><a href="%s"><span>' . $label . "</span></a></li>",
                esc_url(home_url())
            );
        }
        $meta = 2;
        if ($url_pillar_page && $text_pillar_page) {
            printf(
                $format,
                $url_pillar_page,
                $text_pillar_page,
                $text_pillar_page,
                $meta
            );
            $meta = $meta + 1;
        } else {
            foreach ($anc as $i => $apost) {
                $title = get_post_meta($apost->ID, "single_bc_text", true);
                if (!$title) {
                    $title = apply_filters("the_title", $apost->post_title);
                }
                printf(
                    $format,
                    $links[$i],
                    esc_attr($title),
                    esc_html($title),
                    $meta
                );
                $meta = $meta + 1;
            }
        }
        if ($schema) {
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' .
                $post_title .
                '</span><meta itemprop="position" content="' .
                $meta .
                '"></li>';
        } else {
            echo "<li><span>" . $post_title . "</span></li>";
        }
        printf("</ul>");
        printf("</div>");
    }
} /*
 * Font Awesome
 */
add_action("wp_footer", "add_awesome");
function add_awesome()
{
    if (get_theme_mod("roach_enable_awesome")) {
        wp_enqueue_style(
            "awesome-styles",
            "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        );
    }
} /*
 * Footer widgets
 */
add_action("widgets_init", "register_footer_sidebars");
function register_footer_sidebars()
{
    register_sidebar([
        "name" => __("Footer 1", "roach"),
        "id" => "widget-footer-1",
        "before_widget" => '<div class="widget-area">',
        "after_widget" => "</div>",
        "before_title" => '<p class="widget-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Footer 2", "roach"),
        "id" => "widget-footer-2",
        "before_widget" => '<div class="widget-area">',
        "after_widget" => "</div>",
        "before_title" => '<p class="widget-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Footer 3", "roach"),
        "id" => "widget-footer-3",
        "before_widget" => '<div class="widget-area">',
        "after_widget" => "</div>",
        "before_title" => '<p class="widget-title">',
        "after_title" => "</p>",
    ]);
    register_sidebar([
        "name" => __("Footer 4", "roach"),
        "id" => "widget-footer-4",
        "before_widget" => '<div class="widget-area">',
        "after_widget" => "</div>",
        "before_title" => '<p class="widget-title">',
        "after_title" => "</p>",
    ]);
} /*
 * Load jQuery
 */
add_action("wp_enqueue_scripts", "roach_load_jquery");
function roach_load_jquery()
{
    if (!is_admin() && !current_user_can("manage_options")) {
        $roach_jquery_options = get_theme_mod("roach_jquery_options");
        if ($roach_jquery_options) {
            wp_deregister_script("jquery");
            if ($roach_jquery_options == 1) {
                wp_register_script(
                    "jquery",
                    "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js",
                    true
                );
                wp_enqueue_script("jquery");
            }
        }
    }
}
/*
 * Move scripts to footer
 */ function roach_move_scripts_from_head_to_footer()
{
    if (get_theme_mod("roach_enable_js_defer") && !is_admin()) {
        remove_action("wp_head", "wp_print_scripts");
        remove_action("wp_head", "wp_print_head_scripts", 9);
        add_action("wp_footer", "wp_print_scripts", 5);
        add_action("wp_footer", "wp_print_head_scripts", 5);
    }
}
add_action("wp_enqueue_scripts", "roach_move_scripts_from_head_to_footer"); /*
 * Load JS scripts
 */
function roach_load_scripts()
{
    if (get_theme_mod("roach_jquery_options") == 2) {
        wp_register_script(
            "load_roach_scripts",
            get_template_directory_uri() . "/assets/js/roach.vanilla.min.js",
            false,
            "01040122",
            true
        );
    } else {
        wp_register_script(
            "load_roach_scripts",
            get_template_directory_uri() . "/assets/js/roach.min.js",
            ["jquery"],
            "01040122",
            true
        );
    }
    wp_enqueue_script("load_roach_scripts");
    if (
        get_theme_mod("roach_no_sticky_header") &&
        !get_theme_mod("roach_float_menu")
    ):
        wp_register_script(
            "load_roach_menu",
            get_template_directory_uri() . "/assets/js/menu.min.js",
            ["jquery"],
            "3.7.4",
            true
        );
        wp_enqueue_script("load_roach_menu");
    endif;
}
add_action("wp_enqueue_scripts", "roach_load_scripts"); /*
 * Remove emojis from header
 */
remove_action("wp_print_styles", "print_emoji_styles");
remove_action("wp_head", "print_emoji_detection_script", 7); /*
 * Schema Navigation
 */
add_filter("nav_menu_link_attributes", "roach_add_menu_attributes", 10, 3);
function roach_add_menu_attributes($atts, $item, $args)
{
    $atts["itemprop"] = "url";
    return $atts;
} /*
 * Default settings
 */
function get_columns()
{
    $columns = get_theme_mod("roach_columns");
    if (!$columns):
        $columns = 3;
    endif;
    if (get_theme_mod("roach_show_post_category")) {
        $show_category = true;
    } else {
        $show_category = false;
    }
    if (get_theme_mod("roach_show_date_loop")) {
        $show_date_loop = true;
    } else {
        $show_date_loop = false;
    }
    if (get_theme_mod("roach_show_post_extract")) {
        $show_extract = true;
    } else {
        $show_extract = false;
    }
    $thumb_width = get_theme_mod("roach_thumb_width");
    if (!$thumb_width):
        $thumb_width = 400;
    endif;
    $thumb_height = get_theme_mod("roach_thumb_height");
    if (!$thumb_height):
        $thumb_height = 267;
    endif;
    $text_show_more = get_theme_mod("roach_text_button_more");
    $deactivate_background = get_theme_mod("roach_deactivate_background");
    set_query_var("columns", $columns);
    set_query_var("show_category", $show_category);
    set_query_var("show_date_loop", $show_date_loop);
    set_query_var("show_extract", $show_extract);
    set_query_var("text_show_more", $text_show_more);
    set_query_var("deactivate_background", $deactivate_background);
    set_query_var("thumb_width", $thumb_width);
    set_query_var("thumb_height", $thumb_height);
}
function roach_data_images()
{
    $deactivate_background = get_theme_mod("roach_deactivate_background");
    $thumb_width = get_theme_mod("roach_thumb_width");
    if (!$thumb_width):
        $thumb_width = 400;
    endif;
    $thumb_height = get_theme_mod("roach_thumb_height");
    if (!$thumb_height):
        $thumb_height = 267;
    endif;
    $side_thumb_width = get_theme_mod("roach_side_thumb_width");
    if (!$side_thumb_width):
        $side_thumb_width = 300;
    endif;
    $side_thumb_height = get_theme_mod("roach_side_thumb_height");
    if (!$side_thumb_height):
        $side_thumb_height = 140;
    endif;
    set_query_var("deactivate_background", $deactivate_background);
    set_query_var("thumb_width", $thumb_width);
    set_query_var("thumb_height", $thumb_height);
    set_query_var("side_thumb_width", $side_thumb_width);
    set_query_var("side_thumb_height", $side_thumb_height);
} /*
 * Loop extract
 */
add_filter("excerpt_length", "roach_extract", 999);
function roach_extract($length)
{
    $extract_long = get_theme_mod("roach_extract_long");
    if (!$extract_long):
        $extract_long = 12;
    endif;
    if (is_admin()):
        return $length;
    endif;
    return $extract_long;
}
add_filter("excerpt_more", "roach_extract_text");
function roach_extract_text($more)
{
    global $post;
} /*
 * Remove texturize
 */
remove_filter("the_content", "wptexturize");
remove_filter("the_excerpt", "wptexturize");
remove_filter("comment_text", "wptexturize");
remove_filter("the_title", "wptexturize"); /*
 * Gutenberg
 */
add_action("after_setup_theme", "roach_theme_supported_features");
function roach_theme_supported_features()
{
    add_theme_support("align-wide");
}
add_filter("user_contactmethods", "roach_user_social");
function roach_user_social($user_contact)
{
    $user_contact["author_fb"] = "Facebook";
    $user_contact["author_tw"] = "Twitter";
    $user_contact["author_ig"] = "Instagram";
    $user_contact["author_pin"] = "Pinterest";
    $user_contact["author_yt"] = "YouTube";
    return $user_contact;
} /* Lazy Load  */
add_filter("the_content", "lazyvideo");
function lazyvideo($content)
{
    $content = str_replace("<iframe", '<iframe loading="lazy"', $content);
    return $content;
}
add_filter("the_content", "lazyimg");
function lazyimg($content)
{
    $content = str_replace("<img", '<img loading="lazy"', $content);
    return $content;
} /*
 * Performance
 */
add_action("widgets_init", "roach_delete_css_recentcomments");
function roach_delete_css_recentcomments()
{
    global $wp_widget_factory;
    remove_action("wp_head", [
        $wp_widget_factory->widgets["WP_Widget_Recent_Comments"],
        "recent_comments_style",
    ]);
}
if (get_theme_mod("roach_delete_guten_css")) {
    add_filter("use_block_editor_for_post", "__return_false", 100);
    add_filter("gutenberg_use_widgets_block_editor", "__return_false");
    add_filter("use_widgets_block_editor", "__return_false");
    add_action("wp_enqueue_scripts", "roach_delete_gutenberg_css", 100);
    function roach_delete_gutenberg_css()
    {
        wp_dequeue_style("wp-block-library");
    }
}
add_filter("body_class", "roach_body_class", 10, 2);
function roach_body_class($wp_classes, $extra_classes)
{
    $blacklist = [
        "blog",
        "single",
        "page",
        "tag",
        "post-template-default",
        "page-template-default",
        "single",
        "single-post",
        "single-format-standard",
        "wp-custom-logo",
        "no-customize-support",
    ];
    $wp_classes = array_diff($wp_classes, $blacklist);
    return array_merge($wp_classes, (array) $extra_classes);
}
add_action("init", "roach_disable_embeds_code_init", 9999);
function roach_disable_embeds_code_init()
{
    if (get_theme_mod("roach_disable_embed")):
        remove_action("rest_api_init", "wp_oembed_register_route");
        add_filter("embed_oembed_discover", "__return_false");
        remove_filter("oembed_dataparse", "wp_filter_oembed_result", 10);
        remove_action("wp_head", "wp_oembed_add_discovery_links");
        remove_action("wp_head", "wp_oembed_add_host_js");
        remove_filter("pre_oembed_result", "wp_filter_pre_oembed_result", 10);
    endif;
}
function roach_heartbeat_limit($settings)
{
    if (get_theme_mods("roach_limit_heartbeat")) {
        $settings["interval"] = 60;
    } else {
        $settings["interval"] = 15;
    }
    return $settings;
}
add_filter(
    "heartbeat_settings",

    "roach_heartbeat_limit"
);
/*
 * Extra Text Category
 */ add_filter("category_edit_form_fields", "roach_cat_description", 99);
add_action("edited_category", "roach_save_extra_category_fields");
function roach_cat_description($tag)
{
    $cat_extra_description = get_term_meta(
        $tag->term_id,
        "cat_extra_description",
        true
    ); ?>
  <table class="form-table">
    <tr class="form-field">
      <th scope="row" valign="top">
        <label for="description"><?php _e(
            "Bottom Description",
            "roach"
        ); ?></label>
      </th>
      <td>
        <?php
        $settings = [
            "wpautop" => true,
            "media_buttons" => true,
            "quicktags" => true,
            "textarea_rows" => "15",
            "textarea_name" => "cat_extra_description",
            "drag_drop_upload" => true,
        ];
        wp_editor(
            wp_kses_post($cat_extra_description, ENT_QUOTES, "UTF-8"),
            "cat_extra_description",
            $settings
        );
        ?>
        <br />
        <span class="description"><?php _e(
            "This description will be displayed below the list of entries.",
            "roach"
        ); ?></span>
      </td>
    </tr>
  </table><?php
}
function roach_save_extra_category_fields($term_id)
{
    if (isset($_POST["cat_extra_description"])) {
        update_term_meta(
            $_POST["tag_ID"],
            "cat_extra_description",
            $_POST["cat_extra_description"]
        );
    }
}
/*
 * WooCommerce
 */ add_action(
    "after_setup_theme",

    "roach_woocommerce_support"
);
function roach_woocommerce_support()
{
    add_theme_support("woocommerce");
}
require get_template_directory() . "/inc/wc.php"; /*
 * Home text
 */

function roach_show_home_text_before()
{
    $paged = get_query_var("paged") ? get_query_var("paged") : 1;
    $roach_home_text_before = get_theme_mod("roach_home_text_before");
    if ($roach_home_text_before && $paged == 1 && is_front_page()): ?>

    <div class="content-home-text">

      <?php echo apply_filters("the_content", $roach_home_text_before); ?>

    </div>

  <?php endif;?>

  <?php
}
function roach_show_home_text_after()
{
    $paged = get_query_var("paged") ? get_query_var("paged") : 1;
    $roach_home_text = get_theme_mod("roach_home_text");
    if ($roach_home_text && $paged == 1 && is_front_page()): ?>

    <div class="content-home-text">

      <?php echo apply_filters("the_content", $roach_home_text); ?>

    </div>

  <?php endif;?>

  <?php
}
/*
 * Video Responsive
 */ add_filter("embed_oembed_html", "wpse_embed_oembed_html", 99, 4);
function wpse_embed_oembed_html($cache, $url, $attr, $post_ID)
{
    $classes = [];
    $classes_all = ["responsive"];
    if (false !== strpos($url, "vimeo.com")) {
        $classes[] = "vimeo";
    }
    if (false !== strpos($url, "youtube.com")) {
        $classes[] = "youtube";
    }
    $classes = array_merge($classes, $classes_all);
    return '<div class="' .
        esc_attr(implode(" ", $classes)) .
        '">' .
        $cache .
        "</div>";
} /*
 * Remove Yoast SEO breadcrumb Schema
 */
if (class_exists("WPSEO_Options") && !get_theme_mod("roach_hide_breadcrumb")) {
    add_filter(
        "wpseo_schema_breadcrumb",

        "__return_false"
    );
} /*
 * Speed up WordPress admin area
 */
if (get_theme_mod("roach_optimize_admin_area")) {
    add_filter("postmeta_form_keys", function () {
        return [];
    });
    add_filter("media_library_months_with_files", function () {
        return [];
    });
    add_filter("media_library_show_audio_playlist", function () {
        return false;
    });
    add_filter("media_library_show_video_playlist", function () {
        return false;
    });
    if (is_admin()) {
        remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
    }
    add_action("admin_init", "remove_dashboard_meta");
    function remove_dashboard_meta()
    {
        remove_meta_box("dashboard_incoming_links", "dashboard", "normal");
        remove_meta_box("dashboard_plugins", "dashboard", "normal");
        remove_meta_box("dashboard_primary", "dashboard", "normal");
        remove_meta_box("dashboard_secondary", "dashboard", "normal");
        remove_meta_box("dashboard_quick_press", "dashboard", "side");
        remove_meta_box("dashboard_recent_drafts", "dashboard", "side");
        remove_meta_box("dashboard_recent_comments", "dashboard", "normal");
        remove_meta_box("rg_forms_dashboard", "dashboard", "normal");
        remove_meta_box("dashboard_site_health", "dashboard", "normal");
    }
}
/*
 * Number of comments
 */ function roach_comments_count()
{
    $comment_count_title = get_theme_mod("roach_comment_count_title");
    if ($comment_count_title) { ?>

    <p><?php echo get_comments_number(
        get_the_ID()
    ); ?> <?php echo $comment_count_title; ?></p>

    <?php }
}
function roach_disable_header()
{
    $disable_header = false;
    $disable_single_header = get_post_meta(
        get_the_ID(),
        "disable_header",
        true
    );
    if (get_theme_mod("roach_disable_header") || $disable_single_header) {
        $disable_header = true;
    }
    return $disable_header;
}
function roach_disable_footer()
{
    $disable_footer = false;
    $disable_single_footer = get_post_meta(
        get_the_ID(),
        "disable_footer",
        true
    );
    if (get_theme_mod("roach_disable_footer") || $disable_single_footer) {
        $disable_footer = true;
    }
    return $disable_footer;
}
/*
 * Optimize YouTube videos
 */ function roach_optimize_video($str, $data, $url)
{
    if (get_theme_mod("roach_optimize_youtube")) {
        if (
            ($yt = $data->provider_name == "YouTube") ||
            ($vm = $data->provider_name == "Vimeo")
        ) {
            if ($yt) {
                $html = str_replace(
                    "feature=oembed",
                    "feature=oembed&autoplay=1",
                    $str
                );
            } else {
                $html = str_replace('" width=', '?autoplay=1" width=', $str);
            }
            $html = htmlentities($html, ENT_QUOTES);
            $img = $data->thumbnail_url;
            $title = esc_attr($data->title);
            return '<div onclick="this.outerHTML=\'' .
                $html .
                '\'"><img src="' .
                $img .
                '"  title="' .
                $title .
                '" class="roach-oembed"></div>';
        }
    }
    return $str;
}
add_filter("oembed_dataparse", "roach_optimize_video", 10, 3);
function roach_clean_cache_menu($wp_admin_bar)
{
    if (!empty($_SERVER["REQUEST_URI"])) {
        $referer = filter_var(
            wp_unslash($_SERVER["REQUEST_URI"]),
            FILTER_SANITIZE_URL
        );
        $referer =
            "&_wp_http_referer=" .
            rawurlencode(remove_query_arg("fl_builder", $referer));
    } else {
        $referer = "";
    }
    $wp_admin_bar->add_menu([
        "id" => "clean-cache-roach",
        "title" => __("Clean Youtube Cache", "roach"),
        "href" => wp_nonce_url(
            admin_url("admin-post.php?action=clean_cache_roach" . $referer)
        ),
    ]);
}
add_action("admin_bar_menu", "roach_clean_cache_menu", 100);
function do_admin_post_clean_cache_roach()
{
    if ($_GET["_wpnonce"] && $_GET["action"] == "clean_cache_roach") {
        global $wpdb;
        $wpdb->query(
            "DELETE FROM $wpdb->postmeta WHERE meta_key LIKE '_oembed%'"
        );
        wp_safe_redirect(esc_url_raw(wp_get_referer()));
        die();
    }
}
add_action("admin_post_clean_cache_roach", "do_admin_post_clean_cache_roach");
/*
 * Ads functions
 */ function roach_show_ads($place)
{
    $cats = roach_categories();
    $show_ads = get_theme_mod("roach_show_ads");
    $hide_ads = get_post_meta(get_the_ID(), "hide_ads", true); /*
     * Single and Page before content
     */
    if ($place == 1 && $show_ads && !$hide_ads) {
        $ads_before = get_theme_mod("roach_ads_before");
        if ($ads_before):
            $ads_before_cat = get_theme_mod("roach_ads_before_cat");
            if (in_array($ads_before_cat, $cats) || !$ads_before_cat):
                $ads_before_style = get_theme_mod("roach_ads_before_style");
                $ads_before_type = get_theme_mod("roach_ads_before_type");
                $ads_before_device = get_theme_mod("roach_ads_before_device");
                $ads_before_margin = get_theme_mod("roach_ads_before_margin");
                $ads_before_style_margin = "";
                if (!$ads_before_style):
                    $ads_before_style = "ads-roach-aligncenter";
                endif;
                if (!$ads_before_type):
                    $ads_before_type = "2";
                endif;
                if ($ads_before_margin):
                    $ads_before_style_margin =
                        '" style="padding:' . $ads_before_margin . "px";
                endif;
                switch ($ads_before_device):
                    case 2:
                        $ads_before_style =
                            $ads_before_style . " ads-roach-desktop";
                        break;
                    case 3:
                        $ads_before_style =
                            $ads_before_style . " ads-roach-mobile";
                        break;
                endswitch;
                if (
                    (is_single() &&
                        ($ads_before_type == "1" || $ads_before_type == "2")) ||
                    (is_page() &&
                        ($ads_before_type == "1" || $ads_before_type == "3"))
                ): ?>

          <div class="ads-roach <?php echo $ads_before_style .
              $ads_before_style_margin; ?>">

            <?php echo $ads_before; ?>

          </div>

        <?php endif;
            endif;
        endif;
    } /*
     * Single and Page after content
     */
    if ($place == 2 && $show_ads && !$hide_ads) {
        $ads_after = get_theme_mod("roach_ads_after");

        if ($ads_after):
            $ads_after_cat = get_theme_mod("roach_ads_after_cat");
            if (in_array($ads_after_cat, $cats) || !$ads_after_cat):
                $ads_after_style = get_theme_mod("roach_ads_after_style");
                $ads_after_type = get_theme_mod("roach_ads_after_type");
                $ads_after_device = get_theme_mod("roach_ads_after_device");
                $ads_after_margin = get_theme_mod("roach_ads_after_margin");
                $ads_after_style_margin = "";
                if (!$ads_after_style):
                    $ads_after_style = "ads-roach-aligncenter";
                endif;
                if (!$ads_after_type):
                    $ads_after_type = "2";
                endif;
                if ($ads_after_margin):
                    $ads_after_style_margin =
                        '" style="padding:' . $ads_after_margin . "px";
                endif;
                switch ($ads_after_device):
                    case 2:
                        $ads_after_style =
                            $ads_after_style . " ads-roach-desktop";
                        break;
                    case 3:
                        $ads_after_style =
                            $ads_after_style . " ads-roach-mobile";
                        break;
                endswitch;
                if (
                    (is_single() &&
                        ($ads_after_type == "1" || $ads_after_type == "2")) ||
                    (is_page() &&
                        ($ads_after_type == "1" || $ads_after_type == "3"))
                ): ?>

          <div class="ads-roach <?php echo $ads_after_style .
              $ads_after_style_margin; ?>">

            <?php echo $ads_after; ?>

          </div>

        <?php endif;
            endif;
        endif;
    }
    /*
     * Sidebar before
     */ if ($place == 3 && $show_ads && !$hide_ads) {
        $ads_before_sidebar = get_theme_mod("roach_ads_before_sidebar");
        if ($ads_before_sidebar):
            $ads_before_sidebar_cat = get_theme_mod(
                "roach_ads_before_sidebar_cat"
            );
            if (
                in_array($ads_before_sidebar_cat, $cats) ||
                !$ads_before_sidebar_cat
            ):
                $ads_before_sidebar_device = get_theme_mod(
                    "roach_ads_before_sidebar_device"
                );
                $ads_before_sidebar_style = "";
                switch ($ads_before_sidebar_device):
                    case 2:
                        $ads_before_sidebar_style = "ads-roach-desktop";
                        break;
                    case 3:
                        $ads_before_sidebar_style = "ads-roach-mobile";
                        break;
                endswitch;
                $show_home = get_theme_mod(
                    "roach_ads_before_sidebar_show_home"
                );
                $show_cats = get_theme_mod(
                    "roach_ads_before_sidebar_show_cats"
                );
                $show_tags = get_theme_mod(
                    "roach_ads_before_sidebar_show_tags"
                );
                $show_posts = get_theme_mod(
                    "roach_ads_before_sidebar_show_posts"
                );
                $show_pages = get_theme_mod(
                    "roach_ads_before_sidebar_show_pages"
                );
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags) ||
                    (is_single() && $show_posts) ||
                    (is_page() && $show_pages)
                ): ?>

          <div class="ads-roach ads-roach-aligncenter <?php echo $ads_before_sidebar_style; ?>">

            <?php echo $ads_before_sidebar; ?>

          </div>

        <?php endif;
            endif;
        endif;
    }
    /*
     * Sidebar after
     */ if ($place == 4 && $show_ads && !$hide_ads) {
        $ads_after_sidebar = get_theme_mod("roach_ads_after_sidebar");
        if ($ads_after_sidebar):
            $ads_after_sidebar_cat = get_theme_mod(
                "roach_ads_after_sidebar_cat"
            );
            if (
                in_array($ads_after_sidebar_cat, $cats) ||
                !$ads_after_sidebar_cat
            ):
                $ads_after_sidebar_device = get_theme_mod(
                    "roach_ads_after_sidebar_device"
                );
                $ads_after_sidebar_style = "";
                switch ($ads_after_sidebar_device):
                    case 2:
                        $ads_after_sidebar_style = "ads-roach-desktop";
                        break;
                    case 3:
                        $ads_after_sidebar_style = "ads-roach-mobile";
                        break;
                endswitch;
                $show_home = get_theme_mod("roach_ads_after_sidebar_show_home");
                $show_cats = get_theme_mod("roach_ads_after_sidebar_show_cats");
                $show_tags = get_theme_mod("roach_ads_after_sidebar_show_tags");
                $show_posts = get_theme_mod(
                    "roach_ads_after_sidebar_show_posts"
                );
                $show_pages = get_theme_mod(
                    "roach_ads_after_sidebar_show_pages"
                );
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags) ||
                    (is_single() && $show_posts) ||
                    (is_page() && $show_pages)
                ): ?>

          <div class="ads-roach ads-roach-aligncenter <?php echo $ads_after_sidebar_style; ?> sticky">

            <?php echo $ads_after_sidebar; ?>

          </div>

        <?php endif;
            endif;
        endif;
    }
    /*
     * After header
     */ if ($place == 5 && $show_ads && !$hide_ads) {
        $ads_header = get_theme_mod("roach_ads_header");
        if ($ads_header):
            $ads_header_cat = get_theme_mod("roach_ads_header_cat");
            if (in_array($ads_header_cat, $cats) || !$ads_header_cat):
                $ads_header_device = get_theme_mod("roach_ads_header_device");
                $ads_header_margin = get_theme_mod("roach_ads_header_margin");
                $ads_header_style_margin = "";
                $ads_header_style = "";
                if ($ads_header_margin):
                    $ads_header_style_margin =
                        '" style="padding:' . $ads_header_margin . "px";
                endif;
                switch ($ads_header_device):
                    case 2:
                        $ads_header_style = "ads-roach-desktop";
                        break;
                    case 3:
                        $ads_header_style = "ads-roach-mobile";
                        break;
                endswitch;
                $show_home = get_theme_mod("roach_ads_header_show_home");
                $show_cats = get_theme_mod("roach_ads_header_show_cats");
                $show_tags = get_theme_mod("roach_ads_header_show_tags");
                $show_posts = get_theme_mod("roach_ads_header_show_posts");
                $show_pages = get_theme_mod("roach_ads_header_show_pages");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags) ||
                    (is_single() && $show_posts) ||
                    (is_page() && $show_pages)
                ): ?>

          <div class="ads-roach ads-roach-top ads-roach-aligncenter <?php echo $ads_header_style .
              $ads_header_style_margin; ?>">

            <?php echo $ads_header; ?>

          </div>

        <?php endif;
            endif;
        endif;
    } /*
     * Single and Page before featured image
     */
    if ($place == 6 && $show_ads && !$hide_ads) {
        $ads_before_image = get_theme_mod("roach_ads_before_image");
        if ($ads_before_image):
            $ads_before_image_cat = get_theme_mod("roach_ads_before_image_cat");
            if (
                in_array($ads_before_image_cat, $cats) ||
                !$ads_before_image_cat
            ):
                $ads_before_image_style = get_theme_mod(
                    "roach_ads_before_image_style"
                );
                $ads_before_image_type = get_theme_mod(
                    "roach_ads_before_image_type"
                );
                $ads_before_image_device = get_theme_mod(
                    "roach_ads_before_image_device"
                );
                $ads_before_image_margin = get_theme_mod(
                    "roach_ads_before_image_margin"
                );
                $ads_before_image_style_margin = "";
                if (!$ads_before_image_style):
                    $ads_before_image_style = "ads-roach-aligncenter";
                endif;
                if (!$ads_before_image_type):
                    $ads_before_image_type = "2";
                endif;
                if ($ads_before_image_margin):
                    $ads_before_image_style_margin =
                        '" style="padding:' . $ads_before_image_margin . "px";
                endif;
                switch ($ads_before_image_device):
                    case 2:
                        $ads_before_image_style =
                            $ads_before_image_style . " ads-roach-desktop";
                        break;
                    case 3:
                        $ads_before_image_style =
                            $ads_before_image_style . " ads-roach-mobile";
                        break;
                endswitch;
                if (
                    (is_single() &&
                        ($ads_before_image_type == "1" ||
                            $ads_before_image_type == "2")) ||
                    (is_page() &&
                        ($ads_before_image_type == "1" ||
                            $ads_before_image_type == "3"))
                ): ?>

          <div class="ads-roach <?php echo $ads_before_image_style .
              $ads_before_image_style_margin; ?>">

            <?php echo $ads_before_image; ?>

          </div>

    <?php endif;
            endif;
        endif;
    }
}
/*
 * Show author
 */ function roach_show_author()
{
    if (
        (get_theme_mod("roach_show_author") && is_single()) ||
        (get_theme_mod("roach_show_author_page") && is_page())
    ): ?>

    <div class="content-author">

      <div class="author-image">
        <?php echo get_avatar(get_the_author_meta("ID"), 80); ?>
      </div>

      <div class="author-desc">
        <p>
          <?php if (
              is_single() &&
              !get_theme_mod("roach_deactivate_author_link")
          ) { ?>
            <a href="<?php echo get_author_posts_url(
                get_the_author_meta("ID")
            ); ?>">
              <?php the_author(); ?>
            </a>
          <?php } else { ?>
            <span class="roach-author"><?php the_author(); ?></span>
          <?php } ?>
        </p>
        <p>
          <?php if (
              (get_theme_mod("roach_show_date_single") && is_single()) ||
              (get_theme_mod("roach_show_date_page") && is_page())
          ):
              $post_date = get_the_date("d/m/Y");
              $post_modified = get_the_modified_date("d/m/Y");

              echo $post_date;
              if ($post_date != $post_modified) {
                  echo '<span class="roach-post-update"> - Actualizado: ' .
                      $post_modified .
                      "</span>";
              }
          endif; ?>
        </p>
      </div>

    </div>

  <?php elseif (
        (get_theme_mod("roach_show_date_single") && is_single()) ||
        (get_theme_mod("roach_show_date_page") && is_page())
    ): ?>

    <div class="show-date">

      <p>
        <?php
        $post_date = get_the_date("d/m/Y");
        $post_modified = get_the_modified_date("d/m/Y");
        echo $post_date;
        if ($post_date != $post_modified) {
            echo '<span class="roach-post-update"> - Actualizado: ' .
                $post_modified .
                "</span>";
        }
        ?>
      </p>

    </div>

  <?php endif;
}
function roach_show_author_box()
{
    if (
        (get_theme_mod("roach_show_box_author") && is_single()) ||
        (get_theme_mod("roach_show_box_author_page") && is_page())
    ):

        $author_tw = get_the_author_meta("author_tw");
        $author_fb = get_the_author_meta("author_fb");
        $author_ig = get_the_author_meta("author_ig");
        $author_pin = get_the_author_meta("author_pin");
        $author_yt = get_the_author_meta("author_yt");
        ?>

    <div class="author-box">

      <div class="author-box-avatar">

        <?php echo get_avatar(get_the_author_meta("email"), "80"); ?>

      </div>

      <div class="author-box-info">

        <?php if (
            is_single() &&
            !get_theme_mod("roach_deactivate_author_link")
        ) { ?>
          <p class="author-box-name"><a href="<?php echo get_author_posts_url(
              get_the_author_meta("ID")
          ); ?>"><?php the_author(); ?></a></p>
        <?php } else { ?>
          <p class="author-box-name"><?php the_author(); ?></p>
        <?php } ?>

        <p class="author-box-desc"><?php the_author_meta("description"); ?></p>

        <?php if (
            $author_fb ||
            $author_tw ||
            $author_ig ||
            $author_pin ||
            $author_yt
        ): ?>

          <div class="author-box-social">

            <?php if ($author_fb): ?>

              <a href="<?php echo $author_fb; ?>" class="roach-icon icon-facebook" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg></a>

            <?php endif; ?>

            <?php if ($author_tw): ?>

              <a href="<?php echo $author_tw; ?>" class="roach-icon icon-twitter" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                </svg></a>

            <?php endif; ?>

            <?php if ($author_ig): ?>

              <a href="<?php echo $author_ig; ?>" class="roach-icon icon-instagram" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <rect x="4" y="4" width="16" height="16" rx="4" />
                  <circle cx="12" cy="12" r="3" />
                  <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                </svg></a>

            <?php endif; ?>

            <?php if ($author_pin): ?>

              <a href="<?php echo $author_pin; ?>" class="roach-icon icon-pinterest" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <line x1="8" y1="20" x2="12" y2="11" />
                  <path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" />
                  <circle cx="12" cy="12" r="9" />
                </svg></a>

            <?php endif; ?>

            <?php if ($author_yt): ?>

              <a href="<?php echo $author_yt; ?>" class="roach-icon icon-youtube" target="_blank" rel="nofollow noopener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <rect x="3" y="5" width="18" height="14" rx="4" />
                  <path d="M10 9l5 3l-5 3z" />
                </svg></a>

            <?php endif; ?>

          </div>

        <?php endif; ?>

      </div>

    </div>

    <?php
    endif;
}
/*
 * Tags in pages
 */ function roach_tags_support()
{
    if (get_theme_mod("roach_enable_tags_page")) {
        register_taxonomy_for_object_type("post_tag", "page");
    }
}
function roach_tags_support_query($wp_query)
{
    if (get_theme_mod("roach_enable_tags_page")) {
        if ($wp_query->get("tag")) {
            $wp_query->set(
                "post_type",

                "any"
            );
        }
    }
}
add_action("init", "roach_tags_support");
add_action(
    "pre_get_posts",

    "roach_tags_support_query"
); /*
 * Remove Global Gutenberg Styles
 */
add_action(
    "wp_enqueue_scripts",

    "roach_delete_global_styles"
);
function roach_delete_global_styles()
{
    if (get_theme_mod("roach_remove_global_styles")) {
        wp_dequeue_style("global-styles");
    }
}
function roach_show_ads_loop($count)
{
    $show_ads = get_theme_mod("roach_show_ads");
    if ($show_ads) {
        $ads_loop_1 = get_theme_mod("roach_ads_loop_1");
        $ads_loop_2 = get_theme_mod("roach_ads_loop_2");
        $ads_loop_3 = get_theme_mod("roach_ads_loop_3");
        $ads_loop_4 = get_theme_mod("roach_ads_loop_4");
        $ads_loop_5 = get_theme_mod("roach_ads_loop_5");
        $columns = get_theme_mod("roach_columns");
        if (!$columns) {
            $columns = 3;
        }
        if ($ads_loop_1) {
            $ads_loop_1_place = get_theme_mod("roach_ads_loop_1_place");
            if (!$ads_loop_1_place) {
                $ads_loop_1_place = 1;
            }
            $show = $ads_loop_1_place * $columns;
            if ($count == $show) {
                $show_home = get_theme_mod("roach_ads_loop_1_show_home");
                $show_cats = get_theme_mod("roach_ads_loop_1_show_cats");
                $show_tags = get_theme_mod("roach_ads_loop_1_show_tags");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags)
                ) {

                    $ads_loop_1_device = get_theme_mod(
                        "roach_ads_loop_1_device"
                    );
                    $ads_loop_1_style = "";
                    if ($ads_loop_1_device == 2) {
                        $ads_loop_1_style = "ads-roach-desktop";
                    } elseif ($ads_loop_1_device == 3) {
                        $ads_loop_1_style = "ads-roach-mobile";
                    }
                    ?>

          <div class="ads-roach ads-roach-aligncenter ads-roach-loop <?php echo $ads_loop_1_style; ?>">

            <?php echo apply_filters("the_content", $ads_loop_1); ?>

          </div>

        <?php
                }
            }
        }
        if ($ads_loop_2) {
            $ads_loop_2_place = get_theme_mod("roach_ads_loop_2_place");
            if (!$ads_loop_2_place) {
                $ads_loop_2_place = 1;
            }
            $show = $ads_loop_2_place * $columns;
            if ($count == $show) {
                $show_home = get_theme_mod("roach_ads_loop_2_show_home");
                $show_cats = get_theme_mod("roach_ads_loop_2_show_cats");
                $show_tags = get_theme_mod("roach_ads_loop_2_show_tags");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags)
                ) {

                    $ads_loop_2_device = get_theme_mod(
                        "roach_ads_loop_2_device"
                    );
                    $ads_loop_2_style = "";
                    if ($ads_loop_2_device == 2) {
                        $ads_loop_2_style = "ads-roach-desktop";
                    } elseif ($ads_loop_2_device == 3) {
                        $ads_loop_2_style = "ads-roach-mobile";
                    }
                    ?>

          <div class="ads-roach ads-roach-aligncenter ads-roach-loop <?php echo $ads_loop_2_style; ?>">

            <?php echo apply_filters("the_content", $ads_loop_2); ?>

          </div>

        <?php
                }
            }
        }
        if ($ads_loop_3) {
            $ads_loop_3_place = get_theme_mod("roach_ads_loop_3_place");
            if (!$ads_loop_3_place) {
                $ads_loop_3_place = 1;
            }
            $show = $ads_loop_3_place * $columns;
            if ($count == $show) {
                $show_home = get_theme_mod("roach_ads_loop_3_show_home");
                $show_cats = get_theme_mod("roach_ads_loop_3_show_cats");
                $show_tags = get_theme_mod("roach_ads_loop_3_show_tags");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags)
                ) {

                    $ads_loop_3_device = get_theme_mod(
                        "roach_ads_loop_3_device"
                    );
                    $ads_loop_3_style = "";
                    if ($ads_loop_3_device == 2) {
                        $ads_loop_3_style = "ads-roach-desktop";
                    } elseif ($ads_loop_3_device == 3) {
                        $ads_loop_3_style = "ads-roach-mobile";
                    }
                    ?>

          <div class="ads-roach ads-roach-aligncenter ads-roach-loop <?php echo $ads_loop_3_style; ?>">

            <?php echo apply_filters("the_content", $ads_loop_3); ?>

          </div>

        <?php
                }
            }
        }
        if ($ads_loop_4) {
            $ads_loop_4_place = get_theme_mod("roach_ads_loop_4_place");
            if (!$ads_loop_4_place) {
                $ads_loop_4_place = 1;
            }
            $show = $ads_loop_4_place * $columns;
            if ($count == $show) {
                $show_home = get_theme_mod("roach_ads_loop_4_show_home");
                $show_cats = get_theme_mod("roach_ads_loop_4_show_cats");
                $show_tags = get_theme_mod("roach_ads_loop_4_show_tags");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags)
                ) {

                    $ads_loop_4_device = get_theme_mod(
                        "roach_ads_loop_4_device"
                    );
                    $ads_loop_4_style = "";
                    if ($ads_loop_4_device == 2) {
                        $ads_loop_4_style = "ads-roach-desktop";
                    } elseif ($ads_loop_4_device == 3) {
                        $ads_loop_4_style = "ads-roach-mobile";
                    }
                    ?>

          <div class="ads-roach ads-roach-aligncenter ads-roach-loop <?php echo $ads_loop_4_style; ?>">

            <?php echo apply_filters("the_content", $ads_loop_4); ?>

          </div>

        <?php
                }
            }
        }
        if ($ads_loop_5) {
            $ads_loop_5_place = get_theme_mod("roach_ads_loop_5_place");
            if (!$ads_loop_5_place) {
                $ads_loop_5_place = 1;
            }
            $show = $ads_loop_5_place * $columns;
            if ($count == $show) {
                $show_home = get_theme_mod("roach_ads_loop_5_show_home");
                $show_cats = get_theme_mod("roach_ads_loop_5_show_cats");
                $show_tags = get_theme_mod("roach_ads_loop_5_show_tags");
                if (
                    (is_home() && $show_home) ||
                    (is_category() && $show_cats) ||
                    (is_tag() && $show_tags)
                ) {

                    $ads_loop_5_device = get_theme_mod(
                        "roach_ads_loop_5_device"
                    );
                    $ads_loop_5_style = "";
                    if ($ads_loop_5_device == 2) {
                        $ads_loop_5_style = "ads-roach-desktop";
                    } elseif ($ads_loop_5_device == 3) {
                        $ads_loop_5_style = "ads-roach-mobile";
                    }
                    ?>

          <div class="ads-roach ads-roach-aligncenter ads-roach-loop <?php echo $ads_loop_5_style; ?>">

            <?php echo apply_filters("the_content", $ads_loop_5); ?>

          </div>

  <?php
                }
            }
        }
    }
} /*
 * Dynamic Last Paragraph
 */
function roach_show_dynamic_single()
{
    if (get_theme_mod("roach_show_last_paragraph_single")) {
        $tit = "<strong>" . get_the_title() . "</strong>";
        $cats = get_the_category();
        $cat =
            '<a href="' .
            esc_url(get_category_link($cats[0]->term_id)) .
            '"><strong>' .
            esc_html($cats[0]->name) .
            "</strong></a>";
        $tag = "";
        $tags = get_the_tags(get_the_ID());
        if (isset($tags[0]->term_id)) {
            $tag =
                '<a href="' .
                esc_url(get_tag_link($tags[0]->term_id)) .
                '"><strong>' .
                esc_html($tags[0]->name) .
                "</strong></a>";
        }

        $year = date("Y");
        $str = get_theme_mod("roach_last_paragraph_single");
        if (!$str) {
            $str =
                "If you want to know other articles similar to %%title%% you can visit the category %%category%%.";
        }
        $message = str_replace(
            ["%%title%%", "%%category%%", "%%tag%%", "%%currentyear%%"],
            [$tit, $cat, $tag, $year],
            $str
        );
        echo "<p>" . $message . "</p>";
    }
}
function roach_show_dynamic_page()
{
    if (get_theme_mod("roach_show_last_paragraph_page")) {
        $tag = "";
        $tags = get_the_tags(get_the_ID());
        $tit = "<strong>" . get_the_title() . "</strong>";
        if (isset($tags[0]->term_id)) {
            $tag =
                '<a href="' .
                esc_url(get_tag_link($tags[0]->term_id)) .
                '"><strong>' .
                esc_html($tags[0]->name) .
                "</strong></a>";
        }

        $year = date("Y");
        $str = get_theme_mod("roach_last_paragraph_page");
        if (!$str) {
            $str = "We hope you liked this article about %%title%%.";
        }
        $message = str_replace(
            ["%%title%%", "%%tag%%", "%%currentyear%%"],
            [$tit, $tag, $year],
            $str
        );
        echo "<p>" . $message . "</p>";
    }
}
/*
 * Custom codes
 */ add_action("wp_head", "roach_custom_code_header", 99);
function roach_custom_code_header()
{
    if (is_single() || is_page()) {
        global $post;
        $head_custom_code = get_post_meta($post->ID, "head_custom_code", true);
        if ($head_custom_code) {
            echo $head_custom_code;
        }
    }
}
add_action("wp_footer", "roach_custom_code_footer", 99);
function roach_custom_code_footer()
{
    if (is_single() || is_page()) {
        global $post;
        $foot_custom_code = get_post_meta($post->ID, "foot_custom_code", true);
        if ($foot_custom_code) {
            echo $foot_custom_code;
        }
    }
}
function roach_show_hero()
{
    global $post;
    $title = "<h1>" . get_the_title() . "</h1>";
    $subtitle =
        "<p>" . get_post_meta($post->ID, "subtitle_post", true) . "</p>";
    ?>

  <div class="roach-hero">

    <picture>

      <?php the_post_thumbnail("full", ["loading" => false]); ?>

    </picture>

    <div class="roach-hero-content">

      <?php
      echo $title;
      if ($subtitle) {
          echo $subtitle;
      }
      echo do_shortcode("[roach_search]");?>

    </div>

  </div>

<?php
} /*
 * Optimizer
 */

require get_template_directory() . "/inc/optimizer.php";
