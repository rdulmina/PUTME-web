<link href="../css/navbar-style.css" rel="stylesheet" type="text/css">

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top my-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">PUT ME</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/admin-home.php">Admin Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                
                <li class=\"menu link-1\" id=\"login\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" ><i class=\"fa fa-unlock-alt\"></i>Log In</a></li>";
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Portfolio
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                        <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                        <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Other Pages
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                        <a class="dropdown-item active" href="sidebar.html">Sidebar Page</a>
                        <a class="dropdown-item" href="faq.html">FAQ</a>
                        <a class="dropdown-item" href="404.html">404</a>
                        <a class="dropdown-item" href="pricing.html">Pricing Table</a>
                    </div>
                </li>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right username">
                            <li class="dropdown username">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span>

                                    <strong>Wasura Wattearachchi</strong>
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu background-theme">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <img src=""  alt="avatar">
                                                    </p>
                                                </div>
                                                <input id="user_edit" type="hidden" value="">
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong>Wasura Wattearachchi</strong></p>
                                                    <p class="text-left small">wasuradananjith@gmail.com</p>
                                                    <p class="text-left">
                                                        <a href="#" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <a href="" class="btn btn-danger btn-block">Log Out</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                     <!--   <?php /*else: */?>
                            <li class="dropdown">
                                <a href="<?php /*echo base_url('index.php/Login/LoginUser')*/?>" class="dropdown-toggle username">
                                    <span class="glyphicon glyphicon-lock"></span>
                                    <strong>Log In</strong>
                                </a>
                            </li>
                        --><?php /*endif; */?>
                    </ul>
                </div>

            </ul>
        </div>
    </div>
</nav>