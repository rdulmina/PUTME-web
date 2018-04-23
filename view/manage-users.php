<?php session_start(); ?>
<?php require_once('../model/Connection.php') ?>
<?php require_once('../model/FilledRequest.php') ?>


<script type="text/javascript" src="../js/filled_request_handler.js"></script>



<h2>User Details</h2>

<div class="row top-buffer">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#req_id" value="req_id">Request ID</a></li>
                    <li><a href="#bin_id" value="bin_id">Bin ID</a></li>
                    <li><a href="#location" value="location">Location</a></li>
                    <li><a href="#description" value="description">Description</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>-->
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search register requests ..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
                $sql1="SELECT * FROM user";
                $res1=mysqli_query($connection,$sql1) or die(mysqli_error($connection));
            ?>
            <table class ="table table-hover col-md-12">
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    while($row=mysqli_fetch_row($res1))
                    {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></a></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>

<?php include('message-modal.php'); ?>
<?php include('view-filled-requests-modal.php'); ?>


<script>
    $(function () {
        $('#myTab a:first').tab('show')
    });
</script>