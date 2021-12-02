<?php get_header(); ?>

<div class="container inner-page mb-4">
	<?php // if_quick_summary(); ?>


		<div class="row g-0">
	        <div class="col-12 col-lg-3">
	            <div class="inner-page-title">
	                <h5><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h5>
	            </div>
	        </div>
	        <div class="col-12 col-lg-5">
	            <div class="inner-page-title d-none  d-md-block" style="border-right:0">
	                <h5 class="fine-print"><< PREVIOUS</h5>
	            </div>
	        </div>
	        <div class="col-12 col-lg-4">
	            <div class="inner-page-title text-end  d-none d-md-block" style="border-right:0">
	                <h5 class="fine-print">NEXT &gt;&gt;</h5>
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