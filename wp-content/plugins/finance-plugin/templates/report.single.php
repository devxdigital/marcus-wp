<?php if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) && isset( $_POST['sdate'] ) && isset( $_POST['edate'] ) ): ?>
<?php 

$qid = get_query_var('qid');
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$cache_name =  'transactions_'.$qid;

$statements = false;

if( $sdate && $edate ){
    // echo 'QID '.$qid.'<br>'.$sdate.'<br>'.$edate.'<br><br>';

    $statements = FinancePluginHelper::cache( $user->ID, $cache_name, 300, $sdate.$edate );
    if( !$statements ){
        $statements = FinancePluginHelper::pull_investor_statements( $qid, $sdate, $edate );
        update_user_meta( $user->ID, $cache_name, json_encode( array( 'date' => time(), 'data' => $statements, 'args'=>$sdate.$edate ) ) );
    } else {
        echo 'cached ';
    }

    // print_r($statements );
    

    if( count( $statements ) ){
        $borrowers = array_unique( array_map( function( $el ){ return $el['Borrower']; }, $statements['info_investments'] ), SORT_STRING );
        $loans = array_unique( array_map( function( $el ){ return $el['LoanType']; }, $statements['info_investments'] ), SORT_STRING );
        $subtypes = array_unique( array_map( function( $el ){ return $el['LoanSubType']; }, $statements['info_investments'] ), SORT_STRING );
        $states = array_unique( array_map( function( $el ){ return $el['State']; }, $statements['info_investments'] ), SORT_STRING );
        $graph_values = array( count( $borrowers ), count( $states ), count( $loans ), count( $subtypes ) );
    }
    // print_r( $graph_values );

    // print_r( $statements );
    // die();
} ?>

