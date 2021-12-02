<?php

if( !is_user_logged_in() ){
    wp_redirect( site_url() );
    exit();
}

$phpsdate = false;
$phpedate = false;
if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) ){
    // print_r( $_REQUEST );
    // exit();

    if( isset( $_POST['sdate'] ) ){
        $phpsdate = '\''.$_POST['sdate'].'\'';
    }
    if( isset( $_POST['edate'] ) ){
        $phpedate = '\''.$_POST['edate'].'\'';
    }
}



$investor = false;
$investor_data = array();
$user = wp_get_current_user();
$personId = get_the_author_meta('person_id', $user->ID );

if( in_array('financial_admin', $user->roles ) ){

    if( isset( $_COOKIE['wpb_financial_admin_selected_user'] ) ){
        $selected_id = intval( $_COOKIE['wpb_financial_admin_selected_user'] );

        // print_r( $selected_id );
    } else {
        $assigned_investors = FinancePluginHelper::get_investors( $user->ID );
        $selected_id = intval( array_values( $assigned_investors )[0] );
    }
    $investor_data = FinancePluginHelper::get_investor_data( $selected_id );
    $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $selected_id );
    $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $selected_id );

} else {
    if( $user ){
        $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
    
        $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    }
    
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $user->ID );
    $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $user->ID );
}


$graph_values = [];

get_header();

// wp_nav_menu();
?>
<div class="container">
    <div class="row mt-5">
        <?php include( plugin_dir_path( __FILE__ ).'/menu.php'); ?>
    </div>

</div>
<div class="content page-template-page-account-detail new-account">
    <div class="container inner-page mb-4 tpl-home investor-area">
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
                                <h5 class="card-title mb-0 f20 fw-700"><?php echo $pri_account['FirstName'].' '. $pri_account['LastName']; ?></h5>
                                <p class="card-text fine-print f12 fw-400"><?php echo $investor['account_data']['Vesting']; ?></p>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12 text-end">
                                <h5 class="card-title mb-0 f20 fw-400 text-letter-spacing"><?php echo $investor['acc_id']; ?></h5>
                                <p class="card-text fine-print f12 fw-400">Account Number</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- accounts summary     -->
                    <div class="row g-0 mb-3 summary accounts">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-white text-center">
                                <div class="card-body tax-information-boxes">
                                    <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['Fundings'] ); ?></h3>
                                    <p class="card-text fine-print">Invested Amount</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-white text-center">
                                <div class="card-body tax-information-boxes">
                                    <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['Pledges'] ); ?></h3>
                                    <p class="card-text fine-print">Pledged on Investments</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-white text-center">
                                <div class="card-body tax-information-boxes">
                                    <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['AmtRemainingToInvest'] ); ?></h3>
                                    <p class="card-text fine-print">Remaining Amount to Invest</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-white text-center">
                                <div class="card-body tax-information-boxes">
                                    <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['InterestEarned'] ); ?></h3>
                                    <p class="card-text fine-print">Interest Earned to Date</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accounts -->

                    <div class="card-body calendar">
                        <div class="row">
                            <div class="col-12 col-lg-6 top-box">
                                <div class="row mb-4 top-calendar">
                                    <div class="col-12">
                                        <p class="fine-print mb-1 f10 fw-400">Start Date</p>
                                        <h3 class="mb-0 text-secondary"><span id="startDateDisplay"></span> <span class="cal-toggle"><i class="fal fa-calendar-alt ms-2 text-theme"></i></span></h3>
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
                                        <h3 class="mb-0 text-secondary"><span id="endDateDisplay"></span> <span class="cal-toggle"><i class="fal fa-calendar-alt ms-2 text-theme"></i></span></h3>
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
                            <form method="post">
                                <?php wp_nonce_field(); ?>
                                <input type="hidden" id="hidden_sdate" name="sdate" value="" />
                                <input type="hidden" id="hidden_edate" name="edate" value="" />
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-theme generate" id="gen-btn">Generate Report</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <?php include( plugin_dir_path( __FILE__ ).'/report.single.php'); ?>
                </div>
            </div>
        </div>
    </div>        
