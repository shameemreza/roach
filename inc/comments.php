<?php
	function roach_enable_threaded_comments() {
		if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'get_header', 'roach_enable_threaded_comments' );
	
	add_filter('comment_form_default_fields','roach_disable_url_comment');
	function roach_disable_url_comment($fields) { 
		if ( ! get_theme_mod('roach_show_comments_url') ) {
			unset($fields['url']);
			return $fields;
		}
	}
	
	add_filter( 'comment_form_defaults', 'roach_modify_fields_form' );
	function roach_modify_fields_form( $args ){
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " required " : '' );
		$author = '<input placeholder="'.__( 'Name' ) . ( $req ? ' *' : '' ).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' />';
		$email = '<div class="fields-wrap"><input placeholder="'.__( 'Email' ) . ( $req ? ' *' : '' ).'" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' />';	
		$url = '<div class="fields-wrap"><input placeholder="'.__( 'URL' ).'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" />';
		$comment = '<textarea placeholder="'. _x( 'Comment', '' ).'" id="comment" name="comment" cols="45" rows="5" required></textarea>';
	
		$args['fields']['author'] = $author;
		$args['fields']['email'] = $email;
		
		if ( get_theme_mod('roach_show_comments_url') ) {
		$args['fields']['url'] = $url;
		}
		
		$args['comment_field'] = $comment;
		return $args;
	}

	add_filter( 'comment_form_fields', 'roach_modify_order_fields' );	
	function roach_modify_order_fields( $fields ){
		$val = $fields['comment'];
		unset($fields['comment']);
		$fields += array('comment' => $val );
		return $fields;
	}
