<?php

function roach_insert_google_fonts()
{
	
	$options_fonts = get_theme_mod('roach_options_fonts');
	
	if ( ! $options_fonts ) { $options_fonts = 1; }
	
	if ( $options_fonts == 1 ) :
		
		$roach_font_text = get_theme_mod('roach_font_text');
		$roach_font_title = get_theme_mod('roach_font_title');
		$roach_font_loop = get_theme_mod('roach_font_loop');

		if ( ! $roach_font_text ) : $roach_font_text = 'Poppins.300'; endif;
		if ( ! $roach_font_title ) : $roach_font_title = 'Poppins.400'; endif;
		if ( ! $roach_font_loop ) : $roach_font_loop = 'Poppins.300'; endif;
		
		$text = explode('.', $roach_font_text);
		$title = explode('.', $roach_font_title);
		$loop = explode('.', $roach_font_loop);

		$text_font = $text[0];
		$title_font = $title[0];
		$loop_font = $loop[0];

		$text_weight = $text[1];
		$title_weight = $title[1];
		$loop_weight = $loop[1];

		$title_font = strtr($title_font, " ", "+");
		$text_font = strtr($text_font, " ", "+");
		$loop_font = strtr($loop_font, " ", "+");

		$family1 = '';
		$family2 = '';
		$family3 = '';

		if (($text_font == $title_font) && ($text_font == $loop_font)):

			$font1 = $text_font;

			$weights = array();

			$weights[0] = $text_weight;

			$weights[1] = $title_weight;

			$weights[2] = $loop_weight;

			$weights[3] = 700;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight1 = $weights[0];
				break;

			case 2:
				$weight1 = $weights[0] . ';' . $weights[1];
				break;

			case 3:
				$weight1 = $weights[0] . ';' . $weights[1] . ';' . $weights[2];
				break;

			case 4:
				$weight1 = $weights[0] . ';' . $weights[1] . ';' . $weights[2] . ';' . $weights[3];
				break;

			endswitch;

			$family1 = 'family=' . $font1 . ':wght@' . $weight1 . '';

		elseif (($text_font == $title_font) && ($text_font != $loop_font)):

			$font1 = $text_font;

			$weights = array();

			$weights[0] = $text_weight;

			$weights[1] = $title_weight;

			$weights[2] = 700;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight1 = $weights[0];
				break;

			case 2:
				$weight1 = $weights[0] . ';' . $weights[1];
				break;

			case 3:
				$weight1 = $weights[0] . ';' . $weights[1] . ';' . $weights[2];
				break;

			endswitch;

			$font2 = $loop_font;

			$weight2 = $loop_weight;

			$family1 = 'family=' . $font1 . ':wght@' . $weight1 . '';

			$family2 = '&family=' . $font2 . ':wght@' . $weight2 . '';

		elseif (($text_font == $loop_font) && ($text_font != $title_font)):

			$font1 = $text_font;

			$weights = array();

			$weights[0] = $text_weight;

			$weights[1] = $loop_weight;

			$weights[2] = 700;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight1 = $weights[0];
			break;

			case 2:
				$weight1 = $weights[0] . ';' . $weights[1];
				break;

			case 3:
				$weight1 = $weights[0] . ';' . $weights[1] . ';' . $weights[2];
				break;

			endswitch;

			$font2 = $title_font;

			$weight2 = $title_weight;

			$family1 = 'family=' . $font1 . ':wght@' . $weight1 . '';

			$family2 = '&family=' . $font2 . ':wght@' . $weight2 . '';

		elseif (($title_font == $loop_font) && ($title_font != $text_font)):

			$font1 = $title_font;

			$weights = array();

			$weights[0] = $title_weight;

			$weights[1] = $loop_weight;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight1 = $weights[0];
				break;

			case 2:
				$weight1 = $weights[0] . ';' . $weights[1];
				break;

			endswitch;
			
			$font2 = $text_font;

			$weight2 = $text_weight;

			$weights = array();

			$weights[0] = $text_weight;

			if ($bold_weight):

				$weights[1] = $bold_weight;

			else:

				$weights[1] = 700;

			endif;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight2 = $weights[0];
				break;

			case 2:
				$weight2 = $weights[0] . ';' . $weights[1];
				break;

			endswitch;

			$family1 = 'family=' . $font1 . ':wght@' . $weight1 . '';

			$family2 = '&family=' . $font2 . ':wght@' . $weight2 . '';

		else:

			$weights = array();

			$weights[0] = $text_weight;
	
			$weights[1] = 700;

			$weights = array_values(array_unique($weights));

			sort($weights);

			$count = count($weights);

			switch ($count):

			case 1:
				$weight1 = $weights[0];
			break;

			case 2:
				$weight1 = $weights[0] . ';' . $weights[1];
			break;

			endswitch;

			$family1 = 'family=' . $text_font . ':wght@' . $weight1 . '';

			$family2 = '&family=' . $title_font . ':wght@' . $title_weight . '';

			$family3 = '&family=' . $loop_font . ':wght@' . $loop_weight . '';

		endif;

		$fonts = 'https://fonts.googleapis.com/css2?' . $family1 . $family2 . $family3 . '&display=swap';

		if ($fonts)
		{
			wp_enqueue_style('roach-google-fonts', $fonts, array() , null);
		}

	endif;

}

add_action("wp_enqueue_scripts", "roach_insert_google_fonts");
