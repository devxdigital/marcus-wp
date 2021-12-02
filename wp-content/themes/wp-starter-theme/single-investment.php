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
					<div class="card-body">
						<?php $format = get_post_format() ? : 'standard'; ?>
						<?php get_template_part('templates/content', 'sidebar-left'); ?>
						<div class="row related-posts">

	                        <h3>Other Available Investments</h3>
	                        <div class="col-lg-4 col-sm-4 col-12 mb-4 mb-sm-0">
	                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel1.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
	                            <h5>Hard Money Lender Moves in on Hot Phoenix Market</h5>
	                        </div>
	                        <div class="col-lg-4 col-sm-4 col-12 mb-4 mb-sm-0">
	                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel2.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
	                            <h5>From Old to New: Why Apartment Conversions are Taking the Market by Storm</h5>
	                        </div>
	                        <div class="col-lg-4 col-sm-4 col-12">
	                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel3.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
	                            <h5>Underwriting: Breaking down the Basics</h5>
	                        </div>

	                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();