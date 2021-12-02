<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4 tpl-home">
    <div class="row pt-1 pb-4">
        <div class="col-12">
            <img class="img-fluid" src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/06/header_image_2.png" alt="Header">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <div class="inner-page-title">
                <h5><?php _e('My Accounts', 'ignite-funding') ?></h5>
            </div>
            <div class="card account custom-border-gray no-top">
                <div class="card-header">
                    <div class="row ps-0">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                            <h5 class="card-title f20 color_000 mb-0 ">Carrie Cook</h5>
                            <p class="card-text fine-print">a single woman as her sole and separate property</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-start text-md-end text-lg-end text-xl-end">
                            <h5 class="card-title mb-0 text-number-letter-spacing">7053</h5>
                            <p class="card-text fine-print">Account Number</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <?php if_accounts_summary(); ?>

                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <h5 class="card-title f20 fw-400 color_000 account-type">CASH<span class="text-theme card-dash-v"></span> Individual</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Type</p>
                        </div>
                        <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <h5 class="card-title f20 fw-400 color_000 account-type">Active</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Status</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class='col-lg-12'>
                            <div class='card-actions'>
                                <div class='card-action-item card-flex-grow-1'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-question-circle option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-representatives/">Support</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice-dollar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/tax-information/"> Taxes</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-chart-bar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/"> Defaults</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <ul class="options-list">
                            <li><a href="https://devx.digital/wpheroes/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
                            <li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
                            <li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
                            <li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
                    </ul> -->
                </div>
                <div class="card-extra-footer">
                    <div class="card my-2">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class='col-lg-12 card-footer-member'>
                                    <div class='card-footer-member-icon'>
                                        <i class="fas fa-2x fa-address-card text-theme fa-fw"></i>
                                    </div>
                                    <div class='card-footer-member-desc'>
                                        <h5 class="card-title mb-10 f20 color_000">Carrie Cook</h5>
                                        <p class="card-text fine-print f12 color_000">Authorized Primary Account Holder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ps-2">
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-user-circle option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-8 col-lg-8">
                                            <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/" class='f12 letter-spacing-min-044'>Edit Profile & Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-mobile option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-6 col-lg-6">
                                            <a href="https://platform.trumpia.com/onlineSignup/IGNITEFUNDING/client" class='f12 letter-spacing-min-044'>Sign up for Text Alerts</a>
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




            <div class="card mt-3 account custom-border-gray ">
                <div class="card-header">
                    <div class="row ps-0">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                            <h5 class="card-title f20 color_000 mb-0 ">Hunter R. Hicks</h5>
                            <p class="card-text fine-print">minor under Nevada Uniform Act as to Transfer to Minors</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-start text-md-end text-lg-end text-xl-end">
                            <h5 class="card-title mb-0 text-number-letter-spacing">8617</h5>
                            <p class="card-text fine-print">Account Number</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <?php if_accounts_summary(); ?>

                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <h5 class="card-title f20 fw-400 color_000 account-type">CUSTODIAL<span class="text-theme card-dash-v"></span> UTMA/UGMA</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Type</p>
                        </div>
                        <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <h5 class="card-title f20 fw-400 color_000 account-type">Active</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Status</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class='col-lg-12'>
                            <div class='card-actions'>
                                <div class='card-action-item card-flex-grow-1'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-question-circle option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-representatives/">Support</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice-dollar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/tax-information/"> Taxes</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-chart-bar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/"> Defaults</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <ul class="options-list">
                            <li><a href="https://devx.digital/wpheroes/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
                            <li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
                            <li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
                            <li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
                    </ul> -->
                </div>
                <div class="card-extra-footer">
                    <div class="card my-2">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class='col-lg-12 card-footer-member'>
                                    <div class='card-footer-member-icon'>
                                        <i class="fas fa-2x fa-address-card text-theme fa-fw"></i>
                                    </div>
                                    <div class='card-footer-member-desc'>
                                        <h5 class="card-title mb-10 f20 color_000">Carrie Cook</h5>
                                        <p class="card-text fine-print f12 color_000">Authorized Primary Account Holder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ps-2">
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-user-circle option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-8 col-lg-8">
                                            <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/" class='f12 letter-spacing-min-044'>Edit Profile & Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-mobile option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-6 col-lg-6">
                                            <a href="https://platform.trumpia.com/onlineSignup/IGNITEFUNDING/client" class='f12 letter-spacing-min-044'>Sign up for Text Alerts</a>
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

            <div class="card mt-3 account custom-border-gray ">
                <div class="card-header">
                    <div class="row ps-0">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                            <h5 class="card-title f20 color_000 mb-0 ">Eddie Vedder</h5>
                            <p class="card-text fine-print">one of the greatest singers and lyricists of all-time</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-start text-md-end text-lg-end text-xl-end">
                            <h5 class="card-title mb-0 text-number-letter-spacing">0512</h5>
                            <p class="card-text fine-print">Account Number</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <?php if_accounts_summary(); ?>

                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <h5 class="card-title f20 fw-400 color_000 account-type">BUSINESS<span class="text-theme card-dash-v"></span> Sole Proprietorship</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Type</p>
                        </div>
                        <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <h5 class="card-title f20 fw-400 color_000 account-type">Active</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Status</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class='col-lg-12'>
                            <div class='card-actions'>
                                <div class='card-action-item card-flex-grow-1'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-question-circle option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-representatives/">Support</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice-dollar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/tax-information/"> Taxes</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-chart-bar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/"> Defaults</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <ul class="options-list">
                            <li><a href="https://devx.digital/wpheroes/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
                            <li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
                            <li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
                            <li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
                    </ul> -->
                </div>
                <div class="card-extra-footer">
                    <div class="card my-2">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class='col-lg-12 card-footer-member'>
                                    <div class='card-footer-member-icon'>
                                        <i class="fas fa-2x fa-address-card text-theme gray fa-fw"></i>
                                    </div>
                                    <div class='card-footer-member-desc'>
                                        <h5 class="card-title mb-10 f20 color_000">Carrie Cook</h5>
                                        <p class="card-text fine-print f12 color_000">Authorized Secondary Account Holder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ps-2">
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-user-circle option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-8 col-lg-8">
                                            <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/" class='f12 letter-spacing-min-044'>Edit Profile & Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-mobile option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-6 col-lg-6">
                                            <a href="https://platform.trumpia.com/onlineSignup/IGNITEFUNDING/client" class='f12 letter-spacing-min-044'>Sign up for Text Alerts</a>
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
            <div class="card mt-3 account custom-border-gray ">
                <div class="card-header">
                    <div class="row ps-0">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                            <h5 class="card-title f20 color_000 mb-0 ">Frank Lloyd Wright</h5>
                            <p class="card-text fine-print">one of the most accomplished acrhitects of all time</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-start text-md-end text-lg-end text-xl-end">
                            <h5 class="card-title mb-0 text-number-letter-spacing">7945</h5>
                            <p class="card-text fine-print">Account Number</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <?php if_accounts_summary(); ?>

                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <h5 class="card-title f20 fw-400 color_000 account-type">BUSINESS<span class="text-theme card-dash-v"></span> Sole Proprietorship</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Type</p>
                        </div>
                        <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <h5 class="card-title f20 fw-400 color_000 account-type">Active</h5>
                            <p class="card-text fine-print f12 fw-400 color_000">Account Status</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class='col-lg-12'>
                            <div class='card-actions'>
                                <div class='card-action-item card-flex-grow-1'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/">Statements & Transactions Detail</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-question-circle option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-representatives/">Support</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-file-invoice-dollar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/tax-information/"> Taxes</a>
                                    </div>
                                </div>
                                <div class='card-action-item card-flex-grow-0'>
                                    <div class='card-action-item-icon'>
                                        <i class="fal fa-chart-bar option-list-icon fa-fw"></i>
                                    </div>
                                    <div class='card-action-item-link'>
                                        <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/"> Defaults</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <ul class="options-list">
                            <li><a href="https://devx.digital/wpheroes/account-detail/"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
                            <li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
                            <li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
                            <li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
                    </ul> -->
                </div>
                <div class="card-extra-footer">
                    <div class="card my-2">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class='col-lg-12 card-footer-member'>
                                    <div class='card-footer-member-icon'>
                                        <i class="fas fa-2x fa-address-card text-theme dark-gray fa-fw"></i>
                                    </div>
                                    <div class='card-footer-member-desc'>
                                        <h5 class="card-title mb-10 f20 color_000">Carrie Cook</h5>
                                        <p class="card-text fine-print f12 color_000">Interested Party, Limited Power of Attorney</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ps-2">
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-user-circle option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-8 col-lg-8">
                                            <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/" class='f12 letter-spacing-min-044'>Edit Profile & Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fal fa-mobile option-list-icon fa-fw"></i> 
                                        </div>
                                        <div class="col-10 col-xl-6 col-lg-6">
                                            <a href="https://platform.trumpia.com/onlineSignup/IGNITEFUNDING/client" class='f12 letter-spacing-min-044'>Sign up for Text Alerts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="options-list">
                                    <li><a href="#"><i class="fal fa-user-circle"></i> </a></li>
                                    <li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
          
        </div>

        <div class="col-sm-5 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-4">
            <div class="inner-page-title">
                <h5 class="">News & Updates</h5>
            </div>
            <div class="card mb-4">
                <div id="newsUpdatesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-keyboard="false" data-bs-touch="false" data-bs-interval="5000">
                    <div class="card-body carousel-general">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 1?</h5>
                                <img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 2?</h5>
                                <img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 3?</h5>
                                <img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 4?</h5>
                                <img src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
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
                <h5 class="">Like Us?</h5>
            </div>
            <div class="card mb-4 referrals">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h5 class="card-title mb-3">Referrals</h5>
                            <h6 class="fw-bold text-theme">Know someone interested in investing at Ignite Funding?</h6>
                            <p class="card-text text-spacing">Earn $100 the first time your collegue invests with us.</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h5 class="card-title mb-3">Reviews</h5>
                            <h6 class="fw-bold text-theme">Please leave your review of our services / products.</h6>
                        </div>
                    </div>
                    <div class="row bottom justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-end refferals_text_link">
                            <p class="card-text " style="font-size: 12px"><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/referrals/">Learn More</a></p>
                        </div>
                        <div class="col-9 col-sm-12 col-md-12 col-lg-6 col-xl-6 refferals_icons">
                            <!-- <img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=FB">
                            <img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=G">
                            <img class="rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=BBB"> -->
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/fb_stars.png">
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/g_stars.png">
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/bbb_stars.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 audited">
                <div class="card-body">
                    <div class='audit_icon'><i class="fal fa-file-spreadsheet fa-2x "></i></div>
                    <div class='audit_text'> Audited Ignite Funding Financials</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
