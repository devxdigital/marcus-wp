<?php /* Template Name: Account Detail */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4">


    <div class="row">
        <div class="col-sm-12">
            <div class="inner-page-title">
                <h5>Statements & Transaction Detail</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header details-ad card-header-padding">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <h5 class="card-title mb-0 f20 fw-700">Carrie Cook</h5>
                            <p class="card-text fine-print f12 fw-400">a single woman as her sole and separate property</p>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-xs-12 text-end">
                            <h5 class="card-title mb-0 f20 fw-400 text-letter-spacing">7053</h5>
                            <p class="card-text fine-print f12 fw-400">Account Number</p>
                        </div>
                    </div>
                </div>
                <?php if_accounts_summary(); ?>
                <div class="card-body calendar">
                    <div class="row">
                        <div class="col-12 col-lg-6 top-box">
                            <div class="row mb-4 top-calendar">
                                <div class="col-12">
                                    <p class="fine-print mb-1 f10 fw-400">Start Date</p>
                                    <h3 class="mb-0 text-secondary"><span id="startDateDisplay">October 1, 2020</span> <span class="cal-toggle"><i class="fal fa-calendar-alt ms-2 text-theme"></i></span></h3>
                                </div>
                            </div>
                            <div class="row mb-4 calendar-start active">
                                <div class="col-12">
                                    <div id='startDate'></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 top-box">
                            <div class="row mb-4 top-calendar">
                                <div class="col-12">
                                    <p class="fine-print mb-1 f10 fw-400">End Date</p>
                                    <h3 class="mb-0 text-secondary"><span id="endDateDisplay">October 31, 2020</span> <span class="cal-toggle"><i class="fal fa-calendar-alt ms-2 text-theme"></i></span></h3>
                                </div>
                            </div>
                            <div class="row mb-4 calendar-end active">
                                <div class="col-12">
                                    <div id='endDate'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-theme generate">Generate Report</button>
                        </div>
                    </div>
                </div>
                <div class="raport">
                    <ul class="nav nav-tabs col-12" id="myTab" role="tablist">
                        <li class="nav-item col-lg-6 col-sm-12" role="presentation">
                            <div class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">
                                <span class="current-active">Currently Viewing</span>
                                <span class="current-inactive">Switch View to</span>
                                <span class="title-tab">Account Statement Overview</span>
                            </div>
                        </li>
                        <li class="nav-item col-lg-6 col-sm-12" role="presentation">
                            <div class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#investment" type="button" role="tab" aria-controls="investment" aria-selected="false"> 
                                <span class="current-active">Currently Viewing</span>
                                <span class="current-inactive">Switch View to</span>
                                <span class="title-tab">Investment Allocation</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <div class="container">
                                <div class="row">
                                    <table class="col-lg-6 col-sm-12 col-xs-12">
                                        <thead>
                                            <tr class="head">
                                                <th colspan="2" >Investment Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Beginning Invested Principal Balance <span data-bs-toggle="tooltip" data-bs-placement="right" title="Beginning Invested Principal Balance is the principal amount invested in all loans as of the 1st date from the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$370,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Principal Pay Downs/Payoffs on Loans <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Held in Trust Pending Investment Funding is the principal amount committed and awaiting funding/recording as of the last date of the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$120,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Principal Invested/Funded on Loans <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Pay Downs/Payoffs on Loans is the princiapl amount paid back for the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$70,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Ending Invested Principal Balance <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Not Reinvested from Pay Downs/Payoffs is the principal amount since becoming an investor at Ignite Funding that was at one-time invested and is no longer invested.)"><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$320,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td class="right"><strong>&nbsp;</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="col-lg-6 col-sm-12 col-xs-12">
                                        <thead>
                                            <tr class="head">
                                                <th colspan="2">Principal Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Principal Held in Trust Pending Investment Funding <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Invested/Funded on Loans is the principal amount recorded on new investments during the date range selected" class="white-tooltip"><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$50,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Principal Not Reinvested from Pay Downs/Payoffs <span data-bs-toggle="tooltip" data-bs-placement="right" title="Interest Paid This Month is the amount of interest earned on Principal Invested/Funded on Loans from the prior month borrower payments."><i class="fal fa-question-circle"></i></span> </td>
                                                <td class="right"><strong>$0.00</strong></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr  class="head">
                                                <th colspan="2">Interest Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Interest Paid This Month <span data-bs-toggle="tooltip" data-bs-placement="right" title="Ending Invested Principal Balance is the principal amount invested as of the last date of the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$3,700.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Interest Earned Life to Date <span data-bs-toggle="tooltip" data-bs-placement="right" title="Interest Earned Life to Date is the amount of interest earned since becoming an investor at Ignite Funding on principal invested/funded on loans."><i class="fal fa-question-circle"></i></span></td>
                                                <td class="right"><strong>$126,000.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="charts row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 investment-chart">
                                        <div class="chart-head">
                                            <h5>Investment Diversity</h5>
                                            <p class="card-text fine-print f12 fw-400 mb-3">Oct 1 - Oct 31, 2020</p>
                                        </div>
                                        <canvas id="myChart" width="400" height="400"></canvas>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 return-chart">
                                        <div class="chart-head">
                                            <h5>Investment Returns</h5>
                                            <p class="card-text fine-print f12 fw-400 mb-3">Oct 1 - Oct 31, 2020</p>
                                        </div>
                                        <div class="chart"></div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 borrowers-table table-responsive">
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
                        <div class="tab-pane col-12 fade" id="investment" role="tabpanel" aria-labelledby="investment-tab">
                            <div class="container">
                                <div class="row">

                                <!-- to be redone with Row Details https://datatables.net/examples/api/row_details.html -->

                                    <table class="col-12 ial-table">
                                        <thead>
                                            <tr class="head">
                                                <th class="no-sort">&nbsp;</th>
                                                <th>Loan Name</th>
                                                <th>Loan Number</th>
                                                <th class="mobile-hide">Maturity Date</th>
                                                <th class="mobile-hide">Interest Rate</th>
                                                <th>Current Principal Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><a href="#" class="button-details">Details</a></td>
                                                <td>FIG Starwood Farms, LLC</td>
                                                <td>4567</td>
                                                <td class="mobile-hide">10/15/20</td>
                                                <td class="mobile-hide">10%</td>
                                                <td><strong>$70,000.00</strong></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><a href="#" class="button-details">Details</a></td>
                                                <td>FIG Starwood Farms, LLC</td>
                                                <td>4567</td>
                                                <td class="mobile-hide">10/15/20</td>
                                                <td class="mobile-hide">10.50%</td>
                                                <td><strong>$100,000.00</strong></td>
                                            </tr>
                                            <tr class="details-table">
                                                <td class="box" colspan="6" style="width: 100%;">
                                                    <table class="detail-table">
                                                        <thead>
                                                            <tr>
                                                                <td>
                                                                    Transaction History
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="first">
                                                                <td>
                                                                    Loan Placement
                                                                </td>
                                                                <td>
                                                                    Date received
                                                                </td>
                                                                <td>
                                                                    Date processed
                                                                </td>
                                                                <td>
                                                                    Description
                                                                </td>
                                                                <td>
                                                                    Disbursement type
                                                                </td>
                                                                <td>
                                                                    Amount
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="big-text">
                                                                    1 of 2
                                                                </td>
                                                                <td>
                                                                    9/15/19
                                                                </td>
                                                                <td>
                                                                    9/15/19
                                                                </td>
                                                                <td>
                                                                    Interest Paid
                                                                </td>
                                                                <td>
                                                                    ACH/Direct Deposit
                                                                </td>
                                                                <td>
                                                                    $583.33
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    9/21/19
                                                                </td>
                                                                <td>
                                                                    9/21/19
                                                                </td>
                                                                <td>
                                                                    Principal Pay Down
                                                                </td>
                                                                <td>
                                                                    ACH/Direct Deposit
                                                                </td>
                                                                <td>
                                                                    $10,000.00
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    9/26/19
                                                                </td>
                                                                <td>
                                                                    9/26/19
                                                                </td>
                                                                <td>
                                                                    Principal Pay Down
                                                                </td>
                                                                <td>
                                                                    ACH/Direct Deposit
                                                                </td>
                                                                <td>
                                                                    $10,000.00
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot colspan="6" >

                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td class='borderBottomTd'>
                                                                    Total Pay Downs
                                                                </td>
                                                                <td class='borderBottomTd'><strong>$20,000.00</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td class='borderBottomTd'>
                                                                    Total Interest Earned
                                                                </td>
                                                                <td class='borderBottomTd'><strong>$583.33</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp;</td>
                                                                <td class='borderBottomTd borderBottomTdBolder'>
                                                                    Current Principal Balance
                                                                </td>
                                                                <td class='borderBottomTd borderBottomTdBolder'><strong>$70,000.00</strong></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#" class="button-details">Details</a></td>
                                                <td>Harmony Homes NV, LLC</td>
                                                <td>7891</td>
                                                <td class="mobile-hide">8/15/19</td>
                                                <td class="mobile-hide">10.50%</td>
                                                <td><strong>$50,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#" class="button-details">Details</a></td>
                                                <td>TBH Series 4445, LLC</td>
                                                <td>7892</td>
                                                <td class="mobile-hide">11/18/18</td>
                                                <td class="mobile-hide">10%</td>
                                                <td><strong>$100,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#" class="button-details">Details</a></td>
                                                <td>Rhino Investments Nampa, LLC</td>
                                                <td>8965</td>
                                                <td class="mobile-hide">11/19/19</td>
                                                <td class="mobile-hide">10.50%</td>
                                                <td><strong>$0.00</strong></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="total mobile-hide"  >
                                            <tr>
                                                <td colspan="5">Total Principal Balance</td>
                                                <td>$320,000.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer p-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <ul class="options-list">
                                <li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                                <li><a href="#"><i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                                <li><a href="#"><i class="fal fa-file-invoice-dollar fa-fw"></i> Taxes</a></li>
                                <li><a href="#"><i class="fal fa-chart-bar fa-fw"></i> Defaults</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $(".button-details").click(function (e) {
            e.preventDefault();
            $(".details-table").toggleClass('active');
        });
        $(".cal-toggle").click(function (e) {
            e.preventDefault();
            $(".calendar-start").toggleClass('active');
            $(".calendar-end").toggleClass('active');
        });
        jQuery(document).on('click', '.generate', function(e) {
            e.preventDefault();
            // $(this).toggleClass('inactive');
            // $(".raport").toggleClass('active');
            // $(".calendar-start").toggleClass('active');
            // $(".calendar-end").toggleClass('active');
            // $(".calendar").toggleClass('inactive'); 


            if ( !jQuery.fn.DataTable.isDataTable('.ial-table') ) {
                jQuery('.ial-table').DataTable({
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "paging": false,
                    columnDefs: [{
                        orderable: false,
                        targets: "no-sort"
                    }]
                });
            }

        });



    });



</script>
<?php
get_footer();
