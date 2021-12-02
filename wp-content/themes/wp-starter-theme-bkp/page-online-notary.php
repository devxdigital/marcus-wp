<?php /* Template Name: Online Notray Scheduling */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<?php if_quick_summary(); ?>

		<div class="row g-0">
			<div class="col-12">
				<div class="inner-page-title">
					<h5>Jump to...</h5>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card left-sidebar">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-lg-3">
								<div class="list-group list-group-flush left-menu">
									<a class="list-group-item d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
										<h5>Account Detail</h5>
										<span class="text-theme"><i class="fas fa-plus"></i></span>
									</a>
									<div class="collapse show list-group-submenu" id="collapseExample">
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Carrie Cook <span class="font-monospace float-end">7053<span></a>
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Hunter R. Hicks <span class="font-monospace float-end">8617<span></a>
									</div>
									<a class="list-group-item d-flex justify-content-between align-items-center" href="#">
										<h5>Available Investments</h5>
									</a>
									<a class="list-group-item d-flex justify-content-between align-items-center" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/news-updates/">
										<h5>News & Updates</h5>
									</a>
									<a class="list-group-item d-flex justify-content-between align-items-center" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/">
										<h5>My Information</h5>
									</a>
									<a class="list-group-item d-flex justify-content-between align-items-center" href="#">
										<h5>Referrals</h5>
									</a>
									<div class="list-group-item">
										<a href="#"><h5 class="mb-3">Reviews</h5></a>
										<img class="me-3" src="https://via.placeholder.com/38/67a102/ffffff/?text=FB">
										<img class="me-3" src="https://via.placeholder.com/38/67a102/ffffff/?text=G">
										<img class="" src="https://via.placeholder.com/38/67a102/ffffff/?text=BBB">
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-9">
								<h1>ONLINE NOTARY SCHEDULING</h1>
								<h5>Ready to Have Your Loan Documents Notarized?</h5>
								<p>
									Our customer loan services do not stop after you place money on an investment at Ignite Funding. After an investment has recorded, the Ignite Funding Loan Servicing Department will address any questions you may have in relation to monthly interest payments, account statements, and other payment-related matters.
								</p>
								<p>
								An Investment Representative or a member of the Investor Relations team will maintain active communications with you regarding investment payoffs and new opportunities as they become available.
								</p>
								<div class="row mt-4">
									<div class="col-12 col-lg-6">
										<input type="text" class="form-control form-control-lg" placeholder="First Name">
									</div>
									<div class="col-12 col-lg-6">
										<input type="text" class="form-control form-control-lg" placeholder="Last Name">
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-12 col-lg-6">
										<input type="email" class="form-control form-control-lg" placeholder="Email">
									</div>
									<div class="col-12 col-lg-6">
										<input type="tel" class="form-control form-control-lg" placeholder="Phone">
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-12 col-lg-6">
										<select class="form-select form-control-lg">
											<option disabled selected>Select Date</option>
										</select>
									</div>
									<div class="col-12 col-lg-6">
										<select class="form-select form-control-lg">
											<option disabled selected>Select Time</option>
										</select>
									</div>
								</div>
								<div class="row mt-5">
									<div class="col-12 text-end">
										<button type="submit" class="btn btn-theme">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();