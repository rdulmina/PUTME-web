// load suitable results on keyup
$(document).ready(function(){
    $('#search_text').keyup(function () {
        var dataArray =[];
        var filter = document.getElementById("search_param").value;
        var txt = $(this).val().trim();
        dataArray.push(filter);
        dataArray.push(txt);
        var jsonString = JSON.stringify(dataArray);
        if (txt != ''){
            $.ajax({
                url: "../controller/search-filled-request-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }
        else{
            //$('#result').html('');
            $.ajax({
                url: "../controller/search-filled-request-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }
    });
});

// load modal to edit filled request register data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var reg_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-filled-request-handler.php",
            method: "post",
            data: {reg_id:reg_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#view_req_id').val(data.req_id);
                $('#view_bin_id').val(data.bin_id);
                $('#view_is_filled').val(data.is_filled);
                $('#view_location').val(data.location);
                $('#view_description').val(data.description);
                $('#view_email').val(data.email);
                fetchDrivers(data.location);
            }
        });
    });
});

function fetchDrivers(location) {
    $.ajax({
        url:"../controller/fetch-driver-location-handler.php",
        method: "post",
        data: {location:location},
        dataType: "json",
        cache: false,
        success:function (data) {
            $('#view_data_Modal').modal('show');
            document.getElementById('drivernames').innerHTML=data;
        }
    });
}


function assignDriver(){
    var driver_id = document.getElementById('select_driver_name').value;
    var req_id = document.getElementById('view_req_id').value;
    var bin_id = document.getElementById('view_bin_id').value;
    var location = document.getElementById('view_location').value;
    var description = document.getElementById('view_description').value;
    $.ajax({
        url:"../controller/update-driver-status-handler.php",
        method: "post",
        data: {driver_id:driver_id,req_id:req_id,bin_id:bin_id,location:location,description:description},
        dataType: "json",
        cache: false,
        success:function (data) {
            $('#view_data_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
        }
    });
}

$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-filled-requests.php');
});