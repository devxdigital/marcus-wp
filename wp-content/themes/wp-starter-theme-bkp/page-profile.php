<?php /* Template Name: Profile & Settings */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<?php if_quick_summary(); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="inner-page-title">
					<h5 class="mb-0 ms-1">Profile & Settings</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header p-4 ps-1">
						<div class="row">
							<div class="col-8">
								<div class="row">
									<div class="col-1 text-end">
										<i class="fas fa-2x fa-address-card text-theme"></i>
									</div>
									<div class="col-11 gx-0 col-xl-8 col-lg-8">
										<h5 class="card-title mb-0">Carrie Cook</h5>
									</div>
								</div>
							</div>
							<div class="col-4 text-end">
								<a href="#">Change password</a>
							</div>
						</div>
					</div>
					<div class="card-body p-0">
						<div class="row g-0 border">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end">
								<div class="row g-0 ps-3 pt-3 pb-3 border-bottom profile-active-member">
									<div class="col-6">
										<h5 class="card-title bold-text">Carrie Cook (Self)</h5>
										<p class="profile-sub-title">Authorized Primary Contact Information</p>
									</div>
									<div class="d-flex justify-content-end align-items-center col-6 text-end pe-4">
										<span class="profile-edit-button" style="color: #8FAD52; ">Editing</span>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
									<div class="col-6">
										<h5 class="card-title bold-text">Hunter R. Hicks</h5>
										<p class="profile-sub-title">Authorized Primary Contact Information</p>
									</div>
									<div class="d-flex g-0 justify-content-end align-items-center col-6 text-end pe-4">
										<span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
									<div class="col-6">
										<h5 class="card-title bold-text">Eddie Vedder</h5>
										<p class="profile-sub-title">Authorized Primary Contact Information</p>
									</div>
									<div class="d-flex justify-content-end align-items-center col-6 text-end pe-4">
										<span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
									<div class="col-6">
										<h5 class="card-title bold-text">Frank Lloyd Wright</h5>
										<p class="profile-sub-title">Authorized Primary Contact Information</p>
									</div>
									<div class="d-flex justify-content-end align-items-center col-6 text-end pe-4">
										<span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
									</div>
								</div>
							</div>
							<!-- right side -->

							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end">
								<div class="row g-0 border-bottom ps-5 pt-3 pb-3">
									<div class="col-6">
										<h5 class="card-title">Carrie Cook</h5>
										<p class="profile-sub-title">Name</p>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-5 pt-3 pb-3">
									<div class="col-6">
										<h5 class="card-title">702-222-2222</h5>
										<p class="profile-sub-title">Phone</p>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-5 pt-3 pb-3">
									<div class="col-6">
										<h5 class="card-title bold-text">ccook@ignitefunding.com</h5>
										<p class="profile-sub-title">Email</p>
									</div>
								</div>
								<div class="row g-0 border-bottom ps-5 pt-3 pb-3">
									<div class="col-6">
										<h5 class="card-title bold-text">2140 E Pebble Road Suite 160 Las Vegas, NV 89123</h5>
										<p class="profile-sub-title">Mailing Address</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<ul class="options-list">
									<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
									<li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
									<li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
									<li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();