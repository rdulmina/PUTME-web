

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