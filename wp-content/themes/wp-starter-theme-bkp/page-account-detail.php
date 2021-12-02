<?php /* Template Name: Account Detail */ ?>

<?php get_header(); ?>

	<div class="container inner-page mb-4">
		<?php if_quick_summary(); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="inner-page-title">
					<h5>Statements</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-4 col-lg-8">
								<h5 class="card-title mb-0">Carrie Cook</h5>
								<p class="card-text fine-print">a single woman as her sole and separate property</p>
							</div>
							<div class="col-4 col-lg-2 text-end">
								<h5 class="card-title mb-0">Individual</h5>
								<p class="card-text fine-print">Account Type</p>
							</div>
							<div class="col-4 col-lg-2 text-end">
								<h5 class="card-title mb-0 font-monospace">7053</h5>
								<p class="card-text fine-print">Account Number</p>
							</div>
						</div>
					</div>
					<div class="card-sub-header text-end">
						<ul class="horizontal-list">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements</a></li>
							<li><a href="#">Previous Investments</a></li>
						</ul>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="row mb-4">
									<div class="col-12">
										<p class="fine-print mb-1">Start Date</p>
										<h3 class="mb-0 text-secondary"><span id="startDateDisplay">October 1, 2020</span> <i class="fal fa-calendar-alt ms-2 text-theme"></i></h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-12">
										<div id='startDate'></div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="row mb-4">
									<div class="col-12">
										<p class="fine-print mb-1">End Date</p>
										<h3 class="mb-0 text-secondary"><span id="endDateDisplay">October 31, 2020</span> <i class="fal fa-calendar-alt ms-2 text-theme"></i></h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-12">
										<div id='endDate'></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Sorin Work !--->
						<div class="row" id="reportResults">
							<div class="col-12 report-header">
								<div class="row">
									<div class="col-6 header-tab active">
										<div class="description">Currently viewing</div>
										<h3>Account Statement Overview</h3>
									</div>
									<div class="col-6 header-tab text-right">
										<div class="description">Switch View to</div>
										<h3>Investment Allocation</h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-6 investment-table">
										<table class="table table-striped">
											<thead class="table-dark">
											<tr>
											   <th>INVESTMENT SUMMARY</th>
											   <th></th>
											</tr>
											</thead>
											<tbody>
											  <tr>
											     <td>Beginning Investment Principal Balance <i class="fal fa-question-circle"></i></td>
											     <td>$370.000.00</td>
											  </tr>
											  <tr>
											     <td>Principal Pay Downs/Payoffs on Loans <i class="fal fa-question-circle"></i></td>
											     <td>$120.000.00</td>
											  </tr>
											  <tr>
											     <td>Principal Invested/Funded on Loans <i class="fal fa-question-circle"></i></td>
											     <td>$70.000.00</td>
											  </tr>
											  <tr>
											     <td>Ending Invested Principal Balance <i class="fal fa-question-circle"></i></td>
											     <td>$320.000.00</td>
											  </tr>
											  <tr>
											     <td>&nbsp;</td>
											     <td>&nbsp;</td>
											  </tr>
											</tbody>
										</table>
									</div>
									<div class="col-6 principal-interest-table">
										<table class="table table-striped">
											<thead class="table-dark">
											<tr>
											   <th>PRINCIPAL SUMMARY</th>
											   <th></th>
											</tr>
											</thead>
											<tbody>
											  <tr>
											     <td>Principal Held in Trust Pending Investment Funding <i class="fal fa-question-circle"></i></td>
											     <td>$50.000.00</td>
											  </tr>
											  <tr>
											     <td>Principal Not Reinvested from Pay Downs/Payoffs <i class="fal fa-question-circle"></i></td>
											     <td>$0.00</td>
											  </tr>
											</tbody>
										</table>
										<table class="table table-striped">
											<thead class="table-dark">
											<tr>
											   <th>INTEREST SUMMARY</th>
											   <th></th>
											</tr>
											</thead>
											<tbody>
											  <tr>
											     <td>Interest Paied This Period <i class="fal fa-question-circle"></i></td>
											     <td>$3.700.00</td>
											  </tr>
											  <tr>
											     <td>Interest Earned Life to Date <i class="fal fa-question-circle"></i></td>
											     <td>$126.000.00</td>
											  </tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-6 investment-chart">
										<div class="chart-head">
											<h4>Current Investment Diversity</h4>
										</div>
										<div class="chart"></div>
									</div>
									<div class="col-6 return-chart">
										<div class="chart-head">
											<h4>Investment Returns</h4>
										</div>
										<div class="chart"></div>
									</div>
									<div class="col-6 borrowers-table table-responsive">
										<table class="table table-borderless">
										  <thead>
										    <tr>
										      <th scope="col">Borrowers</th>
										      <th scope="col">States</th>
										      <th scope="col">Loan Types</th>
										      <th scope="col">Loan Subtypes</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										      <td>Harmony 461, LCC</td>
										      <td>UT</td>
										      <td>Development</td>
										      <td>Residential - Finished lots</td>
										    </tr>
										    <tr>
										      <td>Gold Rose Construction, LCC</td>
										      <td>CA</td>
										      <td>Development</td>
										      <td>Residential - Partialy improved lots</td>
										    </tr>
										    <tr>
										      <td>GGD Oakdake, LCC</td>
										      <td>CO</td>
										      <td>Development</td>
										      <td>Commercial - Existing strucutre</td>
										    </tr>
										    <tr>
										      <td>400E Patrick Lane, LCC</td>
										      <td>NV</td>
										      <td>Development</td>
										      <td>Residential -Unimproved land</td>
										    </tr>
										    <tr>
										      <td>Midway Heritage Development, LCC</td>
										      <td>NV</td>
										      <td>Acquisition</td>
										      <td>Residential -Unimproved land</td>
										    </tr>
										    <tr>
										      <td>Village At St. Rose, LCC</td>
										      <td>NC</td>
										      <td>Development</td>
										      <td>Commercial -Unimproved land</td>
										    </tr>
										  </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /Sorin Work/ !--->
						<div class="row">
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-theme">Generate Report</button>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<ul class="horizontal-list text-center text-sm-center text-md-center text-lg-end text-xl-end">
							<li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements</a></li>
							<li><a href="#">Previous Investments</a></li>
						</ul>
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