</div>

<?php

get_footer();

?>

<script>
    let isMobile = false;
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
        isMobile = true;
    }
    jQuery(document).ready( function(){
        create_calendars();
        setTimeout( generate_graph, 500 );

        $(".cal-toggle").click(function (e) {
            e.preventDefault();
            $('.top-box').toggleClass('hidden');
            // $(".calendar-start").toggleClass('active');
            // $(".calendar-end").toggleClass('active');
        });

        $(".button-details").click(function (e){
            e.preventDefault();
            
            const id = '.details-'+e.target.dataset.idx;
            if( $(id).hasClass('active') ){
                $(id).removeClass('active');
            } else {
                $(".details-table").removeClass('active');
                $( id ).addClass('active');
            }            
        });

        $(".generate").click(function() {
            $('.investor-area').addClass("loading");
        });
    });

    function create_calendars(){
        let selectedStartDate = <?php echo $phpsdate? 'get_date('.$phpsdate.')' : 'false'; ?>;
        let selectedEndDate = <?php echo $phpedate? 'get_date('.$phpedate.')' : 'false'; ?>;

        const cd = new Date();
        const endOfMonth = (new Date(cd.getFullYear(), cd.getMonth()+1, 0)).getDate();
        let sdate = convert_date( cd );
        let edate = convert_date( cd, endOfMonth ); //cd.getFullYear().toString()+'-'+(cd.getMonth()+1).toString().padStart(2, '0')+'-'+endOfMonth;

        <?php
            if( $phpsdate ){
                echo 'sdate='.$phpsdate.';'."\n";
            }
            if( $phpedate ){
                echo 'edate='.$phpedate.';';

                echo 'handleDates(); hide_date_sel();'; 
            }
        ?>

        // console.log( sdate, edate );
        var startDateEl = document.getElementById('startDate');
        var endDateEl = document.getElementById('endDate');

        var startDate = new FullCalendar.Calendar(startDateEl, {
            headerToolbar: {
                left: 'prevYear,prev',
                center: 'title',
                right: 'next,nextYear'
            },
            themeSystem: 'bootstrap',
            prev: 'fa-chevron-left',
            next: 'fa-chevron-right',
            prevYear: 'fa-angle-double-left',
            nextYear: 'fa-angle-double-right',
            initialDate: sdate, //remove for today
            selectable: true,
            dateClick: function(info) {
                // info.dayEl.style.color = "white";
                changeColorStart(selectedDate, "black");
                selectedDate = info.dayEl
                selectedStartDate = info.date
            },
            select: function (arg) {
                var selectedDate = startDate.formatDate(arg.start, {
                    month: 'long',
                    year: 'numeric',
                    day: 'numeric'
                });
                jQuery('#startDateDisplay').text(selectedDate);

                setTimeout( handleDates, 400 );
            },
            selectAllow: function (e) {
                if (e.end.getTime() / 1000 - e.start.getTime() / 1000 <= 86400) {
                    return true;
                }
            },
            views: {
                basic: {// name of view
                    columnFormat: 'dd',
                    columnHeaderFormat: 'dddd',
                    titleFormat: 'dddd',

                },
                agenda: {// name of view
                    columnFormat: 'dd',
                    columnHeaderFormat: 'dddd',
                    titleFormat: 'dddd',

                },
                week: {// name of view
                    columnFormat: 'dd',
                    columnHeaderFormat: 'dddd',
                    titleFormat: 'dddd',

                },
                day: {// name of view
                    columnFormat: 'dd',
                    columnHeaderFormat: 'dddd',
                    titleFormat: 'dddd',

                }
            },
            columnFormat: {
                month: 'dddd' //also tried 'D' but a number displayed instead
            },
            columnHeaderFormat: 'dddd'
        });

        let selectedDate = null;
        const changeColorStart = (el, color) => {
            if(selectedDate) {
                el.style.color = color;
            }
        };
        const changeColorEnd = (el, color) => {
            if(selectedDate) {
                el.style.color = color;
            }
        };

        var endDate = new FullCalendar.Calendar(endDateEl, {
            headerToolbar: {
                left: 'prevYear,prev',
                center: 'title',
                right: 'next,nextYear'
            },
            themeSystem: 'bootstrap',
            prev: 'fa-chevron-left',
            next: 'fa-chevron-right',
            prevYear: 'fa-angle-double-left',
            nextYear: 'fa-angle-double-right',
            initialDate: edate, //remove for today
            selectable: true,
            dateClick: function(info) {

                // info.dayEl.style.color = "white";
                changeColorEnd(selectedDate, "black");
                selectedDate = info.dayEl
                selectedEndDate = info.date;
            },
            select: function (arg) {
                var selectedDate = endDate.formatDate(arg.start, {
                    month: 'long',
                    year: 'numeric',
                    day: 'numeric'
                });
                jQuery('#endDateDisplay').text(selectedDate);

                setTimeout( handleDates, 500 );
            },
            selectAllow: function (e) {
                if (e.end.getTime() / 1000 - e.start.getTime() / 1000 <= 86400) {
                    return true;
                }
            }
        });

        startDate.render();        
        startDate.select( sdate );
        endDate.render();
        endDate.select( edate );

        function handleDates(){
            console.log( selectedStartDate )
            if( selectedStartDate && selectedEndDate ){
                jQuery('#hidden_sdate').val( convert_date( selectedStartDate ) );
                jQuery('#hidden_edate').val( convert_date( selectedEndDate ) );
                jQuery('#gen-btn').removeAttr('disabled').removeClass('inactive');
            } else {
                jQuery('#gen-btn').attr('disabled', 'disabled').addClass('inactive');
            }
        }
    }

    function convert_date( cd ){
        return cd.getFullYear().toString()+'-'+(cd.getMonth()+1).toString().padStart(2, '0')+'-'+(arguments[1]? arguments[1] : cd.getDate().toString().padStart(2, '0'));
    }
    function get_date( d ){
        return new Date( d );
    }

    function show_date_sel(){
        jQuery('.top-box').removeClass('hidden');
        // jQuery('.calendar-start').addClass('active');
        // jQuery('.calendar-end').addClass('active');
    }
    function hide_date_sel(){
        jQuery('.top-box').addClass('hidden');
        // jQuery('.calendar-start').removeClass('active');
        // jQuery('.calendar-end').removeClass('active');
    }

    function generate_graph(){
        if( jQuery('#diversity_chart').length == 0 ){
            return;
        }
        const options = {
            scales: {
                x: {
                    grid: {
                        z: 1,
                        color: isMobile ? 'white' : 'rgba(0, 0, 0, 0.1)'
                    }
                },
                y: {
                    ticks: {
                        mirror: true,
                        z: 1,
                        color: 'black',
                        font: {
                            family: 'helveticabold',
                            size: 10,
                            weight: 700
                        }
                    },
                    grid: {
                        z: 1,
                        color: isMobile ? 'white' : 'rgba(0, 0, 0, 0.1)'
                    }
                }
            },
            indexAxis: 'y',
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
                bar: {
                borderWidth: 2,
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
            },
        };

            

        const ctx = document.getElementById('diversity_chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['BORROWERS', 'STATES', 'LOAN TYPES', 'LOAN SUBTYPES'],
                datasets: [{
                    order: 1,
                    barPercentage: 1.0,
                    categoryPercentage: 1.0,
                    label: false,
                    data: JSON.parse('<?php echo json_encode( $graph_values ); ?>'),
                    backgroundColor: [
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                    ],
                    borderColor: [
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                        'rgba(171, 204, 112, 0.9)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: options,  
        });
    }
    

</script>