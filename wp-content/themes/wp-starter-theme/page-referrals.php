<?php /* Template Name: Referrals */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4">
    <?php //if_quick_summary(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="inner-page-title">
                <h5>Referrals</h5>
            </div>
        </div>
    </div>
    <div class="row referals-page">
        <div class="col-12">
            <div class="card">
                <div class="card-body referals-top">
                    <div class="row row-top">
                        <div class="col">
                            <h6 class="text-theme bold-text">Know someone interested in investing at Ignite Funding?</h6>
                            <p>Earn $100 the first time your collegue invests with us.</p>
                        </div>
                    </div>
                    <div class="row gx-0 row-bot">
                        <div class='select-rows-wrapper'>
                            <div class="col-6 select-row-left">
                                <div class="my-3 ">
                                    <input class="form-control form-select input-ref form-control-lg text-lighter" type="text" placeholder="Referee First Name">

                                </div>
                            </div>
                            <div class="col-6 select-row-right">
                                <div class="my-3">
                                    <input class="form-control form-select input-ref form-control-lg text-lighter" type="text" placeholder="Referee Last Name">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-0 row-bot">
                        <div class='select-rows-wrapper'>
                            <div class="col-6 select-row-left">
                                <div class="my-3 ">
                                    <input class="form-control form-select input-ref form-control-lg text-lighter" type="text" placeholder="Referee Email">

                                </div>
                            </div>
                            <div class="col-6 select-row-right">
                                <div class="my-3">
                                    <input class="form-control form-select input-ref form-control-lg text-lighter" type="text" placeholder="Referee Phone">

                                </div>
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

<?php
get_footer();
