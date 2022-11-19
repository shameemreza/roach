<?php

function roach_add_shortcodes_js()
{

  wp_register_script('clusters-js', get_template_directory_uri() . '/inc/gutenberg/assets/js/shortcodes.min.js', array('jquery'), '001130522', true);

  wp_enqueue_script('clusters-js');
}

add_action("admin_menu", "roach_add_options");
function roach_add_options()
{
  add_menu_page('Shortcodes', 'Shortcodes', 'manage_options', 'shortcodes', 'roach_add_shortcodes_options');
}


function roach_add_shortcodes_options()
{

?>

  <style>
    code {
      display: block !important;
      overflow-x: auto !important;
      padding: 1em !important;
      margin: 0 1px !important;
      background: #eaeaea !important;
      background: rgba(0, 0, 0, .07) !important;
      font-size: 14px !important
    }

    .cluster-disp-none {
      display: none
    }

    .gute-cluster-option-active {
      box-shadow: none;
      border-bottom: 4px solid #666 !important;
      color: #23282d !important
    }

    h1.cl-h1 {
      font-weight: 400 !important
    }

    p.cl-description {
      color: #666;
      font-size: 15px;
      font-style: italic;
      padding: 1rem 3rem !important
    }

    .gute-cluster .gute-add_categories,
    .gute-cluster .gute-add_pages,
    .gute-cluster .gute-add_posts {
      padding-top: 0 !important
    }

    .submit {
      padding: 1em 0 1em 0 !important;
      margin: 0 !important
    }

    @media (min-width:800px) {
      .gute-add-cluster {
        max-width: 70%
      }
    }

    .gute-cluster li {
      list-style: none !important
    }

    .gute-cluster input:not([type=checkbox]),
    .gute-cluster select {
      width: 50%
    }

    .gute-cluster .selection {
      background: #f9f9f9;
      border: 1px solid #ccd0d4;
      padding: .8rem 1rem .6rem 1rem;
      margin-bottom: 1.2rem;
      max-height: 150px;
      overflow-y: scroll;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .04)
    }

    .gute-cluster .options .list_options {
      margin-bottom: 1.1rem
    }

    .gute-add-categories,
    .gute-add-pages,
    .gute-add-posts,
    .gute-add-tags,
    .gute-add-search,
    .gute-add-childpages,
    .gute-add-cluster3-categories {
      display: none
    }

    .label {
      margin-top: 8px;
      margin-bottom: 4px;
      display: block
    }

    .selection div {
      margin-bottom: 6px
    }

    .gute-add_categories .selection input,
    .gute-add_pages .selection input,
    .gute-add_posts .selection input {
      margin-top: 2px
    }

    .label>span {
      color: red;
    }
  </style>

  <div class="wrap">
    <h1>Shortcodes</h1>
    <div class="gute-cluster">
      <div class="wp-filter">
        <ul class="filter-links">
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-posts media-menu-item"><?php _e('Buttons', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-pages media-menu-item"><?php _e('Note', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-categories media-menu-item"><?php _e('Comparative', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-tags media-menu-item"><?php _e('Highlight text', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-search media-menu-item"><?php _e('Search', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-childpages media-menu-item"><?php _e('Child pages', 'roach'); ?></a></li>
          <li><a type="button" role="tab" class="gute-cluster-option gute-cluster-option-cluster3-categories media-menu-item"><?php _e('Categories', 'roach'); ?></a></li>

        </ul>
      </div>
      <div class="gute-add-cluster">
        <div class="gute-add-posts gute-cluster-type">
          <div class="list_options"> <span class="label"><?php _e('Button text', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <input id="roach_button_text" type="text" name="roach_button_text" placeholder="<?php _e('Ex: Download now', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Link', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <input type="text" name="roach_button_link" placeholder="<?php _e('Ex: https://wordpress.org', 'roach'); ?>" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Rel Attribute', 'roach'); ?></span>
            <input id="roach_button_attr_rel" type="text" name="roach_button_attr_rel" placeholder="<?php _e('Ex:  nofollow noopener', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options">
            <span class="label"><?php _e('Target', 'roach'); ?></span>
            <select name="roach_button_target" id="roach_button_target" style="margin: 2px 0px 10px;">
              <option value="self" selected><?php _e('Open in the same tab', 'roach'); ?></option>
              <option value="blank"><?php _e('Open in a new tab', 'roach'); ?></option>
            </select>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Background color', 'roach'); ?></span>
            <input id="roach_button_color_background" type="color" name="roach_button_color_background" value="#355070" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text color', 'roach'); ?></span>
            <input id="roach_button_color_text" type="color" name="roach_button_color_text" value="#FFFFFF" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options">
            <span class="label"><?php _e('Position', 'roach'); ?></span>
            <select name="roach_button_position" id="roach_button_position" style="margin: 2px 0px 10px;">
              <option value="left"><?php _e('Left', 'roach'); ?></option>
              <option value="center" selected><?php _e('Center', 'roach'); ?></option>
              <option value="right"><?php _e('Right', 'roach'); ?></option>
            </select>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text size', 'roach'); ?></span>
            <input name="roach_button_size" type="number" min="12" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Margin', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_button_margin" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Padding', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_button_padding" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Border radius', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_button_radius" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Icon', 'roach'); ?>(FontAwesome 5.14)</span>
            <input id="roach_button_icon" type="text" name="roach_button_icon" placeholder="<?php _e('Ex: fa-download', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options">
            <span class="label"><?php _e('Show container border', 'roach'); ?></span>
            <select name="roach_button_border" id="roach_button_border" style="margin: 2px 0px 10px;">
              <option value="0" selected><?php _e('No', 'roach'); ?></option>
              <option value="1"><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-btn-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>
        <div class="gute-add-pages gute-cluster-type">
          <div class="list_options"> <span class="label"><?php _e('Background color', 'roach'); ?></span>
            <input id="roach_note_color_background" type="color" name="roach_note_color_background" value="#ffffc1" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text color', 'roach'); ?></span>
            <input id="roach_note_color_text" type="color" name="roach_note_color_text" value="#181818" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text alignment', 'roach'); ?></span>
            <select name="roach_note_position" id="roach_note_position" style="margin: 2px 0px 10px;">
              <option value="left" selected><?php _e('Left', 'roach'); ?></option>
              <option value="center"><?php _e('Center', 'roach'); ?></option>
              <option value="right"><?php _e('Right', 'roach'); ?></option>
            </select>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text size', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_note_size" type="number" min="12" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Margin', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_note_margin" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Padding', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_note_padding" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Border radius', 'roach'); ?> <?php _e('(In pixels)', 'roach'); ?></span>
            <input name="roach_note_radius" type="number" min="0" max="40" step="1" style="margin: 2px 0px 10px;">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_note_text" type="text" name="roach_note_text" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6"></textarea>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-note-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>
        <div class="gute-add-categories gute-cluster-type">
          <div class="list_options"> <span class="label"><?php _e('Show titles', 'roach'); ?></span>
            <select name="roach_pros_cons_show_title" id="roach_pros_cons_show_title" style="margin: 2px 0px 10px;">
              <option value="1" selected><?php _e('Yes', 'roach'); ?></option>
              <option value="0"><?php _e('No', 'roach'); ?></option>

            </select>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Title text color', 'roach'); ?></span>
            <input id="roach_pros_cons_color_title" type="color" name="roach_pros_cons_color_title" value="#FFFFFF" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Background title Advantages', 'roach'); ?></span>
            <input id="roach_pros_color" type="color" name="roach_pros_color" value="#5cac4b" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"><span class="label"><?php _e('Background title Disadvantages', 'roach'); ?></span>
            <input id="roach_cons_color" type="color" name="roach_cons_color" value="#e63334" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Advantages Title', 'roach'); ?></span>
            <input id="roach_title_pros" type="text" name="roach_title_pros" placeholder="Ej: Ventajas" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Advantages', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_text_pros" type="text" name="roach_text_pros" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Advantage 1&#10;Advantage 2&#10;Advantage 3&#10;', 'roach'); ?>..."></textarea>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Disadvantages Title', 'roach'); ?></span>
            <input id="roach_title_cons" type="text" name="roach_title_cons" placeholder="Ej: Desventajas" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Disadvantages', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_text_cons" type="text" name="roach_text_cons" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Disadvantage 1&#10;Disadvantage 2&#10;Disadvantage 3&#10;', 'roach'); ?>..."></textarea>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-table-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>
        <div class="gute-add-tags gute-cluster-type">
          <div class="list_options"> <span class="label"><?php _e('Background color', 'roach'); ?></span>
            <input id="roach_color_highlight_bg" type="color" name="roach_color_highlight_bg" value="#ffffc1" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text color', 'roach'); ?></span>
            <input id="roach_color_highlight_text" type="color" name="roach_color_highlight_text" value="#181818" style="margin: 2px 0px 10px;" />
          </div>
          <div class="list_options"> <span class="label"><?php _e('Text', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_text_highlight" type="text" name="roach_text_highlight" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6"></textarea>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-highlight-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>
        <div class="gute-add-search gute-cluster-type">
          <div class="list_options">
            <p>
              <?php _e('With this shortcode you can insert a search box in the middle of any post or page.', 'roach'); ?>
            </p>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-search-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>
        <div class="gute-add-childpages gute-cluster-type">
          <div class="list_options">
            <p>
              <?php _e('With this shortcode you can insert a cluster to display the child pages of the page you are editing.', 'roach'); ?>
            </p>
          </div>
          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-childpages-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>
        </div>

        <div class="gute-add-cluster3-categories gute-cluster-type">

          <div class="list_options">
            <div class="selection">
              <?php $categories = get_categories();
              foreach ($categories as $category) { ?>
                <div>
                  <input id="cate2_<?php echo $category->cat_ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $category->cat_ID; ?>" />
                  <label for="cate2_<?php echo $category->cat_ID; ?>">
                    <?php echo $category->name ?>
                  </label>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="list_options"> <span class="label"><?php _e('Columns', 'roach'); ?></span>
            <select name="roach_cluster3_order" id="roach_cluster3_order">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4" selected>4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>

            </select>
          </div>

          <div class="list_options"> <span class="label"><?php _e('Font size', 'roach'); ?></span>
            <input name="roach_cluster3_showpost" type="number" min="14" value="30" step="1" placeholder="<?php _e('Default: 17', 'roach'); ?>" style="margin: 2px 0px 10px;">
          </div>

          <div class="list_options"> <span class="label"><?php _e('Background color', 'roach'); ?></span>
            <input id="roach_cluster3_color_bg" type="color" name="roach_cluster3_color_bg" value="#EEEEEE" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Text color', 'roach'); ?></span>
            <input id="roach_cluster3_color_text" type="color" name="roach_cluster3_color_text" value="#181818" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Stars color', 'roach'); ?></span>
            <input id="roach_cluster3_color_stars" type="color" name="roach_cluster3_color_stars" value="#f2b01e" style="margin: 2px 0px 10px;" />
          </div>


          <div class="list_options"> <span class="label"><?php _e('Show icon', 'roach'); ?></span>
            <select name="roach_cluster3_show_icon" id="roach_cluster3_show_icon" style="margin: 2px 0px 10px;">
              <option value="no"><?php _e('No', 'roach'); ?></option>
              <option value="yes" selected><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>


          <div class="list_options"> <span class="label"><?php _e('Show stars', 'roach'); ?></span>
            <select name="roach_cluster3_show_stars" id="roach_cluster3_show_stars" style="margin: 2px 0px 10px;">
              <option value="no" selected><?php _e('No', 'roach'); ?></option>
              <option value="yes"><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>


          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-cluster3-submit-gtnb"><?php _e('Create shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>


      </div>
    </div>
    <div class="gute-cluster-code"></div>
  </div>

<?php }

add_action('admin_enqueue_scripts', 'roach_add_shortcodes_js');




?>
