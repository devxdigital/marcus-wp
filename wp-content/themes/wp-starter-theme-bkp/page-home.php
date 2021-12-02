<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<div class="row pb-4">
			<div class="col-12">
				<img class="img-fluid" src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/06/header_image_2.png" alt="Header">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="inner-page-title">
					<h5><?php _e('My Accounts', 'ignite-funding') ?></h5>
				</div>
				<div class="card account custom-border-gray">
					<div class="card-header">
						<div class="row ps-3">
							<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-start text-md-start text-lg-start text-xl-start">
								<h5 class="card-title mb-0 fw-bold">Carrie Cook</h5>
								<p class="card-text fine-print fw-bold">a single woman as her sole and separate property</p>
							</div>
							<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-start text-md-end text-lg-end text-xl-end">
								<h5 class="card-title mb-0 text-letter-spacing">7053</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if_accounts_summary(); ?>

						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
								<h5 class="card-title mb-0">CASH <span class="text-theme">|</span> Individual</h5>
								<p class="card-text fine-print">Account Type</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5 class="card-title mb-0">Active</h5>
								<p class="card-text fine-print">Account Status</p>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row ps-4">
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-10 col-lg-8">
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-info-square option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
									<a href="#">Support</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice-dollar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Taxes</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-chart-bar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Defaults</a>
									</div>
								</div>
							</div>
						</div>
						<!-- <ul class="options-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
							<li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
							<li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
							<li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
						</ul> -->
					</div>
					<div class="card-extra-footer">
						<div class="card my-3">
							<div class="card-body">
								<div class="row">
									<div class="col-1 gx-0 text-end">
										<i class="fas fa-2x fa-address-card text-theme"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<h5 class="card-title mb-0">Carrie Cook</h5>
										<p class="card-text fine-print">Authorized Primary Account Holder</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row ps-2">
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-user option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-8 col-lg-8">
												<a href="#">Edit Profile & Settings</a>
											</div>
										</div>
									</div>
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-mobile option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-6 col-lg-6">
												<a href="#">Sign up for Text Alerts</a>
											</div>
										</div>
									</div>
								</div>
								<!-- <ul class="options-list">
									<li><a href="#"><i class="fal fa-user-circle"></i> Edit Profile & Settings</a></li>
									<li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4 account custom-border-gray">
					<div class="card-header">
						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-start text-md-start text-lg-start text-xl-start">
								<h5 class="card-title mb-0 fw-bold">Hunter R. Hicks</h5>
								<p class="card-text fine-print fw-bold">minor under Nevada Uniform Act as to Transfer to Minors</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-start text-md-end text-lg-end text-xl-end">
								<h5 class="card-title mb-0 text-letter-spacing">8617</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if_accounts_summary(); ?>

						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
								<h5 class="card-title mb-0">CUSTODIAL <span class="text-theme">|</span> UTMA/UGMA</h5>
								<p class="card-text fine-print">Account Type</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5 class="card-title mb-0">Active</h5>
								<p class="card-text fine-print">Account Status</p>
							</div>
						</div>
					</div>
					<div class="card-footer">
					<div class="row ps-4">
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-10 col-lg-8">
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-info-square option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
									<a href="#">Support</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice-dollar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Taxes</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-chart-bar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Defaults</a>
									</div>
								</div>
							</div>
						</div>
						<!-- <ul class="options-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
							<li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
							<li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
							<li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
						</ul> -->
					</div>
					<div class="card-extra-footer">
						<div class="card my-3">
							<div class="card-body">
								<div class="row">
									<div class="col-1 gx-0 text-end">
										<i class="fas fa-2x fa-address-card text-theme"></i>
									</div>
									<div class="col-11">
										<h5 class="card-title mb-0">Carrie Cook</h5>
										<p class="card-text fine-print">Authorized Primary Account Holder</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row ps-2">
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-start text-md-start text-lg-start text-xl-start">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-user option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-8 col-lg-8">
												<a href="#">Edit Profile & Settings</a>
											</div>
										</div>
									</div>
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-mobile option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-6 col-lg-6">
												<a href="#">Sign up for Text Alerts</a>
											</div>
										</div>
									</div>
								</div>
								<!-- <ul class="options-list">
									<li><a href="#"><i class="fal fa-user-circle"></i> Edit Profile & Settings</a></li>
									<li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4 account custom-border-gray">
					<div class="card-header">
						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-start text-md-start text-lg-start text-xl-start">
								<h5 class="card-title mb-0 fw-bold">Eddie Vedder</h5>
								<p class="card-text fine-print fw-bold">one of the greatest singers and lyricists of all-time</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-start text-md-end text-lg-end text-xl-end">
								<h5 class="card-title mb-0 text-letter-spacing">0512</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if_accounts_summary(); ?>

						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
								<h5 class="card-title mb-0">BUSINESS <span class="text-theme">|</span> Sole Proprietorship</h5>
								<p class="card-text fine-print">Account Type</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5 class="card-title mb-0">Active</h5>
								<p class="card-text fine-print">Account Status</p>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row ps-4">
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-10 col-lg-8">
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-info-square option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
									<a href="#">Support</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice-dollar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Taxes</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-chart-bar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Defaults</a>
									</div>
								</div>
							</div>
						</div>
						<!-- <ul class="options-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
							<li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
							<li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
							<li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
						</ul> -->
					</div>
					<div class="card-extra-footer">
						<div class="card my-3">
							<div class="card-body">
								<div class="row">
									<div class="col-1 gx-0 text-end">
										<i class="fas fa-2x fa-address-card text-theme"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<h5 class="card-title mb-0">Carrie Cook</h5>
										<p class="card-text fine-print">Authorized Secondary Account Holder</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row ps-2">
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-start text-md-start text-lg-start text-xl-start">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-user option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-8 col-lg-8">
												<a href="#">Edit Profile & Settings</a>
											</div>
										</div>
									</div>
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-mobile option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-6 col-lg-6">
												<a href="#">Sign up for Text Alerts</a>
											</div>
										</div>
									</div>
								</div>
								<!-- <ul class="options-list">
									<li><a href="#"><i class="fal fa-user-circle"></i> Edit Profile & Settings</a></li>
									<li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4 account custom-border-gray">
					<div class="card-header">
						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-start text-md-start text-lg-start text-xl-start">
								<h5 class="card-title mb-0 fw-bold">Frank Lloyd Wright</h5>
								<p class="card-text fine-print fw-bold">one of the most accomplished acrhitects of all time</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-start text-md-end text-lg-end text-xl-end">
								<h5 class="card-title mb-0 text-letter-spacing">7945</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if_accounts_summary(); ?>

						<div class="row">
							<div class="ps-4 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
								<h5 class="card-title mb-0">BUSINESS <span class="text-theme">|</span> Sole Proprietorship</h5>
								<p class="card-text fine-print">Account Type</p>
							</div>
							<div class="ps-4 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5 class="card-title mb-0">Active</h5>
								<p class="card-text fine-print">Account Status</p>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row ps-4">
							<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 text-start text-md-center text-lg-center text-xl-start">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-10 col-lg-8">
										<a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 text-start text-md-center text-lg-center text-xl-start">
								<div class="row">
									<div class="col-1">
										<i class="fal fa-info-square option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
									<a href="#">Support</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 text-start text-md-center text-lg-center text-xl-start">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-file-invoice-dollar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Taxes</a>
									</div>
								</div>
							</div>
							<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 text-start text-md-center text-lg-center text-xl-start">
								
								<div class="row">
									<div class="col-1">
										<i class="fal fa-chart-bar option-list-icon"></i>
									</div>
									<div class="col-11 col-xl-8 col-lg-8">
										<a href="#"> Defaults</a>
									</div>
								</div>
							</div>
						</div>
						<!-- <ul class="options-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
							<li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
							<li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
							<li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
						</ul> -->
					</div>
					<div class="card-extra-footer">
						<div class="card my-3">
							<div class="card-body">
								<div class="row">
									<div class="col-1 gx-0 text-end">
										<i class="fas fa-2x fa-address-card text-theme"></i>
									</div>
									<div class="col-11 ">
										<h5 class="card-title mb-0">Carrie Cook</h5>
										<p class="card-text fine-print">Interested Party, Limited Power of Attorney</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row ps-2">
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-user option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-8 col-lg-8">
												<a href="#">Edit Profile & Settings</a>
											</div>
										</div>
									</div>
									<div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="row">
											<div class="col-1">
												<i class="fal fa-mobile option-list-icon"></i> 
											</div>
											<div class="col-10 col-xl-6 col-lg-6">
												<a href="#">Sign up for Text Alerts</a>
											</div>
										</div>
									</div>
								</div>
								<!-- <ul class="options-list">
									<li><a href="#"><i class="fal fa-user-circle"></i> Edit Profile & Settings</a></li>
									<li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="inner-page-title">
					<h5 class="my-1">News & Updates</h5>
				</div>
				<div class="card mb-4">
					<div id="newsUpdatesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-keyboard="false" data-bs-touch="false" data-bs-interval="5000">
						<div class="card-body">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
									<div class="">
										<h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 1?</h5>
										<p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
									</div>
								</div>
								<div class="carousel-item">
									<img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
									<div class="">
										<h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 2?</h5>
										<p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
									</div>
								</div>
								<div class="carousel-item">
									<img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
									<div class="">
										<h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 3?</h5>
										<p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
									</div>
								</div>
								<div class="carousel-item">
									<img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
									<div class="">
										<h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 4?</h5>
										<p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-6">
									<div class="carousel-indicators">
										<button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
										<button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="1"></button>
										<button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="2"></button>
										<button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="3"></button>
									</div>
								</div>
								<div class="col-6 text-end">
									<a href="#">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="inner-page-title">
					<h5 class="my-1">Like Us?</h5>
				</div>
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<h5 class="card-title" style="font-size: 19px;">Referrals</h5>
								<h6 class="fw-bold text-theme">Know someone interested in investing at Ignite Funding?</h6>
								<p class="card-text mt-4 text-spacing">Earn $100 the first time your collegue invests with us.</p>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<h5 class="card-title" style="font-size: 19px">Reviews</h5>
								<h6 class="fw-bold text-theme">Please leave your review of our services / products.</h6>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-end">
								<p class="card-text mt-3" style="font-size: 12px"><a href="#">Learn More</a></p>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=FB">
								<img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=G">
								<img class="rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=BBB">
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-4 audited">
					<div class="card-body">
						<h5 class="my-0"><i class="fal fa-file-spreadsheet fa-2x me-3 align-middle text-theme"></i> Audited Ignite Funding Financials</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();