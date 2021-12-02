<?php /* Template Name: Change Password */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4">
    <?php //if_quick_summary(); ?>

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
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-3 col-xl-1 col-lg-1 col-md-1 col-sm-2 text-end">
                                    <i class="far fa-2x fa-address-card text-theme" style="margin-top: 3px !important"></i>
                                </div>
                                <div class="col-8 gx-0 col-xl-8 col-lg-8">
                                    <h5 class="card-title mb-0">Carrie Cook</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-end change-pass-text">
                            <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/change-password/">Change password</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0 border">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end persons-list">
                            <div class="row g-0 ps-3 pt-3 pb-3 border-bottom profile-member-focus">
                                <div class="col-9">
                                    <h5 class="card-title bold-text">Carrie Cook (Self)</h5>
                                    <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                </div>
                                <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                    <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                </div>
                            </div>
                            <div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                <div class="col-9">
                                    <h5 class="card-title bold-text">Hunter R. Hicks</h5>
                                    <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                </div>
                                <div class="d-flex g-0 justify-content-end align-items-center col-3 text-end pe-4">
                                    <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                </div>
                            </div>
                            <div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                <div class="col-9">
                                    <h5 class="card-title bold-text">Eddie Vedder</h5>
                                    <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                </div>
                                <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                    <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                </div>
                            </div>
                            <div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                <div class="col-9">
                                    <h5 class="card-title bold-text">Frank Lloyd Wright</h5>
                                    <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                </div>
                                <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                    <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                </div>
                            </div>
                        </div>
                        <!-- right side -->

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end">
                            <form class="change-pass">
                                <div class="input-box">
                                    <label>Current Password</label><input type="password" />
                                </div>
                                <div class="input-box green">
                                    <label>New Password</label><input type="password" />
                                </div>
                                <div class="input-box green">
                                    <label>Confirm New Password</label><input type="password" />
                                </div>
                                <button type="submit" class="btn btn-theme generate">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
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

<?php
get_footer();
