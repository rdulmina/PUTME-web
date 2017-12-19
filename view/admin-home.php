<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PUT ME</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/navbar-style.css" rel="stylesheet">
      <link href="../css/homestyle.css" rel="stylesheet">
      <link href="../css/admin-home.css" rel="stylesheet">
      <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  </head>

  <body class="background-theme">

    <?php include "nav-bar.php";?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 title-bar">Admin Home
            <small>Your Name Here</small>
            <div class="request-icon">
                <span role="button" class="badge badge-pill badge-info" id="request_count" onclick="displayFilledRequests()"></span>
                <i role="button" class="fa fa-envelope-o envelop" aria-hidden="true" onclick="displayFilledRequests()"></i>
            </div>
        </h1>

        <br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div id="side-bar-list" class="list-group my-sidebar-item">
                    <a href="" id="admin_appointment" class="list-group-item ref">Appointments</a>
                    <a href="" class="list-group-item ref">Manage Users</a>
                    <a href="" class="list-group-item ref">Manage Customers</a>
                    <a href="" class="list-group-item ref">Register Customer</a>
                    <a href="" class="list-group-item ref">Manage Gallery</a>
                    <a href="" class="list-group-item ref">Join Requests</a>
                    <a href="" class="list-group-item ref">Manage Suggestions</a>
                </div>
            </div>
            <!-- Content Column -->
            <div id="content" class="col-lg-9 mb-4">

                <h2>Welcome</h2>
                <p>This is the Admin Panel</p>
            </div>
        </div>

    </div>
    <!-- /.container -->
    </div>


    <!-- Footer -->
    <footer class="">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin_home.js"></script>

  </body>

</html>
