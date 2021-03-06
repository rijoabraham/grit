<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package grit
 */

if ( ! function_exists( 'grit_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function grit_posted_on() 
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) 
		{
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'grit' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'grit' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="date-article">' . $time_string . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'grit_entry_category' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function grit_entry_category() 
	{
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) 
		{
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'grit' ) );
			if ( $categories_list ) 
			{
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html( '%1$s', 'grit' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			
		}

	}
endif;

/*t section*/


if ( ! function_exists( 'grit_entry_tag' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function  grit_entry_tag () 
	{
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) 
		{
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'grit' ) );
			if ( $tags_list ) 
			{
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html( '%1$s', 'grit' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

	}
endif;


if ( ! function_exists( 'grit_admin_edit_link' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function grit_admin_edit_link() 
	{
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) 
		{
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'grit' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'grit' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/*count section*/
if ( ! function_exists( 'grit_get_section_counter_data' ) ) 
{
    /**
     * Get counter data
     *
     * @return array
     */
    function grit_get_section_counter_data()
    {
        $boxes = get_theme_mod('grit_counter_setting');
        if (is_string($boxes)) 
		{
            $boxes = json_decode($boxes, true);
        }
        if (empty($boxes) || !is_array($boxes)) 
		{
            $boxes = array();
        }
        return $boxes;
    }
}

if ( ! function_exists( 'grit_get_media_url' ) ) 
{
    function grit_get_media_url($media = array())
    {
        $media = wp_parse_args($media, array('url' => '', 'id' => ''));
        $url = '';
        if ($media['id'] != '') 
		{
            $url = wp_get_attachment_url($media['id']);
        }
        if ($url == '' && $media['url'] != '') 
		{
            $url = $media['url'];
        }
        return $url;
    }
}

if ( ! function_exists( 'grit_get_section_about_data' ) ) 
{
    /**
     * Get counter data
     *
     * @return array
     */
    function grit_get_section_about_data()
    {
        $boxes = get_theme_mod('grit_about_boxes');
        if (is_string($boxes)) 
		{
            $boxes = json_decode($boxes, true);
        }
        if (empty($boxes) || !is_array($boxes)) 
		{
            $boxes = array();
        }
        return $boxes;
    }
}


if ( ! function_exists( 'grit_get_section_process' ) ) 
{
    /**
     * Get counter data
     *
     * @return array
     */
    function grit_get_section_process()
    {
        $boxes = get_theme_mod('grit_process_boxes');
        if (is_string($boxes)) 
		{
            $boxes = json_decode($boxes, true);
        }
        if (empty($boxes) || !is_array($boxes)) 
		{
            $boxes = array();
        }
        return $boxes;
    }
}
/*check button*/
if ( ! function_exists( 'grit_is_selective_refresh' ) ) {
    function grit_is_selective_refresh()
    {
        return isset($GLOBALS['grit_is_selective_refresh']) && $GLOBALS['grit_is_selective_refresh'] ? true : false;
    }
}

/*for font*/

function grit_customizer_library_get_default( $setting ) {

	$customizer_library = Grit_Customizer_Library::Instance();
	$options = $customizer_library->get_options();

	if ( isset( $options[$setting]['default'] ) ) {
		return $options[$setting]['default'];
	}

}

