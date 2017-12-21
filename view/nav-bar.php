<link href="../css/navbar-style.css" rel="stylesheet" type="text/css">

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top my-navbar">
    <div class="container">
        <a href="../index.php"><img class="img-circle" id="img_logo" src="../img/logo.png" style="width: 100px; height: 40px;" ></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
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
                                                        <img src="../img/none.jpg"  style="height: 90px;" alt="avatar">
                                                    </p>
                                                </div>
                                                <input id="user_edit" type="hidden" value="">
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></strong></p>
                                                    <p class="text-left small"><?php echo $_SESSION['email']; ?></p>
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
                                                    <form>
                                                        <input class="btn btn-danger btn-block my-lg-button-danger" type="submit" value="Log Out" formaction="../controller/logout.php">
                                                    </form>
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