<?php /* Template Name: Tax Information */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<div class="row">
			<div class="col-sm-12">
				<div class="inner-page-title">
					<h5 class="ps-2">Taxes</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body ps-0 pe-0">
						<div class="row ps-4 pe-4 pb-3">
							<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-start text-md-start text-lg-start text-xl-start">
								<h5 class="card-title mb-0 fw-bold">Carrie Cook</h5>
								<p class="card-text fine-print">a single woman as her sole and separate property</p>
							</div>
							<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-start text-md-end text-lg-end text-xl-end">
								<h5 class="card-title mb-0 text-letter-spacing">7053</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
						<div class="row-fluid">
							<?php if_quick_summary(); ?>
						</div>
						<div class="row gx-0">
							<div class="col-6">
								<div class="my-3">
									<select id="account" class="form-select form-select-lg" style="font-size: 32px; color: gray">
										<option>Select Account</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="my-3">
									<select id="taxYear" class="form-select form-select-lg" style="font-size: 32px; color: gray">
										<option>Select Tax Year</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-6 text-end">
								<button type="submit" class="btn btn-theme">1099</button>
							</div>
							<div class="col-6">
								<button type="submit" class="btn btn-theme">K1</button>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row d-flex align-items-center mt-4">
							<div class="col-6">
								<p class="fine-print fw-bold">
									Note: Tax documents will open in a new browser window/tab using Adobe Acrobat.<br/>
									If you are prompted to open/save the document, choose "open".<br/>
									You will then be able to save or print the document from within the browser window.
								</p>
							</div>
							<div class="col-6 text-end">
								<a href="https://get.adobe.com/reader/" target="_blank" class="text-dark">
									<h5>
										<span class="image"><img class="" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/adobe-acrobat-reader-logo.png' ?>"></span>
										<span class="text">Get Adobe Acrobat Reader</span>
									</h5>
								</a>
							</div>
						</div>
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