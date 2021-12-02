<div class="row">
	<div class="col-12 col-lg-3">
		<aside role="complementary">
			<?php 
			if( is_page() ) {
				dynamic_sidebar( 'if_page' );
			} else {
				get_sidebar();
			}
			?>
		</aside>
	</div>
	<div class="col-12 col-lg-9">
		<div role="main">
		<?php if (have_posts()) : ?>

			<?php
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

			<div class="alert alert-warning" role="alert">
				<?php _e('Sorry, no results were found.', 'wp-starter-theme'); ?>
			</div>

		<?php endif; ?>
		</div>
	</div>
</div>