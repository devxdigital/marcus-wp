<?php /* Template Name: Tax Information */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4 page-tax-information ">
    <div class="row">
        <div class="col-sm-12">
            <div class="inner-page-title">
                <h5 class="">Taxes</h5>
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
                <div class="card-body ps-0 pe-0 pt-0">

                    <div class="row g-0 mb-4 summary accounts">    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">        <div class="card text-white text-center ">            <div class="card-body tax-information-boxes">                <h3 class="mb-0">$39,534.08</h3>                <p class="card-text fine-print">Invested Amount</p>            </div>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">        <div class="card text-white text-center">            <div class="card-body tax-information-boxes">                <h3 class="mb-0">$15,000.00</h3>                <p class="card-text fine-print">Pledged on Investments</p>            </div>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">        <div class="card text-white text-center">            <div class="card-body tax-information-boxes">                <h3 class="mb-0">$153,235.21</h3>                <p class="card-text fine-print">Remaining Amount to Invest</p>            </div>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">        <div class="card text-white text-center">            <div class="card-body tax-information-boxes">                <h3 class="mb-0">$83,000.00</h3>                <p class="card-text fine-print">Interest Earned to Date</p>            </div>        </div>    </div></div>

                    <div class="row gx-0">
                        <div class='select-rows-wrapper'>
                            <div class="col-6 select-row-left">
                                <div class="my-3">
                                    <select id="account" class="form-select form-select-lg">
                                        <option disabled selected>Select Account</option>
                                        <option>Carrie Cook</option>
                                        <option>Hunter R. Hicks</option>
                                        <option>Eddie Vedder</option>
                                        <option>Frank Lloyd Wright</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 select-row-right">
                                <div class="my-3">
                                    <select id="taxYear" class="form-select form-select-lg">
                                        <option disabled selected>Select Tax Year</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                        <option>2018</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 select-row-btns">
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-theme btn-select">1099</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-theme btn-select">K1</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer tax-info-footer">
                    <div class="row d-flex align-items-center mt-4">
                        <div class="col-12 col-md-7">
                            <p class="fine-print">
                                Note: Tax documents will open in a new browser window/tab using Adobe Acrobat.<br/>
                                If you are prompted to open/save the document, choose "open".<br/>
                                You will then be able to save or print the document from within the browser window.
                            </p>
                        </div>
                        <div class="col-12 col-md-5 text-md-end">
                            <a href="https://get.adobe.com/reader/" target="_blank" class="text-dark">
                                <h5>
                                    <span class="image"><img class="" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/adobe-acrobat-reader-logo.png' ?>"></span>
                                    <span class="text">Get Adobe Acrobat Reader</span>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
				
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 ">
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

<?php
get_footer();
