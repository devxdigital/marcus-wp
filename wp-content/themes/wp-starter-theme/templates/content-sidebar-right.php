<div class="row">

	<div class="col-md-9">
		<div role="main">

			<?php if (have_posts()) : ?>

				<?php //if is on a single post load content template, if not load loop template
				if(is_page() || is_single()){

					get_template_part('templates/content', get_post_type());

				}else{
					while (have_posts()){
						the_post();
						get_template_part('templates/loop');
					}

					do_action('ns_show_pagination');
				}


				?>

			<?php else: ?>

				<div class="alert alert-warning">
					<?php _e('Sorry, no results were found.', 'wp-starter-theme'); ?>
				</div>

			<?php endif; ?>

		</div>
	</div>

	<div class="col-md-3">
		<aside role="complementary">
			<?php get_sidebar();?>
		</aside>
	</div>

</div>