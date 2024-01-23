<?php

/**
 * Template Name: Product Page
 * Description: Page template with no sidebar.
 *
 */

get_header();

the_post();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
	<?php
	the_content();
	$product_content = get_products();

	wp_link_pages(
		array(
			'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'great-north') . '">',
			'after'    => '</nav>',
			'pagelink' => esc_html__('Page %', 'great-north'),
		)
	);
	edit_post_link(
		esc_attr__('Edit', 'great-north'),
		'<span class="edit-link">',
		'</span>'
	);

	?>

	<h1><?= $product_content["product_name"] ?></h1>
	<p><?= $product_content["product_description"] ?></p>
	<p>$<?= $product_content["product_price"] ?></p>

	<?php


	?>
</div><!-- /#post-<?php the_ID(); ?> -->
<?php
// If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()) {
	comments_template();
}

get_footer();
