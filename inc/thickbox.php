<?php


function add_thickbox_js()
{
  wp_register_script('thickbox-js', get_template_directory_uri() . '/assets/js/thickbox.min.js', array('jquery'), '01140522', true);
  wp_enqueue_script('thickbox-js');
}

function add_thickbox_btn()
{  ?>

  <style>
    .cluster-option-active,
    .shortcode-option-active {
      font-weight: 600 !important;
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

    .add_categories,
    .add_pages,
    .add_posts {
      padding-top: 30px
    }

    .submit {
      padding: 1em 0 1em 0 !important;
      margin: 0 !important
    }

    .btn-thickbox .dashicons-grid-view {
      font-size: 17px;
      margin-top: .35rem;
      margin-right: .1rem
    }

    .btn-thickbox .dashicons-shortcode {
      font-size: 19px;
      margin-top: .35rem;
      margin-right: .1rem
    }

    .btn-thickbox i {
      color: #0071a1 !important;
      font-size: 16px !important;
      position: absolute;
      margin-top: 6px
    }

    .tb-close-icon {
      height: 50px !important;
      width: 50px !important;
      line-height: 60px !important
    }

    .cluster li {
      list-style: none !important
    }

    .cluster input:not([type=checkbox]),
    .cluster select {
      width: 50%
    }

    .cluster .selection {
      background: #f9f9f9;
      border: 1px solid #ccd0d4;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
      padding: .8rem 1rem .6rem 1rem;
      margin-bottom: 1.2rem;
      max-height: 150px;
      overflow-y: scroll
    }

    .cluster .options .list_options {
      margin-bottom: 1.1rem
    }

    .media-cluster-right {
      width: calc(100% - 200px);
      float: right
    }

    .cluster-right {
      min-height: 300px !important;
      max-height: 500px;
      width: calc(100% - 200px);
      float: right;
      position: relative;
      margin-top: -1rem
    }

    .cluster-descrip {
      position: relative;
      text-align: center;
      width: 100%;
      margin-top: 2rem
    }

    .cluster-type h1 {
      text-align: left;
      margin-bottom: 1.4rem;
      font-weight: 400 !important;
      font-size: 26px
    }

    .label {
      margin-top: 8px;
      margin-bottom: 4px;
      display: block
    }

    .thickbox-loading {
      height: auto !important
    }

    #TB_ajaxContent {
      width: calc(100% - 30px) !important;
      height: auto !important
    }

    #TB_title {
      background: #fff !important;
      border-bottom: none !important;
      height: 40px !important
    }

    #cluster_window,
    .cluster .options {
      display: none
    }

    .add-categories,
    .add-pages,
    .add-posts,
    .add-tags,
    .add-button,
    .add-note,
    .add-table,
    .add-highlight,
    .add-search,
    .add-childpages,
    .add-cluster2-categories {
      display: none;
      margin-top: 2rem
    }

    .selection div {
      margin-bottom: 6px
    }

    .add_categories .selection input,
    .add_pages .selection input,
    .add_posts .selection input {
      margin-top: 2px
    }

    .label>span {
      color: red;
    }
  </style>

  <a href="#TB_inline?width=400&inlineId=cluster_window" type="button" class="button thickbox btn-thickbox">
    <span class="dashicons dashicons-grid-view"></span>
    <?php _e('Add Cluster', 'roach'); ?>
  </a>
<?php }

