			<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if (is_single() || is_archive()) :
			?>
				</div><!-- /.col -->

				<?php
				get_sidebar();
				?>

				</div><!-- /.row -->
			<?php
			endif;
			?>
			</main><!-- /#main -->
			<footer id="footer">
				<div class="container">
					<div class="row">

						<div class="col-md-12">
							<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
								<?php

								if (is_active_sidebar('third_widget_area')){
								?>
									<div style="height: 100px; width: 100px;">
									<?php dynamic_sidebar('third_widget_area'); ?>
									</div>
								<?php
								}
								?>
							</a>
						</div>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</footer><!-- /#footer -->
			</div><!-- /#wrapper -->
			<?php
			wp_footer();
			?>
			</body>

			</html>