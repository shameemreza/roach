<?php

add_action('wp_head', 'roach_setup_schema');

function roach_setup_schema()

{

  $site_URL = home_url();
  $site_title = get_bloginfo('title');
  $site_description = get_bloginfo('description') ? get_bloginfo('description') : get_bloginfo('title');
  $site_logo_id = get_theme_mod('custom_logo');
  $site_logo = wp_get_attachment_image_src($site_logo_id, 'full');
  $videoID = '';
  if (is_single()) :
    $excerpt = wp_trim_words(get_the_excerpt());
    $post_id = get_queried_object_id();
    $post_author_id = get_post_field('post_author', $post_id);
    $post_url = get_permalink();
    $post_title = get_post_meta(get_the_ID(), 'single_bc_text', true);
    if (!$post_title) :
      $post_title = get_the_title();
    endif;
    $post_title = str_replace(array('\'', '"'), '', $post_title);

  endif;
?>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "<?php print $site_title; ?>",
      "alternateName": "<?php print $site_description; ?>",
      "url": "<?php print $site_URL; ?>"
      <?php if (has_custom_logo()) { ?>,
        "logo": "<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>"
      <?php } ?>
    }
  </script>

  <?php if ((is_single()) && (!is_attachment())) : ?>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?php the_permalink(); ?>"
        },
        "headline": "<?php print addslashes($post_title); ?>",
        <?php if (has_post_thumbnail()) : ?> "image": {
            "@type": "ImageObject",
            "url": "<?php print get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
          },
        <?php endif; ?> "author": {
          "@type": "Person",
          "name": "<?php the_author_meta('display_name', $post_author_id); ?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "<?php print $site_title; ?>"
          <?php if (has_custom_logo()) : ?>,
            "logo": {
              "@type": "ImageObject",
              "url": "<?php echo $site_logo[0]; ?>"
            }
          <?php endif;  ?>
        },
        "datePublished": "<?php echo get_the_date('Y-m-d H:i'); ?>",
        "dateModified": "<?php the_modified_date('Y-m-d H:i'); ?>"
      }
    </script>

  <?php endif; ?>


  <?php if (get_theme_mod('roach_show_search') || get_theme_mod('roach_show_search_menu')) : ?>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "<?php print $site_URL; ?>",
        "potentialAction": {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": "<?php print $site_URL; ?>/?s={s}"
          },
          "query-input": "required name=s"
        }
      }
    </script>

  <?php endif; ?>




  <?php if (is_single() || is_page()) : ?>

    <?php

    global $post;

    $enable_schema_video = get_theme_mod('roach_enable_schema_video');

    $apikey = get_theme_mod('roach_youtube_api_key');

    $content = $post->post_content;

    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $content, $match)) :

      $videoID = $match[1];

    endif;

    if (($videoID) && ($apikey) && ($enable_schema_video)) :

      $googleApiUrl =
        'https://www.googleapis.com/youtube/v3/videos?id=' . $videoID . '&key=' . $apikey . '&part=snippet';

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($ch);

      curl_close($ch);

      $data = json_decode($response);

      $value = json_decode(json_encode($data), true);

      $video_title = $value['items'][0]['snippet']['title'];
      $video_description = $value['items'][0]['snippet']['description'];
      $video_upload = $value['items'][0]['snippet']['publishedAt'];
      $video_thumb = $value['items'][0]['snippet']['thumbnails']['maxres']['url'];

      if (($video_title) && ($video_upload) && ($video_thumb)) :

    ?>

        <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "VideoObject",
            "name": "<?php echo $video_title; ?>",
            "description": "<?php echo $video_description; ?>",
            "thumbnailUrl": [
              "<?php echo $video_thumb; ?>"
            ],
            "uploadDate": "<?php echo $video_upload; ?>",
            "embedUrl": "https://www.youtube.com/embed/<?php echo $videoID; ?>"

          }
        </script>

    <?php

      endif;

    endif;

    ?>

  <?php endif; ?>

<?php } ?>
