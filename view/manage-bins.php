<?php session_start(); ?>
<?php require_once('../model/Connection.php') ?>
<?php require_once('../model/FilledRequest.php') ?>


<script type="text/javascript" src="../js/filled_request_handler.js"></script>



<h2>Garbage Bin Details</h2>

<div class="row top-buffer">
    <!-- <div class="col-md-offset-10"> -->
        <center>
            <button type="button" class="btn btn-md" data-toggle="modal" data-target="#addBin">
                <span class="glyphicon glyphicon-plus-sign"> Add
            </button>
        </center>
    <!-- </div> -->
</div>
                            

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
                $sql1="SELECT * FROM bin";
                $res1=mysqli_query($connection,$sql1) or die(mysqli_error($connection));
            ?>
            <table class ="table table-hover col-md-12">
                <tr>
                    <th width="20%">Bin ID</th>
                    <th width="30%">Location</th>
                    <th width="30%">Description</th>
                    <th width="20%"></th>
                </tr>
                <?php 
                    while($row=mysqli_fetch_row($res1))
                    {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
<!-- </div> -->


<div id="addBin" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="add_bin_form">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Add Bin</h4>
                </div>
                <div class="modal-body">
                    
                    <label>Location</label>
                    <input type="text" name="location" id="location" class="form-control" required="" />
                    <br>
                    <label>Description</label>
                    <input type="text" name="description" id="description" class="form-control" required="" />
                    <br>
                    <!--<label>Image</label>
                    <input type="file" name="file_name" id="item_image" />-->
                    <input type="hidden" name="binID" id="binID">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Submit" id="insert" class="btn" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="deleteBin" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="delete_bin_form">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Delete Bin</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Bin?</p>
                    <input type="hidden" name="deletedata" id="deletedata">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Delete" id="delete" class="btn" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('message-modal.php'); ?>
<?php include('view-filled-requests-modal.php'); ?>


<script>
    $(function () {
        $('#myTab a:first').tab('show')
    });
</script>

<script>
    $(document).ready(function(){
        $('#add_bin_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url:"add_bin.php",
                method:"POST",
                data:$('#add_bin_form').serialize(),
                success:function(data)
                {
                    $('#add_bin_form')[0].reset();
                    $('#addBin').modal('hide');
                    $('#result').html(data);
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var del_binID = $(this).attr("id");
            $('#deletedata').val(del_binID);
            $('#deleteBin').modal('show');
        });

        $('#delete_bin_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url:"add_bin.php",
                method:"POST",
                data:$('#delete_bin_form').serialize(),
                success:function(data)
                {
                    $('#delete_bin_form')[0].reset();
                    $('#deleteBin').modal('hide');
                    $('#result').html(data);
                }
            });
        });
    });
</script>