<link href="../css/navbar-style.css" rel="stylesheet" type="text/css">

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top my-navbar">
    <div class="container">
        <a href="#"><img class="img-circle" id="img_logo" src="img/logo.png" style="width: 100px; height: 40px;" ></a>
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

                <?php
                // checking if an user is logged in
                if(!isset($_SESSION['user_id'])){
                    echo "<li class=\"nav-link menu link-1\" id=\"login\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" ><i class=\"fa fa-unlock-alt\"></i>Log In</a></li>";
                }
                else{
                    echo "<li class=\"nav-link menu link-1\" id=\"welcome-msg\">
                        <a href=\"controller/direct-user-handler.php\" class=\"loggedin\" ><span class=\"glyphicon glyphicon-user\"></span> <strong>Welcome ";
                    echo $_SESSION['first_name'];
                    echo "</strong></a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>