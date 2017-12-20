
// to change the filter when clicked
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });
});

// load content dynamically to content div from sidebar
$("a").filter(".ref").click(function(){
    var page = $(this).attr('href');
    $("#content").load(page,false);

    // to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
    return false;
});


// load register request count
setInterval(function(){
    $.ajax({
        url:'../controller/request-count-handler.php',
        type: "POST",
        data : "",
        success: function(data)
        {
            if (data!=0){
                $('#request_count').html(data+" NEW");
            }
            else {
                $('#request_count').html("");
            }
        }
    });
},3000);

$(document).ready(function(){
    $('#side-bar-list a').click(function(e) {
        e.preventDefault();
        $('#side-bar-list a').removeClass('active');
        $(this).toggleClass('active');
    });
});


// load register requests
function displayFilledRequests() {
    $('#content').load("../view/manage-filled-requests.php");
}