<?php if( $statements ): ?>
<div class="raport" style="display: block;">
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
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['beginningInvestedPrincipal'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Principal Pay Downs/Payoffs on Loans <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Held in Trust Pending Investment Funding is the principal amount committed and awaiting funding/recording as of the last date of the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['totalPayoffs'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Principal Invested/Funded on Loans <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Pay Downs/Payoffs on Loans is the princiapl amount paid back for the date range selected."><i class="fal fa-question-circle"></i></span></td>
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['principalInvested'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Ending Invested Principal Balance <span data-bs-toggle="tooltip" data-bs-placement="right" title="Principal Not Reinvested from Pay Downs/Payoffs is the principal amount since becoming an investor at Ignite Funding that was at one-time invested and is no longer invested.)"><i class="fal fa-question-circle"></i></span></td>
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['endingInvestedPrincipal'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="right value"><strong>&nbsp;</strong></td>
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
                                <td class="right"><strong><?php echo FinancePluginHelper::currency( $statements['info']['principalHeldInTrust'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Principal Not Reinvested from Pay Downs/Payoffs <span data-bs-toggle="tooltip" data-bs-placement="right" title="Interest Paid This Month is the amount of interest earned on Principal Invested/Funded on Loans from the prior month borrower payments."><i class="fal fa-question-circle"></i></span> </td>
                                <td class="right"><strong><?php echo FinancePluginHelper::currency( $statements['info']['principalNotReinvested'] ); ?></strong></td>
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
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['interestPaid'] ); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Interest Earned Life to Date <span data-bs-toggle="tooltip" data-bs-placement="right" title="Interest Earned Life to Date is the amount of interest earned since becoming an investor at Ignite Funding on principal invested/funded on loans."><i class="fal fa-question-circle"></i></span></td>
                                <td class="right value"><strong><?php echo FinancePluginHelper::currency( $statements['info']['InterestEarnedLTD'] ); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="charts row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 return-chart">
                        <div class="chart-head">
                            <h5>Investment Returns</h5>
                            <p class="card-text fine-print f12 fw-400 mb-3">Oct 1 - Oct 31, 2020</p>
                        </div>
                        <div class="chart"></div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 investment-chart">
                        <div class="chart-head">
                            <h5>Investment Diversity</h5>
                            <p class="card-text fine-print f12 fw-400 mb-3">Oct 1 - Oct 31, 2020</p>
                        </div>
                        <canvas id="diversity_chart" width="400" height="400"></canvas>
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
                                <?php if( count( $statements['info_investments'] ) ): ?>
                                <?php foreach( $statements['info_investments'] as $investment ): ?>
                                <tr>
                                    <td><?php echo $investment['Borrower']; ?></td>
                                    <td><?php echo $investment['State']; ?></td>
                                    <td><?php echo $investment['LoanType']; ?></td>
                                    <td><?php echo $investment['LoanSubType']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                
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
                            <?php if( count( $statements['investments'] ) ): ?>
                            <?php foreach( $statements['investments'] as $mkey => $investment ): ?>
                                <tr>
                                    <td><a href="#" class="button-details" data-idx="<?php echo $mkey; ?>">Details</a></td>
                                    <td><?php echo $investment['LoanName']; ?></td>
                                    <td><?php echo $investment['LoanNumber']; ?></td>
                                    <td class="mobile-hide"><?php echo $investment['current_maturity_date']; ?></td>
                                    <td class="mobile-hide"><?php echo number_format( $investment['InvestorInterestRate'], 2, '.', ''); ?>%</td>
                                    <td><strong><?php echo FinancePluginHelper::currency( $investment['balance'] ); ?></strong></td>
                                </tr>
                                <tr class="details-table details-<?php echo $mkey; ?>">
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
                                                    <td>Loan Placement</td>
                                                    <td>Date received</td>
                                                    <td>Date processed</td>
                                                    <td>Description</td>
                                                    <td>Disbursement type</td>
                                                    <td>Amount</td>
                                                </tr>
                                                <?php $paydowns = 0.00; ?>
                                                <?php if( array_key_exists( $investment['LoanNumber'], $statements['investment_transactions'] ) && 
                                                    count( $statements['investment_transactions'][ $investment['LoanNumber'] ] ) > 0 ): ?>
                                                <?php foreach( $statements['investment_transactions'][ $investment['LoanNumber'] ] as $key => $trans ): ?>
                                                <tr>
                                                    <?php if( $key == 0 ): ?>
                                                        <td rowspan="<?php echo count( $statements['investment_transactions'][ $investment['LoanNumber'] ] ); ?>" class="big-text" valign="top">
                                                            <?php echo $mkey+1; ?> of <?php echo count( $statements['investments'] ); ?>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <?php echo $trans['DateReceived']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trans['DateProcessed']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trans['Description']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trans['disbursement_type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trans['AmountReceived']; ?>
                                                    </td>
                                                </tr>
                                                    <?php $paydowns += $trans['AmountReceived']; ?>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align: left; padding: 10px 0;">No transactions in the period chosen</td>
                                                    </tr>
                                                <?php endif; ?>
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
                                                    <td class='borderBottomTd'><strong><?php echo FinancePluginHelper::currency( $paydowns ); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td class='borderBottomTd'>
                                                        Total Interest Earned
                                                    </td>
                                                    <td class='borderBottomTd'><strong>$XXX.XX</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td class='borderBottomTd borderBottomTdBolder'>
                                                        Current Principal Balance
                                                    </td>
                                                    <td class='borderBottomTd borderBottomTdBolder'><strong><?php echo FinancePluginHelper::currency( $investment['balance'] ); ?></strong></td>
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
                            <?php endforeach; ?>    
                            <?php else: ?>
                                <tr><td colspan="6">&nbsp; </td></tr>
                                <tr><td colspan="6"><h3>There are no investment statements found.</h3></td></tr>
                                <tr><td colspan="6">&nbsp; </td></tr>
                            <?php endif; ?>
                            
                        </tbody>
                        <tfoot class="total mobile-hide">
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
                <li><a href="<?php echo site_url(); ?>/investors/account/<?php echo $investor['acc_id']; ?>"><i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                <li><a href="<?php echo site_url(); ?>/investors/account-representatives/<?php echo $account['acc_id']; ?>"><i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                <li><a href="<?php echo site_url(); ?>/investors/taxes/<?php echo $account['acc_id']; ?>"><i class="fal fa-file-invoice-dollar fa-fw"></i> Taxes</a></li>
                <li><a href="<?php echo site_url(); ?>/loan-default-portal/"><i class="fal fa-chart-bar fa-fw"></i> Defaults</a></li>
            </ul>
        </div>
    </div>
</div>

<?php else: ?>
    <h4>No info on this account. </h4>
<?php endif; ?>

<?php else: ?>
    <div class="raport"></div>
<?php endif; ?>