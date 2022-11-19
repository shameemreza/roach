<?php

/*
 * Satinize function
*/

function sanitize_break($text)
{
  return addslashes($text);
}

function roach_sanitize_checkbox($checked)
{
  return ((isset($checked) && true == $checked) ? true : false);
}

function roach_sanitize_select($input, $setting)
{
  $input   = sanitize_key($input);
  $choices = $setting
    ->manager
    ->get_control($setting->id)->choices;
  return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function roach_sanitize_js_code($input)
{
  return base64_encode($input);
}

function roach_escape_js_output($input)
{
  return esc_textarea(base64_decode($input));
}

if (class_exists('WP_Customize_Control')) {
  class WP_Customize_Teeny_Control extends WP_Customize_Control
  {
    function __construct($manager, $id, $options)
    {
      parent::__construct($manager, $id, $options);

      global $num_customizer_teenies_initiated;
      $num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated) ? 1 : $num_customizer_teenies_initiated + 1;
    }
    function render_content()
    {
      global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
      $num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered) ? 1 : $num_customizer_teenies_rendered + 1;

      $value                           = $this->value();
?>


      <style>
        #customize-control-roach_ads_2,
        #customize-control-roach_ads_3,
        #customize-control-roach_ads_4,
        #customize-control-roach_ads_5,
        #customize-control-roach_ads_6,
        #customize-control-roach_ads_7,
        #customize-control-roach_ads_8,
        #customize-control-roach_ads_9,
        #customize-control-roach_ads_10,
        #customize-control-roach_show_last_single .customize-control-title,
        #customize-control-roach_ads_after_sidebar,
        #customize-control-roach_side_thumb_width .customize-control-title,
        #customize-control-roach_social_post_types .customize-control-title,
        #customize-control-roach_show_facebook,
        #customize-control-roach_content_type_options,
        #customize-control-roach_options_fonts .customize-control-title,
        #customize-control-roach_ads_before .customize-control-title,
        #customize-control-roach_home_text_before .customize-control-title {
          border-top: 2px solid #666;
          margin-top: 12px;
          padding-top: 16px;
        }

        #customize-control-roach_show_facebook:before {
          content: 'Selecciona las redes sociales';
        }

        #customize-control-roach_content_type_options:before {
          content: 'Cabeceras de seguridad';
        }

        #customize-control-roach_show_sidebar_single:before {
          content: 'Ubicación';
        }

        #customize-control-roach_show_last_single:before {
          content: 'Últimas entradas';
        }

        #customize-control-roach_optimize_analytics:before {
          content: 'JS';
        }

        #customize-control-roach_optimize_youtube:before {
          content: 'Medios';
        }

        #customize-control-roach_limit_heartbeat:before {
          content: 'Otros';
        }

        #customize-control-roach_minify_html:before {
          content: 'HTML';
        }

        #customize-control-roach_remove_global_styles:before {
          content: 'CSS';
        }

        #customize-control-roach_show_facebook:before,
        #customize-control-roach_content_type_options:before,
        #customize-control-roach_show_sidebar_single:before,
        #customize-control-roach_show_last_single:before,
        #customize-control-roach_optimize_analytics:before,
        #customize-control-roach_optimize_youtube:before,
        #customize-control-roach_optimize_fonts:before,
        #customize-control-roach_limit_heartbeat:before,
        #customize-control-roach_minify_html:before,
        #customize-control-roach_remove_global_styles:before {
          display: block;
          font-size: 14px;
          line-height: 1.75;
          font-weight: 600;
          margin-bottom: 10px;
          margin-top: 4px;
        }

        #customize-control-roach_options_fonts .customize-control-title {
          margin-bottom: 10px;
        }

        #customize-control-roach_show_sidebar_single,
        #customize-control-roach_show_sidebar_page,
        #customize-control-roach_show_sidebar_home,
        #customize-control-roach_show_sidebar_cat,
        #customize-control-roach_show_last_single,
        #customize-control-roach_show_last_page,
        #customize-control-roach_show_last_home,
        #customize-control-roach_show_last_cat,
        #customize-control-roach_show_facebook,
        #customize-control-roach_show_facebookm,
        #customize-control-roach_show_twitter,
        #customize-control-roach_show_pinterest,
        #customize-control-roach_show_whatsapp,
        #customize-control-roach_show_tumblr,
        #customize-control-roach_show_linkedin,
        #customize-control-roach_show_email,
        #customize-control-roach_show_telegram,
        #customize-control-roach_optimize_analytics,
        #customize-control-roach_jquery_footer,
        #customize-control-roach_optimize_youtube,
        #customize-control-roach_disable_embed,
        #customize-control-roach_optimize_fonts,
        #customize-control-roach_limit_heartbeat,
        #customize-control-roach_disable_jquery {
          margin-bottom: 0 !important;
        }

        #customize-control-roach_optimize_analytics,
        #customize-control-roach_optimize_youtube,
        #customize-control-roach_optimize_fonts,
        #customize-control-roach_limit_heartbeat,
        #customize-control-roach_remove_global_styles,
        #customize-control-roach_show_last_single:before,
        #customize-control-roach_ads_loop_2,
        #customize-control-roach_ads_loop_3,
        #customize-control-roach_ads_loop_4,
        #customize-control-roach_ads_loop_5 {
          border-top: 2px solid #666;
          margin-top: 6px;
          padding-top: 16px;
        }

        #customize-control-roach_ads_loop_1_show_home,
        #customize-control-roach_ads_loop_1_show_cats,
        #customize-control-roach_ads_loop_2_show_home,
        #customize-control-roach_ads_loop_2_show_cats,
        #customize-control-roach_ads_loop_3_show_home,
        #customize-control-roach_ads_loop_3_show_cats,
        #customize-control-roach_ads_loop_4_show_home,
        #customize-control-roach_ads_loop_4_show_cats,
        #customize-control-roach_ads_loop_5_show_home,
        #customize-control-roach_ads_loop_5_show_cats,
        #customize-control-roach_ads_header_show_home,
        #customize-control-roach_ads_header_show_cats,
        #customize-control-roach_ads_header_show_tags,
        #customize-control-roach_ads_header_show_posts,
        #customize-control-roach_ads_before_sidebar_show_home,
        #customize-control-roach_ads_before_sidebar_show_cats,
        #customize-control-roach_ads_before_sidebar_show_tags,
        #customize-control-roach_ads_before_sidebar_show_posts,
        #customize-control-roach_ads_after_sidebar_show_home,
        #customize-control-roach_ads_after_sidebar_show_cats,
        #customize-control-roach_ads_after_sidebar_show_tags,
        #customize-control-roach_ads_after_sidebar_show_posts {
          margin-bottom: 0;
        }
      </style>
      <label>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <input id="<?php echo $this->id ?>-link" class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea($value); ?>">
        <?php
        wp_editor($value, $this->id, ['textarea_name' => $this->id, 'media_buttons' => false, 'drag_drop_upload' => false, 'teeny' => true, 'quicktags' => false, 'textarea_rows' => 5, 'tinymce' => ['setup' => "function (editor) {
                  var cb = function () {
                    var linkInput = document.getElementById('$this->id-link')
                    linkInput.value = editor.getContent()
                    linkInput.dispatchEvent(new Event('change'))
                  }
                  editor.on('Change', cb)
                  editor.on('Undo', cb)
                  editor.on('Redo', cb)
                  editor.on('KeyUp', cb) // Remove this if it seems like an overkill
                }"]]);
        ?>
      </label>
    <?php
      if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated) do_action('admin_print_footer_scripts');
    }
  }

  class roach_Dropdown_Category_Control extends WP_Customize_Control
  {

    public $type          = 'dropdown-category';

    protected $dropdown_args = false;

    protected function render_content()
    {
    ?><label><?php
              $dropdown_args = wp_parse_args($this->dropdown_args, array(
                'taxonomy'                 => 'category',
                'show_option_none'        => __('Show in all categories', 'roach'),
                'selected'                 => $this->value(),
                'show_option_all'           => '',
                'orderby'                 => 'id',
                'order'                   => 'ASC',
                'hide_empty'                 => 1,
                'child_of'                 => 0,
                'exclude'                 => '',
                'hierarchical'              => 1,
                'depth'                   => 0,
                'tab_index'                 => 0,
                'hide_if_empty'              => false,
                'option_none_value'       => 0,
                'value_field'               => 'term_id',
              ));

              $dropdown_args['echo']               = false;

              $dropdown      = wp_dropdown_categories($dropdown_args);
              $dropdown      = str_replace('<select', '<select ' . $this->get_link(), $dropdown);
              echo $dropdown;

              ?></label><?php
                      }
                    }
                  }


                  function roach_customize_register($wp_customize)
                  {


                    /*
	 * General panel
	*/
                    $wp_customize->add_panel('custom_options', array(
                      'title' => __('Theme Options', 'roach'),
                      'priority' => 120,
                      'capability' => 'edit_theme_options',
                    ));


                    /*
	 * Ads options panel
	*/

                    $wp_customize->add_panel('custom_options_ads', array(
                      'title' => __('Advertising and Analytics Options', 'roach'),
                      'priority' => 120,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_settings', array(
                      'title' => __('Google Analytics and others', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_enable', array(
                      'title' => __('Enable Advertising', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_header', array(
                      'title' => __('Header', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_before', array(
                      'title' => __('Before the content', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_middle', array(
                      'title' => __('Half of the content', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_after', array(
                      'title' => __('After the content', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_inside', array(
                      'title' => __('Inside the content', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_sidebar', array(
                      'title' => __('On sidebar', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_ads_sec_loop', array(
                      'title' => __('On loops', 'roach'),
                      'panel' => 'custom_options_ads',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_setting('roach_show_ads', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_ads', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_enable',
                      'priority' => 1,
                      'label' => __('Activate advertising', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_code_analytics', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_code_analytics', array(
                      'label' => __('Code in ‹head›', 'roach'),
                      'description' => __('This code will be printed in the ‹head› section. Usage examples: Google Analytics, Search Console, Facebook Pixel', 'roach'),
                      'section' => 'roach_ads_settings',
                      'priority' => 1,
                      'type' => 'textarea',
                    ));

                    $wp_customize->add_setting('roach_body_code', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_body_code', array(
                      'label' => __('Code in ‹body›', 'roach'),
                      'description' => __('This code will be printed just below the opening ‹body› tag.', 'roach'),
                      'section' => 'roach_ads_settings',
                      'priority' => 1,
                      'type' => 'textarea',
                    ));

                    $wp_customize->add_setting('roach_footer_code', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_footer_code', array(
                      'label' => __('Code before ‹/body›', 'roach'),
                      'description' => __('This code will be printed above the closing ‹/body› tag.', 'roach'),
                      'section' => 'roach_ads_settings',
                      'priority' => 1,
                      'type' => 'textarea',
                    ));


                    $wp_customize->add_setting('roach_ads_1', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_1', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'type' => 'textarea',
                      'description' => __('Shortcode: [ads id=3]', 'roach'),
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_1_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_1_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_1_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_1_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_1_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_1_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_1_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_1_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_1_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_1_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_1_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_1_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_2', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_2', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=4]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_2_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_2_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_2_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_2_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_2_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_2_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_2_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_2_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_2_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_2_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_2_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_2_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_3', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_3', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=5]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_3_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_3_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_3_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_3_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_3_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_3_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_3_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_3_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_3_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_3_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_3_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_3_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_4', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_4', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=6]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_4_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_4_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_4_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_4_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_4_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_4_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_4_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_4_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_4_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_4_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_4_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_4_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_5', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_5', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=7]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_5_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_5_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_5_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_5_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_5_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_5_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_5_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_5_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_5_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_5_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_5_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_5_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_6', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_6', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=8]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_6_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_6_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_6_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_6_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_6_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_6_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_6_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_6_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_6_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_6_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_6_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_6_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_7', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_7', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=9]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_7_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_7_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_7_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_7_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_7_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_7_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_7_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_7_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_7_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_7_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_7_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_7_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_8', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_8', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=10]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_8_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_8_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_8_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_8_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_8_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_8_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_8_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_8_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_8_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_8_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_8_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_8_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_9', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_9', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=11]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_9_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_9_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_9_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_9_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_9_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_9_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_9_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_9_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_9_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_9_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_9_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_9_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_10', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_10', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=12]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_10_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After paragraph 1', 'roach'),
                      '2' => __('After paragraph 2', 'roach'),
                      '3' => __('After paragraph 3', 'roach'),
                      '4' => __('After paragraph 4', 'roach'),
                      '5' => __('After paragraph 5', 'roach'),
                      '6' => __('After paragraph 6', 'roach'),
                      '7' => __('After paragraph 7', 'roach'),
                      '8' => __('After paragraph 8', 'roach'),
                      '9' => __('After paragraph 9', 'roach'),
                      '10' => __('After paragraph 10', 'roach'),
                      '11' => __('After paragraph 11', 'roach'),
                      '12' => __('After paragraph 12', 'roach'),
                      '13' => __('After paragraph 13', 'roach'),
                      '14' => __('After paragraph 14', 'roach'),
                      '15' => __('After paragraph 15', 'roach'),
                      '16' => __('After paragraph 16', 'roach'),
                      '17' => __('After paragraph 17', 'roach'),
                      '18' => __('After paragraph 18', 'roach'),
                      '19' => __('After paragraph 19', 'roach'),
                      '20' => __('After paragraph 20', 'roach'),
                      '0-1' => __('After first H2', 'roach'),
                      '0-2' => __('After second H2', 'roach'),
                      '0-3' => __('After third H2', 'roach'),
                      '0-4' => __('After fourth H2', 'roach'),
                      '0-5' => __('After fifth H2', 'roach'),
                      '0-6' => __('After sixth H2', 'roach'),
                      '0-7' => __('After seventh H2', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_10_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_10_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_10_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_10_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_10_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_10_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_10_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_10_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_10_cat', array(
                      'section' => 'roach_ads_sec_inside',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_10_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_10_margin', array(
                      'section' => 'roach_ads_sec_inside',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));


                    $wp_customize->add_setting('roach_ads_before_image', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_before_image', array(
                      'label' => __('Before featured image', 'roach'),
                      'section' => 'roach_ads_sec_before',
                      'description' => __('Shortcode: [ads id=16]', 'roach'),
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_before_image_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_before_image_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_image_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('Only posts', 'roach'),
                      '3' => __('Only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_before_image_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_image_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_before_image_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_image_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_before_image_cat', array(
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_before_image_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_before_image_margin', array(
                      'section' => 'roach_ads_sec_before',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_before', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_before', array(
                      'label' => __('After featured image', 'roach'),
                      'section' => 'roach_ads_sec_before',
                      'description' => __('Shortcode: [ads id=1]', 'roach'),
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_before_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_before_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('Only posts', 'roach'),
                      '3' => __('Only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_before_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_before_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_before_cat', array(
                      'section' => 'roach_ads_sec_before',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_before_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_before_margin', array(
                      'section' => 'roach_ads_sec_before',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));




                    $wp_customize->add_setting('roach_ads_after', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_after', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_after',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=2]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_after_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_after_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_after',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_after_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('Only posts', 'roach'),
                      '3' => __('Only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_after_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_after',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_after_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_after_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_after',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_after_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_after_cat', array(
                      'section' => 'roach_ads_sec_after',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_after_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_after_margin', array(
                      'section' => 'roach_ads_sec_after',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));


                    $wp_customize->add_setting('roach_ads_header', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_header', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_header',
                      'description' => __('Shortcode: [ads id=0]', 'roach'),
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_header_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_header_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_header_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_header_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_header_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_header_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_header_show_posts', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_header_show_posts', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'label' => __('Posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_header_show_pages', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_header_show_pages', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'label' => __('Pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_header_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_header_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_header_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_header_cat', array(
                      'section' => 'roach_ads_sec_header',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_header_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_header_margin', array(
                      'section' => 'roach_ads_sec_header',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar', array(
                      'label' => __('Before content', 'roach'),
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_show_posts', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar_show_posts', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_show_pages', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_before_sidebar_show_pages', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_before_sidebar_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_before_sidebar_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_before_sidebar_cat', array(
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_after_sidebar', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar', array(
                      'label' => __('After content', 'roach'),
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_show_posts', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar_show_posts', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_show_pages', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_after_sidebar_show_pages', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'label' => __('Pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_after_sidebar_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_after_sidebar_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_after_sidebar_cat', array(
                      'section' => 'roach_ads_sec_sidebar',
                      'priority' => 1,
                    )));


                    $wp_customize->add_setting('roach_ads_mid', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_mid', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_middle',
                      'priority' => 1,
                      'description' => __('Shortcode: [ads id=15]', 'roach'),
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_mid_style', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 'ads-roach-aligncenter',
                    ));

                    $cats = array(
                      'ads-roach-alignleft' => __('Left', 'roach'),
                      'ads-roach-alignleft-wrap' => __('Left wrapped', 'roach'),
                      'ads-roach-aligncenter' => __('Center', 'roach'),
                      'ads-roach-alignright' => __('Right', 'roach'),
                      'ads-roach-alignright-wrap' => __('Right wrapped', 'roach'),

                    );

                    $wp_customize->add_control('roach_ads_mid_style', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_middle',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_mid_type', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '2',
                    ));

                    $cats = array(
                      '1' => __('Posts / Pages', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_mid_type', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_middle',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_mid_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_mid_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_middle',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_mid_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control(new roach_Dropdown_Category_Control($wp_customize, 'roach_ads_mid_cat', array(
                      'section' => 'roach_ads_sec_middle',
                      'priority' => 1,
                    )));

                    $wp_customize->add_setting('roach_ads_mid_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint'
                    ));

                    $wp_customize->add_control('roach_ads_mid_margin', array(
                      'section' => 'roach_ads_sec_middle',
                      'type' => 'number',
                      'priority' => 1,
                      'input_attrs' => array(
                        'placeholder' => __('Margin', 'roach'),
                      )
                    ));

                    $wp_customize->add_setting('roach_ads_loop_1', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_loop_1', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_1_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_1_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_1_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_1_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_1_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_1_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_1_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_1_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_ads_loop_1_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After row 1', 'roach'),
                      '2' => __('After row 2', 'roach'),
                      '3' => __('After row 3', 'roach'),
                      '4' => __('After row 4', 'roach'),
                      '5' => __('After row 5', 'roach'),
                      '6' => __('After row 6', 'roach'),
                      '7' => __('After row 7', 'roach'),
                      '8' => __('After row 8', 'roach'),
                      '9' => __('After row 9', 'roach'),
                      '10' => __('After row 10', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_1_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_loop_2', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_loop_2', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_2_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_2_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_2_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_2_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_2_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_2_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_2_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_2_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_ads_loop_2_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After row 1', 'roach'),
                      '2' => __('After row 2', 'roach'),
                      '3' => __('After row 3', 'roach'),
                      '4' => __('After row 4', 'roach'),
                      '5' => __('After row 5', 'roach'),
                      '6' => __('After row 6', 'roach'),
                      '7' => __('After row 7', 'roach'),
                      '8' => __('After row 8', 'roach'),
                      '9' => __('After row 9', 'roach'),
                      '10' => __('After row 10', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_2_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_loop_3', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_loop_3', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_3_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_3_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_3_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_3_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_3_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_3_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_3_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_3_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_ads_loop_3_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After row 1', 'roach'),
                      '2' => __('After row 2', 'roach'),
                      '3' => __('After row 3', 'roach'),
                      '4' => __('After row 4', 'roach'),
                      '5' => __('After row 5', 'roach'),
                      '6' => __('After row 6', 'roach'),
                      '7' => __('After row 7', 'roach'),
                      '8' => __('After row 8', 'roach'),
                      '9' => __('After row 9', 'roach'),
                      '10' => __('After row 10', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_3_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_loop_4', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_loop_4', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_4_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_4_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_4_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_4_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_4_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_4_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_4_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_4_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_ads_loop_4_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After row 1', 'roach'),
                      '2' => __('After row 2', 'roach'),
                      '3' => __('After row 3', 'roach'),
                      '4' => __('After row 4', 'roach'),
                      '5' => __('After row 5', 'roach'),
                      '6' => __('After row 6', 'roach'),
                      '7' => __('After row 7', 'roach'),
                      '8' => __('After row 8', 'roach'),
                      '9' => __('After row 9', 'roach'),
                      '10' => __('After row 10', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_4_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_ads_loop_5', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'roach_sanitize_js_code',
                      'sanitize_js_callback' => 'roach_escape_js_output',
                    ));

                    $wp_customize->add_control('roach_ads_loop_5', array(
                      'label' => __('', 'roach'),
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'type' => 'textarea',
                      'input_attrs' => array(
                        'placeholder' => __('Add your ad here', 'roach'),
                      ),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_5_show_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_5_show_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_5_show_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_5_show_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_5_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_ads_loop_5_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'label' => __('Tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_ads_loop_5_device', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('All devices', 'roach'),
                      '2' => __('Desktop only', 'roach'),
                      '3' => __('Mobile only', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_5_device', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_ads_loop_5_place', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('After row 1', 'roach'),
                      '2' => __('After row 2', 'roach'),
                      '3' => __('After row 3', 'roach'),
                      '4' => __('After row 4', 'roach'),
                      '5' => __('After row 5', 'roach'),
                      '6' => __('After row 6', 'roach'),
                      '7' => __('After row 7', 'roach'),
                      '8' => __('After row 8', 'roach'),
                      '9' => __('After row 9', 'roach'),
                      '10' => __('After row 10', 'roach'),
                    );

                    $wp_customize->add_control('roach_ads_loop_5_place', array(
                      'type' => 'select',
                      'section' => 'roach_ads_sec_loop',
                      'priority' => 1,
                      'choices' => $cats
                    ));




                    /*
	 * Sections
	*/

                    $wp_customize->add_section('roach_appearance', array(
                      'title' => __('Appearance', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 1,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_color', array(
                      'title' => __('Colors', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 2,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_font', array(
                      'title' => __('Fonts', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 3,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_loop', array(
                      'title' => __('Listing options', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 5,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_single', array(
                      'title' => __('Posts options', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 6,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_page', array(
                      'title' => __('Page options', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 7,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_sidebar', array(
                      'title' => __('Sidebar', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 8,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_search', array(
                      'title' => __('Search box', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 9,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_breadcrumbs_options', array(
                      'title' => __('Breadcrumbs', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 10,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_content_index', array(
                      'title' => __('Table of contents', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 11,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_share_social', array(
                      'title' => __('Social buttons', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 12,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_cookies', array(
                      'title' => __('Cookies', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 13,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_security', array(
                      'title' => __('Security', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 14,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_wpo', array(
                      'title' => __('Optimization', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 15,
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_section('roach_performance', array(
                      'title' => __('Other options', 'roach'),
                      'panel' => 'custom_options',
                      'priority' => 16,
                      'capability' => 'edit_theme_options',
                    ));



                    /*
	 * Settings
	*/



                    $wp_customize->add_setting('roach_enable_featured_posts', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_featured_posts', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Show first row as featured', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_deactivate_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_deactivate_background', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Keep the aspect ratio width / height of images', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_columns', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '3',
                    ));

                    $cats = array(
                      '1' => esc_html__('1', 'roach'),
                      '2' => esc_html__('2', 'roach'),
                      '3' => esc_html__('3', 'roach'),
                      '4' => esc_html__('4', 'roach'),
                      '5' => esc_html__('5', 'roach'),
                    );

                    $wp_customize->add_control('roach_columns', array(
                      'type' => 'select',
                      'section' => 'roach_loop',
                      'label' => __('Columns', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_show_post_category', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_post_category', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Show categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_date_loop', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_date_loop', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Show date', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_post_extract', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_post_extract', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Show description', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_cluster_extract', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_cluster_extract', array(
                      'type' => 'checkbox',
                      'section' => 'roach_loop',
                      'label' => __('Show description in clusters', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_extract_long', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '12',
                    ));

                    $wp_customize->add_control('roach_extract_long', array(
                      'label' => __('Number of words description', 'roach'),
                      'section' => 'roach_loop',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 1,
                        'max' => 30,
                      ),
                    ));

                    $wp_customize->add_setting('roach_text_button_more', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_text_button_more', array(
                      'label' => __('Read more text', 'roach'),
                      'section' => 'roach_loop',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_thumb_width', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '400',
                    ));

                    $wp_customize->add_control('roach_thumb_width', array(
                      'label' => __('Thumbnails width', 'roach'),
                      'section' => 'roach_loop',
                      'description' => __('It is necessary to regenerate all the miniatures.', 'roach'),
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 200,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_thumb_height', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '267',
                    ));

                    $wp_customize->add_control('roach_thumb_height', array(
                      'label' => __('High thumbnails', 'roach'),
                      'section' => 'roach_loop',
                      'description' => __('It is necessary to regenerate all the miniatures.', 'roach'),
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 200,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_featured_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                      'default' => __('Featured', 'roach'),
                    ));

                    $wp_customize->add_control('roach_featured_text', array(
                      'label' => __('Featured message', 'roach'),
                      'section' => 'roach_loop',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_width_logo', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '160',
                    ));

                    $wp_customize->add_control('roach_width_logo', array(
                      'label' => __('Logo width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 100,
                        'max' => 300,
                      ),
                    ));

                    $wp_customize->add_setting('roach_width_header', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '980',
                    ));

                    $wp_customize->add_control('roach_width_header', array(
                      'label' => __('Header container width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 720,
                        'max' => 1280,
                      ),
                    ));

                    $wp_customize->add_setting('roach_width_loop', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '980',
                    ));

                    $wp_customize->add_control('roach_width_loop', array(
                      'label' => __('List container width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 720,
                        'max' => 1280,
                      ),
                    ));

                    $wp_customize->add_setting('roach_width_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '980',
                    ));

                    $wp_customize->add_control('roach_width_single', array(
                      'label' => __('Posts container width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 720,
                        'max' => 1280,
                      ),
                    ));

                    $wp_customize->add_setting('roach_width_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '980',
                    ));

                    $wp_customize->add_control('roach_width_page', array(
                      'label' => __('Pages container width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 720,
                        'max' => 1280,
                      ),
                    ));

                    if (function_exists('is_woocommerce')) {

                      $wp_customize->add_setting('roach_width_wc', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'absint',
                        'default' => '980',
                      ));

                      $wp_customize->add_control('roach_width_wc', array(
                        'label' => __('WooCommerce container width', 'roach'),
                        'section' => 'roach_appearance',
                        'type' => 'number',
                        'input_attrs' => array(
                          'min' => 720,
                          'max' => 1280,
                        ),
                      ));
                    }

                    $wp_customize->add_setting('roach_width_sidebar', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '300',
                    ));

                    $wp_customize->add_control('roach_width_sidebar', array(
                      'label' => __('Sidebar container width', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 300,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_menu_columns', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => esc_html__('1', 'roach'),
                      '2' => esc_html__('2', 'roach'),
                      '3' => esc_html__('3', 'roach'),
                    );

                    $wp_customize->add_control('roach_menu_columns', array(
                      'type' => 'select',
                      'section' => 'roach_appearance',
                      'label' => __('Menu columns', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_disable_header', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',

                    ));

                    $wp_customize->add_control('roach_disable_header', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Disable header', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_disable_footer', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',

                    ));

                    $wp_customize->add_control('roach_disable_footer', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Disable footer', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_float_menu', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',

                    ));

                    $wp_customize->add_control('roach_float_menu', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Activate float menu', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_no_sticky_header', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_no_sticky_header', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Disable fixed header', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_total_footer', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_total_footer', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Activate full footer', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_hide_logo_footer', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_logo_footer', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Hide footer logo', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_hide_rise_button', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_rise_button', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Hide Go Up button', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_layout_lists', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_layout_lists', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Enable layout in lists', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_rounded_borders', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_rounded_borders', array(
                      'type' => 'checkbox',
                      'section' => 'roach_appearance',
                      'label' => __('Activate rounded borders', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_borders_radius', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '10',
                    ));

                    $wp_customize->add_control('roach_borders_radius', array(
                      'label' => __('Border radius', 'roach'),
                      'section' => 'roach_appearance',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 1,
                        'max' => 50,
                      ),
                    ));

                    $wp_customize->add_setting('roach_font_title', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                    ));

                    $cats = array(
                      'Arial.400' => 'Arial 400',
                      'Arial.700' => 'Arial 700',
                      'Cabin.400' => 'Cabin 400',
                      'Cabin.500' => 'Cabin 500',
                      'Cabin.700' => 'Cabin 700',
                      'Comfortaa.300' => 'Comfortaa 300',
                      'Comfortaa.400' => 'Comfortaa 400',
                      'Comfortaa.700' => 'Comfortaa 700',
                      'Josefin Sans.300' => 'Josefin Sans 300',
                      'Josefin Sans.400' => 'Josefin Sans 400',
                      'Josefin Sans.700' => 'Josefin Sans 700',
                      'Jost.300' => 'Jost 300',
                      'Jost.400' => 'Jost 400',
                      'Jost.700' => 'Jost 700',
                      'Lato.300' => 'Lato 300',
                      'Lato.400' => 'Lato 400',
                      'Lato.700' => 'Lato 700',
                      'Lora.400' => 'Lora 400',
                      'Lora.700' => 'Lora 700',
                      'Libre Franklin.300' => 'Libre Franklin 300',
                      'Libre Franklin.400' => 'Libre Franklin 400',
                      'Libre Franklin.500' => 'Libre Franklin 500',
                      'Libre Franklin.700' => 'Libre Franklin 700',
                      'Maven Pro.400' => 'Maven Pro 300',
                      'Maven Pro.700' => 'Maven Pro 700',
                      'Merriweather.300' => 'Merriweather 300',
                      'Merriweather.400' => 'Merriweather 400',
                      'Merriweather.700' => 'Merriweather 700',
                      'Montserrat.300' => 'Montserrat 300',
                      'Montserrat.400' => 'Montserrat 400',
                      'Montserrat.700' => 'Montserrat 700',
                      'Noto Sans.400' => 'Noto Sans 400',
                      'Noto Sans.700' => 'Noto Sans 700',
                      'Nunito.300' => 'Nunito 300',
                      'Nunito.400' => 'Nunito 400',
                      'Nunito.700' => 'Nunito 700',
                      'Open Sans.300' => 'Open Sans 300',
                      'Open Sans.400' => 'Open Sans 400',
                      'Open Sans.700' => 'Open Sans 700',
                      'Poppins.300' => 'Poppins 300',
                      'Poppins.400' => 'Poppins 400',
                      'Poppins.700' => 'Poppins 700',
                      'PT Sans.400' => 'PT Sans 400',
                      'PT Sans.700' => 'PT Sans 700',
                      'Quicksand.300' => 'Quicksand 300',
                      'Quicksand.400' => 'Quicksand 400',
                      'Quicksand.600' => 'Quicksand 600',
                      'Quicksand.700' => 'Quicksand 700',
                      'Raleway.300' => 'Raleway 300',
                      'Raleway.400' => 'Raleway 400',
                      'Raleway.700' => 'Raleway 700',
                      'Roboto.300' => 'Roboto 300',
                      'Roboto.400' => 'Roboto 400',
                      'Roboto.700' => 'Roboto 700',
                      'Roboto Slab.300' => 'Roboto Slab 300',
                      'Roboto Slab.400' => 'Roboto Slab 400',
                      'Roboto Slab.700' => 'Roboto Slab 700',
                      'Rubik.300' => 'Rubik 300',
                      'Rubik.400' => 'Rubik 400',
                      'Rubik.500' => 'Rubik 500',
                      'Rubik.600' => 'Rubik 600',
                      'Rubik.700' => 'Rubik 700',
                      'Source Sans Pro.300' => 'Source Sans Pro 300',
                      'Source Sans Pro.400' => 'Source Sans Pro 400',
                      'Source Sans Pro.700' => 'Source Sans Pro 700',
                      'Urbanist.300' => 'Urbanist 300',
                      'Urbanist.400' => 'Urbanist 400',
                      'Urbanist.700' => 'Urbanist 700',
                      'Verdana.400' => 'Verdana 400',
                      'Verdana.700' => 'Verdana 700',
                      'Work Sans.300' => 'Work Sans 300',
                      'Work Sans.400' => 'Work Sans 400',
                      'Work Sans.700' => 'Work Sans 700',
                      'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
                    );

                    $wp_customize->add_control('roach_font_title', array(
                      'type' => 'select',
                      'section' => 'roach_font',
                      'label' => __('Headers font', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_font_text', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                    ));

                    $cats = array(
                      'Arial.400' => 'Arial 400',
                      'Arial.700' => 'Arial 700',
                      'Cabin.400' => 'Cabin 400',
                      'Cabin.500' => 'Cabin 500',
                      'Cabin.700' => 'Cabin 700',
                      'Comfortaa.300' => 'Comfortaa 300',
                      'Comfortaa.400' => 'Comfortaa 400',
                      'Comfortaa.700' => 'Comfortaa 700',
                      'Jost.300' => 'Jost 300',
                      'Jost.400' => 'Jost 400',
                      'Jost.700' => 'Jost 700',
                      'Josefin Sans.300' => 'Josefin Sans 300',
                      'Josefin Sans.400' => 'Josefin Sans 400',
                      'Josefin Sans.700' => 'Josefin Sans 700',
                      'Lato.300' => 'Lato 300',
                      'Lato.400' => 'Lato 400',
                      'Lato.700' => 'Lato 700',
                      'Lora.400' => 'Lora 400',
                      'Lora.700' => 'Lora 700',
                      'Libre Franklin.300' => 'Libre Franklin 300',
                      'Libre Franklin.400' => 'Libre Franklin 400',
                      'Libre Franklin.500' => 'Libre Franklin 500',
                      'Libre Franklin.700' => 'Libre Franklin 700',
                      'Maven Pro.400' => 'Maven Pro 300',
                      'Maven Pro.700' => 'Maven Pro 700',
                      'Merriweather.300' => 'Merriweather 300',
                      'Merriweather.400' => 'Merriweather 400',
                      'Merriweather.700' => 'Merriweather 700',
                      'Montserrat.300' => 'Montserrat 300',
                      'Montserrat.400' => 'Montserrat 400',
                      'Montserrat.700' => 'Montserrat 700',
                      'Noto Sans.400' => 'Noto Sans 400',
                      'Noto Sans.700' => 'Noto Sans 700',
                      'Nunito.300' => 'Nunito 300',
                      'Nunito.400' => 'Nunito 400',
                      'Nunito.700' => 'Nunito 700',
                      'Open Sans.300' => 'Open Sans 300',
                      'Open Sans.400' => 'Open Sans 400',
                      'Open Sans.700' => 'Open Sans 700',
                      'Poppins.300' => 'Poppins 300',
                      'Poppins.400' => 'Poppins 400',
                      'Poppins.700' => 'Poppins 700',
                      'PT Sans.400' => 'PT Sans 400',
                      'PT Sans.700' => 'PT Sans 700',
                      'Quicksand.300' => 'Quicksand 300',
                      'Quicksand.400' => 'Quicksand 400',
                      'Quicksand.600' => 'Quicksand 600',
                      'Quicksand.700' => 'Quicksand 700',
                      'Raleway.300' => 'Raleway 300',
                      'Raleway.400' => 'Raleway 400',
                      'Raleway.700' => 'Raleway 700',
                      'Roboto.300' => 'Roboto 300',
                      'Roboto.400' => 'Roboto 400',
                      'Roboto.700' => 'Roboto 700',
                      'Roboto Slab.300' => 'Roboto Slab 300',
                      'Roboto Slab.400' => 'Roboto Slab 400',
                      'Roboto Slab.700' => 'Roboto Slab 700',
                      'Rubik.300' => 'Rubik 300',
                      'Rubik.400' => 'Rubik 400',
                      'Rubik.500' => 'Rubik 500',
                      'Rubik.600' => 'Rubik 600',
                      'Rubik.700' => 'Rubik 700',
                      'Source Sans Pro.300' => 'Source Sans Pro 300',
                      'Source Sans Pro.400' => 'Source Sans Pro 400',
                      'Source Sans Pro.700' => 'Source Sans Pro 700',
                      'Urbanist.300' => 'Urbanist 300',
                      'Urbanist.400' => 'Urbanist 400',
                      'Urbanist.700' => 'Urbanist 700',
                      'Verdana.400' => 'Verdana 400',
                      'Verdana.700' => 'Verdana 700',
                      'Work Sans.300' => 'Work Sans 300',
                      'Work Sans.400' => 'Work Sans 400',
                      'Work Sans.700' => 'Work Sans 700',
                      'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
                    );

                    $wp_customize->add_control('roach_font_text', array(
                      'type' => 'select',
                      'section' => 'roach_font',
                      'label' => __('Text font', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_font_loop', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                    ));

                    $cats = array(
                      'Arial.400' => 'Arial 400',
                      'Arial.700' => 'Arial 700',
                      'Cabin.400' => 'Cabin 400',
                      'Cabin.500' => 'Cabin 500',
                      'Cabin.700' => 'Cabin 700',
                      'Comfortaa.300' => 'Comfortaa 300',
                      'Comfortaa.400' => 'Comfortaa 400',
                      'Comfortaa.700' => 'Comfortaa 700',
                      'Jost.300' => 'Jost 300',
                      'Jost.400' => 'Jost 400',
                      'Jost.700' => 'Jost 700',
                      'Josefin Sans.300' => 'Josefin Sans 300',
                      'Josefin Sans.400' => 'Josefin Sans 400',
                      'Josefin Sans.700' => 'Josefin Sans 700',
                      'Lato.300' => 'Lato 300',
                      'Lato.400' => 'Lato 400',
                      'Lato.700' => 'Lato 700',
                      'Lora.400' => 'Lora 400',
                      'Lora.700' => 'Lora 700',
                      'Libre Franklin.300' => 'Libre Franklin 300',
                      'Libre Franklin.400' => 'Libre Franklin 400',
                      'Libre Franklin.500' => 'Libre Franklin 500',
                      'Libre Franklin.700' => 'Libre Franklin 700',
                      'Maven Pro.400' => 'Maven Pro 300',
                      'Maven Pro.700' => 'Maven Pro 700',
                      'Merriweather.300' => 'Merriweather 300',
                      'Merriweather.400' => 'Merriweather 400',
                      'Merriweather.700' => 'Merriweather 700',
                      'Montserrat.300' => 'Montserrat 300',
                      'Montserrat.400' => 'Montserrat 400',
                      'Montserrat.700' => 'Montserrat 700',
                      'Noto Sans.400' => 'Noto Sans 400',
                      'Noto Sans.700' => 'Noto Sans 700',
                      'Nunito.300' => 'Nunito 300',
                      'Nunito.400' => 'Nunito 400',
                      'Nunito.700' => 'Nunito 700',
                      'Open Sans.300' => 'Open Sans 300',
                      'Open Sans.400' => 'Open Sans 400',
                      'Open Sans.700' => 'Open Sans 700',
                      'Poppins.300' => 'Poppins 300',
                      'Poppins.400' => 'Poppins 400',
                      'Poppins.700' => 'Poppins 700',
                      'PT Sans.400' => 'PT Sans 400',
                      'PT Sans.700' => 'PT Sans 700',
                      'Quicksand.300' => 'Quicksand 300',
                      'Quicksand.400' => 'Quicksand 400',
                      'Quicksand.600' => 'Quicksand 600',
                      'Quicksand.700' => 'Quicksand 700',
                      'Raleway.300' => 'Raleway 300',
                      'Raleway.400' => 'Raleway 400',
                      'Raleway.700' => 'Raleway 700',
                      'Roboto.300' => 'Roboto 300',
                      'Roboto.400' => 'Roboto 400',
                      'Roboto.700' => 'Roboto 700',
                      'Roboto Slab.300' => 'Roboto Slab 300',
                      'Roboto Slab.400' => 'Roboto Slab 400',
                      'Roboto Slab.700' => 'Roboto Slab 700',
                      'Rubik.300' => 'Rubik 300',
                      'Rubik.400' => 'Rubik 400',
                      'Rubik.500' => 'Rubik 500',
                      'Rubik.600' => 'Rubik 600',
                      'Rubik.700' => 'Rubik 700',
                      'Source Sans Pro.300' => 'Source Sans Pro 300',
                      'Source Sans Pro.400' => 'Source Sans Pro 400',
                      'Source Sans Pro.700' => 'Source Sans Pro 700',
                      'Urbanist.300' => 'Urbanist 300',
                      'Urbanist.400' => 'Urbanist 400',
                      'Urbanist.700' => 'Urbanist 700',
                      'Verdana.400' => 'Verdana 400',
                      'Verdana.700' => 'Verdana 700',
                      'Work Sans.300' => 'Work Sans 300',
                      'Work Sans.400' => 'Work Sans 400',
                      'Work Sans.700' => 'Work Sans 700',
                      'ZCOOL KuaiLe.400' => 'ZCOOL KuaiLe 400',
                    );

                    $wp_customize->add_control('roach_font_loop', array(
                      'type' => 'select',
                      'section' => 'roach_font',
                      'label' => __('List font', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_size_h1', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '38',
                    ));

                    $wp_customize->add_control('roach_size_h1', array(
                      'label' => __('Header size H1', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 30,
                        'max' => 50,
                      ),
                    ));

                    $wp_customize->add_setting('roach_size_h2', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '32',
                    ));

                    $wp_customize->add_control('roach_size_h2', array(
                      'label' => __('Header size H2', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 24,
                        'max' => 44,
                      ),
                    ));

                    $wp_customize->add_setting('roach_size_h3', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '28',
                    ));

                    $wp_customize->add_control('roach_size_h3', array(
                      'label' => __('Header size H3', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 20,
                        'max' => 40,
                      ),
                    ));

                    $wp_customize->add_setting('roach_size_h4', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '23',
                    ));

                    $wp_customize->add_control('roach_size_h4', array(
                      'label' => __('Header size H4', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 16,
                        'max' => 34,
                      ),
                    ));

                    $wp_customize->add_setting('roach_size_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '18',
                    ));

                    $wp_customize->add_control('roach_size_text', array(
                      'label' => __('Text size', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 14,
                        'max' => 22,
                      ),
                    ));

                    $wp_customize->add_setting('roach_size_loop', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '18',
                    ));

                    $wp_customize->add_control('roach_size_loop', array(
                      'label' => __('List size', 'roach'),
                      'section' => 'roach_font',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 16,
                        'max' => 26,
                      ),
                    ));

                    $wp_customize->add_setting('roach_body_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_body_background', array(
                      'label' => __('Background', 'roach'),
                      'section' => 'roach_color'
                    )));

                    $wp_customize->add_setting('roach_header_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_header_background', array(
                      'label' => __('Header background', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_header_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_header_color', array(
                      'label' => __('Header links', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_footer_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_footer_background', array(
                      'label' => __('Footer background', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_footer_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_footer_color', array(
                      'label' => __('Footer links', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_font_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_font_color', array(
                      'label' => __('Text', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_link_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_link_color', array(
                      'label' => __('Links', 'roach'),
                      'section' => 'roach_color',

                    )));

                    $wp_customize->add_setting('roach_btn_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_btn_background', array(
                      'label' => __('Buttons background', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_btn_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_btn_color', array(
                      'label' => __('Button text', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_h1_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_h1_color', array(
                      'label' => __('Header H1', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_h2_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_h2_color', array(
                      'label' => __('Headers H2', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_h3_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_h3_color', array(
                      'label' => __('Headers H3', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_h4_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_h4_color', array(
                      'label' => __('Headers H4', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_featured_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_featured_background', array(
                      'label' => __('Featured advice background', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_featured_color', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_featured_color', array(
                      'label' => __('Featured advice text', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_hero_background', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_hero_background', array(
                      'label' => __('Hero background', 'roach'),
                      'section' => 'roach_color',
                    )));

                    $wp_customize->add_setting('roach_hero_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'sanitize_hex_color',
                    ));

                    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'roach_hero_text', array(
                      'label' => __('Hero text', 'roach'),
                      'section' => 'roach_color',
                    )));
                    $wp_customize->add_setting('roach_hide_image_featured', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_image_featured', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Hide featured image', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_featured_small', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_featured_small', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show Featured Image Small', 'roach'),
                      'active_callback' => function ($control) {
                        return !$control->manager->get_setting('roach_hide_image_featured')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_show_author', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_author', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show author', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_box_author', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_box_author', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show author box', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_deactivate_author_link', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_deactivate_author_link', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Disable link in author', 'roach'),
                      'active_callback' => function ($control) {
                        return ($control->manager->get_setting('roach_show_author')->value() || $control->manager->get_setting('roach_show_box_author')->value());
                      },
                    ));


                    $wp_customize->add_setting('roach_show_date_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_date_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show publication date', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_nav_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_nav_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show Previous / Next navigation', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show labels', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_related_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_related_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show related posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_number_related_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '6',
                    ));

                    $wp_customize->add_control('roach_number_related_single', array(
                      'label' => __('Number of related entries', 'roach'),
                      'section' => 'roach_single',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 2,
                        'max' => 18,
                      ),
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_show_related_single')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_related_by', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('Related by category', 'roach'),
                      '2' => __('Relacionadas por etiquetas', 'roach'),
                      '3' => __('Random posts', 'roach'),

                    );

                    $wp_customize->add_control('roach_related_by', array(
                      'type' => 'select',
                      'section' => 'roach_single',
                      'label' => __('Related posts', 'roach'),
                      'choices' => $cats,
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_show_related_single')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_related_title_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_related_title_text', array(
                      'label' => __('Related posts title', 'roach'),
                      'section' => 'roach_single',
                      'type' => 'text',
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_show_related_single')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_comment_count_title', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_comment_count_title', array(
                      'label' => __('Comment list title', 'roach'),
                      'section' => 'roach_single',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_show_last_paragraph_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_paragraph_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_single',
                      'label' => __('Show last paragraph dynamic', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_last_paragraph_single', array(
                      'capability' => 'edit_theme_options',
                      'default' => 'Si quieres conocer otros artículos parecidos a %%title%% puedes visitar la categoría %%category%%.',
                      // 'sanitize_callback' => 'sanitize_textarea_field',
                    ));

                    $wp_customize->add_control('roach_last_paragraph_single', array(
                      'type' => 'textarea',
                      'section' => 'roach_single',
                      'label' => __('', 'roach'),
                      'description' => __('<strong>Título</strong> %%title%%<br><strong>Categoría</strong> %%category%%<br><strong>Etiqueta</strong> %%tag%%<br><strong>Año actual</strong> %%currentyear%%'),
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_show_last_paragraph_single')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_show_sidebar_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_sidebar_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Posts', 'roach'),
                      'choices' => $cats
                    ));


                    $wp_customize->add_setting('roach_show_author_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_author_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show author', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_box_author_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_box_author_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show author box', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_date_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_date_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show publication date', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_tags_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_tag_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show labels', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_hide_image_featured_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_image_featured_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Hide featured image on pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_featured_small_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_featured_small_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show Featured Image Small', 'roach'),
                      'active_callback' => function ($control) {
                        return !$control->manager->get_setting('roach_hide_image_featured_page')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_show_author_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_author_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show author', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_box_author_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_box_author_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show author box', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_date_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_date_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show publication date', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_tags_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_tags_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Enable tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_tags_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_tags_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show labels', 'roach'),
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_enable_tags_page')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_show_last_paragraph_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_paragraph_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_page',
                      'label' => __('Show last paragraph dynamic', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_last_paragraph_page', array(
                      'capability' => 'edit_theme_options',
                      'default' => 'Esperamos que te haya gustado este artículo sobre %%title%%.',
                    ));

                    $wp_customize->add_control('roach_last_paragraph_page', array(
                      'type' => 'textarea',
                      'section' => 'roach_page',
                      'label' => __('', 'roach'),
                      'description' => __('<strong>Título</strong> %%title%%<br><strong>Etiqueta</strong> %%tag%%<br><strong>Año actual</strong> %%currentyear%%'),
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_show_last_paragraph_page')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_breadcrumb_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_breadcrumb_text', array(
                      'label' => __('Breadcrumbs text', 'roach'),
                      'section' => 'roach_breadcrumbs_options',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_hide_breadcrumb', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_breadcrumb', array(
                      'type' => 'checkbox',
                      'section' => 'roach_breadcrumbs_options',
                      'label' => __('Disable on posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_hide_breadcrumb_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_breadcrumb_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_breadcrumbs_options',
                      'label' => __('Disable on pages', 'roach'),
                    ));


                    $wp_customize->add_setting('roach_hide_breadcrumb_cats', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_breadcrumb_cats', array(
                      'type' => 'checkbox',
                      'section' => 'roach_breadcrumbs_options',
                      'label' => __('Hide categories in breadcrumbs', 'roach'),
                    ));


                    $wp_customize->add_setting('roach_show_sidebar_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_sidebar_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_sidebar_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_sidebar_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Home page', 'roach'),
                    ));


                    $wp_customize->add_setting('roach_show_sidebar_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_sidebar_cat', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_sidebar_tag', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_sidebar_tag', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Tags', 'roach'),
                    ));

                    if (function_exists('is_woocommerce')) {

                      $wp_customize->add_setting('roach_show_sidebar_products', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_show_sidebar_products', array(
                        'type' => 'checkbox',
                        'section' => 'roach_sidebar',
                        'label' => __('Products', 'roach'),
                        'choices' => $cats
                      ));
                    }

                    $wp_customize->add_setting('roach_show_last_single', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_single', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Show on posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_last_page', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_page', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Show on pages', 'roach'),
                    ));


                    $wp_customize->add_setting('roach_show_last_home', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_home', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Show on home page', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_last_cat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_cat', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Show on categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_last_tag', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_last_tag', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Show on tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_sidebar_type_posts', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 0,
                    ));

                    $cats = array(
                      0 => __('Show all posts', 'roach'),
                      1 => __('Show only entries in the same category', 'roach'),
                      3 => __('Show only entries in the same tag', 'roach'),
                      2 => __('Show only featured posts', 'roach'),
                    );

                    $wp_customize->add_control('roach_sidebar_type_posts', array(
                      'type' => 'select',
                      'section' => 'roach_sidebar',
                      'label' => __('Last post options', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_showposts_last_sidebar', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => 5,
                    ));

                    $wp_customize->add_control('roach_showposts_last_sidebar', array(
                      'label' => __('Number of posts', 'roach'),
                      'section' => 'roach_sidebar',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 1,
                        'max' => 10,
                      ),
                    ));

                    $wp_customize->add_setting('roach_sidebar_image', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 0,
                    ));

                    $cats = array(
                      0 => __('Big', 'roach'),
                      1 => __('Small', 'roach'),
                    );

                    $wp_customize->add_control('roach_sidebar_image', array(
                      'type' => 'select',
                      'section' => 'roach_sidebar',
                      'label' => __('Image Design', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_side_thumb_width', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '300',
                    ));

                    $wp_customize->add_control('roach_side_thumb_width', array(
                      'label' => __('Thumbnails width', 'roach'),
                      'section' => 'roach_sidebar',
                      'description' => __('It is necessary to regenerate all the miniatures.', 'roach'),
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 200,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_side_thumb_height', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '140',
                    ));

                    $wp_customize->add_control('roach_side_thumb_height', array(
                      'label' => __('High thumbnails', 'roach'),
                      'section' => 'roach_sidebar',
                      'description' => __('It is necessary to regenerate all the miniatures.', 'roach'),
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 100,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_sticky_sidebar', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_sticky_sidebar', array(
                      'type' => 'checkbox',
                      'section' => 'roach_sidebar',
                      'label' => __('Fixed sidebar', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_cookies', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_cookies', array(
                      'type' => 'checkbox',
                      'section' => 'roach_cookies',
                      'label' => __('Activate cookies', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_cookies_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_cookies_text', array(
                      'label' => __('Message', 'roach'),
                      'section' => 'roach_cookies',
                      'type' => 'textarea',
                    ));

                    $wp_customize->add_setting('roach_cookies_text_btn', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_cookies_text_btn', array(
                      'label' => __('Accept text', 'roach'),
                      'section' => 'roach_cookies',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_cookies_text_link', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_cookies_text_link', array(
                      'label' => __('More information text', 'roach'),
                      'section' => 'roach_cookies',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_cookies_link', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                    ));

                    $wp_customize->add_control('roach_cookies_link', array(
                      'label' => __('Cookies page', 'roach'),
                      'section' => 'roach_cookies',
                      'type' => 'dropdown-pages',
                    ));

                    $wp_customize->add_setting('roach_delete_version', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_delete_version', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Delete WordPress version', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_delete_wlw', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_delete_wlw', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Delete WLW Link', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_delete_rds', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_delete_rds', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Delete RDS Link', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_delete_api_rest_link', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_delete_api_rest_link', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Delete API REST Link', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_content_type_options', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_content_type_options', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('X-Content-Type-Options', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_frame_options', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_frame_options', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('X-Frame-Options', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_xxs_protection', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_xxs_protection', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('X-XXS-Protection', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_strict_transport_security', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_strict_transport_security', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Strict-Transport-Security', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_referrer_policy', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_referrer_policy', array(
                      'type' => 'checkbox',
                      'section' => 'roach_security',
                      'label' => __('Referrer-Policy', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_minify_html', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_minify_html', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Optimize HTML code', 'roach'),
                    ));



                    $wp_customize->add_setting('roach_remove_global_styles', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_remove_global_styles', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Remove Global Styles', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_optimize_analytics', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_optimize_analytics', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Optimize Google Analytics', 'roach'),
                    ));

                    //	$wp_customize->add_setting('roach_disable_jquery', array(
                    //		'type' => 'theme_mod',
                    //		'capability' => 'edit_theme_options',
                    //		'sanitize_callback'      => 'roach_sanitize_checkbox',
                    //	));

                    //	$wp_customize->add_control('roach_disable_jquery', array(
                    //		'type' => 'checkbox',
                    //		'section' => 'roach_wpo',
                    //		'label' => __('Disable jQuery', 'roach') ,
                    //	));

                    $wp_customize->add_setting('roach_enable_js_defer', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_js_defer', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Enable Javascript lazy loading', 'roach'),
                    ));


                    $wp_customize->add_setting('roach_jquery_options', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 0
                    ));

                    $cats = array(
                      0 => __('Load jQuery locally', 'roach'),
                      1 => __('Load jQuery from CDN', 'roach'),
                      2 => __('Disable jQuery', 'roach'),
                    );

                    $wp_customize->add_control('roach_jquery_options', array(
                      'type' => 'select',
                      'section' => 'roach_wpo',
                      'choices' => $cats,

                    ));

                    $wp_customize->add_setting('roach_optimize_youtube', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_optimize_youtube', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Optimize YouTube videos', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_disable_embed', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_disable_embed', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Disable embedded content', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_preload_featured_image', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_preload_featured_image', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Preload featured image', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_options_fonts', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => 1
                    ));

                    $cats = array(
                      1 => __('Host Google Fonts externally', 'roach'),
                      2 => __('Host Google Fonts locally', 'roach'),
                      3 => __('Disable Google Fonts', 'roach'),
                    );

                    $wp_customize->add_control('roach_options_fonts', array(
                      'type' => 'select',
                      'section' => 'roach_wpo',
                      'label' => __('Google Fonts', 'roach'),
                      'choices' => $cats,

                    ));

                    $wp_customize->add_setting('roach_limit_heartbeat', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_limit_heartbeat', array(
                      'type' => 'checkbox',
                      'section' => 'roach_wpo',
                      'label' => __('Limit HeartBeat', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_optimize_admin_area', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_optimize_admin_area', array(
                      'section' => 'roach_wpo',
                      'type' => 'checkbox',
                      'label' => __('Speed up WordPress admin area', 'roach'),
                    ));


                    if (function_exists('is_woocommerce')) {

                      $wp_customize->add_setting('roach_wc_remove_dependencies', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_remove_dependencies', array(
                        'section' => 'roach_wpo',
                        'type' => 'checkbox',
                        'label' => __('Remove WooCommerce dependencies outside their domains', 'roach'),
                      ));
                    }


                    $wp_customize->add_setting('roach_delete_guten_css', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_delete_guten_css', array(
                      'type' => 'checkbox',
                      'section' => 'roach_performance',
                      'label' => __('Activate Classic Editor', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_awesome', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_awesome', array(
                      'type' => 'checkbox',
                      'section' => 'roach_performance',
                      'label' => __('Activate Awesome library', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_comments_url', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_comments_url', array(
                      'type' => 'checkbox',
                      'section' => 'roach_performance',
                      'label' => __('Show URL in comments', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_schema_video', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_schema_video', array(
                      'type' => 'checkbox',
                      'section' => 'roach_performance',
                      'label' => __('Enable video Schema', 'roach'),

                    ));

                    $wp_customize->add_setting('roach_youtube_api_key', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_youtube_api_key', array(
                      'label' => __('Youtube API Key', 'roach'),
                      'section' => 'roach_performance',
                      'description' => __('It is required to enable video Schema.', 'roach'),
                      'type' => 'text',
                      "active_callback" => function ($control) {
                        return $control->manager->get_setting("roach_enable_schema_video")->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_home_text_before', array(
                      'sanitize_callback' => 'wp_kses_post',
                      'capability' => 'edit_theme_options',
                      'type' => 'theme_mod'
                    ));

                    $wp_customize->add_control(new WP_Customize_Teeny_Control($wp_customize, 'roach_home_text_before', array(
                      'label' => __('Home text − Before', 'roach'),
                      'section' => 'roach_performance',
                    )));


                    $wp_customize->add_setting('roach_home_text', array(
                      'sanitize_callback' => 'wp_kses_post',
                      'capability' => 'edit_theme_options',
                      'type' => 'theme_mod'
                    ));

                    $wp_customize->add_control(new WP_Customize_Teeny_Control($wp_customize, 'roach_home_text', array(
                      'label' => __('Home text − After', 'roach'),
                      'section' => 'roach_performance',
                    )));

                    $wp_customize->add_setting('roach_enable_post_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_post_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Activate on posts', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_page_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_page_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Activate on pages', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_enable_cate_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_enable_cate_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Activate on categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_user_hide_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_user_hide_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Allow user to change visibility', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_hide_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_hide_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Hide initially', 'roach'),
                      'active_callback' => function ($control) {
                        return $control->manager->get_setting('roach_user_hide_index')->value();
                      },
                    ));

                    $wp_customize->add_setting('roach_scroll_smooth', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_scroll_smooth', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' => __('Enable smooth scrolling', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_exclude_h3_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                    ));

                    $wp_customize->add_control('roach_exclude_h3_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_content_index',
                      'label' =>  __('Exclude H3 tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_index_pos', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('Before the first heading', 'roach'),
                      '2' => __('Above', 'roach'),
                      '3' => __('Down', 'roach'),
                      '4' => __('Use only as shortcode', 'roach'),
                    );

                    $wp_customize->add_control('roach_index_pos', array(
                      'type' => 'select',
                      'section' => 'roach_content_index',
                      'label' => __('Position', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_index_list', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                      'default'      => '1',
                    ));

                    $cats = array(
                      '1' => __('Numbered list', 'roach'),
                      '2' => __('Bulleted list', 'roach'),
                      '3' => __('No numbers or bullet point', 'roach'),
                    );

                    $wp_customize->add_control('roach_index_list', array(
                      'type' => 'select',
                      'section' => 'roach_content_index',
                      'label' => __('Format', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_index_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'default' => __('Index', 'roach'),
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_index_text', array(
                      'label' => __('Title', 'roach'),
                      'section' => 'roach_content_index',
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_show_search_index', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_search_index', array(
                      'type' => 'checkbox',
                      'section' => 'roach_search',
                      'label' => __('Show search at home', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_search_cate', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_search_cate', array(
                      'type' => 'checkbox',
                      'section' => 'roach_search',
                      'label' => __('Show Search at categories', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_search_tags', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_search_tags', array(
                      'type' => 'checkbox',
                      'section' => 'roach_search',
                      'label' => __('Show search at tags', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_search_menu', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_search_menu', array(
                      'type' => 'checkbox',
                      'section' => 'roach_search',
                      'label' => __('Show search in responsive menu', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_search', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_search', array(
                      'type' => 'checkbox',
                      'section' => 'roach_search',
                      'label' => __('Show search in desktop menu', 'roach'),
                    ));

                    if (function_exists('is_woocommerce')) {

                      $wp_customize->add_setting('roach_show_search_wc', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_show_search_wc', array(
                        'type' => 'checkbox',
                        'section' => 'roach_search',
                        'label' => __('Show search in product list', 'roach'),
                      ));
                    }

                    $wp_customize->add_setting('roach_search_text', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_search_text', array(
                      'label' => __('Search text', 'roach'),
                      'section' => 'roach_search',
                      'description' => __('The text will appear in all search.', 'roach'),
                      'type' => 'text',
                    ));

                    $wp_customize->add_setting('roach_search_header_width', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '200',
                    ));

                    $wp_customize->add_control('roach_search_header_width', array(
                      'label' => __('Search width', 'roach'),
                      'description' => __('It will only be used in the desktop menu.', 'roach'),
                      'section' => 'roach_search',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 200,
                        'max' => 500,
                      ),
                    ));

                    $wp_customize->add_setting('roach_search_margin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'absint',
                      'default' => '0',
                    ));

                    $wp_customize->add_control('roach_search_margin', array(
                      'label' => __('Distance', 'roach'),
                      'description' => __('Left margin of the search. It will only be used in the desktop menu.', 'roach'),
                      'section' => 'roach_search',
                      'type' => 'number',
                      'input_attrs' => array(
                        'min' => 200,
                        'max' => 350,
                      ),
                    ));

                    $wp_customize->add_setting('roach_show_social_buttons_before', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_social_buttons_before', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Before content', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_social_buttons_after', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_social_buttons_after', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('After content', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_social_buttons_bottom', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_social_buttons_bottom', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Bottom mobile only', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_facebook', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_facebook', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Facebook', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_facebookm', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_facebookm', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Facebook Messenger', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_twitter', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_twitter', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Twitter', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_pinterest', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_pinterest', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Pinterest', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_whatsapp', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_whatsapp', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('WhatsApp', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_tumblr', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_tumblr', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Tumblr', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_linkedin', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_linkedin', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Linkedin', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_telegram', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_telegram', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Telegram', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_email', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_email', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('E-mail', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_show_reddit', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_checkbox',
                    ));

                    $wp_customize->add_control('roach_show_reddit', array(
                      'type' => 'checkbox',
                      'section' => 'roach_share_social',
                      'label' => __('Reddit', 'roach'),
                    ));

                    $wp_customize->add_setting('roach_social_post_types', array(
                      'type'      => 'theme_mod',
                      'capability'      => 'edit_theme_options',
                      'sanitize_callback'      => 'roach_sanitize_select',
                    ));

                    $cats = array(
                      '1' => __('All', 'roach'),
                      '2' => __('only posts', 'roach'),
                      '3' => __('only pages', 'roach'),
                    );

                    $wp_customize->add_control('roach_social_post_types', array(
                      'type' => 'select',
                      'section' => 'roach_share_social',
                      'label' => __('Post type', 'roach'),
                      'choices' => $cats
                    ));

                    $wp_customize->add_setting('roach_social_title', array(
                      'type' => 'theme_mod',
                      'capability' => 'edit_theme_options',
                      'sanitize_callback' => 'wp_filter_nohtml_kses',
                    ));

                    $wp_customize->add_control('roach_social_title', array(
                      'label' => __('Social buttons title', 'roach'),
                      'section' => 'roach_share_social',
                      'type' => 'text',
                    ));




                    /**/

                    if (function_exists('is_woocommerce')) {

                      $wp_customize->add_section('roach_wc', array(
                        'title' => __('WooCommerce', 'roach'),
                        'panel' => 'custom_options',
                        'priority' => 99,
                        'capability' => 'edit_theme_options',
                      ));

                      $wp_customize->add_setting('roach_wc_disable_breadcrumbs', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_disable_breadcrumbs', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable breadcrumbs', 'roach'),
                      ));

                      $wp_customize->add_setting('roach_wc_disable_saving', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_disable_saving', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable savings percentage', 'roach'),
                      ));

                      $wp_customize->add_setting('roach_wc_disable_header_account', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_disable_header_account', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable header account', 'roach'),
                      ));

                      $wp_customize->add_setting('roach_wc_disable_header_cart', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_disable_header_cart', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable header cart', 'roach'),
                      ));


                      $wp_customize->add_setting('roach_wc_deactivate_add_to_cart', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_deactivate_add_to_cart', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable Add to Cart Button', 'roach'),
                      ));

                      $wp_customize->add_setting('roach_wc_deactivate_related_products', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback'      => 'roach_sanitize_checkbox',
                      ));

                      $wp_customize->add_control('roach_wc_deactivate_related_products', array(
                        'section' => 'roach_wc',
                        'type' => 'checkbox',
                        'label' => __('Disable related products', 'roach'),
                      ));

                      $wp_customize->add_setting('roach_wc_related_number', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'absint',
                        'default' => 4,
                      ));

                      $wp_customize->add_control('roach_wc_related_number', array(
                        'label' => __('Number of related products', 'roach'),
                        'section' => 'roach_wc',
                        'type' => 'number',
                        'input_attrs' => array(
                          'min' => 1,
                          'max' => 18,
                        ),
                      ));

                      $wp_customize->add_setting('roach_wc_related_prod_columns', array(
                        'type'      => 'theme_mod',
                        'capability'      => 'edit_theme_options',
                        'sanitize_callback'      => 'absint',
                        'default'      => 4,
                      ));

                      $wp_customize->add_control('roach_wc_related_prod_columns', array(
                        'label' => __('Products by row Related Products', 'roach'),
                        'section' => 'roach_wc',
                        'type' => 'number',
                        'input_attrs' => array(
                          'min' => 1,
                          'max' => 6,
                        ),
                      ));

                      $wp_customize->add_setting('roach_wc_cart_button_text', array(
                        'type' => 'theme_mod',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'wp_filter_nohtml_kses',
                      ));

                      $wp_customize->add_control('roach_wc_cart_button_text', array(
                        'label' => __('Add to cart Button text', 'roach'),
                        'section' => 'roach_wc',
                        'type' => 'text',
                      ));
                    }
                  }

                  add_action('customize_register', 'roach_customize_register');

                        ?>
