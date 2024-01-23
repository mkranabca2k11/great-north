<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
	<script>
    jQuery(document).ready(function ($) {
        $('.navbar-toggler').click(function () {
            $('#navbar').toggleClass('show');
        });
    });
</script>

	<?php wp_head(); ?>
</head>

<?php
$navbar_scheme   = get_theme_mod('navbar_scheme', 'navbar-light bg-light'); // Get custom meta-value.
$navbar_position = get_theme_mod('navbar_position', 'static'); // Get custom meta-value.

$search_enabled  = get_theme_mod('search_enabled', '1'); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="wrapper">
		<header>
			<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr($navbar_scheme);
															if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top';
															elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom';
															endif;
															if (is_home() || is_front_page()) : echo ' home';
															endif; ?>">
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<?php
						$header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

						if (!empty($header_logo)) :
						?>
							<img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
						<?php
						else :
							echo esc_attr(get_bloginfo('name', 'display'));
						endif;
						?>
					</a>

					<button class="navbar-toggler">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
						</svg>
					</button>

					<div id="navbar" class="collapse navbar-collapse">
						<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'menu_class'     => 'navbar-nav me-auto',
								'container'      => '',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
								'theme_location' => 'main-menu',
							)
						);

						if ('1' === $search_enabled) :
						?>
							<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'great-north'); ?>" title="<?php esc_attr_e('Search', 'great-north'); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'great-north'); ?></button>
								</div>
							</form>
						<?php
						endif;
						?>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</nav><!-- /#header -->
		</header>

		<main id="main" class="container" <?php if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' style="padding-top: 100px;"';
											elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' style="padding-bottom: 100px;"';
											endif; ?>>
			<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if (is_single() || is_archive()) :
			?>
				<div class="row">
					<div class="col-md-8 col-sm-12">
					<?php
				endif;
					?>