<?php

add_action('wp_head', 'roach_fonts_local');

function roach_fonts_local()
{

  $options_fonts = get_theme_mod('roach_options_fonts');

  if (!$options_fonts) {
    $options_fonts = 1;
  }

  if ($options_fonts == 2) {

    $roach_font_text = get_theme_mod('roach_font_text');
    $roach_font_title = get_theme_mod('roach_font_title');
    $roach_font_loop = get_theme_mod('roach_font_loop');

    if (!$roach_font_text) :
      $roach_font_text = 'Poppins.300';
    endif;
    if (!$roach_font_title) :
      $roach_font_title = 'Poppins.400';
    endif;
    if (!$roach_font_loop) :
      $roach_font_loop = 'Poppins.300';
    endif;

    $array = array(
      $roach_font_text,
      $roach_font_title,
      $roach_font_loop
    );

    $array = array_unique($array);

    $longitud = count($array);

?>

    <style>
      <?php

      $output = '';

      for ($i = 0; $i < $longitud; $i++) {


        $item = $array[$i];

        $item = explode('.', $item);

        $name = $item[0];

        $weight = $item[1];

        $url_convert = strtr($name, " ", "-");

        $url_name = strtolower($url_convert);

        $output .= '@font-face {';
        $output .= 'font-family: "' . $name . '";';
        $output .= 'font-style: normal;';
        $output .= 'font-weight: ' . $weight . ';';
        $output .= 'src: local(""),';
        $output .= 'url("' . get_stylesheet_directory_uri() . '/assets/fonts/' . $url_name . '-' . $weight . '.woff2") format("woff2"), ';
        $output .= 'url("' . get_stylesheet_directory_uri() . '/assets/fonts/' . $url_name . '-' . $weight . '.woff") format("woff"); ';
        $output .= 'font-display: swap;';
        $output .= '}';
        $output .= ' ';
      }

      echo $output;

      ?>
    </style>

<?php

  }
}

?>
