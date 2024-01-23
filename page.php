<?php
/**
 * Template Name: Page Default (No Sidebar)
 * Description: Page template with no sidebar.
 *
 */

get_header();

the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'great-north' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %', 'great-north' ),
			)
		);
		edit_post_link(
			esc_attr__( 'Edit', 'great-north' ),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</div><!-- /#post-<?php the_ID(); ?> -->
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

get_footer();
