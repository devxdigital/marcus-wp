<?php get_header(); ?>

<div class="container inner-page mb-4">
		<div class="row">
			<div class="col">
				<h5>Quick Summary</h5>
			</div>
		</div>
		<div class="row g-0 mb-4 summary">
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card text-white text-center">
					<div class="card-body">
						<h3 class="mb-0">$39,534.08</h3>
						<p class="card-text fine-print">Loans Funded</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card text-white text-center">
					<div class="card-body">
						<h3 class="mb-0">$15,000.00</h3>
						<p class="card-text fine-print">Pledges</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card text-white text-center">
					<div class="card-body">
						<h3 class="mb-0">$153,235.21</h3>
						<p class="card-text fine-print">Remaining Balance Available to Invest</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card text-white text-center">
					<div class="card-body">
						<h3 class="mb-0">$83,000.00</h3>
						<p class="card-text fine-print">Interest Earned to Date</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row g-0">
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="inner-page-title">
					<h5><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h5>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="card left-sidebar">
					<div class="card-body">
						<?php get_template_part('templates/content', 'sidebar-left'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();