<?php get_header(); ?>

<div class="container inner-page mb-4">
	<?php //if_quick_summary(); ?>

		<div class="row g-0">
			<div class="col-12">
				<div class="inner-page-title">
					<h5><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h5>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card left-sidebar">
					<div class="card-body no-padding">
						<?php get_template_part('templates/content', 'sidebar-left'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();