<?php /* Template Name: Referrals */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<?php if_quick_summary(); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="inner-page-title">
					<h5>Referrals</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h6 class="text-theme">Know someone interested in investing at Ignite Funding?</h6>
								<p>Earn $100 the first time your collegue invests with us.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="my-3">
									<input class="form-control form-control-lg" type="text" placeholder="Referee Phone">
								</div>
							</div>
							<div class="col-6">
								<div class="my-3">
									<input class="form-control form-control-lg" type="text" placeholder="Referee Email">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row my-4">
							<div class="col text-center">
								<button type="submit" class="btn btn-theme">Submit Referral</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();