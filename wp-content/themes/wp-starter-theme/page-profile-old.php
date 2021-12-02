<?php /* Template Name: Profile & Settings */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<?php if_quick_summary(); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="inner-page-title">
					<h5 class="mb-0">Profile & Settings</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-8">
								<h5 class="card-title mb-0">Carrie Cook</h5>
								<p class="card-text fine-print">a single woman as her sole and separate property</p>
							</div>
							<div class="col-4 text-end">
								<h5 class="card-title mb-0 font-monospace">7053</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<div class="row mb-4">
									<div class="col-4">
										<h5 class="card-title mb-0">$31,882.95</h5>
										<p class="card-text fine-print">Account Balance</p>
									</div>
									<div class="col-4">
										<h5 class="card-title mb-0">Individual</h5>
										<p class="card-text fine-print">Account Type</p>
									</div>
									<div class="col-4">
										<h5 class="card-title mb-0">Active</h5>
										<p class="card-text fine-print">Account Status</p>
									</div>
								</div>
								<div class="row mb-3">
									<label for="currentPassword" class="col-sm-6 col-form-label col-form-label-lg text-end">Current Password</label>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-lg" id="currentPassword">
									</div>
								</div>
								<div class="row mb-3">
									<label for="newPassword" class="col-sm-6 col-form-label col-form-label-lg text-end">New Password</label>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-lg" id="newPassword">
									</div>
								</div>
								<div class="row mb-3">
									<label for="confirmPassword" class="col-sm-6 col-form-label col-form-label-lg text-end">Confirm New Password</label>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-lg" id="confirmPassword">
									</div>
								</div>
								<div class="row text-end">
									<div class="col-12">
										<button type="submit" class="btn btn-theme">Update Password</button>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="row mb-3">
									<div class="col-6">
										<h5 class="card-title mb-0">702-555-5555</h5>
										<p class="card-text fine-print">Phone</p>
									</div>
									<div class="col-6 text-end">
										<div class="form-check form-switch">
											<input class="form-check-input float-end" type="checkbox" id="flexSwitchCheckChecked" checked>
										</div>
										<p class="card-text fine-print">Text Alerts</p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-12">
										<h5 class="card-title mb-0">ccook@ignitefunding.com</h5>
										<p class="card-text fine-print">Email</p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-12">
										<h5 class="card-title mb-0">2140 E Pebble Road<br/>Suite 160<br/>Las Vegas, NV, 89123</h5>
										<p class="card-text fine-print">Mailing Address</p>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-12">
										<h5 class="card-title mb-0">ccook1281</h5>
										<p class="card-text fine-print">Username</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<ul class="horizontal-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements</a></li>
							<li><a href="#">Previous Investments</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();