function add_thickbox_window()
{
  add_thickbox();
?>

  <style>
    #cluster_window,
    .cluster .options {
      display: none;
    }
  </style>

  <div id="cluster_window">
    <div class="cluster">
      <div class="media-frame-menu">
        <div role="tablist" aria-orientation="vertical" class="media-menu">
          <h2 class="media-frame-menu-heading"><?php _e('Clusters', 'roach'); ?></h2>
          <a type="button" role="tab" class="cluster-option cluster-option-posts media-menu-item"><?php _e('Posts', 'roach'); ?></a>
          <a type="button" role="tab" class="cluster-option cluster-option-pages media-menu-item"><?php _e('Pages', 'roach'); ?></a>
          <a type="button" role="tab" class="cluster-option cluster-option-categories media-menu-item"><?php _e('Categories', 'roach'); ?></a>
          <a type="button" role="tab" class="cluster-option cluster-option-tags media-menu-item"><?php _e('Tags', 'roach'); ?></a>
        </div>
      </div>
      <div class="cluster-right">
        <div class="cluster-descrip">
          <h1 id="h1id" class="cl-h1"><?php _e('Select an option', 'roach'); ?></h1>
          <p class="cl-description"><?php _e('You can create categorizations of posts, pages, categories, and tags. Select an option from the left menu.', 'roach'); ?></p>
          <p class="cl-description"><?php _e('The <strong> [categories] </strong> shortcode is used to insert category clusters themselves, not category entries. You can exclude categories with the variable exclude, for example [categories exclude = "1"]', 'roach'); ?></p>
        </div>
        <div class="cluster-type add-posts">
          <div class="selection">
            <?php $get_posts =
              get_posts(array(
                'numberposts'    => -1,
              ));
            foreach ($get_posts as $post) { ?>
              <div>
                <input id="post_<?php echo $post->ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $post->ID; ?>" />
                <label for="post_<?php echo $post->ID; ?>">
                  <?php echo $post->post_title; ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="cluster-type add-pages">
          <div class="selection">
            <?php $get_pages = get_pages();
            foreach ($get_pages as $page) { ?>
              <div>
                <input id="page_<?php echo $page->ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $page->ID; ?>" />
                <label for="page_<?php echo $page->ID; ?>">
                  <?php echo $page->post_title; ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="cluster-type add-categories">
          <div class="selection">
            <?php $categories = get_categories();
            foreach ($categories as $category) { ?>
              <div>
                <input id="cate_<?php echo $category->cat_ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $category->cat_ID; ?>" />
                <label for="cate_<?php echo $category->cat_ID; ?>">
                  <?php echo $category->name ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="cluster-type add-tags">
          <div class="selection">
            <?php wp_terms_checklist(0, array('taxonomy'  => 'post_tag')); ?>
          </div>
        </div>
        <div class="options">
          <div class="list_options"> <span class="label"><?php _e('Order', 'roach'); ?></span>
            <select name="order" id="order">
              <option value="DESC" selected><?php _e('Most recent first', 'roach'); ?></option>
              <option value="ASC"><?php _e('Oldest first', 'roach'); ?></option>
              <option value="rand"><?php _e('Random', 'roach'); ?></option>
            </select>
          </div>
          <div class="list_options"> <span class="label"><?php _e('Post limit', 'roach'); ?></span>
            <input name="showposts" type="number" min="1" step="1" placeholder="<?php _e('Default: 12', 'roach'); ?>">
          </div>
          <div class="list_options"> <span class="label"><?php _e('Number of columns', 'roach'); ?></span>
            <input name="columns" type="number" min="1" max="5" step="1" placeholder="<?php _e('Default: 3', 'roach'); ?>">
          </div>
          <div class="submit list_options">
            <button class="button button-primary" id="cluster-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php }

function add_shortcode_btn()
{  ?>

  <a href="#TB_inline?width=400&inlineId=cluster_shortcode" type="button" class="button thickbox btn-thickbox">
    <span class="dashicons dashicons-shortcode"></span>
    <?php _e('Add shortcode', 'roach'); ?>
  </a>
<?php }

function add_shortcode_window()
{
  add_thickbox();
?>

  <style>
    #cluster_shortcode,
    .cluster .options {
      display: none;
    }
  </style>



  <div id="cluster_shortcode">

    <div class="cluster">

      <div class="media-frame-menu">
        <div role="tablist" aria-orientation="vertical" class="media-menu">
          <h2 class="media-frame-menu-heading"><?php _e('Shortcodes', 'roach'); ?></h2>
          <a type="button" role="tab" class="shortcode-option shortcode-option-button media-menu-item"><?php _e('Buttons', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-note media-menu-item"><?php _e('Note', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-table media-menu-item"><?php _e('Comparative', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-highlight media-menu-item"><?php _e('Highlight text', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-search media-menu-item"><?php _e('Search', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-childpages media-menu-item"><?php _e('Child pages', 'roach'); ?></a>
          <a type="button" role="tab" class="shortcode-option shortcode-option-cluster2-categories media-menu-item"><?php _e('Categories', 'roach'); ?></a>

        </div>
      </div>

      <div class="cluster-right">

        <div class="cluster-descrip">
          <h1 id="h1id" class="cl-h1"><?php _e('Please select an option', 'roach'); ?></h1>
          <p class="cl-description"><?php _e('Select an option from the left menu to add a custom shortcode.', 'roach'); ?></p>
        </div>

        <!-- Buttons -->
        <div class="cluster-type add-button">

          <div class="list_options"> <span class="label"><?php _e('Button text', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <input id="roach_button_text" type="text" name="roach_button_text" placeholder="<?php _e('Ex: Download now', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Link', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <input type="text" name="roach_button_link" placeholder="<?php _e('Ex: https://wordpress.org', 'roach'); ?>" style="margin: 2px 0px 10px;">
          </div>

          <div class="list_options"> <span class="label"><?php _e('Rel Attribute', 'roach'); ?></span>
            <input id="roach_button_attr_rel" type="text" name="roach_button_attr_rel" placeholder="<?php _e('Ex:  nofollow noopener', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>


          <div class="list_options"> <span class="label"><?php _e('Target', 'roach'); ?></span>
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

          <div class="list_options"> <span class="label"><?php _e('Position', 'roach'); ?></span>
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

          <div class="list_options"> <span class="label"><?php _e('Icon', 'roach'); ?> (FontAwesome 5.14)</span>
            <input id="roach_button_icon" type="text" name="roach_button_icon" placeholder="<?php _e('Ex: fa-download', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Show container border', 'roach'); ?></span>
            <select name="roach_button_border" id="roach_button_border" style="margin: 2px 0px 10px;">
              <option value="0" selected><?php _e('No', 'roach'); ?></option>
              <option value="1"><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>

          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-btn-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>


        <!-- COMPARISON TABLE -->
        <div class="cluster-type add-table">

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

          <div class="list_options"> <span class="label"><?php _e('Background title Disadvantages', 'roach'); ?></span>
            <input id="roach_cons_color" type="color" name="roach_cons_color" value="#e63334" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Advantages Title', 'roach'); ?></span>
            <input id="roach_title_pros" type="text" name="roach_title_pros" placeholder="<?php _e('Ex: Advantages', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Advantages', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_text_pros" type="text" name="roach_text_pros" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Advantage 1&#10;Advantage 2&#10;Advantage 3&#10;', 'roach'); ?>..."></textarea>
          </div>


          <div class="list_options"> <span class="label"><?php _e('Disadvantages Title', 'roach'); ?></span>
            <input id="roach_title_cons" type="text" name="roach_title_cons" placeholder="<?php _e('Ex: Disadvantages', 'roach'); ?>" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Disadvantages', 'roach'); ?> <span>* <?php _e('Required', 'roach'); ?></span></span>
            <textarea id="roach_text_cons" type="text" name="roach_text_cons" style="resize:none; width:100%; max-width:25rem; margin: 2px 0px 10px;" rows="6" placeholder="<?php _e('Disadvantage 1&#10;Disadvantage 2&#10;Disadvantage 3&#10;', 'roach'); ?>..."></textarea>
          </div>


          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-table-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>


        <!-- Notes -->
        <div class="cluster-type add-note">

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
              <button class="button button-primary" id="shortcode-note-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>



        <!-- HIGHLIGHT -->
        <div class="cluster-type add-highlight">

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
              <button class="button button-primary" id="shortcode-highlight-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>


        <!-- Searche -->
        <div class="cluster-type add-search">

          <div class="list_options">
            <p><?php _e('With this shortcode you can insert a search box in the middle of any post or page.', 'roach'); ?></p>
          </div>

          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-search-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>


        <!-- CHILD PAGES -->
        <div class="cluster-type add-childpages">

          <div class="list_options">
            <p><?php _e('With this shortcode you can insert a cluster to display the child pages of the page you are editing.', 'roach'); ?></p>
          </div>

          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-childpages-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>



        <!-- Categories -->
        <div class="cluster-type add-cluster2-categories">

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
            <select name="roach_cluster2_order" id="roach_cluster2_oder">
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
            <input name="roach_cluster2_showpost" type="number" min="14" step="30" placeholder="<?php _e('Default: 17', 'roach'); ?>" style="margin: 2px 0px 10px;">
          </div>

          <div class="list_options"> <span class="label"><?php _e('Background color', 'roach'); ?></span>
            <input id="roach_cluster2_color_bg" type="color" name="roach_cluster2_color_bg" value="#EEEEEE" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Text color', 'roach'); ?></span>
            <input id="roach_cluster2_color_text" type="color" name="roach_cluster2_color_text" value="#181818" style="margin: 2px 0px 10px;" />
          </div>

          <div class="list_options"> <span class="label"><?php _e('Stars color', 'roach'); ?></span>
            <input id="roach_cluster2_color_stars" type="color" name="roach_cluster2_color_stars" value="#f2b01e" style="margin: 2px 0px 10px;" />
          </div>


          <div class="list_options"> <span class="label"><?php _e('Show icon', 'roach'); ?></span>
            <select name="roach_cluster2_show_icon" id="roach_cluster2_show_icon" style="margin: 2px 0px 10px;">
              <option value="no"><?php _e('No', 'roach'); ?></option>
              <option value="yes" selected><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>


          <div class="list_options"> <span class="label"><?php _e('Show stars', 'roach'); ?></span>
            <select name="roach_cluster2_show_stars" id="roach_cluster2_show_stars" style="margin: 2px 0px 10px;">
              <option value="no" selected><?php _e('No', 'roach'); ?></option>
              <option value="yes"><?php _e('Yes', 'roach'); ?></option>
            </select>
          </div>


          <div class="options">
            <div class="submit list_options">
              <button class="button button-primary" id="shortcode-cluster2-categories-submit"><?php _e('Insert shortcode', 'roach'); ?> →</button>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>



<?php }


add_action('admin_enqueue_scripts', 'add_thickbox_js');

add_action('media_buttons', 'add_thickbox_btn');
add_action('admin_footer', 'add_thickbox_window');

add_action('media_buttons', 'add_shortcode_btn');
add_action('admin_footer', 'add_shortcode_window');

?>
