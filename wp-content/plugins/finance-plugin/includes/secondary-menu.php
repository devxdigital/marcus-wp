<div class="container">
            <div class="row mt-5">
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-dark secondary-menu">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item current-menu-item">
                                        <a class="nav-link" aria-current="page" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Statements & Transaction Detail
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><span class="me-2">7053</span> Carrie Cook</a></li>
                                            <li><a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><span class="me-2">8617</span> Hunter R. Hicks</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="https://swphdev.com/sandbox/marcus-solomon/ignite-funding/client-resources/" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Resources</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/">Profile & Settings</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/available-investments/">Available Investments</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/news-updates/">News & Updates</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="https://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/">Loan Default Portal</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                       
                                    </li>
                                    <li class="nav-item">
                                        
                                    </li>
                                </ul>
                                <?php if (is_user_logged_in()) : ?>
                                    <div class="d-flex">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/')); ?>" style="color: #67A102">Log Out</a></li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/wp-admin')); ?>" style="color: #67A102">Login</a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>